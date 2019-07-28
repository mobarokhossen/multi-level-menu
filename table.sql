CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
