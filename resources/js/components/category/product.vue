<template>
    <div>
        <div class="text-right mb-2">
            <b-button variant="success" v-b-modal.modal-1>
                <i class="fa fa-plus"></i> Thêm mới
            </b-button>
        </div>
        <b-modal id="modal-1" title="Thêm sản phẩm">
            <b-form-group
                label="Tên sản phẩm"
                :invalid-feedback="invalidFeedback('name')"
                :state="state">
                <b-form-input  :state="state('name')" trim></b-form-input>
            </b-form-group>
            <b-form-group
                label="Đơn giá"
                :invalid-feedback="invalidFeedback('price')"
                :state="state">
                <b-form-input  :state="state('price')" trim></b-form-input>
            </b-form-group>
            <b-form-group
                label="Số lượng"
                :invalid-feedback="invalidFeedback('amount')"
                :state="state">
                <b-form-input  :state="state('amount')" trim></b-form-input>
            </b-form-group>
            <b-form-group
                label="Trạng thái"
                :invalid-feedback="invalidFeedback('status')"
                :state="state">
                <b-form-select :options="options.status"></b-form-select>
            </b-form-group>
            <template #modal-footer>
                <div class="w-100">
                    <b-button variant="danger" class="mr-2">Đóng</b-button>
                    <b-button variant="primary">Lưu lại</b-button>
                </div>
            </template>
        </b-modal>
        <b-table
            :fields="fields"
            class="table-striped border"
            show-empty
        >
        </b-table>
    </div>
</template>

<script>
export default {
    name:'Product',
    data(){
        return {
            options:{
                status:[
                    {value:1,text:'Kích hoạt'},
                    {value:0,text:'Không kích hoạt'}
                ]
            },
            fields: [
                {
                    key: 'index',
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
                    key: 'category_name',
                    label: 'Tên danh mục',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '15%',
                        textAlign: 'center',
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
                },
                {
                    key: 'amount',
                    label: 'Số lượng',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '10%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                },
                {
                    key: 'updated_at',
                    label: 'Cập nhật',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '10%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                },
                {
                    key: 'option',
                    label: 'Thao tác',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '10%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                }
            ],
            errors:{}
        }
    },
    methods:{
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
