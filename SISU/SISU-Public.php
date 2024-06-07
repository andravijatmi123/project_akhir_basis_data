<?php
    include "config.php";
    session_start();
    $info = "";

    if (isset($_POST['login_user'])) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validasi input
        if (empty($username) || empty($password)) {
            $info = "Username dan password harus diisi.";
        } else {
            $username = mysqli_real_escape_string($koneksi, $username);
            $password = mysqli_real_escape_string($koneksi, $password);

            $sql_status = "SELECT status FROM user WHERE uname = '$username'";
            $query_status = mysqli_query($koneksi, $sql_status);

            if ($query_status && $query_status->num_rows > 0) {
                $data_status = $query_status->fetch_assoc();

                $sql_user = "SELECT * FROM user WHERE uname = '$username' AND password = '$password'";
                $result_user = mysqli_query($koneksi, $sql_user);

                if ($result_user->num_rows > 0) {
                    $data_user = $result_user->fetch_assoc();
                    if ($data_status['status'] == 0) {
                        $_SESSION["username"] = $data_user["uname"];
                        $_SESSION["islogin"] = true;
                        header('Location: ../menu_pengguna.php');
                        exit;
                    } else {
                        $info = "Akun Anda diblokir. Silakan hubungi admin.";
                    }
                } else {
                    $info = "Username atau password salah.";
                }
            } else {
                $info = "Username tidak ditemukan.";
            }
        }
    }

    if (isset($_POST['register_user'])) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $namalengkap = $_POST['nama_lengkap'] ?? '';
        $nohp = $_POST['nomor_hp'] ?? '';
        $email = $_POST['email'] ?? '';

        // Validasi input
        if (empty($username) || empty($password) || empty($namalengkap) || empty($nohp) || empty($email)) {
            $info = "Semua field harus diisi.";
        } else {
            $username = mysqli_real_escape_string($koneksi, $username);
            $password = mysqli_real_escape_string($koneksi, $password);
            $namalengkap = mysqli_real_escape_string($koneksi, $namalengkap);
            $nohp = mysqli_real_escape_string($koneksi, $nohp);
            $email = mysqli_real_escape_string($koneksi, $email);

            $sql_check = "SELECT * FROM user WHERE uname = '$username'";
            $result_check = $koneksi->query($sql_check);

            if ($result_check->num_rows > 0) {
                $info = 'Username telah dipakai';
            } else {
                $sql_register = "INSERT INTO user (uname, password, nama_lengkap, nomor_hp, email) VALUES ('$username', '$password', '$namalengkap', '$nohp', '$email')";
                if (mysqli_query($koneksi, $sql_register)) {
                    $info = 'Daftar berhasil';
                } else {
                    $info = 'Pendaftaran gagal. Silakan coba lagi.';
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GI-PAY</title>
    <link rel="stylesheet" type="text/css" href="signIn-signUp.css">
    <style>
        .bg-img {
            background-image: url(../assets/img/bg.jpeg);
        }
    </style>
    <script src="signIn-signUp.js" defer></script>
</head>
<body class="bg-img">
<div class="jumbotron">
    <h2>GI-PAY</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST">
                <h1>Buat Akun</h1>
                <input type="text" placeholder="Nama Lengkap" name="nama_lengkap" />
                <input type="text" placeholder="Username" name="username" />
                <input type="password" placeholder="Password" name="password" />
                <input type="email" placeholder="E-mail" name="email" />
                <input type="tel" placeholder="Nomor Handphone" name="nomor_hp" />
                <button name="register_user">Sign Up</button>
                <?php if (!empty($info)) { echo "<p>$info</p>"; } ?>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="POST">
                <h1>Sign in</h1>
                <input type="text" placeholder="Username" name="username" />
                <input type="password" placeholder="Password" name="password"/>
                <button name="login_user" type="submit">Sign In</button>
                <?php if (!empty($info)) { echo "<p>$info</p>"; } ?>
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
</div>
<script src="user_Main/index.js"></script>
</body>
</html>
