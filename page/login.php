<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.html");
    exit;
}

$nama = trim($_POST["nama"] ?? "");
$password = $_POST["password"] ?? "";

if ($nama === "" || $password === "") {
    header("Location: login.html?error=1");
    exit;
}

include "../db.php";

$query = "SELECT `Nama`, `Password`
    FROM `data karyawan`
    WHERE `Nama` = ?
    LIMIT 1";
$stmt = mysqli_prepare($koneksi, $query);

if ($stmt === false) {
    exit("Gagal menyiapkan query login: " . mysqli_error($koneksi));
}

mysqli_stmt_bind_param($stmt, "s", $nama);

if (!mysqli_stmt_execute($stmt)) {
    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    exit("Login gagal diproses: " . $error);
}

mysqli_stmt_bind_result($stmt, $namaTersimpan, $passwordTersimpan);
$valid = mysqli_stmt_fetch($stmt)
    && password_verify($password, $passwordTersimpan);
mysqli_stmt_close($stmt);

if (!$valid) {
    header("Location: login.html?error=1");
    exit;
}

session_regenerate_id(true);
$_SESSION["nama"] = $namaTersimpan;

header("Location: dashboard.php");
exit;
?>