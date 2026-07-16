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
    <title>Edit Jabatan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .navbar { background: #343a40; padding: 12px 20px; color: #fff; }
        .navbar a { color: #fff; text-decoration: none; margin-right: 20px; font-size: 14px; }
        .navbar a:hover { text-decoration: underline; }
        .navbar .welcome { float: right; font-size: 14px; }
        .navbar .welcome a { margin-left: 10px; }
        .container { max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-top: 0; }
        label { display: block; margin: 10px 0 5px; color: #555; font-size: 14px; }
        input { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { padding: 10px 20px; background: #ffc107; color: #333; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; margin-top: 15px; }
        button:hover { background: #e0a800; }
        .btn-back { padding: 10px 20px; background: #6c757d; color: #fff; text-decoration: none; border-radius: 4px; font-size: 14px; display: inline-block; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="../index.php">Home</a>
        <a href="../pegawai/pegawai_list.php">Pegawai</a>
        <a href="../jabatan/jabatan_list.php">Jabatan</a>
        <a href="../jabatanpegawai/jabatanpegawai_list.php">Penugasan</a>
        <span class="welcome">Hai, <?= htmlspecialchars($_SESSION['username']) ?> <a href="../session/logout.php" style="color:#f00;">Logout</a></span>
    </div>
    <div class="container">
        <h1>Edit Jabatan</h1>
        <form action="jabatan_update.php" method="post">
            <input type="hidden" name="kodejabatan" value="<?= htmlspecialchars($row['kodejabatan']) ?>">
            <label>Kode Jabatan</label>
            <input type="text" value="<?= htmlspecialchars($row['kodejabatan']) ?>" disabled>
            <label>Nama Jabatan</label>
            <input type="text" name="namajabatan" value="<?= htmlspecialchars($row['namajabatan']) ?>" required>
            <label>Level</label>
            <input type="number" name="level" value="<?= htmlspecialchars($row['level']) ?>" required>
            <label>Gaji</label>
            <input type="number" name="gaji" step="0.01" value="<?= htmlspecialchars($row['gaji']) ?>" required>
            <button type="submit">Update</button>
            <a href="jabatan_list.php" class="btn-back">Kembali</a>
        </form>
    </div>
</body>
</html>
