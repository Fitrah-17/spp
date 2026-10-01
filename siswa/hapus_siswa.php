<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}

include('../config.php');

$nisn = $_GET['nisn'];

$query = mysqli_query($mysqli, "DELETE FROM tb_siswa WHERE nisn='$nisn'");
header("Location: tampil_siswa.php");
exit;
?>