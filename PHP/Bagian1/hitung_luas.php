<?php
// Mendefinisikan konstanta untuk nilai Pi
define("PI", 3.14);

// Mendapatkan input dari pengguna melalui form
if (isset($_POST['jari_jari'])) {
    $jari_jari = $_POST['jari_jari'];

    // Menghitung luas lingkaran
    $luas_lingkaran = PI * $jari_jari * $jari_jari;

    // Menampilkan hasil perhitungan
    echo "Luas lingkaran dengan jari-jari $jari_jari adalah: $luas_lingkaran";
} else {
    echo "Silakan masukkan jari-jari lingkaran.";
}
