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

	<section class="iblock general-block111" data-blocksrc="general.block111">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-4">
					<h1 class="text-1 text-primary">Tu tienda más cercana</h1>
                    <p class="text-2">Si te encuentras en Ibagué, conoce tu tienda más cercana.</p>
					<div class="dropdown dropdown-sede mb-4">
	                    <!-- input -->
	                    <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
	                         role="button" class="input-group dropdown-toggle">

	                        <div class="input-group">
	                            <input id="title-sede" type="text" class="form-control bg-white" placeholder="-Selecciona una sede-" 
	                                   aria-label="-Selecciona una sede-" aria-describedby="button-sede1" disabled/>
	                            <div class="input-group-append">
	                                <button class="btn btn-primary px-3" type="submit" id="button-sede1">
	                                    <i class="fa fa-caret-down"></i>
	                                </button>
	                            </div>
	                        </div>

	                    </div>

	                    <!-- dropdaown -->
	                    <div class="dropdown-menu w-100 p-3">
	                        <div class="items">
	                            -Selecciona una sede-
	                        </div>
	                        @if (count($posts))
	                        <ul class="nav nav-tabs flex-column" id="myTabSede" role="tablist">
	                        	@foreach($posts->reverse() as $index => $post)
								<li class="nav-item" role="presentation">
							    	<a class="nav-link px-0" id="{{$post->slug}}-tab" data-toggle="tab" href="#{{$post->slug}}" onclick="titlesede('{{$post->title}}');" role="tab" aria-controls="{{$post->slug}}" aria-selected="false">
							    		{{$post->title}}
							    	</a>
							  	</li>
							  	@endforeach
							</ul>
							@endif
	                    </div>
                	</div>
				</div>

				<div class="col-12 mb-5">

					<div class="tab-content">

						@if (count($posts))
	                        <div class="tab-content">
	                        @foreach($posts->reverse() as $index => $post)

  								<div class="tab-pane" id="{{$post->slug}}" data-info="{{$post->title}}" role="tabpanel" aria-labelledby="{{$post->slug}}-tab">
									<div class="row justify-content-between">
    									<div class="col-lg-4 mb-5">

    										<h2 class="text-3">{{$post->summary}}</h2>

						                    {!! $post->description !!}

						                    <div class="cover-img-4-3 mt-5">
                                            <img src="{{$post->mainimage->path}}"
                                                 alt="{{$post->title}}">
                                        	</div>   

    									</div>

    									<div class="col-lg-7 margin-map">
      
      										@include('partials.map')

    									</div>
									</div>

  								</div>

							  	@endforeach
							</div>
						@endif


					</div>

				</div>	

			</div>
		</div>
	</section>

</div>
@stop

@section('scripts-owl')
    <script type="text/javascript">

		var URLhash = window.location.hash;
		if ( $(URLhash).length ) {
			var title = $(URLhash).attr('data-info');
			titlesede(title);
			$(URLhash).tab('show');
		} 
    	function titlesede(value) {
      		$('#title-sede').val(value);
    	}

    </script>
    @parent

@stop

