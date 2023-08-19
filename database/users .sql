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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `sub_district` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `district`, `sub_district`, `area`) VALUES
('67i67i', '76i67i67i@gmail.com', 'hjkjhkhj', 'dhaka', 'badda', 'satarkul'),
('admin', 'admin@gmail.com', 'admin', 'dhaka', 'badda', 'satarkul'),
('asdfg', 'rgretret@gmail.com', 'asdfgh', 'dhaka', 'badda', 'satarkul'),
('davidwilliams', 'davidwilliams@example.com', 'password1213', 'Dhaka', 'Gulshan', 'Word no. 18'),
('johndoe', 'johndoe@example.com', 'password123', 'Dhaka', 'Motijheel', 'Ward no. 31'),
('kiraa', 'ornill108@gmail.com', '12345', 'dhaka', 'Gulshan', 'gunshan 2'),
('maryjones', 'maryjones@example.com', 'password1011', 'Dhaka', 'Tejgaon', 'Ward no. 88'),
('robertsmith', 'robertsmith@example.com', 'password789', 'Dhaka', 'Mohammadpur', 'Digha'),
('user1', 'user1@example.com', 'password1', 'Dhaka', 'Motijheel', 'Ward no. 31'),
('user10', 'user10@example.com', 'password10', 'Dhaka', 'Uttara', 'Ward no. 1'),
('user101', 'user101@example.com', 'password101', 'Dhaka', 'Motijheel', 'Ward no. 31'),
('user102', 'user102@example.com', 'password102', 'Dhaka', 'Motijheel', 'Ward no. 32'),
('user103', 'user103@example.com', 'password103', 'Dhaka', 'Motijheel', 'Ward no. 33'),
('user104', 'user104@example.com', 'password104', 'Dhaka', 'Motijheel', 'Ward no. 34'),
('user105', 'user105@example.com', 'password105', 'Dhaka', 'Motijheel', 'Ward no. 35'),
('user11', 'user11@example.com', 'password11', 'Dhaka', 'Biman Bandar', 'Word 35'),
('user12', 'user12@example.com', 'password12', 'Dhaka', 'Paltan', 'Word 643'),
('user13', 'user13@example.com', 'password13', 'Dhaka', 'Turag', 'eord 74'),
('user14', 'user14@example.com', 'password14', 'Dhaka', 'Jatrabari', 'Word 36'),
('user15', 'user15@example.com', 'password15', 'Dhaka', 'Rampura', 'Word 345'),
('user16', 'user16@example.com', 'password16', 'Dhaka', 'Mohammadpur', 'Nahata'),
('user17', 'user17@example.com', 'password17', 'Dhaka', 'Mohammadpur', 'Palashbaria'),
('user18', 'user18@example.com', 'password18', 'Dhaka', 'Mohammadpur', 'Babukhali'),
('user19', 'user19@example.com', 'password19', 'Dhaka', 'Mohammadpur', 'Balidia'),
('user2', 'user2@example.com', 'password2', 'Dhaka', 'Dhanmondi', 'Ward no. 47'),
('user20', 'user20@example.com', 'password20', 'Dhaka', 'Mohammadpur', 'Binodepur'),
('user201', 'user201@example.com', 'password201', 'Dhaka', 'Dhanmondi', 'Ward no. 47'),
('user202', 'user202@example.com', 'password202', 'Dhaka', 'Dhanmondi', 'Ward no. 48'),
('user203', 'user203@example.com', 'password203', 'Dhaka', 'Dhanmondi', 'Ward no. 49'),
('user21', 'user21@example.com', 'password21', 'Dhaka', 'Mohammadpur', 'Mohammadpur'),
('user22', 'user22@example.com', 'password22', 'Dhaka', 'Mohammadpur', 'Rajapur'),
('user23', 'user23@example.com', 'password23', 'Dhaka', 'Tejgaon', 'Word 89'),
('user24', 'user24@example.com', 'password24', 'Dhaka', 'Tejgaon', 'Word 90'),
('user25', 'user25@example.com', 'password25', 'Dhaka', 'Gulshan', 'word no 19'),
('user26', 'user26@example.com', 'password26', 'Dhaka', 'Gulshan', 'word no 20'),
('user27', 'user27@example.com', 'password27', 'Dhaka', 'Mirpur', 'Ambaria'),
('user28', 'user28@example.com', 'password28', 'Dhaka', 'Mirpur', 'Fulbaria'),
('user29', 'user29@example.com', 'password29', 'Dhaka', 'Mirpur', 'Malihad'),
('user3', 'user3@example.com', 'password3', 'Dhaka', 'Mohammadpur', 'Digha'),
('user30', 'user30@example.com', 'password30', 'Dhaka', 'Cantonment', 'Word 98'),
('user301', 'user301@example.com', 'password301', 'Dhaka', 'Mohammadpur', 'Digha'),
('user302', 'user302@example.com', 'password302', 'Dhaka', 'Mohammadpur', 'Nahata'),
('user303', 'user303@example.com', 'password303', 'Dhaka', 'Mohammadpur', 'Palashbaria'),
('user304', 'user304@example.com', 'password304', 'Dhaka', 'Mohammadpur', 'Babukhali'),
('user31', 'user31@example.com', 'password31', 'Dhaka', 'Demra', 'Matuail'),
('user32', 'user32@example.com', 'password32', 'Dhaka', 'Demra', 'Saralia'),
('user33', 'user33@example.com', 'password33', 'Dhaka', 'Badda', 'Word no 18'),
('user34', 'user34@example.com', 'password34', 'Dhaka', 'Uttara', 'Ward no. 2'),
('user35', 'user35@example.com', 'password35', 'Dhaka', 'Biman Bandar', 'Word 97'),
('user36', 'user36@example.com', 'password36', 'Dhaka', 'Paltan', 'Word 45'),
('user37', 'user37@example.com', 'password37', 'Dhaka', 'Turag', 'eord 74'),
('user38', 'user38@example.com', 'password38', 'Dhaka', 'Turag', '97'),
('user39', 'user39@example.com', 'password39', 'Dhaka', 'Jatrabari', 'Word 96'),
('user4', 'user4@example.com', 'password4', 'Dhaka', 'Tejgaon', 'Word 88'),
('user40', 'user40@example.com', 'password40', 'Dhaka', 'Rampura', 'Word 75'),
('user401', 'user401@example.com', 'password401', 'Dhaka', 'Tejgaon', 'Word no 88'),
('user402', 'user402@example.com', 'password402', 'Dhaka', 'Tejgaon', 'Word no 89'),
('user41', 'user41@example.com', 'password41', 'Dhaka', 'Rampura', 'Word 345'),
('user42', 'user42@example.com', 'password42', 'Dhaka', 'Motijheel', 'Ward no. 32'),
('user43', 'user43@example.com', 'password43', 'Dhaka', 'Motijheel', 'Ward no. 33'),
('user44', 'user44@example.com', 'password44', 'Dhaka', 'Motijheel', 'Ward no. 34'),
('user45', 'user45@example.com', 'password45', 'Dhaka', 'Motijheel', 'Ward no. 35'),
('user5', 'user5@example.com', 'password5', 'Dhaka', 'Gulshan', 'Word no 18'),
('user501', 'user501@example.com', 'password501', 'Dhaka', 'Gulshan', 'Word no 18'),
('user502', 'user502@example.com', 'password502', 'Dhaka', 'Gulshan', 'Word no 19'),
('user6', 'user6@example.com', 'password6', 'Dhaka', 'Mirpur', 'Ambaria'),
('user601', 'user601@example.com', 'password601', 'Dhaka', 'Mirpur', 'Ambaria'),
('user602', 'user602@example.com', 'password602', 'Dhaka', 'Mirpur', 'Fulbaria'),
('user7', 'user7@example.com', 'password7', 'Dhaka', 'Cantonment', 'Word 15'),
('user8', 'user8@example.com', 'password8', 'Dhaka', 'Demra', 'demra'),
('user801', 'user801@example.com', 'password801', 'Dhaka', 'Rampura', 'Word 345'),
('user802', 'user802@example.com', 'password802', 'Dhaka', 'Rampura', 'Word 75'),
('user9', 'user9@example.com', 'password9', 'Dhaka', 'Badda', 'Word no 17'),
('user901', 'user901@example.com', 'password901', 'Dhaka', 'Uttara', 'Ward no. 1'),
('zxy', 'zxy@gmail.com', 'zxy', 'dhaka', 'Uttara', 'uttara-2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
