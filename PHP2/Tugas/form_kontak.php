<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Kontak</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Kontak Kami</h1>
    <form id="contactForm">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" class="error"></span>
        <br><br>

        <label for="email">Alamat Email:</label>
        <input type="email" id="email" name="email">
        <span id="email-error" class="error"></span>
        <br><br>

        <label for="subjek">Subjek:</label>
        <input type="text" id="subjek" name="subjek">
        <span id="subjek-error" class="error"></span>
        <br><br>

        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan"></textarea>
        <span id="pesan-error" class="error"></span>
        <br><br>

        <input type="submit" value="Kirim">
        <div id="result"></div>
    </form>

    <script>
        $(document).ready(function() {
            $("#contactForm").submit(function(event) {
                event.preventDefault();

                var nama = $("#nama").val();
                var email = $("#email").val();
                var subjek = $("#subjek").val();
                var pesan = $("#pesan").val();
                var valid = true;

                // Validasi Nama Lengkap
                if (nama.length < 3) {
                    $("#nama-error").text("Nama lengkap minimal 3 karakter.");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }

                // Validasi Email
                var emailPattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
                if (!emailPattern.test(email)) {
                    $("#email-error").text("Format email tidak valid.");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }

                // Validasi Subjek
                if (subjek === "") {
                    $("#subjek-error").text("Subjek tidak boleh kosong.");
                    valid = false;
                } else {
                    $("#subjek-error").text("");
                }

                // Validasi Pesan
                if (pesan === "") {
                    $("#pesan-error").text("Pesan tidak boleh kosong.");
                    valid = false;
                } else {
                    $("#pesan-error").text("");
                }

                // Jika valid, kirim data melalui AJAX
                if (valid) {
                    $.ajax({
                        url: 'proses_kirim_email.php',
                        type: 'POST',
                        data: {
                            nama: nama,
                            email: email,
                            subjek: subjek,
                            pesan: pesan
                        },
                        success: function(response) {
                            $("#result").html(response); // Tampilkan respons dari server
                        },
                        error: function() {
                            $("#result").html("Terjadi kesalahan saat mengirim data.");
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>