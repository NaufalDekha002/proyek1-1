<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php'; 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($db,"select * from user where user_username='$username' and user_password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:index1.php");
}else{
	header("location:login.php?pesan=gagal");
}
?>