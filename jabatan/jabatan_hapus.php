<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';

$kodejabatan = $_GET['kodejabatan'];
$stmt = mysqli_prepare($koneksi, "DELETE FROM jabatan WHERE kodejabatan=?");
mysqli_stmt_bind_param($stmt, "s", $kodejabatan);
if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Gagal hapus'); window.history.back();</script>";
    exit;
}
mysqli_stmt_close($stmt);
header('Location: jabatan_list.php');
exit;
