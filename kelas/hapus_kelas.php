<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$id_kelas = $_GET['id_kelas'];

$query = mysqli_query($mysqli, "DELETE FROM tb_kelas WHERE id_kelas='$id_kelas'");
header("Location: tampil_kelas.php");
exit;
?>