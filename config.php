<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $nama_database = "test";

    $koneksi = mysqli_connect($host, $user, $pass, $nama_database); //menguhubungkan dengan database
    if(!$koneksi) {
        die("tidak bisa");
    } 
?>