<div id="icommerce-category" class="categories-children pb-4">

    <h3 class="text-main  text-uppercase mb-4">
        @{{category.title}}
    </h3>
    <div v-if="categories && categories.length>0">
        <div class="filter-order mb-3 " v-for="(category,index) in categories">

            <a class="item" data-toggle="collapse" v-if="category.childrens && category.childrens.length>0 "
               v-bind:href="'#category-'+category.id" role="button" aria-expanded="false"
               v-bind:aria-controls="'category-'+category.id">
                <h5 class="p-3 bg-light d-block cursor-pointer mb-0" style="border-radius: 0 20px 0 0;">
                    <i class="fa angle mr-1" aria-hidden="true"></i>
                    @{{category.title}}
                </h5>

            </a>

            <a :href="url+'/'+category.slug" class="item p-3 bg-light d-block cursor-pointer"
               style="border-radius: 0 20px 0 0;" v-else>
                <h5 class="mb-0">@{{category.title}}</h5>
            </a>

            <div class="collapse multi-collapse mb-2" v-bind:id="'category-'+category.id">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" v-for='i in category.childrens'>
                        <a class="d-block w-100 cursor-pointer" :href="url+'/'+i.slug">
                            <span class="text-primary mr-2">•</span>
                            @{{i.title}} </a>
                    </li>
                </ul>
            </div>


        </div>
    </div>

    <div v-else-if="categoryParents.childrens && categoryParents.childrens.length>0" class="px-0">

        <p>Quizas te puedan interesar otras marcas de @{{categoryParents.title}} </p>

        <div class="filter-order mb-3 " v-for="(cate,index) in categoryParents.childrens" v-if="cate.slug!=category.slug">
            <a :href="url+'/'+cate.slug" class="item p-3 bg-light d-block cursor-pointer"
               style="border-radius: 0 20px 0 0;" >
                <h5 class="mb-0">@{{cate.title}}</h5>
            </a>
        </div>
    </div>


</div>