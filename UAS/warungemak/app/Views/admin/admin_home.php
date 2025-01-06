

<!-- ADMIN HOME -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-1">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Card: Daftar Menu -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Daftar Menu</h5>
                        <h3><?= $daftar_menu_count ?></h3>
                        <i class="bi bi-list-ul fs-1"></i>
                    </div>
                </div>
            </div>

            <!-- Card: Kategori Menu -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori Menu</h5>
                        <h3><?= $kategori_menu_count ?></h3>
                        <i class="bi bi-tags fs-1"></i>
                    </div>
                </div>
            </div>

            <!-- Card: Testimoni -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Testimoni</h5>
                        <h3><?= $testimoni_count ?></h3>
                        <i class="bi bi-chat-dots fs-1"></i>
                    </div>
                </div>
            </div>

            <!-- Card: Galeri -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Galeri</h5>
                        <h3><?= $galeri_count ?></h3>
                        <i class="bi bi-images fs-1"></i>
                    </div>
                </div>
            </div>

            <!-- Card: Users -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-white mb-3" style="background-color: indigo">
                    <div class="card-body text-center">
                        <h5 class="card-title">Akun Pengguna</h5>
                        <h3><?= $pengguna_count ?></h3>
                        <i class="bi bi-people fs-1"></i>
                    </div>
                </div>
            </div>

            <!-- Card: Pengiriman -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pengiriman</h5>
                        <h3><?= $pengiriman_count ?></h3>
                        <i class="bi bi-truck fs-1"></i>
                    </div>
                </div>
            </div>

            <!-- Card: Pesanan -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-white mb-3" style="background-color: darkcyan;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pesanan</h5>
                        <h3><?= $pesanan_count ?></h3>
                        <i class="bi bi-cart fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ADMIN HOME END -->

<style>
/* General styling for cards */
.card {
    border-radius: 20px;
    transition: all 0.3s ease-out;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    overflow: hidden; /* Hide any part that's outside border radius */
    position: relative;
    background: #ffffff; /* Default white background for better contrast */
    background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.1), rgba(255, 255, 255, 0)); /* Gradient for a subtle effect */
}

/* Hover Effects */
.card:hover {
    transform: translateY(-10px) scale(1.05); /* Slight scale and lift on hover */
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
}

.card-body {
    padding: 20px;
}

/* Title in card */
.card-title {
    font-size: 1.4rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    color: #ffffff; /* White text color for contrast */
}

/* Count inside card */
.card h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 15px 0;
    color: #ffffff; /* White text for the count */
}

/* Icon styling with hover effects */
.card i {
    font-size: 40px;
    opacity: 0.85;
    transition: opacity 0.2s ease, transform 0.2s ease-in-out;
}

.card i:hover {
    opacity: 1;
    transform: rotate(15deg); /* Rotate effect when hovered */
}

/* Unique background color per card */
.bg-primary {
    background-color: #4e73df; /* Rich blue */
    background-image: linear-gradient(to right, #4e73df, #1e3c72); /* Subtle gradient */
}

.bg-success {
    background-color: #1cc88a;
    background-image: linear-gradient(to right, #1cc88a, #26d4a1);
}

.bg-warning {
    background-color: #f7c500;
    background-image: linear-gradient(to right, #f7c500, #f7d500);
}

.bg-danger {
    background-color: #e74a3b;
    background-image: linear-gradient(to right, #e74a3b, #ff5966);
}

.bg-dark {
    background-color: #343a40;
    background-image: linear-gradient(to right, #343a40, #606060);
}

.bg-indigo {
    background-color: #6610f2;
    background-image: linear-gradient(to right, #6610f2, #7517fc);
}

/* Text color customization */
.card.text-white {
    color: #ffffff;
}

/* Card hover effect for user interaction */
.card-body:hover {
    opacity: 0.9;
    cursor: pointer;  /* Show pointer cursor to indicate hoverable card */
}

/* Mobile responsive card layout */
@media (max-width: 768px) {
    .card {
        margin-bottom: 20px;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);  /* Adjust for small screen size */
    }
}

/* Additional responsive tweaks for text */
@media (max-width: 576px) {
    .card-title {
        font-size: 1.2rem;
    }

    .card h3 {
        font-size: 2rem;
    }

    .card i {
        font-size: 35px;
    }
}

</style>