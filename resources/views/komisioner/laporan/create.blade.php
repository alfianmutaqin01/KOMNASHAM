@extends('dashboard')

@section('content')
    @if (isset($report))
        @livewire('create-report-form', ['report' => $report])
    @else
        @livewire('create-report-form')
    @endif
@endsection
