<?php 
    include 'header.php';
    include '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['blokir'])) {
        $id = $_POST['id'] ?? null;
        $opsi = $_POST['status'] ?? null;

        if ($id && $opsi) {
            $sql_blokir = "UPDATE user SET status = 1 WHERE id = '$id'";
            $sql_bukaBlok = "UPDATE user SET status = 0 WHERE id = '$id'";

            if ($opsi == 1) {
                mysqli_query($koneksi, $sql_blokir);
            } else if ($opsi == 2) {
                mysqli_query($koneksi, $sql_bukaBlok);
            }
        } else {
            echo "<p class='text-danger'>ID Pengguna atau Opsi tidak valid.</p>";
        }
    }
?>

<div class="card p-5 border rounded-circle">
    <div class="row g-2">
        <form action="blokir.php" method="POST">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="ID Pengguna" name="id" >
                    <label for="floatingInputGrid">ID Pengguna</label>
                </div> 
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" name="status" >
                            <option value="1">Blokir Pengguna</option>
                            <option value="2">Buka Blokir</option>
                        </select>
                        <label for="floatingSelectGrid">Pilih Opsi</label>
                    </div>        
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-info" type="submit" name="blokir">Konfirmasi</button>
                    <button class="btn btn-outline-info"><a href='index.php'>Kembali</a></button>
                </div>  
            </div>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>
