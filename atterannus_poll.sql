-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Loomise aeg: Jaan 03, 2022 kell 08:36 PL
-- Serveri versioon: 5.7.36-0ubuntu0.18.04.1
-- PHP versioon: 7.3.15-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `atterannus_poll`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) COLLATE utf8mb4_estonian_ci NOT NULL,
  `question_id` varchar(11) COLLATE utf8mb4_estonian_ci NOT NULL,
  `answer` varchar(11) COLLATE utf8mb4_estonian_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Andmete tõmmistamine tabelile `answers`
--

INSERT INTO `answers` (`id`, `ip`, `question_id`, `answer`, `date`) VALUES
(3, '90.191.182.140', '6', 'answer1', '2021-12-26 17:11:27'),
(4, '90.191.182.139', '6', 'answer2', '2021-12-26 17:11:27'),
(25, '90.191.182.143', '6', 'answer3', '2022-01-02 15:08:40'),
(26, '90.191.182.143', '6', 'answer2', '2022-01-02 15:08:54'),
(27, '90.191.182.143', '6', 'answer3', '2022-01-02 15:17:29'),
(28, '90.191.182.143', '6', 'answer3', '2022-01-02 15:24:36'),
(31, '90.191.182.143', '6', 'answer2', '2022-01-02 15:30:17'),
(32, '90.191.182.143', '10', 'answer1', '2022-01-02 16:35:23'),
(33, '90.191.182.143', '10', 'answer3', '2022-01-02 16:39:24'),
(34, '90.191.182.143', '10', 'answer1', '2022-01-02 16:41:37'),
(35, '90.191.182.143', '10', 'answer2', '2022-01-02 16:41:40'),
(36, '90.191.182.143', '10', 'answer2', '2022-01-02 17:28:43'),
(37, '90.191.182.143', '10', 'answer2', '2022-01-02 17:37:03'),
(38, '90.191.182.143', '10', 'answer3', '2022-01-02 17:48:28'),
(39, '90.191.182.143', '10', 'answer1', '2022-01-02 17:51:29'),
(40, '90.191.182.143', '10', 'answer2', '2022-01-02 17:53:00'),
(41, '90.191.182.143', '10', 'answer1', '2022-01-02 17:54:21'),
(42, '90.191.182.143', '10', 'answer3', '2022-01-02 17:55:13'),
(43, '90.191.182.143', '10', 'answer1', '2022-01-02 17:56:13'),
(44, '90.191.182.143', '10', 'answer1', '2022-01-03 20:30:13');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_estonian_ci NOT NULL,
  `answer1` varchar(20) COLLATE utf8mb4_estonian_ci NOT NULL,
  `answer2` varchar(20) COLLATE utf8mb4_estonian_ci NOT NULL,
  `answer3` varchar(20) COLLATE utf8mb4_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Andmete tõmmistamine tabelile `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer1`, `answer2`, `answer3`) VALUES
(1, 'Kas sajab lund?', 'Jah', 'Ei', 'Ei oska öelda'),
(6, 'Mis päev?', '11', '26', '31'),
(10, 'Mis aasta täna on?', '2021', '2022', '2023');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT tabelile `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
