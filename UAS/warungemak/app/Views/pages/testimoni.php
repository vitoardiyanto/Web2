<div class="hero">
    <section class="text-light textshadow">
        <h2 class="text-center staatliches-regular" style="font-size:100px">TESTIMONI PELANGGAN</h2>
    </section>
</div>

<section class="pt-5 text-light tembus">
    <div class="text-center mb-5"></div>

    <!-- Hero Section -->
    <section class="py-4 bg-dark text-white" style="border-top-left-radius: 50px; border-top-right-radius: 50px">
        <div class="container text-center">
            <h2 class="mb-4 mt-4 staatliches-regular" style="font-size:50px;">Testimoni Pelanggan</h2>
            <div class="row d-flex justify-content-center py-4">
                <?php foreach ($testimoni as $index => $item): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-duration="800">
                        <div class="card bggrey text-white shadow-lg border-0" style="border-radius: 15px;">
                            <!-- Gambar dengan modal trigger -->
                            <img src="<?= base_url('uploads/testimoni/' . esc($item['gambar_testimoni'])); ?>"
                                class="card-img-top rounded-top"
                                style="width: 100%; height: 250px; object-fit: cover; cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#modalTestimoni<?= $index; ?>">
                            <div class="card-body text-start">
                                <h5 class="card-title " style="font-size:12px;">Dari Yth:</h5>
                                <p class="card-text dm-sans-bold" style="font-size:17px;"><?= esc($item['nama_pelanggan_testimoni']); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal untuk Gambar Testimoni -->
                    <div class="modal fade" id="modalTestimoni<?= $index; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $index; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-light">
                                    <h5 class="modal-title staatliches-regular" id="modalLabel<?= $index; ?>" style="font-size:25px;">
                                        Testimoni Pelanggan
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center bg-light" style="max-height: 80vh; overflow-y: auto;">
                                    <!-- Gambar Detail yang bisa di-scroll -->
                                    <img src="<?= base_url('uploads/testimoni/' . esc($item['gambar_testimoni'])); ?>"
                                        class="img-fluid rounded shadow"
                                        style="max-width: 60%; height: auto; object-fit: contain;"
                                        alt="Testimoni <?= $index + 1; ?>">
                                    <!-- Deskripsi Testimoni -->
                                    <p class="mt-3 staatliches-regular" style="font-size:20px;"><?= esc($item['nama_pelanggan_testimoni']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</section>