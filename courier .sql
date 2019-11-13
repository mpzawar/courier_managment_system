-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 05:38 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `mobno` varchar(255) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `mobno`, `password`) VALUES
(0, 'admin', 'admin@logis.com', '8275333115', '123');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobno` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `email`, `mobno`, `password`, `address`, `pincode`) VALUES
(1, 'Mumbai', 'mumbai_office@gmail.com', '99999999999', 'mumbai', 'Mumbai', '400001'),
(2, 'Pune', 'pune_office@logis.com', '999999999', '123', 'Shivaji Nagar, Pune', '412012'),
(3, 'Jalgaon', 'jalgaon_ho@logis.com', '1526', '123', 'Jalgaon', '425001'),
(4, 'Vasai', 'vasai_ho@logis.com', '8888888888', '123', 'Vasai', '401208'),
(6, 'Jalna', 'jalna_ho@logis.com', '777777777', '123', 'Jalna', '431203');

-- --------------------------------------------------------

--
-- Table structure for table `courier_history`
--

CREATE TABLE `courier_history` (
  `cid` varchar(255) NOT NULL,
  `act_id` int(255) NOT NULL,
  `action` varchar(400) NOT NULL,
  `date` timestamp NOT NULL,
  `current_branch` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_history`
--

INSERT INTO `courier_history` (`cid`, `act_id`, `action`, `date`, `current_branch`, `status`) VALUES
('1', 1, 'Your courier has been Book', '2019-09-02 06:51:25', 'Mumbai', 'Book'),
('1', 2, 'Your Courier has been Confirmed by Mumbai branch', '2019-09-02 06:51:54', 'Mumbai', 'Confirmed'),
('1', 3, 'Your Courier has been assigned to branch Pune by Mumbai branch.', '2019-09-02 06:52:04', 'Pune', 'Assign to Other Branch'),
('2', 1, 'Your courier has been Book', '2019-09-02 06:57:35', 'Mumbai', 'Book'),
('2', 2, 'Your Courier has been Confirmed by Mumbai branch', '2019-09-02 06:58:37', 'Mumbai', 'Confirmed'),
('2', 3, 'Your Courier has been assigned to branch Pune by Mumbai branch.', '2019-09-02 06:59:00', 'Pune', 'Assign to Other Branch'),
('1', 4, 'Your courier has been assigned to  for delivery.', '2019-09-02 08:09:42', 'Pune', 'Out For Delivery'),
('1', 5, 'Your courier has been assigned to  for delivery.', '2019-09-02 08:11:33', 'Pune', 'Out For Delivery'),
('1', 6, 'Your courier has been assigned to  for delivery.', '2019-09-02 08:12:09', 'Pune', 'Out For Delivery'),
('3', 1, 'Your courier has been Book', '2019-09-02 08:28:07', 'Mumbai', 'Book'),
('3', 2, 'Your Courier has been Confirmed by Mumbai branch', '2019-09-02 08:28:38', 'Mumbai', 'Confirmed'),
('3', 3, 'Your Courier has been assigned to branch Pune by Mumbai branch.', '2019-09-02 08:28:45', 'Pune', 'Assign to Other Branch'),
('3', 1, 'Your courier has been assigned to Kamal for delivery.', '2019-09-02 08:29:14', 'Pune', 'Out For Delivery'),
('4', 1, 'Your courier has been Book', '2019-09-02 09:04:13', 'Mumbai', 'Book'),
('4', 2, 'Your Courier has been Confirmed by Mumbai branch', '2019-09-02 09:04:46', 'Mumbai', 'Confirmed'),
('4', 3, 'Your Courier has been assigned to branch Pune by Mumbai branch.', '2019-09-02 09:04:56', 'Pune', 'Assign to Other Branch'),
('5', 1, 'Your courier has been Book', '2019-09-02 09:14:09', 'Jalgaon', 'Book'),
('5', 2, 'Your Courier has been Confirmed by Jalgaon branch', '2019-09-02 09:15:24', 'Jalgaon', 'Confirmed'),
('5', 3, 'Your Courier has been assigned to branch Mumbai by Jalgaon branch.', '2019-09-02 09:15:32', 'Mumbai', 'Assign to Other Branch'),
('5', 4, 'Your Courier has been assigned to branch Vasai by Mumbai branch.', '2019-09-02 09:16:29', 'Vasai', 'Assign to Other Branch'),
('5', 5, 'Your courier has been assigned to Pramod for delivery.', '2019-09-02 09:17:37', 'Vasai', 'Out For Delivery'),
('3', 4, 'Your Courier has been Delivery Reattempt by Mumbai branch', '2019-09-02 09:52:50', 'Mumbai', 'Delivery Reattempt'),
('3', 5, 'Your Courier has been Delivered by Mumbai branch', '2019-09-02 09:53:55', 'Mumbai', 'Delivered'),
('3', 6, 'Your Courier has been Delivered by ', '2019-09-02 10:04:49', '', 'Delivered'),
('3', 7, 'Your Courier has been Delivered by Pramod', '2019-09-02 10:06:22', '', 'Delivered'),
('3', 8, 'Your Courier has been Delivered by Pramod', '2019-09-02 10:11:56', 'Pune', 'Delivered'),
('3', 9, 'Your Courier has been Delivered by Pramod', '2019-09-02 10:12:24', 'Pune', 'Delivered'),
('3', 10, 'Your Courier has been Delivered by Pramod', '2019-09-02 10:12:44', 'Pune', 'Delivered'),
('3', 11, 'Your Courier has been Delivered by Pramod', '2019-09-02 10:14:00', 'Pune', 'Delivered'),
('3', 12, 'Your Courier has been Delivery Reattempt by Pramod', '2019-09-02 10:14:18', 'Pune', 'Delivery Reattempt'),
('3', 13, 'Your Courier has been Delivered by Pramod', '2019-09-02 10:15:12', 'Pune', 'Delivered'),
('3', 13, 'Your Courier has been Delivered by Pramod', '2019-09-02 10:15:32', 'Pune', 'Delivered'),
('5', 6, 'Your Courier has been Delivery Reattempt by Pramod', '2019-09-02 10:23:56', 'Vasai', 'Delivery Reattempt'),
('5', 7, 'Your Courier has been Delivered by Pramod', '2019-09-02 10:24:02', 'Vasai', 'Delivered'),
('6', 1, 'Your courier has been Book', '2019-09-02 10:27:09', 'Vasai', 'Book'),
('6', 2, 'Your Courier has been Confirmed by Vasai branch', '2019-09-02 10:27:55', 'Vasai', 'Confirmed'),
('6', 3, 'Your Courier has been assigned to branch Mumbai by Vasai branch.', '2019-09-02 10:28:04', 'Mumbai', 'Assign to Other Branch'),
('6', 4, 'Your Courier has been assigned to branch Pune by Mumbai branch.', '2019-09-02 10:28:29', 'Pune', 'Assign to Other Branch'),
('6', 5, 'Your Courier has been assigned to branch Jalgaon by Pune branch.', '2019-09-02 10:28:52', 'Jalgaon', 'Assign to Other Branch'),
('6', 6, 'Your courier has been assigned to Babita for delivery.', '2019-09-02 10:29:43', 'Jalgaon', 'Out For Delivery'),
('6', 7, 'Your Courier has been Delivery Reattempt by Babita', '2019-09-02 10:30:10', 'Jalgaon', 'Delivery Reattempt'),
('6', 8, 'Your Courier has been Delivered by Babita', '2019-09-02 10:30:17', 'Jalgaon', 'Delivered'),
('7', 1, 'Your courier has been Book', '2019-09-03 08:36:06', 'Pune', 'Book'),
('7', 2, 'Your Courier has been Confirmed by Pune branch', '2019-09-03 08:37:01', 'Pune', 'Confirmed'),
('7', 3, 'Your Courier has been assigned to branch Mumbai by Pune branch.', '2019-09-03 08:37:34', 'Mumbai', 'Assign to Other Branch'),
('7', 4, 'Your Courier has been assigned to branch Vasai by Mumbai branch.', '2019-09-03 08:38:24', 'Vasai', 'Assign to Other Branch'),
('7', 5, 'Your courier has been assigned to Pramod for delivery.', '2019-09-03 08:39:05', 'Vasai', 'Out For Delivery'),
('7', 6, 'Your Courier has been Delivered by Pramod', '2019-09-03 08:41:46', 'Vasai', 'Delivered'),
('8', 1, 'Your courier has been Book', '2019-09-07 12:16:06', 'Jalna', 'Book'),
('8', 2, 'Your Courier has been Confirmed by Jalna branch', '2019-09-07 12:21:47', 'Jalna', 'Confirmed'),
('8', 3, 'Your Courier has been assigned to branch Pune by Jalna branch.', '2019-09-07 12:22:36', 'Pune', 'Assign to Other Branch'),
('8', 4, 'Your Courier has been assigned to branch Mumbai by Pune branch.', '2019-09-07 12:24:13', 'Mumbai', 'Assign to Other Branch'),
('8', 5, 'Your courier has been assigned to Gokul for delivery.', '2019-09-07 12:24:44', 'Mumbai', 'Out For Delivery'),
('8', 6, 'Your Courier has been Delivery Reattempt by Gokul', '2019-09-07 12:26:06', 'Mumbai', 'Delivery Reattempt'),
('8', 7, 'Your Courier has been Delivered by Gokul', '2019-09-07 12:35:21', 'Mumbai', 'Delivered'),
('9', 1, 'Your courier has been Book', '2019-09-07 12:39:02', 'Pune', 'Book'),
('9', 2, 'Your Courier has been Confirmed by Pune branch', '2019-09-07 12:57:06', 'Pune', 'Confirmed'),
('9', 3, 'Your Courier has been assigned to branch Mumbai by Pune branch.', '2019-09-07 13:00:39', 'Mumbai', 'Assign to Other Branch'),
('9', 4, 'Your courier has been assigned to Gokul for delivery.', '2019-09-07 13:02:26', 'Mumbai', 'Out For Delivery'),
('9', 5, 'Your Courier has been Delivered by Gokul', '2019-09-07 13:07:16', 'Mumbai', 'Delivered'),
('10', 1, 'Your courier has been Book', '2019-09-09 10:01:00', 'Vasai', 'Book'),
('10', 2, 'Your Courier has been Confirmed by Vasai branch', '2019-09-09 10:07:22', 'Vasai', 'Confirmed'),
('10', 3, 'Your Courier has been assigned to branch Mumbai by Vasai branch.', '2019-09-09 10:57:52', 'Mumbai', 'Assign to Other Branch'),
('10', 4, 'Your Courier has been assigned to branch Jalgaon by Mumbai branch.', '2019-09-09 10:58:27', 'Jalgaon', 'Assign to Other Branch'),
('10', 5, 'Your courier has been assigned to rahul for delivery.', '2019-09-09 10:59:59', 'Jalgaon', 'Out For Delivery'),
('11', 1, 'Your courier has been Book', '2019-09-10 08:47:02', 'Mumbai', 'Book'),
('11', 2, 'Your Courier has been Confirmed by Mumbai branch', '2019-09-10 08:47:40', 'Mumbai', 'Confirmed'),
('11', 3, 'Your Courier has been assigned to branch Pune by Mumbai branch.', '2019-09-10 08:47:49', 'Pune', 'Assign to Other Branch'),
('12', 1, 'Your courier has been Book', '2019-09-25 08:49:08', 'Vasai', 'Book'),
('12', 2, 'Your Courier has been Confirmed by Vasai branch', '2019-09-25 08:50:36', 'Vasai', 'Confirmed'),
('12', 3, 'Your Courier has been assigned to branch Mumbai by Vasai branch.', '2019-09-25 08:50:57', 'Mumbai', 'Assign to Other Branch'),
('12', 4, 'Your Courier has been assigned to branch Pune by Mumbai branch.', '2019-09-25 08:51:42', 'Pune', 'Assign to Other Branch'),
('12', 5, 'Your Courier has been assigned to branch Jalna by Pune branch.', '2019-09-25 08:52:18', 'Jalna', 'Assign to Other Branch'),
('12', 6, 'Your courier has been assigned to shubham for delivery.', '2019-09-25 08:53:53', 'Jalna', 'Out For Delivery'),
('13', 1, 'Your courier has been Book', '2019-09-25 10:48:35', 'Vasai', 'Book'),
('13', 2, 'Your Courier has been Confirmed by Vasai branch', '2019-09-25 10:50:52', 'Vasai', 'Confirmed'),
('13', 3, 'Your Courier has been assigned to branch Mumbai by Vasai branch.', '2019-09-25 10:51:01', 'Mumbai', 'Assign to Other Branch'),
('13', 4, 'Your Courier has been assigned to branch Jalgaon by Mumbai branch.', '2019-09-25 10:51:34', 'Jalgaon', 'Assign to Other Branch'),
('13', 5, 'Your courier has been assigned to rahul for delivery.', '2019-09-25 10:52:03', 'Jalgaon', 'Out For Delivery'),
('14', 1, 'Your courier has been Book', '2019-09-30 06:17:17', 'Vasai', 'Book'),
('14', 2, 'Your Courier has been Confirmed by Vasai branch', '2019-09-30 06:19:01', 'Vasai', 'Confirmed'),
('14', 3, 'Your Courier has been assigned to branch Mumbai by Vasai branch.', '2019-09-30 06:20:49', 'Mumbai', 'Assign to Other Branch'),
('14', 4, 'Your Courier has been assigned to branch Jalna by Mumbai branch.', '2019-09-30 06:21:49', 'Jalna', 'Assign to Other Branch'),
('14', 5, 'Your courier has been assigned to mayuri zawar for delivery.', '2019-09-30 06:22:24', 'Jalna', 'Out For Delivery'),
('15', 1, 'Your courier has been Book', '2019-09-30 13:32:58', 'Pune', 'Book'),
('16', 1, 'Your courier has been Book', '2019-09-30 13:36:27', 'Mumbai', 'Book'),
('17', 1, 'Your courier has been Book', '2019-10-03 14:54:51', 'Pune', 'Book'),
('17', 2, 'Your Courier has been Confirmed by Pune branch', '2019-10-03 14:55:45', 'Pune', 'Confirmed'),
('17', 3, 'Your Courier has been assigned to branch Mumbai by Pune branch.', '2019-10-03 14:56:19', 'Mumbai', 'Assign to Other Branch'),
('17', 4, 'Your Courier has been assigned to branch Vasai by Mumbai branch.', '2019-10-03 14:57:04', 'Vasai', 'Assign to Other Branch'),
('17', 5, 'Your courier has been assigned to Pramod for delivery.', '2019-10-03 14:58:07', 'Vasai', 'Out For Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `id` int(255) NOT NULL,
  `bid` int(255) NOT NULL,
  `cid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `sid` int(255) NOT NULL,
  `to_name` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `address` varchar(400) NOT NULL,
  `to_phone` varchar(255) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `del_type` varchar(255) NOT NULL,
  `delivered_by` varchar(255) NOT NULL,
  `delivered_to` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`id`, `bid`, `cid`, `uid`, `sid`, `to_name`, `from_name`, `address`, `to_phone`, `to_email`, `del_type`, `delivered_by`, `delivered_to`, `remarks`, `status`, `date`) VALUES
(1, 2, 4, 1, 0, 'Purva', '', 'Talegaon', '123', 'purva@gmail.con', 'Express Delivery', 'Kamal', 'Purva', 'Your courier has been assigned to Kamal for delivery.', 'Out For Delivery', '2019-09-02 09:09:27'),
(2, 2, 4, 1, 0, 'Purva', '', 'Talegaon', '123', 'purva@gmail.con', 'Express Delivery', 'Kamal', 'Purva', 'Your courier has been assigned to Kamal for delivery.', 'Out For Delivery', '2019-09-02 09:09:45'),
(3, 4, 5, 8, 6, 'Ajay', 'Mayuri Zawar', 'Vasai Thane', '756', 'ajay@gmail.com', 'Normal Delivery', 'Pramod', 'Ajay', 'Your courier has been assigned to Pramod for delivery.', 'Delivered', '2019-09-02 09:17:37'),
(4, 3, 6, 8, 7, 'Jetalal', 'Mayuri Zawar', 'Paldhi', '123', 'jet@gmail.com', 'Express Delivery', 'Babita', 'Jetalal', 'Your courier has been assigned to Babita for delivery.', 'Delivered', '2019-09-02 10:29:43'),
(5, 4, 7, 1, 6, 'ritu', 'Paresh Zawar', 'wakad pune', '1234567890', 'ritu@123', 'Normal Delivery', 'Pramod', 'ritu', 'Your courier has been assigned to Pramod for delivery.', 'Delivered', '2019-09-03 08:39:05'),
(6, 1, 8, 1, 4, 'Test', 'Paresh Zawar', 'Mumbai', '654', 'test@logis.com', 'Express Delivery', 'Gokul', 'Test', 'Your courier has been assigned to Gokul for delivery.', 'Delivered', '2019-09-07 12:24:44'),
(7, 1, 9, 1, 4, 'Laxman', 'Paresh Zawar', 'Vasai', '564', 'laxman@gmail.com', 'Normal Delivery', 'Gokul', 'Laxman', 'Your courier has been assigned to Gokul for delivery.', 'Delivered', '2019-09-07 13:02:26'),
(8, 3, 10, 2, 8, 'pratham', 'Mayuri Zawar', 'main road', '8275333114', 'pratham@gmail.com', 'Normal Delivery', 'rahul', 'pratham', 'Your courier has been assigned to rahul for delivery.', 'Out For Delivery', '2019-09-09 10:59:59'),
(9, 6, 12, 2, 9, 'harsha', 'Mayuri Zawar', 'jalna', '1234567890', 'harsha@gmail.com', 'Normal Delivery', 'shubham', 'harsha', 'Your courier has been assigned to shubham for delivery.', 'Out For Delivery', '2019-09-25 08:53:53'),
(10, 3, 13, 2, 8, 'payal', 'Mayuri Zawar', 'jalgaon', '12345', 'payal@123', 'Normal Delivery', 'rahul', 'payal', 'Your courier has been assigned to rahul for delivery.', 'Out For Delivery', '2019-09-25 10:52:03'),
(11, 6, 14, 2, 16, 'abc', 'Mayuri Zawar', 'jalna', '12345', 'abc1@gmail.com', 'Normal Delivery', 'mayuri zawar', 'abc', 'Your courier has been assigned to mayuri zawar for delivery.', 'Out For Delivery', '2019-09-30 06:22:24'),
(12, 4, 17, 2, 6, 'radhika baheti', 'Mayuri Zawar', 'fire brigade', '1234557', 'radha@123', 'Normal Delivery', 'Pramod', 'radhika baheti', 'Your courier has been assigned to Pramod for delivery.', 'Out For Delivery', '2019-10-03 14:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_details`
--

CREATE TABLE `shipment_details` (
  `id` int(255) NOT NULL,
  `to_name` varchar(255) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `to_phone` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `from_phone` varchar(255) NOT NULL,
  `del_type` varchar(255) NOT NULL,
  `address` varchar(400) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `to_branch` varchar(255) NOT NULL,
  `from_branch` varchar(255) NOT NULL,
  `cur_branch` varchar(255) NOT NULL,
  `to_pincode` varchar(255) NOT NULL,
  `from_pincode` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment_details`
--

INSERT INTO `shipment_details` (`id`, `to_name`, `to_email`, `to_phone`, `from_name`, `from_email`, `from_phone`, `del_type`, `address`, `weight`, `amount`, `to_branch`, `from_branch`, `cur_branch`, `to_pincode`, `from_pincode`, `type`, `uid`, `status`, `date`) VALUES
(1, 'Jayesh Agiwal', 'jayesh@gmail.com', '7588814348', 'Paresh Zawar', 'pareshzawar@live.com', '7588646164', 'Express Delivery', 'Karvey Nagar', '101gm to 200 gm', 90, 'Pune', 'Mumbai', 'Pune', '412012', '400001', 'Documents', '1', 'Out For Delivery', '2019-09-02 06:51:25'),
(2, 'Radhika Mundada', 'radhika@gmail.com', '123', 'Paresh Zawar', 'pareshzawar@live.com', '7588646164', 'Express Delivery', 'Viman Nagar', '1gm to 100 gm', 90, 'Pune', 'Mumbai', 'Pune', '412012', '400001', 'Documents', '1', 'Out For Delivery', '2019-09-02 06:57:35'),
(3, 'Prakash', 'prakash@gmail.com', '789', 'Paresh Zawar', 'pareshzawar@live.com', '7588646164', 'Express Delivery', 'Shakha', '1gm to 100 gm', 120, 'Pune', 'Mumbai', 'Pune', '412012', '400001', 'Documents', '1', 'Delivered', '2019-09-02 08:28:07'),
(4, 'Purva', 'purva@gmail.con', '123', 'Paresh Zawar', 'pareshzawar@live.com', '7588646164', 'Express Delivery', 'Talegaon', '1gm to 100 gm', 90, 'Pune', 'Mumbai', 'Pune', '412012', '400001', 'Documents', '1', 'Out For Delivery', '2019-09-02 09:04:13'),
(5, 'Ajay', 'ajay@gmail.com', '756', 'Mayuri Zawar', 'mayurizawar@outlook.com', '8275333115', 'Normal Delivery', 'Vasai Thane', 'Above 1 kg', 500, 'Mumbai', 'Jalgaon', 'Vasai', '400001', '425001', 'Cloths and Gifts', '8', 'Delivered', '2019-09-02 09:14:09'),
(6, 'Jetalal', 'jet@gmail.com', '123', 'Mayuri Zawar', 'mayurizawar@outlook.com', '8275333115', 'Express Delivery', 'Paldhi', '1gm to 100 gm', 90, 'Jalgaon', 'Vasai', 'Jalgaon', '425001', '401208', 'Documents', '8', 'Delivered', '2019-09-02 10:27:09'),
(7, 'ritu', 'ritu@123', '1234567890', 'Paresh Zawar', 'pareshzawar@live.com', '7588646164', 'Normal Delivery', 'wakad pune', '101gm to 200 gm', 123, 'Vasai', 'Pune', 'Vasai', '401208', '412012', 'Cloths and Gifts', '1', 'Delivered', '2019-09-03 08:36:06'),
(8, 'Test', 'test@logis.com', '654', 'Paresh Zawar', 'pareshzawar@live.com', '7588646164', 'Express Delivery', 'Mumbai', '201gm to 500 gm', 250, 'Mumbai', 'Jalna', 'Mumbai', '400001', '431203', 'Chemicals', '1', 'Delivered', '2019-09-07 12:16:06'),
(9, 'Laxman', 'laxman@gmail.com', '564', 'Paresh Zawar', 'pareshzawar@live.com', '7588646164', 'Normal Delivery', 'Vasai', '201gm to 500 gm', 899, 'Mumbai', 'Pune', 'Mumbai', '400001', '412012', 'Cloths and Gifts', '1', 'Delivered', '2019-09-07 12:39:02'),
(10, 'pratham', 'pratham@gmail.com', '8275333114', 'Mayuri Zawar', 'mayurimundada75@gmail.com', '8275', 'Normal Delivery', 'main road', '1gm to 100 gm', 60, 'Jalgaon', 'Vasai', 'Jalgaon', '425001', '401208', 'Documents', '2', 'Out For Delivery', '2019-09-09 10:01:00'),
(11, 'abc', 'abc@gmail.com', '45125864', 'Mayuri Zawar', 'mayurimundada75@gmail.com', '8275', 'Normal Delivery', 'jalgaon', '1gm to 100 gm', 56, 'Jalgaon', 'Mumbai', 'Pune', '425001', '400001', 'Documents', '2', 'Assign to Other Branch', '2019-09-10 08:47:02'),
(12, 'harsha', 'harsha@gmail.com', '1234567890', 'Mayuri Zawar', 'mayurimundada75@gmail.com', '8275', 'Normal Delivery', 'jalna', '1gm to 100 gm', 120, 'Jalna', 'Vasai', 'Jalna', '431203', '401208', 'Documents', '2', 'Out For Delivery', '2019-09-25 08:49:08'),
(13, 'payal', 'payal@123', '12345', 'Mayuri Zawar', 'mayurimundada75@gmail.com', '8275', 'Normal Delivery', 'jalgaon', '1gm to 100 gm', 123, 'Jalgaon', 'Vasai', 'Jalgaon', '425001', '401208', 'Documents', '2', 'Out For Delivery', '2019-09-25 10:48:35'),
(14, 'abc', 'abc1@gmail.com', '12345', 'Mayuri Zawar', 'mayurimundada75@gmail.com', '8275333115', 'Normal Delivery', 'jalna', '1gm to 100 gm', 120, 'Jalna', 'Vasai', 'Jalna', '431203', '401208', 'Documents', '2', 'Out For Delivery', '2019-09-30 06:17:17'),
(15, 'Amruta', 'amruta@gmail.com', '123', 'Mayuri Zawar', 'mayurimundada75@gmail.com', '8275333115', 'Normal Delivery', 'mumbai', '1gm to 100 gm', 123, 'Mumbai', 'Pune', 'Pune', '400001', '412012', 'Documents', '2', 'Book', '2019-09-30 13:32:58'),
(16, 'aas', 'new@gmail.com', '1234', 'Mayuri Zawar', 'mayurimundada75@gmail.com', '8275333115', 'Normal Delivery', 'df', '1gm to 100 gm', 123, 'Mumbai', 'Mumbai', 'Mumbai', '400001', '400001', 'Documents', '2', 'Book', '2019-09-30 13:36:27'),
(17, 'radhika baheti', 'radha@123', '1234557', 'Mayuri Zawar', 'mayurimundada75@gmail.com', '8275333115', 'Normal Delivery', 'fire brigade', '1gm to 100 gm', 120, 'Vasai', 'Pune', 'Vasai', '401208', '412012', 'Documents', '2', 'Out For Delivery', '2019-10-03 14:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `bid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `mobile`, `address`, `bid`, `password`) VALUES
(4, 'Gokul', 'gokul@logis.com', '123', '123', '1', '123'),
(3, 'Kamal', 'kamal@logis.com', '758', 'Ok', '2', ''),
(5, 'Husain', 'husain@logis.com', '123', 'Pune', '2', '123'),
(6, 'Pramod', 'pramod@logis.com', '123', 'Vasai', '4', '123'),
(7, 'Babita', 'babita@logis.com', '689', 'Jalgaon', '3', '123'),
(8, 'rahul', 'rahul@logis.com', '56457757', 'jalgaon', '3', '123'),
(16, 'mayuri zawar', 'minis@minis', '8275333115', 'jalna', '6', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `mobno` varchar(255) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobno`, `password`) VALUES
(1, 'Paresh Zawar', 'pareshzawar@live.com', '7588646164', '123'),
(2, 'Mayuri Zawar', 'mayurimundada75@gmail.com', '8275333115', '123'),
(3, 'Prakash Ladumor', 'prakash@gmail.com', '9999999999', '123'),
(4, 'Prakash Ladumor', 'prakash@gmail.com', '9999999999', '123'),
(5, 'Prakash Ladumor', 'prakash@gmail.com', '99999999999', '123'),
(13, 'suraj', 'suraj@gmail.com', '1234', '123'),
(8, 'Mayuri Zawar', 'mayurizawar@outlook.com', '8275333115', '123'),
(11, 'minis', 'minis@logis.com', '12345', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment_details`
--
ALTER TABLE `shipment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `shipment_details`
--
ALTER TABLE `shipment_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
