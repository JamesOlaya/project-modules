@includeFirst(['icommerce.partials.variables','icommerce::frontend.partials.variables'])

<div id="content_carting" class="dropdown">
  <a class="nav-link" type="button"
          id="dropdownCart" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">

    <div class="cart d-inline-block">
      <span class="quantity bg-warning text-dark">@{{ quantity }}</span>
        <svg class="cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.72 21.97"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="cls-1" d="M22.66,12.93l2-8.93a1,1,0,0,0-1-1.25H6.83L6.44.82a1,1,0,0,0-1-.82H1A1,1,0,0,0,0,1v.69a1,1,0,0,0,1,1H4L7,17.48a2.4,2.4,0,1,0,2.88.37h9a2.41,2.41,0,1,0,2.73-.45l.24-1a1,1,0,0,0-1-1.26H9.36l-.28-1.37H21.66A1,1,0,0,0,22.66,12.93Z"/></g></g></svg>
    </div>
  </a>



<!--Shopping cart-->
<div class="cart-dropdown-menu " aria-labelledby="dropdownCart" style="z-index: 99999;">
<!--Shopping cart dropdown -->
<div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="dropdownCart"
     style="  min-width: 20rem; z-index: 9999999">
  <!-- titulo -->
  <h4 class="dropdown-header mb-0 font-weight-bold text-center" v-if="articles.length>0">
    {{trans('icommerce::cart.articles.cart')}} (@{{articles.length}})
    <i class="fa fa-trash text-muted float-right" title="Vaciar carrito" v-on:click="clear_cart()"></i>
  </h4>
  <h5 class="dropdown-header mb-0 font-weight-bold text-center" v-else>
    {{trans('icommerce::cart.articles.empty_cart')}}
  </h5>

  <!-- articulos en el carrito -->
  <div class="item_carting px-3 w-100 row m-0" v-for="(item,indexArt) in articles.slice(0, 4)"
       v-if="articles.length>0">
    <hr class="mt-0 mb-3 w-100">

    <!-- imagen -->
    <div class="col-3 px-0 mb-3">
      <div style="height: 80px; width: 100%;background-size: contain;  background-repeat: no-repeat;  background-position: center;"
           class="img_product_carting mr-3 border"
           v-bind:style="{ backgroundImage: 'url('+item.mainImage.path+')'}" v-on:click="location(item.url)"
           style="cursor: pointer;">
      </div>
    </div>
    <!-- descripción -->
    <div class="col-9">

      <!-- titulo -->
      <h6 class="mb-2 w-100 __title">
        <a v-bind:href="item.url">
          @{{ item.name }} <label v-if="item.productOptionValues.length>0">(@{{(item.productOptionValues[0].optionValue)}})</label>
        </a>
      </h6>
      <!-- valor y cantidad -->
      <p class="mb-0 text-muted pb-2" style="font-size: 13px">
        {{trans('icommerce::cart.table.quantity')}}: @{{ item.quantity }} <br>
        {{trans('icommerce::cart.table.price_per_unit')}}: @{{ currencySymbolLeft + ''}} @{{item.priceUnit | numberFormat}} @{{'' +currencySymbolRight }}
      </p>

      <!-- boton para eliminar-->
      <div style="width: 20px;  position: absolute; right: -7px; top: 0;">
        <a class="close cart-remove text-danger" style="font-size: 1rem;" v-on:click="delete_item(item.id)" title="quitar producto">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>


  </div>

  <!-- FOOTER CARTING -->
  <div class="dropdown-footer text-center" v-if="articles">
    <hr class="mt-1 mb-3">
    <!-- total -->
    <h6 class="font-weight-bold">
      {{trans('icommerce::cart.table.total')}}
      <span class="text-primary">
         @{{ currencySymbolLeft + ''}} @{{total | numberFormat}} @{{'' +currencySymbolRight }}
  </span>
    </h6>
    <!-- botones-->
    <a href="{{ url('checkout') }}" tabindex="-1" class="btn btn-warning btn-sm mx-1 text-white">
      {{trans('icommerce::cart.button.view_cart')}}
    </a>


</div>
</div>




</div>
</div>

@section('scripts-owl')

<script>
  var vue_carting = new Vue({

      el: '#content_carting',
      mounted: function () {
          this.$nextTick(function () {
              this.getCart();
          });
      },
      data: {
          articles: [],
          total: 0,
          cart: null,
          quantity: 0,
          currencySymbolLeft: icommerce.currencySymbolLeft,
          currencySymbolRight: icommerce.currencySymbolRight,
      },
      filters: {
          numberFormat: function (value) {
            return new Intl.NumberFormat('de-DE').format(value);
              // return parseFloat(value).toFixed(0).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
          }
      },
      methods: {
          getCart() {
              var cart_id = localStorage.getItem("cart_id");
              if (cart_id) {
                  axios.get("{{url('/')}}" + "/api/icommerce/v3/carts/" + cart_id)
                      .then(function (response) {
                          vue_carting.cart = response.data.data;
                          vue_carting.articles = vue_carting.cart.products;
                          vue_carting.quantity = vue_carting.cart.quantity;
                          vue_carting.total = vue_carting.cart.total;
                          if (!vue_carting.quantity)
                              vue_carting.quantity = 0;
                          if (!vue_carting.total)
                              vue_carting.total = 0;
  
                       
                      })
                      .catch(function (error) {
                          localStorage.clear();
                      });
              } else {
                  this.createCart();
              }
          },
          createCart() {
              var id = 0;
              axios.post("{{url('/')}}" + "/api/icommerce/v3/carts", {
                  attributes: {
                      total: 0
                  }
              }).then(response => {
                  id = response.data.data.id;
                  console.warn("CREATEA CART",response,id)
                  localStorage.setItem("cart_id", id);
                  this.getCart();
              })
                  .catch(function (error) {
                      console.log(error);
                  });
              return id;
          },
          clear_cart() {
              if (this.articles.length > 0) {
                  for (var i = 0; i < this.articles.length; i++) {
                      axios.delete("{{url('/')}}" + "/api/icommerce/v3/cart-products/" + this.articles[i].id)
                          .then(response => {
                              console.log(response.data);
                          }).catch(function (error) {
                          console.log(error);
                      });
                  }//for articles
                  this.getCart();
                  toastr.success("Productos del carrito eliminados correctamente.");
              }//if articles length >0
          },
          addItemCart(productId, productName, price, quantity = 1, productOptValue = []) {
              var cart_id = localStorage.getItem("cart_id");
              if (!cart_id) {
                  vue_carting.createCart();
                  cart_id = localStorage.getItem("cart_id");
              }
              axios.post("{{url('/')}}" + "/api/icommerce/v3/cart-products", {
                  attributes: {
                      cart_id: cart_id,
                      product_id: productId,
                      product_name: productName,
                      price: price,
                      quantity: quantity,
                      product_option_values: productOptValue
                  }
              })
                  .then(function (response) {
                      toastr.success("Producto agregado al carrito exitosamente.");
                      vue_carting.getCart();
                      return true;
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
              return false;
          },
          delete_item(item_id) {
              axios.delete("{{url('/')}}" + "/api/icommerce/v3/cart-products/" + item_id)
                  .then(response => {
                      this.getCart();
                      return true;
                  }).catch(function (error) {
                  console.log(error);
              });
              return false;
          },


          location: function (url) {
              window.location = url;
          }
      }
  });
</script>

@parent
@stop
