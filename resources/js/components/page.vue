<template>
    <div class="wrapper">
        <sidebar></sidebar>
        <navigation></navigation>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{$route.meta.title}}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><b-link to="/">Dashboard</b-link></li>
                                <li class="breadcrumb-item active">
                                    <span>{{$route.meta.title}}</span>
                                </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <router-view></router-view>
                </div>
            </section>
        </div>
        <footer class="main-footer text-right">
            <span>powred by dsoft &copy; 2022</span>
        </footer>
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
    data: function () {
        return {

        }
    }
}
</script>
