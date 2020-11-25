<div class="page" data-icontenttype="page" data-icontentid="5">

    @component('partials.widgets.breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
    @endcomponent

    <section class="iblock general-block15" data-blocksrc="general.block15">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="title-primary mb-5">
                        <h1 class="text-primary">{{$page->title}}</h1>
                    </div>
                </div>
                <div class="col-lg-11 mb-5">


                    @php
$sucursales=get_places(['categories'=>[1],'take' => 20]);
@endphp

@if(count($sucursales)!=0)
    @foreach($sucursales as $place)
         {{$place->title}} * 
    @endforeach
@endif


<form id="tienda" method="post" action=" ">
        <div class="input-group">

            
<select   class="form-control bg-transparent" style=" appearance:none;">
   
<option selected="" disabled="">Buscar sede</option>


  @foreach($sucursales as $place)
     <option value="">{{$place->title}}</option>      
    @endforeach
</select>
            <div class="input-group-append">
                <button class="btn btn-primary  px-3 " type="submit">
                   <i class="fa fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </form>
                       




                    <div class="page-body">
                        {!! $page->body !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>














