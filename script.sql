-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 oct. 2023 à 10:07
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_gite`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
                        `id` int(11) NOT NULL,
                        `nom_fichier` varchar(255) NOT NULL,
                        `description` text DEFAULT NULL,
                        `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `nom_fichier`, `description`, `date_creation`) VALUES
                                                                             (5, 'img/figuies-5.jpg', ' ', '2023-10-18 12:50:25'),
                                                                             (6, 'img/figuies-6.jpg', ' ', '2023-10-18 12:50:25'),
                                                                             (7, 'img/figuies-7.jpg', ' ', '2023-10-18 12:50:25'),
                                                                             (8, 'img/figuies-8.jpg', ' ', '2023-10-18 12:50:25'),
                                                                             (9, 'img/figuies-9.jpg', ' ', '2023-10-18 12:50:25'),
                                                                             (10, 'img/figuies-10.jpg', ' ', '2023-10-18 12:50:25'),
                                                                             (11, 'img/figuies-11.jpg', ' ', '2023-10-18 12:50:25'),
                                                                             (12, 'img/figuies-12.jpg', ' ', '2023-10-18 12:50:25'),
                                                                             (14, 'img/figuies-3.jpg', ' ', '2023-10-18 13:34:29'),
                                                                             (15, 'img/figuies-4.jpg', ' ', '2023-10-18 13:34:29');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
                      `login` varchar(255) NOT NULL,
                      `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`login`, `passwd`) VALUES
                                         ('admin', 'admin'),
                                         ('axl', '123'),
                                         ('kiki', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
