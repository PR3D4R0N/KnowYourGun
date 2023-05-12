-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 12. 13:26
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `knowyourgun`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `point` int(11) DEFAULT 0,
  `max` int(11) DEFAULT 0,
  `avatar` varchar(50) NOT NULL,
  `aboutme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `point`, `max`, `avatar`, `aboutme`) VALUES
(24, 'Ferike', '$2y$10$w1Tq/.OIX6h3IZy9dAWULughSFJ4IZDalzgVRLDK7i0Bwo8Jttr.y', 0, 0, 'dog1.jpg', 'Lelkes egyetemi hallgató!'),
(25, 'Gergő', '$2y$10$b37u.9Pw7PwnFHZrYFgAU.61y0l/wwMx8o8so8L5z2nBypupIUExC', 0, 0, 'JohnMarston.jpg', ''),
(26, 'Pali Pácsi', '$2y$10$5TIOAS2sX7EJVRnWPTqQAue98lnnUlFanFH3aPO7kImGqS8n4KYZi', 0, 0, 'ArthurMorgan.jpg', 'I love Whiskey'),
(27, 'Lily', '$2y$10$eWlLaWetUT6/lzYMkw2cj.XSEb0p4WvHCqI9dDpr53QnYwEGZ3Kv6', 0, 0, 'Umiko.jpg', 'Favorite place to belong: Shooting range');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
