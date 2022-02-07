/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

import router from "./route";
import app from "./app";
import Vue from "vue";

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);


window.$ = require('jquery');
window.axios = require('axios');
window.toastr = require('toastr');

const csrf_token = document.querySelector('[name="csrf-token"]');
if(!csrf_token){
    console.error('csrf-token not found');
}

axios.defaults.headers.common['X-CSRF-TOKEN'] = csrf_token.content;
axios.defaults.transformRequest.splice(0, 0, function (data) {
    return data;
});
axios.defaults.transformResponse.push(function (data){
    if(data.status && data.message){
        switch (data.status){
            case 'success':
                toastr.success(data.message);
                break;
            case 'warning':
                toastr.warning(data.message);
                break;
            case 'error':
                toastr.error(data.message);
                break;
        }
    }
    if(data.redirect){
        router.push(data.redirect);
    }
    return data;
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const init = new Vue({
    el: '#app',
    template:'<app></app>',
    components: {app},
    router,
});
