<?php

require 'function.php';
$conn = mysqli_connect("localhost","root","","db_koperasi_produksi");

if( isset($_POST["submit"]) ) {
    
   if(tambah ($_POST) > 0 ){
       echo"
        <script>
            alert('Data berhasil ditambahkan !');
            document.location.href = 'index.php';
        </script>
       ";
   }else {
       echo"
        <script>
            alert('Data gagal ditambahkan !');
            document.location.href='index.php';
        </script>
       ";
   }
   
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Tambah Anggota</title>
</head>

<body>
    <div class="container">
        <h2 class="alert alert-primary text-center mt-3">TAMBAH ANGGOTA</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control-file ">
            </div>

            <div class="form-group">
                <label for="nama_anggota">Nama</label>
                <input type="text" name="nama_anggota" id="nama_anggota" class="form-control"
                    placeholder=" nama lengkap">
            </div>
          
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control"
                    placeholder=" masukkan alamat">
            </div>

            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control " placeholder="no handphone">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>