<template>
    <div>
        <b-row>
            <b-col>
                <b-card class="card-primary card-outline">
                    <b-form @submit="saveProfile">
                        <b-form-group
                            label="Họ và tên"
                            :invalid-feedback="invalidFeedback('name')"
                        >
                            <b-form-input v-model="frmData.name" :state="state('name')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Tên đăng nhập"
                            :invalid-feedback="invalidFeedback('username')"
                        >
                            <b-form-input disabled v-model="frmData.username" :state="state('username')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Địa chỉ email"
                            :invalid-feedback="invalidFeedback('email')"
                        >
                            <b-form-input v-model="frmData.email" :state="state('email')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Mật khẩu"
                            description="Để trống nếu không muốn thay đổi mật khẩu"
                            :invalid-feedback="invalidFeedback('password')"
                        >
                            <b-form-input type="password" v-model="frmData.password" :state="state('password')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Nhập lại mật khẩu"
                            description="Để trống nếu không muốn thay đổi mật khẩu"
                            :invalid-feedback="invalidFeedback('repassword')"
                        >
                            <b-form-input type="password" v-model="frmData.repassword" :state="state('repassword')" trim></b-form-input>
                        </b-form-group>
                        <b-button type="submit" variant="primary">
                            <b-spinner v-if="process" small label="Small Spinner"></b-spinner> Cập nhật
                        </b-button>
                        <b-button to="/" variant="danger">Hủy</b-button>
                    </b-form>
                </b-card>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    name:'Profile',
    data(){
        return {
            process:false,
            frmData:{
                name:null,
                username:null,
                email:null,
                password:null,
                repassword:null
            },
            errors:{}
        }
    },
    mounted() {
        let vm = this;
        axios.post('/setting/profile').then(function (response){
            vm.frmData = response.data;
        });
    },
    methods:{
        saveProfile:function (e){
            e.preventDefault();
            let vm = this;
            vm.errors = {};
            vm.process = true;
            axios.post('/setting/update-profile',vm.frmData).then(function (response){
                vm.process = false;
            }).catch(function (errors){
                vm.process = false;
                vm.errors = errors.response.data;
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
