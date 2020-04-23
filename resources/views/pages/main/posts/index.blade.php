@extends('layouts.main')

@section('main-content')
    <x-main.slider/>

    <x-posts.catalogs.excerpt :posts="$posts"/>
    {{ $posts->links() }}
@endsection

