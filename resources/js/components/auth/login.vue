<template>
    <div>
        <b-row class="justify-content-center">
            <b-col cols="6">
                <b-card body-class="pt-5 pb-5 pl-0 pr-0" class="h-100 rounded-0 image login-box">
                    <b-row class="h-100 justify-content-center mt-3 mb-3">
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
            </b-col>
        </b-row>
    </div>
</template>

<script>
import mixins from '../mixins.vue';
export default {
    mixins:[mixins],
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
        }
    }
}
</script>
