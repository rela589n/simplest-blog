@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="mb-4">Edit "{{ $category->name }}":</h1>

            <x-categories.form :send-action="route('dashboard.categories.update', $category)"
                               :category="$category"
                               send-method="PUT"
                               submit-button-text="Save"/>
        </div>
    </div>
@endsection
