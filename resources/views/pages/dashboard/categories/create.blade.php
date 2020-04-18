@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-11">
            <h1 class="mb-4">Add new category</h1>

            <x-category-form/>
        </div>
    </div>
@endsection

@section('bottom_scripts')
    @parent
    <script src="{{ asset('js/jquery.liTranslit.js') }}"></script>
    <script src="{{ asset('js/uri-autogenerator.js') }}"></script>
@endsection
