
<?php
//ini kode coba coba
session_start();
header('Content-Type: application/json');

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Verifikasi CSRF token
$headers = apache_request_headers();
if (isset($headers['Csrf-Token'])) {
    if ($headers['Csrf-Token'] !== $_SESSION['csrf_token']) {
        exit(json_encode(['error' => 'Wrong CSRF token.']));
    }
} else {
    exit(json_encode(['error' => 'No CSRF token.']));
}

// Koneksi ke database
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    if ($id) {
        // Update data
        $query = "UPDATE anggota SET nama=?, jenis_kelamin=?, alamat=?, no_telp=? WHERE id=?";
        $stmt = $dbl->prepare($query);
        $stmt->bind_param("ssssi", $nama, $jenis_kelamin, $alamat, $no_telp, $id);
    } else {
        // Insert data
        $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
        $stmt = $dbl->prepare($query);
        $stmt->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp);
    }

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Data berhasil disimpan.']);
    } else {
        echo json_encode(['error' => 'Gagal menyimpan data.']);
    }

    $stmt->close();
}
?>
