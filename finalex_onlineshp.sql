-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2022 pada 09.05
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalex_onlineshp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_consumen`
--

CREATE TABLE `tb_consumen` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) NOT NULL,
  `avatar` text DEFAULT NULL,
  `role` int(1) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `updatedby` int(1) DEFAULT NULL,
  `updateddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_consumen`
--

INSERT INTO `tb_consumen` (`id`, `username`, `password`, `salt`, `avatar`, `role`, `createdby`, `createddate`, `updatedby`, `updateddate`) VALUES
(1, 'martin', '8430f53aebb0e978bfe1319b02ddbd8f', '61ca0a47539463.00571724', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'consumen01', 'c76ce3424d47b4ba48e742ef7ae92004', '61ca31e36499e5.90433562', '', 0, 0, '2021-12-27 15:36:35', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_feedback`
--

CREATE TABLE `tb_feedback` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_items`
--

CREATE TABLE `tb_items` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` double(8,0) NOT NULL,
  `stock` int(1) NOT NULL,
  `image` text NOT NULL,
  `createdby` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `updatedby` int(1) DEFAULT NULL,
  `updateddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_items`
--

INSERT INTO `tb_items` (`id`, `name`, `price`, `stock`, `image`, `createdby`, `createddate`, `updatedby`, `updateddate`) VALUES
(4, '212 Sexy Men', 200000, 11, '1640642354_d1e04fc8c46af73e3017.jpg', 1, '2021-12-27 15:59:14', 0, '0000-00-00 00:00:00'),
(5, 'Adidas Perfume', 300000, 18, '1640642379_db2441a210e59345fb95.jpg', 1, '2021-12-27 15:59:39', 0, '0000-00-00 00:00:00'),
(6, 'Aigner Pour', 70000, 11, '1640642408_808a680b727c849fe5a0.jpg', 1, '2021-12-27 16:00:08', 0, '0000-00-00 00:00:00'),
(7, 'Aigner No 1 OUD', 125000, 10, '1640642436_e0e29874b4e8ea3f7f73.jpg', 1, '2021-12-27 16:00:36', 0, '0000-00-00 00:00:00'),
(8, 'Aigner Etienne', 90000, 7, '1640642458_7803c4fd43c9748882c2.jpg', 1, '2021-12-27 16:00:58', 0, '0000-00-00 00:00:00'),
(12, 'New Perfume', 250000, 6, '1640908335_258dfcad1051a64a3c20.jpg', 1, '2021-12-30 17:52:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `id` int(11) NOT NULL,
  `iditems` int(11) NOT NULL,
  `idconsumen` int(11) NOT NULL,
  `amount` int(2) NOT NULL,
  `totalprice` int(2) NOT NULL,
  `address` text NOT NULL,
  `shipping` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_consumen`
--
ALTER TABLE `tb_consumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_items`
--
ALTER TABLE `tb_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id_consumen_foreign` (`idconsumen`),
  ADD KEY `transaction_id_items_foreign` (`iditems`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_consumen`
--
ALTER TABLE `tb_consumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_feedback`
--
ALTER TABLE `tb_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_items`
--
ALTER TABLE `tb_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_transaction`
--
ALTER TABLE `tb_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD CONSTRAINT `transaction_id_consumen_foreign` FOREIGN KEY (`idconsumen`) REFERENCES `tb_consumen` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_id_items_foreign` FOREIGN KEY (`iditems`) REFERENCES `tb_items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
