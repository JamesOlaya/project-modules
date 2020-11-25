<div class="modal modal-menu fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel"
         aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary rounded-0">
                <img src="@setting('isite::logo1')" class="img-fluid mx-auto py-2"/>
                <button type="button" class="close my-0" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-white"></i>
                </button>
            </div>
            <div class="modal-body">

              <nav class="navbar  navbar-movil  p-0">

                <div class="collapse navbar-collapse show " >
                     @include('partials.widgets.nav-categories', array('type'=>'navbar-nav'))
                </div>
              </nav>
            </div>
        </div>
    </div>
</div>

