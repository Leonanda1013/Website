<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form Input php</title>
</head>

<body>
    <h2>Form Input PHP</h2>
    <?php
    $namaErr = "";
    $nama = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "Nama tidak boleh kosong";
        } else {
            $nama = $_POST["nama"];
            echo "Data berhasil disimpan!";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nama: <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>">
        <span class="error">* <?php echo $namaErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>