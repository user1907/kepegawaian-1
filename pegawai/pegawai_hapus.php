<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';

$nip = $_GET['nip'];
$stmt = mysqli_prepare($koneksi, "DELETE FROM pegawai WHERE nip=?");
mysqli_stmt_bind_param($stmt, "s", $nip);
if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Gagal hapus'); window.history.back();</script>";
    exit;
}
mysqli_stmt_close($stmt);
header('Location: pegawai_list.php');
exit;
