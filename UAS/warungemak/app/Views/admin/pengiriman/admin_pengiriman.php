

<!-- ADMIN PENGIRIMAN -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengiriman</h1>
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

            <!-- TABEL MENU -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pengiriman </h3>
                                    <a href="<?= base_url('tambahPengiriman'); ?>" class="btn btn-primary float-right" id="add-menu-btn" >
                                        <i class="fas fa-plus"></i> Tambah Pengiriman
                                    </a>

                                    <form action="<?= base_url('hapusSemuaPengiriman') ?>" method="post">
                                        <?= csrf_field() ?> <!-- Tambahkan CSRF protection untuk keamanan -->
                                        <button type="submit" class="btn btn-danger float-right mr-2" onclick="return confirm('Apakah Anda yakin ingin menghapus semua data?')">
                                            Hapus Semua
                                        </button>
                                    </form>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <table id="menu-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Wilayah</th>
                                                <th>Tarif Pengiriman</th>
                                                <th class="text-center">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no = 1;
                                            foreach ($pengiriman as $item): ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?= $no++; ?></td>
                                                    <td class="align-middle" style="max-width: 70px;"><?= $item['nama_wilayah']; ?></td>
                                                    <td class="align-middle" style="max-width: 130px;">Rp. <?=number_format( $item['tarif_ongkir']); ?></td>

                                                    <td class="text-center align-middle">
                                                        <!-- <button class="btn btn-warning btn-sm edit-btn" data-id="<?= $item['id_wilayah']; ?>">Edit</button> -->
                                                        <a class="btn btn-danger btn-sm delete-btn"
                                                            href="<?= base_url('hapusPengiriman/' . $item['id_wilayah']); ?>"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            Hapus
                                                        </a>
                                                        <a class="btn btn-success btn-sm delete-btn"
                                                            href="<?= base_url('updatePengiriman/' . $item['id_wilayah']); ?>">
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
            <!-- TABEL MENU END -->
        </div><!--/. container-fluid -->
    </section>
    
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ADMIN PENGIRIMAN END -->