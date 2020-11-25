/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.toastr = require('toastr');
window.axios = require('axios');
window.VueCarousel = require('vue-carousel');
window.Vuelidate = require('vuelidate');
window.validators = require('vuelidate/lib/validators');
window.Vue.use(window.Vuelidate.default)

import Vue from 'vue';
import axios from 'axios';
import toastr from 'toastr';
import 'lazysizes';

window.bus = new Vue();


Vue.component('categories', require('./components/Categories.vue').default);
Vue.component('featurednew', require('./components/FeaturedNew.vue').default);
Vue.component('bestsellers', require('./components/BestSellers.vue').default);
Vue.component('featured', require('./components/Featured.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* TODO: Move widgets to module
Vue.component('categories', require('./components/Categories.vue'));
Vue.component('featurednew', require('./components/FeaturedNew.vue'));
Vue.component('bestsellers', require('./components/BestSellers.vue'));
Vue.component('featured', require('./components/Featured.vue'));
*/

/*
const app = new Vue({
    el: '#app'

});
*/

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* header */
    if ($(".header-top").length > 0) {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 55) {
                $('header .header-top').addClass('fixed-top');
            } else {
                $('header .header-top').removeClass('fixed-top');
            }
        });
    }

})

window.owlCarousel = require('owl.carousel');

Vue.component('selectProductOptions', require('./components/icommerce/productOptions/selectProductOptions.vue').default);
Vue.component('featured', require('./components/icommerce/products/featured.vue').default);