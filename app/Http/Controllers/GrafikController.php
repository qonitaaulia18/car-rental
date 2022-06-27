<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\PemesananArmada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GrafikController extends Controller
{
    public function grafik(){
        $bookingData = Pemesanan::select('id', 'tgl_transaksi')
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->tgl_transaksi)->format('m');
        });

        $bookingmcount = [];
        $bookingArr = [];

        foreach ($bookingData as $key => $value) {
            $bookingmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($bookingmcount[$i])){
                $bookingArr[$i] = $bookingmcount[$i];    
            }else{
                $bookingArr[$i] = 0;    
            }
        }
        return view('grafik', compact('bookingData','bookingmcount','bookingArr'));
    }
}