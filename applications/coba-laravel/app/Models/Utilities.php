<?php

namespace App\Models;

class Utilities {

    public static function getWaktu() {
        setlocale(LC_TIME, 'id_ID');
        $waktu = strftime('%A, %d-%m-%Y');
        return $waktu;
    }
}
