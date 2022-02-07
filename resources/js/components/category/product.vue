<template>
    <div>
        <b-table
            :fields="fields"
            stacked="md"
            show-empty
            small
        >

        </b-table>
    </div>
</template>

<script>
export default {
    name:'Product',
    data(){
        return {
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
            ]
        }
    }
}
</script>
