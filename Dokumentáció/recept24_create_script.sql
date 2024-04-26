-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: mysql.omega:3306
-- Létrehozás ideje: 2024. Ápr 26. 13:18
-- Kiszolgáló verziója: 5.7.42-log
-- PHP verzió: 7.2.34-45+0~20240422.94+debian12~1.gbpa9ccb2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `recept24`
--
CREATE DATABASE IF NOT EXISTS `recept24` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE `recept24`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kep`
--

CREATE TABLE `kep` (
  `kid` int(11) NOT NULL,
  `knev` varchar(40) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `rid` int(11) DEFAULT NULL,
  `khelye` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- TÁBLA KAPCSOLATAI `kep`:
--   `rid`
--       `recept` -> `rid`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `recept`
--

CREATE TABLE `recept` (
  `rid` int(11) NOT NULL,
  `rcim` varchar(40) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `rhozzavalok` mediumtext COLLATE utf8mb4_hungarian_ci,
  `rleiras` mediumtext COLLATE utf8mb4_hungarian_ci,
  `rido` int(11) DEFAULT NULL,
  `rnehezseg` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- TÁBLA KAPCSOLATAI `recept`:
--   `uid`
--       `user` -> `uid`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `unick` varchar(32) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `umail` varchar(80) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `upw` varchar(40) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `regtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- TÁBLA KAPCSOLATAI `user`:
--

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kep`
--
ALTER TABLE `kep`
  ADD PRIMARY KEY (`kid`),
  ADD KEY `FK_recept_receptid` (`rid`);

--
-- A tábla indexei `recept`
--
ALTER TABLE `recept`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `FK_user_userid` (`uid`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kep`
--
ALTER TABLE `kep`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `recept`
--
ALTER TABLE `recept`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `kep`
--
ALTER TABLE `kep`
  ADD CONSTRAINT `FK_recept_receptid` FOREIGN KEY (`rid`) REFERENCES `recept` (`rid`);

--
-- Megkötések a táblához `recept`
--
ALTER TABLE `recept`
  ADD CONSTRAINT `FK_user_userid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
