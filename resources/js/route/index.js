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
                    path:'/category/list',
                    component: require('../components/category/category').default,
                    meta:{
                        title:'Danh mục'
                    }
                },
                {
                    path:'/product/list',
                    component: require('../components/category/product').default,
                    meta:{
                        title:'Sản phẩm'
                    }
                }
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
        }
    ]
});

router.beforeEach(function (to, from, next) {
    document.title = to.meta.title;
    next();
})
export default router;