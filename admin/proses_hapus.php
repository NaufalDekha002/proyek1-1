<?php
include '../config.php';
$id = $_GET["dokumen_id"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM dokumen WHERE dokumen_id='$id' ";
    $hasil_query = mysqli_query($db, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($db).
       " - ".mysqli_error($db));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
    }
    ?>