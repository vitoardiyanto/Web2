<!-- CREATE GALERI -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Galeri</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Pesan Session -->
            <?php if (session()->getFlashdata('success')): ?>
                <div id="flash-success" class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div id="flash-error" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <!-- Pesan Session END -->

            <!-- FORM TAMBAH GALERI -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Form Tambah Galeri</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('simpanTambahGaleri'); ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- Gambar Testimoni -->
                        <div class="form-group mb-4">
                            <label for="gambar_galeri" class="form-label">Unggah Gambar:</label>
                            <input type="file" id="gambar_galeri" name="gambar_galeri" class="form-control <?= (session()->getFlashdata('errors')['gambar_galeri'] ?? false) ? 'is-invalid' : ''; ?>" accept="image/*" required>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors')['gambar_galeri'] ?? ''; ?>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group text-end">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah Galeri</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FORM TAMBAH GALERI END -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->