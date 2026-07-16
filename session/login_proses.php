<?php
session_start();
require_once '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = mysqli_prepare($koneksi, "SELECT * FROM users WHERE username=? AND password=?");
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if ($data) {
    $_SESSION['username'] = $data['username'];
    header('Location: ../index.php');
    exit;
} else {
    echo "<script>alert('Username atau password salah'); window.location='login.php';</script>";
}
