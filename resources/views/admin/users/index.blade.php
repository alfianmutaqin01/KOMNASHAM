{{-- File: resources/views/admin/users/index.blade.php --}}
@extends('dashboard') {{-- Menggunakan layout dashboard utama --}}

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Manajemen Pengguna</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <livewire:user-table />
        </div>
    </div>
@endsection