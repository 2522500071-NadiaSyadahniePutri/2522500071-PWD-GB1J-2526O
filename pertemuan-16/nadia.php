<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM uas_pwd ORDER BY id DESC";
$result = $conn->query($sql);
?>

<table border="1" width="100%" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>No Anggota</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Aksi</th>
  </tr>

  <?php $no = 1; ?>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= htmlspecialchars($row['no_anggota']); ?></td>
      <td><?= htmlspecialchars($row['nama']); ?></td>
      <td><?= htmlspecialchars($row['jabatan']); ?></td>
      <td>
        <a href="edit_biodata.php?id=<?= $row['id']; ?>">Edit</a> |
        <a href="proses_delete.php?id=<?= $row['id']; ?>"
           onclick="return confirm('Yakin hapus data ini?')">
           Delete
        </a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
