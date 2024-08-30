<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>Form Input Data</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">PUSDIKLAT</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>INPUT DIKLAT</center></h4>
<?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_penjadwalan'])) {
        $id_penjadwalan=htmlspecialchars($_GET["id_penjadwalan"]);

        $sql="delete from penjadwalan where id_penjadwalan = '$id_penjadwalan' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama judul</th>
            <th>Udiklat</th>
            <th>Jenis Permintaan</th>
            <th>Jenis Penyelenggara</th>
            <th>Tgl Mulai</th>
            <th>Tgl Selesai</th>
            <th colspan='1'>Aksi</th>
        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from penjadwalan order by id_penjadwalan desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama_judul"];?></td>
                <td><?php echo $data["udiklat"];?></td>
                <td><?php echo $data["jenis_permintaan_diklat"];?></td>
                <td><?php echo $data["jenis_penyelenggara_diklat"];?></td>
                <td><?php echo $data["tgl_mulai"];?></td>
                <td><?php echo $data["tgl_selesai"];?></td>
                <td>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_penjadwalan=<?php echo $data['id_penjadwalan']; ?>" class="btn btn-danger" role="button">Delete</a>
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
