-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 02:36 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(22) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `firstname`, `lastname`, `username`, `email`, `password`, `address`, `phone`, `image`) VALUES
(8, 'Mirza', 'Habul', 'admin', 'mirza.habul@telemach.ba', '$2y$10$C6V0UMpUmxoHiVfd1DmHpeDMiFSaDClfmErLVdrdmrP/5Wl3PQwzS', 'Envera Šehovića 60', '033 111 222', 'logo.png'),
(9, 'Alen', 'Garibovic', 'abc', 'a.garibovic95@gmail.com', '$2y$10$am1sBEfwHuyjNVgT/8BNdOZIyEMtII49WiEVfnUKNke4y3r.qRLWu', 'Envera Šehovića 50', '+44061546700', '1594508700252.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `image`, `first_name`, `last_name`, `email`, `address`, `phone`) VALUES
(1, '7a6409a35f8223f856dc99651cb33cb1_XL.jpg', 'Kareem', 'Thornton-Dewhirst', 'kthorntondewhirst0@oracle.com', '63 Farwell Court', '192-581-6779'),
(2, 'avatar.jpg', 'Izak', 'Garoghan', 'igaroghan1@youtube.com', '7064 Pine View Trail', '824-735-5593'),
(3, 'slika.jfif', 'Fonz', 'Hadenton', 'fhadenton2@furl.net', '0734 Doe Crossing Pass', '181-867-7956'),
(4, 'logo1.jpg', 'Gray', 'Skain', 'gskain3@irs.gov', '33 Donald Crossing', '485-992-3162'),
(5, 'about_us.png', 'Fredelia', 'Sorsby', 'fsorsby4@ebay.com', '5 Gateway Road', '207-140-5266'),
(6, 'download.png', 'Ali', 'Jurisch', 'ajurisch5@independent.co.uk', '0 Merchant Trail', '619-288-7477'),
(7, 'logo.png', 'Reynolds', 'Renforth', 'rrenforth6@globo.com', '315 Union Junction', '187-533-4815'),
(8, '1594508700252.jfif', 'Worden', 'McNicol', 'wmcnicol7@uol.com.br', '5502 Vahlen Road', '578-697-6956'),
(9, 'miki.jpg', 'Tamra', 'Winspeare', 'twinspeare8@elpais.com', '4987 Moland Park', '852-375-6664'),
(10, 'logo-blk.png', 'Chalmers', 'Zorn', 'czorn9@etsy.com', '137 Bartelt Center', '662-911-5537'),
(11, '7a6409a35f8223f856dc99651cb33cb1_XL.jpg', 'Drucy', 'Megahey', 'dmegaheya@usatoday.com', '6 Mandrake Pass', '429-839-1164'),
(12, 'avatar.jpg', 'Jobina', 'Darton', 'jdartonb@paginegialle.it', '26 Thierer Center', '271-572-8425'),
(13, 'miki.jpg', 'Yorgo', 'Banister', 'ybanisterc@infoseek.co.jp', '53406 Sycamore Crossing', '398-374-5594'),
(14, 'miki.jpg', 'Noak', 'Powys', 'npowysd@ustream.tv', '95 Little Fleur Circle', '373-570-5249'),
(15, '7a6409a35f8223f856dc99651cb33cb1_XL.jpg', 'Abby', 'Rau', 'araue@feedburner.com', '755 Sachs Place', '244-239-0360'),
(16, 'car.jpg', 'Daveta', 'Waberer', 'dwabererf@networkadvertising.org', '64 Stuart Place', '807-992-0290'),
(17, 'miki.jpg', 'Mordecai', 'Oiller', 'moillerg@alibaba.com', '0 Stuart Center', '349-916-5644'),
(18, 'car.jpg', 'Tab', 'Tierney', 'ttierneyh@mozilla.com', '81 Vahlen Junction', '777-924-1855'),
(19, 'miki.jpg', 'Xenia', 'Hamman', 'xhammani@chronoengine.com', '855 Anhalt Drive', '386-946-9265'),
(20, '7a6409a35f8223f856dc99651cb33cb1_XL.jpg', 'Alameda', 'Golthorpp', 'agolthorppj@intel.com', '24 Rutledge Circle', '108-990-3980');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
