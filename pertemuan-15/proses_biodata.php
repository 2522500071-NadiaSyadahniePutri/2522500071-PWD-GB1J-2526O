<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php#biodata");
    exit;
}

$nim  = trim($_POST['nim']);
$nama = trim($_POST['nama']);
$jk   = trim($_POST['jenis_kelamin']);
$alamat = trim($_POST['alamat']);

if ($nim === "" || $nama === "") {
    header("Location: index.php#biodata?status=gagal");
    exit;
}

$sql = "INSERT INTO biodata_mahasiswa
        (nim, nama, jenis_kelamin, alamat)
        VALUES (?,?,?,?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $nim, $nama, $jk, $alamat);

if (mysqli_stmt_execute($stmt)) {
    header("Location: read.php?status=sukses");
} else {
    header("Location: read.php?status=gagal");
}

mysqli_stmt_close($stmt);