-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 juin 2023 à 08:34
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogmvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `chapo` tinytext,
  `content` longtext,
  `date` datetime DEFAULT NULL,
  `post_author` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_blogpost_user_idx` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `chapo`, `content`, `date`, `post_author`) VALUES
(2, 'Sql index 101', 'Les bases des index SQL', 'In SQL, an index is a data structure that is used to improve the performance of queries by allowing for faster data retrieval. An index is created on one or more columns of a table and is essentially a way of organizing the data in the table to speed up searches.\r\n\r\nWhen a query is executed, the database engine first looks at the index to find the relevant rows, rather than scanning the entire table. This makes queries faster and more efficient, especially when working with large datasets.\r\n\r\nThere are several types of indexes in SQL, including primary keys, unique indexes, and non-unique indexes. Primary keys are used to uniquely identify each row in a table and are automatically indexed by the database. Unique indexes ensure that each value in a column is unique, and non-unique indexes are used to speed up searches on columns that are frequently queried.\r\n\r\nCreating an index in SQL involves using the CREATE INDEX statement, which specifies the table and column(s) to be indexed. It\'s important to carefully consider which columns to index, as indexing too many columns or creating unnecessary indexes can actually slow down query performance.\r\n\r\nIn summary, SQL indexing is a powerful tool for improving query performance in databases. By creating indexes on the appropriate columns, you can speed up searches and improve the overall efficiency of your database operations.', '2023-03-13 13:29:23', 2),
(4, 'Le format des Date en SQL', 'Tous les diffÃ©rents format de Date en SQL ', 'Date format is an important aspect of working with databases, and it can be a bit tricky to work with if you\'re not familiar with it. In this article, we\'ll discuss what date format is, how it is represented in SQL, and some tips and tricks for working with it.\r\nWhat is Date Format?\r\n\r\nIn computing, date format refers to the way a date is represented as a string. This can vary depending on the country, culture, and the system being used. For example, in the United States, the date format is usually represented as mm/dd/yyyy, while in Europe, it is often represented as dd/mm/yyyy.\r\nDate Format in SQL\r\n\r\nIn SQL, dates are typically represented as strings in the format \'yyyy-mm-dd\'. This format is known as the ISO format and is used as the standard for SQL databases. The ISO format is also widely used in other areas of computing and is recognized by most programming languages.\r\n\r\nIn addition to the ISO format, SQL also supports several other date formats. For example, some databases support the use of \'mm/dd/yyyy\' or \'dd/mm/yyyy\' formats. However, it\'s important to note that the exact syntax used to represent dates can vary depending on the database management system (DBMS) being used.\r\nWorking with Dates in SQL\r\n\r\nWorking with dates in SQL can be a bit tricky, especially when dealing with date arithmetic or comparing dates. Here are a few tips and tricks for working with dates in SQL:\r\n\r\n    To add or subtract a certain number of days from a date, you can use the DATEADD function. For example, to add 7 days to a date, you could use the following SQL statement:\r\n\r\n    sql\r\n\r\nSELECT DATEADD(day, 7, \'2021-12-23\');\r\n\r\nTo compare dates, you can use the comparison operators (e.g., <, >, <=, >=, =). When comparing dates, it\'s important to make sure that the dates are in the same format. If they are not, you may need to use the CONVERT function to convert the dates to a common format before comparing them.\r\n\r\nWhen working with date ranges, you can use the BETWEEN operator to select all records where the date falls within a certain range. For example, the following SQL statement would select all records where the date falls between \'2021-12-01\' and \'2021-12-31\':\r\n\r\nsql\r\n\r\nSELECT * FROM mytable WHERE mydate BETWEEN \'2021-12-01\' AND \'2021-12-31\';\r\n\r\nTo extract specific parts of a date (e.g., year, month, day), you can use the DATEPART function. For example, the following SQL statement would extract the year from a date:\r\n\r\nsql\r\n\r\n    SELECT DATEPART(year, \'2021-12-23\');\r\n\r\n    If you need to perform complex date calculations or operations, you may want to consider using a programming language or tool that is better suited for working with dates, such as Python or Excel.\r\n\r\nConclusion\r\n\r\nDate format is an important aspect of working with databases and is a key component of date-related operations and functions in SQL. By understanding the basics of date format and how it is represented in SQL, you can improve your ability to work with dates in SQL and avoid common mistakes and errors.', '2023-03-14 13:24:04', 1),
(5, 'Les meilleurs raccourcis claviers', 'Les raccourcis les plus utiles sur Windows', 'Les raccourcis claviers peuvent Ãªtre un moyen pratique et efficace de naviguer sur un ordinateur Windows, en vous permettant de gagner du temps et d\'augmenter votre productivitÃ©. Dans cet article, nous allons explorer les raccourcis claviers les plus utiles pour Windows.\r\n\r\n    Copier, couper et coller :\r\n    Les raccourcis claviers pour copier, couper et coller sont sans doute les plus utiles. Pour copier, appuyez sur \"Ctrl + C\". Pour couper, appuyez sur \"Ctrl + X\". Pour coller, appuyez sur \"Ctrl + V\".\r\n\r\n    Annuler et rÃ©tablir :\r\n    Si vous avez besoin d\'annuler une action, appuyez sur \"Ctrl + Z\". Si vous avez besoin de rÃ©tablir une action annulÃ©e, appuyez sur \"Ctrl + Y\".\r\n\r\n    Ouvrir le gestionnaire de tÃ¢ches :\r\n    Si vous rencontrez des problÃ¨mes avec votre ordinateur, vous pouvez ouvrir le gestionnaire de tÃ¢ches pour voir les processus en cours d\'exÃ©cution. Pour ce faire, appuyez sur \"Ctrl + Shift + Ã‰chap\".\r\n\r\n    Basculer entre les applications :\r\n    Si vous avez plusieurs applications ouvertes, vous pouvez rapidement basculer entre elles en utilisant la combinaison de touches \"Alt + Tab\".\r\n\r\n    Fermer une application :\r\n    Si vous avez besoin de fermer rapidement une application, appuyez sur \"Alt + F4\". Cela fermera l\'application active.\r\n\r\n    Prendre une capture d\'Ã©cran :\r\n    Pour prendre une capture d\'Ã©cran de l\'ensemble de l\'Ã©cran, appuyez sur \"Windows + PrintScreen\". Si vous souhaitez prendre une capture d\'Ã©cran d\'une fenÃªtre spÃ©cifique, appuyez sur \"Alt + PrintScreen\".\r\n\r\n    Ouvrir le menu DÃ©marrer :\r\n    Pour ouvrir le menu DÃ©marrer, appuyez sur la touche Windows. Vous pouvez ensuite naviguer dans le menu en utilisant les touches flÃ©chÃ©es.\r\n\r\n    Ouvrir l\'explorateur de fichiers :\r\n    Pour ouvrir l\'explorateur de fichiers, appuyez sur \"Windows + E\". Cela vous permettra de naviguer rapidement dans vos fichiers et dossiers.\r\n\r\n    Verrouiller l\'ordinateur :\r\n    Si vous souhaitez verrouiller rapidement votre ordinateur, appuyez sur \"Windows + L\". Cela verrouillera votre session et vous devrez saisir votre mot de passe pour la dÃ©verrouiller.\r\n\r\nEn conclusion, ces raccourcis claviers peuvent vous aider Ã  gagner du temps et Ã  augmenter votre productivitÃ©. Il en existe bien sÃ»r de nombreux autres, mais ces neuf raccourcis claviers sont les plus couramment utilisÃ©s. Essayez-les et voyez comment ils peuvent vous aider Ã  amÃ©liorer votre expÃ©rience de navigation sur Windows.', '2023-03-14 13:30:56', 1),
(9, 'Un super Article ', 'En fait du lorem ipsum', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec nisl vitae nibh bibendum hendrerit. Fusce consequat velit cursus, ullamcorper turpis at, auctor diam. Nunc laoreet ligula in diam molestie eleifend. Etiam faucibus, erat commodo commodo ultricies, ligula massa iaculis leo, sed ultrices justo augue eu magna. Suspendisse a ipsum porta, convallis lacus eu, ornare urna. Morbi enim nulla, rutrum a augue vel, venenatis pharetra sapien. Duis scelerisque leo nisl, a sollicitudin quam tempor eu. Maecenas eu nisi blandit, hendrerit sem in, feugiat diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin auctor nibh quis tortor ullamcorper bibendum.\r\n\r\nIn sollicitudin justo aliquet magna faucibus, ac suscipit dui bibendum. Cras blandit turpis in massa dignissim, at posuere orci sodales. Ut tempus maximus libero, quis elementum turpis posuere quis. Quisque varius odio sit amet massa porta sagittis. Proin mi metus, cursus ut mauris sed, aliquam blandit sem. Curabitur ut mi nec enim aliquet tincidunt. Maecenas eget magna ac libero vehicula cursus eget in turpis. Nullam sollicitudin placerat quam, id congue purus efficitur non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis semper, ligula ac bibendum ultricies, turpis ex viverra sem, sit amet rhoncus lacus nibh at velit. Donec gravida justo sit amet odio eleifend imperdiet nec eget justo. Maecenas sollicitudin aliquet pellentesque. Maecenas at massa at sapien pretium suscipit. In erat mi, varius sit amet lobortis a, commodo quis nibh. ', '2023-06-05 05:52:50', 9);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` mediumtext,
  `date` datetime DEFAULT NULL,
  `blogpost_id` int(11) NOT NULL,
  `comment_author` int(11) NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_comment_blogpost1_idx` (`blogpost_id`),
  KEY `fk_comment_user1_idx` (`comment_author`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `date`, `blogpost_id`, `comment_author`, `validation`) VALUES
(1, 'Love this article', '2023-03-27 07:14:27', 5, 2, 1),
(2, 'hello ', '2023-03-27 14:09:35', 5, 1, 1),
(3, 'Cette article m\'a beaucoup plus, auriez-vous des dÃ©tails !', '2023-06-04 15:09:14', 5, 10, 1),
(4, 'Le lorem ipsum c\'est ce qu\'il y a de mieux', '2023-06-05 06:10:34', 9, 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `home`
--

DROP TABLE IF EXISTS `home`;
CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email_address` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `admin_request` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `home`
--

INSERT INTO `home` (`id`, `name`, `email_address`, `message`, `admin_request`) VALUES
(1, 'Toto', 'toto@gmail.co', 'test\r\n', 0),
(5, 'Sarah', 'sarah@gmail.com', 'Je pense que je serai un bon administrateur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'ROLE_ADMIN'),
(2, 'ROLE_USER'),
(3, 'ROLE_GOD');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `catch_phrase` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `name`, `last_name`, `pic`, `catch_phrase`) VALUES
(1, 'toto@gmail.com', '$2y$10$6B9jYV710UyW8x0DhsZpT.cENx/w5jcOSC7mXGIkRMsjHnHOTC8wG', 'Toto', 'GRrrr', 'assets/media/img/default-profil-pic.png', 'Champion du monde d\'histoire de toto'),
(2, 'tata@gmail.com', 'tata', 'tata', 'Tata', 'uploads/63fcbdd53bf34.png', 'tatatata'),
(3, 'alex@gmail.com', '$2y$10$rOlmSIkLiAzhPALpLL5TnOEvPuPi4IyasSJdl8Xmjeykrw0DvvCrq', 'Alex', 'Dominguez', 'uploads/646b824e4af07.png', 'Yiha'),
(8, 'baba@gmail.com', '$2y$10$Dm4X40GgjHxDOrq9y212GuLZDRnWpiaPP2zNcffzM5LcrTp3tNrEe', 'Bastien', 'McLovin', 'uploads/647b0a59a949b.jpg', 'Yes nigga'),
(9, 'pablo@gmail.com', '$2y$10$7Wj1m8AdHLGZ.cfhmaTVeeQzZcEOBaqm6bCr5/zWQDUk0yeexgHne', 'pablo', 'hernandez', 'uploads/647b0bf4bed87.jpg', 'YOh'),
(10, 'sarah@gmail.com', '$2y$10$Wgy7rXRbcL5RH0eZ9dOx1OBTUJOjOadt3XEKNR58JY2KDj52FTR/m', 'Sarah', 'Croche', 'uploads/647b0c5fe255f.png', 'Yolo');

-- --------------------------------------------------------

--
-- Structure de la table `user_has_role`
--

DROP TABLE IF EXISTS `user_has_role`;
CREATE TABLE IF NOT EXISTS `user_has_role` (
  `userid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  PRIMARY KEY (`roleid`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_has_role`
--

INSERT INTO `user_has_role` (`userid`, `roleid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(3, 2),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `blogpost_user_id` FOREIGN KEY (`post_author`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_blogpost_id` FOREIGN KEY (`blogpost_id`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comment_user_id` FOREIGN KEY (`comment_author`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_role`
--
ALTER TABLE `user_has_role`
  ADD CONSTRAINT `user_has_role_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_has_role_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
