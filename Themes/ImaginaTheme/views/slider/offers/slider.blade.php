<div id="{{$slider->system_name}}" class="owl-carousel owl-theme ">
    @include('slider.offers.slides', ['slider' => $slider, 'options'=>$options])
</div>

@section('scripts')
    @parent

    <script type="text/javascript">
        $(document).ready(function() {

            $('#{{$slider->system_name}}').owlCarousel({
                loop: true,
                margin: 20,
                dots: false,
                responsiveClass: true,
                autoplay:true,
                autoplayTimeout:5000,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });

        });
    </script>

@stop