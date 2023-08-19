-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 07:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_ease_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `holding_number` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `house_name` varchar(255) DEFAULT NULL,
  `bed_room` int(11) DEFAULT NULL,
  `wash_room` int(11) DEFAULT NULL,
  `balcony` int(11) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `rent_amount` decimal(10,2) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `sub_district` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`holding_number`, `username`, `house_name`, `bed_room`, `wash_room`, `balcony`, `image1`, `image2`, `image3`, `rent_amount`, `district`, `sub_district`, `area`) VALUES
(1, 'admin', 'Cozy Cottage', 2, 1, 1, 'image1.jpg', 'image2.jpg', 'image3.jpg', 120000.00, 'Dhaka', 'Downtown', 'Central Area'),
(2, 'kiraa', 'Spacious Villa', 4, 3, 2, 'villa1.jpg', 'villa2.jpg', 'villa3.jpg', 250000.00, 'Dhaka', 'Suburbia', 'Green Acres'),
(3, 'zxy', 'Modern Apartment', 1, 1, 1, 'apt1.jpg', 'apt2.jpg', 'apt3.jpg', 80000.00, 'Dhaka', 'Uptown', 'Urban Heights'),
(4, 'user104', 'Cosy Studio', 1, 1, 0, 'image1.jpg', 'image2.jpg', 'image3.jpg', 80000.00, 'Dhaka', 'Motijheel', 'Ward no. 34'),
(5, 'user105', 'Luxury Penthouse', 5, 3, 2, 'image1.jpg', 'image2.jpg', 'image3.jpg', 300000.00, 'Dhaka', 'Motijheel', 'Ward no. 35'),
(6, 'user201', 'Charming House', 3, 2, 1, 'image1.jpg', 'image2.jpg', 'image3.jpg', 160000.00, 'Dhaka', 'Dhanmondi', 'Ward no. 47'),
(7, 'user202', 'Elegant Mansion', 5, 4, 3, 'image1.jpg', 'image2.jpg', 'image3.jpg', 450000.00, 'Dhaka', 'Dhanmondi', 'Ward no. 48'),
(11, 'user11', 'House 101', 3, 2, 1, 'image1.jpg', 'image2.jpg', 'image3.jpg', 2000000.00, 'Dhaka', 'Motijheel', 'Ward no. 31'),
(12, 'user12', 'House 102', 4, 3, 2, 'image4.jpg', 'image5.jpg', 'image6.jpg', 2500000.00, 'Dhaka', 'Motijheel', 'Ward no. 32'),
(13, 'user13', 'House 103', 5, 2, 3, 'image7.jpg', 'image8.jpg', 'image9.jpg', 3000000.00, 'Dhaka', 'Motijheel', 'Ward no. 33'),
(14, 'user21', 'House 201', 2, 1, 1, 'image10.jpg', 'image11.jpg', 'image12.jpg', 1500000.00, 'Dhaka', 'Dhanmondi', 'Ward no. 47'),
(15, 'user14', 'House 202', 3, 2, 2, 'image13.jpg', 'image14.jpg', 'image15.jpg', 2000000.00, 'Dhaka', 'Dhanmondi', 'Ward no. 48'),
(16, 'user901', 'House 901', 4, 3, 3, 'image16.jpg', 'image17.jpg', 'image18.jpg', 2500000.00, 'Dhaka', 'Uttara', 'Ward no. 1'),
(17, 'user301', 'House 301', 5, 2, 4, 'image19.jpg', 'image20.jpg', 'image21.jpg', 3000000.00, 'Dhaka', 'Mohammadpur', 'Digha'),
(18, 'user302', 'House 302', 3, 1, 2, 'image22.jpg', 'image23.jpg', 'image24.jpg', 2000000.00, 'Dhaka', 'Mohammadpur', 'Nahata'),
(19, 'user104', 'House 104', 4, 2, 3, 'image25.jpg', 'image26.jpg', 'image27.jpg', 2500000.00, 'Dhaka', 'Motijheel', 'Ward no. 34'),
(20, 'user105', 'House 105', 5, 3, 4, 'image28.jpg', 'image29.jpg', 'image30.jpg', 3000000.00, 'Dhaka', 'Motijheel', 'Ward no. 35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`holding_number`),
  ADD KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `homes`
--
ALTER TABLE `homes`
  ADD CONSTRAINT `homes_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
