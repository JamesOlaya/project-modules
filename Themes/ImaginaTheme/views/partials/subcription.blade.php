<div class="boletin boletin-s pr-lg-5">
    <h4 class="text1 mb-0">
        NO TE PIERDAS NINGUNA OFERTA
    </h4>
    <h5 class="text2 my-3">
        ¡Suscríbete y entérate de todo!
    </h5>
    <form id="suscripcion" method="post" action="{{route('api.iforms.leads.create')}}">
        <input type="hidden" name="form_id" value="2" required="">
        <div class="input-group">
            <input type="text" class="form-control bg-transparent"
                   placeholder="Escribe tu correo" name="email" required
                   aria-label="Escribe tu correo">
            <div class="input-group-append">
                <button class="btn btn-primary  px-3 " type="submit">
                    SUSCRÍBETE
                </button>
            </div>
        </div>
        <div class="pt-3">
            <div class="custom-control custom-checkbox mb-2">
                
                <!--<input type="checkbox" class="custom-control-input" name="terminos" id="inputterminos">-->
                <label class="custom-control-label" for="inputterminos"> Al suscribirte aceptas nuestras políticas de tratamiento y protección de datos.</label>
            </div>
        </div>
        <!--<div class="pt-3">
            {!!app('captcha')->display($attributes = ['data-sitekey'=>Setting::get('iforms::api')])!!}
            <br>
        </div> -->
    </form>

    <div class="formerror"></div>
</div>



@section('scripts-owl')
    @parent
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>

        $(document).ready(function () {
            var formid = '#suscripcion';
            $(formid).submit(function (event) {
                event.preventDefault();
                var info = objectifyForm($(this).serializeArray());

                info.captcha = {'version': '2', 'token': info['g-recaptcha-response']};
                info.form_id = 2
                delete info['g-recaptcha-response'];
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    dataType: 'json',
                    data: {attributes: info},
                    success: function (data) {
                        $(".boletin-s").html('<p class="alert bg-primary text-white mb-0" role="alert"><span>' + data.data + '</span> </p>');
                    },
                    error: function (data) {
                        $(".boletin-s .formerror").append('<p class="alert alert-danger mb-0 my-3" role="alert"><span>' + data.responseJSON.errors + '</span> </p>');
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
