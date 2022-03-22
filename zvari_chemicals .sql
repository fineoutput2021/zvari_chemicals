-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 06:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zvari_chemicals`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_sidebar`
--

CREATE TABLE `tbl_admin_sidebar` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_sidebar`
--

INSERT INTO `tbl_admin_sidebar` (`id`, `name`, `url`) VALUES
(1, 'Dashboard', 'home'),
(2, 'Team', '#'),
(4, 'Slider Panel', 'Slider_panel/view_images'),
(5, 'Farmer Details ', 'Farmer_details/view_details'),
(6, 'Employee', 'Employee/view_employee\r\n'),
(7, 'Category', 'Category/view_category'),
(8, 'Products', 'Products/view_products'),
(9, 'State', 'State/view_state'),
(10, 'Territory', 'Territory/view_territory'),
(12, 'Orders', '#'),
(13, 'Leave Requests', 'Leave_req/view_leave_req'),
(14, 'Banner Image', 'Banner_image/view_banner_image');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_sidebar2`
--

CREATE TABLE `tbl_admin_sidebar2` (
  `id` int(11) NOT NULL,
  `main_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_sidebar2`
--

INSERT INTO `tbl_admin_sidebar2` (`id`, `main_id`, `name`, `url`) VALUES
(1, 2, 'View Team', 'System/view_team'),
(2, 2, 'Add Team', 'System/add_team'),
(3, 12, 'New Orders', 'Orders/view_orders'),
(4, 12, 'Accepted Orders', 'Orders/view_accept_orders'),
(5, 12, 'Dispatched Orders', 'Orders/view_dispatched_orders'),
(6, 12, 'Delivered Orders', 'Orders/view_completed_orders'),
(7, 12, 'Rejected Orders', 'Orders/view_rejected_orders');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `employee_id`, `attendance`, `start`, `end`, `date`, `ip`) VALUES
(1, 2, 1, '', '', '', ''),
(2, 2, 1, '12:27:47', NULL, '2022-03-21 12:27:47', ''),
(3, 2, 1, '17:00:25', NULL, '2022-03-21 17:00:25', ''),
(4, 6, 1, '17:02:28', '17:12:41', '2022-03-21 17:02:28', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_image`
--

CREATE TABLE `tbl_banner_image` (
  `id` int(11) NOT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banner_image`
--

INSERT INTO `tbl_banner_image` (`id`, `image1`, `image2`, `ip`, `date`, `added_by`, `is_active`) VALUES
(1, 'assets/uploads/banner_image/banner_image20220321010319.jpeg', 'assets/uploads/banner_image/banner_image20220321010354.jpg', '::1', '2022-03-21 13:48:35', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `token_id` varchar(255) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `token_id`, `employee_id`, `product_id`, `type_id`, `quantity`, `ip`, `date`) VALUES
(1, '2134fedbver', 2, 6, 4, 4, '::1', '2022-03-21 18:20:04'),
(2, '2134fedbver', 6, 5, 2, 4, '::1', '2022-03-21 18:20:04'),
(3, '2134fedbver', 7, 5, 2, 4, '::1', '2022-03-21 18:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `is_active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `ip`, `date`, `added_by`, `is_active`) VALUES
(2, 'Fertilizers', '::1', '2022-03-10 16:33:48', '19', '1'),
(3, 'Organic', '::1', '2022-03-10 18:17:26', '19', '1'),
(4, 'Inorganic ', '::1', '2022-03-10 18:17:45', '19', '1'),
(5, 'Blah', '::1', '2022-03-10 18:18:04', '19', '1'),
(6, 'Insecticide', '::1', '2022-03-11 18:17:04', '19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `territory_id` varchar(255) NOT NULL,
  `position_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `phone`, `email`, `password`, `state_id`, `territory_id`, `position_id`, `image`, `ip`, `is_active`, `added_by`, `date`) VALUES
(2, 'Bhola', '9262174817', 'bhola@bhola.com', '202cb962ac59075b964b07152d234b70', '1', '1', '4', 'employee20220310030315.jpeg', '::1', '1', '19', '2022-03-16 15:07:46'),
(3, 'New Top', '912487235', 'new@gmail.in', '3cb43cae8d3d5f8f8d53aee9e351a95e', '2', '3', '3', 'employee20220310030317.jpg', '::1', '1', '19', '2022-03-10 16:02:36'),
(6, 'Rohit', '9074321134', 'rohit@gmail.in', '202cb962ac59075b964b07152d234b70', '2', '2', '6', 'employee20220315030311.jpg', '::1', '1', '19', '2022-03-15 15:01:29'),
(7, 'None', '9262174817', 'bhola@bhola.com', '202cb962ac59075b964b07152d234b70', '2', '2', '7', 'employee20220321110335.jpg', '::1', '1', '30', '2022-03-21 11:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmer_details`
--

CREATE TABLE `tbl_farmer_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave_req`
--

CREATE TABLE `tbl_leave_req` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leave_req`
--

INSERT INTO `tbl_leave_req` (`id`, `employee_id`, `start`, `end`, `is_active`, `date`, `ip`) VALUES
(1, 6, '3-04-2022', '7-04-2022', 2, '17-03-2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order1`
--

CREATE TABLE `tbl_order1` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `final_amount` int(11) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL COMMENT '1 for COD , 2 for online payment',
  `payment_status` int(11) DEFAULT NULL COMMENT '0 for pending , 1 for succeed',
  `order_status` int(11) DEFAULT NULL COMMENT '1 for orderPlaced , 2 for orderConfirmed , 3 for orderDispatched , 4 for orderDelivered , 5 for cancel',
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order1`
--

INSERT INTO `tbl_order1` (`id`, `employee_id`, `user_id`, `total_amount`, `final_amount`, `payment_type`, `payment_status`, `order_status`, `name`, `phone`, `shop_name`, `place`, `image`, `txnid`, `ip`, `date`) VALUES
(1, '2', 1, '10050', 10100, NULL, 1, 1, 'nitesh', '8387039990', '2', 'scscscxxaxa', '', NULL, '::1', '2022-01-10 12:09:28'),
(2, '', 1, '900', 900, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-17 11:38:24'),
(3, '', 1, '1950', 2055, NULL, 0, 0, 'nitesh', '8387039990', '302022', 'scscscxxaxa', '', NULL, '::1', '2022-01-22 16:16:21'),
(4, '', 1, '50', 155, NULL, 0, 0, 'nitesh', '8387039990', '302022', 'scscscxxaxa', '', NULL, '::1', '2022-01-22 16:29:10'),
(5, '', 1, '840', 945, NULL, 0, 0, 'nitesh', '8387039990', '302022', 'scscscxxaxa', '', NULL, '::1', '2022-01-22 16:32:05'),
(6, '', 1, '10840', 9945, NULL, 1, 1, 'nitesh', '8387039990', '302022', 'scscscxxaxa', '', NULL, '::1', '2022-01-22 16:33:34'),
(7, '', 1, '10050', 10155, NULL, 0, 0, 'nitesh', '8387039990', '302022', 'scscscxxaxa', '', NULL, '::1', '2022-01-22 17:34:58'),
(8, '', 1, '10050', 10050, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-22 18:29:20'),
(9, '', 1, '10050', 10155, NULL, 0, 0, 'nitesh', '8387039990', '302022', 'scscscxxaxa', '', NULL, '::1', '2022-01-22 18:29:25'),
(10, '', 1, '10050', 10050, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-22 19:02:39'),
(11, '', 1, '10050', 10050, NULL, 1, 5, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-22 19:07:03'),
(12, '', 1, '10050', 10050, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-22 19:07:23'),
(13, '', 1, '50', 50, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-22 19:45:04'),
(14, '', 1, '50', 50, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-22 20:12:29'),
(15, '', 1, '10050', 10050, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 12:28:31'),
(16, '', 1, '50', 50, NULL, 1, 1, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 15:41:58'),
(17, '', 1, '10000', 9000, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 15:42:26'),
(18, '', 1, '10000', 10000, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 16:27:19'),
(19, '', 1, '20050', 20050, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 17:27:01'),
(20, '', 1, '10000', 10000, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 18:06:06'),
(21, '', 1, '10000', 10105, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 18:13:12'),
(22, '', 1, '10000', 10000, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 18:14:57'),
(23, '', 1, '10000', 10000, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 18:21:08'),
(24, '', 1, '10000', 10105, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 18:36:03'),
(25, '', 1, '50', 155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 20:53:36'),
(26, '', 1, '50', 155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 20:59:47'),
(27, '', 1, '50', 155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 21:49:26'),
(28, '', 1, '50', 155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 21:50:27'),
(29, '', 1, '7050', 8155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-24 22:03:53'),
(30, '', 1, '7050', 6155, NULL, 1, 4, 'grgvsdfvvdvdd', '2555555544', '302022', '302022', '', NULL, '::1', '2022-01-25 10:28:32'),
(31, '', 1, '27050', 27155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-27 10:30:30'),
(32, '', 1, '27050', 27155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-27 10:51:16'),
(33, '', 1, '27050', 27155, NULL, 1, 1, 'grgvsdfvvdvdd', '2555555544', '302022', '302022', '', NULL, '::1', '2022-01-27 11:56:38'),
(34, '', 1, '50', 155, NULL, 1, 1, 'grgvsdfvvdvdd', '2555555544', '302022', '302022', '', NULL, '::1', '2022-01-27 11:59:53'),
(35, '', 1, '50', 155, NULL, 1, 1, 'grgvsdfvvdvdd', '2555555544', '302022', '302022', '', NULL, '::1', '2022-01-27 12:01:06'),
(36, '', 1, '900', 1005, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-27 12:53:41'),
(37, '', 1, '900', 1005, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-27 13:07:59'),
(38, '', 1, '900', 1005, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-28 14:06:08'),
(39, '', 1, '900', 1005, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-28 14:48:13'),
(40, '', 1, '10000', 10105, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-29 16:48:29'),
(41, '', NULL, '50', 155, NULL, 0, 0, 'vdvdv', '0000000000', '302022', '302022', '', NULL, '::1', '2022-01-31 12:39:21'),
(42, '', NULL, '50', 155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-31 12:53:27'),
(43, '', NULL, '50', 155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-01-31 18:20:33'),
(44, '', NULL, '2000', 2105, NULL, 0, 0, 'vdvdv', '0000000000', '302022', '302022', '', NULL, '::1', '2022-01-31 18:31:12'),
(45, '', 1, '29050', 29155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-02-22 18:04:12'),
(46, '', 1, '19050', 19155, NULL, 0, 0, 'vdvdv', '0000000000', '302022', '302022', '', NULL, '::1', '2022-02-22 18:06:30'),
(47, '', 1, '50', 155, NULL, 1, 1, 'vdvdv', '0000000000', '302022', '302022', '', NULL, '::1', '2022-02-22 18:07:41'),
(48, '3', 1, '6000', 6105, NULL, 1, 1, 'vdvdv', '0000000000', '302022', '302022', '', NULL, '::1', '2022-02-22 18:09:51'),
(49, '', 1, '100', 205, NULL, 1, 4, 'vdvdv', '0000000000', '302022', '302022', '', NULL, '::1', '2022-02-22 18:11:06'),
(50, '', 1, '100', 205, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-02-22 18:12:05'),
(51, '', NULL, '50', 155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-02-23 17:56:58'),
(52, '', NULL, '50', 155, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-02-23 17:57:46'),
(53, '', NULL, '10050', 10050, NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '::1', '2022-02-23 17:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order2`
--

CREATE TABLE `tbl_order2` (
  `id` int(100) NOT NULL,
  `main_id` varchar(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `type_amt` varchar(255) NOT NULL,
  `type_amt_gst` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `gst_percentage` varchar(255) NOT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order2`
--

INSERT INTO `tbl_order2` (`id`, `main_id`, `product_id`, `quantity`, `mrp`, `selling_price`, `total_amount`, `type_amt`, `type_amt_gst`, `gst`, `gst_percentage`, `date`) VALUES
(1, '1', 1, '1', '9625', '10000', '10000', '', '', '', '', '2022-01-10 12:08:49'),
(2, '1', 2, '1', '100', '50', '50', '', '', '', '', '2022-01-10 12:08:49'),
(3, '2', 8, '1', '750', '900', '900', '', '', '', '', '2022-01-17 11:38:24'),
(4, '3', 8, '2', '750', '900', '1800', '', '', '', '', '2022-01-22 16:16:21'),
(5, '3', 3, '3', '100', '50', '150', '', '', '', '', '2022-01-22 16:16:21'),
(6, '4', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 16:29:10'),
(7, '5', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 16:32:05'),
(8, '5', 1, '1', '1200', '790', '790', '', '', '', '', '2022-01-22 16:32:05'),
(9, '6', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 16:32:43'),
(10, '6', 1, '1', '1200', '790', '790', '', '', '', '', '2022-01-22 16:32:43'),
(11, '6', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-22 16:32:43'),
(12, '7', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 17:34:58'),
(13, '7', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-22 17:34:58'),
(14, '8', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 18:29:20'),
(15, '8', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-22 18:29:20'),
(16, '9', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 18:29:25'),
(17, '9', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-22 18:29:25'),
(18, '10', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 19:02:39'),
(19, '10', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-22 19:02:39'),
(20, '11', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 19:02:49'),
(21, '11', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-22 19:02:49'),
(22, '12', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 19:07:23'),
(23, '12', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-22 19:07:23'),
(24, '13', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 19:45:04'),
(25, '14', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-22 20:12:29'),
(26, '15', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-24 12:28:31'),
(27, '15', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-24 12:28:31'),
(28, '16', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-24 12:31:10'),
(29, '17', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-24 15:42:26'),
(30, '18', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-24 16:27:19'),
(31, '19', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-24 17:27:01'),
(32, '19', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-24 17:27:01'),
(33, '19', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-24 17:27:01'),
(34, '20', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-24 18:06:06'),
(35, '21', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-24 18:13:12'),
(36, '22', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-24 18:14:57'),
(37, '23', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-24 18:21:08'),
(38, '24', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-24 18:36:03'),
(39, '25', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-24 20:53:36'),
(40, '26', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-24 20:59:47'),
(41, '27', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-24 21:49:26'),
(42, '28', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-24 21:50:27'),
(43, '29', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-24 22:03:53'),
(44, '29', 4, '1', '8000', '7000', '7000', '', '', '', '', '2022-01-24 22:03:53'),
(45, '30', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-25 10:28:05'),
(46, '30', 4, '1', '8000', '7000', '7000', '', '', '', '', '2022-01-25 10:28:05'),
(47, '31', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-27 10:30:30'),
(48, '31', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-27 10:30:30'),
(49, '31', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-27 10:30:30'),
(50, '31', 4, '1', '8000', '7000', '7000', '', '', '', '', '2022-01-27 10:30:30'),
(51, '32', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-27 10:51:16'),
(52, '32', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-27 10:51:16'),
(53, '32', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-27 10:51:16'),
(54, '32', 4, '1', '8000', '7000', '7000', '', '', '', '', '2022-01-27 10:51:16'),
(55, '33', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-01-27 11:56:22'),
(56, '33', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-27 11:56:22'),
(57, '33', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-27 11:56:22'),
(58, '33', 4, '1', '8000', '7000', '7000', '', '', '', '', '2022-01-27 11:56:22'),
(59, '34', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-27 11:59:50'),
(60, '35', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-27 12:01:04'),
(61, '36', 8, '1', '750', '900', '900', '', '', '', '', '2022-01-27 12:53:41'),
(62, '37', 8, '1', '750', '900', '900', '', '', '', '', '2022-01-27 13:07:59'),
(63, '38', 8, '1', '750', '900', '900', '', '', '', '', '2022-01-28 14:06:08'),
(64, '39', 8, '1', '750', '900', '900', '', '', '', '', '2022-01-28 14:48:13'),
(65, '40', 7, '1', '', '10000', '10000', '', '', '', '', '2022-01-29 16:48:29'),
(66, '41', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-31 12:38:08'),
(67, '42', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-31 12:53:27'),
(68, '43', 3, '1', '100', '50', '50', '', '', '', '', '2022-01-31 18:20:33'),
(69, '44', 13, '1', '3000', '2000', '2000', '', '', '', '', '2022-01-31 18:29:54'),
(70, '45', 7, '1', '', '10000', '10000', '', '', '', '', '2022-02-22 18:04:12'),
(71, '45', 3, '1', '100', '50', '50', '', '', '', '', '2022-02-22 18:04:12'),
(72, '45', 4, '1', '8000', '7000', '7000', '', '', '', '', '2022-02-22 18:04:12'),
(73, '45', 5, '1', '15000', '10000', '10000', '', '', '', '', '2022-02-22 18:04:12'),
(74, '45', 13, '1', '3000', '2000', '2000', '', '', '', '', '2022-02-22 18:04:12'),
(75, '46', 7, '1', '', '10000', '10000', '', '', '', '', '2022-02-22 18:04:24'),
(76, '46', 3, '1', '100', '50', '50', '', '', '', '', '2022-02-22 18:04:24'),
(77, '46', 4, '1', '8000', '7000', '7000', '', '', '', '', '2022-02-22 18:04:24'),
(78, '46', 13, '1', '3000', '2000', '2000', '', '', '', '', '2022-02-22 18:04:24'),
(79, '47', 3, '1', '100', '50', '50', '', '', '', '', '2022-02-22 18:07:37'),
(80, '48', 13, '3', '3000', '2000', '6000', '', '', '', '', '2022-02-22 18:09:48'),
(81, '49', 3, '2', '100', '50', '100', '', '', '', '', '2022-02-22 18:11:04'),
(82, '50', 3, '2', '100', '50', '100', '', '', '', '', '2022-02-22 18:12:05'),
(83, '51', 3, '1', '100', '50', '50', '', '', '', '', '2022-02-23 17:56:58'),
(84, '52', 3, '1', '100', '50', '50', '', '', '', '', '2022-02-23 17:57:46'),
(85, '53', 3, '1', '100', '50', '50', '', '', '', '', '2022-02-23 17:58:06'),
(86, '53', 7, '1', '', '10000', '10000', '', '', '', '', '2022-02-23 17:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `name`) VALUES
(1, 'Director/MD'),
(2, 'General Manager(GM)'),
(3, 'Zonal Manager(ZM)'),
(4, 'Territory Manager(TM)'),
(5, 'Area Sales Manager(ASM)'),
(6, 'Sales Officer(SO)'),
(7, 'Field Officer(FO)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `mode_of_action` varchar(255) NOT NULL,
  `major_crops` varchar(255) NOT NULL,
  `target_disease` varchar(255) NOT NULL,
  `dose` varchar(255) NOT NULL,
  `ip` varchar(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `category_id`, `product_name`, `image1`, `image2`, `image3`, `image4`, `price`, `product_desc`, `mode_of_action`, `major_crops`, `target_disease`, `dose`, `ip`, `date`, `is_active`, `added_by`) VALUES
(2, '2', 'Chemical', 'assets/uploads/products/product120220310060305.jpg', 'assets/uploads/products/product220220310060305.jpeg', 'assets/uploads/products/product320220310060305.jpg', 'assets/uploads/products/product420220310060305.jpg', '32', 'sjuhfggu324324', 'wsa', 'sdfg', 'qw3t', 'werqg', '::1', '2022-03-11 16:14:16', '1', '19'),
(6, '6', 'Non-Toxic', 'assets/uploads/products/product120220312110337.jpg', 'assets/uploads/products/product220220312110337.jpg', 'assets/uploads/products/product320220312110337.jpg', 'assets/uploads/products/product420220312110337.jpeg', '1120', 'Micro tech used ', 'Super', 'Wheat, Barley', 'All', '2-3Times s week', '::1', '2022-03-12 11:55:37', '1', '19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider_panel`
--

CREATE TABLE `tbl_slider_panel` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider_panel`
--

INSERT INTO `tbl_slider_panel` (`id`, `image`, `added_by`, `date`, `ip`, `is_active`) VALUES
(2, 'slider_panel_image20220310080322.jpg', '19', '2022-03-10 08:38:22', '', '1'),
(5, 'slider_panel_image20220310080355.jpeg', '19', '2022-03-10 08:31:55', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `name`, `is_active`, `added_by`, `ip`, `date`) VALUES
(1, 'Punjab', 1, '19', '::1', '2022-03-15 13:08:42'),
(2, 'Rajasthan ', 1, '19', '::1', '2022-03-15 13:17:15'),
(3, 'West Bengal', 1, '19', '::1', '2022-03-15 13:17:34'),
(4, 'Assam', 1, '19', '::1', '2022-03-15 13:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `territory_id` int(11) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `power` int(11) NOT NULL,
  `services` varchar(1000) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `name`, `email`, `password`, `phone`, `address`, `state_id`, `territory_id`, `designation_id`, `image`, `power`, `services`, `ip`, `date`, `added_by`, `is_active`) VALUES
(1, 'Anay Pareek', 'anaypareek@rocketmail.com', '9ffd3dfaf18c6c0dededaba5d7db9375', '9799655891', '19 kalyanpuri new sanganer road sodala', 0, 0, 0, '', 1, '[\"999\"]', '1000000', '16-05-2018', 1, 1),
(19, 'Demo', 'demo@gmail.com', 'f702c1502be8e55f4208d69419f50d0a', '9999999999', 'jaipur', 0, 0, 0, NULL, 1, '[\"999\"]', '::1', '2020-01-04 18:12:55', 1, 1),
(29, 'Animesh Sharma', 'animesh.skyline@gmail.com', '8bda6fe26dad2b31f9cb9180ec3823e8', '8441849182', 'pratap nagar sitapura jaipur', 0, 0, 0, '', 2, '[\"999\"]', '::1', '2020-01-06 14:47:11', 1, 1),
(30, 'First Test', 'fiestt12@gmail.com', 'e99a18c428cb38d5f260853678922e03', '', '', 2, 2, 4, '', 3, '[\"999\"]', '::1', '2022-03-21 10:37:34', 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_territory`
--

CREATE TABLE `tbl_territory` (
  `id` int(11) NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_territory`
--

INSERT INTO `tbl_territory` (`id`, `state_id`, `name`, `ip`, `added_by`, `is_active`, `date`) VALUES
(1, '4', 'Assam', '::1', '19', 1, '2022-03-15 13:44:26'),
(2, '2', 'Jaipur', '::1', '19', 1, '2022-03-15 13:44:38'),
(3, '2', 'Ajmer', '::1', '19', 1, '2022-03-15 13:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour`
--

CREATE TABLE `tbl_tour` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `field` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tour`
--

INSERT INTO `tbl_tour` (`id`, `employee_id`, `field`, `remarks`, `ip`, `date`) VALUES
(1, 2, 'Gurugram', 'dsfgerw, rherdfgb ', '', '2022-03-16 15:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_km`
--

CREATE TABLE `tbl_tour_km` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `km` varchar(255) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tour_km`
--

INSERT INTO `tbl_tour_km` (`id`, `employee_id`, `km`, `vehicle`, `ip`, `date`) VALUES
(1, 2, '324', 'Two Wheeler ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_photos`
--

CREATE TABLE `tbl_tour_photos` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tour_photos`
--

INSERT INTO `tbl_tour_photos` (`id`, `employee_id`, `image1`, `image2`, `remarks`, `ip`, `date`) VALUES
(1, 2, '', '', NULL, '', '2022-03-16 15:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mrp` int(11) NOT NULL,
  `gst` int(11) NOT NULL,
  `sp` int(10) NOT NULL,
  `gstprice` int(11) NOT NULL,
  `spgst` int(11) NOT NULL,
  `ip` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `is_active` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`id`, `product_id`, `name`, `mrp`, `gst`, `sp`, `gstprice`, `spgst`, `ip`, `date`, `stock`, `is_active`, `added_by`) VALUES
(1, '6', 'Insecticide ', 110, 11, 123, 11, 12, 0, '2022-03-12 ', 1, '1', '19'),
(4, '6', 'Child Safe', 880, 23, 23, 56, 76, 0, '2022-03-12 ', 0, '1', '19'),
(5, '2', 'Chemical Induced ', 335, 65, 34, 23, 55, 0, '2022-03-12 ', 1, '0', '19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_sidebar`
--
ALTER TABLE `tbl_admin_sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_sidebar2`
--
ALTER TABLE `tbl_admin_sidebar2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner_image`
--
ALTER TABLE `tbl_banner_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_farmer_details`
--
ALTER TABLE `tbl_farmer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leave_req`
--
ALTER TABLE `tbl_leave_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order1`
--
ALTER TABLE `tbl_order1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order2`
--
ALTER TABLE `tbl_order2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider_panel`
--
ALTER TABLE `tbl_slider_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_territory`
--
ALTER TABLE `tbl_territory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tour`
--
ALTER TABLE `tbl_tour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tour_km`
--
ALTER TABLE `tbl_tour_km`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tour_photos`
--
ALTER TABLE `tbl_tour_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_sidebar`
--
ALTER TABLE `tbl_admin_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin_sidebar2`
--
ALTER TABLE `tbl_admin_sidebar2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_banner_image`
--
ALTER TABLE `tbl_banner_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_farmer_details`
--
ALTER TABLE `tbl_farmer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leave_req`
--
ALTER TABLE `tbl_leave_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order1`
--
ALTER TABLE `tbl_order1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_order2`
--
ALTER TABLE `tbl_order2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_slider_panel`
--
ALTER TABLE `tbl_slider_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_territory`
--
ALTER TABLE `tbl_territory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_tour`
--
ALTER TABLE `tbl_tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tour_km`
--
ALTER TABLE `tbl_tour_km`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tour_photos`
--
ALTER TABLE `tbl_tour_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
