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
                                <td class="center"><img class="img-product" src="<?= base_url('assets/img/upload/' . $p['img']) ?>" alt=""></td>
                                <td scope="row"><?= $p['name'] ?> <?= $p['tipe'] ?></td>
                                <td class="right px-md-5 fit-2"><?= $p['memory'] ?> GB</td>
                                <td class="right px-md-5 fit"><?= $p['stok'] ?></td>
                                <td class="fit pl-md-2">Rp</td>
                                <?php
                                $harga = number_format($p['harga'], 0, ',', '.');

                                ?>
                                <td class="right pr-md-2 fit"><?= $harga ?></td>
                                <td class="opsi">
                                    <a href="" class="badge badge-info"><i class="fas fa-edit"></i> edit</a>
                                    <a href="<?= base_url('produk/hapus/') . $p['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= 'hp' . ' ' . $p['tipe']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> hapus</a>
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


    <!-- Modal Tambah produk baru-->
    <div class="modal fade" id="bukuBaruModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('produk'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="brand" class="form-control form-control-user">
                                <option value="">Pilih Brand</option>
                                <option value="1">Samsung</option>
                                <option value="2">Oppo</option>
                                <option value="3">Realme</option>
                                <option value="4">POCO</option>
                                <option value="5">iPhone</option>
                                <option value="6">Infinix</option>
                                <option value="7">Redmi</option>
                                <option value="8">Vivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="tipe" name="tipe" placeholder="Tipe">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="memory" name="memory" placeholder="Memory (RAM/ROM)">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="layar" name="layar" placeholder="Layar">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="fcam" name="fcam" placeholder="Kamera depan">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="bcam" name="bcam" placeholder="Kamera utama">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="battery" name="battery" placeholder="Kapasitas Battery">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="cpu" name="cpu" placeholder="Prosesor">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Harga">
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="image" name="image" placeholder="gambar">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> batal</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Modal Tambah Mneu -->