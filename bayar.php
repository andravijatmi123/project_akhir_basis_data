<?php
    include 'include/header.php';
    include "config.php";
    session_start();
    $info="";
    $passwordSalah = "";
    $idSalah = ""; 

    
    $nama = $_SESSION['username'];
    
    $sqlCekPass = "SELECT password from user WHERE uname = '$nama'";
    $cekPass = mysqli_query($koneksi, $sqlCekPass);
    $pass = $cekPass -> fetch_assoc();

    

    if(isset($_POST["bayar"])){
        $sql = "SELECT * FROM user WHERE uname = '$nama'";
        $result = mysqli_query($koneksi, $sql);
        $data = $result->fetch_assoc();
        $nominal = $_POST['nominal'];

        $idtoko = $_POST['idtoko'];
         if ($idtoko == NULL){
        echo "dongo bjir";
        }

        $sqlCekId = "SELECT id from toko WHERE id = $idtoko";
        $cekId = mysqli_query($koneksi, $sqlCekId);

        if($data['saldo']<$nominal){
            $info = 'saldo tidak cukup';
        }else if(!($_POST['password'] == $pass['password'])){
            $passwordSalah = 'Password Salah';
        }else if(mysqli_num_rows($cekId) < 1){
            $idSalah = "ID Toko/Merchant Tidak Ditemukan";
        }else{
            $_SESSION['idtoko']=$_POST['idtoko'];
            $_SESSION['nominal']=$_POST['nominal'];
            header('location: konfirmasi_bayar.php');
        }
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
        <form action="bayar.php" method="POST">
            <fieldset>
                <legend>pembayaran</legend>
                <input type="text" name="idtoko" placeholder="idtoko" >
                <input Type="text" name="nominal" placeholder="nominal" >
                <p> </p>
                <input type="password" name="password" placeholder="password" >
                <button type="submit" name="bayar">bayar</button>
                <button><a href='menu_pengguna.php'>kembali</a></button>
                <?= $info ?>
                <?= $passwordSalah ?>
                <?= $idSalah ?>
            </fieldset>
        </form action="bayar.php" method="POST">
   </main>
    
</body>
</html>