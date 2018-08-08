-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 02, 2018 at 12:06 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alaska_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `alert` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `alert`) VALUES
(36, 7, 'test', 'test', '2017-09-24 17:21:34', 0),
(38, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(39, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(40, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(41, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(42, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(43, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(44, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(45, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(46, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(47, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(48, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(49, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(50, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(51, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(52, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(53, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(54, 7, 'test', 'test', '2017-09-24 17:21:34', 1),
(55, 7, 'hey', 'bhksdbvkjsdbvjdsbvjsfbjkv:bsjkbvkshjdbvkjbvkjbxkvbkdvbkbvkhbvkbvksdbvisbvklsdvbkcwbvkjcbvklcbvxcbvkwcbvkcbvkcbvkcxbvkcxbvkhlxbcvkxbckvbxckvbkxclbvk', '2018-07-17 16:49:05', 0),
(56, 11, 'test', 'test', '2018-07-18 16:02:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user`, `email`, `password`) VALUES
(1, 'Jean Forteroche', 'sylvaindepardieu78@gmail.com', '$2y$10$spiHwjo60BG7BGsxSFijfuYBDbQWlrdhvjvuo2RVKHzyoEU/m4w.i');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `creation_date`, `published`) VALUES
(4, 'edited', '<p>Hello, World! h&eacute;h&eacute;</p>', '2018-06-28 16:01:07', 0),
(7, 'trop puissant', '<p style=\"text-align: left;\"><strong>Vraiment</strong> trop puisssant !djbfbsjdkl</p>', '2018-06-29 16:11:27', 0),
(10, 'salut', '<p>dcv jehs</p>', '2018-07-04 19:03:33', 0),
(11, '', '', '2018-07-04 19:06:19', 1),
(13, 'mon titre', '<p>mon article &eacute;dit&eacute;</p>', '2018-07-11 16:08:56', 0),
(15, 'salut !!!!!!!', '<p>rujrjry</p>', '2018-07-11 16:17:26', 1),
(16, 'haha', '<p>hihiereffhvorgrgy\'yhet</p>', '2018-07-20 16:39:54', 1),
(17, 'test', '<p>test test</p>', '2018-07-24 09:27:09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`,`post_id`) USING BTREE,
  ADD KEY `fk_delete_comments` (`post_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_delete_comments` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
