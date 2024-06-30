<ul class="navbar-nav bg-gradient-darkblue sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <img class="logo" src="../img/logoputih.png" alt="logo" />
        </div>
        <div class="sidebar-brand-text mx-3">CRPShop</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../admin/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Interface</div>

    <!-- Nav Item - Manajemen Pengguna -->
    <li class="nav-item <?php echo $current_page == 'user-config.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../admin/user-config.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Manajemen Pengguna</span></a>
    </li>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item <?php echo $current_page == 'transaksi.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../admin/transaksi.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Transaksi</span></a>
    </li>

    <!-- Nav Item - Manajemen Game dan Mata Uang -->
    <li class="nav-item <?php echo $current_page == 'config-game.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../admin/config-game.php">
            <i class="fas fa-fw fa-gamepad"></i>
            <span>Manajemen Game dan Mata Uang</span></a>
    </li>

    <!-- Nav Item - Manajemen Paket Pembelian -->
    <li class="nav-item <?php echo $current_page == 'paket-config.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="../admin/paket-config.php">
            <i class="fas fa-fw fa-cube"></i>
            <span>Manajemen Paket Pembelian</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>