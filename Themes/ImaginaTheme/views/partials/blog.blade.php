@php
    $noticias=get_posts(['categories'=>[1],'take' => 3]);
@endphp

@if(count($noticias)!=0)
<section class="iblock general-block20" data-blocksrc="general.block20">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="title-arrow text-center mb-5">
                    <h2 class="px-5 bg-white"><strong>ARTÍCULOS</strong></h2>
                </div>

                <div class="row">
                    @foreach($noticias as $post)
                        <!-- Blog Post -->
                        <div class="col-lg-4 mb-5">
                            <div class="card card-post border-0">
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
                                    <h2 class="card-title"><a href="{{$post->url}}">{{$post->title}}</a></h2>
                                    <p class="card-text">{{Str::limit($post->summary, 100) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif