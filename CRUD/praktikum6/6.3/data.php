<table id="example" class="table table-striped table-bordered" style="width: 100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';
        $no = 1;
        $query = "SELECT * FROM anggota ORDER BY id DESC";
        $sql = $dbl->prepare($query);
        $sql->execute();
        $res1 = $sql->get_result();

        if ($res1->num_rows > 0) {
            while ($row = $res1->fetch_assoc()) {
                $id = $row['id'];
                $nama = $row['nama'];
                $jenis_kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan';
                $alamat = $row['alamat'];
                $no_telp = $row['no_telp'];
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $jenis_kelamin; ?></td>
                    <td><?php echo $alamat; ?></td>
                    <td><?php echo $no_telp; ?></td>
                    <td>
                        <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data"><i class="fa fa-edit"></i> Edit</button>
                        <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data"><i class="fa fa-trash"></i> Hapus</button>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan='6' class="text-center">Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();

        function reset() {
            document.getElementById("err_nama").innerHTML = "";
            document.getElementById("err_jenis_kelamin").innerHTML = "";
            document.getElementById("err_alamat").innerHTML = "";
            document.getElementById("err_no_telp").innerHTML = "";
        }

        // Event handler untuk tombol edit
        $(document).on('click', '.edit_data', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 'slow'); // Scroll ke atas
            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: "get_data.php",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    reset(); // Reset error messages
                    $('html, body').animate({
                        scrollTop: 30
                    }, 'slow'); // Scroll ke form edit
                    document.getElementById("id").value = response.id;
                    document.getElementById("nama").value = response.nama;
                    document.getElementById("alamat").value = response.alamat;
                    document.getElementById("no_telp").value = response.no_telp;

                    // Set radio button berdasarkan jenis kelamin
                    if (response.jenis_kelamin == "L") {
                        document.getElementById("jenkel1").checked = true; // Laki-laki
                    } else {
                        document.getElementById("jenkel2").checked = true; // Perempuan
                    }
                },
                error: function(response) {
                    console.log(response.responseText); // Log kesalahan ke konsol
                }
            });
        });
    });
</script>