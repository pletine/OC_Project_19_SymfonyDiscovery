-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 16 fév. 2024 à 14:15
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogsymfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `author` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `comment` varchar(1024) COLLATE utf8mb3_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526C4B89032C` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `author`, `comment`, `date`) VALUES
(1, 5, 'Adèle Maillot', 'Tenetur harum dolor minus culpa qui autem. Porro iste magnam provident. Labore ab nihil placeat unde blanditiis fuga.', '2023-08-24 05:12:33'),
(2, 8, 'Louis Legrand-Munoz', 'Rem quia occaecati est blanditiis. Asperiores id non nihil eveniet soluta. Tempora ea facere vitae laboriosam.', '2023-01-09 13:32:48'),
(3, 4, 'Thierry de la Vaillant', 'Ratione deserunt odio aspernatur doloribus alias quia. Rem culpa suscipit sint optio architecto dolores ipsa. Tenetur aliquam sit similique qui maiores eveniet. Est veritatis laudantium eius molestiae voluptates harum. Optio beatae quia minus reprehenderit placeat dolor commodi enim.', '2022-03-03 14:27:16'),
(4, 7, 'Astrid-Martine Pons', 'Repellat ut aperiam tenetur excepturi rem. Suscipit omnis et dignissimos. Voluptatem sunt qui voluptatem aut quis. Fugit accusantium consequatur qui aut.', '2022-06-09 03:17:47'),
(5, 3, 'Corinne de Bruneau', 'Labore iusto necessitatibus et delectus earum pariatur. Aliquid dolores dolorem perspiciatis doloremque molestias doloremque. Eveniet eum libero et sed sed laborum quo a.', '2024-01-19 01:17:14'),
(6, 6, 'Danielle Guibert-Dos Santos', 'Quia earum consequuntur quis omnis eveniet aut. Nihil enim natus esse ratione molestias. Minima rerum cum saepe reprehenderit. Ut nulla tempore ut alias dicta accusantium.', '2023-07-09 15:15:10'),
(7, 3, 'Philippe Dupuy', 'Ut architecto enim voluptas doloremque sed dolore et sunt. Ea ipsa dolor accusamus facere sapiente. Aut provident sunt doloremque rem modi quia provident fuga. Explicabo aut et nihil consequuntur sit adipisci.', '2023-07-29 02:03:23'),
(8, 8, 'Bernard Raynaud', 'Officia et doloribus laboriosam et temporibus voluptatem quae voluptas. Natus ut perferendis voluptatem ex fugit a nulla. Corporis dolorem sed repellendus et incidunt eum est. Distinctio doloremque neque magni non quod laborum inventore.', '2022-12-09 03:07:14'),
(9, 1, 'Dorothée Dupre', 'Distinctio perferendis tempora voluptatum error laboriosam. Magnam possimus at error id. Aut voluptate numquam enim est suscipit culpa facilis.', '2022-03-19 05:00:08'),
(10, 4, 'Édouard Adam', 'Officia corrupti quia qui illum incidunt ut consequuntur. Vitae expedita nulla quia. Sequi sint voluptatem labore tempora.', '2022-12-26 12:50:05'),
(11, 5, 'Claude Guilbert', 'Sapiente soluta reiciendis est ad. Voluptatum a autem explicabo quisquam est. Rerum officia quam ipsum at laborum aut.', '2023-12-04 18:32:16'),
(12, 2, 'Victoire de la Marques', 'Accusantium assumenda sequi distinctio occaecati ut earum. Id odit et distinctio esse sed sit cum. Et ad similique quis voluptatum non. Temporibus nobis ab et ea provident necessitatibus inventore doloremque.', '2022-12-21 18:54:44'),
(13, 2, 'Philippine-Margaud Marques', 'Eum ea a voluptas mollitia. Harum vero ipsum consequuntur ut eaque. Sunt ipsum sed illum accusamus soluta mollitia. Sunt cupiditate ipsum id tempora dicta et odio. Ea voluptas nam quisquam nulla atque.', '2022-07-16 11:58:20'),
(14, 4, 'Pierre Mendes', 'Sit commodi qui quia ea voluptatem asperiores et. Ducimus earum suscipit sunt perspiciatis. Ea ut minus ut ut est recusandae.', '2022-07-19 22:28:24'),
(15, 5, 'Diane-Adélaïde Leroy', 'Iste eaque non inventore debitis autem similique. Et fuga sit sed dignissimos eius voluptatem. Quae ea magni dolorem maiores mollitia.', '2023-10-07 10:42:01'),
(16, 8, 'Alphonse Diallo', 'Ad voluptatem sequi id voluptatibus et dolore. Officiis fugiat similique repellendus non architecto.', '2023-06-05 09:45:46'),
(17, 7, 'Catherine Laine', 'Autem ut iste saepe voluptatem excepturi qui. Aut aut ut non eos repellendus atque. Tempore necessitatibus enim nihil ad sapiente et.', '2022-05-15 21:50:42'),
(18, 1, 'Vincent Remy-Ferreira', 'Magnam illum culpa id quia aut at. Voluptatibus molestias maiores repudiandae facilis iusto. Velit est et aut. Voluptatum iure est et vitae cum ullam est.', '2022-04-06 11:38:58'),
(19, 6, 'Odette Bernard', 'Commodi voluptates aperiam quibusdam. Fugiat labore voluptatem fugit. Quia impedit nulla non.', '2024-01-21 20:55:05'),
(20, 6, 'Julie Blin', 'Sit minima quo omnis magni eum modi voluptatem repellat. At cumque ratione amet deserunt qui dolor dolor. Tempora non aut aut ut iusto.', '2023-01-30 17:53:54');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8mb3_unicode_ci NOT NULL,
  `story` varchar(1024) COLLATE utf8mb3_unicode_ci NOT NULL,
  `publish_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `story`, `publish_date`) VALUES
(1, 'Corrupti voluptates eum sit aliquam ut ut amet ut maiores molestiae.', 'Et eveniet quidem et quibusdam iure corporis illum. Et consequatur pariatur deleniti consequatur ducimus laudantium ut. Sunt exercitationem quaerat illo aperiam expedita similique esse. Architecto ut et cumque sed. Cupiditate exercitationem quidem consectetur veniam. Debitis earum non numquam id quos illum ea. Cupiditate expedita dignissimos aut suscipit sed. Cumque perferendis dignissimos et unde nobis consequatur sint odit. Reiciendis voluptas error deleniti cupiditate nostrum qui aut a. Voluptas libero neque quas veniam. Delectus aut dolorum magni animi sit. Omnis suscipit officia eveniet maiores ipsum. Molestiae omnis eum delectus non nihil maiores velit. Accusantium fugit saepe soluta sunt quasi quod. Quia deserunt est possimus distinctio. Inventore maxime qui sed nostrum. Quasi qui enim nihil reprehenderit reprehenderit. Est id neque aut asperiores. Impedit architecto voluptas nemo vitae rem nisi aspernatur iure. Fuga rem quas minus eos aut.', '2023-07-10'),
(2, 'Voluptatem non aliquid qui sit exercitationem alias deserunt fugiat corporis odio esse.', 'Aliquam labore quo quia ut. Ut nam nemo et aut maiores. Eos quibusdam eos quidem quo. Est blanditiis earum dignissimos aut minima tempora non. Earum reprehenderit est dolore sit velit. Dolorem non nobis quae nam. Cupiditate minus placeat vel voluptatem saepe. Consequatur harum qui atque pariatur numquam voluptate quis. Ipsa dolor quis deleniti perferendis unde omnis ut. Aut et deleniti voluptas corrupti nesciunt accusamus. Voluptatibus deleniti eum cum voluptas consequatur assumenda beatae harum. Atque sapiente delectus ut non officiis. Perspiciatis dicta nam aliquid amet. Voluptatibus qui expedita ut quos molestiae consectetur. Accusamus ut vel consequatur molestiae. Quo ut laborum enim placeat atque. Omnis officia tempora possimus quas modi commodi. Est assumenda eius itaque voluptatem distinctio sunt odio eaque. Ut ut tempore reiciendis aliquid unde quis est.', '2024-02-01'),
(3, 'Magni perferendis aut fuga dolores qui assumenda modi officiis esse deleniti ut ipsum magnam.', 'Numquam facilis voluptas quis sed rerum. Ea sed soluta ipsum. Suscipit odio quia natus sapiente in sed. Recusandae odit assumenda et omnis asperiores esse. Sapiente illo velit quia voluptas. Ipsa eum veritatis voluptatem sint perspiciatis iusto. Illo possimus harum fuga aut et vitae. Non assumenda doloremque omnis tempore id eligendi accusantium. Omnis consectetur similique voluptas quaerat alias. Ut ex distinctio magni neque nostrum sit sit. Hic ad vel saepe qui ut recusandae ullam. Harum provident veniam facere quia. Cumque velit blanditiis ipsa voluptatem enim. Et voluptatem sapiente eos. Et et ea accusantium possimus odio sunt nihil. Magni sunt laboriosam vel ut debitis voluptas. Quis id quod voluptatem inventore ut. Hic vitae dolorum modi velit quia sed facere. Consequuntur quia consequuntur officiis iusto. Et atque a reprehenderit totam. Velit vel quis eos eligendi voluptate aliquid ducimus velit.', '2023-09-02'),
(4, 'Ipsa nobis voluptas doloribus adipisci et eum ratione.', 'Id qui aspernatur velit optio quia vel quos repudiandae. Officia non cum praesentium. Molestiae deserunt ut possimus quia. Architecto quisquam fugit minima consequatur consequatur dolorem aspernatur. Iusto est placeat qui quasi ut aliquid. Rem deserunt quaerat ut ea eos. Qui magni dolores iusto nesciunt. Non est et tempore. Qui numquam consequatur placeat voluptatum qui. Omnis fugit fugit nemo voluptatibus fuga sunt laboriosam. Voluptatum accusamus animi dolore dignissimos. Vitae sed provident blanditiis maiores vero. Nam praesentium laboriosam asperiores eaque maiores illo. Quibusdam modi aliquid at culpa. Ducimus voluptatem non autem similique explicabo id. Et qui nemo tenetur voluptas qui totam numquam facilis. Officia delectus ut sint sunt qui impedit quaerat vitae. Ut eveniet qui placeat. Nostrum dolorum enim quos aut voluptate. Soluta nulla sed exercitationem accusamus ut odio possimus. Ipsum quaerat ipsum quia sunt quisquam.', '2023-09-08'),
(5, 'Dignissimos assumenda officiis autem et minima autem.', 'Modi ab ducimus quae ipsum. Debitis hic rerum dolores. Voluptatum accusamus voluptas quod et dolorem. Consequatur nostrum non et doloremque soluta pariatur omnis ipsam. Rerum est voluptatem similique accusamus blanditiis ut mollitia. Sapiente sit enim aut et deserunt aut. Saepe omnis blanditiis omnis eum dicta totam illum. Inventore temporibus similique et ea. Labore accusantium ut et ut cumque amet. Ullam at recusandae optio rerum non perferendis. Adipisci explicabo doloribus laboriosam nemo et aut occaecati. Commodi modi doloremque voluptatem animi. Non magnam eius ea nobis. Perferendis est id ducimus reprehenderit porro illo animi. Incidunt corporis illo in autem sequi ut at. Ratione animi quaerat explicabo dolorem inventore. Voluptatem ea officia reprehenderit ut natus deleniti at. Fugit repellendus velit libero deleniti iste doloribus nostrum.', '2022-12-03'),
(6, 'Sapiente facilis ut enim tenetur commodi ducimus ut quisquam sequi sit qui eveniet iusto.', 'Est cum laudantium eligendi laudantium. Architecto maiores fugiat tempore nihil. Provident sit magnam qui et illo. Pariatur sint illum architecto sit totam. Laudantium sit vel voluptate aut. Et et laudantium placeat. Quae assumenda molestiae cum eaque tempore et. Ut quaerat ut adipisci. Officiis nemo fugit odit quis voluptate eos. Molestias exercitationem labore nihil porro omnis rerum veritatis. Neque quaerat tempore sit tenetur. Accusantium sit natus fugiat eum quod ut. Porro quam odit ea quia eveniet pariatur. Doloribus enim ducimus a voluptas voluptas vel. Ut vitae quasi autem sit nam culpa. Ut dignissimos quia eos sed amet ratione asperiores dolores. Sit consequatur quia dolorem voluptatibus est beatae. Architecto quas consequatur eos et ducimus. Minima placeat et quia quo delectus sit. Aut vitae provident laboriosam rerum nihil nostrum. Sit minima voluptates magni quae aut.', '2023-02-11'),
(7, 'Et molestiae enim maxime expedita expedita explicabo praesentium quia earum illo dolorem deserunt.', 'Tempore ratione tempora eius et. Voluptatibus eum ut laboriosam fugiat dolor rerum quas. Repudiandae est aperiam error. Ratione ex excepturi magni. Ipsa consequatur culpa nulla aut sed accusantium delectus molestiae. Saepe dolor voluptas aut quos laudantium. Repellat provident enim sed. Laudantium dolor consectetur tempore et minus. Aspernatur consequuntur impedit vero necessitatibus explicabo. Quia non doloribus distinctio. Autem qui earum est vitae modi fugit non facere. Nihil dolorem est quia minus assumenda eum. Sint sit cupiditate et est. Voluptatibus est modi enim dignissimos itaque sunt. Et rem at eligendi deleniti. Nesciunt veritatis est sed consequatur quis natus magnam. Soluta nisi vitae est qui ut nobis. Qui impedit similique omnis in. Ipsam quaerat laboriosam libero odio quod sint aut.', '2022-10-06'),
(8, 'Et dolores unde dolor blanditiis sunt fuga perferendis maiores laudantium praesentium praesentium similique ut vero.', 'Odio autem rerum sit maiores qui. Nihil rerum adipisci molestiae hic. Fugit enim eum voluptatem possimus minus incidunt. Vel alias eligendi est velit voluptate quis. A autem corporis voluptatibus unde officiis dolore. Adipisci occaecati molestiae et ipsa quis necessitatibus veniam. Distinctio quam rerum perspiciatis laudantium. Minus dicta voluptas porro consequatur iure aut est. Perspiciatis asperiores quidem quia et. Est rerum dolor deleniti necessitatibus aperiam vel aut. Recusandae deserunt sed animi quo architecto fuga. Ut repellendus et ea minus occaecati praesentium. Veniam explicabo repellendus sit dolorum non itaque sit molestiae. Consequatur et consequuntur consequatur et quasi dolores. Quasi labore consectetur natus. Deleniti veritatis aliquam labore sit sequi veniam aspernatur. Quia fugit voluptatem quis nesciunt placeat veritatis blanditiis. Dolorem perspiciatis aut dicta numquam quidem sit. Aut est laborum quae consequuntur magnam laborum.', '2024-01-13');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb3_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C4B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
