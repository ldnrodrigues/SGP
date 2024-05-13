-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/05/2024 às 19:21
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
-- Banco de dados: `sgp_database`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Alimentação'),
(2, 'Transporte'),
(3, 'Moradia'),
(4, 'Saúde'),
(5, 'Educação'),
(6, 'Lazer'),
(7, 'Vestuário'),
(8, 'Serviços'),
(9, 'Impostos e Taxas'),
(10, 'Investimentos'),
(11, 'Presentes e Doações'),
(12, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_a_pagar`
--

CREATE TABLE `contas_a_pagar` (
  `id` int(11) UNSIGNED NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_vencimento` date NOT NULL,
  `parcelas_faltantes` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contas_a_pagar`
--

INSERT INTO `contas_a_pagar` (`id`, `categoria_id`, `valor`, `data_vencimento`, `parcelas_faltantes`) VALUES
(16, 2, 600.00, '0000-00-00', 0),
(17, 1, 300.00, '0000-00-00', 0),
(19, 3, 200.00, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesas_semanais`
--

CREATE TABLE `despesas_semanais` (
  `id` int(11) UNSIGNED NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `despesas_semanais`
--

INSERT INTO `despesas_semanais` (`id`, `categoria_id`, `valor`, `data`) VALUES
(27, 6, 58.00, '2024-05-10'),
(28, 12, 79.00, '2024-05-09'),
(29, 12, 35.00, '2024-05-09'),
(30, 7, 200.00, '2024-05-10');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contas_a_pagar`
--
ALTER TABLE `contas_a_pagar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices de tabela `despesas_semanais`
--
ALTER TABLE `despesas_semanais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `contas_a_pagar`
--
ALTER TABLE `contas_a_pagar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `despesas_semanais`
--
ALTER TABLE `despesas_semanais`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `despesas_semanais`
--
ALTER TABLE `despesas_semanais`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
