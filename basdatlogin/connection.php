<?php
$connect = mysqli_connect("localhost", "root", "", "basdat-login");

function get($query) {
    global $connect;
    // AMBIL DATA DARI TABEL INPUT_MAHASISWA ATAU ISTILAHNYA QUERY DATA INPUT_MAHASISWA NYA
    $hasil = mysqli_query($connect, $query);
    $temp = [];
    while ($baris = mysqli_fetch_assoc($hasil)) {
        $temp[] = $baris;
    }
    return $temp;
}

function cari($keyword) {
    $query = "SELECT * FROM input_mahasiswa
                WHERE
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            prodi LIKE '%$keyword%'
            ";
    return get($query);
}

