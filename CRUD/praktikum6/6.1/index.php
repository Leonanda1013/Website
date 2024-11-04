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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnm0CqbTlWIlj8LyTjo7mOUStjsKC4p0pQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
                </div>
                <div class="form-group col-md-6">
                    <label>Jenis Kelamin</label><br>
                    <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required> Laki-Laki
                    <input type="radio" name="jenis_kelamin" id="jenkel2" value="P"> Perempuan
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" required>
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

            $('#simpan').click(function() {
                var formData = {
                    id: $('#id').val(),
                    nama: $('#nama').val(),
                    jenis_kelamin: $('input[name="jenis_kelamin"]:checked').val(),
                    alamat: $('#alamat').val(),
                    no_telp: $('#no_telp').val()
                };

                $.ajax({
                    type: 'POST',
                    url: 'simpan_data.php', // URL file PHP untuk menyimpan data
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert(response.success);
                            $('.data').load('data.php'); // Reload data anggota
                            $('#form-data')[0].reset(); // Reset form
                        } else {
                            alert(response.error);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengirim data.');
                    }
                });
            });
        });
    </script>
</body>

</html>