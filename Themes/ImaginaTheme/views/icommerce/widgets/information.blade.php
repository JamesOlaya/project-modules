<div>

  <div class="position-relative">
    @if(false && $product->quantity<=0)
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
  </div>

  <!-- CATEGORY -->
  <div class="category text-uppercase" v-if="product.category">
    @{{product.category.title}}
    {{-- <span v-if="product.categories.lenght" v-for="item in product.categories">/@{{item.title}}</span> --}}
  </div>
  <!-- END CATEGORIES -->
  <!-- TITLE -->
  <h2 class="name">@{{product.name}}</h2>
  <!-- END TITLE -->

  <div class="options">@{{product.summary}}</div>

  <!-- PRICE -->
  <div class="price my-4" v-if="products_children === false && product.price >0.00">
      <div class="mb-0" v-if="product.discount">
        <span class="text-primary font-weight-bold">{{isset($currency) ? $currency->symbol_left : '$'}}@{{ product.discount.price | numberFormat  }}</span>

        <br><span class="price-desc pl-3">Antes: <del>{{isset($currency) ? $currency->symbol_left : '$'}}{{ formatMoney($product->price) }}</del></span>
      </div>
      <p class="mb-0 text-primary font-weight-bold" v-else>{{isset($currency) ? $currency->symbol_left : '$'}}@{{product.formattedPrice}}</p>
  </div>
  <!-- END PRICE -->
  <!-- OPCIONES DE PRODUCTO -->
  <select-product-options v-model="productOptionsSelected" v-bind:options="productOptions"></select-product-options>

  <div class=" align-items-center mb-4" v-if="product.pdf">
    <a v-bind:href="product.pdf"
       class="btn btn-outline-light text-dark">
      <i class=""> </i>
      {{trans('icommerce::products.messages.product_brochure')}}
    </a>
  </div>

  <div class="add-cart" v-if="product.quantity > 0 && product.stockStatus">
    <hr>
    <div class="row align-items-center">
      <!-- BUTTON QUANTITY -->
      <div class="col col-md-4">
        <div class="input-group my-2 my-md-0">
          <div class="input-group-prepend">
            <button class="btn btn-outline-light font-weight-bold " field="quantity" type="button"
                    v-on:click="quantity >= 2 ? quantity-- : false">
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </button>
          </div>
          <input type="text" class="form-control text-center quantity bg-white"
                 name="quantity" v-model="quantity" readonly>
          <div class="input-group-append">
            <button class="btn btn-outline-light font-weight-bold" field="quantity" type="button"
                    v-on:click="quantity < product.quantity ? quantity++ : false">
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="col-auto my-2 my-md-0">
        <!-- BUTTON ADD -->
        <div v-if="product.price!='0.00'">
          <a v-on:click="addCart(product)" class="btn-comprar btn btn-primary text-white">
            <div class="d-inline-block mr-2">
              <svg class="cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.72 21.97">
                <g id="Capa_2" data-name="Capa 2">
                  <g id="Capa_1-2" data-name="Capa 1">
                    <path class="cls-1" d="M22.66,12.93l2-8.93a1,1,0,0,0-1-1.25H6.83L6.44.82a1,1,0,0,0-1-.82H1A1,1,0,0,0,0,1v.69a1,1,0,0,0,1,1H4L7,17.48a2.4,2.4,0,1,0,2.88.37h9a2.41,2.41,0,1,0,2.73-.45l.24-1a1,1,0,0,0-1-1.26H9.36l-.28-1.37H21.66A1,1,0,0,0,22.66,12.93Z"></path>
                  </g>
                </g>
              </svg>

            </div>
            AGREGAR
          </a>
        </div>
        <!-- BUTTON CONSULT -->
        <div  v-else>
          <a href="{{url('/contacto')}}" class=" btn-comprar btn btn-secondary text-white">CONSULTAR</a>
        </div>
      </div>
      <div class="col-auto my-2 my-md-0">
        <a onClick="window.livewire.emit('addToWishList',{{$product->id}})" class="btn btn-heart rounded-0 py-2 d-flex">
          <svg class="heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.83 16.48"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="cls-1" d="M17,1.13a5,5,0,0,0-6.87.5l-.72.74-.73-.74a5,5,0,0,0-6.86-.5,5.28,5.28,0,0,0-.37,7.64l7.12,7.35a1.15,1.15,0,0,0,1.67,0l7.12-7.35A5.27,5.27,0,0,0,17,1.13Z"/></g></g></svg>
        </a>
      </div>
    </div>
    <hr class="mb-4">
  </div>

  <div v-else>

    <p class="label d-inline-block px-3 py-2 mb-0">Producto Agotado </p>
    @include('icommerce.widgets.suscription')

    <hr  class="mb-4">
  </div>

</div>
