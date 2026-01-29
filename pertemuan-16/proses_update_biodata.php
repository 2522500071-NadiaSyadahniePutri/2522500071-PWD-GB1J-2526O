<?php
session_start();
require_once 'koneksi.php';

$id      = $_POST['id'] ?? '';
$nama    = trim($_POST['nama'] ?? '');
$jabatan = trim($_POST['jabatan'] ?? '');

if ($id === '' || $nama === '' || $jabatan === '') {
  $_SESSION['flash_error'] = "Data tidak lengkap";
  header("Location: index.php");
  exit;
}

$nama    = htmlspecialchars($nama);
$jabatan = htmlspecialchars($jabatan);

$sql = "UPDATE uas_pwd SET nama=?, jabatan=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nama, $jabatan, $id);

if ($stmt->execute()) {
  $_SESSION['flash_sukses'] = "Data berhasil diupdate";
} else {
  $_SESSION['flash_error'] = "Gagal update data";
}

header("Location: index.php");
exit;
