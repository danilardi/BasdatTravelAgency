<?php
$db = pg_connect('host=localhost dbname=project user=postgres password=danil');
if (!$db) {
    die("Gagal terhubung dengan database: " . pg_connect_error());
}
