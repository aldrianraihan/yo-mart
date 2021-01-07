-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2020 pada 01.54
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_mart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `no_tiket` varchar(30) NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `kota` int(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `harga_ongkir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`no_tiket`, `nama_penerima`, `kota`, `alamat`, `harga_ongkir`) VALUES
('1', 'James', 4, 'Jl. mawar', '40000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stock_barang` int(10) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `gambarang` varchar(20) NOT NULL,
  `id_vendor` int(10) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stock_barang`, `harga_satuan`, `gambarang`, `id_vendor`, `id_category`) VALUES
(1, 'indomie goreng', 160, 2500, 'indomie.jpg', 1, 1),
(2, 'Super Bubur ', 100, 1000, 'superbubur.jpg', 2, 1),
(3, 'Kornet Daging Sapi', 100, 18000, 'kornet.jpg', 3, 1),
(4, 'Teh Pucuk 350mL', 150, 5000, 'tehpucuk.jpg', 1, 2),
(5, 'Sprite 300mL', 150, 5000, 'sprite.jpeg', 2, 2),
(6, 'Aqua 600mL', 200, 5000, 'aqua.png', 3, 2),
(7, 'Panadol Paracetamol', 300, 8000, 'panadol1.jpg', 1, 3),
(8, 'Promag', 300, 5000, 'promag.jpg', 2, 3),
(9, 'Enervon-C', 300, 100000, 'enervonc.jpg', 3, 3),
(10, 'Tissue Paseo 250 sheets', 200, 8000, 'tisue.jpg', 1, 4),
(11, 'Tissue Gulung Paseo', 150, 12000, 'tisu.jpg', 2, 4),
(12, 'Shampoo Lifebuoy ', 200, 15000, 'shampo.jpg', 3, 4),
(14, 'Tempat Sikat Gigi', 140, 35000, 'tempatsikatgigi.jpg', 2, 4),
(15, 'Gantungan Handuk', 50, 250000, 'hangerhanduk.jpg', 3, 4),
(17, 'Tempat Sikat Gigi', 120, 35000, 'tempatsikatgigi.jpg', 4, 4),
(18, 'Gantungan Handuk', 25, 250000, 'hangerhanduk.jpg', 4, 4),
(19, 'Indomie Goreng', 200, 1500, 'indomie.jpg', 4, 1),
(20, 'Super Bubur', 200, 1500, 'superbubur.jpg', 4, 1),
(21, 'Kornet Daging Sapi', 160, 17000, 'kornet.jpg', 4, 1),
(22, 'Teh Pucuk', 250, 6500, 'tehpucuk.jpg', 4, 2),
(23, 'Sprite 300mL', 240, 5000, 'sprite.jpeg', 4, 2),
(24, 'Aqua 600ml', 134, 5000, 'aqua.png', 4, 2),
(25, 'Panadol Paracetamol', 200, 8000, 'panadol1.jpg', 4, 3),
(26, 'Promag', 150, 5000, 'promag.jpg', 4, 3),
(27, 'Enervon-C', 250, 100000, 'enervonc.jpg', 4, 3),
(28, 'Tissue Paseo 250 Sheets', 170, 8000, 'tisue.jpg', 4, 4),
(29, 'Tissue Gulung Paseo', 170, 12000, 'tisu.jpg', 4, 4),
(30, 'Shampoo Lifebuoy', 100, 15000, 'shampo.jpg', 4, 4),
(31, 'ayam potong', 50, 50000, 'aqua.png', 2, 1),
(32, 'sosis', 50, 1500, 'sosis.jpg', 1, 1),
(33, 'Kulkas', 20, 250000, 'kulkas.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_category` int(10) NOT NULL,
  `nama_category` varchar(20) NOT NULL,
  `gambar_categories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_category`, `nama_category`, `gambar_categories`) VALUES
(1, 'food', '../upload/food.png'),
(2, 'drink', '../upload/11-512.png'),
(3, 'drugs', '../upload/capsule.png'),
(4, 'bathroom', '../upload/bathroom.png'),
(5, 'Alat Elektronik', '../upload/computer.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id_barang` varchar(30) NOT NULL,
  `no_tiket` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_pembelian` varchar(30) NOT NULL,
  `harga_satuan` varchar(30) NOT NULL,
  `total_harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`id_barang`, `no_tiket`, `nama_barang`, `jumlah_pembelian`, `harga_satuan`, `total_harga`) VALUES
('1', '1', 'indomie goreng', '10', '2500', '25000'),
('11', '1', 'Tissue Gulung Paseo', '50', '12000', '600000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_stok` varchar(50) NOT NULL,
  `harga_satuan` varchar(50) NOT NULL,
  `jumlah_pembelian` varchar(50) NOT NULL,
  `id_vendor` varchar(30) NOT NULL,
  `vendor_name` varchar(30) NOT NULL,
  `id_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_daerah` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_daerah`, `harga`) VALUES
(1, 'jakarta', 30000),
(2, 'bogor', 50000),
(3, 'depok', 50000),
(4, 'bekasi', 60000),
(5, 'kab. Bogor', 40000),
(6, 'kab. Bekasi', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(10) NOT NULL,
  `vendor_loc` varchar(50) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `Gambar_Vendor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `vendor_loc`, `vendor_name`, `Gambar_Vendor`) VALUES
(1, 'jakarta', 'Carrefour', '../upload/carrefour.png'),
(2, 'jakarta', 'Alfamart', '../upload/alfa.png'),
(3, 'jakarta', 'Lotte Mart', '../upload/lotte.png'),
(4, 'jakarta', 'Hypermart', '../upload/hypermart.png'),
(5, 'jakarta', 'Indomaret', '../upload/indomaret.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
