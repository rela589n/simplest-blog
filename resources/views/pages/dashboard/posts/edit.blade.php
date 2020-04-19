@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="mb-4">Edit post:</h1>

            <x-posts.form :send-action="route('dashboard.posts.update', $post)"
                          :categories="$categories"
                          :post="$post"
                          send-method="PUT"
                          submit-button-text="Update"/>
        </div>
    </div>
@endsection
