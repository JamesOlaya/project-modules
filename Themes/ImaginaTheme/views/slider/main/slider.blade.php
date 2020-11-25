<div id="{{$slider->system_name}}" class="carousel slide container" data-ride="carousel">
    <div class="carousel-inner">
        @include('slider.main.slides', ['slider' => $slider])
    </div>
    @include('slider.main.indicators', ['slider' => $slider])
</div>
