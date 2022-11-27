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
                                    <h1 class="h4">Edit Profile</h1>
                                </div>
                                <form class="center col-md-12" method="POST" action="" enctype="multipart/form-data">
                                    <?php $u = $user[0] ?>
                                    <input type="text" value="<?= $u['id'] ?>" name="id" hidden>
                                    <div class="email mb-0">
                                        <div class="img-area " data-img="">
                                            <img src="<?= base_url('assets/img/profile/') . $u['image']  ?>" alt="">
                                        </div>
                                    </div>

                                    <div class="email mb-4">
                                        <input type="hidden" name="old-pict" id="old-pict" value="<?= $u['image'] ?>">
                                        <button type='button' class="select-file form form-control">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <span class="img-text">Pilih Gambar</span>
                                            <input type="file" class="form form-control" id="file" name="image" id="image" aria-describedby="emailHelp" />
                                        </button>

                                    </div>
                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="name" id="name" aria-describedby="emailHelp" value="<?= $u['name'] ?>" />
                                        <label for="tipe" class="label">Nama</label>
                                        <?= form_error('name',  '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <input type="text" required class="form form-control" name="email" id="email" aria-describedby="emailHelp" value="<?= $u['email'] ?>" hidden />
                                    <button type="submit" class="btn btn-success btn-user btn-block mt-5 mb-3">
                                        Submit
                                    </button>
                                    <a href="<?= base_url('user') ?>" class="btn btn-danger btn-user btn-block mb-3">
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