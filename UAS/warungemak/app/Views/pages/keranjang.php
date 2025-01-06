<!-- Main Content -->

<section class="bg-light" style="height:100vh">
    <div class="container-fluid nunito p-4">
        <!-- Pesan Session -->
        <?php if (session()->getFlashdata('success')): ?>
            <div id="flash-success" class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div id="flash-error" class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>


        <!-- Keranjang Kosong -->
        <?php if (empty($ItemsKeranjang)): ?>
            <div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
                <div class="text-center">
                    <div class="alert alert-warning shadow" style="font-size: 16px; margin-bottom: 20px;">
                        <strong>Keranjang Anda kosong!</strong><br>Silakan tambahkan menu ke keranjang.
                    </div>
                    <a class="btn btn-danger shadow" href="<?= base_url('menu') ?>">Pilih Menu</a>
                </div>
            </div>
        <?php else: ?>
            <!-- Konten Keranjang jika tidak kosong -->


            <h2 class="text-start px-5 text-dark nunito-bold">Keranjang</h2>
            <!-- Layout Keranjang -->
            <div class="row g-3">
                <!-- Kolom Kartu Menu -->
                <div class="col-12 col-md-8 px-5">
                    <div class="row g-3">
                        <?php foreach ($ItemsKeranjang as $item): ?>
                            <!-- Kolom Kartu Menu -->
                            <div class="col-12">
                                <div class="card p-3 shadow" style="border-radius: 10px; border: 1px solid #ddd;">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <!-- Gambar -->
                                        <div class="mb-3 mb-md-0" style="flex: 0 0 auto;">
                                            <img src="<?= base_url('uploads/menu/' . $item['gambar_menu']); ?>"
                                                class="rounded"
                                                alt="<?= $item['nama_menu']; ?>"
                                                style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd;">
                                        </div>
                                        <!-- Detail -->
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="nunito-bold text-start" style="font-size: 20px;"><?= $item['nama_menu']; ?></h6>
                                            <p class="mb-0 text-start" style="font-size: 14px; text-shadow:none;">
                                                Harga: Rp <?= number_format($item['harga'], 0, ',', '.'); ?>
                                            </p>
                                            <p class="mb-0 text-start" style="font-size: 14px; text-shadow:none;">
                                                Total: Rp <?= number_format($item['quantity'] * $item['harga'], 0, ',', '.'); ?>
                                            </p>

                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <p class="mb-0 text-start" style="font-size: 14px; text-shadow:none;">
                                                    Jumlah: <?= number_format($item['quantity'], 0, ',', '.'); ?>
                                                </p>

                                                <!-- Button Kurangi Quantity -->
                                                <a href="<?= base_url('keranjang/kurangi/' . $item['id_keranjang']); ?>" class="btn btn-warning btn-sm py-1 px-2">
                                                    <i class="bi bi-dash"></i> Kurang
                                                </a>

                                                <!-- Button Tambah Quantity -->
                                                <a href="<?= base_url('keranjang/tambah/' . $item['id_keranjang']); ?>" class="btn btn-success btn-sm py-1 px-2">
                                                    <i class="bi bi-plus"></i> Tambah
                                                </a>

                                                <!-- Form untuk Hapus Item -->
                                                <form action="<?= base_url('keranjang/hapus/' . $item['id_keranjang']); ?>" method="POST" class="d-inline">
                                                    <button type="submit" class="btn btn-danger btn-sm py-1 px-2">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Kolom Total dan Checkout -->
                <?php
                $totalHarga = 0;
                foreach ($ItemsKeranjang as $item) {
                    $totalHarga += $item['quantity'] * $item['harga'];
                }
                ?>
                <div class="col-12 col-md-4 px-5">
                    <div class="sticky-top" style="top: 100px;"> <!-- Sticky pada tampilan Desktop -->
                        <div class="card p-3 shadow" style="border-radius: 10px; border: 1px solid #ddd; box-shadow: none;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="nunito-bold mb-0">Total Harga</h5>
                                <p class="mb-0" style="font-weight: bold; font-size: 18px; text-shadow:none;">
                                    Rp <?= number_format($totalHarga, 0, ',', '.'); ?>
                                </p>
                            </div>
                            <div class="mt-3">
                                <a href="<?= site_url('checkout'); ?>" class="btn btn-success btn-lg w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


<style>
    /* Atur jarak antar elemen di mobile */
    section.bg-light {
        margin-top: 80px;
        /* Tinggi default navbar */
    }

    @media (max-width: 576px) {
        section.bg-light {
            margin-top: 120px;
            /* Tinggi navbar bisa lebih besar di mobile */
        }

        .card {
            padding: 10px !important;
        }

        .card img {
            width: 80px !important;
            height: 60px !important;
        }

        .card h6 {
            font-size: 14px !important;
        }

        .card p {
            font-size: 12px !important;
        }

        .btn {
            font-size: 12px !important;
        }
    }
</style>