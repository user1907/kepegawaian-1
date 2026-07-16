<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';

$kodejabatan = $_POST['kodejabatan'];
$namajabatan = $_POST['namajabatan'];
$level = $_POST['level'];
$gaji = $_POST['gaji'];

$stmt = mysqli_prepare($koneksi, "INSERT INTO jabatan (kodejabatan, namajabatan, level, gaji) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssid", $kodejabatan, $namajabatan, $level, $gaji);
if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Gagal simpan'); window.history.back();</script>";
    exit;
}
mysqli_stmt_close($stmt);
header('Location: jabatan_list.php');
exit;
