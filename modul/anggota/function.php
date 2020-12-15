<?php
    $conn = mysqli_connect("localhost","root","","db_koperasi_produksi");

    function query($koperasi){
        global $conn;
        $result = mysqli_query($conn, $koperasi);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah ($data) {
        global $conn;

        $nama= htmlspecialchars($data["nama_anggota"]);
        $alamat= htmlspecialchars($data["alamat"]);
        $no= htmlspecialchars($data["no_hp"]);

        $foto = upload();
        if(!$foto) {
            return false;
        }

        $query = "INSERT INTO tb_anggota VALUES ('','$foto','$nama','$alamat','$no')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function upload (){
        $namafile = $_FILES['foto']['name'];
        $ukuranfile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpname = $_FILES['foto']['tmp_name'];

        //cek gambar diupload /  tidak
        if ($error === 4) {
            echo "<script>
                    alert('masukkan foto!');
                  </script>
            ";
            return false;
        }

        //cek ekstensi file (jpg,jpeg,png)
        $ekstensivalid = ['jpg','png','jpeg'];
        $x = explode('.', $namafile);
        $ekstensi = strtolower(end($x));

        if ( !in_array($ekstensi, $ekstensivalid)) {
            echo "<script>
                alert('masukkan ekstensi yang valid!');
            </script>";
            return false;
        }else {
            move_uploaded_file($tmpname, 'img/' . $namafile);

            return $namafile;
        }

        //upload ke db
       //copy kesini

    }



    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM tb_anggota WHERE id=$id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;

        $id= $data["id"];
        $foto= htmlspecialchars($data["foto"]);
        $fotoLama = htmlspecialchars($data["fotoLama"]);
        $nama= htmlspecialchars($data["nama_anggota"]);
        $alamat= htmlspecialchars($data["alamat"]);
        $no= htmlspecialchars($data["no_hp"]);

        if ($_FILES['foto']['error'] === 4) {
            $foto = $fotoLama;
        }else {
            $foto = upload();
        }

        $query = "UPDATE tb_anggota SET
                    id = '$id',
                    foto = '$foto', 
                    nama_anggota = '$nama',
                    alamat = '$alamat',
                    no_hp = '$no'
                 WHERE id = $id
                 ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

   

?>