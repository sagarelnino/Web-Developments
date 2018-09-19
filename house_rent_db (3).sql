-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 08:49 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_rent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(2) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'head@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(2, 'head2@gmail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `barisal_table`
--

CREATE TABLE `barisal_table` (
  `area_id` int(3) NOT NULL,
  `area_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barisal_table`
--

INSERT INTO `barisal_table` (`area_id`, `area_name`) VALUES
(1, 'Patharghata'),
(2, 'Patuakhali'),
(3, 'Barguna'),
(4, 'Nalchhiti'),
(5, 'Bauphal'),
(6, 'Galachipa'),
(7, 'Pirojpur'),
(8, 'Bakergonj'),
(9, 'Kalapara'),
(10, 'Kuakata');

-- --------------------------------------------------------

--
-- Table structure for table `car_request_table`
--

CREATE TABLE `car_request_table` (
  `car_request_id` int(4) NOT NULL,
  `car_id` int(3) NOT NULL,
  `car_customer_id` int(4) NOT NULL,
  `car_from` varchar(30) NOT NULL,
  `car_to` varchar(30) NOT NULL,
  `car_number` int(2) NOT NULL,
  `car_address` varchar(400) NOT NULL,
  `car_request_date` varchar(50) NOT NULL,
  `car_date` varchar(50) NOT NULL,
  `car_confirm` varchar(20) NOT NULL,
  `car_message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_request_table`
--

INSERT INTO `car_request_table` (`car_request_id`, `car_id`, `car_customer_id`, `car_from`, `car_to`, `car_number`, `car_address`, `car_request_date`, `car_date`, `car_confirm`, `car_message`) VALUES
(1, 2, 4, 'Gabtoli', 'farmgate', 3, 'mohammadpur', '2017-08-10', '25.08.17', '', ''),
(2, 2, 4, 'uganda', 'ganda', 1, 'tikatuli', '2017-08-09', '25.08.17', 'confirmed', ''),
(3, 5, 4, 'Gabtoli', 'farmgate', 1, 'lalmatia', '2017-08-31', '25.08.17', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `chittagong_table`
--

CREATE TABLE `chittagong_table` (
  `area_id` int(3) NOT NULL,
  `area_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chittagong_table`
--

INSERT INTO `chittagong_table` (`area_id`, `area_name`) VALUES
(1, 'Agrabad'),
(2, 'Jalalabad'),
(3, 'Nasirabad'),
(4, 'Mirsorai'),
(5, 'Cox''s Bazar'),
(6, 'Rangamati'),
(7, 'Khagrachori'),
(8, 'Bandarban'),
(9, 'Boubazar'),
(10, 'Muradpur');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `customer_id` int(5) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_password` varchar(150) NOT NULL,
  `customer_phone_number` varchar(15) NOT NULL,
  `customer_occupation` varchar(20) NOT NULL,
  `customer_picture` varchar(150) NOT NULL,
  `customer_national_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`customer_id`, `customer_email`, `customer_name`, `customer_password`, `customer_phone_number`, `customer_occupation`, `customer_picture`, `customer_national_id`) VALUES
(1, 'murad@gmail.com', 'Murad', '25d55ad283aa400af464c76d713c07ad', '', '', '', '19932616220000060'),
(2, 'shuvashishpaul@gmail.com', 'Shuvashish', '25d55ad283aa400af464c76d713c07ad', '', '', '', '19932616220000067'),
(4, 'torres@gmail.com', 'Torres', '25d55ad283aa400af464c76d713c07ad', '01814351854', 'Teacher', 'resized_20270002_1944718302471227_575591143_n.jpg', '19932616220000033');

-- --------------------------------------------------------

--
-- Table structure for table `dhaka_table`
--

CREATE TABLE `dhaka_table` (
  `area_id` int(3) NOT NULL,
  `area_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhaka_table`
--

INSERT INTO `dhaka_table` (`area_id`, `area_name`) VALUES
(1, 'Gabtoli'),
(2, 'Farmgate'),
(3, 'Motijheel'),
(4, 'Mohammadpur'),
(5, 'Dhanmondi'),
(6, 'Gulshan'),
(7, 'Banani'),
(8, 'Uttara'),
(9, 'Badda'),
(10, 'Mohakhali'),
(11, 'Mogbazar'),
(12, 'Ajimpur'),
(13, 'Old Dhaka'),
(14, 'Baridhara'),
(15, 'Khilgaon'),
(16, 'Mirpur'),
(17, 'Shaymoli'),
(18, 'Kallyanpur'),
(19, 'Cantonment'),
(20, 'Lalmatia');

-- --------------------------------------------------------

--
-- Table structure for table `district_table`
--

CREATE TABLE `district_table` (
  `district_id` int(2) NOT NULL,
  `district_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district_table`
--

INSERT INTO `district_table` (`district_id`, `district_name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Barisal'),
(4, 'Rajshahi'),
(5, 'Sylhet'),
(6, 'Khulna'),
(7, 'Dinajpur');

-- --------------------------------------------------------

--
-- Table structure for table `flat_request_table`
--

CREATE TABLE `flat_request_table` (
  `flat_request_id` int(4) NOT NULL,
  `flat_id` int(4) NOT NULL,
  `customer_id` int(4) NOT NULL,
  `house_owner_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat_request_table`
--

INSERT INTO `flat_request_table` (`flat_request_id`, `flat_id`, `customer_id`, `house_owner_id`) VALUES
(1, 1, 4, 1),
(9, 1, 4, 1),
(10, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flat_table`
--

CREATE TABLE `flat_table` (
  `flat_id` int(4) NOT NULL,
  `flat_owner_id` int(3) NOT NULL,
  `flat_division` varchar(16) NOT NULL,
  `flat_type` varchar(16) NOT NULL,
  `flat_area` varchar(16) NOT NULL,
  `flat_rent` int(6) NOT NULL,
  `flat_rent_advance` int(7) NOT NULL,
  `flat_details` varchar(500) NOT NULL,
  `flat_picture` varchar(200) NOT NULL,
  `flat_date` varchar(20) NOT NULL,
  `flat_link` varchar(300) NOT NULL,
  `flat_approve` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat_table`
--

INSERT INTO `flat_table` (`flat_id`, `flat_owner_id`, `flat_division`, `flat_type`, `flat_area`, `flat_rent`, `flat_rent_advance`, `flat_details`, `flat_picture`, `flat_date`, `flat_link`, `flat_approve`) VALUES
(1, 1, 'Dhaka', 'For family', 'Mohammadpur', 14000, 120000, 'Nice House to be in really', 'resized_FLAT-3-APSLEY-COURT-2.jpg', '30 july,2017', 'https://www.google.com.bd/maps/search/24+Lalmatia+Road,+Dhaka,+Dhaka+Division/@23.7497191,90.3629042,15z/data=!3m1!4b1?hl=en', 'approved'),
(3, 1, 'Dhaka', 'For family', 'Gabtoli', 12000, 120000, 'nice bedroom', 'resized_Quezon_City_House_Rent_2.jpg', '2017/07/30', 'https://www.google.com.bd/maps/search/gabtoli+darus+salam/@23.7834588,90.3448757,15z/data=!3m1!4b1?hl=en', 'approved'),
(4, 1, 'Dhaka', 'For family', 'Dhanmondi', 15000, 1500000, '3 bedroom, 1 dyning, 1 kitchen\r\nbeautiful place to live in. You will like it', 'resized_House-rent-pattaya-mabprachan-house-94998.jpg', '2017/07/31', 'https://www.google.com.bd/maps/place/Road+No+15,+Dhaka/@23.7541673,90.372723,17.25z/data=!4m5!3m4!1s0x3755bf532ff353a7:0xb2338a427fd86534!8m2!3d23.7547411!4d90.3745544?hl=en', '');

-- --------------------------------------------------------

--
-- Table structure for table `house_owner_table`
--

CREATE TABLE `house_owner_table` (
  `house_owner_id` int(4) NOT NULL,
  `house_owner_password` varchar(150) NOT NULL,
  `house_owner_name` varchar(50) NOT NULL,
  `house_owner_occupation` varchar(30) NOT NULL,
  `house_owner_email` varchar(50) NOT NULL,
  `house_owner_phone` varchar(15) NOT NULL,
  `house_owner_mobile` varchar(15) NOT NULL,
  `house_owner_image` varchar(100) NOT NULL,
  `house_owner_national_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_owner_table`
--

INSERT INTO `house_owner_table` (`house_owner_id`, `house_owner_password`, `house_owner_name`, `house_owner_occupation`, `house_owner_email`, `house_owner_phone`, `house_owner_mobile`, `house_owner_image`, `house_owner_national_id`) VALUES
(1, '25d55ad283aa400af464c76d713c07ad', 'Yeasin Murad', 'Student', 'admin@gmail.com', '01710684220', '01710684220', 'resized_12733504_1024796007557244_5905283829206567800_n.jpg', '19932616220000066');

-- --------------------------------------------------------

--
-- Table structure for table `khulna_table`
--

CREATE TABLE `khulna_table` (
  `area_id` int(3) NOT NULL,
  `area_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khulna_table`
--

INSERT INTO `khulna_table` (`area_id`, `area_name`) VALUES
(1, 'Khulna'),
(2, 'Magura'),
(3, 'Jessore'),
(4, 'Satkhira'),
(5, 'Kalia'),
(6, 'Bagerhat'),
(7, 'Mongla');

-- --------------------------------------------------------

--
-- Table structure for table `rajshahi_table`
--

CREATE TABLE `rajshahi_table` (
  `area_id` int(3) NOT NULL,
  `area_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rajshahi_table`
--

INSERT INTO `rajshahi_table` (`area_id`, `area_name`) VALUES
(1, 'Chapai'),
(2, 'Joypurhat'),
(3, 'Bogra'),
(4, 'Sirajganj'),
(5, 'Ishwardi'),
(6, 'Natore'),
(7, 'Bagmara');

-- --------------------------------------------------------

--
-- Table structure for table `rangpur_table`
--

CREATE TABLE `rangpur_table` (
  `area_id` int(3) NOT NULL,
  `area_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rangpur_table`
--

INSERT INTO `rangpur_table` (`area_id`, `area_name`) VALUES
(1, 'Jalpaiguri'),
(2, 'Rangpur'),
(3, 'Dinajpur'),
(4, 'Kurigram'),
(5, 'Birampur'),
(6, 'Baliadangi'),
(7, 'Phulbari');

-- --------------------------------------------------------

--
-- Table structure for table `sylhet_table`
--

CREATE TABLE `sylhet_table` (
  `area_id` int(3) NOT NULL,
  `area_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sylhet_table`
--

INSERT INTO `sylhet_table` (`area_id`, `area_name`) VALUES
(1, 'Habiganj'),
(2, 'Sylhet'),
(3, 'Sreemangal'),
(4, 'Sunamganj'),
(5, 'Chhatak'),
(6, 'Barlekha'),
(7, 'Nabiganj');

-- --------------------------------------------------------

--
-- Table structure for table `transport_table`
--

CREATE TABLE `transport_table` (
  `car_id` int(3) NOT NULL,
  `car_type` varchar(20) NOT NULL,
  `car_phone_number` varchar(15) NOT NULL,
  `car_rate` varchar(10) NOT NULL,
  `car_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_table`
--

INSERT INTO `transport_table` (`car_id`, `car_type`, `car_phone_number`, `car_rate`, `car_image`) VALUES
(2, 'Mini Pickup', '01710667890', '2500', '2.jpg'),
(4, 'Big Truck', '01710967894', '2000', '3.jpg'),
(5, 'Van', '01710567894', '500', '2738336965_eb7dbd59b8_z.jpg'),
(6, 'Huge Truck', '01710684224', '5000', 'resized_DuraStar_LocalDelivery_M_2x_750x520.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `barisal_table`
--
ALTER TABLE `barisal_table`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `car_request_table`
--
ALTER TABLE `car_request_table`
  ADD PRIMARY KEY (`car_request_id`);

--
-- Indexes for table `chittagong_table`
--
ALTER TABLE `chittagong_table`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `dhaka_table`
--
ALTER TABLE `dhaka_table`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `district_table`
--
ALTER TABLE `district_table`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `flat_request_table`
--
ALTER TABLE `flat_request_table`
  ADD PRIMARY KEY (`flat_request_id`);

--
-- Indexes for table `flat_table`
--
ALTER TABLE `flat_table`
  ADD PRIMARY KEY (`flat_id`);

--
-- Indexes for table `house_owner_table`
--
ALTER TABLE `house_owner_table`
  ADD PRIMARY KEY (`house_owner_id`);

--
-- Indexes for table `khulna_table`
--
ALTER TABLE `khulna_table`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `rajshahi_table`
--
ALTER TABLE `rajshahi_table`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `rangpur_table`
--
ALTER TABLE `rangpur_table`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `sylhet_table`
--
ALTER TABLE `sylhet_table`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `transport_table`
--
ALTER TABLE `transport_table`
  ADD PRIMARY KEY (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barisal_table`
--
ALTER TABLE `barisal_table`
  MODIFY `area_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `car_request_table`
--
ALTER TABLE `car_request_table`
  MODIFY `car_request_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chittagong_table`
--
ALTER TABLE `chittagong_table`
  MODIFY `area_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dhaka_table`
--
ALTER TABLE `dhaka_table`
  MODIFY `area_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `district_table`
--
ALTER TABLE `district_table`
  MODIFY `district_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `flat_request_table`
--
ALTER TABLE `flat_request_table`
  MODIFY `flat_request_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `flat_table`
--
ALTER TABLE `flat_table`
  MODIFY `flat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `house_owner_table`
--
ALTER TABLE `house_owner_table`
  MODIFY `house_owner_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `khulna_table`
--
ALTER TABLE `khulna_table`
  MODIFY `area_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rajshahi_table`
--
ALTER TABLE `rajshahi_table`
  MODIFY `area_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rangpur_table`
--
ALTER TABLE `rangpur_table`
  MODIFY `area_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sylhet_table`
--
ALTER TABLE `sylhet_table`
  MODIFY `area_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transport_table`
--
ALTER TABLE `transport_table`
  MODIFY `car_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
