-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql13-farm1.kinghost.net
-- Tempo de geração: 07/05/2021 às 09:26
-- Versão do servidor: 5.5.62-log
-- Versão do PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `hsnfe08`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `employer_id` int(11) NOT NULL,
  `employer_email` varchar(200) NOT NULL,
  `employer_password` varchar(200) NOT NULL,
  `employer_name` varchar(200) NOT NULL,
  `employer_address` varchar(255) NOT NULL,
  `employer_contact_name` varchar(200) NOT NULL,
  `employer_description` varchar(255) NOT NULL,
  `employer_status` varchar(50) NOT NULL DEFAULT 'registered' COMMENT 'registered, confirmed'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `employers`
--

INSERT INTO `employers` (`employer_id`, `employer_email`, `employer_password`, `employer_name`, `employer_address`, `employer_contact_name`, `employer_description`, `employer_status`) VALUES
(1, 'hsigor@outlook.com.br', 'ffcd51931e75e18ef73fcaa9233dd8d1', 'Hardsystem', 'a', 'A', 'a', 'confirmed'),
(3, 'hsigor@outlook.com', 'ffcd51931e75e18ef73fcaa9233dd8d1', 'Hardsystem', 'av anhanguera', 'Igor', 'dev', 'registered'),
(4, 'silverio@hotmail.com', 'ffcd51931e75e18ef73fcaa9233dd8d1', 'Hardsystem', 'Av Anhanguera', 'Silverio', 'Desenvolvimento de Sistemas', 'registered');

-- --------------------------------------------------------

--
-- Estrutura para tabela `interns`
--

CREATE TABLE IF NOT EXISTS `interns` (
  `intern_id` int(11) NOT NULL,
  `intern_name` varchar(200) NOT NULL,
  `intern_curriculum` varchar(255) NOT NULL,
  `intern_curse` varchar(100) NOT NULL,
  `intern_year` int(11) NOT NULL,
  `intern_email` varchar(200) NOT NULL,
  `intern_password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `interns`
--

INSERT INTO `interns` (`intern_id`, `intern_name`, `intern_curriculum`, `intern_curse`, `intern_year`, `intern_email`, `intern_password`) VALUES
(1, 'Igor Araujo', 'FS PHP Dev', 'Eng. de Software', 2019, 'igor@gmail.com', 'ffcd51931e75e18ef73fcaa9233dd8d1'),
(2, 'Igor', 'fs', 'eng', 2019, 'igor@gmail.com.br', 'ffcd51931e75e18ef73fcaa9233dd8d1'),
(3, 'Felipe Ramos Kafuri', 'asdf', 'ES', 2019, 'felipe11.rk@gmail.com', '97940cf52c772345dd8006747720e018');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`employer_id`);

--
-- Índices de tabela `interns`
--
ALTER TABLE `interns`
  ADD PRIMARY KEY (`intern_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `interns`
--
ALTER TABLE `interns`
  MODIFY `intern_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
