<template>
    <div>
        <b-row class="justify-content-center">
            <b-col cols="12">
                <b-card>
                    <b-form @submit="saveProfile">
                        <div class="text-center mb-3">
                            <b-avatar size="125px"></b-avatar>
                        </div>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            :label="$t('profile.fullname')"
                            :invalid-feedback="invalidFeedback('name')"
                        >
                            <b-form-input v-model="frmData.name" :state="state('name')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            :label="$t('profile.username')"
                            :invalid-feedback="invalidFeedback('username')"
                        >
                            <b-form-input disabled v-model="frmData.username" :state="state('username')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            :label="$t('profile.email')"
                            :invalid-feedback="invalidFeedback('email')"
                        >
                            <b-form-input v-model="frmData.email" :state="state('email')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            :label="$t('profile.password')"
                            :description="$t('profile.password_description')"
                            :invalid-feedback="invalidFeedback('password')"
                        >
                            <b-form-input type="password" v-model="frmData.password" :state="state('password')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            :label="$t('profile.password_confirmation')"
                            :description="$t('profile.password_description')"
                            :invalid-feedback="invalidFeedback('repassword')"
                        >
                            <b-form-input type="password" v-model="frmData.repassword" :state="state('repassword')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right">
                            <b-button to="/" variant="danger"><i class="fa fa-arrow-left"></i> {{$t('button.back')}}</b-button>
                            <b-button type="submit" variant="success">
                                <b-spinner v-if="isBusy" small label="Small Spinner"></b-spinner> {{$t('button.update')}}
                            </b-button>
                        </b-form-group>
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
            isBusy:false,
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
            vm.isBusy = true;
            axios.post('/setting/update-profile',vm.frmData).then(function (response){
                vm.isBusy = false;
            }).catch(function (errors){
                vm.isBusy = false;
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
