<template>
    <div class="wrapper">
        <sidebar></sidebar>
        <navigation></navigation>
        <div class="content-wrapper">
            <section class="content pt-3">
                <div class="container-fluid">
                    <router-view></router-view>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import sidebar from "./sidebar";
import navigation from "./navigation";
export default {
    name:'Page',
    components:{
        sidebar,navigation
    },
    mounted() {
        let vm = this;
        if(!vm.app._login){
            vm.$router.push('/auth/login');
        }
    },
}
</script>
