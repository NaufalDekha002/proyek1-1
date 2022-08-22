<?php
// memanggil file config.php untuk melakukan koneksi database
require('../config.php');

// membuat variabel untuk menampung data dari form

$id                 = $_POST['dokumen_id'];
$jenis_dokumen      = $_POST['dokumen_jenis'];
$judul_dokumen      = $_POST['dokumen_judul'];
$tahun_terbit       = $_POST['dokumen_tahun'];
$penulis            = $_POST['dokumen_penulis'];
$jumlah_halaman     = $_POST['dokumen_halaman'];



  $query = "INSERT INTO dokumen (dokumen_id, dokumen_jenis, dokumen_judul, dokumen_tahun, dokumen_penulis, dokumen_halaman) VALUES ('$id', '$jenis_dokumen', '$judul_dokumen', '$tahun_terbit', '$penulis', '$jumlah_halaman')";
  $result = mysqli_query($db, $query);

  if(!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($db) .
      " - " . mysqli_error($db));
  } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
  }
?>