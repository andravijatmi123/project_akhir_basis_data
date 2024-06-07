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
        <h3>toko</h3>
        <form action="proses_login.php" method="POST">
            <fieldset>
                <legend>login</legend>
                <input type="text" name="username" placeholder="username" required>
                <br>
                <input Type="password" name="password" placeholder="password" required>
                <br>
                <button type="submit" name="login_toko">masuk</button>
            </fieldset>
        </form>

        <form action="proses_register.php" method="POST">
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
                <input type="number" name="email" placeholder="email" required>
                <br>
                <button type="submit" name="register_toko">daftar</button>
            </fieldset>  
        </form>
   </main>
</body>
</html>