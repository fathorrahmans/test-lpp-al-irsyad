<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nomor_pengiriman',
        'tanggal_pengiriman',
        'kode_acak',
        'status',
    ];
}
