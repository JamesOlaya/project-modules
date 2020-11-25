@php
    $categories=get_categories(['parent' => [$id]]);
@endphp

@if(!$categories->isEmpty())
    <div class="pestana pestana-small mb-4">
        <div class="bg-warning">Categorías</div>
    </div>
    <ul class="list-group list-category list-group-flush mb-4">
        @foreach($categories as $index=>$cat)
            <li class="list-group-item">
                <a href="{{url($cat->slug)}}">• {{$cat->title}}</a>
            </li>
        @endforeach
    </ul>
@endif