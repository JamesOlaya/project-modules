<div class="bg-warning mb-5">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Inicio</a></li>
                        {{ $slot }}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>