@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Selamat Datang, {{ Auth::user()->name }}!</h5>
        </div>
        <div class="card-body">
            <p>Ini adalah halaman dashboard utama Anda.</p>
        </div>
    </div>
@endsection