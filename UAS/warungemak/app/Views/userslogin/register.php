<div class="container nunito" style="height: 170vh;">
    <div class="row justify-content-center align-items-center" style="height: 100%;">

        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-4">

                    <!-- Pesan Session -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div id="flash-error" class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('error') as $err): ?>
                                    <li><?= esc($err); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div id="flash-success" class="alert alert-success">
                            <ul class="mb-0">
                                <?php foreach ((array)session()->getFlashdata('success') as $msg): ?>
                                    <li><?= esc($msg); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Pesan Session END -->

                    <!-- Judul Register -->
                    <div class="text-center mb-4">
                        <h2 class="h4 text-dark nunito-bold">Form Registrasi</h2>
                    </div>

                    <!-- Form Register -->
                    <form method="post" action="<?= base_url('registerusers/daftaruser'); ?>">
                        <div class="form-group mb-3">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nomor_hp">Nomor HP</label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Masukkan nomor HP" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                    </form>

                    <hr>

                    <div class="text-center">
                        <p class="small">Sudah punya akun? <a href="<?= base_url('login'); ?>" class="text-primary fw-bold">Kembali ke Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>