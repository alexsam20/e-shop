<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo PATH; ?>" class="brand-link" target="_blank">
        <img src="<?php echo PATH; ?>/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo PATH ?>/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo ADMIN ?>/user/edit?id=<?php echo $_SESSION['user']['id']; ?>" class="d-block"><?php echo htmlspecialchars($_SESSION['user']['name']); ?></a>
                <a href="<?php echo ADMIN ?>/user/logout" class="d-block">Logout</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo ADMIN ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo ADMIN ?>/category" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo ADMIN ?>/product" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= ADMIN ?>/download" class="nav-link">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>Files</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= ADMIN ?>/order" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= ADMIN ?>/user" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= ADMIN ?>/cache" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>Setting Cache</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= ADMIN ?>/page" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Pages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= ADMIN ?>/slider" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>Slider</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
