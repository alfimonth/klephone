<div class="container-fluid " style="overflow:auto;">
    <?= $this->session->flashdata('pesan'); ?>
    <div class=" row">
        <div class="col-lg-12">
            <!-- Page Heading -->
            <a href="<?= base_url('customer/tambah') ?>" class="btn btn-success mb-3"><i class="fas fa-file-alt"></i> Tambah Customer</a>
            <!-- data-toggle="modal" data-target="#bukuBaruModal" -->

            <table class="table table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Catatan</th>
                        <th scope="col" class="center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cos as $c) : ?>
                        <tr>
                            <td scope="row"><?= $c['name'] ?></td>
                            <td scope="row"><?= $c['tlp'] ?></td>
                            <td scope="row"><?= $c['catatan'] ?></td>
                            <td class="center opsi">
                                <a href="<?= base_url('customer/edit/') . $c['id']; ?>" class="badge badge"><i class="fas fa-edit fa-2x" style="color:#217D3B;"></i></a>
                                <a class="badge badge hapus-cos" href="" data-toggle="modal" data-target="#hapusBrandModal" data-nama="<?= $c['name'] ?>" data-id="<?= $c['id'] ?>"><i class="fas fa-trash-alt fa-2x" style="color:#CF0210;"></i></a>
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
            <div class="modal-body">Apakah anda yakin akan menghapus <span id="dihapus"></span> ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-danger" id="linkHapus">Yakin</a>
            </div>
        </div>
    </div>
</div>