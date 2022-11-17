    <div class="container">

        <div class="row justify-content-center">
            <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->
            <div class="col-lg-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center mb-5">
                                        <h1 class="h4">Daftar</h1>
                                    </div>
                                    <form class="center col-md-12">
                                        <div class="email mb-4">
                                            <input type="text" required class="form form-control" name="email" id="email" aria-describedby="emailHelp" autocomplete="none">
                                            <label for="email" class="label">Email</label>
                                        </div>
                                        <div class="email mb-4">
                                            <input type="text" required class="form form-control" name="fullname" id="email" aria-describedby="emailHelp" />
                                            <label for="fullname" class="label">Nama Lengkap</label>
                                        </div>
                                        <div class="email mb-4">
                                            <input type="text" required class="form form-control" name="username" id="username" aria-describedby="emailHelp" />
                                            <label for="username" class="label">Username</label>
                                        </div>

                                        <div class="form-group row">
                                            <div class="password col-sm-6 mb-4 mb-sm-0">
                                                <input type="password" required class="form form-control" name="password" id="password" />
                                                <label for="password" class="label">Password</label>
                                            </div>
                                            <div class="password col-sm-6">
                                                <input type="password" required class="form form-control" name="password2" id="password2" />
                                                <label for="password2" class="label">Konfirmasi Password</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block mt-5 mb-3">
                                            Register
                                        </button>

                                        <hr class="hr-text" data-content="Atau">

                                        <a href="<?= base_url() ?>" class="btn btn-success btn-user btn-block mb-3">
                                            Masuk tanpa akun
                                        </a>

                                    </form>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url("auth/") ?>">Sudah Punya Akun? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>