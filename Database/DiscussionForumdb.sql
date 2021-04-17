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
    `disabled` BOOLEAN DEFAULT false,
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
    `title` varchar(20) NOT NULL,
    `date` DATETIME,
    `color` varchar(20),
    `textColor` varchar(20),
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
-- Table structure for table `likedPosts`
--
CREATE TABLE `likedPosts` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL,
    `pid` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`pid`) REFERENCES `post`(`pid`)
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
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`, `image`) VALUES ('dvader', 'darth', 'vader', 'vader@dark.force', md5('dvader123'), 'Teddy1.png');
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`, `image`) VALUES ('jtams', 'jeff', 'tams', 'jtams@telus.net', md5('jdog123'), 'Teddy2.png');
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`, `image`) VALUES ('blue_bear', 'Blue', 'Bear', 'bearsrkewl@gmail.com', md5('1234'), 'Teddy3.png');
INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`, `image`) VALUES ('admin', 'Admin', 'Istrator', 'admin@gmail.com', md5('1234'), 'Teddy4.png');
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
INSERT INTO `subtopic` (`title`, `date`, `color`, `textColor`, `about`, `category`) VALUES ('Grizzlies', '2021-04-06', 'brown', 'white', 'This subtopic is all about our love of Grizzly bears!', 'Furry');
INSERT INTO `subtopic` (`title`, `date`, `color`, `textColor`, `about`, `category`) VALUES ('Black Bear', '2021-03-21', 'darkgoldenrod', 'black', 'This subtopic is all about our love of Black Bears!', 'Furry');
INSERT INTO `subtopic` (`title`, `date`, `color`, `textColor`, `about`, `category`) VALUES ('Kermode Bears', '2021-03-21', 'burlywood', 'black', 'This subtopic is all about our love of Kermode Bears!', 'Cute');
--
-- Dumping data for table `posts`
--
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('My top grizzlies in the world [dec]', 'dvader', '2020-12-09', 20, 5, 'Grizzlies');
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('My top grizzlies in the world [jan]', 'dvader', '2021-01-03', 30, 5, 'Grizzlies');
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `content`, `title`) VALUES ('My top grizzlies in the world [feb]', 'dvader', '2021-02-02', 24, 7, 'The grizzly bear (Ursus arctos horribilis), also known as the North American brown bear or simply grizzly' ,'Grizzlies');
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('My top grizzlies in the world [mar]', 'dvader', '2021-03-05', 21, 5, 'Grizzlies');
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('My top grizzlies in the world [april]', 'dvader', '2021-04-06', 2, 5, 'Grizzlies');
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('My top grizzlies in the world [nov]', 'dvader', '2020-11-11', 6, 5, 'Grizzlies');
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('My top grizzlies in the world [oct]', 'dvader', '2020-10-03', 100, 26, 'Grizzlies');
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('My top grizzlies in the world [sept]', 'dvader', '2020-09-06', 17, 5, 'Grizzlies');
INSERT INTO `post` (`ptitle`, `username`, `date`, `upvotes`, `downvotes`, `title`) VALUES ('Black bear I saw in my backyard', 'blue_bear', '2021-04-06', 17, 4, 'Black Bear');
--
-- Dumping data for table `comments`
--
INSERT INTO `comments` (`username`, `comment`, `date`, `upvotes`, `downvotes`, `postid`) VALUES ('dvader', 'I love Grizzly bears, they look so cute and cuddly', '2021-02-07', 7, 3, 1);
INSERT INTO `comments` (`username`, `comment`, `date`, `upvotes`, `downvotes`, `postid`) VALUES ('dvader', 'Grizzlies are pretty neat', '2021-01-07', 14, 4, 3);
INSERT INTO `comments` (`username`, `comment`, `date`, `upvotes`, `downvotes`, `postid`) VALUES ('blue_bear', 'I love Black bears, they look so cute and cuddly', '2021-04-07', 10, 2, 9);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;