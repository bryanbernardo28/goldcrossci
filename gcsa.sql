-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 02:51 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `account_access` tinyint(1) NOT NULL,
  `registered_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verification_code` varchar(10) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `password_code` varchar(10) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `firstname`, `lastname`, `gender`, `address`, `city`, `position`, `password`, `status`, `account_access`, `registered_at`, `updated_at`, `email`, `verification_code`, `is_verified`, `password_code`, `image`) VALUES
(77, 'Lance', 'Bernardo', 1, 'Quezon City', 'Taguig City', 'Full Stack Developer', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 1, 0, 0, 'Lancebernardo22@gmail.com', '', 1, 'gnPUzt', 'pic.jpg'),
(78, 'James ', 'Huang', 1, 'Pasig', 'Taguig City', 'Manager', '', 0, 1, 0, 0, 'jameshuang@gmail.com', '', 0, '', NULL),
(79, 'Harvey', 'Ruaro', 1, 'Pasay', 'Taguig City', 'QA', '', 1, 1, 0, 0, 'harveyruaro@gmail.com', '', 0, '', NULL),
(104, 'Bryann', 'Bernardo', 1, 'BGC', 'Taguig City', 'Manager', '3df7278b812cfea6bfa8eabfd0d7d02cb1df69dc', 0, 1, 1557678590, 0, 'bryanbernardo9828@gmail.com', 'zMaWh7', 1, '', 'IMG_16343.JPG'),
(112, 'John', 'Doe', 1, 'Manila', 'Quezon City', 'Manager', '869a98eb925962591716c3084b5e31883eddbe67', 1, 1, 1557911289, 0, 'test@gmail.com', 'N85Fze', 0, '', NULL),
(113, 'Bernadette', 'Wolowitz', 1, 'Muralla St, Intramuros', 'Metro Manila', 'Applicant', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 3, 12312312, 1572027546, 'fabianmao2@gmail.com', '', 1, '', NULL),
(127, 'Fabian', 'Montoya', 1, 'Quezon City', 'Quezon City', 'CEO', 'bb857ad2bc2bc4afd16f8b17766b16326de0e210', 1, 3, 1558071471, 1559445430, 'fabianmao@gmail.com', 'ThDxH5', 0, '', NULL),
(128, 'Jan', 'Jayson', 2, 'San Miguel', 'Metro Manila', 'HR', '15faa9ea37a6835b8775b31e2d6b0f4fd7e56b79', 1, 3, 1558976354, 1572384156, 'nicolegaspi0055@gmail.com', 'sOpkFd', 1, '', NULL),
(129, 'Nicole', 'Legaspi', 2, 'Sen. Gil Puyat Avenue', 'Manila', 'HR', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 3, 1559124817, 1572384165, 'nicolegaspi005@gmail.com', 'SHtAD0', 1, 'besqF0', 'default_avatar.png'),
(130, 'Josh Bertin', 'Bernardo', 1, '24A Angat rd Napocor Village Tandang Sora Quezon City', '', 'SECURITY OFFICER', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 2, 1576276553, 1576276553, '', 'M9jPJR', 1, '', 'default_avatar.png'),
(131, 'Bryan Kent', 'Bernardo', 1, '24A Angat rd Napocor Village Tandang Sora Quezon City', '', 'PRIVATE DETECTIVE', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 2, 1576282594, 1576282594, '', 'aDdGEK', 1, '', 'default_avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` int(11) NOT NULL,
  `applicant_personal_data` text NOT NULL,
  `applicant_education` text NOT NULL,
  `applicant_employment_record` text NOT NULL,
  `applicant_seminars_ta` text NOT NULL,
  `experience_status` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `applicant_personal_data`, `applicant_education`, `applicant_employment_record`, `applicant_seminars_ta`, `experience_status`) VALUES
(10, '{\"family_name\":\"Bernardo\",\"first_name\":\"Bryan Kent\",\"qualifier\":\"\",\"maternal_name\":\"L\",\"date_of_application\":\"11\\/10\\/2019\",\"gender\":\"Male\",\"civil_status\":\"SINGLE\",\"religion\":\"Catholic\",\"citizenship\":\"Filipino\",\"date_of_birth\":\"28\\/09\\/1998\",\"place_of_birth\":\"Manila\",\"age\":\"21\",\"height\":\"\",\"weight\":\"\",\"city_address\":\"24A Angat rd Napocor Village Tandang Sora Quezon City\",\"contact_no\":\"09063363022\",\"provincial_address\":\"\",\"security_license_no\":\"1234567\",\"expiration_date\":\"25\\/11\\/2019\",\"category\":\"PRIVATE DETECTIVE\",\"security_training\":\"\",\"service_record[]\":null}', '{\"elementary\":\"SMCQC\",\"e_course_major\":\"grade 1 to 6\",\"e_date_graduated\":\"10\\/11\\/2019\",\"highschool\":\"SMCQC\",\"h_course_major\":\"Highschool\",\"h_honor_awards\":\"\",\"h_date_graduated\":\"06\\/12\\/2019\",\"college\":\"FEU\",\"c_course_major\":\"BSITWMA\",\"c_honor_awards\":\"\",\"c_date_graduated\":\"10\\/11\\/2019\",\"post_grad\":\"\",\"pg_course_major\":\"\",\"pg_honor_awards\":\"\",\"pg_date_graduated\":\"\",\"special_course\":\"\",\"sc_course_major\":\"\",\"sc_honor_awards\":\"\",\"sc_date_graduated\":\"\",\"commendations_received\":\"\",\"nature\":\"\",\"granted_by\":\"\",\"year\":\"\",\"licensure_exams_token\":\"\",\"date_taken\":\"\",\"rating\":\"\",\"reading\":\"\",\"speaking\":\"\",\"writing\":\"\",\"machine_operated[]\":null}', '{\"name_of_company\":\"Goldcross\",\"period_from\":\"2014\",\"period_to\":\"2019\",\"salary\":\"200000\",\"position\":\"Private Detective\",\"rfl\":\"Leave\"}', '{\"topic\":\"\",\"sponsor\":\"\",\"inclusive_dates\":\"\",\"speaker\":\"\"}', 1),
(11, '{\"family_name\":\"Bernardo\",\"first_name\":\"Josh Bertin\",\"qualifier\":\"\",\"maternal_name\":\"L\",\"date_of_application\":\"11\\/10\\/2019\",\"gender\":\"Male\",\"civil_status\":\"SINGLE\",\"religion\":\"Catholic\",\"citizenship\":\"Filipino\",\"date_of_birth\":\"30\\/09\\/1998\",\"place_of_birth\":\"Manila\",\"age\":\"18\",\"height\":\"\",\"weight\":\"\",\"city_address\":\"24A Angat rd Napocor Village Tandang Sora Quezon City\",\"contact_no\":\"123456789\",\"provincial_address\":\"\",\"security_license_no\":\"21321321321\",\"expiration_date\":\"10\\/11\\/2019\",\"category\":\"SECURITY OFFICER\",\"security_training\":\"\",\"service_record[]\":null}', '{\"elementary\":\"SMCQC\",\"e_course_major\":\"Grade 1 to 6\",\"e_date_graduated\":\"10\\/11\\/2019\",\"highschool\":\"SMCQC\",\"h_course_major\":\"Highschool\",\"h_honor_awards\":\"\",\"h_date_graduated\":\"10\\/11\\/2019\",\"college\":\"FEU\",\"c_course_major\":\"IT\",\"c_honor_awards\":\"\",\"c_date_graduated\":\"10\\/11\\/2019\",\"post_grad\":\"\",\"pg_course_major\":\"\",\"pg_honor_awards\":\"\",\"pg_date_graduated\":\"\",\"special_course\":\"\",\"sc_course_major\":\"\",\"sc_honor_awards\":\"\",\"sc_date_graduated\":\"\",\"commendations_received\":\"\",\"nature\":\"\",\"granted_by\":\"\",\"year\":\"\",\"licensure_exams_token\":\"\",\"date_taken\":\"\",\"rating\":\"\",\"reading\":\"\",\"speaking\":\"\",\"writing\":\"\",\"machine_operated[]\":null}', '{\"name_of_company\":\"\",\"period_from\":\"\",\"period_to\":\"\",\"salary\":\"\",\"position\":\"\",\"rfl\":\"\"}', '{\"topic\":\"\",\"sponsor\":\"\",\"inclusive_dates\":\"\",\"speaker\":\"\"}', 2),
(12, '{\"family_name\":\"Bernardo\",\"first_name\":\"Lance Jasper\",\"qualifier\":\"\",\"maternal_name\":\"L\",\"date_of_application\":\"11\\/10\\/2019\",\"gender\":\"Male\",\"civil_status\":\"SINGLE\",\"religion\":\"Catholic\",\"citizenship\":\"Filipino\",\"date_of_birth\":\"28\\/09\\/1998\",\"place_of_birth\":\"Manila\",\"age\":\"22\",\"height\":\"5 5\",\"weight\":\"50\",\"city_address\":\"24 A Angat rd Napaocor Village Quezon City\",\"contact_no\":\"09272330522\",\"provincial_address\":\"\",\"security_license_no\":\"12321312\",\"expiration_date\":\"22\\/10\\/2019\",\"category\":\"SECURITY GUARD\",\"security_training\":\"\",\"service_record[]\":null}', '{\"elementary\":\"SMCQC\",\"e_course_major\":\"grade school\",\"e_date_graduated\":\"14\\/10\\/2019\",\"highschool\":\"SMCQC\",\"h_course_major\":\"Highschool\",\"h_honor_awards\":\"\",\"h_date_graduated\":\"14\\/10\\/2019\",\"college\":\"FEU\",\"c_course_major\":\"BSIT\",\"c_honor_awards\":\"\",\"c_date_graduated\":\"14\\/10\\/2019\",\"post_grad\":\"\",\"pg_course_major\":\"\",\"pg_honor_awards\":\"\",\"pg_date_graduated\":\"\",\"special_course\":\"\",\"sc_course_major\":\"\",\"sc_honor_awards\":\"\",\"sc_date_graduated\":\"\",\"commendations_received\":\"\",\"nature\":\"\",\"granted_by\":\"\",\"year\":\"\",\"licensure_exams_token\":\"\",\"date_taken\":\"\",\"rating\":\"\",\"reading\":\"\",\"speaking\":\"\",\"writing\":\"\",\"machine_operated[]\":null}', '{\"name_of_company\":\"Accenture\",\"period_from\":\"2014\",\"period_to\":\"2019\",\"salary\":\"25000\",\"position\":\"IT\",\"rfl\":\"\"}', '{\"topic\":\"\",\"sponsor\":\"\",\"inclusive_dates\":\"\",\"speaker\":\"\"}', 1),
(14, '{\"family_name\":\"Jayson\",\"first_name\":\"Jan Nicole\",\"qualifier\":\"\",\"maternal_name\":\"Legaspi\",\"date_of_application\":\"11\\/04\\/2019\",\"gender\":\"Female\",\"civil_status\":\"SINGLE\",\"religion\":\"Catholic\",\"citizenship\":\"Filipino\",\"date_of_birth\":\"15\\/08\\/1997\",\"place_of_birth\":\"Pasig City\",\"age\":\"22\",\"height\":\"5 3\",\"weight\":\"45\",\"city_address\":\"Pasig City\",\"contact_no\":\"0935124584\",\"provincial_address\":\"\",\"security_license_no\":\"0879846548\",\"expiration_date\":\"11\\/04\\/2019\",\"category\":\"PRIVATE DETECTIVE\",\"security_training\":\"\",\"service_record[]\":[\"MILITARY OFFICER\",\"PNP-OFFICER\",\"ROTC-BASIC\",\"MILITARY-ENLISTED\"]}', '{\"elementary\":\"Pasig Elementary\",\"e_course_major\":\"Grade 1 to 6\",\"e_date_graduated\":\"11\\/04\\/2019\",\"highschool\":\"Pasig Highschool\",\"h_course_major\":\"1st year to 4th year\",\"h_honor_awards\":\"\",\"h_date_graduated\":\"11\\/04\\/2019\",\"college\":\"FEU Institute of Technology\",\"c_course_major\":\"ITSMBA\",\"c_honor_awards\":\"\",\"c_date_graduated\":\"11\\/04\\/2019\",\"post_grad\":\"\",\"pg_course_major\":\"\",\"pg_honor_awards\":\"\",\"pg_date_graduated\":\"\",\"special_course\":\"\",\"sc_course_major\":\"\",\"sc_honor_awards\":\"\",\"sc_date_graduated\":\"\",\"commendations_received\":\"\",\"nature\":\"\",\"granted_by\":\"\",\"year\":\"\",\"licensure_exams_token\":\"\",\"date_taken\":\"\",\"rating\":\"\",\"reading\":\"\",\"speaking\":\"\",\"writing\":\"\",\"machine_operated[]\":[\"FAX MACHINE\",\"COPYING MACHINE\",\"ROTC-BASIC\",\"Type Writer\"]}', '{\"name_of_company\":\"\",\"period_from\":\"\",\"period_to\":\"\",\"salary\":\"\",\"position\":\"\",\"rfl\":\"\"}', '{\"topic\":\"\",\"sponsor\":\"\",\"inclusive_dates\":\"\",\"speaker\":\"\"}', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Ability'),
(2, 'Reliability'),
(3, 'Cooperation'),
(4, 'Leadership'),
(5, 'Responsibility'),
(6, 'Motivation'),
(7, 'Attendance'),
(8, 'General Behavior'),
(9, 'Initiative'),
(11, 'Work Attitude');

-- --------------------------------------------------------

--
-- Table structure for table `client_company`
--

CREATE TABLE `client_company` (
  `cc_company_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `cc_name` varchar(256) NOT NULL,
  `cc_added_at` int(11) NOT NULL,
  `cc_updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_company`
--

INSERT INTO `client_company` (`cc_company_id`, `account_id`, `cc_name`, `cc_added_at`, `cc_updated_at`) VALUES
(7, 113, 'The Bayleaf Hotel', 1557678590, 1572027546),
(9, 127, 'IBM Business Services', 1558056377, 1559445430),
(15, 128, 'PSA - Philippine Statistic Authority', 1558976354, 1572384156),
(16, 129, 'Mega World', 1559124817, 1572384165);

-- --------------------------------------------------------

--
-- Table structure for table `detachment`
--

CREATE TABLE `detachment` (
  `detachment_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `detachment_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detachment`
--

INSERT INTO `detachment` (`detachment_id`, `account_id`, `client_id`, `detachment_date`) VALUES
(3, 130, 16, 1576276554),
(4, 131, 9, 1576282594);

-- --------------------------------------------------------

--
-- Table structure for table `employee_company`
--

CREATE TABLE `employee_company` (
  `ec_id` int(11) NOT NULL,
  `ec_account_id` int(11) NOT NULL,
  `ec_name` varchar(256) NOT NULL,
  `ec_branch` varchar(100) NOT NULL,
  `ec_date_hired` int(11) NOT NULL,
  `ec_added_at` int(11) NOT NULL,
  `ec_updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_company`
--

INSERT INTO `employee_company` (`ec_id`, `ec_account_id`, `ec_name`, `ec_branch`, `ec_date_hired`, `ec_added_at`, `ec_updated_at`) VALUES
(1, 74, 'FEU', 'FEU Institute of Technology', 1557950787, 1557950787, 1572970765),
(2, 83, 'FEU', 'FEU MAIN', 1557950830, 1557950830, 1572970777),
(3, 81, 'FEU', 'FEU NRMF', 1557950902, 1557950902, 1572970835),
(4, 82, 'FEU', 'FEU ALABANG', 1557950925, 1557950925, 1572970959);

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `evaluation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL,
  `evaluation_summary` varchar(256) NOT NULL,
  `total_points` int(11) NOT NULL,
  `evaluation_remarks` text NOT NULL,
  `period_covered` varchar(256) NOT NULL,
  `evaluation_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`evaluation_id`, `user_id`, `rating_id`, `evaluation_summary`, `total_points`, `evaluation_remarks`, `period_covered`, `evaluation_date`) VALUES
(21, 130, 4, '{\"Ability\":\"20\",\"Reliability\":\"20\",\"Cooperation\":\"15\",\"Leadership\":\"15\",\"Responsibility\":\"20\",\"Motivation\":\"15\",\"Attendance\":\"15\",\"General Behavior\":\"15\",\"Initiative\":\"15\",\"Work Attitude\":\"15\"}', 165, 'N/A', '{\"from\":null,\"to\":1576277804}', 1576277804),
(22, 130, 2, '{\"Ability\":\"25\",\"Reliability\":\"25\",\"Cooperation\":\"15\",\"Leadership\":\"20\",\"Responsibility\":\"25\",\"Motivation\":\"20\",\"Attendance\":\"20\",\"General Behavior\":\"20\",\"Initiative\":\"20\",\"Work Attitude\":\"20\"}', 210, 'N/A', '{\"from\":null,\"to\":1576282677}', 1576282677),
(23, 131, 6, '{\"Ability\":\"25\",\"Reliability\":\"25\",\"Cooperation\":\"5\",\"Leadership\":\"5\",\"Responsibility\":\"15\",\"Motivation\":\"15\",\"Attendance\":\"10\",\"General Behavior\":\"15\",\"Initiative\":\"15\",\"Work Attitude\":\"20\"}', 150, 'N/A', '{\"from\":null,\"to\":1576283164}', 1576283164);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `quiz_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `choice1` varchar(255) NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `choice4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `score` int(255) NOT NULL,
  `remarks` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`quiz_id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`, `score`, `remarks`) VALUES
(1, '127 + 56 = ?', '174', '171', '183', '185', '183', 0, 0),
(2, '163 - 87 = ?', '54', '74', '76', '86', '86', 0, 0),
(3, '79 + 36 = ?', '124', '116', '114', '115', '115', 0, 0),
(4, '91/7=?', '12', '15', '13', '17', '13', 0, 0),
(5, '153*6=?', '918', '858', '868', '921', '918', 0, 0),
(6, '34*7 = ?', '237', '238', '338', '239', '238', 0, 0),
(7, '576/6 = ?', '91', '86', '84', '96', '96', 0, 0),
(8, '46-27 = ?', '29', '16', '19', '17', '19', 0, 0),
(9, '55+70 = ?', '134', '125', '135', '136', '125', 0, 0),
(10, '11*4 = ?', '158', '138', '154', '164', '154', 0, 0),
(11, 'pacify: Appease - oust: ?', 'resort', 'shift', 'eject', 'accept', 'eject ', 0, 0),
(12, 'huge: large - minute: ?', 'short', 'big', 'tiny', 'plump ', 'tiny', 0, 0),
(13, 'equalize: balance - match: ?', 'mate', 'copy', 'even', 'couple ', 'even', 0, 0),
(14, 'productive: fertile - enthusiastic:?', 'relectuant', 'lazy', 'busy', 'active', 'active', 0, 0),
(15, 'abandon: desert - cherish: ?', 'value', 'kindness', 'obedience', 'politeness', 'value', 0, 0),
(16, 'praise: criticize - enjoy: ?', 'deplore', 'degrade', 'depress', 'deprive', 'depress', 0, 0),
(17, 'tense: relax - bewilder: ?', 'disturb', 'enlighten', 'perplex', 'concentrate', 'enlighten', 0, 0),
(18, 'difficulty: ease - jeopardy: ?', 'caution', 'harmless', 'safety', 'inertia', 'safety', 0, 0),
(19, 'affluent: deprived - partially: ?', 'fairness', 'injustice', 'favoritism', 'generosity ', 'fairness', 0, 0),
(20, 'ambiguous: clear - tedious: ?', 'hard', 'difficult', 'light', 'varied', 'light', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(256) NOT NULL,
  `job_requirements` text NOT NULL,
  `job_vacancy` int(11) NOT NULL,
  `job_date_added` int(11) NOT NULL,
  `job_date_updated` int(11) NOT NULL,
  `job_posted` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_name`, `job_requirements`, `job_vacancy`, `job_date_added`, `job_date_updated`, `job_posted`) VALUES
(8, 'Licensed Lady Guards/cctv operations', 'Height : 5\'3 above; At least college level; confident and can speak english; With pleasing personality; Work experience not necessary but preferably attentive to details; Age rage bet 20-34 year old', 10, 1558071543, 1571779988, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_performance`
--

CREATE TABLE `job_performance` (
  `jp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jp_evaluator` varchar(56) NOT NULL,
  `jp_position` int(11) NOT NULL,
  `jp_attempt` varchar(256) NOT NULL,
  `jp_from` int(11) NOT NULL,
  `jp_to` int(11) NOT NULL,
  `jp_evaluation_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_performance`
--

INSERT INTO `job_performance` (`jp_id`, `user_id`, `jp_evaluator`, `jp_position`, `jp_attempt`, `jp_from`, `jp_to`, `jp_evaluation_date`) VALUES
(52, 130, 'Nicole Legaspi', 0, '{\"q1\":{\"rate\":\"3\",\"attempt\":1},\"q2\":{\"rate\":\"3\",\"attempt\":1},\"q3\":{\"rate\":\"3\",\"attempt\":1},\"q4\":{\"rate\":\"3\",\"attempt\":1},\"q5\":{\"rate\":\"2\",\"attempt\":1},\"q6\":{\"rate\":\"2\",\"attempt\":1},\"q9\":{\"rate\":\"2\",\"attempt\":1}}', 1576277289, 1576277289, 1576277289);

-- --------------------------------------------------------

--
-- Table structure for table `jp_offense`
--

CREATE TABLE `jp_offense` (
  `jp_offense_id` int(11) NOT NULL,
  `jp_offense_attempt` int(11) NOT NULL,
  `jp_offense_qnumber` int(11) NOT NULL,
  `pe_category_id` int(11) NOT NULL,
  `jp_offense_name` varchar(100) NOT NULL,
  `jp_offense_rate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jp_offense`
--

INSERT INTO `jp_offense` (`jp_offense_id`, `jp_offense_attempt`, `jp_offense_qnumber`, `pe_category_id`, `jp_offense_name`, `jp_offense_rate`) VALUES
(125, 1, 1, 1, '[\"warning\"]', '[0,1,2]'),
(126, 2, 1, 1, '[\"2nd attempt\"]', '[0,1,2]'),
(127, 3, 1, 1, '[\"3rd attempt\"]', '[0,1,2]'),
(128, 4, 1, 1, '[\"4th attempt\"]', '[0,1,2]'),
(129, 1, 2, 1, '[\"warning\"]', '[0,1,2]'),
(130, 2, 2, 1, '[\"2nd attempt\"]', '[0,1,2]'),
(131, 3, 2, 1, '[\"3rd attempt\"]', '[0,1,2]'),
(132, 4, 2, 1, '[\"4th attempt\"]', '[0,1,2]'),
(133, 1, 3, 1, '[\"warning\"]', '[0,1,2]'),
(134, 2, 3, 1, '[\"2nd attempt\"]', '[0,1,2]'),
(135, 3, 3, 1, '[\"3rd attempt\"]', '[0,1,2]'),
(136, 4, 3, 1, '[\"4th attempt\"]', '[0,1,2]'),
(137, 1, 4, 1, '[\"warning\"]', '[0,1,2]'),
(138, 2, 4, 1, '[\"2nd attempt\"]', '[0,1,2]'),
(139, 3, 4, 1, '[\"3rd attempt\"]', '[0,1,2]'),
(140, 4, 4, 1, '[\"4th attempt\"]', '[0,1,2]'),
(141, 1, 6, 3, '[\"warning\"]', '[0,1,2]'),
(142, 2, 6, 3, '[\"2nd offense\"]', '[0,1,2]'),
(143, 3, 6, 3, '[\"3rd offense\"]', '[0,1,2]'),
(144, 4, 6, 3, '[\"4th offense\"]', '[0,1,2]'),
(149, 1, 9, 6, '[\"warning\"]', '[0,1,2]'),
(150, 2, 9, 6, '[\"2nd warning\",\"2nd offense\"]', '[0,1,2]'),
(151, 3, 9, 6, '[\"3rd warning\",\"3rd offense\"]', '[0,1,2]'),
(152, 4, 9, 6, '[\"4th offense\",\"terminate\"]', '[0,1,2]'),
(157, 1, 5, 2, '[\"warning\"]', '[0,1,2]'),
(158, 2, 5, 2, '[\"2nd attempt\"]', '[0,1,2]'),
(159, 3, 5, 2, '[\"3rd attempt\"]', '[0,1,2]'),
(160, 4, 5, 2, '[\"terminate\",\"4th attempt\"]', '[0,1,2]');

-- --------------------------------------------------------

--
-- Table structure for table `jp_offense_attempt`
--

CREATE TABLE `jp_offense_attempt` (
  `jp_offense_attempt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `personnel_evaluation_questions_id` int(11) NOT NULL,
  `jp_offense_attempt_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jp_offense_attempt`
--

INSERT INTO `jp_offense_attempt` (`jp_offense_attempt_id`, `user_id`, `personnel_evaluation_questions_id`, `jp_offense_attempt_rate`) VALUES
(1, 74, 1, 3),
(2, 74, 2, 3),
(3, 74, 3, 3),
(4, 74, 4, 3),
(5, 74, 5, 3),
(6, 74, 6, 2),
(7, 74, 7, 2),
(8, 74, 1, 3),
(9, 74, 2, 3),
(10, 74, 3, 3),
(11, 74, 4, 3),
(12, 74, 5, 2),
(13, 74, 6, 2),
(14, 74, 7, 2),
(15, 74, 1, 3),
(16, 74, 2, 3),
(17, 74, 3, 3),
(18, 74, 4, 3),
(19, 74, 5, 2),
(20, 74, 6, 2),
(21, 74, 7, 2),
(22, 74, 1, 3),
(23, 74, 2, 2),
(24, 74, 3, 3),
(25, 74, 4, 2),
(26, 74, 5, 3),
(27, 74, 6, 2),
(28, 74, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `merit_rating_basis`
--

CREATE TABLE `merit_rating_basis` (
  `merit_rating_basis_id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL,
  `increase` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merit_rating_basis`
--

INSERT INTO `merit_rating_basis` (`merit_rating_basis_id`, `rating_id`, `increase`) VALUES
(1, 1, '20'),
(2, 2, '15'),
(3, 3, '12'),
(4, 4, '10'),
(5, 5, '8'),
(6, 6, '5'),
(7, 7, '2'),
(8, 8, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `personnel_evaluation_category`
--

CREATE TABLE `personnel_evaluation_category` (
  `personnel_evaluation_category_id` int(11) NOT NULL,
  `personnel_evaluation_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel_evaluation_category`
--

INSERT INTO `personnel_evaluation_category` (`personnel_evaluation_category_id`, `personnel_evaluation_category_name`) VALUES
(1, 'Policy Enforcement'),
(2, 'Consultation'),
(3, 'Safety'),
(6, 'Administration');

-- --------------------------------------------------------

--
-- Table structure for table `personnel_evaluation_questions`
--

CREATE TABLE `personnel_evaluation_questions` (
  `personnel_evaluation_questions_id` int(11) NOT NULL,
  `personnel_evaluation_category_id` int(11) NOT NULL,
  `personnel_evaluation_questions_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel_evaluation_questions`
--

INSERT INTO `personnel_evaluation_questions` (`personnel_evaluation_questions_id`, `personnel_evaluation_category_id`, `personnel_evaluation_questions_content`) VALUES
(1, 1, 'Monitors and performs all area of responsibility.'),
(2, 1, 'Enforce client policies and procedures accordingly.asd'),
(3, 1, 'Writes effective reports such as incident/spot reports and other documentation.'),
(4, 1, 'Participates actively on events, instructions and requirements of the client.'),
(5, 2, 'Works cooperatively with the agency, client and/or local authorities for information'),
(6, 3, 'Operates all equipment including firearms according to established safety procedures '),
(9, 6, 'Compiles,maintains and files all physical and computerized reports, records and document required, incident reports, investigation reports and activity reports.');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `question_points` int(11) NOT NULL,
  `question_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `category_id`, `question_number`, `question_points`, `question_name`) VALUES
(1, 1, 1, 10, 'Fair, Rarely applies his/her ability.'),
(2, 1, 2, 15, 'Knows his/her job well but does not always apply his/her job.'),
(3, 1, 3, 20, 'Capable, high degree of skillsand knowledge.'),
(4, 1, 4, 25, 'Extremely capable, Excellent Ability.'),
(5, 2, 1, 10, 'Unreliable. Let you down too often.'),
(6, 2, 2, 15, 'Reliable most of the time but occasionally lets you down.'),
(7, 2, 3, 20, 'Reliable and rarely makes mistakes, Rarely lets you down.'),
(8, 2, 4, 25, 'Very relliable under the most difficult situations.'),
(9, 3, 1, 5, 'Cooperates most of the time but at times tends to be not cooperative.'),
(10, 3, 2, 10, 'Good. Gives and gets good cooperation. A good team.'),
(11, 3, 3, 15, 'Gives excellent cooperation and is very good in getting the job done.'),
(12, 4, 1, 5, 'Not a good leader. Has difficulty in getting the best of him/her.'),
(13, 4, 2, 10, 'A good leader but ocassioally requires guidance to be a leader.'),
(14, 4, 3, 15, 'Dependable Leader. Good motivator'),
(15, 4, 4, 20, 'Excellent Leader. Obtains the very best people.e'),
(16, 5, 1, 10, 'Unwilling to accept responsibility if possible.'),
(17, 5, 2, 15, 'Not a good leader. Has difficulty in getting the best of him/her.'),
(18, 5, 3, 20, 'Accepts his/her present responsibilities willinglyand carries them out satisfactorily'),
(19, 5, 4, 25, 'Exceptionally responsible. willing to accept more responsibility.'),
(20, 6, 1, 5, 'Not very motivated. Is not good at motivating others as he/she should be.'),
(21, 6, 2, 10, 'Motivate most of the time. Could motivate himself and others.'),
(22, 6, 3, 15, 'Well motivated and is able in motivating others.'),
(23, 6, 4, 20, 'Very Motivated and is excellent at motivating others.'),
(24, 7, 1, 5, 'Quite often absent. Quite often late.'),
(25, 7, 2, 10, 'Occasionally absent or late.'),
(26, 7, 3, 15, 'Good attendance. Not often absent or late.'),
(27, 7, 4, 20, 'Excellent Attendance. Rarely absent or late.'),
(28, 8, 1, 5, 'Unsatisfactory. Falls short on required standard.'),
(29, 8, 2, 10, 'Behaves satisfactorily most of the time.'),
(30, 8, 3, 15, 'Good. Well behaved and cooperative.'),
(31, 8, 4, 20, 'Excellent. Nevercauses touble. Gives full cooperation.'),
(32, 9, 1, 5, 'Not very motivated. Is not good at motivating others as he/she should be.'),
(33, 9, 2, 10, 'Motivate most of the time. Could motivate himself and others.'),
(34, 9, 3, 15, 'Well motivated and is able in motivating others.'),
(35, 9, 4, 20, 'Very Motivated and is excellent at motivating others.'),
(40, 11, 1, 5, 'Is oftern indifferent to instructions and criticisms. Shows no willingness to improve.'),
(41, 11, 2, 10, 'Shows normal interest in his job. all that is ordinarily expected.'),
(42, 11, 3, 15, 'Has open mind of instruction and criticism. is very enthusiastic about his job.'),
(43, 11, 4, 20, 'Extraordinary enthusiastic about his job. Takes pride in all his/her assignments.');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating_adjective` varchar(20) NOT NULL,
  `rating_numerical` varchar(20) NOT NULL,
  `rating_descriptive` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `rating_adjective`, `rating_numerical`, `rating_descriptive`) VALUES
(1, 'A+', '[215]', 'Par Excellent'),
(2, 'A', '[205,210]', 'Excellent'),
(3, 'B+', '[195,200]', 'Very Superior'),
(4, 'B', '[165,190]', 'Superior'),
(5, 'C+', '[155,160]', 'Above Average'),
(6, 'C', '[145,150]', 'High Average'),
(7, 'D+', '[115,140]', 'Average'),
(8, 'D', '[110]', 'Poor');

-- --------------------------------------------------------

--
-- Table structure for table `rating_points`
--

CREATE TABLE `rating_points` (
  `rating_points_id` int(11) NOT NULL,
  `rating_points_letter` varchar(5) NOT NULL,
  `rating_points_title` varchar(100) NOT NULL,
  `rating_points_value` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_points`
--

INSERT INTO `rating_points` (`rating_points_id`, `rating_points_letter`, `rating_points_title`, `rating_points_value`) VALUES
(4, 'A', 'Ability', '{\"1\":\"10\",\"2\":\"15\",\"3\":\"20\",\"4\":\"25\"}'),
(5, 'B', 'Reliability', '{\"1\":\"10\",\"2\":\"15\",\"3\":\"20\",\"4\":\"25\"}'),
(6, 'C', 'Cooperation', '{\"1\":\"5\",\"2\":\"10\",\"3\":\"15\",\"4\":\"20\"}'),
(7, 'D', 'Leadership', '{\"1\":\"5\",\"2\":\"10\",\"3\":\"15\",\"4\":\"20\"}'),
(8, 'E', 'Responsibility', '{\"1\":\"10\",\"2\":\"15\",\"3\":\"20\",\"4\":\"25\"}'),
(9, 'F', 'Motivation', '{\"1\":\"5\",\"2\":\"10\",\"3\":\"15\",\"4\":\"20\"}'),
(10, 'G', 'Attendance', '{\"1\":\"5\",\"2\":\"10\",\"3\":\"15\",\"4\":\"20\"}'),
(11, 'H', 'General Behavior', '{\"1\":\"5\",\"2\":\"10\",\"3\":\"15\",\"4\":\"20\"}'),
(12, 'I', 'Initiative', '{\"1\":\"5\",\"2\":\"10\",\"3\":\"15\",\"4\":\"20\"}'),
(13, 'J', 'Work Attitude', '{\"1\":\"5\",\"2\":\"10\",\"3\":\"15\",\"4\":\"20\"}');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `remarks_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `remarks` varchar(10) NOT NULL,
  `remarks_hired` tinyint(4) NOT NULL DEFAULT '0',
  `date_exam` int(11) NOT NULL,
  `date_hired` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`remarks_id`, `account_id`, `score`, `remarks`, `remarks_hired`, `date_exam`, `date_hired`) VALUES
(7, 10, 60, 'Passed', 2, 1573000529, 1573001827),
(8, 11, 20, 'Failed', 2, 1576270999, 1576271040);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int(11) NOT NULL,
  `w_sms_content_passed` text NOT NULL,
  `wo_sms_content_passed` text NOT NULL,
  `w_sms_content_failed` text NOT NULL,
  `wo_sms_content_failed` text NOT NULL,
  `sms_created_date` int(11) NOT NULL,
  `sms_updated_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_id`, `w_sms_content_passed`, `wo_sms_content_passed`, `w_sms_content_failed`, `wo_sms_content_failed`, `sms_created_date`, `sms_updated_date`) VALUES
(1, 'This is a text message from goldcross with experience (Passed).', 'This is a text message from goldcross Without experience (Passed).', 'with experience (Failed)', 'This is a text message from goldcross Without experience (Failed).', 1575336028, 1575871318);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client_company`
--
ALTER TABLE `client_company`
  ADD PRIMARY KEY (`cc_company_id`);

--
-- Indexes for table `detachment`
--
ALTER TABLE `detachment`
  ADD PRIMARY KEY (`detachment_id`);

--
-- Indexes for table `employee_company`
--
ALTER TABLE `employee_company`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`evaluation_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_performance`
--
ALTER TABLE `job_performance`
  ADD PRIMARY KEY (`jp_id`);

--
-- Indexes for table `jp_offense`
--
ALTER TABLE `jp_offense`
  ADD PRIMARY KEY (`jp_offense_id`);

--
-- Indexes for table `jp_offense_attempt`
--
ALTER TABLE `jp_offense_attempt`
  ADD PRIMARY KEY (`jp_offense_attempt_id`);

--
-- Indexes for table `merit_rating_basis`
--
ALTER TABLE `merit_rating_basis`
  ADD PRIMARY KEY (`merit_rating_basis_id`);

--
-- Indexes for table `personnel_evaluation_category`
--
ALTER TABLE `personnel_evaluation_category`
  ADD PRIMARY KEY (`personnel_evaluation_category_id`);

--
-- Indexes for table `personnel_evaluation_questions`
--
ALTER TABLE `personnel_evaluation_questions`
  ADD PRIMARY KEY (`personnel_evaluation_questions_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `rating_points`
--
ALTER TABLE `rating_points`
  ADD PRIMARY KEY (`rating_points_id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`remarks_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_company`
--
ALTER TABLE `client_company`
  MODIFY `cc_company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detachment`
--
ALTER TABLE `detachment`
  MODIFY `detachment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_company`
--
ALTER TABLE `employee_company`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_performance`
--
ALTER TABLE `job_performance`
  MODIFY `jp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `jp_offense`
--
ALTER TABLE `jp_offense`
  MODIFY `jp_offense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `jp_offense_attempt`
--
ALTER TABLE `jp_offense_attempt`
  MODIFY `jp_offense_attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `merit_rating_basis`
--
ALTER TABLE `merit_rating_basis`
  MODIFY `merit_rating_basis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personnel_evaluation_category`
--
ALTER TABLE `personnel_evaluation_category`
  MODIFY `personnel_evaluation_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personnel_evaluation_questions`
--
ALTER TABLE `personnel_evaluation_questions`
  MODIFY `personnel_evaluation_questions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating_points`
--
ALTER TABLE `rating_points`
  MODIFY `rating_points_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `remarks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
