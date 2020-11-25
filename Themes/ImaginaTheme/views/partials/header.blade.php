
<header>

    <div class="header-top">
        <div class="container-xl">
            <div class="row justify-content-center align-items-center">
                <div class="col-auto d-block d-lg-none px-1 px-sm-3">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link link-movil cursor-pointer" data-toggle="modal" data-target="#menuModal">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                
                  @livewire("icommerce::category-index",["params" => ["view" => "icommerce::frontend.livewire.header.nav-categories-mega-menu", "page" => 0, "toTree" => true, "filter"=> ["showMenu" => true],"include"=> ["children"], "take" => 0, "type" => "dropdown-menu"]],key("categories-mega-menu-index"))
            
                <div class="col-auto d-none d-md-block">
                    <div class="logo">
                        <a href="{{ URL::to('/') }}">
                            <img src="@setting('isite::logo1')" class="img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col px-1 px-sm-3">
                    @includeFirst(['icommerce.widgets.searcher', 'icommerce::frontend.widgets.searcher'])
                </div>
                <div class="col-auto px-1 px-sm-3">

                    <ul class="nav nav-header justify-content-center">
                        <li class="nav-item d-none d-lg-block">
                            <div class="nav-link">
                                @include('partials.social')
                            </div>
                        </li>
                        <li class="nav-item d-none d-sm-block">
                            @includeFirst(['iprofile.widgets.logged','iprofile::frontend.widgets.logged'])
                        </li>
                        <li class="nav-item  d-none d-lg-block">
                            <a class="nav-link cursor-pointer dropdown-toggle" role="button" data-toggle="modal" data-target="#modalDistribuidor">
                                <i class="fa fa-user mr-1"></i> DISTRIBUIDOR
                            </a>
                        </li>
                        <li class="nav-item">
                          @livewire("icommerce::cart")
                        </li>
                        
                        <li class="nav-item d-none d-sm-block">
                            @livewire("icommerce::wishlist")
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include('partials.widgets.modal-distribuidor')

    <div class="position-fixed d-none d-md-block" style="right: 0;z-index: 99; top: 20%;" >
        <a href="https://api.whatsapp.com/send?phone=573138546796" target="_blank"><img src="/assets/media/paginas/whatapps.png" class="img-fluid" alt="whatapps"></a>
    </div>
</header>
