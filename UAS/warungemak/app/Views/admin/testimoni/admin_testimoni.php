<!-- ADMIN TESTIMONI -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Testimoni</h1>
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
                <div id="flash-success" class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div id="flash-error" class="alert alert-danger">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <!-- Pesan Session END -->

            <!-- TABEL TESTIMONI -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Testimoni</h3>
                                    <a href="<?= base_url('tambahTestimoni'); ?>" class="btn btn-primary float-right" id="add-menu-btn" >
                                        <i class="fas fa-plus"></i> Tambah Testimoni
                                    </a>

                                    <form action="<?= base_url('hapusSemuaTestimoni') ?>" method="post">
                                        <?= csrf_field() ?> <!-- Tambahkan CSRF protection untuk keamanan -->
                                        <button type="submit" class="btn btn-danger float-right mr-2" onclick="return confirm('Apakah Anda yakin ingin menghapus semua data?')">
                                            Hapus Semua Testimoni
                                        </button>
                                    </form>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <table id="menu-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Foto Testimoni</th>
                                                <th class="text-center">Nama Pelanggan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no = 1;
                                            foreach ($testimoni as $item): ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?= $no++; ?></td>
                                                    <td class="text-center align-middle">
                                                        <img src="<?= base_url('uploads/testimoni/' . $item['gambar_testimoni']); ?>" width="150px" height="auto">
                                                    </td>
                                                    <td class="text-center align-middle"><?= $item['nama_pelanggan_testimoni']; ?></td>
                                                    <td class="text-center align-middle">
                                                        <a class="btn btn-danger btn-md delete-btn"
                                                            href="<?= base_url('hapusTestimoni/' . $item['id_testimoni']); ?>"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- TABEL TESTIMONI END -->

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ADMIN TESTIMONI -->