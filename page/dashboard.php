<?php
session_start();

if (!isset($_SESSION["nama"])) {
    header("Location: login.html");
    exit;
}

$nama = htmlspecialchars($_SESSION["nama"], ENT_QUOTES, "UTF-8");
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Sales Tracker</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="../img/LOGOPLN.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
          </a>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success btn-light" type="submit">Search</button>
          </form>
      </div>
    </nav>
    <div class="row"> 
      <div class="col-2"></div>
      <div class="col-4">
        <button type="button" class="btn btn-primary btn-lg">Data Karyawan</button>
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-primary btn-lg">Kehadiran</button>
      </div>
      <div class="col-2"></div>
    </div>
    <div class="row"> 
      <div class="col-2"></div>
      <div class="col-4">
        <button type="button" class="btn btn-primary btn-lg">Laporan</button>
      </div>
      <div class="col-4">
        <a class="btn btn-primary btn-lg" href="logout.php" role="button">Keluar</a>
      </div>
      <div class="col-2"></div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
