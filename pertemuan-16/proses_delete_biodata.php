<?php
session_start();
require_once 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM uas_pwd WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['flash_sukses'] = "Data berhasil dihapus";
} else {
    $_SESSION['flash_error'] = "Gagal menghapus data";
}

header("Location: index.php");
exit;
