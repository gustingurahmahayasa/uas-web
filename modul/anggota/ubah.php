<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
require 'function.php';

$id = $_GET["id"];

$koperasi = query("SELECT * FROM tb_anggota WHERE id = $id")[0];


if( isset($_POST["submit"]) ) {
   if(ubah ($_POST) > 0 ){
       echo"
        <script>
            alert('Data berhasil diubah !');
            document.location.href = 'index.php';
        </script>
       ";
   }else {
       echo"
        <script>
            alert('Data gagal diubah !');
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

    <title>Edit</title>
</head>

<body>
    <div class="container">
        <h3 class="alert alert-primary text-center mt-3">UBAH ANGGOTA</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $koperasi["id"] ?>">
            <input type="hidden" name="fotoLama" value="<?= $koperasi["foto"] ?>">

            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" class="form-control" value="<?= $koperasi["foto"] ?>">
                </div>
            </div>

            <div class=" form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_anggota" id="nama_anggota" class="form-control"  value="<?= $koperasi["nama_anggota"] ?>">
                </div>
            </div>
                
            <div class=" form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat" id="alamat"  class="form-control"  value="<?= $koperasi["alamat"] ?>">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_hp" id="no_hp" class="form-control"  value="<?= $koperasi["no_hp"] ?>">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-success">Ubah</button>
                        </div>
                    </div>
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