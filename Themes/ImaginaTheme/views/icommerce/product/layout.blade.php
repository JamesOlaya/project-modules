<div class="product-layout card-product mb-4">
			
	@include('icommerce::frontend.product.meta')

	@include('icommerce::frontend.product.image')

	@includeFirst(['icommerce.product.infor','icommerce::frontend.product.infor'])

</div>