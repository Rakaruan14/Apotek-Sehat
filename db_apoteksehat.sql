-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221120.420485a41b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 09:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apoteksehat`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jenis`
--

CREATE TABLE `data_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jenis`
--

INSERT INTO `data_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Analgesik'),
(2, 'Alergi'),
(3, 'Abses'),
(4, 'Abdomen / Perut'),
(6, 'Flu');

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Obat Narkotika'),
(2, 'Obat Keras'),
(3, 'Obat Bebas'),
(7, 'Obat Terbatas'),
(8, 'Obat Psikotropika'),
(9, 'Obat Herbal');

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(128) NOT NULL,
  `obat` varchar(128) NOT NULL,
  `kategori_obat` varchar(128) NOT NULL,
  `jenis_obat` varchar(128) NOT NULL,
  `satuan_obat` varchar(128) NOT NULL,
  `brand` varchar(128) NOT NULL,
  `dosis` varchar(128) NOT NULL,
  `kemasan` varchar(128) NOT NULL,
  `indikasi` varchar(256) NOT NULL,
  `stok` int(128) NOT NULL,
  `hrg_beli` int(128) NOT NULL,
  `hrg_jual` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_obat`
--

INSERT INTO `data_obat` (`id_obat`, `kode_obat`, `obat`, `kategori_obat`, `jenis_obat`, `satuan_obat`, `brand`, `dosis`, `kemasan`, `indikasi`, `stok`, `hrg_beli`, `hrg_jual`) VALUES
(1, 'JmQGaRkS', 'Amoxicillin', 'Obat Keras', 'Abdomen / Perut', 'Botol\r\n', 'Amoxil', '2 x 1', 'Tablet 500mg x 4', 'Infeksi bakteri', 50, 4300, 6000),
(8, 'CZpedPE3', 'Dexitaf', 'Obat Narkotika', 'Alergi', 'Tablet', 'Balatif', '2 x 1', 'Tablet 0.5mg x 1', 'Anti alergi', 120, 14800, 17000),
(9, 'ou8dMN3N', 'Dextro', 'Obat Terbatas', 'Flu', 'Box', 'Balminil', '3 x 1', 'Sirup 120mL x 1', 'Batuk kering', 322, 7800, 10000),
(10, 'G6Ok9KM1', 'Mixagrip', 'Obat Bebas', 'Flu', 'Strip', 'Kalbe', '3 x 1', 'Strip x 1', 'Gejala flu', 160, 3250, 5000),
(13, 'VrRsl9Du', 'Tolak Angin', 'Obat Herbal', 'Flu', 'Box', 'SidoMuncul', '2x1', 'Sachet 15ml x 12', 'Flu', 6, 40000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `data_satuan`
--

CREATE TABLE `data_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_satuan`
--

INSERT INTO `data_satuan` (`id_satuan`, `satuan`) VALUES
(1, 'Strip'),
(2, 'Box'),
(3, 'Botol\r\n'),
(8, 'Tablet'),
(12, 'Sirup');

-- --------------------------------------------------------

--
-- Table structure for table `data_suplier`
--

CREATE TABLE `data_suplier` (
  `id_suplier` int(11) NOT NULL,
  `suplier` varchar(128) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_suplier`
--

INSERT INTO `data_suplier` (`id_suplier`, `suplier`, `telepon`, `alamat`, `keterangan`) VALUES
(1, 'PT.FARMA MARTAPURA', '089811895989', 'Sragen', 'Supplier Dextro'),
(2, 'PT.INDOFARMA INDONESIA', '081122334456', 'Yogyakarta', 'Supplier Mixagrip'),
(3, 'PT.SEHAT JAYA', '085123456789', 'Sukoharjo', 'Supplier Amoxicillin'),
(4, 'PT.INDOSEHAT SELALU', '089987654321', 'Surakarta', 'Supplier Dextaf'),
(5, 'PT.SEHAT SELALU', '08121818181', 'Solo', 'Suplier Tolak Angin');

-- --------------------------------------------------------

--
-- Table structure for table `obat_keluar`
--

CREATE TABLE `obat_keluar` (
  `id_keluar` int(11) NOT NULL,
  `kode_keluar` varchar(128) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah` int(128) NOT NULL,
  `harga_jual` int(128) NOT NULL,
  `subtotal` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_keluar`
--

INSERT INTO `obat_keluar` (`id_keluar`, `kode_keluar`, `nama_obat`, `tgl_keluar`, `jumlah`, `harga_jual`, `subtotal`) VALUES
(4, 'TCEdl4fu', 'Mixagrip', '2022-11-30', 40, 5000, 200000),
(5, '43c7como', 'Dextro', '2022-12-08', 28, 10000, 280000),
(6, '0adHmnEh', 'Dexitaf', '2022-12-15', 30, 17000, 510000),
(7, 'nIOwetmd', 'Amoxicillin', '2022-12-15', 50, 6000, 300000),
(8, 'pUsGnumn', 'Amoxicillin', '2022-12-16', 7, 6000, 42000),
(9, 'jwT1yPGL', 'Tolak Angin', '2022-12-16', 5, 50000, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk`
--

CREATE TABLE `obat_masuk` (
  `id_masuk` int(11) NOT NULL,
  `kode_masuk` varchar(128) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `nama_suplier` varchar(128) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jumlah` int(128) NOT NULL,
  `harga_beli` int(128) NOT NULL,
  `subtotal` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_masuk`
--

INSERT INTO `obat_masuk` (`id_masuk`, `kode_masuk`, `nama_obat`, `nama_suplier`, `tgl_masuk`, `jumlah`, `harga_beli`, `subtotal`) VALUES
(9, 's6C6ySPW', 'Amoxicillin', 'PT.SEHAT JAYA', '2022-11-16', 50, 4300, 215000),
(10, '5dhI0D6e', 'Mixagrip', 'PT.INDOFARMA INDONESIA', '2022-11-25', 200, 3250, 650000),
(11, '6OWBnea7', 'Dextro', 'PT.FARMA MARTAPURA', '2022-12-01', 350, 7800, 2730000),
(12, 'cfSjLcxk', 'Dexitaf', 'PT.INDOSEHAT SELALU', '2022-12-02', 150, 14800, 2220000),
(13, 'oWGLPmmp', 'Amoxicillin', 'PT.SEHAT JAYA', '2022-12-08', 50, 4300, 215000),
(19, '2ByrkYeY', 'Amoxicillin', 'PT.FARMA MARTAPURA', '2022-12-16', 7, 4300, 30100),
(20, '35Q70viC', 'Tolak Angin', 'PT.SEHAT SELALU', '2022-12-16', 11, 40000, 440000);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `instansi` varchar(128) NOT NULL,
  `pimpinan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `website` varchar(128) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `instansi`, `pimpinan`, `email`, `website`, `telepon`, `alamat`) VALUES
(1, 'PT. APOTEK SEHAT FARMA', 'Ranu Ikhsan Wicaksana', 'apoteksehat@gmail.co.id', 'https://apoteksehat1.com', '085783160308', 'Jl. Letjen Sutoyo No.43, Cengklik, Nusukan, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57135');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Apotek Sehat', 'manager@gmail.com', 'pro1670777266.png', '$2y$10$3JMoKuTwO1nbtdcxFfYcLu30eTdXR8EOLR0q8lu.4N8dEJO5lNQH6', 2, 1, 1669687075),
(2, 'Rifky', 'rifky12210934@gmail.com', 'pro1671176922.jpg', '$2y$10$noDX4iNbXbyeMTqRo28T9OvxcgUL557iL5zc1j9ho9YjVgh8Hc4Da', 1, 1, 1669684715),
(3, 'Fadila', 'fadila12210974@gmail.com', 'pro1671072879.jpg', '$2y$10$vvYO17QVLhZfd0lHb54j9ezMsHQpAcbDHLYmoLzXA5u2Yhi9urKWa', 1, 1, 1670382094),
(17, 'Villa', 'villa@gmail.com', 'default.jpg', '$2y$10$ATWWBYsklNXWsi50y7V0q.JugoSxDfMoj7i0U7aXBr/JuyGbq.3m2', 1, 1, 1671177527);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(9, 'rifky12210934@gmail.com', '6wbw+6ZwPoI8aa0ovfOWuU2h2AeP6J6X7ZqppB1q7ME=', 1671176801);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jenis`
--
ALTER TABLE `data_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `data_satuan`
--
ALTER TABLE `data_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `data_suplier`
--
ALTER TABLE `data_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jenis`
--
ALTER TABLE `data_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_obat`
--
ALTER TABLE `data_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_satuan`
--
ALTER TABLE `data_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_suplier`
--
ALTER TABLE `data_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
