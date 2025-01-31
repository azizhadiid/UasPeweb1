<?php require_once 'config.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Elektronik</title>
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

    <div class="container mt-5">
        <!-- Start Button -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
        <!-- End Button -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="proses-tambah.php" method="post">
                            <div class="mb-3">
                                <label for="merk" class="form-label">Merk</label>
                                <input type="text" class="form-control" id="merk" name="merk">
                            </div>
                            <div class="mb-3">
                                <label for="tipe" class="form-label">Tipe</label>
                                <input type="text" class="form-control" id="tipe" name="tipe">
                            </div>
                            <div class="mb-3">
                                <label for="core" class="form-label">core</label>
                                <input type="text" class="form-control" id="core" name="core">
                            </div>
                            <div class="mb-3">
                                <label for="threads" class="form-label">threads</label>
                                <input type="text" class="form-control" id="threads" name="threads">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Start Contianer -->
        <table class="table caption-top">
            <hr>
            <thead>
                <tr>
                    <th scope="col">Merk</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Core</th>
                    <th scope="col">Threads</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM processor";
                $query = mysqli_query($db, $sql);

                while ($elektronik = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $elektronik['merk']; ?></td>
                        <td><?= $elektronik['tipe']; ?></td>
                        <td><?= $elektronik['core']; ?></td>
                        <td><?= $elektronik['threads']; ?></td>
                        <td><a type="button" class="btn btn-success" href="form-edit.php?id=<?= $elektronik['id']; ?>">Edit</a></td>
                        <td><a type="button" class="btn btn-danger btn-hapus" data-id="<?= $elektronik['id']; ?>">Hapus</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- End Container -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Swicth Alert -->
    <script>
        // Periksa status dari parameter URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'sukses') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data berhasil ditambahkan.',
                confirmButtonText: 'OK'
            });
        } else if (status === 'gagal') {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat menambahkan data.',
                confirmButtonText: 'OK'
            });
        }

        // Pilih semua tombol dengan class "btn-hapus"
        const deleteButtons = document.querySelectorAll('.btn-hapus');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const id = this.getAttribute('data-id'); // Ambil ID data
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke halaman hapus.php dengan ID
                        window.location.href = `hapus.php?id=${id}`;
                    }
                });
            });
        });
    </script>
</body>

</html>