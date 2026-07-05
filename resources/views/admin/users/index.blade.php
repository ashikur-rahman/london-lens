@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

    <h3 class="mb-0">
        Users
    </h3>

    <a href="{{ route('admin.users.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-circle me-1"></i>

        Create User

    </a>

</div>

    <form method="GET" class="row g-3 mb-4">

        <div class="col-md-4">
            <input
                type="text"
                name="search"
                value="{{ $filters['search'] ?? '' }}"
                class="form-control"
                placeholder="Search name or email">
        </div>

        <div class="col-md-3">
            <select name="role" class="form-select">
                <option value="">All Roles</option>

                @foreach($roles as $role)
                    <option
                        value="{{ $role }}"
                        @selected(($filters['role'] ?? '') == $role)>
                        {{ $role }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">
                Search
            </button>
        </div>

    </form>

    <div class="card shadow-sm">

        <div class="table-responsive">

            <table class="table table-hover mb-0">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th width="180">Actions</th>
                </tr>
                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>
                            {{ $user->getRoleNames()->join(', ') ?: '—' }}
                        </td>

                        <td>
                            @if($user->status)
                                <span class="badge bg-success">
                                    Active
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td>

    <a href="{{ route('admin.users.show',$user) }}"
       class="btn btn-sm btn-info">

        View

    </a>

    <a href="{{ route('admin.users.edit',$user) }}"
       class="btn btn-sm btn-warning">

        Edit

    </a>

    <form
        method="POST"
        action="{{ route('admin.users.destroy',$user) }}"
        class="d-inline">

        @csrf
        @method('DELETE')

        <button
            onclick="return confirm('Delete this user?')"
            class="btn btn-sm btn-danger">

            Delete

        </button>

    </form>

</td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center py-4">
                            No users found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">
        {{ $users->links() }}
    </div>

</div>
@endsection
