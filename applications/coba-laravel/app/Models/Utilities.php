<?php

namespace App\Models;

use Illuminate\Support\Facades\Date;

class Utilities {

    public static function getTanggal() {
        setlocale(LC_TIME, 'id_ID');
        $tanggal = strftime('%A, %d-%b-%Y');
        return $tanggal;
    }
}
