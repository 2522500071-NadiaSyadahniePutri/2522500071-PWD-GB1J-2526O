<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

if (isset($_POST['kirim'])) {

    $nim   = bersihkan($_POST['nim'] ?? '');
    $nama  = bersihkan($_POST['nama'] ?? '');
    $alamat = bersihkan($_POST['alamat'] ?? '');
    $jk    = bersihkan($_POST['jenis_kelamin'] ?? '');

    // validasi
    if (
        !tidakKosong($nim) ||
        !tidakKosong($nama) ||
        !tidakKosong($alamat) ||
        !tidakKosong($jk)
    ) {
        redirect_ke('index.php?status=gagal');
    }

    // insert
    $sql = "INSERT INTO anggota (nim, nama, alamat, jenis_kelamin)
            VALUES ('$nim', '$nama', '$alamat', '$jk')";

    if (mysqli_query($koneksi, $sql)) {
        redirect_ke('read_mahasiswa.php?status=sukses');
    } else {
        redirect_ke('index.php?status=gagal');
    }
}
