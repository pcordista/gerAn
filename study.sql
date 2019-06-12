-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2019 às 04:48
-- Versão do servidor: 10.1.39-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `study`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `preco` varchar(15) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `emailcontato` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `imagemcapa` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `titulo`, `descricao`, `preco`, `telefone`, `cidade`, `id_user`, `emailcontato`, `categoria`, `imagemcapa`) VALUES
(21, 'Fiorino Fiat', 'Vendo fiorino 2012 branca\r\n- muito bem conservada\r\n- suspensão em ótimo estado\r\n- bateria praticamente nova\r\n- pintura sem detalhes\r\n- motor silencioso\r\n- placa MERCOSUL \r\n- 2019 inteiro pago\r\n- possui manual do proprietário\r\n- flex\r\n\r\n* esse valor somente à vista não abaixo nenhum centavo, já está barato, 5 mil abaixo da fipe.\r\n\r\nTroco por moto ou carro SOMENTE menor valor.\r\nNa troca considerar r$ 24.500,00', '36920', '43984024886', 'londrina', 5, 'p@gmail.com', '2', '07-06-19--19-06-36-1162_1 - Copia.png'),
(22, 'Criação de Logos', 'Logo log', 'asdasdasd', 'asdasd', 'londrina', 5, 'p@gmail.com', '3', '07-06-19--19-06-07-a.png'),
(23, 'Android no Espaço', 'asdasdasd', '123123', '99929-8658', 'Londrina', 5, 'p@gmail.com', '8', '11-06-19--15-06-21-article-1341438-0C9355E8000005DC-887_634x356.jpg'),
(24, 'Camera Digital', 'asdasdasd', '4999,99', '99929-8658', 'Cambé', 5, 'p@gmail.com', '1', '11-06-19--19-06-00-img-1.jpg'),
(25, 'Notebook Mac Air', 'adsdasdasd', '123123', '99929-8658', 'Cambé', 5, 'p@gmail.com', '8', '11-06-19--19-06-32-img-2.jpg'),
(26, 'Casa no Lago', 'Uma fodendo casa do Lago', '213123', '43984', 'Ibiporã', 5, 'p@gmail.com', '1', '12-06-19--02-06-47-Penguins.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'Imóveis'),
(2, 'Veículos e Peças'),
(3, 'Serviços'),
(5, 'Para sua casa'),
(6, 'Eletrônicos'),
(7, 'Celulares'),
(8, 'Informática'),
(9, 'Música e Hobbies'),
(10, 'Esporte e Lazer'),
(11, 'Infantil'),
(12, 'Animais'),
(13, 'Moda e Beleza'),
(14, 'Agro e Indústria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagensanuncios`
--

CREATE TABLE `imagensanuncios` (
  `id` int(11) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `id_post` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagensanuncios`
--

INSERT INTO `imagensanuncios` (`id`, `arquivo`, `id_post`) VALUES
(46, '07-06-19--19-06-36-01.png', 21),
(47, '07-06-19--19-06-36-1162_1.png', 21),
(48, '07-06-19--19-06-36-a - Copia.png', 21),
(49, '07-06-19--19-06-07-1162_1.png', 22),
(50, '07-06-19--19-06-07-a - Copia.png', 22),
(51, '07-06-19--19-06-07-business_moto.png', 22),
(52, '11-06-19--15-06-21-apple.jpeg', 23),
(53, '11-06-19--15-06-21-ironworks.jpeg', 23),
(54, '11-06-19--15-06-21-WhatsApp Image 2019-05-04 at 05.54.25.jpeg', 23),
(55, '11-06-19--15-06-21-WhatsApp Image 2019-05-30 at 11.55.23.jpeg', 23),
(56, '11-06-19--15-06-21-WhatsApp Image 2019-06-06 at 08.30.53 (1).jpeg', 23),
(57, '11-06-19--19-06-00-img-2.jpg', 24),
(58, '11-06-19--19-06-32-img-1.jpg', 25),
(59, '12-06-19--02-06-47-Jellyfish.jpg', 26),
(60, '12-06-19--02-06-47-Koala.jpg', 26),
(61, '12-06-19--02-06-47-Lighthouse.jpg', 26),
(62, '12-06-19--02-06-47-Hydrangeas.jpg', 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cidade`, `senha`, `uf`) VALUES
(1, 'Pedro Cordista', 'peehcordista@gmail.com', 'Londrina', 'senha', 'pr'),
(3, 'Eduardo', 'pcordista368@gmail.com', 'Londrina', 'senha', 'pr'),
(4, 'Jhonatan', 'contato@transportesporapp.com.br', 'Londrina', 'senha', 'pr'),
(5, 'Pedro', 'p@gmail.com', 'Londrina', 'd32129481a7f1fc4cb052f698e8792ca96477fc1', 'pr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagensanuncios`
--
ALTER TABLE `imagensanuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `imagensanuncios`
--
ALTER TABLE `imagensanuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
