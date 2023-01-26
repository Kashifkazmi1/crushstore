-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20230123.8f0772514e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 11:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `moblie` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `postal_code` int(20) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `user_id`, `user_name`, `moblie`, `city`, `total_price`, `payment_status`, `order_status`, `address`, `address2`, `postal_code`, `added_on`, `payment_type`) VALUES
(96, 40, 'kashif', '030361414787845', 'lahore', 1484, 'pending', 2, 'address1', 'address2', 1524651, '2023-01-22 14:15:54', 'COD'),
(97, 50, 'CASHZONE', '03036014248', 'as', 1204, 'pending', 1, 'address1', 'address2', 1524651, '2023-01-22 15:49:28', 'COD'),
(98, 50, 'CASHZONE', '03036014248', 'as', 1204, 'pending', 1, 'address1', 'address2', 1524651, '2023-01-22 15:49:29', 'COD'),
(99, 29, 'saleem', '030361414787845', 'lahore', 140, 'pending', 5, 'address1', 'address2', 1524651, '2023-01-22 16:03:42', 'COD'),
(100, 29, 'kashif', '154456', 'lahore', 30, 'pending', 1, ' only for testing', ' only for testing', 1524651, '2023-01-23 15:50:05', 'COD'),
(101, 29, 'kashif', '154456', 'lahore', 30, 'pending', 1, ' only for testing', ' only for testing', 1524651, '2023-01-23 15:50:05', 'COD'),
(102, 29, 'kashif', '154456', 'lahore', 30, 'pending', 1, ' only for testing', ' only for testing', 1524651, '2023-01-23 15:50:11', 'COD'),
(103, 29, 'sadf', 'sdfa', 'asdfas', 120, 'pending', 1, 'asdfasd', 'sadfas', 0, '2023-01-23 15:55:05', 'COD'),
(104, 29, 'sadf', 'sdfa', 'asdfas', 120, 'pending', 1, 'asdfasd', 'sadfas', 0, '2023-01-23 15:55:06', 'COD'),
(105, 29, 'sdasfasd', 'asdf', 'asdfas', 274, 'pending', 1, 'fasdfa', 'asdfasdf', 1524651, '2023-01-23 15:59:48', ''),
(106, 29, 'sdasfasd', 'asdf', 'asdfas', 274, 'pending', 1, 'fasdfa', 'asdfasdf', 1524651, '2023-01-23 16:01:45', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(225) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`) VALUES
(42, 'laptop', 1),
(43, 'shoes', 1),
(50, 'eclectronics', 1),
(51, 'dress', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `added_on`) VALUES
(1, 'kashif', 'kashif@12345', '03036014218', 'test comment', '2022-11-29 00:07:49'),
(5, 'kashif', 'kashfi@email', '03026014248', 'message', '2022-12-04 02:00:05'),
(6, 'kashif', 'kashfi@email', '03026014248', 'message', '2022-12-04 02:00:05'),
(7, 'kashif', 'kashfi@email', '03026014248', 'message', '2022-12-04 02:00:46'),
(8, 'CASHZONE', 'asdf', 'asd', 'asdf', '2022-12-21 01:30:36'),
(9, 'undefined', 'undefined', 'undefined', 'undefined', '2023-01-22 11:37:34'),
(10, 'undefined', 'undefined', 'undefined', 'undefined', '2023-01-22 11:37:58'),
(11, 'undefined', 'undefined', 'undefined', 'undefined', '2023-01-22 11:38:51'),
(12, 'undefined', 'undefined', 'undefined', 'undefined', '2023-01-22 11:40:12'),
(13, 'undefined', 'undefined', 'undefined', 'undefined', '2023-01-22 11:40:12'),
(14, 'CASHZONE', 'alibuttnewstars11@gmail.com', 'test', 'asdf', '2023-01-22 11:41:31'),
(15, 'kashif', 'alibuttnewstars11@gmail.com', 'test', 'kas', '2023-01-22 11:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(20) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(90, 79, 24, 2, 300),
(91, 80, 24, 1, 300),
(92, 81, 17, 1, 120),
(93, 82, 24, 1, 300),
(94, 82, 20, 1, 120),
(95, 83, 23, 1, 140),
(96, 84, 24, 1, 300),
(97, 85, 23, 1, 140),
(98, 85, 21, 1, 1204),
(99, 95, 23, 1, 140),
(100, 96, 23, 2, 140),
(101, 96, 21, 1, 1204),
(102, 97, 21, 1, 1204),
(103, 98, 21, 1, 1204),
(104, 0, 21, 1, 1204),
(105, 0, 21, 1, 1204),
(106, 99, 23, 1, 140),
(107, 100, 36, 1, 30),
(108, 101, 36, 1, 30),
(109, 102, 36, 1, 30),
(110, 103, 35, 1, 120),
(111, 104, 35, 1, 120),
(112, 105, 35, 1, 120),
(113, 105, 41, 1, 124),
(114, 105, 36, 1, 30),
(115, 106, 35, 1, 120),
(116, 106, 41, 1, 124),
(117, 106, 36, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status_name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `mrp`, `price`, `qty`, `img`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(26, 42, 'Largest Watch Pot', 120, 100, 124, '190824146_product-detail-4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', 'Lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam? ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', '', '', '', 1),
(28, 43, 'Sheo Modern', 51, 40, 215, '183609632_product-2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', '', '', '', 0),
(30, 50, 'Handsfree Wireless', 14, 10, 124, '882241219_product-1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', '', '', '', 0),
(31, 43, 'Latest Shoes', 10, 8, 154, '239181325_product-11.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', '', '', '', 1),
(32, 50, 'Camera lens', 145, 100, 215, '929373657_product-12.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', '', '', '', 0),
(33, 51, 'Watch Super', 145, 124, 1245, '817977805_product-detail-2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', '', '', '', 1),
(34, 51, 'Perfume Turkish', 12, 8, 124, '281842810_product-7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', '', '', '', 1),
(35, 51, 'nestle cafe', 10, 120, 124, '916531822_product-6.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', '', '', '', 1),
(36, 43, 'Watch water prove', 100, 30, 124, '691764091_product-4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reiciendis odit dolorum, eaque eligendi aperiam?', '', '', '', 1),
(41, 43, 'Redo Watch', 1002, 124, 120, '721490966_817977805_product-detail-2.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi hic enim deleniti cumque id eveniet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi hic enim deleniti cumque id eveniet.Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi hic enim deleniti cumque id eveniet.', '', '', '', 1),
(42, 43, 'Gold Watch', 1200, 1000, 215, '769055020_978011629_product-detail-4.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi hic enim deleniti cumque id eveniet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi hic enim deleniti cumque id eveniet.Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi hic enim deleniti cumque id eveniet.', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `date`) VALUES
(28, 'kashif', '$2y$10$yNm7bTu0MWB10XkKO0unEePIxwdNEdFlAKJO3uhCAi9TTUuHWMPte', 'alibuttnewstars11@gmail.com', '2023-01-19 14:08:49'),
(29, 'saleem', '$2y$10$eO6zTGg2Iutn2gdGU81Qw.3s.0JwBEgqPXVtQUmqzIc9P7biZDkly', 'saleem@gmail.com', '2023-01-19 14:10:12'),
(30, '', '$2y$10$lrlYfYqa5tAbXpddUxbXL.WgXYP74ntnygqJtVYXUP6tl96.11ki.', '', '2023-01-19 14:22:17'),
(31, 'kashif', '$2y$10$D9bPDPex8FaWm9pIbH6Uf.oTxBmJAl5cffTM8MoQWnTw8TKJFFO9i', 'usa@asdf', '2023-01-19 14:23:36'),
(32, 'kashif', '$2y$10$.NJOWKHgPfx4bbCqn6/pwuOa5fdNX5QWMJHnFHVynV0811Z4c8/iC', 'kashif@gmail.com', '2023-01-19 14:46:24'),
(34, 'kashif', '$2y$10$/YtEP4B7MrdIhf.Dmgzosu99BucJ2rZ299oLsYIy5dTIFFsjLdI7G', 'k@gmail.com', '2023-01-19 14:48:16'),
(35, 'kashif', '$2y$10$0/OuMKYWzxi2Mz3UseEbF.zT5hRDO527yWijQguundQRq.DBhjqNK', 'Syedqararhussainshah@gmail.com', '2023-01-19 14:51:50'),
(36, 'kashif', '$2y$10$T5xWrBczxF2u3paSBEAiEOy9yuiRc5jAMQG.c4NUGL.d95/BJk/.O', 'k@a', '2023-01-20 14:10:48'),
(37, 'kashif', '$2y$10$6SE5Wiszecdo4L59.xgJbuKt0OSmCe/TpyRQuQ./WLDNxccdKF082', 'asdfasdf@sad', '2023-01-20 14:20:50'),
(38, 'kashif', '$2y$10$7CvH4anNwC2c3JIaxwSi4OWVOtSYmA6PjC1JTSdVrqCH2i.XpzG8G', 'sdfsdfsdfsdfsda@gmail.com', '2023-01-20 14:28:02'),
(40, 'kashif', '$2y$10$BPv/TTTk.RVPV0xTcJYMOus2Ob5MfEhEMMdlaGuVuVJMC4bGUq71i', 'k@l', '2023-01-20 14:28:41'),
(41, 'kashif', '$2y$10$icyf9xEly/u0ZukRvbq7wO/NLbDR8fu.qYyPkIsnmSdMLrmUSSQW6', 's@a', '2023-01-20 14:31:47'),
(43, 'kashif', '$2y$10$WpSOgL9SYcnNrSSTj3HMDO3AviJvMwQ0H6mXYfSQs4JnmB0.z.Cge', 'dfsad@gmail.com', '2023-01-20 14:36:19'),
(45, 'kashif kazmi', '$2y$10$sg73viuPkFZr2wEFTPaeJedWgtK6Eb6jncSoLS4Kpz3VCyuv8RX76', 'kazmi@a', '2023-01-20 14:50:19'),
(46, 'asad', '$2y$10$ZCBxjv.3hJJH8jR/4eh8Z.nR3SSMtLrIuotoWajE/ZnwW12M6GhUG', 'asad@123', '2023-01-21 16:26:37'),
(47, 'kashif', '$2y$10$d9KVgTBY9QDkSdd4Vez8x.V6IgkOmVcXrUiKzojbJori/GZw2kSpq', 'usama@gmail.com', '2023-01-21 16:38:21'),
(48, 'kashif', '$2y$10$qUS./eHSrbF7njygc0w.iOh9MV1wJEJP.VY66n7/dh/xJX3DA17KO', 'altaf@usama', '2023-01-21 16:39:48'),
(49, 'altaf@usama', '$2y$10$iyNuHoA1s9mdUot4iWgFFOOwwemhQiN7xZo5Vsrys2XBZp6IDCj9m', 'kashif@love', '2023-01-21 16:42:39'),
(50, 'admin', '$2y$10$csX7zx6RAsM0xikUNIbMeOzT718/oGnb38sJOk2/6jffSHI9Q6OUa', 'admin@love.you', '2023-01-22 15:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `user_id`, `added_on`) VALUES
(18, 20, 26, '2022-12-26 02:44:59'),
(20, 19, 26, '2022-12-26 02:57:56'),
(24, 23, 26, '2022-12-26 03:07:29'),
(30, 41, 29, '2023-01-24 04:54:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
