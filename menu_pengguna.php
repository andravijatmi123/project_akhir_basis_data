<?php
    include 'include/header.php';
    include "config.php";
    session_start();
    $sql = "SELECT saldo FROM user WHERE uname = '{$_SESSION['username']}'";
    $result = $koneksi->query($sql);
    $data = $result->fetch_assoc();

    $nama = $_SESSION['username'];

    $sql = "SELECT transaksi_bayar.id, nama_toko, nominal, transaksi_bayar.waktu FROM `transaksi_bayar` 
    JOIN user ON transaksi_bayar.id_user = user.id 
    JOIN toko ON transaksi_bayar.id_toko = toko.id 
    WHERE user.uname = '$nama' ORDER BY transaksi_bayar.waktu DESC";

    if (isset($_POST['logout'])){
      session_destroy();
      header('location: index.php');
      exit();
    }
    
?>

   <body>
        <div class="card-body " >
  <div class="container-fluid ">
    
  <div class="jumbotron " style="padding-top: 115px; padding-bottom: 300px;">
<!-- //sidebar// -->



  <div class="row">

  <div class="col-3">

    <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
      <nav class="nav nav-pills flex-column">        
        <a class="nav-link btn btn-outline-info border text-danger-emphasis" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
          History
        </a>


          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
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
            </div>
          </div>

       
          <form action="menu_pengguna.php" method="POST">
          <a class="nav-link btn btn-outline-info border rounded-5 w-50 mx-auto text-center text-danger-emphasis " name="logout" href="index.php">Log Out</a>
          </form>
        </nav>
      </nav>
    </nav>

  </div>
   <!-- content -->
   <div class="col-9">
    <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
         <div class="card-body">
          <div class="container  w-75">
            <marquee behavior="" direction=""> <h1 class="display-3"> Selamat Datang</h1>
             <p>Hi <b class=""><?= $_SESSION['username']?></b></p>
            <p1></p1></marquee>
          </div>
        <div class="row justify-content-center">
        
        <hr class=" boder-bottom ">
        
                             <p class="">Saldo anda: Rp<?= $data['saldo'] ?>,00</p>
                          <div class="col-3">
                          <div class="card-body border border-3 " style="width: 10rem;">
                              <h5 class="text-center">Ayo Bayar!</h5>
                              <a href="bayar.php">
                              <img src="assets/img/bayar.png" class="card-img-top clickable" id="gambar1" href="bayar.php">
                              </a> 
                            </div>
                                                   
                          </div>  
                          <div class="col-3" >                     
                            <div class="card-body border border-3" style="width: 10rem;">                            
                               <h5 class="text-center">Ayo Top Up!</h5>
                               <img src="assets/img/topup.png" class="card-img-top clickable" id="gambar2" href="">
                            </div>
                            </div>
                            </div>
                          </div>
                        
        </div> 
    </div>
      </div>
      </div>
    </div>
  </div>
</div>  
</div>

</div>

    </div>

  
<?php include'include/footer.php';