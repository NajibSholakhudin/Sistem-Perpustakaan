# Web Sederhana Perpustakaan - ISCOM Day 3

## Identitas Pembuat
- **Nama:** Ahmad Rofiqi Najib Sholakhudin
- **NPM:** 26082010085
- **Kelas/Kelompok:** Fasilkom UPN Veteran Jawa Timur

## Penjelasan Entitas, Atribut, Relasi, dan Kardinalitas
1. **Entitas Buku (Master 1)**: Menyimpan informasi atribut `id_buku`, `judul_buku`, `penulis`, `tahun_terbit`, dan `stok`.
2. **Entitas Peminjam (Master 2)**: Menyimpan informasi atribut `id_peminjam`, `nama_peminjam`, `nim_nis`, `prodi_jurusan`, dan `no_telepon`.
3. **Entitas Peminjaman (Transaksi/Relasi)**: Menghubungkan buku dan peminjam melalui Foreign Key `id_buku` dan `id_peminjam`, serta atribut tambahan `tanggal_pinjam`, `tanggal_kembali`, dan `status`.
4. **Kardinalitas**: Relasi antara tabel Buku/Peminjam ke tabel Peminjaman adalah **1-to-Many** (1 Buku atau 1 Peminjam dapat melakukan banyak transaksi peminjaman).

## Cara Menjalankan Project
1. Pastikan server lokal Laragon (Apache & MySQL) sudah aktif.
2. Buat database baru bernama `db_perpustakaan` di DBeaver, lalu jalankan script yang ada di `database/schema.sql`.
3. Letakkan folder project ke dalam direktori `C:\laragon\www\`.
4. Akses melalui browser: `http://localhost/26082010085_Perpustakaan/index.php`.