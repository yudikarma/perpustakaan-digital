<?= view('layout/head') ?>
<?= view('layout/side_nav') ?>

<div class="card border-0">
    <div class="card-header bg-transparent d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-0 pt-4 pb-0 gap-3">
        <h4 class="fw-bold text-dark m-0">Koleksi Buku Perpustakaan</h4>
        <div class="d-flex gap-2 w-100 w-sm-auto">
            <form action="<?= base_url('admin/book') ?>" method="GET" class="d-flex gap-2 flex-grow-1">
                <input type="text" class="form-control form-control-sm bg-light border-0 px-3" name="search" value="<?= esc($search ?? '') ?>" placeholder="Cari buku..." style="min-width: 180px;">
                <button type="submit" class="btn btn-outline-secondary btn-sm border-0"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <a href="<?= base_url('admin/book/create') ?>" class="btn btn-primary btn-sm px-3 rounded-2 text-nowrap">
                <i class="fa-solid fa-plus me-1"></i> Tambah Buku
            </a>
        </div>
    </div>
    
    <div class="card-body">
        <?php if (empty($books)): ?>
            <div class="text-center py-5 text-muted">
                <i class="fa-solid fa-book-open display-3 mb-3 text-secondary opacity-30"></i>
                <h5>Belum ada koleksi buku</h5>
                <p class="small">Silakan tambahkan buku baru ke sistem.</p>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light border-0">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 10%;">Cover</th>
                            <th style="width: 35%;">Detail Buku</th>
                            <th style="width: 15%;">Kategori</th>
                            <th style="width: 15%;">ISBN</th>
                            <th style="width: 20%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        <?php 
                        // Set number offset based on page
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $no = ($page - 1) * 10 + 1;
                        foreach ($books as $book): 
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <img src="<?= base_url('uploads/covers/' . ($book['cover'] ? $book['cover'] : 'default-cover.jpg')) ?>" 
                                         alt="Cover" class="rounded-2" style="width: 45px; height: 63px; object-fit: cover; box-shadow: 0 2px 4px rgba(0,0,0,0.08);"
                                         onerror="this.src='https://images.unsplash.com/photo-1543002588-bfa74002ed7e?q=80&w=387&auto=format&fit=crop'">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= esc($book['title']) ?></div>
                                    <div class="text-secondary small">
                                        <i class="fa-regular fa-user me-1"></i><?= esc($book['author']) ?> &middot; 
                                        <span class="text-muted"><?= esc($book['publisher']) ?> (<?= esc($book['year']) ?>)</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-secondary border px-2 py-1.5" style="font-size: 0.75rem;">
                                        <?= esc($book['category']) ?>
                                    </span>
                                </td>
                                <td class="text-dark font-monospace small"><?= esc($book['isbn']) ?></td>
                                <td class="text-center">
                                    <div class="btn-group gap-2">
                                        <a href="<?= base_url('admin/book/edit/' . $book['id']) ?>" 
                                           class="btn btn-sm btn-outline-primary border-0 rounded-2" title="Edit Buku">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="<?= base_url('admin/book/delete/' . $book['id']) ?>" 
                                           class="btn btn-sm btn-outline-danger border-0 rounded-2 btn-delete-confirm" 
                                           data-name="<?= esc($book['title']) ?>" title="Hapus Buku">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                <?= $pager->links('default', 'default') ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= view('layout/footer') ?>
