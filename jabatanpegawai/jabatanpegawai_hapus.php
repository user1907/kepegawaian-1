<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';

$idjp = $_GET['idjp'];
$stmt = mysqli_prepare($koneksi, "DELETE FROM jabatanpegawai WHERE idjp=?");
mysqli_stmt_bind_param($stmt, "i", $idjp);
if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Gagal hapus'); window.history.back();</script>";
    exit;
}
mysqli_stmt_close($stmt);
header('Location: jabatanpegawai_list.php');
exit;
