<?php
 $mysqli = mysqli_connect("localhost", "root", "", "db_spp");

 if(!$mysqli){
    die("koneksi error: " . $mysqli_connect_error());
//  }else{
//     echo "koneksi berhasil";
 }

?>