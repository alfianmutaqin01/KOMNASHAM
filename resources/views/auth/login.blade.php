<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Komnas HAM</title>

    <link href="{{ asset('limitless4.0/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless4.0/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless4.0/html/layout_1/full/assets/css/ltr/all.min.css') }}" id="stylesheet"
        rel="stylesheet" type="text/css">
    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @livewireStyles
</head>

<body>

    <div class="page-content">
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="content d-flex justify-content-center align-items-center">

                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="card mb-0">
                            <div class="card-body">

                                <div class="text-center mb-5">
                                    <a href="{{ route('dashboard') }}"
                                        class="position-absolute top-0 start-50 translate-middle-x mt-2">
                                        <img src="{{ asset('limitless4.0/assets/images/komnasham2.png') }}"
                                            alt="Komnas HAM Logo Icon" class="img-fluid"
                                            style="width: 200px; height: auto;">
                                    </a>
                                </div>
                                <div class="text-center mb-3">
                                    <h5 class="mb-0">Masuk ke akun Anda</h5>
                                    <span class="d-block text-muted">Masukkan kredensial Anda di bawah ini</span>
                                </div>

                                <x-validation-errors class="mb-4" />

                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="email" class="form-control" placeholder="ahmad@gmail.com" id="email"
                                            name="email" value="{{ old('email') }}" required autofocus
                                            autocomplete="username">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                    <x-input-error for="email" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password">Kata Sandi</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" class="form-control" placeholder="•••••••••••"
                                            id="password" name="password" required autocomplete="current-password">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                    <x-input-error for="password" class="mt-2" />
                                </div>

                                <div class="mb-3 d-flex align-items-center justify-content-between">
                                    <label class="form-check form-check-inline">
                                        <input type="checkbox" name="remember" id="remember_me"
                                            class="form-check-input">
                                        <span class="form-check-label">Ingat saya</span>
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a class="text-muted" href="{{ route('password.request') }}">Lupa kata sandi?</a>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-outline-primary w-100">Masuk</button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
                <div class="navbar navbar-sm navbar-footer border-top">
                    <div class="container-fluid">
                        <span>&copy; 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    @stack('scripts')
</body>

</html>