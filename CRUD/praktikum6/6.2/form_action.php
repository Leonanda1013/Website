<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

// Pastikan CSRF token valid
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // Mengambil data dan sanitasi input
    $nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'], ENT_QUOTES)));
    $jenis_kelamin = stripslashes(strip_tags(htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES)));
    $alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)));
    $no_telp = stripslashes(strip_tags(htmlspecialchars($_POST['no_telp'], ENT_QUOTES)));

    // Memeriksa apakah semua input diperlukan terisi
    if (empty($nama) || empty($jenis_kelamin) || empty($alamat) || empty($no_telp)) {
        echo json_encode(['error' => 'Semua field harus diisi.']);
        exit;
    }

    // Menyiapkan query untuk menyimpan data anggota
    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
    $sql = $db1->prepare($query);

    // Memeriksa apakah persiapan query berhasil
    if ($sql) {
        $sql->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp);

        // Menjalankan query
        if ($sql->execute()) {
            echo json_encode(['success' => 'Data berhasil disimpan.']);
        } else {
            echo json_encode(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
        $sql->close();
    } else {
        echo json_encode(['error' => 'Terjadi kesalahan dalam persiapan query.']);
    }

    $db1->close();
} else {
    echo json_encode(['error' => 'CSRF token tidak valid.']);
}
