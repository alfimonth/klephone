<div class="container-fluid " style="overflow:auto;">
    <div class=" row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>

            <!-- Page Heading -->
            <a href="<?= base_url('brand/tambah') ?>" class="btn btn-success mb-3"><i class="fas fa-file-alt"></i> Tambah brand</a>
            <!-- data-toggle="modal" data-target="#bukuBaruModal" -->
            <table class="table table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col" class="fit-img center">Logo</th>
                        <th scope="col">Brand</th>
                        <th scope="col" class="center">Jumlah Tipe</th>
                        <th scope="col" class="center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($brand as $b) : ?>
                        <tr>
                            <td class="center"><img class="img-product" src="<?= base_url('assets/img/brand/' . $b['logo']) ?>" alt=""></td>
                            <td scope="row"><?= $b['name'] ?></td>
                            <td scope="row" class="center"><?= $b['total_tipe'] ?></td>

                            <td class="center opsi">
                                <a href="<?= base_url('brand/edit/') . $b['id']; ?>" class="badge badge"><i class="fas fa-edit fa-2x" style="color:#217D3B;"></i></a>
                                <a href="#" class="badge badge hapus-brand" data-toggle="modal" data-target="#hapusBrandModal" data-id="<?= $b['id']; ?>" data-nama="<?= $b['name'] ?>"><i class="fas fa-trash-alt fa-2x" style="color:#CF0210;"></i></a>
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
<!-- Hapus Modal-->
<div class="modal fade" id="hapusBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin akan menghapus brand <span id="dihapus"></span> ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-danger" id="linkHapus">Yakin</a>
            </div>
        </div>
    </div>
</div>