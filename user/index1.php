
<?php
require ('../config.php');
session_start();
 
if( !isset($_SESSION['user_username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
}
 $sql = 'SELECT * FROM dokumen';
 $query = mysqli_query($db, $sql);
 $products = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link rel="stylesheet" href="../assets/css/bootstrap.min.css" crossorigin="anonymous">

<style>
    * {
        padding: 0;
        margin: 0;
        font-family: "Times New Roman", Times, serif;
    }
    </style>

</head>

<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>

<body>
<nav class="navbar navbar-light bg-primary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../img/mendeley.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      MENDELEY v2</a>
      <form class="navbar-nav ms-auto ml-auto mb-2 mb-lg-0">
        <button class="btn btn-light" type="button"><a href="login.php" style= "color: black;">Sign In</a></button>
      </form>
      <p> ‏‏‎  ‏‏‎  ‏‏‎ ‏‏‎</p>
      <button class="btn btn-light" type="button"><a href="login.php" style= "color: black;">Kembali</a></button>
  </div>
</nav>


<form class="row g-3 justify-content-center">
  <fieldset>
    <br><br><br>
    <center><h2><b>Welcome To Mendeley v2</b></h2> <br>
  <h3>Search for and add articles to your library</h3></center>
    <div class="col-auto">
      <label for="disabledTextInput" class="visually-hidden"></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Search for..." required> <br>
      <button type="submit" class="btn btn-primary" href="index2.php">Submit</button>
    </div>
   
  </fieldset>
</form>



</body>
</html>



