<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: session/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Sistem Data Pegawai</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .navbar { background: #343a40; padding: 12px 20px; color: #fff; }
        .navbar a { color: #fff; text-decoration: none; margin-right: 20px; font-size: 14px; }
        .navbar a:hover { text-decoration: underline; }
        .navbar .welcome { float: right; font-size: 14px; }
        .navbar .credit { float: right; font-size: 12px; color: #999; margin-right: 20px; line-height: 20px; margin-top: 2px; }
        .navbar .welcome a { margin-left: 10px; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-top: 0; }
        .menu { display: flex; gap: 20px; margin-top: 30px; }
        .menu a { display: block; padding: 20px; background: #007bff; color: #fff; text-decoration: none; border-radius: 6px; text-align: center; flex: 1; font-size: 16px; }
        .menu a:hover { background: #0069d9; }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="pegawai/pegawai_list.php">Pegawai</a>
        <a href="jabatan/jabatan_list.php">Jabatan</a>
        <a href="jabatanpegawai/jabatanpegawai_list.php">Penugasan</a>
        <span class="credit">Created by Muhamad Hazmi Alfarizqi</span>
        <span class="welcome">Hai, <?= htmlspecialchars($_SESSION['username']) ?> <a href="session/logout.php" style="color:#f00;">Logout</a></span>
    </div>
    <div class="container">
        <h1>Dashboard Sistem Data Pegawai</h1>
        <p>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>. Pilih modul:</p>
        <div class="menu">
            <a href="pegawai/pegawai_list.php">Data Pegawai</a>
            <a href="jabatan/jabatan_list.php">Data Jabatan</a>
            <a href="jabatanpegawai/jabatanpegawai_list.php">Penugasan Jabatan</a>
        </div>
    </div>
</body>
</html>
