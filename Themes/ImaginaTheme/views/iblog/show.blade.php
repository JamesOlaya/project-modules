@extends('layouts.master')

@section('meta')
@include('iblog::frontend.partials.post.metas')
@stop

@section('title')
{{ $post->title }} | @parent
@stop

@section('content')

<div class="page blog single single-{{$category->slug}} single-{{$category->id}}">

    @component('partials.widgets.breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url($category->slug)}}">{{$category->title}}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
    @endcomponent

    <div class="container">
        <div class="row justify-content-between">

            <div class="col-md-8 col-lg-7 mb-5 ">
                <div class="card-post-big">
                    <h6 class="title-category text-primary">{{$category->title}}</h6>
                    <h1 class="title mb-4">{{ $post->title }}</h1>
                    <div class="bgimg mb-4">
                        <img class="img-fluid w-100" src="{{url($post->mainimage->path)}}"
                        alt="{{$post->title}}"/>
                    </div>

                    <div class="date mb-4">{{ $post->created_at->format('d M, Y') }} | <i class="fa fa-comment-o"></i> 0</div>

                    <div class="row">
                        <div class="col-sm-12 col-md-auto">
                            @include('partials.widgets.share',array('url'=>$post->url, 'text'=>$post->title))
                        </div>
                        <div class="col">

                            <div class="page-body description mb-4 text-justify">
                                {!! $post->description !!}
                            </div>

                            @include('iblog.gallery.viewline')

                            <div class="facebook-comments mb-5">
                                <div class="fb-comments"
                                data-href="{{url($post->url)}}"
                                data-numposts="5" data-width="100%">
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                @include('iblog.partials.post-category',array('title'=>'Artículos Relacionados','id'=>1))


            </div>

            <div class="col-md-4 col-lg-4 mb-5">

                @include('iblog.partials.most_read',array('id'=>1, 'title'=>'Post Reciente'))

                @include('iblog.partials.categories',array('id'=>1))

                @include('iblog.partials.tag')

                @include('partials.widgets.banner-horizontal', array('name'=>'blog'))

            </div>

        </div>
    </div>
</div>
@stop

@section('scripts')
@parent
@include('iblog::frontend.partials.post.script')
@stop