<?php
include '../include/header.php';
include '../config.php';

// Fetch all users
$sql = "SELECT * FROM user";
$result1 = $koneksi->query($sql);
$result = $result1->fetch_assoc();



// Fetch user details
$sql = "SELECT * FROM user";
$result2 = $koneksi->query($sql);
$user = $result2->fetch_assoc();

?>

<div class="container">
    <h2>Detail Pengguna</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Tipe Pengguna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result1->num_rows > 0) {
                while ($row = $result) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['uname'] . "</td>";
                    echo "<td>" . $row['nama_lengkap'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['nomor_hp'] . "</td>";
                    // echo "<td>" . ($row['is_owner'] ? 'Pemilik Toko' : 'Pengguna Publik') . "</td>";
                    echo "<td><a href='fetch_user_details.php?id=" . $row['id'] . "'>Lihat Detail</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data pengguna</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<div class="container">
    <h2>Detail Pengguna</h2>
    <?php if ($user): ?>
        <p>ID: <?= $user['id'] ?></p>
        <p>Username: <?= $user['uname'] ?></p>
        <p>Nama Lengkap: <?= $user['nama_lengkap'] ?></p>
        <p>Email: <?= $user['email'] ?></p>
        <p>Nomor HP: <?= $user['nomor_hp'] ?></p>
        <p>Tipe Pengguna: <?= $user['is_owner'] ? 'Pemilik Toko' : 'Pengguna Publik' ?></p>
    <?php else: ?>
        <p>Pengguna tidak ditemukan.</p>
    <?php endif; ?>
    <a href="admin.php">Kembali</a>
</div>

<?php
include '../include/footer.php';
?>



