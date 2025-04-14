<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#siswaAddModal">
    Tambah Siswa
</button>

<!-- Modal -->
<div class="modal fade" id="siswaAddModal" tabindex="-1" aria-labelledby="siswaAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="siswaAddModalLabel">Tambah Siswa Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
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
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" id="kelas" name="kelas" aria-label="Default select example"
                            required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="x rpl 1">X RPL 1</option>
                            <option value="x rpl 2">X RPL 2</option>
                            <option value="x tkj 1">X TKJ 1</option>
                            <option value="x tkj 2">X TKJ 2</option>
                            <option value="xi tei 1">XI TEI 1</option>
                            <option value="xi tei 2">XI TEI 2</option>
                            <option value="xii tsm 1">XII TSM 1</option>
                            <option value="xii tsm 2">XII TSM 2</option>
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
