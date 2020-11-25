<div class="page" data-icontenttype="page" data-icontentid="10">

    @component('partials.widgets.breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
    @endcomponent

    @php
        $sucursales=get_places(['categories'=>[1],'take' => 20]);
    @endphp

    @if(count($sucursales)!=0)
    <section class="iblock general-block111" data-blocksrc="general.block111">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <h1 class="text-1 text-primary">Tu tienda más cercana</h1>
                    <p class="text-2">Si te encuentras en Ibagué, conoce tu tienda más cercana.</p>
                    <div class="dropdown dropdown-sede mb-4">
                        <!-- input -->
                        <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                             role="button" class="input-group">

                            <div class="input-group">
                                <input id="title-sede" type="text" class="form-control bg-white" placeholder="-Selecciona una sede-"
                                       aria-label="-Selecciona una sede-" aria-describedby="button-sede1" disabled/>
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-3" type="submit" id="button-sede1">
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <!-- dropdaown -->
                        <div class="dropdown-menu w-100 p-3">
                            <div class="items">
                                -Selecciona una sede-
                            </div>
                            @if (count($sucursales))
                            <ul class="nav nav-tabs flex-column border-0" id="myTabSede" role="tablist">
                                @foreach($sucursales as $index => $place)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-0" id="{{$place->slug}}-tab" data-toggle="tab" href="#{{$place->slug}}" onclick="titlesede('{{$place->title}}');" role="tab" aria-controls="{{$place->slug}}" aria-selected="false">
                                        {{$place->title}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-5">

                    <div class="tab-content">


                        <div class="tab-content">
                        @foreach($sucursales as $index => $place)

                            <div class="tab-pane" id="{{$place->slug}}" data-info="{{$place->title}}" role="tabpanel" aria-labelledby="{{$place->slug}}-tab">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4 mb-5">

                                        <h2 class="text-3">{{$place->summary}}</h2>

                                        <div class="text-4">
                                            <p><strong>Dirección:</strong> {{$place->address}}</p>

                                            @if(isset($place->options->phone1) || isset($place->options->phone2) || isset($place->options->phone3))
                                                <p> <strong>Teléfonos:</strong>
                                                    <a class="text-dark" href="tel:{{$place->options->phone1??''}}">{{$place->options->phone1??''}}</a>
                                                    <a class="text-dark" href="tel:{{$place->options->phone2??''}}">{{$place->options->phone2??''}}</a>
                                                    <a class="text-dark" href="tel:{{$place->options->phone3??''}}">{{$place->options->phone3??''}}</a>
                                                </p>
                                            @endif
                                            @if(isset($place->options->email))
                                                <p><strong>Correo:</strong> {{$place->options->email}}</p>
                                            @endif
                                        </div>
                                        <div class="my-3">
                                        {!! $place->description !!}
                                        </div>
                                        @if(isset($place->options->mainimage))
                                        <div class="cover-img-4-3 mt-5">
                                            <img src="{{$place->options->mainimage}}"alt="{{$place->title}}">
                                        </div>
                                        @endif


                                    </div>

                                    <div class="col-lg-7 margin-map">
                                        <!--  Mapa de Google -->
                                        {{$place->address}}
{{--                                        @include('iplaces::frontend.partials.openMap')--}}
                                    </div>
                                </div>

                            </div>

                            @endforeach
                        </div>



                    </div>

                </div>

            </div>
        </div>
    </section>
    @endif

</div>


@section('scripts-owl')
    <script type="text/javascript">

        var URLhash = window.location.hash;
        if ( $(URLhash).length ) {
            var title = $(URLhash).attr('data-info');
            titlesede(title);
            $(URLhash).tab('show');
        }
        function titlesede(value) {
            $('#title-sede').val(value);
        }

    </script>
    @parent

@stop














