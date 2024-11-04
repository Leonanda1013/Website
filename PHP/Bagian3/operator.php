<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Variable a: {$a} <br>";
echo "Variable b: {$b} <br>";
echo "Variable a + b: {$hasilTambah} <br>";
echo "Variable a - b: {$hasilKurang} <br>";
echo "Variable a * b: {$hasilKali} <br>";
echo "Variable a / b: {$hasilBagi} <br>";
echo "Variable a % b: {$sisaBagi} <br>";
echo "Variable a ** b: {$pangkat} <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Variable a: {$a} <br>";
echo "Variable b: {$b} <br>";
echo "Variable a == b: {$hasilSama} <br>";
echo "Variable a != b: {$hasilTidakSama} <br>";
echo "Variable a < b: {$hasilLebihKecil} <br>";
echo "Variable a > b: {$hasilLebihBesar} <br>";
echo "Variable a <= b: {$hasilLebihKecilSama} <br>";
echo "Variable a >= b: {$hasilLebihBesarSama} <br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Variable a: {$a} <br>";
echo "Variable b: {$b} <br>";
echo "Variable a && b: {$hasilAnd} <br>";
echo "Variable a || b: {$hasilOr} <br>";
echo "Variable !a: {$hasilNotA} <br>";
echo "Variable !b: {$hasilNotB} <br>";

$hasilTambah = $a += $b;
$hasilKurang = $a -= $b;
$hasilKali = $a *= $b;
$hasilBagi = $a /= $b;
$hasil = $a %= $b;
$hasilPangkkat = $a **= $b;

echo "Variable a: {$a} <br>";
echo "Variable b: {$b} <br>";
echo "Variable a += b: {$hasilTambah} <br>";
echo "Variable a -= b: {$hasilKurang} <br>";
echo "Variable a *= b: {$hasilKali} <br>";
echo "Variable a /= b: {$hasilBagi} <br>";
echo "Variable a %= b: {$hasil} <br>";
echo "Variable a **= b: {$hasilPangkkat} <br>";


$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Variable a: {$a} <br>";
echo "Variable b: {$b} <br>";
echo "Variable a === b: {$hasilIdentik} <br>";
echo "Variable a !== b: {$hasilTidakIdentik} <br>";


$kursiTotal = 50;
$kursiDipakai = 28;
$kursiKosong = $kursiTotal - $kursiDipakai;
$persentaseKursiKosong = $kursiKosong / $kursiTotal * 100;
echo "Total kursi: {$kursiTotal} <br>";
echo "Kursi yang dipakai: {$kursiDipakai} <br>";
echo "Kursi yang tersisa: {$kursiKosong} <br>";
echo "Persentase kursi yang tersisa: {$persentaseKursiKosong} % <br>";
