@section('main-footer')
    <div id="tooplate_footer">

        <div class="col_w280">
            <h5>Project visits</h5>
            <ul class="tooplate_list">
                @foreach($visits as $visit)
                    <li>{{ $visit->browser }}: {{ $visit->total }}</li>
                @endforeach
            </ul>
        </div>

        <div class="col_w280">
            <h5>Partners</h5>
            <ul class="tooplate_list">
                <li><a href="#">Aenean ac tellus nec</a></li>
                <li><a href="#">Maecenas vestibulum</a></li>
                <li><a href="#">Ut eget tellus eget</a></li>
                <li><a href="#">Curabitur ut lectus</a></li>
                <li><a href="#">Vivamus vel augue vel</a></li>
                <li><a href="#">Praesent varius tempor</a></li>
            </ul>
        </div>

        <div class="col_w280 last_col">
            <h5>About Us</h5>
            <p>Aliquam venenatis nisl a lacus facilisis accumsan. Ut id tellus a velit adipiscing condimentum
                ornare nec
                lectus. Nam ut dui sit amet metus sagittis bibendum quis in odio. Quisque sit amet erat a
                lorem
                condimentum placerat. Duis dignissim, justo vel consequat vulputate, neque nibh gravida nisi,
                et
                posuere
                mauris turpis dapibus quam.</p>
        </div>

        <div class="cleaner"></div>
    </div>
@show
