@csrf

<div class="row">

    <div class="col-md-6 mb-3">

        <label>Name</label>

        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $user->name ?? '') }}">

        <x-admin.form-error
            name="name"/>

    </div>

    <div class="col-md-6 mb-3">

        <label>Email</label>

        <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $user->email ?? '') }}">

        <x-admin.form-error
            name="email"/>

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label>Phone</label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ old('phone', $user->phone ?? '') }}">

    </div>

    <div class="col-md-6 mb-3">

        <label>Role</label>

        <select
            name="role"
            class="form-select">

            @foreach($roles as $role)

                <option
                    value="{{ $role }}"
                    @selected(old('role', optional($user ?? null)?->getRoleNames()->first()) == $role)>
                    {{ $role }}
                </option>

            @endforeach

        </select>

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label>
        Password
        @if(isset($user))
            <small class="text-muted">(Leave blank to keep current password)</small>
        @endif
        </label>

        <input
            type="password"
            name="password"
            class="form-control">

    </div>

    <div class="col-md-6 mb-3">

        <label>Confirm Password</label>

        <input
            type="password"
            name="password_confirmation"
            class="form-control">

    </div>

</div>

<div class="form-check form-switch mb-4">

<input
    class="form-check-input"
    type="checkbox"
    name="status"
    value="1"
    @checked(old('status', $user->status ?? true))>

<label>

Active User

</label>

</div>



<div class="d-flex justify-content-end">

<a
href="{{ route('admin.users.index') }}"
class="btn btn-secondary me-2">

Cancel

</a>

<button
class="btn btn-primary">

Save User

</button>

</div>
