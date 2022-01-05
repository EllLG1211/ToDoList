-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 05 jan. 2022 à 11:02
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `progweb_proj_todo_list`
--

-- --------------------------------------------------------

--
-- Structure de la table `tasklists`
--

CREATE TABLE `tasklists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `visibility` tinyint(4) NOT NULL COMMENT '0 = public, 1 = private',
  `creator` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tasklists`
--

INSERT INTO `tasklists` (`id`, `name`, `visibility`, `creator`) VALUES
(31, 'Daily tasks', 1, 'user_example'),
(32, 'À amener au bivouac', 0, 'user_example'),
(33, 'Another list', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `list` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `label`, `completed`, `list`) VALUES
(18, 'Read a chapter', 1, 31),
(19, 'Shower', 0, 31),
(20, 'Read emails', 0, 31),
(21, 'Sac de couchage', 0, 32),
(22, 'Matelas/Tapis de sol', 0, 32),
(23, 'Gourde d\'eau (remplie!!)', 1, 32),
(24, 'A task', 0, 33),
(25, 'Another task', 0, 33),
(26, 'And something else because why not', 1, 33),
(27, 'azery', 0, 32);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`name`, `password`) VALUES
('useLS phoenix', 'Jem\'appelleuseLSph.!'),
('user_example', 'example');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tasklists`
--
ALTER TABLE `tasklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasklist_creator` (`creator`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_task_list` (`list`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tasklists`
--
ALTER TABLE `tasklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tasklists`
--
ALTER TABLE `tasklists`
  ADD CONSTRAINT `fk_tasklist_creator` FOREIGN KEY (`creator`) REFERENCES `users` (`name`);

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_task_list` FOREIGN KEY (`list`) REFERENCES `tasklists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
