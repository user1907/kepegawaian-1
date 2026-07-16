<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
require_once '../config/koneksi.php';
$pegawai_list = mysqli_query($koneksi, "SELECT nip, namalengkap FROM pegawai ORDER BY namalengkap");
$jabatan_list = mysqli_query($koneksi, "SELECT kodejabatan, namajabatan FROM jabatan ORDER BY namajabatan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penugasan</title>
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
        button { padding: 10px 20px; background: #28a745; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; margin-top: 15px; }
        button:hover { background: #218838; }
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
        <h1>Tambah Penugasan</h1>
        <form action="jabatanpegawai_simpan.php" method="post">
            <label>NIP</label>
            <select name="nip" required>
                <option value="">-- Pilih Pegawai --</option>
                <?php while ($p = mysqli_fetch_assoc($pegawai_list)): ?>
                    <option value="<?= htmlspecialchars($p['nip']) ?>"><?= htmlspecialchars($p['nip']) ?> - <?= htmlspecialchars($p['namalengkap']) ?></option>
                <?php endwhile; ?>
            </select>
            <label>Kode Jabatan</label>
            <select name="kodejabatan" required>
                <option value="">-- Pilih Jabatan --</option>
                <?php while ($j = mysqli_fetch_assoc($jabatan_list)): ?>
                    <option value="<?= htmlspecialchars($j['kodejabatan']) ?>"><?= htmlspecialchars($j['kodejabatan']) ?> - <?= htmlspecialchars($j['namajabatan']) ?></option>
                <?php endwhile; ?>
            </select>
            <label>Status</label>
            <select name="status" required>
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>
            <label>Periode</label>
            <input type="text" name="periode" placeholder="Contoh: 2024-2025">
            <button type="submit">Simpan</button>
            <a href="jabatanpegawai_list.php" class="btn-back">Kembali</a>
        </form>
    </div>
</body>
</html>
