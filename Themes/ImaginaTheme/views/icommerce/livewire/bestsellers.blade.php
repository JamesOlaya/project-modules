<section id="bestsellers-livewire" class="iblock general-block300 pb-5" data-blocksrc="general.block300">
  <div class="container">
    <div class="row">
      <div class="col-12">
        
        <div class="title-arrow mb-5">
          <h2 class="pr-5 bg-white">TOP <strong>MÁS VENDIDOS</strong></h2>
          <p>Livewire</p>
        </div>
        
        
        <div class="row">
          @foreach($products as $product)
            <div class="col-12 col-md-6 col-lg-3" wire:key="best-seller-product-{{$product->id}}">
              <div class="card-product-mini mb-4">
                <div class="row no-gutters align-items-center ">
                  <div class="col-5">
                    <a href="{{$product->url}}">
                      <img class="card-img p-1" title="{{$product->name}}" alt="{{$product->name}}"
                           src="{{$product->mainImage->path}}">
                    </a>
                  </div>
                  <div class="col-7">
                    <div class="card-body p-1 text-truncate">
                      <div class="category">
                        <a href="{{$product->category->url}}" title="{{$product->category->title }}"  class="cursor-pointer">
                        {{$product->category->title}}
                        </a>
                      </div>
                      
                      <a href="{{$product->url}}" title="{{$product->name}}" class="name cursor-pointer">
                        {{$product->name}}
                      </a>
                      
                      <div class="price mt-3">
                        <i class="fa fa-shopping-cart icon"></i>
                        {{ formatMoney($product->price) }}
                      </div>
                      <a class="cart-no">&nbsp;</a>
                      @if($product->price != 0.00)
                        <a onClick="window.livewire.emit('addToCart',{{$product->id}})"
                           class="cart text-primary cursor-pointer">
                          Añadir al carrito
                        </a>
                      @else
                        <a href="/contacto" v-else class="cart text-primary cursor-pointer">
                          Contacta con nosotros
                        </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
      
      </div>
    </div>
  </div>
</section>


