<div class="hero">
    <section class="text-light textshadow">
        <h2 class="text-center staatliches-regular" style="font-size:100px">DAFTAR MENU</h2>
    </section>
</div>

<section class="pt-5 text-light tembus">
    <div class="text-center mb-5 dm-sans-bold" style="font-size:22px; margin:0; line-height:1;">
        <p>Kami menyediakan masakan berkualitas</p>
        <p>Dengan cita rasa yang nikmat dan lezat</p>
        <p>Siap memenuhi kebutuhan anda!</p>
    </div>

    <section class="py-4 bg-dark text-white" style="border-top-left-radius: 50px; border-top-right-radius: 50px">
        <div class="container">
            <?php foreach ($menu_berdasarkan_kategori as $kategori => $menus): ?>
                <h1 class="pt-4 staatliches-regular" style="font-size:40px;"><?= esc($kategori); ?></h1>
                <h1 class="mb-4" style="font-size:15px;"><?= esc($menus[0]['deskripsi_kategori']); ?></h1>
                <div class="row">
                    <?php foreach ($menus as $menu): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-5" data-aos="fade-up" data-aos-duration="800">
                            <div class="card text-light shadow text-uppercase card-custom position-relative"
                                style="border-radius: 15px; overflow: hidden;">
                                <!-- Gambar card -->
                                
                                    <img src="<?= base_url('uploads/menu/' . $menu['gambar_menu']); ?>"
                                        class="card-img-top" alt="<?= esc($menu['nama_menu']); ?>"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                            

                                <!-- Overlay Nama Menu dan Tombol -->
                                <div class="menu-overlay d-flex flex-column justify-content-center">
                                    <h5 class="text-light staatliches-regular mb-3" style="font-size:23px;">
                                        <?= esc($menu['nama_menu']); ?>
                                    </h5>
                                    <a href="<?= base_url('detailmenu/' . $menu['id_menu']); ?>"
                                        class="btn btn-danger btn-sm dm-sans-bold" style="font-size:12px;">
                                        Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</section>