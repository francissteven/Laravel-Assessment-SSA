@extends('layouts.master')
@section('title', 'View User')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('users.view', $user->id) }}">View</a>
            </li>
        </ol>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-4 text-center p-4">
                            <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('def-profile.jpg') }}" alt="User Photo" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $user->prefixname ? $user->prefixname . ' ' : '' }}
                                    {{ $user->firstname }} 
                                    {{ $user->middlename ? strtoupper(substr($user->middlename, 0, 1)) . '. ' : '' }}
                                    {{ $user->lastname }}
                                    {{ $user->suffixname ? ', ' . $user->suffixname : '' }}
                                </h5>
                                <p class="card-text text-muted mb-1">@ {{ $user->username }}</p>
                                <p class="card-text mb-2"><i class="bi bi-envelope"></i> {{ $user->email }}</p>
                                <p class="card-text"><small class="text-muted">Account Type: {{ ucfirst($user->type) }}</small></p>
                                @if ($user->email_verified_at)
                                <p class="text-success"><i class="bi bi-check-circle"></i> Email Verified</p>
                                @else
                                <p class="text-warning"><i class="bi bi-exclamation-circle"></i> Email Not Verified</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection