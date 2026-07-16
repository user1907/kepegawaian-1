<?php
require_once __DIR__ . '/env.php';

$host = $_ENV['DB_HOST'] ?? '127.0.0.1';
$port = $_ENV['DB_PORT'] ?? '3306';
$user = $_ENV['DB_USER'] ?? 'root';
$pass = $_ENV['DB_PASS'] ?? '';
$db   = $_ENV['DB_NAME'] ?? 'pegawai_basic';
$ssl  = ($_ENV['DB_SSL'] ?? 'false') === 'true';

$koneksi = mysqli_init();

if ($ssl) {
    mysqli_ssl_set($koneksi, NULL, NULL, NULL, NULL, NULL);
    $connFlags = MYSQLI_CLIENT_SSL | MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT;
} else {
    $connFlags = 0;
}

if (!mysqli_real_connect($koneksi, $host, $user, $pass, $db, (int)$port, NULL, $connFlags)) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}
?>