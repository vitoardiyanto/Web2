<!-- EDIT KATEGORI -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Kategori</h1>
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

            <!-- FORM EDIT KATEGORI -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Form Edit Kategori</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('simpanUpdateKategori/' . $kategori['id_kategori']); ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- ID Kategori (Hidden) -->
                        <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori']; ?>">

                        <!-- Nama Kategori -->
                        <div class="form-group mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori:</label>
                            <input type="text" id="nama_kategori" name="nama_kategori" class="form-control <?= (session()->getFlashdata('errors')['nama_kategori'] ?? false) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama kategori" value="<?= old('nama_kategori', $kategori['nama_kategori']); ?>" required>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors')['nama_kategori'] ?? ''; ?>
                            </div>
                        </div>

                        <!-- Deskripsi Kategori -->
                        <div class="form-group mb-3">
                            <label for="deskripsi_kategori" class="form-label">Deskripsi Menu:</label>
                            <textarea id="deskripsi_kategori" name="deskripsi_kategori" class="form-control <?= (session()->getFlashdata('errors')['deskripsi_kategori'] ?? false) ? 'is-invalid' : ''; ?>" placeholder="Deskripsikan kategori" rows="4" required><?= old('deskripsi_kategori', $kategori['deskripsi_kategori']); ?></textarea>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors')['deskripsi_kategori'] ?? ''; ?>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group text-end">
                            <a href="<?= base_url('adminkategori'); ?>" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FORM EDIT KATEGORI END -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
