<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') </title>

    @section('head_styles')
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/fonts/fontawesome/css/all.min.css') }}" rel="stylesheet">
    @show

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="@yield('body-class')">

@yield('content')

@section('bottom_scripts')
    <script src="{{ asset('vendor/jquery/jquery-3.3.1.min.js') }}"></script>
@show
</body>
</html>
