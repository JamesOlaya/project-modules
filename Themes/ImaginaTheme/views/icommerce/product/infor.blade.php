
@if($product->quantity<=0)
	<div class="not">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 79.68 79.09"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><polygon class="cls-1" points="0 0 38.17 0 79.68 41.3 79.68 79.09 0 0"/><text class="cls-2" transform="translate(23.98 12.81) rotate(44.48)">A<tspan class="cls-3" x="8.62" y="0">G</tspan><tspan class="cls-4" x="17.67" y="0">O</tspan><tspan class="cls-5" x="26.63" y="0">T</tspan><tspan class="cls-6" x="34.16" y="0">ADO</tspan></text></g></g></svg>
	</div>
@else

	@if(false && isset($product->discount))
		@if($product->discount->criteria=='percentage')
		<div class="desc">
			<strong>{{$product->discount->discount}}%</strong><br>DTO.
		</div>
		@endif
	@endif
@endif

{{-- Falta saber cuando un producto es nuevo
<div class="new">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 79.68 79.09"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><polygon class="cls-1" points="0 0 79.68 0 79.68 79.09 0 0"/><text class="cls-2" transform="translate(38.2 9.9) rotate(44.48)">NUE<tspan class="cls-3" x="26.97" y="0">V</tspan><tspan x="36.04" y="0">O</tspan></text><text class="cls-4" transform="translate(20.11 10.94) rotate(44.48)">PRODU<tspan class="cls-5" x="43.16" y="0">C</tspan><tspan class="cls-6" x="51.66" y="0">T</tspan><tspan class="cls-7" x="59.49" y="0">O</tspan></text></g></g></svg>
</div>
--}}

<div class="mt-3 pb-3 {{(isset($mainLayout) && $mainLayout=='one') ? '': 'text-center'}} ">
    <div class="category {{isset($mainLayout) && $mainLayout=='one' ? 'mb-2': 'mb-3'}}">
        {{$product->category->title}}
    </div>

    <div class="name {{(isset($mainLayout) && $mainLayout=='one') ? 'font-weight-bold mb-2': 'mb-3'}}">
        <a href="{{$product->url}}" class="name cursor-pointer">
            {{$product->name}}
        </a>
    </div>

    @if(isset($mainLayout) && $mainLayout=='one')
		<div class="summary mb-2">
			{{$product->summary}}
		</div>
	@endif

    @if(isset($product->discount))
		<div class="price">
			<i class="fa fa-shopping-cart icon"></i>
			{{isset($currency) ? $currency->symbol_left : '$'}}{{formatMoney($product->discount->price ?? $product->price)}}
		</div>
		<div class="cart-no"><del>Antes: {{isset($currency) ? $currency->symbol_left : '$'}}{{ formatMoney($product->price) }}</del></div>
	@else
		<div class="price">
	        <i class="fa fa-shopping-cart icon"></i>
	        {{isset($currency) ? $currency->symbol_left : '$'}}{{formatMoney($product->discount->price ?? $product->price)}}
    	</div>
    	<div class="cart-no">&nbsp;</div>
	@endif

    @if($product->price>0)
	    <a onClick="window.livewire.emit('addToCart',{{$product->id}})" class="cart text-primary cursor-pointer">
	        Añadir al carrito
	    </a>
    @else
	    <a href="{{ URL::to('/contacto') }}"  class="cart text-primary cursor-pointer">
	        Contacta con nosotros
	    </a>
    @endif
</div>
