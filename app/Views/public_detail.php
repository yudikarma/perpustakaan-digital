<?= view('layout/head') ?>
<?= view('layout/side_nav') ?>

<div class="card border-0">
    <div class="card-header bg-transparent border-0 pt-4 pb-0">
        <a href="<?= base_url('/') ?>" class="btn btn-sm btn-outline-secondary border-0 rounded-2">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Katalog
        </a>
    </div>
    
    <div class="card-body p-4 p-md-5">
        <div class="row g-5">
            <!-- Left Side Cover -->
            <div class="col-md-4">
                <div class="book-cover-container" style="max-width: 300px; margin: 0 auto;">
                    <img class="book-cover-img" src="<?= base_url('uploads/covers/' . ($book['cover'] ? $book['cover'] : 'default-cover.jpg')) ?>" alt="<?= esc($book['title']) ?>" onerror="this.src='https://images.unsplash.com/photo-1543002588-bfa74002ed7e?q=80&w=387&auto=format&fit=crop'">
                </div>
            </div>
            
            <!-- Right Side Details -->
            <div class="col-md-8">
                <span class="badge mb-3 px-3 py-2 rounded-pill" style="background-color: rgba(79, 70, 229, 0.1); color: var(--primary); font-weight: 600;">
                    <?= esc($book['category']) ?>
                </span>
                
                <h1 class="fw-bold text-dark mb-3"><?= esc($book['title']) ?></h1>
                
                <div class="row g-3 mb-4 bg-light p-3 rounded-3" style="font-size: 0.9rem;">
                    <div class="col-6 col-sm-4">
                        <div class="text-muted small">Penulis</div>
                        <div class="fw-bold text-dark"><i class="fa-regular fa-user me-1 text-primary"></i> <?= esc($book['author']) ?></div>
                    </div>
                    <div class="col-6 col-sm-4">
                        <div class="text-muted small">Penerbit</div>
                        <div class="fw-bold text-dark"><i class="fa-regular fa-building me-1 text-primary"></i> <?= esc($book['publisher']) ?></div>
                    </div>
                    <div class="col-6 col-sm-4">
                        <div class="text-muted small">Tahun Terbit</div>
                        <div class="fw-bold text-dark"><i class="fa-regular fa-calendar me-1 text-primary"></i> <?= esc($book['year']) ?></div>
                    </div>
                    <div class="col-6 col-sm-4">
                        <div class="text-muted small">Nomor ISBN</div>
                        <div class="fw-bold text-dark"><i class="fa-solid fa-barcode me-1 text-primary"></i> <?= esc($book['isbn']) ?></div>
                    </div>
                </div>

                <h5 class="fw-bold text-dark mb-2">Sinopsis Buku</h5>
                <p class="text-secondary" style="white-space: pre-line; line-height: 1.7; font-size: 0.95rem;">
                    <?= $book['synopsis'] ? esc($book['synopsis']) : '<em>Tidak ada sinopsis untuk buku ini.</em>' ?>
                </p>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
