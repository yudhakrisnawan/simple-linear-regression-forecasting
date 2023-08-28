-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2022 pada 10.19
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forecasting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `id_level`) VALUES
(2, 'yudha', 'yudha', 'Yudha Krisnawan', 2),
(4, 'salsa', 'salsa', 'Almarus Salsa', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_aktual`
--

CREATE TABLE `data_aktual` (
  `no_data` int(11) NOT NULL,
  `pengiklanan` varchar(100) NOT NULL,
  `penjualan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_aktual`
--

INSERT INTO `data_aktual` (`no_data`, `pengiklanan`, `penjualan`) VALUES
(1, '230.1', '22.1'),
(2, '44.5', '10.4'),
(3, '17.2', '12'),
(4, '151.5', '16.5'),
(5, '180.8', '17.9'),
(6, '8.7', '7.2'),
(7, '57.5', '11.8'),
(8, '120.2', '13.2'),
(9, '8.6', '4.8'),
(10, '199.8', '15.6'),
(11, '66.1', '12.6'),
(12, '214.7', '17.4'),
(13, '23.8', '9.2'),
(14, '97.5', '13.7'),
(15, '204.1', '19'),
(16, '195.4', '22.4'),
(17, '67.8', '12.5'),
(18, '281.4', '24.4'),
(19, '69.2', '11.3'),
(20, '147.3', '14.6'),
(21, '218.4', '18'),
(22, '237.4', '17.5'),
(23, '13.2', '5.6'),
(24, '228.3', '20.5'),
(25, '62.3', '9.7'),
(26, '262.9', '17'),
(27, '142.9', '15'),
(28, '240.1', '20.9'),
(29, '248.8', '18.9'),
(30, '70.6', '10.5'),
(31, '292.9', '21.4'),
(32, '112.9', '11.9'),
(33, '97.2', '13.2'),
(34, '265.6', '17.4'),
(35, '95.7', '11.9'),
(36, '290.7', '17.8'),
(37, '266.9', '25.4'),
(38, '74.7', '14.7'),
(39, '43.1', '10.1'),
(40, '228', '21.5'),
(41, '202.5', '16.6'),
(42, '177', '17.1'),
(43, '293.6', '20.7'),
(44, '206.9', '17.9'),
(45, '25.1', '8.5'),
(46, '175.1', '16.1'),
(47, '89.7', '10.6'),
(48, '239.9', '23.2'),
(49, '227.2', '19.8'),
(50, '66.9', '9.7'),
(51, '199.8', '16.4'),
(52, '100.4', '10.7'),
(53, '216.4', '22.6'),
(54, '182.6', '21.2'),
(55, '262.7', '20.2'),
(56, '198.9', '23.7'),
(57, '7.3', '5.5'),
(58, '136.2', '13.2'),
(59, '210.8', '23.8'),
(60, '210.7', '18.4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_peramalan`
--

CREATE TABLE `data_peramalan` (
  `no_data` varchar(300) DEFAULT NULL,
  `pengiklanan` varchar(300) DEFAULT NULL,
  `penjualan` varchar(300) DEFAULT NULL,
  `peramalan` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_peramalan`
--

INSERT INTO `data_peramalan` (`no_data`, `pengiklanan`, `penjualan`, `peramalan`) VALUES
('1', '230.1', '22.1', '19.68489937'),
('2', '44.5', '10.4', '9.875894502'),
('3', '17.2', '12', '8.433082903'),
('4', '151.5', '16.5', '15.53087037'),
('5', '180.8', '17.9', '17.07938245'),
('6', '8.7', '7.2', '7.983855848'),
('7', '57.5', '11.8', '10.56294765'),
('8', '120.2', '13.2', '13.8766578'),
('9', '8.6', '4.8', '7.978570823'),
('10', '199.8', '15.6', '18.08353705'),
('11', '66.1', '12.6', '11.01745972'),
('12', '214.7', '17.4', '18.87100565'),
('13', '23.8', '9.2', '8.781894498'),
('14', '97.5', '13.7', '12.67695732'),
('15', '204.1', '19', '18.31079309'),
('16', '195.4', '22.4', '17.85099598'),
('17', '67.8', '12.5', '11.10730514'),
('18', '281.4', '24.4', '22.39611677'),
('19', '69.2', '11.3', '11.18129547'),
('20', '147.3', '14.6', '15.30889935'),
('21', '218.4', '18', '19.06655154'),
('22', '237.4', '17.5', '20.07070614'),
('23', '13.2', '5.6', '8.221681936'),
('24', '228.3', '20.5', '19.58976894'),
('25', '62.3', '9.7', '10.81662881'),
('26', '262.9', '17', '21.4183873'),
('27', '142.9', '15', '15.07635829'),
('28', '240.1', '20.9', '20.21340179'),
('29', '248.8', '18.9', '20.67319889'),
('30', '70.6', '10.5', '11.25528581'),
('31', '292.9', '21.4', '23.00389455'),
('32', '112.9', '11.9', '13.49085104'),
('33', '97.2', '13.2', '12.66110224'),
('34', '265.6', '17.4', '21.56108295'),
('35', '95.7', '11.9', '12.58182688'),
('36', '290.7', '17.8', '22.88762402'),
('37', '266.9', '25.4', '21.62978827'),
('38', '74.7', '14.7', '11.4719718'),
('39', '43.1', '10.1', '9.801904164'),
('40', '228', '21.5', '19.57391386'),
('41', '202.5', '16.6', '18.2262327'),
('42', '177', '17.1', '16.87855153'),
('43', '293.6', '20.7', '23.04088972'),
('44', '206.9', '17.9', '18.45877376'),
('45', '25.1', '8.5', '8.850599812'),
('46', '175.1', '16.1', '16.77813607'),
('47', '89.7', '10.6', '12.26472543'),
('48', '239.9', '23.2', '20.20283174'),
('49', '227.2', '19.8', '19.53163367'),
('50', '66.9', '9.7', '11.05973992'),
('51', '199.8', '16.4', '18.08353705'),
('52', '100.4', '10.7', '12.83022302'),
('53', '216.4', '22.6', '18.96085106'),
('54', '182.6', '21.2', '17.17451289'),
('55', '262.7', '20.2', '21.40781725'),
('56', '198.9', '23.7', '18.03597183'),
('57', '7.3', '5.5', '7.909865509'),
('58', '136.2', '13.2', '14.72226167'),
('59', '210.8', '23.8', '18.66488971'),
('60', '210.7', '18.4', '18.65960468');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Superadmin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `data_aktual`
--
ALTER TABLE `data_aktual`
  ADD PRIMARY KEY (`no_data`);

--
-- Indeks untuk tabel `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_aktual`
--
ALTER TABLE `data_aktual`
  MODIFY `no_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
