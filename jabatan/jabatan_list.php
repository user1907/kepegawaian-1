<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Jabatan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .navbar { background: #343a40; padding: 12px 20px; color: #fff; }
        .navbar a { color: #fff; text-decoration: none; margin-right: 20px; font-size: 14px; }
        .navbar a:hover { text-decoration: underline; }
        .navbar .welcome { float: right; font-size: 14px; }
        .navbar .credit { float: right; font-size: 12px; color: #999; margin-right: 20px; line-height: 20px; margin-top: 2px; }
        .navbar .welcome a { margin-left: 10px; }
        .container { max-width: 1000px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow-x: auto; }
        h1 { color: #333; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px 8px; text-align: left; border-bottom: 1px solid #ddd; font-size: 14px; }
        th { background: #f8f9fa; font-weight: 600; }
        tr:hover { background: #f1f1f1; }
        .btn { display: inline-block; padding: 6px 12px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px; font-size: 13px; white-space: nowrap; }
        .btn:hover { background: #0069d9; }
        .btn-green { background: #28a745; }
        .btn-green:hover { background: #218838; }
        .btn-red { background: #dc3545; }
        .btn-red:hover { background: #c82333; }
        .btn-yellow { background: #ffc107; color: #333; }
        .btn-yellow:hover { background: #e0a800; }
        td.aksi { white-space: nowrap; }
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
        <h1>Data Jabatan</h1>
        <a href="jabatan_tambah.php" class="btn btn-green">+ Tambah Jabatan</a>
        <table>
            <tr>
                <th>Kode</th>
                <th>Nama Jabatan</th>
                <th>Level</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
            <?php
            $result = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY namajabatan");
            while ($row = mysqli_fetch_assoc($result)) {
                $nama = htmlspecialchars($row['namajabatan']);
                echo "<tr>
                    <td>" . htmlspecialchars($row['kodejabatan']) . "</td>
                    <td>{$nama}</td>
                    <td>" . htmlspecialchars($row['level']) . "</td>
                    <td>Rp " . number_format($row['gaji'], 0, ',', '.') . "</td>
                    <td class='aksi'>
                        <a href='jabatan_view.php?kodejabatan=" . htmlspecialchars($row['kodejabatan']) . "' class='btn'>View</a>
                        <a href='jabatan_edit.php?kodejabatan=" . htmlspecialchars($row['kodejabatan']) . "' class='btn btn-yellow'>Edit</a>
                        <a href='jabatan_hapus.php?kodejabatan=" . htmlspecialchars($row['kodejabatan']) . "' class='btn btn-red' onclick=\"return confirm('Yakin hapus jabatan {$nama}?')\">Hapus</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
