-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2017 at 08:05 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DiscussionForum`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `userid` AUTO_INCREMENT NOT NULL,
    `username` varchar(255) NOT NULL,
    `firstName` varchar(255) NOT NULL,
    `lastName` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    UNIQUE (`email`),
    PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `subtopic`
--
CREATE TABLE `subtopic` (
    `title` varchar(255) NOT NULL,
    `date` DATETIME,
    `about` varchar (1000) NOT NULL,
    `category` varchar (255) NOT NULL,
    PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `posts`
--
CREATE TABLE `post` (
    `username` varchar(255) NOT NULL,
    `date` DATETIME,
    `comment` VARCHAR(1500) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`username`),
    FOREIGN KEY (`username`) REFERENCES `users`(`username`),
    FOREIGN KEY (`title`) REFERENCES `subtopic`(`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `users`
--
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES
('dvader', 'darth', 'vader', 'vader@dark.force', 'dvader123');
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES
('jtams', 'jeff', 'tams', 'jtams@telus.net', 'jdog123');
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES
('blue_bear', 'Blue', 'Bear', 'bearsrkewl@gmail.com', '1234');
--
-- Dumping data for table `subtopic`
--
INSERT INTO `subtopic` (`title`, `date`, `about`, `category`)VALUES ('Grizzlies', '2021-04-06', 'This subtopic is all about our love of Grizzly bears!', 'Furry');
INSERT INTO `subtopic` (`title`, `date`, `about`, `category`)VALUES ('Black Bear', '2021-03-21', 'This subtopic is all about our love of Black Bears!', 'Furry');
--
-- Dumping data for table `posts`
--
INSERT INTO `post` (`username`, `date`, `comment`, `title`) VALUES ('dvader', '2021-04-06', 'I love Grizzly bears, they look so cute and cuddly', 'Grizzlies');
INSERT INTO `post` (`username`, `date`, `comment`, `title`) VALUES ('blue_bear', '2021-04-06', 'I love Black bears, they look so cute and cuddly', 'Black Bear');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;