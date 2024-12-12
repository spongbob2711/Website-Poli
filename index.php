<?php 
session_start();
require 'functions.php';
//cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];
  
  //ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  //cek cookie dan username
  if($key === hash('sha256', $row['username'])){
    $_SESSION['login'] = true;
    $_SESSION["username"] = $row["username"];
    $_SESSION['role'] = $row['role'];
  }
 
}


if(isset($_SESSION["login"]) && $_SESSION["role"] == "admin"){
  header("Location: dashboard.php");
  exit;
}else if(isset($_SESSION["login"]) && $_SESSION["role"] == "dokter"){
  header("Location: dashboarddokter.php");
  exit;
}else if(isset($_SESSION["login"]) && $_SESSION["role"] == "pasien"){
  header("Location: dashboardpasien.php");
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Website Poli</a>
               
                
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Poli Website</h1>
                            <span class="subheading">Untuk Kesehatan Anda!</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="row mx-5">
          <!--membuat 3 card login-->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Login Dokter</h5>
                <p class="card-text">Apabila Anda adalah seorang Dokter, silahkan Login terlebih dahulu untuk memulai melayani Pasien!</p>
                <a href="login.php" class="btn btn-primary">Login</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">  
              <div class="card-body">
                <h5 class="card-title">Register Pasien</h5>
                <p class="card-text">Apabila Anda adalah seorang Pasien, silahkan Registrasi dahulu untuk melakukan pendaftaran sebagai Pasien!</p>
                <a href="registerpasien.php" class="btn btn-primary">Register</a>
              </div>
            </div>  
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body"> 
                <h5 class="card-title">Login Pasien</h5>
                <p class="card-text">Apabila Anda adalah seorang Pasien, silahkan Login terlebih dahulu untuk memulai pengobatan!</p>
                <a href="login.php" class="btn btn-primary">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer-->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
