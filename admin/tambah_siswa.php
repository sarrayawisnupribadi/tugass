<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>
<body >

    <?php
    include "navbar.php";
    ?>
    <br>

    <div class="container">
        <div class="card">
            <h1 class="card-header">Tambah Siswa</h1>
            <div class="card-body"> 
                <form action= "proses_tambah_siswa.php" method= "post">
                nama siswa :
                <br><input type= "text" name= "nama_siswa" value= "" class= "form-control"></br>
                Tanggal Lahir :
                <br><input type= "date" name= "tanggal_lahir" value="" class= "form-control"></br>
                Gender :
                <br><select name= "gender" class= "form-control">
                    <option></option>
                    <option value= "L">Laki laki</option>
                    <option value= "P">Perempuan</option>
                </select></br>
                Alamat :
                <br><textarea name= "alamat" class= "form-control" rows= "4"></textarea></br>
                Kelas :
                <br><select name= "id_kelas" class= "form-control">
                    <option></option>
                    <?php        
                include "koneksi.php";
                $qry_kelas=mysqli_query ($koneksi,"select * from kelas");
                while ($data_kelas=mysqli_fetch_array($qry_kelas)){
                    echo '<option value= "'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                    }?>
                </select></br>
                Username : 
                <br><input type="text" name="username" value="" class="form-cotrol"></br>
                Password : 
                <br><input type= "password" name="password" value="" class="formm-control"></br>
                <br><input type="submit" name="simpan" value="Tambah Siswa" class="btn btn-primary">
                <a href="tampil_siswa.php" type="button" class="btn btn-danger">Batal</a></br>
        </form>
    </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>