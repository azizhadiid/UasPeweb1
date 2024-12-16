<?php

include 'config.php';

$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$core = $_POST['core'];
$threads = $_POST['threads'];

//query
$query_simpan = "INSERT INTO processor (merk, tipe, core, threads) 
				values ('$merk','$tipe', '$core', '$threads')";
$simpan = mysqli_query($db, $query_simpan);

//cek
if ($simpan) {
    header("Location: form-tambah.php?status=sukses");
    exit();
} else {
    header("Location: form-tambah.php?status=gagal");
}
