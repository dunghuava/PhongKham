<template>
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
          <div class="app-brand demo">
            <a href="/" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Phong Kham</span>
            </a>
          </div>
          <ul class="menu-inner py-1 ps ps--active-y">
                <li class="menu-item">
                    <b-link to="/" class="menu-link">
                        <i class="menu-icon fas fa-home"></i>
                        <span>Dashboard</span>
                    </b-link>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Danh mục</span>
                </li>
                <li class="menu-item">
                    <b-link href="#" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-heart"></i>
                        <span>Khám bệnh</span>
                    </b-link>
                </li>
                <li class="menu-item">
                    <b-link href="#" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-newspaper"></i>
                        <span>Danh mục</span>
                    </b-link>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <b-link :to="{name:'service'}" class="menu-link">
                                    <span>Dịch vụ</span>
                            </b-link>
                        </li>
                        <li class="menu-item">
                            <b-link :to="{name:'product'}" class="menu-link">
                                    <span>Sản phẩm</span>
                            </b-link>
                        </li>
                    </ul>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Tiện ích</span>
                </li>
                <li class="menu-item">
                    <b-link href="#" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-chart-pie"></i>
                        <span>Thống kê</span>
                    </b-link>
                </li>
                <li class="menu-item">
                    <b-link href="#" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-file"></i>
                        <span>Quản lý hóa đơn</span>
                    </b-link>
                </li>
                <li class="menu-item">
                    <b-link href="#" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-calendar-alt"></i>
                        <span>Lịch tái khám</span>
                    </b-link>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Hệ thống</span>
                </li>
                <li class="menu-item">
                    <b-link href="#" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-cogs"></i>
                        <span>Hệ thống</span>
                    </b-link>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <b-link :to="{name:'setting'}" class="menu-link">
                                    <span>Cài đặt</span>
                            </b-link>
                        </li>
                        <li class="menu-item">
                            <b-link :to="{name:'profile'}" class="menu-link">
                                    <span>Thông tin</span>
                            </b-link>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <b-link href="#" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-users"></i>
                        <span>Tài khoản</span>
                    </b-link>
                </li>
            </ul>
        </aside>
</template>

<script>
export default {
    name:'Sidebar',
    mounted() {
        let vm = this;
        $(function(){
            $('#layout-menu li.menu-item').click(function(e){
                $('.menu-item').removeClass('open active');
                $(this).addClass('open active');
                $('#layout-menu .menu-link').each(function(index,menuItem){
                    if($(menuItem).hasClass('router-link-exact-active')){
                        $(menuItem).parents('.menu-item').addClass('open active');
                    }
                });
            });
            $('#layout-menu .menu-link').each(function(index,menuItem){
                if($(menuItem).hasClass('router-link-exact-active')){
                    $(menuItem).parents('.menu-item').addClass('open active');
                }
            });
        })
    },
}
</script>
