<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../session/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pegawai</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .navbar { background: #343a40; padding: 12px 20px; color: #fff; }
        .navbar a { color: #fff; text-decoration: none; margin-right: 20px; font-size: 14px; }
        .navbar a:hover { text-decoration: underline; }
        .navbar .welcome { float: right; font-size: 14px; }
        .navbar .welcome a { margin-left: 10px; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-top: 0; }
        label { display: block; margin: 10px 0 5px; color: #555; font-size: 14px; }
        input, select, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 80px; resize: vertical; }
        .radio-group { margin: 5px 0; }
        .radio-group label { display: inline; margin-right: 15px; font-weight: normal; }
        .radio-group input { width: auto; }
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
        <h1>Tambah Pegawai</h1>
        <form action="pegawai_simpan.php" method="post">
            <label>NIP</label>
            <input type="text" name="nip" required>
            <label>Nama Lengkap</label>
            <input type="text" name="namalengkap" required>
            <label>Jenis Kelamin</label>
            <div class="radio-group">
                <label><input type="radio" name="jeniskelamin" value="L" required> Laki-laki</label>
                <label><input type="radio" name="jeniskelamin" value="P" required> Perempuan</label>
            </div>
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggallahir" required>
            <label>Alamat</label>
            <textarea name="alamat"></textarea>
            <label>No HP</label>
            <input type="text" name="nohp">
            <label>Email</label>
            <input type="email" name="email">
            <button type="submit">Simpan</button>
            <a href="pegawai_list.php" class="btn-back">Kembali</a>
        </form>
    </div>
</body>
</html>
