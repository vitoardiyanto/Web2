<!-- SIDEBAR ADMIN -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin" class="brand-link text-center">
        <img src="<?= base_url('img/logo2.png'); ?>" style="width: 170px; height: auto;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#Profile" class="text-white d-flex align-items-center" style="text-decoration: none;"> <i class="bi bi-person-circle" style="font-size: 25px;"></i> <!-- Ikon User -->
                    <h5 class="nunito-bold" style="margin: 10px"><?= session()->get('username'); ?></h5>
                </a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header">KONFIGURASI</li>
                <li class="nav-item">
                    <a href="#Menu" class="nav-link">
                        <i class="nav-icon fas bi-book"></i>
                        <p>
                            Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('adminkategori'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('adminmenu'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admingaleri'); ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admintestimoni'); ?>" class="nav-link">
                        <i class="nav-icon fas bi-hand-thumbs-up"></i>
                        <p>
                            Testimoni
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('adminpesanan'); ?>" class="nav-link">
                        <i class="nav-icon fas bi-cart"></i>
                        <p>
                            Pesanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('adminpengguna'); ?>" class="nav-link">
                        <i class="nav-icon fas bi-people-fill"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('adminpengiriman'); ?>" class="nav-link">
                        <i class="nav-icon fas bi-truck"></i>
                        <p>
                            Pengiriman
                        </p>
                    </a>
                </li>

                <li class="nav-header">PENGATURAN</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far bi-globe-americas"></i>
                        <p>
                            Bahasa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#Indo" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Indonesia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#English" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>English</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Malay</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Arabic</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('logout'); ?>" class="nav-link">
                        <i class="nav-icon fas bi-box-arrow-left"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- SIDEBAR ADMIN END -->