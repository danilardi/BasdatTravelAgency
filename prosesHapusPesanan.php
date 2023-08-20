<?php
include("config.php");
include("auth.php");

$id = $_GET['id'];
$id_pengguna = $_SESSION["user"]["id"];

$query = pg_query("DELETE FROM pesanan WHERE id=$id AND id_pengguna = $id_pengguna;");

if ($query) {
    header('Location: daftarpesanan.php?status=suksesHapus');
} else {
    header('Location: daftarpesanan.php?status=gagalHapus');
}
