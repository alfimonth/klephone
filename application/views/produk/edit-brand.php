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
                                <form class="center col-md-12" method="POST" action="" enctype="multipart/form-data">
                                    <?php $b = $brand[0]; ?>
                                    <input type="hidden" required class="form form-control" name="id" id="id" value="<?= $id ?>" />
                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="name" id="tipe" aria-describedby="emailHelp" value="<?= $b['name'] ?>" />
                                        <label for="tipe" class="label">Nama Brand</label>
                                        <?= form_error('name',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="email mb-0">
                                        <div class="img-area " data-img="">
                                            <img src="<?= base_url('assets/img/brand/') . $b['logo']  ?>" alt="">
                                        </div>
                                    </div>

                                    <div class="email mb-4">
                                        <input type="hidden" name="old-pict" id="old-pict" value="<?= $b['logo'] ?>">
                                        <button type='button' class="select-file form form-control">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <span class="img-text">Ganti Logo</span>
                                            <input type="file" class="form form-control" id="file" name="logo" id="image" aria-describedby="emailHelp" />
                                        </button>

                                    </div>

                                    <button type="submit" class="btn btn-success btn-user btn-block mt-5 mb-3">
                                        Submit
                                    </button>
                                    <a href="<?= base_url('brand') ?>" class="btn btn-danger btn-user btn-block mb-3">
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