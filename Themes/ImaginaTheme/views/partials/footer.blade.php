@include('partials.subcription-tienda')
@livewire("icommerce::manufacturer-index")
<footer>
    <div class="footer-top pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-4 mb-5">
                            <h3 class="font-weight-bold">EMPRESA</h3>
                            @menu('footer-menu-1')
                        </div>
                        <div class="col-auto mb-5">
                            <h3 class="font-weight-bold">APOYO AL CLIENTE</h3>
                            @menu('footer-menu-2')
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <h3 class="font-weight-bold">CONTACTO</h3>
                    <div class="mb-2 font-weight-bold">Sede Principal:</div> 
                    <div class="text-1 mb-2">Calle 17 #3-89 Centro Local 103, Ibagué - Tolima</div>
                    <div class="text-1 mb-2">Tel: <a href="tel:82638082">(8) 2638082</a> - Cel: <a href="tel:3173157740">317 3157740</a> </div>
                    <div class="text-break text-1"><a href="mailto:todotintasysuministros@hotmail.com">todotintasysuministros@hotmail.com</a></div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col-auto py-2">
                    @include('partials.logoimagina')
                </div>
                <div class="col-auto py-2">
                    <p class="my-0">
                        Copyright {{date("Y")}} ©Todo Tintas y Suministros. Todos Los Derechos Reservados.
                    </p>
                </div>

            </div>
        </div>
    </div>


</footer>
