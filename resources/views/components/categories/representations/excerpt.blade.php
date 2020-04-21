@extends('components.categories.representations.abstract')

@section('category-content')
    <p>{{ $category->excerpt }}</p>
@overwrite

@section('category-additions')
    <a href="{{ route('main.categories.show', ['category' => $category->uri_alias]) }}" class="more float_r">View</a>
@overwrite
