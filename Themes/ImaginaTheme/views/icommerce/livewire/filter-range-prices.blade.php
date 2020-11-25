<div class="filter-range-prices mb-4" >


	<a data-toggle="collapse" href="#collapseRangePrices" role="button" aria-expanded="true" aria-controls="collapseRangePrices">
		<div class="d-flex justify-content-between align-items-center">
  			<h5 class="title-filter border-0 pb-3">Precio {{-- trans('icommerce::common.range.title') --}}</h5>
  	
  		</div>
	</a>

	
	<div class="content position-relative">

		@include('icommerce::frontend.partials.preloader')

		<div class="collapse show" id="collapseRangePrices">

			<input type="hidden" id="priceMin" name="priceMin" wire:model="priceMin">
			<input type="hidden" id="priceMax" name="priceMax" wire:model="priceMax">

			<input type="hidden" id="selPriceMin" name="selPriceMin" wire:model="selPriceMin">
			<input type="hidden" id="selPriceMax" name="selPriceMax" wire:model="selPriceMax">
			
			<div class="mx-2">
				<div id="slider-range" wire:ignore></div>
			</div>
			<input type="text" id="amount" class="amount border-0 mt-2" readonly>

			<button onClick="window.livewire.emit('updateRange',{'selPriceMin' : document.getElementById('selPriceMin').value,'selPriceMax' : document.getElementById('selPriceMax').value})" id="btnUpdatePrices" class="btn btn-outline-primary btn-sm btn-block mt-3">
				{{trans('icommerce::common.button.update')}}
			</button>

		</div>
	</div>

</div>


@push('css-stack')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush


@section('scripts')
@parent

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>
	jQuery(document).ready(function($) {

		console.warn("Componente: Filter Range Prices - Start")
		/*
		* Create Slider Range Price
		*/
		function createSlider(newPriceMin,newPriceMax,selNewPriceMin,selNewPriceMax,step){

			// Testing
			//console.warn(newPriceMin,newPriceMax,selNewPriceMin,selNewPriceMax,step)

			$( "#slider-range" ).slider({
		      	range: true,
		      	min: newPriceMin,
		      	max: newPriceMax,
		      	step: step,
		      	values: [selNewPriceMin, selNewPriceMax],
		      	slide: function( event, ui ) {
		        	$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );

		        	$( "#selPriceMin" ).val(ui.values[ 0 ]);
		        	$( "#selPriceMax" ).val(ui.values[ 1 ]);
		      	}
		    });

		    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
	      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
			
		}

		/*
		* First Time
		*/
		var defPriceMin = {{$priceMin}};
		var defPriceMax = {{$priceMax}};

		createSlider(defPriceMin,defPriceMax,0,1,1000)
		

	    /*
		* Listener Filter Prices Update
		*/
		window.addEventListener('filter-prices-updated', event => {

			console.warn("Componente: Filter Range Prices - Listener - filter-prices-updated");

			$("#slider-range").slider("destroy");
    		createSlider(event.detail.newPriceMin,event.detail.newPriceMax,event.detail.newSelPriceMin,event.detail.newSelPriceMax,event.detail.step)

		})

	});
	</script>

@stop