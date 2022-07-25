-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09-Jul-2021 às 15:49
-- Versão do servidor: 8.0.25
-- versão do PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `deca_20l4_31`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `badge`
--

CREATE TABLE `badge` (
  `idbadge` int NOT NULL,
  `nome_badge` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `badge`
--

INSERT INTO `badge` (`idbadge`, `nome_badge`) VALUES
(2, 'O mais popular'),
(3, 'O mais simpático'),
(4, 'O mais amoroso'),
(6, 'O mais engraçado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `badge_has_utilizador`
--

CREATE TABLE `badge_has_utilizador` (
  `badge_idbadge` int NOT NULL,
  `utilizador_idutilizador` int NOT NULL,
  `data` date NOT NULL,
  `total_reacao` int DEFAULT NULL,
  `atribuido` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES
(1, 'Social'),
(2, 'Académico'),
(3, 'Curiosidades'),
(4, 'DeCA'),
(5, 'Relações'),
(6, 'Cultural');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `idcomentario` int NOT NULL,
  `publicacao_idpublicacao` int NOT NULL,
  `comentario` text NOT NULL,
  `data` date NOT NULL,
  `utilizador_idutilizador` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`idcomentario`, `publicacao_idpublicacao`, `comentario`, `data`, `utilizador_idutilizador`) VALUES
(4, 2, 'Same girl', '2021-07-01', 4),
(6, 4, 'Devias ter ido!', '2021-04-21', 5),
(7, 5, 'É lidar...', '2021-03-10', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idcurso` int NOT NULL,
  `curso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idcurso`, `curso`) VALUES
(1, 'Novas Tecnologias da Comunicação'),
(2, 'Design'),
(3, 'Música'),
(4, 'Administração Pública'),
(5, 'Linguas e Relações Empresariais'),
(6, 'Psicologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `idmembro` int NOT NULL,
  `membro` varchar(45) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `membro`
--

INSERT INTO `membro` (`idmembro`, `membro`) VALUES
(1, 'Aluno'),
(2, 'Ex-aluno'),
(3, 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

CREATE TABLE `publicacao` (
  `idpublicacao` int NOT NULL,
  `texto` text NOT NULL,
  `data` date NOT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `categoria_idcategoria` int NOT NULL,
  `utilizador_idutilizador` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `publicacao`
--

INSERT INTO `publicacao` (`idpublicacao`, `texto`, `data`, `imagem`, `localizacao`, `categoria_idcategoria`, `utilizador_idutilizador`) VALUES
(2, 'Ai, se eu soubesse....\r\nEscolhia melhor os meus colegas de trabalho', '2021-05-12', 'a.jpg', NULL, 3, 4),
(3, 'Ai, se eu soubesse....\nTinha aproveitado mais o 1º ano', '2021-06-01', NULL, NULL, 2, 4),
(4, 'Ai, se eu soubesse.... \nTinha ido todas as quintas-feiras ao BE', '2021-06-01', NULL, NULL, 2, 3),
(5, 'Ai, se eu soubesse....\r\nque os amigos falham tinha sido mais reservada', '2021-06-02', NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `redes_sociais`
--

CREATE TABLE `redes_sociais` (
  `idredes_sociais` int NOT NULL,
  `nome_rede` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `redes_sociais`
--

INSERT INTO `redes_sociais` (`idredes_sociais`, `nome_rede`) VALUES
(1, 'Facebook'),
(2, 'Instagram'),
(3, 'LinkedIn');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE `role` (
  `idrole` int NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`idrole`, `tipo`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `idutilizador` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `ano_entrada` int DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4,
  `curso_idcurso` int DEFAULT NULL,
  `membro_idmembro` int NOT NULL,
  `role_idrole` int NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`idutilizador`, `nome`, `ano_entrada`, `email`, `password_hash`, `curso_idcurso`, `membro_idmembro`, `role_idrole`) VALUES
(1, 'bonkus', 2019, 'bonkus@ua.pt', '$2y$10$eCLnKtsTcde7BQQ7Q.seyO/hHFPgNteZ48qjWQrBf3cKlpQ4ACXRG', 3, 2, 2),
(2, 'CV', 2019, 'CV@ua.pt', '$2y$10$sQAbKPjGbAlMgHeAvlDvKegGc6HLSGS9lhm0eLuSsQ2z1t86e0Jie', 2, 1, 2),
(3, 'Bela adormecida', 2018, 'belaadormecida@ua.pt', '$2y$10$5K2DPoy7esUzSXjOvWL0BOcyFU5oxs0R3hmZGYeUNOzBPFS1UK.SS', 3, 1, 2),
(4, 'Ballie_Queen', 2015, 'ballie_queen@ua.pt', '$2y$10$Cjf7.B3LJCxv7yfEyOKB8.14yEBRcOSWvEBJX2.K0ofmWWrr2G.lS', 4, 2, 2),
(5, 'CoolKid', 2007, 'coolkid@ua.pt', '$2y$10$kUDCKFp.hen0f1iHAWM5b.pPm4sxpjQHbEkCy2L6/wDh8nel1lF/q', 5, 3, 2),
(8, 'lara', 2021, 'lara@ua.pt', '$2y$10$wGAWvufizdlTwLa6G74MU.6HV715yOqelspmz1FH3ncVZch6zS5Ai', 5, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador_has_redes_sociais`
--

CREATE TABLE `utilizador_has_redes_sociais` (
  `utilizador_idutilizador` int NOT NULL,
  `redes_sociais_idredes_sociais` int NOT NULL,
  `link` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador_has_redes_sociais`
--

INSERT INTO `utilizador_has_redes_sociais` (`utilizador_idutilizador`, `redes_sociais_idredes_sociais`, `link`) VALUES
(1, 1, 'http://');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`idbadge`);

--
-- Índices para tabela `badge_has_utilizador`
--
ALTER TABLE `badge_has_utilizador`
  ADD PRIMARY KEY (`badge_idbadge`,`utilizador_idutilizador`),
  ADD KEY `fk_badge_has_utilizador_utilizador1_idx` (`utilizador_idutilizador`),
  ADD KEY `fk_badge_has_utilizador_badge1_idx` (`badge_idbadge`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `fk_comentario_publicacao1_idx` (`publicacao_idpublicacao`),
  ADD KEY `fk_comentario_utilizador1_idx` (`utilizador_idutilizador`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- Índices para tabela `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`idmembro`);

--
-- Índices para tabela `publicacao`
--
ALTER TABLE `publicacao`
  ADD PRIMARY KEY (`idpublicacao`),
  ADD KEY `fk_publicacao_categoria1_idx` (`categoria_idcategoria`),
  ADD KEY `fk_publicacao_utilizador1_idx` (`utilizador_idutilizador`);

--
-- Índices para tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  ADD PRIMARY KEY (`idredes_sociais`);

--
-- Índices para tabela `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idutilizador`),
  ADD KEY `fk_utilizador_curso1_idx` (`curso_idcurso`),
  ADD KEY `fk_utilizador_membro1_idx` (`membro_idmembro`),
  ADD KEY `fk_utilizador_role1_idx` (`role_idrole`);

--
-- Índices para tabela `utilizador_has_redes_sociais`
--
ALTER TABLE `utilizador_has_redes_sociais`
  ADD PRIMARY KEY (`utilizador_idutilizador`,`redes_sociais_idredes_sociais`),
  ADD UNIQUE KEY `link_UNIQUE` (`link`),
  ADD KEY `fk_utilizador_has_redes_sociais_redes_sociais1_idx` (`redes_sociais_idredes_sociais`),
  ADD KEY `fk_utilizador_has_redes_sociais_utilizador1_idx` (`utilizador_idutilizador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `badge`
--
ALTER TABLE `badge`
  MODIFY `idbadge` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcomentario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `membro`
--
ALTER TABLE `membro`
  MODIFY `idmembro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `publicacao`
--
ALTER TABLE `publicacao`
  MODIFY `idpublicacao` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  MODIFY `idredes_sociais` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idutilizador` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `badge_has_utilizador`
--
ALTER TABLE `badge_has_utilizador`
  ADD CONSTRAINT `fk_badge_has_utilizador_badge1` FOREIGN KEY (`badge_idbadge`) REFERENCES `badge` (`idbadge`),
  ADD CONSTRAINT `fk_badge_has_utilizador_utilizador1` FOREIGN KEY (`utilizador_idutilizador`) REFERENCES `utilizador` (`idutilizador`);

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_publicacao1` FOREIGN KEY (`publicacao_idpublicacao`) REFERENCES `publicacao` (`idpublicacao`),
  ADD CONSTRAINT `fk_comentario_publicacao2` FOREIGN KEY (`publicacao_idpublicacao`) REFERENCES `publicacao` (`idpublicacao`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comentario_utilizador1` FOREIGN KEY (`utilizador_idutilizador`) REFERENCES `utilizador` (`idutilizador`);

--
-- Limitadores para a tabela `publicacao`
--
ALTER TABLE `publicacao`
  ADD CONSTRAINT `fk_publicacao_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`),
  ADD CONSTRAINT `fk_publicacao_utilizador1` FOREIGN KEY (`utilizador_idutilizador`) REFERENCES `utilizador` (`idutilizador`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `fk_utilizador_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `fk_utilizador_membro1` FOREIGN KEY (`membro_idmembro`) REFERENCES `membro` (`idmembro`),
  ADD CONSTRAINT `fk_utilizador_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`);

--
-- Limitadores para a tabela `utilizador_has_redes_sociais`
--
ALTER TABLE `utilizador_has_redes_sociais`
  ADD CONSTRAINT `fk_utilizador_has_redes_sociais_redes_sociais1` FOREIGN KEY (`redes_sociais_idredes_sociais`) REFERENCES `redes_sociais` (`idredes_sociais`),
  ADD CONSTRAINT `fk_utilizador_has_redes_sociais_utilizador1` FOREIGN KEY (`utilizador_idutilizador`) REFERENCES `utilizador` (`idutilizador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
