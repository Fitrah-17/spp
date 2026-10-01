<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$id_pembayaran = $_GET['id_pembayaran'];

$query = mysqli_query($mysqli, "DELETE FROM tb_pembayaran WHERE id_pembayaran='$id_pembayaran'");
header("Location: tampil_pembayaran.php");
exit;
?>