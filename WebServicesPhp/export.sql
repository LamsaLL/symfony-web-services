-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 20 fév. 2022 à 18:36
-- Version du serveur :  8.0.27-0ubuntu0.21.04.1
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mi5`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `text`, `image`) VALUES
(1, 'Fruits', 'De la passion ou de ton imagination', 'images/fruits.jpg'),
(2, 'Junk Food', 'Chère et cancérogène, tu es prévenu(e)', 'images/junk_food.jpg'),
(3, 'Légumes', 'Plus tu en manges, moins tu en es un', 'images/legumes.jpg\r\n            ');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `user_id`, `date`, `status`) VALUES
(8, 1, '2022-02-19 18:37:53', 'En cours'),
(9, 1, '2022-02-19 18:39:30', 'En cours'),
(10, 1, '2022-02-19 18:44:17', 'En cours'),
(11, 1, '2022-02-20 17:51:39', 'En cours'),
(12, 1, '2022-02-20 18:02:14', 'En cours'),
(13, 2, '2022-02-20 18:28:26', 'En cours'),
(14, 2, '2022-02-20 18:29:20', 'En cours'),
(15, 1, '2022-02-20 18:32:25', 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `order_row`
--

CREATE TABLE `order_row` (
  `product_id` int NOT NULL,
  `order_item_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_row`
--

INSERT INTO `order_row` (`product_id`, `order_item_id`, `quantity`, `price`) VALUES
(1, 11, 1, 3.42),
(2, 8, 1, 2.11),
(3, 10, 2, 5.68),
(5, 11, 1, 1.7),
(7, 9, 3, 13.5),
(7, 14, 3, 13.5),
(8, 9, 3, 24.75),
(8, 10, 4, 33),
(8, 12, 2, 16.5),
(8, 14, 4, 33),
(8, 15, 2, 16.5),
(9, 13, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `text`, `image`) VALUES
(1, 1, 'Pomme', '3.42', 'Elle est bonne pour la tienne', 'images/pommes.jpg'),
(2, 1, 'Poire', '2.11', 'Ici tu en es pas une', 'images/poires.jpg'),
(3, 1, 'Pêche', '2.84', 'Elle va te la donner', 'images/peche.jpg'),
(4, 3, 'Carotte', '2.90', 'C\'est bon pour ta vue', 'images/carottes.jpg'),
(5, 3, 'Tomate', '1.70', 'Fruit ou légume ? Légume.', 'images/tomates.jpg'),
(6, 3, 'Chou Romanesco', '1.81', 'Mange des fractales.', 'images/romanesco.jpg'),
(7, 2, 'Nutella', '4.50', 'C\'est bon, sauf pour ta santé', 'images/nutella.jpg'),
(8, 2, 'Pizza', '8.25', 'Y a pas pire que za', 'images/pizza.jpg'),
(9, 2, 'Oreo', '2.50', 'Seulement si tu es un smartphone', 'images/oreo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `first_name`) VALUES
(1, 'leo.amsallem@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$aho1.F/uWWan2XmCz39QyuvXJPoRhjYeyFXwbXVQAVFR4fF1rE1R6', 'Amsallem', 'Léo'),
(2, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$PH/42C6yerPqWQXEcL1AyuvPk71R..Jbf..U5SxcACD5djzUeYxfi', 'Gerard', 'Pouillot');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F5299398A76ED395` (`user_id`);

--
-- Index pour la table `order_row`
--
ALTER TABLE `order_row`
  ADD PRIMARY KEY (`product_id`,`order_item_id`),
  ADD KEY `IDX_C76BB9BB4584665A` (`product_id`),
  ADD KEY `IDX_C76BB9BBE415FB15` (`order_item_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F5299398A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order_row`
--
ALTER TABLE `order_row`
  ADD CONSTRAINT `FK_C76BB9BB4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_C76BB9BBE415FB15` FOREIGN KEY (`order_item_id`) REFERENCES `order` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
