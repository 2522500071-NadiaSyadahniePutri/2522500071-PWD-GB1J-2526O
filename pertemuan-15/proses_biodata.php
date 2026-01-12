<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: index.php#biodata");
  exit;
}

$nim  = bersihkan($_POST['txtNim'] ?? '');
$nama = bersihkan($_POST['txtNmLengkap'] ?? '');

if ($nim === '' || $nama === '') {
  $_SESSION['flash_biodata_error'] = "NIM dan Nama Lengkap wajib diisi.";
  header("Location: index.php#biodata");
  exit;
}

$tanggal = date('Y-m-d', strtotime($_POST['txtTglLhr'] ?? ''));

$sql = "INSERT INTO uas_tryout
(NIM, Nama_Lengkap, Tempat_Lahir, Tanggal_Lahir, Hobi, Pasangan, Pekerjaan, Nama_Ortu, Nama_Kakak, Nama_Adik)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
ON DUPLICATE KEY UPDATE
Nama_Lengkap=VALUES(Nama_Lengkap),
Tempat_Lahir=VALUES(Tempat_Lahir),
Tanggal_Lahir=VALUES(Tanggal_Lahir),
Hobi=VALUES(Hobi),
Pasangan=VALUES(Pasangan),
Pekerjaan=VALUES(Pekerjaan),
Nama_Ortu=VALUES(Nama_Ortu),
Nama_Kakak=VALUES(Nama_Kakak),
Nama_Adik=VALUES(Nama_Adik)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssssssss",
  $nim,
  $nama,
  $_POST['txtT4Lhr'],
  $tanggal,
  $_POST['txtHobi'],
  $_POST['txtPasangan'],
  $_POST['txtKerja'],
  $_POST['txtNmOrtu'],
  $_POST['txtNmKakak'],
  $_POST['txtNmAdik']
);

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$_SESSION['flash_biodata'] = "Biodata berhasil disimpan / diperbarui";
header("Location: index.php#biodata");
exit;