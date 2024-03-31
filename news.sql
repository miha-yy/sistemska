-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 12. mar 2024 ob 20.30
-- Različica strežnika: 10.4.24-MariaDB
-- Različica PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `news`
--

CREATE DATABASE news;

USE news;
-- --------------------------------------------------------

--
-- Struktura tabele `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `abstract` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `text` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `articles`
--

INSERT INTO `articles` (`id`, `title`, `abstract`, `text`, `date`, `user_id`) VALUES
(5, 'LOL', 'teseaaaa', 'eaeaeaaaaa', '2024-03-11 15:06:13', 9),
(6, 'hgah', 'hhah', 'hhahaah', '2024-03-12 19:02:13', 9);

-- --------------------------------------------------------

--
-- Struktura tabele `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `article_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `comments`
--

INSERT INTO `comments` (`id`, `content`, `date`, `user_id`, `article_id`) VALUES
(8, 'Hey bro', '2024-03-12 19:07:53', 8, 5),
(9, 'bera', '2024-03-12 19:44:43', 9, 5),
(10, 'kkk', '2024-03-12 20:24:41', 9, 5),
(11, '00', '2024-03-12 20:26:49', 9, 5),
(12, '000', '2024-03-12 20:28:57', 9, 5);

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `email` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `password` text COLLATE utf8mb4_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(8, 'Johnmy', 'john@john.com', '$2y$10$mLRT5spJo.01d2GetSmdHOqx3SQ9YszzUPHWYw9Sa74FyvFn8vP.a'),
(9, 'JOHNNY', 'john@gmail.com', '$2y$10$mLRT5spJo.01d2GetSmdHOqx3SQ9YszzUPHWYw9Sa74FyvFn8vP.a'),
(10, 'THE', 'kren@kren.com', '$2y$10$mLRT5spJo.01d2GetSmdHOqx3SQ9YszzUPHWYw9Sa74FyvFn8vP.a');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
