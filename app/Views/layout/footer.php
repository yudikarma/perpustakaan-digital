    </div> <!-- Close main-content -->
</div> <!-- Close content -->
</div> <!-- Close wrapper -->

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

<!-- SweetAlert2 Toast & Alerts Configuration -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Success Flash Message
        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                title: 'Berhasil!',
                text: '<?= esc(session()->getFlashdata('success'), 'js') ?>',
                icon: 'success',
                timer: 3500,
                showConfirmButton: false,
                confirmButtonColor: '#4f46e5'
            });
        <?php endif; ?>

        // Error Flash Message
        <?php if (session()->getFlashdata('error')): ?>
            Swal.fire({
                title: 'Gagal!',
                text: '<?= esc(session()->getFlashdata('error'), 'js') ?>',
                icon: 'error',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#4f46e5'
            });
        <?php endif; ?>

        // Generic Delete Confirmation Handler
        const deleteButtons = document.querySelectorAll('.btn-delete-confirm');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                const name = this.getAttribute('data-name') || 'data ini';

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Anda akan menghapus "${name}". Tindakan ini tidak dapat dibatalkan!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>
</body>
</html>
