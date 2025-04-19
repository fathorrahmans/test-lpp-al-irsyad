<!-- Modal for student deleted -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus siswa <strong id="student-nama"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="btn-confirm-delete">
                    <span id="btn-text">Hapus</span>
                    <span id="btn-spinner" class="spinner-border spinner-border-sm mx-3" role="status"
                        aria-hidden="true" style="display: none;"></span></button>
            </div>
        </div>
    </div>
</div>
