-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2016 at 07:37 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vet1`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` varchar(25) NOT NULL,
  `brand_generic_id` varchar(25) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_status` char(10) NOT NULL,
  PRIMARY KEY (`brand_id`),
  KEY `brand_name` (`brand_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_generic_id`, `brand_name`, `brand_status`) VALUES
('B578936bc4d06a', 'undefined', 'undefined', 'active'),
('B578936d3cafc7', 'Hashtag', '1', 'active'),
('B57893715dad7c', '1', 'Hashtags', 'inactive'),
('B57893b74bfdef', 'G5789976cc5261', 'Tiki tiki', 'active'),
('B578997dd1f9ff', 'G578997cd92e8b', 'Sangobion', 'active'),
('B57899a9dc1e69', 'G57899a91f2d0c', 'Aspirin', 'active'),
('BR128397', 'C578933a176117', 'Biogesic', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `breed1`
--

CREATE TABLE IF NOT EXISTS `breed1` (
  `breed_id` varchar(200) NOT NULL,
  `species_id` varchar(25) NOT NULL,
  `breed_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`breed_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breed1`
--

INSERT INTO `breed1` (`breed_id`, `species_id`, `breed_name`, `status`) VALUES
('1', '10', 'Drarb', 'active'),
('2', '1', 'Pomeranian', 'active'),
('3', '9', 'Beatle', 'active'),
('BR5788c70abc064', '10', 'Ioen', 'active'),
('BR578910db4280a', '', '', 'active'),
('BR578910e6eae87', '', '', 'active'),
('BR57891107c251a', '', '', 'active'),
('BR578935ad1cc0e', 'undefined', 'undefined', 'active'),
('BR5789961f5f647', '1', 'Shih tzu', 'active'),
('BR578996329f32a', '8', 'Persian Cat', 'active'),
('BR5789bad7c1621', '1', 'Bulldog', 'active'),
('BR5789bd88a1190', 'SP5789bd78481f6', 'Goldfish', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cage`
--

CREATE TABLE IF NOT EXISTS `cage` (
  `cage_id` varchar(200) NOT NULL,
  `cage_name` varchar(100) NOT NULL,
  `cage_size` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`cage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cage`
--

INSERT INTO `cage` (`cage_id`, `cage_name`, `cage_size`, `price`, `status`) VALUES
('1', 'Cage A', '12x19x10', '20.00', 'active'),
('SV57894e94bb964', 'Blue Box', '12 x 01 x 190 by Meter', '70.00', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` varchar(25) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `category_use` varchar(200) NOT NULL,
  `cat_status` char(10) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_name` (`cat_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `category_use`, `cat_status`) VALUES
('1', 'Accessories', 'Products', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `clients_id` varchar(25) NOT NULL,
  `clients_name` varchar(100) NOT NULL,
  `clients_address` varchar(150) NOT NULL,
  `clients_contact` varchar(15) NOT NULL,
  `clients_bdate` date NOT NULL,
  `clients_gender` char(10) NOT NULL,
  `clients_status` char(10) NOT NULL,
  PRIMARY KEY (`clients_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clients_id`, `clients_name`, `clients_address`, `clients_contact`, `clients_bdate`, `clients_gender`, `clients_status`) VALUES
('CL5718840b4ed1c', 'Jake Finn', 'Arabasta', '0906390928', '1995-11-02', 'male', 'active'),
('CL57899046e3034', 'Tresha Baniel', 'San Juan City', '09268410117', '1996-09-18', 'female', 'active'),
('CL5789b3096bc3c', 'Thristian Nally', 'West Crame', '09331913581', '1996-06-22', 'female', 'active'),
('CL5789b94494d72', 'Era Penaranda', 'San Juan', '09384937482', '1995-11-20', 'female', 'active'),
('CL578b8c2764126', 'Bettina Jesena', 'San Juan', '09382930482', '1997-03-07', 'female', 'active'),
('CL5795c9b013906', 'Nali', 'Cinemo', '095343123', '1990-03-11', 'male', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dosage`
--

CREATE TABLE IF NOT EXISTS `dosage` (
  `dosage_id` varchar(25) NOT NULL,
  `dosage_name` varchar(100) NOT NULL,
  `dosage_status` char(10) NOT NULL,
  PRIMARY KEY (`dosage_id`),
  KEY `cat_name` (`dosage_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosage`
--

INSERT INTO `dosage` (`dosage_id`, `dosage_name`, `dosage_status`) VALUES
('D57891c9a369bf', '2 teaspoons', 'inactive'),
('DO578938f772655', '1 Shot Injection', 'active'),
('DO5789be563151a', 'Tablet', 'active'),
('DS12321', '1 Drop', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee1`
--

CREATE TABLE IF NOT EXISTS `employee1` (
  `user_id` varchar(25) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `job` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee1`
--

INSERT INTO `employee1` (`user_id`, `name`, `contact_no`, `address`, `job`, `status`) VALUES
('EMP19289n', 'Jose Rizal', '090502320', 'Down the Street', 'Killer', 'inactive'),
('CL5795e8ffd9302', 'Bettina Jesena', '09268410117', 'San juan City', 'vet', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `generic`
--

CREATE TABLE IF NOT EXISTS `generic` (
  `generic_id` varchar(25) NOT NULL,
  `generic_name` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generic`
--

INSERT INTO `generic` (`generic_id`, `generic_name`, `status`) VALUES
('1', 'Noozapi', 'active'),
('C57893380cba17', 'Paracetamon', 'inactive'),
('C578933a176117', 'Paracetamol', 'active'),
('G5789976cc5261', 'Eurivit', 'active'),
('G578997cd92e8b', 'Ferrous Gluconate', 'active'),
('G57899a91f2d0c', 'Acetylsalicylic acid', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE IF NOT EXISTS `medicines` (
  `medicine_id` varchar(25) NOT NULL DEFAULT '0',
  `medicine_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `packaging` varchar(25) NOT NULL,
  `dosage` varchar(25) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `category`, `packaging`, `dosage`, `brand`, `content`, `unit`, `price`, `description`, `status`) VALUES
('MD102398', 'Multivitamin Soft Chews', 'C578999256c0e2', 'PK1238', 'DO578938f772655', 'Biogesics', '17', 'U57893b3d7f15c', '560.00', 'Multivitamin Soft Chews for Dogs are specially formulated with essential nutrients to support an adult dog''s overall health with antioxidant vitamins A, C, D', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `owner_id` varchar(25) NOT NULL DEFAULT '0',
  `firstname` varchar(100) DEFAULT NULL,
  `middle_initial` varchar(5) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `firstname`, `middle_initial`, `lastname`, `bday`, `contact_no`, `address`, `sex`, `status`) VALUES
('1', 'Pied Piper', 'M', 'Baniel', '0000-00-00', '09056095833', 'San Juan City', 'M', 'active'),
('2', 'Bettina', '', 'Jesena', '2016-07-12', '09268410117', 'San Juan City', 'F', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `packaging`
--

CREATE TABLE IF NOT EXISTS `packaging` (
  `pack_id` varchar(25) NOT NULL,
  `pack_name` varchar(100) NOT NULL,
  `pack_status` char(10) NOT NULL,
  PRIMARY KEY (`pack_id`),
  KEY `cat_name` (`pack_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packaging`
--

INSERT INTO `packaging` (`pack_id`, `pack_name`, `pack_status`) VALUES
('C57891f3095341', 'Cardboard Box Type', 'inactive'),
('PK1238', 'Plastic Sachet', 'active'),
('PK12983', 'Cardboard Box', 'active'),
('PK578998bb083f3', 'Plastic Tube', 'active'),
('PK5789bea056442', 'Foil', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `owner_id` varchar(25) DEFAULT NULL,
  `pet_id` varchar(25) NOT NULL DEFAULT '0',
  `pet_name` varchar(100) DEFAULT NULL,
  `breed` varchar(25) DEFAULT NULL,
  `color` varchar(200) NOT NULL,
  `markings` varchar(200) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `status` char(10) NOT NULL,
  PRIMARY KEY (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`owner_id`, `pet_id`, `pet_name`, `breed`, `color`, `markings`, `birthdate`, `sex`, `status`) VALUES
('1', '1', 'ponyo', '1', 'White', 'Left Eye', '2013-09-22', 'F', 'active'),
('1', '10', 'bnbm', '3', 'n,mn', 'mn,mn', '0000-00-00', 'M', 'active'),
('1', '11', 'mb,b', '3', 'bmnbmnb', 'mnbb', '0000-00-00', 'M', 'active'),
('1', '2', 'Ponyo', 'BR5789961f5f647', 'white', 'brown spots', '2016-04-30', 'F', 'active'),
('1', '3', 'sample', '1', '', '', '0000-00-00', 'M', 'active'),
('1', '4', 'Sample', '3', 'Sample', 'Sample', '0000-00-00', 'M', 'active'),
('1', '5', 'Snowy', '2', 'white', 'none', '2012-01-12', 'F', 'active'),
('1', '6', 'KMLKMKM', '1', 'LKMKL', 'KML', '2013-01-01', 'F', 'active'),
('1', '7', 'kjkklkj', '1', 'jkljlk', 'lkjlkj', '0000-00-00', 'M', 'active'),
('1', '8', 'kjkhk', '3', 'hkjh', 'kjhkj', '2014-06-11', 'M', 'active'),
('1', '9', 'Owen', 'BR578996329f32a', 'Brown', 'none', '2008-01-12', 'M', 'active'),
(NULL, 'PT578911ed5d824', '', '1', 'Gold', 'Heart', '2015-11-12', 'F', 'active'),
(NULL, 'PT57891227d39b6', 'Francesca', '1', 'Silver', 'Sa', '2014-07-07', 'F', 'active'),
(NULL, 'PT57892e2700d84', '', '', '', '', NULL, '', 'active'),
(NULL, 'PT57897b49a6984', 'tre', '1', 'black', 'none', '2016-07-17', 'F', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` varchar(25) NOT NULL DEFAULT '0',
  `product_name` varchar(100) DEFAULT NULL,
  `category` varchar(200) NOT NULL,
  `packaging` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prod_price` decimal(9,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category`, `packaging`, `weight`, `unit`, `description`, `prod_price`, `status`) VALUES
('2', 'sample', '', '', '', '', '', '0.00', 'inactive'),
('3', 'sample', '', '', '', '', 'large', '0.00', 'inactive'),
('4', 'med1', '', '', '', '', 'aadsa', '0.00', 'active'),
('PR1231', 'Dog Wow', 'C57891c9a369bf', 'PK1238', '25', 'U578920740365d\n', 'large', '0.00', 'active'),
('PR12381293', 'Swivel', 'C57891c9a369bf', 'PK1238', '25', 'U578920740365d', 'Ocsilliation', '250.00', 'active'),
('PR57892ed80c498', 'Enuma Elish', 'C1023', 'PK1238', '150', 'U578920740365d', 'Grayth Beginning', '7000.00', 'active'),
('PR578942319cdbc', 'Shine', 'C57891c9a369bf', 'PK578998bb083f3', '100', 'U57893b3d7f15c', '', '899.00', 'active'),
('PR5789bf756abb6', 'Mane N Tail', 'C5789be423dda0', 'PK12983', '10', 'U5789be09e6c77', '', '100.00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` varchar(25) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `category`, `price`, `status`) VALUES
('1', 'Cleaning', 'Grooming', 900, 'active'),
('2', 'boarding', 'Grooming', 40, 'inactive'),
('3', 'check up', 'Vet', 500, 'inactive'),
('SV57894ad56f5bd', 'Nail clipping', 'Grooming', 345, 'active'),
('SV57894af9dede1', 'Boarding', 'Vet', 280, 'active'),
('SV57899adadc39d', 'Fecalysis', 'Lab Exam', 580, 'active'),
('SV5789c042d11fc', 'Vaccination', 'Vet', 500, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE IF NOT EXISTS `species` (
  `species_id` varchar(25) NOT NULL DEFAULT '0',
  `species_name` varchar(100) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`species_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`species_id`, `species_name`, `status`) VALUES
('1', 'Dog', 'active'),
('8', 'Cat', 'active'),
('SP578991665b1d8', 'Hamster', 'active'),
('SP5789951b2d90b', 'Mouse', 'active'),
('SP5789bd78481f6', 'Fish', 'active'),
('SP5795f14c724ec', 'w', 'inactive'),
('SP5795f14d92c37', 'w', 'inactive'),
('SP5795f14e2d7ea', 'w', 'inactive'),
('SP5795f14e53493', 'w', 'inactive'),
('SP5795f14e71f13', 'w', 'inactive'),
('SP5795f14e91811', 'w', 'inactive'),
('SP5795f14ebc34d', 'w', 'inactive'),
('SP5795f226a2129', 'shayt', 'inactive'),
('SP5795f25d69694', 'damn', 'inactive'),
('SP5795f26b8517d', 'fuck', 'inactive'),
('SP5795f2cd5dfe4', 'be', 'inactive'),
('SP5795f2e62348d', 'bets', 'inactive'),
('SP5795f39aa8e43', 'Dog', 'inactive'),
('SP5795f3b531160', 'Dog', 'inactive'),
('SP5795f3cab321e', 'Dog', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `unit_id` varchar(25) NOT NULL,
  `unit_name` varchar(200) NOT NULL,
  `unit_abbreviation` varchar(25) NOT NULL,
  `unit_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `unit_abbreviation`, `unit_status`) VALUES
('U12839', 'CM', '', ''),
('U102939', 'Meter', 'Mu', 'active'),
('U57891973ec7c6', 'Centimeter', 'CM', 'inactive'),
('U578919c3091fd', 'Centimeter', 'CM', 'active'),
('U578920740365d', 'Kilogram', 'KG', 'active'),
('U57893b3d7f15c', 'Milimeter', 'ML', 'active'),
('U5789be09e6c77', 'Gram', 'g', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `unit_modifier`
--

CREATE TABLE IF NOT EXISTS `unit_modifier` (
  `unit_id` varchar(25) NOT NULL,
  `unit_name` varchar(200) NOT NULL,
  `unit_abbreviation` varchar(25) NOT NULL,
  `unit_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_modifier`
--

INSERT INTO `unit_modifier` (`unit_id`, `unit_name`, `unit_abbreviation`, `unit_status`) VALUES
('U12839', 'CM', '', ''),
('U102939', 'Meter', 'M', 'active'),
('U57891973ec7c6', 'Centimeter', 'CM', 'inactive'),
('U578919c3091fd', 'Centimeter', 'CM', 'active'),
('U578920740365d', 'Kilogram', 'KG', 'active'),
('U57893b3d7f15c', 'Milimeter', 'ML', 'active'),
('U5789be09e6c77', 'Gram', 'g', 'active'),
('U5795cc5c6e7a0', 'Kilometer', 'KM', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_name` varchar(15) NOT NULL,
  `users_password` varchar(50) NOT NULL,
  `users_type` varchar(15) NOT NULL,
  `users_status` char(10) NOT NULL,
  PRIMARY KEY (`users_name`),
  UNIQUE KEY `users_name` (`users_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_name`, `users_password`, `users_type`, `users_status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'active'),
('USER 1', '827ccb0eea8a706c4c34a16891f84e7b', 'USER', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE IF NOT EXISTS `vaccines` (
  `vaccine_id` varchar(25) NOT NULL DEFAULT '0',
  `vaccine_name` varchar(100) DEFAULT NULL,
  `size` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccine_id`, `vaccine_name`, `size`, `price`, `status`) VALUES
('1', 'vaccine 1.1', 'small', '250.00', 'active'),
('2', 'vaccine 2.1', 'small', '300.00', 'inactive');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
