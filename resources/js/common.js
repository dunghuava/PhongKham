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

try {
    require('jquery-confirm');
} catch (error) {
    console.error('Loading Lib Error')
}

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
    showSpinner: false
});

axios.defaults.transformResponse.push(function (data) {
    // Before response data
    // if (data.constructor !== Object && data.constructor !== Array) {
    //     toastr.warning(i18n.t('core.disconnect'), 'error');
    //     return;
    // }
    (new Promise((resolve) => {
        if (data.reload) {
            window.app.reloaded().then(() => {
                resolve();
            });
        } else {
            resolve();
        }
    })).then(() => {
        let message = false;
        if (data.message) {
            message = data.message;
        } else if (data.response && data.response.message) {
            message = data.response.message;
        }
        let status = (data.status || 'error').toString().toLowerCase();
        if (message) {
            switch (status) {
                case 'success':
                    toastr.success(message);
                    break;

                case 'info':
                    toastr.info(message);
                    break;

                case 'warning':
                    toastr.warning(message);
                    break;

                case 'error':
                default:
                    toastr.error(message);
                    break;
            }
        }
        let redirect = data.redirect || false;
        if (redirect) {
            let redirectOptions = {path: redirect};
            let withCurrentUri = data.withCurrentUri || false;
            if (withCurrentUri) {
                redirectOptions.query = {
                    redirect: router.currentRoute.fullPath
                };
            }
            router.push(redirectOptions);
        }
    });
    NProgress.done();
    return data;
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 axios.post('/auth/info').then(function(response){
    window.info = response.data;
    Vue.mixin({
        data(){
            return {
                get app(){
                    return window.info
                }
            }
        },
        methods: {
            reloaded:function(){
                return  axios.post('/auth/info').then(function(response){
                    window.info = response.data;
                })
            },
            formatPrice:function(value){
                let number = value.replace(/[^0-9]/g,'');
                if(!number)
                    return '';
                return Number(number).toLocaleString();
            }
        }
    });
    window.app = new Vue({
        el: '#app',
        template:'<app></app>',
        components: {app},
        router,
    })
});
