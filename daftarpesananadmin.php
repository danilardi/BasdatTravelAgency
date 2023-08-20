<?php include("config.php"); ?>
<?php require_once("auth.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basdat Travel Agency</title>
    <link rel="stylesheet" href="css/daftarpesananstyle.css" />

</head>


<body>

    <div class="container">
        <div class="title">Daftar Pesanan</div>
        <div class="content">
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Pengguna</th>
                    <th>Paket</th>
                    <th>Transportasi</th>
                    <th>Jumlah Pemesan</th>
                    <th>Durasi</th>
                    <th>Total Harga</th>
                    <th>Nomor HP</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Tindakan</th>
                </tr>

                <?php
                $query = pg_query("SELECT * FROM pesanan JOIN paket ON pesanan.id_paket = paket.id JOIN transportasi ON pesanan.id_transportasi = transportasi.id JOIN pengguna ON pesanan.id_pengguna = pengguna.id ORDER BY pesanan.id;");
                // $query = mysqli_query($db, $sql);
                $no = 1;
                $query1 = pg_query("SELECT * FROM pesanan ORDER BY id;");

                while ($pesanan = pg_fetch_array($query) and $edit = pg_fetch_array($query1)) {
                    echo "<tr>";

                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $pesanan['nama'] . "</td>";
                    echo "<td>" . $pesanan['nama_wisata'] . "</td>";
                    echo "<td>" . $pesanan['jenis_kendaraan'] . "</td>";
                    echo "<td>" . $pesanan['jumlah_orang'] . "</td>";
                    echo "<td>" . $pesanan['durasi'] . "</td>";
                    echo "<td>Rp" . $pesanan['harga_paket'] * $pesanan['durasi'] * $pesanan['jumlah_orang'] . "</td>";
                    echo "<td>" . $edit['nomor_hp'] . "</td>";
                    echo "<td>" . $pesanan['tanggal_pemesanan'] . "</td>";
                    echo "<td>";
                    echo "<a href='prosesHapusPesananAdmin.php?id=" . $edit['id'] . "'>Hapus</a>";
                    echo "<br>";
                    echo "<a href='editpesananadmin.php?id=" . $edit['id'] . "'>Edit</a>";
                    echo "</td>";

                    echo "</tr>";
                    $no = $no + 1;
                }
                ?>
            </table>
            <a href="admin.php" id="back-btn"> Back</a>
        </div>
    </div>

</body>

</html>