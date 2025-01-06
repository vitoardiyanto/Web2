<!-- Main Content -->
<section class="bg-light py-5" style="height:100vh">
    <div class="container nunito p-4">
        <!-- Pesan Session -->
        <?php if (session('id_role') == 2 && session()->getFlashdata('success')): ?>
            <div id="flash-success" class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (session('id_role') == 2 && session()->getFlashdata('error')): ?>
            <div id="flash-error" class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>


        <!-- Keranjang Kosong -->
        <?php if (empty($orders)): ?>
            <div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
                <div class="text-center">
                    <div class="alert alert-warning shadow" style="font-size: 16px; margin-bottom: 20px;">
                        <strong>Belum ada Pesanan</strong><br>Silakan Lakukan Pemesanan.
                    </div>
                    <a class="btn btn-danger shadow" href="<?= base_url('menu') ?>">Pilih Menu</a>
                </div>
            </div>
        <?php else: ?>
            <!-- Konten Keranjang jika tidak kosong -->


            <div class="row">
                <?php foreach ($orders as $orderDetail): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm border-light">
                            <div class="card-body">
                                <h5 class="card-title">Pesanan #<?= $orderDetail['order']['id_order'] ?></h5>
                                <p class="card-text"><strong>Status:</strong> <?= $orderDetail['order']['status_order'] ?></p>
                                <p class="card-text"><strong>Alamat:</strong> <?= $orderDetail['order']['alamat'] ?></p>
                                <p class="card-text"><strong>Tanggal Pesan:</strong> <?= $orderDetail['order']['tanggal_order'] ?></p>
                                <p class="card-text"><strong>Total Harga:</strong> Rp <?= number_format($orderDetail['order']['total_harga'], 0, ',', '.') ?></p>

                                <h6>Item Pesanan:</h6>
                                <ul class="list-unstyled">
                                    <?php foreach ($orderDetail['items'] as $item): ?>
                                        <li>
                                            <strong><?= $item['quantity'] ?> x <?= $item['nama_menu'] ?></strong>
                                            (Rp <?= number_format($item['harga_menu'], 0, ',', '.') ?>) -
                                            <span class="text-primary">Total: Rp <?= number_format($item['quantity'] * $item['harga_menu'], 0, ',', '.') ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    /* Main Section Style */
    section.bg-light {
        margin-top: 80px;
    }

    /* Responsive Grid Adjustment */
    @media (max-width: 768px) {
        section.bg-light {
            margin-top: 120px;
        }
    }

    /* Card Styling */
    .card {
        border-radius: 15px;
    }

    .card-body {
        font-size: 14px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
    }

    .card-text {
        font-size: 14px;
    }

    .text-primary {
        font-weight: bold;
        color: #007bff;
    }

    .list-unstyled {
        padding-left: 0;
    }
</style>