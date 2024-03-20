<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Menggunakan SweetAlert2 melalui CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username=input($_POST["username"]);
        $nama=input($_POST["nama"]);
        $jk=input($_POST["jk"]);
        $agama=input($_POST["agama"]);
        $alamat=input($_POST["alamat"]);
        $email=input($_POST["email"]);
        $no_hp=input($_POST["no_hp"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into anggota (username,nama,jk,agama,alamat,email,no_hp) values
		('$username','$nama','$jk','$agama','$alamat','$email','$no_hp')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            //header("Location:index.php");
            ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: 'Berhasil disimpan..!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            </script>
            <?php
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>

        </div>
		<div class="form-group">
		  
          <div? class="form-check-inline">
		  <label>Jenis Kelamin:
         <input type="radio" class="form-check-input" id="radio1" name="jk" value="Laki-laki"  checked>Laki-laki
		 <input type="radio" class="form-check-input" id="radio1" name="jk" value="Perempuan" >Perempuan
		 </label>
	
        </div>
		<div class="form-group">
            <label>Agama:</label>
            <select name="agama" id="agama" class="form-control">
				  <option value="Islam">Islam</option>
				  <option value="Katolik">Katolik</option>
				  <option value="Protestan">Protestan</option>
				  <option value="Hindu">Hindu</option>
				  <option value="Budha">Budha</option>
				  <option value="Konghucu">Konghucu</option>
			</select>

        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>

        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Email" required/>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
		<button type="button" onclick="history.back();" class="btn btn-danger" >Back</button>
    </form>
</div>
</body>
</html>