<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$query = mysqli_query($mysqli, "SELECT * FROM tb_pembayaran");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Pembayaran</h2>
        <a href="../dashboard.php">Dashboard</a>
        |
        <a href="../kelas/tampil_kelas.php">Data Kelas</a>
        |
        <a href="../siswa/tampil_siswa.php">Data Siswa</a>
        |
        <a href="../cek_pembayaran/tampil_cek_pembayaran.php">Cek Pembayaran</a>
        |
        <a href="../pembayaran/tampil_pembayaran.php">Pembayaran</a>
        |
        <a href="../petugas/data_petugas.php">Data Petugas</a>
        |
        <a href="../logout.php">Logout</a>

        <hr>
        <a href="tambah_pembayaran.php" class="btn btn-primary mb-3">Tambah</a>

        <table class=" table table-bordered mb-3">
            <tr>
                <th>NO</th>
                <th>ID Pembayaran</th>
                <th>Status</th>
                <th>NISN</th>
                <th>Tanggal Bayar</th>
                <th>Tanggal Terakhir Bayar</th>
                <th>Batas Pembayaran</th>
                <th>Jumlah Bulan</th>
                <th>ID SPP</th>
                <th>Nominal Bayar</th>
                <th>Jumlah Bayar</th>
                <th>Kembalian</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1;
            while($data = mysqli_fetch_assoc($query)){?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= ($data['id_pembayaran']); ?></td>
                <td><?= ($data['status']); ?></td>
                <td><?= ($data['nisn']); ?></td>
                <td><?= ($data['tgl_bayar']); ?></td>
                <td><?= ($data['tgl_terakhir_bayar']); ?></td>
                <td><?= ($data['batas_pembayaran']); ?></td>
                <td><?= ($data['jumlah_bulan']); ?></td>
                <td><?= ($data['id_spp']); ?></td>
                <td><?= ($data['nominal_bayar']); ?></td>
                <td><?= ($data['jumlah_bayar']); ?></td>
                <td><?= ($data['kembalian']); ?></td>
                <td>
                    <a href="edit_pembayaran.php?id_pembayaran=<?= $data['id_pembayaran']; ?>"
                        class="btn btn-warning btn-sm mb-2">Edit</a>
                    <a href="hapus_pembayaran.php?id_pembayaran=<?= $data['id_pembayaran']; ?>"
                        class=" btn btn-danger btn-sm" onclick="return confirm('hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>