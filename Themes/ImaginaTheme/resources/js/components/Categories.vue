<template>
    <carousel :scrollPerPage="true" :perPage="1" :perPageCustom="[[0, 1], [480, 1], [768, 2], [920, 3]]" :autoplay="true" :speed="500"
              :navigationEnabled="true" :autoplayTimeout="5000" :loop="true" :paginationEnabled="false" navigationNextLabel="<i class='fa fa-chevron-right'></i>" navigationPrevLabel="<i class='fa fa-chevron-left'></i>">
        <slide  v-for="category in categories" :key="category.id" v-if="category.slug!='destacados'">
            <a :href="category.slug" style="color : inherit">
              <div class="card card-categories position-relative text-white border-0">
                    <div class="cover-img-16">
                        <img :alt="category.title" :src="category.mainImage.path">
                    </div>
                    <div class="card-img-overlay px-0">
                        <div class="pl-5 mb-4">
                            <img  :src="'/assets/media/iconos/ic-' + category.slug + '.png'" class="img-fluid">
                            <h5 class="card-title text-uppercase">{{category.title}}</h5>
                        </div>
                        <div class="btn link btn-warning px-4 text-dark  py-2 ">
                            COMPRA AQUI
                        </div>
                    </div>
              </div>
            </a>
        </slide>
    </carousel>
</template>

<script>
    export default {
        mounted() {
            this.$nextTick(function () {
                this.getCategories();
            });
        },
        components: {
            'carousel': VueCarousel.Carousel,
            'slide': VueCarousel.Slide
        },
        data () {
            return {
                categories: [],
                loading: true
            }
        },
        methods: {
            getCategories(){
                let uri = icommerce.url+'/api/icommerce/v3/categories?filter={"parentId":0}';
                axios.get(uri)
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    })
                    .finally(() => this.loading = false
                    )
            }
        },
    }
</script>
