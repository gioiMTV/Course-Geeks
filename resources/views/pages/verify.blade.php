@extends('layouts.user')
@section('title')
    {{ $title }}
@endsection
@php
    $header = $footer = true; // or false, depending on your logic
@endphp
@section('content')
    
        <section class="container d-flex flex-column vh-100">
            <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4 text-center">
                                <div class="d-flex align-items-center justify-content-center mb-4">
                                    <a href="{{ route('home') }}" class="m-4">
                                        <img src="{{ asset('assets/images/brand/logo/logo-icon.svg') }}" class="mb-0"
                                            alt="logo">
                                    </a>
                                    <h1 class="mb-1 fw-bold">Gmail Verification</h1>

                                </div>
                                @if (session('msg'))
                                    <div class="alert alert-{{ session('alert-type') }}">
                                        {{ session('msg') }}
                                    </div>
                                @endif
                                <h2><span>Please recheck your email to complete the verification step.</span></h2>
                                <div>
                                    <div class="my-2">
                                        <a href="{{ route('signup') }}" class="ms-3">Create a new account?</a>
                                    </div>
                                    <div class="my-2">
                                        <a href="{{ route('login') }}" class="ms-3">Login with another account.</a>
                                    </div>
                                </div>

                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="position-absolute bottom-0 m-4">
            <div class="dropdown">
                <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button"
                    aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                    <i class="bi theme-icon-active"></i>
                    <span class="visually-hidden bs-theme-text">Toggle theme</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bs-theme-text">
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                            aria-pressed="false">
                            <i class="bi theme-icon bi-sun-fill"></i>
                            <span class="ms-2">Light</span>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                            aria-pressed="false">
                            <i class="bi theme-icon bi-moon-stars-fill"></i>
                            <span class="ms-2">Dark</span>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center active"
                            data-bs-theme-value="auto" aria-pressed="true">
                            <i class="bi theme-icon bi-circle-half"></i>
                            <span class="ms-2">Auto</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    
@endsection
