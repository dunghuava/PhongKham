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
                    component: require('../components/index').default,
                    meta:{
                        title:'Tổng quan'
                    }
                },
                {
                    path:'/service/list',
                    name:'service',
                    component: require('../components/service/index').default,
                    meta:{
                        title:'Dịch vụ'
                    }
                },
                {
                    path:'/service/create',
                    name:'service.create',
                    component: require('../components/service/edit').default,
                    meta:{
                        title:'Dịch vụ',
                        action: 'create'
                    }
                },
                {
                    path:'/service/:id/update',
                    name:'service.update',
                    component: require('../components/service/edit').default,
                    meta:{
                        title:'Dịch vụ',
                        action: 'update'
                    }
                },
                {
                    path:'/product/list',
                    name:'product',
                    component: require('../components/product/index').default,
                    meta:{
                        title:'Sản phẩm'
                    }
                },
                {
                    path:'/product/create',
                    name:'product.create',
                    component: require('../components/product/edit').default,
                    meta:{
                        title:'Thêm sản phẩm',
                        action: 'create'
                    }
                },
                {
                    path:'/product/:id/update',
                    name:'product.update',
                    component: require('../components/product/edit').default,
                    meta:{
                        title:'Cập nhật sản phẩm',
                        action: 'update'
                    }
                },
                {
                    path:'/setting/profile',
                    name:'profile',
                    component: require('../components/setting/profile').default,
                    meta:{
                        title:'Cá nhân'
                    }
                },
                {
                    path:'/setting/system',
                    name:'setting',
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
