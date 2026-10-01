<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$id_petugas = $_GET['id_petugas'];

$query = mysqli_query($mysqli, "DELETE FROM tb_petugas WHERE id_petugas='$id_petugas'");
header("Location: data_petugas.php");
exit;
?>