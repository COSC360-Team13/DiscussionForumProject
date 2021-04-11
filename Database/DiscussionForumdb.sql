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
    `username` varchar(255) NOT NULL,
    `firstName` varchar(255) NOT NULL,
    `lastName` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `image` varchar(100),
    UNIQUE (`email`),
    PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `category`
--
CREATE TABLE `category` (
    `category` varchar(255) NOT NULL,
    PRIMARY KEY (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `subtopic`
--
CREATE TABLE `subtopic` (
    `title` varchar(255) NOT NULL,
    `date` DATETIME,
    `image` varchar(100),
    `color` varchar(20),
    `about` varchar (1000) NOT NULL,
    `category` varchar (255) NOT NULL,
    PRIMARY KEY (`title`),
    FOREIGN KEY (`category`) REFERENCES `category`(`category`)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `posts`
--
CREATE TABLE `post` (
    `pid` INT NOT NULL AUTO_INCREMENT,
    `ptitle` varchar(100) NOT NULL,
    `username` varchar(255) NOT NULL,
    `image` varchar(100),
    `link` varchar(100),
    `content` varchar(1000),
    `date` DATETIME,
    `upvotes` INT,
    `downvotes` INT,
    `title` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`pid`),
    FOREIGN KEY (`username`) REFERENCES `users`(`username`)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`title`) REFERENCES `subtopic`(`title`)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `comments`
--
CREATE TABLE `comments` (
    `cid` INT NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL,
    `comment` varchar(1500) NOT NULL,
    `date` DATETIME,
    `upvotes` INT,
    `downvotes` INT,
    `postid` INT NOT NULL,
    `parentid` INT,
    PRIMARY KEY(`cid`),
    FOREIGN KEY (`username`) REFERENCES `users`(`username`)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`postid`) REFERENCES `post`(`pid`)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES ('dvader', 'darth', 'vader', 'vader@dark.force', 'dvader123');
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES ('jtams', 'jeff', 'tams', 'jtams@telus.net', 'jdog123');
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES ('blue_bear', 'Blue', 'Bear', 'bearsrkewl@gmail.com', '1234');
--
-- Dumping data for table `category`
--
INSERT INTO `category` (`category`) VALUES ('Cute');
INSERT INTO `category` (`category`) VALUES ('Furry');
INSERT INTO `category` (`category`) VALUES ('Discussions');
INSERT INTO `category` (`category`) VALUES ('Entertainment');
INSERT INTO `category` (`category`) VALUES ('Humor');
INSERT INTO `category` (`category`) VALUES ('Learning');
INSERT INTO `category` (`category`) VALUES ('Technology');
INSERT INTO `category` (`category`) VALUES ('Sports');
INSERT INTO `category` (`category`) VALUES ('Lifestyle');
INSERT INTO `category` (`category`) VALUES ('News');
--
-- Dumping data for table `subtopic`
--
INSERT INTO `subtopic` (`title`, `date`, `about`, `category`) VALUES ('Grizzlies', '2021-04-06', 'This subtopic is all about our love of Grizzly bears!', 'Furry');
INSERT INTO `subtopic` (`title`, `date`, `about`, `category`) VALUES ('Black Bear', '2021-03-21', 'This subtopic is all about our love of Black Bears!', 'Furry');
INSERT INTO `subtopic` (`title`, `date`, `about`, `category`) VALUES ('Kermode Bears', '2021-03-21', 'This subtopic is all about our love of Kermode Bears!', 'Cute');
--
-- Dumping data for table `posts`
--
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('My top grizzlies in the world', 'dvader', '2021-04-06', 20, 5, 'Grizzlies');
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('Black bear I saw in my backyard', 'blue_bear', '2021-04-06', 17, 4, 'Black Bear');
--
-- Dumping data for table `comments`
--
INSERT INTO `comments` (`username`, `comment`, `date`, `upvotes`, `downvotes`, `postid`) VALUES ('dvader', 'I love Grizzly bears, they look so cute and cuddly', '2021-04-07', 7, 3, 1);
INSERT INTO `comments` (`username`, `comment`, `date`, `upvotes`, `downvotes`, `postid`) VALUES ('blue_bear', 'I love Black bears, they look so cute and cuddly', '2021-04-07', 10, 2, 2);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;