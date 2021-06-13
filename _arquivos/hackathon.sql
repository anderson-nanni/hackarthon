-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2021 às 04:10
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hackathon`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE `cor` (
  `id` int(11) NOT NULL,
  `cor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id`, `cor`) VALUES
(1, 'Preto Metálico'),
(2, 'Prata Metalico'),
(3, 'Vermelho Perolizado'),
(4, 'Cinza Metalico'),
(5, 'Preto'),
(6, 'Branco perolizado'),
(7, 'Cinza'),
(8, 'Azul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id`, `marca`) VALUES
(1, 'Chery'),
(2, 'Tesla'),
(3, 'Mercedes-Benz'),
(4, 'Jaguar'),
(5, 'Volkswagen');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipov`
--

CREATE TABLE `tipov` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipov`
--

INSERT INTO `tipov` (`id`, `tipo`) VALUES
(1, 'novo'),
(2, 'seminovo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'Anderson', 'anderson', '123'),
(2, 'Andrey', 'andrey', '456'),
(3, 'admin', 'admin', 'root'),
(5, 'admin', 'admin', 'root'),
(6, 'admin', 'admin', 'root'),
(7, 'admin', 'admin', 'root'),
(8, 'admin', 'admin', 'root'),
(9, 'admin', 'admin', 'root'),
(10, 'admin', 'admin', 'root'),
(11, 'admin', 'admin', 'root'),
(12, 'admin', 'admin', 'root'),
(13, 'admin', 'admin', 'root'),
(14, 'admin', 'admin', 'root'),
(15, 'admin', 'admin', 'root'),
(16, 'admin', 'admin', 'root'),
(17, 'admin', 'admin', 'root'),
(18, 'admin', 'admin', 'root'),
(19, 'admin', 'admin', 'root'),
(20, 'admin', 'admin', 'root'),
(21, 'admin', 'admin', 'root'),
(22, 'admin', 'admin', 'root'),
(23, 'admin', 'admin', 'root'),
(24, 'admin', 'admin', 'root'),
(25, 'admin', 'admin', 'root'),
(26, 'admin', 'admin', 'root'),
(27, 'admin', 'admin', 'root'),
(28, 'admin', 'admin', 'root'),
(29, 'admin', 'admin', 'root'),
(30, 'admin', 'admin', 'root'),
(31, 'admin', 'admin', 'root'),
(32, 'admin', 'admin', 'root'),
(33, 'admin', 'admin', 'root'),
(34, 'admin', 'admin', 'root'),
(35, 'admin', 'admin', 'root'),
(36, 'admin', 'admin', 'root'),
(37, 'admin', 'admin', 'root'),
(38, 'admin', 'admin', 'root'),
(39, 'admin', 'admin', 'root'),
(40, 'admin', 'admin', 'root'),
(41, 'admin', 'admin', 'root'),
(42, 'admin', 'admin', 'root'),
(43, 'admin', 'admin', 'root'),
(44, 'admin', 'admin', 'root'),
(45, 'admin', 'admin', 'root'),
(46, 'admin', 'admin', 'root'),
(47, 'admin', 'admin', 'root'),
(48, 'admin', 'admin', 'root'),
(49, 'admin', 'admin', 'root'),
(50, 'admin', 'admin', 'root'),
(51, 'admin', 'admin', 'root'),
(52, 'admin', 'admin', 'root'),
(53, 'admin', 'admin', 'root'),
(54, 'admin', 'admin', 'root'),
(55, 'admin', 'admin', 'root'),
(56, 'admin', 'admin', 'root'),
(57, 'admin', 'admin', 'root'),
(58, 'admin', 'admin', 'root'),
(59, 'admin', 'admin', 'root'),
(60, 'admin', 'admin', 'root'),
(61, 'admin', 'admin', 'root'),
(62, 'admin', 'admin', 'root'),
(63, 'admin', 'admin', 'root'),
(64, 'admin', 'admin', 'root'),
(65, 'admin', 'admin', 'root'),
(66, 'admin', 'admin', 'root'),
(67, 'admin', 'admin', 'root'),
(68, 'admin', 'admin', 'root'),
(69, 'admin', 'admin', 'root'),
(70, 'admin', 'admin', 'root'),
(71, 'admin', 'admin', 'root'),
(72, 'admin', 'admin', 'root');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `anomodelo` year(4) DEFAULT NULL,
  `anofabricacao` year(4) DEFAULT NULL,
  `valor` double NOT NULL,
  `tipo` enum('novo','seminovo') NOT NULL,
  `fotodestaque` varchar(50) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `cor_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `opcionais` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `modelo`, `anomodelo`, `anofabricacao`, `valor`, `tipo`, `fotodestaque`, `marca_id`, `cor_id`, `usuario_id`, `opcionais`) VALUES
(1, 'Tiggo 2', 2020, 2019, 78590, 'novo', 'tiggo2.png', 1, 5, 1, NULL),
(2, 'Arrizo 5', 2021, 2020, 90490, 'novo', 'arrizo5chery.png', 1, 2, 2, NULL),
(3, 'Arrizo 6', 2021, 2020, 116990, 'novo', 'arrizo6chey.png', 1, 6, 1, NULL),
(4, 'Tiggo 7', 2021, 2020, 135990, 'novo', 'tiggo7.png', 1, 4, 2, NULL),
(5, 'Model 3', 2021, 2021, 226950, 'novo', 'teslaModel3.png', 2, 6, 1, NULL),
(6, 'C 180', 2020, 2019, 210880, 'seminovo', 'mercedesbenz-c-180.png', 3, 7, 2, NULL),
(7, 'F-PACE', 2017, 2016, 300890, 'seminovo', 'jaguarFpace.png', 4, 6, 1, NULL),
(8, 'Virtus 1.4 TSI', 2020, 2019, 64990, 'seminovo', 'volkswagen-virtus.png', 5, 2, 2, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cor`
--
ALTER TABLE `cor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipov`
--
ALTER TABLE `tipov`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk1_idx` (`marca_id`),
  ADD KEY `pk2_idx` (`cor_id`),
  ADD KEY `pk3_idx` (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cor`
--
ALTER TABLE `cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tipov`
--
ALTER TABLE `tipov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `pk1` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `pk2` FOREIGN KEY (`cor_id`) REFERENCES `cor` (`id`),
  ADD CONSTRAINT `pk3` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
