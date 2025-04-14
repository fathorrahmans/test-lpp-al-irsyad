<form action="{{ route('pengiriman.index') }}" method="GET">
    <div class="row g-2">
        <div class="col-md-8">
            <select name="filter_status" class="form-select">
                <option value="">-- Pilih Status --</option>
                <option value="retur" {{ request('filter_status') == 'retur' ? 'selected' : '' }}>Retur</option>
                <option value="terkirim" {{ request('filter_status') == 'terkirim' ? 'selected' : '' }}>Terkirim
                </option>
                <option value="rusak" {{ request('filter_status') == 'rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary w-100" type="submit">Filter</button>
        </div>
    </div>
</form>
