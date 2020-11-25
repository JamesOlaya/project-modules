@php
    $sucursales=get_places(['categories'=>[1],'take' => 20]);
@endphp


<div class="boletin pl-lg-5">
    <h4 class="text1 mb-0">
        Tu tienda más cercana
    </h4>
    <h5 class="text2 my-3">
        Si te encuentras en Ibagué, conoce tu tienda más cercana.
    </h5>
    <form id="tienda" method="post" action=" ">
        <div class="input-group">
            {{--
            <input type="text" class="form-control bg-transparent"
                   placeholder="Buscar sede" name="sede" required
                   aria-label="Buscar sede"> --}}
            <select class="form-control form-select bg-transparent">
                <option selected="" disabled="">Buscar sede</option>
                @if(count($sucursales)!=0)
                    @foreach($sucursales as $place)
                        <option value="">{{$place->title}}</option>
                    @endforeach
                @endif
            </select>
            <div class="input-group-append">
                <a href="{{url('/sucursales')}}" class="btn btn-primary px-3" type="submit">
                   <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </form>

    <div class="formerror"></div>
</div>
<div class="mt-4 pl-lg-5">
    <img src="/assets/media/iconos/mercado-libre.png" class="img-fluid" alt="Mercado Libre">
</div>
