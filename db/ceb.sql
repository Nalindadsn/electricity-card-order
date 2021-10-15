-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 04:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(220) NOT NULL,
  `salutation` varchar(30) NOT NULL,
  `image` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `nicF` varchar(250) NOT NULL,
  `idno` varchar(15) NOT NULL,
  `nicB` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(50) NOT NULL DEFAULT '',
  `rememberme` varchar(255) NOT NULL DEFAULT '',
  `role` enum('Member','Admin') NOT NULL DEFAULT 'Member',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `sign` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `name`, `salutation`, `image`, `photo`, `address`, `mobile_no`, `nicF`, `idno`, `nicB`, `password`, `email`, `activation_code`, `rememberme`, `role`, `status`, `created_at`, `sign`) VALUES
(1, 'admin', 'ADASAS HHHHJykhhftoot', 'Mr', '1201711625.jpg', '', 'No50, technical place, stage 3, anuradhapura..', '0767067365', '1934359832.jpg', '941151662V', '189833280.JPG', '$2y$10$D5Q6/KkxHNYyU2jazf435e0PnzoRqgyOidy4MPeY/Kgaq9vc6GVBG', '19madhushan94@gmail.com', 'activated', '', 'Admin', 1, '2021-04-15 13:51:54', ''),
(182, 'user1', 'fb', '', '1666375268.png', '', 'near the lake,Ottunupeladigama,kalankuttiya ', '0713579964', '1899481912.png', '941151677V', '162391230.36', '$2y$10$MpNV2saUuHMOxZreHatPgOIO0FekFdB6WiDmGqI9W8e.7BEunKVoK', 'kalinga12345os@gmail.com', 'activated', '', 'Member', 1, '2021-05-04 01:24:45', ''),
(183, 'user2', 'n', '', '1209991548.png', '', '', '0710345315', '2023638422.jpeg', '941151669V', '794790710.jpeg', '$2y$10$Sl8cJfjTtOjzi./QGyJre.fSA51neC1x2V6Jrg.h0M.XVpy45bjyu', 'manjulasampath86959@gmail.com', 'activated', '', 'Member', 1, '2021-05-05 09:20:55', ''),
(185, 'nalinda424', '', '', '', '', '', '', '', '941151669V', '', '$2y$10$DoA/UnRvSXkXH768CPZp1e.tOiDqlixYOtzAxjgpOFyXMInWFE/te', 'nalinda@gmail.com', 'activated', '', 'Admin', 1, '2021-08-18 15:58:37', ''),
(188, '', '', '', '', '', '', '', '', '941151669V', '', '', '', 'activated', '', 'Member', 0, '2021-08-22 22:42:32', ''),
(189, '', '', 'Mr', '1080495671.jpg', '', '', '', '769874627.36', '941151669V', '', '', '', 'activated', '', 'Member', 0, '2021-08-22 22:44:45', ''),
(190, '', '', '', '', '', '', '', '', '941151669V', '', '', '', 'activated', '', 'Admin', 0, '2021-08-22 22:47:46', ''),
(191, '', '', '', '', '', '', '', '', '941151669V', '', '', '', 'activated', '', 'Admin', 0, '2021-08-23 01:55:22', ''),
(192, '', '', '', '', '', '', '', '', '941151669V', '', '', '', 'activated', '', 'Admin', 0, '2021-08-23 06:02:04', ''),
(193, '', '', '', '', '', '', '', '', '941151669V', '', '$2y$10$D5Q6/KkxHNYyU2jazf435e0PnzoRqgyOidy4MPeY/Kgaq9vc6GVBG', '', 'activated', '', 'Admin', 1, '2021-08-23 06:06:11', ''),
(194, '', '', 'Mr', '', '', '', '', '', '941151662V', '', '$2y$10$jjpGfGIrqJRpD7hTNtcahOnedv3Mv5CPetzx3hJ0RsB5qC114WWcG', '', 'activated', '', 'Admin', 0, '2021-08-23 08:40:54', ''),
(195, 'bbc', '', 'Rev', '490087514.png', '', '', '', '', '941151663V', '', '$2y$10$rSh7kJkU5HsVDsx3QYCOYulbFTDwC62auB4YmDnV9AkPOgQDN/XMO', '', 'activated', '', 'Admin', 0, '2021-08-25 19:11:51', ''),
(196, 'test', '', 'Mr', '', '', '', '', '', '941151661V', '', '$2y$10$DIjYWHJzyBXwC59VynLPFOOcoMPJgMUcWS1SFrXpbxQJOmqvzmShm', '', 'activated', '', 'Admin', 0, '2021-10-14 22:53:33', ''),
(197, 'nalindadsn@gmail.com', '', 'Mr', '1659757745.jpg', '', '', '', '', '941151644V', '', '$2y$10$KxFRxGqvKlkUvL9aAJ4rHOgd1SbR/yBhbju1vgJrD7zPoGEQA3W0e', '', 'activated', '', 'Admin', 0, '2021-10-14 22:55:56', ''),
(198, 'testhh', '', 'Rev', '', '', '', '', '', '948151661V', '', '$2y$10$rTDxuwUVNDeZrDccaV3cgecrLMvEr4j79SZncup20JTFY8piVCpd2', '', 'activated', '', 'Admin', 0, '2021-10-14 23:23:17', ''),
(199, 'g', '', 'Mr', '', '', '', '', '', '941151889V', '', '$2y$10$Y.pX9L6rGBpAr8nlBp/tAeCs6z9wl2NzVZd0bS9xYV4mvJfOQNuM.', '', 'activated', '', 'Admin', 0, '2021-10-14 23:35:47', ''),
(200, 'Nalinda424', '', 'Rev', '', '', '', '', '', '961151669V', '', '$2y$10$4cWHEom3S/2WiNbHvAhbDu2x6/vYRUIYMiuPpHNSY8ZH2cZN.WXs.', '', 'activated', '', 'Admin', 0, '2021-10-14 23:38:15', ''),
(201, 'aaa123', '', 'Mr', '', '', '', '', '', '945551644V', '', '$2y$10$cbm7IlbOE8LSr83jn1A/lu/Lnb6ANkAh8rKWHMXGzP2.oCB8L1GVO', '', 'activated', '', 'Member', 0, '2021-10-14 23:39:16', ''),
(202, 'nalindadsn@gmail.com', '', 'Mr', '', '', '', '', '', '941134669V', '', '$2y$10$EWbcjEgNqzVysgNqilplwew7WOkFxtypOW2bid/eEGp2BBTW/M0my', '', 'activated', '', 'Member', 0, '2021-10-14 23:48:04', ''),
(203, 'bbc', '', 'Rev', '', '', '', '', '', '941151644o', '', '$2y$10$5JCRPueYmqnjlx9/7qwu6eFIhPbMMMSjPYzFar0Hs7qhw8ZwVgmn6', '', 'activated', '', 'Member', 0, '2021-10-14 23:48:58', ''),
(204, 'bbc', '', 'Rev', '', '', '', '', '', '94555164rV', '', '$2y$10$cfmW1fLvJjTyLkAChTnzeOYqWAMgCQ4lnBfjwVjjgLOsFNJspYLFe', '', 'activated', '', 'Member', 0, '2021-10-14 23:50:13', ''),
(205, 'bbc', '', 'Mr', '', '', '', '', '', '945556644V', '', '$2y$10$EhbHIht0zhGpNDehn9GNGeKb3Q752PLoVIm1TiMbpCC.f1OY03MPq', '', 'activated', '', 'Member', 0, '2021-10-14 23:51:05', ''),
(206, 'nalindadsn@gmail.com', 'ADASAS HHHHJykhhftoot', 'Mr', '', '', '', '', '', '941151644V', '', '$2y$10$30llnqPCehJIkFguoZ5gIujmszF9.ztcVR2s4dozdoOk6pkZMFuJq', '', 'activated', '', 'Member', 0, '2021-10-15 01:41:09', ''),
(207, 'pus', '', 'Mr', '', '', '', '', '', '941151641V', '', '$2y$10$1s53HzuASBlJR6OxV8oSZeQ0ap4oMIYc9RZ/kZcufdfeJ5V7AUZR6', '', 'activated', '', 'Member', 0, '2021-10-15 10:22:09', ''),
(208, 'admin', 'Kavi1124', 'Mr', '1875796166.JPG', '', '', '', '216109174.JPG', '', '535853277.JPG', '$2y$10$kZZ0iTPsybZaQAG8aX3oW.KblDtqFe6dsq9luQbf6Yt74x1J4.W32', '', 'activated', '', 'Member', 0, '2021-10-15 11:04:32', '349009632.JPG'),
(209, 'aaa123', 'Kavi11n', 'Mr', '', '', '', '', '', '941151469V', '', '$2y$10$QFb9ubId.PoulCzy243CAeqotBTuvV7zH1kO0uwgMe9JrTdHuNrdO', '', 'activated', '', 'Admin', 0, '2021-10-15 11:25:28', ''),
(210, 'nalindadsn@gmail.com', 'ADASAS HHHHJykhhftoot', 'Mr', '', '', '', '', '', '941153461V', '', '$2y$10$8OeAK9KgulO2aGDxiOTYiuUzz0/7T1gaIL6xPt.HUWQuuimcIWeW6', '', 'activated', '', 'Admin', 0, '2021-10-15 12:13:43', ''),
(211, 'admin', 'Supun', 'Ms', '', '', '', '', '', '949151669V', '', '$2y$10$crSHGNTak7hkuEeehh/dQOiH5DssV1Kao01x6gwwG0GUNuENGPOey', '', 'activated', '', 'Admin', 0, '2021-10-15 14:06:02', ''),
(212, 'Nalinda424', 'ADASAS HHHHJykhhftoot', 'Mr', '', '', '', '', '', '951151644V', '', '$2y$10$9q1Zi5F3ipfe7BDJ7JUhzu0Vyii21mdXuMlydKeNnAS9U9KS/hhMO', '', 'activated', '', 'Admin', 0, '2021-10-15 14:06:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `account_con`
--

CREATE TABLE `account_con` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `acc_type` int(11) NOT NULL,
  `house_no` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `measurement_no` int(11) NOT NULL,
  `no_beneficiaries` int(5) NOT NULL,
  `phone_fixed` varchar(15) NOT NULL,
  `phone_mobile` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` int(5) NOT NULL,
  `note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_con`
--

INSERT INTO `account_con` (`id`, `name`, `user_id`, `acc_type`, `house_no`, `phone`, `email`, `created_at`, `measurement_no`, `no_beneficiaries`, `phone_fixed`, `phone_mobile`, `status`, `created_by`, `note`) VALUES
(1, ' NALINDA DISSANAYAKA', 1, 1, '4546', '123456456', '', '2021-07-01 14:54:42', 4678846, 5, '0254575445', '0714238939', 1, 0, ''),
(2, '', 1, 2, '', '', '', '2021-08-01 15:16:54', 0, 0, '', '', 1, 0, ''),
(3, '', 1, 0, '', '', '', '2021-08-01 15:47:15', 0, 2, '', '', 1, 0, ''),
(4, '', 1, 0, '', '', '', '2020-08-01 16:58:07', 0, 0, '', '', 0, 0, ''),
(5, '', 1, 0, '', '', '', '2021-08-01 16:58:24', 0, 0, '', '', 0, 0, ''),
(6, '', 1, 0, '', '', '', '2021-08-01 16:58:36', 0, 0, '', '', 1, 0, ''),
(7, '', 1, 0, '', '', '', '2021-08-01 21:27:35', 0, 0, '', '', 1, 0, ''),
(8, '', 182, 8, '', '', '', '2021-08-04 23:03:32', 0, 2, '', '', 1, 0, ''),
(9, '', 1, 0, '', '', '', '2021-08-06 20:02:10', 0, 2, '', '', 1, 0, ''),
(10, '', 1, 0, '', '', '', '2021-08-06 20:09:15', 0, 0, '', '', 1, 0, ''),
(11, '', 184, 0, '', '', '', '2021-08-06 20:10:12', 0, 4, '0257575755', '0757575755', 0, 0, ''),
(12, '', 0, 0, '', '', '', '2021-08-09 19:01:50', 456789, 0, '0254575444', '0714238939', 0, 1, ''),
(13, '', 0, 0, '', '', '', '2021-08-09 19:03:38', 456789, 0, '', '', 0, 1, ''),
(14, '', 1, 0, '', '', '', '2021-08-09 19:11:04', 456789, 0, '0254575444', '0714238939', 0, 1, ''),
(15, '', 942463324, 0, '', '', '', '2021-08-09 19:45:23', 333333, 0, '', '', 0, 1, ''),
(16, '', 1, 0, '', '', '', '2021-08-09 19:48:07', 333333, 0, '', '', 0, 1, ''),
(17, '', 1, 0, '', '', '', '2021-08-09 20:02:22', 45646545, 5, '0254575444', '0714238939', 0, 1, ''),
(18, '', 1, 0, '', '', '', '2021-08-09 20:17:27', 456789, 10, '0254575444', '0714238939', 0, 1, ''),
(19, '', 1, 1, '', '', '', '2021-08-09 20:25:53', 0, 0, '', '', 0, 1, ''),
(20, '', 1, 1, '', '', '', '2021-08-09 20:26:26', 333333, 2, '0254575444', '0714238939', 0, 1, ''),
(21, '', 1, 1, '', '', '', '2021-08-09 20:35:49', 0, 0, '', '', 0, 1, ''),
(22, '', 1, 1, '', '', '', '2021-08-09 20:51:29', 0, 0, '', '', 0, 1, ''),
(23, '', 1, 1, '', '', '', '2021-08-09 21:00:03', 0, 0, '', '', 0, 1, ''),
(24, '', 1, 1, '', '', '', '2021-08-09 21:01:34', 0, 0, '', '', 0, 1, ''),
(25, '', 1, 1, '', '', '', '2021-08-09 21:01:47', 0, 0, '', '', 0, 1, ''),
(26, '', 1, 1, '', '', '', '2021-08-09 21:06:20', 0, 0, '', '', 1, 1, ''),
(27, '', 1, 1, '', '', '', '2021-08-09 21:06:42', 0, 0, '', '', 0, 1, ''),
(28, '', 1, 1, '', '', '', '2021-08-10 10:21:53', 4564, 0, '', '', 0, 1, ''),
(29, '', 1, 1, '', '', '', '2021-08-10 10:26:16', 0, 0, '', '', 0, 1, ''),
(30, '', 1, 1, '', '', '', '2021-08-10 10:31:07', 0, 0, '', '', 0, 1, ''),
(31, '', 1, 1, '', '', '', '2021-08-10 19:53:59', 0, 0, '', '', 0, 1, ''),
(32, '', 1, 1, '', '', '', '2021-08-10 19:54:02', 0, 0, '', '', 0, 1, ''),
(33, '', 1, 1, '', '', '', '2021-08-10 19:54:03', 0, 0, '', '', 0, 1, ''),
(34, '', 1, 1, '', '', '', '2021-08-10 19:54:04', 0, 0, '', '', 0, 1, ''),
(35, '', 1, 1, '', '', '', '2021-08-10 19:54:19', 0, 0, '', '', 1, 1, ''),
(36, '', 1, 1, '', '', '', '2021-08-10 19:55:30', 0, 0, '', '', 1, 1, ''),
(37, '', 1, 1, '', '', '', '2021-08-10 19:57:55', 0, 0, '', '', 1, 1, ''),
(38, '', 1, 1, '456', '', '', '2021-08-15 14:11:25', 123456, 5, '0254575444', '0714238939', 0, 1, 'Note'),
(39, '', 1, 1, '', '', '', '2021-08-16 18:01:48', 0, 0, '', '', 0, 1, ''),
(40, '', 1, 1, '', '', '', '2021-08-16 18:02:02', 0, 0, '', '', 0, 1, ''),
(41, '', 1, 1, '', '', '', '2021-08-16 18:02:17', 666, 0, '', '', 0, 1, ''),
(42, '', 1, 2, '456', '', '', '2021-08-16 18:04:33', 4444444, 0, '0254575444', '0714238939', 0, 1, ''),
(43, '', 1, 1, '', '', '', '2021-08-16 18:05:38', 0, 0, '', '', 0, 1, ''),
(44, '', 1, 1, '', '', '', '2021-08-16 18:12:43', 45646545, 0, '', '', 0, 1, ''),
(45, '', 1, 1, '', '', '', '2021-08-16 18:13:07', 66666, 0, '0254575444', '0714238939', 0, 1, ''),
(46, '', 1, 1, '', '', '', '2021-08-16 18:18:03', 0, 0, '', '', 0, 1, ''),
(47, '', 1, 1, '', '', '', '2021-08-16 18:18:57', 0, 0, '', '', 0, 1, ''),
(48, '', 1, 1, '', '', '', '2021-08-16 18:19:28', 0, 0, '', '', 0, 1, ''),
(49, '', 1, 1, '', '', '', '2021-08-16 18:22:48', 0, 0, '', '', 0, 1, ''),
(50, '', 1, 1, '', '', '', '2021-08-16 18:23:01', 0, 0, '', '', 0, 1, ''),
(51, '', 1, 1, '', '', '', '2021-08-16 18:23:26', 666667, 0, '', '', 0, 1, ''),
(52, '', 1, 1, '', '', '', '2021-08-16 18:24:56', 87878887, 0, '', '', 0, 1, ''),
(53, '', 1, 1, '', '', '', '2021-08-16 18:28:36', 0, 0, '', '', 0, 1, ''),
(54, '', 1, 1, '', '', '', '2021-08-16 18:59:27', 0, 0, '', '', 0, 1, ''),
(55, '', 1, 4, '', '', '', '2021-08-16 19:00:29', 0, 0, '', '', 0, 1, ''),
(56, '', 1, 1, '', '', '', '2021-08-16 19:01:59', 0, 0, '', '', 0, 1, ''),
(57, '', 1, 1, '', '', '', '2021-08-16 19:03:33', 0, 1, '', '', 0, 1, ''),
(58, '', 1, 1, '', '', '', '2021-08-16 19:14:12', 0, 1, '', '', 1, 1, ''),
(59, '', 1, 1, '', '', '', '2021-08-16 19:47:41', 0, 0, '', '', 0, 1, ''),
(60, '', 1, 1, '555', '', '', '2021-08-18 20:44:00', 456789, 2, '0254575445', '0714238930', 0, 1, 'mm'),
(61, '', 1, 1, '555', '', '', '2021-08-22 05:51:00', 456789, 5, '0254575444', '0714238939', 1, 1, 'ad'),
(62, '', 1, 2, '555', '', '', '2021-08-22 06:13:27', 4564, 5, '0254575444', '0714238939', 1, 1, 'h'),
(64, '', 195, 1, '456', '', '', '2021-08-25 21:21:58', 333333, 4, '0254575444', '0714238939', 0, 1, 'ad'),
(65, '', 1, 1, '456', '', '', '2021-08-26 06:40:09', 4444444, 6, '0254575444', '0714238939', 1, 1, 'oo'),
(66, '', 195, 1, '', '', '', '2021-09-03 11:27:42', 0, 0, '', '', 1, 1, ''),
(67, '', 195, 2, '123456', '', '', '2021-10-14 12:25:53', 4564, 3, '1112211', '78788884', 1, 1, 'note'),
(68, '', 195, 2, '123456', '', '', '2021-10-14 15:25:26', 4564, 3, '123456', '456789', 1, 1, 'testoop'),
(69, '', 195, 2, '123456', '', '', '2021-10-14 17:28:40', 4564, 4, '1112211', '78788884', 1, 1, 'test'),
(70, '', 195, 2, '4444444', '', '', '2021-10-14 17:31:47', 5555555, 1, '1111111', '2222222', 1, 1, 'note'),
(71, '', 205, 2, '123456', '', '', '2021-10-15 01:22:26', 4564, 5, '1112211', '78788884', 1, 1, 'oop'),
(72, '', 195, 1, '123456', '', '', '2021-10-15 04:06:42', 4564, 4, '1112211', '78788884', 1, 1, 'ooop'),
(73, '', 1, 4, '3333ccf9', '', '', '2021-10-15 04:08:06', 349, 329, '2223359', '333222459', 0, 1, 'fgfg9\r\n'),
(74, '', 195, 4, '123', '', '', '2021-10-15 04:59:37', 343, 1, '4444', '78788884', 0, 195, 'vvv'),
(75, '', 207, 2, '123456', '', '', '2021-10-15 10:23:32', 5555555, 3, '4444', '78788884', 1, 196, 'oo');

-- --------------------------------------------------------

--
-- Table structure for table `acc_cat`
--

CREATE TABLE `acc_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `unit_c1` int(5) NOT NULL,
  `unit_p1` int(5) NOT NULL,
  `unit_c2` int(5) NOT NULL,
  `unit_p2` int(5) NOT NULL,
  `unit_c3` int(5) NOT NULL,
  `unit_p3` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_cat`
--

INSERT INTO `acc_cat` (`id`, `name`, `status`, `unit_c1`, `unit_p1`, `unit_c2`, `unit_p2`, `unit_c3`, `unit_p3`) VALUES
(1, 'business', 0, 25, 10, 50, 20, 75, 30),
(2, 'temple', 0, 0, 0, 0, 0, 0, 0),
(4, 'newh', 0, 0, 0, 0, 0, 0, 0),
(5, 'newOg', 1, 0, 0, 0, 0, 0, 0),
(6, 'Amila1ldh', 1, 0, 0, 0, 0, 0, 0),
(7, 'Amila1', 1, 0, 0, 0, 0, 0, 0),
(8, 'Kavi', 1, 0, 0, 0, 0, 0, 0),
(9, 'newrr', 1, 0, 0, 0, 0, 0, 0),
(10, 'ooph', 1, 0, 0, 0, 0, 0, 0),
(11, 'new', 1, 0, 0, 0, 0, 0, 0),
(12, 'Amila1kg', 1, 0, 0, 0, 0, 0, 0),
(13, 'Amila1kr', 0, 0, 0, 0, 0, 0, 0),
(14, 'Amila1fටggg', 0, 0, 0, 0, 0, 0, 0),
(15, 'dahhh', 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `excategory`
--

CREATE TABLE `excategory` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `excategory`
--

INSERT INTO `excategory` (`id`, `name`, `status`) VALUES
(1, 'ex cat1', 0),
(2, 'ex cat2', 0),
(3, 'aa1drf', 1),
(4, 'n', 1),
(5, 'aah', 1),
(6, 'abc‍ෙ', 0),
(7, 'oop', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `cat_id`, `amount`, `created_at`) VALUES
(1, 'ex1', 1, 1454, '2020-07-06 14:36:23'),
(2, 'new', 0, 78, '2021-08-07 20:28:58'),
(3, 'new', 0, 78, '2021-08-07 20:31:58'),
(4, 'new', 0, 4654, '2021-08-08 04:07:18'),
(5, 'pu', 0, 124, '2021-08-08 04:08:32'),
(6, 'Amila1', 0, 0, '2021-08-08 04:13:52'),
(7, 'new', 0, 123, '2021-08-08 04:14:36'),
(8, 'Amila1', 0, 456, '2021-08-08 04:20:13'),
(9, 'Amila1', 0, 1321, '2021-08-08 04:20:20'),
(10, 'Amila1', 0, 0, '2021-08-08 04:27:47'),
(11, 'new', 0, 766, '2021-08-08 04:27:55'),
(12, 'new', 0, 0, '2021-08-08 04:46:45'),
(13, 'new', 0, 0, '2021-08-08 04:55:52'),
(14, 'new', 0, 134, '2021-08-08 05:50:59'),
(15, 'new', 0, 0, '2021-08-08 05:51:07'),
(16, 'Amila1', 0, 0, '2021-08-08 05:51:42'),
(17, 'Amila1', 1, 100, '2021-08-08 07:24:13'),
(18, 'new', 0, 100, '2021-08-08 08:33:36'),
(19, 'Amila1', 2, 66, '2021-08-08 09:04:05'),
(20, 'Amila1', 1, 100, '2021-08-10 03:42:24'),
(21, 'Amila1', 1, 0, '2021-08-10 16:39:28'),
(22, 'Amila1', 1, 0, '2021-08-10 16:50:06'),
(23, 'Amila1', 0, 100, '2021-08-11 10:33:52'),
(24, 'Amila1', 2, 100, '2021-08-18 13:31:52'),
(25, 'Amila1', 3, 100, '2021-08-21 03:47:16'),
(26, 'Amila1g', 3, 100, '2021-08-21 03:47:27'),
(27, 'Amila1', 4, 100, '2021-08-21 03:47:35'),
(28, 'new', 2, 100, '2021-08-21 03:47:46'),
(29, 'new', 1, 0, '2021-08-21 03:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `note` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `con_id`, `note`, `updated_at`, `created_at`) VALUES
(1, 1, 'testhhhh', '2021-10-15 06:30:16', '2021-08-04 17:07:34'),
(2, 1, '', '2021-08-06 20:23:16', '2021-08-04 23:05:25'),
(3, 1, '', '2021-08-06 20:23:16', '2021-08-07 15:56:34'),
(4, 1, '', '2021-08-06 20:24:37', '2021-08-06 19:16:01'),
(5, 1, 'Amila1', '2021-08-08 09:35:37', '2021-08-08 09:35:37'),
(6, 1, 'Amila1', '2021-08-08 11:33:42', '2021-08-08 11:33:42'),
(7, 1, 'new', '2021-08-08 11:37:53', '2021-08-08 11:37:53'),
(8, 1, 'new', '2021-08-08 11:42:57', '2021-08-08 11:42:57'),
(9, 1, '456', '2021-08-08 18:47:25', '2021-08-08 18:47:25'),
(10, 1, 'note', '2021-08-08 18:47:51', '2021-08-08 18:47:51'),
(11, 1, '1000', '2021-08-08 19:16:09', '2021-08-08 19:16:09'),
(12, 1, 'qq', '2021-08-08 19:17:15', '2021-08-08 19:17:15'),
(13, 1, 'rrruryu', '2021-08-08 19:17:33', '2021-08-08 19:17:33'),
(14, 1, '1', '2021-08-08 19:29:44', '2021-08-08 19:29:44'),
(15, 1, 'jj', '2021-08-08 19:32:05', '2021-08-08 19:32:05'),
(16, 1, 'e', '2021-08-08 19:33:40', '2021-08-08 19:33:40'),
(17, 1, 'no note', '2021-08-09 05:21:00', '2021-08-09 05:21:00'),
(18, 1, 'aa', '2021-08-10 19:48:57', '2021-08-10 19:48:57'),
(19, 1, 'test', '2021-08-12 17:54:40', '2021-08-12 17:54:40'),
(20, 1, '1', '2021-08-16 20:14:40', '2021-08-16 20:14:40'),
(21, 1, '1', '2021-08-16 20:15:40', '2021-08-16 20:15:40'),
(22, 1, 'aaa', '2021-08-16 20:22:21', '2021-08-16 20:22:21'),
(23, 1, 'test', '2021-08-18 22:24:05', '2021-08-18 22:24:05'),
(24, 1, '1111', '2021-08-21 19:24:53', '2021-08-21 19:22:34'),
(25, 1, '1', '2021-08-22 05:56:18', '2021-08-22 05:56:18'),
(26, 2, 'j', '2021-08-22 05:56:34', '2021-08-22 05:56:34'),
(27, 1, '11', '2021-08-22 17:56:14', '2021-08-22 17:56:14'),
(28, 2, '', '2021-08-23 05:23:27', '2021-08-23 05:23:27'),
(29, 1, 'hgfg', '2021-08-26 06:32:42', '2021-08-26 06:32:42'),
(30, 8, 'resr', '2021-08-26 06:32:58', '2021-08-26 06:32:58'),
(31, 8, 'test', '2021-08-29 11:55:04', '2021-08-29 11:55:04'),
(32, 8, 'test', '2021-09-01 07:54:30', '2021-09-01 07:54:30'),
(33, 1, 'test1', '2021-09-05 06:36:57', '2021-09-05 06:36:06'),
(34, 1, '124', '2021-10-13 14:33:28', '2021-10-13 14:33:28'),
(35, 1, 'oop', '2021-10-15 03:19:41', '2021-10-15 03:19:41'),
(36, 1, 'test', '2021-10-15 03:34:43', '2021-10-15 03:34:43'),
(37, 1, '1111', '2021-10-15 03:37:43', '2021-10-15 03:37:43'),
(38, 1, '11ttt', '2021-10-15 06:27:11', '2021-10-15 06:24:35'),
(39, 1, '1111g\r\n', '2021-10-15 08:13:00', '2021-10-15 08:12:53'),
(40, 1, '11111d', '2021-10-15 08:13:42', '2021-10-15 08:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings_web`
--

CREATE TABLE `settings_web` (
  `id` int(11) NOT NULL,
  `col_val` varchar(300) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_web`
--

INSERT INTO `settings_web` (`id`, `col_val`, `type`) VALUES
(1, 'electricity board', 'name'),
(2, 'email@gmail.com', 'email'),
(3, '+94111111111', 'phone'),
(4, '+94111111112', 'fax'),
(5, 'address1', 'address1'),
(6, 'address2', 'address2'),
(7, 'address3', 'address3'),
(8, '', 'address4'),
(9, '50557', 'postal_code');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_con`
--
ALTER TABLE `account_con`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `acc_cat`
--
ALTER TABLE `acc_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excategory`
--
ALTER TABLE `excategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_web`
--
ALTER TABLE `settings_web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `account_con`
--
ALTER TABLE `account_con`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `acc_cat`
--
ALTER TABLE `acc_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `excategory`
--
ALTER TABLE `excategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `settings_web`
--
ALTER TABLE `settings_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
