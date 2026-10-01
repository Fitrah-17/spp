<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];


    if(empty($nisn)||empty($nis)||empty($nama)||empty($id_kelas)||empty($alamat)||empty($no_telp)||empty($id_spp)){
        $error = "semua data harus di isi";
    }else{
        $query = mysqli_query($mysqli, "INSERT INTO tb_siswa(nisn, nis, nama, id_kelas, alamat, no_telp, id_Spp) VALUES ('$nisn','$nis','$nama' ,'$id_kelas','$alamat','$no_telp','$id_spp')");
        header("Location: tampil_siswa.php");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Siswa</h2>
        <?php if(isset($error)){?>

        <div class="alert alert-danger"><?= $error; ?>
        </div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <label>NISN</label>
                <input type="text" name="nisn" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>ID Kelas</label>
                <input type="text" name="id_kelas" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>NO Telepon</label>
                <input type="text" name="no_telp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>ID SPP</label>
                <input type="text" name="id_spp" class="form-control" required>
            </div>
            <div class="mb-3">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="tampil_siswa.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
</body>

</html>