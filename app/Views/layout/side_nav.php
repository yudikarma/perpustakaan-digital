<?php
$current_uri = service('uri')->getPath();
$isLoggedIn = session()->has('user_id');
?>
<!-- Sidebar -->
<div id="sidebar">
    <div class="brand">
        <i class="fa-solid fa-book-bookmark"></i>
        <span>UNSIA LIBRARY</span>
    </div>
    
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="<?= base_url('/') ?>" class="nav-link <?= $current_uri === '' || $current_uri === '/' ? 'active' : '' ?>">
                <i class="fa-solid fa-globe"></i>
                <span>Portal Buku</span>
            </a>
        </li>
        
        <?php if ($isLoggedIn): ?>
            <li class="nav-item">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= strpos($current_uri, 'admin/dashboard') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/book') ?>" class="nav-link <?= (strpos($current_uri, 'admin/book') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Kelola Buku</span>
                </a>
            </li>
            <li class="nav-item mt-4 pt-4 border-top border-secondary border-opacity-25">
                <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>
        <?php else: ?>
            <li class="nav-item mt-4 pt-4 border-top border-secondary border-opacity-25">
                <a href="<?= base_url('login') ?>" class="nav-link <?= strpos($current_uri, 'login') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-lock-open"></i>
                    <span>Login Admin</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>

    <div class="sidebar-footer">
        <span>YUDI KARMA &copy; <?= date('Y') ?></span>
    </div>
</div>

<!-- Main Content Area -->
<div id="content">
    <!-- Topbar -->
    <div class="topbar">
        <div>
            <h5 class="m-0 fw-bold text-dark"><?= esc($title ?? 'Perpustakaan') ?></h5>
        </div>
        <div class="d-flex align-items-center gap-3">
            <?php if ($isLoggedIn): ?>
                <span class="badge px-3 py-2 rounded-pill" style="background-color: rgba(79, 70, 229, 0.1); color: var(--primary);">
                    <i class="fa-solid fa-user-shield me-2"></i>Admin: <?= esc(session()->get('user_name')) ?>
                </span>
            <?php else: ?>
                <span class="badge px-3 py-2 rounded-pill" style="background-color: rgba(100, 116, 139, 0.1); color: #475569;">
                    <i class="fa-solid fa-user me-2"></i>Pengunjung Publik
                </span>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Main Content Body -->
    <div class="main-content">
