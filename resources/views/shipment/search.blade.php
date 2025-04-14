<form method="GET" action="{{ route('pengiriman.index') }}" class="mb-3">
    <div class="row">
        <div class="col-md-8">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Kode Pengiriman..."
                    value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </div>
</form>
