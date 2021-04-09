-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2014 às 20:24
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esbl`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_login`
--

CREATE TABLE IF NOT EXISTS `adm_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `adm_login`
--

INSERT INTO `adm_login` (`id`, `login`, `senha`) VALUES
(1, 'keb', '202cb962ac59075b964b07152d234b70'),
(4, 'Mari', '6a14922682de5cd89216238f267c127e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instorn`
--

CREATE TABLE IF NOT EXISTS `instorn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(100) NOT NULL,
  `torneioid` int(11) NOT NULL,
  `cap` varchar(50) NOT NULL,
  `teamname` varchar(300) NOT NULL,
  `idtime` varchar(500) NOT NULL,
  `top` varchar(50) NOT NULL,
  `mail_top` varchar(300) NOT NULL,
  `jg` varchar(50) NOT NULL,
  `mail_jg` varchar(300) NOT NULL,
  `mid` varchar(50) NOT NULL,
  `mail_mid` varchar(300) NOT NULL,
  `adc` varchar(50) NOT NULL,
  `mail_adc` varchar(300) NOT NULL,
  `sup` varchar(50) NOT NULL,
  `mail_sup` varchar(300) NOT NULL,
  `res1` varchar(50) NOT NULL,
  `mail_res1` varchar(300) NOT NULL,
  `res2` varchar(50) NOT NULL,
  `mail_res2` varchar(300) NOT NULL,
  `logo` varchar(800) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `instorn`
--

INSERT INTO `instorn` (`id`, `userid`, `torneioid`, `cap`, `teamname`, `idtime`, `top`, `mail_top`, `jg`, `mail_jg`, `mid`, `mail_mid`, `adc`, `mail_adc`, `sup`, `mail_sup`, `res1`, `mail_res1`, `res2`, `mail_res2`, `logo`) VALUES
(12, 5, 10, 'keb ramone', 'brunfodo', 'TEAM-9543f140-c27b-11e2-b9c0-d4ae527988fc', 'M3run', '3', 'GuiBorges', '1', 'KebRamone', '5', 'Shyoks', '4', 'gbrun', '2', 'rafabrun', '6', '', '', 's'),
(13, 6, 10, 'zuao', 'INTZ Red', 'TEAM-aa81e230-532d-11e4-996a-d4ae527988fc', 'Soource', '1', 'hiimenvy', '2', 'imnotDanDy', '4', 'Zuao', '3', 'imnotMadLife', '6', 'NeptuneKing', '5', '', '', 's'),
(14, 5, 11, 'keb ramone', 'brunfodo', 'TEAM-9543f140-c27b-11e2-b9c0-d4ae527988fc', 'gbrun', '2', 'GuiBorges', '1', 'Shyoks', '4', 'rafabrun', '6', 'M3run', '3', 'KebRamone', '5', '', '', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `mail` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `mail`
--

INSERT INTO `mail` (`id`, `nome`, `mail`) VALUES
(4, 'mariana conta 2', 'mariana@contadoisehumdois.com'),
(3, 'mariana', 'mari@maria.com.br'),
(5, 'mariana conta 2', 'mariana@contadoisehumdois.com'),
(6, 'asdff', 'afasfsa@safas'),
(7, 'adsdf', ''),
(8, 'mariana conta 3', 'mariana@contadoisehumdoistres.com'),
(9, 'y1wy2wd', ''),
(10, 'ygigiuh', ''),
(11, 'aff', ''),
(12, 'asfdsgfhd', ''),
(13, 'jorge', 'KEBRAMONE@GMAIL.COM'),
(14, 'afsdghdag', 'SFAGDSH@DASFG.COM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `torn`
--

CREATE TABLE IF NOT EXISTS `torn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `jogo` varchar(50) NOT NULL,
  `dia` datetime NOT NULL,
  `valor` float NOT NULL,
  `premiacao` float NOT NULL,
  `min` int(11) NOT NULL,
  `maxi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `torn`
--

INSERT INTO `torn` (`id`, `nome`, `jogo`, `dia`, `valor`, `premiacao`, `min`, `maxi`) VALUES
(12, 'VI Torneio', 'lol', '2015-02-20 19:00:00', 250, 2500, 8, 600),
(11, 'V Torneio', 'lol', '2015-01-10 20:00:00', 600, 6000, 8, 1000),
(10, 'IV Torneio ', 'lol', '2014-12-30 20:00:00', 500, 5000, 8, 600);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `nasc` date NOT NULL,
  `mail` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `num` int(11) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `nicklol` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `nick`, `nome`, `sobrenome`, `cpf`, `nasc`, `mail`, `tel`, `endereco`, `cidade`, `cep`, `num`, `bairro`, `complemento`, `uf`, `nicklol`) VALUES
(4, 'pedro', '202cb962ac59075b964b07152d234b70', 'pedrao', 'Jorge Fernando', 'Riboldi', '023.307.211-02', '0000-00-00', 'keb@esbl.com.br', '(65) 9925-3013', 'Rua Buenos Aires', 'cuiabÃ¡', '78.060-634', 280, 'Jd. das AmÃ©ricas', 'Ap 1303', 'MT', ''),
(5, 'kebramone', 'c3792c84fb35aa24c795b9a3788ae488', 'keb_ramone', 'Jorge Fernando', 'Riboldi', '023.307.211-02', '0000-00-00', 'kebramone@gmail.com', '(65) 9925-3013', 'Rua Buenos Aires', 'cuiabÃ¡', '78.060-634', 280, 'Jd. das AmÃ©ricas', 'ap 1303', 'MT', 'keb ramone'),
(6, 'zuao', '827ccb0eea8a706c4c34a16891f84e7b', 'zuao', 'ZUao', 'teste', '555.555.555-55', '0000-00-00', 'teste@teste.com', '65659959', 'Larai', 'joÃ£o pessoa', '99650-000', 1830, 'centro', 'as', 'PB', 'zuao');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
