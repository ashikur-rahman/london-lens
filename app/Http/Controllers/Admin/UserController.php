<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;

use App\Http\Requests\UpdateUserRequest;

use App\Models\User;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {
    }

    public function index(Request $request)
    {
        return view('admin.users.index', [
            'users' => $this->service->list($request->all()),
            'roles' => Role::pluck('name'),
            'filters' => $request->only(['search', 'role']),
        ]);
    }

        public function create()
        {
            return view('admin.users.create', [

                'roles' => Role::pluck('name')

            ]);
        }
    public function store(StoreUserRequest $request)
{
    $this->service->create(
        $request->validated()
    );

    return redirect()
        ->route('admin.users.index')
        ->with(
            'success',
            'User created successfully.'
        );
}
    public function show() {}
    public function edit(User $user)
    {
        return view('admin.users.edit', [

            'user' => $user,

            'roles' => Role::pluck('name'),

        ]);
    }
            public function update(
            UpdateUserRequest $request,
            User $user
        )
        {
            $this->service->update(
                $user,
                $request->validated()
            );

            return redirect()
                ->route('admin.users.index')
                ->with(
                    'success',
                    'User updated successfully.'
                );
        }
    public function destroy() {}
}
