@foreach($slider->slides as $index => $slide)
    <div class="item">
        @if(!empty($slide->getLinkUrl()))
            <div class="cover-img-4-3 mb-5">
            	<img  src="{{$slide->getImageUrl()}}" class="img-fluid" alt="{{$slide->title}}">
            </div>

            <div class="text-center">
                <a href="{{$slide->getLinkUrl()}}" class="btn btn-warning rounded-pill py-2 px-4 font-weight-bold text-white" target="{{$slide->target}}">
                    {{$slide->uri}}  
                </a>
            </div>
        @else
            <div class="cover-img-4-3">
        	   <img  src="{{$slide->getImageUrl()}}" class="img-fluid" alt="{{$slide->title}}">
            </div>
        @endif
    </div>
@endforeach