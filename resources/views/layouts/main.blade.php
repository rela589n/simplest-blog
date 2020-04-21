@extends('layouts.root.generic')

@section('head_styles')
    <link href="{{ asset('css/tooplate_style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nivo-slider.css') }}" type="text/css" media="screen"/>
@endsection

@section('content')
    <div id="tooplate_wrapper">
        <x-main.header/>

        <x-main.menu/>
        <div id="tooplate_main">
            <div id="tooplate_content">
                @yield('main-content')

                <div class="cleaner"></div>
            </div>

            @section('main-sidebar')
                <x-main.sidebar/>
            @show

            <div class="cleaner"></div>
        </div>
        @section('main-footer-copyright')
            <div id="tooplate_footer_wrapper">
                <x-main.footer/>
                <x-main.copyright/>
            </div>
        @show
    </div>
@endsection

@section('bottom_scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
@endsection
