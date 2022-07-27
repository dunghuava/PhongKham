<template>
    <div>
        <b-row class="justify-content-center">
            <b-col cols="12">
                <b-card>
                    <b-form @submit="saveSetting">
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            :label="$t('setting.name')"
                            :invalid-feedback="invalidFeedback('name')"
                        >
                            <b-form-input v-model="frmData.name" :state="state('name')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            :label="$t('setting.address')"
                            :invalid-feedback="invalidFeedback('address')"
                        >
                            <b-form-input v-model="frmData.address" :state="state('address')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            label="Email"
                            :invalid-feedback="invalidFeedback('email')"
                        >
                            <b-form-input v-model="frmData.email" :state="state('email')" trim></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            :label="$t('setting.phone')"
                            :invalid-feedback="invalidFeedback('phone')"
                        >
                            <b-form-input v-model="frmData.phone" :state="state('phone')" trim></b-form-input>
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
    name:'System',
    data() {
        return {
            isBusy:false,
            frmData:{
                name:null,
                address:null,
                phone:null
            },
            errors:{}
        }
    },
    methods: {
        saveSetting:function(){

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
