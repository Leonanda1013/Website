<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C";
} elseif ($nilaiNumerik >= 70) {
    echo "Nilai huruf: D";
}

echo "<br>";
echo "<br>";
echo "<br>";
echo "=========================================================";
echo "<br>";
$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}

echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";

echo "<br>";

echo "Jumlah buah yang akan dipanen adalah: 500";


echo " <br>";
echo " <br>";
echo " <br>";

echo "Total skor ujian adalah: 441";

echo "<br>";

$nilaiArray = [
    85 => "Lulus",
    92 => "Lulus",
    58 => "Tidak lulus",
    64 => "Lulus",
    90 => "Lulus",
    55 => "Tidak lulus",
    88 => "Lulus",
    79 => "Lulus",
    70 => "Lulus",
    96 => "Lulus",
    45 => "Tidak lulus",
    72 => "Lulus"
];

foreach ($nilaiArray as $nilai => $status) {
    echo "Nilai: {$nilai} ({$status})<br>";
}




$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];


sort($nilaiSiswa);


$nilaiTerendah1 = $nilaiSiswa[0];
$nilaiTerendah2 = $nilaiSiswa[1];


$nilaiTertinggi1 = $nilaiSiswa[8];
$nilaiTertinggi2 = $nilaiSiswa[9];


$totalNilai = 0;
foreach ($nilaiSiswa as $nilai) {
    if (
        $nilai !== $nilaiTerendah1 && $nilai !== $nilaiTerendah2 &&
        $nilai !== $nilaiTertinggi1 && $nilai !== $nilaiTertinggi2
    ) {
        $totalNilai += $nilai;
    }
}


$rataRata = $totalNilai / 6;


echo "Total nilai yang digunakan untuk menentukan rata-rata: $totalNilai <br>";
echo "Rata-rata nilai setelah mengabaikan nilai tertinggi dan terendah: $rataRata";




echo "<br>";
$hargaProduk = 120000;
$diskonPersen = 20;

if ($hargaProduk > 100000) {
    $diskon = ($diskonPersen / 100) * $hargaProduk;
} else {
    $diskon = 0;
}

$hargaSetelahDiskon = $hargaProduk - $diskon;

echo "Harga produk: Rp " . $hargaProduk . "<br>";
echo "Diskon: Rp " . $diskon . "<br>";
echo "Harga yang harus dibayar setelah diskon: Rp " . $hargaSetelahDiskon . "<br>";

echo "<br>";
$poin = 550;

$totalSkor = $poin;
$hadiahTambahan = ($poin > 500) ? "YA" : "TIDAK";

echo "Total skor pemain adalah: $totalSkor<br>";
echo "Apakah pemain mendapatkan hadiah tambahan? $hadiahTambahan<br>";
