-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 10:19 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `holding_number` int(11) DEFAULT NULL,
  `family` varchar(3) DEFAULT NULL,
  `male_bechelor` varchar(3) DEFAULT NULL,
  `female_bechelor` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`holding_number`, `family`, `male_bechelor`, `female_bechelor`) VALUES
(1, 'yes', 'yes', 'yes'),
(2, 'yes', 'yes', 'no'),
(3, 'yes', 'yes', 'yes'),
(4, 'yes', 'yes', 'yes'),
(5, 'yes', 'yes', 'no'),
(6, 'yes', 'yes', 'yes'),
(7, 'yes', 'yes', 'yes'),
(8, 'yes', 'yes', 'yes'),
(9, 'yes', 'yes', 'yes');

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
  `area` varchar(255) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`holding_number`, `username`, `house_name`, `bed_room`, `wash_room`, `balcony`, `image1`, `image2`, `image3`, `rent_amount`, `district`, `sub_district`, `area`, `status`, `address`) VALUES
(1, 'admin', 'afads', 3, 2, 2, 'download (1).jpeg', 'download (1).jpeg', 'download.jpeg', 15000.00, 'Dhaka', 'Badda', 'Satarkul', 'nr', 'asdfasdfsaf'),
(2, 'admin', 'fasfasf', 3, 2, 2, 'home-office-types-of-rooms-in-a-house-1024x576.jpg', 'images (1).jpeg', 'images (2).jpeg', 20000.00, 'Dhaka', 'Badda', 'Notunbazar', 'nr', 'asdfasdfsaf'),
(3, 'admin', 'wterter', 3, 2, 2, 'images.jpeg', 'images (2).jpeg', 'images (3).jpeg', 15000.00, 'Dhaka', 'Badda', 'Notunbazar', 'nr', 'asdfasdfsaf'),
(4, 'admin', 'afads', 3, 2, 2, 'download (1).jpeg', 'download (1).jpeg', 'download.jpeg', 20000.00, 'Dhaka', 'Badda', 'Notunbazar', 'nr', 'asdfasdfsaf'),
(5, 'admin', 'afads', 3, 2, 2, 'images (1).jpeg', 'images (2).jpeg', 'images (3).jpeg', 20000.00, 'Dhaka', 'Badda', 'Notunbazar', 'nr', 'asdfasdfsaf'),
(6, 'admin', 'afads', 3, 2, 2, 'images (2).jpeg', 'download (1).jpeg', 'download.jpeg', 20000.00, 'Dhaka', 'Badda', 'Notunbazar', 'nr', 'asdfasdfsaf'),
(7, 'evan', 'afads', 3, 3, 2, 'download (1).jpeg', 'home-office-types-of-rooms-in-a-house-1024x576.jpg', 'images (4).jpeg', 20000.00, 'Dhaka', 'Badda', 'Satarkul', 'nr', 'asdfasdfsaf'),
(8, 'evan', 'afads', 3, 3, 2, 'download (1).jpeg', 'home-office-types-of-rooms-in-a-house-1024x576.jpg', 'home-office-types-of-rooms-in-a-house-1024x576.jpg', 15000.00, 'Dhaka', 'Badda', 'Satarkul', 'nr', 'asdfasdfsaf'),
(9, 'evan', 'afads', 3, 3, 2, 'download (1).jpeg', 'home-office-types-of-rooms-in-a-house-1024x576.jpg', 'images (1).jpeg', 20000.00, 'Dhaka', 'Gulshan', 'Gulshan1', 'nr', 'asdfasdfsaf');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `user` varchar(100) NOT NULL,
  `ruser` varchar(100) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`user`, `ruser`, `amount`, `month`, `year`) VALUES
('admin', 'evan', 500, 'February', '2014'),
('admin', 'evan', 200, 'January', '2014'),
('admin', 'evan', 500, 'March', '2014');

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `username` varchar(255) NOT NULL,
  `holding_number` int(11) NOT NULL,
  `rent_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `username` varchar(255) NOT NULL,
  `holding_number` int(11) NOT NULL,
  `review` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`username`, `holding_number`, `review`) VALUES
('admin', 1, 'Good'),
('admin', 2, 'Good environment');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `sub_district` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `district`, `sub_district`, `area`, `balance`) VALUES
('admin', 'admin@gmail.com', 'admin', 'dhaka', 'badda', 'satarkul', 1000),
('davidwilliams', 'davidwilliams@example.com', 'password1213', 'Dhaka', 'Gulshan', 'Word no. 18', 0),
('evan', 'evan@gmail.com', 'evan', 'dhaka', 'dhaka', 'dhaka', 1300),
('johndoe', 'johndoe@example.com', 'password123', 'Dhaka', 'Motijheel', 'Ward no. 31', 0),
('kiraa', 'ornill108@gmail.com', '12345', 'dhaka', 'Gulshan', 'gunshan 2', 0),
('maryjones', 'maryjones@example.com', 'password1011', 'Dhaka', 'Tejgaon', 'Ward no. 88', 0),
('robertsmith', 'robertsmith@example.com', 'password789', 'Dhaka', 'Mohammadpur', 'Digha', 0),
('user1', 'user1@example.com', 'password1', 'Dhaka', 'Motijheel', 'Ward no. 31', 0),
('user10', 'user10@example.com', 'password10', 'Dhaka', 'Uttara', 'Ward no. 1', 0),
('user101', 'user101@example.com', 'password101', 'Dhaka', 'Motijheel', 'Ward no. 31', 0),
('user102', 'user102@example.com', 'password102', 'Dhaka', 'Motijheel', 'Ward no. 32', 0),
('user103', 'user103@example.com', 'password103', 'Dhaka', 'Motijheel', 'Ward no. 33', 0),
('user104', 'user104@example.com', 'password104', 'Dhaka', 'Motijheel', 'Ward no. 34', 0),
('user105', 'user105@example.com', 'password105', 'Dhaka', 'Motijheel', 'Ward no. 35', 0),
('user11', 'user11@example.com', 'password11', 'Dhaka', 'Biman Bandar', 'Word 35', 0),
('user12', 'user12@example.com', 'password12', 'Dhaka', 'Paltan', 'Word 643', 0),
('user13', 'user13@example.com', 'password13', 'Dhaka', 'Turag', 'eord 74', 0),
('user14', 'user14@example.com', 'password14', 'Dhaka', 'Jatrabari', 'Word 36', 0),
('user15', 'user15@example.com', 'password15', 'Dhaka', 'Rampura', 'Word 345', 0),
('user16', 'user16@example.com', 'password16', 'Dhaka', 'Mohammadpur', 'Nahata', 0),
('user17', 'user17@example.com', 'password17', 'Dhaka', 'Mohammadpur', 'Palashbaria', 0),
('user18', 'user18@example.com', 'password18', 'Dhaka', 'Mohammadpur', 'Babukhali', 0),
('user19', 'user19@example.com', 'password19', 'Dhaka', 'Mohammadpur', 'Balidia', 0),
('user2', 'user2@example.com', 'password2', 'Dhaka', 'Dhanmondi', 'Ward no. 47', 0),
('user20', 'user20@example.com', 'password20', 'Dhaka', 'Mohammadpur', 'Binodepur', 0),
('user201', 'user201@example.com', 'password201', 'Dhaka', 'Dhanmondi', 'Ward no. 47', 0),
('user202', 'user202@example.com', 'password202', 'Dhaka', 'Dhanmondi', 'Ward no. 48', 0),
('user203', 'user203@example.com', 'password203', 'Dhaka', 'Dhanmondi', 'Ward no. 49', 0),
('user21', 'user21@example.com', 'password21', 'Dhaka', 'Mohammadpur', 'Mohammadpur', 0),
('user22', 'user22@example.com', 'password22', 'Dhaka', 'Mohammadpur', 'Rajapur', 0),
('user23', 'user23@example.com', 'password23', 'Dhaka', 'Tejgaon', 'Word 89', 0),
('user24', 'user24@example.com', 'password24', 'Dhaka', 'Tejgaon', 'Word 90', 0),
('user25', 'user25@example.com', 'password25', 'Dhaka', 'Gulshan', 'word no 19', 0),
('user26', 'user26@example.com', 'password26', 'Dhaka', 'Gulshan', 'word no 20', 0),
('user27', 'user27@example.com', 'password27', 'Dhaka', 'Mirpur', 'Ambaria', 0),
('user28', 'user28@example.com', 'password28', 'Dhaka', 'Mirpur', 'Fulbaria', 0),
('user29', 'user29@example.com', 'password29', 'Dhaka', 'Mirpur', 'Malihad', 0),
('user3', 'user3@example.com', 'password3', 'Dhaka', 'Mohammadpur', 'Digha', 0),
('user30', 'user30@example.com', 'password30', 'Dhaka', 'Cantonment', 'Word 98', 0),
('user301', 'user301@example.com', 'password301', 'Dhaka', 'Mohammadpur', 'Digha', 0),
('user302', 'user302@example.com', 'password302', 'Dhaka', 'Mohammadpur', 'Nahata', 0),
('user303', 'user303@example.com', 'password303', 'Dhaka', 'Mohammadpur', 'Palashbaria', 0),
('user304', 'user304@example.com', 'password304', 'Dhaka', 'Mohammadpur', 'Babukhali', 0),
('user31', 'user31@example.com', 'password31', 'Dhaka', 'Demra', 'Matuail', 0),
('user32', 'user32@example.com', 'password32', 'Dhaka', 'Demra', 'Saralia', 0),
('user33', 'user33@example.com', 'password33', 'Dhaka', 'Badda', 'Word no 18', 0),
('user34', 'user34@example.com', 'password34', 'Dhaka', 'Uttara', 'Ward no. 2', 0),
('user35', 'user35@example.com', 'password35', 'Dhaka', 'Biman Bandar', 'Word 97', 0),
('user36', 'user36@example.com', 'password36', 'Dhaka', 'Paltan', 'Word 45', 0),
('user37', 'user37@example.com', 'password37', 'Dhaka', 'Turag', 'eord 74', 0),
('user38', 'user38@example.com', 'password38', 'Dhaka', 'Turag', '97', 0),
('user39', 'user39@example.com', 'password39', 'Dhaka', 'Jatrabari', 'Word 96', 0),
('user4', 'user4@example.com', 'password4', 'Dhaka', 'Tejgaon', 'Word 88', 0),
('user40', 'user40@example.com', 'password40', 'Dhaka', 'Rampura', 'Word 75', 0),
('user401', 'user401@example.com', 'password401', 'Dhaka', 'Tejgaon', 'Word no 88', 0),
('user402', 'user402@example.com', 'password402', 'Dhaka', 'Tejgaon', 'Word no 89', 0),
('user41', 'user41@example.com', 'password41', 'Dhaka', 'Rampura', 'Word 345', 0),
('user42', 'user42@example.com', 'password42', 'Dhaka', 'Motijheel', 'Ward no. 32', 0),
('user43', 'user43@example.com', 'password43', 'Dhaka', 'Motijheel', 'Ward no. 33', 0),
('user44', 'user44@example.com', 'password44', 'Dhaka', 'Motijheel', 'Ward no. 34', 0),
('user45', 'user45@example.com', 'password45', 'Dhaka', 'Motijheel', 'Ward no. 35', 0),
('user5', 'user5@example.com', 'password5', 'Dhaka', 'Gulshan', 'Word no 18', 0),
('user501', 'user501@example.com', 'password501', 'Dhaka', 'Gulshan', 'Word no 18', 0),
('user502', 'user502@example.com', 'password502', 'Dhaka', 'Gulshan', 'Word no 19', 0),
('user6', 'user6@example.com', 'password6', 'Dhaka', 'Mirpur', 'Ambaria', 0),
('user601', 'user601@example.com', 'password601', 'Dhaka', 'Mirpur', 'Ambaria', 0),
('user602', 'user602@example.com', 'password602', 'Dhaka', 'Mirpur', 'Fulbaria', 0),
('user7', 'user7@example.com', 'password7', 'Dhaka', 'Cantonment', 'Word 15', 0),
('user8', 'user8@example.com', 'password8', 'Dhaka', 'Demra', 'demra', 0),
('user801', 'user801@example.com', 'password801', 'Dhaka', 'Rampura', 'Word 345', 0),
('user802', 'user802@example.com', 'password802', 'Dhaka', 'Rampura', 'Word 75', 0),
('user9', 'user9@example.com', 'password9', 'Dhaka', 'Badda', 'Word no 17', 0),
('user901', 'user901@example.com', 'password901', 'Dhaka', 'Uttara', 'Ward no. 1', 0),
('zxy', 'zxy@gmail.com', 'zxy', 'dhaka', 'Uttara', 'uttara-2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD KEY `fk_h` (`holding_number`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`holding_number`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`user`,`ruser`,`month`,`year`),
  ADD KEY `fk_userr` (`ruser`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD KEY `fk_home` (`holding_number`),
  ADD KEY `fk_u` (`username`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`username`,`holding_number`),
  ADD KEY `fk_homes` (`holding_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_h` FOREIGN KEY (`holding_number`) REFERENCES `homes` (`holding_number`);

--
-- Constraints for table `homes`
--
ALTER TABLE `homes`
  ADD CONSTRAINT `homes_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_userd` FOREIGN KEY (`user`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `fk_userr` FOREIGN KEY (`ruser`) REFERENCES `users` (`username`);

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `fk_home` FOREIGN KEY (`holding_number`) REFERENCES `homes` (`holding_number`),
  ADD CONSTRAINT `fk_u` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_homes` FOREIGN KEY (`holding_number`) REFERENCES `homes` (`holding_number`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
