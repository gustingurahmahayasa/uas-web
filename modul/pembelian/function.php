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

        $nama= htmlspecialchars($data["nama_pembeli"]);
        $barang= htmlspecialchars($data["id_barang"]);
        $tgl= htmlspecialchars($data["tgl_pembelian"]);

        $query = "INSERT INTO tb_pembelian VALUES ('','$nama','$barang','$tgl')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM tb_pembelian WHERE id=$id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;

        $id= $data["id"];
        $nama= htmlspecialchars($data["nama_pembeli"]);
        $barang= htmlspecialchars($data["id_barang"]);
        $tgl= htmlspecialchars($data["tgl_pembelian"]);

        $query = "UPDATE tb_pembelian SET
                    id = '$id', 
                    nama_pembeli = '$nama',
                    id_barang = '$barang',
                    tgl_pembelian = '$tgl'
                 WHERE id = $id
                 ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

   

?>