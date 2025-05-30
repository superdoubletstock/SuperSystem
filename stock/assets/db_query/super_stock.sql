-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 04:51 PM
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
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `item_code` varchar(100) NOT NULL,
  `item_description` varchar(100) DEFAULT NULL,
  `conversion_rate` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `origin` varchar(50) DEFAULT NULL,
  `unit_cost` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `inserted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`item_code`, `item_description`, `conversion_rate`, `category`, `uom`, `origin`, `unit_cost`, `unit_price`, `inserted_at`) VALUES
('ITEM0001', 'Acrylic  Copolymer  (Import) 240kg (A)', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0002', 'Copolymer Glue -TULSI  250 kg', '250', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0003', 'Homopolymer Glue (Resin Visicrly) 250 kg', '250', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0004', 'Pure Acrylic 240kg', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0005', 'Pure Acrylic  Copolymer  8155  240kg (C8)', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0006', 'Vamacrilic (Visicryl 7556E)(Elastomerc Emulsion Resin 240 kg', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0007', 'Long Oil Alkyd Resin  70% Import', '190', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0008', 'Long Oil Alkyd Resin  97% Import 200KG', '200', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0009', 'Uretane Modifed Oil 60%(Poly)', '220', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0010', 'Styrene Modifed Alkyed  (Styranated)Q 190KG', '190', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:45'),
('ITEM0011', 'Styrene Modifed Alkyed  (Styranated)Q 185KG', '185', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0012', 'Styrene Modifed Alkyed  (Styranated)(QSV) 200KG', '200', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0013', 'Acrylic  Solution ( Termo Plaster){TPA 60%}Plastic', '180', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0014', 'Preservative', '200', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0015', 'Organic Dispersing Agent (floro)250KG', '250', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0016', 'Liquid Thickner (828)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0017', 'Defomer (Antifom )Code 23&5 (170kg)', '170', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0018', 'Inorganic Dispersing Agent&Wetting agent (Tetron)', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0019', 'HEC Powder (HP)(HPMC)', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0020', 'HEMC Powder ', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0021', 'Plasticizer  (Dibutyl Phatalate)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0022', 'Wetting and Emulsifyng Agent(Panox)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0023', 'Dispersing and Anti-Settling agent (Patad)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0024', 'Dispersing and Wetting agent (Soya Solvent)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0025', 'Calcium Octoate 10%       ', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0026', 'Calcium Octoate 10%  30kg      ', '30', 'Paint', 'Jerican', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0027', 'Costic Soda Solution-', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:46'),
('ITEM0028', 'Cobalt Octoate 10%', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0029', 'Cobalt Octoate 10% 30KG', '30', 'Paint', 'Jerican', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0030', 'Lead Octoate 36% (zicronium Octoate)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0031', 'Antiskining Agent /MEKO/', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0032', 'Benton (Viscogel) 25kg(J)', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0033', 'Emulsifier Resin (ES 4045 )', '250', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0034', 'Titanium Dioxide (T02)', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0035', 'Organic Red 112 (25 kgR)', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0036', 'Phthalocyanine Green[PG-7] (25kg)', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0037', 'Phthalocyanine Blue[PG -15.3] Powder 25KG (BU/B)', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0038', 'Pigment  Yellow Organic Yellow Powder 74 25KG(Y) ', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0039', 'Pigment  yellow Organic Yellow Powder 74 20KG(Y) ', '20', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0040', 'Pigment  Black  20kg', '20', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0041', 'Pigment  Violet  25kg (V)', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0042', 'Lemon Chrome 25kg LO', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0043', 'Iron Oxide Red  25kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0044', 'Iron Oxide Brown  25kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0045', 'Iron Oxide Black 25 kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0046', 'Iron Oxide Yellow 25kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0047', 'Iron Oxide Green 25kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0048', 'Iron Oxide Blue 25kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0049', 'Green Paste                 ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0050', 'Violet Paste', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0051', 'Blue Paste', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0052', 'Yellow Paste', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0053', 'Red Paste              ', '', 'Paint', 'Jerican', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0054', 'Red Paste              ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:47'),
('ITEM0055', 'Black Paste          ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0056', 'Aluminium Paste Non Leafing (215) 25kg', '25', 'Paint', 'Jerican', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0057', 'Aluminium Paste Non Leafing 250kg', '250', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0058', 'Aluminium Paste Tapa Leafing 250kg', '250', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0059', 'Xylene', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0060', 'Lacquer Thinner (dulentin)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0061', 'Barium Sulphate [BaSO4]', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0062', 'Calcinad Kaolin(china)', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0063', 'Caustic Soda 25kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0064', 'LABSA', '250', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0065', 'STPP 25 kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0066', 'Sodium Sluphate  25kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0067', 'Tri Sodium Phosphate  25kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0068', 'Tri Sodium Phosphate  25kg', '25', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0069', '(W)soda ash light  25kg', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0070', 'CALCIUM HYPOCLORITE', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0071', '8351 (COPOLYMER 240KG) G (WATER BASED)', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0072', 'Tx (Barium) Texanol(1)', '', 'Paint', 'Jerican', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0073', 'Code3 LA Bariam Sulphate(Laponite)', '', 'Paint', 'Jerican', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0074', 'IPA (code 18)(IPA 160Kg Code2)(210kg)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0075', 'Ethyl Octate (Code 20)(code3)180kg', '180', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:48'),
('ITEM0076', 'Butyl Octate (Code 19)(code4)185kg', '185', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0077', 'Zink Stearate (Code z)', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0078', 'NC-Solution (Code 2)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0079', 'Anti-terrau (Code 8)(AT)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0080', 'CU NAPHTANATE SOLUTION (COD 9)', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0081', 'NI -53-100(COD 10)', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0082', 'Short Oil (Code 3) (ND)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0083', 'SILCON OIL', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0084', 'Code 1 Disp 9715 (PD)200kg', '200', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0085', 'Code 2Tis 3245(200kg)', '200', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0086', 'Code 3 Antifom (PDF)200kg', '200', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0087', 'Sumica Bright Gold 4199  25kg(Gold pearl)', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0088', 'Sumica Bright Silver 4179 25 kg (Silver Pearl)', '25', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0089', 'Pearl Copper (bronze)', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0090', 'UPR (???? ????)( FL)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0091', '(ED) EPOXY Duluenty(code LPZ)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0092', 'EPOXY RISEN  240 KG ', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0093', 'EPOXY HARDENER 195KG ', '195', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0094', 'EPOXY Dispersing Agent(O)', '', 'Paint', 'Jerican', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0095', ' Self Levelling BYK 300 COD14 (LE) EPOXY ', '', 'Paint', 'Jerican', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0096', 'EPOXY Deformer(EDF)(150kg codeA)', '150', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0097', 'Formaldehyed (F) 225kg', '225', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0098', 'Malic Resin', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:49'),
('ITEM0099', 'Dispersing Agent for NC 200kg(code 6)', '200', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0100', 'Deformer for NC 180kg code 5(DF)', '180', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0101', '828 (COPOLYMER 240KG) O', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0102', 'OP-66 (COPOLYMER 240KG) Q', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0103', '8850 (COPOLYMER 240KG) I', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0104', '4954 (COPOLYMER 240KG) M', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0105', '8345 (COPOLYMER 240KG) K', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0106', '8439 (COPOLYMER 240KG) S', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0107', '960 (COPOLYMER 240KG) P', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0108', '7557 (COPOLYMER 240KG) B', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0109', '7290 (COPOLYMER 240KG) F', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0110', '4571 (COPOLYMER 240KG) L', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0111', '845 (COPOLYMER 240KG) N', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0112', '7669 (COPOLYMER 240KG) J', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0113', '7796 (COPOLYMER 240KG) D', '240', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0114', 'GLYCOL ', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0115', 'Mica Powder', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0116', 'Talk 30(code T2)', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0117', 'Talk 81 (code T1)', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0118', 'Alchol', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0119', 'TALC POWDER', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0120', 'STYRENE MONOMOR ', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0121', 'REDESPERSABLE EMULSION POWDER (RDP)_TYPE 602', '', 'Paint', 'bag', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0122', 'REDESPERSABLE EMULSION POWDER (RDP)_TYPE 718', '', 'Paint', 'bag', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0123', 'LDPE (POLY BAG)', '', 'Paint', 'pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0124', 'petrolum Jelly', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0125', 'TDI(TD)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:50'),
('ITEM0126', 'PO(POLYYOL)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0127', '45 (ifcal 1145)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0128', 'Pollyster Resine(Code 7)', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0129', 'Kerosen', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0130', 'SUPER BLACK ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0131', 'SUPER RED', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0132', 'SUPER GREEN', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0133', 'SUPER TAN', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0134', 'ENAMEL TAN ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0135', 'ENAMEL GREEN ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0136', 'ENAMEL RED ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0137', 'ENAMEL BLUE ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0138', 'GOLDEN TAN ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0139', 'MODIFIED VIOLET', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0140', 'DISPERSING AGENT/CODE4', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0141', 'Antifom Code 5 ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0142', 'Pin Oil', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0143', 'HAMMER BLUE PASTE', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0144', 'Snoflack ', '', 'Paint', 'Bag', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0145', 'Wetting Additive', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0146', 'Rozskder Resin', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0147', 'PG(Barium)/Propylenglycol/Code8', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0148', 'CR(castor oil)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0149', '50(ifcal 1150)', '', 'Paint', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0150', 'CODE-6/MFA', '', 'Paint', 'Jerican', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0151', 'Capsun/Wacker HDK(Fumid Silca)', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0152', 'Benzel', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:51'),
('ITEM0153', 'Modified Blue Paste       ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0154', 'Modified Yellow Paste          ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0155', 'Modified Green Paste        ', '', 'Paint', 'kg ', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0156', 'RESIN', '', 'Fiber', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0157', 'RESIN (F)', '', 'Fiber', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0158', 'SP Jelcoat', '', 'Fiber', 'Drum', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0159', 'Fiber', '', 'Fiber', 'Roll', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0160', 'Woven Roving', '', 'Fiber', 'Roll', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0161', 'Hardner  30KG', '30', 'Fiber', 'Jerican ', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0162', 'Fumed Silica', '', 'Fiber', 'BAG', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0163', 'Plastic Bath Cover #1', '', 'Fiber', 'Roll', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0164', 'Plastic Bath Cover #2', '', 'Fiber', 'Roll', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0165', 'Black Jelcoat', '', 'Fiber', 'kg', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0166', 'Nipples   ?\"', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0167', 'Nipples   1\"', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0168', 'P,V.A', '', 'Fiber', 'kg', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0169', 'Stuco Catalist', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0170', 'Stuco Catalist', '', 'Fiber', 'kg', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0171', 'Nipples   1 1/4\"', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0172', 'Nipples  1?\"', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0173', 'Nipples ?\"', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0174', 'Nipples  2\"', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:52'),
('ITEM0175', 'Nipples  2?\"', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0176', 'Nipples  3\"', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0177', 'Nipples   4\"', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0178', 'Bolt Long Tanker', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0179', 'Bolt Short Tanker', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0180', 'Bolt Nut Tanker', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0181', 'Bath Nut #17', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0182', 'Bath Nut#19', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0183', 'Bath Gate', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0184', 'Bath Gomini', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0185', 'Bath screw', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0186', 'Bath Gate LYU', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0187', 'Bath Bolt', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0188', 'Mg 1', '', 'Fiber', 'kg', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0189', 'Mg 8', '', 'Fiber', 'kg', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0190', 'Mg 8(0.311KG)', '0.311', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0191', 'Mg-3', '', 'Fiber', 'kg', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0192', 'Mg-3(1.8KG)', '1.8', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0193', 'Stuco', '', 'Fiber', 'kg', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0194', 'Plastic Angle ', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0195', 'Nut*27', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0196', 'Bolt*19 (???)', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0197', 'Bolt*27', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0198', 'Square Cover', '', 'Fiber', 'Pcs', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0199', 'DULENTI', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0200', 'Hardner', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:53'),
('ITEM0201', 'Sp-Gelcoat', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0202', 'Pigment', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0203', 'Gp. Resin NEW', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0204', 'Gp. Resin ', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0205', 'Gp. Gelcoat', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0206', 'Calcium', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0207', 'Majun', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0208', '200 Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0209', '200 Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0210', '500 Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0211', '500 Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0212', '1000 Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0213', '1000 Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0214', '1500 N FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0215', '1500 N FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0216', '1500 V/C FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0217', '1500 V/C FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0218', '2000 Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0219', '2000 Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0220', '3000 Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0221', '3000 Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0222', '4000 Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0223', '4000 Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0224', 'Woven Roving TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0225', 'Woven Roving BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0226', '5000 Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0227', '5000 Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0228', 'Woven Roving TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0229', 'Woven Roving BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0230', '7000 Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:54'),
('ITEM0231', '7000 Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0232', 'Woven Roving TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0233', 'Woven Roving BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0234', '8000  Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0235', '8000  Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0236', 'Woven Roving TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0237', 'Woven Roving BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0238', '10000  Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0239', '10000  Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0240', 'Woven Roving TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0241', 'Woven Roving BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0242', '15000  Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0243', '15000  Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0244', 'Woven Roving TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0245', 'Woven Roving BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0246', '20000  Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0247', '20000  Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0248', 'Woven Roving TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0249', 'Woven Roving BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0250', '25000  Lts FIBER TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:55'),
('ITEM0251', '25000  Lts FIBER BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0252', 'Woven Roving TOP', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0253', 'Woven Roving BOTTOM', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0254', 'Belt(Tigena)', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0255', 'Weaving', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0256', 'Fiber Fan', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0257', '200 Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0258', '500 Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0259', '1000 Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0260', '1500 N FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0261', '1500 V/C FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0262', '2000 Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0263', '3000 Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0264', '4000 Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0265', '5000 Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0266', '7000 Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0267', '8000  Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0268', '10000  Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0269', '15000  Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0270', '20000  Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0271', '25000  Lts FIBER', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:56'),
('ITEM0272', '70*70 cm S.T    ?? Normal /70*70 cm S.T normal', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0273', '60*60 cm S.T  ?? Normal /60*60 cm S.T ', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0274', '70*70 cm S.T  With cover New', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0275', '80*80 cm S.T', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0276', '80*80 CM With Cover New           ', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0277', '90*90 S.t with Cover', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0278', '140*60 cm L . Bath', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0279', '160*70 cm L . Bath', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0280', '170*70 cm  L. Bath', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0281', '150*150 cm J.A Frame', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0282', '150*70 cm Bath ', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0283', '170*70 cm Bath ', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0284', '180*80 cm Bath  New', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0285', '150*70 U- Shape Frame', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0286', ' U- shape Frame(1.70*0.70)', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0287', '1M*50 cm  SINK', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0288', '120*60 cm  SINK', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0289', '120*50 cm  SINK', '', 'Fiber', 'PCS', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0290', 'Scrap', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:57'),
('ITEM0291', 'Lip', '', 'Fiber', 'KG', 'china', 0.00, 0.00, '2025-05-22 18:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `main_store_balance`
--

CREATE TABLE `main_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_store_balance`
--

INSERT INTO `main_store_balance` (`id`, `item_code`, `balance`, `status`) VALUES
(31, 'ITEM0001', '442', 'active'),
(32, 'ITEM0002', '80', 'active'),
(33, 'ITEM0003', '77', 'active'),
(34, 'ITEM0005', '88', 'active'),
(35, 'ITEM0006', '204', 'active'),
(36, 'ITEM0007', '102', 'active'),
(37, 'ITEM0009', '14', 'active'),
(38, 'ITEM0011', '102', 'active'),
(39, 'ITEM0008', '204', 'active'),
(40, 'ITEM0004', '102', 'active'),
(41, 'ITEM0010', '1336', 'active');

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
-- Dumping data for table `main_store_request`
--

INSERT INTO `main_store_request` (`item_code`, `team1`, `team2`, `department`, `requested_by`, `requested_date`, `qnty`, `In_Out`, `InFrom_OutTo`, `status`, `transaction_id`, `team1_accepet`, `team2_accept`, `cancel`) VALUES
('ITEM0001', '1', '2', 'main_store', 'biruk', '2025-05-24', '2', 'IN', 'urgent', 'active', 308, 'Mustefa  Accepted', 'dawit  Rejected', 0);

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
  `registerd_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `phonenumber`, `department`, `role`, `status`, `registerd_date`) VALUES
('U001', 'muser1', '1234', 'biruk', '0943087791', 'main_store', 'admin', 'active', '2025-05-16'),
('U002', 'muser2', '1234', 'dawit', '0904789844', 'main_store', 'team2', 'active', '2025-05-16'),
('U003', 'muser3', '1234', 'Mustefa', '0909090909', 'main_store', 'team1', 'active', '2025-05-16'),
('U004', 'SuperAdmin', '1234', 'biruk mulualem', '0943087791', 'administrator', 'administrator', 'active', '2025-05-21'),
('U005', 'fmuser1', '1234', 'paint mini user', '0911121314', 'fiber_mini_store', 'admin', 'active', '2025-05-23'),
('U006', 'fmuser2', '1234', 'fiber mini user2', '0911121314', 'fiber_mini_store', 'team1', 'active', '2025-05-23'),
('U007', 'fmuser3', '1234', 'fiber mini user3', '0911121314', 'fiber_mini_store', 'team2', 'active', '2025-05-23'),
('U008', 'pmuser1', '1234', 'paint mini user1', '0911121314', 'paint_mini_store', 'admin', 'active', '2025-05-23'),
('U009', 'pmuser2', '1234', 'paint mini user2', '0911121314', 'paint_mini_store', 'team1', 'active', '2025-05-23'),
('U010', 'pmuser3', '1234', 'paint mini user2', '0911121314', 'paint_mini_store', 'team2', 'active', '2025-05-23'),
('U011', 'fmmuser1', '1234', 'fiber mini mini user1', '0911121314', 'fiber_mini_mini_store', 'admin', 'active', '2025-05-23'),
('U012', 'fmmuser2', '1234', 'fiber mini mini user2', '0911121314', 'fiber_mini_mini_store', 'team1', 'active', '2025-05-23'),
('U013', 'fmmuser3', '1234', 'fiber mini mini user3', '0911121314', 'fiber_mini_mini_store', 'team2', 'active', '2025-05-23'),
('U014', 'pmmuser1', '1234', 'paint mini mini user1', '0911121314', 'paint_mini_mini_store', 'admin', 'active', '2025-05-23'),
('U015', 'pmmuser2', '1234', 'paint mini mini user2', '0911121314', 'paint_mini_mini_store', 'team1', 'active', '2025-05-23'),
('U016', 'pmmuser3', '1234', 'paint mini mini user3', '0911121314', 'paint_mini_mini_store', 'team2', 'active', '2025-05-23');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_store_balance`
--
ALTER TABLE `main_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `main_store_history`
--
ALTER TABLE `main_store_history`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `main_store_report`
--
ALTER TABLE `main_store_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `main_store_request`
--
ALTER TABLE `main_store_request`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
