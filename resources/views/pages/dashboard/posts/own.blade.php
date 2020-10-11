@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="mb-4">List of posts</h1>

            <x-posts.table :posts="$posts"/>
        </div>
    </div>
@endsection
