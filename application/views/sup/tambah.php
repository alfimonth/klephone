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
                                        <input type="text" required class="form form-control" name="name" id="name" aria-describedby="emailHelp" value="<?= set_value('name') ?>" />
                                        <label for="name" class="label">Nama Supplier</label>
                                        <?= form_error('name',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="alamat" id="alamat" aria-describedby="emailHelp" value="<?= set_value('alamat') ?>" />
                                        <label for="alamat" class="label">Alamat</label>
                                        <?= form_error('alamat',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="tlp" id="tlp" aria-describedby="emailHelp" value="<?= set_value('tlp') ?>" />
                                        <label for="tlp" class="label">Telepon</label>
                                        <?= form_error('tlp',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="email" id="email" aria-describedby="emailHelp" value="<?= set_value('email') ?>" />
                                        <label for="email" class="label">Email</label>
                                        <?= form_error('email',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="email mb-4">
                                        <textarea type="text" required class="form form-control" name="keterangan" id="keterangan" aria-describedby="emailHelp"><?= set_value('keterangan') ?></textarea>
                                        <label for="keterangan" class="label">Keterangan</label>
                                        <?= form_error('keterangan',  '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-user btn-block mt-5 mb-3">
                                        Submit
                                    </button>
                                    <a href="<?= base_url('produk') ?>" class="btn btn-danger btn-user btn-block mb-3">
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