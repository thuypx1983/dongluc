
CREATE TABLE `videos` (
  `id` bigint(20) NOT NULL,
  `menu_type` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `photo` varchar(500) NOT NULL,
  `seo_title` varchar(250) NOT NULL,
  `seo_description` varchar(250) NOT NULL,
  `seo_keyword` varchar(250) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `z_index` int(11) NOT NULL DEFAULT '9999',
  `create_date` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `lang` char(2) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `is_top` tinyint(4) NOT NULL DEFAULT '0',
  `luotview` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;