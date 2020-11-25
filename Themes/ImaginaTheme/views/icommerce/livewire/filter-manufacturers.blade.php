<div class="filter-manufacturers mb-4">
	@if($manufacturers && count($manufacturers)>0)
	<div class="title">
		<a data-toggle="collapse" href="#collapseManufacturers" role="button" aria-expanded="true" aria-controls="collapseManufacturers">
	  		<div class="d-flex justify-content-between align-items-center">
	  			@php($titleFilter = config("asgard.icommerce.config.filters.manufacturers.title"))
	  			<h5 class="title-filter border-0 pb-3">{{ trans($titleFilter) }}</h5>
	  		</div>
  		</a>
	</div>
	
	<div class="content position-relative">

		@include('icommerce::frontend.partials.preloader')

		<div class="collapse show" id="collapseManufacturers">

	  		<div class="list-manufacturers ml-2">

	  			@if($manufacturers && count($manufacturers)>0)
		  			@foreach($manufacturers as $manufacturer)
		  			<div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input"value="{{$manufacturer->id}}" name="manufacturers[]" id="manufacturer{{$manufacturer->id}}"  wire:model="selectedManufacturers.{{$manufacturer->id}}">
                        <label class="custom-control-label" for="manufacturer{{$manufacturer->id}}">{{$manufacturer->name}}</label>
                      </div>
					@endforeach
				@endif

	  		</div>

		</div>
	</div>
	@endif
  	
</div>