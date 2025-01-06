<nav class="navbar navbar-expand-lg navbar-dark tembus fixed-top px-4 py-3">
    <div class="container-fluid d-flex align-items-center">

        <!-- Logo -->
        <a class="navbar-brand" href="home">
            <img src="<?= base_url('img/logo2.png'); ?>" style="width: 200px; height: auto;">
        </a>

        <!-- Navbar Toggler Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto navbar-dark dm-sans-bold gap-2" style="font-size: 13px;">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentUri == 'home') ? 'active' : ''; ?>" href="<?= base_url('home'); ?>">BERANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentUri == 'menu') ? 'active' : ''; ?>" href="<?= base_url('menu'); ?>">MENU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentUri == 'testimoni') ? 'active' : ''; ?>" href="<?= base_url('testimoni'); ?>">TESTIMONI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentUri == 'galeri') ? 'active' : ''; ?>" href="<?= base_url('galeri'); ?>">GALERI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentUri == 'about') ? 'active' : ''; ?>" href="<?= base_url('about'); ?>">ABOUT</a>
                </li>
            </ul>
        </div>

        <!-- Tampilkan Tombol Login atau Profil User -->
        <div class="nav-item mt-2 me-5">
            <?php if (session('isLoggedInUser')): ?>
                <!-- Tampilkan Ikon User dan Nama -->
                <a href="#" class="text-white d-flex align-items-center dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;"> <i class="bi bi-person-circle" style="font-size: 20px;"></i> <!-- Ikon User -->
                    <span class="ms-2 nunito-bold" style="font-size: 15px;"><?= session('nama'); ?></span>
                </a>
                <ul class="dropdown-menu animated fadeIn" aria-labelledby="userDropdown" data-bs-offset="0,10" data-bs-placement="bottom-start">
                    <li><a class="dropdown-item" href="<?= base_url('profile'); ?>">Profil</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('pesanan'); ?>">Pesanan</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('settings'); ?>">Pengaturan</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger" href="<?= base_url('logoutusers'); ?>">Logout</a></li>
                </ul>
            <?php else: ?>
                <!-- Tampilkan Tombol Login -->
                <a class="text-white" href="<?= base_url('login'); ?>" style="text-decoration: none;">
                    <i class="bi bi-box-arrow-in-right" style="font-size: 20px;"></i> <!-- Ikon Login -->
                    <span class="ms-2 nunito-bold" style="font-size: 15px;">Login</span>
                </a>
            <?php endif; ?>
        </div>

        <!-- Tombol Keranjang -->
        <div class="nav-item mt-2">
            <a class="text-white" href="<?= base_url('keranjang'); ?>" id="navbarCart" style="text-decoration: none;">
                <i class="bi bi-cart-fill" style="font-size: 20px;"></i> <!-- Ikon Keranjang -->
                <span class="ms-2 nunito-bold" style="font-size: 15px;">Keranjang</span>
            </a>
        </div>

    </div>
</nav>
