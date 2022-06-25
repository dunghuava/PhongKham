<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <b-nav-item-dropdown right>
                <template #button-content>
                    <b-avatar size="35px" src="https://placekitten.com/300/300"></b-avatar>
                </template>
                <b-dropdown-item to="/setting/profile">
                    <i class="fa fa-user"></i> Profile
                </b-dropdown-item>
                <b-dropdown-item @click="userLogout">
                    <i class="fa fa-sign-out-alt"></i> Sign Out
                </b-dropdown-item>
            </b-nav-item-dropdown>
        </ul>
    </nav>
</template>

<script>
export default {
    name:'Navigation',
    methods:{
        userLogout:function (){
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
