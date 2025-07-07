@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Pengaturan Surat Tugas</h5>
        </div>
        <div class="card-body">
            <livewire:admin.letter-settings />
        </div>
    </div>
@endsection