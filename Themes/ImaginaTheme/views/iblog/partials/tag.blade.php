@php

     $upartee= array();
     foreach($tags as $p) {
      array_push($upartee,$p);
     }
     $partess = array_chunk($upartee, 2);

@endphp

@if(!$tags->isEmpty())
    <div class="pestana pestana-small mb-4">
        <div class="bg-warning">Etiquetas</div>
    </div>
    <div class="tag-container">
        @foreach($partess as $p)
            <div class="row no-gutters">
                @foreach($p as $index => $tag)
                <div class=" {{$index==0 ? 'col-auto' : 'col' }}" >
                    <a class="tag" href="{{$tag->url}}" rel="tag">{{$tag->name}}</a>
                </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endif
