-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 07:59 AM
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
(4, 'Slider Panel', 'slider_panel/view_images'),
(5, 'Farmer Details ', 'farmer_details/view_details'),
(6, 'Employee', 'Employee/view_employee\r\n'),
(7, 'Category', 'Category/view_category'),
(8, 'Products', 'Products/view_products');

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
(1, 2, 'View Team', 'system/view_team'),
(2, 2, 'Add Team', 'system/add_team');

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
  `state` varchar(255) NOT NULL,
  `territory` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tour_details` varchar(255) NOT NULL,
  `km_details` varchar(255) NOT NULL,
  `sales_details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `phone`, `email`, `password`, `state`, `territory`, `category`, `tour_details`, `km_details`, `sales_details`, `image`, `ip`, `is_active`, `added_by`, `date`) VALUES
(2, 'Bhola', '9262174817', 'bhola@bhola.com', '0a3cb7ff39ad2e7710a7db79ea04c4df', 'Kashmir', 'Union', 'First', 'dfgr234', '4234km', 'eqawrg23, hgf ', 'employee20220310030315.jpeg', '::1', '1', '19', '2022-03-10 16:03:12'),
(3, 'New Top', '912487235', 'new@gmail.in', '3cb43cae8d3d5f8f8d53aee9e351a95e', 'Hyderabad ', 'ewrtvwbtqev', 'First', 'wqtrf', '26734km', 'safw3', 'employee20220310030317.jpg', '::1', '1', '19', '2022-03-10 16:02:36');

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
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
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

INSERT INTO `tbl_team` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `power`, `services`, `ip`, `date`, `added_by`, `is_active`) VALUES
(1, 'Anay Pareek', 'anaypareek@rocketmail.com', '9ffd3dfaf18c6c0dededaba5d7db9375', '9799655891', '19 kalyanpuri new sanganer road sodala', '', 1, '[\"999\"]', '1000000', '16-05-2018', 1, 1),
(19, 'Demo', 'demo@gmail.com', 'f702c1502be8e55f4208d69419f50d0a', '9999999999', 'jaipur', NULL, 1, '[\"999\"]', '::1', '2020-01-04 18:12:55', 1, 1),
(29, 'Animesh Sharma', 'animesh.skyline@gmail.com', '8bda6fe26dad2b31f9cb9180ec3823e8', '8441849182', 'pratap nagar sitapura jaipur', '', 2, '[\"999\"]', '::1', '2020-01-06 14:47:11', 1, 1);

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
  `is_active` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`id`, `product_id`, `name`, `mrp`, `gst`, `sp`, `gstprice`, `spgst`, `ip`, `date`, `is_active`, `added_by`) VALUES
(1, '6', 'Insecticide ', 110, 11, 123, 11, 12, 0, '2022-03-12 ', '1', '19'),
(4, '6', 'Child Safe', 880, 23, 23, 56, 76, 0, '2022-03-12 ', '1', '19'),
(5, '2', 'Chemical Induced ', 335, 65, 34, 23, 55, 0, '2022-03-12 ', '1', '19');

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
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin_sidebar2`
--
ALTER TABLE `tbl_admin_sidebar2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_farmer_details`
--
ALTER TABLE `tbl_farmer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
