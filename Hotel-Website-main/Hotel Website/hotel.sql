-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 11:34 AM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `members_id` int(11) NOT NULL,
  `members_name` varchar(50) NOT NULL,
  `members_company` varchar(50) NOT NULL,
  `members_age` int(11) NOT NULL,
  `members_shvalue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`members_id`, `members_name`, `members_company`, `members_age`, `members_shvalue`) VALUES
(1, 'ZulHafiz', 'FyzeTechStore', 21, 20);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_summary` varchar(500) NOT NULL,
  `room_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_price`, `room_summary`, `room_category`) VALUES
(1, 'One Bedroom', 350, 'Our Standard Room is the perfect blend of comfort and affordability. Designed with both style and function in mind, our standard room offers guests a comfortable and relaxing space to unwind after a long day of exploring the city.\r\n		The room features a neutral color palette, with warm tones and elegant furnishings. The bed is dressed in high-quality linens, and comes with soft, fluffy pillows for a restful night sleep. The room also includes a flat-screen TV, a work desk, and high-speed Wi-Fi, ', 'Single'),
(2, 'Two Bedroom', 400, 'Our Standard Room is the perfect blend of comfort and affordability. Designed with both style and function in mind, our standard room offers guests a comfortable and relaxing space to unwind after a long day of exploring the city.', 'Double'),
(3, 'Executive Suite', 500, 'The room features a modern design, with a color palette of warm, rich tones. The bed is dressed in high-quality linens, and comes with a plush mattress and soft, fluffy pillows for a restful nights sleep. The room also includes a flat-screen TV, a work desk, and high-speed Wi-Fi, so you can stay connected during your stay.', 'Triple');

-- --------------------------------------------------------

--
-- Table structure for table `room_order`
--

CREATE TABLE `room_order` (
  `order_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_order`
--

INSERT INTO `room_order` (`order_id`, `room_id`, `room_name`, `date_in`, `date_out`, `total_price`) VALUES
(10, 0, 'One Bedroom', '2023-01-20', '2023-01-22', 1400),
(12, 0, 'Two Bedroom', '2023-01-29', '2023-02-03', 2000),
(13, 0, 'Executive Suite', '2023-01-27', '2023-01-30', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staffs_id` int(11) NOT NULL,
  `staffs_name` varchar(50) NOT NULL,
  `staffs_role` varchar(50) NOT NULL,
  `staffs_age` int(11) NOT NULL,
  `staffs_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staffs_id`, `staffs_name`, `staffs_role`, `staffs_age`, `staffs_salary`) VALUES
(1, 'Harith Iskandar', 'CEO', 20, 2100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`members_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_order`
--
ALTER TABLE `room_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staffs_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `members_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `room_order`
--
ALTER TABLE `room_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staffs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
