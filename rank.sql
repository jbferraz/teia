-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Out-2016 às 23:27
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
`idRank` bigint(20) unsigned NOT NULL,
  `idTroca` int(11) NOT NULL,
  `Nota` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataAvaliacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rank`
--

INSERT INTO `rank` (`idRank`, `idTroca`, `Nota`, `idUsuario`, `dataAvaliacao`) VALUES
(36, 6, 3, 10, '2016-10-20 20:46:08'),
(35, 6, 5, 10, '2016-10-20 20:45:55'),
(34, 6, 0, 10, '2016-10-20 20:45:09'),
(33, 6, 0, 10, '2016-10-20 20:44:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
 ADD PRIMARY KEY (`idRank`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
MODIFY `idRank` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
