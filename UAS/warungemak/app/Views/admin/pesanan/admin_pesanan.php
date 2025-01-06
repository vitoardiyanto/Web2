<!-- ADMIN PENGIRIMAN -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pesanan</h1>
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
                                    <h3 class="card-title">Daftar Pesanan </h3>

                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <table id="menu-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Pemesan</th>
                                                <th class="text-center">Tanggal Pemesanan</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($orders as $order): ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td class="text-center"><?= $order['nama_pemesan']; ?></td>
                                                    <td class="text-center"><?= date('d M Y', strtotime($order['tanggal_order'])); ?></td>
                                                    <td class="text-center">
                                                        <?php if ($order['status_order'] == 'pending'): ?>
                                                            <span class="badge bg-warning">Pending</span>
                                                        <?php elseif ($order['status_order'] == 'completed'): ?>
                                                            <span class="badge bg-success">Completed</span>
                                                        <?php elseif ($order['status_order'] == 'canceled'): ?>
                                                            <span class="badge bg-danger">Canceled</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-secondary">Unknown</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                    <a class="btn btn-info btn-sm delete-btn"
                                                        href="<?= base_url('admindetailpesanan/' . $order['id_order']); ?>">
                                                        <i class="bi bi-journals"></i>
                                                        Detail
                                                    </a>
                                                    <a class="btn btn-danger btn-sm delete-btn"
                                                        href="<?= base_url('hapusPesanan/' . $order['id_order']); ?>">
                                                        <i class="bi bi-journals"></i>
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
            <!-- TABEL MENU END -->

        </div><!--/. container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ADMIN PENGIRIMAN END -->