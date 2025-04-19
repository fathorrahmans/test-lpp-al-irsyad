<!-- Modal for email confirm -->
<div class="modal fade" id="email-employee-modal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel">Kirim Email Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Data Pegawai</h5>
                <strong>Nama:</strong> <span id="email-confirm-nama"></span><br />
                <strong>Email:</strong> <span id="email-confirm-email"></span><br />
                <strong>Jabatan:</strong> <span id="email-confirm-jabatan"></span><br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-warning" id="btn-confirm-email">
                    <span id="btn-text">Kirim Email</span>
                    <span id="btn-spinner" class="spinner-border spinner-border-sm mx-4" role="status"
                        aria-hidden="true" style="display: none;"></span></button>
            </div>
        </div>
    </div>
</div>
