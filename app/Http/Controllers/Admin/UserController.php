<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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

    public function create() {}
    public function store() {}
    public function show() {}
    public function edit() {}
    public function update() {}
    public function destroy() {}
}
