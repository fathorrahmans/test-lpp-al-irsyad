<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Services\KodeAcakService;

class ShipmentController extends Controller
{

    // Get All Shipment
    public function index(Request $request)
    {
        $statusFilter = $request->input('filter_status');
        $search = $request->input('search');

        $shipments = Shipment::when($statusFilter, function ($query) use ($statusFilter) {
            return $query->where('status', $statusFilter);
        })->when($search, function ($query) use ($search) {
            return $query->where('kode', 'like', '%' . $search . '%');
        })->orderBy('id', 'DESC')->paginate(10);

        return view('shipment.index', compact('shipments'));
    }

    // Store shipment to database
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string',
            'status' => 'required|in:retur,terkirim,rusak',
        ]);


        $parsed = KodeAcakService::parse($request->kode);

        Shipment::create([
            'kode' => $request->kode,
            'nomor_pengiriman' => $parsed['nomor'],
            'tanggal_pengiriman' => $parsed['tanggal'],
            'kode_acak' => $parsed['kodeAcak'],
            'status' => $request->status,
        ]);

        return redirect('pengiriman')->with('success', 'Kode Pengiriman Barang berhasil disimpan.');
    }
}
