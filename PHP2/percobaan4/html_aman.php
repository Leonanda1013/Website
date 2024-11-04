<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Aman</title>
</head>

<body>
    <h2>Form Input Aman</h2>
    <?php
    $namaErr = $emailErr = "";
    $nama = $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengamankan input nama
        if (empty($_POST["nama"])) {
            $namaErr = "Nama tidak boleh kosong";
        } else {
            $nama = htmlspecialchars($_POST["nama"], ENT_QUOTES, 'UTF-8');
        }

        // Mengamankan input email
        if (empty($_POST["email"])) {
            $emailErr = "Email tidak boleh kosong";
        } else {
            // Memvalidasi format email
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Format email tidak valid";
            } else {
                $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
            }
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
        <span class="error">* <?php echo $namaErr; ?></span>
        <br><br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Kirim">
    </form>

    <?php
    // Menampilkan data yang berhasil disimpan jika tidak ada error
    if (!empty($nama) && empty($namaErr) && !empty($email) && empty($emailErr)) {
        echo "Data berhasil disimpan!<br>";
        echo "Nama: " . $nama . "<br>";
        echo "Email: " . $email . "<br>";
    }
    ?>
</body>

</html>