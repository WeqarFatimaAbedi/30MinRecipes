-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 04:52 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `modified_at`) VALUES
(1, 'Vegetarian', '28-07-2020', '2020-07-28 01:10:17'),
(2, 'Vegan', '28-07-2020', '2020-07-28 01:12:33'),
(3, 'Lacto Veg', '28-07-2020', '2020-07-28 01:12:37'),
(4, 'Ovo Veg', '28-07-2020', '2020-07-28 01:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `u_id` longtext NOT NULL,
  `r_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `u_id`, `r_id`, `comment`, `created_at`, `modified_at`) VALUES
(10, '2', 212227, 'Hi', '27-July-20', '2020-07-26 23:41:09'),
(13, '1', 731660, 'Ok, I also like it', '27-July-20', '2020-07-26 23:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_id`, `name`, `created_at`, `modified_at`) VALUES
(13, '212227', 'double-choc.jpg', '12-July-20', '2020-07-12 03:37:27'),
(14, '731660', 'vegan-chocolate-cheescake.jpg', '13-July-20', '2020-07-12 23:38:38'),
(15, '327524', 'Indian_Chinese_Vegetable_Fried_Rice_Recipe-4.jpg', '28-July-20', '2020-07-28 01:35:08'),
(16, '579636', 'vegetarian-biryani.jpeg', '28-July-20', '2020-07-28 01:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `ingrediant`
--

CREATE TABLE `ingrediant` (
  `id` int(11) NOT NULL,
  `ing_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingrediant`
--

INSERT INTO `ingrediant` (`id`, `ing_id`, `name`, `created_at`, `modified_at`) VALUES
(30, 212227, ' 215g (1 cup) caster sugar', '12-July-20', '2020-07-12 03:37:26'),
(31, 212227, ' 250g butter, chopped', '12-July-20', '2020-07-12 03:37:26'),
(32, 212227, ' 225g (11/2 cups) self-raising flour', '12-July-20', '2020-07-12 03:37:26'),
(33, 212227, ' 75g (1/2 cup) plain flour', '12-July-20', '2020-07-12 03:37:26'),
(34, 212227, ' 50g (1/2 cup) dark cocoa powder', '12-July-20', '2020-07-12 03:37:26'),
(35, 212227, ' 3 eggs, lightly whisked', '12-July-20', '2020-07-12 03:37:26'),
(36, 212227, ' 250g dark chocolate', '12-July-20', '2020-07-12 03:37:26'),
(37, 212227, ' (45% cocoa)', '12-July-20', '2020-07-12 03:37:26'),
(38, 212227, ' coca coarsely chopped', '12-July-20', '2020-07-12 03:37:27'),
(39, 212227, ' 2 x 340g pkts Nest Smarties', '12-July-20', '2020-07-12 03:37:27'),
(40, 731660, 'MERINGUES: 2 Egg whites 1/2 cup (110g) caster sugar', '13-July-20', '2020-07-12 23:38:37'),
(41, 731660, 'BISCUIT DOUGH: 125g butter, softened', '13-July-20', '2020-07-12 23:38:37'),
(42, 731660, '2/3 cup (150g) caster sugar', '13-July-20', '2020-07-12 23:38:37'),
(43, 731660, '2 Eggs 1 teaspoon vanilla bean paste', '13-July-20', '2020-07-12 23:38:37'),
(44, 731660, '1 1/3 cups (200g) self-raising flour 1 cup (150g) plain flour', '13-July-20', '2020-07-12 23:38:37'),
(45, 731660, 'SWISS MERINGUE BUTTERCREAM: 6 Egg whites', '13-July-20', '2020-07-12 23:38:37'),
(46, 731660, '1 1/2 cups (330g) caster sugar 500g butter, softened', '13-July-20', '2020-07-12 23:38:37'),
(47, 731660, '1/2 teaspoon raspberry-flavoured baking paste (optional) Pink liquid food colouring', '13-July-20', '2020-07-12 23:38:37'),
(48, 731660, 'TO BAKE AND ASSEMBLE: 1 Egg white 2 teaspoons caster sugar', '13-July-20', '2020-07-12 23:38:37'),
(49, 731660, '1/2 cup (160g) raspberry jam Raspberries, to serve', '13-July-20', '2020-07-12 23:38:38'),
(50, 327524, 'fdfdfdfdfdfgfgfgh', '28-July-20', '2020-07-28 01:35:08'),
(51, 327524, 'gfgfdg', '28-July-20', '2020-07-28 01:35:08'),
(52, 327524, 'fgfgdf', '28-July-20', '2020-07-28 01:35:08'),
(53, 327524, 'gfgfgdfgdf', '28-July-20', '2020-07-28 01:35:08'),
(54, 327524, 'gfg fg fgdgfg', '28-July-20', '2020-07-28 01:35:08'),
(55, 327524, 'fgdfgfg', '28-July-20', '2020-07-28 01:35:08'),
(56, 327524, 'gfdg', '28-July-20', '2020-07-28 01:35:08'),
(57, 579636, 'fddddddddddddfsdfdfsd', '28-July-20', '2020-07-28 01:36:18'),
(58, 579636, 'fdddddddddddddddddddddfsdfsfsd', '28-July-20', '2020-07-28 01:36:18'),
(59, 579636, 'fdssssssssssdfdfsdfsdf', '28-July-20', '2020-07-28 01:36:18'),
(60, 579636, 'fdssssssssssssdfdfdfdfdfdf', '28-July-20', '2020-07-28 01:36:18'),
(61, 579636, 'fdfdfdfdfdsffds', '28-July-20', '2020-07-28 01:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `u_id` longtext NOT NULL,
  `r_id` int(10) NOT NULL,
  `day_name` text NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `u_id`, `r_id`, `day_name`, `created_at`, `modified_at`) VALUES
(17, '1', 212227, 'Monday', '27-July-20', '2020-07-26 23:51:17'),
(18, '1', 212227, 'Wednesday', '27-July-20', '2020-07-26 23:51:24'),
(19, '1', 731660, 'Friday', '27-July-20', '2020-07-26 23:51:37'),
(20, '1', 731660, 'Tuesday', '27-July-20', '2020-07-26 23:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

CREATE TABLE `method` (
  `id` int(11) NOT NULL,
  `m_id` int(255) NOT NULL,
  `name` longtext NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `method`
--

INSERT INTO `method` (`id`, `m_id`, `name`, `created_at`, `modified_at`) VALUES
(25, 212227, 'Preheat the oven to 160C/140C fan forced. Grease a round 20cm cake pan and line the base with baking paper. Combine the sugar, 125g butter and 250ml (1 cup) water in a saucepan. Place over medium-low heat and cook, stirring occasionally, for 3-5 minutes u', '12-July-20', '2020-07-12 03:37:27'),
(26, 212227, 'Add the cooled butter mixture and the eggs and use a metal spoon to gently fold until just combined. Pour into the prepared pan. Bake for 50 minutes or until a skewer inserted into the centre comes out clean. Set aside for 10 minutes to cool slightly before turning out onto a wire rack to cool completely. Combine the chocolate and the remaining 125g butter in a heatproof bowl over a saucepan of simmering water (make sure the bowl doesnt touch the water). Cook, stirring occasionally, for 5 minutes or until melted and smooth.\r\n', '12-July-20', '2020-07-12 03:54:02'),
(27, 212227, ' Set aside to cool for about 20 minutes or until a spreadable consistency. Divide the Smarties into separate colours. Reserve about 1/4 cup chocolate mixture and set aside. Spread the remaining chocolate mixture over the top and side of the cake. Working ', '12-July-20', '2020-07-12 03:37:27'),
(28, 731660, 'Line a baking tray with baking paper. Use an electric mixer to whisk the egg whites in a clean, dry bowl until soft peaks form. Gradually add sugar, 1 tablespoon at a time, beating well after each addition. Continue beating until sugar is completely dissolved. Spoon the meringue mixture into a piping bag fitted with a 1cm fluted nozzle. Pipe meringues in different sizes onto the lined tray. Bake for 1 hour or until dry to the touch', '13-July-20', '2020-07-12 23:38:38'),
(29, 731660, 'Turn oven off. Leave meringues in the oven, with the door ajar, to cool completely To make the biscuit dough, use an electric mixer to beat the butter, sugar and vanilla in a large bowl until pale and creamy. Add the eggs, 1 at a time, beating well after each addition. Add the combined flour and stir to combine. Turn onto a lightly floured surface and gently knead until smooth. Shape into a disc. Cover with plastic wrap and place in the fridge for 30 mins to rest.', '13-July-20', '2020-07-12 23:38:38'),
(30, 731660, 'To make the Swiss meringue buttercream, combine the egg whites and sugar in a clean, dry heatproof bowl. Place over a saucepan of simmering water and use a balloon whisk to whisk for 8-10 mins or until the sugar completely dissolves and mixture reaches 70ï¿½C on a sugar thermometer. Remove from heat.', '13-July-20', '2020-07-12 23:38:38'),
(31, 731660, 'Remove centre and reserve with the excess dough. Transfer the large heart on the paper to a baking tray. Repeat with the remaining dough portion. Bake large hearts, swapping the trays halfway through cooking, for 12-15 mins or until light golden. Set aside on trays to cool. Line another baking tray with baking paper. Roll out reserved dough on a lightly floured surface to a 3mm-thick disc. Use small heart cutters to cut out shapes and place on the lined tray. ', '13-July-20', '2020-07-12 23:38:38'),
(32, 731660, 'Brush the small hearts with a little egg white and sprinkle with sugar. Bake for 5 mins or until light golden. Set aside on the tray to cool. Place half the buttercream in a piping bag fitted with a 2cm plain nozzle. Place 1 large biscuit heart on a serving plate. Pipe buttercream in 2 rows over the biscuit. Spoon jam into the gaps between the rows. Top with remaining large biscuit heart. Pipe remaining buttercream in 2 rows over the top of the biscuit. Decorate with meringues, small biscuit hearts and raspberries.', '13-July-20', '2020-07-12 23:38:38'),
(33, 327524, 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', '28-July-20', '2020-07-28 01:35:08'),
(34, 327524, 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', '28-July-20', '2020-07-28 01:35:08'),
(35, 327524, 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', '28-July-20', '2020-07-28 01:35:08'),
(36, 327524, 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', '28-July-20', '2020-07-28 01:35:08'),
(37, 327524, 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', '28-July-20', '2020-07-28 01:35:08'),
(38, 327524, 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', '28-July-20', '2020-07-28 01:35:08'),
(39, 579636, 'fddffffffffffffffffffffffffffffffffffffffffffffffff', '28-July-20', '2020-07-28 01:36:18'),
(40, 579636, 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', '28-July-20', '2020-07-28 01:36:18'),
(41, 579636, 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', '28-July-20', '2020-07-28 01:36:18'),
(42, 579636, 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', '28-July-20', '2020-07-28 01:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `r_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` int(255) NOT NULL,
  `servings` varchar(255) NOT NULL,
  `timing` varchar(255) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`r_id`, `title`, `description`, `category`, `servings`, `timing`, `created_at`, `modified_at`) VALUES
(212227, 'Smarties chocolate cake', 'This Chocolate Cake is beyond moist. You could LITERALLY leave out it on the counter for several days and it would still be luscious. For me, the surprising favorite element on this cake were the crunchy, pure chocolate cacao nibs.', 1, '12', '15 minutes', '12-July-20', '2020-07-12 04:20:34'),
(327524, 'Lacto Tahari', 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', 3, '10', '15 minutes', '28-July-20', '2020-07-28 01:35:08'),
(579636, 'Ovo Rice', 'fgfgffffffffffffffffffffffffffffffffffffffffffffffffffffffffdfgfgfgfg', 4, '10', '15 minutes', '28-July-20', '2020-07-28 01:36:18'),
(731660, 'Cream Biscuit Cake', 'This Chocolate Cake is beyond moist. You could LITERALLY leave out it on the counter for several days and it would still be luscious. For me, the surprising favorite element on this cake were the crunchy, pure chocolate cacao nibs.', 2, '10', '25 minutes', '13-July-20', '2020-07-28 01:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `id` int(11) NOT NULL,
  `u_id` longtext NOT NULL,
  `r_id` int(10) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_list`
--

CREATE TABLE `shopping_list` (
  `id` int(11) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `r_id` longtext NOT NULL,
  `ing_name` longtext NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` text NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `modified_at`) VALUES
(1, 'skmail', '05-August-2020', '2020-08-05 02:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `password`, `created_at`, `modified_at`) VALUES
(1, 'Shahebaz', 'shah@gmail.com', '9511846837', '123', '14-July-20', '2020-07-13 22:58:31'),
(2, 'Fatima', 'fat@gmail.com', '9665040384', '456', '27-July-20', '2020-07-26 23:39:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingrediant`
--
ALTER TABLE `ingrediant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ingrediant`
--
ALTER TABLE `ingrediant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `method`
--
ALTER TABLE `method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_list`
--
ALTER TABLE `shopping_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
