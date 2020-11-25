<li class="list-group-item">
	
	@php($children = $categories->where("parent_id",$category->id))

	@php($expanded = false)
	
	@php($slug = $category->slug)
	
	@php($categorySelected = $categoryBreadcrumb[count($categoryBreadcrumb)-1] ?? null)
	
	@php($isSelected = !empty($categorySelected) ? $categorySelected->id == $category->id ? true : false : false)
	
	@foreach($categoryBreadcrumb as $breadcrumb)
		@if($breadcrumb->id == $category->id)
			@php($expanded = true)
		@endif
	@endforeach
	
	{{--@php($newUrl = $category->url)--}}
	
	@php($newUrl = isset($manufacturer->id) ? $category->urlManufacturer($manufacturer) : $category->url)
	
	@if(count($children))
		<a class="item collapsed" data-toggle="{{$isSelected ? "collapse" : ""}}"
			 href="{{$newUrl}}"
		 aria-disabled="false"
			 role="button" aria-expanded="false"
			 aria-controls="{{$children? "multiCollapse-$slug" : ""}}">
			<h5 class="d-block cursor-pointer">
	        	<i class="fa angle font-weight-bold mr-1" ></i>
				@if($isSelected)
					<strong>
						{{$category->title}}
					</strong>
				@else
					{{$category->title}}
				@endif
	        </h5>
		</a>
		<div class="collapse multi-collapse mb-4 {{$expanded ? 'show' : ''}}" id="multiCollapse-{{$slug}}">
			<ul class="list-group list-group-flush">		
				@foreach($children as $category)
					@includeFirst(['icommerce.index.category-prueba','icommerce::frontend.index.category'])
				@endforeach
			</ul>
		</div>
	@else
		<a class="item" href="{{$newUrl}}">
			<h5 class="d-block cursor-pointer">
				@if($isSelected)
					<strong>
						{{$category->title}}
					</strong>
				@else
					{{$category->title}}
				@endif
	        </h5>
		</a>
	@endif
</li>