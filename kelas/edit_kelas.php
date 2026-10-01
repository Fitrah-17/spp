<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$id_kelas_lama = $_GET['id_kelas'];

$query = mysqli_query($mysqli, "SELECT * FROM tb_kelas WHERE id_kelas='$id_kelas_lama'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data kelas tidak ditemukan.");
}

if (isset($_POST['update'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $komp_keahlian = $_POST['komp_keahlian'];

    $update = mysqli_query($mysqli, "UPDATE tb_kelas SET nama_kelas='$nama_kelas', komp_keahlian='$komp_keahlian' WHERE id_kelas='$id_kelas_lama'");

    if ($update) {
        header("Location: tampil_kelas.php");
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
    <title>Edit Kelas</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Kelas</h2>
        <?php if(isset($error)){?>

        <div class="alert alert-danger"><?= $error; ?>
        </div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <label>ID Kelas</label>
                <input type="text" class="form-control" value="<?= ($data['id_kelas']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label>Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control" value="<?= ($data['nama_kelas']); ?>">
            </div>
            <div class="mb-3">
                <label>Kompetensi Keahlian</label>
                <input type="text" name="komp_keahlian" class="form-control" value="<?= ($data['komp_keahlian']); ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Simpan</button>
            <a href="tampil_kelas.php" class="btn btn-secondary">Kembali</a>
    </div>
    </form>
</body>

</html>