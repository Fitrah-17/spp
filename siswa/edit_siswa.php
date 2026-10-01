<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$nisn_lama = $_GET['nisn'];

$query = mysqli_query($mysqli, "SELECT * FROM tb_siswa WHERE nisn='$nisn_lama'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data siswa tidak ditemukan.");
}

if (isset($_POST['update'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];

    $update = mysqli_query($mysqli, "UPDATE tb_siswa SET nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp' WHERE nisn='$nisn_lama'");

    if ($update) {
        header("Location: tampil_siswa.php");
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
    <title>Edit Siswa</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Siswa</h2>
        <?php if(isset($error)){?>

        <div class="alert alert-danger"><?= $error; ?>
        </div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <label>NISN</label>
                <input type="text" class="form-control" value="<?= ($data['nisn']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" value="<?= ($data['nis']); ?>">
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= ($data['nama']); ?>">
            </div>
            <div class="mb-3">
                <label>ID Kelas</label>
                <input type="text" name="id_kelas" class="form-control" value="<?= ($data['id_kelas']); ?>">
            </div>
            <div class="mb-3">
                <label>NO Telepon</label>
                <input type="text" name="no_telp" class="form-control" value="<?= ($data['no_telp']); ?>">
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= ($data['alamat']); ?>">
            </div>
            <div class="mb-3">
                <label>ID SPP</label>
                <input type="text" name="id_spp" class="form-control" value="<?= ($data['id_spp']); ?>">
            </div>
            <div class="mb-3">
                <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                <a href="tampil_siswa.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
</body>

</html>