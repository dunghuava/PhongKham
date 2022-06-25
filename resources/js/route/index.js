import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: require('../components/page').default,
            children:[
                {
                    path:'/',
                    component: require('../components/dashboard').default,
                    meta:{
                        title:'Tổng quan'
                    }
                },
                {
                    path:'/service/list',
                    component: require('../components/category/service').default,
                    meta:{
                        title:'Dịch vụ'
                    }
                },
                {
                    path:'/product/list',
                    component: require('../components/category/product').default,
                    meta:{
                        title:'Sản phẩm'
                    }
                },
                {
                    path:'/setting/profile',
                    component: require('../components/setting/profile').default,
                    meta:{
                        title:'Cá nhân'
                    }
                },
                {
                    path:'/setting/system',
                    component: require('../components/setting/system').default,
                    meta:{
                        title:'Hệ thống'
                    }
                },
            ],
        },
        {
            path:'/auth',
            component: require('../components/auth/page').default,
            children:[
                {
                    path: 'login',
                    component: require('../components/auth/login').default,
                    meta: {
                        title: 'Đăng nhập hệ thống'
                    }
                }
            ],
        },
        {
            path: '*',
            component: require('../components/errors/404').default,
            meta: {
                title: '404 Not Found'
            }
        }
    ]
});

router.beforeEach(function (to, from, next) {
    document.title = to.meta.title;
    next();
})
export default router;
