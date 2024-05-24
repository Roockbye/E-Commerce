-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mai 2024 à 10:14
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mystore`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin1', 'melanie@gmail.com', '$2y$10$OA2JE7s5QNQH/VHhJUeFk.aQfGf6nlt7bhwgP9ZMs.UPpVwJpLvI6'),
(2, 'test', 'test@gmail.com', '$2y$10$lIQvk4QDeshtRuDyUyGD2O4DZK4TKSlrsVYcMv.GgX.IZu9Xyb/Gq'),
(3, 'supp', 'supp@gmail.com', '$2y$10$rgEszUyWVoD7jaYm.IaKHuPmYBbbxx63JdZxAry23OubW5GP8e9Ua');

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'PC'),
(2, 'Amiga'),
(3, 'Nes'),
(4, 'Ubisoft'),
(10, 'Nintendo');

-- --------------------------------------------------------

--
-- Structure de la table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Action'),
(2, 'Jeu de rôle'),
(3, 'Platesformes'),
(4, 'Survie'),
(5, 'Multi-joueur'),
(6, 'Sports'),
(7, 'Aventure');

-- --------------------------------------------------------

--
-- Structure de la table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `order_status`, `quantity`) VALUES
(1, 3, 931862844, 4, 'En attente', 1),
(2, 3, 1390476315, 2, 'En attente', 1),
(3, 3, 563996580, 4, 'En attente', 1),
(4, 3, 1169734478, 6, 'En attente', 2),
(5, 3, 2134600, 5, 'En attente', 1),
(6, 3, 1317018697, 4, 'En attente', 1),
(7, 3, 1410122729, 2, 'En attente', 1),
(8, 3, 1500167481, 5, 'En attente', 1),
(9, 3, 371214846, 7, 'En attente', 2);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Duke Nukem', 'Des extraterrestres assoiffés de sang ont atterri à Los Angeles, la situation est critique et la race humaine est en voie de disparition. Sortez vos calibres et préparez-vous à détruire ces aliens visqueux à coups de bottes.', 'duke, nukem, action, aliens, armes, sang', 1, 1, 'dukenukem.jpg', 'dukenukem1.jpg', 'dukenukem2.jpg', '19', '2024-04-15 08:09:48', 'true'),
(2, 'Darkman', 'Vous incarnez un super héros nommé Darkman. Dans chaque niveau, vous devez battre le boss de fin pour accéder au niveau suivant.', 'darkman, pixel, action', 3, 2, 'darkman.jpg', 'darkman1.jpg', 'darkman2.jpg', '24', '2024-04-15 08:10:02', 'true'),
(4, 'Minecraft', 'Minecraft est un jeu mélangeant construction et aventure, développé par Mojang Studios et créé en 2009 par Markus « Notch » Persson. Il permet à ses joueurs de manipuler un monde en 3D, composé entièrement de blocs à détruire, placer et transformer. Jouab', 'multijoueur', 4, 0, '613KqV0AZzL-3377844839.png', 'Minecraft-wallpaper-95990212.jpg', 'maxresdefault-3368121464.jpg', '18', '2024-04-26 09:58:45', 'true'),
(5, 'Mario Kart PC', 'Mario Kart PC. Affrontez jusqu\'à 8 joueurs dans 6 modes de jeu ! Dans les tournois Grand Primes, gagnez 5 coupes de 4 courses pour débloquer les 9 personnages secrets ! Avec le mode contre la montre, battez les records des autres joueurs et devenez champi', 'tournoi, mario kart pc, champion', 5, 1, 'mario1.jpg', 'mrio2.jpg', 'mario3.jpg', '20', '2024-05-20 08:47:12', 'true'),
(7, 'Zelda', 'description', 'zelda, aventure', 7, 10, 'zelda1.jpg', 'zelda2.jpg', 'zelda3.jpg', '17', '2024-05-24 08:04:30', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `total_products` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 43, 1696335990, 2, '2024-04-23 08:56:29', 'En attente'),
(2, 3, 18, 931862844, 1, '2024-05-13 09:59:50', 'Payée'),
(5, 3, 30, 1169734478, 1, '2024-05-20 09:23:56', 'Payée'),
(6, 3, 20, 2134600, 1, '2024-05-20 09:28:28', 'Payée'),
(7, 3, 18, 1317018697, 1, '2024-05-20 09:43:16', 'Payée'),
(8, 3, 24, 1410122729, 1, '2024-05-20 09:39:37', 'Payée'),
(9, 3, 20, 1500167481, 1, '2024-05-23 09:13:58', 'Payée'),
(10, 3, 34, 371214846, 1, '2024-05-24 08:08:54', 'Payée');

-- --------------------------------------------------------

--
-- Structure de la table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'gaga', 'adresse@email.com', '$2y$10$QvBJWE6TXd6scauqHreyhOJawTd6AjsL1lCHpLLd/BypjhQVkCmRO', 'faria.jpg', '::1', '00 la rue 00000 la ville', '0000000000'),
(5, 'user', 'user@mail.com', '$2y$10$jUL3T/8r6uly0vgJX7SDneJEuiuJhSPP9S/9Z7O8JjbPfi47BFbjS', 'pokémon1.jpg', '127.0.0.1', 'adresse 152247 tou', '0553957014');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Index pour la table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Index pour la table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
