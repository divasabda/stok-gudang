-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Okt 2019 pada 11.58
-- Versi server: 5.7.23
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `stok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `stok_bahan` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `stok_bahan`, `satuan`) VALUES
(1, 'teh', 104, 'box'),
(2, 'kopi', 34, 'cup'),
(3, 'gula', 10, 'sak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_ramalan`
--

CREATE TABLE `hasil_ramalan` (
  `id_periode_hasil` int(11) NOT NULL,
  `id_peramalan` int(11) NOT NULL,
  `hasil_ramal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komposisi_menu`
--

CREATE TABLE `komposisi_menu` (
  `id_komposisi` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_komposisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keluar`
--

CREATE TABLE `laporan_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_keluar`
--

INSERT INTO `laporan_keluar` (`id_keluar`, `id_bahan`, `jumlah_keluar`, `tanggal_keluar`) VALUES
(1, 3, 20, '2019-10-02'),
(2, 3, 30, '2019-10-02');

--
-- Trigger `laporan_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `laporan_keluar` FOR EACH ROW BEGIN
UPDATE bahan SET stok_bahan = stok_bahan-New.jumlah_keluar
WHERE id_bahan = new.id_bahan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_masuk`
--

CREATE TABLE `laporan_masuk` (
  `id_laporan_masuk` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_masuk`
--

INSERT INTO `laporan_masuk` (`id_laporan_masuk`, `id_bahan`, `jumlah_masuk`, `tanggal_masuk`) VALUES
(1, 1, 2, '2019-09-25'),
(2, 1, 2, '2019-09-25'),
(3, 2, 2, '2019-09-26'),
(4, 3, 20, '2019-09-27'),
(5, 3, 10, '2019-09-28'),
(6, 3, 5, '2019-09-27'),
(7, 3, 5, '2019-09-28'),
(8, 3, 20, '2019-10-01'),
(9, 2, 20, '2019-10-03'),
(10, 3, 10, '2019-10-01');

--
-- Trigger `laporan_masuk`
--
DELIMITER $$
CREATE TRIGGER `bahan_masuk` AFTER INSERT ON `laporan_masuk` FOR EACH ROW BEGIN
UPDATE bahan SET stok_bahan = stok_bahan+New.jumlah_masuk
WHERE id_bahan = new.id_bahan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `kategori_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jumlah_mutasi` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `create_at` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_bahan`, `stok_awal`, `jumlah_mutasi`, `stok_akhir`, `create_at`, `keterangan`) VALUES
(1, 2, 14, 20, 34, '2019-10-01', 'Barang Masuk'),
(2, 3, 30, 10, 40, '2019-10-01', 'Barang Masuk'),
(3, 3, 40, 30, 10, '2019-10-01', 'Barang Keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameter_stok`
--

CREATE TABLE `parameter_stok` (
  `id_peramalan` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `ftm` int(11) NOT NULL,
  `periode` date NOT NULL,
  `st1` int(11) NOT NULL,
  `st2` int(11) NOT NULL,
  `st3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level_user`) VALUES
(1, 'admin', 'admin', 1),
(2, 'pimpinan', 'pimpinan', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `hasil_ramalan`
--
ALTER TABLE `hasil_ramalan`
  ADD PRIMARY KEY (`id_periode_hasil`),
  ADD KEY `id_peramalan` (`id_peramalan`);

--
-- Indeks untuk tabel `komposisi_menu`
--
ALTER TABLE `komposisi_menu`
  ADD PRIMARY KEY (`id_komposisi`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `laporan_keluar`
--
ALTER TABLE `laporan_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `laporan_keluar_ibfk_1` (`id_bahan`);

--
-- Indeks untuk tabel `laporan_masuk`
--
ALTER TABLE `laporan_masuk`
  ADD PRIMARY KEY (`id_laporan_masuk`),
  ADD KEY `laporan_masuk_ibfk_1` (`id_bahan`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indeks untuk tabel `parameter_stok`
--
ALTER TABLE `parameter_stok`
  ADD PRIMARY KEY (`id_peramalan`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hasil_ramalan`
--
ALTER TABLE `hasil_ramalan`
  MODIFY `id_periode_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komposisi_menu`
--
ALTER TABLE `komposisi_menu`
  MODIFY `id_komposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_keluar`
--
ALTER TABLE `laporan_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporan_masuk`
--
ALTER TABLE `laporan_masuk`
  MODIFY `id_laporan_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `parameter_stok`
--
ALTER TABLE `parameter_stok`
  MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komposisi_menu`
--
ALTER TABLE `komposisi_menu`
  ADD CONSTRAINT `komposisi_menu_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `komposisi_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Ketidakleluasaan untuk tabel `laporan_keluar`
--
ALTER TABLE `laporan_keluar`
  ADD CONSTRAINT `laporan_keluar_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `laporan_masuk`
--
ALTER TABLE `laporan_masuk`
  ADD CONSTRAINT `laporan_masuk_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  ADD CONSTRAINT `mutasi_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`);

--
-- Ketidakleluasaan untuk tabel `parameter_stok`
--
ALTER TABLE `parameter_stok`
  ADD CONSTRAINT `parameter_stok_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`);
