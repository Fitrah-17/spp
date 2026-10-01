<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$id_petugas_lama = $_GET['id_petugas'];

$query = mysqli_query($mysqli, "SELECT * FROM tb_petugas WHERE id_petugas='$id_petugas_lama'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data petugas tidak ditemukan.");
}

if (isset($_POST['update'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $update = mysqli_query($mysqli, "UPDATE tb_petugas SET username='$username', password='$password', nama_petugas='$nama_petugas', level='$level' WHERE id_petugas='$id_petugas_lama'");

    if ($update) {
        header("Location: data_petugas.php");
        exit;
    } else {
        echo "Gagal update: " . mysqli_error($mysqli);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Petugas</h2>
        <?php if(isset($error)){?>

        <div class="alert alert-danger"><?= $error; ?>
        </div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <label>ID Petugas</label>
                <input type="text" class="form-control" value="<?= ($data['id_petugas']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?= ($data['username']); ?>">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="<?= ($data['password']); ?>">
            </div>
            <div class="mb-3">
                <label>Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control" value="<?= ($data['nama_petugas']); ?>">
            </div>
            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-control">
                    <option value="admin" <?= ($data['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="petugas" <?= ($data['level'] == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                    <option value="siswa" <?= ($data['level'] == 'siswa') ? 'selected' : ''; ?>>Siswa</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                <a href="data_petugas.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>