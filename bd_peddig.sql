-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2021 às 02:33
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_peddig`
--
CREATE DATABASE IF NOT EXISTS `bd_peddig` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_peddig`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `descricao` text NOT NULL,
  `adendum` text DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `Promo` tinyint(1) NOT NULL DEFAULT 0,
  `id_restaurante` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `tipo`, `descricao`, `adendum`, `foto`, `Promo`, `id_restaurante`) VALUES
(5, 'Ray', '1.90', 4, 'Pokémon, boné e olhinho azul', 'tanquinho', 'raynan.jpg', 0, 1),
(6, 'Buxin', '15.90', 2, 'Berries, nutrientes e carinha feliz', 'cogumelos e amor', 'munchlax-pokemon.gif', 1, 1),
(7, 'Fantasmas', '69.99', 2, 'Névoa, veneno, maldade', 'mega-evoluçaõ', 'e6HuEy.png', 1, 1),
(8, 'tarefa pepo', '58.95', 2, 'linhas, espanhol.', 'pepo', 'Pepo el lo 1.png', 0, 1),
(9, 'Foice', '99.99', 1, 'nada', '', 'Foice.jpg', 1, 1),
(10, 'chandelure', '666.66', 3, 'vela capirotica', 'demonho', 'chandelure.gif', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `restaurante`
--

CREATE TABLE `restaurante` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nome_restaurante` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `restaurante`
--

INSERT INTO `restaurante` (`id`, `nome`, `senha`, `nome_restaurante`) VALUES
(1, 'padrão', '123456', 'restaurante teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
