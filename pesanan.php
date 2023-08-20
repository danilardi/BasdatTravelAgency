<?php include("config.php"); ?>
<?php require_once("auth.php"); ?>

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
                        <input type="text" placeholder="Jumlah Pemesan" required name="jumlah_pemesan">
                    </div>
                    <div class="input-box">
                        <span class="details">Alamat</span>
                        <input type="text" placeholder="Alamat" name="alamat" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Paket</span>
                        <input type="text" placeholder="Paket(1/2/3)" name="paket" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" name="nomor_hp" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Durasi (hari)</span>
                        <input type="text" placeholder="Hari" name="durasi" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Usia</span>
                        <input type="text" placeholder="usia" name="usia" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="transportasi" id="dot-1" value="1">
                    <input type="radio" name="transportasi" id="dot-2" value="2">
                    <input type="radio" name="transportasi" id="dot-3" value="3">
                    <input type="radio" name="transportasi" id="dot-4" value="4">
                    <input type="radio" name="transportasi" id="dot-5" value="5">
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
                    <input type="submit" value="Submit" name="submit">
                </div>
            </form>
        </div>
    </div>

</body>

</html>


<?php

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['submit'])) {

    // ambil data dari formulir

    $id_pengguna = $_SESSION["user"]["id"];
    $jumlah_pemesan = filter_input(INPUT_POST, 'jumlah_pemesan',  FILTER_SANITIZE_NUMBER_INT);
    $id_paket = filter_input(INPUT_POST, 'paket',  FILTER_SANITIZE_NUMBER_INT);
    $nomor_hp = filter_input(INPUT_POST, 'nomor_hp',  FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $durasi = filter_input(INPUT_POST, 'durasi',  FILTER_SANITIZE_NUMBER_INT);
    $usia = filter_input(INPUT_POST, 'usia',  FILTER_SANITIZE_NUMBER_INT);
    $id_transportasi = $_POST['transportasi'];
    $tanggal_pemesanan = date('d-m-Y');



    // buat query
    $query = pg_query("INSERT INTO pesanan (id_pengguna, id_paket, id_transportasi, jumlah_orang, durasi, nomor_hp, usia, alamat, tanggal_pemesanan) VALUES ($id_pengguna, $id_paket, $id_transportasi, $jumlah_pemesan, $durasi, '$nomor_hp', $usia, '$alamat', '$tanggal_pemesanan');");

    // apakah query simpan berhasil?
    if ($query == TRUE) {
        header('Location: visitor.php?status=sukses');
    } else {
        header('Location: pesanan.php?status=gagal');
    }
} ?>