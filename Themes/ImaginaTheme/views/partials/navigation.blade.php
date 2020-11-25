<div id="navtodotintas" style="min-height: 50px" >
  <!--Desktop-->
  <div class="d-none d-lg-block menu-desktop">
    <div class="dropdown d-inline-block py-1" v-for="(category,index) in categories" v-bind:key="index">
      <a href="#" class="desktop-link dropdown-toggle" role="button"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img  :src="'/assets/media/iconos/ic-' + category.slug + '.png'">
        @{{category.title}}
      </a>
      <ul class="dropdown-menu shadow rounded-0 py-0 desktop-childrens">
        <li class="childrent-item" v-for="cate in category.childrens">
          <a class="childrent-link" :href="cate.url">
            @{{cate.title}}
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!--Mobile-->
  <div id="accordion" class="text-left d-lg-none" style="width: 100%">
    <!--Menu button-->
    <div style="width: 100%; text-align: end">
      <button class="btn bg-dark butoon-collapse" type="button" data-toggle="collapse" data-target="#collapseMenu"
              aria-expanded="false" aria-controls="collapseMenu">
        <span class="p-2 fa fa-bars text-white"></span>
      </button>
    </div>

    <!--Menu list-->
    <div class="collapse collapse-responsive" id="collapseMenu">
      <div v-for="(category,index) in categories" v-bind:key="index">
        <button class="btn bg-dark text-white menu-title-responsive" type="button" data-toggle="collapse" v-bind:data-target="`#collapseItem${index}`"
           aria-expanded="false" v-bind:aria-controls="`collapseItem${index}`">
          <i class="fa fa-plus mr-2"></i>
          @{{category.title}}
        </button>
        <div v-bind:id="`collapseItem${index}`" class="collapse childrent-responsive bg-white" >
          <ul class="rounded-0 py-2">
            <li class="text-dark title-childrent-responsive py-1" v-for="children in category.childrens">
              <a class="" :href="cate.url">
                @{{children.title}}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@section('scripts-owl')
  @parent

  <script>
    const navtodotintas = new Vue({
      el: '#navtodotintas',
      data: {
        currency: false,
        products_new: [],
        user: false,
        categories: [],
        loading: true,
        url: "{{url('/')}}",
      },
      mounted() {
        this.$nextTick(function () {
          this.getCategories();
        });
      },
      methods: {
        getCategories() {
          let uri = icommerce.url + '/api/icommerce/v3/categories?filter={"parentId":0 , "showMenu": true}';
          axios.get(uri, {params: {include: 'children'}})
            .then((response) => {
              this.categories = response.data.data;
            })
            .catch((error) => {
              console.log(error);
            })
            .finally(() => this.loading = false
            )
        }
      }
    });
  </script>
@stop
