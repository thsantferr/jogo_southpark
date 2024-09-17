CREATE DATABASE south_park;
USE south_park;

-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/09/2016 às 16:47:18
-- Versão do Servidor: 10.0.20-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de Dados: `u293482586_meth`
--

----------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `idquest` int(11) NOT NULL AUTO_INCREMENT,
  `quest` varchar(900) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idquest`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`idquest`, `quest`) VALUES
(1, 'Qual personagem faz de tudo para conseguir comida ou dinheiro?'),
(2, 'Qual personagem é deficiente no desenho?'),
(3, 'Nome da namorada de Stan Marsh'),
(4, 'Quem é o malvado professor caos ?'),
(15, 'Quem é o único garoto negro de south park ?'),
(21, 'Quem foi o Personagem que mais morreu ?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE IF NOT EXISTS `resposta` (
  `idresp` int(11) NOT NULL AUTO_INCREMENT,
  `resp` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `questnum` int(11) DEFAULT NULL,
  `v_f` int(11) DEFAULT NULL,
  PRIMARY KEY (`idresp`),
  KEY `questnum` (`questnum`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=86 ;

--
-- Extraindo dados da tabela `resposta`
--

INSERT INTO `resposta` (`idresp`, `resp`, `questnum`, `v_f`) VALUES
(6, 'Eric Cartman', 1, 0),
(7, 'Kenny McCormick', 1, 1),
(8, 'Butters Stotch', 1, 0),
(9, 'Token Black', 1, 0),
(10, 'Timmy Timmy', 2, 1),
(11, 'Craig Tucker', 2, 0),
(12, 'Clyde Donovan', 2, 0),
(13, 'Ike Broflovski', 2, 0),
(14, 'Carol McCormick', 3, 0),
(15, 'Sheila Broflovski', 3, 0),
(16, 'Shelly Marsh', 3, 0),
(17, 'Wendy Testaburger', 3, 1),
(18, 'Butters Stotch', 4, 1),
(19, 'Clyde Donovan', 4, 0),
(20, 'Token Black', 4, 0),
(21, 'Heidi Turner', 4, 0),
(85, 'Cartman', 21, 0),
(84, 'Ike', 21, 0),
(83, 'Chef', 21, 0),
(61, 'Chef', 15, 0),
(82, 'Kenny', 21, 1),
(60, 'Cartman', 15, 0),
(59, 'Kenny', 15, 0),
(58, 'Token', 15, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`iduser`, `user`, `pass`, `email`) VALUES
(1, 'redskins', '1234', 'teste@hotmail.com');

