<div class="container-fluid " style="overflow:auto;">
    <?= $this->session->flashdata('pesan'); ?>
    <div class=" row">
        <div class="col-lg-12">
            <!-- Page Heading -->
            <a href="<?= base_url('user/tambah') ?>" class="btn btn-success mb-3"><i class="fas fa-file-alt"></i> Tambah Account</a>
            <!-- data-toggle="modal" data-target="#bukuBaruModal" -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="fit-img center">Photo</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col" class="center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ac as $u) : ?>

                            <tr>
                                <td class="center"> <img class="img-product" src="<?= base_url('assets/img/profile/' . $u['image']) ?>" alt=""> </td>
                                <td scope="row"><?= $u['name'] ?></td>
                                <td scope="row"><?= ($u['role_id'] == 1) ? 'Admin' : 'Member' ?></td>
                                <td scope="row"><?= $u['email'] ?></td>
                                <td>.....</td>

                                <td class="opsi">
                                    <?php if ($u['id'] != 1) { ?>
                                        <a href="<?= base_url('user/hapus/') . $u['id']; ?>" class="badge badge"><i class="fas fa-edit" style="color:#217D3B;"></i> </a>
                                        <a class="badge badge hapus-user  " href="" data-toggle="modal" data-target="#hapusBrandModal" data-nama="<?= $u['name'] ?>" data-id="<?= $u['id'] ?>"><i class="fas fa-trash" style="color:#CF0210;"></i></a>
                                    <?php } else { ?>
                                        <a class="badge badge-secondary">Cannot Modify</a>
                                    <?php  } ?>
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