<template>
    <div class="login-page">
        <div class="login-box">
            <b-card body-class="p-0" class="h-100 rounded-0 image">
                <b-row class="h-100 justify-content-center align-items-center">
                    <b-col cols="6" class="p-3">
                        <form @submit="userLogin" method="post">
                            <div class="text-center">
                                <h4>phongkham.online</h4>
                            </div>
                            <b-form-group
                                label="Tên tài khoản"
                                :invalid-feedback="invalidFeedback('email')"
                                :state="state('email')">
                                <b-input-group>
                                    <b-form-input placeholder="Email hoặc tên tài khoản" :state="state('email')" v-model="auth.email"/>
                                </b-input-group>
                            </b-form-group>
                            <b-form-group
                                label="Mật khẩu"
                                :invalid-feedback="invalidFeedback('password')"
                                :state="state('password')">
                                <b-form-input placeholder="Mật khẩu" :state="state('password')" v-model="auth.password" type="password"/>
                            </b-form-group>
                            <b-button type="submit" variant="danger" block>
                                <b-spinner v-if="process" small></b-spinner> Đăng nhập
                            </b-button>
                        </form>
                    </b-col>
                </b-row>
            </b-card>
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
                email:'',
                password:''
            },
            errors:{}
        }
    },
    mounted() {
        let vm = this;
        if(vm.app._login){
            vm.$router.push('/');
        }
    },
    methods:{
        userLogin:function (e){
            e.preventDefault();
            let vm = this;
            vm.process = true;
            axios.post('/auth/login',vm.auth).then(function (response){
                // success
            }).catch(function (errors){
                vm.process = false;
                vm.errors = errors.response.data || {};
            });
        },
        state: function (field) {
            let errors = this.errors;
            if (!errors.hasOwnProperty(field)) {
                return;
            }
            return false;
        },
        invalidFeedback: function (field) {
            let errors = this.errors;
            if (!errors.hasOwnProperty(field)) {
                return;
            }
            let errHtml = '';
            errors[field].forEach(function (error) {
                errHtml += error;
            });
            return errHtml;
        }
    }
}
</script>
