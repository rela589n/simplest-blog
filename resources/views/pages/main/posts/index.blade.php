@extends('layouts.main')

@section('main-content')
    <div id="tooplate_content">
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

        <x-posts.full-view-list :posts="$posts"/>
        {{ $posts->links() }}

        <div class="cleaner"></div>
    </div>
@endsection

@section('main-sidebar')
    <x-main.sidebar/>
@endsection

@section('bottom_scripts')
    @parent
    <script src="{{ asset('vendor/nivo/jquery.nivo.slider.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(window).load(function () {
            $('#slider').nivoSlider({
                effect: 'random',
                slices: 15,
                animSpeed: 500,
                pauseTime: 3000,
                startSlide: 0, //Set starting Slide (0 index)
                directionNav: false,
                directionNavHide: false, //Only show on hover
                controlNav: false, //1,2,3...
                controlNavThumbs: false, //Use thumbnails for Control Nav
                pauseOnHover: true, //Stop animation while hovering
                manualAdvance: false, //Force manual transitions
                captionOpacity: 0.8, //Universal caption opacity
                beforeChange: function () {
                },
                afterChange: function () {
                },
                slideshowEnd: function () {
                } //Triggers after all slides have been shown
            });
        });
    </script>
@endsection
