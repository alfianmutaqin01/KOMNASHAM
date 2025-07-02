@php($hideSidebar = true)
@extends('dashboard') {{-- Menggunakan layout dashboard.blade.php tanpa sidebar --}}

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{-- Judul Halaman --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Profil Saya</h5>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            {{-- Informasi Profil --}}
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Informasi Profil</h6>
                    </div>
                    <div class="card-body">
                        @livewire('profile.update-profile-information-form')
                    </div>
                </div>
            @endif

            {{-- Ubah Password --}}
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Ubah Password</h6>
                    </div>
                    <div class="card-body">
                        @livewire('profile.update-password-form')
                    </div>
                </div>
            @endif

            {{-- Autentikasi Dua Faktor --}}
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Autentikasi Dua Faktor</h6>
                    </div>
                    <div class="card-body">
                        @livewire('profile.two-factor-authentication-form')
                    </div>
                </div>
            @endif

            {{-- Logout dari Browser Lain --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">Sesi Browser Lain</h6>
                </div>
                <div class="card-body">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            </div>

            {{-- Hapus Akun --}}
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="card mb-4">
                    <div class="card-header text-danger">
                        <h6 class="mb-0">Hapus Akun</h6>
                    </div>
                    <div class="card-body">
                        @livewire('profile.delete-user-form')
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
