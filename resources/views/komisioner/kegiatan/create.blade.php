@extends('dashboard')

@section('content')
    @if (isset($activityReport))
        @livewire('create-activity-report-form', ['activityReport' => $activityReport])
    @else
        @livewire('create-activity-report-form')
    @endif
@endsection
