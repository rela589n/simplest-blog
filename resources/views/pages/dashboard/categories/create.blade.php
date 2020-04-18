@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="mb-4">Add new category</h1>

            <x-categories.form :send-action="route('dashboard.categories.store')"
                               submit-button-text="Create"/>
        </div>
    </div>
@endsection
