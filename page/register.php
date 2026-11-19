<?php
include "../db.php";

if (isset($_POST["submit"])) {
    $nama = trim($_POST["nama"] ?? "");
    $jenisKaryawan = $_POST["jenis_karyawan"] ?? "";
    $nip = trim($_POST["nip"] ?? "");
    $kantor = trim($_POST["kantor"] ?? "");
    $passwordInput = $_POST["password"] ?? "";

    if ($nama === "" || $nip === "" || $kantor === "" || $passwordInput === "") {
        exit("Semua field wajib diisi.");
    }

    if (!in_array($jenisKaryawan, ["SPV", "Sales"], true)) {
        exit("Jenis karyawan tidak valid.");
    }

    $password = password_hash($passwordInput, PASSWORD_DEFAULT);
    $query = "INSERT INTO `data karyawan`
        (`Nama`, `Jenis karyawan`, `NIP`, `Kantor wilayah`, `Password`)
        VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $query);
    if ($stmt === false) {
        exit("Gagal menyiapkan query: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "sssss", $nama, $jenisKaryawan, $nip, $kantor, $password);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        echo "<script>alert('Registrasi berhasil!'); window.location='../index.html';</script>";
    } else {
        $error = mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        exit("Registrasi gagal: " . $error);
    }
}
?>