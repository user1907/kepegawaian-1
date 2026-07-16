CREATE DATABASE IF NOT EXISTS pegawai_basic;
USE pegawai_basic;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE pegawai (
    nip VARCHAR(20) PRIMARY KEY,
    namalengkap VARCHAR(100) NOT NULL,
    jeniskelamin ENUM('L', 'P') NOT NULL,
    tanggallahir DATE NOT NULL,
    alamat TEXT,
    nohp VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE jabatan (
    kodejabatan VARCHAR(20) PRIMARY KEY,
    namajabatan VARCHAR(100) NOT NULL,
    level INT NOT NULL,
    gaji DECIMAL(15,2) NOT NULL
);

CREATE TABLE jabatanpegawai (
    idjp INT AUTO_INCREMENT PRIMARY KEY,
    nip VARCHAR(20) NOT NULL,
    kodejabatan VARCHAR(20) NOT NULL,
    status ENUM('Aktif', 'Nonaktif') NOT NULL DEFAULT 'Aktif',
    periode VARCHAR(50)
);
