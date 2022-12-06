<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="jumbotron">
        <div class="row">
            <div class="col-6">
                <h1 class="display-4">Hello, world!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                    <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
                </p>
            </div>
            <div class="col-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src="http://tradeoptiontech.com/wp-content/uploads/2021/11/swappie-product-iphone-11-purple.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://www.yatekno.com/wp-content/uploads/2020/12/Apple-iPhone-12-Pro-Max-Yatekno.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://media.pricebook.co.id/images/product/L/87099_L_1.jpg" alt="Third slide">
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
            <?php
            // var_dump($produk);
            // die; 
            ?>
            <!-- Page Card -->
            <div class="card mb-3 ml-3 col-lg-5">
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