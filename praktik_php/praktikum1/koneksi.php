<?php
$namaHost = "localhost";
$username = "root";
$password = "";
$database = "prakwebdb";

$connect = mysqli_connect($namaHost, $username, $password, $database);

if ($connect) {
    echo "Koneksi dengan MySQL berhasil ";
} else {
    echo "Koneksi dengan MySQL gagal" . mysqli_connect_error();
}
