<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $subjek = $_POST["subjek"];
    $pesan = $_POST["pesan"];

    // Sanitasi data input
    $nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $subjek = htmlspecialchars($subjek, ENT_QUOTES, 'UTF-8');
    $pesan = htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8');

    // Email penerima
    $to = "leonandaprabowo@gmail.com";
    // Format pesan email
    $message = "
    Nama: $nama\n
    Email: $email\n
    Subjek: $subjek\n
    Pesan: $pesan
    ";

    // Header untuk pengiriman email
    $headers = "From: " . $email;

    // Kirim email menggunakan fungsi mail()
    if (mail($to, $subjek, $message, $headers)) {
        echo "Pesan berhasil dikirim.";
    } else {
        echo "Pesan gagal dikirim.";
    }
}
