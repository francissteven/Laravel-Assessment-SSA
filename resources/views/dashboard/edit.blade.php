@extends('layouts.master')
@section('title', 'Edit User')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                </li>
            </ol>
        </nav>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg">
                        <div class="card-header bg-secondary text-white text-center">
                            <h3>Edit User</h3>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="prefixname" class="form-label">Prefix</label>
                                        <select class="form-select" id="prefixname" name="prefixname">
                                            <option value="" {{ old('prefixname', $user->prefixname) == '' ? 'selected' : '' }}>None</option>
                                            <option value="Mr." {{ old('prefixname', $user->prefixname) == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                            <option value="Mrs." {{ old('prefixname', $user->prefixname) == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                            <option value="Ms." {{ old('prefixname', $user->prefixname) == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="firstname" class="form-label">First Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $user->firstname) }}" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="middlename" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="middlename" name="middlename" value="{{ old('middlename', $user->middlename) }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="lastname" class="form-label">Last Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $user->lastname) }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="suffixname" class="form-label">Suffix</label>
                                        <input type="text" class="form-control" id="suffixname" name="suffixname" value="{{ old('suffixname', $user->suffixname) }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" disabled required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $user->password) }}" disabled required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="photo" class="form-label">Profile Photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary">Update User</button>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection