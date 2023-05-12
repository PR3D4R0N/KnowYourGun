-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 13. 01:45
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
-- Tábla szerkezet ehhez a táblához `caliber`
--

CREATE TABLE `caliber` (
  `caliber_id` int(11) NOT NULL,
  `ca_name` varchar(50) NOT NULL,
  `diameter` double NOT NULL,
  `case_length` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `caliber`
--

INSERT INTO `caliber` (`caliber_id`, `ca_name`, `diameter`, `case_length`) VALUES
(1, '5,56x45', 5.56, 45),
(2, '7.62x39', 7.62, 39),
(3, '.30-06', 7.62, 85),
(4, '7.62x51r', 7.62, 51),
(5, '.50bmg', 12.7, 99),
(6, '9x19', 9, 19),
(7, '.338 lapua magnum', 8.7, 70),
(8, '5.45x39', 5.45, 39),
(9, '300 blackout', 7.62, 35),
(10, '5.7x28', 5.7, 28);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `co_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `country`
--

INSERT INTO `country` (`country_id`, `co_name`) VALUES
(1, 'USA'),
(2, 'USSR'),
(3, 'Russia'),
(4, 'Belgium'),
(5, 'Great Britain'),
(6, 'France'),
(7, 'Germany');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `firearm`
--

CREATE TABLE `firearm` (
  `firearm_id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `fa_name` varchar(100) NOT NULL,
  `caliber_id` int(11) NOT NULL,
  `dev_country_id` varchar(60) NOT NULL,
  `design_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `firearm`
--

INSERT INTO `firearm` (`firearm_id`, `img`, `fa_name`, `caliber_id`, `dev_country_id`, `design_year`) VALUES
(1, 'm16.jpg', 'M-16', 1, '1', 1959),
(2, 'ak-47.jpg', 'AK-47', 2, '2', 1947),
(3, 'm1garand.jpg', 'M1 garand', 3, '1', 1932),
(4, 'ak12.jpg', 'AK-12', 8, '3', 2011),
(5, 'ak74u.jpg', 'AK-74U', 8, '2', 1979),
(6, 'barrettm82.jpg', 'Barrett M82', 5, '1', 1980),
(7, 'honeybadger.jpg', 'Honey Badger', 9, '1', 2012),
(8, 'm2browning.jpg', 'M2 Browning', 5, '1', 1933),
(9, 'pkm.jpg', 'PKM', 4, '2', 1961),
(10, 'svd.jpg', 'SVD', 4, '2', 1958),
(11, 'rpk74.jpg', 'RPK-74', 8, '2', 1974),
(12, 'p90.jpg', 'FN P90', 10, '4', 1986),
(13, 'scarl.jpg', 'FN SCAR-L', 1, '4', 2007),
(14, 'famas.jpg', 'Famas', 1, '6', 1967),
(15, 'mp5.jpg', 'MP5', 6, '7', 1964),
(16, 'awm.jpg', 'AWM', 7, '5', 1996),
(17, 'mk47.jpg', 'Mk47 Mutant', 2, '1', 2014),
(18, 'hk416.jpg', 'HK416', 1, '7', 2004),
(19, 'l85a1.jpg', 'L85A1', 1, '5', 1985),
(20, 'krissvector.jpg', 'Kriss Vector', 6, '1', 2006),
(21, 'mk18.jpg', 'Mk18', 1, '1', 1999);

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
(27, 'Lily', '$2y$10$eWlLaWetUT6/lzYMkw2cj.XSEb0p4WvHCqI9dDpr53QnYwEGZ3Kv6', 0, 0, 'Umiko.jpg', 'Favorite place to belong: Shooting range'),
(28, 'Lajos', '$2y$10$JWRedKfO1rxaOodlNWXTmO/TFapf2tBqk6NvkPQfO.sPxsvYhqPeq', 0, 10, 'SebastianCastellanos2.jpg', 'Nincs kedvem már a sokadig kitalált bemutatkozást írni. \''),
(29, 'Péter', '$2y$10$PQLQzkHyTuEJERgcGc4pCuQybOzfDtGqB7kbsFe1/FfTIapVyYa.i', 0, 0, 'LeonSKennedy.jpg', 'IM Péter from Hungary');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `caliber`
--
ALTER TABLE `caliber`
  ADD PRIMARY KEY (`caliber_id`);

--
-- A tábla indexei `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- A tábla indexei `firearm`
--
ALTER TABLE `firearm`
  ADD PRIMARY KEY (`firearm_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `caliber`
--
ALTER TABLE `caliber`
  MODIFY `caliber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `firearm`
--
ALTER TABLE `firearm`
  MODIFY `firearm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
