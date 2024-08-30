<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
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

        $nama_judul=input($_POST["nama_judul"]);
        $udiklat=input($_POST["udiklat"]);
        $jenis_permintaan_diklat=input($_POST["jenis_permintaan_diklat"]);
        $jenis_penyelenggara_diklat=input($_POST["jenis_penyelenggara_diklat"]);
        $tgl_mulai=input($_POST["tgl_mulai"]);
        $tgl_selesai=input($_POST["tgl_selesai"]);

        //Query input menginput data kedalam tabel penjadwalan
        $sql="insert into penjadwalan (nama_judul,udiklat,jenis_permintaan_diklat,jenis_penyelenggara_diklat,tgl_mulai,tgl_selesai) values
		('$nama_judul','$udiklat','$jenis_permintaan_diklat','$jenis_penyelenggara_diklat','$tgl_mulai','$tgl_selesai')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }

    }
    ?>
    <h2>Input Data</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Judul:</label>
            <input type="text" name="nama_judul" class="form-control" placeholder="Masukan Nama judul" required />
        </div>
        <div class="form-group">
            <label>Udiklat:</label>
            <input type="text" name="udiklat" class="form-control" placeholder="Masukan Udiklat" required/>
        </div>
       <div class="form-group">
            <label>Jenis Permintaan Diklat :</label>
            <input type="text" name="jenis_permintaan_diklat" class="form-control" placeholder="Masukan Jenis Permintaan Diklat" required/>
        </div>
        <div class="form-group">
            <label>Jenis Penyelenggara Diklat:</label>
            <input type="text" name="jenis_penyelenggara_diklat" class="form-control" placeholder="Masukan Jenis Penyelenggara Diklat" required/>
        </div>
        <div class="form-group">
            <label>Tanggal Mulai:</label>
            <input type="date" name="tgl_mulai" class="form-control" placeholder="Masukan tgl mulai" required/>
        </div>
        <div class="form-group">
            <label>Tanggal Selesai:</label>
            <input type="date" name="tgl_selesai" class="form-control" placeholder="Masukan tgl selesai" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
