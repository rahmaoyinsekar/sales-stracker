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
    <main class="container py-4">
      <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <h1 class="h3 mb-0">Dashboard Sales Tracker</h1>
        <a class="btn btn-outline-secondary" href="logout.php">Logout</a>
      </div>
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h2 class="h5">Selamat datang, <?= $nama ?>.</h2>
          <p class="mb-0">Login berhasil.</p>
        </div>
      </div>
    </main>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
