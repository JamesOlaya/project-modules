<template>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3" v-for="article in articles" v-bind:key="'best-seller-product-'+article.id">
            <div class="card-product-mini mb-4">
                <div class="row no-gutters align-items-center ">
                    <div class="col-5">
                        <a v-bind:href="article.url">
                            <img class="card-img p-1" v-bind:title="article.name" v-bind:alt="article.name" v-bind:src="article.mainImage.path">
                        </a>
                    </div>
                    <div class="col-7">
                        <div class="card-body p-1 text-truncate">
                            <div class="category">
                                {{ article.category.title }}
                            </div>

                            <a v-bind:href="article.url" v-bind:title="article.name" class="name cursor-pointer">
                                {{ article.name }}
                            </a>

                            <div class="price mt-3">
                                <i class="fa fa-shopping-cart icon"></i>
                                {{currencysymbolleft}}{{ article.formattedPrice }}
                            </div>
                            <a class="cart-no">&nbsp;</a>
                            <a v-if="article.price!=0.00" v-on:click="$emit('add-cart',article)" v-show="article.price > 0"
                               class="cart text-primary cursor-pointer">
                                Añadir al carrito
                            </a>
                            <a href="/contacto" v-else class="cart text-primary cursor-pointer">
                                Contacta con nosotros
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:[
            'take'
        ],
        data() {
            return {
                articles: [],
                currencysymbolleft: icommerce.currencySymbolLeft,
                currencysymbolright: icommerce.currencySymbolRight,
                loading: true,
            }
        },
        mounted: function () {
            this.$nextTick(function () {
                this.getData();
            });
        },
        methods: {
            getData: function () {
                let uri = icommerce.url+'/api/icommerce/v3/products?filter={"bestsellers":1,"status":1}&take='+this.take;
                axios.get(uri, {params: { include: 'category'}})
                    .then(response => {
                    this.articles = response.data.data;
            })
            .catch(error => {
                    console.log(error)
            })
            .finally(() => this.loading = false
            )
            }
        },
    }
</script>
