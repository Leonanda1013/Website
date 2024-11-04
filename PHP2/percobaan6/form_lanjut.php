<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Form dengan PHP</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h2>Form Contoh</h2>

    <form method="post" id="myForm">
        <label for="buah" id="buah">
            <select name="buah" id="buah">
                <option value="apel">Apel</option>
                <option value="pisang">Pisang</option>
                <option value="Mangga">Mangga</option>
                <option value="Jeruk">Jeruk</option>
            </select>

            <br>

            <label>Pilih Warna Favorit</label><br>
            <input type="checkbox" name="warna[]" value="merah">Merah <br>
            <input type="checkbox" name="warna[]" value="biru">Biru <br>
            <input type="checkbox" name="warna[]" value="hijau">Hijau <br>

            <br>

            <label>Pilih Jenis Kelamin</label><br>
            <input type="radio" name="jeniskelamin" value="laki-laki">Laki-laki <br>
            <input type="radio" name="jeniskelamin" value="perempuan">Perempuan <br>

            <br>

            <input type="submit" value="Submit">
        </label>
    </form>

    <script>
        $(document).ready(function() {
            $('#myform').submit(function(e) {
                e.preventDefault();

                var forData = $("#myForm").serialize();

                $.ajax({
                    url: 'proses_lanjut.php',
                    type: 'POST',
                    data: forData,
                    success: function(response) {
                        $("#hasil").html(response);
                    },
                    error: function(xhr, status, error) {
                        $("#hasil").html("Terjadi kesalahan: " + error);
                    }
                });

            });
        });
    </script>
</body>

</html>