-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2023 pada 18.21
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi7a`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_baku` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `qty` int(6) NOT NULL,
  `sat` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `status` enum('Menunggu Diapprove','Diapprove','Ditolak','Barang Selesai') NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_baku`, `nama_barang`, `qty`, `sat`, `harga`, `tgl`, `id_supplier`, `status`, `pesan`) VALUES
(3, 'hjgjh', 787, 'Pack', 78, '2023-07-02', 1, 'Barang Selesai', 'oke lah yah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `stok` int(3) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `kode_barang`, `nama_barang`, `kategori`, `jenis_barang`, `stok`, `satuan`, `ket`) VALUES
(3, 'AIA7230123', 'ghhghgh', 'Aluminium', 'Kaca Anti Pecah', 451, 'Meter', 'wwwwww'),
(4, 'AIA2230123', 'asd', 'Aluminium', 'Aluminium Alloy', 88, 'Meter', 'qwqwqw'),
(5, 'AIA4230123', 'kaca', 'Aluminium', 'Kaca Balok', 23, 'Pack', 'kaca rumah'),
(6, 'AIA4010223', 'Aluminum Bosay', 'Aluminium', 'Aluminium Alloy', 45, 'Meter', 'Barang Selesai Diproduksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jk_karyawan` enum('Pria','Wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tmp_lahir` text NOT NULL,
  `alamat_karyawan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `id_user`, `nama_karyawan`, `jk_karyawan`, `tanggal_lahir`, `tmp_lahir`, `alamat_karyawan`) VALUES
(1, 2, 'Budi Indrawan', 'Pria', '1999-12-12', 'Jakarta', 'Jl. Sertu Saru, Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produksi`
--

CREATE TABLE `data_produksi` (
  `id_produksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `role` enum('Produksi','Data Barang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_supplier`
--

CREATE TABLE `data_supplier` (
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `alamat_supplier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_supplier`
--

INSERT INTO `data_supplier` (`id_supplier`, `id_user`, `nama_supplier`, `nama_toko`, `no_hp`, `alamat_supplier`) VALUES
(1, 5, 'Jono Sardi', 'CV. Gudang Pasir', 2147483647, 'Jl. Lettu Saru, Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan_barang`
--

CREATE TABLE `pengadaan_barang` (
  `id_pengadaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_pengadaan` date NOT NULL,
  `jumlah` int(50) NOT NULL,
  `status_pengadaan` enum('Diterima','Ditolak','Menunggu Diproses','Diproses','Selesai','Pemesanan Ditolak') NOT NULL,
  `ket_pengadaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengadaan_barang`
--

INSERT INTO `pengadaan_barang` (`id_pengadaan`, `id_barang`, `tgl_pengadaan`, `jumlah`, `status_pengadaan`, `ket_pengadaan`) VALUES
(2, 6, '2023-02-08', 12, 'Diterima', 'baruan'),
(3, 4, '2023-02-08', 12, 'Menunggu Diproses', 'sssssssss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `id_permintaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('Diterima','Ditolak','Menunggu Persetujuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `isi_pesan` text NOT NULL,
  `status_pesan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jk` enum('-','Wanita','Pria') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('Staff Lapangan','Staff Gudang','Manager','Staff Produksi','Supplier') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `jk`, `username`, `password`, `tempat_lahir`, `tgl_lahir`, `alamat`, `level`) VALUES
(1, 'Manager', 'Pria', 'Manager', '$2y$10$fLjj5298.xW6N1k7msjMV.S4OimVFcuNM7wDdDyQqNx2ioCfP7WRy', 'Jakarta', '1978-01-01', 'Jl. Letnan Saru, Jakarta', 'Manager'),
(2, 'Staff Lapangan', 'Pria', 'Staff Lapangan', '$2y$10$ibeX4PIJs6lk7wKkBOAu2eEq4WDIzoUWaNCX3l84g6woCTaIELdQ.', 'Jakarta', '1987-02-12', 'Jl. Letda, Saru, Jakarta', 'Staff Lapangan'),
(3, 'Staff Gudang', 'Wanita', 'Staff Gudang', '$2y$10$FVoDXZUmD9m.6xqmMwQY0OmN8qcuJKr18NXPTQcawuCEb41s3JMVy', 'Jakarta', '1977-12-12', 'Jl. Letkol Saru, Jakarta', 'Staff Gudang'),
(4, 'Staff Produksi', 'Wanita', 'Staff Produksi', '$2y$10$Z5fhVDMmexjiqnPn4PC5me5vtYjB/K5GNMCpbqPNkg.Ffb2JMklFu', 'Jakarta', '1998-12-21', 'Jl. Serda, Saru, Jakart', 'Staff Produksi'),
(5, 'Jono Sardi', '-', 'Jono Sardi', '$2y$10$vIqEBrXMHM7ZijwWM8cdf.0QtgguJq1cVI7LkSzmwnsSig0WNkwm2', '', '0000-00-00', '', 'Supplier');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_baku`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `data_produksi`
--
ALTER TABLE `data_produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pengadaan_barang`
--
ALTER TABLE `pengadaan_barang`
  ADD PRIMARY KEY (`id_pengadaan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_produksi`
--
ALTER TABLE `data_produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_supplier`
--
ALTER TABLE `data_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengadaan_barang`
--
ALTER TABLE `pengadaan_barang`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `data_supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD CONSTRAINT `data_karyawan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `data_produksi`
--
ALTER TABLE `data_produksi`
  ADD CONSTRAINT `data_produksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD CONSTRAINT `data_supplier_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pengadaan_barang`
--
ALTER TABLE `pengadaan_barang`
  ADD CONSTRAINT `pengadaan_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD CONSTRAINT `permintaan_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`),
  ADD CONSTRAINT `permintaan_barang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
