-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 03:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_support`
--

CREATE TABLE `customer_support` (
  `support_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `feedback_status` varchar(50) DEFAULT 'active',
  `sent_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_support`
--

INSERT INTO `customer_support` (`support_id`, `user_id`, `feedback`, `feedback_status`, `sent_date`) VALUES
(1, 'U0001', 'you are doing good keep it up', 'active', '2025-05-31 14:26:34'),
(2, 'U0002', 'i need you to fix the item name', 'active', '2025-05-31 14:27:11'),
(3, 'U0003', 'hello admin', 'active', '2025-05-31 14:27:11'),
(4, 'U0004', 'my name is biruk', 'active', '2025-05-31 14:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `fiber_mini_mini_store_balance`
--

CREATE TABLE `fiber_mini_mini_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fiber_mini_mini_store_balance`
--

INSERT INTO `fiber_mini_mini_store_balance` (`id`, `item_code`, `balance`, `status`) VALUES
(1, 'ITEM0001', '10', 'active'),
(2, 'ITEM0002', '10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `fiber_mini_mini_store_request`
--

CREATE TABLE `fiber_mini_mini_store_request` (
  `item_code` varchar(200) NOT NULL,
  `team1` varchar(100) DEFAULT NULL,
  `team2` varchar(100) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `requested_date` date NOT NULL DEFAULT current_timestamp(),
  `qnty` varchar(255) NOT NULL,
  `In_Out` varchar(255) NOT NULL,
  `InFrom_OutTo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `transaction_id` int(100) NOT NULL,
  `team1_accepet` varchar(255) NOT NULL,
  `team2_accept` varchar(255) NOT NULL,
  `cancel` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fiber_mini_store_balance`
--

CREATE TABLE `fiber_mini_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fiber_mini_store_balance`
--

INSERT INTO `fiber_mini_store_balance` (`id`, `item_code`, `balance`, `status`) VALUES
(1, 'ITEM0001', '10', 'active'),
(2, 'ITEM0002', '10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `fiber_mini_store_request`
--

CREATE TABLE `fiber_mini_store_request` (
  `item_code` varchar(200) NOT NULL,
  `team1` varchar(100) DEFAULT NULL,
  `team2` varchar(100) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `requested_date` date NOT NULL DEFAULT current_timestamp(),
  `qnty` varchar(255) NOT NULL,
  `In_Out` varchar(255) NOT NULL,
  `InFrom_OutTo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `transaction_id` int(100) NOT NULL,
  `team1_accepet` varchar(255) NOT NULL,
  `team2_accept` varchar(255) NOT NULL,
  `cancel` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finishing_store_balance`
--

CREATE TABLE `finishing_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finishing_store_balance`
--

INSERT INTO `finishing_store_balance` (`id`, `item_code`, `balance`, `status`) VALUES
(1, 'ITEM0001', '10', 'active'),
(2, 'ITEM0002', '20', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `flower_pot_store_balance`
--

CREATE TABLE `flower_pot_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flower_pot_store_balance`
--

INSERT INTO `flower_pot_store_balance` (`id`, `item_code`, `balance`, `status`) VALUES
(1, 'ITEM0001', '10', 'active'),
(2, 'ITEM0002', '10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `genda_getema_store_balance`
--

CREATE TABLE `genda_getema_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genda_getema_store_balance`
--

INSERT INTO `genda_getema_store_balance` (`id`, `item_code`, `balance`, `status`) VALUES
(1, 'ITEM0001', '10', 'active'),
(2, 'ITEM0002', '10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `item_code` varchar(100) NOT NULL,
  `item_description` varchar(100) DEFAULT NULL,
  `conversion_rate` decimal(10,2) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `origin` varchar(50) DEFAULT NULL,
  `unit_cost` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `inserted_at` date DEFAULT current_timestamp(),
  `status_of_Item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`item_code`, `item_description`, `conversion_rate`, `category`, `uom`, `origin`, `unit_cost`, `unit_price`, `inserted_at`, `status_of_Item`) VALUES
('ITEM0001', 'Acrylic  Copolymer  (Import) 240kg (A)', 240.00, 'PAINT', 'DRUM', 'CHINA', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0002', 'Copolymer Glue -TULSI  250 kg', 250.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'inactive'),
('ITEM0003', 'Homopolymer Glue (Resin Visicrly) 250 kg', 250.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'inactive'),
('ITEM0004', 'Pure Acrylic 240kg', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0005', 'Pure Acrylic  Copolymer  8155  240kg (C8)', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0006', 'Vamacrilic (Visicryl 7556E)(Elastomerc Emulsion Resin 240 kg', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0007', 'Long Oil Alkyd Resin  70% Import', 190.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0008', 'Long Oil Alkyd Resin  97% Import 200KG', 200.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0009', 'Uretane Modifed Oil 60%(Poly)', 220.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0010', 'Styrene Modifed Alkyed  (Styranated)Q 190KG', 190.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0011', 'Styrene Modifed Alkyed  (Styranated)Q 185KG', 185.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0012', 'Styrene Modifed Alkyed  (Styranated)(QSV) 200KG', 200.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0013', 'Acrylic  Solution ( Termo Plaster){TPA 60%}Plastic', 180.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0014', 'Preservative', 200.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0015', 'Organic Dispersing Agent (floro)250KG', 250.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0016', 'Liquid Thickner (828)', 165.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0017', 'Defomer (Antifom )Code 23&5 (170kg)', 170.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0018', 'Inorganic Dispersing Agent&Wetting agent (Tetron)', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0019', 'HEC Powder (HP)(HPMC)', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0020', 'HEMC Powder ', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0021', 'Plasticizer  (Dibutyl Phatalate)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0022', 'Wetting and Emulsifyng Agent(Panox)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0023', 'Dispersing and Anti-Settling agent (Patad)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0024', 'Dispersing and Wetting agent (Soya Solvent)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0025', 'Calcium Octoate 10%       ', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0026', 'Calcium Octoate 10%  30kg      ', 30.00, 'PAINT', 'Jerican', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0027', 'Costic Soda Solution-', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0028', 'Cobalt Octoate 10%', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0029', 'Cobalt Octoate 10% 30KG', 30.00, 'PAINT', 'Jerican', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0030', 'Lead Octoate 36% (zicronium Octoate)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0031', 'Antiskining Agent /MEKO/', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0032', 'Benton (Viscogel) 25kg(J)', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0033', 'Emulsifier Resin (ES 4045 )', 250.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0034', 'Titanium Dioxide (T02)', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0035', 'Organic Red 112 (25 kgR)', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0036', 'Phthalocyanine Green[PG-7] (25kg)', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0037', 'Phthalocyanine Blue[PG -15.3] Powder 25KG (BU/B)', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0038', 'Pigment  Yellow Organic Yellow Powder 74 25KG(Y) ', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0039', 'Pigment  yellow Organic Yellow Powder 74 20KG(Y) ', 20.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0040', 'Pigment  Black  20kg', 20.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0041', 'Pigment  Violet  25kg (V)', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0042', 'Lemon Chrome 25kg LO', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0043', 'Iron Oxide Red  25kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0044', 'Iron Oxide Brown  25kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0045', 'Iron Oxide Black 25 kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0046', 'Iron Oxide Yellow 25kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0047', 'Iron Oxide Green 25kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0048', 'Iron Oxide Blue 25kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0049', 'Green Paste                 ', 1.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0050', 'Violet Paste', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0051', 'Blue Paste', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0052', 'Yellow Paste', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0053', 'Red Paste              ', 0.00, 'PAINT', 'Jerican', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0054', 'Red Paste              ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0055', 'Black Paste          ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0056', 'Aluminium Paste Non Leafing (215) 25kg', 25.00, 'PAINT', 'Jerican', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0057', 'Aluminium Paste Non Leafing 250kg', 250.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0058', 'Aluminium Paste Tapa Leafing 250kg', 250.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0059', 'Xylene', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0060', 'Lacquer Thinner (dulentin)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0061', 'Barium Sulphate [BaSO4]', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0062', 'Calcinad Kaolin(china)', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0063', 'Caustic Soda 25kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0064', 'LABSA', 250.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0065', 'STPP 25 kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0066', 'Sodium Sluphate  25kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0067', 'Tri Sodium Phosphate  25kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0068', 'Tri Sodium Phosphate  25kg', 25.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0069', '(W)soda ash light  25kg', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0070', 'CALCIUM HYPOCLORITE', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0071', '8351 (COPOLYMER 240KG) G (WATER BASED)', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0072', 'Tx (Barium) Texanol(1)', 0.00, 'PAINT', 'Jerican', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0073', 'Code3 LA Bariam Sulphate(Laponite)', 0.00, 'PAINT', 'Jerican', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0074', 'IPA (code 18)(IPA 160Kg Code2)(210kg)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0075', 'Ethyl Octate (Code 20)(code3)180kg', 180.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0076', 'Butyl Octate (Code 19)(code4)185kg', 185.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0077', 'Zink Stearate (Code z)', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0078', 'NC-Solution (Code 2)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0079', 'Anti-terrau (Code 8)(AT)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0080', 'CU NAPHTANATE SOLUTION (COD 9)', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0081', 'NI -53-100(COD 10)', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0082', 'Short Oil (Code 3) (ND)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0083', 'SILCON OIL', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0084', 'Code 1 Disp 9715 (PD)200kg', 200.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0085', 'Code 2Tis 3245(200kg)', 200.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0086', 'Code 3 Antifom (PDF)200kg', 200.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0087', 'Sumica Bright Gold 4199  25kg(Gold pearl)', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0088', 'Sumica Bright Silver 4179 25 kg (Silver Pearl)', 25.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0089', 'Pearl Copper (bronze)', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0090', 'UPR (???? ????)( FL)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0091', '(ED) EPOXY Duluenty(code LPZ)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0092', 'EPOXY RISEN  240 KG ', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0093', 'EPOXY HARDENER 195KG ', 195.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0094', 'EPOXY Dispersing Agent(O)', 0.00, 'PAINT', 'Jerican', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0095', ' Self Levelling BYK 300 COD14 (LE) EPOXY ', 0.00, 'PAINT', 'Jerican', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0096', 'EPOXY Deformer(EDF)(150kg codeA)', 150.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0097', 'Formaldehyed (F) 225kg', 225.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0098', 'Malic Resin', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0099', 'Dispersing Agent for NC 200kg(code 6)', 200.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0100', 'Deformer for NC 180kg code 5(DF)', 180.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0101', '828 (COPOLYMER 240KG) O', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0102', 'OP-66 (COPOLYMER 240KG) Q', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0103', '8850 (COPOLYMER 240KG) I', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0104', '4954 (COPOLYMER 240KG) M', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0105', '8345 (COPOLYMER 240KG) K', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0106', '8439 (COPOLYMER 240KG) S', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0107', '960 (COPOLYMER 240KG) P', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0108', '7557 (COPOLYMER 240KG) B', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0109', '7290 (COPOLYMER 240KG) F', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0110', '4571 (COPOLYMER 240KG) L', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0111', '845 (COPOLYMER 240KG) N', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0112', '7669 (COPOLYMER 240KG) J', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0113', '7796 (COPOLYMER 240KG) D', 240.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0114', 'GLYCOL ', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0115', 'Mica Powder', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0116', 'Talk 30(code T2)', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0117', 'Talk 81 (code T1)', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0118', 'Alchol', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0119', 'TALC POWDER', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0120', 'STYRENE MONOMOR ', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0121', 'REDESPERSABLE EMULSION POWDER (RDP)_TYPE 602', 0.00, 'PAINT', 'bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0122', 'REDESPERSABLE EMULSION POWDER (RDP)_TYPE 718', 0.00, 'PAINT', 'bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0123', 'LDPE (POLY BAG)', 0.00, 'PAINT', 'pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0124', 'petrolum Jelly', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0125', 'TDI(TD)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0126', 'PO(POLYYOL)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0127', '45 (ifcal 1145)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0128', 'Pollyster Resine(Code 7)', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0129', 'Kerosen', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0130', 'SUPER BLACK ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0131', 'SUPER RED', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0132', 'SUPER GREEN', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0133', 'SUPER TAN', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0134', 'ENAMEL TAN ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0135', 'ENAMEL GREEN ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0136', 'ENAMEL RED ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0137', 'ENAMEL BLUE ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0138', 'GOLDEN TAN ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0139', 'MODIFIED VIOLET', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0140', 'DISPERSING AGENT/CODE4', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0141', 'Antifom Code 5 ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0142', 'Pin Oil', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0143', 'HAMMER BLUE PASTE', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0144', 'Snoflack ', 0.00, 'PAINT', 'Bag', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0145', 'Wetting Additive', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0146', 'Rozskder Resin', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0147', 'PG(Barium)/Propylenglycol/Code8', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0148', 'CR(castor oil)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0149', '50(ifcal 1150)', 0.00, 'PAINT', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0150', 'CODE-6/MFA', 0.00, 'PAINT', 'Jerican', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0151', 'Capsun/Wacker HDK(Fumid Silca)', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0152', 'Benzel', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0153', 'Modified Blue Paste       ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0154', 'Modified Yellow Paste          ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0155', 'Modified Green Paste        ', 0.00, 'PAINT', 'kg ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0156', 'RESIN', 0.00, 'FIBER', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0157', 'RESIN (F)', 0.00, 'FIBER', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0158', 'SP Jelcoat', 0.00, 'FIBER', 'Drum', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0159', 'Fiber', 0.00, 'FIBER', 'Roll', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0160', 'Woven Roving', 0.00, 'FIBER', 'Roll', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0161', 'Hardner  30KG', 30.00, 'FIBER', 'Jerican ', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0162', 'Fumed Silica', 0.00, 'FIBER', 'BAG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0163', 'Plastic Bath Cover #1', 0.00, 'FIBER', 'Roll', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0164', 'Plastic Bath Cover #2', 0.00, 'FIBER', 'Roll', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0165', 'Black Jelcoat', 0.00, 'FIBER', 'kg', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0166', 'Nipples   ?\"', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0167', 'Nipples   1\"', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0168', 'P,V.A', 0.00, 'FIBER', 'kg', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0169', 'Stuco Catalist', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0170', 'Stuco Catalist', 0.00, 'FIBER', 'kg', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0171', 'Nipples   1 1/4\"', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0172', 'Nipples  1?\"', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0173', 'Nipples ?\"', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0174', 'Nipples  2\"', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0175', 'Nipples  2?\"', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0176', 'Nipples  3\"', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0177', 'Nipples   4\"', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0178', 'Bolt Long Tanker', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0179', 'Bolt Short Tanker', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0180', 'Bolt Nut Tanker', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0181', 'Bath Nut #17', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0182', 'Bath Nut#19', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0183', 'Bath Gate', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0184', 'Bath Gomini', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0185', 'Bath screw', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0186', 'Bath Gate LYU', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0187', 'Bath Bolt', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0188', 'Mg 1', 0.00, 'FIBER', 'kg', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0189', 'Mg 8', 0.00, 'FIBER', 'kg', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0190', 'Mg 8(0.311KG)', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0191', 'Mg-3', 0.00, 'FIBER', 'kg', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0192', 'Mg-3(1.8KG)', 1.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0193', 'Stuco', 0.00, 'FIBER', 'kg', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0194', 'Plastic Angle ', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0195', 'Nut*27', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0196', 'Bolt*19 (???)', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0197', 'Bolt*27', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0198', 'Square Cover', 0.00, 'FIBER', 'Pcs', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0199', 'DULENTI', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0200', 'Hardner', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0201', 'Sp-Gelcoat', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0202', 'Pigment', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0203', 'Gp. Resin NEW', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0204', 'Gp. Resin ', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0205', 'Gp. Gelcoat', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0206', 'Calcium', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0207', 'Majun', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0208', '200 Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0209', '200 Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0210', '500 Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0211', '500 Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0212', '1000 Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0213', '1000 Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0214', '1500 N FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0215', '1500 N FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0216', '1500 V/C FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0217', '1500 V/C FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0218', '2000 Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0219', '2000 Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0220', '3000 Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0221', '3000 Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0222', '4000 Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0223', '4000 Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0224', 'Woven Roving TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0225', 'Woven Roving BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0226', '5000 Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0227', '5000 Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0228', 'Woven Roving TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0229', 'Woven Roving BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0230', '7000 Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0231', '7000 Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0232', 'Woven Roving TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0233', 'Woven Roving BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0234', '8000  Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0235', '8000  Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0236', 'Woven Roving TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0237', 'Woven Roving BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0238', '10000  Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0239', '10000  Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0240', 'Woven Roving TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0241', 'Woven Roving BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0242', '15000  Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0243', '15000  Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0244', 'Woven Roving TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0245', 'Woven Roving BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0246', '20000  Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0247', '20000  Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0248', 'Woven Roving TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0249', 'Woven Roving BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0250', '25000  Lts FIBER TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0251', '25000  Lts FIBER BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0252', 'Woven Roving TOP', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0253', 'Woven Roving BOTTOM', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0254', 'Belt(Tigena)', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0255', 'Weaving', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0256', 'Fiber Fan', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0257', '200 Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0258', '500 Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0259', '1000 Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0260', '1500 N FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0261', '1500 V/C FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0262', '2000 Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0263', '3000 Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0264', '4000 Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0265', '5000 Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0266', '7000 Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0267', '8000  Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0268', '10000  Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0269', '15000  Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0270', '20000  Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0271', '25000  Lts FIBER', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0272', '70*70 cm S.T    ?? Normal /70*70 cm S.T normal', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0273', '60*60 cm S.T  ?? Normal /60*60 cm S.T ', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0274', '70*70 cm S.T  With cover New', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0275', '80*80 cm S.T', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0276', '80*80 CM With Cover New           ', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0277', '90*90 S.t with Cover', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0278', '140*60 cm L . Bath', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0279', '160*70 cm L . Bath', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0280', '170*70 cm  L. Bath', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0281', '150*150 cm J.A Frame', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0282', '150*70 cm Bath ', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0283', '170*70 cm Bath ', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0284', '180*80 cm Bath  New', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0285', '150*70 U- Shape Frame', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0286', ' U- shape Frame(1.70*0.70)', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0287', '1M*50 cm  SINK', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0288', '120*60 cm  SINK', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0289', '120*50 cm  SINK', 0.00, 'FIBER', 'PCS', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0290', 'Scrap', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0291', 'Lip', 0.00, 'FIBER', 'KG', 'china', 0.00, 0.00, '2025-05-22', 'active'),
('ITEM0292', 'test 1', 240.00, 'Others', 'DRUM', 'CHINA', 0.00, 0.00, '2025-05-30', 'active'),
('ITEM0293', 'test2', 240.00, 'Others', 'DRUM', 'INDIA', 0.00, 0.00, '2025-05-30', 'active'),
('ITEM0294', 'text 3', 240.00, 'Others', 'PKT', 'EGIPT', 12.00, 12.00, '2025-05-30', 'active'),
('ITEM0295', 'test 4', 240.00, 'FIBER', 'DRUM', 'DUBAI', 1919.00, 1919.00, '2025-05-30', 'active'),
('ITEM0296', 'ghf', 500.00, 'PAINT', 'DRUM', 'DUBAI', 0.00, 0.00, '2025-05-30', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `main_store_balance`
--

CREATE TABLE `main_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_store_balance`
--

INSERT INTO `main_store_balance` (`id`, `item_code`, `balance`, `status`) VALUES
(52, 'ITEM0001', 70.00, 'active'),
(53, 'ITEM0156', 100.00, 'active'),
(54, 'ITEM0006', 100.00, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `main_store_history`
--

CREATE TABLE `main_store_history` (
  `transaction_id` int(11) NOT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `stock_in` decimal(10,2) NOT NULL DEFAULT 0.00,
  `stock_out` decimal(10,2) NOT NULL DEFAULT 0.00,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saved_date` date DEFAULT current_timestamp(),
  `requested_by` varchar(255) NOT NULL,
  `team1_accept` varchar(255) NOT NULL,
  `team2_accept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_store_history`
--

INSERT INTO `main_store_history` (`transaction_id`, `item_code`, `stock_in`, `stock_out`, `balance`, `saved_date`, `requested_by`, `team1_accept`, `team2_accept`) VALUES
(119, 'ITEM0001', 0.00, 5.00, 95.00, '2025-05-31', 'biruk', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted'),
(120, 'ITEM0001', 0.00, 5.00, 95.00, '2025-05-31', 'biruk', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted'),
(121, 'ITEM0001', 0.00, 10.00, 90.00, '2025-05-31', 'haymanot', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted'),
(122, 'ITEM0001', 0.00, 10.00, 90.00, '2025-05-31', 'haymanot', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted'),
(123, 'ITEM0001', 0.00, 10.00, 80.00, '2025-05-31', 'haymanot', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted'),
(124, 'ITEM0001', 0.00, 10.00, 70.00, '2025-05-31', 'haymanot', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted'),
(125, 'ITEM0001', 0.00, 10.00, 70.00, '2025-05-31', 'haymanot', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `main_store_report`
--

CREATE TABLE `main_store_report` (
  `report_id` int(11) NOT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `stock_in` int(11) DEFAULT 0,
  `stock_out` int(11) DEFAULT 0,
  `balance` int(11) DEFAULT 0,
  `saved_by` varchar(100) DEFAULT NULL,
  `saved_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_store_request`
--

CREATE TABLE `main_store_request` (
  `item_code` varchar(200) NOT NULL,
  `team1` int(10) DEFAULT 0,
  `team2` int(10) DEFAULT 0,
  `department` varchar(255) NOT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `requested_date` date NOT NULL DEFAULT current_timestamp(),
  `qnty` varchar(255) NOT NULL,
  `In_Out` varchar(255) NOT NULL,
  `InFrom_OutTo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `team1_accepet` varchar(255) NOT NULL,
  `team2_accept` varchar(255) NOT NULL,
  `cancel` int(100) NOT NULL,
  `transaction_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_store_request`
--

INSERT INTO `main_store_request` (`item_code`, `team1`, `team2`, `department`, `requested_by`, `requested_date`, `qnty`, `In_Out`, `InFrom_OutTo`, `status`, `team1_accepet`, `team2_accept`, `cancel`, `transaction_id`) VALUES
('ITEM0001', 0, 1, 'paint_mini_store', 'biruk', '2025-05-31', '5', 'OUT', 'required for production', 'active', '', 'FITSUM TEAM  Accepted', 0, 50),
('ITEM0001', 1, 0, 'paint_mini_store', 'haymanot', '2025-05-31', '10', 'OUT', 'they need urgently', 'active', 'YESMAW YESMAW  Accepted', '', 0, 51),
('ITEM0001', 1, 1, 'paint_mini_store', 'haymanot', '2025-05-31', '10', 'OUT', 'urgent', 'active', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted', 0, 52),
('ITEM0001', 1, 1, 'paint_mini_store', 'haymanot', '2025-05-31', '10', 'OUT', 'muste', 'active', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted', 0, 53),
('ITEM0001', 1, 1, 'paint_mini_store', 'haymanot', '2025-05-31', '10', 'OUT', 'dave', 'active', 'YESMAW YESMAW  Accepted', 'FITSUM TEAM  Accepted', 0, 54);

-- --------------------------------------------------------

--
-- Table structure for table `metal_store_balance`
--

CREATE TABLE `metal_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metal_store_balance`
--

INSERT INTO `metal_store_balance` (`id`, `item_code`, `balance`, `status`) VALUES
(1, 'ITEM0001', '10', 'active'),
(2, 'ITEM0002', '10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `paint_mini_mini_store_balance`
--

CREATE TABLE `paint_mini_mini_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paint_mini_mini_store_request`
--

CREATE TABLE `paint_mini_mini_store_request` (
  `item_code` varchar(200) NOT NULL,
  `team1` varchar(100) DEFAULT NULL,
  `team2` varchar(100) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `requested_date` date NOT NULL DEFAULT current_timestamp(),
  `qnty` varchar(255) NOT NULL,
  `In_Out` varchar(255) NOT NULL,
  `InFrom_OutTo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `transaction_id` int(100) NOT NULL,
  `team1_accepet` varchar(255) NOT NULL,
  `team2_accept` varchar(255) NOT NULL,
  `cancel` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paint_mini_store_balance`
--

CREATE TABLE `paint_mini_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paint_mini_store_balance`
--

INSERT INTO `paint_mini_store_balance` (`id`, `item_code`, `balance`, `status`) VALUES
(78, 'ITEM0001', 30.00, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `paint_mini_store_history`
--

CREATE TABLE `paint_mini_store_history` (
  `transaction_id` int(11) NOT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `stock_in` decimal(10,2) NOT NULL DEFAULT 0.00,
  `stock_out` decimal(10,2) NOT NULL DEFAULT 0.00,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saved_date` date DEFAULT current_timestamp(),
  `requested_by` varchar(255) NOT NULL,
  `team1_accept` varchar(255) NOT NULL,
  `team2_accept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paint_mini_store_report`
--

CREATE TABLE `paint_mini_store_report` (
  `report_id` int(11) NOT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `stock_in` int(11) DEFAULT 0,
  `stock_out` int(11) DEFAULT 0,
  `balance` int(11) DEFAULT 0,
  `saved_by` varchar(100) DEFAULT NULL,
  `saved_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paint_mini_store_request`
--

CREATE TABLE `paint_mini_store_request` (
  `item_code` varchar(200) NOT NULL,
  `team1` varchar(100) DEFAULT NULL,
  `team2` varchar(100) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `requested_date` date NOT NULL DEFAULT current_timestamp(),
  `qnty` varchar(255) NOT NULL,
  `In_Out` varchar(255) NOT NULL,
  `InFrom_OutTo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `transaction_id` int(100) NOT NULL,
  `team1_accepet` varchar(255) NOT NULL,
  `team2_accept` varchar(255) NOT NULL,
  `cancel` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paint_mini_store_request`
--

INSERT INTO `paint_mini_store_request` (`item_code`, `team1`, `team2`, `department`, `requested_by`, `requested_date`, `qnty`, `In_Out`, `InFrom_OutTo`, `status`, `transaction_id`, `team1_accepet`, `team2_accept`, `cancel`) VALUES
('ITEM0001', '1', '1', 'main_store', 'marta marta', '2025-05-31', '5', 'IN', 'need for 15 dAY', 'active', 338, 'alexander  Accepted', 'ftminis  Accepted', 0),
('ITEM0001', '1', '1', 'main_store', 'marta marta', '2025-05-31', '10', 'IN', 'we need urgently', 'active', 339, 'alexander  Accepted', 'ftminis  Accepted', 0),
('ITEM0001', '1', '1', 'main_store', 'marta marta', '2025-05-31', '10', 'IN', 'urgent', 'active', 340, 'alexander  Accepted', 'ftminis  Accepted', 0),
('ITEM0001', '1', '1', 'main_store', 'marta marta', '2025-05-31', '10', 'IN', 'muste', 'active', 341, 'alexander  Accepted', 'ftminis  Accepted', 0),
('ITEM0001', '1', '1', 'main_store', 'marta marta', '2025-05-31', '10', 'IN', 'dave', 'active', 342, 'alexander  Accepted', 'ftminis  Accepted', 0);

-- --------------------------------------------------------

--
-- Table structure for table `total_super_store_balance`
--

CREATE TABLE `total_super_store_balance` (
  `item_code` varchar(255) NOT NULL,
  `m_store` decimal(10,2) DEFAULT 0.00,
  `fm_store` decimal(10,2) DEFAULT 0.00,
  `pm_store` decimal(10,2) DEFAULT 0.00,
  `fmm_store` decimal(10,2) DEFAULT 0.00,
  `pmm_store` decimal(10,2) DEFAULT 0.00,
  `finishing_store` decimal(10,2) DEFAULT 0.00,
  `metal_store` decimal(10,2) DEFAULT 0.00,
  `genda_getema` decimal(10,2) DEFAULT 0.00,
  `fp_store` decimal(10,2) DEFAULT 0.00,
  `total_balance` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_super_store_balance`
--

INSERT INTO `total_super_store_balance` (`item_code`, `m_store`, `fm_store`, `pm_store`, `fmm_store`, `pmm_store`, `finishing_store`, `metal_store`, `genda_getema`, `fp_store`, `total_balance`) VALUES
('ITEM0001', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
('ITEM0296', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `registerd_date` date NOT NULL DEFAULT current_timestamp(),
  `sub_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `phonenumber`, `department`, `role`, `status`, `registerd_date`, `sub_role`) VALUES
('U0001', 'main', '1234', 'biruk', '0943087791', 'main_store', 'admin', 'active', '2025-05-16', 'admin'),
('U0002', 'marta', '1234', 'marta marta', '0911121314', 'paint_mini_store', 'admin', 'active', '2025-05-30', 'admin'),
('U0003', 'alex', '1234', 'alexander', '0911121314', 'paint_mini_store', 'team1', 'active', '2025-05-30', 'paint_mini'),
('U0004', 'ftmini', '1234', 'ftminis', '0911121314', 'paint_mini_store', 'team2', 'active', '2025-05-30', 'paint_mini'),
('U0017', 'muste', '1234', 'mustefa husen', '0911121314', 'administrator', 'administrator', 'active', '2025-05-27', 'administrator'),
('U0018', 'SuperAdmin', '1234', 'biruk mulualem', '0911121314', 'administrator', 'administrator', 'active', '2025-05-27', 'administrator'),
('U0019', 'haymanot', '1234', 'haymanot', '0911121314', 'main_store', 'admin', 'active', '2025-05-30', 'paint_main'),
('U0020', 'biftu', '1234', 'biftu bftu', '0911121314', 'main_store', 'admin', 'active', '2025-05-30', 'fiber_main'),
('U0021', 'tg', '1234', 'tigist', '0911121314', 'main_store', 'admin', 'active', '2025-05-30', 'fixed_asset'),
('U0022', 'YESMAW', '1234', 'YESMAW YESMAW', '0911121314', 'main_store', 'team1', 'active', '2025-05-30', 'paint_main'),
('U0023', 'NATI', '1234', 'NATNAEL', '0911121314', 'main_store', 'team1', 'active', '2025-05-30', 'fiber_main'),
('U0024', 'KETEMA', '1234', 'KETEMA KETEMA', '0911121314', 'main_store', 'team1', 'active', '2025-05-30', 'fixed_asset'),
('U0025', 'FT1', '1234', 'FITSUM TEAM', '0911121314', 'main_store', 'team2', 'active', '2025-05-30', 'paint_main'),
('U0026', 'FT2', '1234', 'FISTUM TEAM', '0911121314', 'main_store', 'team2', 'active', '2025-05-30', 'fiber_main'),
('U0027', 'FT3', '1234', 'FITSUM TEAM', '0911121314', 'main_store', 'team2', 'active', '2025-05-30', 'fixed_asset');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_support`
--
ALTER TABLE `customer_support`
  ADD PRIMARY KEY (`support_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `fiber_mini_mini_store_balance`
--
ALTER TABLE `fiber_mini_mini_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `fiber_mini_mini_store_request`
--
ALTER TABLE `fiber_mini_mini_store_request`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_item_code` (`item_code`);

--
-- Indexes for table `fiber_mini_store_balance`
--
ALTER TABLE `fiber_mini_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `fiber_mini_store_request`
--
ALTER TABLE `fiber_mini_store_request`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_item_code` (`item_code`);

--
-- Indexes for table `finishing_store_balance`
--
ALTER TABLE `finishing_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `flower_pot_store_balance`
--
ALTER TABLE `flower_pot_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `genda_getema_store_balance`
--
ALTER TABLE `genda_getema_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `main_store_balance`
--
ALTER TABLE `main_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `main_store_history`
--
ALTER TABLE `main_store_history`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `main_store_report`
--
ALTER TABLE `main_store_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `main_store_request`
--
ALTER TABLE `main_store_request`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_item_code` (`item_code`);

--
-- Indexes for table `metal_store_balance`
--
ALTER TABLE `metal_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `paint_mini_mini_store_balance`
--
ALTER TABLE `paint_mini_mini_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `paint_mini_mini_store_request`
--
ALTER TABLE `paint_mini_mini_store_request`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_item_code` (`item_code`);

--
-- Indexes for table `paint_mini_store_balance`
--
ALTER TABLE `paint_mini_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `paint_mini_store_history`
--
ALTER TABLE `paint_mini_store_history`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `paint_mini_store_report`
--
ALTER TABLE `paint_mini_store_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `paint_mini_store_request`
--
ALTER TABLE `paint_mini_store_request`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_item_code` (`item_code`);

--
-- Indexes for table `total_super_store_balance`
--
ALTER TABLE `total_super_store_balance`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_support`
--
ALTER TABLE `customer_support`
  MODIFY `support_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fiber_mini_mini_store_balance`
--
ALTER TABLE `fiber_mini_mini_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `fiber_mini_mini_store_request`
--
ALTER TABLE `fiber_mini_mini_store_request`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `fiber_mini_store_balance`
--
ALTER TABLE `fiber_mini_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `fiber_mini_store_request`
--
ALTER TABLE `fiber_mini_store_request`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `finishing_store_balance`
--
ALTER TABLE `finishing_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `flower_pot_store_balance`
--
ALTER TABLE `flower_pot_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `genda_getema_store_balance`
--
ALTER TABLE `genda_getema_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `main_store_balance`
--
ALTER TABLE `main_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `main_store_history`
--
ALTER TABLE `main_store_history`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `main_store_report`
--
ALTER TABLE `main_store_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `main_store_request`
--
ALTER TABLE `main_store_request`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `metal_store_balance`
--
ALTER TABLE `metal_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `paint_mini_mini_store_balance`
--
ALTER TABLE `paint_mini_mini_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `paint_mini_mini_store_request`
--
ALTER TABLE `paint_mini_mini_store_request`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `paint_mini_store_balance`
--
ALTER TABLE `paint_mini_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `paint_mini_store_history`
--
ALTER TABLE `paint_mini_store_history`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `paint_mini_store_report`
--
ALTER TABLE `paint_mini_store_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `paint_mini_store_request`
--
ALTER TABLE `paint_mini_store_request`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_support`
--
ALTER TABLE `customer_support`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `fiber_mini_mini_store_balance`
--
ALTER TABLE `fiber_mini_mini_store_balance`
  ADD CONSTRAINT `fiber_mini_mini_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `fiber_mini_mini_store_request`
--
ALTER TABLE `fiber_mini_mini_store_request`
  ADD CONSTRAINT `fk3_item_code` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `fiber_mini_store_balance`
--
ALTER TABLE `fiber_mini_store_balance`
  ADD CONSTRAINT `fiber_mini_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `finishing_store_balance`
--
ALTER TABLE `finishing_store_balance`
  ADD CONSTRAINT `finishing_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `flower_pot_store_balance`
--
ALTER TABLE `flower_pot_store_balance`
  ADD CONSTRAINT `flower_pot_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `genda_getema_store_balance`
--
ALTER TABLE `genda_getema_store_balance`
  ADD CONSTRAINT `genda_getema_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `main_store_balance`
--
ALTER TABLE `main_store_balance`
  ADD CONSTRAINT `main_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `main_store_history`
--
ALTER TABLE `main_store_history`
  ADD CONSTRAINT `main_store_history_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `main_store_report`
--
ALTER TABLE `main_store_report`
  ADD CONSTRAINT `main_store_report_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `main_store_request`
--
ALTER TABLE `main_store_request`
  ADD CONSTRAINT `fk_item_code` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `metal_store_balance`
--
ALTER TABLE `metal_store_balance`
  ADD CONSTRAINT `metal_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `paint_mini_mini_store_balance`
--
ALTER TABLE `paint_mini_mini_store_balance`
  ADD CONSTRAINT `paint_mini_mini_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `paint_mini_mini_store_request`
--
ALTER TABLE `paint_mini_mini_store_request`
  ADD CONSTRAINT `fk2_item_code` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `paint_mini_store_balance`
--
ALTER TABLE `paint_mini_store_balance`
  ADD CONSTRAINT `paint_mini_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `paint_mini_store_history`
--
ALTER TABLE `paint_mini_store_history`
  ADD CONSTRAINT `paint_mini_store_history_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `paint_mini_store_report`
--
ALTER TABLE `paint_mini_store_report`
  ADD CONSTRAINT `paint_mini_store_report_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

--
-- Constraints for table `total_super_store_balance`
--
ALTER TABLE `total_super_store_balance`
  ADD CONSTRAINT `fk1_item_code` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
