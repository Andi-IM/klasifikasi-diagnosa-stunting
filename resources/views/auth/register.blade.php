@extends('layouts.auth')
@section('title', 'Register')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            {{-- Jika berhasil melakukan register alert ini akan muncul, alert ini diatur didalam RegisterController --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container">
                <main class="form-register">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">Register</h1>

                        <div class="form-floating">
                            <input type="text" name="name" class="form-control mt-2" id="name"
                                placeholder="name">
                            <label fpr="name">Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="email" class="form-control mt-2" id="email"
                                placeholder="name@example.com">
                            <label fpr="email">Email Address</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="password" class="form-control mt-2" id="password"
                                placeholder="password">
                            <label fpr="password">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Submit</button>
                    </form>
                    <small class="d-block text-center mt-3">Sudah punya akun? <a href="login">Login</a></small>
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
