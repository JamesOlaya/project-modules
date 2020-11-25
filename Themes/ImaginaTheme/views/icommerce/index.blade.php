@extends('icommerce::structure.livewire-index')

{{-- Meta --}}
@includeFirst(['icommerce.index.meta','icommerce::frontend.index.meta'])


@section('content')

<div id="content_index_commerce" class="page icommerce icommerce-index {{isset($category->id) ? 'icommerce-index-'.$category->id : ''}}">


    {{-- Breadcrumb --}}
    @include('icommerce::frontend.partials.breadcrumb')

    <div class="container">
        <div class="row">

            {{-- Filters --}}
            <div class="col-lg-3 mb-5 order-2 order-lg-1">

              @if(isset($manufacturer->id))

                <h1 class="text-category text-primary text-uppercase mb-4">{{$category->title ?? setting('icommerce::customIndexTitle',null,trans('icommerce::products.title.products'))}} {{isset($manufacturer->id) ? "/ $manufacturer->name" : ""}}</h1>

                <div class="card-autor-mini card mb-4 border-0 text-center ml-3">
                  @if(isset($manufacturer) && isset($manufacturer->mediaFiles()->tertiaryimage->path))
                    <div class="img-circle border rounded-circle mx-auto my-4  lazyload" style="background-image: url('{{$manufacturer->mediaFiles()->tertiaryimage->path}}');
                      background-size: cover;background-repeat: no-repeat;height: 128px;width: 128px;"></div>

                  @endif
                  @if(isset( $manufacturer->options->secondarydescription))
                    <div class="card-body">
                      <div class="summary">
                        {!! $manufacturer->options->secondarydescription !!}
                      </div>
                    </div>
                  @endif
                </div>
              @else


                <h1 class="text-category text-primary text-uppercase mb-4">
                  {{$category->title ?? setting('icommerce::customIndexTitle',null,trans('icommerce::products.title.products'))}} {{isset($manufacturer->id) ? isset($category->id) ? "/ $manufacturer->name" : $manufacturer->name : ""}}
                </h1>

              @endif

               @includeFirst(['icommerce.index.filters',
               'icommerce::frontend.index.filters'],["categoryBreadcrumb" => $categoryBreadcrumb])
           </div>

           {{-- Top Content , Products, Pagination --}}
            <div class="col-lg-9 mb-5 order-1 order-lg-2">

                @livewire('icommerce::products-list',["category" => $category ?? null,"manufacturer" => $manufacturer ?? null])

            </div>

        </div>
    </div>

</div>

@stop

{{-- VUEJS SCRIPTS--}}
@includeFirst(['icommerce.index.scripts','icommerce::frontend.index.scripts'])
