<?php
    require 'function.php';

    if ( isset($_POST["register"]) ) {
        if (registrasi ($_POST) > 0 ) {
            echo "<script>
                    alert ('User baru berhasil ditambahkan!');
                    document.location.href = 'login.php';
                  </script>";
        }else {
            echo mysqli_error($conn);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Registrasi</title>
  </head>
  <body>
    
    <div class="container">
        <h4 class="text-center"> <i class="fas fa-user-lock mr-3"></i>Create Account!</h4>
    <hr>
       <form action="" method="POST">
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" id="username">
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" id="password">
            </div>
          </div>

           <div class="form-group row">
            <label for="password2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password2" id="password2">
            </div>
          </div>
 
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" name="register" class="btn btn-primary">Register</button>
            </div>
          </div>
        </form>
        </div>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>