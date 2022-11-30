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
                                    <h1 class="h4"><?= $title ?></h1>
                                </div>
                                <form class="center col-md-12" method="POST" action="">

                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="email" id="email" aria-describedby="emailHelp" value="<?= set_value('email') ?>">
                                        <label for="email" class="label">Email</label>
                                        <?= form_error('email',  '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="name" id="username" aria-describedby="emailHelp" value="<?= set_value('name') ?>" />
                                        <label for="username" class="label">Username</label>
                                        <?= form_error('name',  '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group row  mb-4">
                                        <div class="password col-sm-6 mb-4 mb-sm-0">
                                            <input type="password" required class="form form-control" name="password" id="password" />
                                            <label for="password" class="label">Password</label>
                                            <?= form_error('password',  '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="password col-sm-6">
                                            <input type="password" required class="form form-control" name="password2" id="password2" />
                                            <label for="password2" class="label">Konfirmasi Password</label>
                                        </div>
                                    </div>
                                    <div class="email mb-4">
                                        <select name="role" class="form form-control" id="brand">
                                            <option value="1">Admin</option>
                                            <option value="2">Member</option>
                                        </select>
                                        <label for="brand" class="label">Role</label>
                                        <?= form_error('brand',  '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-user btn-block mt-5 mb-3">
                                        Submit
                                    </button>
                                    <a href="<?= base_url('user/management') ?>" class="btn btn-danger btn-user btn-block mb-3">
                                        Batal
                                    </a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>