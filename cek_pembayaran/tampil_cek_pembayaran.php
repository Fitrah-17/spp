<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$query = mysqli_query($mysqli, "SELECT s.nisn, s.nama, s.no_telp, p.status, p.tgl_terakhir_bayar, p.jumlah_bulan, p.tgl_bayar, p.batas_pembayaran, p.id_pembayaran FROM tb_siswa s
    INNER JOIN ( SELECT nisn, MAX(tgl_bayar) AS tanggal_terbaru FROM tb_pembayaran GROUP BY nisn) terbaru ON s.nisn = terbaru.nisn
    INNER JOIN tb_pembayaran p ON p.nisn = terbaru.nisn AND p.tgl_bayar = terbaru.tanggal_terbaru ORDER BY s.nisn ASC
");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Pembayaran</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">

        <h2>Cek Pembayaran</h2>

        <a href="../dashboard.php">Dashboard</a> |
        <a href="../kelas/tampil_kelas.php">Data Kelas</a> |
        <a href="../siswa/tampil_siswa.php">Data Siswa</a> |
        <a href="../cek_pembayaran/tampil_cek_pembayaran.php">Cek Pembayaran</a> |
        <a href="../pembayaran/tampil_pembayaran.php">Pembayaran</a> |
        <a href="../petugas/data_petugas.php">Data Petugas</a> |
        <a href="../logout.php">Logout</a>

        <hr>

        <div class="table-responsive">

            <h3>Sudah Lunas</h3>

            <table class="table table-bordered">

                <tr>
                    <th>NO</th>
                    <th>NISN</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th>Status Pembayaran</th>
                    <th>Jumlah Bulan</th>
                    <th>Nama</th>
                    <th>NO Telepon</th>
                    <th>Aksi</th>
                </tr>

                <?php
            $no = 1;

            mysqli_data_seek($query, 0);

            while ($data = mysqli_fetch_assoc($query)) {

                if ($data['status'] != 'Sudah Lunas') {
                    continue;
                }
            ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= ($data['nisn']); ?></td>
                    <td><?= ($data['tgl_terakhir_bayar']); ?></td>
                    <td><?= ($data['status']); ?></td>
                    <td><?= ($data['jumlah_bulan']); ?></td>
                    <td><?= ($data['nama']); ?></td>
                    <td><?= ($data['no_telp']); ?></td>

                    <td>
                        <a href="detail_pembayaran.php?nisn=<?= urlencode($data['nisn']); ?>"
                            class="btn btn-warning btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>

                <?php } ?>

            </table>

        </div>

        <br>

        <div class="table-responsive">
            <h3>Belum Lunas</h3>
            <table class="table table-bordered">
                <tr>
                    <th>NO</th>
                    <th>NISN</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th>Status Pembayaran</th>
                    <th>Jumlah Bulan</th>
                    <th>Nama</th>
                    <th>NO Telepon</th>
                    <th>Aksi</th>
                </tr>

                <?php
            $no = 1;

            mysqli_data_seek($query, 0);

            while ($data = mysqli_fetch_assoc($query)) {

                if ($data['status'] != 'Belum Lunas') {
                    continue;
                }
            ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($data['nisn']); ?></td>
                    <td><?= htmlspecialchars($data['tgl_terakhir_bayar']); ?></td>
                    <td><?= htmlspecialchars($data['status']); ?></td>
                    <td><?= htmlspecialchars($data['jumlah_bulan']); ?></td>
                    <td><?= htmlspecialchars($data['nama']); ?></td>
                    <td><?= htmlspecialchars($data['no_telp']); ?></td>

                    <td>
                        <a href="detail_pembayaran.php?nisn=<?= urlencode($data['nisn']); ?>"
                            class="btn btn-warning btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>

                <?php } ?>

            </table>

        </div>

    </div>

</body>

</html>