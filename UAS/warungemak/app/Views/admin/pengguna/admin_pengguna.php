<!-- ADMIN PENGGUNA -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengguna</h1>
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
                                    <h3 class="card-title">Daftar Akun Pengguna </h3>

                                    <form action="<?= base_url('hapusSemuaUsers') ?>" method="post">
                                        <?= csrf_field() ?> <!-- Tambahkan CSRF protection untuk keamanan -->
                                        <button type="submit" class="btn btn-danger float-right mr-2" onclick="return confirm('Apakah Anda yakin ingin menghapus semua data?')">
                                            Hapus Semua Akun
                                        </button>
                                    </form>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <table id="menu-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Dibuat</th>
                                                <th class="text-center">Diupdate</th>
                                                <th class="text-center">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no = 1;
                                            foreach ($users as $item): ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td class="text-center" style="max-width: 70px;"><?= $item['nama']; ?></td>
                                                    <td class="text-center"><?= $item['created_at']; ?></td>
                                                    <td class="text-center"><?= $item['updated_at']; ?></td>

                                                    <td class="text-center">
                                                        <!-- <button class="btn btn-warning btn-sm edit-btn" data-id="<?= $item['id_users']; ?>">Edit</button> -->
                                                        <a class="btn btn-danger btn-sm delete-btn"
                                                            href="<?= base_url('hapusUsers/' . $item['id_users']); ?>"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            <i class="bi bi-trash"></i>
                                                            Hapus
                                                        </a>
                                                        <a class="btn btn-success btn-sm delete-btn"
                                                            href="<?= base_url('updateUsers/' . $item['id_users']); ?>">
                                                            <i class="bi bi-pencil-square"></i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-info btn-sm delete-btn"
                                                            href="<?= base_url('admindetailpengguna/' . $item['id_users']); ?>">
                                                            <i class="bi bi-journals"></i>
                                                            Detail
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

<!-- ADMIN PENGGUNA END -->