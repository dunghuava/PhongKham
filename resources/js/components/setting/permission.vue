<template>
    <div>
        <b-breadcrumb :items="breadcrumb"></b-breadcrumb>
        <b-card>
            <b-row>
                <b-col cols="6">
                    <b-form-group
                        :label="$t('permission.name')"
                        :invalid-feedback="invalidFeedback('name')"
                        >
                        <b-form-input :state="state('name')" v-model="frmData.name"></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col cols="3">
                    <b-form-group
                        :label="$t('permission.guard_name')"
                        :invalid-feedback="invalidFeedback('guard_name')"
                        >
                        <b-form-input :state="state('guard_name')" :formatter="formatGuarName" v-model="frmData.guard_name"></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col cols="3">
                    <b-form-group
                        :label="$t('button.action')"
                        >
                        <b-button v-if="frmData.id" @click="updateItem(frmData.id)" block variant="secondary">
                            <i class="fa fa-save"></i> {{ $t('button.update') }}
                        </b-button>
                        <b-button v-else @click="createItem" block variant="secondary">
                            <i class="fa fa-save"></i> {{ $t('button.save') }}
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
                <template #cell(options)="data">
                    <b-dropdown variant="link" no-caret>
                        <template #button-content>
                            &#x1f50d;<span class="sr-only">Search</span>
                        </template>
                        <b-dropdown-item @click="getItem(data.item)" class="text-center">Chỉnh sửa</b-dropdown-item>
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
const API_PERMISSION = '/api/permission';
export default {
    name:'Permission',
    data(){
        return {
            isBusy:false,
            filter:{
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
            frmData:{
                id:null,
                name:null,
                guard_name:null
            },
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
                    label: this.$t('permission.name'),
                    tdClass: 'text-left align-middle',
                    thStyle: {
                        textAlign: 'left',
                        verticalAlign: 'middle'
                    },
                },
                {
                    key: 'guard_name',
                    label: this.$t('permission.guard_name'),
                    tdClass: 'text-left align-middle',
                    thStyle: {
                        width: '20%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                },
                {
                    key: 'updated_at',
                    label: this.$t('button.update'),
                    tdClass: 'text-center align-middle',
                    thStyle: {
                        width: '15%',
                        textAlign: 'center',
                        verticalAlign: 'middle'
                    },
                },
                {
                    key: 'options',
                    label: this.$t('button.action'),
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
            text:'Permission',
            href:'#'
        });
    },
    methods:{
        onFillter:function(){
            let vm = this;
            vm.$refs.table.refresh();
        },
        getItem:function(item){
            let vm = this;
            vm.frmData = {...item};
        },
        createItem:function(){
            let vm = this;
            vm.errors = {};
            vm.isBusy = true;
            axios.post(API_PERMISSION,vm.frmData).then(function (response){
                vm.isBusy = false;
                vm.$refs.table.refresh();
                vm.frmData = {};
            }).catch(function(errors){
                vm.isBusy = false;
                vm.errors = errors.response.data.errors;
            });
        },
        updateItem:function(id){
            let vm = this;
            vm.errors = {};
            vm.isBusy = true;
            axios.put(API_PERMISSION +'/'+ id,vm.frmData).then(function (response){
                vm.isBusy = false;
                vm.$refs.table.refresh();
                vm.frmData = {};
            }).catch(function(errors){
                vm.isBusy = false;
                vm.errors = errors.response.data.errors;
            });
        },
        formatGuarName:function(value){
            return value.replace(/[^a-z-A-Z_]/,'').toLowerCase();
        },
        dataProvider:function(ctx){
            let vm = this;
            vm.filter.page = ctx.currentPage;
            return axios.get(API_PERMISSION,{params: vm.filter}).then(function(response){
                vm.list = response.data;
                return response.data.data || [];
            });
        },
        deleteItem:function(id){
            let vm = this;
            $.confirm({
                title: 'Thông báo',
                content: 'Bạn có muốn xóa mục này ?',
                icon: 'fas fa-exclamation-circle',
                backgroundDismiss: true,
                animateFromElement: false,
                buttons: {
                    tryAgain: {
                        text: this.$t('button.accept'),
                        btnClass: 'btn-red',
                        action: function(){
                            axios.delete(API_PERMISSION+'/'+id).then(function (response){
                                vm.$refs.table.refresh();
                            });
                        }
                    },
                    cancel: {
                        text: this.$t('button.cancel')
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
