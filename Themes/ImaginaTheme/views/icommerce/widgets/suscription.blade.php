<section class="general-block18 mt-4">
  <div class="boletin boletin-product pr-lg-5">
    <p class="text-primary font-weight-bold mb-1">Avísame cuando esté disponible</p>
    <form id="suscripcion-product" method="post" action="{{route('api.iforms.leads.create')}}">
            <input type="hidden" name="form_id" value="4" required="">
            <input type="hidden" name="producto" value="{{$product->name}}" id="inputproduct">
            <div class="input-group">
                <input type="text" class="form-control bg-transparent"
                       placeholder="Escribe tu correo" name="email" id="inputemail" required
                       aria-label="Escribe tu correo">
                <div class="input-group-append">
                    <button class="btn btn-primary  px-3 " type="submit">
                        ENVIAR
                    </button>
                </div>
            </div>
        </form>

      <div class="formerror"></div>
  </div>
</section>


@section('scripts-owl')
    @parent
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>

        $(document).ready(function () {
            var formid = '#suscripcion-product';
            $(formid).submit(function (event) {
                event.preventDefault();
                var info = objectifyForm($(this).serializeArray());

                info.captcha = {'version': '2', 'token': info['g-recaptcha-response']};
                info.form_id = 4
                delete info['g-recaptcha-response'];
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    dataType: 'json',
                    data: {attributes: info},
                    success: function (data) {
                        $(".boletin-product").html('<p class="alert bg-primary text-white mb-0" role="alert"><span>' + data.data + '</span> </p>');
                    },
                    error: function (data) {
                        $(".boletin-product .formerror").append('<p class="alert alert-danger mb-0 my-3" role="alert"><span>' + data.responseJSON.errors + '</span> </p>');
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
    </script>

@stop



