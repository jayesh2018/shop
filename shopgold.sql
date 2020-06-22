-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 09:11 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopgold`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-inactive 1-active',
  `createdon` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `status`, `createdon`) VALUES
(1, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2020-06-20 11:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `user_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `ifsc` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `bank` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`user_id`, `name`, `ifsc`, `account`, `branch`, `bank`) VALUES
(12, 'Dimple', '2', '1', '1', '1'),
(7, 'Satyam shukla', 'sbin0012494', '20303110499', '12494', 'state bank of india'),
(10, 'VIKAS', 'IOBA0001451', '145101000003265', 'KHURJA', 'INDIAN OVERSEAS'),
(35, 'Padma devi markam ', 'SBIN0002827', '30512767848', 'BANKI MONGRA ', 'SBI '),
(15, 'Tamim Akhtar', 'SBIN0003549', '36690968239', 'Basopatti', 'STATE BANK OF INDIA'),
(76, 'Rajkumar mahor ', 'SBIN0031769 ', '61216226102', '31769', 'State bank of India '),
(1018, 'Meena Bharat Pawar ', 'KKBK0001388', '4813402457', 'No ', 'Kotak Mahindra Bank'),
(40, 'Tajhussain', 'IBKL0002111', '2111104000036838', 'Whashamenpet', 'IDBI');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `ProductId` varchar(255) NOT NULL,
  `MobileNo` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `balance`) VALUES
(1, 'vaibhav banerjee', 18520);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_address_id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `address` text NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`customer_address_id`, `full_name`, `phone_number`, `pin_code`, `state`, `city`, `address`, `customer_id`) VALUES
(5, 'Vaibhav Banerjee', 7505136, 282006, 'delho', 'delhi', 'jkjnklm;l;', 1),
(8, 'VIKAS KUMAR VERMA', 9927960300, 203131, 'UP', 'KHURJS', 'KHURJA', 10),
(9, '', 0, 0, '', '', '', 8),
(10, '', 0, 0, '', '', '', 1018);

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `choice` varchar(10) NOT NULL,
  `room` varchar(10) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_history`
--

CREATE TABLE `purchased_history` (
  `customer_id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `choice` varchar(20) NOT NULL,
  `room` varchar(10) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased_history`
--

INSERT INTO `purchased_history` (`customer_id`, `money`, `choice`, `room`, `date_added`) VALUES
(1, 100, 'violet', '', '2020-06-14 13:27:01'),
(1, 100, 'green', '', '2020-06-14 13:27:01'),
(5, 0, 'violet', '', '2020-06-14 13:27:01'),
(5, 0, 'red', '', '2020-06-14 13:27:01'),
(5, 0, 'green', '', '2020-06-14 13:27:01'),
(5, 0, 'violet', '', '2020-06-14 13:27:01'),
(5, 0, 'violet', '', '2020-06-14 13:27:01'),
(5, 10, '1', '', '2020-06-14 13:27:01'),
(5, 100, 'green', '', '2020-06-14 13:27:01'),
(5, 100, 'green', '', '2020-06-14 13:27:01'),
(7, 10, 'green', '', '2020-06-14 13:45:01'),
(7, 10, 'green', '', '2020-06-14 14:00:01'),
(7, 50, 'red', '', '2020-06-14 14:03:01'),
(7, 100, 'green', '', '2020-06-14 14:09:01'),
(7, 10, 'green', '', '2020-06-14 18:00:01'),
(7, 100, 'green', '', '2020-06-14 18:06:01'),
(7, 100, 'green', '', '2020-06-14 18:12:01'),
(7, 100, 'green', '', '2020-06-14 18:15:01'),
(7, 100, '1', '', '2020-06-14 18:18:01'),
(7, 100, '1', '', '2020-06-14 18:21:02'),
(7, 0, 'green', '', '2020-06-14 19:06:01'),
(7, 10, 'green', '', '2020-06-14 19:06:01'),
(7, 1000, 'green', '', '2020-06-14 19:09:01'),
(7, 0, 'green', '', '2020-06-14 19:12:01'),
(7, 2000, 'green', '', '2020-06-14 19:18:01'),
(9, 2500, 'green', '', '2020-06-14 19:21:01'),
(10, 0, 'green', '', '2020-06-14 19:33:01'),
(10, 0, 'green', '', '2020-06-14 19:36:01'),
(10, 0, 'green', '', '2020-06-14 19:36:01'),
(10, 100, 'green', '', '2020-06-14 19:36:01'),
(10, 5000, 'green', '', '2020-06-14 19:36:01'),
(10, 0, 'green', '', '2020-06-14 19:39:01'),
(10, 5000, 'green', '', '2020-06-14 19:39:01'),
(10, 1000, 'green', '', '2020-06-14 19:42:01'),
(10, 1000, 'red', '', '2020-06-14 19:45:01'),
(10, 1000, 'violet', '', '2020-06-14 19:48:01'),
(10, 1000, 'violet', '', '2020-06-14 19:51:01'),
(10, 1000, 'green', '', '2020-06-14 19:51:01'),
(10, 1000, 'violet', '', '2020-06-14 19:54:01'),
(10, 1000, 'green', '', '2020-06-14 19:57:01'),
(10, 1000, 'red', '', '2020-06-14 20:00:01'),
(10, 1000, '1', '', '2020-06-14 20:03:01'),
(10, 0, 'green', '', '2020-06-14 20:03:01'),
(7, 100, '1', '', '2020-06-15 03:30:01'),
(7, 10, '2', '', '2020-06-15 03:33:01'),
(7, 70, 'green', '', '2020-06-15 06:39:02'),
(13, 10, 'green', '', '2020-06-15 06:51:01'),
(13, 0, '3', '', '2020-06-15 06:54:01'),
(13, 30, '3', '', '2020-06-15 06:54:01'),
(10, 0, '1', '', '2020-06-16 04:33:01'),
(10, 100, '1', '', '2020-06-16 04:33:01'),
(10, 1000, '4', '', '2020-06-16 07:36:01'),
(10, 1000, '0', '', '2020-06-16 07:36:01'),
(10, 2000, 'red', '', '2020-06-16 08:36:01'),
(10, 2000, 'red', '', '2020-06-16 08:39:01'),
(10, 1000, '2', '', '2020-06-16 08:39:01'),
(10, 1000, 'red', '', '2020-06-16 09:51:01'),
(8, 500, '1', '', '2020-06-16 15:09:01'),
(8, 100, 'red', '', '2020-06-16 15:12:01'),
(10, 3000, '3', '', '2020-06-16 16:21:01'),
(10, 0, 'green', '', '2020-06-16 16:24:01'),
(10, 1000, 'violet', '', '2020-06-16 16:24:01'),
(10, 10000, 'violet', '', '2020-06-16 16:27:01'),
(10, 1000, 'green', '', '2020-06-16 16:30:01'),
(10, 1000, 'green', '', '2020-06-16 16:33:01'),
(10, 10000, 'green', '', '2020-06-16 16:36:01'),
(10, 1000, '3', '', '2020-06-16 16:36:01'),
(10, 1000, '4', '', '2020-06-16 16:39:01'),
(10, 500, '2', '', '2020-06-16 18:39:01'),
(10, 500, '1', '', '2020-06-16 18:42:01'),
(10, 20, 'green', '', '2020-06-17 04:21:01'),
(53, 0, 'red', '', '2020-06-17 04:33:01'),
(53, 0, 'red', '', '2020-06-17 04:33:01'),
(10, 10, 'red', '', '2020-06-17 04:39:01'),
(10, 0, 'violet', '', '2020-06-17 04:39:01'),
(10, 10, '0', '', '2020-06-17 04:39:01'),
(10, 10, 'red', '', '2020-06-17 04:39:01'),
(53, 10, 'green', '', '2020-06-17 04:42:01'),
(53, 10, 'green', '', '2020-06-17 04:54:01'),
(53, 20, 'red', '', '2020-06-17 05:03:01'),
(10, 10000, 'green', '', '2020-06-17 05:09:01'),
(53, 20, 'green', '', '2020-06-17 05:12:01'),
(1000, 50, 'red', '', '2020-06-17 05:45:02'),
(10, 100, 'green', '', '2020-06-17 05:48:18'),
(10, 100, 'green', '', '2020-06-17 05:49:07'),
(10, 1000, 'green', '', '2020-06-17 05:51:01'),
(53, 10, 'green', '', '2020-06-17 06:00:01'),
(1000, 100, 'red', '', '2020-06-17 06:21:01'),
(10, 10000, 'green', '', '2020-06-17 06:33:01'),
(53, 10, 'red', '', '2020-06-17 08:36:01'),
(53, 30, 'red', '', '2020-06-17 08:39:01'),
(10, 1000, 'green', '', '2020-06-17 08:42:01'),
(53, 10, 'red', '', '2020-06-17 08:51:01'),
(53, 20, 'green', '', '2020-06-17 08:54:01'),
(53, 10, '6', '', '2020-06-17 08:57:01'),
(40, 10, 'green', '', '2020-06-17 09:24:01'),
(40, 0, 'green', '', '2020-06-17 09:30:01'),
(40, 0, 'green', '', '2020-06-17 09:33:01'),
(40, 0, 'green', '', '2020-06-17 09:33:01'),
(40, 10, 'green', '', '2020-06-17 09:33:01'),
(40, 10, 'red', '', '2020-06-17 10:03:01'),
(40, 10, 'red', '', '2020-06-17 10:06:01'),
(40, 10, 'green', '', '2020-06-17 10:09:01'),
(53, 30, 'green', '', '2020-06-17 10:09:01'),
(1013, 300, 'violet', '', '2020-06-17 10:15:01'),
(1013, 30, 'green', '', '2020-06-17 10:18:01'),
(1013, 30, 'green', '', '2020-06-17 10:21:01'),
(53, 20, 'green', '', '2020-06-17 10:24:01'),
(53, 30, 'green', '', '2020-06-17 10:24:01'),
(1001, 30, 'green', '', '2020-06-17 10:48:02'),
(40, 10, 'red', '', '2020-06-17 10:54:01'),
(1001, 30, 'red', '', '2020-06-17 10:54:01'),
(40, 10, '6', '', '2020-06-17 10:57:01'),
(1001, 30, 'green', '', '2020-06-17 10:59:42'),
(40, 10, '6', '', '2020-06-17 11:06:01'),
(40, 10, '1', '', '2020-06-17 11:06:01'),
(1001, 30, 'green', '', '2020-06-17 11:09:01'),
(1013, 30, 'violet', '', '2020-06-17 11:24:01'),
(1013, 100, 'green', '', '2020-06-17 11:27:02'),
(1013, 300, '1', '', '2020-06-17 11:30:01'),
(40, 10, 'red', '', '2020-06-17 13:12:01'),
(40, 10, 'red', '', '2020-06-17 13:15:01'),
(1018, 60, 'red', '', '2020-06-17 13:15:01'),
(40, 10, '3', '', '2020-06-17 13:18:01'),
(40, 10, 'green', '', '2020-06-17 13:18:01'),
(40, 10, '8', '', '2020-06-17 13:21:01'),
(40, 0, 'red', '', '2020-06-17 13:21:01'),
(40, 10, 'red', '', '2020-06-17 13:21:01'),
(1018, 60, 'red', '', '2020-06-17 13:30:01'),
(1018, 60, 'red', '', '2020-06-17 13:33:01'),
(1018, 0, 'violet', '', '2020-06-17 13:42:02'),
(1018, 0, 'red', '', '2020-06-17 14:15:01'),
(40, 10, '7', '', '2020-06-17 14:21:01'),
(40, 10, 'green', '', '2020-06-17 14:21:01'),
(40, 10, 'red', '', '2020-06-17 14:27:01'),
(40, 20, '3', '', '2020-06-17 17:51:01'),
(40, 50, 'green', '', '2020-06-17 17:51:01'),
(1018, 30, '3', '', '2020-06-18 08:00:01'),
(18, 0, 'red', '', '2020-06-18 08:48:01'),
(18, 0, 'red', '', '2020-06-18 08:48:01'),
(10, 1000, 'green', '', '2020-06-18 09:39:01'),
(10, 2000, 'red', '', '2020-06-19 14:56:20'),
(25, 100, 'green', '', '2020-06-19 14:56:20'),
(1001, 200, 'red', '', '2020-06-19 14:56:20'),
(1001, 100, 'green', 'picky', '2020-06-20 05:23:07'),
(1000, 10, 'red', 'picky', '2020-06-20 05:23:07'),
(1013, 100, 'violet', 'parity', '2020-06-20 05:23:07'),
(1002, 10, 'red', 'parity', '2020-06-20 05:23:07'),
(1001, 100, '1', 'spare', '2020-06-20 05:23:07'),
(1000, 10, '2', 'spare', '2020-06-20 05:23:07'),
(1013, 100, 'green', 'bacone', '2020-06-20 05:23:07'),
(1002, 10, 'violet', 'bacone', '2020-06-20 05:23:07'),
(1001, 100, 'green', 'bacone', '2020-06-20 05:23:07'),
(1000, 10, 'red', 'bacone', '2020-06-20 05:23:07'),
(1, 100, 'violet', '', '2020-06-14 13:27:01'),
(1, 100, 'green', '', '2020-06-14 13:27:01'),
(5, 0, 'violet', '', '2020-06-14 13:27:01'),
(5, 0, 'red', '', '2020-06-14 13:27:01'),
(5, 0, 'green', '', '2020-06-14 13:27:01'),
(5, 0, 'violet', '', '2020-06-14 13:27:01'),
(5, 0, 'violet', '', '2020-06-14 13:27:01'),
(5, 10, '1', '', '2020-06-14 13:27:01'),
(5, 100, 'green', '', '2020-06-14 13:27:01'),
(5, 100, 'green', '', '2020-06-14 13:27:01'),
(7, 10, 'green', '', '2020-06-14 13:45:01'),
(7, 10, 'green', '', '2020-06-14 14:00:01'),
(7, 50, 'red', '', '2020-06-14 14:03:01'),
(7, 100, 'green', '', '2020-06-14 14:09:01'),
(7, 10, 'green', '', '2020-06-14 18:00:01'),
(7, 100, 'green', '', '2020-06-14 18:06:01'),
(7, 100, 'green', '', '2020-06-14 18:12:01'),
(7, 100, 'green', '', '2020-06-14 18:15:01'),
(7, 100, '1', '', '2020-06-14 18:18:01'),
(7, 100, '1', '', '2020-06-14 18:21:02'),
(7, 0, 'green', '', '2020-06-14 19:06:01'),
(7, 10, 'green', '', '2020-06-14 19:06:01'),
(7, 1000, 'green', '', '2020-06-14 19:09:01'),
(7, 0, 'green', '', '2020-06-14 19:12:01'),
(7, 2000, 'green', '', '2020-06-14 19:18:01'),
(9, 2500, 'green', '', '2020-06-14 19:21:01'),
(10, 0, 'green', '', '2020-06-14 19:33:01'),
(10, 0, 'green', '', '2020-06-14 19:36:01'),
(10, 0, 'green', '', '2020-06-14 19:36:01'),
(10, 100, 'green', '', '2020-06-14 19:36:01'),
(10, 5000, 'green', '', '2020-06-14 19:36:01'),
(10, 0, 'green', '', '2020-06-14 19:39:01'),
(10, 5000, 'green', '', '2020-06-14 19:39:01'),
(10, 1000, 'green', '', '2020-06-14 19:42:01'),
(10, 1000, 'red', '', '2020-06-14 19:45:01'),
(10, 1000, 'violet', '', '2020-06-14 19:48:01'),
(10, 1000, 'violet', '', '2020-06-14 19:51:01'),
(10, 1000, 'green', '', '2020-06-14 19:51:01'),
(10, 1000, 'violet', '', '2020-06-14 19:54:01'),
(10, 1000, 'green', '', '2020-06-14 19:57:01'),
(10, 1000, 'red', '', '2020-06-14 20:00:01'),
(10, 1000, '1', '', '2020-06-14 20:03:01'),
(10, 0, 'green', '', '2020-06-14 20:03:01'),
(7, 100, '1', '', '2020-06-15 03:30:01'),
(7, 10, '2', '', '2020-06-15 03:33:01'),
(7, 70, 'green', '', '2020-06-15 06:39:02'),
(13, 10, 'green', '', '2020-06-15 06:51:01'),
(13, 0, '3', '', '2020-06-15 06:54:01'),
(13, 30, '3', '', '2020-06-15 06:54:01'),
(10, 0, '1', '', '2020-06-16 04:33:01'),
(10, 100, '1', '', '2020-06-16 04:33:01'),
(10, 1000, '4', '', '2020-06-16 07:36:01'),
(10, 1000, '0', '', '2020-06-16 07:36:01'),
(10, 2000, 'red', '', '2020-06-16 08:36:01'),
(10, 2000, 'red', '', '2020-06-16 08:39:01'),
(10, 1000, '2', '', '2020-06-16 08:39:01'),
(10, 1000, 'red', '', '2020-06-16 09:51:01'),
(8, 500, '1', '', '2020-06-16 15:09:01'),
(8, 100, 'red', '', '2020-06-16 15:12:01'),
(10, 3000, '3', '', '2020-06-16 16:21:01'),
(10, 0, 'green', '', '2020-06-16 16:24:01'),
(10, 1000, 'violet', '', '2020-06-16 16:24:01'),
(10, 10000, 'violet', '', '2020-06-16 16:27:01'),
(10, 1000, 'green', '', '2020-06-16 16:30:01'),
(10, 1000, 'green', '', '2020-06-16 16:33:01'),
(10, 10000, 'green', '', '2020-06-16 16:36:01'),
(10, 1000, '3', '', '2020-06-16 16:36:01'),
(10, 1000, '4', '', '2020-06-16 16:39:01'),
(10, 500, '2', '', '2020-06-16 18:39:01'),
(10, 500, '1', '', '2020-06-16 18:42:01'),
(10, 20, 'green', '', '2020-06-17 04:21:01'),
(53, 0, 'red', '', '2020-06-17 04:33:01'),
(53, 0, 'red', '', '2020-06-17 04:33:01'),
(10, 10, 'red', '', '2020-06-17 04:39:01'),
(10, 0, 'violet', '', '2020-06-17 04:39:01'),
(10, 10, '0', '', '2020-06-17 04:39:01'),
(10, 10, 'red', '', '2020-06-17 04:39:01'),
(53, 10, 'green', '', '2020-06-17 04:42:01'),
(53, 10, 'green', '', '2020-06-17 04:54:01'),
(53, 20, 'red', '', '2020-06-17 05:03:01'),
(10, 10000, 'green', '', '2020-06-17 05:09:01'),
(53, 20, 'green', '', '2020-06-17 05:12:01'),
(1000, 50, 'red', '', '2020-06-17 05:45:02'),
(10, 100, 'green', '', '2020-06-17 05:48:18'),
(10, 100, 'green', '', '2020-06-17 05:49:07'),
(10, 1000, 'green', '', '2020-06-17 05:51:01'),
(53, 10, 'green', '', '2020-06-17 06:00:01'),
(1000, 100, 'red', '', '2020-06-17 06:21:01'),
(10, 10000, 'green', '', '2020-06-17 06:33:01'),
(53, 10, 'red', '', '2020-06-17 08:36:01'),
(53, 30, 'red', '', '2020-06-17 08:39:01'),
(10, 1000, 'green', '', '2020-06-17 08:42:01'),
(53, 10, 'red', '', '2020-06-17 08:51:01'),
(53, 20, 'green', '', '2020-06-17 08:54:01'),
(53, 10, '6', '', '2020-06-17 08:57:01'),
(40, 10, 'green', '', '2020-06-17 09:24:01'),
(40, 0, 'green', '', '2020-06-17 09:30:01'),
(40, 0, 'green', '', '2020-06-17 09:33:01'),
(40, 0, 'green', '', '2020-06-17 09:33:01'),
(40, 10, 'green', '', '2020-06-17 09:33:01'),
(40, 10, 'red', '', '2020-06-17 10:03:01'),
(40, 10, 'red', '', '2020-06-17 10:06:01'),
(40, 10, 'green', '', '2020-06-17 10:09:01'),
(53, 30, 'green', '', '2020-06-17 10:09:01'),
(1013, 300, 'violet', '', '2020-06-17 10:15:01'),
(1013, 30, 'green', '', '2020-06-17 10:18:01'),
(1013, 30, 'green', '', '2020-06-17 10:21:01'),
(53, 20, 'green', '', '2020-06-17 10:24:01'),
(53, 30, 'green', '', '2020-06-17 10:24:01'),
(1001, 30, 'green', '', '2020-06-17 10:48:02'),
(40, 10, 'red', '', '2020-06-17 10:54:01'),
(1001, 30, 'red', '', '2020-06-17 10:54:01'),
(40, 10, '6', '', '2020-06-17 10:57:01'),
(1001, 30, 'green', '', '2020-06-17 10:59:42'),
(40, 10, '6', '', '2020-06-17 11:06:01'),
(40, 10, '1', '', '2020-06-17 11:06:01'),
(1001, 30, 'green', '', '2020-06-17 11:09:01'),
(1013, 30, 'violet', '', '2020-06-17 11:24:01'),
(1013, 100, 'green', '', '2020-06-17 11:27:02'),
(1013, 300, '1', '', '2020-06-17 11:30:01'),
(40, 10, 'red', '', '2020-06-17 13:12:01'),
(40, 10, 'red', '', '2020-06-17 13:15:01'),
(1018, 60, 'red', '', '2020-06-17 13:15:01'),
(40, 10, '3', '', '2020-06-17 13:18:01'),
(40, 10, 'green', '', '2020-06-17 13:18:01'),
(40, 10, '8', '', '2020-06-17 13:21:01'),
(40, 0, 'red', '', '2020-06-17 13:21:01'),
(40, 10, 'red', '', '2020-06-17 13:21:01'),
(1018, 60, 'red', '', '2020-06-17 13:30:01'),
(1018, 60, 'red', '', '2020-06-17 13:33:01'),
(1018, 0, 'violet', '', '2020-06-17 13:42:02'),
(1018, 0, 'red', '', '2020-06-17 14:15:01'),
(40, 10, '7', '', '2020-06-17 14:21:01'),
(40, 10, 'green', '', '2020-06-17 14:21:01'),
(40, 10, 'red', '', '2020-06-17 14:27:01'),
(40, 20, '3', '', '2020-06-17 17:51:01'),
(40, 50, 'green', '', '2020-06-17 17:51:01'),
(1018, 30, '3', '', '2020-06-18 08:00:01'),
(18, 0, 'red', '', '2020-06-18 08:48:01'),
(18, 0, 'red', '', '2020-06-18 08:48:01'),
(10, 1000, 'green', '', '2020-06-18 09:39:01'),
(10, 2000, 'red', '', '2020-06-18 09:45:01'),
(10, 0, 'red', '', '2020-06-18 09:48:01'),
(10, 1000, '2', '', '2020-06-18 09:48:01'),
(1001, 10, 'green', '', '2020-06-18 13:18:01'),
(1001, 10, '3', '', '2020-06-18 13:18:01'),
(1050, 20, 'red', '', '2020-06-18 17:48:01'),
(1050, 30, 'green', '', '2020-06-18 17:54:01'),
(1050, 10, 'violet', '', '2020-06-18 18:00:02'),
(1050, 10, 'green', '', '2020-06-18 18:03:01'),
(1050, 30, '7', '', '2020-06-18 18:06:01'),
(45, 0, 'green', '', '2020-06-19 08:57:01'),
(45, 0, 'green', '', '2020-06-19 09:00:01'),
(45, 0, 'green', '', '2020-06-19 09:24:01'),
(10, 50, 'red', '', '2020-06-19 18:03:01'),
(10, 1000, 'green', '', '2020-06-19 18:09:01'),
(10, 1000, 'green', '', '2020-06-19 18:09:01'),
(1058, 0, '1', '', '2020-06-19 18:12:01'),
(10, 0, '4', '', '2020-06-19 18:12:01'),
(1058, 0, 'green', '', '2020-06-19 18:12:01'),
(1058, 20, 'green', '', '2020-06-19 18:12:01'),
(1058, 10, '0', '', '2020-06-19 18:15:01'),
(1058, 20, '2', '', '2020-06-19 18:15:01'),
(1058, 10, '4', '', '2020-06-19 18:15:01'),
(1058, 10, '6', '', '2020-06-19 18:15:01'),
(1058, 10, '0', '', '2020-06-19 18:18:01'),
(1058, 10, '2', '', '2020-06-19 18:18:01'),
(1058, 10, '5', '', '2020-06-19 18:18:01'),
(1058, 30, 'violet', '', '2020-06-19 18:18:01'),
(1058, 50, '0', '', '2020-06-19 18:21:01'),
(1058, 50, '8', '', '2020-06-19 18:21:01'),
(1058, 10, '2', '', '2020-06-19 18:21:01'),
(1058, 10, '6', '', '2020-06-19 18:21:01'),
(1058, 100, 'red', '', '2020-06-19 18:21:01'),
(1058, 50, 'violet', '', '2020-06-19 18:21:01'),
(1058, 50, '0', '', '2020-06-19 18:24:01'),
(1058, 50, '1', '', '2020-06-19 18:24:01'),
(1058, 50, '3', '', '2020-06-19 18:24:01'),
(1058, 100, '1', '', '2020-06-19 18:27:01'),
(1058, 100, '3', '', '2020-06-19 18:27:01'),
(1058, 20, '8', '', '2020-06-19 18:27:01'),
(1058, 100, 'green', '', '2020-06-19 18:27:01'),
(1058, 30, 'violet', '', '2020-06-19 18:27:01'),
(1058, 50, '1', '', '2020-06-19 18:30:01'),
(1058, 50, '3', '', '2020-06-19 18:30:01'),
(1058, 30, '4', '', '2020-06-19 18:30:01'),
(1058, 100, '6', '', '2020-06-19 18:30:01'),
(1058, 50, 'red', '', '2020-06-19 18:30:01'),
(1058, 10, '0', '', '2020-06-19 18:33:01'),
(1058, 10, '4', '', '2020-06-19 18:33:01'),
(1058, 50, '6', '', '2020-06-19 18:33:01'),
(1058, 20, '7', '', '2020-06-19 18:33:01'),
(1058, 10, '9', '', '2020-06-19 18:33:01'),
(1001, 100, 'green', 'picky', '2020-06-22 05:35:04'),
(1000, 10, 'red', 'picky', '2020-06-22 05:35:04'),
(1013, 100, 'violet', 'parity', '2020-06-22 05:35:04'),
(1002, 10, 'red', 'parity', '2020-06-22 05:35:04'),
(1001, 100, '1', 'spare', '2020-06-22 05:35:04'),
(1000, 10, '2', 'spare', '2020-06-22 05:35:04'),
(1013, 100, 'green', 'bacone', '2020-06-22 05:35:04'),
(1002, 10, 'violet', 'bacone', '2020-06-22 05:35:04'),
(1001, 100, 'green', 'bacone', '2020-06-22 05:35:04'),
(1000, 10, 'red', 'bacone', '2020-06-22 05:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `referral_codes`
--

CREATE TABLE `referral_codes` (
  `user_id` int(11) NOT NULL,
  `referral_code` varchar(10) NOT NULL,
  `referred_from` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_codes`
--

INSERT INTO `referral_codes` (`user_id`, `referral_code`, `referred_from`) VALUES
(7, 'ZF3Hz5bqYn', ''),
(10, 'tCbLrX217f', ''),
(12, 'aU1AJ8m5r7', 'tCbLrX217f'),
(15, 'M0Tut12JBc', 'tCbLrX217f'),
(16, '24TzX9s3RI', 'tCbLrX217f'),
(17, 'oDmyq04TC8', 'tCbLrX217f'),
(18, 'YXCoSQsviu', '6YjsEi2GTe'),
(22, 'UkVuI96p2Z', 'YXCoSQsviu'),
(25, 'EpUqwT4D9K', '6YjsEi2GTe'),
(32, 'peRHuG5DKS', ''),
(34, 'mKnqxI04tH', 'EpUqwT4D9K'),
(35, 'tnThX9mFvC', 'tCbLrX217f'),
(37, '3eEig2cTd4', 'tCbLrX217f'),
(39, 'r4toAmhTiu', 'tCbLrX217f'),
(40, 'QdwpDvV7qT', 'tCbLrX217f'),
(41, 'b1yL5FOiEq', 'tCbLrX217f'),
(43, 'Wj8O5fGI6y', 'tCbLrX217f'),
(45, '3SM7zlZ1Ou', 'tCbLrX217f'),
(47, 'lNH3zt8S72', 'tCbLrX217f'),
(48, 'XNk5f2h0JV', 'tCbLrX217f'),
(53, 'KeWwji4vQI', 'tCbLrX217f'),
(61, '6AESDZCfKv', 'tCbLrX217f'),
(62, 'IjSK6mLUxV', 'tCbLrX217f'),
(76, '5gjyDZowT1', '6YjsEi2GTe'),
(1000, 'QqK8mAECVz', ''),
(1001, 'jEp2rI5MAh', ''),
(1002, 'qWfywHLRzP', ''),
(1013, '4MBy3cz78H', ''),
(1018, 'krxfOYtsG0', 'tCbLrX217f'),
(1033, 'cQlzfgIiux', 'tCbLrX217f'),
(1037, 'FsQ8maZEGt', 'tCbLrX217f');

-- --------------------------------------------------------

--
-- Table structure for table `register_table`
--

CREATE TABLE `register_table` (
  `user_id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `MobileNo` varchar(12) NOT NULL,
  `Password` varchar(155) NOT NULL,
  `is_Active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_table`
--

INSERT INTO `register_table` (`user_id`, `name`, `MobileNo`, `Password`, `is_Active`) VALUES
(7, 'prabhir', '8182818101', '123456', 1),
(10, 'Vikas', '9927960300', '1234', 1),
(12, 'Mahavir parshad', '7014198040', 'maha@@123', 1),
(15, 'NEELAM RANI', '9476247704', '5467', 1),
(16, 'Shyam mohan prajapati ', '9236251232', '280691', 1),
(17, 'JITAN SINGH', '7830506960', '123', 1),
(18, 'Yogesh Kumar ', '8191852401', 'yogesh1234', 1),
(22, 'Pramod lodhi ', '7987931079', '1pramod2345', 1),
(25, 'Iqbal khan', '9784993255', '0534', 1),
(32, 'ASHISH VERMA', '8445206043', 'taxway@50', 1),
(34, 'Sameer', '6375543591', '0534', 1),
(35, 'Padma Devi Markam ', '7746077941', 'dplt0099', 1),
(37, 'Nirav', '9714965945', 'devganatra@2711', 1),
(39, 'Vivek bonde', '9510133544', 'vbonde1984', 1),
(40, 'Taj', '9566147518', '00210021', 1),
(41, 'Atheeequr rehaman', '7204107706', '567890', 1),
(43, 'Tamim Eqbal', '8789909395', 'Tamim07', 1),
(45, 'Narayan Teli ', '9414118050', 'TELI@123', 1),
(47, 'Abhay Kumar', '8210385116', 'a12345', 1),
(48, 'Lambar Boro', '7086142609', '00lb9101000', 1),
(53, 'Ramees', '8593848631', '8593848631', 1),
(61, 'Abhishek singh', '9649984250', '9782120943', 1),
(62, 'Lucky', '9164787578', 'luckylondekar', 1),
(76, 'Rajkumar mahor ', '9982790074', '123456', 1),
(1000, 'Bhavi', '7020814544', '1234', 1),
(1001, 'Jayesh', '1234567890', '1234', 1),
(1002, 'Dimple', '8087004697', '1234', 1),
(1013, 'Jinal', '11111', '1234', 1),
(1018, 'Meena Bharat Pawar ', '9619938454', '123456', 1),
(1033, 'Pankaj patel', '7567149425', 'Pank@1142', 1),
(1037, 'Raj Prakash Chandil', '6370059236', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `user_id` int(11) NOT NULL,
  `my_money` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`user_id`, `my_money`) VALUES
(7, '9551.00'),
(10, '862267.00'),
(12, '0.00'),
(15, '0.00'),
(16, '0.00'),
(17, '10.00'),
(18, '50.00'),
(22, '0.00'),
(25, '0.00'),
(32, '0.00'),
(34, '0.00'),
(35, '0.00'),
(37, '0.00'),
(39, '0.00'),
(40, '109.00'),
(41, '0.00'),
(43, '0.00'),
(45, '0.00'),
(47, '0.00'),
(48, '0.00'),
(53, '192.00'),
(61, '0.00'),
(62, '0.00'),
(76, '0.00'),
(1000, '1096.50'),
(1001, '2316.00'),
(1002, '1060.50'),
(1013, '2267.00'),
(1018, '4.00'),
(1033, '0.00'),
(1037, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hint` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `hint`, `gender`, `address`, `user_type`, `created`, `modified`) VALUES
(1, 'Shop', 'Gold', 'admin1@gmail.com', '9874461784', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'Male', 'test', 1, '2020-06-06 15:11:40', '2020-06-06 15:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE `winner` (
  `color` varchar(20) NOT NULL,
  `digit` int(11) NOT NULL,
  `room` varchar(10) NOT NULL,
  `game_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`color`, `digit`, `room`, `game_date`) VALUES
('[\"green\",\"violet\"]', 5, 'picky', '2020-06-22 05:38:51'),
('[\"green\",\"violet\"]', 2, 'parity', '2020-06-22 05:38:51'),
('[\"green\",\"violet\"]', 1, 'spare', '2020-06-22 05:38:51'),
('[\"green\",\"violet\"]', 5, 'bacone', '2020-06-22 05:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `winner_history`
--

CREATE TABLE `winner_history` (
  `color` varchar(20) NOT NULL,
  `digit` int(11) NOT NULL,
  `room` varchar(10) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winner_history`
--

INSERT INTO `winner_history` (`color`, `digit`, `room`, `date_added`) VALUES
('[\"green\",\"violet\"]', 5, 'picky', '2020-06-22 05:39:16'),
('[\"green\",\"violet\"]', 2, 'parity', '2020-06-22 05:39:16'),
('[\"green\",\"violet\"]', 1, 'spare', '2020-06-22 05:39:16'),
('[\"green\",\"violet\"]', 5, 'bacone', '2020-06-22 05:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawl_request`
--

CREATE TABLE `withdrawl_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawl_request`
--

INSERT INTO `withdrawl_request` (`id`, `user_id`, `amount`, `date`, `status`) VALUES
(1, 7, '100', '2020-06-09 12:52:30', 2),
(2, 12, '100', '2020-06-09 12:53:03', 1),
(3, 16, '20', '2020-06-09 21:57:32', 0),
(4, 22, '100', '2020-06-13 10:20:22', 0),
(5, 25, '1000', '2020-06-13 21:50:40', 1),
(6, 17, '1000', '2020-06-14 12:19:49', 0),
(7, 10, '1000', '2020-06-14 12:20:31', 1),
(8, 18, '100', '2020-06-14 12:29:04', 0),
(9, 15, '100', '2020-06-14 12:29:56', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`user_id`,`account`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`customer_address_id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `purchased_history`
--
ALTER TABLE `purchased_history`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `referral_codes`
--
ALTER TABLE `referral_codes`
  ADD PRIMARY KEY (`user_id`,`referral_code`);

--
-- Indexes for table `register_table`
--
ALTER TABLE `register_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `MobileNo` (`MobileNo`);

--
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`game_date`,`room`) USING BTREE;

--
-- Indexes for table `winner_history`
--
ALTER TABLE `winner_history`
  ADD PRIMARY KEY (`room`,`date_added`) USING BTREE;

--
-- Indexes for table `withdrawl_request`
--
ALTER TABLE `withdrawl_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `customer_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_table`
--
ALTER TABLE `register_table`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1063;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdrawl_request`
--
ALTER TABLE `withdrawl_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchased`
--
ALTER TABLE `purchased`
  ADD CONSTRAINT `purchased_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `register_table` (`user_id`);

--
-- Constraints for table `referral_codes`
--
ALTER TABLE `referral_codes`
  ADD CONSTRAINT `FK_UserCode` FOREIGN KEY (`user_id`) REFERENCES `register_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referral_codes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register_table` (`user_id`),
  ADD CONSTRAINT `referral_codes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `register_table` (`user_id`),
  ADD CONSTRAINT `referral_codes_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `register_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referral_codes_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `register_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD CONSTRAINT `tbl_wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
