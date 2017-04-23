ALTER TABLE `ads` ADD `summary` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `news_category_id`, ADD `content` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `summary`, ADD `seo_title` VARCHAR(255) CHARACTER SET utf32 COLLATE utf32_general_ci NULL DEFAULT NULL AFTER `content`, ADD `seo_keyword` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `seo_title`, ADD `seo_description` VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `seo_keyword`;