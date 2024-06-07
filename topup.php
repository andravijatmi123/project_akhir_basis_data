<?php include 'include/header.php';
      include 'config.php';
// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];

    $sql = "UPDATE user SET saldo = saldo + $amount WHERE nomor_hp = '$phone' ";

    // Validasi input sederhana
    if (empty($phone) || empty($amount)) {
        echo "Nomor HP dan jumlah top-up harus diisi.";
        exit;
    }

    if(isset($_POST['generate'])){
        mysqli_query($koneksi, $sql);
    }

    // Menghasilkan nomor virtual account berdasarkan nomor HP
    $vaNumber = 'VA' . substr($phone, -10) . rand(100, 999);

    // Di sini Anda dapat menambahkan logika untuk menyimpan informasi ini ke database

    // Tampilkan informasi Virtual Account
    echo "<h2>Detail Virtual Account</h2>";
    echo "<p>Nomor Virtual Account: " . htmlspecialchars($vaNumber) . "</p>";
    echo "<p>Jumlah yang harus ditransfer: " . htmlspecialchars($amount) . "</p>";
} else {
    echo "Form belum disubmit.";
}
?>

    <div class="card w-50 mx-auto"></div>
        <h1>Top-Up Saldo</h1>
    </header>

        <section>
            <h2>Isi Data Pengguna</h2>
            <form action="topup.php" method="post">
                <label for="phone">Nomor HP:</label>
                <input type="text" id="phone" name="phone" required>
                <label for="amount">Jumlah Top-Up:</label>
                <input type="number" id="amount" name="amount" required>
                <button type="submit" name="generate">Generate Virtual Account</button>
            </form>
        </section>
 


</div>
 
<?php include 'include/footer.php';
?>
