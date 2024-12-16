<?php

$server = "localhost";
$user = "root";
$password = "";
$dbname = "uas";

$db = mysqli_connect($server, $user, $password, $dbname);

if (!$db) {
    # code...
    die("Gagal Terhubung: " . mysqli_connect_errno());
}
