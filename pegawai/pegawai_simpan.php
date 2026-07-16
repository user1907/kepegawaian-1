<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';

$nip = $_POST['nip'];
$namalengkap = $_POST['namalengkap'];
$jeniskelamin = $_POST['jeniskelamin'];
$tanggallahir = $_POST['tanggallahir'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];

$stmt = mysqli_prepare($koneksi, "INSERT INTO pegawai (nip, namalengkap, jeniskelamin, tanggallahir, alamat, nohp, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sssssss", $nip, $namalengkap, $jeniskelamin, $tanggallahir, $alamat, $nohp, $email);
if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Gagal simpan'); window.history.back();</script>";
    exit;
}
mysqli_stmt_close($stmt);
header('Location: pegawai_list.php');
exit;
