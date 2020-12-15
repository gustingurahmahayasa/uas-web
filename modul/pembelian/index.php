<?php
    
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ../login.php");
        exit;
    }

    require 'function.php';
    $koperasi = query("SELECT * FROM tb_pembelian");
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
  <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../assets/style.css">

  <title>Koperasi</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info ml-auto">
      <h4><a class="navbar-brand ml-4" href="#">Koperasi Produksi</a></h4>

      <div class="icon ml-auto">
        <h5>
         
            <a href="../logout.php"><i class="fas fa-sign-out-alt mr-5 text-dark" data-toggle="tooltip" title="logout"></i></a>
        </h5>
      </div>
    </nav>

  <div class="row no-gutters mt-0">

      <div class="col-md-2 bg-dark pr-3 pt-4 pb-5">
        <ul class="nav flex-column ml-3 mb-5 pb-5">
            <li class="nav-item">
              <a class="nav-link text-white" href="#"><i class="fas fa-home mr-2"></i>Home</a>
              <hr class="bg-secondary">
            </li>
            
            <li class="nav-item">
              <a class="nav-link text-white" href="../anggota"><i class="fas fa-users mr-2"></i>Anggota Koperasi</a>
              <hr class="bg-secondary">
            </li>

             <li class="nav-item">
              <a class="nav-link text-white" href="../produk"><i class="fas fa-store mr-2"></i>Produk Koperasi</a>
              <hr class="bg-secondary">
            </li>

             <li class="nav-item">
              <a class="nav-link text-white" href="#"><i class="far fa-clipboard mr-2"></i>Transaksi</a>
              <hr class="bg-secondary">
            </li>
        </ul>
        <ul class="pb-5"></ul>
        <ul class="pb-5"></ul>
        <ul class="pb-5"></ul>
      </div>

    <div class="col-md-10 p-5 pt-2">
      <h4><i class="far fa-clipboard mr-2"></i>DATA TRANSAKSI</h4>
       <a href="tambah.php" class="ml-auto"> Tambah Transaksi <i class="far fa-clipboard ml-auto  text-dark"  data-toggle="tooltip" title="tambah transaksi"></i></a>

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA PEMBELI</th>
            <th scope="col">ID BARANG</th>
            <th scope="col">TANGGAL</th>
            <th scope="col">EDIT</th>
          </tr>
        </thead>
        
        <?php $i=1; ?>
        <?php foreach ($koperasi as $row) : ?>

        <tbody>
        <tr>
            <td scope="row"><?= $i ?></td>
            <td><?= $row["nama_pembeli"]; ?></td>
            <td><?= $row["id_barang"]; ?></td>
            <td><?= $row["tgl_pembelian"]; ?></td>
            <td>
                <a href="ubah.php?id=<?=$row["id"];?>"><button type="button" class="btn btn-success">Edit</button></a>  
                <a href="hapus.php?id=<?=$row["id"];?>" onclick="return confirm ('Yakin ?');"><button type="button" class="btn btn-danger">Hapus</button></a>
            </td>
          
        </tr>
        </tbody>
        <?php $i++; ?>
        <?php endforeach; ?>
      </table>
    </div>

  </div>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
    <script src="../assets/javascript.js"></script>


</body>

</html>