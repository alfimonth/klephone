<div class="container-fluid " style="overflow:auto;">
    <?= $this->session->flashdata('pesan'); ?>
    <div class=" row">
        <div class="col-lg-12">
            <!-- Page Heading -->
            <a href="<?= base_url('user/tambah') ?>" class="btn btn-success mb-3"><i class="fas fa-file-alt"></i> Tambah Account</a>
            <!-- data-toggle="modal" data-target="#bukuBaruModal" -->

            <table class="table table-hover" id="datatablesSimple">
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
                            <td scope="row"><?= $u['role'] ?></td>
                            <td scope="row"><?= $u['email'] ?></td>
                            <td>.....</td>

                            <td class="center opsi">
                                <?php if ($u['id'] != 1) { ?>
                                    <a class="badge badge ganti-role" data-target="#roleModal" data-nama="<?= $u['name'] ?>" data-role="<?= $u['role_id'] ?>" data-id="<?= $u['id'] ?>" data-toggle="modal"> <i class="fas fa-edit fa-2x" style="color:#217D3B;"></i> </a>
                                    <a class="badge badge hapus-user" href="" data-toggle="modal" data-target="#hapusBrandModal" data-nama="<?= $u['name'] ?>" data-id="<?= $u['id'] ?>"><i class="fas fa-trash-alt fa-2x" style="color:#CF0210;"></i></a>
                                <?php } else { ?>
                                    <a class="badge badge-secondary">Cannot Modify</a>
                                <?php  } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <!-- href="<?= base_url('user/hapus/') . $u['id']; ?>" -->
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


<!-- Ganti Modal-->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Ganti Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <input type="hidden" required class="form-control form-control-user" id="idc" name="id" placeholder="name" value="" >
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" required class="form-control form-control-user" id="namec" name="name" placeholder="name" disabled>
                    </div>
                    <div class="form-group">
                        <select name="id_role" class="form-control form-control-user">
                            <?php foreach ($role as $p) : ?>
                                <option value="<?= $p['id']; ?>" id="<?= $p['id']; ?>" class="idr"><?= $p['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->