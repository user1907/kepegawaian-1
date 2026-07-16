# Sistem Data Pegawai

Aplikasi CRUD Sistem Data Pegawai berbasis PHP native tanpa framework.

**Live:** https://pegawai-one.kensetsu.my.id

## Fitur

1. **Modul Pegawai (CRUD)** — Daftar, tambah, edit, hapus, detail
2. **Modul Jabatan (CRUD)** — Daftar, tambah, edit, hapus, detail
3. **Modul Penugasan Jabatan (CRUD)** — Daftar dengan JOIN, dropdown select, status ENUM (Aktif/Nonaktif)
4. **Autentikasi** — Login, Register, Logout, session-based access control

## Environment Variables

| Variable | Keterangan | Default |
|----------|-----------|---------|
| `DB_HOST` | Host database | `127.0.0.1` |
| `DB_PORT` | Port database | `3306` |
| `DB_USER` | Username database | `root` |
| `DB_PASS` | Password database | (kosong) |
| `DB_NAME` | Nama database | `pegawai_basic` |
| `DB_SSL` | Aktifkan SSL | `false` |

---

## Tutorial Setup

### Cara 1: Docker

**Prasyarat:** Docker terinstall

```bash
# 1. Clone repository
git clone https://github.com/user1907/kepegawaian-1.git
cd kepegawaian-1

# 2. Buat file .env
cp .env.example .env
# Edit .env sesuai konfigurasi database kamu

# 3. Build image
docker build -t pegawai-basic .

# 4. Jalankan
docker run -p 8080:80 --env-file .env pegawai-basic

# 5. Buka browser
# http://localhost:8080
```

### Cara 2: Manual (XAMPP / htdocs)

**Prasyarat:** XAMPP dengan Apache + MySQL aktif

```bash
# 1. Clone repository ke htdocs
git clone https://github.com/user1907/kepegawaian-1.git C:/xampp/htdocs/kepegawaian-1
# Atau copy folder project ke C:\xampp\htdocs\kepegawaian-1

# 2. Buat file .env
cp .env.example .env
```

Edit `.env`:
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USER=root
DB_PASS=
DB_NAME=pegawai_basic
DB_SSL=false
```

```bash
# 3. Buka phpMyAdmin (http://localhost/phpmyadmin)
#    Buat database 'pegawai_basic', lalu import schema.sql dan seed.sql
#    Atau via command line:

mysql -u root pegawai_basic < schema.sql
mysql -u root pegawai_basic < seed.sql

# 4. Buka browser
# http://localhost/kepegawaian-1
```

### Menggunakan Database Eksternal (Aiven)

Jika menggunakan database cloud seperti Aiven, set `DB_SSL=true` dan isi credential di `.env`:

```
DB_HOST=mysql-xxx.a.aivencloud.com
DB_PORT=17644
DB_USER=avnadmin
DB_PASS=password-kamu
DB_NAME=pegawai_basic
DB_SSL=true
```

Import schema dan seed:
```bash
mysql -h <host> -P <port> -u <user> -p pegawai_basic < schema.sql
mysql -h <host> -P <port> -u <user> -p pegawai_basic < seed.sql
```

---

## Struktur Database

| Tabel | Keterangan |
|-------|-----------|
| `users` | Data pengguna (login) |
| `pegawai` | Data pegawai |
| `jabatan` | Data jabatan |
| `jabatanpegawai` | Relasi pegawai ↔ jabatan |

## Source Code

- **GitHub:** https://github.com/user1907/kepegawaian-1
- **Container Image:** `ghcr.io/user1907/kepegawaian-1:latest`
