<?php
    include "config.php";
    session_start();
    $info="";
    
    if(isset($_POST['login_user'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['password'] = $password;
        

        $sql = "SELECT * FROM toko WHERE uname = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $sql);

        if($result->num_rows>0){
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["uname"];
            $_SESSION["islogin"] = true;
            header('Location: ../menu_toko.php');
        }else{
            $info ="data tidak ditemukan";
        }
    }
     if(isset($_POST['register_toko'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $namalengkap = $_POST['nama_lengkap'];
        $nohp = $_POST['no_hp'];
        $email = $_POST['email'];
		$alamat_toko = $_POST['alamat'];
		$nama_toko = $_POST['nama_toko'];

        $sql = "SELECT * FROM toko WHERE uname = '$username'";
        $result = $koneksi->query($sql);
        if($result->num_rows>0){
            $info = 'Nama Toko telah dipakai';
        }else{
            $sql = "INSERT INTO toko (uname, password, nama_lengkap, nomor_hp, email, alamat_toko, nama_toko) 
			VALUES ('$username', '$password', '$namalengkap', $nohp, '$email', '$alamat_toko', '$nama_toko')";
            $query = mysqli_query($koneksi, $sql);
            $info = 'daftar berhasil';
        }
    };

?>

<style>
		.bg-img {
  background-image: url(../assets/img/bg.jpeg);
}
	</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>


    <link rel="stylesheet" type="text/css" href="signIn-signUp.css">
    <script src="signIn-signUp.js" defer></script>
</head>
<body class="bg-img">
	

<h2>GI-PAY</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method = "POST">
			<h1>Create Account</h1>
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> -->
			<span>or use your email for registration</span>
			 <input type="text" name="nama_toko" placeholder="Nama Toko" required>

                <input Type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
                <input type="text" name="username" placeholder="Username" required>
				<input type="password" name="password" placeholder="Password" required>
                <input Type="email" name="email" placeholder="Email" required>
                <input type="number" name="no_hp" placeholder="No HP" required>                
				<input type="text" name="alamat" placeholder="Alamat Toko" required>
                <button type="submit" name="register_toko" href="SISU-Toko.php">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<input type="text" placeholder="Username" name="username" />
			<input type="password" placeholder="Password" name="password"/>
			<button name="login_user" href="" type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script src = "user_Main/index.js"></script>
</body>
</html>