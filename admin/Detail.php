<?php
include '../config.php';
session_start();

// Menghitung jumlah pengguna berdasarkan role
$sql_publik = "SELECT COUNT(id) AS total_user FROM user";
$result_publik = mysqli_query($koneksi, $sql_publik);
$data_publik = $result_publik->fetch_assoc();

$sql_toko = "SELECT COUNT(*) AS total_toko FROM toko";
$result_toko = mysqli_query($koneksi, $sql_toko);
$data_toko = $result_toko->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Statistik Sign-Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Statistik Sign-Up Pengguna</h1>
    <div class="stats">
        <div class="stat-item">
            <h2>Pengguna Publik</h2>
            <p>Total: <?php echo $data_publik['total_user']; ?></p>
        </div>
        <div class="stat-item">
            <h2>Pemilik Toko</h2>
            <p>Total: <?php echo $data_toko['total_toko']; ?></p>
        </div>
    </div>
    <div class="text-center">
        <button class="btn"><a href='index.php'>Kembali ke Admin Panel</a></button>
    </div>
</div>
</body>
</html>
