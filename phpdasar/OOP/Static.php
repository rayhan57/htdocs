<?php

class ContohStatic {
    public static $angka = 1;

    public static function Salam() {
        return "Selamat Pagi " . self::$angka++ . " kali" . "<br>";
    }
}

$cth = new ContohStatic;
echo $cth->Salam();
echo $cth->Salam();
echo $cth->Salam();

echo "<hr>";

$cth2 = new ContohStatic;
echo $cth2->Salam();
echo $cth2->Salam();
echo $cth2->Salam();
