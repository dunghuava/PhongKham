<template>
    <aside class="main-sidebar sidebar-dark-primary">
        <div class="sidebar">
            <a class="brand-link text-center">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item">
                        <b-link to="/" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Tổng quan
                            </p>
                        </b-link>
                    </li>
                    <li class="nav-item">
                        <b-link class="nav-link">
                            <i class="nav-icon fas fa-store"></i>
                            <p>
                                Danh mục
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </b-link>
                        <ul class="nav nav-treeview">
                            <li>
                                <b-link to="/category/list" class="nav-link">
                                    <i class="fa fa-angle-right nav-icon"></i>
                                    <p>Danh mục</p>
                                </b-link>
                            </li>
                            <li>
                                <b-link to="/product/list" class="nav-link">
                                    <i class="fa fa-angle-right nav-icon"></i>
                                    <p>Sản phẩm</p>
                                </b-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>

<script>
export default {
    name:'Sidebar',
    mounted() {
        $('.nav-item').click(function (e){
            let _this = $(this);
            $('.nav-item').removeClass('menu-open').find('.nav-link').removeClass('active').find('.nav-treeview').slideUp();
            if(!_this.hasClass('menu-open')){
                _this.addClass('menu-open').find('.nav-link').first().addClass('active').find('.nav-treeview').slideDown();
            }
        });
        $('.router-link-exact-active.router-link-active').parents('.nav-item').addClass('menu-open').find('.nav-link').first().addClass('active');
    }
}
</script>
