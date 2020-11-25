
@foreach($slider->slides as $index => $slide)
    <div class="carousel-item @if($index === 0) active @endif h-100">
        <img  class="d-block w-100 h-100 object-fit-cover position-absolute" src="{!! $slide->getImageUrl() !!}" alt="{{$slide->title??Setting::get('core::site-name')}}">

        <div class="carousel-caption p-0 text-left">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-start">
                    <div class="col-10 col-xl-10">
                        @if(!empty($slide->title))
                            <h1 class="mb-0"><b>{{$slide->title}}</b></h1>
                        @endif
                            @if(!empty($slide->caption))
                                <h2 class="mb-0 d-none d-md-block"><b>{{$slide->caption}}</b></h2>
                            @endif
                            @if(!empty($slide->custom_html))
                                <div class=" d-none d-md-block">
                                {!! $slide->custom_html !!}
                    </div>
                            @endif
                        @if(!empty($slide->uri))
                            <div>
                                <a class="btn btn-dark rounded-0" href="{{$slide->uri}}">{{$slide->url}}</a>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

