<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

if(isset($_POST['simpan'])){
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $komp_keahlian = $_POST['komp_keahlian'];

    if(empty($id_kelas)||empty($nama_kelas)||empty($komp_keahlian)){
        $error = "semua data harus di isi";
    }else{
        $query = mysqli_query($mysqli, "INSERT INTO tb_kelas(id_kelas, nama_kelas, komp_keahlian) VALUES ('$id_kelas','$nama_kelas','$komp_keahlian')");
        header("Location: tampil_kelas.php");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Kelas</h2>
        <?php if(isset($error)){?>

        <div class="alert alert-danger"><?= $error; ?>
        </div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <label>ID kelas</label>
                <input type="text" name="id_kelas" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kompetensi Keahlian</label>
                <input type="text" name="komp_keahlian" class="form-control" required>
            </div>

            <div class="mb-3">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="tampil_kelas.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
</body>

</html>