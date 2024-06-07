<?php
    include 'include/header.php';
    include "config.php";
    session_start();
    $sql = "SELECT saldo FROM toko WHERE uname = '{$_SESSION['username']}'";
    $result = $koneksi->query($sql);
    $data = $result->fetch_assoc();

    $nama = $_SESSION['username'];

    $sql = "SELECT transaksi_bayar.id, nama_toko, nominal, transaksi_bayar.waktu FROM `transaksi_bayar` 
    JOIN user ON transaksi_bayar.id_user = user.id 
    JOIN toko ON transaksi_bayar.id_toko = toko.id 
    WHERE user.uname = '$nama' ORDER BY transaksi_bayar.waktu DESC";

    $sql1 = "SELECT id FROM toko WHERE uname = '$nama'";
    $result1 = mysqli_query($koneksi, $sql1)->fetch_assoc();

    $id_toko = $result1['id'];
    $sql2 = "SELECT COUNT(id) AS jumlah_transaksi FROM transaksi_bayar WHERE id_toko = '$id_toko'";

    $hasil2 = mysqli_query($koneksi, $sql2);
    $id = $hasil2->fetch_assoc();

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
        <a class="nav-link btn btn-outline-info border text-danger-emphasis" href="Detail_Pembayaran.php">Detail Pembayaran</a>
       
        <a class="navlink btn btn-outline-info border text-danger-emphasis "   href="Detail_Penarikan.php">Detail Penarikan</a>
        
        <!-- <a class="nav-link btn btn-outline-info border rounded text-danger-emphasis" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
          History Penarikan
        </a> -->


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
        <p></p>
        <a class="nav-link btn btn-outline-info rounded-5 border w-50 mx-auto text-center text-danger-emphasis" name="logout" >Log Out</a>
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
             <p>Hi! <b class=""><?= $_SESSION['username']?></b></p>
            <p1></p1></marquee>
          </div>
        <div class="row justify-content-center">
        
        <hr class=" border-bottom border-3 ">
                             <p class="" id="messeage"><b>Saldo anda: Rp<?= $data['saldo'] ?>,00</b></p>
                            
                          <div class="col-3">
                          <div class="card-body border border-3 " style="width: 10rem;">
                              <h5 class="text-center">Tarik Saldo!</h5>
                               <img src="assets/img/cart.png" class="card-img-top clickable" id="gambar1" href="tarik.php">
                            </div>
                                                   
                          </div>  
                          <div class="col-3" >                     
                            <div class="card-body border border-3" style="width: 12rem; padding-bottom: 7px;">                            
                              <h5><b>Total Penjualan</b>: <?= $id['jumlah_transaksi'] ?></h5>
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
  <script>
    function gambarClicked(id) {
  // Ganti lokasi atau halaman sesuai dengan gambar yang diklik
  if (id === "gambar1") {
    window.location.href = "tarik.php";
  } else if (id === "gambar2") {
    window.location.href = "SISU-Toko.php";
  }
}

// Mendapatkan semua elemen gambar yang dapat diklik
var gambar = document.querySelectorAll(".clickable");

// Menambahkan event listener untuk setiap gambar
gambar.forEach(function (gambar) {
  gambar.addEventListener("click", function () {
    // Panggil fungsi gambarClicked dengan ID gambar yang diklik
    gambarClicked(gambar.id);
  });
});

  </script>


<script type="text/javascript">/*<![CDATA[*/

TypingText = function(element, interval, cursor, finishedCallback) {

if((typeof document.getElementById ==

"undefined") || (typeof element.innerHTML == "undefined")) {

this.running = true;

return;

}

this.element = element;

this.finishedCallback = (finishedCallback

? finishedCallback : function() { return; });

this.interval = (typeof interval == "undefined" ? 100 : interval);

this.origText = this.element.innerHTML;

this.unparsedOrigText = this.origText;

this.cursor = (cursor ? cursor : "");

this.currentText = "";

this.currentChar = 0;

this.element.typingText = this;

if(this.element.id == "") this.element.id = "typingtext" + TypingText.currentIndex++;

TypingText.all.push(this);

this.running = false;

this.inTag = false;

this.tagBuffer = "";

this.inHTMLEntity = false;

this.HTMLEntityBuffer = "";

}

TypingText.all = new Array();

TypingText.currentIndex = 0;

TypingText.runAll

= function() {

for(var i = 0; i < TypingText.all.length; i++) TypingText.all[i].run();

}

TypingText.prototype.run = function() {

if(this.running) return;

if(typeof this.origText == "undefined") {

setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);

return;

}

if(this.currentText == "") this.element.innerHTML = "";

if(this.currentChar < this.origText.length) {

if(this.origText.charAt(this.currentChar) == "<" &&

!this.inTag) {

this.tagBuffer = "<";

this.inTag = true;

this.currentChar++;

this.run();

return;

} else if(this.origText.charAt(this.currentChar) == ">" &&

this.inTag) {

this.tagBuffer += ">";

this.inTag = false;

this.currentText += this.tagBuffer;

this.currentChar++;

this.run();

return;

} else

if(this.inTag) {

this.tagBuffer += this.origText.charAt(this.currentChar);

this.currentChar++;

this.run();

return;

} else

if(this.origText.charAt(this.currentChar) == "&" && !this.inHTMLEntity) {

this.HTMLEntityBuffer = "&";

this.inHTMLEntity = true;

this.currentChar++;

this.run();

return;

} else if(this.origText.charAt(this.currentChar) == ";" && this.inHTMLEntity) {

this.HTMLEntityBuffer += ";";

this.inHTMLEntity =

false;

this.currentText += this.HTMLEntityBuffer;

this.currentChar++;

this.run();

return;

} else if(this.inHTMLEntity) {

this.HTMLEntityBuffer +=

this.origText.charAt(this.currentChar);

this.currentChar++;

this.run();

return;

} else {

this.currentText += this.origText.charAt(this.currentChar);

}

this.element.innerHTML = this.currentText;

this.element.innerHTML += (this.currentChar < this.origText.length - 1 ? (typeof this.cursor == "function" ?

this.cursor(this.currentText) : this.cursor) : "");

this.currentChar++;

setTimeout("document.getElementById('" + this.element.id + "').typingText.run()",

this.interval);

} else {

this.currentText = "";

this.currentChar = 0;

this.running = false;

this.finishedCallback();

}

}


/*]]>*/</script>

  <script type="text/javascript">/*<![CDATA[*/

new TypingText(document.getElementById("message"), 90, function(i){ var ar = new Array("_", " ", "_", " "); return " " +

ar[i.length % ar.length]; });

//Type out examples:

TypingText.runAll();

/*]]>*/</script>

<?php include'include/footer.php';

