@extends('layouts.main')

@section('main-content')
    <div id="tooplate_content">
        <x-posts.representations.full :post="$post"/>

        <div class="cleaner"></div>
    </div>
@endsection

@section('main-sidebar')
    <x-main.sidebar/>
@endsection
