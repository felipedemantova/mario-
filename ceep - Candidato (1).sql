-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2023 às 23:57
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ceep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE `candidato` (
  `cod_candidato` int(255) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `RG` varchar(20) NOT NULL,
  `datadenascimento` datetime NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `telefonepararecado` varchar(255) DEFAULT NULL,
  `nomepararecado` varchar(255) DEFAULT NULL,
  `expedido_por` varchar(50) DEFAULT NULL,
  `numero_dependentes` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `uf` varchar(50) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`cod_candidato`, `nome`, `CPF`, `RG`, `datadenascimento`, `endereco`, `bairro`, `municipio`, `email`, `telefone`, `telefonepararecado`, `nomepararecado`, `expedido_por`, `numero_dependentes`, `numero`, `uf`, `celular`) VALUES
(1, 'Mário Pina', '111.111.111-11', '1.111.111-4', '1980-02-13 22:01:00', 'rua das flores', 'Gralha Azul', 'Ibaiti', 'ceep@ceep.com.br', '43 99920-1212', '43999204545', 'joao silva', NULL, NULL, NULL, NULL, NULL),
(2, 'MÁRIO PINA', '111.111.111-10', '1.111.111-4', '1990-12-10 00:00:00', 'RUA DAS FLORES', '', 'IBAITI', 'po@po.com.br', '43 99920-1212', '', '', NULL, NULL, NULL, NULL, NULL),
(3, 'MÁRIO PINA', '111.111.111-11', '8.134.450-4', '1990-01-10 00:00:00', 'RUA DAS FLORES', 'GRALHA AZUL', 'IBAITI', 'po@po.com.br', '43 99920-1212', '', '', NULL, NULL, NULL, NULL, NULL),
(4, 'MÁRIO PINA', '111.111.111-11', '8.134.450-4', '1990-01-10 00:00:00', 'RUA DAS FLORES', 'GRALHA AZUL', 'IBAITI', 'po@po.com.br', '43 99920-1212', '', '', NULL, NULL, NULL, NULL, NULL),
(5, 'MÁRIO FRANCISCO DE OLIVEIRA PINA', '111.111.111-11', '8.134.450-4', '1990-01-10 00:00:00', 'RUA DAS FLORES', 'GRALHA AZUL', 'IBAITI', 'po@poo.com.br', '43 99920-1212', '43 99920-4545', 'JOSÉ', 'ESTADO', 2, 20, 'PR', '43 99920-1414'),
(6, 'OI', '111.111.111-00', '8.134.450-4', '1980-12-30 00:00:00', 'JARDIM', 'JARDIM ATLANTA', 'IBAITI', 'ceep@ceep.com.br', '43 99920-1313', '43 99920-4545', 'JOAO SILVA', '14', 2, 1, 'PR', '43 99920-1414'),
(7, 'OI', '111.111.111-00', '8.134.450-4', '1980-12-30 00:00:00', 'JARDIM', 'JARDIM ATLANTA', 'IBAITI', 'ceep@ceep.com.br', '43 99920-1313', '43 99920-4545', 'JOAO SILVA', '14', 2, 1, 'PR', '43 99920-1414'),
(8, 'OI', '111.111.111-00', '8.134.450-4', '1980-12-30 00:00:00', 'JARDIM', 'JARDIM ATLANTA', 'IBAITI', 'ceep@ceep.com.br', '43 99920-1313', '43 99920-4545', 'JOAO SILVA', '14', 2, 1, 'PR', '43 99920-1414'),
(9, 'OI', '111.111.111-20', '8.134.450-4', '1980-12-30 00:00:00', 'JARDIM', 'JARDIM ATLANTA', 'IBAITI', 'ceep@ceep.com.br', '43 99920-1313', '43 99920-4545', 'JOAO SILVA', '14', 2, 1, 'PR', '43 99920-1414'),
(10, 'REGINALDO', '111.111.111-30', '8.134.450-4', '1980-12-30 00:00:00', 'JARDIM', 'JARDIM ATLANTA', 'IBAITI', 'ceep@ceep.com.br', '43 99920-1313', '43 99920-4545', 'JOAO SILVA', '14', 2, 1, 'PR', '43 99920-1414'),
(11, 'JOSE SABINO DE MOURA BUENO', '111.111.111-40', '8.134.450-4', '1945-01-30 00:00:00', 'JARDIM', 'JARDIM ATLANTA', 'IBAITI', 'mago@ceep.com.br', '43 99920-1212', '43 99920-4545', 'JOTA VITOR', 'ESTADO', 2, 2, 'PR', '43 99920-1414'),
(12, '', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, 0, '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`cod_candidato`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidato`
--
ALTER TABLE `candidato`
  MODIFY `cod_candidato` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
