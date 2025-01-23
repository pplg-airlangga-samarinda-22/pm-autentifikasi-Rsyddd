<?php
session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM petugas WHERE id_petugas=?";
    $row = $koneksi -> execute_query($sql, [$id]) -> fetch_assoc();
    // var_dump($row);
    $nama = $row['nama_petugas'];
    $username = $row['username'];
    $password = $row['password'];
    $telepon = $row['telp'];
    $level = $row['level'];  
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $level = $_POST['level'];
    $sql = "UPDATE petugas SET nama_petugas=?, telp=?, level=?, WHERE id_petugas=?";
    $row = $koneksi -> execute_query($sql, [$nama, $telepon, $level, $id]);

    if ($row) {
        header("location:petugas.php");
    } else {
        echo "<script>alert('Gagal memperbarui petugas');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Edit Petugas</title>
</head>
<body>
    <h1>Edit Petugas</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="level">level akses</label>
            <select name="level" id="level">
                <!-- <option value="" disable selected>pilih level akses</option> -->
                <option value="admin" <?= ($level == 'admin')?'selected':''; ?> >Admin</option>
                <option value="Petugas" <?= ($level == 'Petugas')?'selected':''; ?> >Petugas</option>
            </select>
        </div>
        <div class="form-item">
            <label for="nama">Nama petugas</label>
            <input type="text" name="nama" id="nama" value="<?=$nama?>">
        </div>
        <div class="form-item">
            <label for="telepon">telepon</label>
            <input type="telp" name="telepon" id="telepon" value="<?=$telepon?>">
        </div>
        <div class="form-item">
            <label for="username">Nama petugas</label>
            <input type="text" name="username" id="username" value="<?=$username?>" disable >
        </div>
        <button type="submit">Kirim</button>
        <a href="petugas.php">Batal</a>
</form>
</body>
</html>