<?php
require('../config.php') //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <title>Mendeley v2</title>

    <style>
    * {
        padding: 0;
        margin: 0;
        font-family: "Times New Roman", Times, serif;
    } 
    table tr, th, td {
        width: 200px;
        min-height: 200px;
        border: 2px solid;
        padding: 10px;
    }
    </style>

</head>

<body>
<nav class="navbar navbar-light bg-primary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../img/mendeley.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      MENDELEY v2</a>
      <form class="navbar-nav ms-auto ml-auto mb-2 mb-lg-0">
                <button class="btn btn-light" type="button"><a href="login.php"  style="color: black;">Kembali</a></button>
            </form>
  </div>
</nav>

<center>
        <h1>Data Dokumen</h1>
        <center>
            <center><a href="tambah.php" style="color: black;">+ &nbsp; Tambah Dokumen</a>
                <center>
                    <br />
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Dokumen</th>
                                <th>Jenis Dokumen</th>
                                <th>Judul Dokumen</th>
                                <th>Tahun Terbit</th>
                                <th>Penulis</th>
                                <th>Jumlah Halaman</th>
                                <th>Aksi</th>
                           
                        </thead>
                        <tbody>
                            <?php
                            // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                            $query = "SELECT * FROM dokumen ORDER BY dokumen_id ASC";
                            $result = mysqli_query($db, $query);
                            //mengecek apakah ada error ketika menjalankan query
                            if (!$result) {
                                die("Query Error: " . mysqli_errno($db) .
                                    " - " . mysqli_error($db));
                            }

                            //buat perulangan untuk element tabel dari data mahasiswa
                            $no = 1; //variabel untuk membuat nomor urut
                            // hasil query akan disimpan dalam variabel $data dalam bentuk array
                            // kemudian dicetak dengan perulangan while
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['dokumen_id']; ?></td>
                                    <td><?php echo $row['dokumen_jenis']; ?></td>
                                    <td><?php echo $row['dokumen_judul']; ?></td>
                                    <td><?php echo $row['dokumen_tahun']; ?></td>
                                    <td><?php echo $row['dokumen_penulis']; ?></td>
                                    <td><?php echo $row['dokumen_halaman']; ?></td>
                                    <td>
                                        <a href="edit.php?dokumen_id=<?php echo $row['dokumen_id']; ?>"  style="color: black;">Edit</a> |
                                        <a href="proses_hapus.php?dokumen_id=<?php echo $row['dokumen_id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"  style="color: black;">Hapus</a>
                                    </td>
                                </tr>
        
                            <?php
                                $no++; //untuk nomor urut terus bertambah 1
                            }
                            ?>
                        </tbody>
                    </table>
</body>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</html>