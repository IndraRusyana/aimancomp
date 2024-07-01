@extends('layouts.admin')

@section('title')
    Login Page Admin
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <a href="index.html" class="app-brand-link gap-2">
                        <img src="{{asset('assets\img\icons\brands\aiman.png')}}" alt="" srcset="" width="50">
                    <span class="app-brand-text demo text-body fw-bolder">Aiman Comp</span>
                    </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-2">Welcome to Aiman Comp👋</h4>
                <p class="mb-4">Please login to your account</p>

                <form id="formAuthentication" class="mb-3" action="{{ route('loginAdmin') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        autofocus
                    />
                    @error('email')
                        <div class="text-danger">Wrong email or password</div>
                    @enderror
                    </div>
                    <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        {{-- <a href="auth-forgot-password-basic.html">
                        <small>Forgot Password?</small>
                        </a> --}}
                    </div>
                    <div class="input-group input-group-merge">
                        <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        @error('password')
                            <div class="text-danger">Wrong email or password</div>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">login</button>
                    </div>
                </form>
                <p class="text-center text-muted mt-4">Since 2020</p>
                </div>
            </div>
            <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
