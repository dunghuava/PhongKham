<template>
    <div class="login-page">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form @submit="userLogin" method="post">
                        <div class="input-group mb-3">
                            <input required v-model="auth.username" type="text" class="form-control" placeholder="Tài khoản">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input required v-model="auth.password" type="password" class="form-control" placeholder="Mật khẩu">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <b-spinner v-if="process" small label="Small Spinner"></b-spinner> Đăng nhập
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'Login',
    data(){
        return {
            process:false,
            auth:{
                username:null,
                password:null
            }
        }
    },
    beforeMount() {
        let vm = this;
        vm.checkUserLogin();
    },
    methods:{
        userLogin:function (e){
            e.preventDefault();
            let vm = this;
            vm.process = true;
            axios.post('/auth/login',vm.auth).then(function (response){
                // code
            });
        },
        checkUserLogin:function (){
            axios.post('/auth/check-login').then(function (response){
                // code
            });
        }
    }
}
</script>
