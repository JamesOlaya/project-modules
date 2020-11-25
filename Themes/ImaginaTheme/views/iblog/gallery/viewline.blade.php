@if(count(postgallery($post->id)) > 0)

    <div class="gallery">
        <div class="owl-carousel owl-theme">
            @foreach(postgallery($post->id) as $image)

                <div class="item">

                    <a href="{{asset($image)}}" data-fancybox="gallery">
                        <img src="{{asset($image)}}" alt="Gallery Image">
                    </a>

                </div>

            @endforeach
        </div>
    </div>
@endif

@if(count($post->gallery) > 0)

    <div id="galleryPadding" class="owl-carousel owl-theme">

        @foreach($post->gallery as $image)

            <a href="{{asset($image->path)}}" class="cover-img-16 mb-4" data-fancybox="gallery">
                <img src="{{asset($image->path)}}"  alt="Gallery Image">
            </a>
        @endforeach

    </div>

@endif

@section('scripts')
    <script>
        $(document).ready(function(){
            var owl = $('#galleryPadding');

            owl.owlCarousel({
                margin: 10,
                nav: false,
                loop: false,
                lazyContent: true,
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    640: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });

        });
    </script>

    @parent

@stop