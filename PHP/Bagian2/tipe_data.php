<?php
$a = 10;
$b = 5;
$c = $a + 5;
$d = $b + (10  * 5);
$e = $d - $c;

echo "Variable a: {$a} <br>";
echo "Variable b: {$b} <br>";
echo "Variable c: {$c} <br>";
echo "Variable d: {$d} <br>";
echo "Variable e: {$e} <br>";

var_dump($e);

$nilaiMatematika = 5.1;
$nilaiIPA = 6.7;
$nilaiBahasaIndonesia = 9.3;

$rataRata = ($nilaiMatematika + $nilaiIPA + $nilaiBahasaIndonesia) / 3;

echo "Matematika: {$nilaiMatematika} <br>";
echo "IPA: {$nilaiIPA} <br>";
echo "Bahasa Indonesia: {$nilaiBahasaIndonesia} <br>";
echo "Rata-rata: {$rataRata} <br>";

var_dump($rataRata);
$apakahSiswalulus = true;
$apakahSiswaSudahUjian = false;
var_dump($apakahSiswalulus);
echo "<br>";
var_dump($apakahSiswaSudahUjian);


$namaDepan = "Ibnu";
$namaBelakang = 'Jakaria';
$namaLengkap = "{$namaDepan}{$namaBelakang}";
$namaLengkap2 = $namaDepan . ' ' . $namaBelakang;
echo "Nama Depan: {$namaDepan} <br>";
echo 'Nama Belakang:' .  $namaBelakang . 's<br>';
echo $namaLengkap;

$listMahasiswa = ["Wahid Abullah", "Elmo Bachtiar", "Lendis Fbri"];
echo $listMahasiswa[0];
