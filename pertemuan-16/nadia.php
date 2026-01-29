<?php
require_once 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id DESC");
?>

<table border="1">
<tr>
    <th>NIM</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>JK</th>
    <th>Aksi</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($query)) { ?>
<tr>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['alamat']; ?></td>
    <td><?= $row['jenis_kelamin']; ?></td>
    <td>
        <a href="edit_mahasiswa.php?id=<?= $row['id']; ?>">Edit</a>
        <a href="proses_delete.php?id=<?= $row['id']; ?>"
           onclick="return confirm('Hapus data?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>
