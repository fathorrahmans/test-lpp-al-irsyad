<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pegawaiModal">
    Tambah Pengiriman Barang
</button>

<!-- Modal -->
<div class="modal fade" id="pegawaiModal" tabindex="-1" aria-labelledby="pegawaiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pegawaiModalLabel">Tambah Kode Pengiriman Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pengiriman.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode Pengiriman Barang</label>
                        <input type="text" id="kode" name="kode" class="form-control "
                            placeholder="Masukkan Kode Pengiriman Barang" required>
                        <small class="text-danger mt-2">Contoh: NP1234-20250421-ABCD7</small>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status </label>
                        <select id="status" name="status" class="form-select" style="max-width: 170px;" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="retur">Retur</option>
                            <option value="terkirim">Terkirim</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
