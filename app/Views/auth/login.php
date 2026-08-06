<?= view('layout/head') ?>
<?= view('layout/side_nav') ?>

<div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 160px);">
    <div class="col-md-5">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-transparent text-center border-0 pt-5 pb-2">
                <i class="fa-solid fa-user-shield text-primary display-4 mb-3"></i>
                <h4 class="fw-bold text-dark m-0">Administrator Login</h4>
                <p class="text-muted small mt-1">Silakan masukkan username dan password Anda</p>
            </div>
            
            <div class="card-body px-4 pb-5">
                <form action="<?= base_url('login-process') ?>" method="POST">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-user text-secondary"></i></span>
                            <input type="text" class="form-control border-start-0 bg-light" id="username" name="username" value="<?= old('username') ?>" placeholder="Masukkan username admin" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-lock text-secondary"></i></span>
                            <input type="password" class="form-control border-start-0 bg-light" id="password" name="password" placeholder="Masukkan password admin" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold rounded-3">
                        <i class="fa-solid fa-right-to-bracket me-2"></i> Masuk Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
