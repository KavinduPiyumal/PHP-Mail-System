-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2021 at 02:02 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `jedi`
--
CREATE DATABASE IF NOT EXISTS `id17948300_jedi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `id17948300_jedi`;

-- --------------------------------------------------------

--
-- Table structure for table `j_login`
--

DROP TABLE IF EXISTS `j_login`;
CREATE TABLE `j_login` (
  `j_id` int(11) NOT NULL,
  `j_email` varchar(256) NOT NULL,
  `j_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `j_login`
--

INSERT INTO `j_login` (`j_id`, `j_email`, `j_password`) VALUES
(1, 'rey@theforce.org', '$2y$10$uBvTM0ijUreOMBN1nC8gmuczrg.uVOmrOFTAvKcl6/H8PiCzpUWsa'),
(2, 'yoda@theforce.org', '$2y$10$XxxZ.Ond2ixbdCYUtmfTruqzI/E7Mu2L3VNIUevCQfY31gu3EzxOS');

-- --------------------------------------------------------

--
-- Table structure for table `j_mail`
--

DROP TABLE IF EXISTS `j_mail`;
CREATE TABLE `j_mail` (
  `j_mail_id` int(11) NOT NULL,
  `j_mail_recipient_email` varchar(256) NOT NULL,
  `j_mail_recipient_fullname` varchar(256) NOT NULL,
  `j_mail_sender_email` varchar(256) NOT NULL,
  `j_mail_sender_fullname` varchar(256) NOT NULL,
  `j_mail_subject` varchar(256) NOT NULL,
  `j_mail_text` varchar(512) NOT NULL,
  `j_mail_date` datetime NOT NULL,
  `j_mail_draft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `j_mail`
--

INSERT INTO `j_mail` (`j_mail_id`, `j_mail_recipient_email`, `j_mail_recipient_fullname`, `j_mail_sender_email`, `j_mail_sender_fullname`, `j_mail_subject`, `j_mail_text`, `j_mail_date`, `j_mail_draft`) VALUES
(1, 'yoda@theforce.org', 'Yoda', 'rey@theforce.org', 'Rey Skywalker', 'Help me, master!', 'Master Yoda,\r\nI am confused about what I must do. Can you please help? Thank you.\r\n- Rey', '2021-10-18 00:00:00', 0),
(2, 'rey@theforce.org', 'Rey Skywalker', 'yoda@theforce.org', 'Yoda', 'Re. Help me, master!', 'Rey,\r\nFear not. Do or do not. There is no try.\r\n- Yoda', '2021-10-19 00:00:00', 0),
(4, 'yoda@theforce.org', 'Yoda', 'rey@theforce.org', 'Rey Skywalker', 'Test email', 'Master Yoda,\r\nThis is a test email to verify if the email systems are working correctly.\r\n- Rey', '2021-11-03 00:00:00', 1),
(5, 'luke@theforce.org', 'Luke Skywalker', 'rey@theforce.org', 'Rey Skywalker', 'Specs for the X-Wing', 'Master Luke,\r\nCan you please send me the specs for the X-Wing? I seem to be having some issues with the configuration. Thanks!\r\n- Rey', '2021-11-03 00:00:00', 0),
(6, 'rey@theforce.org', 'Rey Skywalker', 'yoda@theforce.org', 'Yoda', 'Re. Test email', 'Rey,\r\nFor letting me know, I thank you.\r\n- Yoda', '2021-11-03 00:00:00', 0),
(7, 'leia@galactic.republic', 'Leia Organa', 'rey@theforce.org', 'Rey Skywalker', 'Ben', 'Master Leia,\r\nI have seen Ben in my visions, not as Kylo, but as Ben. I still feel that there is a chance we can turn him from his Sith ways.\r\nPlease guide me in this work.\r\n- Rey', '2021-11-03 00:00:00', 0),
(9, 'rey@theforce.org', 'Rey Skywalker', 'rey@theforce.org', 'Rey Skywalker', 'Test email', 'Test email', '2021-11-03 00:00:00', 0),
(10, 'rey@theforce.org', 'Rey', 'yoda@theforce.org', 'Yoda ', 'Jedi Library', 'Rey,\r\nKept the Jedi books, have I, in the Millenium Falcon.\r\n- Yoda', '2021-11-03 12:14:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `j_user`
--

DROP TABLE IF EXISTS `j_user`;
CREATE TABLE `j_user` (
  `j_user_id` int(11) NOT NULL,
  `j_user_fname` varchar(128) NOT NULL,
  `j_user_lname` varchar(128) NOT NULL,
  `j_user_login_id` int(11) NOT NULL,
  `j_user_sabercolour` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `j_user`
--

INSERT INTO `j_user` (`j_user_id`, `j_user_fname`, `j_user_lname`, `j_user_login_id`, `j_user_sabercolour`) VALUES
(1, 'Rey', 'Skywalker', 1, 'gold'),
(2, 'Yoda', '', 2, 'green');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `j_login`
--
ALTER TABLE `j_login`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `j_mail`
--
ALTER TABLE `j_mail`
  ADD PRIMARY KEY (`j_mail_id`);

--
-- Indexes for table `j_user`
--
ALTER TABLE `j_user`
  ADD PRIMARY KEY (`j_user_id`),
  ADD KEY `j_user_login_id` (`j_user_login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `j_login`
--
ALTER TABLE `j_login`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `j_mail`
--
ALTER TABLE `j_mail`
  MODIFY `j_mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `j_user`
--
ALTER TABLE `j_user`
  MODIFY `j_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `j_user`
--
ALTER TABLE `j_user`
  ADD CONSTRAINT `j_user_login` FOREIGN KEY (`j_user_login_id`) REFERENCES `j_login` (`j_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
