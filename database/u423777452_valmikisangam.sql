-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2023 at 10:44 AM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u423777452_valmikisangam`
--

-- --------------------------------------------------------

--
-- Table structure for table `astro_talk`
--

CREATE TABLE `astro_talk` (
  `astro_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `astro_category` varchar(255) NOT NULL,
  `astro_date` varchar(255) NOT NULL,
  `astro_talk_process` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `astro_talk`
--

INSERT INTO `astro_talk` (`astro_id`, `user_id`, `astro_category`, `astro_date`, `astro_talk_process`) VALUES
(5, 'VS11111UIDGG', 'समस्या समाधान', '09 Aug, 2023', 'Cancel'),
(22, 'VS66666UIDBB', 'समस्या समाधान', '10 Aug, 2023', 'Cancel'),
(24, 'VS66666UIDBB', 'समस्या समाधान', '10 Aug, 2023', 'Done'),
(25, 'VS45625UIDRA', 'समस्या समाधान', '16 Aug, 2023', 'Pending'),
(26, 'VS45625UIDRA', 'समस्या समाधान', '19 Aug, 2023', 'Pending'),
(27, 'VS55545UIDDI', 'समस्या समाधान', '19 Aug, 2023', 'Pending'),
(28, 'VS11111UIDPI', 'समस्या समाधान', '21 Aug, 2023', 'Pending'),
(29, 'VS22222UIDRA', 'समस्या समाधान', '23 Aug, 2023', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(59, 'MS Powerpoint ', 0),
(58, 'MS Word', 0),
(57, 'Excel', 0),
(56, 'English', 0),
(54, 'VB.Net', 2),
(55, 'MPPSC', 0),
(53, 'MS-OFFICE', 3),
(60, 'Programming', 2);

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE `form_data` (
  `form_id` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `for_who` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `dot` varchar(255) NOT NULL,
  `dol` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `rang` varchar(255) NOT NULL,
  `manglik` varchar(255) NOT NULL,
  `edu` varchar(255) NOT NULL,
  `business` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pradesh` varchar(255) NOT NULL,
  `jila` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fphone` varchar(255) NOT NULL,
  `fbusiness` varchar(255) NOT NULL,
  `fgotra` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `mgotra` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`form_id`, `id`, `for_who`, `name`, `dob`, `dot`, `dol`, `height`, `rang`, `manglik`, `edu`, `business`, `state`, `phone`, `email`, `gender`, `address`, `pradesh`, `jila`, `pincode`, `fname`, `fphone`, `fbusiness`, `fgotra`, `mname`, `mgotra`, `location`, `family`, `img`, `date`) VALUES
(1, 'VS62741UIDBH', '', 'Bhoomi Chaurashiya', '', '', '', '5.0-5.5 feet', 'Gerua', 'हां', 'BA', '', 'NONE', '9617762741', '', 'महिला', '9617762741', 'NONE', '9617762741', '9617762741', '9617762741', '9617762741', '', '', '', '', '', '', '23_Jul_2023_01_46_42pm_website_qr.png', '23 Jul, 2023'),
(4, 'VS62747UIDAA', '', 'Aarshi Sahu', '', '', '', '4.5-5.0 feet', 'NONE', 'हां', 'BCom', '', 'अविवाहित', '8817762747', '', 'पुरूष', '8817762747', 'मध्यप्रदेश', '', '8817762747', '8817762747', '8817762747', '8817762747', '', '', '', '', '', '23_Jul_2023_01_43_56pm_logo.png', '23 Jul, 2023'),
(5, 'VS62747UIDKA', '', 'Kavita Sahu', '', '', '', '5.0-5.5 feet', 'Gerua', 'हां', 'BA', '', 'अविवाहित', '9517762747', '', 'पुरूष', '9517762747', 'मध्यप्रदेश', '', '9517762747', '9517762747', '9517762747', '9517762747', '', '', '', '', '', '23_Jul_2023_01_45_45pm_website_qr.png', '23 Jul, 2023'),
(6, 'VS62747UIDNI', '', 'Nitika Chauhan', '', '', '', '5.5-6.0 feet', 'Gora', 'हां', 'BCom', '', 'अविवाहित', '9817762747', '', 'पुरूष', '9817762747', 'NONE', '9817762747', '9817762747', '9817762747', '9817762747', '', '', '', '', '', '', '23_Jul_2023_01_44_49pm_logo.png', '23 Jul, 2023'),
(13, 'VS67890UIDAA', '', 'Aanchal Patel', '2001-12-04', '', '', 'NONE', 'Gerua', 'नहीं', 'BA', '', 'अविवाहित', '1234567890', '', 'महिला', 'add', 'NONE', '', '1234567890', 'FNAME', '1234567890', '', '', '', '', '', '', '23_Jul_2023_01_38_40pm_f.png', '23 Jul, 2023'),
(14, 'VS67890UIDAN', '', 'Aniket Patel', '', '', '', '5.0-5.5 feet', 'Gerua', 'हां', '12th', '', 'NONE', '1234567890', '', 'पुरूष', '1234567890', 'NONE', '', '1234567890', 'Fname', '1234567890', '', '', '', '', '', '', '23_Jul_2023_01_39_55pm_f.png', '23 Jul, 2023'),
(15, 'VS67890UIDHA', '', 'Harshita Yadav', '', '', '', 'NONE', 'NONE', 'हां', 'BA', '', 'अविवाहित', '1234567890', '', 'पुरूष', '1234567890', 'NONE', '', '1234567890', '1234567890', '1234567890', '', '', '', '', '', '', '23_Jul_2023_01_40_38pm_f.png', '23 Jul, 2023'),
(19, 'VS75642UIDOI', '', 'oiu', '', '', '', 'NONE', 'NONE', 'NONE', 'ba', '', 'NONE', '1239875642', '', 'पुरूष', '1239875642', 'NONE', '', '1239875642', '1239875642', '1239875642', '', '', '', '', '', '', '26_Jul_2023_06_25_16am_website_qr.png', '26 Jul, 2023'),
(23, 'VS32131UIDV', 'अन्य', 'v', '', '', '', 'NONE', 'NONE', 'NONE', 'v', '', 'NONE', '1231232131', 'pius@gmail.com', 'पुरूष', 'va', 'NONE', '', '1231232131', '1231232131', '1231232131', '', '', '', '', '', '', '05_Aug_2023_06_15_43pm_05_Aug_2023_06_28_40am_user.png.webp.webp', '05 Aug, 2023'),
(25, 'VS43211UIDPI', 'वैवाहिक मिलान', 'YO', '2023-08-07', '16:30', 'Jabalpur', '3.5-4.0 feet', 'Gerua', '', 'vs', '', 'विधुर', '8817762774', 'p@gmail.com', 'पुरूष', '2 add', 'मध्य प्रदेश', 'Jabalpur', '482202', 'ab', '4655548744', '', '', '', '', '', '', '07_Aug_2023_06_30_21am_22.webp', '06 Aug, 2023'),
(26, 'VS54321UIDNA', 'समस्या समाधान', 'Name', '2023-08-16', '02:37', 'DOL', '', '', '', '', '', '', '9087654321', '', 'पुरूष', 'Address', 'मध्य प्रदेश', 'Jila', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '06 Aug, 2023'),
(48, 'VS99999UIDBD', 'प्रकार', 'bd', '2002-02-01', '01:02', '9999999999', '', '', '', '', '', '', '9999999999', '', 'पुरूष', '9999999999', 'मध्य प्रदेश', '9999999999', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '09 Aug, 2023'),
(49, 'VS99999UIDBD', 'प्रकार', 'bd', '2002-02-01', '01:02', '9999999999', '', '', '', '', '', '', '9999999999', '', 'पुरूष', '9999999999', 'मध्य प्रदेश', '9999999999', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '09 Aug, 2023'),
(50, 'VS99999UIDBD', 'प्रकार', 'bd', '2002-02-01', '01:02', '9999999999', '', '', '', '', '', '', '9999999999', '', 'पुरूष', '9999999999', 'मध्य प्रदेश', '9999999999', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '09 Aug, 2023'),
(51, 'VS99999UIDBD', 'प्रकार', 'bd', '2002-02-01', '01:02', '9999999999', '', '', '', '', '', '', '9999999999', '', 'पुरूष', '9999999999', 'मध्य प्रदेश', '9999999999', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '09 Aug, 2023'),
(52, 'VS99999UIDBD', 'प्रकार', 'bd', '2002-02-01', '01:02', '9999999999', '', '', '', '', '', '', '9999999999', '', 'पुरूष', '9999999999', 'मध्य प्रदेश', '9999999999', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '09 Aug, 2023'),
(53, 'VS99999UIDBD', 'प्रकार', 'bd', '2002-02-01', '01:02', '9999999999', '', '', '', '', '', '', '9999999999', '', 'पुरूष', '9999999999', 'मध्य प्रदेश', '9999999999', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '09 Aug, 2023'),
(61, 'VS66666UIDBB', 'समस्या समाधान', 'bb', '2002-02-01', '05:31', 'location', '', '', '', '', '', '', '6666666666', '', 'पुरूष', '6666666666', 'मध्य प्रदेश', 'jila', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '10 Aug, 2023'),
(63, 'VS66666UIDZZ', 'कुंड़ली मिलान', 'zz', '2002-02-01', '01:35', 'dol', '', '', '', '', '', '', '6666666666', '', 'पुरूष', 'add', 'मध्य प्रदेश', 'jila', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '19 Aug, 2023'),
(65, 'VS55545UIDDI', 'समस्या समाधान', 'Divya ', '1999-08-02', '07:26', 'Jabalpur ', '', '', '', '', '', '', '8319655545', '', 'महिला', 'Jabalpur Phootatal ', 'मध्य प्रदेश', 'Jabalpur ', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '19 Aug, 2023'),
(66, 'VS11111UIDPI', 'समस्या समाधान', 'PIYUDH', '2002-01-02', '01:03', '01202121', '', '', '', '', '', '', '1111111111', '', 'पुरूष', '1012', 'मध्य प्रदेश', '12112121', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '21 Aug, 2023'),
(67, 'VS22222UIDRA', 'समस्या समाधान', 'Raj', '2023-08-09', '19:42', 'Jabalpur', '', '', '', '', '', '', '1222222222', '', 'पुरूष', 'Jabalpur', 'मध्य प्रदेश', 'Jabalpur', '', '', '', '', '', '', '', '', '', 'userProfile.webp', '23 Aug, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `kundali_milan`
--

CREATE TABLE `kundali_milan` (
  `km_id` int(11) NOT NULL,
  `main_profile` varchar(255) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_phone` varchar(255) NOT NULL,
  `b_gender` varchar(255) NOT NULL,
  `b_dob` varchar(255) NOT NULL,
  `b_dot` varchar(255) NOT NULL,
  `b_dol` varchar(255) NOT NULL,
  `b_add` varchar(255) NOT NULL,
  `b_pradesh` varchar(255) NOT NULL,
  `b_jila` varchar(255) NOT NULL,
  `b_date` varchar(255) NOT NULL,
  `process` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kundali_milan`
--

INSERT INTO `kundali_milan` (`km_id`, `main_profile`, `b_name`, `b_phone`, `b_gender`, `b_dob`, `b_dot`, `b_dol`, `b_add`, `b_pradesh`, `b_jila`, `b_date`, `process`) VALUES
(12, 'VS66666UIDZZ', 'tt', '6454121212', 'महिला', '1992-02-01', '01:59', 'location', 'address', 'मध्य प्रदेश', 'jila 2', '19 Aug, 2023', 'Cancel'),
(13, 'VS66666UIDZZ', 'PP', '1111111111', 'महिला', '2200-02-01', '05:04', '45', '54', 'छत्तीसगढ', '12', '19 Aug, 2023', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `category` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL,
  `post_img_2` varchar(255) NOT NULL,
  `post_img_3` varchar(255) NOT NULL,
  `post_img_4` varchar(255) NOT NULL,
  `post_img_5` varchar(255) NOT NULL,
  `vlink` varchar(255) NOT NULL,
  `audio` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`, `post_img_2`, `post_img_3`, `post_img_4`, `post_img_5`, `vlink`, `audio`) VALUES
(172, 'वाल्मीकि समाज जबलपुर के शपथ ग्रहण समारोह का हुआ आयोजन', 'वाल्मीकि समाज का शपथ ग्रहण समारोह रामलीला मैदान सदर में आयोजित हुआ। कार्यक्रम में राज्यसभा सांसद सुमित्रा वाल्मीकि, महापौर जगत बहादुर सिंह अन्नू, ननि अध्यक्ष रिंकू विज, विधायक अशोक रोहाणी उपस्थित रहे। इस मौके पर दूसरी बार वाल्मीकि समाज के अध्यक्ष बने रूप किशोर चौहान ने शपथ ग्रहण की।\r\nइस मौके पर पर श्रीमती वाल्मीकि ने कार्यकारिणी के साथ और समाज के लिए हर वक्त उपस्थित रहने का वादा किया। महापौर जगत बहादुर सिंह अन्नू ने वाल्मीकि समाज की बहुचर्चित मांग को पूरा किया। उन्होंने कहा कि इन्कम टैक्स चौक का नाम महर्षि वाल्मीकि चौक रखा जाएगा। आगामी एमआईसी सदन की बैठक में इस प्रस्ताव को रखा जाएगा। विधायक अशोक रोहाणी ने समाज के 25 मेधावी बच्चों को 1 हजार रुपए देने की घोषणा की। ननि अध्यक्ष रिंक विज ने तीनों विजयी प्रत्याशियों का बधाई देकर हर संभव सहयोग का आश्वासन दिया। कार्यक्रम के दूसरे चरण में महर्षि वाल्मीकि पर गीत प्रस्तुत किए गए। बलराम वाल्मीकि, उमाशंकर करोसिया, गोविंद डागौर, धर्मदास बघेल, संतलाल खरे आदि उपस्थित रहे।', 'साहित्य', '16 Aug, 2023', 111, '19_Aug_2023_11_22_57am_Untitled-1.jpg', '17_Aug_2023_07_55_27am_WhatsApp Image 2023-08-17 at 12.04.01 PM.jpeg', '17_Aug_2023_07_55_27am_WhatsApp Image 2023-08-17 at 12.04.00 PM.jpeg', '17_Aug_2023_07_55_27am_WhatsApp Image 2023-08-17 at 12.03.59 PM.jpeg', '17_Aug_2023_07_55_27am_WhatsApp Image 2023-08-17 at 12.03.58 PM.jpeg', 'jy153-dyndk', ''),
(174, 'वाल्मीकि समाज जबलपुर द्वारा ध्वजारोहण कार्यक्रम संपन्न हुआ।', 'माननीय विधायक श्री लखन गंगोरिया जी द्वारा 15 अगस्त स्वतंत्रता दिवस के अवसर पर लाल माटी जबलपुर क्षेत्र में ध्वजारोहण कार्यक्रम संपन्न हुआ । जिसमें मुख्य अतिथि विधायक श्री लखन घंघोरिया जी को फलों से तोला गया एवं वितरण किया गया। यह कार्यक्रम वाल्मीकि समाज जबलपुर के अध्यक्ष आदरणीय श्री रूप किशोर चैहान जी के नेतृत्व में किया गया।', 'साहित्य', '19 Aug, 2023', 111, '19_Aug_2023_03_35_00pm_04.jpg', '19_Aug_2023_03_32_25pm_02.jpg.webp', '19_Aug_2023_03_32_25pm_01.jpg.webp', '19_Aug_2023_03_32_25pm_03.jpg.webp', '19_Aug_2023_03_32_26pm_03.jpg.webp', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `res_id` int(11) NOT NULL,
  `main_profile` varchar(255) NOT NULL,
  `want_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reste`
--

CREATE TABLE `reste` (
  `rid` int(11) NOT NULL,
  `main_profile` varchar(255) NOT NULL,
  `assin_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reste`
--

INSERT INTO `reste` (`rid`, `main_profile`, `assin_profile`) VALUES
(8, '', 'VS0103UIDAB'),
(9, '', 'VS0103UIDBU'),
(10, '', 'VS67890UIDRA'),
(11, 'VS67890UIDRA', 'VS0103UIDAB'),
(12, 'VS67890UIDRA', '17'),
(13, 'VS0103UIDRA', 'VS0103UIDBU'),
(14, 'VS67890UIDRA', '16'),
(15, 'VS62774UIDPI', 'VS67890UIDPA'),
(16, 'VS62774UIDPI', 'VS67890UIDAA'),
(17, 'VS62774UIDPI', 'VS62746UIDSH'),
(18, 'VS67890UIDPA', 'VS62774UIDPI'),
(22, 'VS67890UIDHA', 'VS67890UIDAN'),
(23, 'VS67890UIDHA', 'VS62774UIDPI'),
(24, 'VS67890UIDUS', 'VS76224UIDES'),
(25, 'VS67890UIDUS', 'VS43211UIDPI'),
(26, 'VS11111UIDEE', 'VS67890UIDHA'),
(27, 'VS22222UIDRA', 'VS99999UIDBD');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `websitename` varchar(60) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footerdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `websitename`, `logo`, `footerdesc`) VALUES
(1, 'Mission Shiksha', 'misssionlogo.PNG', 'Copyright 2023 News | Powered by Piyush Shailendra Kumar Raikwar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `img` text NOT NULL,
  `otp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`, `img`, `otp`) VALUES
(111, 'Piyush', 'Raikwar', 'Piyush', 'd9b1d7db4cd6e70935368a1efb10e377', 1, '19_Oct_2023_11_40_20am_IMG-20231019-WA0001.jpg', ''),
(112, 'a', 'a', 'a', '28c8edde3d61a0411511d3b1866f0636', 1, '29_Jul_2023_05_33_54am_logo.png', ''),
(113, 'Pt', 'PALAK', 'VS0103UIDPA', 'c4ca4238a0b923820dcc509a6f75849b', 0, '06_Aug_2023_08_22_52am_05_Aug_2023_06_28_40am_user.png.webp', ''),
(114, 'anu shri', 'anu shri', 'VS0103UIDAN', '2aac7ea3a24093e793257ca7f258d0c6', 9, '21_Jul_2023_05_19_40am_f.png', ''),
(115, 'ABC', 'ABC', 'VS0103UIDAB', '0555f63ba79a771e39795013646a9eec', 9, '21_Jul_2023_05_26_03am_website_qr.png', ''),
(116, 'piyush', 'piyush', 'vs', 'e916a668cb794546f0bf096f3c0df66e', 9, '21_Jul_2023_05_35_04am_website_qr.png', 'F4B9EC'),
(117, 'HARSH', 'HARSH', 'VS0103UIDHA', '3389a182375fde03e58bf607592d3f22', 9, '21_Jul_2023_05_38_04am_f.png', ''),
(118, 'xyz', 'xyz', 'VS0103UIDXY', 'e46c82f154f78d26e5e9df3c7e556fb6', 9, '21_Jul_2023_06_20_34am_f.png', ''),
(119, 'SHANTI', 'SHANTI', 'VS0103UIDSH', '8b13a611556d75df482d92e2eedc3edb', 9, '21_Jul_2023_06_23_23am_admin_logo.png', ''),
(120, 'raj', 'raj', 'VS0103UIDRA', '66c940c06a2125c67d311355c805e886', 9, '22_Jul_2023_04_56_34am_website_qr.png', ''),
(121, 'BUI', 'BUI', 'VS0103UIDBU', '40e66cea0c0f79812a237f6f3c75b60c', 9, '22_Jul_2023_05_58_23am_f.png', ''),
(122, 'Palak', 'Palak', 'VS33314UIDPA', 'e916a668cb794546f0bf096f3c0df66e', 9, '22_Jul_2023_06_57_25pm_f.png', ''),
(124, 'ranu', 'ranu', 'VS67890UIDRA', '06267477b5046f29350f4d71c30e63b2', 9, '23_Jul_2023_05_56_11am_website_qr.png', ''),
(125, 'Piyush kumar Raikwar', 'Piyush kumar Raikwar', 'VS62774UIDPI', 'cacea05643c72e9dd2be82699de2ef4a', 9, '23_Jul_2023_01_36_31pm_logo.png', ''),
(126, 'Palak Namdeo', 'Palak Namdeo', 'VS67890UIDPA', '407382b67ae54a7c92c4d4bf7ccf4c76', 9, '23_Jul_2023_01_37_37pm_website_qr.png', ''),
(127, 'Aanchal Patel', 'Aanchal Patel', 'VS67890UIDAA', '9b4cd52d44a75fa40b359c1aeb33b8e7', 9, '23_Jul_2023_01_38_40pm_f.png', ''),
(128, 'Aniket Patel', 'Aniket Patel', 'VS67890UIDAN', '28eafefa3e08bcf1a1babf955c0a9c92', 9, '23_Jul_2023_01_39_55pm_f.png', ''),
(129, 'Harshita Yadav', 'Harshita Yadav', 'VS67890UIDHA', 'c4ca4238a0b923820dcc509a6f75849b', 9, '23_Jul_2023_01_40_38pm_f.png', ''),
(131, 'Aarshi Sahu', 'Aarshi Sahu', 'VS62747UIDAA', '2809cbb254bee686e1027a3cc27375e6', 9, '23_Jul_2023_01_43_56pm_logo.png', ''),
(132, 'Nitika Chauhan', 'Nitika Chauhan', 'VS62747UIDNI', '6ac5a08d5283c94f9862819a74746dcf', 9, '23_Jul_2023_01_44_49pm_logo.png', ''),
(133, 'Kavita Sahu', 'Kavita Sahu', 'VS62747UIDKA', '64fc2649780c9a0d4e977b58dbbb53c8', 9, '23_Jul_2023_01_45_45pm_website_qr.png', ''),
(134, 'Bhoomi Chaurashiya', 'Bhoomi Chaurashiya', 'VS62741UIDBH', 'af588644db1597764e2a714eabed1682', 9, '23_Jul_2023_01_46_42pm_website_qr.png', ''),
(172, 'bd', 'bd', 'VS99999UIDBD', 'a3e373d3d80e6c75d788a039eda91d8e', 9, 'userProfile.webp', ''),
(180, 'Pandit Meher ', 'Prakash Upadhyay', 'VS35055UIDPR', '202cb962ac59075b964b07152d234b70', 5, '20_Aug_2023_04_20_38am_2.webp.webp', ''),
(175, 'bb', 'bb', 'VS66666UIDBB', 'c4ca4238a0b923820dcc509a6f75849b', 9, 'userProfile.webp', ''),
(182, 'Raj', 'Raj', 'VS22222UIDRA', 'c4ca4238a0b923820dcc509a6f75849b', 9, 'userProfile.webp', ''),
(177, 'zz', 'zz', 'VS66666UIDZZ', 'a705cb76fd20ea3ecb0f6b480f3548f5', 9, 'userProfile.webp', ''),
(181, 'PIYUDH', 'PIYUDH', 'VS11111UIDPI', '3cfe73f67d9764dc117870f77689158e', 9, 'userProfile.webp', ''),
(179, 'Divya ', 'Divya ', 'VS55545UIDDI', 'd9ae8d063e44505ff2f56eb81258a165', 9, 'userProfile.webp', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `log_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `log_time` varchar(255) NOT NULL,
  `log_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`log_id`, `user_id`, `username`, `user_role`, `log_time`, `log_date`) VALUES
(3, '111', 'Piyush', 'Admin', '04:49:05 AM', '21-08-2023'),
(4, '180', 'VS35055UIDPR', 'Astrologiest', '04:49:27 AM', '21-08-2023'),
(5, '111', 'Piyush', 'Admin', '07:33:20 AM', '21-08-2023'),
(6, '111', 'Piyush', 'Admin', '07:33:40 AM', '21-08-2023'),
(7, '111', 'Piyush', 'Admin', '11:11:40 AM', '23-08-2023'),
(8, '111', 'Piyush', 'Admin', '11:12:18 AM', '23-08-2023'),
(9, '111', 'Piyush', 'Admin', '05:15:39 PM', '23-08-2023'),
(10, '111', 'Piyush', 'Admin', '04:00:02 AM', '31-08-2023'),
(11, '111', 'Piyush', 'Admin', '12:36:19 PM', '01-09-2023'),
(12, '111', 'Piyush', 'Admin', '09:42:20 AM', '02-10-2023'),
(13, '111', 'Piyush', 'Admin', '09:43:49 AM', '02-10-2023'),
(14, '111', 'Piyush', 'Admin', '05:09:03 AM', '04-10-2023'),
(15, '111', 'Piyush', 'Admin', '05:09:17 AM', '04-10-2023'),
(16, '111', 'Piyush', 'Admin', '06:54:55 AM', '05-10-2023'),
(17, '111', 'Piyush', 'Admin', '06:55:05 AM', '05-10-2023'),
(18, '111', 'Piyush', 'Admin', '12:36:25 PM', '16-10-2023'),
(19, '111', 'Piyush', 'Admin', '11:38:58 AM', '19-10-2023'),
(20, '111', 'Piyush', 'Admin', '11:39:12 AM', '19-10-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `astro_talk`
--
ALTER TABLE `astro_talk`
  ADD PRIMARY KEY (`astro_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `kundali_milan`
--
ALTER TABLE `kundali_milan`
  ADD PRIMARY KEY (`km_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `reste`
--
ALTER TABLE `reste`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `astro_talk`
--
ALTER TABLE `astro_talk`
  MODIFY `astro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `kundali_milan`
--
ALTER TABLE `kundali_milan`
  MODIFY `km_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `reste`
--
ALTER TABLE `reste`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
