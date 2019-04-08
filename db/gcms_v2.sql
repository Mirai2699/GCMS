-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 05:09 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcms_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_academic_year`
--

CREATE TABLE `r_academic_year` (
  `acadyr_ID` int(10) NOT NULL,
  `acadyr_start_year` year(4) NOT NULL,
  `acadyr_end_year` year(4) NOT NULL,
  `acadyr_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acadyr_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acadyr_active_flag` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_academic_year`
--

INSERT INTO `r_academic_year` (`acadyr_ID`, `acadyr_start_year`, `acadyr_end_year`, `acadyr_add_date`, `acadyr_mod_date`, `acadyr_active_flag`) VALUES
(1, 2018, 2019, '2018-12-24 10:30:59', '2018-12-24 10:45:47', 'Active'),
(2, 2019, 2020, '2019-01-03 15:35:24', '2019-01-03 15:35:24', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `r_appointment_type`
--

CREATE TABLE `r_appointment_type` (
  `app_ID` int(10) NOT NULL,
  `app_desc` varchar(50) NOT NULL,
  `app_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_active_flag` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_appointment_type`
--

INSERT INTO `r_appointment_type` (`app_ID`, `app_desc`, `app_add_date`, `app_mod_date`, `app_active_flag`) VALUES
(1, 'Walk-In', '2018-12-26 14:04:07', '2018-12-26 14:04:07', 'Active'),
(2, 'Referral', '2019-01-02 14:02:25', '2019-01-02 14:02:25', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `r_counsel_type`
--

CREATE TABLE `r_counsel_type` (
  `ct_ID` int(10) NOT NULL,
  `ct_desc` varchar(255) NOT NULL,
  `ct_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ct_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ct_active_flag` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_counsel_type`
--

INSERT INTO `r_counsel_type` (`ct_ID`, `ct_desc`, `ct_add_date`, `ct_mod_date`, `ct_active_flag`) VALUES
(1, 'Behavior Theraphy', '2018-12-22 18:31:56', '2018-12-22 18:48:27', 'Active'),
(2, 'Cognitive Theraphy', '2018-12-22 18:33:07', '2018-12-22 18:33:07', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `r_courses`
--

CREATE TABLE `r_courses` (
  `course_ID` int(10) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_active_flag` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_courses`
--

INSERT INTO `r_courses` (`course_ID`, `course_code`, `course_name`, `course_add_date`, `course_mod_date`, `course_active_flag`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', '2018-12-22 15:19:13', '2018-12-22 16:15:35', 'Active'),
(2, 'BSBA-MM', 'Bachelor of Science in Business Administration - Major in Marketing Management', '2018-12-22 15:45:30', '2018-12-22 15:45:30', 'Active'),
(3, 'BSBA-HRDM', 'Bachelor of Science in Business Administration - Major in Human Resource and Development Management', '2019-04-03 08:25:48', '2019-04-03 08:25:48', 'Active'),
(4, 'BBTE', 'Bachelor of Business in Teaching Education ', '2019-04-03 08:26:29', '2019-04-03 08:26:29', 'Active'),
(5, 'BSENT', 'Bachelor of Science in Entrepreneurship', '2019-04-03 08:26:57', '2019-04-03 08:26:57', 'Active'),
(6, 'DOMT', 'Diploma in Office Management Technology', '2019-04-03 08:29:28', '2019-04-03 08:29:28', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `r_document_type`
--

CREATE TABLE `r_document_type` (
  `dt_ID` int(10) NOT NULL,
  `dt_desc` varchar(255) NOT NULL,
  `dt_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_active_flag` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_document_type`
--

INSERT INTO `r_document_type` (`dt_ID`, `dt_desc`, `dt_add_date`, `dt_mod_date`, `dt_active_flag`) VALUES
(1, 'Certificate of Good Moral', '2018-12-22 20:13:24', '2018-12-22 20:13:38', 'Active'),
(2, 'Recommendation letter', '2019-01-18 10:39:13', '2019-01-18 10:39:13', 'Active'),
(3, 'General Clearance', '2019-04-03 08:30:21', '2019-04-03 08:30:21', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `r_semester`
--

CREATE TABLE `r_semester` (
  `sem_ID` int(10) NOT NULL,
  `sem_desc` varchar(255) NOT NULL,
  `sem_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sem_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sem_active_flag` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_semester`
--

INSERT INTO `r_semester` (`sem_ID`, `sem_desc`, `sem_add_date`, `sem_mod_date`, `sem_active_flag`) VALUES
(1, 'First Semester', '2018-12-22 20:28:06', '2018-12-22 20:28:06', 'Active'),
(2, 'Second Semester', '2018-12-22 20:30:17', '2018-12-22 20:31:20', 'Inactive'),
(3, 'Third Semester', '2018-12-22 20:30:29', '2018-12-22 20:30:29', 'Inactive'),
(4, 'Fourth Semester', '2018-12-22 20:33:16', '2018-12-22 20:33:16', 'Inactive'),
(5, 'Summer Semester', '2018-12-22 20:33:26', '2018-12-22 20:33:26', 'Inactive'),
(6, 'Second Semester', '2019-04-03 08:30:40', '2019-04-03 08:30:40', 'Active'),
(7, 'Third Semester', '2019-04-03 08:30:50', '2019-04-03 08:30:50', 'Active'),
(8, 'Fourth Semester', '2019-04-03 08:31:02', '2019-04-03 08:31:02', 'Active'),
(9, 'Fifth Semester', '2019-04-03 08:31:11', '2019-04-03 08:31:11', 'Active'),
(10, 'Summer Semester', '2019-04-03 08:31:23', '2019-04-03 08:31:23', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `r_user_role`
--

CREATE TABLE `r_user_role` (
  `usr_ID` int(10) NOT NULL,
  `usr_desc` varchar(50) NOT NULL,
  `usr_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_active_flag` varchar(15) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_user_role`
--

INSERT INTO `r_user_role` (`usr_ID`, `usr_desc`, `usr_add_date`, `usr_mod_date`, `usr_active_flag`) VALUES
(1, 'Administrator', '2018-12-22 20:45:40', '2018-12-22 20:45:40', 'Active'),
(2, 'Counselor', '2018-12-22 20:45:40', '2018-12-24 10:20:11', 'Active'),
(3, 'Student Assistant', '2018-12-22 20:59:12', '2018-12-22 20:59:12', 'Active'),
(6, 'Super-User', '2019-01-03 15:34:11', '2019-01-03 15:34:11', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `r_visit_type`
--

CREATE TABLE `r_visit_type` (
  `vt_ID` int(10) NOT NULL,
  `vt_desc` varchar(255) NOT NULL,
  `vt_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vt_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vt_active_flag` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_visit_type`
--

INSERT INTO `r_visit_type` (`vt_ID`, `vt_desc`, `vt_add_date`, `vt_mod_date`, `vt_active_flag`) VALUES
(1, 'For Counseling', '2018-12-22 19:01:58', '2018-12-22 19:02:51', 'Active'),
(2, 'Clearance Signing', '2018-12-22 19:03:22', '2018-12-22 19:03:22', 'Active'),
(3, 'Requirement Submission', '2019-04-03 08:29:57', '2019-04-03 08:29:57', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `t_accounts`
--

CREATE TABLE `t_accounts` (
  `acc_ID` int(10) NOT NULL,
  `acc_username` varchar(100) NOT NULL,
  `acc_password` varchar(100) NOT NULL,
  `acc_user_role` int(10) NOT NULL,
  `acc_picture` varchar(255) DEFAULT 'default.png',
  `acc_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acc_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acc_active_flag` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_accounts`
--

INSERT INTO `t_accounts` (`acc_ID`, `acc_username`, `acc_password`, `acc_user_role`, `acc_picture`, `acc_add_date`, `acc_mod_date`, `acc_active_flag`) VALUES
(1, 'admin', 'admin', 1, 'default.png', '2018-12-24 11:36:14', '2018-12-24 11:36:14', 'Active'),
(2, 'guidance', 'password', 2, '', '2018-12-24 11:36:14', '2018-12-26 11:03:01', 'Active'),
(3, 'Cristian_Balatbat', 'cristian', 3, NULL, '2018-12-24 13:04:03', '2018-12-24 13:04:03', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `t_counseling_group`
--

CREATE TABLE `t_counseling_group` (
  `CG_ID` int(10) NOT NULL,
  `CG_code` varchar(200) NOT NULL,
  `CG_couns_date` int(10) NOT NULL,
  `CG_couns_type` int(10) NOT NULL,
  `CG_nature_case` varchar(200) NOT NULL,
  `CG_background` varchar(200) NOT NULL,
  `CG_goals` varchar(200) NOT NULL,
  `CG_comments` varchar(200) NOT NULL,
  `CG_recommendation` varchar(200) NOT NULL,
  `CG_remarks` varchar(150) DEFAULT NULL,
  `CG_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CG_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_counseling_group`
--

INSERT INTO `t_counseling_group` (`CG_ID`, `CG_code`, `CG_couns_date`, `CG_couns_type`, `CG_nature_case`, `CG_background`, `CG_goals`, `CG_comments`, `CG_recommendation`, `CG_remarks`, `CG_add_date`, `CG_active_flag`) VALUES
(1, 'GC-1', 2019, 1, 'Nture', 'background', 'goals', 'comments', 'recomm', 'remarks', '2019-01-02 14:24:49', 'Show'),
(2, 'GC-2', 2019, 2, 'Grabe', 'Family Probs', 'Seminar', 'alaws', 'gesi', 'alaws', '2019-01-02 14:26:17', 'Show'),
(3, 'GC-3', 2019, 1, 'pasaway', 'gabo1', 'gabo2', 'gabo3', 'gabo4', 'gabo5', '2019-01-03 15:23:24', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_counseling_group_stud_ref`
--

CREATE TABLE `t_counseling_group_stud_ref` (
  `GSR_ID` int(10) NOT NULL,
  `GSR_CG_ID` int(10) NOT NULL,
  `GSR_student_ref` varchar(200) NOT NULL,
  `GSR_appoint_type` int(10) NOT NULL,
  `GSR_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `GSR_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_counseling_group_stud_ref`
--

INSERT INTO `t_counseling_group_stud_ref` (`GSR_ID`, `GSR_CG_ID`, `GSR_student_ref`, `GSR_appoint_type`, `GSR_add_date`, `GSR_active_flag`) VALUES
(3, 1, '2015-00111-CM-0', 1, '2019-01-02 14:24:49', 'Show'),
(4, 2, '2015-00111-CM-0', 2, '2019-01-02 14:26:17', 'Show'),
(5, 2, '2015-00193-CM-0', 1, '2019-01-02 14:26:17', 'Show'),
(6, 3, '2015-00075-CM-0', 1, '2019-01-03 15:23:24', 'Show'),
(7, 3, '2015-00193-CM-0', 1, '2019-01-03 15:23:24', 'Show'),
(8, 3, '2015-00111-CM-0', 1, '2019-01-03 15:23:24', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_counseling_individual`
--

CREATE TABLE `t_counseling_individual` (
  `CI_ID` int(10) NOT NULL,
  `CI_code` varchar(200) NOT NULL,
  `CI_vs_ID` int(10) NOT NULL,
  `CI_student_ref` varchar(20) NOT NULL,
  `CI_couns_date` date NOT NULL,
  `CI_couns_type` int(10) NOT NULL,
  `CI_appoint_type` int(10) NOT NULL,
  `CI_nature_case` varchar(200) NOT NULL,
  `CI_background` varchar(200) NOT NULL,
  `CI_goals` varchar(200) NOT NULL,
  `CI_comments` varchar(200) NOT NULL,
  `CI_recommendation` varchar(200) NOT NULL,
  `CI_remarks` varchar(150) DEFAULT NULL,
  `CI_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CI_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_counseling_individual`
--

INSERT INTO `t_counseling_individual` (`CI_ID`, `CI_code`, `CI_vs_ID`, `CI_student_ref`, `CI_couns_date`, `CI_couns_type`, `CI_appoint_type`, `CI_nature_case`, `CI_background`, `CI_goals`, `CI_comments`, `CI_recommendation`, `CI_remarks`, `CI_add_date`, `CI_active_flag`) VALUES
(6, 'IC-1', 1, '2015-00193-CM-0', '2019-01-01', 2, 1, 'ewan', 'ewan', 'ewan', 'ewan', 'ewan', 'ewan', '2019-01-01 15:57:29', 'Show'),
(7, 'IC-7', 2, '2015-00111-CM-0', '2019-01-01', 1, 1, 'problematic', 'family problem', 'therapy', 'wala naman', 'paggaling sya', 'none', '2019-01-01 21:33:58', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_files_upload`
--

CREATE TABLE `t_files_upload` (
  `file_ID` int(10) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_uploadby` varchar(50) NOT NULL,
  `file_docu_type` int(10) NOT NULL,
  `file_rel_type` varchar(20) NOT NULL,
  `file_filepath` varchar(255) NOT NULL,
  `file_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_active_flag` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_files_upload`
--

INSERT INTO `t_files_upload` (`file_ID`, `file_name`, `file_uploadby`, `file_docu_type`, `file_rel_type`, `file_filepath`, `file_add_date`, `file_active_flag`) VALUES
(1, 'grades', 'guidance', 1, 'Printable', 'Grades.docx', '2018-12-27 23:03:55', 'Active'),
(2, 'DL of Cristian', 'guidance', 1, 'Confidential', 'Drivers license.docx', '2018-12-27 23:07:44', 'Active'),
(3, 'BSIT OJT Recom Letter', 'Cristian_Balatbat', 2, 'Printable', 'BSIT recom-letter (latest 2018).docx', '2019-01-18 10:39:42', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_batch_rec`
--

CREATE TABLE `t_stud_batch_rec` (
  `batch_ID` int(10) NOT NULL,
  `batch_student` varchar(50) NOT NULL,
  `batch_year` varchar(20) NOT NULL,
  `batch_stud_stat` varchar(30) NOT NULL,
  `batch_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `batch_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `batch_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stud_batch_rec`
--

INSERT INTO `t_stud_batch_rec` (`batch_ID`, `batch_student`, `batch_year`, `batch_stud_stat`, `batch_add_date`, `batch_mod_date`, `batch_active_flag`) VALUES
(1, '2015-00193-CM-0', '2018 - 2019', 'Regular', '2018-12-31 14:23:51', '2018-12-31 14:23:51', 'Show'),
(2, '2015-00111-CM-0', '2018 - 2019', 'Regular', '2018-12-31 15:21:23', '2018-12-31 15:21:23', 'Show'),
(3, '2015-00075-CM-0', '2018 - 2019', 'Regular', '2019-01-02 18:48:34', '2019-01-02 18:48:34', 'Show'),
(4, '2015-00410-CM-0', '2018 - 2019', 'Regular', '2019-01-07 07:40:04', '2019-01-07 07:40:04', 'Show'),
(5, '2015-00004-CM-0', '2018 - 2019', 'Regular', '2019-04-03 09:00:10', '2019-04-03 09:00:10', 'Show'),
(6, '2015-00083-CM-0', '2018 - 2019', 'Transferee', '2019-04-03 09:44:23', '2019-04-03 09:44:23', 'Show'),
(7, '2012-00156-CM-0', '2018 - 2019', 'Suspended', '2019-04-03 13:58:51', '2019-04-03 13:58:51', 'Show'),
(8, '2011-00463-CM-0', '2018 - 2019', 'Irregular', '2019-04-03 14:16:38', '2019-04-03 14:16:38', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_educational_bg_details`
--

CREATE TABLE `t_stud_educational_bg_details` (
  `educ_bg_ID` int(10) NOT NULL,
  `educ_bg_student` varchar(50) NOT NULL,
  `educ_bg_level` varchar(50) NOT NULL,
  `educ_bg_school_name` varchar(255) NOT NULL,
  `educ_bg_school_address` varchar(255) NOT NULL,
  `educ_bg_school_type` varchar(50) NOT NULL,
  `educ_bg_year_graduated` year(4) NOT NULL,
  `educ_bg_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `educ_bg_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `educ_bg_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stud_educational_bg_details`
--

INSERT INTO `t_stud_educational_bg_details` (`educ_bg_ID`, `educ_bg_student`, `educ_bg_level`, `educ_bg_school_name`, `educ_bg_school_address`, `educ_bg_school_type`, `educ_bg_year_graduated`, `educ_bg_add_date`, `educ_bg_mod_date`, `educ_bg_active_flag`) VALUES
(1, '2015-00193-CM-0', 'Primary', 'Sto. Nino Children Montessori Center', 'Durian St. Palmera Homes, QC', 'Private', 2011, '2018-12-31 14:23:50', '2018-12-31 14:23:50', 'Show'),
(2, '2015-00193-CM-0', 'Secondary', 'Divine Grace School', 'Maligaya Park Subdm QC', 'Private', 2015, '2018-12-31 14:23:51', '2018-12-31 14:23:51', 'Show'),
(3, '2015-00193-CM-0', 'Tertiary', 'Polytechnic University of the Philippines QC Branch', 'Don Fabian St. Commonwealth, QC', 'Public', 0000, '2018-12-31 14:23:51', '2018-12-31 14:23:51', 'Show'),
(4, '2015-00111-CM-0', 'Primary', 'Japan School', 'Japan', 'Public', 2011, '2018-12-31 15:21:23', '2018-12-31 15:21:23', 'Show'),
(5, '2015-00111-CM-0', 'Secondary', 'Philippine University of the Philippines', 'Philippines', 'Public', 2015, '2018-12-31 15:21:23', '2018-12-31 15:21:23', 'Show'),
(6, '2015-00111-CM-0', 'Tertiary', 'PUPQC', 'Don fabian, Commonwealth QC', 'Public', 0000, '2018-12-31 15:21:23', '2018-12-31 15:21:23', 'Show'),
(7, '2015-00075-CM-0', 'Tertiary', 'Polytechnic University of the Philippines QC', 'Don Fabian Commonwealth QC', 'Public', 2019, '2019-01-04 05:58:46', '2019-01-04 05:58:46', 'Show'),
(8, '2015-00075-CM-0', 'Secondary', 'School of Hentai', 'Japan', 'Private', 2015, '2019-01-04 06:05:42', '2019-01-04 06:05:42', 'Show'),
(9, '2015-00410-CM-0', 'Tertiary', 'Polytechnic University of the Philippines QC', 'Don Fabian Commonwealth QC', 'Public', 2019, '2019-01-07 07:46:42', '2019-01-07 07:46:42', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_education_rec`
--

CREATE TABLE `t_stud_education_rec` (
  `educ_ID` int(10) NOT NULL,
  `educ_student` varchar(50) NOT NULL,
  `educ_nature_schooling` varchar(50) NOT NULL,
  `educ_interrupt_reason` varchar(50) NOT NULL,
  `educ_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `educ_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `educ_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stud_education_rec`
--

INSERT INTO `t_stud_education_rec` (`educ_ID`, `educ_student`, `educ_nature_schooling`, `educ_interrupt_reason`, `educ_add_date`, `educ_mod_date`, `educ_active_flag`) VALUES
(1, '2015-00193-CM-0', 'Continuous', 'none', '2018-12-31 14:23:50', '2018-12-31 14:23:50', 'Show'),
(2, '2015-00111-CM-0', 'Continuous', 'none', '2018-12-31 15:21:23', '2018-12-31 15:21:23', 'Show'),
(10, '2015-00075-CM-0', 'Continuous', 'n/a', '2019-01-04 05:58:45', '2019-01-04 05:58:45', 'Show'),
(11, '2015-00410-CM-0', 'Continuous', 'n/a', '2019-01-07 07:46:42', '2019-01-07 07:46:42', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_family_bg_rec`
--

CREATE TABLE `t_stud_family_bg_rec` (
  `famInf_ID` int(10) NOT NULL,
  `famInf_student` varchar(50) NOT NULL,
  `famInf_type` varchar(50) NOT NULL,
  `famInf_lastname` varchar(255) NOT NULL,
  `famInf_middlename` varchar(50) NOT NULL,
  `famInf_firstname` varchar(255) NOT NULL,
  `famInf_age` int(50) NOT NULL,
  `famInf_stat` varchar(255) NOT NULL,
  `famInf_educ_attain` varchar(50) DEFAULT NULL,
  `famInf_occupation` varchar(50) DEFAULT NULL,
  `famInf_empl_name` varchar(50) DEFAULT NULL,
  `famInf_empl_address` varchar(255) DEFAULT NULL,
  `famInf_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `famInf_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `famInf_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stud_family_bg_rec`
--

INSERT INTO `t_stud_family_bg_rec` (`famInf_ID`, `famInf_student`, `famInf_type`, `famInf_lastname`, `famInf_middlename`, `famInf_firstname`, `famInf_age`, `famInf_stat`, `famInf_educ_attain`, `famInf_occupation`, `famInf_empl_name`, `famInf_empl_address`, `famInf_add_date`, `famInf_mod_date`, `famInf_active_flag`) VALUES
(1, '2015-00193-CM-0', 'Father', 'Balatbat', 'Lugtu', 'Marvin', 44, 'Alive', 'Highschool', 'Government Employee', 'n/a', 'n/a', '2019-01-03 16:52:42', '2019-01-03 16:52:42', 'Show'),
(2, '2015-00193-CM-0', 'Brother', 'Balatbat', 'Oro', 'Vince Martin', 12, 'Alive', 'Elementary', 'none', 'n/a', 'n/a', '2019-01-03 16:53:55', '2019-01-03 16:53:55', 'Show'),
(3, '2015-00193-CM-0', 'Mother', 'Balatbat', 'Oro', 'Christina', 43, 'Alive', 'College Undergraduate Degree', 'Office Clerk', 'n/a', 'n/a', '2019-01-03 16:53:55', '2019-01-03 16:53:55', 'Show'),
(4, '2015-00075-CM-0', 'Mother', 'Agnir', 'Elba', 'Lilibeth', 44, 'Alive', 'College Undergraduate Degree', 'HouseWife', 'n/a', 'n/a', '2019-01-03 16:55:25', '2019-01-03 16:55:25', 'Show'),
(5, '2015-00075-CM-0', 'Brother', 'Agnir', 'Elba', 'Johnrich', 20, 'Alive', 'Highschool', 'Office Clerk', 'n/a', 'n/a', '2019-01-03 16:55:25', '2019-01-03 16:55:25', 'Show'),
(6, '2015-00410-CM-0', 'Father', 'Alejandria', 'N', 'Mike', 45, 'Alive', 'College Undergraduate Degree', 'Therapist', 'n/a', 'n/a', '2019-01-07 07:46:14', '2019-01-07 07:46:14', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_honors_awards`
--

CREATE TABLE `t_stud_honors_awards` (
  `hon_ID` int(10) NOT NULL,
  `hon_student` varchar(50) NOT NULL,
  `hon_school` int(10) NOT NULL,
  `hon_received_type` varchar(50) NOT NULL,
  `hon_description` varchar(255) NOT NULL,
  `hon_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hon_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hon_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_personal_rec`
--

CREATE TABLE `t_stud_personal_rec` (
  `person_rec_ID` int(10) NOT NULL,
  `person_rec_student_no` varchar(50) NOT NULL,
  `person_rec_weight` varchar(50) NOT NULL,
  `person_rec_height` varchar(50) NOT NULL,
  `person_rec_complexion` varchar(50) NOT NULL,
  `person_rec_religion` varchar(50) NOT NULL,
  `person_rec_hs_genave` varchar(50) NOT NULL,
  `person_rec_civil_stat` varchar(50) NOT NULL,
  `person_rec_working_stat` varchar(50) NOT NULL,
  `person_rec_empl_name` varchar(100) DEFAULT NULL,
  `person_rec_empl_address` varchar(255) DEFAULT NULL,
  `person_rec_emerg_contact_name` varchar(100) NOT NULL,
  `person_rec_emerg_contact_address` varchar(255) NOT NULL,
  `person_rec_emerg_contact_number` varchar(20) NOT NULL,
  `person_rec_contact_relationship` varchar(30) DEFAULT NULL,
  `person_rec_parents_marital_stat` varchar(30) NOT NULL,
  `person_rec_fam_chil_no` varchar(50) NOT NULL,
  `person_rec_brother_no` int(50) DEFAULT NULL,
  `person_rec_sister_no` int(11) DEFAULT NULL,
  `person_rec_siblings_employed` int(11) NOT NULL,
  `person_rec_ordinal_position` varchar(30) NOT NULL,
  `person_rec_schooling_finance` varchar(30) NOT NULL,
  `person_rec_weekly_allowance` double(9,2) NOT NULL,
  `person_rec_parents_total_monthlyinc` varchar(20) NOT NULL,
  `person_rec_quiet_place` varchar(10) NOT NULL,
  `person_rec_room_share` varchar(50) NOT NULL,
  `person_rec_residence` varchar(50) NOT NULL,
  `person_rec_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `person_rec_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `person_rec_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stud_personal_rec`
--

INSERT INTO `t_stud_personal_rec` (`person_rec_ID`, `person_rec_student_no`, `person_rec_weight`, `person_rec_height`, `person_rec_complexion`, `person_rec_religion`, `person_rec_hs_genave`, `person_rec_civil_stat`, `person_rec_working_stat`, `person_rec_empl_name`, `person_rec_empl_address`, `person_rec_emerg_contact_name`, `person_rec_emerg_contact_address`, `person_rec_emerg_contact_number`, `person_rec_contact_relationship`, `person_rec_parents_marital_stat`, `person_rec_fam_chil_no`, `person_rec_brother_no`, `person_rec_sister_no`, `person_rec_siblings_employed`, `person_rec_ordinal_position`, `person_rec_schooling_finance`, `person_rec_weekly_allowance`, `person_rec_parents_total_monthlyinc`, `person_rec_quiet_place`, `person_rec_room_share`, `person_rec_residence`, `person_rec_add_date`, `person_rec_mod_date`, `person_rec_active_flag`) VALUES
(1, '2015-00193-CM-0', '70kg', '55', 'Medium', 'Roman-Catholic', '95.78', 'Single', 'No', 'SRG', 'PUPQC', 'christina balatbat', 'palmera', '09876543211', 'mother', 'Married', '2', 1, 0, 0, '1', 'parents', 300.00, 'Married', 'No', 'No', 'Parent House', '2018-12-31 15:09:07', '2019-01-08 13:57:58', 'Show'),
(2, '2015-00111-CM-0', '59kg', '5.4', 'Light', 'Born-Again Christian', '90', 'Single', 'No', 'n/a', 'n/a', 'Cristian Balatbat', 'palmera', '0987654322', 'Brother', 'Married', '3', 1, 2, 0, '1', 'Parents', 400.00, '20000', 'Yes', 'No', 'House of Parent', '2018-12-31 15:21:22', '2018-12-31 15:21:22', 'Show'),
(4, '2015-00075-CM-0', '70kg', '6', 'Meduim-Dark', 'Iglesia Ni Cristo', '90', 'Single', 'No', 'N/A', 'N/A', 'Lilibeth Agnir', 'San Mateo, Rizal', '0265243213', 'Mother', 'Married', '3', 1, 1, 1, '2', 'Parents', 400.00, '20000', 'Yes', 'No', 'House of Parent', '2019-01-02 20:29:45', '2019-01-02 20:29:45', 'Show'),
(5, '2015-00410-CM-0', '70kg', '5.3', 'Meduim (Balanced)', 'Roman Catholic', '94', 'Single', 'No', 'n/a', 'n/a', 'Mike Alejandria', 'Lamesa Heights, Lagro, QC', '09876543211', 'Father', 'Married', '2', 1, 0, 0, '1', 'Parents', 500.00, '20000', 'Yes', 'No', 'House of Parent', '2019-01-07 07:43:52', '2019-01-07 07:43:52', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_physical_rec`
--

CREATE TABLE `t_stud_physical_rec` (
  `phy_rec_ID` int(10) NOT NULL,
  `phy_rec_student` varchar(50) NOT NULL,
  `phy_rec_vision` varchar(50) NOT NULL,
  `phy_rec_hearing` varchar(50) NOT NULL,
  `phy_rec_speech` varchar(50) NOT NULL,
  `phy_rec_genhealth` varchar(50) NOT NULL,
  `phy_rec_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phy_rec_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phy_rec_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stud_physical_rec`
--

INSERT INTO `t_stud_physical_rec` (`phy_rec_ID`, `phy_rec_student`, `phy_rec_vision`, `phy_rec_hearing`, `phy_rec_speech`, `phy_rec_genhealth`, `phy_rec_add_date`, `phy_rec_mod_date`, `phy_rec_active_flag`) VALUES
(1, '2015-00193-CM-0', '20/20', 'Good', 'Good', 'Very Good', '2018-12-31 14:23:50', '2018-12-31 14:23:50', 'Show'),
(2, '2015-00111-CM-0', '20/20', 'good', 'good', 'good', '2018-12-31 15:21:22', '2018-12-31 15:21:22', 'Show'),
(3, '2015-00075-CM-0', '20/20', 'Good', 'Good', 'Good', '2019-01-03 10:30:18', '2019-01-03 10:30:18', 'Show'),
(4, '2015-00410-CM-0', '20/20', 'Good', 'Good', 'Good', '2019-01-07 07:45:29', '2019-01-07 07:45:29', 'Show'),
(5, '2015-00193-CM-0', '18/18', 'not good', 'not good', 'not so good', '2019-01-08 14:28:52', '2019-01-08 14:28:52', 'Show'),
(6, '2015-00111-CM-0', '18/20', 'not good', 'not good', 'not good', '2019-01-08 14:30:27', '2019-01-08 14:30:27', 'Show'),
(9, '2015-00111-CM-0', '15/15', 'very good', 'very good', 'good', '2019-01-08 14:35:17', '2019-01-08 14:35:17', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_profile`
--

CREATE TABLE `t_stud_profile` (
  `stud_ID` int(10) NOT NULL,
  `stud_number` varchar(50) NOT NULL,
  `stud_lastname` varchar(100) NOT NULL,
  `stud_middlename` varchar(100) DEFAULT NULL,
  `stud_firstname` varchar(100) NOT NULL,
  `stud_course` int(10) NOT NULL,
  `stud_yearlevel` int(10) NOT NULL,
  `stud_section` int(10) NOT NULL,
  `stud_gender` varchar(20) NOT NULL,
  `stud_birthdate` date NOT NULL,
  `stud_birthplace` varchar(255) DEFAULT NULL,
  `stud_homeadd` varchar(255) NOT NULL,
  `stud_provadd` varchar(255) DEFAULT NULL,
  `stud_telephone_no` varchar(15) DEFAULT NULL,
  `stud_mobile_no` varchar(11) DEFAULT NULL,
  `stud_email` varchar(255) DEFAULT NULL,
  `stud_status` varchar(20) NOT NULL,
  `stud_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stud_mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stud_active_flag` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stud_profile`
--

INSERT INTO `t_stud_profile` (`stud_ID`, `stud_number`, `stud_lastname`, `stud_middlename`, `stud_firstname`, `stud_course`, `stud_yearlevel`, `stud_section`, `stud_gender`, `stud_birthdate`, `stud_birthplace`, `stud_homeadd`, `stud_provadd`, `stud_telephone_no`, `stud_mobile_no`, `stud_email`, `stud_status`, `stud_add_date`, `stud_mod_date`, `stud_active_flag`) VALUES
(1, '2015-00193-CM-0', 'Balatbat', 'Oro', 'Cristian', 1, 4, 1, 'Male', '1999-10-26', 'Angeles City, Pampanga', 'Palmera Homes, Quezon City', 'Porac, Pampanga', '8-7000', '2147483647', 'cristianbalatbat@yahoo.com', 'Regular', '2018-12-31 14:23:46', '2019-01-08 12:46:33', 'Active'),
(2, '2015-00111-CM-0', 'Kuriyama', 'Mash', 'Mirai', 1, 1, 1, 'Female', '2000-11-05', 'Manila', 'Manila', 'Pampanga', '8888', '2147483647', 'miraikuriyama@gmail.com', 'Regular', '2018-12-31 15:21:22', '2018-12-31 15:21:22', 'Active'),
(3, '2015-00075-CM-0', 'Agnir', 'Elba', 'Lowell Dave', 1, 4, 1, 'Male', '1999-04-23', 'Rizal', 'San Mateo, Rizal', 'Rizal', '8-7001', '587653212', 'lowellagnir@yahoo.com', 'Irregular', '2019-01-02 18:47:49', '2019-01-17 17:09:10', 'Active'),
(4, '2015-00410-CM-0', 'Alejandria', 'C.', 'Maria Michaela', 1, 4, 1, 'Female', '1998-06-17', 'Manila', 'Lamesa Heights, Lagro Quezon City', 'Wala', 'none', '209598580', 'mikaalej@gmail.com', 'Irregular', '2019-01-07 07:40:04', '2019-01-17 17:09:21', 'Active'),
(5, '2015-00004-CM-0', 'Maglaque', 'Oro', 'Gerard', 4, 4, 1, 'Male', '1999-07-15', 'Manila', 'Almar, Novaliches, Quezon City', 'None', 'n/a', '0987123456', 'cristianbalatbat@yahoo.com', 'Regular', '2019-04-03 09:00:10', '2019-04-03 09:00:10', 'Active'),
(6, '2015-00083-CM-0', 'Teneza', 'Castillo', 'Peter John', 3, 4, 1, 'Male', '1998-11-11', 'Marikina', 'Marikina City', 'Ilocos', 'n/a', 'n/a', 'peterjohn@yahoo.com', 'Transferee', '2019-04-03 09:44:22', '2019-04-03 09:44:22', 'Active'),
(7, '2012-00156-CM-0', 'Asusula', 'Abela', 'Mary Joy', 5, 4, 1, 'Female', '1994-04-18', 'Fairview', 'blk 11 lot 11 kalap subdivision , Novaliches, Quezon City', 'blk 11 lot 11 kalap subdivision , Novaliches, Quezon City', 'n/a', '09129876707', 'mcz_joy@yahoo.com', 'Suspended', '2019-04-03 13:58:51', '2019-04-03 13:58:51', 'Active'),
(8, '2011-00463-CM-0', 'Montes', 'Madlangbayan', 'Vincent Ian', 1, 4, 1, 'Male', '1993-11-23', 'Novaliches QC', 'Novaliches QC', 'Maragundon, Cavite', 'n/a', 'n/a', 'crude@gmail.com', 'Irregular', '2019-04-03 14:16:38', '2019-04-03 14:16:38', 'Active'),
(16, '2015-00044-CM-0', 'Balmoria', 'D', 'Daniel', 1, 4, 1, 'Male', '1999-11-30', 'Province', 'Ph4-C P5 Blk. 31 Lot 4 Bagong Silang Caloocan City', 'Province', 'n/a', '9995363684', 'danielbalmoria@gmail.com', 'Regular', '2019-04-04 17:56:44', '2019-04-04 17:56:44', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_psych_rec`
--

CREATE TABLE `t_stud_psych_rec` (
  `psych_ID` int(10) NOT NULL,
  `psych_student` varchar(50) NOT NULL,
  `psych_last_consult` date NOT NULL,
  `psych_reason_consult` varchar(255) NOT NULL,
  `psych_add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `psych_active_flag` varchar(20) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stud_psych_rec`
--

INSERT INTO `t_stud_psych_rec` (`psych_ID`, `psych_student`, `psych_last_consult`, `psych_reason_consult`, `psych_add_date`, `psych_active_flag`) VALUES
(1, '2015-00193-CM-0', '2018-10-06', 'Nabaliw', '2018-12-31 14:23:50', 'Show'),
(2, '2015-00111-CM-0', '2009-10-10', 'Natripan lng', '2018-12-31 15:21:23', 'Show'),
(3, '2015-00075-CM-0', '2018-12-20', 'Na-abno', '2019-01-03 10:30:18', 'Show'),
(4, '2015-00410-CM-0', '2010-10-10', 'Nabaliw', '2019-01-07 07:45:29', 'Show'),
(5, '2015-00111-CM-0', '2019-01-06', 'sumakit ulo kakaisip', '2019-01-08 14:36:09', 'Show'),
(6, '2015-00193-CM-0', '2019-01-07', 'Nabaliw', '2019-01-08 14:38:13', 'Show'),
(7, '2015-00193-CM-0', '2019-01-03', 'sumakit ulo kakaisip', '2019-01-08 14:38:57', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_visitation`
--

CREATE TABLE `t_stud_visitation` (
  `vs_ID` int(10) NOT NULL,
  `vs_code` varchar(50) NOT NULL,
  `vs_stud_no` varchar(50) NOT NULL,
  `vs_app_type` int(10) NOT NULL,
  `vs_visit_type` int(10) NOT NULL,
  `vs_visit_desc` varchar(255) DEFAULT NULL,
  `vs_date_visit` date NOT NULL,
  `vs_time_visit` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stud_visitation`
--

INSERT INTO `t_stud_visitation` (`vs_ID`, `vs_code`, `vs_stud_no`, `vs_app_type`, `vs_visit_type`, `vs_visit_desc`, `vs_date_visit`, `vs_time_visit`) VALUES
(1, 'VS-1', '2015-00193-CM-0', 1, 1, 'Nagkasala po kasi ako', '2019-01-01', '14:22:40'),
(2, 'VS-2', '2015-00111-CM-0', 1, 1, 'hahaha', '2019-01-01', '21:12:41'),
(3, 'VS-3', '2015-00193-CM-0', 1, 1, 'Nagkasala po kasi ako', '2019-01-02', '17:10:22'),
(4, 'VS-4', '2015-00075-CM-0', 2, 1, 'la lang ulit', '2019-01-03', '12:53:21'),
(5, 'VS-5', '2015-00075-CM-0', 2, 1, 'lalang', '2019-01-03', '15:19:58'),
(6, 'VS-6', '2015-00075-CM-0', 1, 1, 'lalang', '2019-01-17', '18:59:40'),
(7, 'VS-7', '2015-00193-CM-0', 2, 1, 'lalang', '2019-01-18', '10:21:39'),
(8, 'VS-8', '2015-00111-CM-0', 1, 2, 'lalang', '2019-01-18', '10:22:41'),
(9, 'VS-9', '2015-00111-CM-0', 1, 2, 'lalang', '2019-01-18', '10:23:32'),
(10, 'VS-10', '2015-00410-CM-0', 1, 1, 'la lang ulit', '2019-01-18', '10:24:14'),
(11, 'VS-11', '2011-00463-CM-0', 1, 2, 'none', '2019-04-03', '14:18:22'),
(12, 'VS-12', '2015-00075-CM-0', 1, 1, 'none', '2019-04-03', '14:25:13'),
(13, 'VS-13', '2015-00410-CM-0', 1, 3, 'For pass', '2019-04-03', '16:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `t_users_log`
--

CREATE TABLE `t_users_log` (
  `log_No` int(200) NOT NULL,
  `log_userID` int(10) NOT NULL,
  `log_usertype` int(10) NOT NULL,
  `log_datestamp` date NOT NULL,
  `log_timestamp` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_users_log`
--

INSERT INTO `t_users_log` (`log_No`, `log_userID`, `log_usertype`, `log_datestamp`, `log_timestamp`) VALUES
(3, 1, 1, '2018-12-26', '04:21:40'),
(4, 2, 2, '2018-12-26', '04:22:39'),
(5, 1, 1, '2018-12-26', '11:24:27'),
(6, 1, 1, '2018-12-26', '11:36:05'),
(7, 1, 1, '2018-12-26', '11:41:54'),
(8, 1, 1, '2018-12-26', '11:43:15'),
(9, 1, 1, '2018-12-26', '11:44:46'),
(10, 1, 1, '2018-12-26', '13:16:20'),
(11, 1, 1, '2018-12-26', '13:17:59'),
(12, 1, 1, '2018-12-26', '13:18:55'),
(13, 1, 1, '2018-12-26', '19:43:07'),
(14, 1, 1, '2018-12-26', '20:06:30'),
(15, 1, 1, '2018-12-26', '20:07:25'),
(16, 2, 2, '2018-12-26', '20:07:56'),
(17, 2, 2, '2019-01-01', '21:12:52'),
(18, 2, 2, '2019-01-02', '08:57:46'),
(19, 1, 1, '2019-01-02', '14:01:38'),
(20, 1, 1, '2019-01-02', '17:10:35'),
(21, 2, 2, '2018-12-21', '22:02:45'),
(22, 1, 1, '2019-01-03', '12:53:34'),
(23, 2, 2, '2019-01-03', '12:53:57'),
(24, 1, 1, '2019-01-03', '15:31:25'),
(25, 1, 1, '2019-01-03', '15:32:15'),
(26, 2, 2, '2019-01-03', '15:32:32'),
(27, 1, 1, '2019-01-03', '15:37:16'),
(28, 2, 2, '2019-01-03', '16:36:06'),
(29, 2, 2, '2019-01-03', '18:31:48'),
(30, 2, 2, '2019-01-04', '05:26:20'),
(31, 2, 2, '2019-01-04', '07:56:17'),
(32, 2, 2, '2019-01-07', '05:56:27'),
(33, 2, 2, '2019-01-07', '09:07:46'),
(34, 1, 1, '2019-01-07', '09:29:54'),
(35, 1, 1, '2019-01-07', '09:30:29'),
(36, 1, 1, '2019-01-07', '09:31:09'),
(37, 2, 2, '2019-01-07', '09:31:28'),
(38, 2, 2, '2019-01-07', '15:56:42'),
(39, 2, 2, '2019-01-08', '10:00:28'),
(40, 2, 2, '2019-01-16', '20:04:32'),
(41, 2, 2, '2019-01-17', '10:24:03'),
(42, 1, 1, '2019-01-17', '17:12:31'),
(43, 2, 2, '2019-01-17', '17:13:09'),
(44, 3, 3, '2019-01-17', '18:41:46'),
(45, 3, 3, '2019-01-17', '18:42:49'),
(46, 2, 2, '2019-01-18', '10:12:22'),
(47, 3, 3, '2019-01-18', '10:15:30'),
(48, 1, 1, '2019-01-18', '10:39:00'),
(49, 3, 3, '2019-01-18', '11:09:58'),
(50, 2, 2, '2019-01-18', '11:24:56'),
(51, 1, 1, '2019-01-18', '11:25:14'),
(52, 2, 2, '2019-01-18', '15:56:24'),
(53, 2, 2, '2019-01-18', '18:31:01'),
(54, 2, 2, '2019-01-25', '15:00:13'),
(55, 2, 2, '2019-02-21', '14:06:17'),
(56, 1, 1, '2019-02-21', '14:06:39'),
(57, 2, 2, '2019-03-01', '10:00:33'),
(58, 2, 2, '2019-03-13', '20:05:31'),
(59, 2, 2, '2019-03-27', '19:42:12'),
(60, 2, 2, '2019-03-27', '19:43:58'),
(61, 2, 2, '2019-04-01', '10:34:12'),
(62, 1, 1, '2019-04-01', '10:35:53'),
(63, 2, 2, '2019-04-01', '10:37:08'),
(64, 2, 2, '2019-04-02', '17:47:59'),
(65, 2, 2, '2019-04-03', '08:18:46'),
(66, 1, 1, '2019-04-03', '08:25:12'),
(67, 2, 2, '2019-04-03', '08:32:51'),
(68, 2, 2, '2019-04-03', '14:14:26'),
(69, 2, 2, '2019-04-03', '14:18:38'),
(70, 2, 2, '2019-04-03', '14:25:23'),
(71, 1, 1, '2019-04-03', '16:11:23'),
(72, 2, 2, '2019-04-03', '16:11:56'),
(73, 2, 2, '2019-04-04', '15:48:35'),
(74, 2, 2, '2019-04-08', '09:37:48'),
(75, 2, 2, '2019-04-08', '09:46:37'),
(76, 2, 2, '2019-04-08', '09:51:56'),
(77, 2, 2, '2019-04-08', '10:47:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_academic_year`
--
ALTER TABLE `r_academic_year`
  ADD PRIMARY KEY (`acadyr_ID`);

--
-- Indexes for table `r_appointment_type`
--
ALTER TABLE `r_appointment_type`
  ADD PRIMARY KEY (`app_ID`);

--
-- Indexes for table `r_counsel_type`
--
ALTER TABLE `r_counsel_type`
  ADD PRIMARY KEY (`ct_ID`);

--
-- Indexes for table `r_courses`
--
ALTER TABLE `r_courses`
  ADD PRIMARY KEY (`course_ID`);

--
-- Indexes for table `r_document_type`
--
ALTER TABLE `r_document_type`
  ADD PRIMARY KEY (`dt_ID`);

--
-- Indexes for table `r_semester`
--
ALTER TABLE `r_semester`
  ADD PRIMARY KEY (`sem_ID`);

--
-- Indexes for table `r_user_role`
--
ALTER TABLE `r_user_role`
  ADD PRIMARY KEY (`usr_ID`);

--
-- Indexes for table `r_visit_type`
--
ALTER TABLE `r_visit_type`
  ADD PRIMARY KEY (`vt_ID`);

--
-- Indexes for table `t_accounts`
--
ALTER TABLE `t_accounts`
  ADD PRIMARY KEY (`acc_ID`),
  ADD KEY `acc_user_role` (`acc_user_role`);

--
-- Indexes for table `t_counseling_group`
--
ALTER TABLE `t_counseling_group`
  ADD PRIMARY KEY (`CG_ID`),
  ADD KEY `FK_CGcouns_type` (`CG_couns_type`);

--
-- Indexes for table `t_counseling_group_stud_ref`
--
ALTER TABLE `t_counseling_group_stud_ref`
  ADD PRIMARY KEY (`GSR_ID`),
  ADD KEY `FK_GSRstudent_ref` (`GSR_student_ref`),
  ADD KEY `FK_GSRcouns_group` (`GSR_CG_ID`),
  ADD KEY `FK_GSRappoint_type` (`GSR_appoint_type`);

--
-- Indexes for table `t_counseling_individual`
--
ALTER TABLE `t_counseling_individual`
  ADD PRIMARY KEY (`CI_ID`),
  ADD KEY `FK_CIvisit_type` (`CI_vs_ID`),
  ADD KEY `FK_CIstudent_ref` (`CI_student_ref`),
  ADD KEY `FK_CIcouns_type` (`CI_couns_type`),
  ADD KEY `FK_CIappoint_type` (`CI_appoint_type`);

--
-- Indexes for table `t_files_upload`
--
ALTER TABLE `t_files_upload`
  ADD PRIMARY KEY (`file_ID`),
  ADD KEY `FK_docutype` (`file_docu_type`);

--
-- Indexes for table `t_stud_batch_rec`
--
ALTER TABLE `t_stud_batch_rec`
  ADD PRIMARY KEY (`batch_ID`),
  ADD KEY `FK_stud_batch_rec` (`batch_student`);

--
-- Indexes for table `t_stud_educational_bg_details`
--
ALTER TABLE `t_stud_educational_bg_details`
  ADD PRIMARY KEY (`educ_bg_ID`),
  ADD KEY `FK_stud_educbg_rec` (`educ_bg_student`);

--
-- Indexes for table `t_stud_education_rec`
--
ALTER TABLE `t_stud_education_rec`
  ADD PRIMARY KEY (`educ_ID`),
  ADD KEY `FK_stud_educ_rec` (`educ_student`);

--
-- Indexes for table `t_stud_family_bg_rec`
--
ALTER TABLE `t_stud_family_bg_rec`
  ADD PRIMARY KEY (`famInf_ID`),
  ADD KEY `FK_stud_famInf_rec` (`famInf_student`);

--
-- Indexes for table `t_stud_honors_awards`
--
ALTER TABLE `t_stud_honors_awards`
  ADD PRIMARY KEY (`hon_ID`),
  ADD KEY `FK_stud_hon_rec` (`hon_student`),
  ADD KEY `FK_stud_school` (`hon_school`);

--
-- Indexes for table `t_stud_personal_rec`
--
ALTER TABLE `t_stud_personal_rec`
  ADD PRIMARY KEY (`person_rec_ID`),
  ADD KEY `FK_stud_person_rec` (`person_rec_student_no`);

--
-- Indexes for table `t_stud_physical_rec`
--
ALTER TABLE `t_stud_physical_rec`
  ADD PRIMARY KEY (`phy_rec_ID`),
  ADD KEY `FK_stud_phy_rec` (`phy_rec_student`);

--
-- Indexes for table `t_stud_profile`
--
ALTER TABLE `t_stud_profile`
  ADD PRIMARY KEY (`stud_ID`),
  ADD UNIQUE KEY `stud_number` (`stud_number`),
  ADD KEY `FK_courses` (`stud_course`);

--
-- Indexes for table `t_stud_psych_rec`
--
ALTER TABLE `t_stud_psych_rec`
  ADD PRIMARY KEY (`psych_ID`),
  ADD KEY `FK_stud_pysch_rec` (`psych_student`);

--
-- Indexes for table `t_stud_visitation`
--
ALTER TABLE `t_stud_visitation`
  ADD PRIMARY KEY (`vs_ID`),
  ADD KEY `FK_studno` (`vs_stud_no`),
  ADD KEY `FK_apptype` (`vs_app_type`),
  ADD KEY `FK_visittype` (`vs_visit_type`);

--
-- Indexes for table `t_users_log`
--
ALTER TABLE `t_users_log`
  ADD PRIMARY KEY (`log_No`),
  ADD KEY `FK_loguserID` (`log_userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_academic_year`
--
ALTER TABLE `r_academic_year`
  MODIFY `acadyr_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_appointment_type`
--
ALTER TABLE `r_appointment_type`
  MODIFY `app_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_counsel_type`
--
ALTER TABLE `r_counsel_type`
  MODIFY `ct_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_courses`
--
ALTER TABLE `r_courses`
  MODIFY `course_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r_document_type`
--
ALTER TABLE `r_document_type`
  MODIFY `dt_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_semester`
--
ALTER TABLE `r_semester`
  MODIFY `sem_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `r_user_role`
--
ALTER TABLE `r_user_role`
  MODIFY `usr_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r_visit_type`
--
ALTER TABLE `r_visit_type`
  MODIFY `vt_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_accounts`
--
ALTER TABLE `t_accounts`
  MODIFY `acc_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_counseling_group`
--
ALTER TABLE `t_counseling_group`
  MODIFY `CG_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_counseling_group_stud_ref`
--
ALTER TABLE `t_counseling_group_stud_ref`
  MODIFY `GSR_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_counseling_individual`
--
ALTER TABLE `t_counseling_individual`
  MODIFY `CI_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_files_upload`
--
ALTER TABLE `t_files_upload`
  MODIFY `file_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_stud_batch_rec`
--
ALTER TABLE `t_stud_batch_rec`
  MODIFY `batch_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_stud_educational_bg_details`
--
ALTER TABLE `t_stud_educational_bg_details`
  MODIFY `educ_bg_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_stud_education_rec`
--
ALTER TABLE `t_stud_education_rec`
  MODIFY `educ_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_stud_family_bg_rec`
--
ALTER TABLE `t_stud_family_bg_rec`
  MODIFY `famInf_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_stud_honors_awards`
--
ALTER TABLE `t_stud_honors_awards`
  MODIFY `hon_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_stud_personal_rec`
--
ALTER TABLE `t_stud_personal_rec`
  MODIFY `person_rec_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_stud_physical_rec`
--
ALTER TABLE `t_stud_physical_rec`
  MODIFY `phy_rec_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_stud_profile`
--
ALTER TABLE `t_stud_profile`
  MODIFY `stud_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_stud_psych_rec`
--
ALTER TABLE `t_stud_psych_rec`
  MODIFY `psych_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_stud_visitation`
--
ALTER TABLE `t_stud_visitation`
  MODIFY `vs_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_users_log`
--
ALTER TABLE `t_users_log`
  MODIFY `log_No` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_accounts`
--
ALTER TABLE `t_accounts`
  ADD CONSTRAINT `t_accounts_ibfk_1` FOREIGN KEY (`acc_user_role`) REFERENCES `r_user_role` (`usr_ID`);

--
-- Constraints for table `t_counseling_group`
--
ALTER TABLE `t_counseling_group`
  ADD CONSTRAINT `FK_CGcouns_type` FOREIGN KEY (`CG_couns_type`) REFERENCES `r_counsel_type` (`ct_ID`);

--
-- Constraints for table `t_counseling_group_stud_ref`
--
ALTER TABLE `t_counseling_group_stud_ref`
  ADD CONSTRAINT `FK_GSRappoint_type` FOREIGN KEY (`GSR_appoint_type`) REFERENCES `r_appointment_type` (`app_ID`),
  ADD CONSTRAINT `FK_GSRcouns_group` FOREIGN KEY (`GSR_CG_ID`) REFERENCES `t_counseling_group` (`CG_ID`),
  ADD CONSTRAINT `FK_GSRstudent_ref` FOREIGN KEY (`GSR_student_ref`) REFERENCES `t_stud_profile` (`stud_number`);

--
-- Constraints for table `t_counseling_individual`
--
ALTER TABLE `t_counseling_individual`
  ADD CONSTRAINT `FK_CIappoint_type` FOREIGN KEY (`CI_appoint_type`) REFERENCES `r_appointment_type` (`app_ID`),
  ADD CONSTRAINT `FK_CIcouns_type` FOREIGN KEY (`CI_couns_type`) REFERENCES `r_counsel_type` (`ct_ID`),
  ADD CONSTRAINT `FK_CIstudent_ref` FOREIGN KEY (`CI_student_ref`) REFERENCES `t_stud_profile` (`stud_number`),
  ADD CONSTRAINT `FK_CIvisit_type` FOREIGN KEY (`CI_vs_ID`) REFERENCES `r_visit_type` (`vt_ID`);

--
-- Constraints for table `t_files_upload`
--
ALTER TABLE `t_files_upload`
  ADD CONSTRAINT `FK_docutype` FOREIGN KEY (`file_docu_type`) REFERENCES `r_document_type` (`dt_ID`);

--
-- Constraints for table `t_stud_batch_rec`
--
ALTER TABLE `t_stud_batch_rec`
  ADD CONSTRAINT `FK_stud_batch_rec` FOREIGN KEY (`batch_student`) REFERENCES `t_stud_profile` (`stud_number`);

--
-- Constraints for table `t_stud_educational_bg_details`
--
ALTER TABLE `t_stud_educational_bg_details`
  ADD CONSTRAINT `FK_stud_educbg_rec` FOREIGN KEY (`educ_bg_student`) REFERENCES `t_stud_profile` (`stud_number`);

--
-- Constraints for table `t_stud_education_rec`
--
ALTER TABLE `t_stud_education_rec`
  ADD CONSTRAINT `FK_stud_educ_rec` FOREIGN KEY (`educ_student`) REFERENCES `t_stud_profile` (`stud_number`);

--
-- Constraints for table `t_stud_family_bg_rec`
--
ALTER TABLE `t_stud_family_bg_rec`
  ADD CONSTRAINT `FK_stud_famInf_rec` FOREIGN KEY (`famInf_student`) REFERENCES `t_stud_profile` (`stud_number`);

--
-- Constraints for table `t_stud_honors_awards`
--
ALTER TABLE `t_stud_honors_awards`
  ADD CONSTRAINT `FK_stud_hon_rec` FOREIGN KEY (`hon_student`) REFERENCES `t_stud_profile` (`stud_number`),
  ADD CONSTRAINT `FK_stud_school` FOREIGN KEY (`hon_school`) REFERENCES `t_stud_educational_bg_details` (`educ_bg_ID`);

--
-- Constraints for table `t_stud_personal_rec`
--
ALTER TABLE `t_stud_personal_rec`
  ADD CONSTRAINT `FK_stud_person_rec` FOREIGN KEY (`person_rec_student_no`) REFERENCES `t_stud_profile` (`stud_number`);

--
-- Constraints for table `t_stud_physical_rec`
--
ALTER TABLE `t_stud_physical_rec`
  ADD CONSTRAINT `FK_stud_phy_rec` FOREIGN KEY (`phy_rec_student`) REFERENCES `t_stud_profile` (`stud_number`);

--
-- Constraints for table `t_stud_profile`
--
ALTER TABLE `t_stud_profile`
  ADD CONSTRAINT `FK_courses` FOREIGN KEY (`stud_course`) REFERENCES `r_courses` (`course_ID`);

--
-- Constraints for table `t_stud_psych_rec`
--
ALTER TABLE `t_stud_psych_rec`
  ADD CONSTRAINT `FK_stud_pysch_rec` FOREIGN KEY (`psych_student`) REFERENCES `t_stud_profile` (`stud_number`);

--
-- Constraints for table `t_stud_visitation`
--
ALTER TABLE `t_stud_visitation`
  ADD CONSTRAINT `FK_apptype` FOREIGN KEY (`vs_app_type`) REFERENCES `r_appointment_type` (`app_ID`),
  ADD CONSTRAINT `FK_studno` FOREIGN KEY (`vs_stud_no`) REFERENCES `t_stud_profile` (`stud_number`),
  ADD CONSTRAINT `FK_visittype` FOREIGN KEY (`vs_visit_type`) REFERENCES `r_visit_type` (`vt_ID`);

--
-- Constraints for table `t_users_log`
--
ALTER TABLE `t_users_log`
  ADD CONSTRAINT `FK_loguserID` FOREIGN KEY (`log_userID`) REFERENCES `t_accounts` (`acc_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
