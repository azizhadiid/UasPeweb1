<?php

require_once 'config.php';


// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    # code...
    header('Location; list-mahasiswa.php');
}

// ambil id dari query string
$id = $_GET['id'];

// baut query untuk ambil data dari database
$sql = "SELECT * FROM processor WHERE id=$id";
$query = mysqli_query($db, $sql);
$elektronik = mysqli_fetch_array($query);


// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    # code...
    echo ("data gak ada...");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="font-family: 'Poppins', sans-serif;">
    <!-- Start Nav -->
    <?php
    require_once 'navbar.php';
    ?>
    <!-- End Nav -->

    <!-- Kembali ke halaman sebelumnya -->
    <div class="container mt-5">
        <a href="form-tambah.php" class="btn btn-primary">Kembali</a>
    </div>
    <!-- end -->

    <div class="container mt-3">
        <form action="proses-edit.php" method="post">
            <div class="mb-3">
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $elektronik['id']; ?>">
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" value="<?= $elektronik['merk']; ?>">
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <input type="text" class="form-control" id="tipe" name="tipe" value="<?= $elektronik['tipe']; ?>">
            </div>
            <div class="mb-3">
                <label for="core" class="form-label">Core</label>
                <input type="text" class="form-control" id="core" name="core" value="<?= $elektronik['core']; ?>">
            </div>
            <div class="mb-3">
                <label for="threads" class="form-label">Threads</label>
                <input type="text" class="form-control" id="threads" name="threads" value="<?= $elektronik['threads']; ?>">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Switch Alert -->
    <script>
        // Periksa status dari parameter URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'berhasil') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data berhasil diedit.',
                confirmButtonText: 'OK'
            });
        } else if (status === 'tidak berhasil') {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat mengedit data.',
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>

</html>