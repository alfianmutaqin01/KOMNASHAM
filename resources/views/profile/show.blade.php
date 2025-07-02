@extends('dashboard')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Profil</h5>
                    <span class="d-block text-muted">Perbarui informasi profil dan alamat email akun Anda.</span>
                </div>
                <div class="card-body">
                    @livewire('profile.update-profile-information-form')
                </div>
            </div>
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="card mb-4"> {{-- Tambahkan Card --}}
                <div class="card-header">
                    <h5 class="mb-0">Perbarui Kata Sandi</h5>
                    <span class="d-block text-muted">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap
                        aman.</span>
                </div>
                <div class="card-body">
                    @livewire('profile.update-password-form')
                </div>
            </div>
        @endif

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Autentikasi Dua Faktor</h5>
                    <span class="d-block text-muted">Tambahkan keamanan tambahan ke akun Anda menggunakan autentikasi dua
                        faktor.</span>
                </div>
                <div class="card-body">
                    @livewire('profile.two-factor-authentication-form')
                </div>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Sesi Browser</h5>
                <span class="d-block text-muted">Kelola dan logout sesi browser aktif Anda di perangkat dan browser
                    lain.</span>
            </div>
            <div class="card-body">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
        </div>

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <div class="card mb-4 border-danger border-2">
                <div class="card-header bg-danger text-white">
                    <span class="d-block text-white-75">Hapus akun Anda secara permanen.</span>
                </div>
                <div class="card-body">
                    @livewire('profile.delete-user-form')
                </div>
            </div>
        @endif
    </div>
@endsection