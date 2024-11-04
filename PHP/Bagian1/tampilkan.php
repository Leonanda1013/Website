<?php
// Mendefinisikan konstanta untuk nilai Pi
define("PI", 3.14);

// Mengecek apakah form di-submit dan variabel 'jari_jari' ada
if (isset($_POST['jari_jari'])) {
    // Mengambil nilai jari-jari dari input pengguna
    $jari_jari = $_POST['jari_jari'];

    // Menghitung luas lingkaran
    $luas_lingkaran = PI * $jari_jari * $jari_jari;

    // Menampilkan hasil perhitungan dan input yang dimasukkan oleh pengguna
    echo "Jari-jari lingkaran yang Anda masukkan: $jari_jari <br>";
    echo "Luas lingkaran dengan jari-jari $jari_jari adalah: $luas_lingkaran";
} else {
    echo "Silakan masukkan jari-jari lingkaran terlebih dahulu.";
}
