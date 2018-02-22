-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: andmebaasi server
-- Loomise aeg: Veebr 05, 2018 kell 09:44 EL
-- Serveri versioon: 10.2.12-MariaDB-log
-- PHP versioon: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `andmebaasinimi`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `content`
--

CREATE TABLE `content` (
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `clean_content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0,
  `show_in_menu` tinyint(1) NOT NULL DEFAULT 0,
  `sort` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `is_first_page` tinyint(1) NOT NULL DEFAULT 0,
  `lang_id` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `content`
--
ALTER TABLE `content`
  MODIFY `content_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
