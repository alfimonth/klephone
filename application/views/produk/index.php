<div class="container-fluid " style="overflow:auto;">
    <?= $this->session->flashdata('pesan'); ?>
    <div class=" row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>

            <!-- Page Heading -->
            <a href="<?= base_url('produk/tambah') ?>" class="btn btn-success mb-3"><i class="fas fa-file-alt"></i> Tambah produk</a>
            <a data-target="#suplaiModal" data-toggle="modal" class="btn btn-success mb-3"><i class="fas fa-file-alt"></i> Suplai</a>
            <!-- data-toggle="modal" data-target="#bukuBaruModal" -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="fit-img center">Gambar</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col" class="center">Varian</th>
                            <th scope="col" class="center">Stok</th>
                            <th scope="col" colspan="2" class="center">Harga</th>
                            <th scope="col" class="center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $p) : ?>
                            
                            <tr>
                               <td class="center"> <a href="<?= base_url('produk/detail/') . $p['id']?>"><img class="img-product" src="<?= base_url('assets/img/upload/' . $p['img']) ?>" alt="">   </a></td>
                                <td scope="row"><a href="<?= base_url('produk/detail/') . $p['id']?>"><?= $p['name'] ?> <?= $p['tipe'] ?></a></td>
                                <td class="right px-md-5 fit-2"><?= $p['memory'] ?> GB</td>
                                <td class="right px-md-5 fit"><?= $p['stok'] ?></td>
                                <td class="fit pl-md-2">Rp</td>
                                <?php
                                $harga = number_format($p['harga'], 0, ',', '.');

                                ?>
                                <td class="right pr-md-2 fit"><?= $harga ?></td>
                                <td class="opsi">
                                    <a href="<?= base_url('produk/edit/') . $p['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> edit</a>
                                    <a href="<?= base_url('produk/hapus/') . $p['id']; ?> " href="#" data-toggle="modal" data-target="#hapusModal" class="badge badge-danger"><i class="fas fa-trash"></i> hapus</a>
                                </td>
                            </tr>


                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.container-fluid -->



    </div>
    <!-- End of Main Content -->
    <!-- Logout Modal-->
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin akan menghapus produk <?= $p['name'] ?> <?= $p['tipe'] ?>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-danger" href="<?= base_url('produk/hapus/') . $p['id']; ?> ">Yakin</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Suplai Modal-->
    <div class="modal fade" id="suplaiModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Suplai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user">
                        <option value="">Pilih Produk</option>
                            <?php foreach ($produk as $p) : ?>
                            <option value="<?= $p['id'];?>"><?= $p['name'];?> <?= $p['tipe'];?></option>
                            <?php endforeach; ?>
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user">
                        <option value="">Pilih Supplier</option>
                            <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id'];?>"><?= $k['kategori'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="stok" name="stok" placeholder="Stok">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="harga" name="harga" placeholder="harga">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->
 