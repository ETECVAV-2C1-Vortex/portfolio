-- phpMyAdmin SQL Dump
-- Banco de dados: farmacia_db

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- Criação do banco
CREATE DATABASE IF NOT EXISTS `farmacia_db`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE `farmacia_db`;

-- Estrutura da tabela `produtos`
CREATE TABLE `produtos` (
  `id`         INT(11)       NOT NULL,
  `nome`       VARCHAR(150)  NOT NULL,
  `fabricante` VARCHAR(150)  NOT NULL,
  `preco`      DECIMAL(10,2) NOT NULL,
  `estoque`    INT(11)       NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Índices
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

-- Auto increment
ALTER TABLE `produtos`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;

COMMIT;