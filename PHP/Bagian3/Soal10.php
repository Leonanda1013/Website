<?php
if (isset($_POST['submit'])) {
    // Mengambil input dari form
    $bilangan1 = $_POST['bilangan1'];
    $bilangan2 = $_POST['bilangan2'];

    // Melakukan operasi aritmatika
    $penjumlahan = $bilangan1 + $bilangan2;
    $pengurangan = $bilangan1 - $bilangan2;
    $perkalian = $bilangan1 * $bilangan2;
    $pembagian = $bilangan2 != 0 ? $bilangan1 / $bilangan2 : "Tidak bisa dibagi dengan nol";

    // Menampilkan hasil
    echo "<h3>Hasil Operasi</h3>";
    echo "Penjumlahan: {$bilangan1} + {$bilangan2} = {$penjumlahan} <br>";
    echo "Pengurangan: {$bilangan1} - {$bilangan2} = {$pengurangan} <br>";
    echo "Perkalian: {$bilangan1} * {$bilangan2} = {$perkalian} <br>";
    echo "Pembagian: {$bilangan1} / {$bilangan2} = {$pembagian} <br>";
}
