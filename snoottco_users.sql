-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2017 at 06:33 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snoottco_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `ad_id` longtext NOT NULL,
  `username` longtext NOT NULL,
  `date_created` longtext NOT NULL,
  `date_updated` longtext NOT NULL,
  `time_created` longtext NOT NULL,
  `category` longtext NOT NULL,
  `subcategory` longtext NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `price` longtext NOT NULL,
  `negotiable` longtext NOT NULL,
  `photos` longtext NOT NULL,
  `active` longtext NOT NULL,
  `activated` longtext NOT NULL,
  `time_updated` longtext NOT NULL,
  `first_photo` longtext NOT NULL,
  `views` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `ad_id`, `username`, `date_created`, `date_updated`, `time_created`, `category`, `subcategory`, `title`, `description`, `price`, `negotiable`, `photos`, `active`, `activated`, `time_updated`, `first_photo`, `views`) VALUES
(18, 'kpVSDDM05j8pae6', 'wisdom', 'Tue 28 Nov 2017 09:50:59 pm', 'Tue 28 Nov 2017 09:50:59 pm', '1511905859', 'Hostels&Lodges', 'Lodges', 'Lodges available', 'Self-contain with well size toilet and bathroom with fine bedroom, kitchen and veranda', '150,000', 'true', 'kpVSDDM05j8pae6_photo1.jpg,kpVSDDM05j8pae6_photo2.jpg,kpVSDDM05j8pae6_photo3.jpg', '1', '1', '1511905859', 'kpVSDDM05j8pae6_photo1.jpg', '39'),
(17, '1UQhPt1kHyU-x3h', 'somailia1', 'Tue 28 Nov 2017 09:42:10 pm', 'Tue 28 Nov 2017 09:42:10 pm', '1511905330', 'Hostels&Lodges', 'Lodges', 'Lodge available in alakahia', 'Self-contain with well size toilet and bathroom, wardrobe, kitchen veranda and bedroom', '150,000', 'true', '1UQhPt1kHyU-x3h_photo1.jpg,1UQhPt1kHyU-x3h_photo2.jpg,1UQhPt1kHyU-x3h_photo3.jpg', '1', '1', '1511905330', '1UQhPt1kHyU-x3h_photo1.jpg', '12'),
(16, 'f428LlKAICuvTYM', 'obimlodge', 'Tue 28 Nov 2017 09:30:56 pm', 'Tue 28 Nov 2017 09:30:56 pm', '1511904656', 'Hostels&Lodges', 'Lodges', 'New lodge extension village', 'Self-contain with well size toilet, veranda and bathroom, wardrobe kitchen and bedroom', '180,000', 'true', 'f428LlKAICuvTYM_photo1.jpg,f428LlKAICuvTYM_photo2.jpg,f428LlKAICuvTYM_photo3.jpg', '1', '1', '1511904656', 'f428LlKAICuvTYM_photo1.jpg', '6'),
(15, 'taCcE24uGlq44kO', 'curlyluxury', 'Tue 28 Nov 2017 09:21:12 pm', 'Tue 28 Nov 2017 09:21:12 pm', '1511904072', 'Hostels&Lodges', 'Lodges', 'Lodge behind extension village', 'Self-contain with well size toilet and bathroom, veranda, wardrobe and kitchen and bedroom', '150,000', 'true', 'taCcE24uGlq44kO_photo1.jpg,taCcE24uGlq44kO_photo2.jpg,taCcE24uGlq44kO_photo3.jpg', '1', '1', '1511904072', 'taCcE24uGlq44kO_photo1.jpg', '4'),
(14, 'fJwpetYXdad1QV3', 'andypalace', 'Tue 28 Nov 2017 09:14:02 pm', 'Tue 28 Nov 2017 09:14:02 pm', '1511903642', 'Hostels&Lodges', 'Lodges', 'Logde Alakahia', 'Self-contain with well size toilet and bathroom, veranda, wardrobe and kitchen', '100,000', 'true', 'fJwpetYXdad1QV3_photo1.jpg,fJwpetYXdad1QV3_photo2.jpg,fJwpetYXdad1QV3_photo3.jpg', '1', '1', '1511903642', 'fJwpetYXdad1QV3_photo1.jpg', '8'),
(13, 'QWXKH_9gBjpitxH', 'bright', 'Tue 28 Nov 2017 09:07:20 pm', 'Tue 28 Nov 2017 09:07:20 pm', '1511903240', 'Hostels&Lodges', 'Lodges', 'Logde available in Alakahia', 'Self-contain with well size toilet and bathroom, wardrobe and kitchen and a veranda', '145,000', 'true', 'QWXKH_9gBjpitxH_photo1.jpg,QWXKH_9gBjpitxH_photo2.jpg,QWXKH_9gBjpitxH_photo3.jpg', '1', '1', '1511903240', 'QWXKH_9gBjpitxH_photo1.jpg', '12'),
(12, 'tbxXcvHkkTSVmj9', 'victor', 'Sat 25 Nov 2017 07:51:21 am', 'Sat 25 Nov 2017 07:51:21 am', '1511596281', 'Phones&Tablets', 'Mobile Phones', 'Zte blade l3', 'Crack screen but still working just a change of screen', '10,000', 'true', 'tbxXcvHkkTSVmj9_photo1.jpg,tbxXcvHkkTSVmj9_photo2.jpg,tbxXcvHkkTSVmj9_photo3.jpg', '0', '1', '1511596281', 'tbxXcvHkkTSVmj9_photo1.jpg', '14'),
(11, 'ebsJncrpODcDyBV', 'victor', 'Thu 16 Nov 2017 11:07:13 am', 'Mon 13 Nov 2017 06:37:06 pm', '1510598226', 'laptops&computers', 'Laptops', 'Zinox laptop', 'Neat 4GB RAM, 250HDD and fingerprint sensor and front camera 6 megapixel', '46,000', 'true', 'ebsJncrpODcDyBV_photo1.jpg,ebsJncrpODcDyBV_photo2.jpg,ebsJncrpODcDyBV_photo3.jpg', '1', '1', '1510830433', 'ebsJncrpODcDyBV_photo1.jpg', '6'),
(10, 'ATF7R3VL3fx4Qxs', 'victor', 'Sat 18 Nov 2017 01:53:57 am', 'Mon 13 Nov 2017 06:06:03 pm', '1510825657', 'laptops&computers', 'Laptops', 'Zinox Laptop', 'Neat laptop for sale in Port Harcourt for cheap amount.', '50,000', 'true', 'ATF7R3VL3fx4Qxs_photo1.jpg,ATF7R3VL3fx4Qxs_photo2.jpg,ATF7R3VL3fx4Qxs_photo3.jpg', '1', '1', '1510970037', 'ATF7R3VL3fx4Qxs_photo1.jpg', '18'),
(19, 'fiu32eiyAvs65Q7', 'kosieric', 'Sun 10 Dec 2017 02:20:28 pm', 'Sun 10 Dec 2017 02:20:28 pm', '1512915628', 'Phones&Tablets', 'Mobile Phones', 'Clean Huawei K3 for sale', 'Clean Huawei k3 with 1GB ram 8GB rom....8MP back facing camera... 5mp front facing camera... Front and back flash... 32 GB expandable memory...3200mah battery...3g and 4g...and Lot\'s more', '20,000', 'true', 'fiu32eiyAvs65Q7_photo1.jpg,fiu32eiyAvs65Q7_photo2.jpg,fiu32eiyAvs65Q7_photo3.jpg', '1', '1', '1512915628', 'fiu32eiyAvs65Q7_photo1.jpg', '9');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `email_id` longtext,
  `sender_email` longtext,
  `sender_name` longtext,
  `sender_phone` longtext,
  `message` longtext,
  `registered_sender` longtext,
  `message_read` longtext,
  `active` longtext,
  `time_sent` longtext,
  `date_sent` longtext,
  `to` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` int(11) NOT NULL,
  `username` longtext,
  `email` longtext,
  `token` longtext,
  `date_created` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) NOT NULL,
  `ad_id` longtext NOT NULL,
  `time_favorited` longtext NOT NULL,
  `username` longtext NOT NULL,
  `date_favorited` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `id` bigint(20) NOT NULL,
  `ad_id` longtext NOT NULL,
  `time_flagged` longtext NOT NULL,
  `username` longtext NOT NULL,
  `date_flagged` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `last_seen`
--

CREATE TABLE `last_seen` (
  `id` bigint(20) NOT NULL,
  `username` longtext,
  `last_seen` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_seen`
--

INSERT INTO `last_seen` (`id`, `username`, `last_seen`) VALUES
(9, 'andypalace', '1511903694'),
(8, 'bright', '1511903261'),
(7, 'victor', '1512907443'),
(6, 'Sammyboy', '1511033537'),
(10, 'curlyluxury', '1511904203'),
(11, 'obimlodge', '1511904680'),
(12, 'somailia1', '1511905408'),
(13, 'wisdom', '1511905922'),
(14, 'Jeremiah', '1512488210'),
(15, 'kosieric', '1512915875');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `ad_id` longtext,
  `time_liked` longtext,
  `username` longtext,
  `date_liked` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `ad_id` longtext,
  `fullname` longtext,
  `message_from` longtext,
  `phone` longtext,
  `message` longtext,
  `message_to` longtext,
  `username` longtext,
  `message_time` longtext,
  `message_date` longtext,
  `message_id` longtext,
  `read_status` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE `password_recovery` (
  `id` bigint(20) NOT NULL,
  `username` longtext,
  `token` longtext,
  `date_created` longtext,
  `email` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_recovery`
--

INSERT INTO `password_recovery` (`id`, `username`, `token`, `date_created`, `email`) VALUES
(1, 'realkosieric', '5039cce06aea05da16d784c8aff6fc612be1530c', 'Sat 04 Nov 2017', 'kosiuniverse@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` longtext,
  `email` longtext,
  `phone` longtext,
  `password` longtext,
  `profile` longtext,
  `state` longtext,
  `institution` longtext,
  `date_created` longtext,
  `account_type` longtext,
  `email_verified` longtext,
  `active` longtext,
  `fullname` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `profile`, `state`, `institution`, `date_created`, `account_type`, `email_verified`, `active`, `fullname`) VALUES
(11, 'andypalace', 'bokoizzy@vity.com', '08064574881', 'e10adc3949ba59abbe56e057f20f883e', 'user.png', 'Rivers state', 'University Of Port-Harcourt', 'Tue 28 Nov 2017 09:10:12 pm', 'user', '1', '1', 'Andy Palace'),
(10, 'bright', 'bokoizzy@snoott.com', '08030600615', 'e10adc3949ba59abbe56e057f20f883e', 'user.png', 'Rivers state', 'University Of Port-Harcourt', 'Tue 28 Nov 2017 08:56:38 pm', 'user', '1', '1', 'Bright Lodge'),
(8, 'Sammyboy', 'princemelford@yahoo.com', '09096100837', 'f3edd161a27208d9afa689a9d9e0c10e', 'user.png', 'Rivers state', 'University Of Port-Harcourt', 'Mon 13 Nov 2017 12:59:00 pm', 'user', '1', '1', 'Ekpenyong Sampson Melford'),
(9, 'victor', 'bokoizzy@gmail.com', '09099171545', 'f6c7c57707c0c88f68e82341fcba090d', 'victor.jpg', 'Rivers state', 'University Of Port-Harcourt', 'Mon 13 Nov 2017 05:10:29 pm', 'user', '1', '1', 'Victor Martins'),
(12, 'curlyluxury', 'curly@luxury.com', '08037407437', 'e10adc3949ba59abbe56e057f20f883e', 'user.png', 'Rivers state', 'University Of Port-Harcourt', 'Tue 28 Nov 2017 09:16:58 pm', 'user', '1', '1', 'Curly Luxury'),
(13, 'obimlodge', 'obim@snottt.com', '09029467737', 'e10adc3949ba59abbe56e057f20f883e', 'user.png', 'Rivers state', 'University Of Port-Harcourt', 'Tue 28 Nov 2017 09:24:59 pm', 'user', '1', '1', 'Obim Caretaker'),
(14, 'somailia1', 'somalia@snoott.com', '09063366948', 'e10adc3949ba59abbe56e057f20f883e', 'user.png', 'Rivers state', 'University Of Port-Harcourt', 'Tue 28 Nov 2017 09:33:59 pm', 'user', '1', '1', 'Somalia Lodge'),
(15, 'wisdom', 'ws@snoott.com', '08088464680', 'e10adc3949ba59abbe56e057f20f883e', 'user.png', 'Rivers state', 'University Of Port-Harcourt', 'Tue 28 Nov 2017 09:45:47 pm', 'user', '1', '1', 'Seat Of Wisdom'),
(16, 'Jeremiah', 'ebuluejc99@gmail.com', '07036217072', 'cee8b7cca2762ad7daae1661c6778c1c', 'user.png', 'Lagos state', 'Anchor University, Ayobo', 'Tue 05 Dec 2017 03:13:04 pm', 'user', '1', '1', 'Jeremiah Derah'),
(17, 'kosieric', 'itskosieric@gmail.com', '07084419530', '9bfa2e4d079e2fc42c31cf1080991b1c', 'user.png', 'Imo state', 'IMSU Imo State University, Owerri', 'Wed 06 Dec 2017 11:49:05 am', 'user', '1', '1', 'Kosi Eric');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_seen`
--
ALTER TABLE `last_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `last_seen`
--
ALTER TABLE `last_seen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `password_recovery`
--
ALTER TABLE `password_recovery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
