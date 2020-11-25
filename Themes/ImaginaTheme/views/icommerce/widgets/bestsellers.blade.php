<section id="bestsellers" class="iblock general-block14 pb-5" data-blocksrc="general.block14">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="title-arrow mb-5">
                    <h2 class="pr-5 bg-white">TOP <strong>MÁS VENDIDOS</strong></h2>
                </div>


                <bestsellers  @add-cart="addCart" :take="8"></bestsellers>

            </div>
        </div>
    </div>
</section>


@section('scripts-owl')
    @parent

    <script>
        const bestsellers = new Vue({
            el: '#bestsellers',
            data: {
                currency: false,
                products_bestsellers: [],
                user: false
            },
            methods: {
                /*agrega el producto al carro de compras*/
                addCart: function (item) {
                    vue_carting.addItemCart(item.id,item.name,item.price);
                }
            }
        });
    </script>
@stop


