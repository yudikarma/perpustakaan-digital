<?= view('layout/head') ?>
<?= view('layout/side_nav') ?>

<?php
$isEdit = isset($book);
$actionUrl = $isEdit ? base_url('admin/book/update/' . $book['id']) : base_url('admin/book/store');
$btnText = $isEdit ? 'Simpan Perubahan' : 'Tambah Buku';
?>

<div class="card border-0">
    <div class="card-header bg-transparent border-0 pt-4 pb-0">
        <div class="d-flex align-items-center gap-2">
            <a href="<?= base_url('admin/book') ?>" class="btn btn-sm btn-outline-secondary border-0 rounded-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
            <h4 class="fw-bold text-dark m-0"><?= esc($title) ?></h4>
        </div>
    </div>
    
    <div class="card-body">
        <form action="<?= $actionUrl ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row g-3">
                <!-- Title & Author -->
                <div class="col-md-6">
                    <label for="title" class="form-label fw-semibold">Judul Buku</label>
                    <input type="text" class="form-control <?= isset($validation['title']) ? 'is-invalid' : '' ?>" 
                           id="title" name="title" value="<?= old('title', $book['title'] ?? '') ?>" placeholder="Masukkan judul buku lengkap">
                    <?php if (isset($validation['title'])): ?>
                        <div class="invalid-feedback d-block"><?= esc($validation['title']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                    <label for="author" class="form-label fw-semibold">Penulis / Pengarang</label>
                    <input type="text" class="form-control <?= isset($validation['author']) ? 'is-invalid' : '' ?>" 
                           id="author" name="author" value="<?= old('author', $book['author'] ?? '') ?>" placeholder="Nama pengarang">
                    <?php if (isset($validation['author'])): ?>
                        <div class="invalid-feedback d-block"><?= esc($validation['author']) ?></div>
                    <?php endif; ?>
                </div>

                <!-- Publisher & Year -->
                <div class="col-md-4">
                    <label for="publisher" class="form-label fw-semibold">Penerbit</label>
                    <input type="text" class="form-control <?= isset($validation['publisher']) ? 'is-invalid' : '' ?>" 
                           id="publisher" name="publisher" value="<?= old('publisher', $book['publisher'] ?? '') ?>" placeholder="Nama penerbit">
                    <?php if (isset($validation['publisher'])): ?>
                        <div class="invalid-feedback d-block"><?= esc($validation['publisher']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="col-md-4">
                    <label for="year" class="form-label fw-semibold">Tahun Terbit</label>
                    <input type="number" class="form-control <?= isset($validation['year']) ? 'is-invalid' : '' ?>" 
                           id="year" name="year" value="<?= old('year', $book['year'] ?? '') ?>" placeholder="Contoh: 2024">
                    <?php if (isset($validation['year'])): ?>
                        <div class="invalid-feedback d-block"><?= esc($validation['year']) ?></div>
                    <?php endif; ?>
                </div>

                <!-- Category & ISBN -->
                <div class="col-md-4">
                    <label for="category" class="form-label fw-semibold">Kategori</label>
                    <input type="text" class="form-control <?= isset($validation['category']) ? 'is-invalid' : '' ?>" 
                           id="category" name="category" value="<?= old('category', $book['category'] ?? '') ?>" placeholder="Contoh: Teknologi, Novel, Fiksi">
                    <?php if (isset($validation['category'])): ?>
                        <div class="invalid-feedback d-block"><?= esc($validation['category']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                    <label for="isbn" class="form-label fw-semibold">Nomor ISBN</label>
                    <input type="text" class="form-control <?= isset($validation['isbn']) ? 'is-invalid' : '' ?>" 
                           id="isbn" name="isbn" value="<?= old('isbn', $book['isbn'] ?? '') ?>" placeholder="Masukkan nomor ISBN buku">
                    <?php if (isset($validation['isbn'])): ?>
                        <div class="invalid-feedback d-block"><?= esc($validation['isbn']) ?></div>
                    <?php endif; ?>
                </div>

                <!-- Cover Upload -->
                <div class="col-md-6">
                    <label for="cover" class="form-label fw-semibold">Cover Buku (JPG / JPEG / PNG, Max 2MB)</label>
                    <input type="file" class="form-control <?= isset($validation['cover']) ? 'is-invalid' : '' ?>" 
                           id="cover" name="cover">
                    <?php if ($isEdit && $book['cover']): ?>
                        <div class="form-text text-muted">Cover saat ini: <code><?= esc($book['cover']) ?></code></div>
                    <?php endif; ?>
                </div>

                <!-- Synopsis -->
                <div class="col-12">
                    <label for="synopsis" class="form-label fw-semibold">Sinopsis / Ringkasan Buku</label>
                    <textarea class="form-control" id="synopsis" name="synopsis" rows="5" placeholder="Masukkan sinopsis buku..."><?= old('synopsis', $book['synopsis'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="border-top pt-4 mt-4">
                <button type="submit" class="btn btn-primary py-2 px-4">
                    <i class="fa-solid fa-floppy-disk me-2"></i><?= $btnText ?>
                </button>
                <a href="<?= base_url('admin/book') ?>" class="btn btn-outline-secondary py-2 px-4 ms-2">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= view('layout/footer') ?>
