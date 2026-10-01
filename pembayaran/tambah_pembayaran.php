<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$query_siswa = mysqli_query($mysqli, "SELECT * FROM tb_siswa");

if(isset($_POST['simpan'])){
    $id_pembayaran = $_POST['id_pembayaran'];
    $status = $_POST['status'];
    $nisn = $_POST['nisn'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];
    $batas_pembayaran = $_POST['batas_pembayaran'];
    $jumlah_bulan = $_POST['jumlah_bulan'];
    $id_spp = $_POST['id_spp'];
    $nominal_bayar = $_POST['nominal_bayar'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $kembalian = $jumlah_bayar - $nominal_bayar;

    if(empty($id_pembayaran)||empty($status)||empty($nisn)||empty($tgl_bayar)||empty($tgl_terakhir_bayar)||empty($batas_pembayaran)||empty($jumlah_bulan)||empty($id_spp)||empty($nominal_bayar)||empty($jumlah_bayar)){
        $error = "semua data harus di isi";
    }else{
    $query = mysqli_query($mysqli, "INSERT INTO `tb_pembayaran`(`id_pembayaran`, `status`, `nisn`, `tgl_bayar`, `tgl_terakhir_bayar`, `batas_pembayaran`, `jumlah_bulan`, `id_spp`, `nominal_bayar`, `jumlah_bayar`, `kembalian`) VALUES ('$id_pembayaran','$status','$nisn','$tgl_bayar','$tgl_terakhir_bayar','$batas_pembayaran','$jumlah_bulan','$id_spp','$nominal_bayar','$jumlah_bayar','$kembalian')");
    header("Location: tampil_pembayaran.php");
    exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Pembayaran</h2>
        <?php if(isset($error)){?>

        <div class="alert alert-danger"><?= $error; ?>
        </div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <label>ID Pembayaran</label>
                <input type="text" name="id_pembayaran" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <input type="text" name="status" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>NISN</label>
                <select name="nisn" class="form-select" required>
                    <option value>Pilih NISN</option>
                    <?php while($siswa = mysqli_fetch_assoc($query_siswa)){ ?>
                    <option value="<?= $siswa['nisn']; ?>"><?= $siswa['nisn']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Terakhir Bayar</label>
                <input type="date" name="tgl_terakhir_bayar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Batas Pembayaran</label>
                <input type="date" name="batas_pembayaran" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jumlah Bulan</label>
                <input type="text" name="jumlah_bulan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>ID SPP</label>
                <input type="text" name="id_spp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nominal Bayar</label>
                <input type="text" name="nominal_bayar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jumlah Bayar</label>
                <input type="text" name="jumlah_bayar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kembalian</label>
                <input type="text" name="kembalian" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="tampil_siswa.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
</body>

</html>