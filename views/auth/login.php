<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> side image in here-->
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center mb-5">
                                    <h1 class="h4">Login</h1>
                                </div>

                                <div class=" col-md-12 mb-4"><?= $this->session->flashdata('pesan'); ?></div>

                                <form class="center col-md-12" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="email" id="email" aria-describedby="emailHelp" />
                                        <label for="email" class="label">Email</label>
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>



                                    </div>
                                    <div class="password mb-4">
                                        <input type="password" required class="form form-control" name="password" id="password" />
                                        <label for="password" class="label">Password</label>
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block mt-5 mb-3">
                                        Login
                                    </button>

                                    <hr class="hr-text" data-content="Atau">

                                    <a href="<?= base_url() ?>" class="btn btn-success btn-user btn-block mb-3">
                                        Masuk tanpa akun
                                    </a>
                                </form>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url("auth/register") ?>">Belum Punya Akun? Register!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>