<section class="iblock general-block12 py-5" data-blocksrc="general.block12">
  <div class="container">
    <div class="row">
      <div class="col-12">
        
        <div class="title-arrow mb-5">
          <h2 class="pr-5 bg-white"><strong>NOMBRE DE CATEGORIA</strong></h2>
        </div>
        
        <div class="owl-carousel owl-theme owl-svg featuredProduct">
          @foreach($products as $product)
            <div wire:key="'featured-new-product-{{$product->id}}'">
              @includeFirst(['icommerce.product.layout','icommerce::frontend.product.layout'])
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>


@section('scripts-owl')
  <script>
    $(document).ready(function(){
      var owl = $('.featuredProduct');
      
      owl.owlCarousel({
        margin: 10,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        responsiveClass: true,
        navText: ['<div class="prev-icon"></div>', '<div class="next-icon"></div>'],
        nav:true,
        responsive: {
          0: {
            items: 1
          },
          640: {
            items: 2
          },
          992: {
            items: 4
          }
        }
      });
      
    });
  </script>
  
  @parent

@stop
