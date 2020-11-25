<section class="iblock general-block12 py-5" data-blocksrc="general.block12">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <div class="title-arrow text-center mb-5">
          <h2 class="px-5 bg-white"><strong>NUEVOS</strong> PRODUCTOS</h2>
        </div>

        <div class="owl-carousel owl-theme owl-svg new-featured-product">
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
      var owl = $('.new-featured-product');

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

<style>
  #ribbonFeatured {
    width: max-content;
    position: absolute;
    z-index: 3;
    top: 5px;
    right: 0;
  }
  #ribbonFeatured #asideRibbon{
    position: relative;
    cursor: pointer;
    padding: 8px 10px 8px 6px;
    background-color: #ecc008;
    line-height: 1.1;
  }
  #ribbonFeatured #asideRibbon::after{
    content: '';
    position: absolute;
    height: 0;
    width: 0;
    top: 0;
    border-style: solid;
    border-width: 22px 22px 22px 0;
    border-color: transparent #ecc008;
    left: -22px;
  }
  #ribbonFeatured #asideRibbon .labelAsideRibbon{
    font-size: 10px;
  }
</style>
