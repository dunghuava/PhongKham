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
window.NProgress = require('nprogress/nprogress');
window.Swal = require('sweetalert2');

const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

const csrf_token = document.querySelector('[name="csrf-token"]');
if(!csrf_token){
    console.error('csrf-token not found');
}

axios.defaults.headers.common['X-CSRF-TOKEN'] = csrf_token.content;
axios.defaults.transformRequest.splice(0, 0, function (data) {
    NProgress.start();
    return data;
});

NProgress.configure({
    showSpinner: true
});

axios.defaults.transformResponse.push(function (data){
    if(data.status && data.message){
        switch (data.status){
            case 'success':
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1000
                })
                break;
            case 'warning':
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1000
                })
                break;
            case 'error':
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1000
                })
                break;
        }
    }else if(data.message){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: data.message,
            showConfirmButton: false,
            timer: 1000
        })
    }
    if(data.redirect){
        router.push(data.redirect);
    }
    setTimeout(()=>{
        NProgress.done();
    },500)
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
    router
});
