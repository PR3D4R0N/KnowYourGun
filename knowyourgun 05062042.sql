-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 06. 20:42
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.1.17

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `caliber`
--

INSERT INTO `caliber` (`caliber_id`, `ca_name`, `diameter`, `case_length`) VALUES
(1, '5,56x45', 5.56, 45),
(2, '7.62x39', 7.62, 39),
(3, '.30-06', 7.62, 85);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `co_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `country`
--

INSERT INTO `country` (`country_id`, `co_name`) VALUES
(1, 'USA'),
(2, 'USSR');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `firearm`
--

INSERT INTO `firearm` (`firearm_id`, `img`, `fa_name`, `caliber_id`, `dev_country_id`, `design_year`) VALUES
(1, 'm16.jpg', 'M-16', 1, '1', 1959),
(2, 'ak-47.jpg', 'AK-47', 2, '2', 1947),
(3, 'm1garand.jpg', 'M1 garand', 3, '1', 1932);

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
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `caliber`
--
ALTER TABLE `caliber`
  MODIFY `caliber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `firearm`
--
ALTER TABLE `firearm`
  MODIFY `firearm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
