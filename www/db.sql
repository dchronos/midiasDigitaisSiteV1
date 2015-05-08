-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 08, 2015 at 03:33 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `midias`
--

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
`id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ponto` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `userId`, `ponto`) VALUES
(5, 100, 829),
(6, 101, 324),
(7, 102, 323);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
`id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `dataNascimento` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `dataNascimento`, `sexo`, `nome`) VALUES
(100, 'demo', 'demo', '1988-07-15', 'masculino', 'Luiz Carvalho'),
(101, 'novo', 'novo', '1988-07-15', 'masculino', 'teste'),
(102, 'dchronos', '123mudar', '1988-07-07', 'masculino', 'luiz carvalho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
