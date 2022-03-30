<?php
    require('koneksi.php');
    $query = mysqli_query($con,"SELECT * FROM tb_buku");
    $cek = mysqli_affected_rows($con);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia";
        $response["data"] = array();

        while($ambil = mysqli_fetch_object($query)){
            $F["id"] = $ambil -> id;
            $F["judul"] = $ambil -> judul;
            $F["pengarang"] = $ambil -> pengarang;
            $F["penerbit"] = $ambil -> penerbit;
            $F["tahun"] = $ambil -> tahun;
            $F["halaman"] = $ambil -> halaman;
            
            array_push($response["data"],$F);
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Data Tidak Tersedia";
    }

    echo json_encode($response);
    mysqli_close($con);
?>