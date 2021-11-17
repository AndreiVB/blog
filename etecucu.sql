-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2021 at 07:29 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opula`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text,
  `picture` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `picture`, `created_at`, `edited_at`, `user_id`) VALUES
(59, 'Book recomandations', 'Hy there reader, hope you are doing well these days, here are some books recomandations for this week', 'book.png', '2021-07-21 13:19:39', '2021-07-21 13:19:39', 1),
(60, 'Where to go', 'Hello there, are you in for visiting something this summer, here is a nice location in France.', 'visit.png', '2021-07-21 13:20:55', '2021-07-21 13:20:55', 1),
(61, 'Where to read', 'Hy there brothers and sisters in books, thinking that you need a special place to read, nope you can do it wherever you want', 'places2.png', '2021-07-21 13:22:35', '2021-07-21 13:22:35', 14),
(62, 'Where to go in 2021', 'Morning readers, here is a place to this summer\r\nSome random text here :\r\nOn his visit Tuesday, Erdogan backed a two-state solution in Cyprus between the internationally recognised Greek Cypriot government in the south and the Turkish-occupied north, in a marked divergence from international efforts to reunify the island based on a bicommunal federation.\r\n\r\nHe also threw his weight behind plans to partially reopen the coastal resort of Varosha that was emptied of its original Greek Cypriot residents.\r\n\r\nTurkish Cypriots said on Tuesday that part of Varosha would come under civilian control and people would be able to reclaim properties – angering Greek Cypriots who accused their Turkish rivals of orchestrating a land-grab by stealth.', 'visit6.png', '2021-07-21 13:25:05', '2021-07-21 13:25:05', 14),
(63, 'Books that i loved', 'Hy there, here are some books that i loved reading\r\nSee you soon with your opinion\r\nRandom text here\r\nThe Paris prosecutor’s office announced it is investigating the suspected widespread use of the Pegasus spyware to target journalists, human rights activists and politicians in multiple countries.\r\n\r\nDaily French newspaper Le Monde reported that the phone numbers for Macron and the then-government members were identified among thousands allegedly selected by NSO clients for potential surveillance. In this case, the client was an unidentified Moroccan security service, according to Le Monde.\r\n\r\nLe Monde was part of a global media consortium that identified the targets from a list of more than 50,000 cellphone numbers obtained by the Paris-based journalism nonprofit Forbidden Stories and the human rights group Amnesty International and shared with 16 news organizations.\r\n', 'book5.png', '2021-07-21 13:30:35', '2021-07-21 13:30:35', 14),
(64, 'Book event', 'Hello and thank you, feels so good to make part of this community. This is my first post, hope you like it.\r\nSee you soon, random text : The health pass provides proof that a person has been vaccinated against COVID-19, has recently had a negative coronavirus test or has newly recovered from the virus.\r\n\r\nWhat changes is that a planned 45,000 euro fine for businesses which do not check that clients have a health pass will be much lower, starting at up to 1,500 euros and increasing progressively for repeat offenders.\r\n\r\nBesides, checks will initially be meant to help people apply the measures but the fines will not be imposed immediately. Government spokesman Attal told a news conference he could not say exactly when the \"run-in period\" would end and fines would be imposed.', 'bookevent7.png', '2021-07-21 13:32:34', '2021-07-21 13:32:34', 31),
(65, 'Place to visit', 'Aloha, just found this beautifull library in Prague, maybe you will stop by when in Prague :) See you there. Random text : The 22-year-old UAE Emirates rider is the youngest rider to wear the overall leader\'s yellow jersey at the end of the race for two years running.\r\n\r\nHe also won the white jersey for the best Under-25 rider and the polka-dot jersey for the mountains classification after a dominant performance throughout.\r\n\r\nDenmark\'s Jonas Vingegaard took second place overall with Ecuador\'s Richard Carapaz in third.', 'library7.png', '2021-07-21 13:33:59', '2021-07-21 13:33:59', 31),
(66, 'What to visit', 'Summer is here, what are your plans? Random text here : FRANCE 24 caught up with some of the habitués of the red carpet: Leos Carax kicked off the show with his musical number “Annette” and its stars, Adam Driver and Marion Cotillard, told us more about working with the cult director.\r\n\r\nWe also sat down with that most regal of actresses, Helen Mirren, and talked to filmmaker Todd Haynes about the 1960s cultural phenomenon that was The Velvet Underground. Tim Roth discussed his role in a cinematic homage to legendary director Ingmar Bergman while Brazilian director Karim Ainouz told us about his personal – and political – journey to Algeria. And 30 years after his dramatic retelling of the Kennedy assassination in \"JFK\", Oliver Stone revealed some of the declassified material that went into his latest documentary about that historic event.', 'visit9.png', '2021-07-21 13:35:04', '2021-07-21 13:35:04', 31),
(67, 'When not reading, book event', 'Hy there! What do you like to do when you have some spare time and you do not read? I like going to some book events. Here\'s one for you', 'bookevent6.png', '2021-07-21 13:36:30', '2021-07-21 13:36:30', 31),
(70, 'Travelling', 'Hello there, i hope you are loving this blog. If you have some suggestions send me a message, thanks. Random text here: We also sat down with that most regal of actresses, Helen Mirren, and talked to filmmaker Todd Haynes about the 1960s cultural phenomenon that was The Velvet Underground. Tim Roth discussed his role in a cinematic homage to legendary director Ingmar Bergman while Brazilian director Karim Ainouz told us about his personal – and political – journey to Algeria. And 30 years after his dramatic retelling of the Kennedy assassination in \"JFK\", Oliver Stone revealed some of the declassified material that went into his latest documentary about that historic event.', 'visit2.png', '2021-07-21 13:42:55', '2021-07-21 13:42:55', 1),
(71, 'Place in France', 'Bonjour :). If you haven\'t visited France now it\'s the time, summer is waiting for you. Random text here : The Humboldt Forum — located in the heart of Berlin, next to the neoclassical Museum Island complex — was designed by Italian architect Franco Stella and features three replica facades, one modern one and a modern interior. It cost 680 million euros ($802 million).\r\n\r\nThe project results from a 2002 vote by the German parliament to reconstruct the 18th-century palace. The original was demolished in 1950 and later replaced by East Germany\'s parliament building, itself now knocked down.\r\n\r\nIt will feature exhibits from two of Berlin\'s state museums, the Ethnological Museum and the Museum for Asian Art. It is starting out with six exhibtions, including one on Berlin\'s history, another on ivory, and one on brothers Alexander and Wilhelm von Humboldt, the explorer and educator whose name the forum bears.', 'visit2.png', '2021-07-21 13:45:23', '2021-07-21 13:45:23', 1),
(74, 'Nice place to visit', 'Here is a nice place to visit. Enjoy. Random text : Le septième numéro de la revue photographique Îles, consacrée aux îles du Ponant, paru en juin 2021, met cette fois à l’honneur la brigade estivale des gendarmes d’Ouessant. Tous issus de la brigade de Brest, cinq agents vont se relayer pendant tout l’été pour veiller, sept jours sur sept, 24 heures sur 24, sur la population ouessantine qui passe de 800 à plus de 3 000 habitants.', 'visit4.png', '2021-07-21 15:35:08', '2021-07-21 15:35:08', 14),
(75, 'Relaxing a bit', 'From time to time we all need to relax a bit. Random text : L’ensemble de la rénovation a coûté 230 000 €, financé pour 20 000 € par Houat et Hœdic, et pour le reste par Aqta (Auray Quiberon terre atlantique) et le Département.\r\n\r\nLa Compagnie des ports gère la pompe à essence, tandis que la mairie de Houat administre la cuve de gazole pêche détaxée et de fioul domestique.\r\n\r\nLes prochains travaux sur le port sont la sécurisation de l’ancien bâtiment des pêcheurs et le ponton de la digue.', 'visit13.png', '2021-07-21 15:41:06', '2021-07-21 15:41:06', 14),
(76, 'Relaxing time again', 'Have some fun. Go in a vancantion. Random text :  ÉCOUTER\r\n LIRE PLUS TARD\r\n NEWSLETTER AURAY\r\n PARTAGEZ	\r\nLa station de carburant de Houat et Hœdic a été rénovée. Basée à Houat, cette station « évite maintenant les transports de bidons avec la barge », se félicite le maire, Philippe Le Fur. Le transport est donc plus sûr, et « la rénovation est aussi environnementale : un caniveau spécial récupère les polluants, et il a été installé un séparateur d’hydrocarbures afin de ne pas polluer les eaux maritimes », ajoute Jean-Baptiste Fleitour, directeur du port de Houat.\r\n\r\nLa station est bien sécurisée avec un système automatique en cas d’incendie.', 'visit11.png', '2021-07-21 15:42:42', '2021-07-21 15:42:42', 1),
(102, 'Is this the last post before vacation?', 'Ready for vacation? I hope i am. Random text : \"The EU will continue to be creative and flexible within the Protocol framework,\" she said. \"But we will not renegotiate.\"\r\n\r\nIn its proposals, London stopped short of suspending the protocol, which requires checks on goods arriving from mainland Britain, and instead called for \"significant changes\".\r\n\r\nIt wants the EU to indefinitely abandon ad-hoc grace periods for certain border checks and freeze legal action launched against the UK for non-compliance, as part of a \"standstill period\" allowing for fresh negotiations.', 'visit4.png', '2021-07-22 13:28:44', '2021-07-22 13:28:44', 1),
(103, 'Book event this weekend', 'Is it finally friday but we are still wroking, take a time to look at this book event. Random text : Défendant une droite \"ferme sur le régalien, laïque mais aussi écologiste, libérale, pro-entreprise, féministe et sociale\", Valérie Pécresse avait pris ses distances avec LR dès 2017 en créant le mouvement Libres !, en opposition au président du parti de l\'époque, Laurent Wauquiez, jugé populiste.\r\n\r\n\"Je ne supporte plus qu\'on parle au lieu d\'agir\", affirme l\'ex-LR, désireuse de \"rompre avec dix ans de mauvais choix, de demi-mesures, d\'indécisions, et en fin de compte l\'affaissement de notre pays\".\r\n\r\nLa candidate à l\'Élysée, qui vient d\'avoir 54 ans, dit vouloir \"faire plutôt que chercher à plaire\" après un quinquennat \"avec très peu de réformes\", et vouloir \"remettre le pays en ordre\". Elle a aussi annoncé son intention de parcourir le pays durant l\'été.', 'bookevent2.png', '2021-07-23 10:13:42', '2021-07-23 10:13:42', 1),
(105, 'Book event this weekend', 'Want to have a bit of time for yourself? Check out this book event. See you there. Random text : Moise was gunned down in his home in Port-au-Prince before dawn on July 7, setting off a political crisis in the Caribbean country already struggling with poverty and lawlessness.\r\n\r\nProtests by angry supporters of Moise convulsed the slain leader\'s hometown, the northern city of Cap-Haitien, for a second successive day on Thursday as workers labored in preparation for the funeral.\r\n\r\nThe protesters set tires on fire to block roads on Thursday afternoon, while workers paved a brick road to Moise\'s mausoleum on a dusty plot of several acres enclosed by high walls.\r\n\r\nSet on land held by Moise\'s family and where he lived as a boy, the partly built tomb stood in the shade of fruit trees, just a few steps from a mausoleum for Moise\'s father, who died last year. Police controlled access to the compound through a single gate.', 'bookevents9.png', '2021-07-23 20:18:12', '2021-07-23 20:18:12', 31),
(106, 'Weekend visit', 'Hello there, weekend is almost here, why not go out for a visit? Check out this place that i\'ve found these days. Random text : “Surfers have to make the most of the wave,” says Michel Plateau, national technical director for the French Surfing Federation. “There are quite precise criteria for judging in terms of commitment, power, ease, and innovation. Surfers get an overall mark out of 10 for these.”\r\n\r\nFive judges assess surfers on each wave. A surfer’s two highest scores are then combined for an overall total.\r\n\r\nThe waves in Tokyo require special training, says Jérémy Florès, of the French surfing team. “They\'re mostly small waves, so you have to prepare differently: work more on toning, go on a diet and really be as light as possible, to be able to go as fast as possible on small waves.”\r\n\r\nLong considered a leisure activity, surfing turned professional in the 1990s.\r\n\r\n“Including surfing in the Olympic Games for the first time is recognition for our sport. It\'s now truly perceived as a sport discipline in its own right and not just a beach activity,” said Jacques Lajuncomme, president of the French Surfing Federation.', 'visit5.png', '2021-07-23 20:20:32', '2021-07-23 20:20:32', 31);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` char(5) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`nickname`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `first_name`, `last_name`, `email`, `password`, `created_at`, `role_id`) VALUES
(1, 'admin', 'Gigi', 'Duru', 'gigi@gigi.fr', '$2y$10$E1W5tsp.Y2NILy5RGXjLoOIp5FhzVn/j6YuXpus6CyNQwiAqaKtbK', '2021-05-18 06:16:41', 2),
(14, 'aaa', 'aaa', 'aaa', 'aaa@a.fr', '$2y$10$EeM6Pq6ApxsmjYkrYQcoM.MpjkT2q9AsMsFzMyGc4PtjC1zkzx632', '2021-05-28 05:23:24', 1),
(31, 'bbb', 'bbb', 'bbb', 'bbb@bbb.fr', '$2y$10$hLWe.A7fMGDVVkHDAilt5OLY6cG9AS6z5GQyTm9SoktfrvftgY0yG', '2021-07-21 13:15:06', 1),
(32, 'ccc', 'ccc', 'ccc', 'ccc@c.fr', '$2y$10$kjEKYihzIuMlQ5d/PV4jLuDZwbJ6pdI0R5wNbed76vqppDq5p2f5.', '2021-07-21 13:15:27', 1),
(33, 'ddd', 'ddd', 'ddd', 'ddd@ddd.fr', '$2y$10$OBFLbFiRz9OLjzMj4UgUzeR7aEn/xM0uSZkVb9CMFiEl/dHD4QoBu', '2021-07-21 13:15:47', 1),
(34, 'ana', 'ana', 'ana', 'ana@daez.dza', '$2y$10$4mWRzTRYglL39NylZj91m.LMLHDT4jgQLddTYG2eFJ9JuFwpbgMbG', '2021-07-21 14:35:19', 1),
(35, 'anette', 'anette', 'anette', 'anette@fez.fez', '$2y$10$HqS3mqqzRUNgyWios6DiouBnNfvGlsmgawDjfXbsOM2R5zsXlg2nu', '2021-07-21 14:35:42', 1),
(36, 'boby', 'boby', 'boby', 'boby@bofae.fez', '$2y$10$hj9g5GDMbB32KcKiRBipUOyTed8YVLj1C2SPJlG.4V9Pf.pHpJgba', '2021-07-21 14:36:01', 1),
(37, 'bogdan', 'bogdan', 'bogdan', 'bogdan@dae.deaz', '$2y$10$EilSLyri7jLQzM.HvP4dku7YWGHCXRTzvR/N1rCXcV2UF/5NjidtK', '2021-07-21 14:36:25', 1),
(38, 'anastasia', 'anastasia', 'anastasia', 'anastasia@dea.dez', '$2y$10$byAxwqdWZSmT2kwaeBjKMO9TT4.kTYg6m9B1shbazWMxLVZaPo4Ay', '2021-07-21 18:24:39', 1),
(121, 'zea', 'eza', 'eze', 'aze@xn--za-7fu.dez', '$2y$10$NMOUriTw57ntFs5iKVPyouvtwQpisvzSE4aS3YgqqPOC/GX05od8e', '2021-07-24 19:18:06', 1),
(122, 'eaz', 're', 'eza', 'aez@aze.dza', '$2y$10$3K3KJG30KFiJitoRco4lLOwMyA/0Awz0AA6PPSQ3o4slgf6sXQpkW', '2021-07-24 19:18:47', 1),
(126, 'e\"za', 'eaz\"', 'edza', 'ezz@a.dza', '$2y$10$fLvKkQEqnM1Txy5r7FveY.owRcBdcTeYlhEGlAi3lUKU.3sULxuFa', '2021-07-24 19:33:13', 1),
(127, 'eza', 'eza', 'za', 'eza@ezaeza.fr', '$2y$10$XOBcCDX.S1vKFlnZfbJ10OI7uEkucKbnuPzkkxUVCRGyyadYTh4gC', '2021-07-25 14:26:04', 1),
(130, 'ezaezaeza', 'eza', 'eza', 'eza@ezaeza.frezaeza', '$2y$10$zL3VkfoK.ILBGcZ2UkXUTuumcMLTNFH375HEjiDqfhIFLnsWHLAnO', '2021-07-25 16:09:32', 1),
(131, '\'\"é', '\'\"é', '\'\"é', 'fezfez@fez.de', '$2y$10$5dc8ZQ4b6dsuxuW9I2mD3.vX4p4JxC6q5PXY0sBKaO0xQ/mF1LcZ6', '2021-07-25 16:21:14', 1),
(133, 'ezazae', 'eza', 'zasq', 'SQ@0.dza', '$2y$10$pTa4pOI9SqnLimMdcCUT4.ois6FFSSWgAEZzJyNT5gR9Drxjz8L2C', '2021-07-25 16:22:34', 1),
(134, 'aza', 'za', 'zea', 'eza@eza.ezaeza', '$2y$10$Xz4PgwY3Nx457Z6SOrSIiuPHbEUps/YVP1l51lr2j9ByeNYr5Rv06', '2021-07-25 16:23:26', 1),
(135, 'ezaeza', 'eza', 'eza', 'eza@aaaaaaaa.aaaaaaaaaa', '$2y$10$jEUwjY.Zms52IwyYgUOrLel.z.mdnj4ypuy9Dw5CFgo2RauAgdUwi', '2021-07-25 16:25:00', 1),
(136, 'test', 'test', 'rez', 'rez@ez.ferez', '$2y$10$8n3ovTQ1jnWZFLC2ZwOjF.mOX7yyqrrc.x6gupmH0xx0hovbx6SZW', '2021-07-25 16:26:46', 1),
(141, 'azazaez', 'eza', 'ezaaez', 'eza@eza.ezaezaeaz', '$2y$10$yx29KSV1sjllxiOqLYKYbO6JoJui3X99kxP6wtvquVtj40PyqGB8K', '2021-07-25 18:46:04', 1),
(149, '', '', '', '', '$2y$10$h4vG/sajNjZLqkhDwXVHsOGx0i1RfnLNZcSatUKyQ7tKdVpfKLZ5m', '2021-07-25 19:24:45', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
