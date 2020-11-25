@extends('layouts.master')

@section('meta')
    @include('iblog::frontend.partials.category.metas')
@stop
@section('title')
    {{$category->title}} | @parent
@stop
@section('content')
    <div class="page blog-category-{{$category->id}}">

        @component('partials.widgets.breadcrumb')
            <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
        @endcomponent


        <div class="container">

            <div class="row justify-content-between">

                <!-- Blog Entries Column -->
                <div class="col-12">
                    <div class="title-arrow text-center mb-5">
                        <h1 class="px-5 bg-white font-weight-bold">{{$category->title}}</h1>
                    </div>
                </div>

                <div class="col-md-8 col-lg-7 mb-5">

                    <div class="pestana mb-4">
                        <div class="bg-warning">Artículos</div>
                    </div>
                    <div class="row">
                        @if (count($posts))
                        @foreach($posts as $post)
                            <!-- Blog Post -->
                            <div class="col-lg-6 mb-5">
                                <div class="card card-post">
                                    <a href="{{$post->url}}">
                                        <div class="cover-img-4-3">
                                            <img src="{{$post->mainimage->path}}"
                                                 alt="{{$post->title}}">
                                        </div>     
                                    </a>
                                    <div class="card-body px-0">
                                        @foreach($post->categories as $index => $cate)
                                            @if($loop->last)
                                            <a href="{{url($cate->slug)}}" class="text-primary category mb-0">
                                                {{$cate->title}}
                                            </a>
                                            @endif
                                        @endforeach
                                        <h2 class="card-title"><a href="{{$post->url}}">{{$post->title}}</a></h2>
                                        <p class="card-text">{{Str::limit($post->summary, 100) }}</p>
                                        <div class="date">{{ $post->created_at->format('d M, Y') }} | <i class="fa fa-comment-o"></i> 0</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                            <!-- Pagination -->
                            <div class="col-12">
                                <div class="pagination justify-content-center mb-4 pagination paginacion-blog pb-5">
                                    <div class="pull-right">
                                        {{$posts->links('pagination::bootstrap-4')}}
                                    </div>
                                </div>
                            </div>

                        @else
                            <div class="col-12 pb-5">
                                <div class="white-box">
                                    <h3>Ups... :(</h3>
                                    <h1>404 Post no encontrado</h1>
                                    <hr>
                                    <p class="text-center">No hemos podido encontrar el Contenido que
                                        estás
                                        buscando.</p>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="col-md-4 col-lg-4 mb-5">

                    @include('iblog.partials.most_read',array('id'=>1, 'title'=>'Post Reciente'))

                    @include('iblog.partials.categories',array('id'=>1))

                    {{-- 
                    @if(!$tags->isEmpty())
                        <div class="pestana pestana-small mb-4">
                            <div class="bg-warning">Etiquetas</div>
                        </div>
                        <div class="tag-container">
                        @foreach($tags as $tag)
                            <a class="tag" href="{{$tag->url}}" rel="tag">{{$tag->title}}</a>
                        @endforeach
                        </div>
                    @endif
                    --}}

                    @include('partials.widgets.banner-horizontal', array('name'=>'blog'))
                    
                </div>

                    
         
            </div>
        </div>


    </div>
@stop
