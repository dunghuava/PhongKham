<template>
    <div>
        <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search...">
                </div>
              </div>
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item lh-1 me-3">
                    <b-avatar id="popover"></b-avatar>
                    <b-popover target="popover" triggers="hover focus" class="p-1">
                        <template #title>
                            <b-avatar></b-avatar> <small>{{ app.auth.name }}</small>
                        </template>
                        <b-list-group flush>
                            <b-list-group-item :to="{name:'profile'}" class="border-0">
                                <i class="fas fa-user"></i> Trang cá nhân
                            </b-list-group-item>
                            <b-list-group-item href="#"  @click="logout" class="border-0">
                                <i class="fas fa-power-off"></i> Đăng xuất
                            </b-list-group-item>
                        </b-list-group>
                    </b-popover>
                </li>
              </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name:'Navigation',
    methods:{
        logout:function (){
            let vm = this;
            $.confirm({
                title: 'Thông báo',
                content: 'Kết thúc phiên làm việc ?',
                icon: 'fas fa-exclamation-circle',
                backgroundDismiss: true,
                animateFromElement: false,
                buttons: {
                    tryAgain: {
                        text: 'Đồng ý',
                        btnClass: 'btn-red',
                        action: function(){
                            axios.post('/auth/logout').then(function (response){
                                // success
                            });
                        }
                    },
                    cancel: {
                        text: 'Hủy bỏ'
                    }
                }
            });
        }
    }
}
</script>
