<?php
include("config.php");
require_once("auth.php");
$id = $_GET['id'];
$query = pg_query("SELECT * FROM pesanan WHERE id = $id");
$pesanan = pg_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basdat Travel Agency</title>
    <link rel="stylesheet" href="css/pesananstyle.css" />

</head>


<body>



    <div class="container">
        <div class="title">Pemesanan</div>
        <div class="content">
            <form method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Jumlah Pemesan</span>
                        <input type="text" placeholder="Jumlah Pemesan" required name="jumlah_pemesan" value="<?php echo $pesanan['jumlah_orang']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="details">Alamat</span>
                        <input type="text" placeholder="Alamat" name="alamat" required value="<?php echo $pesanan['alamat']; ?>">
                    </div>
                    <div class=" input-box">
                        <span class="details">Paket</span>
                        <input type="text" placeholder="Paket" name="paket" required value="<?php echo $pesanan['id_paket']; ?>">
                    </div>
                    <div class=" input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" name="nomor_hp" required value="<?php echo $pesanan['nomor_hp']; ?>">
                    </div>
                    <div class=" input-box">
                        <span class="details">Durasi (hari)</span>
                        <input type="text" placeholder="Hari" name="durasi" required value="<?php echo $pesanan['durasi']; ?>">
                    </div>
                    <div class=" input-box">
                        <span class="details">Usia</span>
                        <input type="text" placeholder="usia" name="usia" required value="<?php echo $pesanan['usia']; ?>">
                    </div>
                </div>
                <div class=" gender-details">
                    <input type="radio" name="transportasi" id="dot-1" value="1" <?php if ($pesanan['id_transportasi'] == '1') echo 'checked' ?>>
                    <input type="radio" name="transportasi" id="dot-2" value="2" <?php if ($pesanan['id_transportasi'] == '2') echo 'checked' ?>>
                    <input type="radio" name="transportasi" id="dot-3" value="3" <?php if ($pesanan['id_transportasi'] == '3') echo 'checked' ?>>
                    <input type="radio" name="transportasi" id="dot-4" value="4" <?php if ($pesanan['id_transportasi'] == '4') echo 'checked' ?>>
                    <input type="radio" name="transportasi" id="dot-5" value="5" <?php if ($pesanan['id_transportasi'] == '5') echo 'checked' ?>>
                    <span class="gender-title">Transportasi</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Mobil</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Bus</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Kereta Api</span>
                        </label>
                        <label for="dot-4">
                            <span class="dot four"></span>
                            <span class="gender">Pesawat</span>
                        </label>
                        <label for="dot-5">
                            <span class="dot five"></span>
                            <span class="gender">Tidak memesan</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Perbarui" name="edit">
                </div>
            </form>
        </div>
    </div>

</body>

</html>


<?php

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['edit'])) {

    // ambil data dari formulir

    $jumlah_pemesan = filter_input(INPUT_POST, 'jumlah_pemesan',  FILTER_SANITIZE_NUMBER_INT);
    $id_paket = filter_input(INPUT_POST, 'paket',  FILTER_SANITIZE_NUMBER_INT);
    $nomor_hp = filter_input(INPUT_POST, 'nomor_hp',  FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $durasi = filter_input(INPUT_POST, 'durasi',  FILTER_SANITIZE_NUMBER_INT);
    $usia = filter_input(INPUT_POST, 'usia',  FILTER_SANITIZE_NUMBER_INT);
    $id_transportasi = $_POST['transportasi'];



    // buat query
    $query = pg_query("UPDATE pesanan SET id_paket = $id_paket, id_transportasi = $id_transportasi, jumlah_orang = $jumlah_pemesan, durasi = $durasi, nomor_hp = '$nomor_hp', usia = $usia, alamat = '$alamat' WHERE id = $id;");

    // apakah query simpan berhasil?
    if ($query == TRUE) {
        header('Location: daftarpesananadmin.php?status=sukses');
    } else {
        header('Location: daftarpesananadmin.php?status=gagal');
    }
} ?>