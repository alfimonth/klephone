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
                                    <div class="email mb-4">
                                        <select name="order" class="form form-control" id="order">
                                            <option value='d'>Debit</option>
                                            <option value='k'>Kredit</option>
                                        </select>
                                        <label for="order" class="label">Kebutuhan</label>
                                    </div>
                                    <div class="email mb-4">
                                        <input type="number" min="1" required class="form form-control" name="jumlah" id="jumlah" aria-describedby="emailHelp" value="<?= set_value('jumlah') ?>" />
                                        <label for="jumlah" class="label">Jumlah</label>
                                        <?= form_error('jumlah',  '<small class="text-danger">', '</small>') ?>
                                    </div>


                                    <div class="email mb-4">
                                        <textarea type="text" class="form form-control" name="ket" id="ket" aria-describedby="emailHelp"><?= set_value('ket') ?></textarea>
                                        <label for="ket" class="label">Keterangan</label>
                                        <?= form_error('ket',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block mt-5 mb-3">
                                        Submit
                                    </button>
                                    <a href="<?= base_url('dashboard') ?>" class="btn btn-danger btn-user btn-block mb-3">
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