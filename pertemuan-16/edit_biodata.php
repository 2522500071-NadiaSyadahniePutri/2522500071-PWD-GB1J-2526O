<?php
require_once 'koneksi.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM uas_pwd WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
  echo "Data tidak ditemukan";
  exit;
}
?>

<h2>Edit Biodata Anggota</h2>

<form action="proses_update.php" method="POST">
  <input type="hidden" name="id" value="<?= $data['id']; ?>">

  <label>
    Nomor Anggota:
    <input type="text" value="<?= htmlspecialchars($data['no_anggota']); ?>" readonly>
  </label><br><br>

  <label>
    Nama:
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
  </label><br><br>

  <label>
    Jabatan:
    <input type="text" name="jabatan" value="<?= htmlspecialchars($data['jabatan']); ?>" required>
  </label><br><br>

  <button type="submit">Update</button>
  <a href="index.php">Batal</a>
</form>
