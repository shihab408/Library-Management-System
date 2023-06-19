-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 03:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_address` varchar(255) NOT NULL,
  `author_contact` varchar(11) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `author_education` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`author_id`, `author_name`, `author_address`, `author_contact`, `author_email`, `author_education`) VALUES
(1, 'Md. Shihab Uddin', 'Jamalpur', '01753541408', 'shihab@gmail.com', 'Diploma'),
(3, 'Rabindranath Tagore', 'India', '01265415454', 'tagore564@gmail.com', 'Msc in Physics'),
(4, 'Kazi Nazrul Islam', 'Kalkata', '01533746199', 'kazi@gmail.com', 'HSC'),
(5, 'Eng. Bulbul Ahmed', 'Jamalpur', '01753541409', 'bulbul@gmail.com', 'Msc in CSE'),
(6, 'Eng Ranak Ahmed', 'Sylhet', '01756245140', 'ranak@gmail.com', 'Msc in CSE'),
(7, 'Eng. Atikul Islam', 'Mymensingh Sadar', '01356410107', 'atikduet@gmail.com', 'Msc in CSE'),
(9, 'Eng. Bulbul Ahmed', 'Jamalpur', '01753541409', 'bulbul@gmail.com', 'Msc in CSE'),
(10, 'Eng Ranak Ahmed', 'Sylhet', '01756245140', 'ranaks@gmail.com', 'Msc in CSE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(500) NOT NULL,
  `book_unique_id` varchar(255) NOT NULL,
  `book_category` int(11) NOT NULL,
  `book_author` int(11) NOT NULL,
  `book_publisher` int(255) NOT NULL,
  `book_qty` int(255) NOT NULL,
  `book_entry_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`book_id`, `book_name`, `book_unique_id`, `book_category`, `book_author`, `book_publisher`, `book_qty`, `book_entry_date`) VALUES
(17, 'C', 'Bookid_2053250', 4, 5, 3, 7, '2023-01-01'),
(18, 'C++', 'Bookid_463212', 4, 6, 3, 5, '2023-01-01'),
(19, 'Python', 'Bookid_207491', 4, 7, 4, 20, '2023-01-01'),
(20, 'Java ', 'Bookid_2063174', 4, 6, 3, 30, '2023-01-01'),
(21, 'Computer Office Application', 'Bookid_484113', 4, 1, 4, 50, '2023-01-01'),
(22, 'DataLog', 'Bookid_2074445', 4, 7, 4, 3, '2023-01-01'),
(23, 'Fortran', 'Bookid_2063133', 4, 6, 3, 3, '2023-01-01'),
(24, 'Hydroylic Eng', 'Bookid_14335', 14, 3, 3, 4, '2023-01-01'),
(25, 'Artificial Inteligence', 'Bookid_484139', 4, 6, 4, 6, '2023-01-01'),
(26, 'HTML Basic to Adv', 'Bookid_483311', 4, 4, 3, 20, '2023-01-01'),
(27, 'CSS Basic', 'Bookid_474349', 4, 7, 4, 15, '2023-01-01'),
(28, 'Java 2', 'Bookid_2013119', 4, 1, 3, 3, '2023-01-01'),
(29, 'Math-1', 'Uid_17_4_396', 17, 4, 1, 10, '2023-01-01'),
(32, 'Python Programming 2', 'Uid_4_7_99', 4, 7, 3, 100, '2023-06-14'),
(35, 'C Sharp', 'Uid_4_5_12', 4, 5, 3, 6, '2023-06-17'),
(36, 'Fortran', 'Uid_4_6_349', 4, 6, 3, 5, '2023-06-17'),
(37, 'C', 'Uid_7_5_492', 7, 5, 3, 6, '2023-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Nobel'),
(3, 'Story'),
(4, 'Computer'),
(5, 'English Grammar'),
(6, 'Drama'),
(7, 'Tragedy'),
(10, 'Poem'),
(11, 'Chemistry'),
(12, 'Physics'),
(13, 'Civil Engineering'),
(14, 'Power Engineering'),
(15, 'Mechanical Eng'),
(16, 'Electronics Eng'),
(17, 'Mathmetics'),
(18, 'Bangla Litereture'),
(19, 'English Litereture');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issue`
--

CREATE TABLE `tbl_issue` (
  `issue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issued_date` date NOT NULL,
  `return_date` date NOT NULL,
  `issue_quantity` int(11) NOT NULL,
  `issue_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_issue`
--

INSERT INTO `tbl_issue` (`issue_id`, `student_id`, `book_id`, `issued_date`, `return_date`, `issue_quantity`, `issue_status`) VALUES
(7, 6, 18, '2023-06-14', '2023-06-30', 1, 1),
(8, 12, 27, '2023-06-14', '2023-06-30', 5, 1),
(14, 13, 27, '2023-06-15', '2023-06-27', 10, 1),
(15, 2, 17, '2023-06-14', '2023-06-23', 2, 1),
(23, 4, 24, '2023-06-17', '2023-06-24', 1, 1),
(24, 12, 22, '2023-06-17', '2023-06-24', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_publisher`
--

CREATE TABLE `tbl_publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `publisher_address` varchar(255) NOT NULL,
  `publisher_contact` varchar(11) NOT NULL,
  `publisher_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_publisher`
--

INSERT INTO `tbl_publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `publisher_contact`, `publisher_email`) VALUES
(1, 'Rokomari BD LTD.', 'Mohakhali, Dhaka', '01756656565', 'rokomari@gmail.com'),
(2, 'Bangladesh Islamic Foundation', '12/4, Farmgate, Dhaka', '01755555666', 'islamicfoundation@gmail.com'),
(3, 'Technical Prokashoni', 'Mymensingh, Mashkanda', '01753635415', 'technical@gmail.com'),
(4, 'Haque Publication', 'Jamalpur, Mymensingh 2200', '01753654148', 'haque@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_roll` int(6) NOT NULL,
  `student_dep` varchar(255) NOT NULL,
  `student_contact` varchar(11) NOT NULL,
  `student_address` varchar(500) NOT NULL,
  `student_rule` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `student_roll`, `student_dep`, `student_contact`, `student_address`, `student_rule`) VALUES
(2, 'Raisul Islam', 862154, 'Power', '01753641021', 'Tangail, Modupur', 1),
(3, 'Karim Badsha', 862184, 'Computer Science and Eng.', '01756425410', 'Rajshahi', 1),
(4, 'Sohag Hasan', 852145, 'Computer Science and Eng.', '01756425410', 'Jamalpur', 0),
(5, 'Jobbar', 123456, 'Power', '01756425411', 'Mymensingh', 1),
(6, 'Sattar', 654321, 'Electronics', '01735040140', 'Tangail', 0),
(12, 'Md. Shihab Uddin', 862185, 'Computer Science and Eng.', '01753541408', 'Jamalpur', 1),
(13, 'Khan Raihan', 862214, 'Computer Science and Eng.', '01756425411', 'Tangail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_contact` varchar(11) NOT NULL,
  `user_address` varchar(300) NOT NULL,
  `user_nid` varchar(10) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_rule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `full_name`, `user_email`, `user_contact`, `user_address`, `user_nid`, `user_pass`, `user_rule`) VALUES
(2, 'shihab', 'Md. Shihab Uddin', 'shihab@gmail.com', '01753541408', 'Sarishabari, Jamalpur', '7804137292', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_issue`
--
ALTER TABLE `tbl_issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_issue`
--
ALTER TABLE `tbl_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
