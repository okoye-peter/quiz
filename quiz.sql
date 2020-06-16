-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 02:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `biology`
--

CREATE TABLE `biology` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biology`
--

INSERT INTO `biology` (`id`, `question`, `answer`, `option1`, `option2`, `option3`, `created_at`, `updated_at`) VALUES
(1, 'A plant which grows on another plant without apparent harm to the host plant is called', 'an epiphyte', 'a saprophyte', 'a parasite', 'a hermaphrodite', '2020-01-30 08:19:44', '2020-01-30 08:19:44'),
(2, 'One of the function of xylem is', 'strengthening the stem', 'manufacturing food', 'reducing loss of water', 'storing unused sugar', '2020-01-30 08:19:44', '2020-01-30 08:19:44'),
(3, 'People suffering from myopia', ' can see near object clearly', 'can see far away object clearly', 'cannot see any object clearly', ' are colour blind', '2020-01-30 08:19:44', '2020-01-30 08:19:44'),
(4, 'The cilia in paramecium are use for', 'locomotion', 'respirating', 'protection', 'excretion', '2020-01-30 08:19:44', '2020-01-30 08:19:44'),
(5, 'Euglena may be classified as a plant because it', 'has chloroplast', 'has a gullet', 'has pellicle', 'possesses a flagellum', '2020-01-30 08:19:44', '2020-01-30 08:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `chemistry`
--

CREATE TABLE `chemistry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chemistry`
--

INSERT INTO `chemistry` (`id`, `question`, `answer`, `option1`, `option2`, `option3`, `created_at`, `updated_at`) VALUES
(1, 'Which of the following statements is NOT correct?', 'At constant temperature, the volume of a gas increases as the pressure increases', 'The average kinetic energy of a gas is directly proportional to its temperature', 'The temperature of a gas is directly proportional to its volume', 'The pressure of a gas is inversely proportional to its volume', '2020-01-29 14:31:08', '2020-01-29 14:31:08'),
(2, 'Zinc Oxide is a', 'Amphoteric Oxide', 'Basic Oxide', 'Acidic Oxide', 'Neutral Oxide', '2020-01-29 14:31:08', '2020-01-29 14:31:08'),
(3, 'When sodium chloride and metallic sodium are each dissolved in water', 'the dissolution of metallic sodium is exothermic', 'both processes are exothermic', 'the dissolution of metallic sodium is endothermic', 'both processes are endothermic', '2020-01-29 14:31:08', '2020-01-29 14:31:08'),
(4, 'The periodic classification of elements is an arrangement of the elements in order of their', 'Atomic Numbers', 'Atomic Masses', 'Atomic Weights', 'Molecular Weights', '2020-01-29 14:31:08', '2020-01-29 14:31:08'),
(5, 'Elements P, Q, R, S have 6, 11, 15, 17 electrons respectively, therefore,', 'Q will form an electrovalent bond with S', 'P will form an electrovalent bond with R', 'Q will form a covalent bond with R', ' Q will form a covalent bond with S', '2020-01-29 14:31:08', '2020-01-29 14:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `economics`
--

CREATE TABLE `economics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `economics`
--

INSERT INTO `economics` (`id`, `question`, `answer`, `option1`, `option2`, `option3`, `created_at`, `updated_at`) VALUES
(1, 'Suppose that the equilibrium price of an article is N5.00 but the government fixes the price by law at N4.00, the supply will be', 'Less than the equilibrium supply', 'Greater than equilibrium supply', 'The same as equilibrium supply', 'None of these', '2020-01-30 08:36:22', '2020-01-30 08:36:22'),
(2, 'A budget deficit means', 'That a government is spending more than in takes in taxation', 'That a government is spending less than it takes in taxation', 'That a government is spending as much as it takes in taxation', 'That a country is buying more than is selling', '2020-01-30 08:36:22', '2020-01-30 08:36:22'),
(3, 'When elasticity is zero, the demand curve is', 'Downward slopping', 'Perfectly elastic', 'Perfectly inelastic', 'Concave', '2020-01-30 08:36:22', '2020-01-30 08:36:22'),
(4, 'The following is NOT a reason for the existence of small firms', 'Expansion brings diminishing returns', 'Scale of production is limited by size of the market', 'Large firms can carter for wide markets', 'Small firms can provide personal services', '2020-01-30 08:36:22', '2020-01-30 08:36:22'),
(5, 'Inferior goods are referred to in Economics as goods', 'Whose consumption falls when cunsumers\' income rises', 'Consumed by very poor people', 'Whose quality is low', 'Which satisfy only the basic needs', '2020-01-30 08:36:22', '2020-01-30 08:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `english language`
--

CREATE TABLE `english language` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `english language`
--

INSERT INTO `english language` (`id`, `question`, `answer`, `option1`, `option2`, `option3`, `created_at`, `updated_at`) VALUES
(1, 'Choose the option that best completes the gap.  I was seriously disappointed when the __________ between the two teams ended in a goalless draw', 'match', 'march', 'marsh', 'martch', '2020-01-30 09:17:55', '2020-01-30 09:17:55'),
(2, 'Choose the option that best completes the gap. The young man looked carefully at the long document, but he couldn\'t make __________ what it meant', 'out', 'up', 'off', 'through', '2020-01-30 09:17:55', '2020-01-30 09:17:55'),
(3, 'Choose the option that best explains the information conveyed in the sentence. Adawo is an imp', 'Adawo behaves badly', 'Adawo behaves queenly', 'Adawo behaves decently', 'Adawo behaves differently', '2020-01-30 09:17:55', '2020-01-30 09:17:55'),
(4, 'Choose the option that best explains the information conveyed in the sentence. If he were here, it could be more fun', 'He did not show up and so the occasion lacked much fun', 'He was being expected to supply more fun', 'He was expected but did not show up to liven up the occasion', 'There was no fun because he was not present', '2020-01-30 09:17:55', '2020-01-30 09:17:55'),
(5, 'Choose the option that best explains the information conveyed in the sentence. The events of last Friday show that there is no love lost between the Principal and the Vice-principal', 'They dislike each other', 'They work independently', 'They couldn\'t part company', 'They like each other', '2020-01-30 09:17:55', '2020-01-30 09:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `mathematics`
--

CREATE TABLE `mathematics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mathematics`
--

INSERT INTO `mathematics` (`id`, `question`, `answer`, `option1`, `option2`, `option3`, `created_at`, `updated_at`) VALUES
(1, 'A group of market women sell at least one of yam, plantain and maize. 12 of them sell maize, 10 sell yam and 14 sell plantain. 5 sell plantain and maize, 4 sell yam and maize, 2 sell yam and plantain only while 3 sell all the three items. How many women are in the group?', '25', '19', '18', '17', '2020-01-30 09:06:48', '2020-01-30 09:06:48'),
(2, 'A trader bought 100 oranges at 5 for N1.20, 20 oranges got spoilt and the remaining were sold at 4 for N1.50. Find the percentage gain or loss.', '25% gain', '30% gain', '30% loss', '25% loss', '2020-01-30 09:06:48', '2020-01-30 09:06:48'),
(3, 'In a class of 40 students, 32 offer Mathematics, 24 offer Physics and 4 offer neither Mathematics nor Physics. How many offer both Mathematics and Physics?', '20', '16', '4', '8', '2020-01-30 09:06:48', '2020-01-30 09:06:48'),
(4, 'If X, Y can take values from the set (1, 2, 3 ,4), find the probability that the product of X and Y is not greater than 6', '3/8', '5/16', '5/8', '1/2', '2020-01-30 09:06:48', '2020-01-30 09:06:48'),
(5, 'The pie chart shows the monthly expenditure of a public servant. The monthly expenditure on housing is twice that of school fees. How much does the worker spend on housing if his monthly income is N7200?', '2000', '1000', '4000', '3000', '2020-01-30 09:06:48', '2020-01-30 09:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `physics`
--

CREATE TABLE `physics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `physics`
--

INSERT INTO `physics` (`id`, `question`, `answer`, `option1`, `option2`, `option3`, `created_at`, `updated_at`) VALUES
(1, 'The inner diameter of a test tube can be measured accurately using a', 'pair of vernier calipers', 'micrometer screw guage', 'pair of dividers', 'metre rule', '2020-01-30 08:54:18', '2020-01-30 08:54:18'),
(2, 'Two bodies have masses in the ratio 3:1. They experience forces which impart to them acceleration in the ratio 2:9 respectively. Find the ratio of forces the masses experienced.', '2 : 3', '1 : 4', '2 : 1', '2 : 5', '2020-01-30 08:54:18', '2020-01-30 08:54:18'),
(3, 'Particles of mass 10^-2kg is fixed to the tip of a fan blade which rotates with angular velocity of 100rad-1. If the radius of the blade is 0.2m, the centripetal force is', '20 N', '200 N', '2 N', '400 N', '2020-01-30 08:54:18', '2020-01-30 08:54:18'),
(4, 'a lead bullet of mass 0.05kg is fired with a velocity of 200ms-1 into a lead block of mass 0.95kg. Given that the lead block can move freely, the final kinetic energy after impact is', '50 J', '100 J', '150 J', '200 J', '2020-01-30 08:54:18', '2020-01-30 08:54:18'),
(5, 'A ball of mass 0.1kg is thrown vertically upwards with a speed of 10ms-1 from the top of a tower 10m high. Neglecting air resistance, its total energy just before hitting the ground is\r\n(take g = 10ms-2)', '15 J', '5 J', '20 J', '10 J', '2020-01-30 08:54:18', '2020-01-30 08:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `scores` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`scores`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `scores`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"Mathematics\":4,\"English Language\":5,\"Physics\":5,\"Chemistry\":5}', '2020-05-18 05:38:34', '2020-05-18 05:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Santa Donald', 'http://res.cloudinary.com/chathub/image/upload/c_fit,h_150,w_150/il3naen6d96aa4jwp6iu.png', 'Santa@gmail.com', NULL, '$2y$10$lrAfSa8cjgJI3kpYnexj8uXT6SuZ..dHbI5Oj5U6z6PzZSH8vfVmK', NULL, '2020-01-29 13:14:00', '2020-01-29 13:14:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biology`
--
ALTER TABLE `biology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemistry`
--
ALTER TABLE `chemistry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `economics`
--
ALTER TABLE `economics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `english language`
--
ALTER TABLE `english language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mathematics`
--
ALTER TABLE `mathematics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physics`
--
ALTER TABLE `physics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `results_user_id_unique` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biology`
--
ALTER TABLE `biology`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chemistry`
--
ALTER TABLE `chemistry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `economics`
--
ALTER TABLE `economics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `english language`
--
ALTER TABLE `english language`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mathematics`
--
ALTER TABLE `mathematics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `physics`
--
ALTER TABLE `physics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
