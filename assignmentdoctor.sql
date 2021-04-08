-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 03:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignmentdoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id_accounts` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `email` text NOT NULL,
  `mobile_no` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id_accounts`, `username`, `password`, `lastname`, `firstname`, `email`, `mobile_no`, `role_id`, `is_active`, `created_by`, `date_created`, `modified_by`, `date_modified`, `is_deleted`) VALUES
(1, 'admin', '696d29e0940a4957748fe3fc9efd22a3', 'admin', 'admin', 'admin@assigndoctor.com', '1234', 1, 1, 1, '0000-00-00 00:00:00', 1, '2021-03-09 14:20:38', 0),
(2, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', 0, 1, 1, '2018-01-20 18:06:33', 1, '2020-07-11 14:22:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `auditions`
--

CREATE TABLE `auditions` (
  `id_auditions` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `audition_name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `audition_description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` date NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditions`
--

INSERT INTO `auditions` (`id_auditions`, `image_url`, `audition_name`, `url`, `audition_description`, `start_date`, `end_date`, `created_by`, `date_created`, `modified_by`, `date_modified`, `is_deleted`) VALUES
(1, '', 'Audition 1', 'audition-1', 'aud', '2017-11-01', '2017-11-02', 0, '2017-11-02', 0, '2017-11-02', 0),
(2, '', 'Audition 2', 'audition-2', 'Audition 2', '2017-11-03', '2017-11-04', 0, '2017-11-02', 0, '2017-11-02', 0),
(3, '', 'tests', 'sweets', '<p>test</p>', '2018-12-12', '2018-12-12', 1, '2018-01-20', 0, '0000-00-00', 0),
(4, '', 'xxx', 'testx', '<p>texxxx</p>', '2018-01-25', '2018-01-30', 1, '2018-01-21', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id_authors` int(11) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `email_address` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `author_news`
--

CREATE TABLE `author_news` (
  `id_authors` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `author_programmes`
--

CREATE TABLE `author_programmes` (
  `id_author_programmes` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id_banners` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id_banners`, `title`, `description`, `is_show`, `created_by`, `created_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'banner default', 'test', 1, 1, '2020-08-21 22:44:35', 0, '2020-08-21 22:44:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id_banner_images` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL DEFAULT 0,
  `image_name` text DEFAULT NULL,
  `image_title` text DEFAULT NULL,
  `image_description` text DEFAULT NULL,
  `path` text DEFAULT NULL,
  `image_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id_banner_images`, `banner_id`, `image_name`, `image_title`, `image_description`, `path`, `image_link`) VALUES
(19, 1, 'banner2.jpg', '<span>DigiFence</span>', 'Fence Protection Software to protect your property within the set fence area on the sea.', 'assets/uploads/banner2.jpg', 'http://www.digimarintec.com/product/software/digifence'),
(20, 1, 'banner1.jpg', 'AIS Tracking Solution', 'Total Fishery Management Solution', 'assets/uploads/banner1.jpg', 'http://www.digimarintec.com/product/solutions/aistracking');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categories`, `category`, `created_by`, `created_at`, `is_active`, `description`, `is_deleted`) VALUES
(1, 'Hardware', 1, '2020-06-06 10:18:31', 1, NULL, 1),
(2, 'Software', 1, '2020-06-06 10:18:43', 1, NULL, 1),
(3, 'Solutions', 1, '2020-06-06 10:21:08', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id_competitions` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `competition_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_thumb_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` date NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id_competitions`, `image_url`, `url`, `competition_name`, `description`, `image_thumb_id`, `start_date`, `end_date`, `is_active`, `created_by`, `date_created`, `modified_by`, `date_modified`, `is_deleted`) VALUES
(1, '', 'film-competition', 'FILM COMPETITION', '<p>As part of the Channel Hue Presents series in which international features and short films will be shown, we are inviting entries to our International Film Competition. Entry is open to everyone with no restriction to genre, subject, length or age.</p>\r\n\r\n<p>The winning films will be broadcast as part of the Channel Hue Presents series and the winning film makers will be interviewed about their work and will be considered to direct content for Channel Hue Television. The winning film makers will also receive a prestigious Channel Hue Award and a cash prize.</p>\r\n\r\n<p>All films submitted will be reviewed by our international team and all film makers will receive feedback for their work.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ENTRY FEES</strong></p>\r\n\r\n<p>For films up to 30 minutes in length: P500</p>\r\n\r\n<p>30 to 60 minutes: P1000</p>\r\n\r\n<p>Over 60 minutes: P1500</p>\r\n\r\n<p>Please contact us by email for an entry form and further details.</p>', 0, '0000-00-00', '0000-00-00', 1, 1, '2017-12-08', 0, '0000-00-00', 0),
(2, '', 'testfc', 'testf', '<p>testfcs</p>', 0, '2018-12-15', '2018-12-25', 1, 1, '2018-01-20', 1, '2018-01-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id_contacts` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email_address` text NOT NULL,
  `inquiry_type_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id_contacts`, `fullname`, `email_address`, `inquiry_type_id`, `subject`, `description`, `created_by`, `date_created`, `modified_by`, `date_modified`) VALUES
(1, 'test', 'test@mail.com', 1, 'test', 'test', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id_distributors` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `company_website` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `contact_number` varchar(50) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id_distributors`, `name`, `address`, `longitude`, `latitude`, `company_website`, `email_address`, `is_active`, `created_by`, `date_created`, `contact_number`, `is_deleted`) VALUES
(1, 'Distrib One', 'Nalsian, Manaoag, Pangasinan', '120.487380', '16.037270', '', '', 1, 1, '2020-08-05 16:14:25', NULL, 1),
(2, 'Distrib Twozz', 'Dagupan, Pangasinan', '120.335190', '16.043859', NULL, NULL, 1, 1, '2020-06-03 19:21:12', NULL, 1),
(3, 'test', '', NULL, '', '', '', 1, 1, '2020-08-08 13:03:21', NULL, 1),
(4, 'DigiMarine Head Quarters', '23A08, building B, Zhengzhong Times Square, Longcheng Road, Longgang Central City, Shenzhen, China', '114.251465', '22.727849', 'www.digimarintec.com', 'info@digimarintec.com', 1, 1, '2020-08-08 13:31:04', '+86 (0755)-28260683', 1),
(5, 'Philippines', 'Unit 4D Marin Bldg. Pacific Coast Residences', '120.994898', '14.452850', 'https://www.facebook.com/pikashootphotobooth', 'pikashootpb@gmail.com', 1, 1, '2020-08-21 10:42:31', '+639275220288', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_images` int(11) NOT NULL,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(50) DEFAULT '',
  `filename` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id_images`, `post_id`, `type`, `filename`, `created_by`, `created_at`) VALUES
(1, 3, 'news', 'assets/uploads/AIS_Coastal_Monitoring_Add-ON.jpg', 0, NULL),
(2, 3, 'news', 'assets/uploads/AIS_Coastal_Monitoring_Image_1.jpg', 0, NULL),
(3, 3, 'news', 'assets/uploads/ais_tracking_solution_1.jpg', 0, NULL),
(4, 4, 'news', 'assets/uploads/Solutions_2.jpg', 0, NULL),
(5, 4, 'news', 'assets/uploads/DigiFence_Features_resized.jpg', 0, NULL),
(6, 4, 'news', 'assets/uploads/AIS_Coastal_Monitoring_Image_11.jpg', 0, NULL),
(7, 5, 'news', 'assets/uploads/IMG_20200921_164915.jpg', 0, NULL),
(8, 5, 'news', 'assets/uploads/IMG_20200921_165253.jpg', 0, NULL),
(9, 5, 'news', 'assets/uploads/mmexport1601184500627.jpg', 0, NULL),
(10, 5, 'news', 'assets/uploads/IMG_20200921_1649151.jpg', 0, NULL),
(11, 5, 'news', 'assets/uploads/IMG_20200922_085457.jpg', 0, NULL),
(12, 5, 'news', 'assets/uploads/IMG_20200922_090626.jpg', 0, NULL),
(13, 5, 'news', 'assets/uploads/mmexport1600756721718.jpg', 0, NULL),
(14, 5, 'news', 'assets/uploads/mmexport1601184433921.jpg', 0, NULL),
(15, 6, 'news', 'assets/uploads/583806534.jpg', 0, NULL),
(16, 6, 'news', 'assets/uploads/1367170706.jpg', 0, NULL),
(17, 6, 'news', 'assets/uploads/1416371649.jpg', 0, NULL),
(18, 6, 'news', 'assets/uploads/203216402.jpg', 0, NULL),
(20, 6, 'news', 'assets/uploads/482300196.jpg', 0, NULL),
(21, 6, 'news', 'assets/uploads/14163716491.jpg', 0, NULL),
(22, 6, 'news', 'assets/uploads/1906324601.jpg', 0, NULL),
(24, 6, 'news', 'assets/uploads/l_(1).jpg', 0, NULL),
(25, 6, 'news', 'assets/uploads/l_(2).jpg', 0, NULL),
(26, 6, 'news', 'assets/uploads/l.jpg', 0, NULL),
(27, 6, 'news', 'assets/uploads/l_(3).jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `magazines`
--

CREATE TABLE `magazines` (
  `id_magazines` int(11) NOT NULL,
  `magazine_name` varchar(150) NOT NULL,
  `url` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magazines`
--

INSERT INTO `magazines` (`id_magazines`, `magazine_name`, `url`, `is_active`, `created_by`, `date_created`, `modified_by`, `date_modified`, `is_deleted`) VALUES
(1, 'Channel Hue', 'channel-hue', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `magazine_files`
--

CREATE TABLE `magazine_files` (
  `id_magazine_files` int(11) NOT NULL,
  `magazine_id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `is_cover` int(11) NOT NULL,
  `image_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magazine_files`
--

INSERT INTO `magazine_files` (`id_magazine_files`, `magazine_id`, `image_url`, `is_cover`, `image_order`) VALUES
(1, 1, 'chhue.jpg', 1, 0),
(2, 1, 'afraidtolove.jpg', 0, 1),
(3, 1, 'drew.jpg', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `image_url` text DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `news_short_desc` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_published` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `content_type` text DEFAULT NULL,
  `featured_image` text DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `image_url`, `author_id`, `title`, `slug`, `news_short_desc`, `description`, `is_active`, `is_published`, `created_by`, `date_created`, `modified_by`, `date_modified`, `content_type`, `featured_image`, `is_deleted`) VALUES
(1, NULL, 0, 'news sample', 'news-sample-1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a tristique erat. Vivamus nec dolor sed ex tristique porta. In ac vehicula risus. Suspendisse a ipsum neque. In a placerat dui. Aliquam a tellus id augue porta blandit a placerat mauris. Quisque ex metus, consequat et laoreet ultrices, faucibus quis tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum euismod tortor, eget porttitor diam elementum a. Sed purus risus, facilisis vel aliquam at, dictum non dolor.  Proin molestie dapibus nunc, sed volutpat sapien sagittis a. Nullam porttitor justo eget sem tristique, tristique suscipit sem aliquet. Nunc arcu felis, varius ut tellus vel, pulvinar varius tellus. Phasellus augue ipsum, tincidunt quis finibus scelerisque, sollicitudin ac lorem. Nunc molestie rhoncus lacus, nec tincidunt orci faucibus volutpat. Maecenas sem felis, gravida a tellus vitae, tristique aliquet nisl. Nulla non turpis facilisis tellus blandit porta eget eget augue. Curabitur nec arcu suscipit, semper elit ut, convallis mauris. Ut at pellentesque ligula. Nulla non bibendum dolor.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a tristique erat. Vivamus nec dolor sed ex tristique porta. In ac vehicula risus. Suspendisse a ipsum neque. In a placerat dui. Aliquam a tellus id augue porta blandit a placerat mauris. Quisque ex metus, consequat et laoreet ultrices, faucibus quis tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum euismod tortor, eget porttitor diam elementum a. Sed purus risus, facilisis vel aliquam at, dictum non dolor.</p>\r\n\r\n<p>Proin molestie dapibus nunc, sed volutpat sapien sagittis a. Nullam porttitor justo eget sem tristique, tristique suscipit sem aliquet. Nunc arcu felis, varius ut tellus vel, pulvinar varius tellus. Phasellus augue ipsum, tincidunt quis finibus scelerisque, sollicitudin ac lorem. Nunc molestie rhoncus lacus, nec tincidunt orci faucibus volutpat. Maecenas sem felis, gravida a tellus vitae, tristique aliquet nisl. Nulla non turpis facilisis tellus blandit porta eget eget augue. Curabitur nec arcu suscipit, semper elit ut, convallis mauris. Ut at pellentesque ligula. Nulla non bibendum dolor.</p>', 0, 0, 1, '2020-08-12 15:16:37', 0, '0000-00-00 00:00:00', 'news', '', 0),
(2, NULL, 0, 'news sample 2', 'news-sample-2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a tristique erat. Vivamus nec dolor sed ex tristique porta. In ac vehicula risus. Suspendisse a ipsum neque. In a placerat dui. Aliquam a tellus id augue porta blandit a placerat mauris. Quisque ex metus, consequat et laoreet ultrices, faucibus quis tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum euismod tortor, eget porttitor diam elementum a. Sed purus risus, facilisis vel aliquam at, dictum non dolor.  Proin molestie dapibus nunc, sed volutpat sapien sagittis a. Nullam porttitor justo eget sem tristique, tristique suscipit sem aliquet. Nunc arcu felis, varius ut tellus vel, pulvinar varius tellus. Phasellus augue ipsum, tincidunt quis finibus scelerisque, sollicitudin ac lorem. Nunc molestie rhoncus lacus, nec tincidunt orci faucibus volutpat. Maecenas sem felis, gravida a tellus vitae, tristique aliquet nisl. Nulla non turpis facilisis tellus blandit porta eget eget augue. Curabitur nec arcu suscipit, semper elit ut, convallis mauris. Ut at pellentesque ligula. Nulla non bibendum dolor.', '<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xxx.PNG\" style=\"height:82px; width:170px\" /><img alt=\"\" src=\"/ckfinder/userfiles/files/ab.PNG\" style=\"height:119px; width:586px\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a tristique erat. Vivamus nec dolor sed ex tristique porta. In ac vehicula risus. Suspendisse a ipsum neque. In a placerat dui. Aliquam a tellus id augue porta blandit a placerat mauris. Quisque ex metus, consequat et laoreet ultrices, faucibus quis tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum euismod tortor, eget porttitor diam elementum a. Sed purus risus, facilisis vel aliquam at, dictum non dolor.</p>\r\n\r\n<p>Proin molestie dapibus nunc, sed volutpat sapien sagittis a. Nullam porttitor justo eget sem tristique, tristique suscipit sem aliquet. Nunc arcu felis, varius ut tellus vel, pulvinar varius tellus. Phasellus augue ipsum, tincidunt quis finibus scelerisque, sollicitudin ac lorem. Nunc molestie rhoncus lacus, nec tincidunt orci faucibus volutpat. Maecenas sem felis, gravida a tellus vitae, tristique aliquet nisl. Nulla non turpis facilisis tellus blandit porta eget eget augue. Curabitur nec arcu suscipit, semper elit ut, convallis mauris. Ut at pellentesque ligula. Nulla non bibendum dolor.</p>', 0, 0, 1, '2020-08-12 15:16:17', 0, '0000-00-00 00:00:00', 'news', '', 1),
(3, NULL, 0, 'Welcome to DigiMarine', 'welcome-to-digimarine', 'DigiMarine Provides software solution for different Applications depending on Projects and needs of our clients. We provide solution that will be beneficial for ones company or the entirity of the countrry.', '<p><strong>DigiMarine</strong>&nbsp;aims to develop a series of application PC software to combine the use of the Marine Electronics hardware to form a series of cost effective surveillance system suitable for different applications.</p>\r\n\r\n<p>DigiMarine Provides:</p>\r\n\r\n<ul>\r\n	<li>Hardware Compatible Products&nbsp;</li>\r\n	<li>DigiMarine Software</li>\r\n	<li>DigiMarine Solutions</li>\r\n</ul>', 0, 0, 1, '2020-08-12 15:17:35', 0, '0000-00-00 00:00:00', '', '', 1),
(4, 'news_banner_trial.jpg', 0, 'DigiMarine is Here!', 'digimarine-is-here', 'DigiMarine Provides software solution for different Applications depending on Projects and needs of our clients. We provide solution that will be beneficial for ones company or the entirety of the country.', '<p><strong>DigiMarine</strong>&nbsp;aims to develop a series of application PC software to combine the use of the Marine Electronics hardware to form a series of cost effective surveillance system suitable for different applications.</p>\r\n\r\n<p>DigiMarine Provides:</p>\r\n\r\n<ul>\r\n	<li>Hardware Compatible Products&nbsp;</li>\r\n	<li>DigiMarine Software</li>\r\n	<li>DigiMarine Solutions</li>\r\n</ul>', 1, 0, 1, '2020-07-31 15:22:38', 0, '0000-00-00 00:00:00', '', '', 1),
(5, 'ost_banner_21.jpg', NULL, 'DigiMarine joins the 5th Ocean Science & Technology Exhibition', 'digimarine-joins-the-5th-ocean-science-technology-exhibition', 'Despite the on going pandemic, the DigiMarine team joins  the 5th Ocean Science & Technology Exhibition to further intorduce DigiMarine and showcase our software products beneficial in the field of Ocean and Technology', '<p>Despite the on going pandemic, the DigiMarine team joins &nbsp;the 5th Ocean Science &amp; Technology Exhibition to further intorduce DigiMarine and showcase our software products beneficial in the field of Ocean and Technology.</p>\r\n\r\n<p>The 5th Qingdao International&nbsp;Ocean Science &amp; Technology Exhibition was held at Qingdao International Expo, China on September 22-24, 2020.&nbsp;The Exhibition is a brand exposition in the field of the ocean science and technology. It features the theme of &ldquo;Explore the ocean with technology; Fulfill the dream with innovation&rdquo;with the purpose to create the largest and most influential ocean scien-tech communication platform, tradeachievement platform and the product exhibition platform.</p>\r\n\r\n<p>During the 2 day exhibition,We showcased actual live demo of&nbsp;our 3 Marine Software:</p>\r\n\r\n<ul>\r\n	<li><a href=\"http://www.digimarintec.com/product/software/digifence\">DigiFence</a></li>\r\n	<li><a href=\"http://www.digimarintec.com/product/software/diginav\">DigiNav</a> and&nbsp;</li>\r\n	<li><a href=\"http://www.digimarintec.com/product/software/Digisonar\">DigiSonar.</a></li>\r\n</ul>\r\n\r\n<p>We also showcased <a href=\"http://www.digimarintec.com/product/hardware\">Hardware compatible products</a> from ONWA.</p>\r\n\r\n<p>Thank you to all our visitors, and we hope to see you on our&nbsp;upcoming exhibitions!<br />\r\nCheck out some of the images from the exhibition below:</p>', 1, 1, 1, '2020-10-06 16:31:28', NULL, NULL, NULL, NULL, 1),
(6, 'CIMEE_banner2.jpg', NULL, 'DigiMarine joins China Marine Economy Expo 2020', 'digimarine-joins-china-marine-economy-expo-2020', 'The DigiMarine Team joins yet another Marine Expo this year 2020. The DigiMarine team is pushing to further introduce the DigiMarine Company, Our Products, Software and Solutions, Hence,Despite the COVID-19 outbreak, We want to take part to different exhibitions to showcase our Software to further provide new Technology for the Marine Industry.', '<p>The DigiMarine Team joins yet another Marine Expo this year 2020, The&nbsp;China Marine Economy Expo 2020 . The DigiMarine team is pushing to further introduce the DigiMarine Company, Our Products, Software and Solutions, Hence,Despite the COVID-19 outbreak,&nbsp;We want to take part to different exhibitions to&nbsp;showcase our Software to further provide new Technology for the Marine Industry.</p>\r\n\r\n<p>In order to promote further development and cooperation in marine economy, the 2020 China Marine Economy Expo was held last&nbsp;October 15-18, 2020 at the Shenzhen Convention and Exhibition Center (in Futian District). The 2020 edition focused on shipbuilding and port shipping marine resources development, high-end offshore equipment, marine electronic information, marine biological medicine and marine conservation and safety, during which cutting-edge marine technologies and equipment from home and abroad was exhibited, and forums as well as other acivities was held concurrently.</p>\r\n\r\n<p>During the 4 day exhibition, The DigiMarine team showcased actual live demo of&nbsp;our 3 Marine Software:</p>\r\n\r\n<ul>\r\n	<li><a href=\"http://www.digimarintec.com/product/software/digifence\">DigiFence</a></li>\r\n	<li><a href=\"http://www.digimarintec.com/product/software/diginav\">DigiNav</a>&nbsp;and&nbsp;</li>\r\n	<li><a href=\"http://www.digimarintec.com/product/software/Digisonar\">DigiSonar.</a></li>\r\n</ul>\r\n\r\n<p>We also showcased&nbsp;<a href=\"http://www.digimarintec.com/product/hardware\">Hardware compatible products</a>&nbsp;from ONWA.</p>\r\n\r\n<p>Thank you to all our visitors, and we hope to see you on our&nbsp;upcoming exhibitions!<br />\r\n&nbsp;</p>', 1, NULL, 1, '2020-11-03 14:31:45', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id_pages` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `page_title` varchar(150) NOT NULL,
  `page_content` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_published` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `content_type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id_pages`, `url`, `page_title`, `page_content`, `is_active`, `is_published`, `created_by`, `date_created`, `modified_by`, `date_modified`, `is_deleted`, `content_type`) VALUES
(1, 'about-us', 'About Us', '<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<p>We are a group of engineers develop marine electronics equipment for over ten years.</p>\r\n\r\n<p><br />\r\nThe products we developed include marine radar, AIS, chart plotter, fish finder, autopilot and several kinds of sensors for marine use.</p>\r\n\r\n<p><br />\r\nThe aid of <strong>DigiMarine</strong> is to use our knowledge to develop a series of application PC software to combine the use of the hardware we developed in past ten years to form a series of cost effective surveillance system suitable for different applications.</p>\r\n\r\n<p><br />\r\nWe also develop a navigation PC software and free to use our standard version which provides chart plotter, radar, AIS, AIS, weather monitor and gauges functions.</p>\r\n</div>\r\n\r\n<div class=\"col-md-6\"><img alt=\"\" class=\"img-fluid d-block mx-auto\" src=\"/ckfinder/userfiles/files/about.png\" /></div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-4 justify-content-center align-self-center\">\r\n<h2 class=\"text-uppercase text-center\">Our Partners</h2>\r\n</div>\r\n\r\n<div class=\"col-md-8\"><img alt=\"\" class=\"img-fluid d-block mx-auto\" src=\"/ckfinder/userfiles/files/onwa.png\" /></div>\r\n</div>\r\n', 1, 0, 1, '2020-07-20 23:18:37', 0, '0000-00-00 00:00:00', 0, NULL),
(2, 'advertisement_sponsors', 'Advertisement & Sponsors', '<div class=\"row\">\r\n                            <div class=\"col-xs-12\">\r\n                                <p>\r\n                                    CHANNEL HUE TV CONSTANTLY HAS ORIGINAL PROGRAMMES IN PRODUCTION OR IN DEVELOPMENT COVERING MANY GENRES. WITH THAT IN MIND, WE CAN TARGET YOUR COMMERCIAL OR ADVERTISING TO EFFECTIVELY REACH THE RIGHT VIEWER DEMOGRAPHIC. ADDITIONALLY, IF YOUR COMPANY IS PARTICULARLY SUITED TO ONE OF THESE PROGRAMMES, YOU MAY EXCLUSIVELY SPONSOR A SINGLE PROGRAMME OR SERIES, AND DECISIVELY AFFILIATE YOUR BRAND WITH THE CONTENT, OR WITH THE STARS OR PRESENTERS OF THE PROGRAMMES - ALL OPTIONS ARE OPEN TO DISCUSSION, INCLUDING THE OPPORTUNITY TO FEATURE YOUR COMPANY, BRAND OR PRODUCT AS A FEATURE IN ONE OF THE SHOWS.\r\n                                    FEEL FREE TO CONTACT US AT ANY TIME TO SEE HOW WE CAN INCORPORATE YOUR IDEAS WITHIN OUR UNIQUE AND ORIGINAL PROGRAMMING.\r\n                                </p>\r\n                            </div>\r\n                        </div>\r\n                        <div class=\"col-xs-12\">\r\n                           <div class=\"col-xs-3 text-center\">\r\n                                <h3>Rapha Health</h3>\r\n                                <iframe src=\"https://player.vimeo.com/video/234842251\" width=\"640\" height=\"360\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen style=\"width:100%;height:100%;\"></iframe>\r\n                           </div>\r\n                           <div class=\"col-xs-3 text-center\">\r\n                                <h3>Mode de Vi</h3>\r\n                                <iframe src=\"https://player.vimeo.com/video/216362322\" width=\"640\" height=\"360\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen style=\"width:100%;height:100%;\"></iframe>\r\n                           </div>\r\n                            <div class=\"col-xs-3 text-center\">\r\n                                <h3>Marco Polo</h3>\r\n                                <iframe src=\"https://player.vimeo.com/video/208470835\" width=\"640\" height=\"360\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen style=\"width:100%;height:100%;\"></iframe>\r\n                           </div>\r\n                           <div class=\"col-xs-3 text-center\">\r\n                                <h3>KLM </h3>\r\n                                <iframe src=\"https://player.vimeo.com/video/197080597\" width=\"640\" height=\"360\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen style=\"width:100%;height:100%;\"></iframe>\r\n                           </div>\r\n                        </div>', 1, 0, 1, '2018-01-26 17:16:33', 0, '0000-00-00 00:00:00', 0, NULL),
(3, 'testdx', 'testdx', '<p>testdx</p>\r\n', 1, 0, 1, '2018-01-20 17:10:26', 0, '0000-00-00 00:00:00', 0, NULL),
(4, 'home', 'Home', '<div class=\"row\">\r\n<div class=\"col-lg-6\">\r\n<h2 class=\"text-center\">&nbsp;</h2>\r\n\r\n<h2 class=\"text-center\">&nbsp;</h2>\r\n\r\n<h2 class=\"text-center\">&nbsp;</h2>\r\n\r\n<h2 class=\"text-center\"><strong>Welcome to DigiMarine!</strong></h2>\r\n\r\n<hr />\r\n<p class=\"text-center\"><strong>DigiMarine</strong> aims to develop a series of application PC software to combine the use of the Marine Electronics hardware to form a series of cost effective surveillance system suitable for different applications.</p>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/youtube_resized.jpg\" style=\"width: 653px; height: 438px;\" /> <a class=\"venobox play-btn mb-4\" data-autoplay=\"true\" data-vbtype=\"video\" href=\"https://www.youtube.com/watch?v=haMyyXK1T2w\">&nbsp;</a></div>\r\n</div>\r\n', 1, 0, 1, '2020-11-17 11:24:35', 0, '0000-00-00 00:00:00', 0, NULL),
(5, 'test1', 'testasdasdasddddd', '<p>test</p>\r\n', 1, 0, 1, '2020-07-08 09:24:30', 0, '0000-00-00 00:00:00', 0, NULL),
(6, 'downloads', 'Downloads', '<p>&nbsp;</p>\r\n\r\n<div class=\"container mt-3\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<div class=\"main-content\"><img alt=\"\" src=\"/ckfinder/userfiles/files/DIGINAV%20LOGO%20EDIT%2002.png\" style=\"width: 280px; height: 126px;\" /></div>\r\n</div>\r\n\r\n<div class=\"col-sm-4\"><!--Nested rows within a column-->\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<div class=\"sidebar-content\">\r\n<p><big><strong>DigiNav Software</strong> </big><br />\r\nComplete Marine Navigation Software</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-6\">\r\n<div class=\"sidebar-content\">Trial Software<br />\r\n&nbsp;\r\n<p><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto venobox\" data-vbtype=\"inline\" href=\"#trial-diginav\">7 days free trial</a></p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-6\">\r\n<div class=\"sidebar-content\">Purchase License\r\n<div class=\"animated fadeInUp scrollto\" id=\"paypal-button-container-1\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"container mt-3\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<div class=\"main-content\"><img alt=\"\" src=\"/ckfinder/userfiles/files/DIGISONAR%20LOGO%20EDIT.png\" style=\"width: 345px; height: 125px;\" /></div>\r\n</div>\r\n\r\n<div class=\"col-sm-4\"><!--Nested rows within a column-->\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<div class=\"sidebar-content\">\r\n<p><big><strong>DigiSonar&nbsp;Software</strong> </big><br />\r\nFish&nbsp; Finder Software</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-6\">\r\n<div class=\"sidebar-content\">Trial Software<br />\r\n&nbsp;\r\n<p><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto venobox\" data-vbtype=\"inline\" href=\"#trial-digisonar\">7 days free trial</a></p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-6\">\r\n<div class=\"sidebar-content\">Purchase License\r\n<div class=\"animated fadeInUp scrollto\" id=\"paypal-button-container-2\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"container mt-3\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<div class=\"main-content\"><img alt=\"\" src=\"/ckfinder/userfiles/files/DIGIFENCE%20LOGO%20EDIT%20003.png\" style=\"width: 320px; height: 120px;\" /></div>\r\n</div>\r\n\r\n<div class=\"col-sm-4\"><!--Nested rows within a column-->\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<div class=\"sidebar-content\">\r\n<p><big><strong>DigiFence&nbsp;Software</strong> </big><br />\r\nAct like a fence in the sea,</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-6\">\r\n<div class=\"sidebar-content\">Trial Software<br />\r\n&nbsp;\r\n<p><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto venobox\" data-vbtype=\"inline\" href=\"#trial-digifence\">7 days free trial</a></p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"col-6\">\r\n<div class=\"sidebar-content\">Purchase License\r\n<div class=\"animated fadeInUp scrollto\" id=\"paypal-button-container-3\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div id=\"trial-diginav\" style=\"display:none;\">\r\n<div style=\"background:#fff; width:100%; height:100%; float:left; padding:10px; text-align:center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/DIGINAV%20LOGO%20EDIT%2002.png\" style=\"width: 240px; height: 100px;\" />\r\n<p>To Download the DigiNav Software Trial Version<br />\r\nInput a valid Email Address Below</p>\r\n<input id=\"email1\" name=\"email1\" type=\"text\" /><br />\r\n<br />\r\n<a class=\"btn btn-primary btn-get-started scrollto venobox\" data-vbtype=\"inline\" href=\"#trial-diginav\">Get Trial Version</a></div>\r\n</div>\r\n\r\n<div id=\"trial-digisonar\" style=\"display:none;\">\r\n<div style=\"background:#fff; width:100%; height:100%; float:left; padding:10px; text-align:center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/DIGISONAR%20LOGO%20EDIT.png\" style=\"width: 250px; height: 90px;\" />\r\n<p>To Download the DigiSonar Software Trial Version<br />\r\nInput a valid Email Address Below</p>\r\n<input id=\"email2\" name=\"email2\" type=\"text\" /><br />\r\n<br />\r\n<a class=\"btn btn-primary btn-get-started scrollto venobox\" data-vbtype=\"inline\" href=\"#trial-diginav\">Get Trial Version</a></div>\r\n</div>\r\n\r\n<div id=\"trial-digifence\" style=\"display:none;\">\r\n<div style=\"background:#fff; width:100%; height:100%; float:left; padding:10px; text-align:center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/DIGIFENCE%20LOGO%20EDIT%20003.png\" style=\"width: 250px; height: 100px;\" />\r\n<p>To Download the DigiFence Software Trial Version<br />\r\nInput a valid Email Address Below</p>\r\n<input class=\"email3\" type=\"text\" /><br />\r\n<br />\r\n<a class=\"btn btn-primary btn-get-started scrollto trial-btn-df-submit\" data-vbtype=\"inline\">Get Trial Version</a></div>\r\n<script>\r\n  $(\'.trial-btn-df-submit\').click( function() {\r\n    var email3 = $(\'.email3\').map((_,el) => el.value).get();\r\n    var x = email3[1];\r\n    $.ajax(\"/digimarine/digiapi/trial/\", {\r\n      contentType: \"application/x-www-form-urlencoded\",\r\n      data: {\'email\': x, \'prod_id\' : \'df\' },\r\n      type: \"POST\",\r\n      success: function(response) {\r\n			alert(JSON.stringify(response));\r\n    	}\r\n    });\r\n  });\r\n</script></div>\r\n\r\n<div id=\"trial-confirm\" style=\"display:none;\">\r\n<div style=\"background:#fff; width:100%; height:100%; float:left; padding:10px; text-align:center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/logo.png\" style=\"width: 250px; height: 88px;\" />\r\n<p>Thank you, We have sent an email to <email-add> for details regarding the trial.<br />\r\n<br />\r\n<a class=\"btn btn-primary btn-get-started scrollto venobox\" data-vbtype=\"inline\" href=\"#trial-diginav\">Close</a></email-add></p>\r\n</div>\r\n</div>\r\n', 1, 0, 1, '2021-01-29 07:25:03', 0, '0000-00-00 00:00:00', 0, NULL),
(7, 'forums', 'Forums', '<div class=\"col-lg-12\">\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/underconstruction.jpg\" class=\"img-fluid\"/></p>\r\n</div>', 1, 0, 1, '2020-07-19 14:16:28', 0, '0000-00-00 00:00:00', 0, NULL),
(8, 'trialpage', 'Trial Page', '<p>Thank you&nbsp;</p>\r\n', 1, 0, 1, '2020-11-24 15:56:35', 0, '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `long_desc` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_publish` int(11) NOT NULL DEFAULT 1,
  `is_hf` int(11) DEFAULT 0,
  `type` text DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp(),
  `content_type` text DEFAULT NULL,
  `video_url` text DEFAULT NULL,
  `featured_image_url` text DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `slug`, `image`, `category`, `title`, `meta_desc`, `long_desc`, `created_by`, `date_created`, `is_publish`, `is_hf`, `type`, `subcategory_id`, `updated_by`, `updated_at`, `content_type`, `video_url`, `featured_image_url`, `is_deleted`) VALUES
(2, 'digifence', 'DigiFence_Banner7.jpg', 2, 'DigiFence', 'Acts like a fence to protect your property within the fence area on the sea. ', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#features\">Features</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#installation-options\">Installation Options</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#solutions\">Solutions</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container about\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>DIGIFENCE</strong></h2>\r\n\r\n<p>The DigiFence system forms a near real time like surface picture to ensure more efficient patrol and search-rescue operations in coastal areas, so that it would be possible to enhance the level of collaboration with the other public entities. The system goal is make it possible to perfectly and efficiently monitor all the territorial waters and adjacent zones, and struggle with such crimes as trafficking, illegal immigration, fishery and maritime pollution.</p>\r\n\r\n<p>The DigiFence system forms an recognized Surface Picture by means of the fusion and identification of the system trace data through the Automatic Identification System (AIS) and the radar or radars.</p>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/youtube%20resized.jpg\" style=\"width: 653px; height: 438px;\" /> <a class=\"venobox play-btn mb-4\" data-autoplay=\"true\" data-vbtype=\"video\" href=\"https://www.youtube.com/watch?v=haMyyXK1T2w\">&nbsp;</a></div>\r\n</div>\r\n</div>\r\n</section>\r\n<!-- Features -->\r\n\r\n<section id=\"features\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/DigiFence/DigiFence%20Features%20resized.jpg\" style=\"width: 580px; height: 389px;\" /></div>\r\n\r\n<div class=\"col-md-6\">\r\n<h2><strong>Features:</strong></h2>\r\n\r\n<p>In the Surveillance center, the DigiFence software provides the following:</p>\r\n\r\n<p><strong>&gt;&gt; </strong>Combines the targets information from radar and AIS to analyse the nature of the target</p>\r\n\r\n<p><strong>&gt;&gt;</strong> Protected area can be drawn by the user to set the alarm inside or outside the draw boundary</p>\r\n\r\n<p><strong>&gt;&gt;</strong> Surveillance camera trace the tracked target</p>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<!-- Installation Options -->\r\n\r\n<section id=\"installation-options\">\r\n<div class=\"container\">\r\n<h2 class=\"text-uppercase\">Installation Options</h2>\r\n\r\n<ul class=\"content-slider list-unstyled clearfix lightSlider lsGrab lSSlide\" id=\"productSlider\">\r\n	<li class=\"lslide active\">\r\n	<div class=\"row\">\r\n	<div class=\"col-md-6\">\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3><strong>Basic system:</strong></h3>\r\n\r\n	<p>The system connect directly to the surveillance center. The system combines all information, from radar, AIS, surveillance camera and anemometer, send to the surveillance center.</p>\r\n	</div>\r\n\r\n	<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/DigiFence/Installation%20Options-%20Basic.JPG\" style=\"width: 500px; height: 400px;\" /></div>\r\n	</div>\r\n	</li>\r\n	<li class=\"lslide active\">\r\n	<div class=\"row\">\r\n	<div class=\"col-md-6\">\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3><strong>Cloud version:</strong></h3>\r\n\r\n	<p>All sensors, radar, camera, ais and anemometer information, can be controlled through internet in case the sensors are installed on a remote area.</p>\r\n	</div>\r\n\r\n	<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/DigiFence/Installation%20Options-Cloud.JPG\" style=\"width: 500px; height: 402px;\" /></div>\r\n	</div>\r\n	</li>\r\n	<li class=\"lslide\">\r\n	<div class=\"row\">\r\n	<div class=\"col-md-6\">\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3><strong>Hybrid power system :</strong></h3>\r\n\r\n	<p>In case there are no electric power available on the site we can provide solar power and wind power system as am option.</p>\r\n	</div>\r\n\r\n	<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/DigiFence/Installation%20Options-Hybrid%20Power.JPG\" style=\"width: 310px; height: 350px;\" /></div>\r\n	</div>\r\n	</li>\r\n	<li class=\"lslide\">\r\n	<div class=\"row\">\r\n	<div class=\"col-md-6\">\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3>&nbsp;</h3>\r\n\r\n	<h3><strong>Microwave communication system:</strong></h3>\r\n\r\n	<p>In case network is not available around the site we can provide different option microwave communication solution for different landscape.</p>\r\n	</div>\r\n\r\n	<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/DigiFence/Installation%20Options-%20microwave.JPG\" style=\"width: 500px; height: 350px;\" /></div>\r\n	</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n</section>\r\n<!-- Solutions -->\r\n\r\n<section id=\"solutions\">\r\n<h2 class=\"text-uppercase text-center\"><strong>Solutions</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>AIS Coastal Monitoring</strong></h3>\r\n\r\n<p>DigiMarine AIS Coastal Monitoring solution will enable the user to montior all AIS vessels within the set up coastal territory.</p>\r\n\r\n<div class=\"mt-3 text-right\"><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto\" href=\"http://digimarintec.com/product/solutions/ais-coastal-monitoring\">Learn More</a></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/DigiFence/Solutions%201%20resized.jpg\" style=\"width: 500px; height: 335px;\" /></div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/DigiFence/Solutions%202%20resized.jpg\" style=\"width: 500px; height: 335px;\" /></div>\r\n\r\n<div class=\"col-md-6\">\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>AIS Tracking Solution</strong></h3>\r\n\r\n<p>AIS Tracking solutiont tends to track fishing vessels specially those small vessels for protection out in the sea and to prevent entering prohibited fishing zone</p>\r\n\r\n<div class=\"mt-3 text-left\"><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto\" href=\"http://digimarintec.com/product/solutions/aistracking\">Learn More</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-12 07:32:57', 1, 1, 'software', 0, 1, '2020-09-28 01:02:50', 'product', 'https://www.youtube.com/watch?v=haMyyXK1T2w', 'Youtube.jpg', 1),
(4, 'ais-coastal-monitoring', 'AIS_Coastal_Monitoring_Banner1.jpg', 3, 'AIS Coastal Monitoring', 'Check and monitor all vessels within the Country Border', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dcms\">DigiMarine Coastal Monitoring Software</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#add-ons\">Add-Ons</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h2><strong>AIS Coastal Monitoring Solution</strong></h2>\r\n\r\n<p>AIS COASTAL MONITORING is beneficial for monitoring all vessels within the Country Border.</p>\r\n\r\n<p>To cover the country border, There will be several coastal stationsand each station will be equipped with an AIS Receiver withnetwork connection (KS-200B_N). The AIS Information of all coastal station are sent to a Control Center through Internet.</p>\r\n\r\n<p>Requirements of AIS Coastal Monitoring system:</p>\r\n\r\n<p>&bull; AIS Receiver with network connection</p>\r\n\r\n<p>&bull; Internet connection on every coastal station</p>\r\n\r\n<p>&bull; Control center with fix IP internet service</p>\r\n\r\n<p>&bull; VMS software (You can use existing VMS Software or you can also use <strong>DIGIMARINE COASTAL monitoring system)</strong></p>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/AIS%20Coastal%20Monitoring%20System/AIS%20Coastal%20Monitoring%20Image%201.jpg\" style=\"width: 653px; height: 438px;\" /></div>\r\n</div>\r\n</div>\r\n</section>\r\n<!-- Features -->\r\n\r\n<section id=\"dcms\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2><strong>DIGIFENCE COASTAL MONITORING SYSTEM</strong></h2>\r\n\r\n<p>The DIGIMARINE AIS Monitoring system can be tailor made to any necessary functions of different requirements.:</p>\r\n\r\n<p>Features:</p>\r\n\r\n<ul>\r\n	<li><strong>Ship Type Filtering</strong>: Search by 197 different ship types (based on Statcode 5 system)</li>\r\n	<li><strong>Ship Track on Map</strong>: Visualize up to 30 days ship track</li>\r\n	<li><strong>Ship Watch/Alerts and Zone Services</strong>: Use these automated services to track current vessel positions and destination changes. Create your bespoke alert zone to be notified when a ship goes through a specified area.</li>\r\n	<li><strong>Ship Watch/Alerts and Zone Services</strong>: Use these automated services to track current vessel positions and destination changes. Create your bespoke alert zone to be notified when a ship goes through a specified area.</li>\r\n	<li><strong>Easy to Navigate</strong>: Quickly and intuitively conduct map searches and use interactive charts with ability to zoom in 16 levels</li>\r\n	<li><strong>Distance Tables Module</strong>: Calculate a ship&rsquo;s arrival with greater accuracy</li>\r\n	<li><strong>Real-time Ship Movements</strong>: Track ship locations worldwide, 24/7 online</li>\r\n	<li><strong>Verified Ship Data</strong>: Find name, technical manager and commercial operator, type, call sign, dimensions and photos</li>\r\n	<li><strong>Ship Search</strong>: Locate current or last reported position</li>\r\n	<li>Seamless Connectivity to KS200B_N</li>\r\n	<li>Customize to the requirements of different customer</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<!-- Installation Options -->\r\n\r\n<section id=\"add-ons\">\r\n<div class=\"container\">\r\n<h2 class=\"text-uppercase\"><strong>ADD-ON:</strong></h2>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h2><strong>DIGIFENCE AIS COASTAL MONITORING SOFTWARE</strong></h2>\r\n\r\n<p>Can be integrated to the standard Coastal Monitoring system for customers who want to build AIS tracking monitoring system.</p>\r\n\r\n<p>Overview:</p>\r\n\r\n<p><strong>&gt;&gt;</strong> Coastal outline background included for a radar style display, with a world-wide coastal database included in the software so that the background is automatically displayed.</p>\r\n\r\n<p><strong>&gt;&gt;</strong> The ability to log AIS data and to play back data for any chosen period.</p>\r\n\r\n<p><strong>&gt;&gt;</strong> The ability to handle large numbers of targets at once; tested with 500+ targets!</p>\r\n\r\n<p><strong>&gt;&gt;</strong> Can mark and track selected AIS targets, max. 20 targets (just like ARPA in radar.)</p>\r\n\r\n<p><strong>&gt;&gt;</strong> Decode DigiMarine Tracking Group ID and display as vessel symbol with different color other than Class A and Class targets.</p>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/AIS%20Coastal%20Monitoring%20System/AIS%20Coastal%20Monitoring%20Add-ON.jpg\" style=\"width: 90%;\" /></div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-12 07:33:15', 1, 1, 'solutions', 0, 1, '2020-08-08 14:10:31', 'product', '', 'AIS_Coastal_Monitoring_Add-ON-2.png', 1),
(5, 'ks-33nt', 'KS-33NT_Banner13.jpg', 1, 'ONWA KS-33NT: AIS/GPS Tracker', 'ONWA KS-33NT uses AIS Technology transmiting data such as vessel ‘s information (MMSI, vessel name,  vessel size....), location information (lat/long) speed and heading at 5 minutes intervals. <br> KS-33NT is used in DigiMarine AIS Tracking Project, for t', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#application\">Application</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#optional-accessory\">Optional Accessory</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#program-software\">Program Software</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KS-33NT Features</strong></h2>\r\n\r\n<div class=\"d-flex\">\r\n<ul>\r\n	<li class=\"nav-item\">High transmit power, up to 12.5W</li>\r\n	<li class=\"nav-item\">Apply AIS technology</li>\r\n	<li class=\"nav-item\">Can be tracked by Class A or Class B AIS receiver or transponder</li>\r\n	<li class=\"nav-item\">Long working hours, up to 15 days</li>\r\n	<li class=\"nav-item\">Waterproof, IPX7</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20Features.jpg\" /></div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20Banner%202.jpg\" style=\"width:100%;\" /></div>\r\n</section>\r\n\r\n<section id=\"application\">\r\n<h2 class=\"text-center\"><strong>KS-33NT Application</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-xs-12 col-md-3 col-lg-3\">\r\n<ul>\r\n	<li class=\"nav-item\">Geo-fence</li>\r\n	<li class=\"nav-item\">Tracking of Fish nets</li>\r\n	<li class=\"nav-item\">Tracking of Crab pots</li>\r\n	<li class=\"nav-item\">Fishery Management</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-xs-12 col-md-3 col-lg-3\">\r\n<ul>\r\n	<li class=\"nav-item\">Boat tracking</li>\r\n	<li class=\"nav-item\">AIS AtoN</li>\r\n	<li class=\"nav-item\">AIS SART</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20Application.jpg\" style=\"width:80%\" /></div>\r\n</div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KS-33NT Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt/33nt%20specifications.jpg\" style=\"width: 1080px; height: 392px;\" /></div>\r\n</section>\r\n<!-- Optional Accessory -->\r\n\r\n<section id=\"optional-accessory\">\r\n<p><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20Dimension.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20OPtional%20Accessories.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1d988mxO8kpbbOqTgoXwi9CyZVlBpvC2P\" rel=\"noopener\" target=\"_blank\">KS-33NT Programming Manual</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1aglQDGwy7a5ArZvfLCp9MdEVcBEXhOaE\" rel=\"noopener\" target=\"_blank\">KS-33NT Brochure</a></div>\r\n</div>\r\n&nbsp;\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/18DHUT6VWh52iOd2eo9Mzkl3jIoBeIcrB/view\" rel=\"noopener\" target=\"_blank\">KS-33NT User Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section id=\"program-software\">\r\n<h2 class=\"text-center\"><strong>Programming Software</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"col-12 col-lg-12 \"><img src=\"http://onwamarine.com/wp-content/uploads/2020/03/download-icon.jpg\" />&nbsp;<a href=\"https://drive.google.com/drive/folders/1d988mxO8kpbbOqTgoXwi9CyZVlBpvC2P\" rel=\"noopener\" target=\"_blank\">KS-33NT programming software (ONWA Tracking-V1.10)</a></div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-04 09:30:02', 1, 1, 'hardware', 2, 1, '2020-08-08 15:14:45', 'product', '', 'KS33NT-2.png', 1),
(6, 'aistracking', 'AIS_Tracking_SOlution2.jpg', 3, 'AIS Tracking Solution', 'Fishery Management Solution <br> Track and protect fishing boats using KS-33NT hardware and DigiMarine AIS Tracking Solution. ', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dcms\">DigiMarine AIS Tracking System</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#add-ons\">Hardware Specifications</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h2><strong>AIS Tracking Solution</strong></h2>\r\n\r\n<p>Track and protect fishing boats using KS-33NT hardware and DigiMarine AIS Tracking Solution.&nbsp;</p>\r\n\r\n<p><em>KS-33NT Fishery Monitoring software Functions: </em></p>\r\n\r\n<ul>\r\n	<li><strong>Transmit</strong> vessel &lsquo;s information (MMSI, vessel name, vessel size....), location information (lat/long) speed and heading at 5 minutes intervals.</li>\r\n	<li><strong>Bracket tamper </strong>alarm to CMS (Central Monitoring system) when the device been removed from the bracket.</li>\r\n	<li><strong>Transmit AIS SART</strong> message when manual distress button is pressed or activated.</li>\r\n	<li><strong>GPS Tamper </strong>alarm to CMS when device unable to get a good GPS fix.</li>\r\n	<li><strong>Power Tamper</strong> alarm to CMS when the device battery capacity droppedbelow 50%</li>\r\n	<li><strong>Genfence Violation </strong>when vessels&rsquo; speed is between 1 to 4 knots when vessel is within the prohibit fishing zone (The prohibit fishing zone can be programmed)</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/AIS%20Tracking%20Solution/ais%20tracking%20solution%201.jpg\" style=\"width: 653px; height: 438px;\" /></div>\r\n</div>\r\n</div>\r\n</section>\r\n<!-- Features -->\r\n\r\n<section id=\"dcms\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2><strong>DigiMarine AIS Tracking system</strong></h2>\r\n\r\n<p>The DIGIMARINE AIS Tracking system can be tailor made to any necessary functions of different requirements.</p>\r\n\r\n<p>Requirements: &nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p>&bull; DigiMarine GPS/Tracking Device: KS33NT &nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p>&bull; 12V DC Solar Charger &nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&bull; Built-in software for Fishery monitoring</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/AIS%20Tracking%20Solution/KS-33NT.jpg\" style=\"width: 857px; height: 364px;\" /></p>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<!-- Installation Options -->\r\n\r\n<section id=\"add-ons\">\r\n<div class=\"container\">\r\n<h2 class=\"text-uppercase\"><strong>HARDWARE SPECIFICATION:</strong></h2>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h2><strong>KS-33NT hardware specification:</strong></h2>\r\n\r\n<p>&bull; Transmit its position data at 5 minutes interval for at least 10 days without charging.</p>\r\n\r\n<p>&bull; Not be affected by any weather condition (rain, wind and wave).</p>\r\n\r\n<p>&bull; Certified to IP66 standard (EU and US certified).</p>\r\n\r\n<p>&bull; Self recharging by solar charger &bull; High transmit power : 12.5W</p>\r\n\r\n<p>&bull; Built-in robust and long lasting antenna</p>\r\n\r\n<p>&bull; Operating in AIS standard</p>\r\n\r\n<p>&bull; Housing material : High quality ABS</p>\r\n\r\n<p>&bull; Operating temperature : -20 to +80 C</p>\r\n\r\n<div class=\"mt-3 text-left\"><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto\" href=\"http://www.digimarintec.com/product/hardware/ais-tracker/ks-33nt\">Learn More</a></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/AIS%20Tracking%20Solution/ais%20tracking%20solution%203.jpg\" style=\"width: 653px; height: 438px;\" /></div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-21 21:23:37', 1, 1, NULL, 0, 1, '2020-08-21 22:48:49', NULL, '', 'ais_tracking_solution_11.jpg', 1),
(8, '33ntx', 'Top_Banner_01.jpg', 1, 'ONWA KS-33NT_X: AIS/GPS Tracker (External Antenna)', 'ONWA KS-33NT uses AIS Technology transmiting data such as vessel ‘s information (MMSI, vessel name,  vessel size....), location information (lat/long) speed and heading at 5 minutes intervals. <br> KS-33NT is used in DigiMarine AIS Tracking Project, for t', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#application\">Application</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#optional-accessory\">Optional Accessory</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#program-software\">Program Software</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KS-33NT_X Features</strong></h2>\r\n\r\n<div class=\"d-flex\">\r\n<ul>\r\n	<li class=\"nav-item\">AIS GPS Tracker&nbsp;<strong>(External Antenna Version)</strong></li>\r\n	<li class=\"nav-item\">High transmit power, up to 12.5W</li>\r\n	<li class=\"nav-item\">Apply AIS technology</li>\r\n	<li class=\"nav-item\">Can be tracked by Class A or Class B AIS receiver or transponder</li>\r\n	<li class=\"nav-item\">Long working hours, up to 15 days</li>\r\n	<li class=\"nav-item\">Waterproof, IPX7</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt_X/KS-33NT%20Features.jpg\" style=\"width:100%;\" /></div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20Banner%202.jpg\" style=\"width:100%;\" /></div>\r\n</section>\r\n\r\n<section id=\"application\">\r\n<h2 class=\"text-center\"><strong>KS-33NT_X Application</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-xs-12 col-md-3 col-lg-3\">\r\n<ul>\r\n	<li class=\"nav-item\">Geo-fence</li>\r\n	<li class=\"nav-item\">Tracking of Fish nets</li>\r\n	<li class=\"nav-item\">Tracking of Crab pots</li>\r\n	<li class=\"nav-item\">Fishery Management</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-xs-12 col-md-3 col-lg-3\">\r\n<ul>\r\n	<li class=\"nav-item\">Boat tracking</li>\r\n	<li class=\"nav-item\">AIS AtoN</li>\r\n	<li class=\"nav-item\">AIS SART</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20Application.jpg\" style=\"width:80%\" /></div>\r\n</div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KS-33NT_X Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt_X/Specifications.jpg\" style=\"width: 1600px; height: 460px;\" /></div>\r\n</section>\r\n<!-- Optional Accessory -->\r\n\r\n<section id=\"optional-accessory\">\r\n<p><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20Dimension.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20OPtional%20Accessories.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1d988mxO8kpbbOqTgoXwi9CyZVlBpvC2P\" rel=\"noopener\" target=\"_blank\">KS-33NT_X Programming Manual</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1aglQDGwy7a5ArZvfLCp9MdEVcBEXhOaE\" rel=\"noopener\" target=\"_blank\">KS-33NT_X Brochure</a></div>\r\n</div>\r\n&nbsp;\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/18DHUT6VWh52iOd2eo9Mzkl3jIoBeIcrB/view\" rel=\"noopener\" target=\"_blank\">KS-33NT_X User Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section id=\"program-software\">\r\n<h2 class=\"text-center\"><strong>Programming Software</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"col-12 col-lg-12 \"><img src=\"http://onwamarine.com/wp-content/uploads/2020/03/download-icon.jpg\" />&nbsp;<a href=\"https://drive.google.com/drive/folders/1d988mxO8kpbbOqTgoXwi9CyZVlBpvC2P\" rel=\"noopener\" target=\"_blank\">KS-33NT_X programming software (ONWA Tracking-V1.10)</a></div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-30 19:48:39', 1, 0, NULL, 2, 1, '2020-07-30 19:53:31', NULL, '', '', 1),
(9, 'ks33nt_x', 'Top_Banner_0114.jpg', 1, 'ONWA KS-33NT_X: AIS/GPS Tracker (External Antenna)', '', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#application\">Application</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#optional-accessory\">Optional Accessory</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#program-software\">Program Software</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KS-33NT_X Features</strong></h2>\r\n\r\n<div class=\"d-flex\">\r\n<ul>\r\n	<li class=\"nav-item\">AIS GPS Tracker&nbsp;<strong>(External Antenna Version)</strong></li>\r\n	<li class=\"nav-item\">High transmit power, up to 12.5W</li>\r\n	<li class=\"nav-item\">Apply AIS technology</li>\r\n	<li class=\"nav-item\">Can be tracked by Class A or Class B AIS receiver or transponder</li>\r\n	<li class=\"nav-item\">Long working hours, up to 15 days</li>\r\n	<li class=\"nav-item\">Waterproof, IPX7</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt_X/KS-33NT%20Features.jpg\" style=\"width:100%;\" /></div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt_X/Middle%20Banner%20KS-33NT_X.jpg\" style=\"width:100%;\" /></div>\r\n</section>\r\n\r\n<section id=\"application\">\r\n<h2 class=\"text-center\"><strong>KS-33NT_X Application</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-xs-12 col-md-3 col-lg-3\">\r\n<ul>\r\n	<li class=\"nav-item\">Geo-fence</li>\r\n	<li class=\"nav-item\">Tracking of Fish nets</li>\r\n	<li class=\"nav-item\">Tracking of Crab pots</li>\r\n	<li class=\"nav-item\">Fishery Management</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-xs-12 col-md-3 col-lg-3\">\r\n<ul>\r\n	<li class=\"nav-item\">Boat tracking</li>\r\n	<li class=\"nav-item\">AIS AtoN</li>\r\n	<li class=\"nav-item\">AIS SART</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20Application.jpg\" style=\"width:80%\" /></div>\r\n</div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KS-33NT_X Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt_X/Specifications.jpg\" style=\"width: 80%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<section id=\"dimension\">\r\n<h2 class=\"text-center text-uppercase\"><strong>Dimensions</strong></h2>\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/33nt/KS-33NT%20Dimension.jpg\" style=\"width:80%\" /></div>\r\n</section>\r\n<!-- Optional Accessory -->\r\n\r\n<section id=\"optional-accessory\">\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/33nt_X/Bottom%20Banner%20KS-33NT_X.png\" style=\"width:100%\" /></p>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1d988mxO8kpbbOqTgoXwi9CyZVlBpvC2P\" rel=\"noopener\" target=\"_blank\">KS-33NT_X Programming Manual</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1aglQDGwy7a5ArZvfLCp9MdEVcBEXhOaE\" rel=\"noopener\" target=\"_blank\">KS-33NT_X Brochure</a></div>\r\n</div>\r\n&nbsp;\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/18DHUT6VWh52iOd2eo9Mzkl3jIoBeIcrB/view\" rel=\"noopener\" target=\"_blank\">KS-33NT_X User Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section id=\"program-software\">\r\n<h2 class=\"text-center\"><strong>Programming Software</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"col-12 col-lg-12 \"><img src=\"http://onwamarine.com/wp-content/uploads/2020/03/download-icon.jpg\" />&nbsp;<a href=\"https://drive.google.com/drive/folders/1d988mxO8kpbbOqTgoXwi9CyZVlBpvC2P\" rel=\"noopener\" target=\"_blank\">KS-33NT_X programming software (ONWA Tracking-V1.10)</a></div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-30 19:54:58', 1, 0, NULL, 2, 1, '2020-08-08 15:20:28', NULL, '', 'KS33NT-X-4.png', 1),
(10, 'kmsonar', 'Top_Banner_014.jpg', 1, 'KM-Sonar: Fish Finder Blackbox', 'KM-Sonar Black Box', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#application\">Connection</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KM-SONAR Features</strong></h2>\r\n\r\n<div class=\"d-flex\">\r\n<ul>\r\n	<li><strong>KM-Sonar</strong> is a Fishfinder black box designed to work with a PC or ONWA Multi-function display onboard a boat to<br />\r\n	provide fish finder functions.</li>\r\n	<li>Transducer needed to connect to KM-Sonar</li>\r\n	<li>Wide input supply voltage from 10.5VDC to 32VDC can be suitable to use any kinds of<br />\r\n	vessels.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KM-SONAR/Middle%20Banner%20KM-Sonar.jpg\" style=\"width:100%;\" /></div>\r\n</section>\r\n\r\n<section id=\"application\">\r\n<h2 class=\"text-center\"><strong>KM-SONAR SAMPLE CONNECTIONS</strong></h2>\r\n\r\n<div class=\"text-center\">\r\n<h2>Connect ONWA Multi-Function display with ONWA WIFI Radar Antenna</h2>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/KM-SONAR/connect%20KM-Sonar.jpg\" style=\"width: 50%;\" />\r\n<h2>Connect KM-Sonar to PC (with ONWA Fish Finder PC Software)</h2>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/KM-SONAR/km-sonar%20to%20pc.jpg\" style=\"width: 50%;\" /></div>\r\n</div>\r\n</div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KM-SONAR Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KM-SONAR/Specifications.jpg\" style=\"width: 70%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<section id=\"dimension\">\r\n<h2 class=\"text-center text-uppercase\"><strong>DIMENSION</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KM-SONAR/Km-sonar%20dimension.jpg\" style=\"width: 75%;\" /></div>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1vAhkCzj8455JDGMeTS9o8yF_qmCG757A\" rel=\"noopener\" target=\"_blank\">KM-SONAR Quick Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-30 20:35:01', 1, 0, NULL, 3, 1, '2020-08-12 14:58:29', NULL, '', 'km-sonar_2.jpg', 1),
(11, 'radome', 'Top_Banner_0118.jpg', 1, 'KRA-1007/KRA-1007_W: Radome Radar Antenna', 'ONWA Radar Antenna Radome type', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#application\">Connection</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KRA-1007/KRA-1007_W&nbsp;Features</strong></h2>\r\n\r\n<div class=\"d-flex\">\r\n<ul>\r\n	<li>Digital Radar Target Technology</li>\r\n	<li>Share the same protocol between all ONWA magnetron pulse Radar antennas</li>\r\n	<li>Built-in excellent sea and rain clutter algorithm</li>\r\n	<li>Fully Digital Signal Processing</li>\r\n	<li>High Performance Microwave front end</li>\r\n	<li>Can be connected to PC directly or through home router</li>\r\n	<li>Can use&nbsp;<strong>ONWA Radar PC Software:</strong></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/KRa-1007/Radar%20PC%20Software.jpg\" style=\"width: 50%;\" /></div>\r\n\r\n<div class=\"center\">&nbsp;</div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KRa-1007/Middle%20Banner%20KRA-1007%20KRA-1007W.jpg\" style=\"width:100%;\" /></div>\r\n</section>\r\n\r\n<section id=\"application\">\r\n<h2 class=\"text-center\"><strong>KRA-1007/KRA-1007_W CONNECTIONS</strong></h2>\r\n\r\n<h2 class=\"text-center\">KRA-1007 Connection</h2>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/KRa-1007/kra-1007%20connection.jpg\" style=\"width: 50%;\" /></div>\r\n\r\n<h2 class=\"text-center\">&nbsp;</h2>\r\n\r\n<h2 class=\"text-center\">KRA-1007_W Connection</h2>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/KRa-1007/kra-1007w%20connection.jpg\" style=\"width: 50%;\" /></div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KRA-1007/KRA-1007_W Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KRa-1007/Specifications.jpg\" style=\"width: 70%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<section id=\"dimension\">\r\n<h2 class=\"text-center text-uppercase\"><strong>Dimensions</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KRa-1007/Radome%20Antenna%201%20Dimension.jpg\" style=\"width: 80%;\" /></div>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1QgfC9o_wWGCXh5UjgSxPzRrNT1cgbLmt\" rel=\"noopener\" target=\"_blank\">KRA-1007 / KRA-1007W User Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</section>\r\n', 1, '2020-07-30 20:57:29', 1, 0, NULL, 1, 1, '2020-08-08 15:10:19', NULL, '', 'kra-1004_1.jpg', 1),
(12, 'openarray', 'Top_Banner_017.jpg', 1, 'KRA-3002/KRA-4001: Open-Array Radar Antenna', 'ONWA Open-Array Antenna', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#application\">Connection</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KRA-3002/KRA-4001</strong><strong>&nbsp;Features</strong></h2>\r\n\r\n<div class=\"d-flex\">\r\n<ul>\r\n	<li>Digital Radar Target Technology</li>\r\n	<li>Share the same protocol between all ONWA magnetron pulse Radar antennas</li>\r\n	<li>Built-in excellent sea and rain clutter algorithm</li>\r\n	<li>Fully Digital Signal Processing</li>\r\n	<li>High Performance Microwave front end</li>\r\n	<li>Can be connected to PC directly or through home router</li>\r\n	<li>Can use&nbsp;<strong>ONWA Radar PC Software:</strong></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/KRa-1007/Radar%20PC%20Software.jpg\" style=\"width: 50%;\" /></div>\r\n&nbsp;\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KRa-1007/Middle%20Banner%20KRA-3002%20KRA-4001.jpg\" style=\"width:100%;\" /></div>\r\n</section>\r\n\r\n<section id=\"application\">\r\n<h2 class=\"text-center\"><strong>CONNECTIONS</strong></h2>\r\n\r\n<div class=\"text-center\"><img alt=\"\" class=\"center\" src=\"/ckfinder/userfiles/files/KRa-1007/Open-Aray%20connection.jpg\" style=\"width: 60%;\" /></div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KRa-1007/Specifications(1).jpg\" style=\"width: 80%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<section id=\"dimension\">\r\n<h2 class=\"text-center text-uppercase\"><strong>Dimensions</strong></h2>\r\n\r\n<div class=\"text-center\">\r\n<p><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KRa-1007/Open-array%20Antenna%203%20Dimension.jpg\" style=\"width: 80%;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/KRa-1007/Open-array%20Antenna%202%20Dimension.jpg\" style=\"width: 80%;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/KRa-1007/Open-array%20Antenna%201%20Dimension.jpg\" style=\"width: 80%;\" /></p>\r\n</div>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1QgfC9o_wWGCXh5UjgSxPzRrNT1cgbLmt\" rel=\"noopener\" target=\"_blank\">KRA-3002/KRA-4001 User Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-30 21:17:10', 1, 0, NULL, 1, 1, '2020-08-08 15:11:10', NULL, '', 'kra-2004_2.jpg', 1);
INSERT INTO `products` (`id_products`, `slug`, `image`, `category`, `title`, `meta_desc`, `long_desc`, `created_by`, `date_created`, `is_publish`, `is_hf`, `type`, `subcategory_id`, `updated_by`, `updated_at`, `content_type`, `video_url`, `featured_image_url`, `is_deleted`) VALUES
(13, 'kw360', 'Top_Banner_018.jpg', 1, 'ONWA KW-360: Ultrasonic Weather Station', 'Ultrasonic Weather station providing ', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#software\">PC Software</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<h2 class=\"text-center\"><strong>KW-360 Features</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<p><strong>KW-360</strong>&nbsp;is a powerful light-weight product that Measures wind speed &amp; direction, temperature, humidity, air pressure and altitude.</p>\r\n\r\n<ul>\r\n	<li>No calibration needed</li>\r\n	<li>Two electrical output, RS485 and RS232</li>\r\n	<li>Configurable baud rate up to 38400 (4800, 9600, 19200 and 38400)</li>\r\n	<li>Standard NMEA sentences output, $MWV and $XDR</li>\r\n	<li>Can be used in PC with supplied PC software</li>\r\n	<li>Can be used for Land Applications with ONWA Weather software</li>\r\n	<li>No moving parts, does not need constant maintenance</li>\r\n	<li>Every channel output is isolated</li>\r\n	<li>Wide operating voltage range from 10.5 V DC to 40.5 V DC</li>\r\n	<li>Support Modbus protocol for industry use</li>\r\n	<li>Support MDA sentence- Meteorological Composite (obsolete)</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/kw-360/Middle%20Banner%20KW-360.jpg\" style=\"width:100%;\" /></div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/kw-360/Specifications.jpg\" style=\"width: 60%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<section id=\"dimension\">\r\n<h2 class=\"text-center text-uppercase\"><strong>Dimensions</strong></h2>\r\n\r\n<div class=\"text-center\">\r\n<p><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/kw-360/KW-360%20Dimension.jpg\" style=\"width: 80%;\" /></p>\r\n</div>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/1CgsWyxe7apXk63ZzgiVSmoqWADVbhHor/view\" rel=\"noopener\" target=\"_blank\">KW-360 Brochure</a></div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1IwwXcuJJXia_EpPCdUcMFZ25b7viNAZK\" rel=\"noopener\" target=\"_blank\">KW-360 User Manual</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1DE4W8AaKZCKO4wQk1uCFTl7ie8FJL4i1\" rel=\"noopener\" target=\"_blank\">Weather Monitor software Manual</a></div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1Z-ZmSwwnCxKwyz1EQBTKJ-95aiFebUKu\" rel=\"noopener\" target=\"_blank\">ONWA Weather PC Software Instruction Manual</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1IwwXcuJJXia_EpPCdUcMFZ25b7viNAZK\" rel=\"noopener\" target=\"_blank\">KW-360 Quick Installation Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section id=\"software\">\r\n<h2 class=\"text-center\"><strong>PC Software</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a href=\"https://drive.google.com/drive/folders/1Z-ZmSwwnCxKwyz1EQBTKJ-95aiFebUKu\" rel=\"noopener\" target=\"_blank\"><strong> ONWA Weather</strong></a></div>\r\n- PC software for Marine and Land Application<br />\r\n- used to configure the baud rate and output format of KW-360</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-30 22:06:28', 1, 0, NULL, 5, 1, '2020-08-12 15:01:34', NULL, '', 'KW360-2.jpg', 1),
(14, 'ks200a', 'Top_Banner_019.jpg', 1, 'ONWA KS-200A: AIS Transponder Blackbox', '', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#optional-accessory\">Optional Accessory</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#program-software\">Program Software</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KS-200A Features</strong></h2>\r\n\r\n<div class=\"d-flex\">\r\n<ul>\r\n	<li>Full compliance with IEC62287-1, IEC62287-2, Class B+ AIS standards and AIS SART standards</li>\r\n	<li>ONWA AIS Encypted Technology</li>\r\n	<li>Outputs AIS and GPS data on RS232 NMEA ports to other navigational equipment on board</li>\r\n	<li>Can Transmit and Receive AIS Data of targets around your boat (with suitable VHF Antenna)</li>\r\n	<li>The AIS Data such as MMSI, call Sign, boat name etc. Can be configured with the included windows compatible software</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"text-center\">\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ks-200A/200a%20features(1).jpg\" style=\"width: 65%;\" /></div>\r\n</div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ks-200A/Middle%20Banner%20KS-200A.jpg\" style=\"width: 1600px; height: 446px;\" /></div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KS-200A Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ks-200A/Specifications.jpg\" style=\"width: 70%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<h2 class=\"text-center\"><strong>Dimension</strong></h2>\r\n\r\n<section id=\"optional-accessory\">\r\n<p><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ks-200A/KS-200A%20Dimension.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n<!-- Optional Accessory -->\r\n\r\n<section id=\"optional-accessory\">\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/ks-200A/Bottom%20Banner%20KS-200A.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/180b5leIls_cRgUSZ7ZjMEGBP8jQJfHhN/view\" rel=\"noopener\" target=\"_blank\">KS-200A User Manual</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/1Cd7AgFiIFuJtHzv8vCV_gCFgi1eAE7PT/view\" rel=\"noopener\" target=\"_blank\">KS-200A Quick Start Manual</a></div>\r\n</div>\r\n&nbsp;\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/17uEQOqeS5e9CeIO6LqQm17zhlsUrWxt4/view\" rel=\"noopener\" target=\"_blank\">KS-200A Quick Installation Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section id=\"program-software\">\r\n<h2 class=\"text-center\"><strong>Programming Software</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"col-12 col-lg-12 \"><img src=\"http://onwamarine.com/wp-content/uploads/2020/03/download-icon.jpg\" />&nbsp;<a href=\"https://drive.google.com/drive/folders/1j_Is3cGONYpf-o81LacgSqOlcoQb_kyu\" rel=\"noopener\" target=\"_blank\"> Aisconfig V1.15</a></div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-30 23:24:32', 1, 0, NULL, 4, 1, '2020-08-12 15:02:33', NULL, '', 'ks-200a-1.jpg', 1),
(15, 'ks200asart', 'Top_Banner_0110.jpg', 1, 'ONWA KS-200A_SART: AIS Black Box with SART button', 'AIS Black Box with SART button', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#optional-accessory\">Optional Accessory</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#program-software\">Program Software</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KS-200A_SART Features</strong></h2>\r\n\r\n<div class=\"d-flex\">\r\n<ul>\r\n	<li>Full compliance with IEC62287-1, IEC62287-2, Class B+ AIS standards and AIS SART standards</li>\r\n	<li>ONWA AIS Encypted Technology</li>\r\n	<li><strong>One touch AIS SART button</strong>&nbsp;to send rescue signal in case of emergency to all vessels nearby</li>\r\n	<li>Outputs AIS and GPS data on RS232 NMEA ports to other navigational equipment on board</li>\r\n	<li>Can Transmit and Receive AIS Data of targets around your boat (with suitable VHF Antenna)</li>\r\n	<li>The AIS Data such as MMSI, call Sign, boat name etc. Can be configured with the included windows compatible software</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"text-center\"><img alt=\"\" class=\"center\" src=\"/ckfinder/userfiles/files/ks-200A/200a%20features(1).jpg\" style=\"width: 65%;\" />\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/200A_sart/Middle%20Banner%20KS-200A_SART.jpg\" style=\"width: 1600px; height: 446px;\" /></div>\r\n</div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KS-200A_SART Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/200A_sart/Specifications.jpg\" style=\"width: 70%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<h2 class=\"text-center\"><strong>Dimension</strong></h2>\r\n\r\n<section id=\"optional-accessory\">\r\n<p><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ks-200A/KS-200A%20Dimension.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n<!-- Optional Accessory -->\r\n\r\n<section id=\"optional-accessory\">\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/200A_sart/Bottom%20Banner%20KS-200A_SART.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/180b5leIls_cRgUSZ7ZjMEGBP8jQJfHhN/view\" rel=\"noopener\" target=\"_blank\">KS-200A_SART&nbsp;User Manual</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/1Cd7AgFiIFuJtHzv8vCV_gCFgi1eAE7PT/view\" rel=\"noopener\" target=\"_blank\">KS-200A_SART Quick Start Manual</a></div>\r\n</div>\r\n&nbsp;\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/17uEQOqeS5e9CeIO6LqQm17zhlsUrWxt4/view\" rel=\"noopener\" target=\"_blank\">KS-200A_SART Quick Installation Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section id=\"program-software\">\r\n<h2 class=\"text-center\"><strong>Programming Software</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"col-12 col-lg-12 \"><img src=\"http://onwamarine.com/wp-content/uploads/2020/03/download-icon.jpg\" />&nbsp;<a href=\"https://drive.google.com/drive/folders/1j_Is3cGONYpf-o81LacgSqOlcoQb_kyu\" rel=\"noopener\" target=\"_blank\"> Aisconfig V1.15</a></div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-30 23:36:45', 1, 0, NULL, 4, 1, '2020-08-12 15:04:20', NULL, '', 'KS200A_Sart_1.png', 1),
(16, '200bn', 'Top_Banner_0111.jpg', 1, 'ONWA KS-200B_N: AIS Receiver ONLY Black Box', 'AIS Receiver that can send data via RS232 or Network', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#optional-accessory\">Optional Accessory</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<h2 class=\"text-center\"><strong>KS-200B_N Features</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<p>ONWA&nbsp;<strong>KS-200B_N</strong>&nbsp;is an external AIS Device that maybe interface with your Marine Radar or GPS Chart Plotter capable to receive AIS data via RS232 port and Network Data.</p>\r\n\r\n<p><strong>KS-200B_N</strong>&nbsp;lets you track your vessel even at certain distance using IP address of the black box unit which you can monitor from your computer.</p>\r\n\r\n<ul>\r\n	<li>Able to Interpret incoming AIS data for CPA alert or AIS S.A.R.T emergency messages.</li>\r\n	<li>Outputs AIS and GPS data on RS232 NMEA ports to other navigational equipment onboard</li>\r\n	<li>Output of AIS and GPS data on Ethernet port</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/200B_N/Middle%20Banner%20KS-200B_N.jpg\" style=\"width: 1600px; height: 446px;\" /></div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KS-200B_N Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/200B_N/Specifications.jpg\" style=\"width: 70%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<section id=\"dimension\">\r\n<h2 class=\"text-center\"><strong>Dimension</strong></h2>\r\n\r\n<p><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ks-200A/KS-200A%20Dimension.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n<!-- Optional Accessory -->\r\n\r\n<section id=\"optional-accessory\">\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/200B_N/Bottom%20Banner%20KS-200B_N.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1Y1lcxSAZ5Wxkv1R7NLqnxINu8DUCpsVW\" rel=\"noopener\" target=\"_blank\">KS-200B_N Brochure</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/180b5leIls_cRgUSZ7ZjMEGBP8jQJfHhN/view\" rel=\"noopener\" target=\"_blank\">KS-200B_N User Manual</a></div>\r\n</div>\r\n&nbsp;\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/1Cd7AgFiIFuJtHzv8vCV_gCFgi1eAE7PT/view\" rel=\"noopener\" target=\"_blank\">KS-200B_N Quick Start Manual</a></div>\r\n\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/1Cd7AgFiIFuJtHzv8vCV_gCFgi1eAE7PT/view\" rel=\"noopener\" target=\"_blank\">KS-200B_N Quick Start Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-30 23:51:51', 1, 0, NULL, 4, 1, '2020-08-12 15:12:25', NULL, '', '200B200B_N.png', 1),
(17, '200b', 'Top_Banner_0112.jpg', 1, 'KS-200B: AIS Receiver Only Black Box', 'AIS Receiver only Black Box', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#optional-accessory\">Optional Accessory</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KS-200B Features</strong></h2>\r\n\r\n<ul>\r\n	<li>Outputs AIS and GPS data on RS232 NMEA ports to other navigational equipment onboard</li>\r\n	<li>Can Receive AIS Data of targets around your boat (with suitable VHF Antenna)</li>\r\n	<li>Able to Interpret incoming AIS Data for CPA Alerts or AIS SART emergency messages</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/200b/Middle%20Banner%20KS-200B.jpg\" style=\"width: 1600px; height: 446px;\" /></div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KS-200B&nbsp;Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/200b/Specifications.jpg\" style=\"width: 70%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<section id=\"dimension\">\r\n<h2 class=\"text-center\"><strong>Dimension</strong></h2>\r\n\r\n<p><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ks-200A/KS-200A%20Dimension.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n<!-- Optional Accessory -->\r\n\r\n<section id=\"optional-accessory\">\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/200b/Bottom%20Banner%20KS-200B.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1Y1lcxSAZ5Wxkv1R7NLqnxINu8DUCpsVW\" rel=\"noopener\" target=\"_blank\">KS-200B&nbsp;Brochure</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/180b5leIls_cRgUSZ7ZjMEGBP8jQJfHhN/view\" rel=\"noopener\" target=\"_blank\">KS-200B User Manual</a></div>\r\n</div>\r\n&nbsp;\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/1Cd7AgFiIFuJtHzv8vCV_gCFgi1eAE7PT/view\" rel=\"noopener\" target=\"_blank\">KS-200B Quick Start Manual</a></div>\r\n\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/1Cd7AgFiIFuJtHzv8vCV_gCFgi1eAE7PT/view\" rel=\"noopener\" target=\"_blank\">KS-200B&nbsp;Quick Start Manual</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-30 23:58:44', 1, 0, NULL, 4, 1, '2020-08-12 15:14:03', NULL, '', 'ks-200b_(3).jpg', 1),
(18, 'kagc9a', 'Top_Banner_0113.jpg', 1, 'ONWA KA-GC9A: Heading Sensor', '9-Axis Electronic Compass with built-in High Accuracy GPS Module Heading Sensor', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#specification\">Specification</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#dimension\">Dimension</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures &amp; Manuals</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#software\">PC Software</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#firmware\">Firmware Update</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<h2 class=\"text-center\"><strong>KA-GC9A FEATURES</strong></h2>\r\n\r\n<ul>\r\n	<li>Low-cost solution for Heading Data</li>\r\n	<li>Enhanced Performance</li>\r\n	<li>User-Programmable</li>\r\n	<li>Customizable GPS Output Sentences and Baudrate</li>\r\n	<li>Better Stability of Heading output</li>\r\n	<li>Real-time response Rate</li>\r\n	<li>NMEA0183 Interface</li>\r\n	<li>High-grade waterproof housing</li>\r\n	<li>Longevity of usage in Marine Environment</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ka-gc9a/Middle%20Banner%2001.jpg\" style=\"width: 1600px; height: 446px;\" /></div>\r\n</section>\r\n<!-- Specification -->\r\n\r\n<section id=\"specification\">\r\n<h2 class=\"text-center text-uppercase\"><strong>KA-GC9A Specifications</strong></h2>\r\n\r\n<div class=\"text-center\"><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ka-gc9a/Specifications.jpg\" style=\"width: 70%;\" /></div>\r\n</section>\r\n<!-- Dimension -->\r\n\r\n<section id=\"dimension\">\r\n<h2 class=\"text-center\"><strong>Dimension</strong></h2>\r\n\r\n<p><img class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ka-gc9a/KA-GC9A%20Dimension.jpg\" style=\"width:100%\" /></p>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/1R2QlsKOCA90JNQrdz1wzEAjk5epmWsVm/view\" rel=\"noopener\" target=\"_blank\">KA-GC9A Brochure</a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/file/d/18mzSWMEwf1JYYdQIcaSB8V-9JdNDwRri/view\" rel=\"noopener\" target=\"_blank\">KA-GC9A User Manual</a></div>\r\n</div>\r\n&nbsp;\r\n\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6\"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1uUjROvGRdP9-dPmz_kHoJ0uLw_tgcekJ\" rel=\"noopener\" target=\"_blank\">KA-GC9A PC software &amp; Firmware &amp; Instruction</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section id=\"software\">\r\n<h2 class=\"text-center\"><strong>PC Software</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"http://onwamarine.com/wp-content/uploads/2020/03/download-icon.jpg\" style=\"width: 35px; height: 43px;\" /><a href=\"https://drive.google.com/drive/folders/1uUjROvGRdP9-dPmz_kHoJ0uLw_tgcekJ\" rel=\"noopener\" target=\"_blank\"><strong>&nbsp;9-Axis E-Compass Manager Software</strong> </a></div>\r\n\r\n<div class=\"col-12 col-lg-6 \"><img src=\"http://onwamarine.com/wp-content/uploads/2020/03/download-icon.jpg\" style=\"width: 35px; height: 43px;\" /><a href=\"https://drive.google.com/drive/folders/1rVialDMTYe1R-bRjg7wruWOky9lpNhbY\" rel=\"noopener\" target=\"_blank\"><strong> LX08A Driver</strong></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section id=\"firmware\">\r\n<h2 class=\"text-center\"><strong>Firmware</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"http://onwamarine.com/wp-content/uploads/2020/03/download-icon.jpg\" style=\"width: 35px; height: 43px;\" /><a href=\"https://drive.google.com/drive/folders/1uUjROvGRdP9-dPmz_kHoJ0uLw_tgcekJ\" rel=\"noopener\" target=\"_blank\"><strong>&nbsp;E-Compass V3.0 </strong> </a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-07-31 00:18:56', 1, 0, NULL, 6, 1, '2020-08-12 15:15:16', NULL, '', 'kagc9a_1.jpg', 1),
(19, 'Digisonar', 'DigiSonar.jpg', 2, 'DigiSonar', 'Fish Finder Software', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#features\">Interface</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#compatible\">Compatible Hardware</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container about\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>DIGISONAR</strong></h2>\r\n\r\n<p>The DigiSonar fish finder software is perfect for studying and further observing school of fishes, depth and Bottom hardness. You can view the actual data beneath your boat to a bigger screen up to 4K Display.</p>\r\n\r\n<h2 style=\"font-style:italic;\"><small><big><strong>Features:</strong></big></small></h2>\r\n\r\n<ul>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Support various screen display, support 4K display</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Multiple zoom modes, bottom lock, bottom zoom and marker zoom, </span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Support multiple magnifications.</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Multiple display modes, single frequency mode, dual frequency mode, and zoom mode.</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Up to 8 color options</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Automatic gain adjustment</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Automatic range adjustment</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">A-scope function</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Intuitive dynamic fish school display</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Fish, bottom, water temperature alarm</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Manual and automatic TVG</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Seabed hardness display</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Unlimited data collection and playback</span></span></span></span></li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/DigisSonar/digisonar%20image%201.png\" style=\"width: 653px; height: 434px;\" /></div>\r\n</div>\r\n</div>\r\n</section>\r\n<!-- Features -->\r\n\r\n<section id=\"features\">\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\">&nbsp;</div>\r\n\r\n<h2 class=\"text-uppercase text-center\"><strong>DigiSonar Interface</strong></h2>\r\n\r\n<div class=\"text-center\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/DigisSonar/digisonar%20interface.jpg\" style=\"width: 90%;\" /></div>\r\n</section>\r\n<!-- Solutions -->\r\n\r\n<section id=\"compatible\">\r\n<h2 class=\"text-uppercase text-center\"><strong>Compatible Hardware Products</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>ONWA KM-Sonar</strong></h3>\r\n\r\n<p>Fish Finder Blackbox<br />\r\n*Transducer needed</p>\r\n\r\n<div class=\"mt-3 text-left\"><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto\" href=\"http://www.digimarintec.com/product/hardware/fish-finder-black-box/kmsonar\">Learn More</a></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KM-SONAR/km-sonar%202.jpg\" style=\"width: 300px; height: 216px;\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1jF7HPL73mm85LqUTv4WxbZQCJ8dxLaal\" rel=\"noopener\" target=\"_blank\">DigiSonar Brochure</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 1, '2020-09-28 01:32:20', 1, 0, NULL, 0, 1, '2020-09-28 02:54:52', NULL, '', 'digisonar_featured.JPG', 1),
(20, 'diginav', 'Diginav_banner.jpg', 2, 'DigiNav', 'Complete Navigation System', '<!-- Nav tabs -->\r\n<ul class=\"software-product nav nav-pills nav-justified\">\r\n	<li class=\"nav-item\"><a class=\"nav-link active text-uppercase\" data-toggle=\"tab\" href=\"#overview\">Overview</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#features\">Interface</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#compatible\">Compatible Hardware</a></li>\r\n	<li class=\"nav-item\"><a class=\"nav-link text-uppercase\" data-toggle=\"tab\" href=\"#brochures-and-manuals\">Brochures</a></li>\r\n</ul>\r\n<!-- Overview -->\r\n\r\n<section id=\"overview\">\r\n<div class=\"container about\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>DIGINAV</strong></h2>\r\n\r\n<p>The DigiNav is a complete Marine Navigation software capable of combining several Navigation Equipment to one Display such as Chart Plotter function, Fish Finder Function, AIS function, Radar function&nbsp;and more. Depending on your need, we can tailor made a suitable Navigation System for your requirement, and in the future allows you to further expand&nbsp;functions and features suitable for your navigation needs.<br />\r\n<br />\r\nCurrently, DigiNav is compatible with K-Chart Maps and Navionics Maps. We are constantly expanding those compatible with our software.</p>\r\n\r\n<h2 style=\"font-style:italic;\"><small><big><strong>Features:</strong></big></small></h2>\r\n\r\n<ul>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Navionic chart, please stay tuned for more charts</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">AIS:</span></span></span></span>\r\n	<ul>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">CPA/TCPA: can monitor 1000 nearby targets</span></span></span></span></li>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Short message communication: 70 English and 30 Chinese characters for each</span></span></span></span>&nbsp;<span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">message</span></span></span></span></li>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Automatic AIS track record: can be stored for more than one year</span></span></span></span></li>\r\n	</ul>\r\n	</li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Data import and export function</span></span></span></span>\r\n	<ul>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">GPX, KML format</span></span></span></span></li>\r\n	</ul>\r\n	</li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Track record: one month</span></span></span></span></li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">User data:</span></span></span></span>\r\n	<ul>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Waypoints: Waypoints of different shapes and colors can be added to the chart</span></span></span></span></li>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Place name: can add missing place names to the chart</span></span></span></span></li>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Markers: Markers of different shapes and colors can be added on the chart,</span></span></span></span></li>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Line drawing: lines of different colors can be drawn on the chart</span></span></span></span></li>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Area: Different color areas can be drawn on the chart, and can be set as a monitoring</span></span></span></span>&nbsp;<span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">area</span></span></span></span></li>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Track-to-route: You can choose the function of turning a certain track into a route, or</span></span></span></span>&nbsp;<span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">you can choose to turn the track of AIS into a route</span></span></span></span></li>\r\n		<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Track backup: the current track can be backed up</span></span></span></span></li>\r\n	</ul>\r\n	</li>\r\n	<li style=\"margin: 0in; text-align: justify;\"><span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Alarm function: way alarm, moving anchor alarm, arrival alarm, speed alarm,</span></span></span></span>&nbsp;<span style=\"font-size:10.5pt\"><span style=\"font-family:DengXian\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">approach point alarm, CPA/TCPA alarm, area intrusion alarm</span></span></span></span></li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/Diginav/diginav%20tv.jpg\" style=\"width: 653px; height: 434px;\" /></div>\r\n</div>\r\n</div>\r\n</section>\r\n<!-- Features -->\r\n\r\n<section id=\"features\">\r\n<div class=\"container-fluid\" style=\"padding-left:0;padding-right:0\">&nbsp;</div>\r\n\r\n<h2 class=\"text-uppercase text-center\"><strong>DigiNav Interface</strong></h2>\r\n\r\n<div class=\"text-center\" style=\"padding-left:0;padding-right:0\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/Diginav/diginav%20interface.jpg\" style=\"width: 90%;\" /></div>\r\n</section>\r\n<!-- Solutions -->\r\n\r\n<section id=\"compatible\">\r\n<h2 class=\"text-uppercase text-center\"><strong>Compatible Hardware Products</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h3><strong>KA-GC9A</strong></h3>\r\n\r\n<p>9-Axis GPS Heading Sensor</p>\r\n\r\n<div class=\"mt-3 left\"><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto\" href=\"http://www.digimarintec.com/product/hardware/accessories/kagc9a\">Learn More</a></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/ka-gc9a/KA-GC9A.jpg\" style=\"width: 300px; height: 216px;\" /></div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>KS-200A</strong></h3>\r\n\r\n<p>Class B+ AIS Transponder Black box</p>\r\n\r\n<div class=\"mt-3 text-left\"><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto\" href=\"http://www.digimarintec.com/product/hardware/ais-black-box/ks200a\">Learn More</a></div>\r\n\r\n<div class=\"mt-3 text-right\">&nbsp;</div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/200A_sart/KS200.jpg\" style=\"width: 300px; height: 235px;\" /></div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h3><strong>ONWA KM-Sonar</strong></h3>\r\n\r\n<p>Fish Finder Blackbox</p>\r\n\r\n<p>*Transducer needed</p>\r\n\r\n<div class=\"mt-3 text-left\"><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto\" href=\"http://www.digimarintec.com/product/hardware/fish-finder-black-box/kmsonar\">Learn More</a></div>\r\n\r\n<div class=\"mt-3 left\">&nbsp;</div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KM-SONAR/km-sonar%202.jpg\" style=\"width: 300px; height: 216px;\" /></div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>KRA-1007</strong></h3>\r\n\r\n<p>Radome Radar Antenna</p>\r\n\r\n<div class=\"mt-3 text-left\"><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto\" href=\"http://www.digimarintec.com/product/hardware/radar-antenna/radome\">Learn More</a></div>\r\n\r\n<div class=\"mt-3 text-left\">&nbsp;</div>\r\n\r\n<div class=\"mt-3 text-right\">&nbsp;</div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KRa-1007/Radome-Antenna.jpg\" style=\"width: 300px; height: 216px;\" /></div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h3><strong>KRA-3002/KRA-4001</strong></h3>\r\n\r\n<p>Open-Array Radar Antenna</p>\r\n\r\n<div class=\"mt-3 left\"><a class=\"btn btn-primary btn-get-started animated fadeInUp scrollto\" href=\"http://www.digimarintec.com/product/hardware/radar-antenna/openarray\">Learn More</a></div>\r\n\r\n<div class=\"mt-3 text-left\">&nbsp;</div>\r\n\r\n<div class=\"mt-3 text-right\">&nbsp;</div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 video-box\"><img alt=\"\" class=\"img-fluid\" src=\"/ckfinder/userfiles/files/KRa-1007/Open-Array-Antenna.jpg\" style=\"width: 300px; height: 216px;\" /></div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 video-box\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<section id=\"brochures-and-manuals\">\r\n<h2 class=\"text-center\"><strong>Brochures &amp; Manual</strong></h2>\r\n\r\n<div class=\"container\">\r\n<div style=\"padding-left:15%;padding-right:15%\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-lg-6 \"><img src=\"/ckfinder/userfiles/files/icons/pdf%20icon.jpg\" style=\"width: 35px; height: 43px;\" /><a class=\"pdf\" href=\"https://drive.google.com/drive/folders/1jF7HPL73mm85LqUTv4WxbZQCJ8dxLaal\" rel=\"noopener\" target=\"_blank\">DigiNav Brochure</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n</section>\r\n', 1, '2020-09-28 02:05:56', 1, 0, NULL, 0, 1, '2020-09-28 02:49:11', NULL, '', 'diginav_feature.JPG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id_programmes` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `url` text NOT NULL,
  `video_link` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `programme_title` varchar(150) NOT NULL,
  `programme_short_desc` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_published` int(11) NOT NULL,
  `date_published` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id_programmes`, `image_url`, `url`, `video_link`, `author_id`, `programme_title`, `programme_short_desc`, `description`, `is_active`, `is_published`, `date_published`, `created_by`, `date_created`, `modified_by`, `date_modified`, `is_deleted`) VALUES
(1, '', 'channel-hue-presents', '', 0, 'CHANNEL HUE PRESENTS With JAMIE FOURNIER', '', '<center>\r\n<p>&lt;iframe src=\"https://player.vimeo.com/video/230027721\" width=\"640\" height=\"360\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen&gt;&lt;/iframe&gt;</p>\r\n\r\n<p><strong>Throughout this series we will be presenting feature films and short films from all over the globe, as well as films produced in the Philippines. All of these films will be premieres, never seen before on Philippine television – there’ll be films of all genres; drama, horror, comedy, documentary and loads more. We’ll be interviewing film makers, actors, and those involved in the film industry. We’ll be going behind the scenes on films and television programmes in production, we’ll be showing trailers, and keeping you informed of film news. There’s also an exclusive international competition open to all film makers which is widely advertised on all social media.</strong></p>\r\n\r\n<p><strong>MARKET: Aimed at viewers in the age range of 16 to 55, this series would benefit companies making Camera Equipment and Accessories; Make Up and Beauty Products; Gadgets and Electronics; Cars; High End and Celebrity Magazines; General Millennial Products and Brands; Cinemas; Clubs; Fashion: Restaurants, Food and Drinks; Financial Institutions; Property Sales.</strong></p>\r\n</center>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-19 04:09:26', 1, '2018-01-26 17:44:45', 0),
(2, 'ghostwalk.jpg', 'the-ghost-walks', '', 0, 'THE GHOST WALKS', '', '<p>A series of unique 5 minute horror dramas presented and acted out by different guest stars. These scary, true stories are designed to make you JUMP!</p>\r\n\r\n<p><strong>MARKET: Aimed essentially at a Family audience but most likely attracting viewers over 16, this series would benefit companies in the business of General Millennial Products and Brands; Cinemas; Clubs; Fashion.</strong></p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 07:57:59', 1, '2017-12-19 04:14:59', 0),
(3, 'singlemom.jpg', 'single-moms-story', '', 0, 'SINGLE MOM’S STORY With LEAH ARATAN', '', '<p><strong>One of our flagship series of programmes is SINGLE MOM&rsquo;S STORY. It is a series which will inspire and educate, and above all aims to empower not only single mothers, but all women throughout the world through empathy and advocacy. It will support, enable, and instill confidence to all single mothers by talking to people who are now in this situation and to those before them, demonstrating that they are not alone nor will they be the last person in the same predicament. Our 3 Experts, a child and family professional, a medical practitioner and a spiritual helper, will give advice and information, reflect positivity, and share their knowledge and experience to everyone watching. But SINGLE MOM&rsquo;S STORY will not be all &lsquo;doom and gloom&rsquo; &ndash; we will also share many entertaining and happy stories that will entertain and inspire, and we will re-visit some of our guests along the way to catch up on their lives and hopefully see how much better things are for them and for their children. </strong></p>\r\n\r\n<p><br />\r\n<strong>MARKET: Targeted for family viewing but with a predominately female audience and mothers, this series would benefit companies whose products are aimed at a family market, for example; Laundry Products; Children&rsquo;s Products; Family Food; Home Appliances; Medical Supplies; Beauty and Make Up; Fashion; Magazines; Financial Institutions; Religious Organisations; Local Government Agencies.</strong></p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 07:59:04', 1, '2017-12-19 04:13:36', 0),
(4, 'chrissy.jpg', 'the-chrissy-valentine-show', '', 0, 'THE CHRISSY VALENTINE SHOW  With CHRISSY VALENTINE', '', '<p><strong>Unfortunately, many of today&rsquo;s music shows are just glorified karaoke playing to a sterile and manufactured audience. THE CHRISSY VALENTINE SHOW will be the antithesis of these programmes, it will quickly gain a cult following with its integrity, class and style, and will instantly be regarded as a &lsquo;classic&rsquo; music show. As well as singing and performing with her own band, Chrissy will introduce guest performers drawn from established international and Filipino acts, and it will showcase the best of upcoming, home-grown, original talent. International bands and musical acts visiting the Philippines will be booked for an appearance on the show either playing live, or as interviewees or both, so their music news will be exclusive and seem personal to our viewers. Other occasional &lsquo;special&rsquo; shows will feature extended live performances from top international acts. THE CHRISSY VALENTINE SHOW is truly a 360 degree concept which will have social media buzzing with its music, celebrity and videos &ndash; it&rsquo;s a programme with which any investor, whose business is related to youth or art, would be proud to be associated.</strong></p>\r\n\r\n<p><strong>MARKET: Aimed at viewers in the age range of 16 to 55, this series would benefit companies selling Music; Make Up and Beauty Products; Gadgets and Electronics; Cars; High End and Celebrity Magazines; General Millennial Products and Brands; Cinemas; Clubs; Fashion; Restaurants, Food and Drinks; Financial Institutions; Property Sales.</strong></p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:00:26', 1, '2017-12-19 04:14:05', 0),
(5, 'scam.jpg', 'scam', '', 0, 'SCAM Starring PRINCE DE GUZMAN', '', '<p><strong>SCAM is a slick, original drama series based on the true story of one of the greatest &lsquo;scammers&rsquo; ever to come from the Philippines. It stars Prince de Guzman as a young man, well-educated and from a rich family who possessed a gift &ndash; a gift of persuasion. In just three years this man swindled more than 700 million Pesos from over 100 families; destroying lives without remorse. Shunned by his father and driven to prove his worth, this ruthless, handsome and arrogant man managed to stay one step ahead of the police who were always on his tail &ndash; until eventually he was betrayed, by love.</strong></p>\r\n\r\n<p><strong>MARKET: Aimed at viewers in the age range of 16 and over, this series would benefit companies in the business of Make Up and Beauty Products; Gadgets and Electronics; Cars; High End and Celebrity Magazines; General Millennial Products and Brands; Cinemas; Clubs; Fashion; Restaurants, Food and Drinks; Financial Institutions; Property Sales.</strong></p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:01:10', 1, '2017-12-19 04:13:09', 0),
(6, 'raisetheroof.jpg', 'raise-the-roof', '', 0, 'RAISE THE ROOF', '', '<p><strong>RAISE THE ROOF is a fascinating six month documentary exploring the world of a property developer as he designs and builds a housing development from start to finish. It will show the ins and outs, the struggles and triumphs and the laughter and tears, as well as giving insight into his public and private persona. This one of a kind programme will inform and educate our viewers in how a house is designed and built from scratch; it will also give tips about interior design and furnishing and guide them in the things people need to consider when thinking about buying, furnishing and equipping &nbsp;a new or existing house.</strong></p>\r\n\r\n<p><strong>MARKET: Aimed at viewers in the age range of 16 to 55, this series would benefit companies making Furniture and Home Appliances; Financial Institutions; Property Sales; Construction Materials; Home Decorating Products; Gadgets and Electronics; Cars; Magazines; General Millennial Products and Brands; Cinemas; Clubs; Fashion; Restaurants, Food and Drinks.</strong></p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:02:12', 1, '2017-12-19 04:12:47', 0),
(7, 'fonemile.jpg', 'a-filipinas-one-mile-adventure', '', 0, 'A FILIPINA’S ONE MILE …ADVENTURE With FILIPINA CELEBRITIES', '', '<p><strong>A FILIPINA&rsquo;S ONE MILE &hellip;ADVENTURE &nbsp;television series features various Filipina celebrities as they embark on a series of documentary comedy adventures simply trying to get from &lsquo;A to B.&rsquo; Along their journey they encounter obstacles that they must overcome, and in so doing, chat to real life people about themselves and their lives, their work r&ocirc;le, and the place in which they work, so these people and their workplace feature as the backdrop to the programme. </strong></p>\r\n\r\n<p><strong>A FILIPINA&rsquo;S ONE MILE &hellip;ADVENTURE is a hugely entertaining series that will quickly gain many fans and viewers because of the everyday innocent style, the bittersweet nature of the adventures, and the unique mix of comedy-drama and real-life documentary. Beginning with ONE MILE&hellip; WALK, we also have ONE MILE&hellip; HIGH &hellip; SWIM &hellip; JUMP and &hellip; DANCE. This series is essentially a &lsquo;lifestyle&rsquo; series that oozes class and entertains through humour and innocence.</strong></p>\r\n\r\n<p><strong>MARKET: Aimed at viewers in the age range of 10 and over, this series would benefit companies selling Make Up and Beauty Products; Travel and Luxury items; Cars; Magazines; Lifestyle Products and Brands; Family oriented products; Cinemas; Fashion; Restaurants, Food and Drinks; Financial Institutions; Property Sales.</strong></p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-19 04:06:18', 1, '2017-12-19 04:20:07', 0),
(8, 'yana.jpg', 'yana-and-friends', '', 0, 'YANA AND FRIENDS With YANA MANGAHAS', '', '<p><strong>YANA AND FRIENDS</strong> is a wonderful new TV Series aimed at Children between 2 and 10 years old, with an emphasis on learning through play. It&rsquo;s presented by Filipina Yana Mangahas who will present the shows in English and in Tagalog &ndash; such a great way for young children to learn English through music, songs, stories, play and entertainment. The series will feature both location and studio filmed episodes and will be truly interactive &ndash; all activities, learning, fun and games will be in a dedicated section of the website, offering a wide scope for advertisers and sponsors, as well as sales of spin off merchandise including toys, books, games and music.</p>\r\n\r\n<p><br />\r\n<strong>MARKET: </strong>Aimed at Young Children and Parents (especially Mothers) this series is a perfect advertising medium for companies producing items for this demographic: Laundry Products; Children&rsquo;s Products; Family Food; Home Appliances; Medical Supplies; Beauty and Make Up; Family services; Magazines; Schools and Educational Establishments; Local Government Institutions; Financial Institutions.</p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:04:13', 1, '2017-12-19 04:15:23', 0),
(9, 'gypsy.jpg', 'gypsy-moves', '', 0, 'GYPSY MOVES  With SHEENA VERA CRUZ', '', '<p><strong>GYPSY MOVES</strong> is one of 2 spectacular travel series exclusively on Channel Hue. Presented by international choreographer Sheena Vera Cruz, who has worked with Madonna, Beyonc&eacute; and many others, she explores Asia&rsquo;s dance and culture giving a fascinating insight into the countries and the people.</p>\r\n\r\n<p><strong>MARKET: </strong>Aimed at the &lsquo;millennial&rsquo; market and over, this series encompasses many opportunities for advertising by companies in the business of Travel; Hotels; Airlines; Bags and Accessories; Tourism Departments; Make Up and Beauty Products; Gadgets and Electronics; Cars; Celebrity Magazines; Fashion; Restaurants, Food and Drink; General Millennial Products and Brands; Cinemas; Clubs; Financial Institutions; Property Sales.</p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:05:36', 1, '2017-12-19 04:11:16', 0),
(10, 'drew.jpg', 'drews-travel', '', 0, 'DREW’S TRAVELS With DREW BINSKY', '', '<p>Arizona born Drew is a seasoned traveller and a social media sensation with over 500,000 followers and 14 million facebook views. He is a full-time travel blogger, video maker and social media influencer. The latest stops in his (so far) 120 country journey include North Korea, Tajikistan and the Philippines. His short but humorous and intriguing travel films make wonderfully entertaining viewing and will be a big hit on Channel Hue.</p>\r\n\r\n<p><br />\r\n<strong>MARKET: </strong>Like Gypsy Moves, this series is aimed at the &lsquo;millennial&rsquo; market and over, encompassing many opportunities for advertising by companies in the business of Travel; Hotels; Airlines; Tourism Departments; Bags and Accessories; Make Up and Beauty Products; Gadgets and Electronics; Cars; Celebrity Magazines; Fashion; Restaurants, Food and Drink; General Millennial Products and Brands; Cinemas; Clubs; Local Government Agencies; Financial Institutions.</p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:07:15', 1, '2017-12-19 04:23:22', 0),
(11, 'afraidtolove.jpg', 'afraid-to-love', '', 0, 'AFRAID TO LOVE', '', '<p><strong>AFRAID TO LOVE</strong> is not only a television series about the creation of a unique GRAPHIC NOVEL, it is also the publication itself, and both will be unique. It will be the most inspiring LGBT Graphic Novel ever to be published in the Philippines, produced under the auspices of some of today&rsquo;s best graphic novelists and featuring an innovative non- traditional type of storytelling. <strong>AFRAID TO LOVE </strong>will inspire and educate, and above all aims to empower not only the LGBT community, but everyone throughout the world through empathy and advocacy, because advocacy in all its forms seeks to ensure that people, particularly those who are most vulnerable in society, are able to have their voice and stories heard, that their rights are defended and safeguarded, and that their views and wishes are genuinely considered. The Graphic Novel will be released worldwide, and will be reviewed and endorsed by highly respected international celebrities, influencers and &lsquo;power players&rsquo; from LGBT communities across the globe.</p>\r\n\r\n<p><br />\r\n<strong>MARKET: </strong>Aimed at viewers 16 and over, this landmark series would benefit companies selling Make Up and Beauty Products; Gadgets and Electronics; Cars; High End and Celebrity Magazines; General Millennial Products and Brands; Music; Cinemas; Clubs; Fashion; Restaurants, Food and Drinks; Financial Institutions.</p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-19 04:08:57', 1, '2017-12-19 04:22:43', 0),
(12, 'chhue.jpg', 'channel-your-hue', '', 0, 'CHANNEL YOUR HUE  With JUSTIN JARRETT', '', '<p>International choreographer and model Justin Jarrett isn&rsquo;t afraid to try anything &ndash; he finds inspiration in the world around him and wants to tell you that you can do the same. This captivating magazine style show will grip its audience as Justin faces challenges in real-life situations and finds stories of courage through adversity. We want to inspire everyone to find their &lsquo;inner hue&rsquo; and give you the confidence to achieve your heart&rsquo;s desires.</p>\r\n\r\n<p><br />\r\n<strong>MARKET: </strong>This is Family viewing material and therefore covers a huge range of products for potential advertisers: Laundry Products; Children&rsquo;s Products; Family Food; Home Appliances; Medical Supplies; Furniture and Home Appliances; Home Decorating Products; Make Up and Beauty Products; Gadgets and Electronics; Cars; Magazines; General Millennial Products and Brands; Music; Cinemas; Clubs; Fashion; Restaurants, Food and Drinks; Financial Institutions; Local Government Departments.</p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:09:15', 1, '2017-12-19 04:23:13', 0),
(13, 'fall.jpg', 'the-fall', '', 0, 'THE FALL', '', '<p>A major new disturbing drama series about a fallen angel who delivers retribution for those who ask. This high budget series, aimed at an international audience, will feature up-to-the-minute CGI and special effects. It&rsquo;s not for the faint hearted &hellip; be careful what you wish for!</p>\r\n\r\n<p><br />\r\n<strong>MARKET: </strong>Aimed at viewers in the age range of 16 and over, this series would benefit companies in the business of Make Up and Beauty Products; Gadgets and Electronics; Cars; High End and Celebrity Magazines; General Millennial Products and Brands; Cinemas; Clubs; Fashion; Restaurants, Food and Drinks; Financial Institutions; Property Sales.</p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:10:27', 1, '2017-12-19 04:14:29', 0),
(14, 'justlanded.jpg', 'just-landed', '', 0, 'JUST LANDED', '', '<p>No-one has made a TV Series like this before. From the opening shot of six stars lining up perfectly in the heavens, to six international artistes arriving in Manila and checking in to the same portentous hostel, this 3 x Season, 39 x Episode Series kicks off in gloriously dramatic fashion catapulting the viewers on an edge of the seat journey of suspense, heart-breaking and heart-warming love stories and laugh out loud comedy. There are heroes, villains, sacrifice and selfishness all wrapped up in beautiful, original music and dance that will take the television world by storm and create a brand that will last for decades to come.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>MARKET: JUST LANDED </strong>is Family viewing at its best! Advertising and marketing suits a &nbsp;broad range of products for potential advertisers: Laundry Products; Children&rsquo;s Products; Family Food; Home Appliances; Medical Supplies; Furniture and Home Appliances; Home Decorating Products; Make Up and Beauty Products; Gadgets and Electronics; Cars; Magazines; General Millennial Products and Brands; Music; Cinemas; Clubs; Fashion; Restaurants, Food and Drinks; Financial Institutions; Property Sales.</p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:11:38', 1, '2017-12-19 04:11:51', 0),
(15, 'okoke.jpg', 'ok-oke', '', 0, 'OK OKE', '', '<p>A music and dance karaoke quiz game. Two teams of four family members compete to win cash and other prizes through six rounds of music based tasks and questions. This hilarious all-singing all-dancing quiz show will have viewers rolling in the aisles and shouting for their team. The quiz will be syndicated throughout the world and will be a true 360 degree brand with board games and internet interactive challenges and competitions. Real fun for all the family!</p>\r\n\r\n<p><strong>MARKET: OK OKE </strong>will be watched by millions of Families and appeal to all ages, so products that would benefit from this vast range of viewers include: Laundry Products; Children&rsquo;s Products; Family Food; Home Appliances; Medical Supplies; Furniture and Home Appliances; Home Decorating Products; Make Up and Beauty Products; Gadgets and Electronics; Cars; Magazines; General Millennial Products and Brands; Music; Cinemas; Clubs; Fashion; Restaurants, Food and Drinks; Financial Institutions.</p>', 1, 0, '0000-00-00 00:00:00', 1, '2017-12-08 08:15:00', 1, '2017-12-19 04:12:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `programme_type`
--

CREATE TABLE `programme_type` (
  `id_programme_type` int(11) NOT NULL,
  `programme_type_name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programme_type`
--

INSERT INTO `programme_type` (`id_programme_type`, `programme_type_name`, `description`, `is_active`) VALUES
(1, 'In production', 'In production', 1),
(2, 'In Development', 'In Development', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `role_name` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id_configuration` int(11) NOT NULL,
  `item` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id_configuration`, `item`, `value`) VALUES
(1, 'company_logo', 'logo.png'),
(2, 'company_name', 'Digimarine'),
(3, 'facebook_link', ''),
(4, 'youtube_link', ''),
(5, 'email_address', 'info@digimarintec.com <br> sales@digimarintec.com'),
(6, 'company_address', '23A08, building B, Zhengzhong Times Square, Longcheng Road, Longgang Central City, Shenzhen, China'),
(7, 'contact_number', '+86(0755)-28260683'),
(8, 'long', '114.251319'),
(9, 'lat', '22.727690');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id_subcategories` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id_subcategories`, `category_id`, `subcategory_name`, `description`, `slug_name`) VALUES
(1, 1, 'Radar Antenna', 'radar antenna', 'radar-antenna'),
(2, 1, 'AIS Tracker', 'AIS Tracker', 'ais-tracker'),
(3, 1, 'Fish Finder Black Box', 'Fish Finder Black box', 'fish-finder-black-box'),
(4, 1, 'AIS Black Box', 'AIS Black Box', 'ais-black-box'),
(5, 1, 'Weather Station', 'Weather Station', 'weather-station'),
(6, 1, 'Accessories', '', 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `trial_customers`
--

CREATE TABLE `trial_customers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `trial_signup_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trial_customers`
--

INSERT INTO `trial_customers` (`id`, `email`, `trial_signup_date`) VALUES
(1, 'steve@gmail.com', '2021-01-18 21:37:41'),
(2, 'steve', '2021-02-22 23:21:36'),
(3, 'xxx@ggg.com', '2021-02-22 23:23:47'),
(4, 'sadf@asdfasf.com', '2021-02-22 23:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id_videos` int(11) NOT NULL,
  `video_name` varchar(150) NOT NULL,
  `vid_thumb` text NOT NULL,
  `video_url` text NOT NULL,
  `video_author` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id_videos`, `video_name`, `vid_thumb`, `video_url`, `video_author`, `is_active`, `created_by`, `date_created`, `modified_by`, `date_modified`, `is_deleted`) VALUES
(1, 'test', 'https://i.vimeocdn.com/video/675697820.webp?mw=1200&mh=675', '<iframe src=\"https://player.vimeo.com/video/249774219\" width=\"640\" height=\"360\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'film competition', ' https://i.vimeocdn.com/video/650497693.jpg?mw=1100&mh=619&q=70', '<iframe src=\"https://player.vimeo.com/video/230031582\" width=\"640\" height=\"360\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Film Maker: John Adams. Copyright 2018', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'test vid1', 'https://i.vimeocdn.com/video/675697820.webp?mw=1200&mh=675', '&lt;iframe src=\"https://player.vimeo.com/video/249774219\" width=\"640\" height=\"360\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen&gt;&lt;/iframe&gt;', 'test', 1, 1, '2018-01-20 16:54:05', 1, '2018-01-20 17:00:58', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_accounts`);

--
-- Indexes for table `auditions`
--
ALTER TABLE `auditions`
  ADD PRIMARY KEY (`id_auditions`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id_authors`);

--
-- Indexes for table `author_news`
--
ALTER TABLE `author_news`
  ADD PRIMARY KEY (`id_authors`);

--
-- Indexes for table `author_programmes`
--
ALTER TABLE `author_programmes`
  ADD PRIMARY KEY (`id_author_programmes`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_banners`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id_banner_images`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id_competitions`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id_contacts`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id_distributors`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_images`);

--
-- Indexes for table `magazines`
--
ALTER TABLE `magazines`
  ADD PRIMARY KEY (`id_magazines`);

--
-- Indexes for table `magazine_files`
--
ALTER TABLE `magazine_files`
  ADD PRIMARY KEY (`id_magazine_files`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_pages`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id_programmes`);

--
-- Indexes for table `programme_type`
--
ALTER TABLE `programme_type`
  ADD PRIMARY KEY (`id_programme_type`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_configuration`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id_subcategories`);

--
-- Indexes for table `trial_customers`
--
ALTER TABLE `trial_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_videos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_accounts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auditions`
--
ALTER TABLE `auditions`
  MODIFY `id_auditions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id_authors` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `author_news`
--
ALTER TABLE `author_news`
  MODIFY `id_authors` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `author_programmes`
--
ALTER TABLE `author_programmes`
  MODIFY `id_author_programmes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id_banners` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id_banner_images` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id_competitions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id_contacts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id_distributors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id_images` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `magazines`
--
ALTER TABLE `magazines`
  MODIFY `id_magazines` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `magazine_files`
--
ALTER TABLE `magazine_files`
  MODIFY `id_magazine_files` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_pages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id_programmes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `programme_type`
--
ALTER TABLE `programme_type`
  MODIFY `id_programme_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id_configuration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id_subcategories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trial_customers`
--
ALTER TABLE `trial_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_videos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
