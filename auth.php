<?php
session_start();
if (!isset($_SESSION["user"])) {
    session_unset();
    header("Location: login.php");
} 

/* <?php require_once("auth.php"); ?>  */