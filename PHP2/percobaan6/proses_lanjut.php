<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectBuah = $_POST["buah"];

    if (isset($_POST['warna'])) {
        $selectWarna = $_POST['warna'];
    } else {
        $selectWarna = [];
    }

    $selectedJenisKelamin = $_POST['jeniskelamin'];

    echo "Anda memilih buah: " . $selectBuah . "<br>";

    if (!empty($selectWarna)) {
        echo "Warna favorit Anda:" . implode(", ", $selectWarna) . "<br>";
    } else {
        echo "Anda tidak memilih warna favorit.<br>";
    }

    echo "Jenis kelamin Anda: " . $selectedJenisKelamin;
}
