<?php
session_start();
if (!isset($_SESSION["login"])) { // artinya kalau ga ada ini berarti usernya belom login dan ga boleh masuk ke halaman ini
    header("Location: login.php");
    exit;
}

// MENGHUBUNGKAN HALAMAN INDEX DENGAN HALAMAN FUNCTIONS
require_once "connection.php";
$mahasiswa = get("SELECT * FROM input_mahasiswa");

// JIKA TOMBOL CARI SUDAH DITEKAN
if (isset($_POST["cari"])) {
    // KITA AKAN MENCARI MAHASISWA BERDASARKAN KEYWORD YANG DIMASUKKAN  
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table Review</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="m-2">

    <h4><a href="./logout.php" class="text-info text-gradient fw-bold">Logout</a></h4>

    <h1 class="text-center m-2">Daftar Mahasiswa</h1>

    <nav class="navbar bg-light">
        <div class="container-fluid">
            <form action="" class="d-flex" role="search" method="post">
                <input class="form-control me-2" type="search" aria-label="Search" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
                <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
            </form>
        </div>
    </nav>

    <table class="table table-success table-striped table-hover table-bordered">
        <thead>
            <tr class="table-primary text-center">
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Email</th>
                <th scope="col">Program Studi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $mhs) : ?>
                <tr class="text-center">
                    <td><?= $i; ?></td>
                    <td><?= $mhs['nama']; ?></td>
                    <td><?= $mhs['nim']; ?></td>
                    <td><?= $mhs['email']; ?></td>
                    <td><?= $mhs['prodi']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <h3 class="tambah">Ingin menambah data mahasiswa???</h3>
    <a href="javascript: doSomething()" class="tambah">Tambah Data Mahasiswa</a> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>