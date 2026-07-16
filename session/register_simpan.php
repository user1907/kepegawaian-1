<?php
session_start();
require_once '../config/koneksi.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if ($username === '' || $password === '') {
    echo "<script>alert('Username dan password wajib diisi'); window.location='register.php';</script>";
    exit;
}

$stmt = mysqli_prepare($koneksi, "SELECT * FROM users WHERE username=?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
if (mysqli_stmt_num_rows($stmt) > 0) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Username sudah terdaftar'); window.location='register.php';</script>";
    exit;
}
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($koneksi, "INSERT INTO users (username, password) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Gagal register'); window.location='register.php';</script>";
    exit;
}
mysqli_stmt_close($stmt);

$_SESSION['username'] = $username;
header('Location: ../index.php');
exit;
