<!-- Modal -->
<div class="modal fade modal-todotintas" id="modalDistribuidor" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header px-0">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times-circle text-white"></i>
        </button>

        <div class="text-center mx-auto">
          <img src="@setting('isite::logo1')" class="img-fluid" alt="">
        </div>
      </div>
      <div class="modal-body" id="boletin-distribuidor">

        <div class="px-lg-5 text-center">
          <h2 class="title">¿QUIERES SER DISTRIBUIDOR?</h2>
          <p class="summary">Regístra tus datos y te contáctaremos a la mayor
            brevedad posible.</p>
        </div>

        <form id="distribuidor" method="post" action="{{route('api.iforms.leads.create')}}" class="px-lg-4">
          <input type="hidden" name="form_id" value="3" required="">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombre Completo" name="nombre" id="inputnombre"
                   required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Empresa" name="empresa" id="inputempresa" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Teléfono" name="telefono" id="inputtelefono" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Correo" name="correo" id="inputcorreo" required>
          </div>
          <div class="p-4 text-center">
            <div class="custom-control custom-checkbox mb-2">
              <input type="checkbox" class="custom-control-input" name="condiciones" id="inputcondiciones" required>
              <label class="custom-control-label" for="inputcondiciones">Acepto términos y condiciones y autorizo el
                tratamiento de mis datos
                personales conforme a la política de privacidad y tratamiento de datos
                personales.</label>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </form>
        <div class="formerror"></div>
      </div>
    </div>
  </div>
</div>

@section('scripts-owl')
  @parent
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>

    $(document).ready(function () {
      var formid = '#distribuidor';
      $(formid).submit(function (event) {
        event.preventDefault();
        var info = objectifyForm($(this).serializeArray());

        info.captcha = {'version': '2', 'token': info['g-recaptcha-response']};
        info.form_id = 3
        delete info['g-recaptcha-response'];
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          dataType: 'json',
          data: {attributes: info},
          success: function (data) {
            $('#modalDistribuidor').modal('hide')
            alerta('Mensaje enviado','info')
          },
          error: function (data) {
            alerta('Algo ha salido mal, intenta de nuevo','error')
          }
        })
      })
    });

    function objectifyForm(formArray) {//serialize data function

      var returnArray = {};
      for (var i = 0; i < formArray.length; i++) {
        returnArray[formArray[i]['name']] = formArray[i]['value'];
      }
      return returnArray;
    }

    function alerta(menssage, type) {
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 400,
        "hideDuration": 400,
        "timeOut": 4000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr[type](menssage);
    }
  </script>
@stop
