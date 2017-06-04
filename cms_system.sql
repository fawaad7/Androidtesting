-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 09:41 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category_name`) VALUES
(1, 'nature'),
(2, 'technology');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `name`, `email`, `subject`, `comment`, `date`) VALUES
(9, 'yasen', 'yasen@gmail.com', 'new', 'i love php', '2017-05-05 18:02:17'),
(10, 'fouda', 'fouda@gmail.com', 'php', 'i love php', '2017-05-06 10:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `category` text NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `category`, `status`, `date`, `author`) VALUES
(1, 'the first', 'wegfifhiwefhwe4ogt ogj9o jogj0-teroj gjt0-g3o0jhj430k30gtt3tmjktr5swegfifhiwefhwe4ogt ogj9o jogj0-teroj gjt0-g3o0jhj430k30gtt3tmjktr5swegfifhiwefhwe4ogt ogj9o jogj0-teroj gjt0-g3o0jhj430k30gtt3tmjktr5swegfifhiwefhwe4ogt ogj9o jogj0-teroj gjt0-g3o0jhj430k30gtt3tmjktr5swegfifhiwefhwe4ogt ogj9o jogj0-teroj gjt0-g3o0jhj430k30gtt3tmjktr5swegfifhiwefhwe4ogt ogj9o jogj0-teroj gjt0-g3o0jhj430k30gtt3tmjktr5swegfifhiwefhwe4ogt ogj9o jogj0-teroj gjt0-g3o0jhj430k30gtt3tmjktr5swegfifhiwefhwe4ogt ogj9o jogj0-teroj gjt0-g3o0jhj430k30gtt3tmjktr5s', 'images/img1.jpg', '2', 'published', '2017-05-06 10:27:09', 'fouda'),
(3, 'the second post', 'the second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second postthe second post', 'images/img2.jpg', '1', 'published', '2017-05-06 10:33:19', 'fouda');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role` text NOT NULL,
  `user_f_name` text NOT NULL,
  `user_l_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_marital_status` text NOT NULL,
  `user_phone_no` text NOT NULL,
  `user_designation` text NOT NULL,
  `user_website` text NOT NULL,
  `user_address` text NOT NULL,
  `user_about_me` text NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `user_f_name`, `user_l_name`, `user_email`, `user_password`, `user_gender`, `user_marital_status`, `user_phone_no`, `user_designation`, `user_website`, `user_address`, `user_about_me`, `user_date`) VALUES
(1, 'admin', 'mohamed', 'fouda', 'mohamed@gmail.com', '123', 'male', 'single', '1245638', 'developer', 'www.mo.com', 'nasrcity', 'i like bootstrap', '2017-05-06 20:48:15'),
(2, 'ali', 'ali', 'ali', 'ali', '123', 'male', 'single', '123456', 'admin', 'www.ali.com', 'alialiali`', 'alialialialialialialialialialialiali', '2017-05-06 09:26:31'),
(3, 'subscriber', 'mohamed', 'fouda', 'fouda@gmail.com', '123', 'male', 'single', '13456789876543', 'tester', 'www.salah.com', 'dqwfqwnofnk', 'odnhcq2ofh23ofh23', '2017-05-06 06:47:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
