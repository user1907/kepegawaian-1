<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';

$nip = $_POST['nip'];
$kodejabatan = $_POST['kodejabatan'];
$status = $_POST['status'];
$periode = $_POST['periode'];

$stmt = mysqli_prepare($koneksi, "INSERT INTO jabatanpegawai (nip, kodejabatan, status, periode) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssss", $nip, $kodejabatan, $status, $periode);
if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Gagal simpan'); window.history.back();</script>";
    exit;
}
mysqli_stmt_close($stmt);
header('Location: jabatanpegawai_list.php');
exit;
