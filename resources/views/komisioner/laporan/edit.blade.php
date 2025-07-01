{{-- File: resources/views/komisioner/laporan/edit.blade.php --}}
@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            {{-- Judul halaman edit, bisa dinamis --}}
            <h5 class="mb-0">Edit Laporan Hasil Sidak #{{ $report->id }}</h5>
        </div>

        <div class="card-body">
            {{-- Menampilkan pesan sukses/error dari session (setelah redirect dari controller) --}}
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

            <livewire:create-report-form :report="$report" />
        </div>
    </div>
@endsection