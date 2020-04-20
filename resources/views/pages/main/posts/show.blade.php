@extends('layouts.main')

@section('main-content')
    <div id="tooplate_content">
        <x-posts.representations.full :post="$post"/>

        <h3>Comments</h3>
        <div id="comment_section">
            <x-comments.catalogue :comments="$post->comments"/>
        </div>

        <div class="cleaner"></div>
    </div>
@endsection

@section('main-sidebar')
    <x-main.sidebar/>
@endsection
