<template>
    <div>
        <b-breadcrumb :items="breadcrumb"></b-breadcrumb>
        <b-card>
            <b-row>
                <b-col cols="12" class="text-right">
                    <b-link size="sm" :to="{name:'service.create'}"><i class="fa fa-plus"></i> {{$t('button.create')}}</b-link>
                </b-col>
                <b-col cols="6">
                    <b-form-group
                        label="Tên dịch vụ:"
                        >
                        <b-form-input v-model="filter.name"></b-form-input>
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
                        label="Thao tác:"
                        >
                        <b-button @click="onFillter" block variant="secondary">
                            <i class="fa fa-search"></i> Tìm kiếm
                        </b-button>
                    </b-form-group>
                </b-col>
            </b-row>
        </b-card>
        <b-card class="mt-4">
            <b-table ref="table" class="bg-white"
                :fields="fields"
                :items="dataProvider"
                :per-page="list.per_page"
                :current-page="list.current_page"
                responsive show-empty>
                <template #cell(id)="data">
                    {{ data.index + 1 + ((list.current_page - 1) * list.per_page)}}
                </template>
                <template #cell(status)="data">
                    <b-form-checkbox switch v-model="data.item.status"></b-form-checkbox>
                </template>
                <template #cell(options)="data">
                    <b-dropdown variant="link" no-caret>
                        <template #button-content>
                            &#x1f50d;<span class="sr-only">Search</span>
                        </template>
                        <b-dropdown-item :to="{ name:'service.update', params:{ id:data.item.id }}" class="text-center">Chỉnh sửa</b-dropdown-item>
                        <b-dropdown-item @click="deleteItem(data.item.id)" class="text-center">
                            <span class="text-danger">Xóa</span>
                        </b-dropdown-item>
                    </b-dropdown>
                </template>
            </b-table>
        </b-card>
        <b-pagination
            pills align="center" v-model="list.current_page"
            :per-page="list.per_page"
            :total-rows="list.total"
            v-if="list.last_page > 1"
        ></b-pagination>
    </div>
</template>

<script>
const API_PRODUCT = '/api/service';
export default {
    name:'Service',
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
                code:null,
                name:null,
                status:null,
                page:1
            },
            list:{
                current_page: 1,
                data: {},
                last_page: 1,
                prev_page_url: null,
                next_page_url: null,
                per_page: 15,
                total: 0,
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
                    label: 'Tên dịch vụ',
                    tdClass: 'text-left align-middle',
                    thStyle: {
                        textAlign: 'left',
                        verticalAlign: 'middle'
                    },
                }
                , {
                    key: 'price',
                    label: 'Đơn giá',
                    tdClass: 'text-right align-middle',
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
                    key: 'status',
                    label: 'Hiển thị',
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '8%',
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
    mounted() {
        let vm = this;
        vm.breadcrumb.push({
            text:'Dịch vụ',
            href:'#'
        });
    },
    methods:{
        onFillter:function(){
            let vm = this;
            vm.$refs.table.refresh();
        },
        dataProvider:function(ctx){
            let vm = this;
            vm.filter.page = ctx.currentPage;
            return axios.get(API_PRODUCT,{params: vm.filter}).then(function(response){
                vm.list = response.data;
                return response.data.data || [];
            });
        },
        deleteItem:function(id){
            let vm = this;
            $.confirm({
                title: 'Thông báo',
                content: 'Bạn có muốn xóa dịch vụ này ?',
                icon: 'fas fa-exclamation-circle',
                backgroundDismiss: true,
                animateFromElement: false,
                buttons: {
                    tryAgain: {
                        text: 'Đồng ý',
                        btnClass: 'btn-red',
                        action: function(){
                            axios.delete(API_PRODUCT+'/'+id).then(function (response){
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
