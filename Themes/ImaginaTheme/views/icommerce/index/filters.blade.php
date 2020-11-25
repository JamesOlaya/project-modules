<div class="filters">
	
	@livewire('icommerce::filter-categories',[
		"categoryBreadcrumb" => $categoryBreadcrumb,
		"manufacturer" => $manufacturer ?? null
		])

	<h4 class="title-filter text-primary mb-4 pb-2">FILTROS</h4>

	@livewire('icommerce::filter-range-prices')
	
	@if(!isset($manufacturer->id))
		@livewire('icommerce::filter-manufacturers')
	@endif

	
</div>