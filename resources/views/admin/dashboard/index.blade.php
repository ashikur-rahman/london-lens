@extends('layouts.admin')

@section('content')

<h2 class="mb-4">
    Dashboard
</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total Users</h6>
                <h2>{{ \App\Models\User::count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Products</h6>
                <h2>0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Orders</h6>
                <h2>0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Revenue</h6>
                <h2>£0</h2>
            </div>
        </div>
    </div>

</div>

@endsection
