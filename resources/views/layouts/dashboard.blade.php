@extends('layouts.root.generic')

@section('head_styles')
    @parent
    <link href="{{ asset('vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('libs/css/style.css') }}">
@endsection

@section('content')
    <x-dashboard-sidebar/>
    <div class="dashboard-wrapper">
        @yield('dashboard-content')
    </div>
@endsection

@section('bottom_scripts')
    @parent
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('libs/js/main-js.js') }}"></script>
@endsection
