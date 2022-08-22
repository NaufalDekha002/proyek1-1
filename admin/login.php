<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MENDELEY v2</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />

    <style>
    * {
    padding: 0;
    margin: 0;
    font-family: "Times New Roman", Times, serif;
    }   

    .bg-login {
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    }

    .box-login {
    width: 300px;
    min-height: 200px;
    border: 1px solid;
    background-color: #007bff;
    padding: 15px;
    box-sizing: border-box;
    }

    .box-login h2 {
    text-align: center;
    margin-bottom: 15px;
    }

    .jarak {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid;
    }

    .button {
    background-color: white;
    color: black;
    padding: 8px 15px;
    border: 1px solid;
    cursor: pointer;
    }

    .table {
    width: 100%;
    border-collapse: collapse;
    }

    .table tr {
    height: 30px;
    }

    .table tr td {
    padding: 5px 10px;
    }

    </style>
</head>

<body>
<nav class="navbar navbar-light bg-primary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../img/mendeley.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      MENDELEY v2</a>
  </div>
</nav>

    <div class="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="jarak">
            <input type="password" name="password" placeholder="Password" class="jarak">
            <input type="submit" name="submit" value="Login" class="button">

        </form>
        <?php
        if (isset($_POST['submit'])){
            session_start();
            include '../config.php';

            $user     = $_POST['user'];
            $password = $_POST['password'];

            $cek = mysqli_query($db, "SELECT * FROM admin WHERE admin_username = '".$user."' AND admin_password = '".$password."'");
            if (mysqli_num_rows($cek) > 0){
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->admin_id;
                echo '<script>window.location="index.php"</script>';
            }else{
                echo '<script>alert("username atau password anda salah!")</script>';
            }
        }
        ?>
    </div>
</body>
</html>