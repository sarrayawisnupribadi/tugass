<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>DATA SISWA</h1>
                <form method="POST" action="tampil_siswa.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="cari" placeholder="Cari">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">id siswa</th>
                    <th scope="col">nama siswa</th>
                    <th scope="col">tanggal lahir</th>
                    <th scope="col">gender</th>
                    <th scope="col">alamat</th>
                    <th scope="col">kelas</th>
                    <th scope="col">username</th>
                    <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query_siswa = mysqli_query($koneksi, 
                        "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas where siswa.id_siswa like '%$cari%' or nama_siswa like '%$cari%'");
                          } else {
                            $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
                          }
                    while($data_siswa = mysqli_fetch_array($query_siswa)) {
                ?>
                    <tr>
                        <td><?=$data_siswa['id_siswa']?></td>
                        <td><?=$data_siswa['nama_siswa']?></td>
                        <td><?=$data_siswa['tanggal_lahir']?></td>
                        <td><?=$data_siswa['gender']?></td>
                        <td><?=$data_siswa['alamat']?></td>
                        <td><?=$data_siswa['nama_kelas']?></td>
                        <td><?=$data_siswa['username']?></td>
                        <td>
                            <a href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-success">edit</a>
                            <a href="hapus_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-danger"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')">hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <a href="tambah_siswa.php" type="button" class="btn btn-primary">Tambah Siswa</a>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>