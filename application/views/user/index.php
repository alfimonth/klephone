<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Card -->
    <div class="row">
        <div class="col-md-12 mb-4"><?= $this->session->flashdata('pesan'); ?></div>
        <div class="col-12">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['name']; ?></h5>
                            <p class="card-text"><?= $user['email']; ?></p>
                            <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <a href="<?= base_url('user/edit'); ?>" class="btn btn-success my-3"><i class="fas fa-user-edit"></i> Ubah Profil</a>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->