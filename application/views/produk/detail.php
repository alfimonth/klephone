<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
<?php $p = $produk[0];

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $p['name'] ?> <?= $p['tipe'] ?></h1>
    </div>
    <!-- Page Card -->
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/upload/') . $p['img']; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Prosesor : <?= $p['cpu']; ?></h5>
                    <p class="card-text">Memory : <?= $p['memory']; ?> GB</p>
                    <p class="card-text">Layar : <?= $p['layar']; ?></p>
                    <p class="card-text">Kamera Belakang : <?= $p['bcam']; ?> MP</p>
                    <p class="card-text">Kamera Depan : <?= $p['fcam']; ?> MP</p>
                    <p class="card-text">Battery : <?= $p['battery']; ?> MaH</p>
                    <p class="card-text">Harga : Rp.<?= $p['harga']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <a href="<?= base_url('produk') ?>" class="btn btn-danger btn-user k mb-3">Kembali</a>
    <a href="<?= base_url('produk/edit/') . $id; ?>" class="btn btn-dark btn-user k mb-3">Edit</a>

    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->