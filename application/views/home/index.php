<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Produk Klephone</h1>
    </div>



    <div style="display: flex; flex-wrap: wrap;">
        <?php foreach ($produk as $p) : ?>
            <?php
            // var_dump($produk);
            // die; 
            ?>
            <!-- Page Card -->
            <div class="card mb-3 ml-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/upload/') . $p['img']; ?>" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $p['name'] ?> <?= $p['tipe'] ?></h5>
                            <p class="card-text">Prosesor : <?= $p['cpu']; ?></p>
                            <p class="card-text">Memory : <?= $p['memory']; ?> GB</p>
                            <p class="card-text">Layar : <?= $p['layar']; ?></p>
                            <p class="card-text">Kamera Belakang : <?= $p['bcam']; ?> MP</p>
                            <p class="card-text">Kamera Depan : <?= $p['fcam']; ?> MP</p>
                            <p class="card-text">Battery : <?= $p['battery']; ?> MaH</p>
                            <?php $harga = number_format($p['harga'], 0, ',', '.'); ?>
                            <p class="card-text">Harga : Rp<?= $harga; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->