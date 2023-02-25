<template>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <sidebar></sidebar>
            <div class="layout-page">
                <navigation></navigation>
                <div class="content-wrapper">
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
    </div>
</template>

<script>
import sidebar from "./sidebar";
import navigation from "./navigation";
export default {
    name: 'Page',
    components: {
        sidebar, navigation
    },
    mounted() {
        let vm = this;
        if (!vm.app._login) {
            vm.$router.push('/auth/login');
        }
    },
}
</script>
