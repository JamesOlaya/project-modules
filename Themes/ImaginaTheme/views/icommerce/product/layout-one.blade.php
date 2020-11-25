<div class="product-layout product-layout-one mb-4">
			
	@include('icommerce::frontend.product.meta')

	<div class="row">

		<div class="col-12 col-sm-6">
			@include('icommerce::frontend.product.image')
		</div>

		<div class="col-12 col-sm-6 pl-sm-0">
			@includeFirst(['icommerce.product.infor','icommerce::frontend.product.infor'])
		</div>
		
	</div>
	
</div>