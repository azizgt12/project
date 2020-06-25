-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2020 pada 23.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_minipro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `email`, `telp`, `created_at`, `updated_at`) VALUES
(3, 'Riau Sakti', 'Indonesia', 'admin@smkn3-pariaman.sch.id', '0342-', '2020-06-13 05:19:53', '2020-06-14 12:31:42'),
(4, 'Indah Swalayan', 'indo', 'admin@b-on.com', '098932318', '2020-06-13 05:20:14', '2020-06-14 12:31:34'),
(6, 'CV. Indo Jaya', 'Indonesia', 'admin@indojaya.com', '0912830', '2020-06-14 12:31:24', '2020-06-14 12:31:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` varchar(20) DEFAULT NULL,
  `produk` int(20) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `produk`, `harga`, `qty`, `subtotal`) VALUES
('062420091613', 4, NULL, 7, 49000),
('062420091613', 6, NULL, 4, 10000),
('062420091613', 13, 1000, 2, 4000),
('062420092114', 4, NULL, 7, 49000),
('062420092114', 6, NULL, 4, 10000),
('062420092114', 13, 1000, 2, 4000),
('062420092446', 4, NULL, 7, 49000),
('062420092510', 4, NULL, 7, 49000),
('062420092531', 4, NULL, 7, 49000),
('062420092601', 4, NULL, 7, 49000),
('062420092719', 4, NULL, 7, 49000),
('062420092739', 4, NULL, 7, 49000),
('062420092809', 4, NULL, 7, 49000),
('062420092837', 4, NULL, 7, 49000),
('062420092902', 4, NULL, 7, 49000),
('062420092938', 4, NULL, 7, 49000),
('062420093024', 4, NULL, 7, 49000),
('062420093056', 4, NULL, 7, 49000),
('062420093124', 4, NULL, 7, 49000),
('062420093124', 6, NULL, 4, 10000),
('062420093124', 13, 1000, 2, 4000),
('062420111732', 8, NULL, 1, 10),
('062420111732', 6, 0, 1, 2500),
('062420233520', 16, 1200, 10, 13000),
('062420233520', 8, 2500, 1, 10),
('062420233558', 14, 12000, 1, 13000),
('062420233558', 17, 2500, 1, 2500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_pembelian`
--

CREATE TABLE `det_pembelian` (
  `id` varchar(100) NOT NULL,
  `produk` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `det_pembelian`
--

INSERT INTO `det_pembelian` (`id`, `produk`, `harga`, `subtotal`, `qty`) VALUES
('062420225552', 4, 2500, 7000, 1),
('062420225552', 13, 1000, 4000, 2),
('062420225606', 17, 2500, 2500, 1),
('062420225634', 8, 2500, 10, 1),
('062420225634', 13, 1000, 12000, 6),
('062420225634', 14, 12000, 13000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', NULL, NULL, NULL),
(2, 'Minuman', NULL, NULL, NULL),
(23, 'Pakaian', NULL, '2020-06-14 12:30:28', '2020-06-14 12:30:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` varchar(100) NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `tgl`, `total`) VALUES
('062420225552', '2020-06-24 00:00:00', 4500),
('062420225606', '2020-06-24 00:00:00', 2500),
('062420225634', '2020-06-24 00:00:00', 20500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` varchar(20) NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `cash` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `tgl`, `total`, `cash`) VALUES
('062420091613', '2020-06-24 00:00:00', 63000, 100000),
('062420092114', '2020-06-24 00:00:00', 63000, 70000),
('062420092446', '2020-06-24 00:00:00', 63000, 100000),
('062420092510', '2020-06-24 00:00:00', 63000, 10000),
('062420092531', '2020-06-24 00:00:00', 63000, 100000),
('062420092601', '2020-06-24 00:00:00', 63000, 70000),
('062420092719', '2020-06-24 00:00:00', 63000, 70000),
('062420092739', '2020-06-24 00:00:00', 63000, 70000),
('062420092809', '2020-06-24 00:00:00', 63000, 70000),
('062420092837', '2020-06-24 00:00:00', 63000, 70000),
('062420092902', '2020-06-24 00:00:00', 63000, 70000),
('062420092938', '2020-06-24 00:00:00', 63000, 70000),
('062420093024', '2020-06-24 00:00:00', 63000, 70000),
('062420093056', '2020-06-24 00:00:00', 63000, 70000),
('062420093124', '2020-06-24 00:00:00', 63000, 70000),
('062420111732', '2020-06-24 00:00:00', 2510, 3000),
('062420233520', '2020-06-24 00:00:00', 13010, 13010),
('062420233558', '2020-06-24 00:00:00', 15500, 15500),
('140620073403', '2020-06-14 19:34:07', 23500, NULL),
('140620073442', '2020-06-14 19:34:48', 8000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `hargabeli` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kategori`, `harga`, `stok`, `hargabeli`) VALUES
(4, 'Produk 1', 'Makanan', 7000, 22, 2500),
(6, 'Produk 2', 'Minuman', 2500, 67, 2500),
(8, 'Produk 3', '1', 10, 8, 2500),
(13, 'Produk 4', '0', 2000, 104, 1000),
(14, 'Produk 5', 'Makanan ', 13000, 112, 12000),
(16, 'Produk 7', 'Makanan', 1300, 90, 1200),
(17, 'Produk 8', 'a', 2500, 1, 2500),
(19, 'Produk 9', 'opjpo', 2500, 909, 90),
(20, 'Produk 110', 'opiop', 890, 80912, 90890);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id` int(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `sub` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_pembelian`
--

CREATE TABLE `temp_pembelian` (
  `id` int(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `sub` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `level` enum('Kasir','Admin','Pimpinan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uname`, `pass`, `level`) VALUES
('admin', 'admin', 'Admin'),
('kasir', 'kasir', 'Kasir'),
('pim', 'pim', 'Pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `id` (`id`),
  ADD KEY `produk` (`produk`);

--
-- Indeks untuk tabel `det_pembelian`
--
ALTER TABLE `det_pembelian`
  ADD KEY `produk` (`produk`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uname`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `penjualan` (`id`),
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `det_pembelian`
--
ALTER TABLE `det_pembelian`
  ADD CONSTRAINT `det_pembelian_ibfk_1` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `det_pembelian_ibfk_2` FOREIGN KEY (`id`) REFERENCES `pembelian` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
