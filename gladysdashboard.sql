-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 09 fév. 2019 à 13:55
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gladysdashboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `changelog`
--

DROP TABLE IF EXISTS `changelog`;
CREATE TABLE IF NOT EXISTS `changelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `changelog`
--

INSERT INTO `changelog` (`id`, `title`, `detail`, `date`) VALUES
(1, 'Changelog v0.4 Beta :', '. Adding Exchange Points</br>. Adding Help Ticket</br>. Adding Forum</br>. Fix Error Register</br>. Fix Error Include .Dll</br>. Fix Error SSL</br>. Fix Faill Security</br>', '2014-10-11 18:28:47'),
(2, 'Changelog v0.3 Beta :', '. Adding Exchange Points</br>\n. Adding Help Ticket</br>\n. Adding Forum</br>\n. Fix Error Register</br>\n. Fix Error Include .Dll</br>\n. Fix Error SSL</br>\n. Fix Faill Security</br>', '2014-06-01 10:34:13');

-- --------------------------------------------------------

--
-- Structure de la table `ip_banned`
--

DROP TABLE IF EXISTS `ip_banned`;
CREATE TABLE IF NOT EXISTS `ip_banned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Ip_Banned` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ip_maintenance`
--

DROP TABLE IF EXISTS `ip_maintenance`;
CREATE TABLE IF NOT EXISTS `ip_maintenance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nikname` varchar(255) NOT NULL,
  `IP` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ip_maintenance`
--

INSERT INTO `ip_maintenance` (`ID`, `Nikname`, `IP`) VALUES
(1, 'SH3LIOS', '88.178.149.40'),
(2, 'SH3LIOS', '127.0.0.1'),
(3, 'Galaxi', '88.178.148.113');

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Start_Date` varchar(255) NOT NULL,
  `Progression` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maintenance`
--

INSERT INTO `maintenance` (`ID`, `Description`, `Status`, `Type`, `Start_Date`, `Progression`) VALUES
(1, 'Amelioration Design WEB', 'Finish', 'Amelioration', '1480153602', '100'),
(2, 'Amelioration Of Member Space', 'Finish', 'Amelioration', '1480153602', '100'),
(3, 'Security Vulnerabilities', 'Finish', 'Fixing', '1480153602', '100'),
(4, 'Amelioration Of Client', 'In Progress', 'Amelioration', '1480153602', '76'),
(5, 'Security Vulnerabilities Hashs', 'Finish', 'Fixing', '1480153602', '100'),
(6, 'Security Vulnerabilities API', 'Finish', 'Fixing', '1480153602', '100');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `IP` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Your_Date` varchar(255) NOT NULL,
  `Sex` varchar(255) NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Rank` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL COMMENT 'Activated/Inactivated',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`ID`, `Username`, `Nickname`, `Email`, `IP`, `Password`, `Your_Date`, `Sex`, `Avatar`, `Token`, `Rank`, `Status`) VALUES
(2, 'b3t4byt3', 'B3T4BYT3', 'b3t4byt3@outlook.fr', '127.0.0.1', '8235CA2FB42896B241A9A42DEC2773DA83A9D954', 'None', 'None', '/_Resources/Assets/Images/Avatar/B3T4BYT3.png', 'f1abd670358e036c31296e66b3b66c382ac00812552949efb5e16', 'Administrator', 'Activated'),
(3, 'admin', 'Admin', 'admin@outlook.fr', '127.0.0.1', '3210AD7AAA1E3E40CA37ADFA33DF37CFC84D4A07', 'None', 'None', '/_Resources/Assets/Images/Avatar/B3T4BYT3.png', 'f1abd670358e036c31296e66b3b66c382ac00812552949efb5e16', 'Administrator', 'Activated');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Debugger` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Activated/Inactivated',
  `Op3n_B3t4` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Activated/Inactivated',
  `Coming_Soon` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Activated/Inactivated',
  `Coming_Soon_Ratio` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT '%',
  `Version_Site` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Version_SecurInject` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Version_SecurCheats` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Version_GeneratorFiles` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Version_Client` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Version_Hashs` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Server_Host` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `FTP_Host` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `FTP_Username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `FTP_Password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Paypal` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `Debugger`, `Op3n_B3t4`, `Coming_Soon`, `Coming_Soon_Ratio`, `Version_Site`, `Version_SecurInject`, `Version_SecurCheats`, `Version_GeneratorFiles`, `Version_Client`, `Version_Hashs`, `Server_Host`, `FTP_Host`, `FTP_Username`, `FTP_Password`, `Paypal`) VALUES
(1, 'Activated', 'Deactivated', 'Deactivated', '72', '0.8 BETA', '1.0.0.0', '1.0.0.0', '1.0.0.0', '1.0.0.0', '1.0.0.0', 'http://instantscheats.dev', 'ftp://127.0.0.1', 'B3T4BYT3', '1348599Az', 'https://www.sandbox.paypal.com');

-- --------------------------------------------------------

--
-- Structure de la table `uniqid`
--

DROP TABLE IF EXISTS `uniqid`;
CREATE TABLE IF NOT EXISTS `uniqid` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UniqID` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Date_Time` int(11) NOT NULL,
  `Downloads` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
