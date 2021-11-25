-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2021 at 07:00 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u966196224_syxavissa`
--

-- --------------------------------------------------------

--
-- Table structure for table `armazem`
--

CREATE TABLE `armazem` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `armazem`
--

INSERT INTO `armazem` (`id`, `users_id`, `numero`, `nome`, `local`, `estado`, `created_at`, `updated_at`) VALUES
('da41eeda-b174-4780-9af5-cd230aaec5c4', 'b6b2cad5-5029-47c2-8831-09771181f160', '1200', 'Vilcunis Solution', 'Av. Julius Nyerere, No. 120', 'on', '2021-11-16 10:24:02', '2021-11-16 10:34:19'),
('983b38cf-92e3-467b-8492-5db7f16a1424', '2dbb7326-bded-419e-a82f-9b46955783e7', '12', 'Sucursal II', 'Av. Julius Nyerere, No. 1200', 'on', '2021-11-16 10:21:37', '2021-11-16 10:21:37'),
('6802ad80-444f-4aa6-8d91-c331dd510554', '7555dad3-4f65-4032-b632-ac82d8dd81d7', '02', 'First', 'Maputo', 'on', '2021-11-18 13:33:54', '2021-11-18 13:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `artigo`
--

CREATE TABLE `artigo` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigobarra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategoria_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preco` decimal(20,2) DEFAULT NULL,
  `iva` decimal(20,2) DEFAULT NULL,
  `desconto` decimal(20,2) DEFAULT NULL,
  `garantia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artigo`
--

INSERT INTO `artigo` (`id`, `codigobarra`, `categoria_id`, `subcategoria_id`, `tipo_id`, `nome`, `icon`, `preco`, `iva`, `desconto`, `garantia`, `estado`, `created_at`, `updated_at`) VALUES
('f4a356c2-9fd6-4ecf-aa60-eae9e8c864ab', '120012', '56fee387-0081-46a9-8b51-5bb04bc47aba', '805f6259-2d54-421d-9828-eee4a919ae2e', 'bcd24ff5-7120-483b-a3aa-d929f13edce4', 'HP i7', '20211110130726.jpg', '200.00', '2.00', '2.00', '2', 'on', '2021-11-10 11:07:26', '2021-11-10 11:07:26'),
('d09d7f92-6166-47fd-aeea-4c594b5f5c33', '121200', 'c068c3b2-d11e-4b53-8d13-a71631398c50', '869cf315-5b53-4ba2-b68f-818f0728280e', 'bcd24ff5-7120-483b-a3aa-d929f13edce4', 'Calça Jean', '20211110130259.jpg', '120.00', '2.00', '2.00', '2', 'on', '2021-11-10 11:03:01', '2021-11-10 11:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `aumento`
--

CREATE TABLE `aumento` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artigo_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidade_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transacao_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numerolote` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custo` decimal(20,2) DEFAULT NULL,
  `quantidade` decimal(20,2) DEFAULT NULL,
  `validade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aumento`
--

INSERT INTO `aumento` (`id`, `artigo_id`, `unidade_id`, `transacao_id`, `numerolote`, `custo`, `quantidade`, `validade`, `estado`, `created_at`, `updated_at`) VALUES
('c7e47174-bbc3-463d-9423-dbce46d22194', '60795a35-b6bf-4a3c-b2a4-063f0e4a5cf7', '2248d0d6-c7af-4194-b637-cb4499dc6063', '33148d65-135b-4ad7-a08f-26c1d4af7b47', '005', '120.00', '2.00', '2021-09-09', 'on', '2021-09-10 10:27:13', '2021-09-10 10:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `icon`, `estado`, `created_at`, `updated_at`) VALUES
('56fee387-0081-46a9-8b51-5bb04bc47aba', 'Tecnologia', '20211108104005.jpg', 'on', '2021-11-06 09:17:08', '2021-11-08 08:40:05'),
('c068c3b2-d11e-4b53-8d13-a71631398c50', 'Vestuário', '20211106110804.jpg', 'on', '2021-11-06 09:08:04', '2021-11-06 09:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `composicao`
--

CREATE TABLE `composicao` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artigo_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidade_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantidade` decimal(20,2) DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `composicao`
--

INSERT INTO `composicao` (`id`, `artigo_id`, `unidade_id`, `quantidade`, `estado`, `created_at`, `updated_at`) VALUES
('e4db79e5-69c0-4a66-85dc-09ba9f3507ba', '60795a35-b6bf-4a3c-b2a4-063f0e4a5cf7', '2248d0d6-c7af-4194-b637-cb4499dc6063', '1.00', 'on', '2021-09-09 18:36:52', '2021-09-09 18:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`id`, `users_id`, `nome`, `estado`, `created_at`, `updated_at`) VALUES
('3be11b92-e4b9-43d5-9050-6bee5a7f6f3f', '2dbb7326-bded-419e-a82f-9b46955783e7', 'Av. Agostino Neto, no. 496', 'on', '2021-11-16 10:20:31', '2021-11-16 10:20:31'),
('0775fd9f-7ad0-4014-a619-9fd9087171cb', 'b6b2cad5-5029-47c2-8831-09771181f160', 'Av. Filipe Samuel Magaia, no. 250', 'on', '2021-11-16 10:22:46', '2021-11-16 10:25:13'),
('3f14a809-4d20-40bc-bfe5-28f743f3892d', '7555dad3-4f65-4032-b632-ac82d8dd81d7', 'Maputo', 'on', '2021-11-18 13:33:05', '2021-11-18 13:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historico`
--

CREATE TABLE `historico` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userscli_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagamento_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipotransacao_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datapagamento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caixa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` decimal(20,2) DEFAULT NULL,
  `iva` decimal(20,2) DEFAULT NULL,
  `desconto` decimal(20,2) DEFAULT NULL,
  `valortotal` decimal(20,2) DEFAULT NULL,
  `valorpago` decimal(20,2) DEFAULT NULL,
  `valordevido` decimal(20,2) DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historico`
--

INSERT INTO `historico` (`id`, `users_id`, `userscli_id`, `pagamento_id`, `tipotransacao_id`, `validade`, `datapagamento`, `banco`, `caixa`, `subtotal`, `iva`, `desconto`, `valortotal`, `valorpago`, `valordevido`, `estado`, `created_at`, `updated_at`) VALUES
('ac1ab82d-ed2c-4c5c-98d1-ef8b476c62c8', 'e2dcebd3-75f9-46df-bded-144d2831e324', 'e2dcebd3-75f9-46df-bded-144d2831e324', 'f6cd7c8d-37f6-4fad-afbd-100c407ff923', 'f9b21ec0-95ea-42d3-87aa-fcedee120e4c', '2021-09-09', '2021-09-09', 'on', 'off', '120.00', '17.00', '2.00', '120.00', '120.00', '120.00', 'on', '2021-09-10 11:05:28', '2021-09-10 11:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `historicos`
--

CREATE TABLE `historicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemhistorico`
--

CREATE TABLE `itemhistorico` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `historico_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artigo_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantidade` decimal(20,2) DEFAULT NULL,
  `custo` decimal(20,2) DEFAULT NULL,
  `preco` decimal(20,2) DEFAULT NULL,
  `iva` decimal(20,2) DEFAULT NULL,
  `desconto` decimal(20,2) DEFAULT NULL,
  `subtotal` decimal(20,2) DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemhistorico`
--

INSERT INTO `itemhistorico` (`id`, `historico_id`, `artigo_id`, `quantidade`, `custo`, `preco`, `iva`, `desconto`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES
('b9bbf1d4-dc05-4264-b913-bf46b85be650', 'ac1ab82d-ed2c-4c5c-98d1-ef8b476c62c8', '60795a35-b6bf-4a3c-b2a4-063f0e4a5cf7', '120.00', NULL, '120.00', '17.00', '5.00', '120.00', 'on', '2021-09-10 17:37:44', '2021-09-10 17:37:44'),
('3214efad-08e9-4f66-8d4a-34b12a9ff2d9', 'ac1ab82d-ed2c-4c5c-98d1-ef8b476c62c8', '60795a35-b6bf-4a3c-b2a4-063f0e4a5cf7', '120.00', NULL, '120.00', '17.00', '5.00', '120.00', 'on', '2021-09-10 17:38:01', '2021-09-10 17:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `itemhistoricos`
--

CREATE TABLE `itemhistoricos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemtransacao`
--

CREATE TABLE `itemtransacao` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transacao_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artigo_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantidade` decimal(20,2) DEFAULT NULL,
  `custo` decimal(20,2) DEFAULT NULL,
  `preco` decimal(20,2) DEFAULT NULL,
  `iva` decimal(20,2) DEFAULT NULL,
  `desconto` decimal(20,2) DEFAULT NULL,
  `subtotal` decimal(20,2) DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemtransacao`
--

INSERT INTO `itemtransacao` (`id`, `transacao_id`, `artigo_id`, `quantidade`, `custo`, `preco`, `iva`, `desconto`, `subtotal`, `estado`, `created_at`, `updated_at`) VALUES
('e71a7c9a-1119-4495-aaa4-2088ce9c2ad0', '33148d65-135b-4ad7-a08f-26c1d4af7b47', '60795a35-b6bf-4a3c-b2a4-063f0e4a5cf7', '2.00', '120.00', '120.00', '17.00', '2.00', '120.00', 'on', '2021-09-10 08:33:59', '2021-09-10 08:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 17),
(26, '2014_10_12_100000_create_password_resets_table', 17),
(27, '2019_08_19_000000_create_failed_jobs_table', 17),
(28, '2021_09_08_103728_create_nivels_table', 17),
(29, '2021_09_08_104524_create_operadoras_table', 17),
(59, '2021_09_08_104857_create_perfils_table', 25),
(57, '2021_09_08_105330_create_telefones_table', 24),
(56, '2021_09_08_110557_create_enderecos_table', 23),
(55, '2021_09_08_110808_create_armazems_table', 22),
(48, '2021_09_08_111058_create_tipos_table', 18),
(35, '2021_09_08_111241_create_unidades_table', 17),
(36, '2021_09_08_111342_create_categorias_table', 17),
(37, '2021_09_08_111503_create_subcategorias_table', 17),
(38, '2021_09_08_111741_create_artigos_table', 17),
(39, '2021_09_08_112405_create_composicaos_table', 17),
(40, '2021_09_08_112938_create_stocks_table', 17),
(41, '2021_09_08_113539_create_pagamentos_table', 17),
(22, '2021_09_08_120922_create_historicos_table', 16),
(42, '2021_09_08_114311_create_tipotransacaos_table', 17),
(43, '2021_09_08_114451_create_transacaos_table', 17),
(49, '2021_09_08_115454_create_aumentos_table', 19),
(45, '2021_09_08_120404_create_itemtransacaos_table', 17),
(52, '2021_09_08_121228_create_itemhistoricos_table', 20),
(47, '2021_09_08_121333_create_historicos_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE `nivel` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nivel`
--

INSERT INTO `nivel` (`id`, `nome`, `created_at`, `updated_at`) VALUES
('7f001903-8ae4-42c9-ac33-a15e84c5eb68', 'admin', '2021-09-08 11:28:14', '2021-09-08 11:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `operadora`
--

CREATE TABLE `operadora` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operadora`
--

INSERT INTO `operadora` (`id`, `nome`, `created_at`, `updated_at`) VALUES
('c7e2d4d0-b26e-4005-905e-65ac926da4c5', 'vodacom', '2021-09-08 13:51:25', '2021-09-08 13:51:25'),
('190803e2-615d-412f-9e30-4f1be475ce93', 'Mcel', '2021-09-08 13:51:40', '2021-09-08 13:51:40'),
('0df11dc5-3f5c-4b3a-a21f-c21f6b8ceb1f', 'Movitel', '2021-09-08 13:51:48', '2021-09-08 13:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `pagamento`
--

CREATE TABLE `pagamento` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagamento`
--

INSERT INTO `pagamento` (`id`, `nome`, `estado`, `created_at`, `updated_at`) VALUES
('f6cd7c8d-37f6-4fad-afbd-100c407ff923', 'cartão', 'on', '2021-09-10 06:02:49', '2021-09-10 06:02:49'),
('d694ff99-5936-42ac-ae7f-79196cea538d', 'Cash', 'on', '2021-09-10 05:53:09', '2021-09-10 05:59:15'),
('ebeaa1a2-68b3-46ab-943f-f512d514da28', 'M-pesa', 'on', '2021-09-10 05:53:36', '2021-09-10 05:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuit` int(11) DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`id`, `users_id`, `nuit`, `nome`, `icon`, `estado`, `created_at`, `updated_at`) VALUES
('72c1dcdd-867a-4ba4-abbf-63220a122fe7', '2dbb7326-bded-419e-a82f-9b46955783e7', 121, 'Sucursal I', '20211118145325.jpg', 'on', '2021-11-16 10:17:40', '2021-11-18 14:53:25'),
('38915642-3864-4aef-b41c-c6451289a8e7', 'b6b2cad5-5029-47c2-8831-09771181f160', 123456789, 'First Education, Lda', '20211116122502.jpg', 'on', '2021-11-16 10:22:38', '2021-11-16 10:25:02'),
('91002048-9c17-42b4-be4a-4dd1063a1768', '7555dad3-4f65-4032-b632-ac82d8dd81d7', 400583748, 'First Education', '20211118133237.jpg', 'on', '2021-11-16 15:55:13', '2021-11-18 13:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artigo_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidade_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `armazem_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custo` decimal(20,2) DEFAULT NULL,
  `quantidade` decimal(20,2) DEFAULT NULL,
  `stockminimo` decimal(20,2) DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `users_id`, `artigo_id`, `unidade_id`, `armazem_id`, `custo`, `quantidade`, `stockminimo`, `estado`, `created_at`, `updated_at`) VALUES
('ff64b851-289a-4206-a61e-10ac40ae4834', '2dbb7326-bded-419e-a82f-9b46955783e7', 'f4a356c2-9fd6-4ecf-aa60-eae9e8c864ab', '2248d0d6-c7af-4194-b637-cb4499dc6063', 'c8571696-3612-44bd-ba57-8e1d3c821df0', NULL, '100.00', '5.00', NULL, '2021-11-10 11:07:26', '2021-11-10 11:07:26'),
('13f2db2b-8e7f-4bb9-9196-d7f8170a581d', '2dbb7326-bded-419e-a82f-9b46955783e7', 'd09d7f92-6166-47fd-aeea-4c594b5f5c33', '2248d0d6-c7af-4194-b637-cb4499dc6063', '23984925-f1bf-4943-bb9c-e6f8871177d0', NULL, '100.00', '10.00', NULL, '2021-11-10 11:03:01', '2021-11-10 11:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `categoria_id`, `nome`, `icon`, `estado`, `created_at`, `updated_at`) VALUES
('869cf315-5b53-4ba2-b68f-818f0728280e', 'c068c3b2-d11e-4b53-8d13-a71631398c50', 'Calça', '20211106114016.jpg', 'on', '2021-11-06 09:40:16', '2021-11-06 09:40:26'),
('805f6259-2d54-421d-9828-eee4a919ae2e', '56fee387-0081-46a9-8b51-5bb04bc47aba', 'Computador', '20211106113618.jpg', 'on', '2021-11-06 09:29:22', '2021-11-06 09:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `telefone`
--

CREATE TABLE `telefone` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operadora_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telefone`
--

INSERT INTO `telefone` (`id`, `users_id`, `operadora_id`, `numero`, `estado`, `created_at`, `updated_at`) VALUES
('f1c1c4ac-b396-426b-a540-2d7b6371d2c3', '2dbb7326-bded-419e-a82f-9b46955783e7', 'c7e2d4d0-b26e-4005-905e-65ac926da4c5', '85 000 0000', 'on', '2021-11-16 10:20:50', '2021-11-16 10:20:50'),
('305a2f5e-986e-4e12-ad7d-6677283d17e8', 'b6b2cad5-5029-47c2-8831-09771181f160', '305a2f5e-986e-4e12-ad7d-6677283d17e8', '82 000 0000', 'on', '2021-11-16 10:22:57', '2021-11-16 10:25:27'),
('b88b6eee-90cf-4bb1-b7ad-fd1150c3554e', '7555dad3-4f65-4032-b632-ac82d8dd81d7', 'c7e2d4d0-b26e-4005-905e-65ac926da4c5', '+258847959406', 'on', '2021-11-18 13:33:26', '2021-11-18 13:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`id`, `nome`, `estado`, `created_at`, `updated_at`) VALUES
('e5864374-61a5-4679-9628-a7f9ed9b4eef', 'matéria-prima', 'on', '2021-09-09 15:36:48', '2021-09-09 15:36:48'),
('48f1afb7-d1de-4bbe-af66-7d2817c2bcb2', 'serviço', 'on', '2021-09-09 15:37:27', '2021-09-09 15:37:27'),
('bcd24ff5-7120-483b-a3aa-d929f13edce4', 'produto', 'on', '2021-09-09 15:37:35', '2021-09-09 15:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `tipos`
--

CREATE TABLE `tipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipotransacao`
--

CREATE TABLE `tipotransacao` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipotransacao`
--

INSERT INTO `tipotransacao` (`id`, `nome`, `estado`, `created_at`, `updated_at`) VALUES
('f9b21ec0-95ea-42d3-87aa-fcedee120e4c', 'normal', 'on', '2021-09-10 06:10:55', '2021-09-10 06:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `transacao`
--

CREATE TABLE `transacao` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userscli_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagamento_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipotransacao_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datapagamento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caixa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` decimal(20,2) DEFAULT NULL,
  `iva` decimal(20,2) DEFAULT NULL,
  `desconto` decimal(20,2) DEFAULT NULL,
  `valortotal` decimal(20,2) DEFAULT NULL,
  `valorpago` decimal(20,2) DEFAULT NULL,
  `valordevido` decimal(20,2) DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transacao`
--

INSERT INTO `transacao` (`id`, `users_id`, `userscli_id`, `pagamento_id`, `tipotransacao_id`, `validade`, `datapagamento`, `banco`, `caixa`, `subtotal`, `iva`, `desconto`, `valortotal`, `valorpago`, `valordevido`, `estado`, `created_at`, `updated_at`) VALUES
('33148d65-135b-4ad7-a08f-26c1d4af7b47', 'e2dcebd3-75f9-46df-bded-144d2831e324', 'e2dcebd3-75f9-46df-bded-144d2831e324', 'f6cd7c8d-37f6-4fad-afbd-100c407ff923', 'f9b21ec0-95ea-42d3-87aa-fcedee120e4c', '2021-09-09', '2021-09-09', 'on', 'off', '120.00', '17.00', '2.00', '200.00', '200.00', '200.00', 'on', '2021-09-10 07:29:08', '2021-09-10 07:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `unidade`
--

CREATE TABLE `unidade` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unidade`
--

INSERT INTO `unidade` (`id`, `nome`, `estado`, `created_at`, `updated_at`) VALUES
('91e6b2f0-41bb-4e04-b693-b91bbefd0033', 'LT', 'on', '2021-09-09 15:46:02', '2021-09-09 15:46:02'),
('2248d0d6-c7af-4194-b637-cb4499dc6063', 'Kg', 'on', '2021-09-09 16:04:27', '2021-09-09 16:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `icon`) VALUES
('b6b2cad5-5029-47c2-8831-09771181f160', 'Joaquim Cossa', 'joaquim@gmail.com', NULL, '$2y$10$D.eI8Of/JYzyIqXVWeVYyOuY1JT8/ffLj2S110k85vNzHuGAjfHja', NULL, '2021-11-16 07:35:27', '2021-11-16 07:35:27', NULL),
('2dbb7326-bded-419e-a82f-9b46955783e7', 'Edmétrio Cossa', 'edmetrio06@gmail.com', NULL, '$2y$10$QgqLelgH11wCz7k3ExFhhOBhxBbO.J.m8X/WLe9fMu9OHHvpsK4By', 'VXB1fMbdeQOvvg7mHr67sf0PjvLTHXwnN3Zf7l26G42TZimUDgfryRx5jd7B', '2021-11-09 06:24:27', '2021-11-18 14:53:25', '20211118145325.jpg'),
('7555dad3-4f65-4032-b632-ac82d8dd81d7', 'Sam', 'samgraffits@gmail.com', NULL, '$2y$10$e32BlapKDyBlE9G3Of/n.exV88vEAtN/Y2GP/nADeQHMK6hyPxTSW', 'VbnHtHOC9WUb9nZ5hQ2xv9F1zwFOQDH9leLsFeXJtvLOp2GPlsqZt4NL1wiF', '2021-11-16 15:13:32', '2021-11-18 13:32:37', '20211118133237.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armazem`
--
ALTER TABLE `armazem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `armazem_users_id_foreign` (`users_id`);

--
-- Indexes for table `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artigo_nome_unique` (`nome`),
  ADD KEY `artigo_categoria_id_foreign` (`categoria_id`),
  ADD KEY `artigo_subcategoria_id_foreign` (`subcategoria_id`),
  ADD KEY `artigo_tipo_id_foreign` (`tipo_id`);

--
-- Indexes for table `aumento`
--
ALTER TABLE `aumento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aumento_artigo_id_foreign` (`artigo_id`),
  ADD KEY `aumento_unidade_id_foreign` (`unidade_id`),
  ADD KEY `aumento_transacao_id_foreign` (`transacao_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria_nome_unique` (`nome`);

--
-- Indexes for table `composicao`
--
ALTER TABLE `composicao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `composicao_artigo_id_foreign` (`artigo_id`),
  ADD KEY `composicao_unidade_id_foreign` (`unidade_id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `endereco_users_id_foreign` (`users_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historico_users_id_foreign` (`users_id`),
  ADD KEY `historico_pagamento_id_foreign` (`pagamento_id`),
  ADD KEY `historico_tipotransacao_id_foreign` (`tipotransacao_id`);

--
-- Indexes for table `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemhistorico`
--
ALTER TABLE `itemhistorico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemhistorico_historico_id_foreign` (`historico_id`),
  ADD KEY `itemhistorico_artigo_id_foreign` (`artigo_id`);

--
-- Indexes for table `itemhistoricos`
--
ALTER TABLE `itemhistoricos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemtransacao`
--
ALTER TABLE `itemtransacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemtransacao_transacao_id_foreign` (`transacao_id`),
  ADD KEY `itemtransacao_artigo_id_foreign` (`artigo_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nivel_nome_unique` (`nome`);

--
-- Indexes for table `operadora`
--
ALTER TABLE `operadora`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `operadora_nome_unique` (`nome`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_users_id_foreign` (`users_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_users_id_foreign` (`users_id`),
  ADD KEY `stock_artigo_id_foreign` (`artigo_id`),
  ADD KEY `stock_unidade_id_foreign` (`unidade_id`),
  ADD KEY `stock_armazem_id_foreign` (`armazem_id`);

--
-- Indexes for table `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategoria_categoria_id_foreign` (`categoria_id`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `telefone_users_id_foreign` (`users_id`),
  ADD KEY `telefone_operadora_id_foreign` (`operadora_id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipotransacao`
--
ALTER TABLE `tipotransacao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipotransacao_nome_unique` (`nome`);

--
-- Indexes for table `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transacao_users_id_foreign` (`users_id`),
  ADD KEY `transacao_pagamento_id_foreign` (`pagamento_id`),
  ADD KEY `transacao_tipotransacao_id_foreign` (`tipotransacao_id`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historicos`
--
ALTER TABLE `historicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemhistoricos`
--
ALTER TABLE `itemhistoricos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
