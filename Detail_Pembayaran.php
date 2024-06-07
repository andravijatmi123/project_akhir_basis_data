<?php 
    include 'include/header.php';
    include 'config.php';
    session_start();
    $nama = $_SESSION['username'];

    $sql_potongan = "SELECT potongan FROM config_potongan GROUP BY id DESC LIMIT 1";
    $result_potongan = mysqli_query($koneksi, $sql_potongan);
    $potongan = $result_potongan->fetch_assoc();

    $sql = "SELECT SUM(nominal)
    FROM transaksi_bayar 
    JOIN user ON transaksi_bayar.id_user = user.id 
    JOIN toko ON transaksi_bayar.id_toko = toko.id";
    $result_total = mysqli_query($koneksi, $sql);
    $total_keseluruhan = $result_total->fetch_assoc();

    if(isset($_POST['filter_tgl'])){
    $awal = $_POST['tgl_mulai'];
    $akhir = $_POST['tgl_akhir'];

    $sql_total = "SELECT SUM(nominal)
    FROM transaksi_bayar 
    JOIN user ON transaksi_bayar.id_user = user.id 
    JOIN toko ON transaksi_bayar.id_toko = toko.id 
    WHERE transaksi_bayar.waktu 
    BETWEEN '$awal' AND '$akhir';";
    $result_total = mysqli_query($koneksi, $sql_total);
    $total = $result_total->fetch_assoc();
    }
?>


<div class="card w-50 p-5 w-5 mx-auto border rounded-4 justify-content-center">
    <div class="card-header">
    <h1>History</h1>
   
    <form action="" method="POST" class=" form form-inline">
        <div class="row g-3">
  <div class="col">
     <label for="">Tanggal Awal:</label>
    <input type="date" name="tgl_mulai" class="form-control">
  </div>
  <div class="col">
     <label for="">Tanggal Akhir:</label>
     <input type="date" name="tgl_akhir" class="form-control">
  </div>
</div>  
        <button type="submit" name="filter_tgl" class="btn btn-outline-info">Cari</button>
        <p></p>
    </form>
    

    <div class="card-body">
        <h5 class="border border-2 border-bottom-0 w-50"> 
    <?php if (isset($total)) { ?>
                Jumlah: Rp<?= $total['SUM(nominal)'] - ($total['SUM(nominal)'] * $potongan['potongan'] / 100) ?>.00
            <?php } else { ?>
                Jumlah: Rp<?= $total_keseluruhan['SUM(nominal)'] - ($total_keseluruhan['SUM(nominal)'] * $potongan['potongan'] / 100) ?>.00
            <?php } ?> </h5>
    </div>
    <table class="table table-striped"> 
    <thead> 
        <tr>
            <th>ID Transaksi</th> 
            <th>Username</th> 
            <th>Nominal Pembayaran</th> 
            <th>Waktu Transaksi</th> 
            
        </tr> 
    </thead> 
    <tbody>
        <?php 
        if(isset($_POST['filter_tgl'])){
            $sql = "SELECT transaksi_bayar.id, user.uname, nominal, transaksi_bayar.waktu 
            FROM transaksi_bayar 
            JOIN user ON transaksi_bayar.id_user = user.id 
            JOIN toko ON transaksi_bayar.id_toko = toko.id 
            WHERE transaksi_bayar.waktu BETWEEN '$awal' AND '$akhir';";
            $result = mysqli_query($koneksi, $sql);
        } else {
             $sql = "SELECT transaksi_bayar.id, user.uname, nominal, transaksi_bayar.waktu 
             FROM transaksi_bayar 
             JOIN user ON transaksi_bayar.id_user = user.id 
             JOIN toko ON transaksi_bayar.id_toko = toko.id";
             $result = mysqli_query($koneksi, $sql);
        }  
         while($histori = mysqli_fetch_array($result)){ 
            $nominal = $histori['nominal'] - ($histori['nominal'] * ($potongan['potongan'] / 100));
            echo "<tr>"; 
 
            echo "<td>".$histori['id']."</td>";
            echo "<td>".$histori['uname']."</td>"; 
            echo "<td>"."+Rp".$nominal."</td>"; 
            echo "<td>".$histori['waktu']."</td>"; 
 
            echo "</tr>"; 
        }
        ?>
         </tbody>
    </table>

    
        <button type="button" class="btn btn-outline-info w-50 ms-auto"><a href='menu_toko.php'>kembali</a></button>
    </div>
 
   
    </div>
<?php include 'include/footer.php';