-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2023 às 13:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `postagens`
--

DROP TABLE IF EXISTS `postagens`;
CREATE TABLE `postagens` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `dataPost` varchar(10) DEFAULT NULL,
  `imagem` varchar(500) DEFAULT NULL,
  `id_adm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `postagens`
--

INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `dataPost`, `image`, `id_adm`) VALUES(2, 'Inspirações para a criação do bando da osana bonita.', 'O bando da Osana Bonita foi inspirado no episódio da república velha conhecido como: ”cangaço”, mais especificamente a inspiração veio do famoso bando do lampião, começando por Elétrico, que aqui se tornou elétrica, Quinta-feira que seria o nosso quarta-feira, sendo também uma referência a personagem: ”wandinha” que se chama wednesday (quarta-feira) na versão original, Enedina era a esposa do Zé julião, desta vez inspirando o personagem enedino, Osana é a esposa do labareda e Bonita seria o apelido da esposa do lampião, a rainha do cangaço, criando assim uma junção, Osana Bonita, e por último Moreno, que deu origem a Morena, a feiticeira de motyapó.', '06/11/2023', 'noticia1.png', 65);
INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `dataPost`, `image`, `id_adm`) VALUES(3, 'Etec de portas abertas', 'Na terça-feira do dia 17 de outubro em 2023, ocorreu um evento conhecido como EPA, onde foram apresentados projetos estudantis da instituição pública estadual: \"Etec Martinho Di Ciero\", colocando em demonstração todo o arsenal de conhecimento arquitetado pelos alunos ao longo do ano, e é neste local onde o nosso time apresentou ao público pela primeira vez: ”Motyapó”. decidimos produzir uma apresentação, colocando em exposição o primeiro vídeo oficial, dando ênfase nas artes com os quais produzimos exclusivamente para este momento, de toda a narrativa escrita para cada bioma, personagem, descrição ou conceito, além de confeccionamos a: \"cafeteria Motia”, um cenário comum que está integralmente presente durante o jogo. Cerca de 45 pessoas puderam parabenizar está apresentação.', '06/11/2023', 'noticia2.png', 65);
INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `dataPost`, `image`, `id_adm`) VALUES(4, 'História da produção de motyapó.', 'A idéia do projeto começou com um desejo meu, do autor, comentei que seria interessante um cenário cyberpunk dentro do cangaço Brasileiro, a partir desta idéia aleatória e maluca, passei a escrever idéias e um sonho, por isso a primeira pessoa que poderia ter contado é para um dos principais artistas de Motyapó hoje em dia, surgindo logo num momento importante quanto era a proposta da criação de um projeto escolar dentro da instituição pública chamada Etec, por isso decidimos fazer este game Brasileiro e inovador se tornar realidade, aproveitando essas aulas fornecidas para o desenvolvimento, levando em frente como TCC nos próximos anos.', '06/11/2023', 'noticia3.png', 65);
INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `dataPost`, `image`, `id_adm`) VALUES(5, 'Easter eggs motyapó.', 'Investimos bastante quando o requisito se trata das referências, perpetuando símbolos, objetos e vestimentas típicas da cultura brasileira, compondo diversas religiões que estão presentes nas inúmeras regiões do Brasil. Incluindo personagens claramente inspirados na história, mitos e heróis, sinta-se a vontade para procurar todos ao longo do jogo, e registrar suas descobertas em nossas redes sociais.', '06/11/2023', 'noticia4.png', 65);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sugestao`
--

DROP TABLE IF EXISTS `sugestao`;
CREATE TABLE `sugestao` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `sugestao` text NOT NULL,
  `dataPost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  `novidade` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `adm`, `novidade`) VALUES(65, 'Felipe Paterni', 'felipesp.chaves@gmail.com', '123', 1, 0);
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `adm`, `novidade`) VALUES(66, 'Teste', 'teste@teste.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Índices de tabela `sugestao`
--
ALTER TABLE `sugestao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sugestao`
--
ALTER TABLE `sugestao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `postagens`
--
ALTER TABLE `postagens`
  ADD CONSTRAINT `postagens_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
