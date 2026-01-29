<?php
session_start();
require_once 'koneksi.php';
require_once 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $noang    = bersihkan($_POST['txtNoAng'] ?? '');
    $nama     = bersihkan($_POST['txtNmAng'] ?? '');
    $jabatan  = bersihkan($_POST['txtJabAng'] ?? '');
    $tgljadi  = bersihkan($_POST['txtTglJadi'] ?? '');
    $skill    = bersihkan($_POST['txtSkill'] ?? '');
    $gaji     = bersihkan($_POST['txtGaji'] ?? '');
    $nowa     = bersihkan($_POST['txtNoWA'] ?? '');
    $batalion = bersihkan($_POST['txBatalion'] ?? '');
    $bb       = bersihkan($_POST['txtBB'] ?? '');
    $tb       = bersihkan($_POST['txtTB'] ?? '');

    if (
        !tidakKosong($noang) ||
        !tidakKosong($nama) ||
        !tidakKosong($jabatan) ||
        !tidakKosong($tgljadi) ||
        !tidakKosong($skill) ||
        !tidakKosong($gaji) ||
        !tidakKosong($nowa) ||
        !tidakKosong($batalion) ||
        !tidakKosong($bb) ||
        !tidakKosong($tb)
    ) {
        $_SESSION['flash_error'] = 'Semua data wajib diisi';
        redirect_ke('index.php#anggota');
    }

    mysqli_query(
        $koneksi,
        "INSERT INTO uas_pwd
        (no_anggota, nama_anggota, jabatan, tanggal_jadi, skill, gaji, no_wa, batalion, berat_badan, tinggi_badan)
        VALUES
        ('$noang','$nama','$jabatan','$tgljadi','$skill','$gaji','$nowa','$batalion','$bb','$tb')"
    );

    // PRG
    $_SESSION['flash_sukses'] = 'Data anggota berhasil disimpan';
    redirect_ke('index.php#anggota');
}
