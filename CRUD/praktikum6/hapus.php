<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

// Pastikan id diambil dengan aman
$id = isset($_POST['id']) ? $_POST['id'] : null;

// Pastikan id tidak kosong
if ($id === null) {
    echo json_encode(['success' => false, 'message' => 'ID tidak valid']);
    exit;
}

$query = "DELETE FROM anggota WHERE id=?";
$sql = $db1->prepare($query);

if ($sql === false) {
    echo json_encode(['success' => false, 'message' => 'Kesalahan dalam mempersiapkan pernyataan']);
    exit;
}

// Mengikat parameter dan mengeksekusi
$sql->bind_param("i", $id);
$sql->execute();

// Memeriksa apakah ada baris yang terpengaruh
if ($sql->affected_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'Sukses']);
} else {
    echo json_encode(['success' => false, 'message' => 'ID tidak ditemukan']);
}

$sql->close(); // Tutup pernyataan
$db1->close(); // Tutup koneksi database
