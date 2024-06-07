<?php
include '../config.php';
session_start();

$info = "";

if (isset($_POST['update_potongan'])) {
    $potongan = $_POST['potongan'];
    // $tanggal_berlaku = $_POST['tanggal_berlaku'];

    if (empty($potongan)) {
        $info = "Semua field harus diisi.";
    } else {
        $potongan = floatval($potongan);
        // $tanggal_berlaku = mysqli_real_escape_string($koneksi, $tanggal_berlaku);

        $sql = "INSERT INTO config_potongan (potongan) VALUES ('$potongan')";
        if (mysqli_query($koneksi, $sql)) {
            $info = "Potongan berhasil diperbarui.";
        } else {
            $info = "Terjadi kesalahan: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Update Potongan Gi-Pay</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Update Potongan Pembayaran Gi-Pay</h1>
    <form action="" method="POST">
        <label for="potongan">Potongan (%):</label>
        <input type="text" id="potongan" name="potongan" required>

        <!-- <label for="tanggal_berlaku">Tanggal Berlaku:</label>
        <input type="date" id="tanggal_berlaku" name="tanggal_berlaku" required> -->

        <button type="submit" name="update_potongan">Update</button>
    </form>
    <?php if ($info) { echo "<p>$info</p>"; } ?>
</div>
</body>
</html>
