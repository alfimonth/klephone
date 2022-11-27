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
            <a href="<?= base_url('brand/tambah') ?>" class="btn btn-success mb-3"><i class="fas fa-file-alt"></i> Tambah Supplier</a>
            <!-- data-toggle="modal" data-target="#bukuBaruModal" -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Supplier</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sup as $s) : ?>
                            <tr>
                                <td scope="row"><?= $s['nama'] ?></td>
                                <td scope="row"><?= $s['alamat'] ?></td>
                                <td scope="row"><?= $s['total_sup'] ?></td>
                                <td class="opsi">
                                    <a href="<?= base_url('produk/edit/') . $s['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> edit</a>
                                    <a href="#" data-toggle="modal" data-target="#hapusBrandModal" class="badge badge-danger"><i class="fas fa-trash"></i> hapus</a>
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
    <div class="modal fade" id="hapusBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin akan menghapus brand <?= $b['name'] ?> ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-danger" href="<?= base_url('brand/hapus/') . $b['id']; ?> ">Yakin</a>
                </div>
            </div>
        </div>
    </div>