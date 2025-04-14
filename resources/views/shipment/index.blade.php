@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">Data Pengiriman Barang</h1>

    @include('shipment.add')
    <div class="row mt-5">
        <div class="col-md-8">
            @include('shipment.search')
        </div>
        <div class="col-md-4">
            @include('shipment.filter')
        </div>
    </div>

    {{-- Daftar Pengiriman Berdasarkan Status --}}
    <div class="row ">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nomor Pengiriman</th>
                    <th scope="col">Tanggal Pengiriman</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @if ($shipments->isEmpty())
                    <td colspan="5" class="text-center">Tidak Ada Data Kode Pengiriman Barang</td>
                @endif
                @foreach ($shipments as $shipment)
                    <tr>
                        <th scope="row">{{ ($shipments->currentPage() - 1) * $shipments->perPage() + $loop->iteration }}
                        </th>
                        <td>{{ $shipment->kode }}</td>
                        <td>{{ $shipment->nomor_pengiriman }}</td>
                        <td>{{ $shipment->tanggal_pengiriman }}</td>
                        <td>
                            @if ($shipment->status == 'retur')
                                <span class="badge bg-danger">Retur</span>
                            @elseif ($shipment->status == 'terkirim')
                                <span class="badge bg-success">Terkirim</span>
                            @elseif ($shipment->status == 'rusak')
                                <span class="badge bg-warning">Rusak</span>
                            @else
                                <span class="badge bg-secondary">-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end mb-5">
        {{ $shipments->onEachSide(0)->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
