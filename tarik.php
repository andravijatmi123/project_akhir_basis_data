<?php
include 'include/header.php';
include 'config.php';

session_start();
// Ambil data dari formulir pembayaran
$username = $_SESSION['username'];
$info = "";
$saldo_kurang = "";
$passwordSalah = "";

$sqlCekPass = "SELECT password from toko WHERE uname = '$username'";
$cekPass = mysqli_query($koneksi, $sqlCekPass);
$pass = $cekPass -> fetch_assoc();


if(isset($_POST['tarik'])){
$nomor_rekening = $_POST['norek'];
$nominal = $_POST['nominal'];
// Query untuk mengambil saldo user
$query_saldo = "SELECT saldo FROM toko WHERE uname = '$username'";
$result = mysqli_query($koneksi, $query_saldo);
$saldo = $result->fetch_assoc();

// Periksa apakah saldo mencukupi
if(!($_POST['password'] == $pass['password'])){
            $passwordSalah = 'Password Salah';
}else if ($saldo['saldo'] >= $nominal) {
    // Kurangi saldo user
    $saldo_terbaru = $saldo['saldo'] - $nominal;
    $query_update_saldo = "UPDATE toko SET saldo = saldo - $nominal WHERE uname = '$username'";
    mysqli_query($koneksi, $query_update_saldo);

    $sql_id = "SELECT id FROM toko WHERE uname = '$username'";
    $result_id = mysqli_query($koneksi, $sql_id);
    $id = $result_id->fetch_assoc(); 
    $idtoko = $id['id'];
    $sql_penarikan = "INSERT INTO transaksi_penarikan (id_toko, nominal) VALUES('$idtoko', '$nominal')";
    mysqli_query($koneksi, $sql_penarikan);

    $info = "Transaksi berhasil. Saldo anda sekarang: $saldo_terbaru";
    header('location: tarik.php');
} else {
    $saldo_kurang = "Transaksi gagal. Saldo tidak mencukupi.";
}
}

?>

<body> 
 <div class="jumbotron" style="padding-top: 130px;"> 
    <div class="card w-50 mx-auto" >
        <form action="tarik.php" method="POST">
            
                <div class="card-header text-center">
                <h3>Penarikan Saldo</h3>
                </div> 
                <label for="title">No. Rekening Tujuan:</label>
                <input type="text" class="form-control" name="norek" placeholder="masukan No. Rekening" >
                <p></p>
                <label for="title">Nominal:</label>
                <input Type="text" class="form-control" name="nominal" placeholder="masukan nominal" >
                <p> </p>
                <label for="title">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="password" >
                <p></p>
                <button class="btn btn-outline-info" type="submit" name="tarik">tarik</button>
                <button  class="btn btn-outline-info"><a href='menu_toko.php'>kembali</a></button>
                <?= $info ?>
                <?= $saldo_kurang ?>
                <?= $passwordSalah ?>
            
            
        </form >
    </div>
</div>
<?php include 'include/footer.php';