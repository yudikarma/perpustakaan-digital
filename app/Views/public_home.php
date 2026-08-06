<?= view('layout/head') ?>
<?= view('layout/side_nav') ?>

<!-- Search Section -->
<div class="card border-0 mb-4 bg-primary text-white position-relative overflow-hidden" style="border-radius: var(--card-radius); background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%) !important;">
    <div class="card-body p-4 p-md-5 position-relative" style="z-index: 2;">
        <h2 class="fw-extrabold mb-2">Cari Referensi Buku Digital</h2>
        <p class="mb-4 text-white-50 opacity-90">Akses koleksi buku, jurnal, dan bacaan kuliah digital Universitas Siber Asia secara instan.</p>
        
        <form action="<?= base_url('/') ?>" method="GET" class="row g-2">
            <div class="col-md-9">
                <div class="input-group input-group-lg shadow-sm">
                    <span class="input-group-text bg-white border-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" class="form-control border-0 bg-white" name="search" value="<?= esc($search ?? '') ?>" placeholder="Cari judul buku, penulis, kategori, atau nomor ISBN..." style="border-radius: 0 10px 10px 0 !important;">
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-light btn-lg w-100 fw-bold text-primary">
                    <i class="fa-solid fa-filter me-2"></i>Filter Cari
                </button>
            </div>
        </form>
    </div>
    <div style="position: absolute; right: -50px; bottom: -50px; font-size: 200px; color: rgba(255, 255, 255, 0.05); pointer-events: none; z-index: 1;">
        <i class="fa-solid fa-book-open"></i>
    </div>
</div>

<!-- Books Catalog Section -->
<div class="row g-4 book-grid">
    <?php if (empty($books)): ?>
        <div class="col-12">
            <div class="card border-0 text-center py-5">
                <div class="card-body py-5 text-muted">
                    <i class="fa-solid fa-book-open display-1 mb-3 text-secondary opacity-30"></i>
                    <h4 class="fw-bold">Buku Tidak Ditemukan</h4>
                    <p class="small mb-4">Tidak ada hasil pencarian yang cocok untuk kata kunci "<?= esc($search) ?>"</p>
                    <a href="<?= base_url('/') ?>" class="btn btn-primary btn-sm px-4"><i class="fa-solid fa-arrow-rotate-left me-2"></i>Kembalikan Katalog</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($books as $book): ?>
            <div class="col-sm-6 col-md-4 col-xl-3 book-card">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden d-flex flex-column">
                    <div class="p-3">
                        <div class="book-cover-container">
                            <img class="book-cover-img" src="<?= base_url('uploads/covers/' . ($book['cover'] ? $book['cover'] : 'default-cover.jpg')) ?>" alt="<?= esc($book['title']) ?>" onerror="this.src='https://images.unsplash.com/photo-1543002588-bfa74002ed7e?q=80&w=387&auto=format&fit=crop'">
                        </div>
                    </div>
                    <div class="card-body pt-0 d-flex flex-column justify-content-between flex-grow-1">
                        <div>
                            <span class="badge mb-2" style="background-color: rgba(79, 70, 229, 0.1); color: var(--primary); font-size: 0.75rem; font-weight: 600;">
                                <?= esc($book['category']) ?>
                            </span>
                            <h5 class="fw-bold text-dark mb-1 text-truncate" title="<?= esc($book['title']) ?>"><?= esc($book['title']) ?></h5>
                            <p class="text-secondary small mb-2"><i class="fa-regular fa-user me-1"></i><?= esc($book['author']) ?></p>
                        </div>
                        <div class="border-top pt-3 d-flex align-items-center justify-content-between mt-auto">
                            <span class="text-muted small fw-medium"><?= esc($book['year']) ?></span>
                            <a href="<?= base_url('book/detail/' . $book['id']) ?>" class="btn btn-outline-primary btn-sm px-3 rounded-pill fw-semibold">
                                <i class="fa-solid fa-eye me-1"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Pagination -->
        <div class="col-12 d-flex justify-content-center mt-5">
            <?= $pager->links('default', 'bootstrap5') ?>
        </div>
    <?php endif; ?>
</div>

<?= view('layout/footer') ?>
