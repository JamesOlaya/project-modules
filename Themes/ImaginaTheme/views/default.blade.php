@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')

    @if(LaravelLocalization::getDefaultLocale()==LaravelLocalization::getCurrentLocale())
        @if(View::exists('pages.content.'.$page->id))
            @include('pages.content.'.$page->id)
        @endif
    @else

        @if(View::exists('pages.content.'.LaravelLocalization::getCurrentLocale().'.'.$page->id))
            @include('pages.content.'.LaravelLocalization::getCurrentLocale().'.'.$page->id)
        @endif
    @endif

@stop

@section ('scripts')



@stop
