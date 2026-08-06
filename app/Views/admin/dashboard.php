<?= view('layout/head') ?>
<?= view('layout/side_nav') ?>

<!-- Statistics Widgets -->
<div class="row g-4 mb-4">
    <!-- Books Stat Card -->
    <div class="col-md-6">
        <div class="card border-0">
            <div class="card-body widget-card">
                <div>
                    <span class="text-muted fs-6 fw-medium d-block mb-1">Total Koleksi Buku</span>
                    <h2 class="fw-bold text-dark mb-0"><?= esc($totalBooks) ?></h2>
                </div>
                <div class="widget-icon widget-indigo">
                    <i class="fa-solid fa-book-open"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3">
                <a href="<?= base_url('admin/book') ?>" class="btn btn-link text-primary btn-sm p-0 text-decoration-none fw-semibold">
                    Kelola Koleksi <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Categories Stat Card -->
    <div class="col-md-6">
        <div class="card border-0">
            <div class="card-body widget-card">
                <div>
                    <span class="text-muted fs-6 fw-medium d-block mb-1">Total Kategori</span>
                    <h2 class="fw-bold text-dark mb-0"><?= esc($totalCategories) ?></h2>
                </div>
                <div class="widget-icon widget-teal">
                    <i class="fa-solid fa-tags"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3">
                <a href="<?= base_url('admin/book') ?>" class="btn btn-link text-success btn-sm p-0 text-decoration-none fw-semibold" style="color: #14b8a6 !important;">
                    Lihat Kategori <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Welcome Panel -->
<div class="card border-0">
    <div class="card-header border-0 bg-transparent pt-4">
        <h4 class="fw-bold text-dark m-0">Dashboard Manajemen Perpustakaan</h4>
    </div>
    <div class="card-body">
        <p class="text-secondary mb-4">Selamat datang di sistem manajemen Perpustakaan Buku Digital Universitas Siber Asia. Sebagai administrator, Anda memiliki kontrol penuh untuk menambah, memperbarui, atau menghapus koleksi buku dari database.</p>
        
        <div class="row g-3">
            <div class="col-sm-6 col-md-4">
                <div class="p-3 border rounded-3 bg-light text-center">
                    <i class="fa-solid fa-circle-plus text-primary display-6 mb-2"></i>
                    <h6 class="fw-bold text-dark mb-1">Tambah Buku Baru</h6>
                    <p class="small text-muted mb-2">Unggah buku beserta data ISBN dan covernya.</p>
                    <a href="<?= base_url('admin/book/create') ?>" class="btn btn-primary btn-sm w-100">Tambah Buku</a>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-4">
                <div class="p-3 border rounded-3 bg-light text-center">
                    <i class="fa-solid fa-book-open text-success display-6 mb-2"></i>
                    <h6 class="fw-bold text-dark mb-1">Daftar Koleksi</h6>
                    <p class="small text-muted mb-2">Lihat dan cari koleksi buku perpustakaan.</p>
                    <a href="<?= base_url('admin/book') ?>" class="btn btn-success btn-sm w-100 text-white" style="background-color: #14b8a6; border-color: #14b8a6;">Kelola Buku</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
