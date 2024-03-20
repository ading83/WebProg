<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline --> 
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
       <!-- Menggunakan SweetAlert2 melalui CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</head>
<body>
<div class="container">
    <br>
    <h4>CRUD</h4>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama id_anggota
    if (isset($_GET['id_anggota'])) {
        $id_anggota=htmlspecialchars($_GET["id_anggota"]);

        $sql="delete from anggota where id_anggota='$id_anggota' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                    ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil dihapus..!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php';
                        }
                    });
                </script>
                <?php

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>
<a href="cetak.php" class="btn btn-warning" role="button" target="_blank">Cetak</a>

    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
            <th colspan='2' ><div align="center">Aksi</div></th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from anggota order by id_anggota desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["username"]; ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["jk"];   ?></td>
                <td><?php echo $data["agama"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["email"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-success" role="button">Update</a></td>
			    <td><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_anggota=<?php echo $data['id_anggota']; ?>" onclick="return konfirmasi(this)" class="btn btn-danger" role="button">Delete</a></td>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>
</body>
</html>

<script type="text/javascript" language="JavaScript">

function konfirmasi(link) {
    // Menampilkan SweetAlert untuk konfirmasi
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        // Jika tombol 'Ya, hapus' diklik, lakukan tindakan penghapusan
        if (result.isConfirmed) {
            // Mendapatkan URL dari link
            const url = link.getAttribute('href');
            // Lakukan sesuatu setelah konfirmasi, misalnya, navigasi ke URL
            window.location.href = url;
        }
    });

    // Menghentikan tindakan default dari link
    return false;
}
</script>

 