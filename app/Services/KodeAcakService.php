<?php

namespace App\Services;

use Illuminate\Support\Carbon;

class KodeAcakService
{
    public static function parse($kode)
    {
        [$nomor, $tanggal, $kodeAcak] = explode('-', $kode);
        $dateFormatted = Carbon::createFromFormat('Ymd', $tanggal)->toDateString();

        return [
            'nomor' => $nomor,
            'tanggal' => $dateFormatted,
            'kodeAcak' => $kodeAcak,
        ];
    }
}
