-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2013 at 07:17 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

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
(44, 14, 'multiple_choice', 'H', '2013-04-13 17:14:36', '2013-04-13 17:14:36'),
(45, 15, 'multiple_choice', 'How Much Coffee do you drink?', '2013-04-13 17:23:56', '2013-04-13 17:23:56'),
(46, 16, 'multiple_choice', 'How Many Dogs', '2013-04-13 17:31:28', '2013-04-13 17:31:28'),
(47, 17, 'multiple_choice', 'How Much Coffee do you drink?', '2013-04-13 17:50:30', '2013-04-13 17:50:30'),
(48, 19, 'multiple_choice', 'How Many Drunks are there?', '2013-04-13 18:48:02', '2013-04-13 18:48:02'),
(49, 20, 'multiple_choice', 'How Much Coffee do you drink?', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(50, 20, 'multiple_choice', 'ssss', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(51, 20, 'multiple_choice', '<br /><b>Notice</b>:  Undefined variable: question_3 in <b>/media/sda3/Git/Advanced-Web-Final-Project/add_questions.php</b> on line <b>89</b><br />', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(52, 29, 'Multiple Choice', 'How Much Do You Hate Clowns?', '2013-04-14 13:15:23', '2013-04-14 13:15:23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;

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
(132, 44, '', '2013-04-13 17:14:37', '2013-04-13 17:14:37'),
(133, 45, '', '2013-04-13 17:23:56', '2013-04-13 17:23:56'),
(134, 45, '', '2013-04-13 17:23:56', '2013-04-13 17:23:56'),
(135, 45, '', '2013-04-13 17:23:56', '2013-04-13 17:23:56'),
(136, 45, '', '2013-04-13 17:23:56', '2013-04-13 17:23:56'),
(137, 46, '', '2013-04-13 17:31:28', '2013-04-13 17:31:28'),
(138, 46, '', '2013-04-13 17:31:28', '2013-04-13 17:31:28'),
(139, 46, '', '2013-04-13 17:31:28', '2013-04-13 17:31:28'),
(140, 46, '', '2013-04-13 17:31:28', '2013-04-13 17:31:28'),
(141, 47, '', '2013-04-13 17:50:30', '2013-04-13 17:50:30'),
(142, 47, '', '2013-04-13 17:50:30', '2013-04-13 17:50:30'),
(143, 47, '', '2013-04-13 17:50:30', '2013-04-13 17:50:30'),
(144, 47, '', '2013-04-13 17:50:30', '2013-04-13 17:50:30'),
(145, 48, '1', '2013-04-13 18:48:02', '2013-04-13 18:48:02'),
(146, 48, '2', '2013-04-13 18:48:02', '2013-04-13 18:48:02'),
(147, 48, '3', '2013-04-13 18:48:02', '2013-04-13 18:48:02'),
(148, 48, '4', '2013-04-13 18:48:02', '2013-04-13 18:48:02'),
(149, 49, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(150, 49, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(151, 49, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(152, 49, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(153, 50, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(154, 50, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(155, 50, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(156, 50, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(157, 51, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(158, 51, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(159, 51, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(160, 51, '', '2013-04-13 19:04:59', '2013-04-13 19:04:59'),
(161, 52, 'Very Much', '2013-04-14 13:15:23', '2013-04-14 13:15:23'),
(162, 52, 'Not At all', '2013-04-14 13:15:23', '2013-04-14 13:15:23'),
(163, 52, 'Somewhat', '2013-04-14 13:15:23', '2013-04-14 13:15:23'),
(164, 52, 'lol clowns', '2013-04-14 13:15:23', '2013-04-14 13:15:23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `question_types`
--

INSERT INTO `question_types` (`id`, `name`, `number_of_answers`, `date_created`, `date_update`) VALUES
(1, 'multiple_choice', 4, '2013-04-14 00:00:00', '2013-04-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `survey_id`, `ip_address`, `date_created`, `date_updated`) VALUES
(1, 20, '', NULL, NULL),
(2, 20, '127.0.0.1', NULL, NULL),
(3, 20, '127.0.0.1', '2013-04-14 12:41:10', '2013-04-14 12:41:10'),
(4, 20, '127.0.0.1', '2013-04-14 12:44:15', '2013-04-14 12:44:15'),
(5, 20, '127.0.0.1', '2013-04-14 12:44:16', '2013-04-14 12:44:16'),
(6, 20, '127.0.0.1', '2013-04-14 12:45:19', '2013-04-14 12:45:19'),
(7, 20, '127.0.0.1', '2013-04-14 12:45:42', '2013-04-14 12:45:42'),
(8, 15, '127.0.0.1', '2013-04-14 12:46:42', '2013-04-14 12:46:42'),
(9, 0, '127.0.0.1', '2013-04-14 13:01:06', '2013-04-14 13:01:06'),
(10, 0, '127.0.0.1', '2013-04-14 13:02:02', '2013-04-14 13:02:02'),
(11, 0, '127.0.0.1', '2013-04-14 13:02:52', '2013-04-14 13:02:52'),
(12, 0, '127.0.0.1', '2013-04-14 13:03:03', '2013-04-14 13:03:03'),
(13, 0, '127.0.0.1', '2013-04-14 13:03:22', '2013-04-14 13:03:22'),
(14, 0, '127.0.0.1', '2013-04-14 13:03:39', '2013-04-14 13:03:39'),
(15, 0, '127.0.0.1', '2013-04-14 13:04:07', '2013-04-14 13:04:07'),
(16, 0, '127.0.0.1', '2013-04-14 13:04:10', '2013-04-14 13:04:10'),
(17, 20, '127.0.0.1', '2013-04-14 13:07:43', '2013-04-14 13:07:43'),
(18, 20, '127.0.0.1', '2013-04-14 13:08:48', '2013-04-14 13:08:48'),
(19, 20, '127.0.0.1', '2013-04-14 13:08:53', '2013-04-14 13:08:53'),
(20, 20, '127.0.0.1', '2013-04-14 13:11:08', '2013-04-14 13:11:08'),
(21, 19, '127.0.0.1', '2013-04-14 13:11:41', '2013-04-14 13:11:41'),
(22, 19, '127.0.0.1', '2013-04-14 13:12:06', '2013-04-14 13:12:06'),
(23, 29, '127.0.0.1', '2013-04-14 13:15:28', '2013-04-14 13:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `submissions_answers`
--

CREATE TABLE IF NOT EXISTS `submissions_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_answer_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `submissions_answers`
--

INSERT INTO `submissions_answers` (`id`, `survey_id`, `submission_id`, `question_id`, `question_answer_id`, `date_created`, `date_updated`) VALUES
(1, 0, 12, 49, 149, '2013-04-13 19:29:16', '2013-04-13 19:29:16'),
(2, 0, 12, 50, 154, '2013-04-13 19:29:18', '2013-04-13 19:29:18'),
(3, 0, 12, 49, 149, '2013-04-13 19:30:08', '2013-04-13 19:30:08'),
(4, 0, 12, 50, 153, '2013-04-13 19:30:08', '2013-04-13 19:30:08'),
(5, 0, 12, 51, 157, '2013-04-13 19:30:08', '2013-04-13 19:30:08'),
(6, 0, 12, 49, 150, '2013-04-14 12:07:10', '2013-04-14 12:07:10'),
(7, 0, 12, 50, 154, '2013-04-14 12:07:10', '2013-04-14 12:07:10'),
(8, 0, 12, 51, 157, '2013-04-14 12:07:10', '2013-04-14 12:07:10'),
(9, 0, 12, 49, 149, '2013-04-14 12:38:58', '2013-04-14 12:38:58'),
(10, 0, 7, 49, 149, '2013-04-14 12:45:42', '2013-04-14 12:45:42'),
(11, 0, 8, 45, 134, '2013-04-14 12:46:42', '2013-04-14 12:46:42'),
(12, 0, 17, 49, 151, '2013-04-14 13:07:43', '2013-04-14 13:07:43'),
(13, 0, 17, 50, 153, '2013-04-14 13:07:43', '2013-04-14 13:07:43'),
(14, 0, 17, 51, 159, '2013-04-14 13:07:43', '2013-04-14 13:07:43'),
(15, 0, 18, 49, 151, '2013-04-14 13:08:48', '2013-04-14 13:08:48'),
(16, 0, 18, 50, 153, '2013-04-14 13:08:48', '2013-04-14 13:08:48'),
(17, 0, 18, 51, 159, '2013-04-14 13:08:48', '2013-04-14 13:08:48'),
(18, 0, 19, 49, 150, '2013-04-14 13:08:53', '2013-04-14 13:08:53'),
(19, 0, 19, 50, 156, '2013-04-14 13:08:53', '2013-04-14 13:08:53'),
(20, 0, 19, 51, 157, '2013-04-14 13:08:53', '2013-04-14 13:08:53'),
(21, 0, 21, 48, 145, '2013-04-14 13:11:41', '2013-04-14 13:11:41'),
(22, 19, 22, 48, 148, '2013-04-14 13:12:06', '2013-04-14 13:12:06'),
(23, 29, 23, 52, 161, '2013-04-14 13:15:28', '2013-04-14 13:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `name`, `creator_id`, `type_id`, `start_date`, `end_date`, `date_created`, `date_updated`) VALUES
(1, 'junk@scottmontgomery.ca', 0, 0, NULL, NULL, NULL, NULL),
(2, 'Scott Montgomery', 0, 0, NULL, NULL, NULL, NULL),
(3, 'junk@scottmontgomery.ca', 12, 0, NULL, NULL, NULL, NULL),
(4, 'junk@scottmontgomery.ca', 12, 0, NULL, NULL, NULL, NULL),
(5, 'junk@scottmontgomery.ca', 12, 0, NULL, NULL, NULL, NULL),
(6, 'junk@scottmontgomery.ca', 12, 0, NULL, NULL, NULL, NULL),
(7, 'junk@scottmontgomery.ca', 12, 0, NULL, NULL, NULL, NULL),
(8, 'junk@scottmontgomery.ca', 12, 0, NULL, NULL, NULL, NULL),
(9, 'Scott Montgomery', 12, 0, NULL, NULL, NULL, NULL),
(10, 'Coffee Tastes', 12, 0, NULL, NULL, NULL, NULL),
(11, 'Coffee Tastes', 12, 0, NULL, NULL, '2013-04-13 16:13:09', '2013-04-13 16:13:09'),
(12, 'Scott Montgomery', 12, 0, NULL, NULL, '2013-04-13 17:00:23', '2013-04-13 17:00:23'),
(13, 'How Much Beer', 12, 0, NULL, NULL, '2013-04-13 17:01:57', '2013-04-13 17:01:57'),
(14, 'Basketball', 12, 0, NULL, NULL, '2013-04-13 17:09:11', '2013-04-13 17:09:11'),
(15, 'junk@scottmontgomery.ca', 12, 0, NULL, NULL, '2013-04-13 17:23:49', '2013-04-13 17:23:49'),
(16, 'How Much Wood', 12, 0, NULL, NULL, '2013-04-13 17:31:18', '2013-04-13 17:31:18'),
(17, 'How Much Wood', 12, 0, NULL, NULL, '2013-04-13 17:50:22', '2013-04-13 17:50:22'),
(18, 'Scott Montgomery', 12, 0, NULL, NULL, '2013-04-13 18:25:28', '2013-04-13 18:25:28'),
(19, 'How Many Drunks', 12, 0, NULL, NULL, '2013-04-13 18:47:54', '2013-04-13 18:47:54'),
(20, 'junk@scottmontgomery.ca', 12, 0, NULL, NULL, '2013-04-13 19:04:48', '2013-04-13 19:04:48'),
(21, 'Coffee Tastes', 12, 0, NULL, NULL, '2013-04-14 11:55:21', '2013-04-14 11:55:21'),
(22, 'Coffee Tastes', 12, 0, NULL, NULL, '2013-04-14 11:55:47', '2013-04-14 11:55:47'),
(23, 'Coffee Tastes', 12, 0, NULL, NULL, '2013-04-14 11:55:57', '2013-04-14 11:55:57'),
(24, 'Coffee Tastes', 12, 0, NULL, NULL, '2013-04-14 11:59:01', '2013-04-14 11:59:01'),
(25, 'Coffee Tastes', 12, 0, '2013-01-01', '2013-01-01', '2013-04-14 12:05:13', '2013-04-14 12:05:13'),
(26, 'Coffee Tastes', 12, 1, '2013-01-01', '2013-01-01', '2013-04-14 12:50:29', '2013-04-14 12:50:29'),
(27, 'ssss', 12, 2, '2013-01-01', '2013-01-01', '2013-04-14 12:57:42', '2013-04-14 12:57:42'),
(28, 'Are You Afraid of Clowns?', 12, 1, '2013-01-01', '2013-10-01', '2013-04-14 13:14:11', '2013-04-14 13:14:11'),
(29, 'Are You Afraid of Clowns?', 12, 1, '2013-01-01', '2013-10-01', '2013-04-14 13:14:16', '2013-04-14 13:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `survey_types`
--

CREATE TABLE IF NOT EXISTS `survey_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `survey_types`
--

INSERT INTO `survey_types` (`id`, `name`, `date_created`, `date_update`) VALUES
(1, 'Multiple Choice', NULL, NULL),
(2, 'Agree or Disagree', NULL, NULL);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
