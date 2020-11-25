<template>
    <carousel :scrollPerPage="true" :perPage="1" :perPageCustom="[[0, 1], [540, 2], [768, 3], [992, 4]]" :autoplay="true" :speed="500"
              :navigationEnabled="true" :interval="10000" :loop="true" :paginationEnabled="false" navigationNextLabel="<div class='owl-icon-right'></div>" navigationPrevLabel="<div class='owl-icon-left'></div>">
        <slide v-for="article in articles" v-bind:key="'featured-new-product-'+article.id">
            <div class="card-product">
                <div class="bg-img">
                    <a v-bind:href="article.url">
                        <img v-bind:title="article.name" v-bind:alt="article.name" v-bind:src="article.mainImage.path">
                    </a>
                </div>
                <div class="mt-3 pb-3 text-center">
                    <div class="category">
                        {{ article.category.title }}
                    </div>

                    <a v-bind:href="article.url" class="name cursor-pointer">
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
        </slide>
    </carousel>
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
        components: {
            'carousel': VueCarousel.Carousel,
            'slide': VueCarousel.Slide
        },
        mounted: function () {
            this.$nextTick(function () {
                this.getData();
            });
        },
        methods: {
            getData: function () {
                let uri = icommerce.url+'/api/icommerce/v3/products?filter={"order":{"way":"desc","field":"created_at"},"status":1}&take='+this.take;
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
