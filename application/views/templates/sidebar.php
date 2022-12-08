<!-- Sidebar -->
<?php
$role = $this->session->userdata('role_id');
?>
<ul class="navbar-nav  sidebar sidebar-dark accordion toggled no-print" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src=" <?= base_url('assets/img/logo-sml.png'); ?> " style=" width :40%" alt="">
        </div>
        <div class="sidebar-brand-text">
            <img src=" <?= base_url('assets/img/klephone.png'); ?> " class="pt-3" style=" width :60%" alt="">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Navigasi -->
    <!-- <div class="sidebar-heading">
        Navigasi
    </div> -->
    <!-- Heading -->
    <div class="sidebar-heading my-3" style="color: #fff;">
        <?php
        if ($role == 1) {
            echo 'Menu Manager';
        }
        if ($role == 2) {
            echo 'Menu Staff Gudang';
        }
        if ($role == 3) {
            echo 'Menu Kasir';
        }
        ?>
    </div>


    <!-- Dashboard -->
    <li class="nav-item <?= ($title == 'Dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard'); ?> ">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>



    <!-- Brand  -->
    <li class="nav-item <?= ($title == 'Brand') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('brand') ?>">
            <i class="fas fa-fw fa-star"></i>
            <span>Brand</span>
        </a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->
    <li class="nav-item <?= ($title == 'Produk') ? 'active' : '' ?>">
        <a class="nav-link" href=" <?= base_url('produk') ?>">
            <i class="fas fa-fw fa-box"></i>
            <span>Produk</span>
        </a>
    </li>
    <?php if ($role == 1 || $role == 2) : ?>
        <li class="nav-item <?= ($title == 'Supplier') ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('supplier') ?>">
                <i class="fas fa-fw fa-truck"></i>
                <span>Supplier</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if ($role == 1 || $role == 3) : ?>
        <li class="nav-item <?= ($title == 'Customer') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('customer') ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Customer</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if ($role == 1) : ?>
        <li class="nav-item <?= ($title == 'Account') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('user/management') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Account</span>
            </a>
        </li>
    <?php endif; ?>
    <!-- <li class="nav-item <?= ($title == 'Account') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="index.html" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="users">
            <i class="fas fa-fw fa-user"></i>
            <span>Account</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Admin</a>
                <a class="collapse-item" href="cards.html">Member</a>
            </div>
        </div>
    </li> -->

    <!-- Home -->
    <li class="nav-item <?= ($title == 'Home') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>


    <!-- Logout -->
    <li class="nav-item ">
        <a class="nav-link" href="" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">




    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->