@extends('layouts.main')

@section('main-content')
    <x-main.slider/>

    <x-categories.catalogue :categories="$categories"/>
@endsection

@section('main-sidebar')
    <x-main.sidebar :show-categories="false"/>
@overwrite
