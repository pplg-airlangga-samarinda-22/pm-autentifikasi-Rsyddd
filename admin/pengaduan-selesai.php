<?php
session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
    $row = $koneksi -> execute_query($sql, [$nik]) -> fetch_assoc();
    $nik = $row['nik'];
    $laporan = $row['isi_laporan'];
    $foto = $row['foto'];
    $status = $row['status'];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_petugas = $_SESSION['id'];
    $id_pengaduan = $_GET['id'];
    $tanggal = $_POST['y-m-d'];
    $status = 'selesa';

    // update pengaduan
    $sql = "UPDATE pengaduan SET status=? WHERE id_pengaduan=?";
    $row = $koneksi -> execute_query($sql, [$id_pengaduan]);

    // kirim tanggapan
    $sql = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) values (?,?,?,?)";
    $row = $koneksi -> execute_query($sql, [$id_pengaduan, $tanggal, $id_petugas]);

    header("location:pengaduan.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tanggapi Pengaduan</title>
</head>
<body>
    <h1>Tanggapi Pengaduan</h1>
    <a href="pengaduan.php">kembali</a><br>
    <form action="" method="post">
        <div class="form-item">
            <label for="foto">foto pendukung</label>
            <img src="../gambar/<?= $foto ?> " alt="" width="250px">
        </div>
        <div class="form-item">
            <label for="tanggapan">Tanggapan</label>
            <textarea name="tanggapan" id="tanggapan"></textarea>
        </div>
        <button type="submit" name="selesai">Kirim Tanggapan</button>
    </form>
</body>
</html>