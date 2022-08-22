<?php
// memanggil file config.php untuk melakukan koneksi database
include '../config.php';

	// membuat variabel untuk menampung data dari form
  $id                 = $_POST['dokumen_id'];
  $jenis_dokumen      = $_POST['dokumen_jenis'];
  $judul_dokumen      = $_POST['dokumen_judul'];
  $tahun_terbit       = $_POST['dokumen_tahun'];
  $penulis            = $_POST['dokumen_penulis'];
  $jumlah_halaman     = $_POST['dokumen_halaman'];

  //cek dulu jika merubah gambar produk jalankan coding ini


    $query = "UPDATE dokumen SET dokumen_id = '$id', dokumen_jenis = '$jenis_dokumen', dokumen_judul = '$judul_dokumen', dokumen_tahun = '$tahun_terbit', dokumen_penulis = '$penulis', dokumen_halaman = '$jumlah_halaman'";

    $query .= "WHERE dokumen_id = '$id'";
    $result = mysqli_query($db, $query);
  
    if(!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($db) .
        " - " . mysqli_error($db));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Data berhasil diedit.');window.location='index.php';</script>";
    }
?>

 

