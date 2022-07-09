<template>
    <div>
        <b-breadcrumb :items="breadcrumb"></b-breadcrumb>
        <b-row>
            <b-col cols="12">
                <div>
                    <b-card bg-variant="light">

                        <b-form-group
                            label="Họ và tên:"
                            label-cols-sm="3"
                            label-align-sm="right"
                            :invalid-feedback="invalidFeedback('name')"
                        >
                            <b-form-input  v-model="form.name" :state="state('name')"></b-form-input>
                        </b-form-group>

                        <b-form-group
                            label="Avatar:"
                            label-cols-sm="3"
                            label-align-sm="right"
                            :invalid-feedback="invalidFeedback('avatar')"
                        >
                            <b-form-file accept="image/png, image/jpg, image/jpeg" @change="onFileChange" :state="state('avatar')"></b-form-file>
                        </b-form-group>

                        <b-form-group
                            label="Tên tài khoản:"
                            label-cols-sm="3"
                            label-align-sm="right"
                            :invalid-feedback="invalidFeedback('username')"
                        >
                            <b-form-input :formatter="formatUserName" v-model="form.username" :state="state('username')"></b-form-input>
                        </b-form-group>

                        <b-form-group
                            label="Địa chỉ email:"
                            label-cols-sm="3"
                            label-align-sm="right"
                            :invalid-feedback="invalidFeedback('email')"
                        >
                            <b-form-input v-model="form.email" :state="state('email')"></b-form-input>
                        </b-form-group>

                        <b-form-group
                            label="Mật khẩu:"
                            label-cols-sm="3"
                            label-align-sm="right"
                            description="Để trống nếu không muốn thay đổi mật khẩu"
                            :invalid-feedback="invalidFeedback('password')"
                        >
                            <b-form-input type="password" v-model="form.password" :state="state('password')"></b-form-input>
                        </b-form-group>

                        <b-form-group
                            label="Nhập lại khẩu:"
                            label-cols-sm="3"
                            label-align-sm="right"
                            description="Để trống nếu không muốn thay đổi mật khẩu"
                            :invalid-feedback="invalidFeedback('password_confirmation')"
                        >
                            <b-form-input type="password" v-model="form.password_confirmation" :state="state('password_confirmation')"></b-form-input>
                        </b-form-group>

                        <b-form-group
                            label="Trạng thái:"
                            label-cols-sm="3"
                            label-align-sm="right"
                        >
                            <b-form-checkbox switch class="mt-2" v-model="form.status"></b-form-checkbox>
                        </b-form-group>

                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            class="mb-0 mt-2"
                        >
                            <b-button :to="{name:'user'}" variant="danger">
                                <i class="fa fa-arrow-left"></i> Hủy
                            </b-button>
                            <b-button v-if="action == 'update'" @click="updateItem" variant="success">
                                <b-spinner v-if="isBusy" small label="Small Spinner"></b-spinner> Cập nhật
                            </b-button>
                            <b-button v-else @click="createItem" variant="success">
                                <b-spinner v-if="isBusy" small label="Small Spinner"></b-spinner> Thêm mới
                            </b-button>
                        </b-form-group>
                    </b-card>
                    </div>
            </b-col>
        </b-row>
    </div>
</template>

<script>
const API_USER = '/api/user';
export default {
    name:'EditUser',
    data() {
        return {
            isBusy:false,
            errors:{},
            form:{
                name:null,
                username:null,
                avatar:null,
                email:null,
                password:null,
                password_confirmation:null,
                status:false
            },
            action:'create',
            id:null
        }
    },
    mounted() {
        let vm = this;
        vm.id = vm.$route.params.id || null;
        vm.action = vm.$route.meta.action || 'create';
        if(vm.id){
            vm.getItem(vm.id);
        }
        vm.breadcrumb.push({
            text:'User',
            href:'#'
        });
    },
    methods:{
        getItem:function(id){
            let vm = this;
            axios.get(API_USER+'/'+vm.id).then(function(response){
                vm.form = response.data;
            }).catch(function(error){
                vm.$router.back();
            });
        },
        createItem:function(){
            let vm = this;
            vm.errors = {};
            vm.isBusy = true;
            axios.post(API_USER, vm.form).then(function (response){
                vm.isBusy = false;
                vm.$router.push({name:'user'});
            }).catch(function(errors){
                vm.isBusy = false;
                vm.errors = errors.response.data.errors;
            });
        },
        updateItem:function(){
            let vm = this;
            vm.errors = {};
            vm.isBusy = true;
            axios.put(API_USER+'/'+vm.id, vm.form).then(function (response){
                vm.isBusy = false;
            }).catch(function(errors){
                vm.isBusy = false;
                vm.errors = errors.response.data.errors;
            });
        },
        formatUserName:function(value){
            return value.replace(/[^a-zA-Z0-9_-]/g,'').toLocaleString();
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
        },
        onFileChange(e) {
            let vm = this;
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            vm.form.avatar = files[0];
        },
    }
}
</script>
