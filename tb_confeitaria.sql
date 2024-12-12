-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/12/2024 às 12:31
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
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `ID_Categoria` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `ID_Cliente` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefone` varchar(20) NOT NULL,
  `Endereco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_pedido`
--

CREATE TABLE `item_pedido` (
  `ID_Item` int(11) NOT NULL,
  `ID_Pedido` int(11) DEFAULT NULL,
  `ID_Produto` int(11) DEFAULT NULL,
  `Quantidade` int(11) NOT NULL,
  `Preco_Unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `ID_Item` int(11) NOT NULL,
  `ID_Pedido` int(11) NOT NULL,
  `ID_Produto` int(11) NOT NULL,
  `Nome_Produto` varchar(100) NOT NULL,
  `Quantidade` int(11) NOT NULL DEFAULT 1,
  `Preco` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) GENERATED ALWAYS AS (`Quantidade` * `Preco`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `ID_Pagamento` int(11) NOT NULL,
  `ID_Pedido` int(11) DEFAULT NULL,
  `Data_Pagamento` datetime NOT NULL DEFAULT current_timestamp(),
  `Valor` decimal(10,2) NOT NULL,
  `Metodo_Pagamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `ID_Pedido` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Data_Pedido` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(50) DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `ID_Produto` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Descricao` text DEFAULT NULL,
  `Preco` decimal(10,2) NOT NULL,
  `Estoque` int(11) NOT NULL,
  `ID_Categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_carrinho`
--

CREATE TABLE `tb_carrinho` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 1,
  `preco` decimal(10,2) NOT NULL,
  `total` decimal(10,2) GENERATED ALWAYS AS (`quantidade` * `preco`) VIRTUAL,
  `data_adicionado` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_cliente` int(11) NOT NULL,
  `cpf_cliente` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_carrinho`
--

INSERT INTO `tb_carrinho` (`id`, `produto_id`, `nome_produto`, `quantidade`, `preco`, `data_adicionado`, `id_cliente`, `cpf_cliente`) VALUES
(8, 2, 'Brigadeiro', 1, 5.00, '2024-11-25 12:25:10', 0, '');

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_docesconfeitaria`
--

CREATE TABLE `tb_docesconfeitaria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `ingredientes` varchar(1000) DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `arquivo_foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_docesconfeitaria`
--

INSERT INTO `tb_docesconfeitaria` (`id`, `nome`, `descricao`, `ingredientes`, `categoria`, `valor`, `arquivo_foto`) VALUES
(1, 'beijinho', 'Brigadeiro de festa', '1 lata de leite condensado; 1 colher de sopa de manteiga; 100g de coco ralado; açúcar cristal ou coco ralado para enrolar; cravos-da-índia para decorar.', 'brigadeiros', 5, '42431c0495fe5b31e39bb16f0cf334e9.jpg'),
(2, 'Brigadeiro', 'Brigadeiro de festa', 'Leite condensado Chocolate em pó Manteiga sem sal Granulado de chocolate ao leite', 'Leite condensado Chocolate em ', 5, '92d8b3935d250bd05eb1d0dcffcd077f.jpg'),
(3, 'Cuca', 'Cuca Alemã', '– 3 xícaras de farinha de trigo – 1 xícara de açúcar – 1 xícara de manteiga – 2 ovos – 1 colher de sopa de fermento em pó – 1 xícara de doce de leite\r\n', 'Cucas', 35, '8de30be5eae3d7699cc8de476b686805.jpg'),
(4, 'pao de mel', 'Pão e mel ', 'Açúcar Mel Manteiga amolecida Ovos Leite Farinha de trigo Fermento em pó químico Chocolate em pó Bicarbonato de sódio Cravo e canela em pó Açúcar mascavo', 'doces', 10, '1ccab72349b7dc3b691b8828b4920fe2.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_Cliente`);

--
-- Índices de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`ID_Item`),
  ADD KEY `ID_Pedido` (`ID_Pedido`),
  ADD KEY `ID_Produto` (`ID_Produto`);

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`ID_Item`),
  ADD KEY `ID_Pedido` (`ID_Pedido`),
  ADD KEY `ID_Produto` (`ID_Produto`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`ID_Pagamento`),
  ADD KEY `ID_Pedido` (`ID_Pedido`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_Pedido`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID_Produto`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Índices de tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_clientesconfeitaria`
--
ALTER TABLE `tb_clientesconfeitaria`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `tb_docesconfeitaria`
--
ALTER TABLE `tb_docesconfeitaria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `ID_Item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `ID_Item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `ID_Pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `ID_Produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_docesconfeitaria`
--
ALTER TABLE `tb_docesconfeitaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `item_pedido_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedido` (`ID_Pedido`),
  ADD CONSTRAINT `item_pedido_ibfk_2` FOREIGN KEY (`ID_Produto`) REFERENCES `produto` (`ID_Produto`);

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedido` (`ID_Pedido`),
  ADD CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`ID_Produto`) REFERENCES `tb_docesconfeitaria` (`id`);

--
-- Restrições para tabelas `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedido` (`ID_Pedido`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria` (`ID_Categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
