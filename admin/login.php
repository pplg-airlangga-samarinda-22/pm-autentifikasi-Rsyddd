<?php
   require "../koneksi.php";
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM petugas WHERE username=? AND password=?";
        $row = $koneksi -> execute_query($sql, [$username, $password]);
        
        if (mysqli_num_rows($row) == 1){
            session_start();
            $_SESSION['password'] = $password;
            header("location:index1.php");
        }else {
            // echo "<script>alert('Gagal Login!')</script>";
            var_dump($password);
        var_dump($sql);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post" class="form-login">
        <p>silahkan Login</p>
        <div class="form-item">
            <label for="username">username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
        <a href="register.php"></a>
        <a href="../index.php">Login sebagai masyarakat</a>
    </form>
</body>
</html>