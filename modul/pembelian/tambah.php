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

    <title>Tambah Transaksi</title>
</head>

<body>
    <div class="container">
        <h2 class="alert alert-primary text-center mt-3">TAMBAH TRANSAKSI</h2>
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nama_pembeli">Nama Pembeli</label>
                <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control"
                    placeholder=" nama pembeli">
            </div>
          
            <div class="form-group">
                <label for="id_barang">ID Barang</label>
                <input type="text" name="id_barang" id="id_barang" class="form-control"
                    placeholder=" masukkan id barang">
            </div>

            <div class="form-group">
                <label for="tgl_pembelian">Tanggal Transaksi</label>
                <input type="date" name="tgl_pembelian" id="tgl_pembelian" class="form-control " placeholder="tanggal dilakukan transaksi">
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

    <script type="text/javascript">
    $(document).ready(function() {
        $('.ajax-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'login.php',
                type: "POST",
                url: $(this).attr('action'),
                dataType: 'json',
                data: $(this).serialize(),
                success: function(response)
                {
                    // user is logged in successfully in the back-end
                    // let's redirect
                    if (response.success == "1")
                    {
                         if (response.redirect) {
                            setTimeout(function() {
                                window.location.href = result.redirect;
                                //alert(result.redirect_url);
                            }, 100);
                        }
                    }
                    else
                    {
                        alert('Invalid Credentials!');
                    }
               }
           });
         });
    });
    </script>
</body>

</html>