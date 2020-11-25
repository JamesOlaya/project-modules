@php
    $postcate=get_posts(['categories'=>$id,'take' => 9]);
@endphp

@if(count($postcate)!=0)

    <section>
        <div class="pestana pestana-small mb-4">
    		<div class="bg-warning">{{$title}}</div>
		</div>

        <div id="owl-post-cate" class="owl-carousel noticias owl-theme my-3">
            @foreach($postcate as $index => $post)
                <div class="item">
                    <div class="card card-post-mini border-0">
                        <a href="{{$post->url}}">
                            <div class="cover-img-4-3">
                                <img src="{{$post->mainimage->path}}"
                                     alt="{{$post->title}}">
                            </div>     
                        </a>
                        <div class="card-body px-0 pb-0">
                            @foreach($post->categories as $index => $cate)
                                @if($loop->last)
                                <a href="{{url($cate->slug)}}" class="text-primary category mb-0">
                                    {{$cate->title}}
                                </a>
                                @endif
                            @endforeach
                            <h3 class="title"><a href="{{$post->url}}">{{$post->title}}</a></h3>
                            <p class="card-text">{{Str::limit($post->summary, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

@endif

@section('scripts')
    <script>
        $(document).ready(function () {

            $('#owl-post-cate').owlCarousel({
                loop: true,
                margin: 20,
                dots: false,
                responsiveClass: true,
                autoplay: true,
                autoplayHoverPause: true,
                navText: ['<i class="owl-icon-left"></i>', '<i class="owl-icon-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    500: {
                        items: 2,
                        nav: false
                    },
                    992: {
                        items: 3,
                        nav: false,
                        loop: false
                    }
                }
            })

        });
    </script>

    @parent

@stop

