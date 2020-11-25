<div class="home" data-icontenttype="page" data-icontentid="1">


    <section class="iblock general-block11 container-fluid p-0" data-blocksrc="general.block11">
        {!!Slider::render('principal','slider.main.slider')!!}
    </section>

    @livewire("icommerce::product-index",["params" => [ "view" => "icommerce.livewire.new-featured","take" => 20, "order" => (object)["field" => "created_at", "way" => "desc"]]],key("new-products"))

    {{--
        @include('icommerce.widgets.product-new')
        @livewire("icommerce::category-index")
        @include('icommerce.widgets.categories-img')
    --}}

    @include('partials.offer')

    @php($customFeaturedCategoriesHome = json_decode(setting('icustom::custom-featured-categories-home',null,"[]")))
    @if($customFeaturedCategoriesHome)
        @livewire("icommerce::category-index",["params" => ["view" => "icommerce.livewire.categories-featured-index","filter" => ["ids" => $customFeaturedCategoriesHome] ]],key("categories-featured-index"))
    @endif
    {{--

    @livewire("icommerce::product-index",["params" => [ "view" => "icommerce.livewire.bestsellers", "take" => 8, "filter" => ["bestsellers" => 1]]], key("best-seller-products"))
    @include('icommerce.widgets.bestsellers')
    @include('icommerce.widgets.destacados')

    --}}
    
    <section class="iblock general-block16 mb-4" data-blocksrc="general.block16">
        <div class="container">
            <div class="row justify-content-center pt-5">
                <div class="col-md-6 mb-5">
                    @include('partials.widgets.banner-horizontal', array('name'=>'home1'))
                </div>
                <div class="col-md-6 mb-5">
                    @include('partials.widgets.banner-horizontal', array('name'=>'home2'))
                </div>
            </div>
        </div>
    </section>

    
    @include('partials.blog')
    


</div>














