-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/12/2024 às 12:27
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tb_confeitaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_clientesconfeitaria`
--

CREATE TABLE `tb_clientesconfeitaria` (
  `cpf` char(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `datanascimento` date NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `nrcasa` varchar(10) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `confirmarSenha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_clientesconfeitaria`
--

INSERT INTO `tb_clientesconfeitaria` (`cpf`, `nome`, `celular`, `email`, `datanascimento`, `cidade`, `endereco`, `nrcasa`, `senha`, `confirmarSenha`) VALUES
('097.866.619-40', 'aluno do senac', '12312321', 'alunodosenac65@gmail.com', '1111-11-01', 'dsad', 'dasda', 'dsadsa', '123123', '123123'),
('12345678', 'wesley', '4599999999', 'alunodosenac65@gmail.com', '2024-10-23', 'dsad', 'dasda', '12', '12', '12');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_clientesconfeitaria`
--
ALTER TABLE `tb_clientesconfeitaria`
  ADD PRIMARY KEY (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
