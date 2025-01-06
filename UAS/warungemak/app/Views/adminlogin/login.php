<div class="container" style="height: 100vh;">
    <div class="row justify-content-center align-items-center" style="height: 100%;">

        <div class="col-lg-6">
            <!-- Wrapper dengan background -->
            <div class="tembus shadow rounded p-5">
                
                <!-- Logo Diletakkan di Luar Form -->
                <div class="text-center mb-4">
                    <img src="<?= base_url('img/logo2.png'); ?>" style="width: 200px; height: auto;">
                </div>

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-4">

                        <!-- Judul Login -->
                        <div class="text-center mb-4">
                            <h2 class="h4 text-dark">Login Admin</h2>
                        </div>

                        <!-- Tampilkan pesan error jika ada -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Form Login -->
                        <form method="post" action="<?= base_url('login/authenticate'); ?>">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-user btn-block">Login</button>
                        </form>

                        <hr>

                        <!-- <div class="text-center">
                            <p class="small">Belum punya akun? <a href="<?= base_url('register'); ?>" class="text-primary fw-bold">Buat Akun</a></p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
