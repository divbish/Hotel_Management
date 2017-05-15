-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2017 at 05:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HotelManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `guests` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `bill_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`booking_id`, `room_id`, `user_id`, `check_in`, `check_out`, `guests`, `kids`, `bill_amount`) VALUES
(1, 101, 5, '2017-05-11', '2017-05-12', 2, 1, 99),
(2, 101, 6, '2017-05-11', '2017-05-12', 2, 1, 99),
(3, 101, 7, '2017-05-11', '2017-05-12', 2, 1, 99),
(4, 102, 8, '2017-05-11', '2017-05-12', 2, 1, 99),
(5, 103, 9, '2017-05-11', '2017-05-12', 2, 1, 99),
(6, 104, 10, '2017-05-11', '2017-05-12', 2, 1, 99),
(7, 105, 11, '2017-05-11', '2017-05-12', 2, 1, 99),
(8, 106, 15, '2017-05-11', '0000-00-00', 1, 0, 149),
(9, 106, 16, '2017-05-11', '0000-00-00', 1, 0, 149),
(10, 106, 17, '2017-05-11', '0000-00-00', 1, 0, 149),
(11, 101, 18, '0000-00-00', '0000-00-00', 0, 0, 99),
(12, 101, 19, '2017-05-04', '2017-05-06', 0, 0, 99),
(13, 102, 20, '2017-05-04', '2017-05-06', 0, 0, 99),
(14, 103, 21, '2017-05-04', '2017-05-06', 0, 0, 99),
(15, 104, 22, '2017-05-04', '2017-05-06', 0, 0, 99),
(16, 105, 23, '2017-05-04', '2017-05-06', 0, 0, 99),
(17, 102, 24, '0000-00-00', '0000-00-00', 0, 0, 99),
(19, 101, 25, '2017-05-08', '2017-05-10', 0, 0, 99),
(20, 106, 26, '2017-05-08', '2017-05-10', 0, 0, 149),
(21, 102, 27, '2017-05-08', '2017-05-10', 0, 0, 99),
(22, 111, 28, '2017-05-09', '2017-05-11', 0, 0, 199),
(23, 103, 29, '0000-00-00', '0000-00-00', 0, 0, 99),
(24, 104, 34, '0000-00-00', '0000-00-00', 0, 0, 99),
(25, 101, 53, '2017-05-15', '2017-05-17', 0, 0, 99),
(26, 105, 54, '0000-00-00', '0000-00-00', 0, 0, 99),
(27, 102, 55, '2017-05-17', '2017-05-24', 0, 0, 99),
(28, 103, 56, '2017-05-17', '2017-05-24', 0, 0, 99),
(29, 101, 57, '2017-05-25', '2017-05-26', 0, 0, 99),
(30, 102, 58, '2017-05-25', '2017-05-26', 0, 0, 99),
(31, 111, 59, '2017-05-18', '2017-05-19', 0, 0, 199),
(34, 101, 61, '2017-05-29', '2017-05-30', 0, 0, 99),
(35, 104, 62, '2017-05-24', '2017-05-25', 0, 0, 99),
(37, 102, 65, '2017-05-30', '2017-05-31', 0, 0, 99),
(38, 106, 66, '2017-05-30', '2017-05-31', 0, 0, 149),
(39, 112, 67, '2017-05-10', '2017-05-12', 0, 0, 199),
(49, 101, 68, '2017-05-19', '2017-05-20', 0, 0, 99),
(50, 104, 69, '2017-05-19', '2017-05-20', 0, 0, 99),
(51, 101, 70, '2017-06-08', '2017-06-09', 1, 0, 99),
(56, 101, 71, '2017-06-25', '2017-06-26', 1, 0, 99),
(57, 101, 72, '2017-06-12', '2017-06-13', 1, 0, 99),
(58, 105, 75, '2017-05-19', '2017-05-20', 2, 1, 99);

-- --------------------------------------------------------

--
-- Table structure for table `customerdetails`
--

CREATE TABLE `customerdetails` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `contact_number` text NOT NULL,
  `role` text NOT NULL,
  `MemberSince` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Active` int(11) NOT NULL,
  `password` text,
  `AgentUsername` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerdetails`
--

INSERT INTO `customerdetails` (`customer_id`, `username`, `first_name`, `last_name`, `email`, `contact_number`, `role`, `MemberSince`, `Active`, `password`, `AgentUsername`) VALUES
(4, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(5, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(6, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(7, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(8, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(9, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(10, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(11, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(12, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(13, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(14, '', 'd', 'b', 'd', '3', 'regular', '0', 0, NULL, ''),
(15, '', 'derybh', 'gvyv', '', '', 'regular', '0', 0, NULL, ''),
(16, '', 'derybh', 'gvyv', '', '', 'regular', '0', 0, NULL, ''),
(17, '', 'derybh', 'gvyv', '', '', 'regular', '0', 0, NULL, ''),
(18, '', 'qeqe', 'eqert', 'ser4er@mail.com', '12123', 'regular', '0', 0, NULL, ''),
(19, '', 'asdfa', 'asdf', 'asdf', 'asdf', 'regular', '0', 0, NULL, ''),
(20, '', 'sdf', 'asdf', 'qre', 'qwer', 'regular', '0', 0, NULL, ''),
(21, '', 'w4ytr', 'rty', 'rty', 'rty', 'regular', '0', 0, NULL, ''),
(22, '', '4556', '456', '23', '235', 'regular', '0', 0, NULL, ''),
(23, '', '4rter', 'wert', 'tyjr', 'rtyu', 'regular', '0', 0, NULL, ''),
(24, '', '', '', '', '', 'regular', '0', 0, NULL, ''),
(25, '', 'bla', 'bla', 'username@mail.com', '123', '1231231', '0', 0, 'regular', ''),
(26, '', 'sdfg', 'erte', 'retg@mail.com', '123', 'regular', '0', 0, '123', ''),
(27, '', 'mail', 'mail', 'mail@mail.com', '123', 'regular', '0', 0, 'ad638ac81c37a6403aa8ba233fbb1094f1d9e2d15c4fc71ad35231e4a14d18549', ''),
(28, '', 'jorina', 'begum', 'jorina@mail.com', '12312', 'regular', '0', 0, '4001d52d4c0446eedffa80af6c5b9d1166665b534a18971c885f32647b70bc4bd', ''),
(29, '', '', '', '', '', 'regular', '0', 0, '4aa409d213470183a59d036a25f54e7785d2ba32804f9446e37be486d06ec238d', ''),
(30, '', 'balok', 'balok', 'balok@mail.com', '1', 'regular', '0', 0, '093b883eb594c41b9c10ad651c610ce08bf24f9b95d3493d440bd440b9be3cccc', ''),
(31, '', 'balok', 'balok', 'balok@mail.com', '123123', 'regular', '0', 0, 'ac754d2c4bf021fe95021b7d2566744ab2010617555d8db8404892811423aefc0', ''),
(32, '', 'balok', 'balok', 'balok@mail.com', '123123', 'regular', '0', 0, '360674745d6b8f2a0075e393f74226c05e55b2a78aec1e19280ef110cab639579', ''),
(33, '', 'balok', 'balok', 'balok@mail.com', '123123', 'regular', '0', 0, 'cc29df84e2a388c4c028211d22fd76c2c0bd511da5858a51b81f202420bf5998b', ''),
(34, '', '', '', '', '', 'regular', '0', 0, 'e38bb15816cd3afbaf16519f3c857dda4741d99febe197a98519f70e81c850ff6', ''),
(35, '', '', '', '', '', 'regular', '0', 0, 'fbc95597d8304c866acf330869b9f104bf09bd2e02422849bd5187cba10783be2', ''),
(36, '', '', '', '', '', 'regular', '0', 0, '3333e7eed62c279c7d042aee9d1a10b1c60a9ed97b7bf2f3d7ce91328bdb27f5c', ''),
(37, '', '', '', '', '', 'regular', '0', 0, '23cd8b1e487fb11b07f26b88370d95ca18ade4df65bb4ad08258d54ba86d6459a', ''),
(38, '', '', '', '', '', 'regular', '0', 0, '670df44a9f7db902c8be1444c45cfd0ebfca31d8f0a47bc07bc9e9650d801882e', ''),
(39, '', '', '', '', '', 'regular', '0', 0, 'd53c6c075159bd19b492f10ee7e27fd50f3792d43b6ba9b6866efebd8028dfea8', ''),
(40, '', '', '', '', '', 'regular', '0', 0, '9cf5960824f9ee77def0e55b7f9cfcb2b4492f47d34fcfef27f312cadfe1202cb', ''),
(41, '', '', '', '', '', 'regular', '0', 0, 'c21a03cc5e6e10565d33789cdf239d5b462f45171f9b759b7a0387adc0fc244a4', ''),
(42, '', '', '', '', '', 'regular', '0', 0, 'cb5d0ae0dd59af02ddfe067dc08a465d1176e4e0120b7b6ed2e5d0d3ed8c74a50', ''),
(43, '', '', '', '', '', 'regular', '0', 0, 'fdf01dee6ce3afeaf085ed27c55b08931d5ffa93e3a3d6d8598824731c29b4c03', ''),
(44, '', '', '', '', '', 'regular', '0', 0, '05a4ac53a15cbb906b96af318dbf9dd593633e145aae5f31bc45354a1804d7a20', ''),
(45, '', '', '', '', '', 'regular', '0', 0, '32f1c6dce8ec1351e9e15701f3304b8d7b83c4433b4001f508ab9d02627147a93', ''),
(46, '', '', '', '', '', 'regular', '0', 0, '3b2260150a672c16b405d2a3ef33476ff5d51c96b494776fdf180a866d2085e05', ''),
(47, '', 'asdf', 'asdfas', 'qwe', '123', 'regular', '0', 0, '84f89a744f162513e3a097f32cf168483d52ebf9652e53e359559978e5c31ca66', ''),
(48, '', 'asdf', 'asdf', 'qwe123', '123123', 'regular', '0', 0, 'b3aaa7c262726f2a8cb375f2fcb79b101c21bc882e126e60746edeb8a4fd37073', ''),
(49, '', 'shishu', 'shishu', 'shishu@mail.com', '1234', 'regular', '0', 0, '8259281b462ba7454012d4e95946ce81360089007c944d9e792ebc90f7081801e', ''),
(50, 'shishu2', 'shishu2', 'shishu2', 'shishu2@mail.com', '123456', 'regular', '0', 0, '10ab76ee3c47a8273112241c5a5c998b578bc600d65e4a1075810512085137957', ''),
(51, '', 'gfd', 'sdfg', 'sdfg', '24', 'regular', '0', 0, 'e7845991bfd52b9d9160ec237fca1b99df94ac557a36e96cd81fe58b1e6d88a55', ''),
(52, '', 'ergdfg', 'sdfgret', 'ert53@mail.com', '454545', 'regular', '0', 0, 'bcd1abda02e691abd6a1093d56760359dea88aff75a2a67025488de850ec3f458', ''),
(53, '', '', '', '', '', 'regular', '0', 0, 'd8d038444619cec7133497800df68f4cecc22bd42b1a3fe35931a853054903120', ''),
(54, '', '', '', '', '', 'regular', '0', 0, '76105a462c55bbcee7781cc2e35e9959a8c3a56cbdf96ff4981593d3877e763ab', ''),
(55, '', '', '', '', '', 'regular', '0', 0, 'bb8394f1120b7ebe75c999f89c557d98b0728e7cccf1d5cc76605adf5ecc64366', ''),
(56, '', '', '', '', '', 'regular', '0', 0, '7b80734c69f02bfc57a99af40c6a801a060b350d53cf4be2cbf0c4b89c21615c5', ''),
(57, '', '', '', '', '', 'regular', '0', 0, 'b879535a81a5a33de0b0d2a158e1eb7361b594fd1b4d6b0c5d3bf4a591e67c2f7', ''),
(58, '', 'bla', 'bla', 'bla@mail.com', '1234', 'regular', '', 0, 'a592a7db1d887bb83efb55aea5e05729105baafc49a7fc727af61bd4e22326d32', ''),
(59, 'ashifimran', 'Ashif', 'Imran', 'bla@mail.com', '123123', 'admin', '1494031582', 1, '09d2ce1b2e47904a14b7dac7d85836e043f1f400cd20e6c7c74d3094591ce570b', ''),
(60, 'kushalaswani', 'kushal', 'aswani', 'kushal@mail.com', '12345', 'regular', '1494016591', 1, '11e03e85d4c41adfe5f0c1703c9c6899e8a140f2783d36ed9014a372655aea4f7', ''),
(61, 'krunalpatel', 'krunal', 'patel', 'krunal@mail.com', '12312312', 'regular', '1494017526', 1, '7e36644d171c3a0b3c45cceccd102963feabb468a1111abd3f0f96f4717c75628', ''),
(62, 'shirleylee', 'shirley', 'lee', 'shirley@mail.com', '1', 'CSR', '1494031016', 1, 'd534496591bf6bd4f5fee324609bf2fade5f6c4fcc7d346bf21ee93474514ac52', ''),
(63, 'lorimasuda', 'lori', 'masuda', 'lori@mail.com', '123123', 'regular', '1494031128', 1, '1', ''),
(64, 'nusratjahan', 'nusrat', 'jahan', 'nusrat@mail.com', '1231231', 'admin', '1494031582', 1, 'ba225d6464f8e58a6c2c91c5a234fc26f0e96dae5bdfaec4f57bbcd8628c154b2', ''),
(65, 'luis', 'luis', 'luis', 'luis@mail.com', '13123', 'admin', '1494047825', 1, '9b0ca11bc770fe1c51ab5ce99a3191823e0b2bb20269cfa998f211ec8f105c7c8', 'shirleylee'),
(66, 'eshrat', 'eshrat', 'tendulkar', 'eshrat@mail.com', '123123', 'regular', '1494049385', 1, 'f23ec9f6f13779cfec616ca5580970156867e50051b35a24a56f3b4b14a4c7d73', 'shirleylee'),
(67, 'lulu', 'lulu', 'lulu', 'lulu@mail.com', '12312', 'regular', '1494049809', 1, 'eeaeaad1721a1c310b0f443c507a2a34a2ed7925a78828b50b0c7fa9513b0678a', 'nusratjahan'),
(68, 'werwer', 'wertre', 'werwer', 'rwrer@mail.com', '123123123', 'regular', '1494178127', 1, '5e0cbca3ca856b9f966d864e264fbc77c5faa54ca4276b534f033fca4dab6d1ba', 'blabla'),
(69, 'rqrtqrt', 'retertw', 'werte', 'qertwre@mail.com', 'q2414', 'regular', '1494178168', 1, '03e65bd1bd208e13ddd66ef3fd2282dfb63d8b7b748a0d23a5384304766a560e9', 'blabla'),
(70, 'testuser', 'test', 'user', 'testuser@mail.com', '1231231', 'regular', '1494209494', 1, '5a05602de55f031eb8c4d9a018efcf67625f765df314ceaac9723d9194b3eed36', 'blabla'),
(71, 'krunal', 'krunal', 'patel', 'krunal@mailinator.com', '123', 'regular', '1494213245', 1, 'f04319b0ff1f12f502b88468a864b8a496a7c2e669941e6d5fa969757d2b55e95', 'shirleylee'),
(72, 'luis', 'vendoza', 'luis', 'luis@mail.com', '123123', 'regular', '1494213353', 1, '469d65f336e3d4c24ddbe3f74fe0c11d291d79e60ca8e69fd7486a12da46e4e90', 'guest'),
(73, 'testuser1', 'Nusrat', 'ntest1', 'test@mailinator.com', '232335', 'regular', '1494280803', 1, '730f0348f780635fb48bb01707387dad42954605d9ecdf94d19e8e0e2cfc53a8b', ''),
(74, 'testuser2', 'yteyt', 'uytuyt', 'jekhrkh', 'ehrtyuy', 'admin', '1494281799', 1, '2b57502af86987d4fd003f04cbce78769fbb1dd61aa158d0cd8e026877081a26d', ''),
(75, 'div', 'bish', 'di', 'dib@gail.cpm', '2345', 'regular', '1494282204', 1, 'e77a5544c8d08e284bd05d1c1e33749c1ffbf2687d876889ba7b56aba41ddbfbe', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_number` int(100) NOT NULL,
  `room_type` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_number`, `room_type`) VALUES
(101, 'SingleRoom'),
(102, 'SingleRoom'),
(103, 'SingleRoom'),
(104, 'SingleRoom'),
(105, 'SingleRoom'),
(106, 'DoubleRoom'),
(107, 'DoubleRoom'),
(108, 'DoubleRoom'),
(109, 'DoubleRoom'),
(110, 'DoubleRoom'),
(111, 'DeluxeRoom'),
(112, 'DeluxeRoom'),
(113, 'DeluxeRoom'),
(114, 'DeluxeRoom'),
(115, 'DeluxeRoom');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `room_type` text NOT NULL,
  `room_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`room_type`, `room_price`) VALUES
('SingleRoom', 99),
('DoubleRoom', 149),
('DeluxeRoom', 199);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserID` varchar(120) NOT NULL,
  `UserName` varchar(150) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `MemberSince` varchar(255) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL,
  `Role` varchar(20) NOT NULL,
  `AgentUsername` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `UserName`, `FirstName`, `LastName`, `Email`, `Password`, `MemberSince`, `Active`, `Role`, `AgentUsername`) VALUES
('joaagc', 'ashifimran', 'Ashif', 'Imran', '1@1.com', 'f91058a3298309aa0e6251464ee591f69aa637909921bc93d8861c1a6635828e2', '1493317728', 1, 'admin', ''),
('9po9d7', 'customer', 'bla', 'bla', '1@1.com', 'cbfb951c79e1f9eef268993f632f291dcbee1511b26c0d8cadcd7e2c5201459aa', '1493682545', 1, '', ''),
('2htzye', 'fn1ln1', 'fn1', 'ln1', '1@1.com', 'c72312bf841bf5d5160f33d9412291466bea559cd810fb571ec8910771ccf327e', '1493359811', 1, '', 'ashifimran'),
('47ju9k', 'fn2ln2', 'fn2', 'ln2', '1@1.com', 'e5b6d6b11bd97ec8d2a8d2f1e77b3a43d9d3558e2dd5528fdb11b796860f49d1a', '1493359879', 1, '', 'sachintendulkar'),
('7kuj3h', 'fn3ln3', 'fn3', 'ln3', '1@1.com', '9e184602c4e23f61687d59ff672a77badf9db6048ebe2c9b5121c8827cc66f4a8', '1493360668', 1, '', 'sachintendulkar'),
('4frvct', 'JohnSmith', 'John', 'Smith', 'js@gmail.com', '6f4e26455b0f9c987a0009f3c5bd12786300b90fa76fb5399c82f2e63ab7121aa', '1445987595', 1, 'regular', ''),
('692g6q', 'PraviinM', 'Praviin', 'Mandhare', 'pravsm@gmail.com', '1e905117d466dc32016cb71e3cb798cea73a942f2221fcbda1b5dc8104c2565ee', '1445961643', 1, 'admin', ''),
('dmgtws', 'sachintendulkar', 'Sachin', 'Tendulkar', '2@2.com', '66bcf9a9819183a5003dbe218646322601c0381040fae92bd0390754c5cf7dd26', '1493318970', 1, 'record manager', ''),
('b84t1o', 'testuser', 'test', 'user', '1@1.com', 'dac03968ee02aca120113cf6fa0be28964998ba66b2cd6335aa4236ff1601407e', '1493668162', 1, 'CSR', ''),
('9zfcz2', 'werwer', 'ewrwer', 'werw', '123@1.com', '5992ab21537165d5d0760e5d5f0f04a7dd5576b40a4c22bdefada18c1d8e1803b', '1493962413', 1, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `room_book` (`room_id`),
  ADD KEY `customer_book` (`user_id`);

--
-- Indexes for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserName`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD CONSTRAINT `customer_book` FOREIGN KEY (`user_id`) REFERENCES `customerdetails` (`customer_id`),
  ADD CONSTRAINT `room_book` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
