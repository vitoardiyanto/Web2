<section class="py-5 bg-light text-black nunitod">
    <div class="container-fluid nunito">
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

        <div class="ms-4">
            <a class="text-black" style="font-size: 30px;" onclick="window.history.back()"><i class="bi bi-arrow-left"></i></a>
        </div>


        <div class="container">
            <div class="row align-items-center">
                <!-- Gambar Menu -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="card  me-5 mb-5">
                        <img src="<?= base_url('uploads/menu/' . esc($menu['gambar_menu'])); ?>"
                            class="card-img-top rounded shadow-lg"
                            alt="<?= esc($menu['nama_menu']); ?>"
                            style="width: 100%; height: 400px; object-fit: cover;">
                    </div>
                </div>

                <!-- Detail Menu -->
                <div class="col-lg-4">
                    <h2 class="mb-3" style="font-size: 36px; font-weight:bold;"><?= esc($menu['nama_menu']); ?></h2>
                    <p class="mb-3" style="font-size: 18px; line-height: 1.6;"><?= esc($menu['deskripsi_menu']); ?></p>
                    <p class="mb-4" style="font-size: 28px; color: #d9534f;">Rp <?= number_format(esc($menu['harga_menu']), 0, ',', '.'); ?></p>

                    <form action="<?= base_url('tambahkeranjang') ?>" method="post">
                        <?= csrf_field() ?> <!-- Tambahkan CSRF Token untuk keamanan -->

                        <div class="d-flex align-items-center mb-4">
                            <label for="quantity" class="me-3" style="font-size: 18px;">Jumlah:</label>
                            <input type="hidden" name="id_menu" value="<?= $menu['id_menu'] ?>">
                            <input type="number" id="quantity" name="quantity" value="1" min="1"
                                class="form-control text-dark  text-center "
                                style="width: 80px; font-size: 18px;">
                        </div>

                        <button type="submit" class="btn btn-danger btn-lg px-4 shadow">
                            <i class="bi bi-cart-plus me-2"></i>Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
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
    }
</style>