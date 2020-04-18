@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="mb-4">List of categories</h1>

            <x-categories.table :categories="$categories"/>
        </div>
    </div>
@endsection
