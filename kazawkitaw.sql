-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 août 2022 à 08:14
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kazawkitaw`
--

-- --------------------------------------------------------

--
-- Structure de la table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `img_url`) VALUES
(1, 'wifi', 'wifi'),
(2, 'plage', 'plage'),
(3, 'parking', 'parking'),
(4, 'parking sécurisé', 'parking-securise'),
(5, 'garage', 'garage'),
(6, 'cuisine equipée', 'cuisine-equipee'),
(7, 'climatisation', 'climatisation'),
(8, 'télévision', 'television'),
(9, 'lave-linge', 'lave-linge'),
(10, 'lave-vaisselle', 'lave-vaisselle'),
(11, 'piscine', 'piscine'),
(12, 'piscine partagée', 'piscine'),
(13, 'sèche-cheveux', 'seche-cheveux'),
(14, 'sèche-linge électrique', 'seche-linge-electrique'),
(15, 'étendoir à linge', 'etendoir-a-linge'),
(16, 'douche extérieure', 'douche-exterieure'),
(17, 'eau chaude', 'eau-chaude'),
(18, 'fer à repasser', 'fer-a-repasser'),
(19, 'alarme', 'alarme'),
(20, 'bibliothèque', 'bibliotheque'),
(21, 'détecteur de fumée', 'detecteur-de-fumee'),
(22, 'terrasse', 'terrasse');

-- --------------------------------------------------------

--
-- Structure de la table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image_url-1` varchar(100) NOT NULL,
  `image_url-2` varchar(100) NOT NULL,
  `image_url-3` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `size` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `bed_capacity` int(2) NOT NULL,
  `town` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `properties`
--

INSERT INTO `properties` (`id`, `title`, `price`, `image_url-1`, `image_url-2`, `image_url-3`, `description`, `size`, `rooms`, `bed_capacity`, `town`, `type`, `owner_id`) VALUES
(1, 'Villa avec piscine et jacuzzi', 150, 'villa', 'villa-jacuzzi', 'villa-jacuzzi-cuisine', 'Fusce imperdiet maximus risus, id iaculis leo egestas non. Ut quis augue consequat, fringilla magna eu, ultrices ligula. Fusce sodales nisl tellus. Nam vitae ipsum mi. Quisque tincidunt pretium diam sit amet vehicula. Proin sit amet varius massa. Morbi ut mi pulvinar, hendrerit metus sodales, varius orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean mollis erat ac erat posuere, ac varius justo iaculis. Curabitur in sapien eu diam viverra sagittis. Praesent nec sapien ut sapien gravida luctus at vel justo. Cras feugiat ut felis lobortis hendrerit. Aliquam at dui lobortis, consequat enim vitae, consequat diam. Proin convallis gravida', 200, 4, 4, 25, 6, 1),
(2, 'Appartement T5, centre-ville', 90, 'appartement', 'appartement-t5-vue', 'appartement-t5', 'Cras luctus tristique lectus a fermentum. Fusce porta convallis convallis. Nulla mi mauris, consectetur suscipit magna vitae, convallis pretium erat. Cras luctus turpis sed placerat cursus. Mauris condimentum pulvinar neque sit amet sodales. Nulla vitae augue dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus congue quis quam sed commodo. Morbi eget urna urna. Nulla venenatis tortor sit amet ultrices rutrum. Integer et est orci. Nam mollis, magna non varius scelerisque, sapien tortor consectetur felis, vulputate luctus arcu sapien eu nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu tincidunt ligula. Quisque pulvinar ligula ligula, eget pretium nisi sagittis auctor.', 100, 5, 6, 16, 2, 1),
(3, 'Appartement T3 rénové', 110, 'appartement-residence', 'appartement-residence-1', 'appartement-residence-2', 'Aliquam tincidunt feugiat mauris vitae posuere. Donec condimentum, eros vitae dictum porta, nisi arcu cursus orci, in tincidunt lacus sapien sit amet felis. Etiam tempus mi non posuere euismod. Duis finibus orci non tortor lacinia pellentesque. Vivamus vitae lectus quis ipsum viverra tincidunt in sit amet ligula. Nulla pretium sit amet turpis vehicula varius. Suspendisse at euismod dolor. Proin eget lacinia velit, vel gravida enim. Phasellus luctus, nisl sit amet vulputate faucibus, turpis nisl gravida enim, nec blandit ante turpis id nulla. Suspendisse velit nisl, maximus a vulputate et, sagittis sit amet quam. Aliquam et purus massa. Phasellus nec sem dignissim, egestas dolor ornare, viverra purus.', 65, 3, 3, 14, 3, 2),
(4, 'Maison en bord de plage', 120, 'maison', 'maison-1', 'maison-1-sdb', 'Phasellus lobortis dolor et consequat consequat. Fusce semper tristique turpis at posuere. Integer porttitor tincidunt felis vel auctor. Morbi ullamcorper vel magna aliquam mattis. Donec convallis sollicitudin ullamcorper. Morbi eget porttitor odio, sed blandit ligula. Quisque tristique elementum elit nec semper. Donec odio nisl, efficitur ac dui sit amet, pellentesque porttitor neque. Praesent a ex hendrerit, luctus risus vel, euismod nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer augue ante, commodo sed metus eget, gravida fringilla mauris.', 80, 3, 5, 27, 1, 1),
(5, 'Appartement T4', 130, 'appartement-2', 'appartement-2-int', 'appartement-2-vue', 'Proin dolor libero, luctus at lobortis eu, sodales at quam. Maecenas enim orci, eleifend ultrices consequat id, euismod sit amet orci. In interdum sodales laoreet. Vestibulum tempor lacus a odio feugiat, sed laoreet purus semper. Praesent ex felis, varius ac velit vel, consequat elementum turpis. Sed sit amet metus viverra, pharetra nisl quis, consectetur arcu. ', 90, 4, 3, 2, 2, 1),
(6, 'Maison T5 piscine', 75, 'maison-residence', 'maison-residence-salon', 'maison-residence-salon-2', 'Vivamus bibendum, lacus ac condimentum placerat, quam urna mollis massa, eu porta leo nulla non urna. Morbi ut nisl et erat dictum ultrices. Aliquam id tellus leo. Maecenas metus odio, porttitor id risus in, euismod congue nunc.', 150, 5, 5, 8, 5, 2),
(7, 'Villa T4', 80, 'villa-1', 'villa-1-terrasse', 'villa-1-vue', 'Nulla hendrerit nisi et leo accumsan, eu iaculis eros blandit. Nunc a ex id odio feugiat finibus. Quisque dictum nibh nunc, eget lacinia sapien varius a. Curabitur diam mauris, semper vel risus a, sollicitudin tristique quam. Etiam iaculis ex non risus consectetur aliquet. Integer egestas augue sit amet massa finibus laoreet. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 170, 4, 5, 4, 4, 1),
(8, 'Maison proche plage', 95, 'villa-2', 'villa-2-vue-jacuzzi', 'villa-2-cuisine', 'Vestibulum efficitur massa eget lacinia mattis. In volutpat pharetra fringilla. Cras vitae orci ac metus semper aliquet semper in risus. Morbi leo elit, pulvinar a rutrum sed, vestibulum vitae est. Fusce aliquam tortor quam, quis maximus massa tempor accumsan. Sed et tempus nulla. Mauris ut erat laoreet sem elementum varius.', 86, 4, 4, 23, 1, 1),
(9, 'Villa vue sur mer', 140, 'villa-3', 'villa-3-plage', 'villa-3-plage-2', 'Sed augue nisl, eleifend vitae dignissim vitae, consequat ut ipsum. Vivamus non consequat elit. Suspendisse molestie, eros non rhoncus finibus, libero nunc sagittis ipsum, at porta leo orci vitae elit. In congue, ligula vitae facilisis cursus, lacus sapien posuere turpis, quis consectetur urna magna at lectus.', 200, 5, 7, 15, 4, 2),
(10, 'Villa piscine', 130, 'villa-4', 'villa-6', 'villa-6-int', 'Curabitur ac efficitur neque. Vestibulum sed dignissim eros, vitae consequat tortor. Mauris efficitur, tellus non sagittis vestibulum, urna erat dictum massa, eu ultrices metus tellus non orci. Maecenas ac gravida ligula. Sed in fermentum lacus, eget mattis erat. Aenean vel suscipit est, id consequat libero.', 175, 3, 4, 9, 4, 1),
(11, 'Villa moderne', 130, 'villa-5', 'villa-pampa-piscine', 'villa-pampa-salon', 'Nullam congue ligula vitae massa aliquam luctus. Pellentesque vehicula urna vitae odio congue mollis. Morbi rhoncus sit amet magna id ultrices. Aenean vitae consequat massa. Duis vestibulum dictum nunc, quis egestas eros. Curabitur a orci libero.', 80, 3, 3, 19, 4, 2),
(12, 'Villa chic', 125, 'villa-st-francois', 'villa-st-francois-4', 'villa-st-francois-3', 'In vitae auctor nisl. Sed non metus eros. Pellentesque sed lorem augue. Nunc sollicitudin accumsan tellus, volutpat cursus est tincidunt eget. Phasellus rhoncus augue ac eros tempor porta. Maecenas aliquet sem ut metus varius tincidunt. Etiam quis volutpat urna. Suspendisse dui augue, tempus et feugiat ac, pulvinar ut justo. Nam quis mi commodo, imperdiet ligula commodo, congue nibh. In in facilisis velit, sit amet dapibus urna. ', 250, 5, 7, 25, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `properties_users_ratings`
--

CREATE TABLE `properties_users_ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `rate` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `properties_users_ratings`
--

INSERT INTO `properties_users_ratings` (`id`, `user_id`, `property_id`, `rate`) VALUES
(1, 1, 3, 46),
(2, 1, 5, 75);

-- --------------------------------------------------------

--
-- Structure de la table `property_amenities`
--

CREATE TABLE `property_amenities` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `property_amenities`
--

INSERT INTO `property_amenities` (`id`, `property_id`, `amenity_id`) VALUES
(1, 1, 7),
(2, 1, 1),
(3, 1, 8),
(4, 2, 10),
(5, 2, 4),
(6, 2, 6),
(7, 3, 1),
(8, 3, 8),
(9, 3, 3),
(10, 4, 2),
(11, 4, 5),
(12, 4, 1),
(13, 5, 3),
(14, 5, 8),
(15, 5, 9),
(16, 5, 7),
(17, 5, 2),
(18, 12, 1),
(19, 12, 2),
(20, 12, 5),
(21, 12, 6),
(22, 12, 7),
(23, 12, 8),
(24, 12, 9),
(25, 12, 10),
(26, 6, 7),
(27, 6, 6),
(28, 6, 5),
(29, 6, 8),
(30, 7, 9),
(31, 7, 10),
(32, 7, 5),
(33, 7, 1),
(34, 8, 2),
(35, 8, 1),
(36, 8, 4),
(37, 9, 2),
(38, 9, 1),
(39, 9, 7),
(40, 9, 6),
(41, 10, 5),
(42, 10, 3),
(43, 10, 7),
(44, 10, 1),
(45, 11, 1),
(46, 11, 2),
(47, 11, 5),
(48, 11, 6),
(49, 11, 7),
(50, 11, 8),
(51, 11, 9),
(52, 11, 10);

-- --------------------------------------------------------

--
-- Structure de la table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statuses`
--

INSERT INTO `statuses` (`id`, `title`) VALUES
(1, 'hôte'),
(2, 'voyageur');

-- --------------------------------------------------------

--
-- Structure de la table `towns`
--

CREATE TABLE `towns` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `postalcode` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `towns`
--

INSERT INTO `towns` (`id`, `name`, `postalcode`) VALUES
(1, 'ANSE-BERTRAND', '97121'),
(2, 'BAIE-MAHAULT', '97122'),
(3, 'BAILLIF', '97123'),
(4, 'BASSE-TERRE', '97100'),
(5, 'BOUILLANTE', '97125'),
(6, 'CAPESTERRE-BELLE-EAU', '97130'),
(7, 'CAPESTERRE DE MARIE-GALANTE', '97140'),
(8, 'DESHAIES', '97126'),
(9, 'GOURBEYRE', '97113'),
(10, 'GOYAVE', '97128'),
(11, 'GRAND-BOURG', '97112'),
(12, 'LA DESIRADE', '97127'),
(13, 'LAMENTIN', '97129'),
(14, 'LE GOSIER', '97190'),
(15, 'LE MOULE', '97160'),
(16, 'LES ABYMES', '97142'),
(17, 'LES ABYMES', '97139'),
(18, 'MORNE-A-L\'EAU', '97111'),
(19, 'PETIT-BOURG', '97170'),
(20, 'PETIT-CANAL', '97131'),
(21, 'POINTE-A-PITRE', '97110'),
(22, 'POINTE-NOIRE', '97116'),
(23, 'PORT-LOUIS', '97117'),
(24, 'ST-CLAUDE', '97120'),
(25, 'ST-FRANCOIS', '97118'),
(26, 'ST-LOUIS', '97134'),
(27, 'STE-ANNE', '97180'),
(28, 'STE-ROSE', '97115'),
(29, 'TERRE-DE-BAS', '97136'),
(30, 'TERRE-DE-HAUT', '97137'),
(31, 'TROIS-RIVIERES', '97114'),
(32, 'VIEUX-FORT', '97141'),
(33, 'VIEUX-HABITANTS', '97119');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `title`) VALUES
(1, 'maison'),
(2, 'appartement'),
(3, 'appartement en résidence'),
(4, 'villa'),
(5, 'maison en résidence'),
(6, 'villa en résidence');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `alias`, `phone`, `email`, `password`, `type`) VALUES
(1, 'alex', 'hubert', 'alexhub', '06908974632', 'demo@fakeemail.com', '$2y$10$fPbW61cUV2pX8.R31smpLOD6hEpbZGacYFEpnCDqd2Qv.sL0bJ10G', 1),
(2, 'audrey', 'jane', 'audjo', '0690123456', 'ajane@fakeemail.com', '$2y$10$fPbW61cUV2pX8.R31smpLOD6hEpbZGacYFEpnCDqd2Qv.sL0bJ10G', 1),
(5, 'richard', 'doe', 'lerichy', '0690654321', 'rmalac@fakeemail.com', '$2y$10$fPbW61cUV2pX8.R31smpLOD6hEpbZGacYFEpnCDqd2Qv.sL0bJ10G', 2),
(6, 'alyssa', 'testa', 'sassou971', '0690651234', 'alytest@fakeemail.com', '$2y$10$fPbW61cUV2pX8.R31smpLOD6hEpbZGacYFEpnCDqd2Qv.sL0bJ10G', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `type` (`type`),
  ADD KEY `town` (`town`);

--
-- Index pour la table `properties_users_ratings`
--
ALTER TABLE `properties_users_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Index pour la table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `amenity_id` (`amenity_id`);

--
-- Index pour la table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `properties_users_ratings`
--
ALTER TABLE `properties_users_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `towns`
--
ALTER TABLE `towns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_ibfk_2` FOREIGN KEY (`type`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `properties_ibfk_3` FOREIGN KEY (`town`) REFERENCES `towns` (`id`);

--
-- Contraintes pour la table `properties_users_ratings`
--
ALTER TABLE `properties_users_ratings`
  ADD CONSTRAINT `properties_users_ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `properties_users_ratings_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Contraintes pour la table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD CONSTRAINT `property_amenities_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `property_amenities_ibfk_2` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type`) REFERENCES `statuses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
