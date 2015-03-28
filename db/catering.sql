-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2014 at 07:45 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(4) NOT NULL AUTO_INCREMENT,
  `nume` varchar(10) NOT NULL,
  `parola` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nume`, `parola`) VALUES
(3, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `categorii`
--

CREATE TABLE IF NOT EXISTS `categorii` (
  `id_categ` int(2) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(30) NOT NULL,
  PRIMARY KEY (`id_categ`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categorii`
--

INSERT INTO `categorii` (`id_categ`, `categoria`) VALUES
(1, 'Mic dejun'),
(2, 'Salate'),
(3, 'Supe'),
(4, 'Fel principal'),
(5, 'Desert');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE IF NOT EXISTS `clienti` (
  `id_client` int(4) NOT NULL AUTO_INCREMENT,
  `nume` varchar(30) NOT NULL,
  `prenume` varchar(30) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `telefon` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `parola` varchar(50) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id_client`, `nume`, `prenume`, `adresa`, `telefon`, `email`, `parola`) VALUES
(1, 'Hegedus', 'Norbert', 'Brates nr.16 ap.33', '0746256476', 'hegedus.norbert@yahoo.ro', '202cb962ac59075b964b07152d234b70'),
(2, 'Kis', 'Edvin', 'Mogosoia 7', '0755689532', 'kis.edvin@yahoo.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Ilea', 'Rares', 'Campului 102', '0745222134', 'ilea.rares@yahoo.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE IF NOT EXISTS `comenzi` (
  `id_comanda` int(4) NOT NULL AUTO_INCREMENT,
  `id_client` int(4) NOT NULL,
  `id_preparat` int(4) NOT NULL,
  `bucati` int(4) NOT NULL,
  `adresa_livrare` varchar(100) NOT NULL,
  `data_livrare` date NOT NULL,
  `ora_livrare` decimal(4,2) NOT NULL,
  `stare` int(2) NOT NULL,
  PRIMARY KEY (`id_comanda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `comenzi`
--

INSERT INTO `comenzi` (`id_comanda`, `id_client`, `id_preparat`, `bucati`, `adresa_livrare`, `data_livrare`, `ora_livrare`, `stare`) VALUES
(3, 1, 4, 2, 'Adresa 1', '2014-08-04', '11.57', 2),
(4, 1, 36, 2, 'Adresa 1', '2014-07-31', '17.58', 2),
(5, 1, 20, 2, 'aaa', '2014-08-07', '17.41', 2),
(6, 1, 5, 2, 'aaa', '2014-08-15', '11.54', 2),
(7, 1, 10, 3, 'Testttttt', '2014-08-04', '11.57', 2),
(8, 1, 7, 3, 'Testttttt', '2014-08-04', '11.57', 2),
(9, 1, 4, 1, 'Testttttt', '2014-08-04', '11.57', 2),
(13, 2, 29, 1, 'aaaa', '2014-08-15', '11.54', 2),
(14, 2, 31, 1, 'brates 16', '2014-08-15', '11.57', 2),
(15, 2, 37, 2, 'Brates 16', '2014-08-22', '21.30', 2),
(16, 2, 4, 2, 'brates', '2014-08-26', '22.80', 2),
(17, 2, 4, 1, 'Brates 16', '2014-08-30', '23.43', 2),
(18, 2, 13, 1, 'Brates 16 ap.33', '2014-09-03', '10.51', 2),
(19, 2, 14, 1, '', '0000-00-00', '0.00', 0),
(21, 1, 12, 1, 'fgsdf', '2014-09-03', '24.60', 2);

-- --------------------------------------------------------

--
-- Table structure for table `preparate`
--

CREATE TABLE IF NOT EXISTS `preparate` (
  `id_preparat` int(4) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(2) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `ingrediente` varchar(200) NOT NULL,
  `pret` double NOT NULL,
  `foto` varchar(30) NOT NULL,
  `foto_thumb` varchar(30) NOT NULL,
  PRIMARY KEY (`id_preparat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `preparate`
--

INSERT INTO `preparate` (`id_preparat`, `id_categorie`, `nume`, `ingrediente`, `pret`, `foto`, `foto_thumb`) VALUES
(4, 1, 'Sortiment 1', 'Ingrediente: cereale, portocale, capsuni, mere, suc, ceai', 20, 'mic-dejun1.jpg', 'mic-dejun1.jpg'),
(5, 1, 'Sortiment 2', 'Ingrediente: capsuni, cereale, corn cu ciocolata, cafea, lapte, kiwi, ou', 30, 'mic-dejun2.jpg', 'mic-dejun2.jpg'),
(6, 1, 'Sortiment 3', 'Ingrediente: oua, suc de portocale, rosii, cafea', 15, 'mic-dejun3.jpg', 'mic-dejun3.jpg'),
(7, 1, 'Sortiment 4', 'Ingrediente: carnaciori, rosii, oua, ceai, suc de portocale, paine', 23, 'mic-dejun4.jpg', 'mic-dejun4.jpg'),
(8, 1, 'Sortiment 5', 'Ingrediente: suc de portocale, capsuni, cirese, branza, paine', 17, 'mic-dejun5.jpg', 'mic-dejun5.jpg'),
(9, 1, 'Sortiment 6', 'Ingrediente: Portocale, mere, suc de portocale, corn cu ciocolata, cafea', 21, 'mic-dejun6.jpg', 'mic-dejun6.jpg'),
(10, 1, 'Sortiment 7', 'Ingrediente: cereale, capsuni, corn cu ciocolata, cafea', 28, 'mic-dejun7.jpg', 'mic-dejun7.jpg'),
(11, 1, 'Sortiment 8', 'Ingrediente: zmeura, capsuni, corn cu ciocolata, cafea, lapte', 14, 'mic-dejun8.jpg', 'mic-dejun8.jpg'),
(12, 2, 'Sortiment 1', 'Ingrediente: rosii, varza, salata, masline, seminte', 28, 'salate1.jpg', 'salate1.jpg'),
(13, 2, 'Sortiment 2', 'Ingrediente: varza, ridiche, rosii, ceapa', 31, 'salate2.jpg', 'salate2.jpg'),
(14, 2, 'Sortiment 3', 'Ingrediente: castraveti, branza, masline, rosii', 24, 'salate3.jpg', 'salate3.jpg'),
(15, 2, 'Sortiment 4', 'Ingrediente: rosii, branza, condimente', 19, 'salate4.jpg', 'salate4.jpg'),
(16, 2, 'Sortiment 5', 'Ingrediente: castraveti, salata verde, rosii, masline, branza', 27, 'salate5.jpg', 'salate5.jpg'),
(17, 2, 'Sortiment 6', 'Ingrediente: branza, rosii, ardei, sunca, masline', 32, 'salata6.jpg', 'salata6.jpg'),
(18, 2, 'Sortiment 7', 'Ingrediente: masline, sunca, rosii, lamaie', 16, 'salata7.jpg', 'salata7.jpg'),
(20, 3, 'Sortiment 1', 'Ingrediente: smanatana, carne de pui, patrunjel', 12, 'supa1.jpg', 'supa1.jpg'),
(21, 3, 'Sortiment 2', 'Ingrediente: pui, taietei, patrunjel, morcovi', 8, 'supa2.jpg', 'supa2.jpg'),
(22, 3, 'Sortiment 3', 'Ingrediente: carne de vita, patrunjel, condimente', 9, 'supa3.jpg', 'supa3.jpg'),
(23, 3, 'Sortiment 4', 'Ingrediente: patrunjel, carne de pui, paine araba', 7, 'supa4.jpg', 'supa4.jpg'),
(24, 3, 'Sortiment 5', 'Ingrediente: rosii, carne de vita, condimente', 11, 'supa5.jpg', 'supa5.jpg'),
(25, 3, 'Sortiment 6', 'Ingrediente: castraveti, smantana, patrunjel', 13, 'supa6.jpg', 'supa6.jpg'),
(26, 3, 'Sortiment 7', 'Ingrediente: carne de porc, condimente, smantana', 14, 'supa7.jpg', 'supa7.jpg'),
(27, 3, 'Sortiment 8', 'Ingrediente: galuste, pui, patrunjel', 9, 'supa8.jpg', 'supa8.jpg'),
(28, 4, 'Sortiment 1', 'Ingrediente: gratar porc, branza, morcovi', 25, 'fel-principal1.jpg', 'fel-principal1.jpg'),
(29, 4, 'Sortiment 2', 'Ingrediente: gratar vita, branza, legume', 28, 'fel-principal2.jpg', 'fel-principal2.jpg'),
(30, 4, 'Sortiment 3', 'Ingrediente: gratar porc, carnaciori, legume, cartofi', 22, 'fel-principal3.jpg', 'fel-principal3.jpg'),
(31, 4, 'Sortiment 4', 'Ingrediente: cartofi, legume, carne de porc, sos', 19, 'fel-principal4.jpg', 'fel-principal4.jpg'),
(32, 4, 'Sortiment 5', 'Ingrediente: rulou vita, legume, sos', 21, 'fel-principal5.jpg', 'fel-principal5.jpg'),
(33, 4, 'Sortiment 6', 'Ingrediente: peste, legume, sos, mazare', 26, 'fel-principal6.jpg', 'fel-principal6.jpg'),
(34, 4, 'Sortiment 7', 'Ingrediente: sunca, branza, masline, castraveti', 21, 'fel-principal7.jpg', 'fel-principal7.jpg'),
(36, 4, 'Sortiment 8', 'Ingrediente: peste file, legume, sos', 25, 'fel-principal8.jpg', 'fel-principal8.jpg'),
(37, 5, 'Sortiment 1', 'Ingrediente: cremes, capsuni, gem de fructe', 15, 'desert1.jpg', 'desert1.jpg'),
(38, 5, 'Sortiment 2', 'Ingrediente: inghetata, capsuni, frisca', 11, 'desert2.jpg', 'desert2.jpg'),
(39, 5, 'Sortiment 3', 'Ingrediente: capsuni, blat, frisca, ciocolata', 9, 'desert3.jpeg', 'desert3.jpeg'),
(40, 5, 'Sortiment 4', 'Ingrediente: cacao, crema, ciocolata, blat', 10, 'desert4.jpg', 'desert4.jpg'),
(41, 5, 'Sortiment 5', 'Ingrediente: capsuni, gelatina, blat', 13, 'desert5.jpg', 'desert5.jpg'),
(42, 5, 'Sortiment 6', 'Ingrediente: frisca, crema, capsuni, blat', 8, 'desert6.jpeg', 'desert6.jpeg'),
(43, 5, 'Sortiment 7', 'Ingrediente: piscoturi, capsuni, fructe de padure', 23, 'desert7.jpg', 'desert7.jpg'),
(44, 5, 'Sortiment 8', 'Ingrediente: gris, toping de capsuni', 10, 'desert8.jpg', 'desert8.jpg'),
(45, 0, '', '', 0, '', ''),
(46, 0, '', '', 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
