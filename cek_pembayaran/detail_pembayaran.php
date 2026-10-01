<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$nisn = $_GET['nisn'];

$query = mysqli_query($mysqli, "SELECT * FROM cek_pembayaran WHERE nisn='$nisn'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data Pembayaran tidak ditemukan.");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h4>Detail Pembayaran, <?= $data['nama']; ?></h4>
        <p>NISN : <?= $data['nisn']; ?></p>
        <p>Tanggal Terakhri Bayar : <?= $data['tgl_terakhir_byr']; ?></p>
        <p>Tanggal Sekarang : <?= $data['tgl_sekarang']; ?></p>
        <p>Status Pembayaran : <?= $data['status']; ?></p>
        <p>Jumlah Bulan : <?= $data['jumlah_bulan']; ?></p>
        <p>Nama : <?= $data['nama']; ?></p>
        <p>NO Telepon : <?= $data['no_telp']; ?></p>
        <a href="javascript:window.print()" class="btn btn-primary">
            Cetak
        </a>
        <a href="tampil_cek_pembayaran.php" class="btn btn-secondary">
            Kembali
        </a>

    </div>

</body>

</html>