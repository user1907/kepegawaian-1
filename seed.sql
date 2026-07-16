USE pegawai_basic;

-- Users
INSERT INTO users (username, password) VALUES
('admin', 'admin123'),
('manager', 'manager123'),
('staff', 'staff123');

-- Pegawai
INSERT INTO pegawai (nip, namalengkap, jeniskelamin, tanggallahir, alamat, nohp, email) VALUES
('10110001', 'Budi Santoso', 'L', '1990-05-15', 'Jl. Merdeka No. 10, Bandung', '081234567890', 'budi.santoso@email.com'),
('10110002', 'Siti Rahayu', 'P', '1992-08-20', 'Jl. Asia Afrika No. 25, Bandung', '081234567891', 'siti.rahayu@email.com'),
('10110003', 'Andi Wijaya', 'L', '1988-03-10', 'Jl. Dago No. 50, Bandung', '081234567892', 'andi.wijaya@email.com'),
('10110004', 'Dewi Lestari', 'P', '1995-11-25', 'Jl. Buah Batu No. 15, Bandung', '081234567893', 'dewi.lestari@email.com'),
('10110005', 'Rudi Hermawan', 'L', '1987-07-01', 'Jl. Setiabudhi No. 30, Bandung', '081234567894', 'rudi.hermawan@email.com'),
('10110006', 'Maya Putri', 'P', '1993-01-12', 'Jl. Riau No. 45, Bandung', '081234567895', 'maya.putri@email.com'),
('10110007', 'Hendra Kurniawan', 'L', '1991-09-08', 'Jl. Cendana No. 20, Bandung', '081234567896', 'hendra.kurniawan@email.com'),
('10110008', 'Rina Marlina', 'P', '1994-06-18', 'Jl. Gatot Subroto No. 12, Bandung', '081234567897', 'rina.marlina@email.com');

-- Jabatan
INSERT INTO jabatan (kodejabatan, namajabatan, level, gaji) VALUES
('J001', 'Kepala Divisi', 1, 15000000.00),
('J002', 'Manager', 2, 10000000.00),
('J003', 'Supervisor', 3, 7500000.00),
('J004', 'Staff Senior', 4, 5500000.00),
('J005', 'Staff', 5, 4500000.00);

-- Jabatan Pegawai
INSERT INTO jabatanpegawai (nip, kodejabatan, status, periode) VALUES
('10110001', 'J001', 'Aktif', '2024-2026'),
('10110002', 'J002', 'Aktif', '2024-2026'),
('10110003', 'J003', 'Aktif', '2024-2026'),
('10110004', 'J005', 'Aktif', '2024-2026'),
('10110005', 'J004', 'Aktif', '2023-2025'),
('10110006', 'J005', 'Nonaktif', '2023-2024'),
('10110007', 'J002', 'Aktif', '2025-2027'),
('10110008', 'J003', 'Aktif', '2024-2026');
