<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#biodata">Biodata</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>

    <!-- HOME -->
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <!-- FORM BIODATA (CRUD) -->
    <section id="biodata">
      <h2>Biodata Mahasiswa</h2>

      <form action="proses_biodata.php" method="POST">

        <label>
          <span>NIM:</span>
          <input type="text" name="nim" required>
        </label>

        <label>
          <span>Nama:</span>
          <input type="text" name="nama" required>
        </label>

        <label>
          <span>Jenis Kelamin:</span>
          <select name="jenis_kelamin" required>
            <option value="">-- Pilih --</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </label>

        <label>
          <span>Alamat:</span>
          <textarea name="alamat" required></textarea>
        </label>

        <button type="submit">Simpan</button>
        <a href="read.php">Lihat Data</a>

      </form>
    </section>

    <?php
    $flash_sukses = $_SESSION['flash_sukses'] ?? '';
    $flash_error  = $_SESSION['flash_error'] ?? '';
    $old          = $_SESSION['old'] ?? [];

    unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']);
    ?>

    <!-- CONTACT -->
    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses.php" method="POST">

        <label>
          <span>Nama:</span>
          <input type="text" name="txtNama" required
            value="<?= $old['nama'] ?? '' ?>">
        </label>

        <label>
          <span>Email:</span>
          <input type="email" name="txtEmail" required
            value="<?= $old['email'] ?? '' ?>">
        </label>

        <label>
          <span>Pesan:</span>
          <textarea name="txtPesan" required><?= $old['pesan'] ?? '' ?></textarea>
        </label>

        <label>
          <span>Captcha 2 + 3 = ?</span>
          <input type="number" name="txtCaptcha" required
            value="<?= $old['captcha'] ?? '' ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>

      </form>

      <br>
      <hr>
      <h2>Yang Menghubungi Kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>

  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>