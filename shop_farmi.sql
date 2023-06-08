-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 05:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_farmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp_admin` varchar(20) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `telp_admin`, `email_admin`, `admin_address`) VALUES
(1, 'Rizalramzi', 'adminpusat', 'admintelkom', '098716233726', 'farmiindustry@gmail.com', 'Perum Starsafira Regency Blok C2/7'),
(2, 'Iqbalamri', 'adminsby', 'adminsby', '081362864906', 'farmishop@gmail.com', 'Jl. Jend Soedirman');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(18, 'Daging Kambing'),
(20, 'Ikan Segar'),
(21, 'Susu'),
(25, 'Daging Sapi'),
(27, 'Daging Ayam');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id_information` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(115) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id_information`, `nama`, `gambar`, `isi`) VALUES
(21, 'Ayam', 'gambar1686181729.png', 'Ayam (Gallus gallus domesticus) adalah binatang unggas yang biasa dipelihara untuk dimanfaatkan daging, telur, dan bulunya. Ayam peliharaan merupakan keturunan langsung dari salah satu subspesies ayam hutan yang dikenal sebagai ayam hutan merah (Gallus gallus) atau ayam bangkiwa (bankiva fowl). Kawin silang antar ras ayam telah menghasilkan ratusan galur unggul atau galur murni dengan bermacam-macam fungsi; yang paling umum adalah ayam potong (untuk dipotong) dan ayam petelur (untuk diambil telurnya). Ayam biasa dapat pula dikawin silang dengan kerabat dekatnya, ayam hutan hijau, yang menghasilkan hibrida mandul yang jantannya dikenal sebagai ayam bekisar.\r\n\r\nAyam memasok dua sumber protein dalam pangan: daging ayam dan telur.\r\n\r\nSudut pandang tradisional peternakan ayam dalam domestikasi spesies ini termaktub dalam Encyclopædia Britannica (2007): \"Manusia pertama mendomestikasi ayam asal India untuk keperluan adu ayam di Asia, Afrika, dan Eropa. Tidak ada perhatian khusus diberikan ke produksi telur atau daging.'),
(22, 'Sapi', 'gambar1686195202.png', 'uauabilaefvieabfvioe');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `price_product` int(11) NOT NULL,
  `desc_product` text NOT NULL,
  `img_product` varchar(100) NOT NULL,
  `status_product` varchar(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `name_product`, `price_product`, `desc_product`, `img_product`, `status_product`, `date_created`) VALUES
(43, 25, 'Daging Sapi Pak Ginta', 48000, 'Daging Sapi segar pilihan mantap dan segar', 'produk1686146379.png', 'Aktif', '2023-06-07 13:59:39'),
(44, 27, 'Ayam potong segar ', 28000, 'daging potong terbaik sedunia mantap dan terpercaya (Presiden Amerika pernah beli disini)', 'produk1686146449.png', 'Aktif', '2023-06-07 14:00:49'),
(45, 18, 'Daging kambing Blitar', 43000, 'Daging kambing 43k/Kg', 'produk1686146524.png', 'Aktif', '2023-06-07 14:02:04'),
(46, 21, 'Susu Full Cream ', 12000, 'susu mantap full cream anjay gurinjay', 'produk1686146568.png', 'Aktif', '2023-06-07 14:02:48'),
(47, 20, 'Ikan segar samudra hindia', 20000, 'ikan segar mantap ges', 'produk1686146627.png', 'Aktif', '2023-06-07 14:03:47'),
(48, 21, 'Greenfields', 20000, 'susu terbaik se indonesia raya', 'produk1686148002.png', 'Aktif', '2023-06-07 14:26:42'),
(49, 27, 'Ayam tiren', 29000, 'AEVOUAEVOLEADFEA', 'image 1.png', 'Aktif', '2023-06-08 03:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id_seller` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `nama_seller` varchar(255) NOT NULL,
  `telp_seller` varchar(255) NOT NULL,
  `alamat_seller` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id_seller`, `id_product`, `nama_seller`, `telp_seller`, `alamat_seller`) VALUES
(13, 48, 'Pak Jamil', '089513622252', 'Perum Surya Mantap'),
(14, 44, 'Pak Anam', '085850646955', 'Jl. Ahmad Yani');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_information`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_ayam` (`id_category`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id_seller`),
  ADD KEY `fk_product` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id_information` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_ayam` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
