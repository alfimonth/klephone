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
                                    <h1 class="h4">Edit Produk</h1>
                                </div>

                                <form class="center col-md-12" method="POST" action="" enctype="multipart/form-data">
                                    <?php $p = $produk[0]; ?>
                                    <input type="hidden" required class="form form-control" name="id" id="id" value="<?= $id ?>" />
                                    <div class="email mb-0">
                                        <div class="img-area" data-img="">
                                            <img src="<?= base_url('assets/img/upload/') . $p['img'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="email mb-4">
                                        <input type="hidden" name="old-pict" id="old-pict" value="<?= $p['img'] ?>">
                                        <button type='button' class="select-file form form-control">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <span class="img-text">Ubah Gambar</span>
                                            <input type="file" class="form form-control" id="file" name="image" id="image" aria-describedby="emailHelp" />
                                        </button>
                                    </div>
                                    <div class="email mb-4">
                                        <select name="brand" class="form form-control" id="brand">
                                            <option value=''>Pilih Brand</option>
                                            <?php foreach ($brand as $b) : ?>
                                                <option value="<?= $b['id'] ?>" <?= ($b['id'] == $p['id']) ? 'selected' : '' ?>><?= $b['name'] ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                        <label for="brand" class="label">Brand</label>
                                        <?= form_error('brand',  '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="tipe" id="tipe" aria-describedby="emailHelp" value="<?= $p['tipe'] ?>" />
                                        <label for="tipe" class="label">Tipe</label>
                                        <?= form_error('tipe',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="email mb-4">
                                        <textarea type="text" class="form form-control" name="description" id="description" aria-describedby="emailHelp" value="<?= $p['description'] ?>"></textarea>
                                        <label for="description" class="label">Deskripsi</label>
                                        <?= form_error('description',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <div class="password col-sm-6 mb-4 mb-sm-0">
                                            <?php $memory = explode("/", $p['memory']) ?>
                                            <input type="text" required class="form form-control" name="ram" id="ram" value="<?= $memory[0] ?>" />
                                            <label for="ram" class="label">RAM</label>
                                            <?= form_error('ram',  '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="password col-sm-6">
                                            <input type="text" required class="form form-control" name="rom" id="rom" value="<?= $memory[1] ?>" />
                                            <label for="rom" class="label">ROM</label>
                                        </div>

                                    </div>
                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="layar" id="layar" aria-describedby="emailHelp" value="<?= $p['layar'] ?>" />
                                        <label for="layar" class="label">Layar</label>
                                        <?= form_error('layar',  '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="password col-sm-6 mb-4 mb-sm-0">
                                            <input type="text" required class="form form-control" name="bcam" id="bcam" value="<?= $p['bcam'] ?>" />
                                            <label for="bcam" class="label">Main cam</label>
                                            <?= form_error('bcam',  '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="password col-sm-6">
                                            <input type="text" required class="form form-control" name="fcam" id="fcam" value="<?= $p['fcam'] ?>" />
                                            <label for="fcam" class="label">Front cam</label>
                                        </div>
                                    </div>
                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="battery" id="battery" aria-describedby="emailHelp" value="<?= $p['battery'] ?>" />
                                        <label for="battery" class="label">Battery</label>
                                        <?= form_error('battery',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="email mb-4">
                                        <input type="text" required class="form form-control" name="cpu" id="cpu" aria-describedby="emailHelp" value="<?= $p['cpu'] ?>" />
                                        <label for="cpu" class="label">Processor</label>
                                        <?= form_error('cpu',  '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <div class="password col-sm-6 mb-4 mb-sm-0">
                                            <input type="text" required class="form form-control" name="harga" id="harga" value="<?= $p['harga'] ?>" />
                                            <label for="harga" class="label">Harga</label>
                                            <?= form_error('harga',  '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="password col-sm-6">
                                            <input type="text" required class="form form-control" name="stok" id="stok" value="<?= $p['stok'] ?>" />
                                            <label for="stok" class="label">Stok</label>
                                            <?= form_error('stok',  '<small class="text-danger">', '</small>') ?>
                                        </div>
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