<?php 
    include 'include/header.php';
    include 'config.php';
    session_start();
    $nama = $_SESSION['username'];

    $sql = "SELECT transaksi_bayar.id, nama_toko, nominal, transaksi_bayar.waktu FROM `transaksi_bayar` 
    JOIN user ON transaksi_bayar.id_user = user.id 
    JOIN toko ON transaksi_bayar.id_toko = toko.id 
    WHERE user.uname = '$nama' ORDER BY transaksi_bayar.waktu DESC;"
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
     <input type="date" name="tgl_mulai" class="form-control">
  </div>
</div>  
        <button type="submit" name="filter_tgl" class="btn btn-outline-info">Cari</button>
    </form>
    </div>
    <table class="table table-striped"> 
    <thead> 
        <tr>
            <th>ID Transaksi</th> 
            <th>Toko/Merchant Tujuan</th> 
            <th>Nominal Transaksi</th> 
            <th>Waktu Transaksi</th> 
            
        </tr> 
    </thead> 
    <tbody> 
 
        <?php  
        $result = mysqli_query($koneksi, $sql);

        while($histori = mysqli_fetch_array($result)){ 
            echo "<tr>"; 
 
            echo "<td>".$histori['id']."</td>";
            echo "<td>".$histori['nama_toko']."</td>"; 
            echo "<td>"."-Rp".$histori['nominal']."</td>"; 
            echo "<td>".$histori['waktu']."</td>"; 
 
            echo "</tr>"; 
        } 
        ?> 
 
    </tbody>
    </table>

    
        <button type="button" class="btn btn-outline-info w-50 ms-auto"><a href='menu_pengguna.php'>kembali</a></button>
    </div>
<?php include 'include/footer.php';