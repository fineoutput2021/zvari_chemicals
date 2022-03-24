-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 11:58 AM
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
(2, 'Team', 'System/view_team'),
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmer_details`
--

CREATE TABLE `tbl_farmer_details` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order1`
--

CREATE TABLE `tbl_order1` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL COMMENT '1 for COD , 2 for online payment',
  `payment_status` int(11) DEFAULT NULL COMMENT '0 for pending , 1 for succeed',
  `order_status` int(11) DEFAULT NULL COMMENT '1 for orderPlaced , 2 for orderConfirmed , 3 for orderDispatched , 4 for orderDelivered , 5 for cancel',
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order2`
--

CREATE TABLE `tbl_order2` (
  `id` int(100) NOT NULL,
  `main_id` varchar(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
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
(29, 'Animesh Sharma', 'animesh.skyline@gmail.com', '8bda6fe26dad2b31f9cb9180ec3823e8', '8441849182', 'pratap nagar sitapura jaipur', 0, 0, 0, '', 2, '[\"999\"]', '::1', '2020-01-06 14:47:11', 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_banner_image`
--
ALTER TABLE `tbl_banner_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_farmer_details`
--
ALTER TABLE `tbl_farmer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leave_req`
--
ALTER TABLE `tbl_leave_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order1`
--
ALTER TABLE `tbl_order1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order2`
--
ALTER TABLE `tbl_order2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_slider_panel`
--
ALTER TABLE `tbl_slider_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_territory`
--
ALTER TABLE `tbl_territory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tour`
--
ALTER TABLE `tbl_tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tour_km`
--
ALTER TABLE `tbl_tour_km`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tour_photos`
--
ALTER TABLE `tbl_tour_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
