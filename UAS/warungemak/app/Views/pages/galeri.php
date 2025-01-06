
<div class="hero">
    <section class="text-light textshadow">
        <h2 class="text-center staatliches-regular" style="font-size:100px">GALERI</h2>
    </section>
</div>

<section class="pt-5 text-light tembus">
   

<!-- Hero Section -->
<section class="py-5 bg-dark" style="border-top-left-radius: 50px; border-top-right-radius: 50px">
    <div class="container text-center">
        <div class="row justify-content-center py-4">
            <?php foreach ($galeri as $index => $item): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-duration="800">
                    <div class="card shadow position-relative" style="border-radius: 15px; overflow: hidden;">
                        <!-- Gambar Galeri -->
                        <img 
                            src="<?= base_url('uploads/galeri/' . $item['gambar_galeri']); ?>" 
                            class="card-img-top img-fluid galeri-img" 
                            alt="Galeri <?= $index + 1; ?>"
                            data-bs-toggle="modal"
                            data-bs-target="#modalGaleri<?= $index; ?>"
                            style="width: 100%; height: 400px; object-fit: cover;">
                    </div>
                </div>

                <!-- Modal Detail Galeri -->
                <div class="modal fade" id="modalGaleri<?= $index; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $index; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-light">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center bg-light" style="max-height: 80vh; overflow-y: auto;">
                                <!-- Gambar Detail -->
                                <img 
                                    src="<?= base_url('uploads/galeri/' . $item['gambar_galeri']); ?>" 
                                    class="img-fluid rounded shadow"
                                    alt="Galeri <?= $index + 1; ?>"
                                    style="max-width: 60%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</section>

