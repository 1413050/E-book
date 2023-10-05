-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 06:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addbook`
--

CREATE TABLE `tbl_addbook` (
  `Id` int(11) NOT NULL,
  `BName` varchar(50) NOT NULL,
  `BPrice` int(11) NOT NULL,
  `BDesp` varchar(255) NOT NULL,
  `BImage` varchar(255) NOT NULL,
  `Cate_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_addbook`
--

INSERT INTO `tbl_addbook` (`Id`, `BName`, `BPrice`, `BDesp`, `BImage`, `Cate_Id`) VALUES
(4, 'Muhammad Bin Qasim', 300, 'Muhmmad Bin Qasim', 'historical-1.jpg', 4),
(5, 'Seaborne', 88, 'aa', 'action-1.jpg', 5),
(6, 'My Last Love Story', 200, 'romantic books', 'romantic-6.jfif', 2),
(7, 'The Royal Romance', 83, 'dg', 'romantic-1.jpg', 2),
(14, 'Erich Segal', 45, 'Erich Is a romantic love story', 'romantic-4.jpg', 2),
(15, 'Bunch Of Horror', 200, 'lorem ipsum', 'horror_1.jpg', 3),
(16, 'Tenth Girl', 33, 'Tenth GIRL', 'fictional_story-1.webp', 1),
(17, 'Crictical Thinking', 56, 'Critical Thinking In Acedmics', 'education-1.png', 6),
(18, 'War Girls', 19, 'Girls War Fictional movie', 'fictional_story-4.jpg', 1),
(19, 'Almost There', 38, 'Almost There A Twisted Fairy Tale', 'fictional_story-5.jfif', 1),
(20, 'Volumes of Blood', 40, 'Volume 1', 'horror_4.jpg', 3),
(22, 'The True Confession', 22, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'action-2.jpg', 5),
(23, 'Live By Night', 50, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'action-3.jpg', 5),
(24, 'I Survived', 13, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'action-4.jpg', 5),
(25, 'Jade City', 121, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'action-5.jpg', 5),
(26, 'Alex Cross', 33, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'action-6.jpg', 5),
(27, 'The Appeal', 15, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'fictional_story-2.jfif', 1),
(28, 'The Flat Share', 88, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'fictional_story-3.jpg', 1),
(29, 'Wickeed Walls', 18, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'fictional_story-6.jfif', 1),
(30, 'The Love Hypnothesis', 53, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'romantic-2.jpeg', 2),
(31, 'You Are The Best Wife', 15, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'romantic-3.jpg', 2),
(32, 'A Love Story From The Heart', 77, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'romantic-5.jpg', 2),
(34, 'House Beneath The Bridge', 62, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollit', 'horror_2.jpg', 3),
(35, 'Shadow Of The Stranger', 44, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'horror_3.jpg', 3),
(36, 'Joe Hill', 31, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'horror_5.webp', 3),
(37, 'A Classic Horror Story Book', 189, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'horror_6.jpg', 3),
(38, 'Sumnat Book', 79, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'historical-2.jfif', 4),
(39, 'The Other Einstien', 56, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'historical-3.webp', 4),
(40, 'Engineers Wife', 67, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'historical-4.jpg', 4),
(41, 'The 1619 Project', 44, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'historical-5.jpg', 4),
(42, 'We Were The Luck Ones', 54, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'historical-6.jpg', 4),
(43, 'Jungle Book', 10, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'kids_story-1.jpg', 11),
(44, '365 Fairy Tales', 100, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'kids_story-2.jpg', 11),
(45, '300+ Hadiths', 50, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'kids_story-3.jpg', 11),
(46, 'Marvellous Sotories for Kids', 154, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'kids_story-4.jpg', 11),
(47, 'Story Theives', 52, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'kids_story-5.jpg', 11),
(48, 'Cinderala', 12, 'take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a', 'kids_story-6.webp', 11),
(49, 'Spider Man 1', 88, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'comic-1.jpg', 12),
(50, 'The Amazing SpiderMan', 65, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'comic-2.webp', 12),
(51, 'The Infinity Gauntlet', 32, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'comic-3.jpg', 12),
(52, 'Heros Return The Avengers', 61, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'comic-4.jfif', 12),
(53, 'The New Teen Titans', 58, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'comic-5.webp', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addingcart`
--

CREATE TABLE `tbl_addingcart` (
  `Cid` int(11) NOT NULL,
  `Bid` int(11) NOT NULL,
  `BName` varchar(50) NOT NULL,
  `Bprice` int(11) NOT NULL,
  `IP_Address` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_addingcart`
--

INSERT INTO `tbl_addingcart` (`Cid`, `Bid`, `BName`, `Bprice`, `IP_Address`, `Image`) VALUES
(70, 0, 'Crictical Thinking><i class=', 56, '::1', 'education-1.png'),
(71, 0, 'My Last Love Story><i class=', 200, '::1', 'romantic-6.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id`, `Name`, `Email`, `Password`) VALUES
(2, 'AzmeerShah', 'azmeershah621@gmail.com', '1122');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Category_Path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`Category_Id`, `Category_Name`, `Category_Path`) VALUES
(1, 'Fictional', './books/fictional.php'),
(2, 'Romantic', './books/romantic.php'),
(3, 'Horror', './books/horror.php'),
(4, 'Historical', './books/historical.php'),
(5, 'Action', './books/action.php'),
(6, 'Educational', './books/educational.php'),
(11, 'KidStories', './books/kid_stories.php'),
(12, 'Comics', './books/comics.php');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_competition`
--

CREATE TABLE `tbl_competition` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Education` varchar(50) NOT NULL,
  `essay` longtext NOT NULL,
  `Winner_List` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_competition`
--

INSERT INTO `tbl_competition` (`Id`, `Name`, `Age`, `Email`, `Password`, `Education`, `essay`, `Winner_List`) VALUES
(18, 'hammad', 16, 'teqyxus@mailinator.com', 'Pa$$w0rd!', 'Mollitia sunt qui co', '<p><br></p>', 'Make Winner'),
(20, 'Mufutau Pena', 16, 'reqorivon@mailinator.com', 'Pa$$w0rd!', 'Ex enim eos dolore e', '', 'Winner');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contactus`
--

INSERT INTO `tbl_contactus` (`Id`, `Name`, `Email`, `Subject`, `Message`) VALUES
(1, 'Chester Gillespie', 'capuqu@mailinator.com', 'Veniam doloremque d', 'Consequuntur amet n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile_Number` varchar(20) NOT NULL,
  `Address_1` varchar(255) NOT NULL,
  `City_Country` varchar(255) NOT NULL,
  `State` varchar(50) NOT NULL,
  `CashOnDelivery` varchar(50) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Order_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`Id`, `Name`, `Email`, `Mobile_Number`, `Address_1`, `City_Country`, `State`, `CashOnDelivery`, `Status`, `Order_at`) VALUES
(23, 'Griffin Nicholson', 'mitob@mailinator.com', '+1 (201) 618-6107', '63 First Parkway', 'Amet veniam aut re', 'Pariatur Quod numqu', 'Yes', 'Deliver Now!', '2023-08-20 11:17:23'),
(24, 'Raja Padilla', 'qylewaqu@mailinator.com', '+1 (421) 176-5449', '66 North Green Hague Drive', 'Officia sint in occa,Ipsa veritatis prov', 'Hic enim aut quas qu', 'Yes', 'Delivered', '2023-08-20 17:53:36'),
(25, 'Xantha Rowland', 'henyqar@mailinator.com', '+1 (647) 341-8777', '503 Green Old Extension', 'Quis incididunt accu,Provident sed conse', 'Velit non minima qui', 'Yes', 'Deliver Now!', '2023-08-20 21:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signin`
--

CREATE TABLE `tbl_signin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_signin`
--

INSERT INTO `tbl_signin` (`Id`, `Name`, `Email`, `Password`) VALUES
(2, 'Zun', 'zun@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd'),
(3, 'ali', 'ali@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd'),
(4, 'abd', 'abd@gmail.com', 'fae0b27c451c728867a567e8c1bb4e53'),
(5, 'ahmed', 'ahmed@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9'),
(6, 'hammad', 'hammad@gmail.com', 'c6f057b86584942e415435ffb1fa93d4'),
(7, 'azmeer', 'a@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(8, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, 'Hamish Morin', 'ceji@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(10, 'Aspen Wiley', 'xika@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(11, 'Yoshio Oneil', 'behol@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(12, 'Yoshio Oneil', 'behol@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(13, 'Halla Barnett', 'myxofo@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(14, 'Halla Barnett', 'myxofo@mailinator.com', 'Pa$$w0rd!'),
(15, 'Judah Fernandez', 'furon@mailinator.com', 'Pa$$w0rd!'),
(16, 'Joshua Young', 'xuwigusap@mailinator.com', 'Pa$$w0rd!'),
(17, 'Joshua Young', 'xuwigusap@mailinator.com', 'Pa$$w0rd!'),
(18, 'Blair Barron', 'caxofy@mailinator.com', 'Pa$$w0rd!'),
(19, 'Blair Barron', 'caxofy@mailinator.com', 'Pa$$w0rd!'),
(20, 'Zun', 'hammad@gmail.com', '1122'),
(21, 'a', 'azmeer@yahoo.com', '1155'),
(22, 'Jasper Johns', 'zexyroz@mailinator.com', 'Pa$$w0rd!'),
(23, 'User', 'user@gmail.com', 'user1122'),
(24, '', '', ''),
(25, 'Shad Vance', 'jodoqewug@mailinator.com', 'Pa$$w0rd!'),
(26, 'Kibo Black', 'solowa@mailinator.com', 'Pa$$w0rd!'),
(27, 'Natalie Finley', 'futidih@mailinator.com', 'Pa$$w0rd!'),
(28, 'Addison Morton', 'qytajan@mailinator.com', 'Pa$$w0rd!'),
(29, 'ali', 'ali@gmail.com', '1144');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Duration` varchar(255) NOT NULL,
  `Subscribe_At` date NOT NULL DEFAULT current_timestamp(),
  `End_At` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`Id`, `Name`, `Email`, `Duration`, `Subscribe_At`, `End_At`) VALUES
(9, 'Edan Powell', 'jyviv@mailinator.com', '1 Year', '2023-08-24', '2024-08-24'),
(10, 'Lila Acosta', 'xylev@mailinator.com', '6 Months', '2023-08-24', '2024-02-24'),
(12, 'Maxwell Fowler', 'qovur@mailinator.com', '1 Year', '2023-08-24', '2024-08-24'),
(13, 'Azmeer', 'Azmeer@gmail.com', '1 Year', '2023-08-24', '2024-08-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addbook`
--
ALTER TABLE `tbl_addbook`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Cate_Id` (`Cate_Id`);

--
-- Indexes for table `tbl_addingcart`
--
ALTER TABLE `tbl_addingcart`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `tbl_competition`
--
ALTER TABLE `tbl_competition`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_signin`
--
ALTER TABLE `tbl_signin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_addbook`
--
ALTER TABLE `tbl_addbook`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_addingcart`
--
ALTER TABLE `tbl_addingcart`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `Category_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_competition`
--
ALTER TABLE `tbl_competition`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_signin`
--
ALTER TABLE `tbl_signin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_addbook`
--
ALTER TABLE `tbl_addbook`
  ADD CONSTRAINT `tbl_addbook_ibfk_1` FOREIGN KEY (`Cate_Id`) REFERENCES `tbl_category` (`Category_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
