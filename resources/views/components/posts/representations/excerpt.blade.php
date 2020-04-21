@extends('components.posts.representations.abstract')

@section('post-content')
    <p>{{ $post->excerpt }}</p>
@overwrite

@section('post-additions')
    <a href="{{ route('main.posts.show', ['post' => $post->uri_alias]) }}" class="more float_r">Continue Reading</a>
@overwrite
