-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql13-farm1.kinghost.net
-- Tempo de geração: 17/05/2021 às 16:36
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `employers`
--

INSERT INTO `employers` (`employer_id`, `employer_email`, `employer_password`, `employer_name`, `employer_address`, `employer_contact_name`, `employer_description`, `employer_status`) VALUES
(5, 'empresa1@teste.com.br', '9206dfa206768449c00edc4178310b23', 'PALO ALTO', 'Rua num sei, tá ok', 'ZÉ Ninguém', 'Maecenas a nisl id tellus accumsan cursus at ut elit. Phasellus id enim sit amet tellus condimentum facilisis. Fusce lacus eros, accumsan nec euismod vel, pellentesque id nisl. Nunc consectetur nunc quis pellentesque pulvinar. Praesent odio libero, tincid', 'registered'),
(6, 'igor.araujo0147@gmail.com', 'ffcd51931e75e18ef73fcaa9233dd8d1', 'Hardsystem Informática', 'Av. Anhanguera número 5674 sala 1604 Goiania - Go', 'Silverio P. Araujo', 'A empresa é responsável por desenvolvimento de sistemas aplicados a vendas.', 'registered');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `interns`
--

INSERT INTO `interns` (`intern_id`, `intern_name`, `intern_curriculum`, `intern_curse`, `intern_year`, `intern_email`, `intern_password`) VALUES
(3, 'Felipe Ramos Kafuri', 'asdf', 'ES', 2019, 'felipe11.rk@gmail.com', '97940cf52c772345dd8006747720e018'),
(4, 'Joseph Gulley', 'Duis hendrerit libero metus, ut rhoncus nisi faucibus quis. Integer euismod id leo non mattis. Vestibulum et ligula vitae neque rhoncus ultricies quis a erat. Vestibulum malesuada sollicitudin lorem, id imperdiet tellus congue non. Aliquam in velit ultric', 'Engenharia de Produção', 2018, 'testando@gmail.com', '71d83e011e58c1c94b18d0e0e8336dc1'),
(5, 'Igor Pimenta Araujo', 'FS PHP ', 'Eng. de Software', 2019, 'hsigor@outlook.com.br', 'ffcd51931e75e18ef73fcaa9233dd8d1'),
(6, 'Igor', 'jidd', 'eng de software', 2019, 'hsigor@protonmail.com', 'ffcd51931e75e18ef73fcaa9233dd8d1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `table_employer_intern`
--

CREATE TABLE IF NOT EXISTS `table_employer_intern` (
  `id` int(11) NOT NULL,
  `id_intern` int(11) NOT NULL,
  `id_employer` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `table_employer_intern`
--

INSERT INTO `table_employer_intern` (`id`, `id_intern`, `id_employer`) VALUES
(1, 5, 6),
(2, 6, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `activities_list` varchar(255) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `hours` int(11) NOT NULL,
  `skill_list` varchar(255) NOT NULL,
  `remuneration` decimal(10,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `vacancy`
--

INSERT INTO `vacancy` (`id`, `employer_id`, `description`, `activities_list`, `semester`, `hours`, `skill_list`, `remuneration`) VALUES
(1, 6, 'A vaga será para alunos de Eng de software que desejam desenvolver suas habilidades na construção de sistemas web', 'Dewsenvolver em PHP', '1º semestre', 30, 'Desenvolver em PHP e Vue.js', '1600'),
(2, 6, 'A vaga será para alunos de Eng de software que desejam desenvolver suas habilidades na construção de sistemas web', 'Dewsenvolver em PHP', '1º semestre', 30, 'Desenvolver em PHP e Vue.js', '800'),
(3, 6, 'A vaga será para alunos de Eng de software que desejam desenvolver suas habilidades na construção de sistemas web', 'Desenvolver front-end e back-end', '1º semestre', 30, 'Desenvolver em PHP e Vue.js', '800'),
(4, 6, 'A vaga será para alunos de Eng de software que desejam desenvolver suas habilidades na construção de sistemas web', 'Desenvolver front-end e back-end', '1º semestre', 30, 'Desenvolver em PHP e Vue.js', '800'),
(5, 6, 'A vaga será para alunos de Eng de software que desejam desenvolver suas habilidades na construção de sistemas web', 'Desenvolver front-end e back-end', '1º semestre', 30, 'Desenvolver em PHP e Vue.js', '800'),
(6, 6, 'Desenvolvedor fullstack de sistemas web', 'Desenvolver front-end e back-end', '1º semestre', 30, 'Desenvolver em PHP e Vue.js', '800'),
(7, 6, 'Desenvolvedor fullstack de sistemas web', 'Desenvolver front-end e back-end', '1º semestre', 30, 'Desenvolver em PHP e Vue.js', '800'),
(8, 6, 'Desenvolvedor fullstack de sistemas web', 'Desenvolver front-end e back-end', '1º semestre', 30, 'Desenvolver em PHP e Vue.js', '800'),
(9, 6, 'Desenvolvedor fullstack de sistemas web', 'Desenvolver front-end e back-end', '1º periodo', 20, 'Desenvolver em PHP e Vue.js', '1600'),
(10, 6, 'Desenvolvedor fullstack de sistemas web', 'Dewsenvolver em PHP', '1º periodo', 20, 'Desenvolver em PHP e Vue.js', '800'),
(11, 6, 'Desenvolvedor fullstack de sistemas web', 'Desenvolver front-end e back-end', '1º periodo', 20, 'Desenvolver em PHP e Vue.js', '800'),
(12, 6, 'A vaga será para alunos de Eng de software que desejam desenvolver suas habilidades na construção de sistemas web', 'Desenvolver front-end e back-end', '1º periodo', 20, 'Desenvolver em PHP e Vue.js', '800'),
(13, 6, 'Desenvolvedor fullstack de sistemas web', 'Desenvolver front-end e back-end', '1º periodo', 20, 'Desenvolver em PHP e Vue.js', '800');

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
-- Índices de tabela `table_employer_intern`
--
ALTER TABLE `table_employer_intern`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `interns`
--
ALTER TABLE `interns`
  MODIFY `intern_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `table_employer_intern`
--
ALTER TABLE `table_employer_intern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
