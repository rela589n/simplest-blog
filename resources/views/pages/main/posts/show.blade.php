@extends('layouts.main')

@section('main-content')
    <div id="tooplate_content">
        <x-posts.representations.full :post="$post"/>

        <h3>Comments</h3>
        <div id="comment_section">
            <x-comments.catalogue :comments="$post->comments"/>
        </div>

        <div id="comment_form">
            <h3>Leave your comment</h3>

            <x-comments.form :send-action="route('api.comments.store')"
                             :commentable-id="$post->id"
                             commentable-type="post"
                             send-method="POST"/>
        </div>

        <div class="cleaner"></div>
    </div>
@endsection

@section('bottom_scripts')
    <script src="{{ asset('vendor/jquery/jquery-3.3.1.min.js') }}"></script>
@endsection
