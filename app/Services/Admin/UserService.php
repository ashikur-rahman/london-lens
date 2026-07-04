<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepository;

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
}
