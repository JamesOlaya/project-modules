@extends('layouts.master')

@section('meta')
    <meta name="description" content="@if(!empty($tag->description)){!!$tag->description!!}@endif">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="{{$tag->title}}">
    <meta name="twitter:description" content="{@if(!empty($tag->description)){!!$tag->description  !!}@endif">
    <meta name="twitter:creator" content="">
    <meta name="twitter:image:src"
          content="@if(!empty($tag->options->mainimage)){{url($tag->options->mainimage) }} @endif">
@stop
@section('title')
    {{$tag->title}} | @parent
@stop
@section('content')
    <div class="page blog  blog-category-{{$tag->slug}} blog-category-{{$tag->id}}">

        @component('partials.widgets.breadcrumb')
            <li class="breadcrumb-item active" aria-current="page">{{$tag->title}}</li>
        @endcomponent

            <div class="container">

                <div class="row">

                    <!-- Blog Entries Column -->
                    <div class="col-12">
                        <div class="title-arrow text-center mb-5">
                            <h1 class="px-5 bg-white font-weight-bold">{{$tag->title}}</h1>
                        </div>

                        <div class="row">
                        @if (count($posts))
                            @foreach($posts as $post)
                                <!-- Blog Post -->
                                    <div class="col-lg-4 mb-4">
                                        <div class="card ">
                                            <img class="card-img-top"
                                                 src="{{$post->mainimage->path}}"
                                                 alt="{{$post->title}}">
                                            <div class="card-body">
                                                <h2 class="card-title">{{$post->title}}e</h2>
                                                <p class="card-text">{{$post->summary}}</p>
                                                <a href="{{$post->url}}"
                                                   class="btn btn-primary">{{trans('iblog::common.button.read more')}} &rarr;</a>
                                            </div>
                                            <div class="card-footer text-muted">
                                                {{trans('iblog::common.Posted on')}} {{format_date($post->created_at,'%m %d, %G')}} {{trans('iblog::common.by')}}
                                                <a href="{{$post->url}}">{{$post->user->present()->fullName()}}</a>
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
                                        <p style="text-align: center;">No hemos podido encontrar el Contenido que
                                            estás
                                            buscando.</p>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
                @include('partials.subcription')

                @include('partials.brands')


        </div>
@stop