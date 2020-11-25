<div class="top-content mb-5">

	@if(isset($category->mainimage->path) && !strpos($category->mainimage->path,'default.jpg'))
        <div  class="cover-img-16 mb-5" style="padding-bottom: 30.25%;">
            <img src="{{$category->mainimage->path}}" class="img-fluid">
        </div>
    @else
        @php
              $slugparent = '';
              	if(isset($category)){
	              if($category->parent_id==0){
	                    $slugparent = $category->slug;
	              }else{
	                  if($category->parent->parent_id == 0){
	                      $slugparent = $category->parent->slug;
	                  } else{
	                        $slugparent = $category->parent->parent->slug;
	                  }
	              }
	            }else{
	            	$slugparent = null;	
	            }

        @endphp
        @if(!empty($slugparent))
            {!!Slider::render($slugparent,'slider.store.slider')!!}
        @endif
    @endif
	
	@isset($category->title)
		<h3 class="title-category text-uppercase">{{$category->title}}</h3>
	@endif
	@isset($category->description)
	<p class="summary-category">
		{!!$category->description!!}
	</p>
	@endif
	
	<hr class="my-0">
	<div class="row align-items-center pt-3">
		
		{{-- Total Products --}}
		<div class="col pb-3">

			<div class="total-products">
				<strong>{{$totalProducts}}</strong>
				{{trans('icommerce::products.plural')}}
			</div>
			
		</div>

		{{-- Filter - Order By --}}
		<div class="col-auto pb-3">
			@includeFirst(['icommerce.filters.index.top-content.filter-orderby','icommerce::frontend.index.top-content.filter-orderby'])
		</div>

		{{-- Change Layout --}}
		<div class="col-auto pb-3">
			@includeFirst(['icommerce.index.top-content.change-layout','icommerce::frontend.index.top-content.change-layout']) 
		</div>
	</div>
	<hr class="my-0">
</div>