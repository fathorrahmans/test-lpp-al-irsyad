<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-employee-modal">
    Tambah Pegawai
</button>

<!-- Modal -->
<div class="modal fade" id="add-employee-modal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addEmployeeModalLabel">Tambah Pegawai Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='add-employee-form'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="form-select" id="jabatan" name="jabatan" aria-label="Default select example"
                            required>
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
                    <button type="button" class="btn btn-primary" id="btn-save" disabled>
                        <span id="btn-text">Simpan</span>
                        <span id="btn-spinner" class="spinner-border spinner-border-sm mx-4" role="status"
                            aria-hidden="true" style="display: none;"></span></button>
                </div>
            </form>
        </div>
    </div>
</div>
