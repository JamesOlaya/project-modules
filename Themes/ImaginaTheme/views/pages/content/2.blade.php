<div class="page" data-icontenttype="page" data-icontentid="2">

    @component('partials.widgets.breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
    @endcomponent
    
    <section class="iblock general-block12" data-blocksrc="general.block12">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12">
                    <div class="title-primary mb-5">
                        <h1 class="text-primary">{{$page->title}}</h1>
                    </div>
                </div>
                <div class="col-lg-11 mb-5">

                    <div class="page-body">

                        {!! $page->body !!}
                        
                    </div>
                </div>

            </div>
        </div>
    </section>

        @include('partials.offer')



</div>

















