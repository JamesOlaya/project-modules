<section class="iblock general-block19 mb-5" data-blocksrc="general.block19">
  <div class="container">
    <div class="row">
      <div class="col-12">
        
        <div class="title-arrow text-center mb-5">
          <h2 class="px-5 bg-white"><strong>MARCAS</strong></h2>
        </div>
        
        <div class="owl-carousel owl-theme owl-svg new-featured-product">
          @foreach($manufacturers as $manufacturer)
            <div wire:key="'featured-new-product-{{$manufacturer->id}}'">
              <div class="item">
                  <a href="{{$manufacturer->url}}">
                    <img title="{{$manufacturer->name}}" alt="{{$manufacturer->name}}" src="{{$manufacturer->mediaFiles()->mainimage->relativePath}}" class="img-fluid lazyload" >
                  </a>
              </div>
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
        margin: 20,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        responsiveClass: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
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
