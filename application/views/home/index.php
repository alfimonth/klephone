<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="jumbotron">
        <div class="row">
            <div class="col-6">
                <h1 class="display-4">Oppo Day!</h1>
                <p class="lead">Harga promo disetiap akhir bulan. Promo hingga 50%, Serta mendapat bonus aksesoris Handpone. </p>
                <p class="lead">
                    <a class="btn btn-success btn-lg" href="#" role="button">Cek Sekarang ></a>
                </p>
            </div>
            <div class="col-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src=" <?= base_url('assets/img/promo/oppo2.jpg'); ?> " alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src=" <?= base_url('assets/img/promo/oppo5.jpg'); ?> " alt="">

                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src=" <?= base_url('assets/img/promo/oppo4.jpg'); ?> " alt="">
                        </div>
                    </div>
                    <img src=" <?= base_url('assets/img/promo/stand.png'); ?> " class="d-block standrak" alt="" />
                    <a class="carousel-control-prev prevhome" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next nexthome" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>



    <div class="row">
        <?php foreach ($produk as $p) : ?>
            <!-- Page Card -->
            <div class="card mb-3 ml-3 col-lg-5">
                <div class="row g-0">
                    <div class="col-md-6">
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