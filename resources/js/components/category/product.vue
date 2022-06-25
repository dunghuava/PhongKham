<template>
    <div>
        <b-card>
            <b-row>
                <b-col cols="3">
                    <b-form-group
                        label="Tên sản phẩm:"
                        >
                        <b-form-input></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col cols="3">
                    <b-form-group
                        label="Mã sản phẩm:"
                        >
                        <b-form-input></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col cols="3">
                    <b-form-group
                        label="Trạng thái:"
                        >
                        <b-form-select v-model="filter.status" :options="options.status"></b-form-select>
                    </b-form-group>
                </b-col>
                <b-col cols="3">
                    <b-form-group
                        label="Thao tác"
                        >
                        <b-button block variant="danger">
                            <i class="fa fa-search"></i> Tìm kiếm
                        </b-button>
                    </b-form-group>
                </b-col>
                <b-col cols="12">
                    <div class="text-right d-none">
                        <b-button variant="success" v-b-modal.modal-add-product>
                            <i class="fa fa-plus"></i> Thêm mới
                        </b-button>
                    </div>
                </b-col>
            </b-row>
        </b-card>
        <b-modal id="modal-product" size="xl" title="Thêm sản phẩm" no-close-on-backdrop>
            <b-row>
                <b-col cols="4"></b-col>
                <b-col cols="8">
                        <b-row>
                            <b-col>
                                <b-form-group
                                label="Mã sản phẩm"
                                :invalid-feedback="invalidFeedback('code')"
                                :state="state">
                                    <b-form-input v-model="form.code" :state="state('code')" trim></b-form-input>
                                </b-form-group>
                            </b-col>
                             <b-col>
                                <b-form-group
                                    label="Tên sản phẩm"
                                    :invalid-feedback="invalidFeedback('name')"
                                    :state="state">
                                    <b-form-input v-model="form.name" :state="state('name')" trim></b-form-input>
                                </b-form-group>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col>
                                <b-form-group
                                    label="Đơn giá"
                                    :invalid-feedback="invalidFeedback('price')"
                                    :state="state">
                                    <b-form-input :formatter="formatPrice" v-model="form.price" :state="state('price')" trim></b-form-input>
                                </b-form-group>
                            </b-col>
                            <b-col>
                                <b-form-group
                                    label="Trạng thái"
                                    :invalid-feedback="invalidFeedback('status')"
                                    :state="state">
                                    <b-form-radio-group v-model="form.status" :options="options.status"></b-form-radio-group>
                                </b-form-group>
                            </b-col>
                        </b-row>
                </b-col>
            </b-row>
            <template #modal-footer>
                <div class="w-100 text-center">
                    <b-button :disabled="isBusy" @click="saveItem" variant="success">
                        <b-spinner v-if="isBusy" small></b-spinner> Lưu lại
                    </b-button>
                    <b-button @click="closeModal" variant="light">Đóng</b-button>
                </div>
            </template>
        </b-modal>
        <b-table ref="table" bordered class="bg-white"
            :fields="fields"
            :items="dataProvider"
            responsive show-empty>
            <template #cell(status_label)="data">
                <b-badge class="p-2" :variant="data.item.status == 1 ? 'success':'danger'">
                    {{ data.value }}
                </b-badge>
            </template>
            <template #cell(options)="data">
                <b-dropdown variant="link" no-caret>
                    <template #button-content>
                        &#x1f50d;<span class="sr-only">Search</span>
                    </template>
                    <b-dropdown-item @click="getItem(data.item.id)" class="text-center">Chỉnh sửa</b-dropdown-item>
                    <b-dropdown-item @click="deleteItem(data.item.id)" class="text-center">
                        <span class="text-danger">Xóa</span>
                    </b-dropdown-item>
                </b-dropdown>
            </template>
        </b-table>
    </div>
</template>

<script>
export default {
    name:'Product',
    data(){
        return {
            isBusy:false,
            options:{
                status:[
                    {value:1,text:'Bật'},
                    {value:0,text:'Tắt'}
                ]
            },
            filter:{
                status:1
            },
            form:{},
            fields: [
                {
                    key: 'id',
                    label: '#',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '5%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                }, {
                    key: 'name',
                    label: 'Tên sản phẩm',
                    tdClass: 'text-left align-middle',
                    thStyle: {
                        textAlign: 'left',
                        verticalAlign: 'middle'
                    },
                }, {
                    key: 'price',
                    label: 'Giá bán',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '10%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                    formatter:function(value){
                        return Number(value).toLocaleString() + ' đ';
                    }
                },
                {
                    key: 'status_label',
                    label: 'Trạng thái',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '5%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                },
                {
                    key: 'updated_at',
                    label: 'Cập nhật',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '15%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                },
                {
                    key: 'options',
                    label: 'Thao tác',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '8%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                }
            ],
            errors:{}
        }
    },
    methods:{
        saveItem:function(){
            let vm = this;
            vm.isBusy = true;
            axios.post('/product/save',vm.form).then(function (response){
                vm.closeModal();
                vm.$refs.table.refresh();
                vm.isBusy = false;
            });
        },
        getItem:function(id){
            let vm = this;
            axios.post('/product/get',{id:id}).then(function (response){
                vm.form = response.data;
                vm.form.action = 'update';
                vm.$bvModal.show('modal-product');
            });
        },
        closeModal:function(){
            let vm = this;
            vm.$bvModal.hide('modal-product');
        },
        dataProvider:function(ctx){
            let vm = this;
            return axios.post('/product/list').then(function(response){
                return response.data.data || [];
            });
        },
        deleteItem:function(id){
            let vm = this;
            $.confirm({
                title: 'Thông báo',
                content: 'Bạn có muốn xóa sản phẩm này ?',
                icon: 'fas fa-exclamation-circle',
                backgroundDismiss: true,
                animateFromElement: false,
                buttons: {
                    tryAgain: {
                        text: 'Đồng ý',
                        btnClass: 'btn-red',
                        action: function(){
                            axios.post('/product/delete',{id:id}).then(function (response){
                                vm.$refs.table.refresh();
                            });
                        }
                    },
                    cancel: {
                        text: 'Hủy bỏ'
                    }
                }
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
