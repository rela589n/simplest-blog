@extends('layouts.main')

@section('main-content')
    <x-posts.representations.full :post="$post"/>

    <h3>Comments</h3>
    <div id="comment_section">
        <x-comments.catalogue :comments="$post->comments"/>
    </div>

    @auth
        <div id="comment_form">
            <h3>Leave your comment</h3>

            <x-comments.form :send-action="route('api.comments.store')"
                             :commentable-id="$post->id"
                             commentable-type="post"
                             send-method="POST"/>
        </div>
    @else
        <a href="{{ route('login') }}">Log in to leave comment</a>
    @endauth
@endsection

@section('bottom_scripts')
    <script src="{{ asset('vendor/jquery/jquery-3.3.1.min.js') }}"></script>
@endsection
