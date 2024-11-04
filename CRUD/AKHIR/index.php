<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Token CSRF -->
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
    <title>Data Anggota</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">CRUD Dengan Ajax</a>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Anggota</h2>
        <form method="post" class="form-data" id="form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nama</label>
                    <input type="hidden" name="id" id="id">
                    <input type="text" name="nama" id="nama" class="form-control" required>
                    <p class="text-danger" id="err_nama"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Jenis Kelamin</label><br>
                    <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required> Laki-Laki
                    <input type="radio" name="jenis_kelamin" id="jenkel2" value="P"> Perempuan
                    <p class="text-danger" id="err_jenis_kelamin"></p>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                <p class="text-danger" id="err_alamat"></p>
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" required>
                <p class="text-danger" id="err_no_telp"></p>
            </div>
            <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan
            </button>
        </form>

        <hr>
        <div class="data"></div>
    </div>
    <footer class="text-center py-4">
        © <?php echo date('Y'); ?> Copyright: <a href="https://google.com">Design Dan Pemrograman Web</a>
    </footer>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.data').load('data.php');
        });

        $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.data').load('data.php');

    $("#simpan").click(function() {
        var data = $('.form-data').serialize();
        var nama = $("#nama").val();
        var alamat = $("#alamat").val();
        var no_telp = $("#no_telp").val();
        var jenkelChecked = $("input[name='jenis_kelamin']:checked").length > 0;

        if (nama == "") {
            $("#err_nama").text("Nama harus diisi");
        } else {
            $("#err_nama").text("");
        }

        if (alamat == "") {
            $("#err_alamat").text("Alamat harus diisi");
        } else {
            $("#err_alamat").text("");
        }

        if (!jenkelChecked) {
            $("#err_jenis_kelamin").text("Jenis Kelamin harus diisi");
        } else {
            $("#err_jenis_kelamin").text("");
        }

        if (no_telp == "") {
            $("#err_no_telp").text("No. Telepon harus diisi");
        } else {
            $("#err_no_telp").text("");
        }

        // Jika semua input valid, kirim data dengan AJAX
        if (nama != "" && alamat != "" && jenkelChecked && no_telp != "") {
            $.ajax({
                type: "POST",
                url: "form_action.php",
                data: data,
                success: function() {
                    $('.data').load('data.php');
                    $("#id").val("");
                    $("#form-data")[0].reset();
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        }
    });
});

    </script>
</body>
</html>