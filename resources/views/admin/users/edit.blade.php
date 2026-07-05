@extends('layouts.admin')

@section('content')

<x-admin.page-header
title="Edit User"
subtitle="Update user information">

<a
href="{{ route('admin.users.index') }}"
class="btn btn-outline-primary">

Back

</a>

</x-admin.page-header>

<div class="card shadow">

<div class="card-body">

<form
method="POST"
action="{{ route('admin.users.update',$user) }}">

@method('PUT')

@include('admin.users._form')

</form>

</div>

</div>

@endsection
