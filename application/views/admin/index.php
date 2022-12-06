<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Stok</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stok ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Kas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= $balance ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pengeluaran
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">5.000.000</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Suplai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Ruwayat Transaksi -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header card-header-actions">
                    <div class="row">
                        <div class="col-9">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Transaksi</h6>
                        </div>
                        <div class="col-3">
                            <a data-target="#tranModal" data-toggle="modal" href="" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Transaksi</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabel0" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Costumer</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sup as $s) : ?>
                                    <tr>
                                        <td scope="row"><?= $s['name'] ?></td>
                                        <td scope="row"><?= $s['alamat'] ?></td>
                                        <td scope="row"><?= $s['tlp'] ?></td>
                                        <td scope="row"><?= $s['email'] ?></td>
                                        <td scope="row"><?= $s['catatan'] ?></td>
                                    </tr>


                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <script>
                            window.addEventListener('DOMContentLoaded', event => {
                                const tabel0 = document.getElementById('tabel0');
                                if (tabel0) {
                                    new simpleDatatables.DataTable(tabel0);
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ruwayat Suplai -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Suplai</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabel1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>WAKTU</th>
                                    <th>Supplier</th>
                                    <th>Produk</th>
                                    <th>Harga</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hs as $hs) : ?>
                                    <tr>
                                        <?php
                                        $hs['date'];
                                        $date = strtotime($hs['date']);
                                        ?>
                                        <td scope="row"><?= date('d F Y, h:i:s H', $date) ?></td>
                                        <td scope="row"><?= $hs['id_sup'] ?></td>
                                        <td scope="row"><?= $hs['id_produk'] ?></td>
                                        <td scope="row"><?= $hs['harga'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                        <script>
                            window.addEventListener('DOMContentLoaded', event => {
                                // Simple-DataTables
                                // https://github.com/fiduswriter/Simple-DataTables/wiki
                                const tabel1 = document.getElementById('tabel1');
                                if (tabel1) {
                                    new simpleDatatables.DataTable(tabel1);
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->


<!-- Suplai Modal-->
<div class="modal fade" id="tranModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_produk" class="form-control form-control-user">
                            <option value="">Pilih Produk</option>
                            <?php foreach ($produk as $p) : ?>
                                <option value="<?= $p['id']; ?>"><?= $p['name']; ?> <?= $p['tipe']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row mb-4" style="margin-left: 0;">
                        <select name="id_sup" class="form-control form-control-user col-sm-10 mb-4 mb-sm-0 mr-2">
                            <option value="">Costumer</option>
                            <?php foreach ($cos as $c) : ?>
                                <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="col-sm-1 float-sm-right">
                            <a href="costumer/tambah" type="submit" class="btn btn-primary w-auto"><i class=" fas fa-plus-circle"></i></a>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="number" required class="form-control form-control-user" id="stok" name="stok" placeholder="Jumlah">
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