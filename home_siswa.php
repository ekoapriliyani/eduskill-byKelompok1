<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo "<script>alert('Maaf, anda harus Login terlebih dahulu');
        document.location='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard Siswa Eduskill</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="jumbotron bg-info text-white">
  <h1 class="display-4">Hello, <b><?= $_SESSION['nama_lengkap'] ?></b></h1>
  <p class="lead"> Selamat Belajar, anda berhasil Login sebagai <b><?=$_SESSION['username']?></b></p>
  <hr class="my-4">
  <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
</div>
    </div>
</body>
</html>