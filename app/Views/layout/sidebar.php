<div id="layoutSidenav">
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- jika yang login adalah admin -->
                    <?php if (session('level') == 'admin') : ?>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= base_url('/dashboard'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>/admin/regis-user">
                            <div class="sb-nav-link-icon"><i class="fa fa-user mr-1" aria-hidden="true"></i></div>
                            Registrasi User
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fas fa-tasks icon-label" aria-hidden="true"></i></div>
                            Data Penjualan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <?php $tanggal = date('d-m-Y'); ?>
                                <?php $date_encode = base64_encode($tanggal); ?>
                                <a class="nav-link" href="<?= base_url(); ?>/admin/store/<?= $date_encode; ?>">
                                    <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                                    Store
                                </a>
                                <a class="nav-link" href="<?= base_url(); ?>/admin/design/<?= $date_encode; ?>">
                                    <div class="sb-nav-link-icon"><i class="fa fa-desktop" aria-hidden="true"></i></div>
                                    Design
                                </a>
                                <a class="nav-link" href="<?= base_url(); ?>/admin/workshop/<?= $date_encode; ?>">
                                    <div class="sb-nav-link-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                                    Workshop
                                </a>
                            </nav>
                        </div>

                        <a class="nav-link" href="<?= base_url(); ?>/admin/pemasukan/<?= $date_encode; ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-database" aria-hidden="true"></i></div>
                            Data Pemasukan
                        </a>

                        <a class="nav-link" href="<?= base_url(); ?>/admin/pengeluaran/<?= $date_encode; ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-list" aria-hidden="true"></i></div>
                            Data Pengeluaran
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>/admin/profit/<?= $date_encode; ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-industry" aria-hidden="true"></i></div>
                            Profit
                        </a>

                    <?php endif; ?>
                    <!-- akhir sidebar admin -->

                    <!-- if level usee manager -->
                    <?php if (session('level') == 'manager') : ?>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= base_url('/dashboard'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fas fa-tasks icon-label" aria-hidden="true"></i></div>
                            Data Penjualan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <?php $tanggal = date('d-m-Y'); ?>
                                <?php $date_encode = base64_encode($tanggal); ?>
                                <a class="nav-link" href="<?= base_url(); ?>/view/store/<?= $date_encode; ?>">
                                    <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                                    Store
                                </a>
                                <a class="nav-link" href="<?= base_url(); ?>/view/design/<?= $date_encode; ?>">
                                    <div class="sb-nav-link-icon"><i class="fa fa-desktop" aria-hidden="true"></i></div>
                                    Design
                                </a>
                                <a class="nav-link" href="<?= base_url(); ?>/view/workshop/<?= $date_encode; ?>">
                                    <div class="sb-nav-link-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                                    Workshop
                                </a>
                            </nav>
                        </div>

                    <?php endif; ?>

                    <a class="nav-link tombol-logout" href="<?= base_url('auth/logout'); ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-power-off icon-label" aria-hidden="true"></i></div>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <?= $this->renderSection('content'); ?>

</div>