-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Hôte : 127.0.0.1

-- Généré le : mar. 09 mai 2023 à 23:21

-- Version du serveur : 10.4.27-MariaDB

-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--a

-- Base de données : `prototype-fil-rouge`

--

-- --------------------------------------------------------

--

-- Structure de la table `project`

--

CREATE TABLE
    `project` (
        `Id_Project` int(11) NOT NULL,
        `name` varchar(50) NOT NULL,
        `description` varchar(500) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Déchargement des données de la table `project`

--

INSERT INTO
    `project` (
        `Id_Project`,
        `name`,
        `description`
    )
VALUES (
        1,
        'E-commerce website',
        ' Build an online store where users can browse products, add them to their cart, and checkout securely. The website should also have a dashboard for the store owner to manage orders, products, and customers.'
    ), (
        2,
        'Weather app',
        'Develop a weather application that displays current weather conditions, forecasts, and alerts for a selected location. The app should allow users to save their favorite locations and receive notifications for severe weather events.'
    ), (
        3,
        'Fitness tracker',
        'Create a fitness tracking application that allows users to log workouts, track their progress, and set goals. The app should have a user-friendly interface and be able to sync with wearable devices like smartwatches.'
    ), (
        4,
        'Recipe sharing platform',
        'Build a social media platform where users can share their favorite recipes, follow other users, and save recipes to their personal collections. The platform should have features like ratings and comments to help users discover new recipes and connect with other food enthusiasts.'
    );

-- --------------------------------------------------------

--

-- Structure de la table `task`

--

CREATE TABLE
    `task` (
        `Id_Task` int(11) NOT NULL,
        `name` varchar(50) NOT NULL,
        `description` varchar(500) DEFAULT NULL,
        `Id_Project` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Index pour les tables déchargées

--

--

-- Index pour la table `project`

--

ALTER TABLE `project` ADD PRIMARY KEY (`Id_Project`);

--

-- Index pour la table `task`

--

ALTER TABLE `task`
ADD PRIMARY KEY (`Id_Task`),
ADD
    KEY `Id_Project` (`Id_Project`);

--

-- AUTO_INCREMENT pour les tables déchargées

--

--

-- AUTO_INCREMENT pour la table `project`

--

ALTER TABLE
    `project` MODIFY `Id_Project` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--

-- AUTO_INCREMENT pour la table `task`

--

ALTER TABLE
    `task` MODIFY `Id_Task` int(11) NOT NULL AUTO_INCREMENT;

--

-- Contraintes pour les tables déchargées

--

--

-- Contraintes pour la table `task`

--

ALTER TABLE `task`
ADD
    CONSTRAINT `task_ibfk_1` FOREIGN KEY (`Id_Project`) REFERENCES `project` (`Id_Project`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;