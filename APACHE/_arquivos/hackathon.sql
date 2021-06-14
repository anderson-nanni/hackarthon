-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jun-2021 às 21:55
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

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
  `idcor` int(11) NOT NULL,
  `cor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`idcor`, `cor`) VALUES
(1, 'Preto Metálico'),
(2, 'Prata Metalico'),
(3, 'Vermelho Perolizado'),
(4, 'Cinza Metalico'),
(5, 'Preto'),
(6, 'Branco perolizado'),
(7, 'Cinza'),
(8, 'Azul'),
(10, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`idmarca`, `marca`) VALUES
(1, 'Chery'),
(2, 'Tesla'),
(3, 'Mercedes-Benz'),
(4, 'Jaguar'),
(5, 'Volkswagen'),
(10, 'Ford');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipov`
--

CREATE TABLE `tipov` (
  `idtipov` int(11) NOT NULL,
  `tipov` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipov`
--

INSERT INTO `tipov` (`idtipov`, `tipov`) VALUES
(1, 'novo'),
(2, 'seminovo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `login`, `senha`) VALUES
(1, 'Anderson', 'anderson', '123'),
(2, 'Andrey', 'andrey', '456'),
(3, 'admin', 'admin', 'root');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `idveiculo` int(11) NOT NULL,
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

INSERT INTO `veiculo` (`idveiculo`, `modelo`, `anomodelo`, `anofabricacao`, `valor`, `tipo`, `fotodestaque`, `marca_id`, `cor_id`, `usuario_id`, `opcionais`) VALUES
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
  ADD PRIMARY KEY (`idcor`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Índices para tabela `tipov`
--
ALTER TABLE `tipov`
  ADD PRIMARY KEY (`idtipov`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`idveiculo`),
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
  MODIFY `idcor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tipov`
--
ALTER TABLE `tipov`
  MODIFY `idtipov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `idveiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `pk1` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`idmarca`),
  ADD CONSTRAINT `pk2` FOREIGN KEY (`cor_id`) REFERENCES `cor` (`idcor`),
  ADD CONSTRAINT `pk3` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
