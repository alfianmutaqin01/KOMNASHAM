@extends('dashboard')

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Update Profile Information --}}
    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        <div class="card shadow-sm border-0 rounded mb-4">
            <div class="card-body p-4 mb-4">
                @livewire('profile.update-profile-information-form')
            </div>
        </div>
    @endif

    {{-- Update Password --}}
    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        <div class="card shadow-sm border-0 rounded mb-4">
            <div class="card-body p-4 mb-4">
                @livewire('profile.update-password-form')
            </div>
        </div>
    @endif

    {{-- Two Factor Authentication --}}
    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <div class="card shadow-sm border-0 rounded mb-4">
            <div class="card-body p-4 mb-4">
                @livewire('profile.two-factor-authentication-form')
            </div>
        </div>
    @endif

    {{-- Browser Sessions --}}
    <div class="card shadow-sm border-0 rounded mb-4">
        <div class="card-body p-4 mb-4">
            @livewire('profile.logout-other-browser-sessions-form')
        </div>
    </div>

    {{-- Delete Account --}}
    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        <div class="card shadow-sm border border-danger rounded mb-4">
            <div class="card-body p-4">
                @livewire('profile.delete-user-form')
            </div>
        </div>
    @endif
@endsection
