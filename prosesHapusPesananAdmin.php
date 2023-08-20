<?php
include("config.php");
include("auth.php");

$id = $_GET['id'];
$id_pengguna = $_SESSION["user"]["id"];

$query = pg_query("DELETE FROM pesanan WHERE id=$id;");

if ($query) {
    header('Location: daftarpesananadmin.php?status=suksesHapus');
} else {
    header('Location: daftarpesananadmin.php?status=gagalHapus');
}
