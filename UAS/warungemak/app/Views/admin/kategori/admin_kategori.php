<!-- ADMIN KATEGORI -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

        <!-- TABEL KATEGORI -->
        <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Kategori Menu</h3>
                                    <a href="<?= base_url('tambahKategori'); ?>" class="btn btn-primary float-right" id="add-menu-btn" >
                                        <i class="fas fa-plus"></i> Tambah Kategori
                                    </a>

                                </div>
                                <!-- /.card-header -->

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

                                <div class="card-body">
                                    <table id="menu-table" class="table table-bordered table-striped">
                                        <thead>
                                            <p style="color:rgb(255, 187, 0);">Perhatian! semua menu yang terkait dengan kategori yang dihapus akan ikut terhapus</p>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($kategori_menu as $item): ?>
                                                <tr>
                                                    <td><?= $item['id_kategori']; ?></td>
                                                    <td><?= $item['nama_kategori']; ?></td>
                                                    <td><?= $item['deskripsi_kategori']; ?></td>
                                                    <td>
                                                        <a class="btn btn-danger btn-sm delete-btn"
                                                            href="<?= base_url('hapusKategori/' . $item['id_kategori']); ?>"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            Hapus
                                                        </a> 
                                                        <a class="btn btn-success btn-sm"
                                                            href="<?= base_url('updateKategori/' . $item['id_kategori']); ?>">
                                            
                                                            Edit
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
            <!-- TABEL KATEGORI END -->
            
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ADMIN KATEGORI -->