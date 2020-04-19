@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="mb-4">Create new post</h1>

            <x-posts.form :send-action="route('dashboard.posts.store')"
                          :categories="$categories"
                          submit-button-text="Create"/>
        </div>
    </div>
@endsection
