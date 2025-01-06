<!-- DETAIL PESANAN REVISI -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a class="btn btn-success btn"
                        href="<?= base_url('adminpesanan'); ?>">
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <!-- Informasi Pengguna -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Detail Pesanan </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 200px;">Nama Pemesan</th>
                            <td><?= $order->nama_pemesan; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pemesanan</th>
                            <td><?= date('d M Y', strtotime($order->tanggal_order)); ?></td>
                        </tr>
                        <tr>
                            <th>Dipesan Untuk Tanggal</th>
                            <td><?= $order->tgl_pesanansiap; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Lengkap</th>
                            <td><?= $order->alamat; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Pengiriman</th>
                            <td><?= $order->jenis_pengiriman; ?></td>
                        </tr>
                        <tr>
                            <th>Status Pesanan</th>
                            <td>
                                <?php if ($order->status_order == 'Menunggu Pembayaran'): ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif ($order->status_order == 'Diproses'): ?>
                                    <span class="badge bg-success">Diproses</span>
                                <?php elseif ($order->status_order == 'Dikirim'): ?>
                                    <span class="badge bg-danger">Dikirim</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Unknown</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Wilayah Pengiriman</th>
                            <td><?= $order->nama_wilayah; ?></td>
                        </tr>
                        <tr>
                            <th>Ongkos Kirim</th>
                            <td>Rp. <?= number_format($order->ongkos_kirim); ?></td>
                        </tr>
                    </table>

                    <h4 class="mt-4">Menu yang Dipesan</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($order_items as $item): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item->nama_menu; ?></td>
                                        <td>Rp. <?= number_format($item->harga_menu, 0, ',', '.'); ?></td>
                                        <td><?= $item->quantity; ?></td>
                                        <td>Rp. <?= number_format($item->harga_menu * $item->quantity, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="text-right mt-4">
                        Total Keseluruhan: <span class="text-success">Rp.
                            <?= number_format($order->total_harga); ?>
                        </span>
                    </h4>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- Tambahan CSS -->
<style>
    .badge {
        font-size: 14px;
        padding: 6px 12px;
    }

    .badge-success {
        background-color: #28a745;
        color: #fff;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #fff;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>