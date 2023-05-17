-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 апр 2023 в 09:39
-- Версия на сървъра: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Структура на таблица `author`
--

CREATE TABLE `author` (
  `ID_AUTHOR` int(10) NOT NULL,
  `Author_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `author`
--

INSERT INTO `author` (`ID_AUTHOR`, `Author_name`) VALUES
(1, 'Ivan Vazov'),
(2, 'Grim Brothers'),
(3, 'J.K.Rowling'),
(4, 'Hristo Botev');

-- --------------------------------------------------------

--
-- Структура на таблица `book`
--

CREATE TABLE `book` (
  `ID_BOOK` int(10) NOT NULL,
  `Book_title` varchar(100) NOT NULL,
  `Year_of_publishment` int(10) NOT NULL,
  `Author_ID_AUTHOR` int(10) NOT NULL,
  `Numberofbooks` int(10) NOT NULL,
  `Book_Type_ID_BOOKTYPE` int(10) NOT NULL,
  `Publishing_house_ID_PBH` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `book`
--

INSERT INTO `book` (`ID_BOOK`, `Book_title`, `Year_of_publishment`, `Author_ID_AUTHOR`, `Numberofbooks`, `Book_Type_ID_BOOKTYPE`, `Publishing_house_ID_PBH`) VALUES
(2, 'Snowwhite', 2005, 2, -3, 2, 2),
(3, 'Harry Potter and The Goblet of Fire', 2012, 3, 5, 3, 3),
(5, 'The white fang', 1989, 2, 4, 1, 3),
(6, 'The white fang', 1989, 2, 4, 1, 3);

-- --------------------------------------------------------

--
-- Структура на таблица `book_renting`
--

CREATE TABLE `book_renting` (
  `ID_BOOKRENT` int(100) NOT NULL,
  `Rent_date` date NOT NULL,
  `Rent_days` int(11) NOT NULL,
  `Employee_ID_EMPLOYEE` int(10) NOT NULL,
  `Tenant_ID_TENANT` int(10) NOT NULL,
  `Book_ID_BOOK` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `book_renting`
--

INSERT INTO `book_renting` (`ID_BOOKRENT`, `Rent_date`, `Rent_days`, `Employee_ID_EMPLOYEE`, `Tenant_ID_TENANT`, `Book_ID_BOOK`) VALUES
(1, '0000-00-00', 10, 1, 1, 2),
(2, '0000-00-00', 10, 1, 1, 2),
(3, '0000-00-00', 10, 1, 1, 2),
(4, '0000-00-00', 10, 1, 1, 2),
(5, '0000-00-00', 10, 1, 1, 2),
(6, '0000-00-00', 10, 1, 1, 2),
(7, '0000-00-00', 10, 1, 1, 2),
(8, '2023-04-27', 10, 1, 1, 2),
(9, '2023-04-12', 12, 1, 1, 2),
(10, '2023-04-04', 10, 1, 1, 2);

-- --------------------------------------------------------

--
-- Структура на таблица `book_type`
--

CREATE TABLE `book_type` (
  `ID_BookType` int(50) NOT NULL,
  `Type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `book_type`
--

INSERT INTO `book_type` (`ID_BookType`, `Type_name`) VALUES
(1, 'Novel'),
(2, 'For kids'),
(3, 'Fortune'),
(4, 'Fiction'),
(5, 'Historical Fiction');

-- --------------------------------------------------------

--
-- Структура на таблица `employee`
--

CREATE TABLE `employee` (
  `ID_EMPLOYEE` int(10) NOT NULL,
  `Employee_name` varchar(100) NOT NULL,
  `Phone_number` varchar(100) NOT NULL,
  `Position_ID_POSITION` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `employee`
--

INSERT INTO `employee` (`ID_EMPLOYEE`, `Employee_name`, `Phone_number`, `Position_ID_POSITION`) VALUES
(1, 'Георги', '0877654448', 5),
(2, 'Иван Чобанов', '0877654449', 1),
(3, 'Иван Чобанов', '0877654449', 1),
(4, 'Иван Чобанов', '0877654449', 1),
(5, 'Иван Чобанов', '0877654449', 1),
(6, 'Иван Чобанов', '0877654449', 1),
(7, 'Иван Христов', '0542366952', 2);

-- --------------------------------------------------------

--
-- Структура на таблица `position`
--

CREATE TABLE `position` (
  `ID_POSITION` int(10) NOT NULL,
  `Position_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `position`
--

INSERT INTO `position` (`ID_POSITION`, `Position_name`) VALUES
(1, 'Библиотекар'),
(2, 'Асистент Библиотекар'),
(3, 'Архивист'),
(5, 'Управител');

-- --------------------------------------------------------

--
-- Структура на таблица `publishing_house`
--

CREATE TABLE `publishing_house` (
  `ID_PBH` int(10) NOT NULL,
  `PBH_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `publishing_house`
--

INSERT INTO `publishing_house` (`ID_PBH`, `PBH_name`) VALUES
(1, 'ABC'),
(2, 'Steno'),
(3, 'Hummingbird');

-- --------------------------------------------------------

--
-- Структура на таблица `tenant`
--

CREATE TABLE `tenant` (
  `ID_TENANT` int(100) NOT NULL,
  `Tenant_name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `tenant`
--

INSERT INTO `tenant` (`ID_TENANT`, `Tenant_name`, `Address`, `Phone_number`) VALUES
(1, 'Дарин', 'ул.Страхил войвода 6', '0877624448');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID_AUTHOR`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ID_BOOK`),
  ADD KEY `Author_ID_AUTHOR` (`Author_ID_AUTHOR`),
  ADD KEY `Publishing_house_ID_PBH` (`Publishing_house_ID_PBH`),
  ADD KEY `ID_BOOKRENT` (`Numberofbooks`),
  ADD KEY `Book_Type_ID_BOOKTYPE` (`Book_Type_ID_BOOKTYPE`);

--
-- Indexes for table `book_renting`
--
ALTER TABLE `book_renting`
  ADD PRIMARY KEY (`ID_BOOKRENT`),
  ADD KEY `Employee_ID_EMPLOYEE` (`Employee_ID_EMPLOYEE`),
  ADD KEY `Tenant_ID_TENANT` (`Tenant_ID_TENANT`),
  ADD KEY `Book_ID_BOOK` (`Book_ID_BOOK`);

--
-- Indexes for table `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`ID_BookType`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID_EMPLOYEE`),
  ADD KEY `Position_ID_POSITION` (`Position_ID_POSITION`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`ID_POSITION`);

--
-- Indexes for table `publishing_house`
--
ALTER TABLE `publishing_house`
  ADD PRIMARY KEY (`ID_PBH`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`ID_TENANT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `ID_AUTHOR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `ID_BOOK` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_renting`
--
ALTER TABLE `book_renting`
  MODIFY `ID_BOOKRENT` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `ID_BookType` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID_EMPLOYEE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `ID_POSITION` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publishing_house`
--
ALTER TABLE `publishing_house`
  MODIFY `ID_PBH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `ID_TENANT` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`Publishing_house_ID_PBH`) REFERENCES `publishing_house` (`ID_PBH`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`Book_Type_ID_BOOKTYPE`) REFERENCES `book_type` (`ID_BookType`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`Author_ID_AUTHOR`) REFERENCES `author` (`ID_AUTHOR`);

--
-- Ограничения за таблица `book_renting`
--
ALTER TABLE `book_renting`
  ADD CONSTRAINT `book_renting_ibfk_1` FOREIGN KEY (`Tenant_ID_TENANT`) REFERENCES `tenant` (`ID_TENANT`),
  ADD CONSTRAINT `book_renting_ibfk_2` FOREIGN KEY (`Book_ID_BOOK`) REFERENCES `book` (`ID_BOOK`),
  ADD CONSTRAINT `book_renting_ibfk_3` FOREIGN KEY (`Employee_ID_EMPLOYEE`) REFERENCES `employee` (`ID_EMPLOYEE`);

--
-- Ограничения за таблица `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Position_ID_POSITION`) REFERENCES `position` (`ID_POSITION`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
