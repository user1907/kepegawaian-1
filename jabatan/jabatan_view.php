<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';

$kodejabatan = $_GET['kodejabatan'];
$stmt = mysqli_prepare($koneksi, "SELECT * FROM jabatan WHERE kodejabatan=?");
mysqli_stmt_bind_param($stmt, "s", $kodejabatan);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$row) {
    echo "<script>alert('Data tidak ditemukan'); window.location='jabatan_list.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Jabatan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .navbar { background: #343a40; padding: 12px 20px; color: #fff; }
        .navbar a { color: #fff; text-decoration: none; margin-right: 20px; font-size: 14px; }
        .navbar a:hover { text-decoration: underline; }
        .navbar .welcome { float: right; font-size: 14px; }
        .navbar .credit { float: right; font-size: 12px; color: #999; margin-right: 20px; line-height: 20px; margin-top: 2px; }
        .navbar .welcome a { margin-left: 10px; }
        .container { max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-top: 0; }
        table { width: 100%; }
        td { padding: 8px 10px; font-size: 14px; }
        td:first-child { font-weight: 600; color: #555; width: 140px; }
        .btn { display: inline-block; padding: 8px 16px; background: #6c757d; color: #fff; text-decoration: none; border-radius: 4px; font-size: 14px; margin-top: 15px; }
        .btn:hover { background: #5a6268; }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="../index.php">Home</a>
        <a href="../pegawai/pegawai_list.php">Pegawai</a>
        <a href="../jabatan/jabatan_list.php">Jabatan</a>
        <a href="../jabatanpegawai/jabatanpegawai_list.php">Penugasan</a>
        <span class="credit">Created by Muhamad Hazmi Alfarizqi</span>
        <span class="welcome">Hai, <?= htmlspecialchars($_SESSION['username']) ?> <a href="../session/logout.php" style="color:#f00;">Logout</a></span>
    </div>
    <div class="container">
        <h1>Detail Jabatan</h1>
        <table>
            <tr><td>Kode</td><td><?= htmlspecialchars($row['kodejabatan']) ?></td></tr>
            <tr><td>Nama Jabatan</td><td><?= htmlspecialchars($row['namajabatan']) ?></td></tr>
            <tr><td>Level</td><td><?= $row['level'] ?></td></tr>
            <tr><td>Gaji</td><td>Rp <?= number_format($row['gaji'], 0, ',', '.') ?></td></tr>
        </table>
        <a href="jabatan_list.php" class="btn">Kembali</a>
    </div>
</body>
</html>
