-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 08:38 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keynes`
--

-- --------------------------------------------------------

--
-- Table structure for table `bullets`
--

DROP TABLE IF EXISTS `bullets`;
CREATE TABLE IF NOT EXISTS `bullets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `component_id` int(11) NOT NULL,
  `text` varchar(250) COLLATE utf16_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `bullets`
--

INSERT INTO `bullets` (`id`, `component_id`, `text`) VALUES
(143, 140, 'Sastavljanje poreskog bilansa i poreske prijave'),
(144, 140, 'Obračun poreza na imovinu'),
(142, 140, 'Sastavljanje vanrednih finansijskih izveštaja: likvidacioni, bilans pripajanja, bilans spajanja, diobni bilansi, sastavljanje finansijskih izveštaja u svrhu dobijanja kredita od banaka'),
(141, 140, 'Sastavljanje godišnjeg finansijskog izvještaja za mala i srednja pravna lica i preduzetnike'),
(140, 140, 'Sastavljanje zaključnog lista i bruto bilansa na željeni datum'),
(139, 140, 'Izvještaj analitičkih kartica na dan, za period'),
(138, 140, 'Izvod otvorenih stavki kupaca, dobavljača'),
(136, 140, 'Obračun akcize'),
(137, 140, 'Sastavljanje poreskih prijava i drugih obračuna'),
(134, 140, 'Vođenje pomoćnih evidencija: Knjiga ulaznih faktura, knjiga izlaznih faktura, knjiga blagajne'),
(135, 140, 'Obračun PDV-a, poreza na dohodak građana po ugovorima: o djelu, autorstvu, zakupu nepokretnosti, zakupu pokretnih stvari'),
(132, 140, 'Vođenje glavne knjige'),
(133, 140, 'Vođenje analitičkih evidencija: kupaca, dobavljača, blagajne, tekućih računa, robe, materijala, lična primanja, osnovna sredstva'),
(50, 124, 'Uvozna kalkulacija'),
(51, 124, 'Domaća kalkulacija'),
(52, 124, 'Komisiona evidencija'),
(53, 124, 'Definisanje zavisnih troškova'),
(54, 124, 'Interne prenosnice'),
(55, 124, 'Knjižno odobrenje'),
(56, 124, 'Pripremne kalkulacije'),
(57, 124, 'Nivelacije cijena'),
(58, 124, 'Povrat robe'),
(59, 124, 'Narudžbe'),
(60, 124, 'Višak robe'),
(61, 124, 'Sastavnice na ulazu'),
(62, 124, 'Početno stanje'),
(63, 124, 'Računi'),
(64, 124, 'Hijerarhijski prikaz (robna grupa, podgrupa)'),
(65, 124, 'Ponovno knjiženje'),
(66, 124, 'Račun i otpremnica'),
(67, 124, 'Otpremnica'),
(68, 124, 'Interna otpremnica'),
(69, 124, 'Račun usluga'),
(70, 124, 'Račun interni'),
(71, 124, 'Ponude'),
(72, 124, 'Predračun'),
(73, 124, 'Manjak robe'),
(74, 124, 'Otpis'),
(75, 124, 'Povrat od kupaca'),
(76, 124, 'Knjižno odobrenje'),
(77, 124, 'Automatsko kreiranje lagera na osnovu ulaznih i izlaznih dokumenata'),
(78, 124, 'Robna kartica'),
(79, 124, 'Uvid u rezervisane količine'),
(80, 127, 'Robnoj grupi'),
(81, 127, 'Šifri artikla'),
(82, 127, 'Poreskoj stopi'),
(83, 127, 'Šifarniku'),
(84, 129, 'Sa cijenama'),
(85, 129, 'Bez cijena'),
(86, 129, 'Sa PDV-om'),
(87, 132, 'Definisanje cjenovnika po magacinima'),
(88, 132, 'Prema grupi partnera'),
(89, 132, 'Generisnje iz šifarnika'),
(145, 140, 'Sastavljanje godišnje prijave na dohodak gradjana');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
CREATE TABLE IF NOT EXISTS `components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `type` int(1) DEFAULT NULL,
  `text` varchar(1500) COLLATE utf16_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `service_id`, `type`, `text`) VALUES
(139, 38, 1, 'Vođenje poslovnih knjiga podrazumijeva sljedeće poslove i radnje:\r\n\r\n'),
(140, 38, 3, 'Vođenje glavne knjige\r\nVođenje analitičkih evidencija: kupaca, dobavljača, blagajne, tekućih računa, robe, materijala, lična primanja, osnovna sredstva\r\nVođenje pomoćnih evidencija: Knjiga ulaznih faktura, knjiga izlaznih faktura, knjiga blagajne\r\nObračun PDV-a, poreza na dohodak građana po ugovorima: o djelu, autorstvu, zakupu nepokretnosti, zakupu pokretnih stvari\r\nObračun akcize\r\nSastavljanje poreskih prijava i drugih obračuna\r\nIzvod otvorenih stavki kupaca, dobavljača\r\nIzvještaj analitičkih kartica na dan, za period\r\nSastavljanje zaključnog lista i bruto bilansa na željeni datum\r\nSastavljanje godišnjeg finansijskog izvještaja za mala i srednja pravna lica i preduzetnike\r\nSastavljanje vanrednih finansijskih izveštaja: likvidacioni, bilans pripajanja, bilans spajanja, diobni bilansi, sastavljanje finansijskih izveštaja u svrhu dobijanja kredita od banaka\r\nSastavljanje poreskog bilansa i poreske prijave\r\nObračun poreza na imovinu\r\nSastavljanje godišnje prijave na dohodak gradjana'),
(122, 34, 1, 'Robno – materijalno knjigovodstvo u suštini predstavlja evidenciju i praćenje robe u veleprodaji i maloprodaji po vrsti, količini i vrijednosti. KEYNES knjigovodstvo svojim komitentima može da ponudi uslugu vođenja robno-materijalnog knjigovodstva na način koji je potpuno automatizovan i integrisan sa finansijskim računovodstvom. Evidencijom robe po vrsti, količini i vrijednosti, komitentu je omogućeno konstantno praćenje i uvid u stanje zaliha robe, materijala. Robno materijalno knjigovodstvo podrazumijeva obračun nabavke robe (kalkulacija), prodaje robe (fakturisanje), kao i praćenje stanja zaliha. Izradom jednog dokumenta (npr.kalkulacija), vrši se istovremeno knjiženje u odgovarajuće knjige (KIF,KPR), formiranje lager liste , generisanje robne kartice posebno za svaki artikal, i vrši automatsko knjiženje u glavnu knjigu finansijskog knjigovodstva.'),
(123, 34, 1, 'U robno - materijalnom knjigovodstvu vrše se sljedeće evidencije i knjiženja:'),
(124, 34, 3, 'Uvozna kalkulacija\r\nDomaća kalkulacija\r\nKomisiona evidencija\r\nDefinisanje zavisnih troškova\r\nInterne prenosnice\r\nKnjižno odobrenje\r\nPripremne kalkulacije\r\nNivelacije cijena\r\nPovrat robe\r\nNarudžbe\r\nVišak robe\r\nSastavnice na ulazu\r\nPočetno stanje\r\nRačuni\r\nHijerarhijski prikaz (robna grupa, podgrupa)\r\nPonovno knjiženje\r\nRačun i otpremnica\r\nOtpremnica\r\nInterna otpremnica\r\nRačun usluga\r\nRačun interni\r\nPonude\r\nPredračun\r\nManjak robe\r\nOtpis\r\nPovrat od kupaca\r\nKnjižno odobrenje\r\nAutomatsko kreiranje lagera na osnovu ulaznih i izlaznih dokumenata\r\nRobna kartica\r\nUvid u rezervisane količine'),
(125, 34, 2, 'POPIS'),
(126, 34, 1, 'Automatsko generisanje popisnih listi prema:'),
(127, 34, 3, 'Robnoj grupi\r\nŠifri artikla\r\nPoreskoj stopi\r\nŠifarniku'),
(128, 34, 1, 'Priprema popisa - ispis popisnih listi:'),
(129, 34, 3, 'Sa cijenama\r\nBez cijena\r\nSa PDV-om'),
(130, 34, 2, 'CJENOVNIK '),
(131, 34, 1, 'Priprema popisa - ispis popisnih listi:'),
(132, 34, 3, 'Definisanje cjenovnika po magacinima\r\nPrema grupi partnera\r\nGenerisnje iz šifarnika');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(3) DEFAULT NULL,
  `header` varchar(100) COLLATE utf16_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `position`, `header`) VALUES
(38, 1, 'Finansijsko Računovodstvo'),
(34, 2, '\r\nRobno-Materijalno Knjigovodstvo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf16_slovenian_ci DEFAULT NULL,
  `password` varchar(70) COLLATE utf16_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'keynes', '$2a$04$.t5GIRqUivYqNYNSH2sWC.YscK7c9AnIVXyDhLe8QJ186js6CwknC');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
