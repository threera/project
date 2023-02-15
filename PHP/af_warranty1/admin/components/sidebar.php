
    <?php
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
    ?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">ADMIN</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= ($activePage == 'index') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            product
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= ($activePage == 'create_product' || $activePage == 'product') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-table"></i>
                <span>รายการสินค้า</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= ($activePage == 'create_product') ? 'active' : ''; ?>" href="create_product.php">เพิ่มสินค้า</a>
                    <a class="collapse-item <?= ($activePage == 'product') ? 'active' : ''; ?>" href="product.php">รายการสินค้า</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?= ($activePage == 'buy' || $activePage == 'sell') ? 'active' : ''; ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-folder"></i>
                <span>รายการลงทะเบียน</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= ($activePage == 'buy') ? 'active' : ''; ?>" href="buy.php">ผู้ชื้อ</a>
                    <a class="collapse-item <?= ($activePage == 'sell') ? 'active' : ''; ?>" href="sell.php">ผู้ขาย</a>
                </div>
            </div>
        </li>
        <!-- การรับประกัน -->
        <li class="nav-item <?= ($activePage == 'warranty') ? 'active' : ''; ?>">
            <a class="nav-link" href="warranty.php">
                <i class="fas fa-fw fa-chart-area" aria-hidden="true"></i>
                <span>การรับประกัน</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            service
        </div>
        <li class="nav-item <?= ($activePage == 'user') ? 'active' : ''; ?>">
            <a class="nav-link <?php echo ($_SESSION["lavel"] == 'Member') ? 'disabled' : ''; ?>" href="user.php">
                <i class="fas fa-fw fa-folder" aria-hidden="true"></i>
                <span>สมาชิก</span></a>
        </li>
        <!-- Nav Item - Tables -->
        <li class="nav-item <?= ($activePage == 'claim') ? 'active' : ''; ?>">
            <a class="nav-link" href="claim.php">
                <i class="fas fa-fw fa-wrench"></i>
                <span>รายการเคลม</span></a>
        </li>
        <li class="nav-item <?= ($activePage == 'tables') ? 'active' : ''; ?>">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-cog"></i>
                <span>ตั้งค่า</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>