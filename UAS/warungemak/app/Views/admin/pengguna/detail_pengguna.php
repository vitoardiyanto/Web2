<!-- DETAIL PENGGUNA -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a class="btn btn-success btn"
                        href="<?= base_url('adminpengguna'); ?>">
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>
                    <h1 class="mt-3">Akun Pengguna</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Profil Pengguna -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <!-- Gambar Profil -->
                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;" alt="User Profile Picture">
                            <h4 class="nunito-bold"><?= esc($user['nama']); ?></h4>
                            <p class="text-muted"><?= esc($user['email']); ?></p>
                            <!-- Button untuk edit profil atau ganti password -->
                            <a href="<?= base_url('user/edit/' . $user['id_users']); ?>" class="btn btn-primary btn-sm">Edit Profil</a>
                        </div>
                    </div>
                </div>

                <!-- Informasi Pengguna -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Informasi Akun</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between">
                                    <strong>Nama Lengkap</strong> <span>: <?= esc($user['nama']); ?></span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <strong>Nomor HP</strong> <span>: <?= esc($user['nomor_hp']); ?></span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <strong>Jenis Kelamin</strong> <span>: <?= ucfirst($user['jenis_kelamin']); ?></span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <strong>Tanggal Lahir</strong> <span>: <?= date('d M Y', strtotime($user['tgl_lahir'])); ?></span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <strong>Email</strong> <span>: <?= esc($user['email']); ?></span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <strong>Alamat</strong> <span>: <?= esc($user['alamat']); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- DETAIL PENGGUNA END -->

<style>
    .card-body ul li {
        margin-bottom: 10px;
        /* Jarak antar baris */
    }

    .card-body strong {
        width: 150px;
        /* Lebar kolom label agar konsisten */
    }

    .card-body span {
        flex: 1;
        /* Memastikan sisa ruang diisi oleh nilai */
    }
</style>