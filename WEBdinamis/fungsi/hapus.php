<?php
// Periksa apakah sesi sudah dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';

    if (!empty($_GET['jabatan'])) {
        $id = antiinjection($koneksi, $_GET['id']);
        $query = "DELETE FROM jabatan WHERE id = '$id'";
        if (mysqli_query($koneksi, $query)) {
            pesan('success', 'Jabatan telah dihapus.');
        } else {
            pesan('danger', 'Jabatan tidak terhapus karena: ' . mysqli_error($koneksi));
        }
        header('location:../index.php?page=jabatan');
        exit; // Jangan lupa untuk menghentikan eksekusi setelah header redirect
    }

    if (!empty($_GET['anggota'])) {
        $id = antiinjection($koneksi, $_GET['id']);
        $query = "DELETE FROM anggota WHERE user_id = '$id'";
        if (mysqli_query($koneksi, $query)) {
            $query2 = "DELETE FROM user WHERE id = '$id'";
            if (mysqli_query($koneksi, $query2)) {
                pesan('success', "Anggota Telah Terhapus.");
            } else {
                pesan('warning', "Data Anggota Terhapus Tetapi Login Tidak Terhapus Karena: " . mysqli_error($koneksi));
            }
        } else {
            pesan('danger', "Anggota Tidak Terhapus Karena: " . mysqli_error($koneksi));
        }
        header("Location: ../index.php?page=anggota");
        exit; // Jangan lupa untuk menghentikan eksekusi setelah header redirect
    }
} else {
    // Jika sesi tidak valid, Anda mungkin ingin mengarahkan pengguna ke halaman login
    header("Location: ../login.php");
    exit;
}
