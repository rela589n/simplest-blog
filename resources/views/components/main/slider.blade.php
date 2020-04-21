<div id="homepage_slider">
    <div id="slider">
        <a href="#"><img src="{{ asset('img/slideshow/01.jpg')  }}" alt="Slide 01"
                         title="Nam fermentum lacus suscipit diam feugiat fringilla."/></a>
        <a href="#"><img src="{{ asset('img/slideshow/02.jpg')  }}" alt="Slide 02"
                         title="Proin bibendum est id velit tincidunt ut sodales ligula facilisis."/></a>
        <a href="#"><img src="{{ asset('img/slideshow/03.jpg')  }}" alt="Slide 03"
                         title="Fusce tincidunt diam eu metus iaculis hendrerit."/></a>
        <a href="#"><img src="{{ asset('img/slideshow/04.jpg')  }}" alt="Slide 04"
                         title="Nulla faucibus luctus quam eget placerat. "/></a>
        <a href="#"><img src="{{ asset('img/slideshow/05.jpg')  }}" alt="Slide 05"
                         title="Aliquam quis velit et sem vestibulum dignissim."/></a>
    </div>
</div>

@section('bottom_scripts')
    @parent
    <script src="{{ asset('vendor/nivo/jquery.nivo.slider.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main-slider.js') }}" type="text/javascript"></script>
@endsection
