<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']); // Pastikan field password di database juga di-hash menggunakan md5

$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) { // Cek apakah query mengembalikan baris
    $row = mysqli_fetch_assoc($result);

    if ($row['level'] == 1) {
        echo "Anda berhasil login. Silahkan menuju "; ?>
        <a href="homeAdmin.html">Halaman HOME Admin</a>
    <?php
    } else if ($row['level'] == 2) {
        echo "Anda berhasil login. Silahkan menuju "; ?>
        <a href="homeGuest.html">Halaman HOME Guest</a>
    <?php
    }
} else {
    // Jika tidak ada hasil, tampilkan pesan login gagal
    echo "Anda gagal login. Silahkan ";
    ?>
    <a href="loginForm.html">Login kembali</a>
<?php
    echo mysqli_error($connect); // Untuk debugging jika terjadi error pada query
}
?>