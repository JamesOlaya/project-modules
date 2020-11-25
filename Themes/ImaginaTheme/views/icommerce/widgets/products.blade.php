<!-- vista de productos -->
<div v-if="articles.length >= 1" class="row products-index mb-5">

    <div class="col-6 col-sm-6 col-md-4 mb-4" v-if="articles.length>0" v-for="item in articles">
        <div v-show="preloaded">
            <div class="card card-product mb-4 border-0">

                <!-- image -->
                <div class="bg-img border p-2">
                    <a :href="item.slug">
                        <img class="card-img-top" v-bind:alt="item.name"
                             :src="item.mainImage.path">
                    </a>
                </div>

                <!-- dates product -->
                <div class="card-body">
                    <!-- title -->
                    <h6 class="card-title title text-center font-weight-bold">
                        <a :href="item.slug">
                            @{{item.name}}
                        </a>
                    </h6>

                    <!-- PRICE -->
                    <div class="price mb-2 text-center">
                        @{{currencySymbolLeft}} @{{ item.formattedPrice }}
                    </div>

                </div>
            </div>
        </div>
        <!-- PRODUCT -->
        <div class="card-product mb-4">
            <div class="bg-img cursor-pointer ">
                <a v-bind:href="item.url">
                    <img v-bind:alt="item.name" v-bind:src="item.mainImage.path">
                </a>
            </div>
            <div class="mt-3 pb-3 text-center">
                <div class="category mb-3">
                    @{{ item.category.title }}
                </div>

                <div class="name mb-3">
                    <a v-bind:href="item.url" class="name cursor-pointer">
                        @{{ item.name }}
                    </a>
                </div>

                <div class="price">
                    <i class="fa fa-shopping-cart icon"></i>
                    @{{currencySymbolLeft}}@{{ item.formattedPrice }}
                </div>
                <a class="cart-no">&nbsp;</a>
                <a v-if="item.price!=0.00" v-on:click="addCart(item)" v-show="item.price > 0" class="cart text-primary cursor-pointer">
                    Añadir al carrito
                </a>
                <a href="{{ URL::to('/contacto') }}" v-else class="cart text-primary cursor-pointer">
                    Contacta con nosotros
                </a>
            </div>
        </div>
    </div>
</div>

<!-- si no hay productos -->
<div v-else>
    <div v-if="loadingProducts">
        Los productos se están cargando...
    </div>
    <div v-else>
        No hay productos en la colección <b>@{{categorititle}}</b>...
    </div>
</div>

<hr class="border-light">

<!-- PAGINATE -->
<div class="col-12 text-right pb-5">
    <nav aria-label="Page navigation example" v-if="pages > 1" class="float-right">
        <ul class="pagination">
            <!-- items  -->
            <li v-for="page in configPagination" v-bind:class="`${page.class || false} page-item`">
                <a class="page-link" v-bind:href="page.href">
                    <!--Num button-->
                    <div v-if="page.num">@{{page.num}}</div>
                    <!--Action button-->
                    <i v-else-if="page.icon" v-bind:class="page.icon"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>
