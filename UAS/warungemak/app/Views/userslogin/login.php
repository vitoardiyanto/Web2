<div class="container mt-5" style="height: 100vh;">
    <div class="row justify-content-center align-items-center" style="height: 100%;">

        <div class="col-lg-5 nunito-bold p-4">

            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-4">

                    <!-- Judul Login -->
                    <div class="text-center mb-4">
                        <h2 class="h4 text-dark">Login</h2>
                    </div>

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

                    <!-- Form Login -->
                    <form method="post" action="<?= base_url('loginusers/authenticate'); ?>">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-danger btn-user btn-block">Login</button>
                    </form>

                    <hr>

                    <div class="text-center">
                        <p class="small">Belum punya akun? <a href="<?= base_url('register'); ?>" class="text-primary fw-bold">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>