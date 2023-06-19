-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 juin 2023 à 10:14
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mentorini`
--

-- --------------------------------------------------------

--
-- Structure de la table `availability`
--

CREATE TABLE `availability` (
  `availability_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `availability_days` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `availability`
--

INSERT INTO `availability` (`availability_id`, `mentor_id`, `availability_days`, `start_time`, `end_time`) VALUES
(4, 13, 'Wednesday', '19:53:00', '19:54:00'),
(8, 13, 'Wednesday', '19:53:00', '19:54:00');

-- --------------------------------------------------------

--
-- Structure de la table `credentials`
--

CREATE TABLE `credentials` (
  `credential_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `credentials`
--

INSERT INTO `credentials` (`credential_id`, `mentor_id`, `title`, `description`, `start_date`, `end_date`, `file_path`, `link`) VALUES
(7, 13, 'Pariatur Sunt rerum', 'Facilis tempor solut', '1975-10-11', '1980-06-22', 'credentials_uploads/1687104619371.jpg', 'Quia inventore quod '),
(8, 13, 'Quisquam ut fuga Es', 'Omnis reiciendis dol', '1992-03-05', '1971-02-23', 'credentials_uploads/1687158215770.jpg', 'Consequuntur sit sin');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `experience_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `start_year` date NOT NULL,
  `end_year` date NOT NULL,
  `link` varchar(200) NOT NULL,
  `file_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`experience_id`, `mentor_id`, `title`, `description`, `start_year`, `end_year`, `link`, `file_path`) VALUES
(8, 13, '21 Old Drive', 'Repudiandae harum al', '2020-03-19', '2006-08-19', '221 Fabien Parkway', 'experiences_uploads/1687157854666.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `mentee`
--

CREATE TABLE `mentee` (
  `mentee_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(200) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mentor`
--

CREATE TABLE `mentor` (
  `mentor_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(200) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `introduction` varchar(1000) DEFAULT NULL,
  `about_me` varchar(1000) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `how_it_works` varchar(1000) DEFAULT NULL,
  `why_choose_me` varchar(1000) DEFAULT NULL,
  `what_you_will_learn` varchar(1000) DEFAULT NULL,
  `session_image_path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mentor`
--

INSERT INTO `mentor` (`mentor_id`, `first_name`, `last_name`, `email`, `created_at`, `image_path`, `password`, `title`, `introduction`, `about_me`, `position`, `how_it_works`, `why_choose_me`, `what_you_will_learn`, `session_image_path`) VALUES
(13, 'hussein', 'Acton', 'husseinbouik5@gmail.com', '2023-06-18 14:21:30', 'profil_pic_mentor/profile_image16870980903860.jpg', '$2y$10$ZHKczkc.PmByu/AaTpQ7mOAgQIJokMqc4g1BitVsbekWBFoKMpE9O', 'hussein', 'Provident amet con', 'Dolorem voluptate ex', 'Enim enim ad laudant', 'Dolor eligendi nulla', 'Illo qui saepe rerum', 'Pariatur Doloremque', 'session_images/session_image16871557862268.jpg'),
(16, 'Paloma', 'Alisa', 'miwok@mailinator.com', '2023-06-19 07:11:20', 'profil_pic_mentor/profile_image16871586796920.png', '$2y$10$hbsI4Fhdd2M5FQtjaX3jN.5bcZaCGgXO58THlBrrI3wtweBhKlr.e', '59 Second Road', 'Ratione quo illum n', 'Aut aut in minima ni', 'Ratione sed ea sit ', 'Nihil dolore qui por', 'Excepturi autem dign', 'Fuga Enim aliquam c', 'session_images/session_image16871587125835.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `session_date` date NOT NULL,
  `mentee_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `mentor_id` (`mentor_id`);

--
-- Index pour la table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`credential_id`),
  ADD KEY `mentor_id` (`mentor_id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `mentor_id` (`mentor_id`);

--
-- Index pour la table `mentee`
--
ALTER TABLE `mentee`
  ADD PRIMARY KEY (`mentee_id`);

--
-- Index pour la table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`mentor_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `mentee_id` (`mentee_id`),
  ADD KEY `mentor_id` (`mentor_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `availability`
--
ALTER TABLE `availability`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `credential_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `mentee`
--
ALTER TABLE `mentee`
  MODIFY `mentee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `mentor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`);

--
-- Contraintes pour la table `credentials`
--
ALTER TABLE `credentials`
  ADD CONSTRAINT `credentials_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`);

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`);

--
-- Contraintes pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`),
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
