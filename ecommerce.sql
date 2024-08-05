-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 02:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'dummy ', 'dummy dummy', '1.jpg', NULL, NULL),
(2, 'dumby', 'dumby', 'dumby', NULL, NULL),
(3, 'dumby', 'dumby', 'dumby', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'OnePlus', 'oneplus', 1, '2024-07-05 03:57:18', '2024-08-05 05:54:53'),
(2, 'Samsung', 'samsung', 1, '2024-07-05 03:58:00', '2024-08-05 05:55:06'),
(3, 'Xiaomi', 'xiaomi', 1, '2024-07-05 03:58:22', '2024-08-05 05:54:43'),
(4, 'POCO', 'poco', 1, '2024-07-16 12:38:17', '2024-08-05 05:54:33'),
(5, 'Gowardhan', 'gowardhan', 1, '2024-08-05 06:07:34', '2024-08-05 06:07:34'),
(6, 'Casual button', 'casual-shirt', 1, '2024-08-05 06:35:12', '2024-08-05 06:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'null',
  `status` int(11) NOT NULL DEFAULT 1,
  `showHome` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `showHome`, `created_at`, `updated_at`) VALUES
(1, 'Beauty and Personal Care', 'beauty-and-personal-care', '172285280541.jpg', 1, 'Yes', '2024-07-05 03:55:21', '2024-08-05 04:43:25'),
(2, 'Fashion', 'fashion', '1722852489346.webp', 1, 'Yes', '2024-07-05 03:55:40', '2024-08-05 04:38:09'),
(3, 'Electronics', 'electronics', '1722852621363.jpg', 1, 'Yes', '2024-07-05 03:55:56', '2024-08-05 04:40:21'),
(4, 'Grocery', 'grocery', '1722852007705.jfif', 1, 'Yes', '2024-07-12 04:40:30', '2024-08-05 04:30:07'),
(6, 'Mobile', 'mobile', '1722851856906.jpg', 1, 'Yes', '2024-07-16 12:05:12', '2024-08-05 04:27:36'),
(9, 'Home and Furniture', 'home-and-furniture', '1722852958607.jfif', 1, 'Yes', '2024-08-05 04:45:58', '2024-08-05 04:45:58'),
(10, 'Toys and Games', 'toys-and-games', '1722853147405.jfif', 1, 'Yes', '2024-08-05 04:49:07', '2024-08-05 04:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'United States', 'US', NULL, NULL),
(2, 'Canada', 'CA', NULL, NULL),
(3, 'Afghanistan', 'AF', NULL, NULL),
(4, 'Albania', 'AL', NULL, NULL),
(5, 'Algeria', 'DZ', NULL, NULL),
(6, 'American Samoa', 'AS', NULL, NULL),
(7, 'Andorra', 'AD', NULL, NULL),
(8, 'Angola', 'AO', NULL, NULL),
(9, 'Anguilla', 'AI', NULL, NULL),
(10, 'Antarctica', 'AQ', NULL, NULL),
(11, 'Antigua and/or Barbuda', 'AG', NULL, NULL),
(12, 'Argentina', 'AR', NULL, NULL),
(13, 'Armenia', 'AM', NULL, NULL),
(14, 'Aruba', 'AW', NULL, NULL),
(15, 'Australia', 'AU', NULL, NULL),
(16, 'Austria', 'AT', NULL, NULL),
(17, 'Azerbaijan', 'AZ', NULL, NULL),
(18, 'Bahamas', 'BS', NULL, NULL),
(19, 'Bahrain', 'BH', NULL, NULL),
(20, 'Bangladesh', 'BD', NULL, NULL),
(21, 'Barbados', 'BB', NULL, NULL),
(22, 'Belarus', 'BY', NULL, NULL),
(23, 'Belgium', 'BE', NULL, NULL),
(24, 'Belize', 'BZ', NULL, NULL),
(25, 'Benin', 'BJ', NULL, NULL),
(26, 'Bermuda', 'BM', NULL, NULL),
(27, 'Bhutan', 'BT', NULL, NULL),
(28, 'Bolivia', 'BO', NULL, NULL),
(29, 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(30, 'Botswana', 'BW', NULL, NULL),
(31, 'Bouvet Island', 'BV', NULL, NULL),
(32, 'Brazil', 'BR', NULL, NULL),
(33, 'British lndian Ocean Territory', 'IO', NULL, NULL),
(34, 'Brunei Darussalam', 'BN', NULL, NULL),
(35, 'Bulgaria', 'BG', NULL, NULL),
(36, 'Burkina Faso', 'BF', NULL, NULL),
(37, 'Burundi', 'BI', NULL, NULL),
(38, 'Cambodia', 'KH', NULL, NULL),
(39, 'Cameroon', 'CM', NULL, NULL),
(40, 'Cape Verde', 'CV', NULL, NULL),
(41, 'Cayman Islands', 'KY', NULL, NULL),
(42, 'Central African Republic', 'CF', NULL, NULL),
(43, 'Chad', 'TD', NULL, NULL),
(44, 'Chile', 'CL', NULL, NULL),
(45, 'China', 'CN', NULL, NULL),
(46, 'Christmas Island', 'CX', NULL, NULL),
(47, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),
(48, 'Colombia', 'CO', NULL, NULL),
(49, 'Comoros', 'KM', NULL, NULL),
(50, 'Congo', 'CG', NULL, NULL),
(51, 'Cook Islands', 'CK', NULL, NULL),
(52, 'Costa Rica', 'CR', NULL, NULL),
(53, 'Croatia (Hrvatska)', 'HR', NULL, NULL),
(54, 'Cuba', 'CU', NULL, NULL),
(55, 'Cyprus', 'CY', NULL, NULL),
(56, 'Czech Republic', 'CZ', NULL, NULL),
(57, 'Democratic Republic of Congo', 'CD', NULL, NULL),
(58, 'Denmark', 'DK', NULL, NULL),
(59, 'Djibouti', 'DJ', NULL, NULL),
(60, 'Dominica', 'DM', NULL, NULL),
(61, 'Dominican Republic', 'DO', NULL, NULL),
(62, 'East Timor', 'TP', NULL, NULL),
(63, 'Ecudaor', 'EC', NULL, NULL),
(64, 'Egypt', 'EG', NULL, NULL),
(65, 'El Salvador', 'SV', NULL, NULL),
(66, 'Equatorial Guinea', 'GQ', NULL, NULL),
(67, 'Eritrea', 'ER', NULL, NULL),
(68, 'Estonia', 'EE', NULL, NULL),
(69, 'Ethiopia', 'ET', NULL, NULL),
(70, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),
(71, 'Faroe Islands', 'FO', NULL, NULL),
(72, 'Fiji', 'FJ', NULL, NULL),
(73, 'Finland', 'FI', NULL, NULL),
(74, 'France', 'FR', NULL, NULL),
(75, 'France, Metropolitan', 'FX', NULL, NULL),
(76, 'French Guiana', 'GF', NULL, NULL),
(77, 'French Polynesia', 'PF', NULL, NULL),
(78, 'French Southern Territories', 'TF', NULL, NULL),
(79, 'Gabon', 'GA', NULL, NULL),
(80, 'Gambia', 'GM', NULL, NULL),
(81, 'Georgia', 'GE', NULL, NULL),
(82, 'Germany', 'DE', NULL, NULL),
(83, 'Ghana', 'GH', NULL, NULL),
(84, 'Gibraltar', 'GI', NULL, NULL),
(85, 'Greece', 'GR', NULL, NULL),
(86, 'Greenland', 'GL', NULL, NULL),
(87, 'Grenada', 'GD', NULL, NULL),
(88, 'Guadeloupe', 'GP', NULL, NULL),
(89, 'Guam', 'GU', NULL, NULL),
(90, 'Guatemala', 'GT', NULL, NULL),
(91, 'Guinea', 'GN', NULL, NULL),
(92, 'Guinea-Bissau', 'GW', NULL, NULL),
(93, 'Guyana', 'GY', NULL, NULL),
(94, 'Haiti', 'HT', NULL, NULL),
(95, 'Heard and Mc Donald Islands', 'HM', NULL, NULL),
(96, 'Honduras', 'HN', NULL, NULL),
(97, 'Hong Kong', 'HK', NULL, NULL),
(98, 'Hungary', 'HU', NULL, NULL),
(99, 'Iceland', 'IS', NULL, NULL),
(100, 'India', 'IN', NULL, NULL),
(101, 'Indonesia', 'ID', NULL, NULL),
(102, 'Iran (Islamic Republic of)', 'IR', NULL, NULL),
(103, 'Iraq', 'IQ', NULL, NULL),
(104, 'Ireland', 'IE', NULL, NULL),
(105, 'Israel', 'IL', NULL, NULL),
(106, 'Italy', 'IT', NULL, NULL),
(107, 'Ivory Coast', 'CI', NULL, NULL),
(108, 'Jamaica', 'JM', NULL, NULL),
(109, 'Japan', 'JP', NULL, NULL),
(110, 'Jordan', 'JO', NULL, NULL),
(111, 'Kazakhstan', 'KZ', NULL, NULL),
(112, 'Kenya', 'KE', NULL, NULL),
(113, 'Kiribati', 'KI', NULL, NULL),
(114, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL),
(115, 'Korea, Republic of', 'KR', NULL, NULL),
(116, 'Kuwait', 'KW', NULL, NULL),
(117, 'Kyrgyzstan', 'KG', NULL, NULL),
(118, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL),
(119, 'Latvia', 'LV', NULL, NULL),
(120, 'Lebanon', 'LB', NULL, NULL),
(121, 'Lesotho', 'LS', NULL, NULL),
(122, 'Liberia', 'LR', NULL, NULL),
(123, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL),
(124, 'Liechtenstein', 'LI', NULL, NULL),
(125, 'Lithuania', 'LT', NULL, NULL),
(126, 'Luxembourg', 'LU', NULL, NULL),
(127, 'Macau', 'MO', NULL, NULL),
(128, 'Macedonia', 'MK', NULL, NULL),
(129, 'Madagascar', 'MG', NULL, NULL),
(130, 'Malawi', 'MW', NULL, NULL),
(131, 'Malaysia', 'MY', NULL, NULL),
(132, 'Maldives', 'MV', NULL, NULL),
(133, 'Mali', 'ML', NULL, NULL),
(134, 'Malta', 'MT', NULL, NULL),
(135, 'Marshall Islands', 'MH', NULL, NULL),
(136, 'Martinique', 'MQ', NULL, NULL),
(137, 'Mauritania', 'MR', NULL, NULL),
(138, 'Mauritius', 'MU', NULL, NULL),
(139, 'Mayotte', 'TY', NULL, NULL),
(140, 'Mexico', 'MX', NULL, NULL),
(141, 'Micronesia, Federated States of', 'FM', NULL, NULL),
(142, 'Moldova, Republic of', 'MD', NULL, NULL),
(143, 'Monaco', 'MC', NULL, NULL),
(144, 'Mongolia', 'MN', NULL, NULL),
(145, 'Montserrat', 'MS', NULL, NULL),
(146, 'Morocco', 'MA', NULL, NULL),
(147, 'Mozambique', 'MZ', NULL, NULL),
(148, 'Myanmar', 'MM', NULL, NULL),
(149, 'Namibia', 'NA', NULL, NULL),
(150, 'Nauru', 'NR', NULL, NULL),
(151, 'Nepal', 'NP', NULL, NULL),
(152, 'Netherlands', 'NL', NULL, NULL),
(153, 'Netherlands Antilles', 'AN', NULL, NULL),
(154, 'New Caledonia', 'NC', NULL, NULL),
(155, 'New Zealand', 'NZ', NULL, NULL),
(156, 'Nicaragua', 'NI', NULL, NULL),
(157, 'Niger', 'NE', NULL, NULL),
(158, 'Nigeria', 'NG', NULL, NULL),
(159, 'Niue', 'NU', NULL, NULL),
(160, 'Norfork Island', 'NF', NULL, NULL),
(161, 'Northern Mariana Islands', 'MP', NULL, NULL),
(162, 'Norway', 'NO', NULL, NULL),
(163, 'Oman', 'OM', NULL, NULL),
(164, 'Pakistan', 'PK', NULL, NULL),
(165, 'Palau', 'PW', NULL, NULL),
(166, 'Panama', 'PA', NULL, NULL),
(167, 'Papua New Guinea', 'PG', NULL, NULL),
(168, 'Paraguay', 'PY', NULL, NULL),
(169, 'Peru', 'PE', NULL, NULL),
(170, 'Philippines', 'PH', NULL, NULL),
(171, 'Pitcairn', 'PN', NULL, NULL),
(172, 'Poland', 'PL', NULL, NULL),
(173, 'Portugal', 'PT', NULL, NULL),
(174, 'Puerto Rico', 'PR', NULL, NULL),
(175, 'Qatar', 'QA', NULL, NULL),
(176, 'Republic of South Sudan', 'SS', NULL, NULL),
(177, 'Reunion', 'RE', NULL, NULL),
(178, 'Romania', 'RO', NULL, NULL),
(179, 'Russian Federation', 'RU', NULL, NULL),
(180, 'Rwanda', 'RW', NULL, NULL),
(181, 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(182, 'Saint Lucia', 'LC', NULL, NULL),
(183, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(184, 'Samoa', 'WS', NULL, NULL),
(185, 'San Marino', 'SM', NULL, NULL),
(186, 'Sao Tome and Principe', 'ST', NULL, NULL),
(187, 'Saudi Arabia', 'SA', NULL, NULL),
(188, 'Senegal', 'SN', NULL, NULL),
(189, 'Serbia', 'RS', NULL, NULL),
(190, 'Seychelles', 'SC', NULL, NULL),
(191, 'Sierra Leone', 'SL', NULL, NULL),
(192, 'Singapore', 'SG', NULL, NULL),
(193, 'Slovakia', 'SK', NULL, NULL),
(194, 'Slovenia', 'SI', NULL, NULL),
(195, 'Solomon Islands', 'SB', NULL, NULL),
(196, 'Somalia', 'SO', NULL, NULL),
(197, 'South Africa', 'ZA', NULL, NULL),
(198, 'South Georgia South Sandwich Islands', 'GS', NULL, NULL),
(199, 'Spain', 'ES', NULL, NULL),
(200, 'Sri Lanka', 'LK', NULL, NULL),
(201, 'St. Helena', 'SH', NULL, NULL),
(202, 'St. Pierre and Miquelon', 'PM', NULL, NULL),
(203, 'Sudan', 'SD', NULL, NULL),
(204, 'Suriname', 'SR', NULL, NULL),
(205, 'Svalbarn and Jan Mayen Islands', 'SJ', NULL, NULL),
(206, 'Swaziland', 'SZ', NULL, NULL),
(207, 'Sweden', 'SE', NULL, NULL),
(208, 'Switzerland', 'CH', NULL, NULL),
(209, 'Syrian Arab Republic', 'SY', NULL, NULL),
(210, 'Taiwan', 'TW', NULL, NULL),
(211, 'Tajikistan', 'TJ', NULL, NULL),
(212, 'Tanzania, United Republic of', 'TZ', NULL, NULL),
(213, 'Thailand', 'TH', NULL, NULL),
(214, 'Togo', 'TG', NULL, NULL),
(215, 'Tokelau', 'TK', NULL, NULL),
(216, 'Tonga', 'TO', NULL, NULL),
(217, 'Trinidad and Tobago', 'TT', NULL, NULL),
(218, 'Tunisia', 'TN', NULL, NULL),
(219, 'Turkey', 'TR', NULL, NULL),
(220, 'Turkmenistan', 'TM', NULL, NULL),
(221, 'Turks and Caicos Islands', 'TC', NULL, NULL),
(222, 'Tuvalu', 'TV', NULL, NULL),
(223, 'Uganda', 'UG', NULL, NULL),
(224, 'Ukraine', 'UA', NULL, NULL),
(225, 'United Arab Emirates', 'AE', NULL, NULL),
(226, 'United Kingdom', 'GB', NULL, NULL),
(227, 'United States minor outlying islands', 'UM', NULL, NULL),
(228, 'Uruguay', 'UY', NULL, NULL),
(229, 'Uzbekistan', 'UZ', NULL, NULL),
(230, 'Vanuatu', 'VU', NULL, NULL),
(231, 'Vatican City State', 'VA', NULL, NULL),
(232, 'Venezuela', 'VE', NULL, NULL),
(233, 'Vietnam', 'VN', NULL, NULL),
(234, 'Virgin Islands (British)', 'VG', NULL, NULL),
(235, 'Virgin Islands (U.S.)', 'VI', NULL, NULL),
(236, 'Wallis and Futuna Islands', 'WF', NULL, NULL),
(237, 'Western Sahara', 'EH', NULL, NULL),
(238, 'Yemen', 'YE', NULL, NULL),
(239, 'Yugoslavia', 'YU', NULL, NULL),
(240, 'Zaire', 'ZR', NULL, NULL),
(241, 'Zambia', 'ZM', NULL, NULL),
(242, 'Zimbabwe', 'ZW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `user_id`, `first_name`, `last_name`, `email`, `mobile`, `country_id`, `address`, `apartment`, `city`, `state`, `zip`, `created_at`, `updated_at`) VALUES
(1, 2, 'krish', 'kumar', 'rkconsutancy34@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'New Delhi', 'Delhi', '1100043', '2024-07-22 01:43:41', '2024-08-01 06:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE `discount_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `max_uses` int(11) DEFAULT NULL,
  `max_uses_user` int(11) DEFAULT NULL,
  `type` enum('parcent','fixed') NOT NULL DEFAULT 'fixed',
  `status` int(11) NOT NULL DEFAULT 1,
  `discount_amount` double NOT NULL,
  `min_amount` double DEFAULT NULL,
  `starts_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_coupons`
--

INSERT INTO `discount_coupons` (`id`, `code`, `name`, `description`, `max_uses`, `max_uses_user`, `type`, `status`, `discount_amount`, `min_amount`, `starts_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'IND2021', 'india', 'discount coupon 10% off', 10, 3, 'fixed', 1, 10, 1200, '2024-07-24 20:30:18', '2024-07-28 18:26:21', '2024-07-24 12:56:36', '2024-07-26 08:52:55'),
(4, 'RAVI10', 'INDAI', NULL, 15, 3, 'fixed', 1, 300, 1200, '2024-07-25 14:24:18', '2024-07-29 14:24:22', '2024-07-26 08:54:25', '2024-07-26 09:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2024_06_26_093235_create_categories_table', 1),
(4, '2024_07_01_143305_create_temp_images_table', 1),
(5, '2024_07_02_144008_create_sub_categories_table', 1),
(6, '2024_07_03_103614_create_brands_table', 1),
(7, '2024_07_04_164716_create_products_table', 1),
(8, '2024_07_05_082202_create_product_img_table', 1),
(13, '2024_07_05_082202_create_product_images_table', 2),
(14, '2024_07_12_093139_alter_categories_table', 3),
(15, '2024_07_12_110359_update_products_update', 4),
(16, '2024_07_12_111059_update_sub_categories_table', 5),
(17, '2024_07_19_052526_update_products_table', 6),
(18, '2024_07_21_070751_update_users_table', 7),
(20, '2024_07_21_113456_create_countries_table', 8),
(21, '2024_07_21_120347_create_orders_table', 9),
(22, '2024_07_21_120423_create_order_items_table', 9),
(23, '2024_07_21_120517_create_customer_addresses_table', 9),
(25, '2024_07_22_084648_create_shipping_charges_table', 10),
(26, '2024_07_24_154252_create_discount_coupons_table', 11),
(27, '2024_07_25_183224_update_orders_table', 12),
(28, '2024_07_26_155433_update_orders_table', 13),
(29, '2024_07_27_092326_update_orders_table', 14),
(30, '2024_07_28_094354_create_wishlists_table', 15),
(31, '2024_08_01_115829_update_users_table', 16),
(32, '2024_08_01_140050_create_pages_table', 17),
(33, '2024_08_04_084310_create_product_ratings_table', 18),
(34, '2024_08_04_123044_create_banners_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double NOT NULL,
  `shipping` double NOT NULL,
  `coupen_code` varchar(255) DEFAULT NULL,
  `coupon_code_id` varchar(255) DEFAULT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `grand_total` double NOT NULL,
  `payment_status` enum('paid','not paid') NOT NULL DEFAULT 'not paid',
  `status` enum('pending','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `shipped_date` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `shipping`, `coupen_code`, `coupon_code_id`, `discount`, `grand_total`, `payment_status`, `status`, `shipped_date`, `first_name`, `last_name`, `email`, `mobile`, `country_id`, `address`, `apartment`, `city`, `state`, `zip`, `notes`, `created_at`, `updated_at`) VALUES
(8, 2, 150, 0, NULL, NULL, NULL, 150, 'not paid', 'shipped', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', 'personal', '2024-07-22 02:43:01', '2024-07-22 02:43:01'),
(9, 2, 150, 0, NULL, NULL, NULL, 150, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-22 03:10:33', '2024-07-22 03:10:33'),
(10, 2, 1200, 0, NULL, NULL, NULL, 1200, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-22 10:33:29', '2024-07-22 10:33:29'),
(11, 2, 476, 20, NULL, NULL, NULL, 496, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 96, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-23 05:02:41', '2024-07-23 05:02:41'),
(12, 2, 1000, 10, NULL, NULL, NULL, 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-25 09:52:09', '2024-07-25 09:52:09'),
(13, 2, 238, 10, 'IND2024', '1', '10', 238, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-25 13:06:23', '2024-07-25 13:06:23'),
(14, 2, 1200, 10, 'IND2024', '1', '10', 1200, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-25 13:10:36', '2024-07-25 13:10:36'),
(15, 2, 50, 10, 'IND2024', '1', '10', 50, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-25 13:12:31', '2024-07-25 13:12:31'),
(16, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'delivered', '2024-07-27 09:51:21', 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-26 11:49:24', '2024-07-27 04:30:30'),
(17, 2, 150, 10, '', '', '0', 160, 'not paid', 'delivered', '2024-07-27 09:50:27', 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-27 03:40:27', '2024-07-27 04:20:30'),
(18, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 01:48:16', '2024-07-28 01:48:16'),
(19, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 01:48:25', '2024-07-28 01:48:25'),
(20, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 01:48:45', '2024-07-28 01:48:45'),
(21, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 01:51:30', '2024-07-28 01:51:30'),
(22, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 01:52:15', '2024-07-28 01:52:15'),
(23, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 01:53:44', '2024-07-28 01:53:44'),
(24, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 01:59:55', '2024-07-28 01:59:55'),
(25, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:00:42', '2024-07-28 02:00:42'),
(26, 2, 0, 10, '', '', '0', 10, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:01:28', '2024-07-28 02:01:28'),
(27, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:02:01', '2024-07-28 02:02:01'),
(28, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:05:41', '2024-07-28 02:05:41'),
(29, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:05:54', '2024-07-28 02:05:54'),
(30, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:07:28', '2024-07-28 02:07:28'),
(31, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:08:10', '2024-07-28 02:08:10'),
(32, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:08:39', '2024-07-28 02:08:39'),
(33, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'krish@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:13:58', '2024-07-28 02:13:58'),
(34, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'ravi395950@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:19:41', '2024-07-28 02:19:41'),
(35, 2, 50, 10, '', '', '0', 60, 'not paid', 'pending', NULL, 'krish', 'kumar', 'rkconsutancy34@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:22:14', '2024-07-28 02:22:14'),
(36, 2, 1200, 10, '', '', '0', 1210, 'not paid', 'pending', NULL, 'krish', 'kumar', 'rkconsutancy34@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:55:11', '2024-07-28 02:55:11'),
(37, 2, 1200, 10, '', '', '0', 1210, 'not paid', 'pending', NULL, 'krish', 'kumar', 'rkconsutancy34@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:55:28', '2024-07-28 02:55:28'),
(38, 2, 1200, 10, '', '', '0', 1210, 'not paid', 'pending', NULL, 'krish', 'kumar', 'rkconsutancy34@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:56:11', '2024-07-28 02:56:11'),
(39, 2, 1200, 10, '', '', '0', 1210, 'not paid', 'pending', NULL, 'krish', 'kumar', 'rkconsutancy34@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 02:56:38', '2024-07-28 02:56:38'),
(40, 2, 1000, 10, '', '', '0', 1010, 'not paid', 'pending', NULL, 'krish', 'kumar', 'rkconsutancy34@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 03:07:44', '2024-07-28 03:07:44'),
(41, 2, 150, 10, '', '', '0', 160, 'not paid', 'pending', NULL, 'krish', 'kumar', 'rkconsutancy34@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 06:30:11', '2024-07-28 06:30:11'),
(42, 2, 150, 10, '', '', '0', 160, 'not paid', 'pending', NULL, 'krish', 'kumar', 'rkconsutancy34@gmail.com', '8076862834', 100, 'Dass garden baprola vihar south-west delhi', 'Dass garden', 'Delhi', 'Delhi', '1100043', NULL, '2024-07-28 06:36:55', '2024-07-28 06:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(1, 8, 55, 'watch', 1, 150, 150, '2024-07-22 02:43:01', '2024-07-22 02:43:01'),
(2, 9, 55, 'watch', 1, 150, 150, '2024-07-22 03:10:33', '2024-07-22 03:10:33'),
(3, 10, 58, 'Face wash', 1, 1200, 1200, '2024-07-22 10:33:29', '2024-07-22 10:33:29'),
(4, 11, 86, 'Michele Bartell', 2, 238, 476, '2024-07-23 05:02:41', '2024-07-23 05:02:41'),
(5, 12, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-25 09:52:09', '2024-07-25 09:52:09'),
(6, 13, 86, 'Michele Bartell', 1, 238, 238, '2024-07-25 13:06:23', '2024-07-25 13:06:23'),
(7, 14, 58, 'Face wash', 1, 1200, 1200, '2024-07-25 13:10:36', '2024-07-25 13:10:36'),
(8, 15, 56, 'shoes', 1, 50, 50, '2024-07-25 13:12:31', '2024-07-25 13:12:31'),
(9, 16, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-26 11:49:24', '2024-07-26 11:49:24'),
(10, 17, 55, 'watch', 1, 150, 150, '2024-07-27 03:40:27', '2024-07-27 03:40:27'),
(11, 18, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 01:48:16', '2024-07-28 01:48:16'),
(12, 19, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 01:48:25', '2024-07-28 01:48:25'),
(13, 20, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 01:48:45', '2024-07-28 01:48:45'),
(14, 21, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 01:51:30', '2024-07-28 01:51:30'),
(15, 22, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 01:52:15', '2024-07-28 01:52:15'),
(16, 23, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 01:53:44', '2024-07-28 01:53:44'),
(17, 24, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 01:59:55', '2024-07-28 01:59:55'),
(18, 25, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 02:00:42', '2024-07-28 02:00:42'),
(19, 27, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 02:02:01', '2024-07-28 02:02:01'),
(20, 28, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 02:05:41', '2024-07-28 02:05:41'),
(21, 29, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 02:05:54', '2024-07-28 02:05:54'),
(22, 30, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 02:07:28', '2024-07-28 02:07:28'),
(23, 31, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 02:08:10', '2024-07-28 02:08:10'),
(24, 32, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 02:08:39', '2024-07-28 02:08:39'),
(25, 33, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 02:13:58', '2024-07-28 02:13:58'),
(26, 34, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 02:19:41', '2024-07-28 02:19:41'),
(27, 35, 56, 'shoes', 1, 50, 50, '2024-07-28 02:22:14', '2024-07-28 02:22:14'),
(28, 36, 58, 'Face wash', 1, 1200, 1200, '2024-07-28 02:55:11', '2024-07-28 02:55:11'),
(29, 37, 58, 'Face wash', 1, 1200, 1200, '2024-07-28 02:55:28', '2024-07-28 02:55:28'),
(30, 38, 58, 'Face wash', 1, 1200, 1200, '2024-07-28 02:56:11', '2024-07-28 02:56:11'),
(31, 39, 58, 'Face wash', 1, 1200, 1200, '2024-07-28 02:56:38', '2024-07-28 02:56:38'),
(32, 40, 57, 'Women tracker T-shirt', 1, 1000, 1000, '2024-07-28 03:07:44', '2024-07-28 03:07:44'),
(33, 41, 55, 'watch', 1, 150, 150, '2024-07-28 06:30:11', '2024-07-28 06:30:11'),
(34, 42, 55, 'watch', 1, 150, 150, '2024-07-28 06:36:55', '2024-07-28 06:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas assumenda aliquam deserunt aspernatur numquam animi sit veniam distinctio voluptatem nihil ratione possimus ex eligendi molestias, similique earum? Ut accusamus exercitationem illo porro quis doloribus quasi atque, inventore dignissimos. Vel molestias quos maiores sequi explicabo numquam doloribus labore qui facilis rem.</p>\r\n\r\n            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas assumenda aliquam deserunt aspernatur numquam animi sit veniam distinctio voluptatem nihil ratione possimus ex eligendi molestias, similique earum? Ut accusamus exercitationem illo porro quis doloribus quasi atque, inventore dignissimos. Vel molestias quos maiores sequi explicabo numquam doloribus labore qui facilis rem.</p>\r\n\r\n            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas assumenda aliquam deserunt aspernatur numquam animi sit veniam distinctio voluptatem nihil ratione possimus ex eligendi molestias, similique earum? Ut accusamus exercitationem illo porro quis doloribus quasi atque, inventore dignissimos. Vel molestias quos maiores sequi explicabo numquam doloribus labore qui facilis rem.</p>\r\n\r\n            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas assumenda aliquam deserunt aspernatur numquam animi sit veniam distinctio voluptatem nihil ratione possimus ex eligendi molestias, similique earum? Ut accusamus exercitationem illo porro quis doloribus quasi atque, inventore dignissimos. Vel molestias quos maiores sequi explicabo numquam doloribus labore qui facilis rem.</p>\r\n\r\n            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas assumenda aliquam deserunt aspernatur numquam animi sit veniam distinctio voluptatem nihil ratione possimus ex eligendi molestias, similique earum? Ut accusamus exercitationem illo porro quis doloribus quasi atque, inventore dignissimos. Vel molestias quos maiores sequi explicabo numquam doloribus labore qui facilis rem.</p>', '2024-08-01 09:27:10', '2024-08-01 10:26:04'),
(3, 'Contact Us', 'contact-us', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content.</p>\r\n              <address>\r\n              Cecilia Chapman <br>\r\n              711-2880 Nulla St.<br> \r\n              Mankato Mississippi 96522<br>\r\n              <a href=\"tel:+xxxxxxxx\">(XXX) 555-2368</a><br>\r\n              <a href=\"mailto:jim@rock.com\">jim@rock.com</a>\r\n              </address>', '2024-08-02 10:12:12', '2024-08-02 10:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('krish@gmail.com', 'sdxbxEIw7wHyu9TDeWBRD3fajQteo8LgWhmoomPwd1Y7HF2N258fvS6wpxtP', '2024-08-04 01:38:15'),
('ravi395950@gmail.com', 'l9QVijH6SxNeMwS8JCS6OubQ5bmn03mLepUC83jbuQK6aUI7G08IlQXFDcKb', '2024-08-04 02:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `shipping_returns` text DEFAULT NULL,
  `related_products` text DEFAULT NULL,
  `price` double NOT NULL,
  `compare_price` double DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_featured` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sku` varchar(255) NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `track_qty` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `qty` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `short_description`, `shipping_returns`, `related_products`, `price`, `compare_price`, `category_id`, `brand_id`, `is_featured`, `sku`, `barcode`, `track_qty`, `qty`, `status`, `created_at`, `updated_at`, `sub_category_id`) VALUES
(55, 'watch', 'watch', '<p>fsfsffs</p>', NULL, NULL, '', 150, 200, 3, 3, 'Yes', 'akusu', 'fdffd', 'Yes', 0, 1, '2024-07-13 05:17:27', '2024-07-28 06:44:52', 5),
(56, 'shoes', 'shoes', '<p>this is shoes product define&nbsp;</p>', NULL, NULL, NULL, 50, 150, 4, NULL, 'Yes', 'product123', '#125845', 'Yes', 50, 1, '2024-07-16 12:29:56', '2024-07-17 11:16:32', 2),
(57, 'Women tracker T-shirt', 'women-tracker-t-shirt', '<p>Women tracker t-shirt</p>', NULL, NULL, NULL, 1000, 800, 1, NULL, 'Yes', 'skuru', 'bar1255', 'Yes', 50, 1, '2024-07-16 12:34:18', '2024-07-18 04:55:05', 6),
(58, 'Face wash', 'face-wash', '<p>This is Face Wash women</p>', NULL, NULL, '55,71', 1200, 1000, 1, 4, 'Yes', '1254sf', 'sre4581', 'Yes', 5, 1, '2024-07-16 12:40:29', '2024-07-19 11:12:55', 8),
(59, 'Anya Bradtke', 'anya-bradtke', NULL, NULL, NULL, NULL, 649, NULL, 3, 4, 'Yes', '9080', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(60, 'Dr. Zita O\'Conner IV', 'dr-zita-oconner-iv', NULL, NULL, NULL, NULL, 741, NULL, 3, 2, 'Yes', '3099', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(61, 'Cordia Terry', 'cordia-terry', NULL, NULL, NULL, NULL, 854, NULL, 3, 2, 'Yes', '1292', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(62, 'Elwyn O\'Reilly', 'elwyn-oreilly', NULL, NULL, NULL, NULL, 46, NULL, 3, 2, 'Yes', '5547', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 4),
(63, 'Jayne Pollich', 'jayne-pollich', NULL, NULL, NULL, NULL, 690, NULL, 3, 3, 'Yes', '2218', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(64, 'Nova Schiller', 'nova-schiller', NULL, NULL, NULL, NULL, 353, NULL, 3, 3, 'Yes', '7387', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(65, 'Mrs. Marjory Torphy DDS', 'mrs-marjory-torphy-dds', NULL, NULL, NULL, NULL, 218, NULL, 3, 4, 'Yes', '6163', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(66, 'Arvilla Hermann', 'arvilla-hermann', NULL, NULL, NULL, NULL, 861, NULL, 3, 4, 'Yes', '4691', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(67, 'Jordan Pagac MD', 'jordan-pagac-md', NULL, NULL, NULL, NULL, 97, NULL, 3, 1, 'Yes', '5298', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(68, 'Mylene Aufderhar', 'mylene-aufderhar', NULL, NULL, NULL, NULL, 268, NULL, 3, 2, 'Yes', '2795', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 4),
(69, 'Nora Schowalter III', 'nora-schowalter-iii', NULL, NULL, NULL, NULL, 481, NULL, 3, 3, 'Yes', '4117', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(70, 'Earl Daugherty', 'earl-daugherty', NULL, NULL, NULL, NULL, 426, NULL, 3, 2, 'Yes', '7483', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(71, 'Jacky Windler', 'jacky-windler', NULL, NULL, NULL, NULL, 455, NULL, 3, 1, 'Yes', '2135', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 4),
(72, 'Freeda Keebler', 'freeda-keebler', NULL, NULL, NULL, NULL, 614, NULL, 3, 4, 'Yes', '4544', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(73, 'Ursula Harber', 'ursula-harber', NULL, NULL, NULL, NULL, 898, NULL, 3, 2, 'Yes', '9598', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(74, 'Prof. Vance Murray V', 'prof-vance-murray-v', NULL, NULL, NULL, NULL, 855, NULL, 3, 3, 'Yes', '4470', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 4),
(75, 'Wilber Jakubowski', 'wilber-jakubowski', NULL, NULL, NULL, NULL, 90, NULL, 3, 3, 'Yes', '2840', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 4),
(76, 'Mrs. Luisa Eichmann DDS', 'mrs-luisa-eichmann-dds', NULL, NULL, NULL, NULL, 327, NULL, 3, 4, 'Yes', '6600', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(77, 'Caden Blanda', 'caden-blanda', NULL, NULL, NULL, NULL, 511, NULL, 3, 2, 'Yes', '4536', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(78, 'Armand Wiza', 'armand-wiza', NULL, NULL, NULL, NULL, 525, NULL, 3, 2, 'Yes', '1562', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 4),
(79, 'Prof. Rudy Jerde', 'prof-rudy-jerde', NULL, NULL, NULL, NULL, 958, NULL, 3, 3, 'Yes', '9554', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(80, 'Austyn Bode', 'austyn-bode', NULL, NULL, NULL, NULL, 918, NULL, 3, 1, 'Yes', '6759', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(81, 'Lauryn Boyer DDS', 'lauryn-boyer-dds', NULL, NULL, NULL, NULL, 937, NULL, 3, 3, 'Yes', '6405', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(82, 'Mario Kunze', 'mario-kunze', NULL, NULL, NULL, NULL, 143, NULL, 3, 2, 'Yes', '3692', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(83, 'Mona Wunsch', 'mona-wunsch', NULL, NULL, NULL, NULL, 917, NULL, 3, 1, 'Yes', '1790', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(84, 'Ms. Gina Reilly', 'ms-gina-reilly', NULL, NULL, NULL, NULL, 757, NULL, 3, 4, 'Yes', '6265', NULL, 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-07-18 09:50:11', 5),
(85, 'Women Regular Fit Solid Spread Collar Casual Shirt', 'women-regular-fit-solid-spread-collar-casual-shirt', '<div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.672px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><div class=\"col col-11-12 rYpYQA\" style=\"margin: 0px; padding: 32px 0px 32px 24px; width: 731.141px; display: inline-block; vertical-align: top; font-size: 24px;\">Product Details</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.672px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><div class=\"row _1IK+Dg\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 797.672px;\"><div class=\"sBVJqn\" style=\"margin: 0px; padding: 0px 24px; width: 797.672px;\"><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Pack of</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">1</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Style Code</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">153-PEACH</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Closure</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">BUTTON</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Fit</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">Regular</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Fabric</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">Viscose Rayon</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Sleeve</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">Full Sleeve</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Pattern</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">Solid</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Reversible</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">No</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Collar</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">Spread</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Color</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">Purple</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Fabric Care</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">Hand wash</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Suitable For</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">Western Wear</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Hem</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">High Low</div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 749.672px;\"><div class=\"col col-3-12 _9NUIO9\" style=\"margin: 0px; padding: 0px 0px 24px; width: 187.406px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Net Quantity</div><div class=\"col col-9-12 -gXFvC\" style=\"margin: 0px; padding: 0px 0px 24px; width: 562.25px; display: inline-block; vertical-align: top;\">1</div></div><div class=\"_4aGEkW\" style=\"margin: 0px; padding: 0px 0px 24px; line-height: 1.57; text-align: justify;\">Walk the streets in style in this shirt from Aashee</div></div></div></div>', '<p>                                                <b><span style=\"margin: 0px; padding: 0px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><span class=\"_8me6nn\" style=\"margin: 0px 8px 0px 0px; padding: 0px;\">Fits:</span>Regular<span class=\"vPZMkG\" style=\"margin: 0px 8px; padding: 0px;\">|</span></span><span style=\"margin: 0px; padding: 0px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><span class=\"_8me6nn\" style=\"margin: 0px 8px 0px 0px; padding: 0px;\">Size:</span>XL</span></b></p><p><b><span style=\"margin: 0px; padding: 0px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><br></span></b>\r\n                                              </p>', '<span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\">10 Days Return Policy</span>', '', 449, 1499, 2, 6, 'Yes', 'Cas/Spr/Wom/Fit', '#CasSprWomFit', 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-08-05 06:36:57', 9),
(86, 'REDMI 12 5G (Moonstone Silver, 128 GB)  (6 GB RAM)', 'redmi-12-5g-moonstone-silver-128-gb-6-gb-ram', '<p><p><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\">Redmi 12 5G mobile comes with a 90 Hz refresh rate 6.79-inch touchscreen display offering a resolution of 2460x1080 pixels (FHD+). The display sports Gorilla Glass for protection. Redmi 12 5G is powered by an octa-core Qualcomm Snapdragon 4 Gen 2 processor. It comes with 8GB RAM. The Redmi 12 5G runs Android 13 and is powered by a 5000mAh non-removable battery. The Redmi 12 5G supports proprietary fast charging.</span></p><p><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><br></span></p><div class=\"_4BJ2V+\" style=\"margin: 0px; padding: 0px 0px 16px; font-size: 18px; text-wrap: nowrap; line-height: 1.4; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif;\">General</div><p>                                                    \r\n                                                  </p><table class=\"_0ZhAN9\" style=\"margin: 0px; padding: 0px; width: 747.672px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><tbody style=\"margin: 0px; padding: 0px;\"><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">In The Box</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Handset, 22.5W Charger, USB Type-C Cable, Sim Eject Tool, Protective Case, Quick Start Guide, Warranty Card</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Model Number</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">MZB0EQFIN</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Model Name</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">12 5G</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Color</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Moonstone Silver</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Browse Type</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Smartphones</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">SIM Type</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Dual Sim</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Hybrid Sim Slot</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Yes</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Touchscreen</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Yes</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">OTG Compatible</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Yes</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Quick Charging</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Yes</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">SAR Value</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><p style=\"margin: 0px; padding: 0px; list-style: none;\">SAR Limit: 1.6 W/kg, Head SAR: 0.867 W/kg, Body SAR: 0.867 W/kg</p></td></tr></tbody></table></p>', '<p>                                                <span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\">Redmi 12 5G mobile comes with a 90 Hz refresh rate 6.79-inch touchscreen display offering a resolution of 2460x1080 pixels (FHD+). The display sports Gorilla Glass for protection. Redmi 12 5G is powered by an octa-core Qualcomm Snapdragon 4 Gen 2 processor. It comes with 8GB RAM. The Redmi 12 5G runs Android 13 and is powered by a 5000mAh non-removable battery. The Redmi 12 5G supports proprietary fast charging.</span></p><p><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><br></span></p><p>\r\n                                              </p>', '<ul><li><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\">10 Days Return Policy</span></li><li><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\">7 Days Service Center Replacement/Repair</span><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><br></span>                                                  \r\n                                                </li></ul>', '', 12499, 17999, 6, 3, 'Yes', 'RED/Moo/6GB/128', '#RedMoo6Gb128', 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-08-05 06:21:54', 8),
(87, 'Gowardhan Pure Cow Ghee 1 L Plastic Bottle', 'gowardhan-pure-cow-ghee-1-l-plastic-bottle', '<div class=\"_4BJ2V+\" style=\"margin: 0px; padding: 0px 0px 16px; font-size: 18px; text-wrap: nowrap; line-height: 1.4; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif;\"><div class=\"_4BJ2V+\" style=\"margin: 0px; padding: 0px 0px 16px; line-height: 1.4;\">Legal Disclaimer</div><table class=\"_0ZhAN9\" style=\"margin: 0px; padding: 0px; width: 747.672px; font-size: 14px; text-wrap: wrap;\"><tbody style=\"margin: 0px; padding: 0px;\"><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 747.672px;\"><td class=\"Izz52n col col-12-12\" style=\"margin: 0px; padding: 0px; width: 747.672px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Flipkart endeavours to ensure that the sellers provide accurate information on the platform. It is pertinent to note that, actual product packaging and materials may contain more and different information, which may include nutritional information/allergen declaration/special instruction for intended use/warning/directions, health &amp; nutritional claims, etc. We recommend that consumers always read the label carefully before using or consuming any products. Please do not solely rely on the information provided on this website. For additional information, please get in touch with the manufacturer.</li></ul></td></tr></tbody></table></div><div class=\"_4BJ2V+\" style=\"margin: 0px; padding: 0px 0px 16px; font-size: 18px; text-wrap: nowrap; line-height: 1.4; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif;\"><br></div><div class=\"_4BJ2V+\" style=\"margin: 0px; padding: 0px 0px 16px; font-size: 18px; text-wrap: nowrap; line-height: 1.4; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif;\">General</div><table class=\"_0ZhAN9\" style=\"margin: 0px; padding: 0px; width: 747.672px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><tbody style=\"margin: 0px; padding: 0px;\"><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Brand</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Gowardhan</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Model Name</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Pure Cow</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Container Type</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Plastic Bottle</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Quantity</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">1 L</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Maximum Shelf Life</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">366 Days</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Source Type</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Cow Milk</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Organic</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">No</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px 0px 16px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Ingredients</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">NA</li></ul></td></tr><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 747.672px;\"><td class=\"+fFi1w col col-3-12\" style=\"margin: 0px; padding: 0px 8px 0px 0px; width: 186.906px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Net Quantity</td><td class=\"Izz52n col col-9-12\" style=\"margin: 0px; padding: 0px; width: 560.75px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">1 L</li></ul><p style=\"margin: 0px; padding: 0px; list-style: none;\"><br></p><p style=\"margin: 0px; padding: 0px; list-style: none;\"><br></p></td></tr></tbody></table>', '<table class=\"_0ZhAN9\" style=\"margin: 0px; padding: 0px; width: 747.672px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><tbody style=\"margin: 0px; padding: 0px;\"><tr class=\"WJdYP6 row\" style=\"margin: 0px; padding: 0px; flex-direction: row; width: 747.672px;\"><td class=\"Izz52n col col-12-12\" style=\"margin: 0px; padding: 0px; width: 747.672px; display: inline-block; vertical-align: top; line-height: 1.4; word-break: break-word;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li class=\"HPETK2\" style=\"margin: 0px; padding: 0px; list-style: none;\">Flipkart endeavours to ensure that the sellers provide accurate information on the platform. It is pertinent to note that, actual product packaging and materials may contain more and different information, which may include nutritional information/allergen declaration/special instruction for intended use/warning/directions, health &amp; nutritional claims, etc. We recommend that consumers always read the label carefully before using or consuming any products. Please do not solely rely on the information provided on this website. For additional information, please get in touch with the manufacturer.</li></ul></td></tr></tbody></table>', '<p style=\"margin: 0px; padding: 0px 0px 8px; list-style: none; position: relative;\"></p><p style=\"margin: 0px; padding: 0px 0px 8px; list-style: none; position: relative;\"><ul></ul></p><ul><li style=\"margin: 0px 0px 0px 17px; padding: 0px;\">Easy Doorstep Return</li><li style=\"margin: 0px; padding: 0px 0px 8px; list-style: none; position: relative;\"><ul></ul></li><li style=\"margin: 0px 0px 0px 17px; padding: 0px;\">Schedule your delivery</li><li style=\"margin: 0px; padding: 0px 0px 8px; list-style: none; position: relative;\"><ul></ul></li><li style=\"margin: 0px 0px 0px 17px; padding: 0px;\">Cash on Delivery available</li></ul>', '', 652, 725, 4, 5, 'Yes', 'Gow/Gow/1L/Pla', '#barcodeGow1lPla', 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-08-05 06:07:50', 7),
(88, 'POCO M6 5G (Polaris Green, 64 GB)  (4 GB RAM)', 'poco-m6-5g-polaris-green-64-gb-4-gb-ram', '<div><br></div><div><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 20px;\">Speed Redefined</span></div><div><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 20px;\"><br></span></div><div><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\">Experience the lightning-fast speed and seamless performance with the MediaTek Dimensity 6100+ 5G processor. The POCO M6 takes a giant leap in processing power, ensuring swift app launches, smoother navigation, and lag-free multitasking. Say goodbye to the frustration of app reloads and sluggish performance – the POCO M6 is here to redefine speed.</span></div><div><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><br></span></div><div><br></div><div><div class=\"pqHCzB\" style=\"margin: 0px; padding: 0px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><div class=\"CB-A+e w9oVFJ\" style=\"margin: -1px 0px 0px; padding: 24px; border: 1px solid rgb(240, 240, 240);\"><div style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px;\"><div class=\"AoD2-N\" style=\"margin: 0px; padding: 0px; line-height: 1.29;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\">Ample Storage, Endless Possibilities</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">With up to 64 GB of storage, the POCO M6 provides ample space for your apps, media, and files. Bid farewell to storage woes as you effortlessly manage your data. Need more space? No problem. The storage is expandable up to a whopping 1 TB, ensuring that your phone grows with your needs.<span style=\"font-size: 20px;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\">Premium Sky Dance Design</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">Prepare to be mesmerised by the New Design language of the POCO M6 – the Premium Sky Dance design. Immerse yourself in a dance of light and colour, as the hues shift and blend like a celestial aurora. The POCO M6 is not just a smartphone; it\'s a visual masterpiece that reflects your style and sophistication.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\">Stunning Visuals on a 17.12 cm Canvas</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">Witness every detail come alive on the expansive 17.12 cm (6.7) canvas of the POCO M6. Whether you\'re indulging in blockbuster movies, editing high-resolution photos, or enjoying a captivating ebook, the POCO M6 ensures a visual feast that captivates your senses.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\">50 MP AI Dual-Camera System</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">Unleash your inner photographer with the POCO M6\'s 50 MP AI dual-camera system. Capture pixel-perfect details with the 50 MP main sensor that lets you zoom in without sacrificing quality. Elevate your mobile photography game and explore the endless possibilities that the POCO M6 offers.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\">Weekend Battery for Uninterrupted Fun</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">Powered by a robust 5000 mAh Weekend battery, the POCO M6 ensures you never run out of power during your weekend adventures. With 18 W Fast charging support, you can quickly top up your battery and get back to enjoying life without any interruptions.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\">Side Fingerprint Sensor for Enhanced Security</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><span style=\"font-size: 20px;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">Your security matters and the POCO M6 takes it seriously. The side fingerprint sensor, seamlessly integrated with the power button, adds an extra layer of protection to your phone. Your fingerprint is one of the most unique identifiers, making it virtually impossible to hack. Enjoy peace of mind knowing that your data is secure.</p></div></div></div></div></div></div><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><br></span><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 20px;\"><br></span><br></div>', '<p class=\"\"><span style=\"color: rgb(33, 33, 33); font-family: Helvetica; font-size: 14px;\">Welcome to the future of smartphones – the POCO M6 5G, where innovation meets elegance, power, and speed. The POCO M6 5G is a statement of technological prowess, design excellence, and user-centric innovation. Embrace the future with a device that combines speed, storage, stunning visuals, and top-notch security. Elevate your mobile experience with the POCO M6 – where every feature is a testament to a new era in smartphone excellence.</span></p>', '<p><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif;\">1 Year Manufacturer Warranty for Phone and 6 Months Warranty for In the Box</span></p><p><span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif;\"><br></span></p><div style=\"margin: 0px; padding: 0px; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><div class=\"zIL+eP\" style=\"margin: 0px; padding: 0px; font-size: 16px; line-height: 2.4;\">Accessories</div></div><section class=\"qw7sSt\" style=\"margin: 20px 0px 0px; padding: 0px; overflow: auto; color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 14px;\"><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 1.43; color: rgb(135, 135, 135);\">POCO</h4><div class=\"eRh-JL\" style=\"margin: 0px; padding: 0px; float: left; width: 350px;\">POCO is a consumer technology brand on a mission to deliver the highest quality products to its fans and consumers. Ranked as India’s third largest online smartphone brand, POCO approaches every product with a philosophy of \'Everything you need and nothing you don\'t’ and aims to fulfil POCO enthusiast’ requirements to each extent. POCO is also the fastest growing smartphone brand in 2021, as per IDC Worldwide Quarterly Mobile Phone Tracker, May 2021.<div class=\"lknXX8\" style=\"margin: 15px 0px 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px;\">POCO</div><div class=\"LGUM0c\" style=\"margin: 0px; padding: 0px;\"><a href=\"https://www.poco.in/\" target=\"_blank\">https://www.poco.in/</a></div><div class=\"LGUM0c\" style=\"margin: 0px; padding: 0px;\"><br></div><div class=\"LGUM0c\" style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px;\">For any warranty related issues, please call the POCO Customer Support -</div><span class=\"X+JcH5\" style=\"margin: 0px; padding: 0px;\"><a href=\"tel:1800-572-7626\" style=\"margin: 0px; padding: 0px; color: inherit; border: none; outline: none;\">1800-572-7626</a></span></div><div style=\"margin: 0px; padding: 0px;\"><div class=\"X+JcH5\" style=\"margin: 0px; padding: 0px;\"><a href=\"mailto:service.in@poco.net\" style=\"margin: 0px; padding: 0px; color: inherit; border: none; outline: none;\">service.in@poco.net</a></div></div></div></div></div></section>', '', 8799, 11999, 6, 4, 'Yes', 'MOB/POC/M6/5G', '#POCOM65G', 'Yes', 10, 1, '2024-07-18 09:50:11', '2024-08-05 05:50:55', 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(72, 55, '55-72-1721152647.jpg', NULL, '2024-07-16 12:27:27', '2024-07-16 12:27:27'),
(74, 56, '56-74-1721152796.jpg', NULL, '2024-07-16 12:29:56', '2024-07-16 12:29:56'),
(75, 57, '57-75-1721153058.jpg', NULL, '2024-07-16 12:34:18', '2024-07-16 12:34:18'),
(76, 58, '58-76-1721153429.jpg', NULL, '2024-07-16 12:40:29', '2024-07-16 12:40:29'),
(80, 88, '88-80-1722854433.jpg', NULL, '2024-08-05 05:10:33', '2024-08-05 05:10:33'),
(81, 88, '88-81-1722854437.jpg', NULL, '2024-08-05 05:10:37', '2024-08-05 05:10:37'),
(82, 88, '88-82-1722854441.jpg', NULL, '2024-08-05 05:10:41', '2024-08-05 05:10:41'),
(84, 87, '87-84-1722857610.jpg', NULL, '2024-08-05 06:03:30', '2024-08-05 06:03:30'),
(85, 87, '87-85-1722857614.jpg', NULL, '2024-08-05 06:03:34', '2024-08-05 06:03:34'),
(86, 87, '87-86-1722857618.jpg', NULL, '2024-08-05 06:03:38', '2024-08-05 06:03:38'),
(87, 86, '86-87-1722858415.jpg', NULL, '2024-08-05 06:16:55', '2024-08-05 06:16:55'),
(88, 86, '86-88-1722858422.jpg', NULL, '2024-08-05 06:17:02', '2024-08-05 06:17:02'),
(89, 86, '86-89-1722858425.jpg', NULL, '2024-08-05 06:17:05', '2024-08-05 06:17:05'),
(90, 85, '85-90-1722859205.jpg', NULL, '2024-08-05 06:30:05', '2024-08-05 06:30:05'),
(92, 85, '85-92-1722859222.jpg', NULL, '2024-08-05 06:30:22', '2024-08-05 06:30:22'),
(93, 85, '85-93-1722859226.jpg', NULL, '2024-08-05 06:30:26', '2024-08-05 06:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rating` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`id`, `product_id`, `username`, `email`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 57, 'Ravi kumar', 'ravi395950@gmail.com', 'Thank you your product is best experiences', 3, 1, '2024-08-04 04:20:36', '2024-08-04 06:00:41'),
(2, 57, 'krish', 'krish@gmail.com', 'Good product', 3, 1, '2024-08-04 04:26:07', '2024-08-04 06:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6SVlTGIyHqA4SbILyI440J5Sup43iqCQGs6oAUpc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZzNxVFJ6Z0QxSGpxdEMzMGtlb21sd0FVMXp3bXQzM1lmVGNEUm14eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1720783366);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, '100', 10, '2024-07-22 04:29:29', '2024-07-22 05:47:17'),
(2, 'rest_of_world', 50, '2024-07-22 04:56:36', '2024-07-23 05:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `showHome` enum('Yes','No') NOT NULL DEFAULT 'No',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `status`, `showHome`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'T-shirt', 't-shirt', 1, 'Yes', 2, '2024-07-05 03:56:18', '2024-07-13 04:00:47'),
(2, 'Nike', 'nike', 1, 'No', 4, '2024-07-05 03:56:53', '2024-07-17 11:10:07'),
(3, 'Jeans', 'jeans', 1, 'Yes', 2, '2024-07-13 04:04:17', '2024-07-13 04:04:17'),
(4, 'Mac', 'mac', 1, 'Yes', 3, '2024-07-13 04:13:30', '2024-07-13 04:13:30'),
(5, 'Hp', 'hp', 1, 'Yes', 3, '2024-07-13 04:15:04', '2024-07-13 04:15:04'),
(6, 'Women T-Shirt', 'women-t-shirt', 1, 'Yes', 1, '2024-07-13 04:19:14', '2024-07-13 04:19:14'),
(7, 'Ghee', 'ghee', 1, 'No', 4, '2024-07-13 04:20:03', '2024-08-05 05:56:12'),
(8, 'Smartphones', 'smartphones', 1, 'No', 6, '2024-07-16 12:40:57', '2024-08-05 04:56:28'),
(9, 'Women Casual Shirt', 'wcasual-shirt', 1, 'Yes', 2, '2024-08-05 06:34:27', '2024-08-05 06:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `temp_images`
--

CREATE TABLE `temp_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'Ravi kumar', NULL, 'admin@gmail.com', 2, 1, NULL, '$2y$12$epNOfTPOAbXdu0xtJ6PPge9SS6nAxW.ohbuyD968QDSnD1zM6TjFK', NULL, '2024-07-05 03:53:53', '2024-08-02 10:07:49', NULL),
(2, 'krish', NULL, 'krish@gmail.com', 1, 1, NULL, '$2y$12$U9k/WWL2uZdv2sDQ7W9W4uUHTaAYvNS4Uwv2U8q4ugPRf4tohgMLa', NULL, '2024-07-21 02:02:20', '2024-08-02 09:07:57', '5412368447'),
(24, 'Ravi', NULL, 'ravi395950@gmail.com', 1, 1, NULL, '$2y$12$ARseT5cniyJKsJMowWCZC.yuhFX3mA2d40tdT/6gpTM1D2QcqLbNy', NULL, '2024-08-04 01:54:28', '2024-08-04 01:54:28', '45698741269'),
(25, 'rkconsultancy', NULL, 'rkconsultancy34@gmail.com', 1, 1, NULL, '$2y$12$8/niVFljcCTd8oT9IEiy8O.kZU4ysNZEv8LolwJhRF60Gao/MMHWu', NULL, '2024-08-04 02:33:21', '2024-08-04 02:45:36', '4123556887');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addresses_user_id_foreign` (`user_id`),
  ADD KEY `customer_addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `temp_images`
--
ALTER TABLE `temp_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD CONSTRAINT `customer_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
