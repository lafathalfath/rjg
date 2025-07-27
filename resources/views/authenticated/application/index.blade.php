@extends('layouts.manage_application')

@section('title')
Manage {{ $application->name }}
@endsection

@section('content')
    <div>
        {{ $application->name }}
    </div>
@endsection