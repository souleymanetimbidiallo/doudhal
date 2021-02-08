-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 10:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doudhal`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `content`, `status`, `question_id`) VALUES
(1, 'Pratical Home Page', 0, 1),
(2, 'Personal HTML Page', 0, 1),
(3, 'PHP HyperText Prepocessor', 1, 1),
(4, 'Programming HTML Page', 0, 1),
(5, 'langage de programmation', 0, 1),
(6, 'langage de modélisation', 0, 1),
(7, 'langage de requête', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Communication', 'Cette catégorie regroupe les cours sur le domaine de communication'),
(2, 'Développement personnel', 'Cette catégorie regroupe les cours sur le développement personnel'),
(3, 'Entrepreneuriat', 'Cette catégorie regroupe les cours sur le domaine de l\'entrepreneuriat'),
(4, 'Gestion de projet', 'Cette catégorie regroupe les cours sur la gestion d\'un projet'),
(5, 'Gestion des organismes', 'Cette catégorie regroupe les cours sur la gestion d\'un organisme'),
(6, 'Digital', 'Cette catégorie liste l\'ensembles de cours proposés en digital'),
(7, 'Informatique & internet', 'Cette catégorie regroupe les cours sur le domaine de l\'informatique'),
(8, 'Techniques de recherche d\'emploi', 'Cette catégorie regroupe les cours sur les techniques de recherche d\'un emploi');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `price` double DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `price`, `creation_date`, `duration`, `picture`, `category_id`, `user_id`) VALUES
(1, 'Apprenez PHP', 'Ce cours vous apprendra à mieux gérer votre site web de manière dynamique à l\'aide du langage PHP.', 300000, '2020-12-27', NULL, 'php.jpg', 7, 1),
(2, 'Entrepreneuriat', 'Efficiently maximize top-line experiences before holistic methods of empowerment. Progressively transition visionary niches through magnetic human capital. Globally matrix progressive imperatives vis-a-vis long-term high-impact relationships. Competently restore competitive platforms and enabled networks. Efficiently coordinate strategic paradigms.', 0, '2020-12-27', NULL, 'entrepreneurship.jpg', 3, 2),
(3, 'Gestion de projet', 'Efficiently maximize top-line experiences before holistic methods of empowerment. Progressively transition visionary niches through magnetic human capital. Globally matrix progressive imperatives vis-a-vis long-term high-impact relationships. Competently restore competitive platforms and enabled networks. Efficiently coordinate strategic paradigms.', 0, '2020-12-27', NULL, 'project-managment.jpg', 4, 2),
(5, 'Apprendre CSS', 'Energistically optimize covalent manufactured products without alternative benefits. Collaboratively benchmark goal-oriented testing procedures without front-end alignments. Conveniently productivate functionalized supply chains without accurate synergy. Synergistically target just in time products with B2C paradigms. Dramatically provide access to highly efficient interfaces via interoperable information.\r\n\r\nEnergistically innovate virtual portals through effective benefits. Proactively build team building niche markets through sustainable total linkage. Efficiently orchestrate frictionless niche markets whereas proactive catalysts for change. Assertively syndicate resource-leveling growth strategies with holistic networks. Professionally parallel task orthogonal ROI vis-a-vis installed base e-tailers.\r\n\r\nAssertively evolve robust \"outside the box\" thinking before future-proof scenarios. Uniquely optimize standardized data through fully tested best practices. Seamlessly transform leveraged content before sustainable technology. Rapidiously redefine bleeding-edge outsourcing via one-to-one infrastructures. Continually aggregate economically sound convergence vis-a-vis adaptive information.\r\n\r\nContinually exploit distinctive data vis-a-vis B2C niches. Collaboratively synergize ubiquitous manufactured products and superior communities. Competently harness B2C growth strategies through goal-oriented infomediaries. Completely promote business experiences rather than extensive growth strategies.', 350000, '0000-00-00', '00:00:00', 'css.jpeg', 7, 1),
(6, 'Rendez vos sites interactifs avec JavaScript ', 'Globally create market positioning paradigms and cutting-edge \"outside the box\" thinking. Competently recaptiualize high-payoff technologies through business meta-services. Seamlessly negotiate distributed quality vectors with corporate sources. Appropriately visualize functional leadership whereas superior content. Dramatically envisioneer intermandated communities through turnkey convergence.\r\n\r\nDramatically negotiate 24/365 services without mission-critical web services. Interactively integrate out-of-the-box expertise with robust relationships. Quickly extend empowered supply chains vis-a-vis premier growth strategies. Objectively morph functionalized alignments with effective technologies. Proactively maximize cost effective innovation via resource-leveling opportunities.\r\n\r\nCollaboratively leverage other\'s B2C functionalities without highly efficient sources. Proactively engage innovative e-business before revolutionary infomediaries. Credibly morph front-end solutions for cross-media core competencies. Synergistically morph technically sound deliverables with long-term high-impact catalysts for change. Compellingly extend optimal resources after top-line alignments.\r\n\r\nCompletely initiate cross-unit expertise before backend partnerships. Rapidiously incubate intermandated e-business without competitive metrics. Professionally grow impactful intellectual capital through 24/7 leadership skills. Energistically innovate fully tested interfaces and sustainable core competencies. Seamlessly fabricate viral collaboration and idea-sharing via.', 0, '2021-01-01', '20:00:00', 'js.jpeg', 7, 11),
(7, 'Apprendre JS', 'blllldldldla', 0, '2021-01-21', '20:00:00', 'swift.jpeg', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `content`, `section_id`) VALUES
(1, 'Installation de PHP', 'contenu du cours', 1),
(2, 'Les bases du langage', 'contenu du cours', 1),
(3, 'Introduction', 'contenu du cours', 3),
(4, 'Contexte du projet', 'contenu du cours', 4);

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `name`, `type`, `location`) VALUES
(1, 'Apprenez le langage PHP', 'image', '_Inoma_tinde_(128k).mp3'),
(2, 'Introduction à PHP', 'image', 'lorem-ipsum.pdf'),
(3, 'Introduction à PHP', 'image', '151_Final_Paper.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `media_lessons`
--

CREATE TABLE `media_lessons` (
  `lesson_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_lessons`
--

INSERT INTO `media_lessons` (`lesson_id`, `media_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `amount`, `status`, `course_id`, `user_id`) VALUES
(1, '2020-12-28 00:00:00', 300000, 'Terminé', 1, 7),
(2, '2020-12-27 00:00:00', 0, 'Terminé', 2, 5),
(3, '2020-12-27 00:00:00', 0, 'En cours de lecture', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `quiz_id`) VALUES
(1, 'Question 1', 'L\'acronyme de PHP ?', 1),
(2, 'Question 2', 'La syntaxe de création d\'un tableau en PHP', 1),
(3, 'Question 1', 'SQL est : ', 2),
(4, 'Question 1', 'MySQL est un : ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `description`, `section_id`) VALUES
(1, 'Quiz - PHP', 'Testez vos connaissances en PHP', 1),
(2, 'Quiz - MySQL', 'Testez vos connaissances en MySQL', 2),
(3, 'Quiz - Création de projet', 'Testez vos connaissances pour la création d\'un projet', 3),
(4, 'Quiz - Gestion de projet', 'Testez vos connaissances dans la gestion d\'un projet', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `description`, `course_id`) VALUES
(1, 'Introduction à PHP', 'description de l\'intro', 1),
(2, 'Mise en place de la base de données avec MySQL', 'description de la section', 1),
(3, 'Création d\'un projet', 'description de la section', 3),
(4, 'Gestion de projet', 'description de la section', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `login`, `password`, `mail`, `tel`, `address`, `status`, `avatar`) VALUES
(1, 'Souleymane', 'Diallo', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'xenlior.sturinak@gmailcom', NULL, NULL, 'admin', 'photo1.png'),
(2, 'first', 'last', 'first', '98bd1c45684cf587ac2347a92dd7bb51', 'first.last@example.fr', NULL, NULL, NULL, NULL),
(3, 'Sidiki', 'Camara', 'cams_174', NULL, 'sidiki.camara@gmailcom', NULL, NULL, NULL, NULL),
(4, 'Jean Pierre', 'Tielmans', 'jptmans42', NULL, 'jtielmans28@gmail.com', NULL, NULL, NULL, NULL),
(5, 'Mohamed', 'Keita', 'keitamansa63', NULL, 'keitamohamed1998@yahoo.fr', NULL, NULL, NULL, NULL),
(6, 'Marina', 'Azarov', 'maraz42ru', NULL, 'azmarmilatov@yahoo.fr', NULL, NULL, NULL, NULL),
(7, 'Catherine', 'Giselbert', 'Katharina106', NULL, 'kathgiselbert@hotmail.fr', NULL, NULL, NULL, NULL),
(8, 'Francois', 'Krause', 'maraz42ru', NULL, 'krause.francois@wanadoo.fr', NULL, NULL, NULL, NULL),
(9, 'John', 'Smith', 'jsmedina22', NULL, 'john.smith@societe.com', NULL, NULL, NULL, NULL),
(10, 'Matthieu', 'Froussard', 'fratthie12', NULL, 'frispaleman@gmail.com', NULL, NULL, NULL, NULL),
(11, 'Ewen', 'Laudet', 'elaudet', '37937c37ea6f2de4de7d', NULL, NULL, NULL, NULL, NULL),
(12, 'Mamadou Maladho', 'Diallo', 'maladho', '597bd9228ace362fcf0b5eb45e863dc3', 'maladho@gmail.com', '+33751457133', NULL, NULL, NULL),
(13, 'Mamadou Maladho', 'Diallo', 'maladho', '597bd9228ace362fcf0b5eb45e863dc3', 'maladho@gmail.com', '+33751457133', NULL, NULL, NULL),
(14, 'Ipsum', 'Lorem', 'dummy', '393140de559aa7a85b0aa78421d61e78', 'lorem@ipsum.com', '+33751457133', NULL, NULL, NULL),
(15, 'Salimatou', 'Diallo', 'salima', '82926b9600caab920949fd82bd1e5320', 'salima@gmail.com', '+33751457133', NULL, NULL, NULL),
(16, 'Salimatou', 'Diallo', 'salima', '82926b9600caab920949fd82bd1e5320', 'salima@gmail.com', '+33751457133', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_quizzes`
--

CREATE TABLE `user_quizzes` (
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_quizzes`
--

INSERT INTO `user_quizzes` (`quiz_id`, `user_id`, `score`) VALUES
(1, 3, 10),
(1, 4, 7),
(1, 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_answer` (`question_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_course` (`user_id`),
  ADD KEY `fk_category_course` (`category_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_section_lesson` (`section_id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_lessons`
--
ALTER TABLE `media_lessons`
  ADD PRIMARY KEY (`lesson_id`,`media_id`),
  ADD KEY `fk_media_full` (`media_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_order` (`course_id`),
  ADD KEY `fk_user_order` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quiz_question` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_section_quiz` (`section_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_section` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_quizzes`
--
ALTER TABLE `user_quizzes`
  ADD PRIMARY KEY (`quiz_id`,`user_id`),
  ADD KEY `fk_user_full` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_question_answer` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_category_course` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_user_course` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `fk_section_lesson` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `media_lessons`
--
ALTER TABLE `media_lessons`
  ADD CONSTRAINT `fk_lesson_full` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`),
  ADD CONSTRAINT `fk_media_full` FOREIGN KEY (`media_id`) REFERENCES `medias` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_course_order` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_quiz_question` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `fk_section_quiz` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `fk_course_section` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `user_quizzes`
--
ALTER TABLE `user_quizzes`
  ADD CONSTRAINT `fk_quiz_full` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `fk_user_full` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
