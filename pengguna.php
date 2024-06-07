<?php
    include "config.php";
    session_start();
    $info="";
    
    if(isset($_POST['login_user'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['password'] = $password;
        

        $sql = "SELECT * FROM user WHERE uname = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $sql);

        if($result->num_rows>0){
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["uname"];
            $_SESSION["islogin"] = true;
            header('Location: menu_pengguna.php');
        }else{
            $info ="data tidak ditemukan";
        }
    }
     if(isset($_POST['register_user'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $namalengkap = $_POST['nama_lengkap'];
        $nohp = $_POST['nomor_hp'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM user WHERE uname = '$username'";
        $result = $koneksi->query($sql);
        if($result->num_rows>0){
            $info = 'username telah dipakai';
        }else{
            $sql = "INSERT INTO user (uname, password, nama_lengkap, nomor_hp, email) VALUES ('$username', '$password', '$namalengkap', '$nohp', '$email')";
            $query = mysqli_query($koneksi, $sql);
            $info = 'daftar berhasil';
        }
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <header>
        <h1>GI-PAY</h1>
        <a href = "index.php">menu</a>
        <hr>
   </header>
   <main>
        <h3>pengguna</h3>
        
        <form action="pengguna.php" method="POST">
            <fieldset>
                <legend>login</legend>
                <input type="text" name="username" placeholder="username" required>
                <br>
                <input Type="password" name="password" placeholder="password" required>
                <br>
                <button type="submit" name="login_user">masuk</button>
                <?php
                    if(isset($_POST['login_user'])){ 
                        echo $info;
                    }
                ?>
            </fieldset>
        </form>
        
        <form action="pengguna.php" method="POST">
            <fieldset>
                <legend>register</legend>
                <input type="text" name="username" placeholder="username" required>
                <br>
                <input Type="password" name="password" placeholder="password" required>
                <br>
                <input type="text" name="nama_lengkap" placeholder="nama lengkap" required>
                <br>
                <input Type="text" name="nomor_hp" placeholder="nomor hp" required>
                <br>
                <input type="text" name="email" placeholder="email" required>
                <br>
                <button type="submit" name="register_user">daftar</button>
                <?php
                    if(isset($_POST['register_user'])){
                        echo $info; 
                    }
                ?>
            </fieldset>
        </form>
   </main>
</body>
</html>