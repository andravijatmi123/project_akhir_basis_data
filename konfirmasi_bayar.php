<?php
    include 'config.php';
    session_start();
    $nama = $_SESSION['username'];
    $idtoko = $_SESSION['idtoko'];
    $nominal = $_SESSION['nominal'];

    $sql = "SELECT * FROM toko WHERE id = '$idtoko'";
    $result = mysqli_query($koneksi, $sql);
    $data = $result->fetch_assoc();

    if(isset($_POST['konfirmasi'])){ 
        $sql1 = "SELECT potongan, waktu FROM config_potongan ORDER BY id DESC LIMIT 1 ";
        $result1 = mysqli_query($koneksi, $sql1);
        $data1 = $result1->fetch_assoc();
        $nominal_akhir = $nominal - ($nominal*$data1['potongan']/100);

        $sql2 = "UPDATE toko SET saldo = saldo + $nominal_akhir WHERE id ='$idtoko'";
        $result2= mysqli_query($koneksi, $sql2);

        $sql3 = "UPDATE user SET saldo = saldo - $nominal WHERE uname = '$nama'";
        $result3 = mysqli_query($koneksi, $sql3);

        $sql4 = "SELECT * FROM user WHERE uname = '$nama'";
        $result4 = mysqli_query($koneksi, $sql4);
        $data1 = $result4->fetch_assoc();
        $iduser = $data1['id'];


        $sql5 = "INSERT INTO transaksi_bayar(id_user, Id_toko, nominal) VALUE ('$iduser', '$idtoko', '$nominal')";
        $result5 = mysqli_query($koneksi, $sql5);


        header('location: menu_pengguna.php');
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>PEMBAYARAN</title>
    </head>
<body>
    <header>
        <h1>GI-PAY</h1>
        <hr>
   </header>
   <main>
        <table border = '1'>
            <thead>
                <tr>
                <th scope="col">id toko</th>
                <th scope="col">Nama</th>
                <th scope="col">alamat</th>
                <th scope="col">nominal</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td scope="row"><?= $idtoko ?></td>
                    <td><?= $data['nama_toko'] ?></td>
                    <td><?= $data['alamat_toko'] ?></td>
                    <td><?= $nominal ?></td>
                </tr>
            </tbody>
        </table>
        <form action='konfirmasi_bayar.php' method='POST'>
            <button type='submit' name='konfirmasi'>konfirmasi</button>
            <button><a href = 'bayar.php'>batal</a></button>
        </form>
   </main>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Saldo</th>
    </tr>
  </thead>
 
  <tbody>
    <tr>
        <th scope="row">1</th>
        <td><?php echo $data['Nama']?></td>
        <td></td>
    </tr>
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit"  class="btn btn-primary" name="konfirmasi">Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>