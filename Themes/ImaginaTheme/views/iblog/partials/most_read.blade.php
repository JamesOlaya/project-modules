@php
    $post_read=get_posts(['order'=> 'desc','categories' => [$id]]);

     $uparte= array();
     foreach($post_read as $p) {
      array_push($uparte,$p);
     }
     $partes = array_chunk($uparte, 4);

    $ilimite = 100;

@endphp
@if(!$post_read->isEmpty())

    <section>

        <div class="pestana pestana-small mb-4">
            <div class="bg-warning">{{$title}}</div>
        </div>

        <div id="owl-most-read" class="owl-carousel owl-top-right owl-theme mb-4">

            @foreach($partes as $p)
                <div class="item px-3">
                    @foreach($p as $post)

                        <div class="card card-post-mini border-0">

                            <div class="row">
                                <div class="col-4 col-sm-3 @if($loop->last) @else pb-md @endif px-0">
                                    <a href="{{$post->url}}" class="cover-img-4-3">
                                        <img src="{{$post->mainimage->path}}" alt="{{$post->title}}"/>
                                    </a>
                                </div>
                                <div class="col-8 col-sm-9 @if($loop->last) @else pb-md @endif">
                                    <h5 class="title mb-1">
                                        <a href="{{ $post->url }}">{{ Str::limit($post->title, $ilimite) }}</a>
                                    </h5>
                                    <p class="date">
                                        {{ $post->created_at->format('d M, Y') }} | <i class="fa fa-comment-o mr-1"></i> 0
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>

    </section>

@endif


@section('scripts')
    <script>
        $(document).ready(function () {

            $('#owl-most-read').owlCarousel({
                loop: true,
                margin: 10,
                dots: false,
                responsiveClass: true,
                autoplay: false,
                autoplayHoverPause: true,
                navText: ['<i class="owl-icon-left"></i>', '<i class="owl-icon-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    500: {
                        items: 1,
                        nav: true
                    },
                    992: {
                        items: 1,
                        nav: true,
                        loop: false
                    }
                }
            })

        });
    </script>

    @parent

@stop


