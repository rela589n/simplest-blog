@extends('layouts.main')

@section('main-content')
    <div id="tooplate_content">
        <x-categories.representations.full :category="$category"/>

        <h2>List of articles by category "{{ $category->name }}":</h2>
        <br><br>

        <x-posts.catalogs.in-category :posts="$posts"/>
        {{ $posts->links() }}

        <h3>Category comments</h3>
        <div id="comment_section">
            <x-comments.catalogue :comments="$category->comments"/>
        </div>

        <div id="comment_form">
            <h3>Leave your comment</h3>

            <x-comments.form :send-action="route('api.comments.store')"
                             :commentable-id="$category->id"
                             commentable-type="category"
                             send-method="POST"/>
        </div>

        <div class="cleaner"></div>
    </div>
@endsection

@section('bottom_scripts')
    <script src="{{ asset('vendor/jquery/jquery-3.3.1.min.js') }}"></script>
@endsection
