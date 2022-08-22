










<?php 
include '../config.php';
?>
 
<h3>Form Pencarian Dengan PHP - WWW.MALASNGODING.COM</h3>
 
<form action="index2.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
 
 
<table border="1">
	<tr>
		<th>No</th>
		<th>Nama</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($db,"select * from dokumen where dokumen_judul like '%".$cari."%'");				
	}else{
		$data = mysqli_query($db, "select * from dokumen");		
	}
	$no = 1;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['dokumen_judul']; ?></td>
	</tr>
	<?php } ?>
</table>