-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2025 at 03:47 PM
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
-- Database: `laptopstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'GAMING LAPTOP'),
(3, 'GRAPHIC LAPTOP'),
(4, 'OFFICE LAPTOP');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `subtotal` decimal(10,2) DEFAULT NULL,
  `tax_fee` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_attribute_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `descriptions` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `avg_rate` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `descriptions`, `thumbnail`, `stock`, `category_id`, `created_at`, `updated_at`, `avg_rate`) VALUES
(6, 'ACER', 599.00, '15.6\" FHD, Intel i7-12700H, RTX 3060, 16GB RAM, 512GB SSD. Powerful performance for gamers.', 'uploads/products/thumb_6890e2c754f44_gaming1.avif', 3, 1, '2025-08-04 23:41:43', '2025-08-04 23:41:43', 0),
(7, 'MacBook Pro 16 M2', 599.00, '16\" Liquid Retina, Apple M2 Pro, 16GB RAM, 1TB SSD. Top choice for graphic design and video editing.', 'uploads/products/thumb_6890e34a9906e_apple3.jpg', 3, 4, '2025-08-04 23:43:54', '2025-08-04 23:43:54', 0),
(8, 'Dell XPS 15 OLED', 599.00, '15.6\" OLED, Intel i7-12700H, RTX 3050 Ti, 32GB RAM, 1TB SSD. Sharp display, ideal for designers.', 'uploads/products/thumb_6890e375842b3_dell1.webp', 3, 4, '2025-08-04 23:44:37', '2025-08-04 23:44:37', 0),
(9, 'Lenovo Legion 5', 599.00, '15.6\" FHD, AMD Ryzen 5, RTX 3050 Ti, 16GB RAM, 512GB SSD. Stable performance, RGB keyboard.', 'uploads/products/thumb_6890e3a36fc16_lenovo1.webp', 3, 1, '2025-08-04 23:45:23', '2025-08-04 23:45:23', 0),
(10, 'HP ZBook Studio G8', 599.00, '15.6\" 4K, Intel i9, RTX A2000, 32GB RAM, 1TB SSD. Mobile workstation for engineers and architects.', 'uploads/products/thumb_6890e3ef58900_hp1.jpg', 3, 3, '2025-08-04 23:46:39', '2025-08-04 23:46:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image_url`, `product_id`) VALUES
(5, 'uploads/products/img_6890e2c755ec0_gaming2.jpg', 6),
(6, 'uploads/products/img_6890e2c756673_gaming3.avif', 6),
(7, 'uploads/products/img_6890e2c756b5d_gaming4.avif', 6),
(8, 'uploads/products/img_6890e34a9985a_apple1.jpg', 7),
(9, 'uploads/products/img_6890e34a99c7c_apple2.jpg', 7),
(10, 'uploads/products/img_6890e37584907_dell2.webp', 8),
(11, 'uploads/products/img_6890e375853f4_dell3.webp', 8),
(12, 'uploads/products/img_6890e37585b54_dell4.jpg', 8),
(13, 'uploads/products/img_6890e3a3702af_lenovo2.webp', 9),
(14, 'uploads/products/img_6890e3a3706a7_lenovo3.avif', 9),
(15, 'uploads/products/img_6890e3a370aeb_lenovo4.jpg', 9),
(16, 'uploads/products/img_6890e3ef5901f_hp2.avif', 10),
(17, 'uploads/products/img_6890e3ef59638_hp3.jpg', 10),
(18, 'uploads/products/img_6890e3ef59a97_hp4.webp', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL CHECK (`rate` between 1 and 5),
  `comment` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attribute_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL CHECK (`role` in ('admin','user')),
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `address`) VALUES
(1, 'user', 'a@a.com', '123123', '$2y$10$NRNUVjX6IzFTLvQfpIfXCePTuFvfXZzzx1eAgPY8SsM2Mj0vOoSlu', 'user', ''),
(2, 'a@a.com', 'a@a.com1', '123123', '$2y$10$3kvdj8lkQuW2LdQTu/X/V.H1CfqgNe17ckstAv6.NXWhgCsh.9I6.', 'user', '123'),
(3, 'a@a.com2', 'a@a.com2', '123123', '$2y$10$5lzx5vw9DDK7BH7XIU7mLuweuE5YoftbtDINyvqCm7QudYx31f9LC', 'user', 'saxxxxxcarr'),
(4, 'a@a.com3', 'a@a.com3', '123123', '$2y$10$0IHWIE4JasUBUddOZn8cMe/nmwqwwjnift6QJHicfQ8buiURwrzvW', 'user', 'saxxxxxcarr'),
(5, 'admin', 'admin@admin.com', '124123124', '$2y$10$0vyjC3Y5OPtiaBl/9bFbYuuguJW2JQ2y.R20mmD42KJRF3/GTK..2', 'admin', 'dàvd'),
(6, 'khoa@a.com', 'khoa@a.com', '123123', '$2y$10$QxWBjYutQOOh0PMlfPQkOeDJ3fjZPdyiIh0MarSVTMA/sBJ8aU1i6', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_attribute_id` (`product_attribute_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_attribute_id` (`product_attribute_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`product_attribute_id`) REFERENCES `product_attributes` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `product_rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `product_rating_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_rating_ibfk_3` FOREIGN KEY (`product_attribute_id`) REFERENCES `product_attributes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
