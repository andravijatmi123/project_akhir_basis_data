<?php
include 'header.php';
include '../config.php';

// Fetch all users
$sql = "SELECT * FROM user";
$result1 = $koneksi->query($sql);




// Fetch user details
$sql = "SELECT * FROM toko";
$result2 = $koneksi->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <button ><a href='index.php'>kembali</a></button>
        <h3>data user</h3>
        <table class="table" 
            <thead> 
                <tr>
                    <th>ID </th> 
                    <th>Username</th> 
                    <th>saldo</th> 
                    <th>Waktu dibuat</th> 
                    
                </tr> 
            </thead> 
            <tbody>
                <?php
                    while($histori = mysqli_fetch_array($result1)){ 
                    echo "<tr>"; 
        
                    echo "<td>".$histori['id']."</td>";
                    echo "<td>".$histori['uname']."</td>"; 
                    echo "<td>".$histori['saldo']."</td>"; 
                    echo "<td>".$histori['waktu']."</td>"; 
        
                    echo "</tr>"; 
                    }
                ?>
            </tbody>
        </table>
        <h3>data toko</h3>
        <table class="table"> 
            <thead> 
                <tr>
                    <th>ID </th> 
                    <th>Username</th> 
                    <th>saldo</th> 
                    <th>Waktu dibuat</th> 
                    
                </tr> 
            </thead> 
            <tbody>
                <?php
                    while($histori = mysqli_fetch_array($result2)){ 
                    echo "<tr>"; 
        
                    echo "<td>".$histori['id']."</td>";
                    echo "<td>".$histori['uname']."</td>"; 
                    echo "<td>".$histori['saldo']."</td>"; 
                    echo "<td>".$histori['waktu']."</td>"; 
        
                    echo "</tr>"; 
                    }
                ?>
             </tbody>
        </table>

    </main>
</body>
</html>