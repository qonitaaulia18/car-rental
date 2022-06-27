<?php

namespace App\Widgets;

use App\Models\Pemesanan;
use Carbon\Carbon;
use Arrilot\Widgets\AbstractWidget;
use App\Http\Controllers\GrafikController;

class grafik extends AbstractWidget
{
    /**
     * 
     * 
     * @var array
     */
    protected $config = [];

    public function run(){
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

    public function shouldbeDisplayed()
    {
        return true;
    }
}
?>