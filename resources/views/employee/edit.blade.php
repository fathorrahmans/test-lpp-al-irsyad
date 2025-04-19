<!-- Modal -->
<div class="modal fade" id="edit-employee-modal" tabindex="-1" aria-labelledby="pegawaiModalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pegawaiModalEditLabel">Edit Pegawai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="edit-employee-form">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="form-select" id="jabatan" name="jabatan" required>
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="kepala sekolah">Kepala Sekolah</option>
                            <option value="wakil kepala sekolah">Wakil Kepala Sekolah</option>
                            <option value="guru">Guru</option>
                            <option value="tata usaha">Tata Usaha</option>
                            <option value="bendahara">Bendahara</option>
                            <option value="keamanan">Keamanan</option>
                            <option value="kebersihan">Petugas Kebersihan</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btn-update" disabled>
                        <span id="btn-text">Perbarui</span>
                        <span id="btn-spinner" class="spinner-border spinner-border-sm mx-4" role="status"
                            aria-hidden="true" style="display: none;"></span>
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
