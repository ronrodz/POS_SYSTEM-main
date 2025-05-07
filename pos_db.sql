-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 12:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `routine1` ()   BEGIN

/*
-- Query: 
-- Date: 2025-04-30 12:07
*/
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (1,'Macaroni Pasta','Main Dish','0',0,112.64,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (2,'Pork BBQ with Java Rice','Main Dish','0',0,568.2,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (3,'Pancit Canton','Main Dish','0',0,139.9,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (4,'Kamote Fries with Ketchup','Appetizer','0',0,50,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (5,'Adobong Kangkong with Tofu and Rice','Main Dish','0',0,98.26,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (6,'Pork and Beans with Wheat Bread','Appetizer','0',0,457.64,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (7,'Spaghetti Pasta','Main Dish','0',0,41.98,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (8,'Veggie Pancit Canton','Main Dish','0',0,85.11,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (9,'Shredded Chicken Bistek with Brown Rice','Main Dish','0',0,183.93,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (10,'Ube Champorado with Oatmeal','Main Dish','0',0,500.87,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (11,'Shanghai with Garlic Brown Rice','Main Dish','0',0,269.16,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (12,'Tapa with Egg and Brown Rice','Main Dish','0',0,364.11,'Supplier Name',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (13,'Bento I','Main Dish','0',0,100,'23rd Cafe',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (14,'Bento II','Main Dish','0',0,100,'23rd Cafe',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (15,'Bento III','Main Dish','0',0,100,'23rd Cafe',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (16,'Bento IV','Main Dish','0',0,100,'23rd Cafe',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (17,'Coookies','Dessert','0',0,50,'23rd Cafe',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (18,'Brownies','Dessert','0',0,45,'23rd Cafe',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (19,'Tarts','Dessert','0',0,45,'23rd Cafe',0,'2025-04-30 11:29:30','2025-05-01');
INSERT INTO `Product` (`Product_Id`,`ItemName`,`Category`,`Sku`,`Product_Quantity`,`UnitPrice`,`Supplier`,`RestockLevel`,`AddedAt`,`ExpirationDate`) VALUES (20,'Chocolate Muffin','Dessert','0',0,95,'23rd Cafe',0,'2025-04-30 11:29:30','2025-05-01');


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `routine2` ()   BEGIN

/*
-- Query: 
-- Date: 2025-04-30 12:07
*/
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (1,112.64,1);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (2,568.2,2);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (3,139.9,3);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (4,50,4);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (5,98.26,5);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (6,457.64,6);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (7,41.98,7);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (8,85.11,8);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (9,183.93,9);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (10,500.87,10);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (11,269.16,11);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (12,364.11,12);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (13,100,13);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (14,100,14);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (15,100,15);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (16,100,16);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (17,50,17);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (18,45,18);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (19,45,19);
INSERT INTO `Menu` (`Menu_Id`,`Price`,`Product_Id`) VALUES (20,95,20);


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addcashiermember`
--

CREATE TABLE `addcashiermember` (
  `AddCashierMember_Id` int(11) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `Cashier_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addcashiermember`
--

INSERT INTO `addcashiermember` (`AddCashierMember_Id`, `FullName`, `CreatedAt`, `Cashier_Id`) VALUES
(1, 'Jane Doe', '2025-05-07 17:11:45', 2),
(2, 'John Doe', '2025-05-07 11:16:35', 3),
(3, 'John Doe', '2025-05-07 11:17:43', 4),
(4, 'Billy Bob', '2025-05-07 11:43:47', 5),
(5, 'Iron Man', '2025-05-07 11:48:58', 6),
(6, 'Test', '2025-05-07 11:58:21', 7),
(7, 'teest2', '2025-05-07 11:59:02', 8),
(8, 'test3', '2025-05-07 11:59:58', 9);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(11) NOT NULL,
  `Admin_Username` varchar(50) DEFAULT NULL,
  `Admin_Password` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `Admin_Username`, `Admin_Password`) VALUES
(3, 'admin', '$2y$10$nPV/ZOwEe/esz.pJZe1qj.NdYtcfVkqMzrooLfCyNjMt2zU2jpkP2');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `Cashier_Id` int(11) NOT NULL,
  `Cashier_Username` varchar(50) DEFAULT NULL,
  `Cashier_Password` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`Cashier_Id`, `Cashier_Username`, `Cashier_Password`) VALUES
(2, 'cashier', '$2y$10$WK6FIdlOgprYMZNBG/XCZelZ49MCNv3pqq/kSUQMHUk/INBWTO6QC'),
(3, 'johndoe', '$2y$10$o/9pjwB0uQ/5hhpEYwEagOaUW6kXH6iysXdyT26K1aBwX4Kr3RQB6'),
(4, 'johndoe', '$2y$10$ZQE9uzqhRJBBMxSiZrYcVO99ek2bKmzQOuSJUp4wDxl68hhuq.PZi'),
(5, 'billybob', '$2y$10$RCWiqzRCJorbfcEmuHgW6uhlvSJ6Mpj.A.o0HSrzEmaBsSwz4mwQC'),
(6, 'ironman', '$2y$10$VBXUocKgGDFJYYC45Diobu1IUl3rSiwIWhP71zRWEiy7EI/DdGHyS'),
(7, 'test', '$2y$10$/MxKqOSQJ/WOOPNi0SDuJ.EcVgKUuf9WQF2exdbdk3RjG.hlmtl6K'),
(8, 'test2', '$2y$10$U6vycIIXF6w1TBYXSNDdt.G5hUclk5ZqPIO1KCPPY3T/n0lQCrBmi'),
(9, 'test', '$2y$10$gONa50jf0IHAaASmYvykfu4RxOK4gcWVFIzJIdH6a2cPR9l44ytRG');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Menu_Id` int(11) NOT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Product_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetails_Id` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `SubTotal` decimal(10,0) DEFAULT NULL,
  `Menu_Id` int(11) NOT NULL,
  `OrderHistory_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `OrderHistory_Id` int(11) NOT NULL,
  `OrderType` enum('Dine In','Take Out') DEFAULT NULL,
  `OrderHistory_TotalAmount` decimal(10,2) DEFAULT NULL,
  `OrderHistory_PaymentMethod` enum('Cash','GCash','Card') DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `AddCashierMember_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_Id` int(11) NOT NULL,
  `ItemName` varchar(150) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `Sku` varchar(50) DEFAULT '0',
  `Product_Quantity` int(11) DEFAULT 0,
  `UnitPrice` decimal(10,2) DEFAULT NULL,
  `Supplier` varchar(50) DEFAULT NULL,
  `RestockLevel` int(11) DEFAULT 0,
  `AddedAt` datetime DEFAULT current_timestamp(),
  `ExpirationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `ItemName`, `Category`, `Sku`, `Product_Quantity`, `UnitPrice`, `Supplier`, `RestockLevel`, `AddedAt`, `ExpirationDate`) VALUES
(1, 'Macaroni Pasta', 'Main Dish', '0', 0, 114.64, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-10'),
(2, 'Pork BBQ with Java Rice', 'Main Dish', '0', 0, 568.20, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(3, 'Pancit Canton', 'Main Dish', '0', 0, 139.90, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(4, 'Kamote Fries with Ketchup', 'Appetizer', '0', 0, 50.00, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(5, 'Adobong Kangkong with Tofu and Rice', 'Main Dish', '0', 0, 98.26, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(6, 'Pork and Beans with Wheat Bread', 'Appetizer', '0', 0, 457.64, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(7, 'Spaghetti Pasta', 'Main Dish', '0', 0, 41.98, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(8, 'Veggie Pancit Canton', 'Main Dish', '0', 0, 85.11, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(9, 'Shredded Chicken Bistek with Brown Rice', 'Main Dish', '0', 0, 183.93, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(10, 'Ube Champorado with Oatmeal', 'Main Dish', '0', 0, 500.87, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(11, 'Shanghai with Garlic Brown Rice', 'Main Dish', '0', 0, 269.16, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(12, 'Tapa with Egg and Brown Rice', 'Main Dish', '0', 0, 364.11, 'Supplier Name', 0, '2025-04-30 11:29:30', '2025-05-01'),
(13, 'Bento I', 'Main Dish', '0', 0, 100.00, '23rd Cafe', 0, '2025-04-30 11:29:30', '2025-05-01'),
(14, 'Bento II', 'Main Dish', '0', 0, 100.00, '23rd Cafe', 0, '2025-04-30 11:29:30', '2025-05-01'),
(15, 'Bento III', 'Main Dish', '0', 0, 100.00, '23rd Cafe', 0, '2025-04-30 11:29:30', '2025-05-01'),
(16, 'Bento IV', 'Main Dish', '0', 0, 100.00, '23rd Cafe', 0, '2025-04-30 11:29:30', '2025-05-01'),
(17, 'Coookies', 'Dessert', '0', 0, 50.00, '23rd Cafe', 0, '2025-04-30 11:29:30', '2025-05-01'),
(18, 'Brownies', 'Dessert', '0', 0, 45.00, '23rd Cafe', 0, '2025-04-30 11:29:30', '2025-05-01'),
(19, 'Tarts', 'Dessert', '0', 0, 45.00, '23rd Cafe', 0, '2025-04-30 11:29:30', '2025-05-01'),
(21, 'Chicken Ala King', 'Main Dish', '0', 0, 150.00, 'Jolibee', 0, '2025-04-30 11:29:30', '2025-05-10'),
(22, 'Jolly Spaghetti', 'Main Dish', '0', 0, 100.00, 'Jolibee', 0, '2025-05-07 16:32:52', '2025-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Receipt_Id` int(11) NOT NULL,
  `TransactionRefNo` varchar(50) DEFAULT NULL,
  `Receipt_TotalAmount` decimal(10,2) DEFAULT NULL,
  `Receipt_PaymentMethod` enum('Cash','GCash','Card') DEFAULT NULL,
  `Receipt_CreatedAt` datetime DEFAULT NULL,
  `Order_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcashiermember`
--
ALTER TABLE `addcashiermember`
  ADD PRIMARY KEY (`AddCashierMember_Id`,`Cashier_Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`AddCashierMember_Id`),
  ADD UNIQUE KEY `Cashier_Id_UNIQUE` (`Cashier_Id`),
  ADD KEY `idx_addcashiermember_AddCashierMember_FullName` (`FullName`),
  ADD KEY `Cashier_Id_idx` (`Cashier_Id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`),
  ADD UNIQUE KEY `Admin_Id_UNIQUE` (`Admin_Id`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`Cashier_Id`),
  ADD UNIQUE KEY `Cashier_Id_UNIQUE` (`Cashier_Id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Menu_Id`,`Product_Id`),
  ADD UNIQUE KEY `Menu_Id_UNIQUE` (`Menu_Id`),
  ADD UNIQUE KEY `Product_Id_UNIQUE` (`Product_Id`),
  ADD KEY `Product_Id_idx` (`Product_Id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetails_Id`,`OrderHistory_Id`,`Menu_Id`),
  ADD UNIQUE KEY `Order_Id_UNIQUE` (`OrderDetails_Id`),
  ADD UNIQUE KEY `Menu_Id_UNIQUE` (`Menu_Id`),
  ADD UNIQUE KEY `OrderHistory_Id_UNIQUE` (`OrderHistory_Id`),
  ADD KEY `OrderHistory_Id_idx` (`OrderHistory_Id`),
  ADD KEY `Menu_Id_idx` (`Menu_Id`);

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`OrderHistory_Id`,`AddCashierMember_Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`OrderHistory_Id`),
  ADD UNIQUE KEY `AddCashierMember_Id_UNIQUE` (`AddCashierMember_Id`),
  ADD KEY `AddCashierMember_Id_idx` (`AddCashierMember_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Product_Id`),
  ADD KEY `idx_product_Product_ItemName` (`ItemName`),
  ADD KEY `idx_product_Product_Category` (`Category`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`Receipt_Id`,`Order_Id`),
  ADD UNIQUE KEY `Order_Id_UNIQUE` (`Order_Id`),
  ADD UNIQUE KEY `Receipt_Id_UNIQUE` (`Receipt_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcashiermember`
--
ALTER TABLE `addcashiermember`
  MODIFY `AddCashierMember_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `Cashier_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Menu_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetails_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `OrderHistory_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `Receipt_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addcashiermember`
--
ALTER TABLE `addcashiermember`
  ADD CONSTRAINT `Cashier_Id` FOREIGN KEY (`Cashier_Id`) REFERENCES `cashier` (`Cashier_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `Product_Id` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `Menu_Id` FOREIGN KEY (`Menu_Id`) REFERENCES `menu` (`Menu_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `OrderHistory_Id` FOREIGN KEY (`OrderHistory_Id`) REFERENCES `orderhistory` (`OrderHistory_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD CONSTRAINT `AddCashierMember_Id` FOREIGN KEY (`AddCashierMember_Id`) REFERENCES `addcashiermember` (`AddCashierMember_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `Order_Id` FOREIGN KEY (`Order_Id`) REFERENCES `orderhistory` (`OrderHistory_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
