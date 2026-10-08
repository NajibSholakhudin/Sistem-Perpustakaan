<?php
include 'services/config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan - ISCOM</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <h1>Sistem Informasi Perpustakaan</h1>
    </header>

    <div class="container">
        
        <!-- Tabel Buku -->
        <div class="section-box">
            <h2>Data Buku</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result_buku = mysqli_query($conn, "SELECT * FROM buku");
                    while ($row = mysqli_fetch_assoc($result_buku)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_buku'] . "</td>";
                        echo "<td>" . $row['judul_buku'] . "</td>";
                        echo "<td>" . $row['penulis'] . "</td>";
                        echo "<td>" . $row['tahun_terbit'] . "</td>";
                        echo "<td>" . $row['stok'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Tabel Peminjam -->
        <div class="section-box">
            <h2>Data Peminjam</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Peminjam</th>
                        <th>NIM/NIS</th>
                        <th>Prodi</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result_peminjam = mysqli_query($conn, "SELECT * FROM peminjam");
                    while ($row = mysqli_fetch_assoc($result_peminjam)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_peminjam'] . "</td>";
                        echo "<td>" . $row['nama_peminjam'] . "</td>";
                        echo "<td>" . $row['nim_nis'] . "</td>";
                        echo "<td>" . $row['prodi_jurusan'] . "</td>";
                        echo "<td>" . $row['no_telepon'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Tabel Transaksi Peminjaman (JOIN) -->
        <div class="section-box">
            <h2>Data Transaksi Peminjaman</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_transaksi = "SELECT peminjaman.id_peminjaman, peminjam.nama_peminjam, buku.judul_buku, 
                                        peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, peminjaman.status 
                                        FROM peminjaman 
                                        JOIN peminjam ON peminjaman.id_peminjam = peminjam.id_peminjam 
                                        JOIN buku ON peminjaman.id_buku = buku.id_buku";
                    $result_transaksi = mysqli_query($conn, $query_transaksi);
                    
                    while ($row = mysqli_fetch_assoc($result_transaksi)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_peminjaman'] . "</td>";
                        echo "<td>" . $row['nama_peminjam'] . "</td>";
                        echo "<td>" . $row['judul_buku'] . "</td>";
                        echo "<td>" . $row['tanggal_pinjam'] . "</td>";
                        echo "<td>" . $row['tanggal_kembali'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <footer>
        <p>&copy; 2026 - Ahmad Rofiqi Najib Sholakhudin</p>
    </footer>

</body>
</html>