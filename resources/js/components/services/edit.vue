<template>
    <div>
        <b-breadcrumb :items="breadcrumb"></b-breadcrumb>
        <b-row>
            <b-col cols="12">
                <div>
                    <b-card bg-variant="light">
                        <b-form-group
                            label="Tên dịch vụ:"
                            label-cols-sm="3"
                            label-align-sm="right"
                            :invalid-feedback="invalidFeedback('name')"
                        >
                            <b-form-input  v-model="form.name" :state="state('name')"></b-form-input>
                        </b-form-group>

                        <b-form-group
                            label="Đơn giá:"
                            label-cols-sm="3"
                            label-align-sm="right"
                        >
                            <b-form-input v-model="form.price" :formatter="toPrice"></b-form-input>
                        </b-form-group>

                        <b-form-group
                            label="Hiển thị:"
                            label-cols-sm="3"
                            label-align-sm="right"
                        >
                            <b-form-checkbox switch class="mt-2" v-model="form.status"></b-form-checkbox>
                        </b-form-group>

                        <b-form-group
                            label="Mô tả:"
                            label-cols-sm="3"
                            label-align-sm="right"
                            class="mb-0"
                        >
                            <b-form-textarea v-model="form.description" rows="8"></b-form-textarea>
                        </b-form-group>
                        <b-form-group
                            label-cols-sm="3"
                            label-align-sm="right"
                            class="mb-0 mt-2"
                        >
                            <b-button :to="{name:'service'}" variant="danger">
                                <i class="fa fa-arrow-left"></i> Hủy
                            </b-button>
                            <b-button v-if="action == 'update'" @click="updateItem" variant="success">
                                <i class="fa fa-save"></i> Cập nhật
                            </b-button>
                            <b-button v-else @click="createItem" variant="success">
                                <i class="fa fa-save"></i> Thêm mới
                            </b-button>
                        </b-form-group>
                    </b-card>
                    </div>
            </b-col>
        </b-row>
    </div>
</template>

<script>
const API_SERVICE = '/api/service';
import mixins from '../mixins.vue';
export default {
    mixins:[mixins],
    name:'EditService',
    data() {
        return {
            isBusy:false,
            errors:{},
            form:{
                code:null,
                name:null,
                image:null,
                price:0,
                description:null,
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
            text:'Dịch vụ',
            href:'#'
        });
    },
    methods:{
        getItem:function(id){
            let vm = this;
            axios.get(API_SERVICE+'/'+vm.id).then(function(response){
                vm.form = response.data;
            }).catch(function(error){
                vm.$router.back();
            });
        },
        createItem:function(){
            let vm = this;
            vm.errors = {};
            vm.isBusy = true;
            axios.post(API_SERVICE,vm.form).then(function (response){
                vm.isBusy = false;
                vm.$router.push({name:'service'});
            }).catch(function(errors){
                vm.isBusy = false;
                vm.errors = errors.response.data.errors;
            });
        },
        updateItem:function(){
            let vm = this;
            vm.errors = {};
            vm.isBusy = true;
            axios.put(API_SERVICE+'/'+vm.id,vm.form).then(function (response){
                vm.isBusy = false;
            }).catch(function(errors){
                vm.isBusy = false;
                vm.errors = errors.response.data.errors;
            });
        }
    }
}
</script>
