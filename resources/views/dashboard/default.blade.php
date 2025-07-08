{{-- File: resources/views/dashboard/default.blade.php --}}
@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Selamat Datang, {{ Auth::user()->name }}!</h5>
        </div>
    </div>
    <livewire:dashboard-stats />
@endsection
