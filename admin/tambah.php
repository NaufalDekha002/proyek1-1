<!DOCTYPE html>
<html>
<head>
	<title>TAMBAH</title>
    
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />

    <style>
		body{
			font-family: "Times New Roman", Times, serif;
		}
		table {
			border-collapse: collapse;
		}

		table, th, td {
			border: 1px solid black;
			padding: 10px;
		}
	</style>

</head>	


<body>

	<?php
	
	include '../config.php';

	// mengambil data barang dengan kode paling besar
	$query = mysqli_query($db, "SELECT max(dokumen_id) as kodeTerbesar FROM dokumen");
	$data = mysqli_fetch_array($query);
	$kodedokumen = $data['kodeTerbesar'];

	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kodedokumen, 3, 3);

	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;

	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "DMN";
	$kodedokumen = $huruf . sprintf("%03s", $urutan);
	?>
   
<nav class="navbar navbar-light bg-primary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../img/mendeley.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      MENDELEY v2</a>
      <form class="navbar-nav ms-auto ml-auto mb-2 mb-lg-0">
                <button class="btn btn-light" type="button"><a href="index.php"  style="color: black;">Kembali</a></button>
            </form>
  </div>
</nav>   
<br>
<center><h1>Tambah Dokumen</h1></center> 
<br>
<center>
<form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
    <section class="base">
        <label>Kode Dokumen</label><br/>
		    <input type="text" name="dokumen_id" required="required" value="<?php echo $kodedokumen ?>" readonly>

                <div>
                    <label>Jenis Dokumen</label><br>
                    <input type="text" name="dokumen_jenis" autofocus="" required="" />
                </div>
                <div>
                    <label>Judul Dokumen</label><br>
                    <input type="text" name="dokumen_judul" />
                </div>
                <div>
                    <label>Tahun Terbit</label><br>
                    <input type="text" name="dokumen_tahun" required="" />
                </div>
                <div>
                    <label>Penulis</label><br>
                    <input type="text" name="dokumen_penulis" required="" />
                </div>
                <div>
                    <label>Jumlah Halaman</label><br>
                    <input type="text" name="dokumen_halaman" required="" />
                </div>
                <div>
                    <br><button type="Submit">Simpan Data</button>
                </div>
    </section> 
</form>
</center>
	<br>
	<hr>
	<br>

	
</body>
</html>