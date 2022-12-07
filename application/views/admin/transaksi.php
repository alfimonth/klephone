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
                                    <h1 class="h4">Konfirmasi Transaksi</h1>
                                </div>
                                <form class="center col-md-12" method="POST" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <img src="<?= base_url('assets/img/upload/') . $produk['img'] ?>" alt="" style="width:100%;">
                                        </div>
                                    </div>


                                    <div class="email mb-4">
                                        <select name="" class="form form-control" id="produk">
                                            <option value=""><?= $produk['name'] . ' ' . $produk['tipe'] ?></option>
                                        </select>
                                        <label for="produk" class="label">Produk</label>

                                    </div>
                                    <div class="email mb-4">
                                        <select name="" class="form form-control" id="cos">
                                            <option value=""><?= $cos['name'] ?></option>
                                        </select>
                                        <label for="cos" class="label">Costumer</label>

                                    </div>

                                    <div class="email mb-4">
                                        <select name="" class="form form-control" id="harga">
                                            <option value="">Rp<?= $harga ?></option>
                                        </select>
                                        <label for="harga" class="label">Harga</label>
                                    </div>
                                    <div class="email mb-4">
                                        <select name="" class="form form-control" id="q">
                                            <option value=""><?= $q ?></option>
                                        </select>
                                        <label for="q" class="label">Jumlah</label>
                                    </div>
                                    <div class="email mb-4">
                                        <select name="" class="form form-control" id="total">
                                            <option value="">Rp<?= $total ?></option>
                                        </select>
                                        <label for="total" class="label">Total</label>
                                    </div>
                                    <div class="email mb-4">
                                        <input type="number" min="0" required class="form form-control" name="diskon" id="diskon" aria-describedby="emailHelp" value="0" />
                                        <label for="diskon" class="label">diskon</label>
                                        <?= form_error('diskon',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block mt-5 mb-3">
                                        Konfirmasi
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