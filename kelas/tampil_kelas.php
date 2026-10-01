<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$query = mysqli_query($mysqli, "SELECT * FROM tb_kelas");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Data Kelas</h2>
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
        <a href="tambah_kelas.php" class="btn btn-primary mb-3">Tambah</a>

        <table class=" table table-bordered mb-3">
            <tr>
                <th>NO</th>
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Kompetensi Keahlian</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1;
            while($data = mysqli_fetch_assoc($query)){?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= ($data['id_kelas']); ?></td>
                <td><?= ($data['nama_kelas']); ?></td>
                <td><?= ($data['komp_keahlian']); ?></td>
                <td>
                    <a href="edit_kelas.php?id_kelas=<?= $data['id_kelas']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_kelas.php?id_kelas=<?= $data['id_kelas']; ?>" class=" btn btn-danger btn-sm"
                        onclick="return confirm('hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>