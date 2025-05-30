

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `paint_mini_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `paint_mini_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `paint_mini_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `paint_mini_store_balance`
  ADD CONSTRAINT `paint_mini_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);











CREATE TABLE `finishing_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `finishing_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `finishing_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `finishing_store_balance`
  ADD CONSTRAINT `finishing_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);



CREATE TABLE `metal_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `metal_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `metal_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `metal_store_balance`
  ADD CONSTRAINT `metal_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);



CREATE TABLE `flower_pot_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `flower_pot_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `flower_pot_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `flower_pot_store_balance`
  ADD CONSTRAINT `flower_pot_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);



CREATE TABLE `genda_getema_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `genda_getema_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `genda_getema_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `genda_getema_store_balance`
  ADD CONSTRAINT `genda_getema_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);





CREATE TABLE `fiber_mini_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `fiber_mini_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `fiber_mini_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `fiber_mini_store_balance`
  ADD CONSTRAINT `fiber_mini_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);





CREATE TABLE `fiber_mini_mini_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `fiber_mini_mini_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `fiber_mini_mini_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `fiber_mini_mini_store_balance`
  ADD CONSTRAINT `fiber_mini_mini_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);




CREATE TABLE `paint_mini_mini_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `paint_mini_mini_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `paint_mini_mini_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `paint_mini_mini_store_balance`
  ADD CONSTRAINT `paint_mini_mini_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);




CREATE TABLE `_store_balance` (
  `id` int(10) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `genda_getema_store_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `genda_getema_store_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `genda_getema_store_balance`
  ADD CONSTRAINT `genda_getema_store_balance_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);











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

ALTER TABLE `paint_mini_store_history`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `item_code` (`item_code`);

  
ALTER TABLE `paint_mini_store_history`
  ADD CONSTRAINT `paint_mini_store_history_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

ALTER TABLE `paint_mini_store_history`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;





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
  `sender_name` varchar(255) NOT NULL,
  `sender_team1_accept` int(255) NOT NULL DEFAULT 0,
  `sender_team2_accept` int(255) NOT NULL DEFAULT 0,
  `sender_team1_name` varchar(255) NOT NULL,
  `sender_team2_name` varchar(255) NOT NULL,
  `transaction_id` int(10) NOT NULL,
  `sender_status` varchar(255) NOT NULL DEFAULT 'inactive',
  `status_temp` varchar(255) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `paint_mini_store_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `item_code` (`item_code`);

ALTER TABLE `paint_mini_store_report`
  ADD CONSTRAINT `paint_mini_store_report_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

ALTER TABLE `paint_mini_store_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;



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

ALTER TABLE `paint_mini_store_request`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_item_code` (`item_code`);

ALTER TABLE `paint_mini_store_request`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

ALTER TABLE `paint_mini_store_request`
  ADD CONSTRAINT `fk_item_code` FOREIGN KEY (`item_code`) REFERENCES `inventory_items` (`item_code`);

