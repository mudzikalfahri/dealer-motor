-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 04:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dealer`
--

-- --------------------------------------------------------

--
-- Structure for view `transaksi_penjualan`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksi_penjualan`  AS  select `a`.`nama_pembeli` AS `nama_pembeli`,`a`.`alamat_pembeli` AS `alamat_pembeli`,`b`.`tipe_motor` AS `tipe_motor`,`b`.`harga` AS `harga`,`c`.`nama_karyawan` AS `nama_karyawan` from (((`pembeli` `a` join `transaksi` `d` on(`a`.`id_pembeli` = `d`.`id_pembeli`)) join `produk` `b` on(`b`.`id_motor` = `d`.`id_motor`)) join `karyawan` `c` on(`c`.`id_karyawan` = `d`.`id_karyawan`)) ;

--
-- VIEW `transaksi_penjualan`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
