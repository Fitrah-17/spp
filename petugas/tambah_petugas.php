<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

if(isset($_POST['simpan'])){
    $id_petugas = $_POST['id_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];


    if(empty($id_petugas)||empty($username)||empty($password)||empty($nama_petugas)||empty($level)){
        $error = "semua data harus di isi";
    }else{
        $query = mysqli_query($mysqli, "INSERT INTO tb_petugas(id_petugas, username, password, nama_petugas, level) VALUES ('$id_petugas','$username','$password','$nama_petugas','$level')");
        header("Location: data_petugas.php");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Petugas</h2>

        <?php if(isset($error)){?>

        <div class="alert alert-danger"><?= $error; ?>
        </div>

        <?php } ?>

        <form method="POST">

            <div class="mb-3">
                <label>ID Petugas</label>
                <input type="text" name="id_petugas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-control" required>
                    <option value="">Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                    <option value="siswa">Siswa</option>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="data_petugas.php" class="btn btn-secondary">Kembali</a>
            </div>

        </form>
    </div>
</body>

</html>