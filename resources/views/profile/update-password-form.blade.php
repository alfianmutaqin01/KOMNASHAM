<x-form-section submit="updatePassword" class="card card-body border-0 shadow-sm">
    <x-slot name="title">
        <h5 class="fw-bold text-primary mb-3">Perbarui Kata Sandi</h5>
    </x-slot>

    <x-slot name="description">
        <p class="text-muted mb-4">Pastikan akun Anda menggunakan kata sandi panjang dan acak untuk tetap aman.</p>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Current Password') }}" class="form-label" />
            <x-input id="current_password" type="password" class="form-control" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="text-danger mt-1" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('New Password') }}" class="form-label" />
            <x-input id="password" type="password" class="form-control" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="text-danger mt-1" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="form-label" />
            <x-input id="password_confirmation" type="password" class="form-control" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="text-danger mt-1" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="btn btn-outline-secondary me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button class="btn btn-primary">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
