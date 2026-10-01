<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

include('config.php');

$query_lunas = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM tb_pembayaran WHERE status='Sudah Lunas'");
$data_lunas = mysqli_fetch_assoc($query_lunas);

$query_belum_lunas = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM tb_pembayaran WHERE status='Belum Lunas'");
$data_belum_lunas = mysqli_fetch_assoc($query_belum_lunas);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div class="container mt-4">
        <h2>Dashboard Pembayaran SPP Sekolah</h2>
        <p>Selamat Datang, <?= $_SESSION['nama_petugas']; ?></p>
        <hr>
        <a href="dashboard.php">Dashboard</a>
        |
        <a href="kelas/tampil_kelas.php">Data Kelas</a>
        |
        <a href="siswa/tampil_siswa.php">Data Siswa</a>
        |
        <a href="cek_pembayaran/tampil_cek_pembayaran.php">Cek Pembayaran</a>
        |
        <a href="pembayaran/tampil_pembayaran.php">Detail Pembayaran</a>
        |
        <a href="petugas/data_petugas.php">Data Petugas</a>
        |
        <a href="logout.php">Logout</a>
        <h3>Jumlah Data</h3>
        <h4>Siswa Yang Sudah lunas : <?= $data_lunas['total']; ?></h4>
        <h4>Siswa Yang Sudah Belum lunas : <?= $data_belum_lunas['total']; ?></h4>
    </div>
</body>

</html>