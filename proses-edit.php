<?php

require_once 'config.php';

// Ambil data dari tiap elemen dalam form
$id = $_POST["id"];
$merk = htmlspecialchars($_POST["merk"]);
$tipe = htmlspecialchars($_POST["tipe"]);
$core = htmlspecialchars($_POST["core"]);
$threads = htmlspecialchars($_POST["threads"]);

// query insert data
$query = "UPDATE processor SET merk = '$merk', tipe = '$tipe', core = '$core', threads = '$threads' WHERE id = $id";
mysqli_query($db, $query);

if (isset($_POST["submit"]) < 1) {
    header("Location: form-edit.php?id=$id&status=berhasil");
    exit();
} else {
    header("Location: form-edit.php?id=$id&status=tidak berhasil");
}
