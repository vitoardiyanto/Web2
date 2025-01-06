<!-- CREATE MENU -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Menu</h1>
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

            <!-- FORM TAMBAH MENU -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Form Tambah Menu</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('simpanTambahMenu'); ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- Nama Menu -->
                        <div class="form-group mb-3">
                            <label for="nama_menu" class="form-label">Nama Menu:</label>
                            <input type="text" id="nama_menu" name="nama_menu" class="form-control <?= (session()->getFlashdata('errors')['nama_menu'] ?? false) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama menu" value="<?= old('nama_menu'); ?>" required>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors')['nama_menu'] ?? ''; ?>
                            </div>
                        </div>

                        <!-- Kategori Menu -->
                        <div class="form-group mb-3">
                            <label for="id_kategori" class="form-label">Kategori Menu:</label>
                            <select id="id_kategori" name="id_kategori" class="form-control <?= (session()->getFlashdata('errors')['id_kategori'] ?? false) ? 'is-invalid' : ''; ?>" required>
                                <option value="" disabled selected>Pilih kategori</option>
                                <?php foreach ($kategori as $item): ?>
                                    <option value="<?= $item['id_kategori']; ?>"><?= $item['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                                <!-- Tambahkan kategori sesuai kebutuhan -->
                            </select>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors')['id_kategori'] ?? ''; ?>
                            </div>
                        </div>

                        <!-- Deskripsi Menu -->
                        <div class="form-group mb-3">
                            <label for="deskripsi_menu" class="form-label">Deskripsi Menu:</label>
                            <textarea id="deskripsi_menu" name="deskripsi_menu" class="form-control <?= (session()->getFlashdata('errors')['deskripsi_menu'] ?? false) ? 'is-invalid' : ''; ?>" placeholder="Deskripsikan menu ini" rows="4" required><?= old('deskripsi_menu'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors')['deskripsi_menu'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="harga_menu" class="form-label">Harga:</label>
                            <input type="text" id="harga_menu" name="harga_menu" class="form-control <?= (session()->getFlashdata('errors')['harga_menu'] ?? false) ? 'is-invalid' : ''; ?>" placeholder="Masukkan harga menu" value="<?= old('harga_menu'); ?>" required>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors')['harga_menu'] ?? ''; ?>
                            </div>
                        </div>

                        <!-- Gambar Menu -->
                        <div class="form-group mb-4">
                            <label for="gambar_menu" class="form-label">Unggah Gambar:</label>
                            <input type="file" id="gambar_menu" name="gambar_menu" class="form-control <?= (session()->getFlashdata('errors')['gambar_menu'] ?? false) ? 'is-invalid' : ''; ?>" accept="image/*" required>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors')['gambar_menu'] ?? ''; ?>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group text-end">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah Menu</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FORM TAMBAH MENU END -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->