<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a @click="toogleSidebar" class="nav-link" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <b-link to="/" class="nav-link">Dashboard</b-link>
            </li>
        </ul>
        <form onsubmit="return false" class="form-inline ml-3" style="position:relative">
            <div class="input-group input-group-sm">
                <input id="search-area" class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm" aria-label="Search" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <b-link to="/setting/profile" class="nav-link">
                    <i class="fas fa-cog"></i>
                </b-link>
            </li>
            <li class="nav-item">
                <b-link @click="userLogout" class="nav-link">
                    <i class="fa fa-sign-in-alt"></i>
                </b-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name:'Navigation',
    methods:{
        toogleSidebar:function (){
            const _main_sidebar = $('.sidebar-mini');
            _main_sidebar.toggleClass('sidebar-collapse');
        },
        userLogout:function (){
            Swal.fire({
                title: 'Bạn có muốn đăng xuất ?',
                icon:'question',
                showCancelButton: true,
                confirmButtonText: 'Đăng xuất'
            }).then((result) => {
                if(result.isConfirmed){
                    axios.post('/auth/logout').then(function (response){
                        location.href = '/auth/login';
                    });
                }
            })
        }
    }
}
</script>
