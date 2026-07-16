<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';

$idjp = $_GET['idjp'];
$stmt = mysqli_prepare($koneksi, "SELECT * FROM jabatanpegawai WHERE idjp=?");
mysqli_stmt_bind_param($stmt, "i", $idjp);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$row) {
    echo "<script>alert('Data tidak ditemukan'); window.location='jabatanpegawai_list.php';</script>";
    exit;
}

$pegawai_list = mysqli_query($koneksi, "SELECT nip, namalengkap FROM pegawai ORDER BY namalengkap");
$jabatan_list = mysqli_query($koneksi, "SELECT kodejabatan, namajabatan FROM jabatan ORDER BY namajabatan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Penugasan</title>
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
        input, select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
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
        <h1>Edit Penugasan</h1>
        <form action="jabatanpegawai_update.php" method="post">
            <input type="hidden" name="idjp" value="<?= htmlspecialchars($row['idjp']) ?>">
            <label>NIP</label>
            <select name="nip" required>
                <?php while ($p = mysqli_fetch_assoc($pegawai_list)): ?>
                    <option value="<?= htmlspecialchars($p['nip']) ?>" <?= $p['nip'] == $row['nip'] ? 'selected' : '' ?>><?= htmlspecialchars($p['nip']) ?> - <?= htmlspecialchars($p['namalengkap']) ?></option>
                <?php endwhile; ?>
            </select>
            <label>Kode Jabatan</label>
            <select name="kodejabatan" required>
                <?php while ($j = mysqli_fetch_assoc($jabatan_list)): ?>
                    <option value="<?= htmlspecialchars($j['kodejabatan']) ?>" <?= $j['kodejabatan'] == $row['kodejabatan'] ? 'selected' : '' ?>><?= htmlspecialchars($j['kodejabatan']) ?> - <?= htmlspecialchars($j['namajabatan']) ?></option>
                <?php endwhile; ?>
            </select>
            <label>Status</label>
            <select name="status" required>
                <option value="Aktif" <?= $row['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="Nonaktif" <?= $row['status'] == 'Nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
            </select>
            <label>Periode</label>
            <input type="text" name="periode" value="<?= htmlspecialchars($row['periode']) ?>">
            <button type="submit">Update</button>
            <a href="jabatanpegawai_list.php" class="btn-back">Kembali</a>
        </form>
    </div>
</body>
</html>
