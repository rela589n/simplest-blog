@extends('layouts.main')

@section('main-content')
    <x-main.slider/>

    <x-posts.catalogue :posts="$posts"/>
    {{ $posts->links() }}
@endsection

