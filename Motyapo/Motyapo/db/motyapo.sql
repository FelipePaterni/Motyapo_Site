-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2023 às 20:31
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `motyapo`
--
CREATE DATABASE IF NOT EXISTS `motyapo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `motyapo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editor`
--

CREATE TABLE IF NOT EXISTS `editor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `editor`
--

INSERT INTO `editor` (`id`, `nome`, `email`, `senha`) VALUES(1, ' Narkus', 'narkus@gmail.com ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE IF NOT EXISTS `postagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) DEFAULT NULL,
  `descricao` varchar(2000) DEFAULT NULL,
  `dataPost` varchar(10) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `id_adm` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_adm` (`id_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `dataPost`, `imagem`, `id_adm`) VALUES(3, 'teste', 'Muito bom dia, esse é um teste de descrição utilizando o Mysql, sei la tio, minha cabeça esta nos pixels, não', '25/10/2023', '5.png', 1);
INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `dataPost`, `imagem`, `id_adm`) VALUES(5, 'teste2', 'Essa é a segunda novidade', '25/09/2023', '4.png', 1);
INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `dataPost`, `imagem`, `id_adm`) VALUES(6, 'teste', 'Muito bom dia, esse é um teste de descrição utilizando o Mysql, sei la tio, minha cabeça esta nos pixels, não', '25/10/2023', '5.png', 1);
INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `dataPost`, `imagem`, `id_adm`) VALUES(7, 'teste2', 'Essa é a segunda novidade', '25/09/2023', '4.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES(1, 'teste', 'teste@teste.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `postagens`
--
ALTER TABLE `postagens`
  ADD CONSTRAINT `postagens_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `editor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
