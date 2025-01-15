<?php
    session_start();
    require_once "../koneksi.php";
    if (empty($_SESSION['password'])) {
        header("location:admin/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pelaporan pengaduan</title>
</head>
<body>
    <h1>Selamat Datang di Aplikasi Pengaduan Masyarakat(ADMIN)</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="aduan.php">Aduan</a>
        <a href="logout.php">logout</a>
    </nav>
</body>
</html>