-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 18 nov. 2023 à 02:30
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom2_project`

drop database if Exists ecom2_project;

-- creation de ma base donnee
create database ecom2_project;

use ecom2_project;
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) NOT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `street_nb` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `zipcode` varchar(6) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Insertion dans la table `address`
--
INSERT INTO `address`(`id`, `street_name`, `street_nb`, `city`, `province`, `zipcode`, `country`) 
VALUES (1,'def',132,'def','def','def','def');

-- ------------------------------------------------------


--
-- Structure de la table `order_has_product`
--

CREATE TABLE `order_has_product` (
  `user_order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qtty` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `qtty` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `url_img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Insertion dans la table `product`
--
INSERT INTO `product` (`id`, `name`, `qtty`, `price`, `url_img`, `description`) VALUES
(1, 'Diablo', 8, '109.00','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_i3boG1_3rwjsf41hDlE8NgrfwoxRbtPR5A&usqp=CAU','lorem ispum dolor'),
(2,'Sublimo', 12, '99.99','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfhIXQ8iOiuvyYg5Isf2YgvMRpqS_U4ILtwg&usqp=CAU','lorem isum dolor'),
(3, 'Indestructible', 7, '79.99','https://images.squarespace-cdn.com/content/v1/61b244bd3419a10c6b5ea8d7/1663178127779-BJOHWP6SSPDHV85NZBSC/Long-anticipated+Nike+x+UCLA+shoe+now+available+at+UCLA+Store.jpg','lorem ispum dolor'),
(4,'Espresso', 5, '89.99','https://static.nike.com/a/images/f_auto,cs_srgb/w_960,c_limit/e59273d2-3575-4c07-b302-a97f69df4b44/nike-just-do-it.jpg','lorem isum dolor'),
(5, 'Rapidos', 8, '69.00','https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/e80494bb-5549-4986-9c0a-d7a2bf112949/air-jordan-3-retro-mens-shoes-5M3ZlK.png','lorem ispum dolor'),
(6,'Pegasus', 11, '89.99','https://fanatics.frgimages.com/basketball-essentials/mens-nike-gray-air-zoom-gt-jump-2-shoe_ss5_p-5347834+u-diocrvlzrqizxpdzna4l+v-u1ljyh1frsvz1fiujg7z.jpg?_hv=2&w=340','lorem isum dolor'),
(7, 'Hercules', 13, '99.00','https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_3.0/h_300,c_limit/bb9be77e-e808-4d58-88db-5ad331c0b4ac/sabrina-1-west-coast-roots-basketball-shoes-f8jr2H.png','lorem ispum dolor'),
(8,'Athena', 7, '69.99','https://images.footlocker.com/content/dam/final/FootLockerInc/site/new-arrivals/new-arrival-6up-J9405601.jpg','lorem isum dolor');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Insertion dans la table `role`
--

INSERT INTO `role` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'sadmin'),
(2, 'admin', 'admin'),
(3, 'client', 'client');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `billing_address_id` bigint(20) NOT NULL,
  `shipping_address_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Insertion dans la table `user`
--

INSERT INTO `user` (`id`, `token`, `username`, `fname`, `lname`, `pwd`, `billing_address_id`, `shipping_address_id`, `role_id`) VALUES
(1, 'a43c1a7d5d9545d0429acedb39e78595770b98cd6a71457c0536065891ce359fcc1ba002200d85ce48664adaf1e2f5c1628663f762704d9e18abac1070a9a17d', 'SupAdmin', 'SupAdmin', 'SupAdmin', '$2y$10$GiQLjhDY1iIUFjzxaL5JO.7Xz.F433JVSOKV7mBF6/XiPjOWgFoJa', 1, 1, 1),
(2, 'a43c1a7d5d9545d0429acedb39e78595770b98cd6a71457c0536065891ce359fcc1ba002200d85ce48664adaf1e2f5c1628663f762704d9e18abac1070a9a17d', 'Admin', 'Admin', 'Admin', '$2y$10$GiQLjhDY1iIUFjzxaL5JO.7Xz.F433JVSOKV7mBF6/XiPjOWgFoJa', 1, 1, 2),
(3, 'a43c1a7d5d9545d0429acedb39e78595770b98cd6a71457c0536065891ce359fcc1ba002200d85ce48664adaf1e2f5c1628663f762704d9e18abac1070a9a17d', 'Client', 'Client', 'Client', '$2y$10$GiQLjhDY1iIUFjzxaL5JO.7Xz.F433JVSOKV7mBF6/XiPjOWgFoJa', 1, 1, 3);

-- ------------------------------------------------------

--
-- Structure de la table `user_order`
--

CREATE TABLE `user_order` (
  `id` bigint(20) NOT NULL,
  `ref` varchar(40) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_has_product`
--
ALTER TABLE `order_has_product`
  ADD PRIMARY KEY (`user_order_id`,`product_id`),
  ADD KEY `FK_product_id` (`product_id`) USING BTREE;

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PersonOrder` (`role_id`),
  ADD KEY `FK_shipping_address` (`shipping_address_id`) USING BTREE,
  ADD KEY `FK_billing_address` (`billing_address_id`) USING BTREE;

--
-- Index pour la table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_order` (`user_id`) USING BTREE;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order_has_product`
--
ALTER TABLE `order_has_product`
  ADD CONSTRAINT `PK_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PK_user_order_id` FOREIGN KEY (`user_order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_billing_address` FOREIGN KEY (`billing_address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_shipping_address` FOREIGN KEY (`shipping_address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `FK_userorder` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
