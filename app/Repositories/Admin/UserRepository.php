<?php

namespace App\Repositories\Admin;

use App\Models\User;

class UserRepository
{
    public function paginate(?string $search = null, ?string $role = null)
    {
        return User::query()
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");

                });

            })
            ->when($role, function ($query) use ($role) {

                $query->role($role);

            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }
}
