<?php
// Memasukkan koneksi database
include('koneksi.php');

// Memeriksa apakah parameter 'id' dan 'aksi' tersedia dalam URL
if (isset($_GET['id']) && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    // Mengambil ID dari URL
    $id = $_GET['id'];

    // Membuat query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM anggota WHERE id = $id";

    // Menjalankan query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, kembali ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "ID atau aksi tidak valid.";
}

// Menutup koneksi database
mysqli_close($koneksi);
