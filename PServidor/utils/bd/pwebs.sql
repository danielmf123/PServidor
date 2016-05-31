-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Maio-2016 às 17:16
-- Versão do servidor: 5.5.47
-- versão do PHP: 5.4.45-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `pwebs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

DROP TABLE IF EXISTS `jogo`;
CREATE TABLE IF NOT EXISTS `jogo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pontuacao` int(11) NOT NULL,
  `Palavra_ID` int(11) NOT NULL,
  `Utilizador_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Utilizador_ID` (`Utilizador_ID`),
  KEY `Palavra_ID` (`Palavra_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`ID`, `Pontuacao`, `Palavra_ID`, `Utilizador_ID`) VALUES
(3, 0, 2, 9),
(6, 6, 2, 9),
(8, 0, 2, 9),
(11, 6, 2, 9),
(13, 0, 2, 9),
(14, 0, 5, 9),
(16, 6, 7, 9),
(19, 0, 9, 9),
(20, 5, 5, 9),
(21, 6, 8, 9),
(22, 6, 7, 9),
(25, 10, 5, 14),
(28, 2, 6, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_jogo`
--

DROP TABLE IF EXISTS `logs_jogo`;
CREATE TABLE IF NOT EXISTS `logs_jogo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Jogo` int(11) NOT NULL,
  `Palavra` varchar(255) NOT NULL,
  `Posicao` int(11) NOT NULL,
  `Letra` varchar(1) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Palavra` (`Palavra`),
  KEY `ID_Jogo` (`ID_Jogo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Extraindo dados da tabela `logs_jogo`
--

INSERT INTO `logs_jogo` (`ID`, `ID_Jogo`, `Palavra`, `Posicao`, `Letra`, `Estado`) VALUES
(1, 6, 'ASDRUBAL', 0, 'A', 'Certo'),
(2, 6, 'ASDRUBAL', 1, 'S', 'Certo'),
(3, 6, 'ASDRUBAL', 2, 'D', 'Certo'),
(4, 6, 'ASDRUBAL', 3, 'R', 'Certo'),
(5, 6, 'ASDRUBAL', 4, 'U', 'Certo'),
(6, 6, 'ASDRUBAL', 5, 'B', 'Certo'),
(7, 6, 'ASDRUBAL', 0, 'A', 'Certo'),
(8, 6, 'ASDRUBAL', 7, 'L', 'Certo'),
(9, 8, 'ASDRUBAL', 0, 'M', 'Errado'),
(10, 8, 'ASDRUBAL', 0, 'N', 'Errado'),
(11, 8, 'ASDRUBAL', 0, 'J', 'Errado'),
(12, 8, 'ASDRUBAL', 0, 'H', 'Errado'),
(13, 8, 'ASDRUBAL', 0, 'G', 'Errado'),
(14, 8, 'ASDRUBAL', 0, 'F', 'Errado'),
(15, 13, 'ASDRUBAL', 0, 'Q', 'Errado'),
(16, 13, 'ASDRUBAL', 0, 'A', 'Certo'),
(17, 13, 'ASDRUBAL', 2, 'D', 'Certo'),
(18, 13, 'ASDRUBAL', 1, 'S', 'Certo'),
(51, 22, 'BRUNO', 0, 'Q', 'Errado'),
(52, 22, 'BRUNO', 0, 'Y', 'Errado'),
(53, 22, 'BRUNO', 0, 'B', 'Certo'),
(54, 22, 'BRUNO', 1, 'R', 'Certo'),
(55, 22, 'BRUNO', 3, 'N', 'Certo'),
(56, 22, 'BRUNO', 4, 'O', 'Certo'),
(57, 22, 'BRUNO', 2, 'U', 'Certo'),
(58, 25, 'FIGUEIRA', 0, 'F', 'Certo'),
(59, 25, 'FIGUEIRA', 0, 'O', 'Errado'),
(61, 25, 'FIGUEIRA', 0, 'D', 'Errado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavras`
--

DROP TABLE IF EXISTS `palavras`;
CREATE TABLE IF NOT EXISTS `palavras` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Palavra` varchar(255) NOT NULL,
  `Dica` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `palavras`
--

INSERT INTO `palavras` (`ID`, `Palavra`, `Dica`) VALUES
(2, 'Asdrubal', 'Nome'),
(3, 'Portugal', 'Pais'),
(5, 'Figueira', 'Arvore'),
(6, 'Maduro', 'Pessoa'),
(7, 'Bruno', 'Pessoa'),
(8, 'Pinto', 'Pessoa'),
(9, 'IPL', 'Escola'),
(10, 'Silvio', 'Professor'),
(11, 'Roman', 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`ID`, `Nome`, `Data_Nascimento`, `Email`, `Username`, `Password`, `Tipo`) VALUES
(9, 'Daniel', '1997-04-03', 'maduro@gmail.com', 'dani', '81fe8bfe87576c3ecb22426f8e57847382917acf', 'Administrador'),
(10, 'Bruno', '1997-05-19', 'bpv.vieira@gmail.com', 'bruno', '8cb2237d0679ca88db6464eac60da96345513964', 'Administrador'),
(14, 'Rui SimÃµes', '1998-12-08', 'rui@ruiferrolho.com', 'rui404', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Padrao');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `jogo`
--
ALTER TABLE `jogo`
  ADD CONSTRAINT `jogo_ibfk_2` FOREIGN KEY (`Utilizador_ID`) REFERENCES `utilizador` (`ID`),
  ADD CONSTRAINT `jogo_ibfk_1` FOREIGN KEY (`Palavra_ID`) REFERENCES `palavras` (`ID`);

--
-- Limitadores para a tabela `logs_jogo`
--
ALTER TABLE `logs_jogo`
  ADD CONSTRAINT `logs_jogo_ibfk_1` FOREIGN KEY (`ID_Jogo`) REFERENCES `jogo` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
