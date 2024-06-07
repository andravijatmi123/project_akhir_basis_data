<?php 
    include 'include/header.php';
    include 'config.php';
    session_start();
    $nama = $_SESSION['username'];

    $sql = "SELECT SUM(nominal)
    FROM transaksi_penarikan 
    JOIN toko ON transaksi_penarikan.id_toko = toko.id ;";
    $result_total = mysqli_query($koneksi, $sql);
    $total_keseluruhan = $result_total->fetch_assoc();

    if(isset($_POST['filter_tgl'])){
    $awal = $_POST['tgl_mulai'];
    $akhir = $_POST['tgl_akhir'];

    $sql_total = "SELECT SUM(nominal)
    FROM transaksi_penarikan 
    JOIN toko ON transaksi_penarikan.id_toko = toko.id 
    WHERE transaksi_penarikan.waktu 
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
                Jumlah: Rp<?= $total['SUM(nominal)'] ?>.00
            <?php } else { ?>
                Jumlah: Rp<?= $total_keseluruhan['SUM(nominal)'] ?>.00
            <?php } ?> </h5>
</div>
    <table class="table table-striped"> 
    <thead> 
        <tr>
            <th>ID Transaksi</th> 
            <th>Nominal Pembayaran</th> 
            <th>Waktu Transaksi</th> 
            
        </tr> 
    </thead> 
    <tbody> 
 
        <?php  
        if(isset($_POST['filter_tgl'])){
            $sql = "SELECT transaksi_penarikan.id, nominal, transaksi_penarikan.waktu 
            FROM transaksi_penarikan 
            JOIN toko ON transaksi_penarikan.id_toko = toko.id 
            WHERE transaksi_penarikan.waktu BETWEEN '$awal' AND '$akhir';";
            $result = mysqli_query($koneksi, $sql);
        } else {
            $sql = "SELECT transaksi_penarikan.id, nominal, transaksi_penarikan.waktu 
            FROM transaksi_penarikan 
            JOIN toko ON transaksi_penarikan.id_toko = toko.id";
            $result = mysqli_query($koneksi, $sql);
        }   while($histori = mysqli_fetch_array($result)){ 
            echo "<tr>"; 
 
            echo "<td>".$histori['id']."</td>";
            echo "<td>"."-Rp".$histori['nominal']."</td>"; 
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