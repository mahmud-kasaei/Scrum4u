-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2013 at 04:00 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `symfony2`
--

-- --------------------------------------------------------

--
-- Table structure for table `backlog`
--

CREATE TABLE IF NOT EXISTS `backlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sprint_id` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `epic_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `builder_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `estimate` int(11) DEFAULT NULL,
  `real_time` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `how_its_demo` longtext COLLATE utf8_unicode_ci,
  `create_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CF9BAB998C24077B` (`sprint_id`),
  KEY `IDX_CF9BAB995550C4ED` (`pid`),
  KEY `IDX_CF9BAB996B71E00E` (`epic_id`),
  KEY `IDX_CF9BAB996BF700BD` (`status_id`),
  KEY `IDX_CF9BAB99A76ED395` (`user_id`),
  KEY `IDX_CF9BAB99959F66E4` (`builder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `backlog`
--

INSERT INTO `backlog` (`id`, `sprint_id`, `pid`, `epic_id`, `status_id`, `user_id`, `builder_id`, `title`, `description`, `estimate`, `real_time`, `priority`, `how_its_demo`, `create_date`, `start_date`, `end_date`) VALUES
(1, NULL, NULL, NULL, 4, NULL, NULL, 'داستان 1', NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 'داستان 2', NULL, NULL, NULL, 200, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE IF NOT EXISTS `basic_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `builder_id` int(11) DEFAULT NULL,
  `create_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9F9F7D3C959F66E4` (`builder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `epic`
--

CREATE TABLE IF NOT EXISTS `epic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fos_group`
--

CREATE TABLE IF NOT EXISTS `fos_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4B019DDB5E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fileName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `name`, `lastname`, `fileName`) VALUES
(1, 'ali', 'ali', 'ali@iran.iran', 'ali@iran.iran', 1, 's128yzenis0cwgo0ck80k8kg840kc8c', 'U13TCKfL/zUAjeipE022K6DzuMUIVZO0v4LaAjK6Lgaj/njhqCRBjdza5Gg3GfRahKO2Wvm8hrFCUnQ/dn83TA==', '2013-06-19 09:34:04', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'ali', 'shahbayki', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fos_user_user_group`
--

CREATE TABLE IF NOT EXISTS `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `IDX_B3C77447A76ED395` (`user_id`),
  KEY `IDX_B3C77447FE54D947` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `builder_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `create_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PO_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E00EE9726BF700BD` (`status_id`),
  KEY `IDX_E00EE9725550C4ED` (`pid`),
  KEY `IDX_E00EE972959F66E4` (`builder_id`),
  KEY `IDX_E00EE972727ACA70` (`parent_id`),
  KEY `IDX_E00EE972A4466C9F` (`PO_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `status_id`, `pid`, `builder_id`, `parent_id`, `title`, `description`, `create_date`, `start_date`, `end_date`, `PO_id`) VALUES
(1, 1, NULL, 1, NULL, 'اسکرام 4 یو', '4ثثق', '12/5', '12', '12/05', 1),
(2, NULL, NULL, NULL, NULL, 'پروژه2', 'یقث', '11/10', '12/11', '05/06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE IF NOT EXISTS `project_user` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`project_id`),
  KEY `IDX_B4021E51A76ED395` (`user_id`),
  KEY `IDX_B4021E51166D1F9C` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `length` int(11) NOT NULL,
  `gap` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprint`
--

CREATE TABLE IF NOT EXISTS `sprint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `timeunit_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `builder_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `goal` longtext COLLATE utf8_unicode_ci NOT NULL,
  `presentation_demo_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `scrum_meeting_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `scrum_meeting_place` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E82C50815550C4ED` (`pid`),
  KEY `IDX_E82C50815878D878` (`timeunit_id`),
  KEY `IDX_E82C5081A40BC2D5` (`schedule_id`),
  KEY `IDX_E82C50816BF700BD` (`status_id`),
  KEY `IDX_E82C5081959F66E4` (`builder_id`),
  KEY `IDX_E82C5081296CD8AE` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'در حال انجام'),
(2, 'در حال تست'),
(3, 'انجام شده'),
(4, 'تحویل شده');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `backlog_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `builder_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `estimate` int(11) DEFAULT NULL,
  `create_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `real_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F24C741BF1F06ABE` (`backlog_id`),
  KEY `IDX_F24C741B6BF700BD` (`status_id`),
  KEY `IDX_F24C741BA76ED395` (`user_id`),
  KEY `IDX_F24C741B959F66E4` (`builder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `backlog_id`, `status_id`, `user_id`, `builder_id`, `title`, `description`, `estimate`, `create_date`, `start_date`, `end_date`, `real_time`) VALUES
(1, 1, 1, 1, 1, 'esrt', 'i-0', 21, '21/1', '21/1', '21/1', 21),
(2, 2, 2, 1, 1, 'wer', '7t8', 21, '21/1', '21/1', '21/1', 21),
(3, 2, NULL, 1, 1, 'dr', 'drd', 8, '12', '12', '12', 1),
(4, 1, NULL, 1, 1, 'gygh', 'fyty', 13, '12', '12', '12', 1),
(8, 2, NULL, 1, 1, 'SD', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `SM_id` int(11) DEFAULT NULL,
  `SA_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64D2092149EFDEC4` (`SM_id`),
  KEY `IDX_64D20921339617C` (`SA_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `title`, `description`, `SM_id`, `SA_id`) VALUES
(1, 'تیم 1', 'سیب', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE IF NOT EXISTS `team_member` (
  `team_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`team_id`,`member_id`),
  KEY `IDX_6FFBDA1296CD8AE` (`team_id`),
  KEY `IDX_6FFBDA17597D3FE` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`team_id`, `member_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `backlog_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `builder_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `setup` longtext COLLATE utf8_unicode_ci NOT NULL,
  `inputs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `setps` longtext COLLATE utf8_unicode_ci NOT NULL,
  `expectedResult` longtext COLLATE utf8_unicode_ci NOT NULL,
  `actualResult` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estimate` int(11) NOT NULL,
  `create_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_784DD132F1F06ABE` (`backlog_id`),
  KEY `IDX_784DD1326BF700BD` (`status_id`),
  KEY `IDX_784DD132A76ED395` (`user_id`),
  KEY `IDX_784DD132959F66E4` (`builder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `timeunit`
--

CREATE TABLE IF NOT EXISTS `timeunit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`member_id`),
  KEY `IDX_8F02BF9DFE54D947` (`group_id`),
  KEY `IDX_8F02BF9D7597D3FE` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `backlog`
--
ALTER TABLE `backlog`
  ADD CONSTRAINT `FK_CF9BAB995550C4ED` FOREIGN KEY (`pid`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `FK_CF9BAB996B71E00E` FOREIGN KEY (`epic_id`) REFERENCES `epic` (`id`),
  ADD CONSTRAINT `FK_CF9BAB996BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_CF9BAB998C24077B` FOREIGN KEY (`sprint_id`) REFERENCES `sprint` (`id`),
  ADD CONSTRAINT `FK_CF9BAB99959F66E4` FOREIGN KEY (`builder_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_CF9BAB99A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD CONSTRAINT `FK_9F9F7D3C959F66E4` FOREIGN KEY (`builder_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `fos_user_user_group`
--
ALTER TABLE `fos_user_user_group`
  ADD CONSTRAINT `FK_B3C77447A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_B3C77447FE54D947` FOREIGN KEY (`group_id`) REFERENCES `fos_group` (`id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_E00EE9725550C4ED` FOREIGN KEY (`pid`) REFERENCES `schedule` (`id`),
  ADD CONSTRAINT `FK_E00EE9726BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_E00EE972727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `FK_E00EE972959F66E4` FOREIGN KEY (`builder_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_E00EE972A4466C9F` FOREIGN KEY (`PO_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `FK_B4021E51166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `FK_B4021E51A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `sprint`
--
ALTER TABLE `sprint`
  ADD CONSTRAINT `FK_E82C5081296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_E82C50815550C4ED` FOREIGN KEY (`pid`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `FK_E82C50815878D878` FOREIGN KEY (`timeunit_id`) REFERENCES `timeunit` (`id`),
  ADD CONSTRAINT `FK_E82C50816BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_E82C5081959F66E4` FOREIGN KEY (`builder_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_E82C5081A40BC2D5` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FK_F24C741B6BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_F24C741B959F66E4` FOREIGN KEY (`builder_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_F24C741BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_F24C741BF1F06ABE` FOREIGN KEY (`backlog_id`) REFERENCES `backlog` (`id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `FK_64D20921339617C` FOREIGN KEY (`SA_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_64D2092149EFDEC4` FOREIGN KEY (`SM_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `team_member`
--
ALTER TABLE `team_member`
  ADD CONSTRAINT `FK_6FFBDA1296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_6FFBDA17597D3FE` FOREIGN KEY (`member_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `FK_784DD1326BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_784DD132959F66E4` FOREIGN KEY (`builder_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_784DD132A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_784DD132F1F06ABE` FOREIGN KEY (`backlog_id`) REFERENCES `backlog` (`id`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `FK_8F02BF9D7597D3FE` FOREIGN KEY (`member_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_8F02BF9DFE54D947` FOREIGN KEY (`group_id`) REFERENCES `usergroup` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
