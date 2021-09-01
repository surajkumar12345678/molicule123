-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 10:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `molicule_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_edits`
--

CREATE TABLE `about_us_edits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welcome_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutus_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutus_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_about`
--

CREATE TABLE `admin_about` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_about`
--

INSERT INTO `admin_about` (`id`, `title`, `slug`, `image`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', 'about', 'blog_99742162.png', '<p>fsdf sdfs&nbsp;</p>', '0', '2021-08-20 06:14:33', '2021-08-20 06:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_blogs`
--

CREATE TABLE `admin_blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_blogs_category`
--

CREATE TABLE `admin_blogs_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_blogs_category`
--

INSERT INTO `admin_blogs_category` (`id`, `cate_name`, `cate_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Testzz', 'testzz', '0', '2021-08-19 07:07:47', '2021-08-19 08:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_email_notification`
--

CREATE TABLE `admin_email_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL,
  `new_merchant` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cancell` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `upgraded` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `trial_expire` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `not_setup` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_faq`
--

CREATE TABLE `admin_faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_faq`
--

INSERT INTO `admin_faq` (`id`, `title`, `slug`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(2, 'The Personality Trait That Makes People Happier', 'the-personality-trait-that-makes-people-happier', '<p>The Personality Trait That Makes People Happier fsdfsdf</p>', '0', '2021-08-20 06:58:43', '2021-08-20 07:00:20'),
(3, 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', 'term', '<p>dsfsdfsdf</p>', '0', '2021-08-20 07:25:25', '2021-08-20 07:25:25'),
(4, 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', 'term', '<p>dsfsdfsdf</p>', '0', '2021-08-20 07:25:33', '2021-08-20 07:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_marketing_option`
--

CREATE TABLE `admin_marketing_option` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_nalytics` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_pixel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_shopping_feed` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_shop_feed` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_shop_feed` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsApp_chat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailchaimp_api_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailchaimp_api_list` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_marketing_option`
--

INSERT INTO `admin_marketing_option` (`id`, `user_id`, `google_nalytics`, `facebook_pixel`, `google_shopping_feed`, `facebook_shop_feed`, `instagram_shop_feed`, `whatsApp_chat`, `mailchaimp_api_key`, `mailchaimp_api_list`, `created_at`, `updated_at`) VALUES
(9, '3', 'yutyutut', 'dewedfewf', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26 10:29:54', '2021-08-26 10:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin_term`
--

CREATE TABLE `admin_term` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_term`
--

INSERT INTO `admin_term` (`id`, `title`, `slug`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', 'term', '<p>fgdfgdfg</p>', '0', '2021-08-20 07:27:46', '2021-08-20 07:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `apply_coupon_user`
--

CREATE TABLE `apply_coupon_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `promo_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_times` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_coupon_user`
--

INSERT INTO `apply_coupon_user` (`id`, `user_id`, `promo_id`, `coupon_times`, `created_at`, `updated_at`) VALUES
(6, 24, 1, 3, '2021-08-09 04:17:30', '2021-08-09 11:29:17'),
(7, 24, 3, 3, '2021-08-10 04:18:27', '2021-08-10 04:48:30'),
(8, 24, 2, 4, '2021-08-10 04:25:45', '2021-08-10 04:57:26'),
(9, 24, 4, 1, '2021-08-11 10:14:20', '2021-08-11 10:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`id`, `user_id`, `fname`, `lname`, `mobile`, `address`, `city`, `zipcode`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 23, 'gopal', 'saini', '7742544602', 'MIA ALWAR', 'ALWAR RAJASTAHN', 301001, NULL, '2021-08-06 04:54:39', '2021-08-06 04:55:19'),
(5, 24, 'gopal', 'saini', '7742544602', 'MIA ALWAR', 'ALWAR RAJASTAHN', 301001, NULL, '2021-08-06 08:57:27', '2021-08-06 08:57:27'),
(6, 24, 'gopal', 'saini', '7742544602', 'address2', 'address2', 301001, NULL, '2021-08-06 11:41:10', '2021-08-06 11:41:10'),
(7, 24, 'gopal', 'demo', '7742544602', 'xczxc', 'zxczxc', 301001, NULL, '2021-08-07 08:20:49', '2021-08-07 08:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_home` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `image`, `feature_home`, `status`, `user_id`, `store_detail_id`, `created_at`, `updated_at`, `slug`, `blog_category_id`) VALUES
(28, 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', '<p><img src=\"blob:http://127.0.0.1:8000/94ea5487-4d07-4448-80ed-f147d43399a1\" style=\"width:100px\" /></p>', 'blog_74210027.jpg', '0', '1', 1, 1, NULL, '2021-08-13 05:01:01', 'noise-buds-vs103-truly-wireless-earbuds-with-18-hour-playtime', 8);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `slug`, `status`, `created_at`, `updated_at`, `user_id`, `store_detail_id`) VALUES
(8, 'test', 'test', '0', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `attributes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `qty`, `attributes`, `created_at`, `updated_at`) VALUES
(22, 24, 26, 1, NULL, '2021-08-17 08:54:28', '2021-08-17 08:54:28'),
(23, 24, 25, 1, '46,47', '2021-08-17 08:54:33', '2021-08-17 03:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`, `user_id`, `store_detail_id`) VALUES
(6, 'test', '1', '2021-08-13 03:30:29', '2021-08-13 03:30:29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_edits`
--

CREATE TABLE `contact_us_edits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_phoneno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cover_images`
--

CREATE TABLE `cover_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpanels`
--

CREATE TABLE `cpanels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpanelUserid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpanelPass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rootDomain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ns1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ns2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_a` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE `layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `layout_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`id`, `layout_name`, `created_at`, `updated_at`) VALUES
(1, 'yuiyui', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_galleries`
--

CREATE TABLE `merchant_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchant_marketing_option`
--

CREATE TABLE `merchant_marketing_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mailchimp_list` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailchimp_api` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_nalytics` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_pixel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_shopping_feed` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_shop_feed` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_shop_feed` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsApp_chat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_marketing_option`
--

INSERT INTO `merchant_marketing_option` (`id`, `user_id`, `mailchimp_list`, `mailchimp_api`, `google_nalytics`, `facebook_pixel`, `google_shopping_feed`, `facebook_shop_feed`, `instagram_shop_feed`, `whatsApp_chat`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'self.webpackChunkwhatsapp_web_client=self.webpackChunkwhatsapp_web_client||[]).push([[5617],{95318:e', NULL, NULL, NULL, NULL, NULL, '2021-08-23 09:51:24', '2021-08-23 09:51:24'),
(2, 3, NULL, NULL, 'yyuuyyugyuguu', 'frftretrgtgtr', NULL, NULL, NULL, NULL, '2021-08-25 11:26:57', '2021-08-26 05:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_payment_option`
--

CREATE TABLE `merchant_payment_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `COD` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `payment_gateway` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `payple_client_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payple_secret_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yoco_client_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yoco_secret_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payfast_client_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payfast_secret_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_payment_option`
--

INSERT INTO `merchant_payment_option` (`id`, `COD`, `payment_gateway`, `payple_client_id`, `payple_secret_id`, `yoco_client_id`, `yoco_secret_id`, `payfast_client_id`, `payfast_secret_id`, `created_at`, `updated_at`, `user_id`) VALUES
(11, '1', '1', 'ertert', NULL, NULL, 'er', 'ertert', 'ertertert', '2021-08-23 06:10:09', '2021-08-24 08:29:32', 1),
(12, '1', '1', '56456', 'fyuhchhcu', 'yyuruy', 'utyuut', 'guuiuifui', 'utyuu', '2021-08-26 06:05:38', '2021-08-26 06:05:38', 3);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_social_option`
--

CREATE TABLE `merchant_social_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_social_option`
--

INSERT INTO `merchant_social_option` (`id`, `user_id`, `facebook`, `instagram`, `youtube`, `linkedin`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://localhost/phpmyadmin/', NULL, 'http://localhost/phpmyadmin/', 'http://localhost/phpmyadmin/<tag></tag>', NULL, '2021-08-23 09:02:18', '2021-08-23 09:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_10_072213_create_plans_table', 1),
(5, '2021_07_10_083610_create_layouts_table', 1),
(6, '2021_07_10_084933_create_store_details_table', 1),
(7, '2021_07_10_093418_create_cover_images_table', 1),
(8, '2021_07_10_093601_create_shipping_infos_table', 1),
(9, '2021_07_10_100630_create_payment_options_table', 1),
(10, '2021_07_13_070825_add_mobile_number_to_users', 1),
(11, '2021_07_21_081239_create_categories_table', 1),
(12, '2021_07_22_092924_create_blogs_table', 1),
(13, '2021_07_22_111644_create_product_types_table', 1),
(14, '2021_07_24_080937_create_products_table', 1),
(15, '2021_07_24_105852_create_product_attributes_table', 1),
(16, '2021_07_26_060725_create_products_table', 2),
(17, '2021_07_27_072648_create_product_attribute_values_table', 2),
(18, '2021_07_28_085815_product_attribute_value_id', 3),
(19, '2021_07_28_095046_product_combination', 4),
(20, '2021_07_28_055046_product_combination', 5),
(21, '2021_07_29_053347_add_status_product_table', 6),
(22, '2021_07_29_053626_add_status_category_table', 6),
(23, '2021_06_26_063339_create_table_wishlist', 7),
(24, '2021_03_23_075015_create_carts_table', 8),
(25, '2021_07_29_071417_add_multiple_column_to_blogs', 9),
(26, '2021_07_29_153808_create_banner_images_table', 9),
(27, '2021_07_31_101556_add_otp_user_table', 10),
(28, '2021_06_26_102145456_create_user_address', 11),
(29, '2021_04_07_083439_sales', 12),
(30, '2021_04_07_083602_sales_order', 12),
(31, '2021_07_07_052912_add_shipping_charge_sales', 12),
(32, '2021_07_23_0505454525_change_sales_status', 13),
(33, '2021_07_23_055154_change_sales_details_status', 13),
(34, '2021_07_23_0616545912_add_cancel_remark_sales_table', 13),
(35, '2021_03_25_110310_add_gender_to_users_table', 14),
(36, '2021_07_10_112548_add_column_to_users_table', 15),
(37, '2021_07_24_142918_create_permission_tables', 15),
(38, '2021_07_29_202011_create_product_categories_table', 15),
(39, '2021_07_30_084706_create_store_details_table', 16),
(40, '2021_07_30_091940_create_promo_codes_table', 16),
(41, '2021_07_30_222135_add_column_to_promo_codes_table', 16),
(42, '2021_07_31_045632_add_image_on_attribute', 17),
(43, '2021_08_01_104550_promocodes_table', 17),
(44, '2021_08_01_222657_create_subscriptions_table', 17),
(45, '2021_08_03_081001_create_shipping_infos_table', 18),
(46, '2021_08_03_163201_create_about_us_edits_table', 18),
(47, '2021_08_04_062611_create_contact_us_edits_table', 18),
(48, '2021_07_10_112548_trem_users_table', 19),
(49, '2021_08_06_101256_start_end_date_coupon', 19),
(50, '2021_08_06_110338_apply_coupon_code_by_user', 20),
(51, '2021_08_05_054339_update_multiple_column_of_products', 21),
(52, '2021_08_06_051230_update_multiple_column', 21),
(53, '2021_08_06_083443_update_columns', 21),
(54, '2021_08_06_084210_add_multiple_columns_to_promocodes', 22),
(55, '2021_08_06_091158_add_max_amount_to_promocodes', 22),
(56, '2021_07_01_072213_create_plans_table', 1),
(57, '2021_07_02_083610_create_layouts_table', 1),
(58, '2021_07_19_081239_create_categories_table', 1),
(59, '2021_07_20_060725_create_products_table', 1),
(60, '2021_07_26_063339_create_table_wishlist', 1),
(61, '2021_08_06_091940_create_promo_codes_table', 1),
(62, '2021_08_06_154816_remove_column_from_subscriptions_tables', 23),
(63, '2021_08_06_181156_add_validity_to_promo_codes', 23),
(64, '2021_08_1_075015_create_carts_table', 1),
(67, '2021_08_09_074529_blog_categories_table', 24),
(69, '2021_08_09_044429_create_order_history_table', 25),
(70, '2021_08_11_084448_create_pages_table', 26),
(71, '2021_08_11_115938_add_columns_to_blogs', 26),
(72, '2021_08_12_115938_add_slug_to_blogs_category', 27),
(73, '2021_08_13_061639_add_column_to_blog_categories', 28),
(74, '2021_08_13_061709_add_column_to_categories', 29),
(75, '2021_08_13_100307_add_new_extra_field_in_store_detail', 30),
(76, '2021_08_13_100954_add_store_detail_id_extra_field_in_users', 30),
(77, '2021_08_14_081706_add_column_to_users_table', 31),
(78, '2021_08_16_055646_create_merchant_galleries_table', 31),
(79, '2021_08_16_105403_add_column_to_merchant_galleries', 31),
(80, '2021_08_17_105403_add_extra_fiels_cart_table', 32),
(81, '2021_08_17_105403_add_extra_fiels_sales_details_table', 33),
(82, '2021_08_17_105403_create_review_rating_table', 34),
(83, '2021_08_16_060800_create_cpanel_table', 35),
(84, '2021_08_16_062905_add_theme_exra_field_in_cpanel', 35),
(85, '2021_08_16_064209_rename_table', 35),
(86, '2021_08_16_064610_rename_cpanels_column', 35),
(87, '2021_08_17_075200_add_new_extra_field_in_cpanel', 35),
(88, '2021_08_17_084036_add_new_extra_field_in_cpanels', 35),
(89, '2021_08_13_112313_add_new_extra_field_in_users', 36),
(90, '2021_08_18_105402_create_admin_blog_category_table', 36),
(91, '2021_08_19_105403_create_admin_blog_table', 37),
(92, '2021_08_19_105403_update_admin_subscription_status_table', 38),
(93, '2021_08_20_105403_create_admin_faq_table', 39),
(94, '2021_08_20_105403_create_admin_about_table', 40),
(95, '2021_08_20_105403_create_admin_term_table', 41),
(97, '2021_08_20_105403_create_admin_email_notification_table', 42),
(98, '2021_08_20_105403_add_admin_email_notification_user', 43),
(99, '2021_08_20_105403_add_status_user', 44),
(100, '2021_08_20_105403_add_status_admin_promocode', 45),
(101, '2021_08_21_113949_merchant_payment_option', 46),
(102, '2021_08_23_042351_add_status_paument_gateway', 47),
(103, '2021_08_23_053534_add_user_id_in_payment_table', 48),
(105, '2021_08_23_083829_merchant_social_table', 49),
(106, '2021_08_23_090309_nullable_make_payment_table', 50),
(107, '2021_08_23_091616_merchant_marketing_table', 51),
(109, '2021_08_24_073537_payment_option_management', 52),
(110, '2021_08_25_051843_create_order_status_table', 53),
(111, '2021_08_25_094658_create_admin_marketing_option_table', 54);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2','3','4','5','6') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderhistory`
--

INSERT INTO `orderhistory` (`id`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '61120736115dd', '1', '2021-08-10 05:55:14', '2021-08-10 05:55:14'),
(2, '61120736115dd', '1', '2021-08-10 05:56:42', '2021-08-10 05:56:42'),
(3, '61120736115dd', '2', '2021-08-10 06:24:41', '2021-08-10 06:24:41'),
(4, '61120736115dd', '3', '2021-08-10 06:24:53', '2021-08-10 06:24:53'),
(5, '61120736115dd', '4', '2021-08-10 06:25:28', '2021-08-10 06:25:28'),
(6, '61120736115dd', '1', '2021-08-10 06:26:41', '2021-08-10 06:26:41'),
(7, '61120736115dd', '2', '2021-08-10 06:26:57', '2021-08-10 06:26:57'),
(8, '61120736115dd', '3', '2021-08-10 06:28:33', '2021-08-10 06:28:33'),
(9, '61120592b0ee4', '1', '2021-08-10 06:29:52', '2021-08-10 06:29:52'),
(10, '61120592b0ee4', '2', '2021-08-10 06:30:03', '2021-08-10 06:30:03'),
(11, '61120592b0ee4', '3', '2021-08-10 06:30:14', '2021-08-10 06:30:14'),
(12, '6112051ea922a', '1', '2021-08-10 06:36:52', '2021-08-10 06:36:52'),
(13, '6112051ea922a', '2', '2021-08-10 06:37:05', '2021-08-10 06:37:05'),
(14, '6112051ea922a', '3', '2021-08-10 06:37:16', '2021-08-10 06:37:16'),
(15, '611200546730e', '1', '2021-08-10 06:39:46', '2021-08-10 06:39:46'),
(16, '611200546730e', '2', '2021-08-10 06:39:55', '2021-08-10 06:39:55'),
(17, '611200546730e', '3', '2021-08-10 06:40:05', '2021-08-10 06:40:05'),
(18, '6111fff3252fc', '1', '2021-08-10 06:42:30', '2021-08-10 06:42:30'),
(19, '6111fff3252fc', '2', '2021-08-10 06:42:41', '2021-08-10 06:42:41'),
(20, '6111fff3252fc', '3', '2021-08-10 06:42:52', '2021-08-10 06:42:52'),
(21, '6111ffc923ad7', '1', '2021-08-10 06:43:16', '2021-08-10 06:43:16'),
(22, '6111ffc923ad7', '5', '2021-08-10 07:15:33', '2021-08-10 07:15:33'),
(23, '6111ffc923ad7', '5', '2021-08-10 07:15:56', '2021-08-10 07:15:56'),
(24, '6111fe13910e4', '5', '2021-08-10 07:19:42', '2021-08-10 07:19:42'),
(25, '6111118dae5a7', '5', '2021-08-10 07:20:55', '2021-08-10 07:20:55'),
(26, '6110ad73c4e05', '1', '2021-08-10 07:45:31', '2021-08-10 07:45:31'),
(27, '6110ad73c4e05', '6', '2021-08-10 08:57:55', '2021-08-10 08:57:55'),
(28, '610e2eee13825', '6', '2021-08-10 09:07:11', '2021-08-10 09:07:11'),
(29, '6113a2fbe52d5', '1', '2021-08-11 10:16:33', '2021-08-11 10:16:33'),
(30, '6113a2fbe52d5', '2', '2021-08-11 10:16:42', '2021-08-11 10:16:42'),
(31, '611b772abdb01', '1', '2021-08-17 09:15:51', '2021-08-17 09:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_name`, `slug`, `description`, `paid`, `report`, `type`, `created_at`, `updated_at`) VALUES
(5, 'anand vihari', 'gffrg', 'sdsd', 'no', 'no', 'no', '2021-08-25 13:16:45', '2021-08-25 14:06:01'),
(6, 'anam', 'gffrg', 'sdsd', 'no', 'ttgt', 'no', '2021-08-25 13:19:56', '2021-08-26 13:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_options`
--

CREATE TABLE `payment_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL,
  `paypal` tinyint(1) DEFAULT NULL,
  `paypal_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `online_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payfast` tinyint(1) DEFAULT NULL,
  `payfast_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yoco` tinyint(1) DEFAULT NULL,
  `yoco_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_cash_on_delivery` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_option_management`
--

CREATE TABLE `payment_option_management` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_option` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payple_client_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payple_secret_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yoco_client_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yoco_secret_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payfast_client_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payfast_secret_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_option_management`
--

INSERT INTO `payment_option_management` (`id`, `user_id`, `payment_option`, `payple_client_id`, `payple_secret_id`, `yoco_client_id`, `yoco_secret_id`, `payfast_client_id`, `payfast_secret_id`, `created_at`, `updated_at`) VALUES
(5, '3', 'payment_getway', 'yrty', 'ytytu', NULL, NULL, NULL, NULL, '2021-08-26 13:31:50', '2021-08-26 10:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'yuiyui', '200', 'yuiyui', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,2) DEFAULT 0.00,
  `gtin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` decimal(18,2) DEFAULT 0.00,
  `price_in_currency_set` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digital_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_seller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(18,2) DEFAULT 0.00,
  `feature_home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_detail_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `title`, `description`, `feature_image`, `product_type`, `sku`, `price`, `gtin`, `stock`, `price_in_currency_set`, `product_mode`, `digital_file`, `shipping`, `best_seller`, `weight`, `feature_home`, `feature_category`, `user_id`, `store_detail_id`, `status`, `created_at`, `updated_at`) VALUES
(25, 'test', 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', 'test test', 'product_image_69298994.jpg,product_image_13219013.jpg,product_image_25434412.jpg', 'Variable product', 'TEST2021', '200.00', '200', '200.00', NULL, 'physical', NULL, 'Yes', 'No', '20.00', 'on', NULL, 1, 1, '1', NULL, NULL),
(26, 'test', 'The Personality Trait That Makes People Happier', 'brings the trust and credibility of more than 20 years with the best of science through Burnol Antiseptic Solution which kills all types of germs, bacteria and viruses. This multi-purpose disinfectant solution provides holistic protection from cuts, scrat', 'product_image_43687555.jpg,product_image_70770092.jpg,product_image_17087102.jpg', 'Variable product', 'TEST2021', '300.00', '200', '22.00', NULL, 'physical', NULL, 'Yes', 'No', '20.00', 'on', NULL, 1, 1, '1', NULL, NULL),
(33, '', 'Noise Buds VS103 - Truly Wireless Earbu', 'Noise Buds VS103 - Truly Wireless Earbu', 'product_image_69298994.jpg', 'Variable product', 'TEST2021', '500.00', '200', '200.00', NULL, 'physical', NULL, 'Yes', 'No', '0.00', NULL, NULL, 1, 1, '1', '2021-08-23 02:12:29', '2021-08-23 02:12:29'),
(34, '', 'The Personality Tra', 'Noise Buds VS103 - Truly Wireless Earbu', 'product_image_43687555.jpg', 'Variable product', 'TEST2021', '800.00', '200', '22.00', NULL, 'physical', NULL, 'Yes', 'No', '0.00', NULL, NULL, 1, 1, '1', '2021-08-23 02:12:29', '2021-08-23 02:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `products_review`
--

CREATE TABLE `products_review` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_review`
--

INSERT INTO `products_review` (`id`, `user_id`, `product_id`, `rating`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, 24, 25, '4', 'Atleast usefull when detol & savlon out of common man\'s reach in current scenario', '1', '2021-08-17 09:57:18', '2021-08-17 10:00:17'),
(2, 24, 25, '5', 'It\'s a waste product. Pls don\'t waste your money, it\'s simply a coloured perfumed water nothing more than that. I can say this confidently because once I have purchased this product from my n', '1', '2021-08-17 09:57:18', '2021-08-17 10:00:17'),
(3, 24, 26, '4', 'test rating', '1', '2021-08-17 11:07:42', '2021-08-17 11:09:03'),
(4, 24, 26, '4', 'fghghfg fghfgh', '0', '2021-08-17 11:09:43', '2021-08-17 11:09:43'),
(5, 24, 25, '4', 'sdfsf sdfsdfsdf', '1', '2021-08-17 11:13:43', '2021-08-17 11:14:01'),
(6, 24, 25, '1', 'Atleast usefull when detol & savlon out of common man\'s reach in current scenario', '1', '2021-08-17 11:24:08', '2021-08-17 11:24:23'),
(7, 24, 25, '3', 'It\'s a waste product. Pls don\'t waste your money, it\'s simply a coloured perfumed water nothing more than that. I can say this confidently because once I have purchased this product from my n', '1', '2021-08-17 11:27:47', '2021-08-17 11:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `attribute_name`, `created_at`, `updated_at`) VALUES
(11, 'Color', '2021-08-13 03:32:23', '2021-08-13 03:32:23'),
(12, 'Size', '2021-08-13 06:21:42', '2021-08-13 06:21:42'),
(13, 'Weight', '2021-08-16 23:45:13', '2021-08-16 23:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_values`
--

INSERT INTO `product_attribute_values` (`id`, `attribute_value`, `product_attribute_id`, `product_id`, `created_at`, `updated_at`) VALUES
(24, '45,46', 11, 25, '2021-08-13 03:32:37', '2021-08-13 03:32:37'),
(25, '47,48', 12, 25, '2021-08-13 06:21:54', '2021-08-13 06:21:54'),
(26, '49,50', 13, 25, '2021-08-16 23:45:29', '2021-08-16 23:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_value_id`
--

CREATE TABLE `product_attribute_value_id` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_value_id`
--

INSERT INTO `product_attribute_value_id` (`id`, `product_attribute_id`, `product_id`, `attribute_value`, `created_at`, `updated_at`) VALUES
(45, 11, 25, 'Green', '2021-08-13 09:02:37', '2021-08-13 09:02:37'),
(46, 11, 25, 'Red', '2021-08-13 09:02:37', '2021-08-13 09:02:37'),
(47, 12, 25, 'M', '2021-08-13 11:51:54', '2021-08-13 11:51:54'),
(48, 12, 25, 'XL', '2021-08-13 11:51:54', '2021-08-13 11:51:54'),
(49, 13, 25, '2kg', '2021-08-17 05:15:29', '2021-08-17 05:15:29'),
(50, 13, 25, '3kg', '2021-08-17 05:15:29', '2021-08-17 05:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_combination`
--

CREATE TABLE `product_combination` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,2) NOT NULL DEFAULT 0.00,
  `stock` decimal(18,2) NOT NULL DEFAULT 0.00,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_combination`
--

INSERT INTO `product_combination` (`id`, `product_attribute_id`, `product_id`, `value_id`, `price`, `stock`, `description`, `weight`, `image`, `created_at`, `updated_at`) VALUES
(12, '11', 25, '45', '200.00', '200.00', 'fgdfg dfgdfgdfg', 20, '88062598.jpg', '2021-08-13 09:02:56', '2021-08-17 06:10:13'),
(13, '11,12', 25, '45,48', '200.00', '200.00', 'dfgdfgdfg', 20, '19937370.jpg', '2021-08-13 12:29:49', '2021-08-17 07:21:08'),
(14, '11,12', 25, '46,48', '200.00', '200.00', 'hnhfghfh', 20, '42367279.jpg', '2021-08-13 12:30:10', '2021-08-13 12:30:10'),
(15, '11,12', 25, '46,47', '200.00', '22.00', 'test', 20, '99475660.jpg', '2021-08-17 05:13:20', '2021-08-17 05:13:20'),
(16, '11,12,13', 25, '45,47,49', '500.00', '200.00', 'test weight', 20, '80676713.jpg', '2021-08-17 05:15:57', '2021-08-17 06:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `product_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Variable product', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promocode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percentage` bigint(20) DEFAULT NULL,
  `fixed_rate_discount` decimal(18,2) DEFAULT NULL,
  `specific_product` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promocode_mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_time_used` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `max_time_one_user` int(11) DEFAULT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `max_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `promocode`, `description`, `discount_percentage`, `fixed_rate_discount`, `specific_product`, `promocode_mode`, `no_of_time_used`, `status`, `user_id`, `store_detail_id`, `created_at`, `updated_at`, `max_time_one_user`, `discount_type`, `start_date`, `end_date`, `max_amount`) VALUES
(1, 'JULY2021', 'JULY2021', 50, '100.00', NULL, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-03', '2021-08-31', 500),
(2, 'Ag2021', 'sdfsdf', 10, NULL, '5', 'unlimited', NULL, 1, 1, 1, NULL, NULL, 2, 'fixed', '2021-08-10', '2021-08-26', 200),
(3, 'Ag20212', 'test coupon', NULL, '500.00', NULL, 'no of time used', 3, 1, 1, 1, NULL, NULL, 1, 'fixed', '2021-08-10', '2021-08-28', 200),
(4, 'new2021', 'TEST', 20, NULL, '5', 'unlimited', NULL, 1, 1, 1, NULL, NULL, 2, 'percentage', '2021-08-10', '2021-08-28', 200);

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promo_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_specific` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_times` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `valid_until` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `promo_code`, `discount_type`, `actual_discount`, `is_specific`, `product_category_id`, `no_of_times`, `status`, `created_at`, `updated_at`, `valid_until`) VALUES
(2, 'Ag2021', 'fixed_amount', '20', '', NULL, 20, '1', '2021-08-21 04:04:01', '2021-08-21 04:18:56', '2021-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pincode` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1=>Bank Transfer, 2=>COD',
  `paymt_txnid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` decimal(18,2) NOT NULL DEFAULT 0.00,
  `shipping_charge` decimal(18,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `net_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `promocode_id` int(11) NOT NULL DEFAULT 0,
  `promocode_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `status` enum('0','1','2','3','4','5','6') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `cancel_remark` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `order_id`, `name`, `mobile`, `city`, `Pincode`, `address`, `payment_type`, `paymt_txnid`, `sub_total`, `shipping_charge`, `discount`, `net_amount`, `promocode_id`, `promocode_amount`, `status`, `cancel_remark`, `remember_token`, `created_at`, `updated_at`) VALUES
(41, 24, '6113a2fbe52d5', 'gopal saini', '7742544602', 'ALWAR RAJASTAHN', 301001, 'MIA ALWAR', '2', NULL, '800.00', '0.00', '40.00', '760.00', 4, '40.00', '2', '', NULL, '2021-08-11 10:14:20', '2021-08-11 10:16:42'),
(42, 24, '611b69508e2cf', 'gopal saini', '7742544602', 'ALWAR RAJASTAHN', 301001, 'MIA ALWAR', '2', NULL, '500.00', '0.00', '0.00', '500.00', 0, '0.00', '0', NULL, NULL, '2021-08-17 07:46:24', '2021-08-17 07:46:24'),
(43, 24, '611b6be1e5aa8', 'gopal saini', '7742544602', 'ALWAR RAJASTAHN', 301001, 'MIA ALWAR', '2', NULL, '500.00', '0.00', '0.00', '500.00', 0, '0.00', '0', NULL, NULL, '2021-08-17 07:57:22', '2021-08-17 07:57:22'),
(44, 24, '611b6c61198ed', 'gopal saini', '7742544602', 'ALWAR RAJASTAHN', 301001, 'MIA ALWAR', '2', NULL, '500.00', '0.00', '0.00', '500.00', 0, '0.00', '0', NULL, NULL, '2021-08-17 07:59:29', '2021-08-17 07:59:29'),
(45, 24, '611b6cc155887', 'gopal saini', '7742544602', 'ALWAR RAJASTAHN', 301001, 'MIA ALWAR', '2', NULL, '200.00', '0.00', '0.00', '200.00', 0, '0.00', '0', NULL, NULL, '2021-08-17 08:01:05', '2021-08-17 08:01:05'),
(46, 24, '611b73f963f5b', 'gopal saini', '7742544602', 'ALWAR RAJASTAHN', 301001, 'MIA ALWAR', '2', NULL, '200.00', '0.00', '0.00', '200.00', 0, '0.00', '0', NULL, NULL, '2021-08-17 08:31:53', '2021-08-17 08:31:53'),
(47, 24, '611b7418a4d5b', 'gopal saini', '7742544602', 'ALWAR RAJASTAHN', 301001, 'MIA ALWAR', '2', NULL, '200.00', '0.00', '0.00', '200.00', 0, '0.00', '0', NULL, NULL, '2021-08-17 08:32:24', '2021-08-17 08:32:24'),
(48, 24, '611b772abdb01', 'gopal saini', '7742544602', 'ALWAR RAJASTAHN', 301001, 'MIA ALWAR', '2', NULL, '500.00', '0.00', '0.00', '500.00', 0, '0.00', '1', '', NULL, '2021-08-17 08:45:30', '2021-08-17 09:15:51'),
(49, 24, '611b7848df6c7', 'gopal saini', '7742544602', 'ALWAR RAJASTAHN', 301001, 'MIA ALWAR', '2', NULL, '500.00', '0.00', '0.00', '500.00', 0, '0.00', '0', NULL, NULL, '2021-08-17 08:50:17', '2021-08-17 08:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` decimal(18,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `net_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `order_status` enum('0','1','2','3','4','5','6') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `payment_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `attributes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `user_id`, `order_id`, `product_name`, `product_image`, `qty`, `sub_total`, `discount`, `net_amount`, `order_status`, `payment_status`, `attributes`, `remember_token`, `created_at`, `updated_at`) VALUES
(84, 24, '611b73f963f5b', 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', 'product_image_69298994.jpg', 1, '200.00', '200.00', '200.00', '0', '0', '45,47,49', NULL, '2021-08-17 08:31:53', '2021-08-17 08:31:53'),
(85, 24, '611b7418a4d5b', 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', 'product_image_69298994.jpg', 1, '200.00', '200.00', '200.00', '0', '0', NULL, NULL, '2021-08-17 08:32:24', '2021-08-17 08:32:24'),
(86, 24, '611b772abdb01', 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', 'product_image_69298994.jpg', 1, '200.00', '200.00', '200.00', '1', '0', '46,47', NULL, '2021-08-17 08:45:30', '2021-08-17 09:15:51'),
(87, 24, '611b772abdb01', 'The Personality Trait That Makes People Happier', 'product_image_43687555.jpg', 1, '300.00', '300.00', '300.00', '1', '0', '46,47', NULL, '2021-08-17 08:45:30', '2021-08-17 09:15:51'),
(88, 24, '611b7848df6c7', 'Noise Buds VS103 - Truly Wireless Earbuds with 18-Hour Playtime', 'product_image_69298994.jpg', 1, '200.00', '200.00', '200.00', '0', '0', '46,48', NULL, '2021-08-17 08:50:16', '2021-08-17 08:50:16'),
(89, 24, '611b7848df6c7', 'The Personality Trait That Makes People Happier', 'product_image_43687555.jpg', 1, '300.00', '300.00', '300.00', '0', '0', NULL, NULL, '2021-08-17 08:50:17', '2021-08-17 08:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_infos`
--

CREATE TABLE `shipping_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximum_weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_freeshipping` tinyint(1) DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_details`
--

CREATE TABLE `store_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_store` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `layout_id` bigint(20) UNSIGNED NOT NULL,
  `domain_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_details`
--

INSERT INTO `store_details` (`id`, `store_name`, `store_logo`, `about_store`, `domain_name`, `color`, `user_id`, `plan_id`, `layout_id`, `domain_type`, `facebook_link`, `instagram_link`, `twitter_link`, `linkedin_link`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'tesst', 'localhost:8000', 'test', 1, 1, 1, 'localhost:8000', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_product_allowed` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validity_in_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `plan_name`, `description`, `number_of_product_allowed`, `price`, `status`, `created_at`, `updated_at`, `validity_in_days`) VALUES
(2, 'test', '20', 20, 20, '0', '2021-08-19 05:15:35', '2021-08-19 05:15:35', 0),
(3, 'sdfsdf', 'fsdf sdfsdf', 20, 200, '0', '2021-08-19 05:25:38', '2021-08-19 05:25:38', 0),
(4, 'sdfsdf', 'sdf sdfsd sdfsdf', 20, 200, '1', '2021-08-19 05:28:03', '2021-08-19 05:28:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_varified` tinyint(1) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verify_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `store_detail_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `new_merchant` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cancell` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `upgraded` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `trial_expire` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `not_setup` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terms_conditions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `is_varified`, `password`, `mobile_number`, `gender`, `role`, `otp`, `otp_verify_status`, `store_detail_id`, `status`, `new_merchant`, `cancell`, `upgraded`, `trial_expire`, `not_setup`, `remember_token`, `created_at`, `updated_at`, `terms_conditions`, `profile_image`) VALUES
(1, 'gopal', 'saini', 'gopalsaini.img1@gmail.com', NULL, NULL, '$2y$10$lKIjC1R4GmgUj1GRxaFKNeai24JrHH381BOomGIAmQNJnOXiS/tUS', NULL, NULL, 'merchant', NULL, '0', NULL, '1', '0', '0', '1', '1', '1', 'kxGAEelsLsHEM7gwDoHbGTA6m3hUEwkV0paKNQf0SZZee2PlkvzDBMxNrrW0', '2021-07-27 05:00:32', '2021-07-27 05:00:32', NULL, NULL),
(3, 'gopal', 'saini', 'admin@gmail.com', NULL, NULL, '$2y$10$1QIGBYg2LTK3nIZd3Q5ZSuOriVMZS4T.o8ETrgF.ay2FpNk5GUBtC', NULL, NULL, 'admin', NULL, '1', NULL, '1', '0', '0', '0', '0', '0', 'mVtQW3hsrNXhFONgdaeN8ifVSmOrCC9miHSlpq9Vaxms4X4tbh8mfFYFMhlS', '2021-07-29 06:16:41', '2021-08-20 05:23:04', NULL, NULL),
(23, 'gopal', 'saini', 'gopalsaini.img2@gmail.com', NULL, NULL, '$2y$10$xN7Dsd4Y0EoVQAvzUw/K6uzmSsO0Ul8JgZOnzKTSciDUPggwf5sla', NULL, NULL, 'merchant', '668983', '1', NULL, '1', '0', '0', '0', '0', '0', NULL, '2021-08-04 22:34:58', '2021-08-06 02:50:32', NULL, NULL),
(24, 'gopal', 'saini', 'gopalsaini.img3@gmail.com', NULL, NULL, '$2y$10$DSMj0uAGm/zTU/xGNgVpguVZou7O5OWhI6qTUIJEfLpTbjxm/10oW', '7742544609', 'M', 'user', '471889', '1', '1', '1', '0', '0', '0', '0', '0', NULL, '2021-08-06 03:05:05', '2021-08-07 02:51:50', NULL, NULL),
(25, 'test', 'demo', 'gopalsaini.img@gmail.com', NULL, NULL, '$2y$10$lKIjC1R4GmgUj1GRxaFKNeai24JrHH381BOomGIAmQNJnOXiS/tUS', NULL, NULL, 'user', '372076', '1', NULL, '1', '0', '0', '0', '0', '0', NULL, '2021-08-07 02:53:49', '2021-08-07 02:55:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_edits`
--
ALTER TABLE `about_us_edits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_us_edits_user_id_foreign` (`user_id`),
  ADD KEY `about_us_edits_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `admin_about`
--
ALTER TABLE `admin_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_blogs`
--
ALTER TABLE `admin_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `admin_blogs_category`
--
ALTER TABLE `admin_blogs_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_email_notification`
--
ALTER TABLE `admin_email_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_email_notification_user_id_foreign` (`user_id`),
  ADD KEY `admin_email_notification_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `admin_faq`
--
ALTER TABLE `admin_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_marketing_option`
--
ALTER TABLE `admin_marketing_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_term`
--
ALTER TABLE `admin_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_coupon_user`
--
ALTER TABLE `apply_coupon_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apply_coupon_user_user_id_foreign` (`user_id`),
  ADD KEY `apply_coupon_user_promo_id_foreign` (`promo_id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banner_images_user_id_foreign` (`user_id`),
  ADD KEY `banner_images_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_address_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`),
  ADD KEY `blogs_store_detail_id_foreign` (`store_detail_id`),
  ADD KEY `blogs_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_categories_user_id_foreign` (`user_id`),
  ADD KEY `blog_categories_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`),
  ADD KEY `categories_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `contact_us_edits`
--
ALTER TABLE `contact_us_edits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_edits_user_id_foreign` (`user_id`),
  ADD KEY `contact_us_edits_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `cover_images`
--
ALTER TABLE `cover_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cover_images_user_id_foreign` (`user_id`),
  ADD KEY `cover_images_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `cpanels`
--
ALTER TABLE `cpanels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_galleries`
--
ALTER TABLE `merchant_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchant_galleries_user_id_foreign` (`user_id`),
  ADD KEY `merchant_galleries_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `merchant_marketing_option`
--
ALTER TABLE `merchant_marketing_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchant_marketing_option_user_id_foreign` (`user_id`);

--
-- Indexes for table `merchant_payment_option`
--
ALTER TABLE `merchant_payment_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchant_payment_option_user_id_foreign` (`user_id`);

--
-- Indexes for table `merchant_social_option`
--
ALTER TABLE `merchant_social_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchant_social_option_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_user_id_foreign` (`user_id`),
  ADD KEY `pages_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_options`
--
ALTER TABLE `payment_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_options_user_id_foreign` (`user_id`),
  ADD KEY `payment_options_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `payment_option_management`
--
ALTER TABLE `payment_option_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `products_review`
--
ALTER TABLE `products_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_review_user_id_foreign` (`user_id`),
  ADD KEY `products_review_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_values_product_attribute_id_foreign` (`product_attribute_id`),
  ADD KEY `product_attribute_values_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_attribute_value_id`
--
ALTER TABLE `product_attribute_value_id`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_value_id_product_attribute_id_foreign` (`product_attribute_id`),
  ADD KEY `product_attribute_value_id_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_combination`
--
ALTER TABLE `product_combination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_combination_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promocodes_user_id_foreign` (`user_id`),
  ADD KEY `promocodes_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_infos_user_id_foreign` (`user_id`),
  ADD KEY `shipping_infos_store_detail_id_foreign` (`store_detail_id`);

--
-- Indexes for table `store_details`
--
ALTER TABLE `store_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_details_user_id_foreign` (`user_id`),
  ADD KEY `store_details_plan_id_foreign` (`plan_id`),
  ADD KEY `store_details_layout_id_foreign` (`layout_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `about_us_edits`
--
ALTER TABLE `about_us_edits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_about`
--
ALTER TABLE `admin_about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_blogs`
--
ALTER TABLE `admin_blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_blogs_category`
--
ALTER TABLE `admin_blogs_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_email_notification`
--
ALTER TABLE `admin_email_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_faq`
--
ALTER TABLE `admin_faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_marketing_option`
--
ALTER TABLE `admin_marketing_option`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_term`
--
ALTER TABLE `admin_term`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply_coupon_user`
--
ALTER TABLE `apply_coupon_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us_edits`
--
ALTER TABLE `contact_us_edits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cover_images`
--
ALTER TABLE `cover_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpanels`
--
ALTER TABLE `cpanels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merchant_galleries`
--
ALTER TABLE `merchant_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchant_marketing_option`
--
ALTER TABLE `merchant_marketing_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merchant_payment_option`
--
ALTER TABLE `merchant_payment_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `merchant_social_option`
--
ALTER TABLE `merchant_social_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_options`
--
ALTER TABLE `payment_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_option_management`
--
ALTER TABLE `payment_option_management`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products_review`
--
ALTER TABLE `products_review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_attribute_value_id`
--
ALTER TABLE `product_attribute_value_id`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_combination`
--
ALTER TABLE `product_combination`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_details`
--
ALTER TABLE `store_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_us_edits`
--
ALTER TABLE `about_us_edits`
  ADD CONSTRAINT `about_us_edits_store_detail_id_foreign` FOREIGN KEY (`store_detail_id`) REFERENCES `store_details` (`id`),
  ADD CONSTRAINT `about_us_edits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `admin_blogs`
--
ALTER TABLE `admin_blogs`
  ADD CONSTRAINT `admin_blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `admin_blogs_category` (`id`);

--
-- Constraints for table `admin_email_notification`
--
ALTER TABLE `admin_email_notification`
  ADD CONSTRAINT `admin_email_notification_store_detail_id_foreign` FOREIGN KEY (`store_detail_id`) REFERENCES `store_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_email_notification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `apply_coupon_user`
--
ALTER TABLE `apply_coupon_user`
  ADD CONSTRAINT `apply_coupon_user_promo_id_foreign` FOREIGN KEY (`promo_id`) REFERENCES `promocodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `apply_coupon_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD CONSTRAINT `billing_address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`);

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_store_detail_id_foreign` FOREIGN KEY (`store_detail_id`) REFERENCES `store_details` (`id`),
  ADD CONSTRAINT `blog_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_store_detail_id_foreign` FOREIGN KEY (`store_detail_id`) REFERENCES `store_details` (`id`),
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contact_us_edits`
--
ALTER TABLE `contact_us_edits`
  ADD CONSTRAINT `contact_us_edits_store_detail_id_foreign` FOREIGN KEY (`store_detail_id`) REFERENCES `store_details` (`id`),
  ADD CONSTRAINT `contact_us_edits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `merchant_galleries`
--
ALTER TABLE `merchant_galleries`
  ADD CONSTRAINT `merchant_galleries_store_detail_id_foreign` FOREIGN KEY (`store_detail_id`) REFERENCES `store_details` (`id`),
  ADD CONSTRAINT `merchant_galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `merchant_marketing_option`
--
ALTER TABLE `merchant_marketing_option`
  ADD CONSTRAINT `merchant_marketing_option_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `merchant_payment_option`
--
ALTER TABLE `merchant_payment_option`
  ADD CONSTRAINT `merchant_payment_option_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `merchant_social_option`
--
ALTER TABLE `merchant_social_option`
  ADD CONSTRAINT `merchant_social_option_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_store_detail_id_foreign` FOREIGN KEY (`store_detail_id`) REFERENCES `store_details` (`id`),
  ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products_review`
--
ALTER TABLE `products_review`
  ADD CONSTRAINT `products_review_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_review_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD CONSTRAINT `promocodes_store_detail_id_foreign` FOREIGN KEY (`store_detail_id`) REFERENCES `store_details` (`id`),
  ADD CONSTRAINT `promocodes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  ADD CONSTRAINT `shipping_infos_store_detail_id_foreign` FOREIGN KEY (`store_detail_id`) REFERENCES `store_details` (`id`),
  ADD CONSTRAINT `shipping_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `store_details`
--
ALTER TABLE `store_details`
  ADD CONSTRAINT `store_details_layout_id_foreign` FOREIGN KEY (`layout_id`) REFERENCES `layouts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_details_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
