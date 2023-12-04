@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container">
                <main class="form-login">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">Login</h1>
                        <div class="form-floating">
                            <input placeholder="username"
                                class="form-control mt-2 {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                                name="name" value="{{ old('name') }}" autofocus required>
                            <label for="email">Username</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control mt-2 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                type="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        @if (session('error'))
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif
                        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
                    </form>
                    <small class="d-block text-center mt-3">Belum punya akun? <a
                            href="{{ route('register') }}">Register</a></small>
                </main>
            </div>
        </div>
    </div>

    <!-- Favicon icon -->
    <link rel="icon" type="../assets/image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- Required vendors -->
    <script src="./assets/vendor/global/global.min.js"></script>
    <script src="./assets/js/quixnav-init.js"></script>
    <script src="./assets/js/custom.min.js"></script>

@endsection
