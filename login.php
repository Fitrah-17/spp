<?php
session_start();

include('config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($mysqli, "SELECT * FROM tb_petugas WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['level'] = $data['level'];

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Login Pembayaran Sekolah</h2>
        <?php if(isset($error)){?>
        <div class="alert alert-danger"><?= $error ;?></div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>

</html>