<template>
    <aside class="main-sidebar shadow">
        <div class="sidebar">
            <a to="/" class="brand-link text-center text-success">
                <span class="brand-text font-weight-light">Phong Kham</span>
            </a>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item">
                        <b-link to="/" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Tổng quan
                            </p>
                        </b-link>
                    </li>
                    <li class="nav-item">
                        <b-link class="nav-link">
                            <i class="nav-icon fas fa-store"></i>
                            <p>
                                Danh mục
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </b-link>
                        <ul class="nav nav-treeview">
                            <li>
                                <b-link to="/service/list" class="nav-link">
                                    <p>Dịch vụ</p>
                                </b-link>
                            </li>
                            <li>
                                <b-link to="/product/list" class="nav-link">
                                    <p>Sản phẩm</p>
                                </b-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <b-link class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Cài đặt
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </b-link>
                        <ul class="nav nav-treeview">
                            <li>
                                <b-link to="/setting/profile" class="nav-link">
                                    <p>Cá nhân</p>
                                </b-link>
                            </li>
                            <li>
                                <b-link to="/setting/system" class="nav-link">
                                    <p>Hệ thống</p>
                                </b-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>

<script>
export default {
    name:'Sidebar'
}
</script>
