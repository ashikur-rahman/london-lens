@extends('layouts.admin')

@section('content')

<x-admin.page-header
title="Create User"
subtitle="Add a new user">

<a
href="{{ route('admin.users.index') }}"
class="btn btn-outline-primary">

<i class="bi bi-arrow-left"></i>

Back

</a>

</x-admin.page-header>

<x-admin.breadcrumb>

<li class="breadcrumb-item">

<a
href="{{ route('admin.dashboard') }}">

Dashboard

</a>

</li>

<li class="breadcrumb-item">

<a
href="{{ route('admin.users.index') }}">

Users

</a>

</li>

<li class="breadcrumb-item active">

Create

</li>

</x-admin.breadcrumb>

<div class="card shadow">

<div class="card-body">

<form
method="POST"
action="{{ route('admin.users.store') }}">

@include('admin.users._form')

</form>

</div>

</div>

@endsection
