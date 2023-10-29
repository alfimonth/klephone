<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card mt-4">
                <div class="card-header">
                    <?php $p = $produk[0]; ?>
                    <h1 class="h3 mb-0 text-gray-800"><?= $p['name'] ?> <?= $p['tipe'] ?></h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/upload/') . $p['img']; ?>" class="img-fluid rounded-start" alt="Product Image">
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"><?= $p['description']; ?></h5>
                            <p class="card-text">Processor: <?= $p['cpu']; ?></p>
                            <p class="card-text">Memory: <?= $p['memory']; ?> GB</p>
                            <p class="card-text">Layar: <?= $p['layar']; ?></p>
                            <p class="card-text">Kamera Belakang: <?= $p['bcam']; ?> MP</p>
                            <p class="card-text">Kamera Depan: <?= $p['fcam']; ?> MP</p>
                            <p class="card-text">Battery: <?= $p['battery']; ?> MaH</p>
                            <?php $harga = number_format($p['harga'], 0, ',', '.'); ?>
                            <p class="card-text">Harga: Rp<?= $harga; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="<?= base_url('produk') ?>" class="btn btn-danger btn-user mt-3">Kembali</a>
            <a href="<?= base_url('produk/edit/') . $id; ?>" class="btn btn-dark btn-user mt-3">Edit</a>

        </div>
    </div>
</div>