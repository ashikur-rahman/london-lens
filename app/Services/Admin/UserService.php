<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    public function list(array $filters)
    {
        return $this->repository->paginate(
            $filters['search'] ?? null,
            $filters['role'] ?? null
        );
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {

            $data['password'] = Hash::make(
                $data['password']
            );

            $role = $data['role'];

            unset($data['role']);

            $user = $this->repository->create($data);

            $user->assignRole($role);

            return $user;

        });
    }
}
