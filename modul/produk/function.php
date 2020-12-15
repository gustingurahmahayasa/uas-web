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

        $nama = htmlspecialchars($data["nama_produk"]);
        $harga = htmlspecialchars($data["harga_produk"]);
        $jml = htmlspecialchars($data["jml_produk"]);

        $foto = upload();
        if (!$foto) {
            return false;
        }


        $query = "INSERT INTO tb_produk VALUES ('','$foto','$nama','$harga','$jml')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

function upload (){
        $namafile = $_FILES['foto']['name'];
        $ukuranfile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpname = $_FILES['foto']['tmp_name'];

        //cek upload
        if ($error === 4) {
            echo "<script>
                    alert('masukkan foto!');
                  </script>
            ";
            return false;
        }

        //cek ekstensi
        $ekstensivalid = ['jpg','png','jpeg'];
        $ekstensi = explode('.', $namafile);
        $ekstensi = strtolower(end($ekstensi));

        //cek
        if ( !in_array($ekstensi, $ekstensivalid)) {
            echo "<script>
                alert('masukkan ekstensi yang valid!');
            </script>";
        }

        //lolos
        move_uploaded_file($tmpname, 'img/' . $namafile);

        return $namafile;

    }



    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM tb_produk WHERE id=$id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;

        $id= $data["id"];

        $nama = htmlspecialchars($data["nama_produk"]);
        $harga = htmlspecialchars($data["harga_produk"]);
        $jumlah = htmlspecialchars($data["jml_produk"]);

        $query = "UPDATE tb_produk SET
                    id = '$id', 
                    nama_produk = '$nama',
                    harga_produk = '$harga',
                    jml_produk = '$jumlah'
                 WHERE id = $id
                 ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

?>