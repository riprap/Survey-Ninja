-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2013 at 11:22 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `survey_id`, `type`, `text`, `date_created`, `date_updated`) VALUES
(1, 11, 'multiple_choice', 'How Much Coffee do you drink?', '2013-04-13 16:33:50', '2013-04-13 16:33:50'),
(2, 11, 'multiple_choice', 'How Much Coffee do you drink?', '2013-04-13 16:38:12', '2013-04-13 16:38:12'),
(3, 11, 'multiple_choice', 'ssss', '2013-04-13 16:38:12', '2013-04-13 16:38:12'),
(4, 11, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_3 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>73</b><br />', '2013-04-13 16:38:12', '2013-04-13 16:38:12'),
(5, 11, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_4 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>73</b><br />', '2013-04-13 16:38:12', '2013-04-13 16:38:12'),
(6, 11, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_5 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>73</b><br />', '2013-04-13 16:38:12', '2013-04-13 16:38:12'),
(7, 11, 'multiple_choice', 'How Much Coffee do you drink?', '2013-04-13 16:41:45', '2013-04-13 16:41:45'),
(8, 11, 'multiple_choice', 'How Much Coffee do you drink?', '2013-04-13 16:41:47', '2013-04-13 16:41:47'),
(9, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_1 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>88</b><br />', '2013-04-13 16:42:05', '2013-04-13 16:42:05'),
(10, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_1 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>88</b><br />', '2013-04-13 16:43:48', '2013-04-13 16:43:48'),
(11, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_1 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>88</b><br />', '2013-04-13 16:43:52', '2013-04-13 16:43:52'),
(12, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_1 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(13, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_2 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(14, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_3 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(15, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_4 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(16, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_5 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(17, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_1 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(18, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_2 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(19, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_3 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(20, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_4 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(21, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_5 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:29', '2013-04-13 16:46:29'),
(22, 3, 'multiple_choice', 'How Much Coffee do you drink?', '2013-04-13 16:46:42', '2013-04-13 16:46:42'),
(23, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_2 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(24, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_3 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(25, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_4 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(26, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_5 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(27, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_1 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(28, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_2 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(29, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_3 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(30, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_4 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(31, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_5 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(32, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_1 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:47:16', '2013-04-13 16:47:16'),
(33, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_2 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(34, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_3 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(35, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_4 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(36, 3, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_5 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(37, 12, 'multiple_choice', 'How Much Coffee do you drink?', '2013-04-13 17:01:02', '2013-04-13 17:01:02'),
(38, 12, 'multiple_choice', 'How Much Milk do you drink?', '2013-04-13 17:01:06', '2013-04-13 17:01:06'),
(39, 12, 'multiple_choice', 'How Much Pepsi?', '2013-04-13 17:01:32', '2013-04-13 17:01:32'),
(40, 12, 'multiple_choice', 'How Much Coke?', '2013-04-13 17:01:47', '2013-04-13 17:01:47'),
(41, 13, 'multiple_choice', 'A lot ', '2013-04-13 17:02:01', '2013-04-13 17:02:01'),
(42, 13, 'multiple_choice', 'A lot ', '2013-04-13 17:03:06', '2013-04-13 17:03:06'),
(43, 13, 'multiple_choice', 'A lot ', '2013-04-13 17:03:11', '2013-04-13 17:03:11'),
(44, 14, 'multiple_choice', 'H', '2013-04-13 17:14:36', '2013-04-13 17:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE IF NOT EXISTS `question_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`id`, `question_id`, `text`, `date_created`, `date_updated`) VALUES
(1, 12, 'ss', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(2, 12, 'sss', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(3, 12, 'sss', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(4, 12, 'ssss', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(5, 13, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(6, 13, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(7, 13, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(8, 13, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(9, 14, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(10, 14, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(11, 14, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(12, 14, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(13, 15, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(14, 15, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(15, 15, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(16, 15, '', '2013-04-13 16:45:36', '2013-04-13 16:45:36'),
(17, 16, '', '2013-04-13 16:45:37', '2013-04-13 16:45:37'),
(18, 16, '', '2013-04-13 16:45:37', '2013-04-13 16:45:37'),
(19, 16, '', '2013-04-13 16:45:37', '2013-04-13 16:45:37'),
(20, 16, '', '2013-04-13 16:45:37', '2013-04-13 16:45:37'),
(21, 17, 'ss', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(22, 17, 'sss', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(23, 17, 'sss', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(24, 17, 'ssss', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(25, 18, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(26, 18, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(27, 18, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(28, 18, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(29, 19, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(30, 19, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(31, 19, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(32, 19, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(33, 20, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(34, 20, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(35, 20, '', '2013-04-13 16:46:28', '2013-04-13 16:46:28'),
(36, 20, '', '2013-04-13 16:46:29', '2013-04-13 16:46:29'),
(37, 21, '', '2013-04-13 16:46:29', '2013-04-13 16:46:29'),
(38, 21, '', '2013-04-13 16:46:29', '2013-04-13 16:46:29'),
(39, 21, '', '2013-04-13 16:46:29', '2013-04-13 16:46:29'),
(40, 21, '', '2013-04-13 16:46:29', '2013-04-13 16:46:29'),
(41, 22, '1 cup', '2013-04-13 16:46:42', '2013-04-13 16:46:42'),
(42, 22, '2 cup', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(43, 22, '3', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(44, 22, '5', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(45, 23, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(46, 23, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(47, 23, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(48, 23, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(49, 24, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(50, 24, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(51, 24, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(52, 24, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(53, 25, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(54, 25, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(55, 25, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(56, 25, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(57, 26, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(58, 26, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(59, 26, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(60, 26, '', '2013-04-13 16:46:43', '2013-04-13 16:46:43'),
(61, 27, '1 cup', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(62, 27, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(63, 27, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(64, 27, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(65, 28, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(66, 28, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(67, 28, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(68, 28, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(69, 29, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(70, 29, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(71, 29, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(72, 29, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(73, 30, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(74, 30, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(75, 30, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(76, 30, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(77, 31, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(78, 31, '', '2013-04-13 16:46:54', '2013-04-13 16:46:54'),
(79, 31, '', '2013-04-13 16:46:55', '2013-04-13 16:46:55'),
(80, 31, '', '2013-04-13 16:46:55', '2013-04-13 16:46:55'),
(81, 32, '', '2013-04-13 16:47:16', '2013-04-13 16:47:16'),
(82, 32, '', '2013-04-13 16:47:16', '2013-04-13 16:47:16'),
(83, 32, '', '2013-04-13 16:47:16', '2013-04-13 16:47:16'),
(84, 32, '', '2013-04-13 16:47:16', '2013-04-13 16:47:16'),
(85, 33, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(86, 33, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(87, 33, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(88, 33, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(89, 34, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(90, 34, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(91, 34, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(92, 34, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(93, 35, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(94, 35, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(95, 35, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(96, 35, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(97, 36, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(98, 36, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(99, 36, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(100, 36, '', '2013-04-13 16:47:17', '2013-04-13 16:47:17'),
(101, 37, '', '2013-04-13 17:01:02', '2013-04-13 17:01:02'),
(102, 37, '', '2013-04-13 17:01:03', '2013-04-13 17:01:03'),
(103, 37, '', '2013-04-13 17:01:03', '2013-04-13 17:01:03'),
(104, 37, '', '2013-04-13 17:01:03', '2013-04-13 17:01:03'),
(105, 38, '', '2013-04-13 17:01:06', '2013-04-13 17:01:06'),
(106, 38, '', '2013-04-13 17:01:06', '2013-04-13 17:01:06'),
(107, 38, '', '2013-04-13 17:01:06', '2013-04-13 17:01:06'),
(108, 38, '', '2013-04-13 17:01:06', '2013-04-13 17:01:06'),
(109, 39, '', '2013-04-13 17:01:32', '2013-04-13 17:01:32'),
(110, 39, '', '2013-04-13 17:01:32', '2013-04-13 17:01:32'),
(111, 39, '', '2013-04-13 17:01:32', '2013-04-13 17:01:32'),
(112, 39, '', '2013-04-13 17:01:32', '2013-04-13 17:01:32'),
(113, 40, '', '2013-04-13 17:01:47', '2013-04-13 17:01:47'),
(114, 40, '', '2013-04-13 17:01:47', '2013-04-13 17:01:47'),
(115, 40, '', '2013-04-13 17:01:47', '2013-04-13 17:01:47'),
(116, 40, '', '2013-04-13 17:01:47', '2013-04-13 17:01:47'),
(117, 41, '', '2013-04-13 17:02:01', '2013-04-13 17:02:01'),
(118, 41, '', '2013-04-13 17:02:01', '2013-04-13 17:02:01'),
(119, 41, '', '2013-04-13 17:02:01', '2013-04-13 17:02:01'),
(120, 41, '', '2013-04-13 17:02:02', '2013-04-13 17:02:02'),
(121, 42, '', '2013-04-13 17:03:06', '2013-04-13 17:03:06'),
(122, 42, '', '2013-04-13 17:03:06', '2013-04-13 17:03:06'),
(123, 42, '', '2013-04-13 17:03:06', '2013-04-13 17:03:06'),
(124, 42, '', '2013-04-13 17:03:06', '2013-04-13 17:03:06'),
(125, 43, '', '2013-04-13 17:03:11', '2013-04-13 17:03:11'),
(126, 43, '', '2013-04-13 17:03:11', '2013-04-13 17:03:11'),
(127, 43, '', '2013-04-13 17:03:11', '2013-04-13 17:03:11'),
(128, 43, '', '2013-04-13 17:03:11', '2013-04-13 17:03:11'),
(129, 44, '', '2013-04-13 17:14:37', '2013-04-13 17:14:37'),
(130, 44, '', '2013-04-13 17:14:37', '2013-04-13 17:14:37'),
(131, 44, '', '2013-04-13 17:14:37', '2013-04-13 17:14:37'),
(132, 44, '', '2013-04-13 17:14:37', '2013-04-13 17:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE IF NOT EXISTS `question_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number_of_answers` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `survey_type` varchar(255) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `name`, `creator_id`, `survey_type`, `start_date`, `end_date`, `date_created`, `date_updated`) VALUES
(1, 'junk@scottmontgomery.ca', 0, '12', NULL, NULL, NULL, NULL),
(2, 'Scott Montgomery', 0, '12', NULL, NULL, NULL, NULL),
(3, 'junk@scottmontgomery.ca', 12, 'multiple_choice', NULL, NULL, NULL, NULL),
(4, 'junk@scottmontgomery.ca', 12, 'multiple_choice', NULL, NULL, NULL, NULL),
(5, 'junk@scottmontgomery.ca', 12, 'multiple_choice', NULL, NULL, NULL, NULL),
(6, 'junk@scottmontgomery.ca', 12, 'multiple_choice', NULL, NULL, NULL, NULL),
(7, 'junk@scottmontgomery.ca', 12, 'multiple_choice', NULL, NULL, NULL, NULL),
(8, 'junk@scottmontgomery.ca', 12, 'multiple_choice', NULL, NULL, NULL, NULL),
(9, 'Scott Montgomery', 12, 'multiple_choice', NULL, NULL, NULL, NULL),
(10, 'Coffee Tastes', 12, 'multiple_choice', NULL, NULL, NULL, NULL),
(11, 'Coffee Tastes', 12, 'multiple_choice', NULL, NULL, '2013-04-13 16:13:09', '2013-04-13 16:13:09'),
(12, 'Scott Montgomery', 12, 'multiple_choice', NULL, NULL, '2013-04-13 17:00:23', '2013-04-13 17:00:23'),
(13, 'How Much Beer', 12, 'multiple_choice', NULL, NULL, '2013-04-13 17:01:57', '2013-04-13 17:01:57'),
(14, 'Basketball', 12, 'multiple_choice', NULL, NULL, '2013-04-13 17:09:11', '2013-04-13 17:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE IF NOT EXISTS `user_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
