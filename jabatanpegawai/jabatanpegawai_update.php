<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';

$idjp = $_POST['idjp'];
$nip = $_POST['nip'];
$kodejabatan = $_POST['kodejabatan'];
$status = $_POST['status'];
$periode = $_POST['periode'];

$stmt = mysqli_prepare($koneksi, "UPDATE jabatanpegawai SET nip=?, kodejabatan=?, status=?, periode=? WHERE idjp=?");
mysqli_stmt_bind_param($stmt, "ssssi", $nip, $kodejabatan, $status, $periode, $idjp);
if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Gagal update'); window.history.back();</script>";
    exit;
}
mysqli_stmt_close($stmt);
header('Location: jabatanpegawai_list.php');
exit;
