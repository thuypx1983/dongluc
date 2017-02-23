-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2015 at 02:17 PM
-- Server version: 5.0.95
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartseo_dongluc`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL,
  `title_jp` varchar(250) default NULL,
  `link` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(500) default NULL,
  `z_index` int(11) NOT NULL default '9999',
  `create_date` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL default '0',
  `seo_title` varchar(250) default NULL,
  `seo_description` varchar(250) default NULL,
  `seo_keyword` varchar(250) default NULL,
  `lang` char(2) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `title_jp`, `link`, `content`, `photo`, `z_index`, `create_date`, `is_active`, `seo_title`, `seo_description`, `seo_keyword`, `lang`, `lang_id`) VALUES
(13, 'Lĩnh vực hoạt động', NULL, 'linh-vuc-hoat-dong', '<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\r\n\r\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\r\n\r\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\r\n\r\n<p>Animal accumsan scriptorem ut cum, partem percipitur vix no, an sonet referrentur eam. Cum munere persius ei, ex soleat voluptaria scriptorem per, cibo intellegam vim ad. Ei vix debitis vivendo deterruisset. Ex usu dico decore.</p>\r\n\r\n<p>Facete vidisse volutpat usu ad, porro facer aliquam sea ea, molestie voluptaria no mel. Usu ad iisque pertinax. Dictas molestiae mel an, pro id ullum pericula. Pri phaedrum dignissim omittantur ut, ne per odio oporteat vivendum. Et atomorum hendrerit sea, et reque laudem inimicus qui, errem insolens an ius. Ridens persius vocibus usu an.</p>\r\n', 'Pantelleria-Island-Italia-Escursioni-09-200x130.jpg', 2, '2015-05-27 06:13:12', 1, '', '', '', 'vi', 0),
(14, 'Thông tin các đối tác', NULL, 'thong-tin-cac-doi-tac', '<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\r\n\r\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\r\n\r\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\r\n\r\n<p>Animal accumsan scriptorem ut cum, partem percipitur vix no, an sonet referrentur eam. Cum munere persius ei, ex soleat voluptaria scriptorem per, cibo intellegam vim ad. Ei vix debitis vivendo deterruisset. Ex usu dico decore.</p>\r\n\r\n<p>Facete vidisse volutpat usu ad, porro facer aliquam sea ea, molestie voluptaria no mel. Usu ad iisque pertinax. Dictas molestiae mel an, pro id ullum pericula. Pri phaedrum dignissim omittantur ut, ne per odio oporteat vivendum. Et atomorum hendrerit sea, et reque laudem inimicus qui, errem insolens an ius. Ridens persius vocibus usu an.</p>\r\n', 'make-water-sport-water-ski-ski-tube-towable-ski-inflatable-towable.jpg', 1, '2015-05-27 09:03:22', 1, '', '', '', 'vi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `uid` bigint(20) NOT NULL auto_increment,
  `user` varchar(100) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(50) collate utf8_unicode_ci NOT NULL,
  `utype` tinyint(4) NOT NULL default '1',
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `last_login` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `user` (`user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `user`, `pass`, `utype`, `email`, `last_login`) VALUES
(1, 'admin', 'a424ed3c64475c4a51c22a19b5b0c923', 1, 'admin@textlink.vn', '2012-11-26 04:33:46'),
(4, 'tienpv', '2ebef0b056d44a921568012f16fd49d7', 2, 'kisyrua@gmail.com', '2012-11-26 04:33:46'),
(5, 'tha.nguyen', '07efea777d32842914b93d18f1b3e57c', 2, 'tha.nguyen@netlink.vn', '2012-11-26 04:33:46'),
(6, 'ngoquangthuc', '7f8f4ad089c43d2e4680aef3572e722b', 2, 'ngoquangthuc@gmail.com', '2012-11-26 04:33:46'),
(7, 'huydang', 'f6fce912b6ec98dd4afe9e8240a25735', 2, 'huy.dang@netlink.vn', '2012-11-26 04:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE IF NOT EXISTS `admin_menu` (
  `id` int(11) NOT NULL auto_increment,
  `z_index` int(11) NOT NULL default '0',
  `parent_id` int(11) NOT NULL default '0',
  `link` varchar(250) default NULL,
  `title` varchar(250) NOT NULL,
  `is_show` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=344 ;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `z_index`, `parent_id`, `link`, `title`, `is_show`) VALUES
(220, 3, 218, '?mod=admin_menu', 'Admin menu', 1),
(219, 1, 218, '?mod=languages', 'Quản lý ngôn ngữ', 1),
(218, 0, 0, '', 'Hệ thống', 1),
(254, 0, 252, '?mod=gallery&sub=album', 'Album ảnh', 1),
(253, 0, 252, '?mod=gallery&sub=photo', 'Ảnh', 1),
(229, 2, 340, '?mod=about', 'Giới thiệu', 1),
(231, 5, 0, '?mod=manage_ads&sub=ads', 'Ảnh hệ thống', 1),
(232, 1, 231, '?mod=manage_ads&sub=position', 'Vị trí', 1),
(233, 2, 231, '?mod=manage_ads&sub=ads', 'Photo', 1),
(235, 2, 218, '?mod=manage_user&sub=user_type', 'Quản lý loại người dùng', 1),
(236, 4, 340, '?mod=manage_user&sub=user', 'Người dùng', 1),
(259, 5, 0, '', 'Q.Lý Sản phẩm', 1),
(289, 0, 259, '?mod=product_type', 'Danh mục sản phẩm', 1),
(263, 11, 0, '?mod=orders', 'Q.Lý đơn hàng', 1),
(292, 1, 340, '?mod=config', 'Cấu hình', 1),
(306, 3, 340, '?mod=contact', 'Liên hệ', 1),
(315, 12, 0, '?mod=register_contact', 'Đ.Ký nhận Email', 1),
(340, 0, 0, '', 'Q.Lý Chung', 1),
(321, 0, 319, '?mod=product_group', 'Nhóm hàng', 1),
(339, 0, 340, '?mod=partner', 'Đối tác', 1),
(338, 2, 336, '?mod=showroom', 'Showrooms', 1),
(337, 1, 336, '?mod=region', 'Vùng miền', 1),
(336, 0, 0, '', 'Q.Lý Showroom', 1),
(327, 0, 0, '?mod=gallery&sub=video', 'Video', 0),
(328, 0, 334, '?mod=product_color', 'Nhóm Màu sắc', 1),
(329, 0, 334, '?mod=product_price', 'Nhóm Khoảng giá', 1),
(330, 0, 334, '?mod=product_material', 'Nhóm Chất liệu', 1),
(331, 0, 259, '?mod=product', 'Danh sách Sản phẩm', 1),
(332, 8, 0, '', 'Dịch vụ', 1),
(333, 7, 0, '?mod=comment', 'Q.Lý Hỏi đáp', 1),
(334, 6, 0, '', 'Nhóm Sản phẩm', 1),
(335, 0, 334, '?mod=product_size', 'Nhóm Kích cỡ', 1),
(341, 0, 0, '?mod=product_rating', 'Q.Lý Đánh giá', 1),
(342, 2, 332, '?mod=news', 'Bài viết', 1),
(343, 1, 332, '?mod=news_category', 'Danh mục', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL auto_increment,
  `position` varchar(100) NOT NULL,
  `ads_type` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `create_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL default '0',
  `z_index` int(11) NOT NULL default '9999',
  `link` varchar(250) NOT NULL,
  `target` varchar(100) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `embed` text NOT NULL,
  `lang` char(2) NOT NULL,
  `news_category_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `position`, `ads_type`, `title`, `description`, `create_date`, `is_active`, `z_index`, `link`, `target`, `width`, `height`, `photo`, `embed`, `lang`, `news_category_id`) VALUES
(17, 'home', 'image', '', '', '2015-05-27', 1, 3, 'http://vnexpress.net/', '_blank', 0, 0, 'banner_nextgen_123.jpg', '', 'vi', 0),
(4, 'banner_big', 'image', '', '', '2015-05-07', 1, 4, 'http://www.underarmour.com/en-us/', '_blank', 0, 0, 'giam-gia-scitec-donglucshop.jpg', '', 'vi', 0),
(5, 'banner_small', 'flash', '', '', '2015-05-07', 1, 9999, '', '_blank', 0, 0, 'trouble-for-the-golf-course-in-the-2016-olympics.png', '<div class="embeddedContent" data-align="none" data-oembed="https://www.youtube.com/watch?v=6mDsRx844Sk" data-resizetype="noresize"><iframe allowfullscreen="true" allowscriptaccess="always" frameborder="0" height="349" scrolling="no" src="//www.youtube.com/embed/6mDsRx844Sk?wmode=transparent&amp;jqoemcache=luoBq" width="425"></iframe></div>\r\n\r\n<p>&nbsp;</p>\r\n', 'vi', 0),
(6, 'banner_small', 'flash', '', '', '2015-05-07', 1, 9999, '', '_blank', 0, 0, 'bambini-ciclisti.jpg', '<div class="embeddedContent" data-align="none" data-oembed="https://www.youtube.com/watch?v=ta8i2e8eNrc" data-resizetype="noresize"><iframe allowfullscreen="true" allowscriptaccess="always" frameborder="0" height="349" scrolling="no" src="//www.youtube.com/embed/ta8i2e8eNrc?wmode=transparent&amp;jqoemcache=PrWsR" width="425"></iframe></div>\r\n\r\n<p>&nbsp;</p>\r\n', 'vi', 0),
(7, 'banner_sidebar', 'image', '', '', '2015-05-08', 1, 9999, 'http://www.underarmour.com/en-us/', '_blank', 0, 0, 'Juego Sports Racket Sale Sept 1 to 30 2013.jpg', '', 'vi', 0),
(8, 'banner_small', 'image', '', '', '2015-05-14', 1, 9999, 'http://www.underarmour.com/en-us/', '_blank', 0, 0, '24900813-2eb4045fbcd39fd7dfdc1d8cf9ff2df5.jpeg', '', 'vi', 0),
(16, 'home', 'image', '', '', '2015-05-27', 1, 2, 'http://www.vinabook.com/', '_blank', 0, 0, '63760-12485177-TDF-5_jpg.jpg', '', 'vi', 0),
(14, 'home', 'image', '', '', '2015-05-26', 1, 4, '', '_blank', 0, 0, '03.jpg', '', 'vi', 0),
(19, 'home', 'image', '', '', '2015-05-27', 1, 5, '', '_blank', 0, 0, 'anza-g2-aqua-bilboard-1600x650.jpg', '', 'vi', 0),
(20, 'home', 'image', '', '', '2015-05-27', 1, 1, '', '_blank', 0, 0, '9771122142_3336a81add_h.jpg', '', 'vi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ads_position`
--

CREATE TABLE IF NOT EXISTS `ads_position` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `width` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `ads_position`
--

INSERT INTO `ads_position` (`id`, `code`, `title`, `width`, `height`) VALUES
(9, 'home', 'Slide trang chủ - 1600x625)', '1600', 'auto'),
(22, 'banner_big', 'Banner lớn - 1600x625', '1600', 'auto'),
(23, 'banner_small', 'Banner nhỏ - 465x300', '465', '300'),
(24, 'banner_sidebar', 'Banner dọc - 233x345', '233', '345');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL auto_increment,
  `position` varchar(50) NOT NULL,
  `seo_title` varchar(250) NOT NULL,
  `seo_description` varchar(250) NOT NULL,
  `seo_keyword` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `article_type` varchar(250) NOT NULL,
  `z_index` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `link` varchar(250) NOT NULL,
  `is_active` tinyint(4) NOT NULL default '0',
  `is_support` tinyint(4) NOT NULL default '0',
  `is_about` tinyint(4) NOT NULL default '0',
  `is_top` tinyint(4) NOT NULL default '0',
  `lang` char(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `position`, `seo_title`, `seo_description`, `seo_keyword`, `title`, `content`, `article_type`, `z_index`, `create_date`, `link`, `is_active`, `is_support`, `is_about`, `is_top`, `lang`) VALUES
(1, '', '', '', '', 'Hướng dẫn mua hàng', '<em>Chưa cập nhật nội dung</em>', '', 0, '2014-06-07', 'huong-dan-mua-hang', 1, 0, 0, 0, 'vi'),
(2, '', '', '', '', 'Hướng dẫn thanh toán', '<em>Chưa cập nhật nội dung</em>', '', 0, '2014-06-07', 'huong-dan-thanh-toan', 1, 0, 0, 0, 'vi'),
(3, '', '', '', '', 'Chính sách giao hàng', '<em>Chưa cập nhật nội dung</em>', '', 0, '2014-06-07', 'chinh-sach-giao-hang', 1, 0, 0, 0, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
  `id` bigint(20) NOT NULL auto_increment,
  `product_type_id` bigint(20) default '0',
  `product_group_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `content` longtext,
  `description` text NOT NULL,
  `price` varchar(255) default NULL,
  `create_date` datetime default NULL,
  `user_id` bigint(20) default NULL,
  `update_date` datetime default NULL,
  `update_user` bigint(20) default NULL,
  `seo_title` varchar(250) NOT NULL,
  `seo_description` varchar(250) NOT NULL,
  `seo_keyword` varchar(250) NOT NULL,
  `z_index` int(11) NOT NULL default '9999',
  `is_active` tinyint(4) NOT NULL default '0',
  `lang` char(2) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`id`, `product_type_id`, `product_group_id`, `title`, `link`, `photo`, `content`, `description`, `price`, `create_date`, `user_id`, `update_date`, `update_user`, `seo_title`, `seo_description`, `seo_keyword`, `z_index`, `is_active`, `lang`, `lang_id`) VALUES
(18, 0, 0, 'Ngọc Hân rạng rỡ', 'ngoc-han-rang-ro', 'p0c1004n201310161445495213002.jpg', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in lectus odio. Nulla aliquet eleifend porta. Integer sodales commodo sem vitae aliquet. Morbi laoreet nunc eros, eu rutrum dui gravida a. Duis pulvinar, nulla id molestie dictum, turpis nisl commodo felis, sed pulvinar orci nibh ac nunc. Donec mi magna, tristique id felis vitae, commodo faucibus enim. In eu felis lectus. Donec rhoncus, ligula a scelerisque consequat, magna sapien tempus nunc, vitae mollis risus nibh non neque. Maecenas vehicula bibendum iaculis. Praesent dictum odio a tellus finibus tristique. Integer sit amet felis sagittis, porta dolor sit amet, malesuada diam. Maecenas vulputate lorem at viverra dictum.</p>\r\n\r\n<p style="text-align:justify">Mauris efficitur ex et rutrum sollicitudin. Nam in cursus ligula, nec faucibus ex. Praesent in sem ut neque interdum finibus a a velit. Praesent eu lectus mattis, dapibus leo ac, pellentesque velit. Etiam scelerisque mi in ante volutpat, et pulvinar ipsum tristique. Vestibulum bibendum, erat non ornare venenatis, nibh metus ultricies justo, aliquam vestibulum ipsum dui in lacus. Donec ut euismod nibh. Fusce sodales porta risus, nec interdum mauris bibendum pulvinar. Vivamus interdum turpis et eros consequat, ac consequat est fermentum. Integer diam lectus, elementum sit amet elementum eget, gravida non leo. Sed vulputate quam eu ipsum rhoncus, id tincidunt ligula efficitur. Morbi ut leo vitae massa vehicula vulputate et ut velit. Duis ac dolor ut leo finibus viverra et at lectus.</p>\r\n\r\n<p style="text-align:justify">In hac habitasse platea dictumst. Aenean hendrerit consequat aliquam. Aliquam vitae turpis ipsum. Pellentesque ornare hendrerit ullamcorper. Fusce at placerat risus. Ut eu ipsum molestie, dignissim tortor auctor, ultricies massa. Sed at lobortis orci. Aenean eget velit dignissim, auctor massa vel, varius nibh. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In rutrum urna id varius gravida.</p>\r\n\r\n<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend ultrices orci vel egestas. Sed vitae risus quis metus fringilla fermentum maximus et eros. Vivamus sed rutrum neque, in fermentum nulla. In consequat enim eu dictum vulputate. Cras eu lorem pharetra, pharetra metus id, tempus risus. Donec accumsan risus magna, in porttitor velit aliquam sit amet. Mauris elit risus, facilisis eu luctus ut, dapibus vulputate quam.</p>\r\n\r\n<p style="text-align:justify">Maecenas turpis nibh, dictum et ultrices mattis, fermentum placerat magna. In massa odio, luctus non nunc vel, iaculis faucibus mi. Mauris mattis, quam a mattis elementum, metus leo dictum velit, vel placerat sem tortor ac felis. Nunc quis lobortis metus, eu gravida ex. Vestibulum sed pulvinar libero. Integer lectus quam, blandit at nibh a, aliquam dictum mauris. Ut ultricies sem semper tortor interdum, sed feugiat est consectetur. Proin vel erat egestas, vulputate ligula id, fringilla libero. Nunc id dignissim dui. Duis laoreet mi in felis fermentum, sed dictum libero iaculis. Proin justo diam, volutpat ut faucibus a, tincidunt at tellus. Mauris non egestas metus, eget efficitur nunc. Fusce vehicula lobortis massa, eget laoreet eros lacinia at. Curabitur a convallis ex. Phasellus at elit felis.</p>\r\n', '', '', '2014-12-05 06:03:58', 99, '2014-12-05 10:49:31', 99, '', '', '', 9999, 1, 'vi', 0),
(22, 0, 0, 'Ngọc Hân rạng rỡ-copy', 'ngoc-han-rang-ro-copy', 'p0c1004n201310161445495213002.jpg', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in lectus odio. Nulla aliquet eleifend porta. Integer sodales commodo sem vitae aliquet. Morbi laoreet nunc eros, eu rutrum dui gravida a. Duis pulvinar, nulla id molestie dictum, turpis nisl commodo felis, sed pulvinar orci nibh ac nunc. Donec mi magna, tristique id felis vitae, commodo faucibus enim. In eu felis lectus. Donec rhoncus, ligula a scelerisque consequat, magna sapien tempus nunc, vitae mollis risus nibh non neque. Maecenas vehicula bibendum iaculis. Praesent dictum odio a tellus finibus tristique. Integer sit amet felis sagittis, porta dolor sit amet, malesuada diam. Maecenas vulputate lorem at viverra dictum.</p>\r\n\r\n<p style="text-align:justify">Mauris efficitur ex et rutrum sollicitudin. Nam in cursus ligula, nec faucibus ex. Praesent in sem ut neque interdum finibus a a velit. Praesent eu lectus mattis, dapibus leo ac, pellentesque velit. Etiam scelerisque mi in ante volutpat, et pulvinar ipsum tristique. Vestibulum bibendum, erat non ornare venenatis, nibh metus ultricies justo, aliquam vestibulum ipsum dui in lacus. Donec ut euismod nibh. Fusce sodales porta risus, nec interdum mauris bibendum pulvinar. Vivamus interdum turpis et eros consequat, ac consequat est fermentum. Integer diam lectus, elementum sit amet elementum eget, gravida non leo. Sed vulputate quam eu ipsum rhoncus, id tincidunt ligula efficitur. Morbi ut leo vitae massa vehicula vulputate et ut velit. Duis ac dolor ut leo finibus viverra et at lectus.</p>\r\n\r\n<p style="text-align:justify">In hac habitasse platea dictumst. Aenean hendrerit consequat aliquam. Aliquam vitae turpis ipsum. Pellentesque ornare hendrerit ullamcorper. Fusce at placerat risus. Ut eu ipsum molestie, dignissim tortor auctor, ultricies massa. Sed at lobortis orci. Aenean eget velit dignissim, auctor massa vel, varius nibh. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In rutrum urna id varius gravida.</p>\r\n\r\n<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend ultrices orci vel egestas. Sed vitae risus quis metus fringilla fermentum maximus et eros. Vivamus sed rutrum neque, in fermentum nulla. In consequat enim eu dictum vulputate. Cras eu lorem pharetra, pharetra metus id, tempus risus. Donec accumsan risus magna, in porttitor velit aliquam sit amet. Mauris elit risus, facilisis eu luctus ut, dapibus vulputate quam.</p>\r\n\r\n<p style="text-align:justify">Maecenas turpis nibh, dictum et ultrices mattis, fermentum placerat magna. In massa odio, luctus non nunc vel, iaculis faucibus mi. Mauris mattis, quam a mattis elementum, metus leo dictum velit, vel placerat sem tortor ac felis. Nunc quis lobortis metus, eu gravida ex. Vestibulum sed pulvinar libero. Integer lectus quam, blandit at nibh a, aliquam dictum mauris. Ut ultricies sem semper tortor interdum, sed feugiat est consectetur. Proin vel erat egestas, vulputate ligula id, fringilla libero. Nunc id dignissim dui. Duis laoreet mi in felis fermentum, sed dictum libero iaculis. Proin justo diam, volutpat ut faucibus a, tincidunt at tellus. Mauris non egestas metus, eget efficitur nunc. Fusce vehicula lobortis massa, eget laoreet eros lacinia at. Curabitur a convallis ex. Phasellus at elit felis.</p>\r\n', '', '', '2014-12-05 10:50:33', 99, NULL, 0, '', '', '', 9999, 1, 'vi', 0),
(23, 0, 0, 'Ngọc Hân rạng rỡ-copy-copy', 'ngoc-han-rang-ro-copy-copy', 'p0c1004n201310161445495213002.jpg', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in lectus odio. Nulla aliquet eleifend porta. Integer sodales commodo sem vitae aliquet. Morbi laoreet nunc eros, eu rutrum dui gravida a. Duis pulvinar, nulla id molestie dictum, turpis nisl commodo felis, sed pulvinar orci nibh ac nunc. Donec mi magna, tristique id felis vitae, commodo faucibus enim. In eu felis lectus. Donec rhoncus, ligula a scelerisque consequat, magna sapien tempus nunc, vitae mollis risus nibh non neque. Maecenas vehicula bibendum iaculis. Praesent dictum odio a tellus finibus tristique. Integer sit amet felis sagittis, porta dolor sit amet, malesuada diam. Maecenas vulputate lorem at viverra dictum.</p>\r\n\r\n<p style="text-align:justify">Mauris efficitur ex et rutrum sollicitudin. Nam in cursus ligula, nec faucibus ex. Praesent in sem ut neque interdum finibus a a velit. Praesent eu lectus mattis, dapibus leo ac, pellentesque velit. Etiam scelerisque mi in ante volutpat, et pulvinar ipsum tristique. Vestibulum bibendum, erat non ornare venenatis, nibh metus ultricies justo, aliquam vestibulum ipsum dui in lacus. Donec ut euismod nibh. Fusce sodales porta risus, nec interdum mauris bibendum pulvinar. Vivamus interdum turpis et eros consequat, ac consequat est fermentum. Integer diam lectus, elementum sit amet elementum eget, gravida non leo. Sed vulputate quam eu ipsum rhoncus, id tincidunt ligula efficitur. Morbi ut leo vitae massa vehicula vulputate et ut velit. Duis ac dolor ut leo finibus viverra et at lectus.</p>\r\n\r\n<p style="text-align:justify">In hac habitasse platea dictumst. Aenean hendrerit consequat aliquam. Aliquam vitae turpis ipsum. Pellentesque ornare hendrerit ullamcorper. Fusce at placerat risus. Ut eu ipsum molestie, dignissim tortor auctor, ultricies massa. Sed at lobortis orci. Aenean eget velit dignissim, auctor massa vel, varius nibh. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In rutrum urna id varius gravida.</p>\r\n\r\n<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend ultrices orci vel egestas. Sed vitae risus quis metus fringilla fermentum maximus et eros. Vivamus sed rutrum neque, in fermentum nulla. In consequat enim eu dictum vulputate. Cras eu lorem pharetra, pharetra metus id, tempus risus. Donec accumsan risus magna, in porttitor velit aliquam sit amet. Mauris elit risus, facilisis eu luctus ut, dapibus vulputate quam.</p>\r\n\r\n<p style="text-align:justify">Maecenas turpis nibh, dictum et ultrices mattis, fermentum placerat magna. In massa odio, luctus non nunc vel, iaculis faucibus mi. Mauris mattis, quam a mattis elementum, metus leo dictum velit, vel placerat sem tortor ac felis. Nunc quis lobortis metus, eu gravida ex. Vestibulum sed pulvinar libero. Integer lectus quam, blandit at nibh a, aliquam dictum mauris. Ut ultricies sem semper tortor interdum, sed feugiat est consectetur. Proin vel erat egestas, vulputate ligula id, fringilla libero. Nunc id dignissim dui. Duis laoreet mi in felis fermentum, sed dictum libero iaculis. Proin justo diam, volutpat ut faucibus a, tincidunt at tellus. Mauris non egestas metus, eget efficitur nunc. Fusce vehicula lobortis massa, eget laoreet eros lacinia at. Curabitur a convallis ex. Phasellus at elit felis.</p>\r\n', '', '', '2014-12-05 10:50:37', 99, NULL, 0, '', '', '', 9999, 1, 'vi', 0),
(24, 0, 0, 'Ngọc Hân rạng rỡ-copy-copy-copy', 'ngoc-han-rang-ro-copy-copy-copy', 'p0c1004n201310161445495213002.jpg', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in lectus odio. Nulla aliquet eleifend porta. Integer sodales commodo sem vitae aliquet. Morbi laoreet nunc eros, eu rutrum dui gravida a. Duis pulvinar, nulla id molestie dictum, turpis nisl commodo felis, sed pulvinar orci nibh ac nunc. Donec mi magna, tristique id felis vitae, commodo faucibus enim. In eu felis lectus. Donec rhoncus, ligula a scelerisque consequat, magna sapien tempus nunc, vitae mollis risus nibh non neque. Maecenas vehicula bibendum iaculis. Praesent dictum odio a tellus finibus tristique. Integer sit amet felis sagittis, porta dolor sit amet, malesuada diam. Maecenas vulputate lorem at viverra dictum.</p>\r\n\r\n<p style="text-align:justify">Mauris efficitur ex et rutrum sollicitudin. Nam in cursus ligula, nec faucibus ex. Praesent in sem ut neque interdum finibus a a velit. Praesent eu lectus mattis, dapibus leo ac, pellentesque velit. Etiam scelerisque mi in ante volutpat, et pulvinar ipsum tristique. Vestibulum bibendum, erat non ornare venenatis, nibh metus ultricies justo, aliquam vestibulum ipsum dui in lacus. Donec ut euismod nibh. Fusce sodales porta risus, nec interdum mauris bibendum pulvinar. Vivamus interdum turpis et eros consequat, ac consequat est fermentum. Integer diam lectus, elementum sit amet elementum eget, gravida non leo. Sed vulputate quam eu ipsum rhoncus, id tincidunt ligula efficitur. Morbi ut leo vitae massa vehicula vulputate et ut velit. Duis ac dolor ut leo finibus viverra et at lectus.</p>\r\n\r\n<p style="text-align:justify">In hac habitasse platea dictumst. Aenean hendrerit consequat aliquam. Aliquam vitae turpis ipsum. Pellentesque ornare hendrerit ullamcorper. Fusce at placerat risus. Ut eu ipsum molestie, dignissim tortor auctor, ultricies massa. Sed at lobortis orci. Aenean eget velit dignissim, auctor massa vel, varius nibh. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In rutrum urna id varius gravida.</p>\r\n\r\n<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend ultrices orci vel egestas. Sed vitae risus quis metus fringilla fermentum maximus et eros. Vivamus sed rutrum neque, in fermentum nulla. In consequat enim eu dictum vulputate. Cras eu lorem pharetra, pharetra metus id, tempus risus. Donec accumsan risus magna, in porttitor velit aliquam sit amet. Mauris elit risus, facilisis eu luctus ut, dapibus vulputate quam.</p>\r\n\r\n<p style="text-align:justify">Maecenas turpis nibh, dictum et ultrices mattis, fermentum placerat magna. In massa odio, luctus non nunc vel, iaculis faucibus mi. Mauris mattis, quam a mattis elementum, metus leo dictum velit, vel placerat sem tortor ac felis. Nunc quis lobortis metus, eu gravida ex. Vestibulum sed pulvinar libero. Integer lectus quam, blandit at nibh a, aliquam dictum mauris. Ut ultricies sem semper tortor interdum, sed feugiat est consectetur. Proin vel erat egestas, vulputate ligula id, fringilla libero. Nunc id dignissim dui. Duis laoreet mi in felis fermentum, sed dictum libero iaculis. Proin justo diam, volutpat ut faucibus a, tincidunt at tellus. Mauris non egestas metus, eget efficitur nunc. Fusce vehicula lobortis massa, eget laoreet eros lacinia at. Curabitur a convallis ex. Phasellus at elit felis.</p>\r\n', '', '', '2014-12-05 10:50:39', 99, NULL, 0, '', '', '', 9999, 1, 'vi', 0),
(25, 0, 0, 'Ngọc Hân rạng rỡ-copy-copy-copy-copy', 'ngoc-han-rang-ro-copy-copy-copy-copy', 'p0c1004n201310161445495213002.jpg', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in lectus odio. Nulla aliquet eleifend porta. Integer sodales commodo sem vitae aliquet. Morbi laoreet nunc eros, eu rutrum dui gravida a. Duis pulvinar, nulla id molestie dictum, turpis nisl commodo felis, sed pulvinar orci nibh ac nunc. Donec mi magna, tristique id felis vitae, commodo faucibus enim. In eu felis lectus. Donec rhoncus, ligula a scelerisque consequat, magna sapien tempus nunc, vitae mollis risus nibh non neque. Maecenas vehicula bibendum iaculis. Praesent dictum odio a tellus finibus tristique. Integer sit amet felis sagittis, porta dolor sit amet, malesuada diam. Maecenas vulputate lorem at viverra dictum.</p>\r\n\r\n<p style="text-align:justify">Mauris efficitur ex et rutrum sollicitudin. Nam in cursus ligula, nec faucibus ex. Praesent in sem ut neque interdum finibus a a velit. Praesent eu lectus mattis, dapibus leo ac, pellentesque velit. Etiam scelerisque mi in ante volutpat, et pulvinar ipsum tristique. Vestibulum bibendum, erat non ornare venenatis, nibh metus ultricies justo, aliquam vestibulum ipsum dui in lacus. Donec ut euismod nibh. Fusce sodales porta risus, nec interdum mauris bibendum pulvinar. Vivamus interdum turpis et eros consequat, ac consequat est fermentum. Integer diam lectus, elementum sit amet elementum eget, gravida non leo. Sed vulputate quam eu ipsum rhoncus, id tincidunt ligula efficitur. Morbi ut leo vitae massa vehicula vulputate et ut velit. Duis ac dolor ut leo finibus viverra et at lectus.</p>\r\n\r\n<p style="text-align:justify">In hac habitasse platea dictumst. Aenean hendrerit consequat aliquam. Aliquam vitae turpis ipsum. Pellentesque ornare hendrerit ullamcorper. Fusce at placerat risus. Ut eu ipsum molestie, dignissim tortor auctor, ultricies massa. Sed at lobortis orci. Aenean eget velit dignissim, auctor massa vel, varius nibh. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In rutrum urna id varius gravida.</p>\r\n\r\n<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend ultrices orci vel egestas. Sed vitae risus quis metus fringilla fermentum maximus et eros. Vivamus sed rutrum neque, in fermentum nulla. In consequat enim eu dictum vulputate. Cras eu lorem pharetra, pharetra metus id, tempus risus. Donec accumsan risus magna, in porttitor velit aliquam sit amet. Mauris elit risus, facilisis eu luctus ut, dapibus vulputate quam.</p>\r\n\r\n<p style="text-align:justify">Maecenas turpis nibh, dictum et ultrices mattis, fermentum placerat magna. In massa odio, luctus non nunc vel, iaculis faucibus mi. Mauris mattis, quam a mattis elementum, metus leo dictum velit, vel placerat sem tortor ac felis. Nunc quis lobortis metus, eu gravida ex. Vestibulum sed pulvinar libero. Integer lectus quam, blandit at nibh a, aliquam dictum mauris. Ut ultricies sem semper tortor interdum, sed feugiat est consectetur. Proin vel erat egestas, vulputate ligula id, fringilla libero. Nunc id dignissim dui. Duis laoreet mi in felis fermentum, sed dictum libero iaculis. Proin justo diam, volutpat ut faucibus a, tincidunt at tellus. Mauris non egestas metus, eget efficitur nunc. Fusce vehicula lobortis massa, eget laoreet eros lacinia at. Curabitur a convallis ex. Phasellus at elit felis.</p>\r\n', '', '', '2014-12-05 10:50:41', 99, NULL, 0, '', '', '', 9999, 1, 'vi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL default '0',
  `content` text NOT NULL,
  `is_read` tinyint(4) NOT NULL default '0',
  `reply_to_name` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `id` int(11) NOT NULL auto_increment,
  `name` tinytext collate utf8_unicode_ci NOT NULL,
  `value` text collate utf8_unicode_ci NOT NULL,
  `value2` varchar(250) collate utf8_unicode_ci NOT NULL,
  `value3` varchar(250) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `name`, `value`, `value2`, `value3`) VALUES
(44, 'website', 'http://www.dongluc.vn', '', ''),
(45, 'address', '130 Hạ Đình – Thanh Xuân – Hà Nội', '', ''),
(55, 'hotline_product', '0942.706.994 ', '', ''),
(43, 'hotline', '0942.706.994 - 0963.703.862', '', ''),
(42, 'email', 'info@dongluc.vn', '', ''),
(47, 'phone', '04.3858 4127', '', ''),
(48, 'copyright', '<p>© Copyright 2008 Dong Luc Group, All Rights Reserved</p>\r\n\r\n<p>® Dong Luc Group giữ bản quyền nội dung trên website này.</p>\r\n', '', ''),
(49, 'facebook', 'https://www.facebook.com', '', ''),
(50, 'google_plus', '', '', ''),
(52, 'instagram', '', '', ''),
(51, 'youtube', 'https://www.youtube.com/user/JVevermind', '', ''),
(53, 'twitter', '', '', ''),
(54, 'fax', '04.3858 2987', '', ''),
(57, 'guide_size', '<h3><span style="font-size:18px">Bảng thông số cho Nữ</span></h3>\r\n\r\n<table border="0" cellpadding="5" cellspacing="5" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>Thông số / cỡ</td>\r\n			<td>S(27)</td>\r\n			<td>M(28)</td>\r\n			<td>L(29)</td>\r\n			<td>XL(30)</td>\r\n			<td>XXL(31)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chiều cao (cm)</td>\r\n			<td>149-156</td>\r\n			<td>157-162</td>\r\n			<td>159-164</td>\r\n			<td>161-166</td>\r\n			<td>163-168</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cân nặng (kg)</td>\r\n			<td>41-46</td>\r\n			<td>47-52</td>\r\n			<td>53 -58</td>\r\n			<td>59 - 64</td>\r\n			<td>65-69</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Rộng ngực (cm)</td>\r\n			<td>75-81</td>\r\n			<td>82-87</td>\r\n			<td>88-92</td>\r\n			<td>93-97</td>\r\n			<td>98-102</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Rộng mông (cm)</td>\r\n			<td>86-89</td>\r\n			<td>90-93</td>\r\n			<td>94-98</td>\r\n			<td>98 -102</td>\r\n			<td>103-107</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><span style="font-size:18px">Bảng thông số cho Nam</span></h3>\r\n\r\n<table border="0" cellpadding="5" cellspacing="5" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>Thông số / cỡ</td>\r\n			<td>S(29)</td>\r\n			<td>M(30)</td>\r\n			<td>L(31)</td>\r\n			<td>XL(32)</td>\r\n			<td>XXL(33)</td>\r\n			<td>XXXL(34)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chiều cao (cm)</td>\r\n			<td>162-168</td>\r\n			<td>169-173</td>\r\n			<td>171-175</td>\r\n			<td>173-177</td>\r\n			<td>175-179</td>\r\n			<td>177-181</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cân nặng (kg)</td>\r\n			<td>52-56</td>\r\n			<td>57-62</td>\r\n			<td>63-67</td>\r\n			<td>68-72</td>\r\n			<td>73-77</td>\r\n			<td>79-82</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Rộng ngực (cm)</td>\r\n			<td>84-88</td>\r\n			<td>89-93</td>\r\n			<td>94-98</td>\r\n			<td>99-103</td>\r\n			<td>104-107</td>\r\n			<td>107-110</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Rộng mông (cm)</td>\r\n			<td>85-89</td>\r\n			<td>90-94</td>\r\n			<td>95-99</td>\r\n			<td>100-104</td>\r\n			<td>105-109</td>\r\n			<td>110-114</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL,
  `info` text NOT NULL,
  `map` text NOT NULL,
  `support` text NOT NULL,
  `email_contact` varchar(250) NOT NULL,
  `lang` char(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `title`, `info`, `map`, `support`, `email_contact`, `lang`) VALUES
(1, '', '<h1 style="font-size: 2.167em; margin: 0px 0px 0.67em; font-weight: normal; color: rgb(109, 98, 89); text-transform: uppercase; font-family: Arial, Helvetica, sans-serif;">\r\n	CONTACT</h1>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<strong style="color: rgb(42, 41, 41);">FRANKL PHARMA s.r.o. (Ltd.)</strong><br />\r\n	Pocernicka 96, 108 00 Praha 10, Czech Republic<br />\r\n	cell: +420 602 290 318, fax: +420 227 204 659<br />\r\n	e-mail:&nbsp;<a href="mailto:info@franklpharma.cz" style="color: rgb(62, 161, 46); text-decoration: none;">info@franklpharma.cz</a></p>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<strong style="color: rgb(42, 41, 41);">Jutka Kovacs Sibik<br />\r\n	Chief Executive Officer</strong><br />\r\n	cell: +420 602 290 318, +36 30 212 1963<br />\r\n	e-mail:&nbsp;<a href="mailto:skj@franklpharma.cz" style="color: rgb(62, 161, 46); text-decoration: none;">skj@franklpharma.cz</a></p>\r\n<h2 style="font-size: 1.833em; margin: 0px 0px 0.83em; font-weight: normal; color: rgb(62, 161, 46); font-family: Arial, Helvetica, sans-serif;">\r\n	Company information</h2>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<span class="hps">Case number</span>: C&nbsp;<span class="hps">95640</span>, kept by the&nbsp;<span class="hps">Registration Court</span>&nbsp;<span class="hps">in Prague</span><br />\r\n	Company name: FRANKL PHARMA s.r.o.&nbsp;<br />\r\n	IC (Tax identification number): 27092127&nbsp;<br />\r\n	Address: Pocernicka 272/96, 108 00 Praha 10-Malesice, Czech Republic<br />\r\n	Date of registration: 25. 10. 2003</p>\r\n', '', '<p style="padding: 0px; margin: 0px; list-style: none; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 18px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	Sun Spa Resort is set amidst a spacious 29 hectares of landscaped garden along pristine white sand Bao Ninh Beach Vietnam and on the banks of the legendary of Nhat Le river.(Google Map)</p>\r\n<p style="padding: 0px; margin: 0px; list-style: none; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 18px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	<br style="padding: 0px; margin: 0px; list-style: none; background: none;" />\r\n	Located in the picturesque Central Vietnam city of Dong Hoi, 50 kilometers from the mystical, UNESCO recognized caves of Phong Nha, Sun Spa Resort offers luxurious accommodation in Dong Hoi, excellent facilities along Bao Ninh Beach and the perfect gateway to discover the World Heritage.</p>\r\n', 'hung.ngo@netlink.vn', 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `description` text,
  `link_to` varchar(255) default NULL,
  `lang` char(2) NOT NULL,
  `faq_category_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `z_index` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `description`, `link_to`, `lang`, `faq_category_id`, `is_active`, `z_index`) VALUES
(1, 'How to use Dr Michaels products?', '<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	If you want Dr Michaels to really help you,&nbsp;you should use continuously all three products – that is very important. These products can be applied to both body and scalp. The set contains three products:&nbsp;<strong style="color: rgb(42, 41, 41);">Dr Michaels –&nbsp;Skin Care&nbsp;Gel 200 ml, Dr Michaels –&nbsp;Skin Care Cream&nbsp;50 g and Dr Michaels – Skin Care Oil 200 ml</strong>. Products should be used twice a day, morning and evening, over the course of six to eight weeks (the time length of using the products can vary with each patient).</p>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<strong style="color: rgb(42, 41, 41);">For the scalp – SKIN CARE GEL</strong><br />\r\n	In the morning, use Skin Care Gel on wet skin (you can use&nbsp;a small sponge) and leave in for about 3 - 10 minutes. Rinse off,&nbsp; towel dry. Gel helps to make the skin surface smooth.</p>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<strong style="color: rgb(42, 41, 41);">For the scalp – SKIN CARE CREAM</strong><br />\r\n	After using the Skin Care Gel, towel dry your skin. Apply the&nbsp;Cream and leave in for about 10 minutes - it enhances the healing effect.</p>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<strong style="color: rgb(42, 41, 41);">For&nbsp;your body&nbsp;</strong>–<strong style="color: rgb(42, 41, 41);">&nbsp;SKIN CARE OIL</strong><br />\r\n	After applying the Skin Care Cream, put a thin layer of Skin Care Oil on your skin. It helps to hydrate the skin, creates a protective surface over the&nbsp;Cream and therefore enhances its healing effect.</p>\r\n', NULL, 'vi', 2, 0, 0),
(2, 'How to use Dr Michaels on your scalp?', '<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	It slightly differs from applying the products on your body:</p>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<strong style="color: rgb(42, 41, 41);">For the scalp – SKIN CARE GEL</strong><br />\r\n	In the evening, wash your hair with Skin Care Gel (just as if you used shampoo) and leave in for about 10 minutes. Then style as usual – towel dry or blow dry.</p>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<strong style="color: rgb(42, 41, 41);">For the scalp – SKIN CARE CREAM</strong><br />\r\n	After using the Skin Care Gel , apply the&nbsp;Cream to all psoriasis spots. Apply the Skin Care Oil directly after the Cream, which is the third step.</p>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<strong style="color: rgb(42, 41, 41);">For the scalp – SKIN CARE OIL</strong><br />\r\n	After using the Ointment followed by the Body Conditioner you can go to sleep. Do not worry: neither Ointment, nor the Body Conditioner will make stains on your bed sheets.</p>\r\n<p style="margin: 0px 0px 2em; text-align: justify; color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px;">\r\n	<strong style="color: rgb(42, 41, 41);">For the scalp – SKIN CARE GEL</strong><br />\r\n	In the morning, wash your hair again using ONLY the Skin Care Gel (as shampoo) and blow dry.&nbsp;Do not follow with using the Cream and the&nbsp;Skin Care Oil&nbsp;after the Skin Care Gel – your hair will get greasy.</p>\r\n', NULL, 'vi', 3, 0, 0),
(3, 'Các sản phẩm Dr Michaels Soratinex có thể sử dụng tại nhà được không?', '<p><span style="color:#696969"><span style="font-size:14px">Các sản phẩm Dr Michaels Soratinex hoàn toàn có thể tự sử dụng tại nhà hàng ngày một cách dễ dàng theo hướng dẫn mà không cần bất cứ sự trợ giúp nào.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(4, 'What is the price of Dr Michaels products and is it possible to order them directly with you?', '<span style="color: rgb(77, 72, 66); font-family: Arial, Helvetica, sans-serif; line-height: 16.799999237060547px; text-align: justify;">The price of Dr Michaels products can vary, depending on the margin of each pharmacy. However, it usually costs in between 2,000 CZK to 2,500 CZK.</span>\r\n<div>\r\n	&nbsp;</div>\r\n', NULL, 'vi', 3, 0, 0),
(5, 'Mất khoảng bao nhiêu lâu để có thể quan sát thấy sự chuyển biến đáng kể từ thời điểm bắt đầu sử dụng các sản phẩm Dr Michaels Soratinex?', '<p><span style="font-size:14px"><span style="color:#696969">Khoảng từ 8 – 10 ngày sau khi sử dụng, có thể nhìn thấy sự cải thiện đáng kể tình trạng da.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(6, 'Những thay đổi nào thường quan sát thấy sau 8 – 10 ngày sử dụng đầu tiên?', '<p><span style="font-size:14px"><span style="color:#696969">Giảm ngứa</span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="color:#696969">Giảm hiện tượng đỏ da</span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="color:#696969">Giảm hiện tượng tăng sừng/ dầy sừng</span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="color:#696969">Giảm sự xâm nhập của vi khuẩn</span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="color:#696969">Các vùng tổn thương phân mảnh nhỏ hơn</span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="color:#696969">Thay đổi màu sắc của các vùng tổn thương</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(7, 'Cần sử dụng các sản phẩm Dr Michaels Soratinex trong bao lâu để tình trạng bệnh thuyên giảm hoàn toàn?', '<p><span style="color:#696969"><span style="font-size:14px">Thời gian thuyên giảm khác nhau tùy theo tình trạng thực tế của người sử dụng, nhưng thông thường là 8 - 10 tuần. Cần lưu ý sử dụng các sản phẩm đúng theo các hướng dẫn.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(8, 'Các tác dụng phụ có thể xảy ra khi sử dụng sản phẩm bôi ngoài Dr Michaels Soratinex nêu trên?', '<p><span style="color:#696969"><span style="font-size:14px">Một số lượng nhỏ người sử dụng có thể xuất hiện hiện tượng viêm nang lông hoặc ngứa, có thể tiếp tục sử dụng sản phẩm mà không cần thiết phải điều trị. Không nên mặc quần áo sáng màu có thể bị phai màu từ Soratinex Cream.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(9, 'Sản phẩm Soratinex Oil được sử dụng trước hay sau khi bôi Soratinex Cream?', '<p><span style="font-size:14px"><span style="color:#696969">Sản phẩm Soratinex Oil&nbsp;LUÔN LUÔN được sử dụng SAU khoảng 2 - 5 phút kể từ khi bôi Soratinex Cream.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(10, 'Việc sử dụng các sản phẩm Dr Michaels Soratinex có an toàn cho tất cả các lứa tuổi hay không?', '<p><span style="color:#696969"><span style="font-size:14px">Các sản phẩm bôi ngoài&nbsp;hoàn toàn an toàn khi sử dụng đối với tất cả các lứa tuổi.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(11, 'Việc sử dụng các sản phẩm Dr Michaels Soratinex có an toàn khi mang thai hoặc cho con bú?', '<p><span style="font-size:14px"><span style="color:#696969">Các sản phẩm bôi ngoài&nbsp;hoàn toàn an toàn khi sử dụng đối với người mang thai và cho con bú.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(12, 'Các sản phẩm Dr Michaels Soratinex này có an toàn không khi người sử dụng đang đồng thời dùng các loại thuốc điều trị huyết áp, đái tháo đường, hen suyễn…?', '<p><span style="font-size:14px"><span style="color:#696969">Sử dụng các sản phẩm bôi ngoài Dr Michaels Soratinex&nbsp;hoàn toàn an toàn và không ảnh hưởng.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(13, 'Bộ 03 sản phẩm bôi ngoài Dr Michaels Soratinex có thể sử dụng hiệu quả cho tất cả các thể vẩy nến hay không?', '<p><span style="font-size:14px"><span style="color:#696969">Sử dụng bộ 3 sản phẩm bôi ngoài Dr Michaels Soratinex&nbsp;sẽ rất hiệu quả cho các thể vẩy nến thông dụng như vẩy nến thể mảng bám mãn tính, da đầu, lòng bàn chân tay, đốm, tròn. Tuy nhiên để đạt hiệu quả cao nhất, tùy theo tình trạng thực tế cần sự hướng dẫn tư vấn cụ thể của chuyên gia da liễu.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999),
(14, 'Hướng dẫn sử dụng đúng cách các sản phẩm bôi ngoài Dr Michaels Soratinex?', '<p><strong><span style="color:#696969"><span style="font-size:14px">KHUYẾN NGHỊ SỬ DỤNG KẾT HỢP ĐẦY ĐỦ CẢ&nbsp;3 THÀNH PHẦN NÊU TRÊN 2 LẦN/ NGÀY&nbsp;LIÊN TỤC TRONG 8 TUẦN,&nbsp;VÀO BUỔI SÁNG VÀ BUỔI TỐI, CHI TIẾT NHƯ SAU:</span></span></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="color:#696969"><span style="font-size:14px">Bước 1: làm ướt rồi&nbsp;bôi Soratinex&nbsp;Gel làm sạch vào khu vực các tổn thương và mát xa đều các khu vực đã bôi. Để chờ trong 3 - 5 phút và sau đó rửa sạch bằng nước ấm. Nhẹ nhàng lau khô bằng khăn khô mềm.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="color:#696969"><span style="font-size:14px">Bước 2: bôi Soratinex Cream&nbsp;đều lên các khu vực bị tổn thương và xoa đều nhẹ nhàng các khu vực đã bôi.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="color:#696969"><span style="font-size:14px">Bước 3: chờ từ 2 – 5 phút rồi bôi tiếp Soratinex Oil&nbsp;lên trên lớp mỡ. Lưu ý không được rửa hoặc lau sạch sau bước này.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, 'vi', 2, 1, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `faq_category`
--

CREATE TABLE IF NOT EXISTS `faq_category` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `is_active` tinyint(1) NOT NULL default '0',
  `z_index` int(11) NOT NULL default '9999',
  `parent` varchar(250) default NULL,
  `lang` char(2) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faq_category`
--

INSERT INTO `faq_category` (`id`, `title`, `link`, `is_active`, `z_index`, `parent`, `lang`, `lang_id`) VALUES
(2, 'Bệnh vẩy nến', 'benh-vay-nen', 1, 9999, NULL, 'vi', 0),
(3, 'Viêm da cơ địa', 'viem-da-co-dia', 1, 9999, NULL, 'vi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_album`
--

CREATE TABLE IF NOT EXISTS `gallery_album` (
  `id` int(11) NOT NULL auto_increment,
  `album_type` tinyint(4) NOT NULL COMMENT '0: photo, 1: video',
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `link` varchar(500) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `z_index` int(11) NOT NULL default '9999',
  `is_active` tinyint(4) NOT NULL,
  `photo` varchar(500) collate utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `is_home` tinyint(4) NOT NULL default '0',
  `seo_title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `seo_description` text collate utf8_unicode_ci NOT NULL,
  `seo_keyword` varchar(250) collate utf8_unicode_ci NOT NULL,
  `news_category_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `gallery_album`
--

INSERT INTO `gallery_album` (`id`, `album_type`, `title`, `link`, `description`, `z_index`, `is_active`, `photo`, `create_date`, `is_home`, `seo_title`, `seo_description`, `seo_keyword`, `news_category_id`) VALUES
(12, 0, 'Du học Nhật Bản', 'du-hoc-nhat-ban', 'Du học Nhật Bản', 9999, 1, '10401453_308778839277272_1052655014053527391_n.jpg', '2015-03-19 08:44:52', 0, '', '', '', 30),
(17, 0, 'OPEN CAMPUS - Trải nghiệm văn hóa Nhật', 'open-campus-trai-nghiem-van-hoa-nhat', '', 9999, 1, 'DSC01601.png', '2015-03-27 05:43:25', 1, '', '', '', 27);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photo`
--

CREATE TABLE IF NOT EXISTS `gallery_photo` (
  `id` int(11) NOT NULL auto_increment,
  `album_id` int(11) NOT NULL,
  `z_index` int(11) NOT NULL default '9999',
  `is_active` tinyint(4) NOT NULL,
  `photo` varchar(500) collate utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `seo_title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `seo_description` text collate utf8_unicode_ci NOT NULL,
  `seo_keyword` varchar(250) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=127 ;

--
-- Dumping data for table `gallery_photo`
--

INSERT INTO `gallery_photo` (`id`, `album_id`, `z_index`, `is_active`, `photo`, `create_date`, `seo_title`, `seo_description`, `seo_keyword`) VALUES
(72, 12, 9999, 0, '11-shk-287_3.jpg', '2015-03-19 08:53:08', '', '', ''),
(73, 12, 9999, 0, '02072012233146.jpg', '2015-03-19 09:00:16', '', '', ''),
(74, 12, 9999, 0, '11-ks-28_4.jpg', '2015-03-19 09:00:35', '', '', ''),
(75, 12, 9999, 0, 'Top-10-khach-san-co-tam-nhin-van-nguoi-me-ivivu-1.jpg', '2015-03-19 09:00:47', '', '', ''),
(89, 12, 9999, 1, '1506015_684527641612831_2643892453428239438_n.jpg', '2015-03-27 04:48:48', '', '', ''),
(90, 12, 9999, 1, '10154499_687803601285235_2296879832087569934_n.jpg', '2015-03-27 04:48:56', '', '', ''),
(91, 12, 9999, 1, '10173411_481501385310240_288527848_n.jpg', '2015-03-27 04:49:16', '', '', ''),
(93, 12, 9999, 1, '10441219_315434225278400_1806399277464034288_n.jpg', '2015-03-27 04:49:58', '', '', ''),
(94, 12, 9999, 1, '10401453_308778839277272_1052655014053527391_n.jpg', '2015-03-27 04:50:07', '', '', ''),
(95, 12, 9999, 1, '1502506_359199047568584_4777975531267974123_n.jpg', '2015-03-27 04:50:17', '', '', ''),
(96, 12, 9999, 1, '1488327_341426686012487_1546521511953105960_n.jpg', '2015-03-27 04:50:32', '', '', ''),
(97, 12, 9999, 1, '1920212_576949072409283_8466077008700208301_n.jpg', '2015-03-27 04:50:54', '', '', ''),
(98, 12, 9999, 1, '1551719_507242802724098_1595451889_n.jpg', '2015-03-27 04:51:10', '', '', ''),
(99, 12, 9999, 1, '1185106_507242789390766_506246393_n.jpg', '2015-03-27 04:51:25', '', '', ''),
(100, 12, 9999, 1, '10985912_433384496816705_1910973860520362876_n.jpg', '2015-03-27 04:54:45', '', '', ''),
(101, 12, 9999, 1, '1510855_433433953478426_1517478097718314856_n.jpg', '2015-03-27 04:57:56', '', '', ''),
(102, 12, 9999, 1, '11041738_433384316816723_4981880460998066559_n.jpg', '2015-03-27 04:58:04', '', '', ''),
(103, 17, 9999, 1, 'DSC04408.JPG', '2015-03-27 05:44:42', '', '', ''),
(104, 17, 9999, 1, 'DSC04207.JPG', '2015-03-27 05:45:28', '', '', ''),
(105, 17, 9999, 1, 'DSC04398.JPG', '2015-03-27 05:47:23', '', '', ''),
(106, 17, 9999, 1, 'DSC04432.JPG', '2015-03-27 05:49:01', '', '', ''),
(107, 17, 9999, 1, 'DSC04396.JPG', '2015-03-27 05:50:42', '', '', ''),
(108, 17, 9999, 1, 'DSC04413.JPG', '2015-03-27 05:51:29', '', '', ''),
(109, 17, 9999, 1, 'DSC04415.JPG', '2015-03-27 05:56:31', '', '', ''),
(110, 17, 9999, 1, 'DSC04498.JPG', '2015-03-27 05:57:00', '', '', ''),
(111, 17, 9999, 1, 'DSC04546.JPG', '2015-03-27 05:58:15', '', '', ''),
(112, 17, 9999, 1, 'DSC04596.JPG', '2015-03-27 05:58:53', '', '', ''),
(113, 17, 9999, 1, 'DSC04565.JPG', '2015-03-27 05:59:35', '', '', ''),
(114, 17, 9999, 1, 'DSC04249.JPG', '2015-03-27 06:01:05', '', '', ''),
(115, 17, 9999, 1, 'DSC01601.JPG', '2015-03-27 06:02:50', '', '', ''),
(116, 17, 9999, 1, '05.jpg', '2015-03-27 06:03:33', '', '', ''),
(117, 17, 9999, 1, 'DSC01566.JPG', '2015-03-27 06:04:15', '', '', ''),
(118, 17, 9999, 1, 'DSC01466.JPG', '2015-03-27 06:05:17', '', '', ''),
(119, 17, 9999, 1, 'DSC01941.JPG', '2015-03-27 06:07:25', '', '', ''),
(122, 17, 9999, 1, 'DSC02131.JPG', '2015-03-27 06:09:11', '', '', ''),
(123, 17, 9999, 1, 'DSC01248.JPG', '2015-03-27 06:11:52', '', '', ''),
(124, 12, 9999, 1, '2.JPG', '2015-03-27 06:13:54', '', '', ''),
(125, 12, 9999, 1, 'DSC_4096.jpg', '2015-03-27 06:14:13', '', '', ''),
(126, 12, 9999, 1, '26 (3).jpg', '2015-03-27 06:17:21', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_video`
--

CREATE TABLE IF NOT EXISTS `gallery_video` (
  `id` int(11) NOT NULL auto_increment,
  `album_id` int(11) NOT NULL,
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `link` varchar(500) collate utf8_unicode_ci NOT NULL,
  `z_index` int(11) NOT NULL default '9999',
  `is_active` tinyint(4) NOT NULL,
  `photo` varchar(500) collate utf8_unicode_ci NOT NULL,
  `embed` text collate utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `seo_title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `seo_description` text collate utf8_unicode_ci NOT NULL,
  `seo_keyword` varchar(250) collate utf8_unicode_ci NOT NULL,
  `news_category_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `gallery_video`
--

INSERT INTO `gallery_video` (`id`, `album_id`, `title`, `link`, `z_index`, `is_active`, `photo`, `embed`, `create_date`, `seo_title`, `seo_description`, `seo_keyword`, `news_category_id`) VALUES
(6, 1, 'Lớp tiếng Nhật trẻ em - Học bảng chữ cái tiếng Nhật', 'lop-tieng-nhat-tre-em-hoc-bang-chu-cai-tieng-nhat', 1, 1, 'DSC04546.jpg', '<div class="embeddedContent" data-align="center" data-maxheight="315" data-maxwidth="560" data-oembed="https://www.youtube.com/watch?v=FHR3B0QOnv4" data-resizetype="custom" style="text-align:center"><iframe allowfullscreen="true" allowscriptaccess="always" frameborder="0" height="315" scrolling="no" src="//www.youtube.com/embed/FHR3B0QOnv4?wmode=transparent&amp;jqoemcache=9S9rm" width="560"></iframe></div>\r\n\r\n<p>&nbsp;</p>\r\n', '2015-03-27 06:35:41', '', '', '', 20),
(7, 1, 'Đọc truyện tiếng Nhật - học viên lớp tiếng Nhật sơ cấp ', 'doc-truyen-tieng-nhat-hoc-vien-lop-tieng-nhat-so-cap', 9999, 1, 'DSC03190.JPG', '<div class="embeddedContent" data-align="center" data-maxheight="315" data-maxwidth="560" data-oembed="https://youtu.be/eVvLWJn4HlU" data-resizetype="custom" style="text-align:center"><iframe allowfullscreen="true" allowscriptaccess="always" frameborder="0" height="315" scrolling="no" src="//www.youtube.com/embed/eVvLWJn4HlU?wmode=transparent&amp;jqoemcache=6oATp" width="560"></iframe></div>\r\n\r\n<p>&nbsp;</p>\r\n', '2015-03-27 06:43:42', '', '', '', 27),
(11, 1, 'Video giới thiệu Học viện JINNO Nhật Bản', 'video-gioi-thieu-hoc-vien-jinno-nhat-ban', 9999, 1, 'Y.jpg', '<div class="embeddedContent" data-align="center" data-maxheight="315" data-maxwidth="560" data-oembed="https://youtu.be/ZT78u8h_-3o" data-resizetype="custom" style="text-align:center"><iframe allowfullscreen="true" allowscriptaccess="always" frameborder="0" height="315" scrolling="no" src="//www.youtube.com/embed/ZT78u8h_-3o?wmode=transparent&amp;jqoemcache=eePpQ" width="560"></iframe></div>\r\n\r\n<p>&nbsp;</p>\r\n', '2015-04-16 10:31:45', '', '', '', 30);

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(11) NOT NULL auto_increment,
  `photo` varchar(255) default NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext,
  `is_default` int(11) NOT NULL,
  `is_active` int(11) NOT NULL default '1',
  `code` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `photo`, `title`, `content`, `is_default`, `is_active`, `code`, `create_date`) VALUES
(6, '30114325811137049610vn.jpg', 'Tiếng Việt', 'default_title= Dong Luc Group\r\ndefault_description = Dong Luc Group\r\ndefault_keyword = Dong Luc Group\r\n\r\nproduct_title= Sản phẩm\r\nproduct_description = Sản phẩm\r\nproduct_keyword = Sản phẩm\r\n\r\ncontact_title= Liên hệ\r\ncontact_description = Liên hệ\r\ncontact_keyword = Liên hệ\r\n\r\nnews_title= Thông tin\r\nnews_description = Thông tin\r\nnews_keyword = Thông tin\r\n\r\ncopyright = \r\n\r\ncompany_contact= \r\n\r\nphone_contact_mienbac = \r\nphone_contact_miennam = \r\nemail_contact = \r\naddress_contact = \r\n\r\nhotnews= Tin mới nhất\r\n\r\ntext_menu_home = Trang chủ\r\ntext_menu_about = Giới thiệu\r\ntext_menu_contact = Liên hệ\r\ntext_menu_news = Thông tin\r\ntext_menu_product = Sản phẩm\r\ntext_menu_faq = Hỏi đáp\r\n\r\n404_title = Không tìm thấy trang web bạn yêu cầu\r\n404_content = Xin lỗi, nội dung bạn đang tìm kiếm hiện tại không tìm thấy. Hãy quay về trang chủ hoặc các chuyên mục khác để tìm thấy nội dung của mình, hoặc bạn có thể liên hệ với chúng tôi để được trợ giúp!\r\n404_title_suggest = Có thể bạn quan tâm\r\n404_title_thank = Trân trọng!!!\r\n\r\nform_contact_name = Họ tên\r\nform_contact_phone = Số điện thoại\r\nform_contact_address = Địa chỉ\r\nform_contact_email = Địa chỉ email\r\nform_contact_message = Nội dung\r\nform_contact_error = Đã có lỗi xảy ra:\r\nform_contact_name_require = Họ tên là bắt buộc\r\nform_contact_phone_require = Số điện thoại là bắt buộc\r\nform_contact_address_require = Địa chỉ là bắt buộc\r\nform_contact_email_require = Email là bắt buộc\r\nform_contact_message_require = Nội dung là bắt buộc\r\nform_contact_success = Gửi liên hệ thành công!\r\n\r\nsearch_title = Kết quả tìm kiếm\r\nsearch_error = Không có sản phẩm nào\r\nsearch_alert_error = Vui lòng nhập từ khóa để tìm kiếm!\r\n', 1, 1, 'vi', '2014-05-02 12:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `menu_quick`
--

CREATE TABLE IF NOT EXISTS `menu_quick` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `title_jp` varchar(250) default NULL,
  `description` varchar(255) default NULL,
  `photo` varchar(500) NOT NULL,
  `photo_old` varchar(255) default NULL,
  `link_to` varchar(255) default NULL,
  `z_index` int(11) NOT NULL default '9999',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `menu_quick`
--

INSERT INTO `menu_quick` (`id`, `title`, `title_jp`, `description`, `photo`, `photo_old`, `link_to`, `z_index`) VALUES
(1, 'Liên hệ', '連絡先', NULL, '', NULL, '', 0),
(4, 'Gallery', '写真', NULL, '', NULL, '', 0),
(6, 'Trang chủ', 'トップページ', NULL, '', NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `network_mangluoi`
--

CREATE TABLE IF NOT EXISTS `network_mangluoi` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL,
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL default '0',
  `z_index` int(11) NOT NULL default '9999',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `network_mangluoi`
--

INSERT INTO `network_mangluoi` (`id`, `parent_id`, `title`, `is_active`, `z_index`) VALUES
(1, 0, 'Hà Nội', 1, 9999),
(2, 0, 'Tp Hồ Chí Minh', 1, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `network_vitri`
--

CREATE TABLE IF NOT EXISTS `network_vitri` (
  `id` int(11) NOT NULL auto_increment,
  `address` varchar(500) collate utf8_unicode_ci NOT NULL,
  `mangluoi_id` int(11) NOT NULL,
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `photo` varchar(100) collate utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL default '0',
  `lat` varchar(100) collate utf8_unicode_ci NOT NULL,
  `lon` varchar(100) collate utf8_unicode_ci NOT NULL,
  `is_primary` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `network_vitri`
--

INSERT INTO `network_vitri` (`id`, `address`, `mangluoi_id`, `title`, `content`, `photo`, `is_active`, `lat`, `lon`, `is_primary`) VALUES
(1, 'Star tower cầu giấy', 1, 'Star tower cầu giấy', '<p>120 Nguyễn Phong Sắc, Cầu Giấy (tầng 2)<br />\r\nĐT: 0977 325 084<br />\r\nMở cửa từ 9h sáng đến 7h tối (7 ngày 1 tuần)</p>\r\n\r\n<p><strong>Các dịch vụ tại đây:</strong></p>\r\n\r\n<ul>\r\n	<li><u>Hàng hoá:</u>&nbsp;Luôn có sẵn&nbsp;(có thể theo dõi kho trên website)</li>\r\n	<li><u>Khám đo mắt:</u>&nbsp;Không</li>\r\n	<li><u>Lưu ý:</u>&nbsp;tầng 1 của toà nhà là cửa hàng bán máy cà phê, quý khách vui lòng lên gác 2</li>\r\n</ul>\r\n', '', 1, '21.0249977', '105.7911013', 0),
(2, 'OCEANBANK TRẦN DUY HƯNG', 1, 'Trần Duy Hưng', 'Làm việc tại ngân hàng', '', 1, '21.0101432', '105.7988602', 1),
(3, 'Sân Golf Tân Sơn Nhất', 2, 'Sân Golf Tân Sơn Nhất', 'Sân Golf Tân Sơn Nhất', '', 1, '10.8184631', '106.6588245', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) NOT NULL auto_increment,
  `menu_type` varchar(100) NOT NULL,
  `news_category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `photo` varchar(500) NOT NULL,
  `seo_title` varchar(250) NOT NULL,
  `seo_description` varchar(250) NOT NULL,
  `seo_keyword` varchar(250) NOT NULL,
  `is_active` tinyint(4) NOT NULL default '0',
  `z_index` int(11) NOT NULL default '9999',
  `create_date` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `lang` char(2) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `is_top` tinyint(4) NOT NULL default '0',
  `luotview` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `menu_type`, `news_category_id`, `title`, `link`, `description`, `content`, `photo`, `seo_title`, `seo_description`, `seo_keyword`, `is_active`, `z_index`, `create_date`, `user_id`, `lang`, `lang_id`, `is_top`, `luotview`) VALUES
(1, '', 3, 'Động Lực tài trợ bóng thi đấu chính thức VLeague 2015', 'dong-luc-tai-tro-bong-thi-dau-chinh-thuc-vleague-2015', 'Hôm nay, 04/01/2015 tại Lễ Khai mạc Giải bóng đá Vô địch Quốc Gia – TOYOTA 2015. Động Lực một lần nữa vinh dự công bố là Nhà tài trợ bóng độc quyền cho các Giải bóng đá chuyên nghiệp Việt Nam. Hợp đồng tài trợ được ký giữa Công ty Cổ phần Động Lực với Công ty Cổ phần Bóng đá chuyên nghiệp Việt Nam (VPF) trong hai mùa giải 2014 và 2015', '<h2><a href="#phan1">Phần 1</a><br />\n<a href="#phan2">Phần 2</a><br />\n<a href="#phan3">Phần 3</a></h2>\n\n<p>&nbsp;</p>\n\n<p><a id="phan1" name="phan1"><span style="color:#FF0000">Nội dung 1</span></a></p>\n\n<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\n\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\n\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\n\n<p><a id="phan2" name="phan2"><span style="color:#800080">Nội dung 2</span></a></p>\n\n<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\n\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\n\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\n\n<p><a id="phan3" name="phan3"><span style="color:#40E0D0">Nội dung 3</span></a></p>\n\n<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\n\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\n\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\n', 'khaimacV-league_zps210a02d6.jpg', '', '', '', 1, 9999, '2015-05-27 11:38:12', 99, 'vi', 0, 1, 1),
(2, '', 2, '522 Doanh nghiệp nhận Danh hiệu Hàng Việt Nam chất lượng cao', '522-doanh-nghiep-nhan-danh-hieu-hang-viet-nam-chat-luong-cao', 'Đây là năm thứ 19 Chương trình Hàng Việt Nam chất lượng cao tôn vinh các doanh nghiệp trong nước được người tiêu dùng tin tưởng, bình chọn. Tối 5/2, tại TP HCM, Hội Doanh nghiệp hàng Việt Nam chất lượng cao tổ chức Lễ Công bố và trao danh hiệu Hàng Việt Nam chất lượng cao năm 2015. Tham dự buổi lễ có Bộ trưởng Bộ Khoa học- Công  nghệ Nguyễn Quân,  Thứ  trưởng  Bộ Công  thương  Trần Tuấn Anh, đại diện nhiều tỉnh, thành phố và hơn 500 doanh nghiệp. Có 522 doanh nghiệp được người tiêu dùng bình chọn, đạt nhãn hiệu chứng nhận', '<h2><a href="#phan1">Phần 1</a><br />\n<a href="#phan2">Phần 2</a><br />\n<a href="#phan3">Phần 3</a></h2>\n\n<p>&nbsp;</p>\n\n<p><a id="phan1" name="phan1"><span style="color:#FF0000">Nội dung 1</span></a></p>\n\n<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\n\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\n\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\n\n<p><a id="phan2" name="phan2"><span style="color:#800080">Nội dung 2</span></a></p>\n\n<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\n\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\n\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\n\n<p><a id="phan3" name="phan3"><span style="color:#40E0D0">Nội dung 3</span></a></p>\n\n<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\n\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\n\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\n', 'anh1_zps5fcae2bd.png', '', '', '', 1, 9999, '2015-05-27 11:52:50', 99, 'vi', 0, 1, 2),
(3, '', 6, 'Cung cấp thiết bị các môn thể thao', 'cung-cap-thiet-bi-cac-mon-the-thao', 'Mitre ra đời từ năm 1817 tại Huddersfield, Anh. Tại giải bóng đá đầu tiên của Thế giới năm 1888 “The Football  Feague”, quả bóng đá mitre đã lăn trên sân thi đấu của giải bóng đá này. Không những chỉ nổi tiếng với sản phẩm bóng đá. Mitre cung cấp các sản phẩm thời trang thể thao đa dạng, trang phục tennis, trang phục Golf, phụ kiện cho môn bóng đá...', '<div class="embeddedContent" data-align="center" data-maxheight="" data-maxwidth="100%" data-oembed="https://www.youtube.com/watch?v=vUZvMwQuYXU" data-resizetype="noresize" style="text-align: center;"><iframe allowfullscreen="true" allowscriptaccess="always" frameborder="0" height="349" scrolling="no" src="//www.youtube.com/embed/vUZvMwQuYXU?wmode=transparent&amp;jqoemcache=oINiQ" width="425"></iframe></div>\r\n\r\n<p><br />\r\nLorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\r\n\r\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\r\n\r\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\r\n\r\n<p><img alt="" src="upload/editor/images/IMG_5037.jpg" /></p>\r\n', 'dung-cu.jpg', '', '', '', 1, 9999, '2015-05-28 05:09:08', 99, 'vi', 0, 1, 3),
(4, '', 5, 'Cung cấp thiết bị sân bóng đá', 'cung-cap-thiet-bi-san-bong-da', 'Thương hiệu thời trang đến từ Anh Quốc mitre tự hào là Nhà tài trợ trang phục chính thức cho các Đại hội thể thao: SEA Games 28, ASEAN Para Games 8, Thế vận hội Olympic mùa hè 31, Đại hội Thể thao người khuyết tật Paralympic Rio 2016, Đại hội Thể thao Bãi biển Châu Á lần thứ 5. ', '<p style="text-align:center"><img alt="" src="upload/editor/images/Mat tien sieu thi so 4 Hang Chao.jpg" /></p>\r\n\r\n<p><span style="font-size:20px"><a href="#phan1">Phần 1</a>&nbsp;<a href="#phan2">Phần 2</a>&nbsp;<a href="#phan3">Phần 3</a></span></p>\r\n\r\n<p><em>Click vào từng phần để đi xuống nội dung tương ứng</em></p>\r\n\r\n<p><a id="phan1" name="phan1"><span style="color:#FF0000">Nội dung 1</span></a></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\r\n\r\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\r\n\r\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\r\n\r\n<p><a id="phan2" name="phan2"><span style="color:#800080">Nội dung 2</span></a></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\r\n\r\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\r\n\r\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\r\n\r\n<p><a id="phan3" name="phan3"><span style="color:#40E0D0">Nội dung 3</span></a></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, et laudem prompta menandri vim, autem congue inermis at mel. Ea nam utamur vivendo. Ea mel possit appetere, vis cu velit nonumes nusquam, no brute volumus maiestatis mea. In pri everti fabulas, ut prompta delenit vis. Inimicus patrioque disputationi vix cu. Ne mea antiopam voluptaria, ne quo omnis signiferumque, nam verear indoctum ne.</p>\r\n\r\n<p>Eam nullam petentium interpretaris ea, has no nonumy feugiat torquatos, unum scriptorem ad qui. Mei esse repudiare et, at atqui nullam fabulas mel, ei tota munere integre nec. Cu denique vulputate usu, autem integre eu vim. Ea oratio mucius lucilius sit, vim ea quaeque alterum. Mea at ancillae pertinax efficiantur, ea vim stet delenit, te doctus nonumes est. No torquatos referrentur mel, no etiam aliquam argumentum nec.</p>\r\n\r\n<p>Ea sit nusquam quaestio rationibus, possit postulant cotidieque cum ea. Ex ipsum persius instructior vix. Eos erat velit ut, animal detracto singulis est ei. Mei zril ullamcorper at, volumus aliquando referrentur has te. Etiam iuvaret complectitur sed ei, no iriure epicurei omittantur vix, natum legimus graecis vix cu.</p>\r\n', 'showroom-hang-chao.jpg', '', '', '', 1, 9999, '2015-05-28 05:15:56', 99, 'vi', 0, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id` bigint(20) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) default NULL,
  `z_index` int(4) NOT NULL default '9999',
  `parent_id` bigint(20) default NULL,
  `menu_type` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `content` longtext,
  `description` longtext,
  `is_active` tinyint(4) NOT NULL default '0',
  `link_to` varchar(500) NOT NULL,
  `is_menu` tinyint(4) NOT NULL default '0',
  `seo_title` varchar(250) NOT NULL,
  `seo_description` varchar(250) NOT NULL,
  `seo_keyword` varchar(250) NOT NULL,
  `lang` char(2) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `title`, `link`, `z_index`, `parent_id`, `menu_type`, `photo`, `thumb`, `content`, `description`, `is_active`, `link_to`, `is_menu`, `seo_title`, `seo_description`, `seo_keyword`, `lang`, `lang_id`) VALUES
(1, 'Tài trợ', 'tai-tro', 9999, 0, '', '', '', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(2, '2014 trở về trước', '2014-tro-ve-truoc', 9999, 1, '', '', '', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(3, 'Các sự kiện tài trợ hiện tại', 'cac-su-kien-tai-tro-hien-tai', 9999, 1, '', '', '', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(4, 'Dự án', 'du-an', 9999, 0, '', '', '', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(5, 'Sân vận động', 'san-van-dong', 9999, 4, '', '', '', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(6, 'Nhà thi đấu', 'nha-thi-dau', 9999, 4, '', '', '', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(7, 'Xuất khẩu', 'xuat-khau', 9999, 0, '', '', '', '', NULL, 1, 'http://donglucsport.com', 0, '', '', '', 'vi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL,
  `z_index` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL default '0',
  `create_date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL,
  `cust_note` varchar(250) NOT NULL,
  `is_process` tinyint(1) NOT NULL,
  `province` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `price_text` varchar(250) default NULL,
  `quantity` int(11) NOT NULL,
  `discount` float NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `color_code` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `price_goc` decimal(10,0) NOT NULL,
  PRIMARY KEY  (`order_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `price`, `price_text`, `quantity`, `discount`, `color_name`, `color_code`, `size`, `price_goc`) VALUES
(1, 8, '175000', '175000', 4, 30, 'Xanh dương', '#146AFF', 'XXL', '250000'),
(2, 8, '175000', '175000', 4, 30, 'Xanh dương', '#146AFF', 'XXL', '250000'),
(2, 4, '180000', '180000', 65, 10, 'Đỏ', '#D42626', 'M', '200000'),
(3, 8, '175000', '175000', 1, 30, 'Đen', '#424242', 'XL', '250000'),
(3, 4, '180000', '180000', 3, 10, 'Xanh lục', '#147011', 'M', '200000'),
(3, 2, '225000', '225000', 1, 10, '', '', '', '250000'),
(3, 1, '300000', '300000', 1, 50, '', '', 'M', '600000'),
(4, 2, '225000', '225000', 1, 10, 'Nâu', '#755832', 'XXL', '250000'),
(4, 8, '175000', '175000', 1, 30, 'Đỏ', '#D42626', 'XXL', '250000'),
(5, 8, '175000', '175000', 1, 30, 'Đỏ', '#D42626', 'M', '250000'),
(6, 8, '175000', '175000', 1, 30, 'Xanh lục', '#147011', 'XL', '250000'),
(7, 8, '175000', '175000', 1, 30, 'Xanh lục', '#147011', 'L', '250000'),
(7, 5, '225000', '225000', 2, 10, 'Nâu', '#755832', '', '250000'),
(8, 8, '175000', '175000', 1, 30, '', '', '', '250000'),
(9, 8, '175000', '175000', 1, 30, '', '', '', '250000'),
(10, 8, '175000', '175000', 1, 30, 'Xanh lục', '#147011', 'S', '250000');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `z_index` int(11) NOT NULL,
  `thumb` varchar(500) collate utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `title`, `z_index`, `thumb`, `is_active`) VALUES
(1, 'Smart Media', 9999, '1.jpg', 1),
(2, 'Bentley', 9999, '2.jpg', 1),
(3, '', 9999, '3.jpg', 1),
(4, '', 9999, '4.jpg', 1),
(5, '', 9999, '5.jpg', 1),
(6, '', 9999, '6.jpg', 1),
(7, '', 9999, '7.jpg', 1),
(8, '', 9999, '8.jpg', 1),
(9, '', 9999, '9.jpg', 1),
(10, '', 9999, '10.jpg', 1),
(11, '', 9999, '11.jpg', 1),
(12, '', 9999, '12.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `party_img`
--

CREATE TABLE IF NOT EXISTS `party_img` (
  `id` bigint(20) NOT NULL auto_increment,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `party_img`
--

INSERT INTO `party_img` (`id`, `link`) VALUES
(4, '/uploads/20131022101214_IMG_5460.JPG'),
(5, '/uploads/20131022101246_IMG_5443.JPG'),
(6, '/uploads/20131022101310_IMG_5438.JPG'),
(7, '/uploads/20131023104648_994341_10200654273138542_283847269_n.jpg'),
(8, '/uploads/20131023104708_Rihanna & Louis Atkins.jpg'),
(9, '/uploads/20131023104725_305923_494508983913900_697042482_n.jpg'),
(11, '/uploads/20131023104820_Ashley Cole.jpg'),
(12, '/uploads/20131023104835_Chris Brown & Louis Atkins.jpg'),
(13, '/uploads/20131023104850_Jose Mourinho & Dino2.jpg'),
(15, '/uploads/20131023104919_Lewis Hamilton & Joseph Banin.jpg'),
(16, '/uploads/20131023104940_Mariah Carey & Joseph Banin.jpg'),
(22, '/uploads/20131024100633_Justin Bieber & Joseph Banin.jpg'),
(24, '/uploads/20140308031557_557411_356614811080221_154875050_n (1).jpg'),
(25, '/uploads/20140308031633_388027_356614927746876_986044246_n.jpg'),
(26, '/uploads/20140308031700_2791_356614997746869_1430330650_n.jpg'),
(27, '/uploads/20140308031813_423566_356614827746886_29547560_n.jpg'),
(28, '/uploads/20140308032447_1451360_562616443813389_134924679_n.jpg'),
(29, '/uploads/20140308032454_1394141_562620867146280_1792477424_n.jpg'),
(30, '/uploads/20140308032502_1238099_562617507146616_1503683614_n.jpg'),
(31, '/uploads/20140308032513_1003226_562620930479607_382003889_n.jpg'),
(32, '/uploads/20140308032631_1559398_608333985908301_2114456417_o.jpg'),
(33, '/uploads/20140308032643_1602144_608333842574982_2064101614_o.jpg'),
(34, '/uploads/20140308032654_1781115_608333072575059_1978678077_o.jpg'),
(35, '/uploads/20140308032702_1795458_608332789241754_382604909_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) NOT NULL auto_increment,
  `product_type_id` bigint(20) default '0',
  `product_group_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `content` longtext,
  `description` text NOT NULL,
  `price` decimal(10,0) default NULL,
  `price_sale` decimal(10,0) NOT NULL,
  `price_id` int(11) NOT NULL,
  `discount` float NOT NULL,
  `create_date` datetime default NULL,
  `user_id` bigint(20) default NULL,
  `update_date` datetime default NULL,
  `update_user` bigint(20) default NULL,
  `seo_title` varchar(250) NOT NULL,
  `seo_description` varchar(250) NOT NULL,
  `seo_keyword` varchar(250) NOT NULL,
  `z_index` int(11) NOT NULL default '9999',
  `is_active` tinyint(4) NOT NULL default '0',
  `lang` char(2) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `is_top` tinyint(4) NOT NULL default '0',
  `embed` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_type_id`, `product_group_id`, `code`, `title`, `link`, `photo`, `content`, `description`, `price`, `price_sale`, `price_id`, `discount`, `create_date`, `user_id`, `update_date`, `update_user`, `seo_title`, `seo_description`, `seo_keyword`, `z_index`, `is_active`, `lang`, `lang_id`, `is_top`, `embed`) VALUES
(9, 18, 0, 'AFF Mitre', 'Bóng thi đấu chính thức Suzuki ', 'bong-thi-dau-chinh-thuc-suzuki', 'original-suzuki-aff-2014.jpg', 'Bóng thi đấu chính thức của giải Suzuki AFF 2014. Bóng chứng chỉ FIFA APPROVED, chứng chỉ cao nhất về chất lượng bóng trên toàn thế giới. Dòng: Professional', '', '1190000', '1190000', 0, 0, '2015-05-28 11:41:01', 99, '2015-05-28 11:46:11', 99, '', '', '', 9999, 1, 'vi', 0, 1, ''),
(10, 18, 0, 'UHV 2.98', 'Bóng đá số 5 Comet UHV 2.98', 'bong-da-so-5-comet-uhv-298', 'bong_da_so_5_da_pu_uhv_2.98.jpg', 'Bóng thi đấu chính thức của giải Suzuki AFF 2014. Bóng chứng chỉ FIFA APPROVED, chứng chỉ cao nhất về chất lượng bóng trên toàn thế giới. Dòng: Professional', '', '330000', '330000', 0, 0, '2015-05-28 11:48:53', 99, '2015-05-28 12:07:52', 99, '', '', '', 9999, 1, 'vi', 0, 1, ''),
(11, 18, 0, '001-JG', 'Giày thể thao nam Mitre MT-001-JG xanh neon', 'giay-the-thao-nam-mitre-mt-001-jg-xanh-neon', 'giay-the-thao-nam-mitre-mt-001-jg-xanh01_0.jpg', '', '', '650000', '650000', 0, 0, '2015-05-29 03:25:23', 99, '2015-05-29 03:25:33', 99, '', '', '', 9999, 1, 'vi', 0, 1, ''),
(12, 18, 0, 'BB02', 'Bàn bóng bàn BB02', 'ban-bong-ban-bb02', 'bb02.jpg', '', '', '7000000', '7000000', 0, 0, '2015-05-29 03:31:57', 99, '2015-05-29 03:32:08', 99, '', '', '', 9999, 1, 'vi', 0, 1, ''),
(13, 18, 0, 'GGIDHS', 'Giầy Mitre ghi xanh nõn chuối', 'giay-mitre-ghi-xanh-non-chuoi', 'giay-the-thao-nam-mitre-mt-001-jg-xam.jpg', '', '', '650000', '650000', 0, 0, '2015-05-29 03:32:56', 99, NULL, NULL, '', '', '', 9999, 1, 'vi', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE IF NOT EXISTS `product_color` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `color_code` varchar(50) collate utf8_unicode_ci NOT NULL,
  `z_index` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `title`, `color_code`, `z_index`) VALUES
(2, 'Đen', '#424242', 9999),
(3, 'Trắng', '#FFFFFF', 9999),
(5, 'Xanh dương', '#146AFF', 9999),
(6, 'Hồng', '#F38AFF', 9999),
(7, 'Tím than nhạt', '#585696', 9999),
(8, 'Nõn chuối', '#DDFF8C', 9999),
(9, 'Vàng nâu', '#FFC663', 9999),
(10, 'Tím', '#7529E6', 9999),
(11, 'Đỏ', '#D42626', 9999),
(12, 'Vàng', '#FFF173', 9999),
(13, 'Nâu', '#755832', 9999),
(14, 'Xanh lục', '#147011', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `product_group`
--

CREATE TABLE IF NOT EXISTS `product_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) default NULL,
  `z_index` int(4) NOT NULL default '9999',
  `photo` varchar(500) NOT NULL,
  `is_active` tinyint(4) NOT NULL default '0',
  `seo_title` varchar(250) NOT NULL,
  `seo_description` varchar(250) NOT NULL,
  `seo_keyword` varchar(250) NOT NULL,
  `lang` char(2) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_group`
--

INSERT INTO `product_group` (`id`, `title`, `link`, `z_index`, `photo`, `is_active`, `seo_title`, `seo_description`, `seo_keyword`, `lang`, `lang_id`) VALUES
(1, 'Vảy nến', 'vay-nen', 9999, '', 1, '', '', '', 'vi', 0),
(2, 'Viêm da cơ địa', 'viem-da-co-dia', 9999, '', 1, '', '', '', 'vi', 0),
(3, 'Nám da', 'nam-da', 9999, '', 1, '', '', '', 'vi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_has_color`
--

CREATE TABLE IF NOT EXISTS `product_has_color` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=432 ;

--
-- Dumping data for table `product_has_color`
--

INSERT INTO `product_has_color` (`id`, `product_id`, `color_id`) VALUES
(228, 6, 2),
(229, 6, 13),
(230, 6, 12),
(231, 6, 11),
(232, 6, 10),
(233, 6, 9),
(234, 6, 8),
(235, 6, 7),
(236, 6, 6),
(237, 6, 5),
(238, 6, 3),
(239, 6, 14),
(240, 4, 2),
(241, 4, 13),
(242, 4, 12),
(243, 4, 11),
(244, 4, 10),
(245, 4, 9),
(246, 4, 8),
(247, 4, 7),
(248, 4, 6),
(249, 4, 5),
(250, 4, 3),
(251, 4, 14),
(264, 5, 2),
(265, 5, 13),
(266, 5, 12),
(267, 5, 11),
(268, 5, 10),
(269, 5, 9),
(270, 5, 8),
(271, 5, 7),
(272, 5, 6),
(273, 5, 5),
(274, 5, 3),
(275, 5, 14),
(276, 3, 2),
(277, 3, 13),
(278, 3, 12),
(279, 3, 11),
(280, 3, 10),
(281, 3, 9),
(282, 3, 8),
(283, 3, 7),
(284, 3, 6),
(285, 3, 5),
(286, 3, 3),
(287, 3, 14),
(312, 1, 2),
(313, 1, 13),
(314, 1, 12),
(315, 1, 11),
(316, 1, 10),
(317, 1, 9),
(318, 1, 8),
(319, 1, 7),
(320, 1, 6),
(321, 1, 5),
(322, 1, 3),
(323, 1, 14),
(326, 2, 13),
(327, 2, 11),
(391, 7, 10),
(392, 7, 5),
(393, 7, 3),
(397, 8, 2),
(398, 8, 8),
(399, 8, 14),
(416, 9, 12),
(417, 9, 8),
(418, 9, 3),
(419, 9, 14),
(424, 10, 12),
(425, 10, 5),
(428, 11, 8),
(429, 11, 5),
(431, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_has_material`
--

CREATE TABLE IF NOT EXISTS `product_has_material` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=77 ;

--
-- Dumping data for table `product_has_material`
--

INSERT INTO `product_has_material` (`id`, `product_id`, `material_id`) VALUES
(50, 6, 3),
(51, 6, 5),
(52, 6, 6),
(68, 8, 6),
(73, 9, 3),
(76, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_has_price`
--

CREATE TABLE IF NOT EXISTS `product_has_price` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_has_size`
--

CREATE TABLE IF NOT EXISTS `product_has_size` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=124 ;

--
-- Dumping data for table `product_has_size`
--

INSERT INTO `product_has_size` (`id`, `product_id`, `size_id`) VALUES
(58, 6, 3),
(59, 6, 5),
(60, 6, 6),
(61, 4, 3),
(62, 4, 5),
(63, 4, 6),
(67, 3, 3),
(68, 3, 5),
(69, 3, 6),
(70, 1, 3),
(71, 1, 5),
(72, 1, 6),
(73, 2, 3),
(74, 2, 5),
(75, 2, 6),
(109, 7, 6),
(110, 7, 3),
(111, 7, 5),
(118, 8, 7),
(119, 8, 6),
(120, 8, 8),
(121, 8, 3),
(122, 8, 5),
(123, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE IF NOT EXISTS `product_material` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `z_index` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`id`, `title`, `z_index`) VALUES
(3, 'PVC', 9999),
(5, 'PU - PVC', 9999),
(6, 'PU', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `product_photo`
--

CREATE TABLE IF NOT EXISTS `product_photo` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `z_index` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `product_photo`
--

INSERT INTO `product_photo` (`id`, `product_id`, `title`, `photo`, `z_index`) VALUES
(5, 8, '', 'den-002_2a43dec0-73fc-4878-69cc-d32fbcba7deb_medium.png', 9999),
(6, 8, '', 'den-002_c9758c0e-37de-42bd-7742-2327c1aaefb9_medium.png', 9999),
(7, 8, '', 'xanhvitdam-xanh-vit-dam4_medium.png', 9999),
(13, 10, '', 'bong_da_so_5_da_pu_uhv_2.98.jpg', 9999),
(19, 9, '', 'original-suzuki-aff-2014.jpg', 9999),
(16, 9, '', 'aff-suzuki-2014-ucv-3.814_1.jpg', 9999),
(15, 10, '', '2010032503063031pm.jpg', 9999),
(14, 10, '', 'bong_da_hoa_cb_4.81.jpg', 9999),
(18, 9, '', 'giay-the-thao-nam-mitre-mt-001-jg-xanh01_0.jpg', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE IF NOT EXISTS `product_price` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) collate utf8_unicode_ci NOT NULL,
  `from_val` float NOT NULL,
  `to_val` float NOT NULL,
  `z_index` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`id`, `title`, `from_val`, `to_val`, `z_index`) VALUES
(2, 'Trên 200.000 vnđ', 200000, 0, 9999),
(3, '150.000 vnđ - 200.000 vnđ', 150000, 200000, 9999),
(5, '50.000 vnđ - 150.000 vnđ', 50000, 150000, 9999),
(6, 'Dưới 50.000 vnđ', 0, 50000, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE IF NOT EXISTS `product_rating` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(500) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`id`, `subject`, `content`, `score`, `create_date`, `product_id`) VALUES
(20, 'Tốt', 'Tốt', 5, '2015-05-28 12:02:02', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `z_index` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `title`, `z_index`) VALUES
(3, 'XL', 3),
(5, 'XXL', 2),
(6, 'M', 5),
(7, 'S', 6),
(8, 'L', 4),
(9, 'XXXL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE IF NOT EXISTS `product_tag` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `id` bigint(20) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) default NULL,
  `z_index` int(4) NOT NULL default '9999',
  `parent_id` bigint(20) default NULL,
  `menu_type` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `content` longtext,
  `description` longtext,
  `is_active` tinyint(4) NOT NULL default '0',
  `link_to` varchar(500) NOT NULL,
  `is_menu` tinyint(4) NOT NULL default '0',
  `seo_title` varchar(250) NOT NULL,
  `seo_description` varchar(250) NOT NULL,
  `seo_keyword` varchar(250) NOT NULL,
  `lang` char(2) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `title`, `link`, `z_index`, `parent_id`, `menu_type`, `photo`, `thumb`, `content`, `description`, `is_active`, `link_to`, `is_menu`, `seo_title`, `seo_description`, `seo_keyword`, `lang`, `lang_id`) VALUES
(1, 'Bóng đá', 'bong-da', 9999, 0, 'dich-vu', '', 'm2.jpg', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(2, 'Bóng rổ', 'bong-ro', 9999, 0, 'dich-vu', '', 'm4.jpg', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(3, 'Bóng chuyền', 'bong-chuyen', 9999, 0, 'gioi-thieu', '', 'm3.jpg', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(4, 'Công trình thể thao', 'cong-trinh-the-thao', 9999, 0, 'tuyen-dung', '', 'm10.jpg', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(17, 'Bóng PU', 'bong-pu', 9999, 21, '', '', '', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(18, 'Bóng PVC', 'bong-pvc', 9999, 1, '', '', '', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(19, 'Bóng cao su', 'bong-cao-su', 9999, 1, '', '', '', '', NULL, 1, '', 0, '', '', '', 'vi', 0),
(20, 'Trượt băng', 'truot-bang', 9999, 0, '', '', 'm11.jpg', NULL, NULL, 1, '', 0, '', '', '', 'vi', 0),
(21, 'Bóng bàn', 'bong-ban', 9999, 0, '', '', 'm14.jpg', NULL, NULL, 1, '', 0, '', '', '', 'vi', 0),
(22, 'Tennis', 'tennis', 9999, 0, '', '', 'm7.jpg', NULL, NULL, 1, '', 0, '', '', '', 'vi', 0),
(23, 'Cầu lông', 'cau-long', 9999, 0, '', '', 'm6.jpg', NULL, NULL, 1, '', 0, '', '', '', 'vi', 0),
(24, 'Bóng ném', 'bong-nem', 9999, 0, '', '', 'm5.jpg', NULL, NULL, 1, '', 0, '', '', '', 'vi', 0),
(25, 'Bóng rổ con 1', 'bong-ro-con-1', 9999, 2, '', '', '', NULL, NULL, 1, '', 0, '', '', '', 'vi', 0),
(26, 'Bóng rổ con 2', 'bong-ro-con-2', 9999, 2, '', '', '', NULL, NULL, 1, '', 0, '', '', '', 'vi', 0),
(28, 'Bóng chuyền con 1', 'bong-chuyen-con-1', 9999, 3, '', '', '', NULL, NULL, 1, '', 0, '', '', '', 'vi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL auto_increment,
  `Code` varchar(5) default NULL,
  `title` varchar(100) character set utf8 default NULL,
  `Zone_Id` int(11) default NULL,
  `EcoZone_Id` int(11) default NULL,
  `Position` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `Code`, `title`, `Zone_Id`, `EcoZone_Id`, `Position`) VALUES
(37, '320', 'Hải Dương', 1, 0, 5),
(36, '241', 'Bắc Ninh', 1, 0, 3),
(35, '211', 'Vĩnh Phúc', 1, 2, 2),
(34, '36', 'Thái Bình', 1, 0, 8),
(33, '33', 'Quảng Ninh', 1, 0, 4),
(32, '31', 'Hải Phòng', 1, 0, 6),
(31, '30', 'Ninh Bình', 1, 0, 11),
(30, '04', 'Hà Nội', 1, 2, 1),
(38, '321', 'Hưng Yên', 1, 0, 7),
(39, '350', 'Nam Định', 1, 0, 10),
(40, '351', 'Hà Nam', 1, 0, 9),
(41, '39', 'Hà Tĩnh', 6, 0, 28),
(42, '38', 'Nghệ an', 6, 0, 27),
(43, '52', 'Quảng Bình', 6, 0, 29),
(44, '53', 'Quảng Trị', 6, 0, 30),
(45, '37', 'Thanh Hóa', 6, 0, 26),
(46, '54', 'Thừa Thiên Huế', 6, 0, 31),
(47, '76', 'An Giang', 10, 0, 57),
(48, '781', 'Bạc Liêu', 10, 0, 62),
(49, '75', 'Bến Tre', 10, 0, 53),
(50, '780', 'Cà Mau', 10, 3, 63),
(51, '67', 'Đồng Tháp', 10, 0, 56),
(52, '711', 'Hậu Giang', 10, 0, 60),
(53, '77', 'Kiên Giang', 10, 0, 58),
(54, '72', 'Long An', 10, 0, 51),
(55, '79', 'Sóc Trăng', 10, 0, 61),
(56, '73', 'Tiền Giang', 10, 0, 52),
(57, '74', 'Trà Vinh', 10, 0, 54),
(58, '70', 'Vĩnh Long', 10, 0, 55),
(59, '64', 'Bà Rịa - Vũng Tàu', 9, 0, 49),
(60, '650', 'Bình Dương', 9, 0, 47),
(61, '651', 'Bình Phước', 9, 0, 45),
(62, '61', 'Đồng Nai', 9, 0, 48),
(63, '66', 'Tây Ninh', 9, 0, 46),
(64, '8', 'TP. Hồ Chí Minh', 9, 0, 50),
(65, '56', 'Bình Định', 8, 0, 35),
(66, '62', 'Bình Thuận', 8, 0, 39),
(67, '511', 'Đà Nẵng', 8, 0, 32),
(68, '58', 'Khánh Hòa', 8, 0, 37),
(69, '57', 'Phú Yên', 8, 0, 36),
(70, '510', 'Quảng Nam', 8, 0, 33),
(71, '55', 'Quảng Ngãi', 8, 0, 34),
(72, '500', 'Đắc Lak', 7, 0, 42),
(73, '501', 'Đắc Nông', 7, 0, 43),
(74, '59', 'Gia Lai', 7, 0, 41),
(75, '60', 'Kon Tum', 7, 0, 40),
(76, '63', 'Lâm Đồng', 7, 0, 44),
(77, '281', 'Bắc Cạn', 4, 0, 14),
(78, '240', 'Bắc Giang', 4, 0, 20),
(79, '26', 'Cao Bằng', 4, 0, 13),
(80, '230', 'Điện Biên', 4, 0, 22),
(81, '219', 'Hà Giang', 4, 0, 12),
(82, '218', 'Hòa Bình', 4, 0, 25),
(83, '231', 'Lai Châu', 4, 0, 23),
(84, '25', 'Lạng Sơn', 4, 0, 19),
(85, '210', 'Phú Thọ', 4, 0, 21),
(86, '22', 'Sơn La', 4, 0, 24),
(87, '27', 'Tuyên Quang', 4, 0, 15),
(88, '280', 'Thái Nguyên', 4, 0, 18),
(89, '29', 'Yên Bái', 4, 0, 17),
(90, '20', 'Lào Cai', 4, 0, 16),
(91, '68', 'Ninh Thuận', 8, 0, 38),
(92, '71', 'Cần Thơ', 10, 0, 59),
(1, '84', 'Nước ngoài', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `link` varchar(500) collate utf8_unicode_ci NOT NULL,
  `z_index` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `title`, `link`, `z_index`) VALUES
(1, 'Miền Nam', 'mien-nam', 9999),
(2, 'Miền Trung', 'mien-trung', 9999),
(3, 'Miền Bắc', 'mien-bac', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `register_contact`
--

CREATE TABLE IF NOT EXISTS `register_contact` (
  `id` bigint(20) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(100) default NULL,
  `message` text,
  `create_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `register_contact`
--

INSERT INTO `register_contact` (`id`, `email`, `fullname`, `phone`, `message`, `create_date`) VALUES
(26, 'ngotuanhung2003@gmail.com', '', NULL, NULL, '2015-05-19 11:01:27'),
(27, 'ngotuanhung2003@gmail.com.vn', '', NULL, NULL, '2015-05-27 09:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `showroom`
--

CREATE TABLE IF NOT EXISTS `showroom` (
  `id` int(11) NOT NULL auto_increment,
  `region_id` int(11) NOT NULL,
  `title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `link` varchar(500) collate utf8_unicode_ci NOT NULL,
  `z_index` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL default '0',
  `thumb` varchar(500) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `address` varchar(250) collate utf8_unicode_ci NOT NULL,
  `email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `hotline` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `showroom`
--

INSERT INTO `showroom` (`id`, `region_id`, `title`, `link`, `z_index`, `is_active`, `thumb`, `content`, `address`, `email`, `hotline`) VALUES
(1, 3, 'Số 4 Hàng Cháo - Hà Nội', 'so-4-hang-chao-ha-noi', 9999, 1, 'Untitled-1.jpg', '<p style="text-align: center;"><img alt="Mat tien sieu thi so 4 Hang Chao.jpg" src="http://www.dongluc.vn/admin/Images/Upload/Mat%20tien%20sieu%20thi%20so%204%20Hang%20Chao.jpg" style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:medium; height:440px; line-height:normal; text-align:-webkit-center; width:500px" /><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:medium">Địa chỉ: Số 4 Hàng Cháo - Hà Nội</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:medium">Diện tích 400m2</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:medium">Điện thoại: 04. 3734 7693</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:medium">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fax: 04. 3734 7693</span><br />\r\n<br />\r\n<img alt="DSC_0148.jpg" src="http://www.dongluc.vn/admin/Images/Upload/DSC_0148.jpg" style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:medium; height:335px; line-height:normal; text-align:-webkit-center; width:500px" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n<img alt="Nguoi mau.jpg" src="http://www.dongluc.vn/admin/Images/Upload/Nguoi%20mau.jpg" style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:medium; height:729px; line-height:normal; text-align:-webkit-center; width:500px" /><br />\r\n<br />\r\n<br />\r\n<img alt="VDV.jpg" src="http://www.dongluc.vn/admin/Images/Upload/VDV.jpg" style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:medium; height:555px; line-height:normal; text-align:-webkit-center; width:418px" /></p>\r\n', 'Số 4 Hàng Cháo - Hà Nội', 'so4hangchao@dongluc.vn', '04.3734 7693'),
(2, 3, '157K Nguyễn Thái Học - Hà Nội', '157k-nguyen-thai-hoc-ha-noi', 9999, 1, 'Untitled-1.jpg', '<div align="center"><span style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:medium"><img alt="Sua.jpg" src="http://www.dongluc.vn/admin/Images/Upload/157/Sua.jpg" style="height:677px; width:500px" /><br />\r\n<br />\r\n<br />\r\n<img alt="IMG_1743.jpg" src="http://www.dongluc.vn/admin/Images/Upload/157/IMG_1743.jpg" style="height:375px; width:500px" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n<img alt="IMG_1744.jpg" src="http://www.dongluc.vn/admin/Images/Upload/157/IMG_1744.jpg" style="height:375px; width:500px" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n<img alt="IMG_1745.jpg" src="http://www.dongluc.vn/admin/Images/Upload/157/IMG_1745.jpg" style="height:375px; width:500px" /><br />\r\n<br />\r\n<br />\r\n<img alt="IMG_1750.jpg" src="http://www.dongluc.vn/admin/Images/Upload/157/IMG_1750.jpg" style="height:375px; width:500px" /><br />\r\n<br />\r\n<br />\r\n<img alt="IMG_1753.jpg" src="http://www.dongluc.vn/admin/Images/Upload/157/IMG_1753.jpg" style="height:375px; width:500px" /><br />\r\n<br />\r\n<br />\r\n<img alt="IMG_1754.jpg" src="http://www.dongluc.vn/admin/Images/Upload/157/IMG_1754.jpg" style="height:375px; width:500px" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n<img alt="IMG_1756.jpg" src="http://www.dongluc.vn/admin/Images/Upload/157/IMG_1756.jpg" style="height:375px; width:500px" /></span></div>\r\n', '157K Nguyễn Thái Học - Hà Nội', '157thaihoc@dongluc.vn', '3733 3447');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(500) collate utf8_unicode_ci NOT NULL,
  `title_jp` varchar(250) collate utf8_unicode_ci default NULL,
  `link` varchar(500) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `photo` varchar(250) collate utf8_unicode_ci NOT NULL,
  `z_index` int(11) NOT NULL default '9999',
  `menu_level` int(11) NOT NULL default '1',
  `lang` char(2) collate utf8_unicode_ci NOT NULL,
  `lang_id` int(11) NOT NULL,
  `seo_title` varchar(250) collate utf8_unicode_ci NOT NULL,
  `seo_description` varchar(250) collate utf8_unicode_ci NOT NULL,
  `seo_keyword` varchar(250) collate utf8_unicode_ci NOT NULL,
  `is_menu` tinyint(4) NOT NULL default '0',
  `is_active` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `title`, `title_jp`, `link`, `content`, `photo`, `z_index`, `menu_level`, `lang`, `lang_id`, `seo_title`, `seo_description`, `seo_keyword`, `is_menu`, `is_active`) VALUES
(1, 'Khám phá Nhật Bản', '日本紹介', 'kham-pha-nhat-ban', '<div>&nbsp;</div>\r\n\r\n<div>\r\n<p style="text-align:justify"><span style="color:rgb(105, 105, 105)"><span style="font-size:14px">Giải&nbsp;pháp Dr Michaels là sản phẩm của gần 30 năm nghiên cứu khoa học và thực hành lâm sàng, dựa trên việc sử dụng kết hợp các thành phần thảo dược chiết xuất từ thiên nhiên, hoàn toàn không chứa bất kỳ thành phần Steroid hoặc Cortisone nào.</span></span></p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify"><span style="color:rgb(105, 105, 105)"><span style="font-size:14px">Giải pháp&nbsp;của chúng tôi đã được đánh giá độc lập trên tại nhiều bệnh viện, trung tâm&nbsp;và phòng khám da liễu&nbsp;trên khắp thế giới;&nbsp;được ứng&nbsp;dụng thành công cho&nbsp;hàng trăm ngàn&nbsp;người&nbsp;trên khắp nước Úc và châu Âu với kết quả xuất sắc lên đến 90%.</span></span></p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify"><span style="color:rgb(105, 105, 105)"><span style="font-size:14px">Chúng tôi sẽ&nbsp;giúp bạn kiểm soát và&nbsp;cải thiện tình trạng da một cách an toàn và hiệu quả, bằng cách áp dụng những kinh nghiệm trong suốt 30 năm qua kết hợp với&nbsp;các nghiên cứu y học mới nhất và theo các nguyên tắc khoa học.</span></span></p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify"><span style="color:rgb(105, 105, 105)"><span style="font-size:14px">Khi tình trạng da của bạn đã&nbsp;được kiểm soát tốt, bạn sẽ không còn cảm giác khó chịu&nbsp;và cảm thấy khỏe mạnh, ngủ tốt hơn và có thể tận hưởng cuộc sống một cách&nbsp;đầy đủ.</span></span></p>\r\n</div>\r\n\r\n<div>&nbsp;</div>\r\n', '', 2, 2, 'vi', 0, '', '', '', 1, 1),
(3, 'Tài liệu tiếng Nhật', '日本語教材', 'tai-lieu-tieng-nhat', '', '', 1, 1, 'vi', 0, '', '', '', 1, 1),
(4, 'Du học Nhật Bản', '日本留学', 'du-hoc-nhat-ban', '', '', 4, 1, 'vi', 0, '', '', '', 1, 1),
(5, 'Khóa học tiếng Nhật', '日本語コース', 'khoa-hoc-tieng-nhat', '', '', 5, 1, 'vi', 0, '', '', '', 1, 1),
(6, 'Doanh nghiệp', '日系企業の方へ', 'doanh-nghiep', '', '', 3, 1, 'vi', 0, '', '', '', 1, 1),
(7, 'Cao học', '大学院', 'cao-hoc', '', '', 1, 1, 'vi', 0, '', '', '', 0, 1),
(8, 'Trường chuyên ngành', '専門学校', 'truong-chuyen-nganh', '', '', 2, 1, 'vi', 0, '', '', '', 0, 1),
(9, 'Đại học - Cao đẳng', '大学・短期大学', 'dai-hoc-cao-dang', '', '', 3, 1, 'vi', 0, '', '', '', 0, 1),
(10, 'Trường Nhật Ngữ', '日本語学校', 'truong-nhat-ngu', '', '', 4, 1, 'vi', 0, '', '', '', 0, 1),
(11, 'Giới thiệu PLC', '学校紹介', 'gioi-thieu-plc', '', '', 9999, 1, 'vi', 0, '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `username` varchar(100) collate utf8_unicode_ci default NULL,
  `password` varchar(100) collate utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `address` varchar(255) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(100) collate utf8_unicode_ci NOT NULL,
  `company` varchar(100) collate utf8_unicode_ci NOT NULL,
  `is_status` tinyint(4) NOT NULL,
  `create_date` datetime NOT NULL,
  `birthday` date default NULL,
  `gender` int(11) default NULL,
  `province` varchar(250) collate utf8_unicode_ci default NULL,
  `user_type_id` int(11) default NULL,
  `is_active` int(11) default '0',
  `avatar` varchar(250) collate utf8_unicode_ci default NULL,
  `session_id` varchar(250) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=101 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `address`, `phone`, `company`, `is_status`, `create_date`, `birthday`, `gender`, `province`, `user_type_id`, `is_active`, `avatar`, `session_id`) VALUES
(99, 'root', 'cad427178cbe4751f8effc8eb07984c26e7adc77', '', '', '', '', '', 1, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 1, NULL, 'm7l0ssqvr61g222s8neheugh87'),
(1, 'admin', '358ee5b6fbe127dd5847bcedd4e4cd0b827b3e4a', 'Dong Luc Group', 'hung.ngo@netlink.vn', 'Ha noi', '0946880488', '', 1, '2013-10-08 14:27:31', NULL, NULL, NULL, 1, 1, '333_blog_image.jpg', 'ud4nn57erdq72c2mbqe4hbuic3'),
(100, '', 'c33fae282eeb283e3cbc117ee6da5266ae58bc1d', 'Ngô Tuấn Hùng', 'ngotuanhung2003@gmail.com', 'Tân Mai Hoàng Mai Hà Nội', '0946880488', '', 1, '2015-05-17 05:04:39', NULL, NULL, 'Hà Nội', 2, 1, NULL, '23u34g34lb28jt649sak6unq00');

-- --------------------------------------------------------

--
-- Table structure for table `user_email`
--

CREATE TABLE IF NOT EXISTS `user_email` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_email`
--

INSERT INTO `user_email` (`id`, `email`) VALUES
(1, 'ngotuanhung2003@gmail.com'),
(2, 'root@textlink.vn'),
(3, 'support@textlink.vn'),
(4, 'fsdsdfsd'),
(5, 'hung.ngo@netlink.vn');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `action` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=753 ;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `user_id`, `create_date`, `action`) VALUES
(1, 1, '2013-09-19 22:17:25', '??ng xu?t thành công'),
(2, 1, '2013-09-19 22:44:15', '??ng nh?p thành công'),
(3, 1, '2013-09-22 21:27:22', '??ng xu?t thành công'),
(4, 1, '2013-09-22 21:27:33', '??ng nh?p thành công'),
(5, 1, '2013-09-22 21:31:11', '??ng xu?t thành công'),
(6, 1, '2013-09-22 21:31:22', '??ng nh?p thành công'),
(7, 1, '2013-09-22 21:33:13', '??ng xu?t thành công'),
(8, 1, '2013-09-22 21:33:20', '??ng nh?p thành công'),
(9, 1, '2013-09-22 21:33:33', '??ng xu?t thành công'),
(10, 2, '2013-09-22 21:33:37', '??ng nh?p thành công'),
(11, 2, '2013-09-22 21:33:46', '??ng xu?t thành công'),
(12, 1, '2013-09-22 21:33:50', '??ng nh?p thành công'),
(13, 1, '2013-09-22 21:34:20', '??ng xu?t thành công'),
(14, 2, '2013-09-22 21:34:24', '??ng nh?p thành công'),
(15, 2, '2013-09-22 21:46:02', '??ng xu?t thành công'),
(16, 1, '2013-09-22 21:47:55', '??ng nh?p thành công'),
(17, 1, '2013-09-22 21:48:18', '??ng xu?t thành công'),
(18, 1, '2013-09-22 21:51:22', '??ng nh?p thành công'),
(19, 1, '2013-09-22 21:51:35', '??ng xu?t thành công'),
(20, 2, '2013-09-22 21:53:17', '??ng nh?p thành công'),
(21, 2, '2013-09-22 21:53:30', '??ng xu?t thành công'),
(22, 2, '2013-09-22 21:53:36', '??ng nh?p thành công'),
(23, 2, '2013-09-22 21:53:50', '??ng xu?t thành công'),
(24, 2, '2013-09-22 21:54:05', '??ng nh?p thành công'),
(25, 2, '2013-09-22 21:54:08', '??ng xu?t thành công'),
(26, 1, '2013-09-22 22:32:11', '??ng nh?p thành công'),
(27, 1, '2013-09-23 01:24:13', '??ng xu?t thành công'),
(28, 1, '2013-09-23 01:24:22', '??ng nh?p thành công'),
(29, 1, '2013-09-23 09:26:16', '??ng nh?p thành công'),
(30, 1, '2013-09-23 09:35:34', '??ng xu?t thành công'),
(31, 1, '2013-09-23 09:37:05', '??ng nh?p thành công'),
(32, 1, '2013-09-26 12:28:30', '??ng nh?p thành công'),
(33, 2, '2013-09-26 18:35:24', '??ng nh?p thành công'),
(34, 2, '2013-09-27 06:18:08', '??ng xu?t thành công'),
(35, 1, '2013-09-27 06:18:39', '??ng nh?p thành công'),
(36, 1, '2013-09-28 11:21:15', '??ng nh?p thành công'),
(37, 1, '2013-09-29 13:39:42', '??ng nh?p thành công'),
(38, 1, '2013-09-29 14:32:29', '??ng nh?p thành công'),
(39, 1, '2013-09-29 15:11:05', '??ng nh?p thành công'),
(40, 1, '2013-09-29 21:47:04', '??ng nh?p thành công'),
(41, 2, '2013-09-30 14:22:17', '??ng nh?p thành công'),
(42, 1, '2013-10-01 11:10:43', '??ng nh?p thành công'),
(43, 1, '2013-10-01 22:17:30', '??ng nh?p thành công'),
(44, 2, '2013-10-01 22:17:46', '??ng nh?p thành công'),
(45, 2, '2013-10-01 22:19:18', '??ng nh?p thành công'),
(46, 2, '2013-10-01 22:27:12', '??ng nh?p thành công'),
(47, 2, '2013-10-01 23:31:07', '??ng xu?t thành công'),
(48, 2, '2013-10-01 23:35:55', '??ng nh?p thành công'),
(49, 2, '2013-10-01 23:35:58', '??ng xu?t thành công'),
(50, 2, '2013-10-01 23:36:08', '??ng nh?p thành công'),
(51, 2, '2013-10-01 23:36:19', '??ng xu?t thành công'),
(52, 2, '2013-10-01 23:36:26', '??ng nh?p thành công'),
(53, 2, '2013-10-01 23:38:10', '??ng xu?t thành công'),
(54, 2, '2013-10-01 23:38:37', '??ng nh?p thành công'),
(55, 2, '2013-10-02 10:24:40', '??ng xu?t thành công'),
(56, 2, '2013-10-02 10:43:46', '??ng nh?p thành công'),
(57, 2, '2013-10-02 14:49:43', '??ng nh?p thành công'),
(58, 2, '2013-10-02 14:51:29', '??ng xu?t thành công'),
(59, 2, '2013-10-02 14:51:41', '??ng nh?p thành công'),
(60, 11, '2013-10-03 12:01:46', '??ng xu?t thành công'),
(61, 1, '2013-10-04 15:17:08', '??ng nh?p thành công'),
(62, 1, '2013-10-04 15:17:28', '??ng xu?t thành công'),
(63, 1, '2013-10-04 15:17:32', '??ng nh?p thành công'),
(64, 1, '2013-10-05 09:45:06', '??ng nh?p thành công'),
(65, 2, '2013-10-05 16:43:45', '??ng nh?p thành công'),
(66, 2, '2013-10-05 17:15:07', '??ng nh?p thành công'),
(67, 2, '2013-10-05 17:20:24', '??ng xu?t thành công'),
(68, 1, '2013-10-05 17:21:15', '??ng nh?p thành công'),
(69, 1, '2013-10-05 17:33:59', '??ng xu?t thành công'),
(70, 4, '2013-10-08 21:33:53', '??ng nh?p thành công'),
(71, 4, '2013-10-08 21:35:54', '??ng nh?p thành công'),
(72, 2, '2013-10-08 21:39:55', '??ng nh?p thành công'),
(73, 2, '2013-10-08 21:47:33', '??ng xu?t thành công'),
(74, 1, '2013-10-09 09:33:26', '??ng nh?p thành công'),
(75, 2, '2013-10-10 09:31:51', '??ng nh?p thành công'),
(76, 2, '2013-10-10 10:13:51', '??ng xu?t thành công'),
(77, 4, '2013-10-10 15:43:08', '??ng nh?p thành công'),
(78, 2, '2013-10-10 19:41:37', '??ng nh?p thành công'),
(79, 4, '2013-10-10 20:22:49', '??ng nh?p thành công'),
(80, 2, '2013-10-10 20:31:16', '??ng xu?t thành công'),
(81, 4, '2013-10-10 20:31:30', '??ng xu?t thành công'),
(82, 2, '2013-10-10 20:35:28', '??ng nh?p thành công'),
(83, 2, '2013-10-10 20:35:57', '??ng xu?t thành công'),
(84, 2, '2013-10-10 20:36:15', '??ng nh?p thành công'),
(85, 1, '2013-10-11 14:07:00', '??ng nh?p thành công'),
(86, 2, '2013-10-12 20:46:20', '??ng nh?p thành công'),
(87, 4, '2013-10-13 08:50:41', '??ng nh?p thành công'),
(88, 4, '2013-10-13 08:54:07', '??ng xu?t thành công'),
(89, 2, '2013-10-13 08:54:24', '??ng xu?t thành công'),
(90, 2, '2013-10-14 16:40:40', '??ng nh?p thành công'),
(91, 2, '2013-10-14 17:21:57', '??ng xu?t thành công'),
(92, 2, '2013-10-15 11:12:28', '??ng nh?p thành công'),
(93, 4, '2013-10-15 13:32:34', '??ng nh?p thành công'),
(94, 2, '2013-10-15 14:08:45', '??ng xu?t thành công'),
(95, 2, '2013-10-16 00:13:45', '??ng nh?p thành công'),
(96, 2, '2013-10-16 01:34:49', '??ng xu?t thành công'),
(97, 2, '2013-10-16 09:02:28', '??ng nh?p thành công'),
(98, 2, '2013-10-16 11:28:08', '??ng xu?t thành công'),
(99, 2, '2013-10-16 14:17:58', '??ng nh?p thành công'),
(100, 2, '2013-10-16 15:05:27', '??ng xu?t thành công'),
(101, 2, '2013-10-17 09:23:54', '??ng nh?p thành công'),
(102, 2, '2013-10-17 14:51:36', '??ng xu?t thành công'),
(103, 2, '2013-10-17 22:10:25', '??ng nh?p thành công'),
(104, 2, '2013-10-17 22:44:59', '??ng xu?t thành công'),
(105, 2, '2013-10-18 09:26:31', '??ng nh?p thành công'),
(106, 2, '2013-10-18 11:45:57', '??ng xu?t thành công'),
(107, 2, '2013-10-18 14:34:17', '??ng nh?p thành công'),
(108, 2, '2013-10-18 14:41:55', '??ng nh?p thành công'),
(109, 2, '2013-10-18 15:18:21', '??ng xu?t thành công'),
(110, 2, '2013-10-18 17:52:27', '??ng xu?t thành công'),
(111, 2, '2013-10-19 08:31:13', '??ng nh?p thành công'),
(112, 2, '2013-10-19 10:39:38', '??ng xu?t thành công'),
(113, 2, '2013-10-19 14:26:00', '??ng nh?p thành công'),
(114, 2, '2013-10-20 10:39:42', '??ng nh?p thành công'),
(115, 2, '2013-10-20 18:24:55', '??ng xu?t thành công'),
(116, 2, '2013-10-22 13:09:34', '??ng nh?p thành công'),
(117, 2, '2013-10-22 13:18:30', '??ng xu?t thành công'),
(118, 2, '2013-10-22 16:02:44', '??ng nh?p thành công'),
(119, 2, '2013-10-22 16:26:37', '??ng nh?p thành công'),
(120, 2, '2013-10-22 17:32:34', '??ng xu?t thành công'),
(121, 2, '2013-10-22 22:44:09', '??ng nh?p thành công'),
(122, 2, '2013-10-22 23:31:25', '??ng xu?t thành công'),
(123, 2, '2013-10-23 09:52:42', '??ng nh?p thành công'),
(124, 2, '2013-10-23 13:06:43', '??ng nh?p thành công'),
(125, 2, '2013-10-23 14:57:32', '??ng xu?t thành công'),
(126, 2, '2013-10-23 20:16:20', '??ng nh?p thành công'),
(127, 2, '2013-10-24 01:01:18', '??ng xu?t thành công'),
(128, 2, '2013-10-24 09:17:01', '??ng nh?p thành công'),
(129, 2, '2013-10-24 09:18:59', '??ng nh?p thành công'),
(130, 2, '2013-10-24 16:38:00', '??ng nh?p thành công'),
(131, 2, '2013-10-24 17:30:24', '??ng xu?t thành công'),
(132, 2, '2013-10-25 15:18:05', '??ng nh?p thành công'),
(133, 2, '2013-10-25 17:04:34', '??ng nh?p thành công'),
(134, 2, '2013-10-25 17:31:43', '??ng xu?t thành công'),
(135, 2, '2013-10-26 09:07:04', '??ng nh?p thành công'),
(136, 2, '2013-10-26 10:36:19', '??ng xu?t thành công'),
(137, 2, '2013-10-28 08:57:50', '??ng nh?p thành công'),
(138, 2, '2013-10-28 09:46:01', '??ng nh?p thành công'),
(139, 2, '2013-10-28 10:14:14', '??ng nh?p thành công'),
(140, 2, '2013-10-28 11:13:34', '??ng nh?p thành công'),
(141, 2, '2013-10-28 12:56:01', '??ng nh?p thành công'),
(142, 2, '2013-10-28 17:32:32', '??ng xu?t thành công'),
(143, 2, '2013-10-28 20:37:29', '??ng nh?p thành công'),
(144, 4, '2013-10-28 20:39:17', '??ng nh?p thành công'),
(145, 2, '2013-10-29 08:22:47', '??ng nh?p thành công'),
(146, 2, '2013-10-29 09:20:35', '??ng xu?t thành công'),
(147, 1, '2013-10-29 09:20:43', '??ng nh?p thành công'),
(148, 2, '2013-10-29 14:32:59', '??ng nh?p thành công'),
(149, 1, '2013-10-29 15:53:14', '??ng nh?p thành công'),
(150, 2, '2013-10-29 17:27:46', '??ng xu?t thành công'),
(151, 2, '2013-10-29 20:47:17', '??ng nh?p thành công'),
(152, 2, '2013-10-29 23:32:31', '??ng xu?t thành công'),
(153, 2, '2013-10-30 13:43:08', '??ng nh?p thành công'),
(154, 2, '2013-10-30 17:14:24', '??ng xu?t thành công'),
(155, 2, '2013-10-31 10:19:56', '??ng nh?p thành công'),
(156, 2, '2013-10-31 10:23:32', '??ng xu?t thành công'),
(157, 2, '2013-10-31 12:55:31', '??ng nh?p thành công'),
(158, 2, '2013-10-31 15:27:38', '??ng xu?t thành công'),
(159, 2, '2013-10-31 20:12:52', '??ng nh?p thành công'),
(160, 2, '2013-10-31 20:13:37', '??ng nh?p thành công'),
(161, 1, '2013-10-31 20:28:48', '??ng nh?p thành công'),
(162, 2, '2013-10-31 22:15:05', '??ng nh?p thành công'),
(163, 4, '2013-10-31 22:20:44', '??ng nh?p thành công'),
(164, 4, '2013-10-31 22:25:35', '??ng xu?t thành công'),
(165, 2, '2013-10-31 23:03:40', '??ng xu?t thành công'),
(166, 2, '2013-11-01 11:38:43', '??ng nh?p thành công'),
(167, 2, '2013-11-01 13:45:42', '??ng xu?t thành công'),
(168, 2, '2013-11-01 17:09:25', '??ng nh?p thành công'),
(169, 2, '2013-11-01 17:34:25', '??ng xu?t thành công'),
(170, 2, '2013-11-02 14:07:27', '??ng nh?p thành công'),
(171, 2, '2013-11-02 17:33:51', '??ng xu?t thành công'),
(172, 2, '2013-11-03 15:50:13', '??ng nh?p thành công'),
(173, 2, '2013-11-05 15:26:01', '??ng nh?p thành công'),
(174, 2, '2013-11-05 17:27:58', '??ng xu?t thành công'),
(175, 2, '2013-11-05 22:39:05', '??ng nh?p thành công'),
(176, 2, '2013-11-06 00:18:46', '??ng xu?t thành công'),
(177, 2, '2013-11-06 12:55:48', '??ng nh?p thành công'),
(178, 1, '2013-11-06 13:08:00', '??ng nh?p thành công'),
(179, 2, '2013-11-06 14:05:09', '??ng xu?t thành công'),
(180, 2, '2013-11-06 16:45:08', '??ng nh?p thành công'),
(181, 2, '2013-11-06 17:18:44', '??ng xu?t thành công'),
(182, 2, '2013-11-07 15:21:28', '??ng nh?p thành công'),
(183, 2, '2013-11-07 15:33:19', '??ng xu?t thành công'),
(184, 2, '2013-11-10 14:14:10', '??ng nh?p thành công'),
(185, 4, '2013-11-10 14:22:52', '??ng nh?p thành công'),
(186, 4, '2013-11-10 14:23:22', '??ng xu?t thành công'),
(187, 2, '2013-11-10 16:25:30', '??ng xu?t thành công'),
(188, 2, '2013-11-12 08:45:43', '??ng nh?p thành công'),
(189, 2, '2013-11-12 09:39:55', '??ng xu?t thành công'),
(190, 4, '2013-11-14 08:23:26', '??ng nh?p thành công'),
(191, 1, '2013-11-14 21:39:27', '??ng nh?p thành công'),
(192, 2, '2013-11-15 09:22:25', '??ng nh?p thành công'),
(193, 2, '2013-11-18 14:46:05', '??ng nh?p thành công'),
(194, 2, '2013-11-18 17:50:51', '??ng xu?t thành công'),
(195, 2, '2013-11-19 08:28:45', '??ng nh?p thành công'),
(196, 2, '2013-11-19 10:14:47', '??ng xu?t thành công'),
(197, 2, '2013-11-21 15:56:51', '??ng nh?p thành công'),
(198, 2, '2013-11-21 17:30:35', '??ng xu?t thành công'),
(199, 2, '2013-11-27 09:06:27', '??ng nh?p thành công'),
(200, 2, '2013-11-27 09:42:45', '??ng xu?t thành công'),
(201, 2, '2013-12-07 10:32:17', '??ng nh?p thành công'),
(202, 2, '2013-12-07 13:08:24', '??ng xu?t thành công'),
(203, 2, '2013-12-11 21:22:43', '??ng nh?p thành công'),
(204, 2, '2013-12-11 21:37:32', '??ng nh?p thành công'),
(205, 4, '2013-12-17 15:54:39', '??ng nh?p thành công'),
(206, 2, '2013-12-20 14:00:49', '??ng nh?p thành công'),
(207, 2, '2013-12-20 14:09:47', '??ng xu?t thành công'),
(208, 2, '2013-12-26 14:44:26', '??ng nh?p thành công'),
(209, 4, '2013-12-26 15:28:24', '??ng nh?p thành công'),
(210, 2, '2013-12-26 16:15:55', '??ng xu?t thành công'),
(211, 2, '2013-12-30 10:42:24', '??ng nh?p thành công'),
(212, 2, '2013-12-30 11:35:05', '??ng xu?t thành công'),
(213, 2, '2013-12-30 22:26:06', '??ng nh?p thành công'),
(214, 2, '2013-12-31 00:15:04', '??ng xu?t thành công'),
(215, 2, '2014-01-02 20:02:52', '??ng nh?p thành công'),
(216, 1, '2014-01-03 23:08:11', '??ng nh?p thành công'),
(217, 2, '2014-01-05 16:13:06', '??ng nh?p thành công'),
(218, 2, '2014-01-06 19:08:52', '??ng nh?p thành công'),
(219, 1, '2014-01-07 14:37:41', '??ng nh?p thành công'),
(220, 2, '2014-01-07 15:23:11', '??ng nh?p thành công'),
(221, 2, '2014-01-07 17:30:31', '??ng xu?t thành công'),
(222, 2, '2014-01-07 22:07:49', '??ng nh?p thành công'),
(223, 2, '2014-01-08 00:52:02', '??ng xu?t thành công'),
(224, 2, '2014-01-08 09:56:26', '??ng nh?p thành công'),
(225, 2, '2014-01-08 20:44:07', '??ng nh?p thành công'),
(226, 2, '2014-01-09 00:47:42', '??ng xu?t thành công'),
(227, 2, '2014-01-09 10:07:46', '??ng nh?p thành công'),
(228, 2, '2014-01-09 16:51:40', '??ng xu?t thành công'),
(229, 1, '2014-01-09 17:00:45', '??ng nh?p thành công'),
(230, 2, '2014-01-09 17:05:53', '??ng nh?p thành công'),
(231, 2, '2014-01-09 17:31:22', '??ng xu?t thành công'),
(232, 2, '2014-01-09 23:08:06', '??ng nh?p thành công'),
(233, 2, '2014-01-10 13:27:22', '??ng nh?p thành công'),
(234, 2, '2014-01-10 17:25:56', '??ng xu?t thành công'),
(235, 2, '2014-01-10 19:59:30', '??ng nh?p thành công'),
(236, 2, '2014-01-10 23:20:04', '??ng xu?t thành công'),
(237, 2, '2014-01-10 23:22:41', '??ng nh?p thành công'),
(238, 2, '2014-01-10 23:26:32', '??ng xu?t thành công'),
(239, 2, '2014-01-11 09:11:25', '??ng nh?p thành công'),
(240, 2, '2014-01-11 11:56:57', '??ng xu?t thành công'),
(241, 2, '2014-01-12 14:34:44', '??ng nh?p thành công'),
(242, 2, '2014-01-12 16:53:49', '??ng xu?t thành công'),
(243, 2, '2014-01-12 22:17:06', '??ng nh?p thành công'),
(244, 2, '2014-01-12 23:49:28', '??ng xu?t thành công'),
(245, 2, '2014-01-13 09:04:42', '??ng nh?p thành công'),
(246, 4, '2014-01-13 10:27:01', '??ng nh?p thành công'),
(247, 4, '2014-01-13 10:29:23', '??ng nh?p thành công'),
(248, 2, '2014-01-13 14:17:20', '??ng xu?t thành công'),
(249, 2, '2014-01-20 11:11:27', '??ng nh?p thành công'),
(250, 2, '2014-01-20 22:20:10', '??ng nh?p thành công'),
(251, 2, '2014-01-20 23:51:07', '??ng xu?t thành công'),
(252, 2, '2014-01-21 09:40:03', '??ng nh?p thành công'),
(253, 2, '2014-01-21 10:11:59', '??ng xu?t thành công'),
(254, 2, '2014-01-22 09:30:05', '??ng nh?p thành công'),
(255, 2, '2014-01-22 10:41:31', '??ng xu?t thành công'),
(256, 2, '2014-01-23 14:01:18', '??ng nh?p thành công'),
(257, 2, '2014-02-04 13:27:51', '??ng nh?p thành công'),
(258, 2, '2014-02-05 23:06:27', '??ng nh?p thành công'),
(259, 2, '2014-02-05 23:46:18', '??ng xu?t thành công'),
(260, 2, '2014-02-06 13:25:25', '??ng nh?p thành công'),
(261, 2, '2014-02-06 17:16:05', '??ng xu?t thành công'),
(262, 2, '2014-02-06 23:06:56', '??ng nh?p thành công'),
(263, 2, '2014-02-07 00:58:51', '??ng xu?t thành công'),
(264, 2, '2014-02-07 16:14:13', '??ng nh?p thành công'),
(265, 2, '2014-02-07 17:27:42', '??ng xu?t thành công'),
(266, 2, '2014-02-07 20:07:12', '??ng nh?p thành công'),
(267, 2, '2014-02-07 23:47:57', '??ng xu?t thành công'),
(268, 2, '2014-02-08 18:01:54', '??ng nh?p thành công'),
(269, 2, '2014-02-08 19:35:41', '??ng xu?t thành công'),
(270, 2, '2014-02-09 22:52:10', '??ng nh?p thành công'),
(271, 2, '2014-02-10 15:57:24', '??ng nh?p thành công'),
(272, 2, '2014-02-10 15:59:39', '??ng nh?p thành công'),
(273, 2, '2014-02-10 16:01:37', '??ng nh?p thành công'),
(274, 2, '2014-02-10 21:41:40', '??ng nh?p thành công'),
(275, 2, '2014-02-10 21:41:44', '??ng nh?p thành công'),
(276, 2, '2014-02-11 00:16:44', '??ng xu?t thành công'),
(277, 2, '2014-02-11 08:27:05', '??ng nh?p thành công'),
(278, 2, '2014-02-11 23:19:24', '??ng nh?p thành công'),
(279, 2, '2014-02-12 00:18:37', '??ng xu?t thành công'),
(280, 2, '2014-02-12 08:33:48', '??ng nh?p thành công'),
(281, 2, '2014-02-12 15:46:53', '??ng xu?t thành công'),
(282, 2, '2014-02-12 22:20:39', '??ng nh?p thành công'),
(283, 2, '2014-02-12 22:40:46', '??ng xu?t thành công'),
(284, 2, '2014-02-16 21:52:16', '??ng nh?p thành công'),
(285, 2, '2014-02-16 22:32:01', '??ng xu?t thành công'),
(286, 2, '2014-02-16 22:33:11', '??ng nh?p thành công'),
(287, 2, '2014-02-17 12:54:35', '??ng nh?p thành công'),
(288, 2, '2014-02-17 17:26:04', '??ng xu?t thành công'),
(289, 2, '2014-02-17 20:28:10', '??ng nh?p thành công'),
(290, 2, '2014-02-17 23:46:24', '??ng xu?t thành công'),
(291, 2, '2014-02-18 09:25:23', '??ng nh?p thành công'),
(292, 2, '2014-02-18 11:56:22', '??ng xu?t thành công'),
(293, 2, '2014-02-18 14:03:12', '??ng nh?p thành công'),
(294, 2, '2014-02-18 15:17:50', '??ng xu?t thành công'),
(295, 2, '2014-02-19 11:15:55', '??ng nh?p thành công'),
(296, 2, '2014-02-19 16:12:16', '??ng nh?p thành công'),
(297, 2, '2014-02-19 17:20:06', '??ng xu?t thành công'),
(298, 2, '2014-02-19 21:58:04', '??ng nh?p thành công'),
(299, 2, '2014-02-20 17:12:59', '??ng nh?p thành công'),
(300, 2, '2014-02-20 17:22:02', '??ng xu?t thành công'),
(301, 2, '2014-02-20 22:41:25', '??ng nh?p thành công'),
(302, 2, '2014-02-20 23:59:40', '??ng xu?t thành công'),
(303, 2, '2014-02-21 08:31:43', '??ng nh?p thành công'),
(304, 2, '2014-02-21 15:38:17', '??ng xu?t thành công'),
(305, 2, '2014-02-21 22:17:33', '??ng nh?p thành công'),
(306, 2, '2014-02-21 23:13:46', '??ng xu?t thành công'),
(307, 2, '2014-02-24 09:23:10', '??ng nh?p thành công'),
(308, 2, '2014-02-24 09:23:42', '??ng xu?t thành công'),
(309, 2, '2014-02-24 15:16:40', '??ng nh?p thành công'),
(310, 2, '2014-02-24 15:35:17', '??ng xu?t thành công'),
(311, 2, '2014-02-26 10:52:47', '??ng nh?p thành công'),
(312, 2, '2014-02-26 14:05:47', '??ng xu?t thành công'),
(313, 2, '2014-02-26 15:25:59', '??ng nh?p thành công'),
(314, 2, '2014-02-26 17:16:01', '??ng xu?t thành công'),
(315, 2, '2014-03-01 09:24:17', '??ng nh?p thành công'),
(316, 2, '2014-03-01 10:43:41', '??ng xu?t thành công'),
(317, 2, '2014-03-01 17:25:40', '??ng nh?p thành công'),
(318, 2, '2014-03-01 17:27:09', '??ng xu?t thành công'),
(319, 2, '2014-03-01 22:00:11', '??ng nh?p thành công'),
(320, 2, '2014-03-03 09:05:09', '??ng nh?p thành công'),
(321, 2, '2014-03-03 13:36:14', '??ng xu?t thành công'),
(322, 2, '2014-03-03 21:58:59', '??ng nh?p thành công'),
(323, 2, '2014-03-04 11:26:25', '??ng nh?p thành công'),
(324, 2, '2014-03-04 22:26:54', '??ng nh?p thành công'),
(325, 2, '2014-03-04 23:24:50', '??ng xu?t thành công'),
(326, 2, '2014-03-05 10:31:47', '??ng nh?p thành công'),
(327, 2, '2014-03-05 10:36:42', '??ng nh?p thành công'),
(328, 2, '2014-03-05 15:25:33', '??ng nh?p thành công'),
(329, 2, '2014-03-05 15:29:36', '??ng nh?p thành công'),
(330, 2, '2014-03-05 16:57:30', '??ng xu?t thành công'),
(331, 2, '2014-03-05 22:45:35', '??ng nh?p thành công'),
(332, 2, '2014-03-06 00:04:43', '??ng xu?t thành công'),
(333, 2, '2014-03-06 11:08:38', '??ng nh?p thành công'),
(334, 2, '2014-03-06 11:36:11', '??ng xu?t thành công'),
(335, 2, '2014-03-06 11:38:06', '??ng nh?p thành công'),
(336, 4, '2014-03-06 16:38:16', '??ng nh?p thành công'),
(337, 2, '2014-03-06 16:41:15', '??ng nh?p thành công'),
(338, 2, '2014-03-06 17:14:29', '??ng xu?t thành công'),
(339, 2, '2014-03-07 08:57:15', '??ng nh?p thành công'),
(340, 2, '2014-03-07 17:29:24', '??ng xu?t thành công'),
(341, 1, '2014-03-09 15:40:00', '??ng nh?p thành công'),
(342, 9, '2014-03-09 17:12:27', '??ng nh?p thành công'),
(343, 2, '2014-03-09 21:39:10', '??ng nh?p thành công'),
(344, 2, '2014-03-09 22:48:19', '??ng xu?t thành công'),
(345, 1, '2014-03-09 23:53:56', '??ng nh?p thành công'),
(346, 9, '2014-03-10 00:46:49', '??ng nh?p thành công'),
(347, 1, '2014-03-10 14:00:55', '??ng nh?p thành công'),
(348, 1, '2014-03-10 14:02:50', '??ng xu?t thành công'),
(349, 4, '2014-03-10 14:02:55', '??ng nh?p thành công'),
(350, 4, '2014-03-10 14:04:09', '??ng nh?p thành công'),
(351, 1, '2014-03-10 21:23:39', '??ng nh?p thành công'),
(352, 9, '2014-03-10 21:23:55', '??ng nh?p thành công'),
(353, 4, '2014-03-11 08:43:23', '??ng nh?p thành công'),
(354, 4, '2014-03-11 09:23:38', '??ng xu?t thành công'),
(355, 4, '2014-03-11 16:47:53', '??ng nh?p thành công'),
(356, 4, '2014-03-11 16:48:52', '??ng xu?t thành công'),
(357, 4, '2014-03-12 16:14:17', '??ng nh?p thành công'),
(358, 4, '2014-03-12 16:55:56', '??ng xu?t thành công'),
(359, 9, '2014-03-12 21:29:16', '??ng nh?p thành công'),
(360, 1, '2014-03-12 21:29:34', '??ng nh?p thành công'),
(361, 9, '2014-03-13 09:20:26', '??ng nh?p thành công'),
(362, 1, '2014-03-13 09:21:18', '??ng nh?p thành công'),
(363, 4, '2014-03-13 13:22:28', '??ng nh?p thành công'),
(364, 4, '2014-03-13 13:25:35', '??ng xu?t thành công'),
(365, 9, '2014-03-13 13:33:49', '??ng xu?t thành công'),
(366, 4, '2014-03-13 13:35:58', '??ng nh?p thành công'),
(367, 4, '2014-03-13 13:40:42', '??ng nh?p thành công'),
(368, 4, '2014-03-13 14:15:30', '??ng xu?t thành công'),
(369, 1, '2014-03-15 03:38:51', '??ng nh?p thành công'),
(370, 4, '2014-03-17 15:32:13', '??ng nh?p thành công'),
(371, 4, '2014-03-17 17:25:20', '??ng xu?t thành công'),
(372, 4, '2014-03-18 15:06:03', '??ng nh?p thành công'),
(373, 4, '2014-03-18 15:45:08', '??ng nh?p thành công'),
(374, 4, '2014-03-18 17:17:37', '??ng xu?t thành công'),
(375, 4, '2014-03-18 22:06:25', '??ng nh?p thành công'),
(376, 4, '2014-03-19 00:00:17', '??ng xu?t thành công'),
(377, 4, '2014-03-19 08:45:57', '??ng nh?p thành công'),
(378, 4, '2014-03-19 15:17:14', '??ng xu?t thành công'),
(379, 4, '2014-03-20 22:42:52', '??ng nh?p thành công'),
(380, 4, '2014-03-20 23:52:39', '??ng xu?t thành công'),
(381, 4, '2014-03-21 10:19:19', '??ng nh?p thành công'),
(382, 4, '2014-03-21 17:01:58', '??ng xu?t thành công'),
(383, 4, '2014-03-23 20:28:46', '??ng nh?p thành công'),
(384, 4, '2014-03-23 20:58:19', '??ng xu?t thành công'),
(385, 4, '2014-03-24 15:30:37', '??ng nh?p thành công'),
(386, 4, '2014-03-24 21:22:33', '??ng nh?p thành công'),
(387, 4, '2014-03-24 21:23:14', '??ng nh?p thành công'),
(388, 4, '2014-03-25 09:50:07', '??ng nh?p thành công'),
(389, 4, '2014-03-25 20:55:48', '??ng nh?p thành công'),
(390, 4, '2014-03-25 23:29:49', '??ng xu?t thành công'),
(391, 4, '2014-03-26 10:39:06', '??ng nh?p thành công'),
(392, 4, '2014-03-26 16:49:51', '??ng xu?t thành công'),
(393, 4, '2014-03-27 16:29:06', '??ng nh?p thành công'),
(394, 4, '2014-03-27 16:33:19', '??ng xu?t thành công'),
(395, 4, '2014-03-28 14:26:51', '??ng nh?p thành công'),
(396, 4, '2014-03-30 21:50:22', '??ng nh?p thành công'),
(397, 4, '2014-03-30 21:52:09', '??ng xu?t thành công'),
(398, 4, '2014-03-31 14:01:48', '??ng nh?p thành công'),
(399, 4, '2014-03-31 17:04:25', '??ng xu?t thành công'),
(400, 4, '2014-04-01 21:10:10', '??ng nh?p thành công'),
(401, 4, '2014-04-01 22:59:00', '??ng xu?t thành công'),
(402, 4, '2014-04-02 11:33:48', '??ng nh?p thành công'),
(403, 4, '2014-04-03 09:39:10', '??ng nh?p thành công'),
(404, 4, '2014-04-04 15:49:22', '??ng nh?p thành công'),
(405, 4, '2014-04-04 15:50:43', '??ng xu?t thành công'),
(406, 4, '2014-04-05 10:10:57', '??ng nh?p thành công'),
(407, 4, '2014-04-05 11:05:37', '??ng xu?t thành công'),
(408, 4, '2014-04-05 17:09:07', '??ng nh?p thành công'),
(409, 4, '2014-04-05 17:09:15', '??ng xu?t thành công'),
(410, 4, '2014-04-05 19:01:05', '??ng nh?p thành công'),
(411, 4, '2014-04-05 22:20:32', '??ng nh?p thành công'),
(412, 1, '2014-04-06 16:04:25', '??ng nh?p thành công'),
(413, 9, '2014-04-06 16:05:35', '??ng nh?p thành công'),
(414, 4, '2014-04-06 19:45:47', '??ng nh?p thành công'),
(415, 4, '2014-04-06 19:56:58', '??ng xu?t thành công'),
(416, 4, '2014-04-06 21:12:05', '??ng nh?p thành công'),
(417, 4, '2014-04-07 09:42:17', '??ng nh?p thành công'),
(418, 4, '2014-04-07 11:42:03', '??ng nh?p thành công'),
(419, 4, '2014-04-07 13:25:51', '??ng xu?t thành công'),
(420, 4, '2014-04-07 15:40:03', '??ng nh?p thành công'),
(421, 4, '2014-04-07 17:31:54', '??ng xu?t thành công'),
(422, 4, '2014-04-07 22:32:32', '??ng nh?p thành công'),
(423, 4, '2014-04-08 00:00:21', '??ng xu?t thành công'),
(424, 4, '2014-04-08 11:07:47', '??ng nh?p thành công'),
(425, 4, '2014-04-08 11:45:29', '??ng nh?p thành công'),
(426, 4, '2014-04-08 14:04:04', '??ng nh?p thành công'),
(427, 4, '2014-04-08 14:37:23', '??ng xu?t thành công'),
(428, 4, '2014-04-08 16:15:37', '??ng nh?p thành công'),
(429, 4, '2014-04-08 17:01:59', '??ng xu?t thành công'),
(430, 4, '2014-04-08 23:43:46', '??ng nh?p thành công'),
(431, 4, '2014-04-08 23:45:00', '??ng xu?t thành công'),
(432, 4, '2014-04-09 09:22:45', '??ng nh?p thành công'),
(433, 4, '2014-04-09 09:37:05', '??ng xu?t thành công'),
(434, 4, '2014-04-09 10:14:19', '??ng nh?p thành công'),
(435, 4, '2014-04-09 22:54:31', '??ng nh?p thành công'),
(436, 4, '2014-04-10 08:33:37', '??ng nh?p thành công'),
(437, 4, '2014-04-10 11:18:02', '??ng xu?t thành công'),
(438, 4, '2014-04-10 22:29:46', '??ng nh?p thành công'),
(439, 4, '2014-04-10 22:32:13', '??ng xu?t thành công'),
(440, 4, '2014-04-11 13:27:42', '??ng nh?p thành công'),
(441, 4, '2014-04-11 15:00:34', '??ng xu?t thành công'),
(442, 4, '2014-04-11 19:54:01', '??ng nh?p thành công'),
(443, 4, '2014-04-11 21:53:35', '??ng xu?t thành công'),
(444, 1, '2014-04-12 10:29:51', '??ng nh?p thành công'),
(445, 4, '2014-04-12 15:06:33', '??ng nh?p thành công'),
(446, 4, '2014-04-12 15:39:23', '??ng xu?t thành công'),
(447, 4, '2014-04-13 14:26:38', '??ng nh?p thành công'),
(448, 2025, '2014-04-14 11:12:48', '??ng xu?t thành công'),
(449, 1, '2014-04-14 13:33:36', '??ng nh?p thành công'),
(450, 1, '2014-04-15 07:56:45', '??ng nh?p thành công'),
(451, 1, '2014-04-15 13:49:08', '??ng nh?p thành công'),
(452, 1, '2014-04-15 14:25:27', '??ng xu?t thành công'),
(453, 4, '2014-04-15 14:25:31', '??ng nh?p thành công'),
(454, 4, '2014-04-15 14:25:39', '??ng xu?t thành công'),
(455, 1, '2014-04-15 14:25:43', '??ng nh?p thành công'),
(456, 1, '2014-04-17 08:08:28', '??ng nh?p thành công'),
(457, 1, '2014-04-18 08:48:20', '??ng nh?p thành công'),
(458, 1, '2014-04-19 07:54:08', '??ng nh?p thành công'),
(459, 1, '2014-04-20 09:22:29', '??ng nh?p thành công'),
(460, 1, '2014-04-20 16:04:53', '??ng xu?t thành công'),
(461, 99, '2014-04-20 16:05:02', '??ng nh?p thành công'),
(462, 99, '2014-04-20 16:05:31', '??ng xu?t thành công'),
(463, 1, '2014-04-20 16:05:44', '??ng nh?p thành công'),
(464, 1, '2014-04-20 16:05:49', '??ng xu?t thành công'),
(465, 5, '2014-04-20 16:05:54', '??ng nh?p thành công'),
(466, 5, '2014-04-20 16:06:23', '??ng xu?t thành công'),
(467, 5, '2014-04-20 16:06:28', '??ng nh?p thành công'),
(468, 5, '2014-04-20 16:06:33', '??ng xu?t thành công'),
(469, 5, '2014-04-20 16:06:43', '??ng nh?p thành công'),
(470, 5, '2014-04-20 16:06:56', '??ng xu?t thành công'),
(471, 99, '2014-04-20 16:06:59', '??ng nh?p thành công'),
(472, 99, '2014-04-21 08:20:05', '??ng nh?p thành công'),
(473, 99, '2014-04-23 18:34:59', '??ng nh?p thành công'),
(474, 99, '2014-04-23 18:38:56', '??ng xu?t thành công'),
(475, 99, '2014-04-23 18:39:12', '??ng nh?p thành công'),
(476, 99, '2014-04-23 18:39:35', '??ng xu?t thành công'),
(477, 1, '2014-04-23 18:39:39', '??ng nh?p thành công'),
(478, 1, '2014-04-24 08:42:01', '??ng nh?p thành công'),
(479, 1, '2014-04-24 08:44:37', '??ng nh?p thành công'),
(480, 1, '2014-04-24 12:57:36', '??ng xu?t thành công'),
(481, 1, '2014-04-24 12:59:41', '??ng nh?p thành công'),
(482, 1, '2014-04-24 14:10:39', '??ng nh?p thành công'),
(483, 1, '2014-04-24 14:11:11', '??ng nh?p thành công'),
(484, 1, '2014-04-24 14:16:28', '??ng xu?t thành công'),
(485, 5, '2014-04-24 14:16:34', '??ng nh?p thành công'),
(486, 1, '2014-04-24 23:03:47', '??ng nh?p thành công'),
(487, 1, '2014-04-25 11:58:22', '??ng nh?p thành công'),
(488, 1, '2014-04-25 12:18:50', '??ng nh?p thành công'),
(489, 1, '2014-04-25 19:53:01', '??ng nh?p thành công'),
(490, 1, '2014-04-26 10:27:48', '??ng nh?p thành công'),
(491, 1, '2014-04-26 12:04:29', '??ng nh?p thành công'),
(492, 1, '2014-04-27 10:34:37', '??ng nh?p thành công'),
(493, 99, '2014-04-27 20:16:01', '??ng nh?p thành công'),
(494, 99, '2014-04-29 10:45:56', '??ng nh?p thành công'),
(495, 99, '2014-04-29 11:14:06', '??ng nh?p thành công'),
(496, 1, '2014-04-29 11:27:56', '??ng nh?p thành công'),
(497, 99, '2014-04-29 11:48:45', '??ng xu?t thành công'),
(498, 99, '2014-04-29 11:48:57', '??ng nh?p thành công'),
(499, 1, '2014-04-29 13:28:31', '??ng nh?p thành công'),
(500, 1, '2014-04-29 13:29:24', '??ng xu?t thành công'),
(501, 1, '2014-04-29 13:29:35', '??ng nh?p thành công'),
(502, 5, '2014-04-29 13:39:53', '??ng nh?p thành công'),
(503, 1, '2014-04-29 15:19:03', '??ng nh?p thành công'),
(504, 1, '2014-04-29 15:40:08', '??ng nh?p thành công'),
(505, 1, '2014-04-29 17:01:05', '??ng nh?p thành công'),
(506, 5, '2014-04-29 18:22:43', '??ng nh?p thành công'),
(507, 1, '2014-04-29 21:27:57', '??ng nh?p thành công'),
(508, 5, '2014-04-30 10:23:35', '??ng nh?p thành công'),
(509, 1, '2014-04-30 10:29:14', '??ng nh?p thành công'),
(510, 6, '2014-04-30 10:31:20', '??ng nh?p thành công'),
(511, 5, '2014-04-30 13:23:56', '??ng nh?p thành công'),
(512, 5, '2014-04-30 16:12:39', '??ng nh?p thành công'),
(513, 1, '2014-04-30 23:37:30', '??ng nh?p thành công'),
(514, 99, '2014-05-01 10:08:56', '??ng nh?p thành công'),
(515, 99, '2014-05-01 12:18:36', '??ng xu?t thành công'),
(516, 99, '2014-05-01 12:22:39', '??ng nh?p thành công'),
(517, 99, '2014-05-01 12:27:55', '??ng xu?t thành công'),
(518, 99, '2014-05-01 12:27:58', '??ng nh?p thành công'),
(519, 99, '2014-05-01 12:28:26', '??ng xu?t thành công'),
(520, 99, '2014-05-01 15:03:29', '??ng nh?p thành công'),
(521, 99, '2014-05-01 15:03:30', '??ng nh?p thành công'),
(522, 99, '2014-05-01 22:50:19', '??ng nh?p thành công'),
(523, 99, '2014-05-02 11:21:11', '??ng nh?p thành công'),
(524, 99, '2014-05-02 12:22:22', '??ng nh?p thành công'),
(525, 99, '2014-05-02 12:22:50', '??ng nh?p thành công'),
(526, 99, '2014-05-02 21:50:22', '??ng nh?p thành công'),
(527, 99, '2014-05-03 10:19:50', '??ng nh?p thành công'),
(528, 99, '2014-05-03 17:12:53', '??ng nh?p thành công'),
(529, 99, '2014-05-04 11:36:10', '??ng nh?p thành công'),
(530, 99, '2014-05-05 08:52:39', '??ng nh?p thành công'),
(531, 99, '2014-05-05 13:59:01', '??ng xu?t thành công'),
(532, 1, '2014-05-05 13:59:06', '??ng nh?p thành công'),
(533, 99, '2014-05-06 18:19:39', '??ng nh?p thành công'),
(534, 99, '2014-05-09 09:38:26', '??ng nh?p thành công'),
(535, 99, '2014-05-09 11:50:33', '??ng xu?t thành công'),
(536, 1, '2014-05-09 11:50:39', '??ng nh?p thành công'),
(537, 1, '2014-05-09 11:52:50', '??ng xu?t thành công'),
(538, 99, '2014-05-09 11:52:54', '??ng nh?p thành công'),
(539, 99, '2014-05-09 11:56:23', '??ng xu?t thành công'),
(540, 99, '2014-05-09 11:57:14', '??ng nh?p thành công'),
(541, 99, '2014-05-09 11:57:37', '??ng xu?t thành công'),
(542, 1, '2014-05-09 11:57:42', '??ng nh?p thành công'),
(543, 1, '2014-05-09 11:59:35', '??ng xu?t thành công'),
(544, 1, '2014-05-09 11:59:46', '??ng nh?p thành công'),
(545, 1, '2014-05-09 12:00:14', '??ng xu?t thành công'),
(546, 1, '2014-05-09 12:00:27', '??ng nh?p thành công'),
(547, 99, '2014-05-09 12:04:48', '??ng xu?t thành công'),
(548, 1, '2014-05-09 12:04:53', '??ng nh?p thành công'),
(549, 1, '2014-05-09 13:39:08', '??ng xu?t thành công'),
(550, 1, '2014-05-09 13:39:29', '??ng nh?p thành công'),
(551, 1, '2014-05-09 13:39:39', '??ng xu?t thành công'),
(552, 1, '2014-05-09 13:39:46', '??ng nh?p thành công'),
(553, 1, '2014-05-09 13:44:34', '??ng nh?p thành công'),
(554, 1, '2014-05-09 14:47:33', '??ng nh?p thành công'),
(555, 99, '2014-05-12 00:29:16', '??ng nh?p thành công'),
(556, 99, '2014-05-12 08:10:40', '??ng nh?p thành công'),
(557, 1, '2014-05-12 09:30:21', '??ng nh?p thành công'),
(558, 1, '2014-05-12 09:32:27', '??ng xu?t thành công'),
(559, 1, '2014-05-12 09:35:28', '??ng nh?p thành công'),
(560, 1, '2014-05-12 09:40:10', '??ng nh?p thành công'),
(561, 1, '2014-05-12 09:45:47', '??ng xu?t thành công'),
(562, 1, '2014-05-12 09:46:49', '??ng nh?p thành công'),
(563, 1, '2014-05-12 09:49:49', '??ng xu?t thành công'),
(564, 99, '2014-05-16 08:09:11', '??ng nh?p thành công'),
(565, 99, '2014-05-16 13:42:55', '??ng xu?t thành công'),
(566, 1, '2014-05-16 13:43:04', '??ng nh?p thành công'),
(567, 1, '2014-05-16 13:44:43', '??ng xu?t thành công'),
(568, 99, '2014-05-16 13:44:47', '??ng nh?p thành công'),
(569, 99, '2014-05-17 08:45:35', '??ng nh?p thành công'),
(570, 99, '2014-05-17 14:41:06', '??ng nh?p thành công'),
(571, 2025, '2014-06-04 10:35:51', '??ng xu?t thành công'),
(572, 99, '2014-06-04 10:36:47', '??ng nh?p thành công'),
(573, 99, '2014-06-04 10:37:31', '??ng xu?t thành công'),
(574, 99, '2014-06-04 10:43:15', '??ng nh?p thành công'),
(575, 99, '2014-06-04 10:45:59', '??ng xu?t thành công'),
(576, 1, '2014-06-04 10:46:03', '??ng nh?p thành công'),
(577, 1, '2014-06-04 10:46:54', '??ng xu?t thành công'),
(578, 99, '2014-06-04 10:47:04', '??ng nh?p thành công'),
(579, 99, '2014-06-06 08:00:50', '??ng nh?p thành công'),
(580, 99, '2014-06-07 08:21:25', '??ng nh?p thành công'),
(581, 99, '2014-06-07 22:12:15', '??ng nh?p thành công'),
(582, 99, '2014-06-09 07:45:04', '??ng nh?p thành công'),
(583, 99, '2014-06-09 08:45:03', '??ng xu?t thành công'),
(584, 1, '2014-06-09 08:45:08', '??ng nh?p thành công'),
(585, 1, '2014-06-09 09:58:03', '??ng nh?p thành công'),
(586, 99, '2014-06-09 14:56:44', '??ng nh?p thành công'),
(587, 1, '2014-06-10 09:28:44', '??ng nh?p thành công'),
(588, 99, '2014-06-13 08:30:48', '??ng nh?p thành công'),
(589, 1, '2014-06-13 10:08:40', '??ng nh?p thành công'),
(590, 1, '2014-06-13 10:24:37', '??ng nh?p thành công'),
(591, 1, '2014-06-13 13:11:07', '??ng nh?p thành công'),
(592, 1, '2014-06-13 20:29:07', '??ng nh?p thành công'),
(593, 1, '2014-06-14 05:12:43', '??ng nh?p thành công'),
(594, 1, '2014-06-14 08:41:09', '??ng nh?p thành công'),
(595, 1, '2014-06-14 17:24:33', '??ng nh?p thành công'),
(596, 1, '2014-06-14 19:04:35', '??ng nh?p thành công'),
(597, 1, '2014-06-15 08:25:45', '??ng nh?p thành công'),
(598, 99, '2014-06-15 09:22:05', '??ng nh?p thành công'),
(599, 1, '2014-06-15 14:12:48', '??ng nh?p thành công'),
(600, 99, '2014-06-15 22:15:47', '??ng nh?p thành công'),
(601, 99, '2014-06-16 07:39:02', '??ng nh?p thành công'),
(602, 1, '2014-06-16 09:50:30', '??ng nh?p thành công'),
(603, 1, '2014-06-16 17:28:20', '??ng nh?p thành công'),
(604, 99, '2014-06-16 22:37:56', '??ng nh?p thành công'),
(605, 99, '2014-07-07 08:40:15', '??ng nh?p thành công'),
(606, 2025, '2014-07-08 10:29:37', '??ng xu?t thành công'),
(607, 99, '2014-08-12 16:43:19', '??ng nh?p thành công'),
(608, 99, '2014-10-22 09:07:39', '??ng nh?p thành công'),
(609, 99, '2014-11-14 10:15:07', '??ng nh?p thành công'),
(610, 99, '2014-11-14 10:15:57', '??ng xu?t thành công'),
(611, 99, '2014-11-14 10:16:01', '??ng nh?p thành công'),
(612, 99, '2014-11-14 10:26:54', '??ng xu?t thành công'),
(613, 1, '2014-11-14 10:27:04', '??ng nh?p thành công'),
(614, 1, '2014-11-14 10:27:10', '??ng xu?t thành công'),
(615, 99, '2014-11-14 10:27:17', '??ng nh?p thành công'),
(616, 99, '2014-11-15 08:47:27', '??ng nh?p thành công'),
(617, 99, '2014-11-17 08:56:29', '??ng nh?p thành công'),
(618, 99, '2014-11-18 08:50:22', '??ng nh?p thành công'),
(619, 99, '2014-11-19 09:11:33', '??ng nh?p thành công'),
(620, 99, '2014-11-20 09:50:09', '??ng nh?p thành công'),
(621, 99, '2014-11-21 11:48:03', '??ng nh?p thành công'),
(622, 99, '2014-11-21 14:36:58', '??ng xu?t thành công'),
(623, 1, '2014-11-21 14:37:04', '??ng nh?p thành công'),
(624, 1, '2014-11-21 14:39:43', '??ng xu?t thành công'),
(625, 99, '2014-11-21 14:39:47', '??ng nh?p thành công'),
(626, 99, '2014-11-24 16:58:05', '??ng nh?p thành công'),
(627, 99, '2014-11-25 15:10:09', '??ng nh?p thành công'),
(628, 99, '2014-12-02 13:56:15', '??ng nh?p thành công'),
(629, 99, '2014-12-03 09:30:05', '??ng nh?p thành công'),
(630, 99, '2014-12-04 16:37:54', '??ng nh?p thành công'),
(631, 99, '2014-12-05 09:02:56', '??ng nh?p thành công'),
(632, 99, '2014-12-05 14:20:02', '??ng xu?t thành công'),
(633, 1, '2014-12-05 14:20:09', '??ng nh?p thành công'),
(634, 1, '2014-12-05 14:20:48', '??ng xu?t thành công'),
(635, 99, '2014-12-05 14:21:02', '??ng nh?p thành công'),
(636, 99, '2014-12-06 10:02:27', '??ng nh?p thành công'),
(637, 99, '2015-03-05 10:07:01', '??ng nh?p thành công'),
(638, 99, '2015-03-05 10:07:14', '??ng xu?t thành công'),
(639, 1, '2015-03-05 10:07:22', '??ng nh?p thành công'),
(640, 1, '2015-03-05 10:07:27', '??ng xu?t thành công'),
(641, 99, '2015-03-05 10:07:31', '??ng nh?p thành công'),
(642, 99, '2015-03-05 10:14:19', '??ng nh?p thành công'),
(643, 99, '2015-03-06 08:56:46', '??ng nh?p thành công'),
(644, 1, '2015-03-06 09:22:45', '??ng nh?p thành công'),
(645, 99, '2015-03-06 16:26:34', '??ng nh?p thành công'),
(646, 99, '2015-03-07 09:08:45', '??ng nh?p thành công'),
(647, 99, '2015-03-08 11:08:45', '??ng nh?p thành công'),
(648, 99, '2015-03-09 09:18:34', '??ng nh?p thành công'),
(649, 99, '2015-03-19 09:00:04', '??ng nh?p thành công'),
(650, 99, '2015-03-20 09:53:33', '??ng nh?p thành công'),
(651, 99, '2015-03-21 14:11:57', '??ng nh?p thành công'),
(652, 1, '2015-03-21 14:15:58', '??ng nh?p thành công'),
(653, 99, '2015-03-22 14:11:54', '??ng nh?p thành công'),
(654, 99, '2015-03-22 21:58:00', '??ng nh?p thành công'),
(655, 1, '2015-03-22 21:58:05', '??ng nh?p thành công'),
(656, 1, '2015-03-22 22:02:57', '??ng xu?t thành công'),
(657, 1, '2015-03-22 22:03:07', '??ng nh?p thành công'),
(658, 1, '2015-03-23 12:29:35', '??ng nh?p thành công'),
(659, 1, '2015-03-23 12:35:19', '??ng nh?p thành công'),
(660, 1, '2015-03-23 13:08:48', '??ng nh?p thành công'),
(661, 1, '2015-03-23 14:03:26', '??ng nh?p thành công'),
(662, 1, '2015-03-23 14:17:46', '??ng nh?p thành công'),
(663, 1, '2015-03-23 14:20:33', '??ng nh?p thành công'),
(664, 1, '2015-03-23 16:26:32', '??ng nh?p thành công'),
(665, 1, '2015-03-23 16:33:37', '??ng nh?p thành công'),
(666, 1, '2015-03-23 18:13:13', '??ng nh?p thành công'),
(667, 1, '2015-03-25 11:44:26', '??ng nh?p thành công'),
(668, 1, '2015-03-25 11:44:41', '??ng nh?p thành công'),
(669, 1, '2015-03-25 11:56:16', '??ng nh?p thành công'),
(670, 1, '2015-03-25 16:20:25', '??ng nh?p thành công'),
(671, 1, '2015-03-25 16:51:21', '??ng xu?t thành công'),
(672, 99, '2015-03-25 16:51:29', '??ng nh?p thành công'),
(673, 1, '2015-03-25 17:11:59', '??ng nh?p thành công'),
(674, 1, '2015-03-26 13:31:17', '??ng nh?p thành công'),
(675, 1, '2015-03-26 13:33:16', '??ng nh?p thành công'),
(676, 99, '2015-03-26 13:48:21', '??ng nh?p thành công'),
(677, 1, '2015-03-26 14:14:16', '??ng nh?p thành công'),
(678, 1, '2015-03-26 15:23:58', '??ng nh?p thành công'),
(679, 99, '2015-03-26 15:56:08', '??ng nh?p thành công'),
(680, 1, '2015-03-26 15:56:57', '??ng nh?p thành công'),
(681, 1, '2015-03-27 08:37:46', '??ng nh?p thành công'),
(682, 1, '2015-03-27 08:39:12', '??ng nh?p thành công'),
(683, 1, '2015-03-27 09:51:32', '??ng nh?p thành công'),
(684, 1, '2015-03-27 10:05:24', '??ng nh?p thành công'),
(685, 1, '2015-03-27 10:07:02', '??ng nh?p thành công'),
(686, 1, '2015-03-27 17:14:55', '??ng nh?p thành công'),
(687, 1, '2015-03-28 09:14:23', '??ng nh?p thành công'),
(688, 1, '2015-03-29 17:18:29', '??ng nh?p thành công'),
(689, 1, '2015-03-29 18:04:54', '??ng nh?p thành công'),
(690, 99, '2015-03-29 22:49:41', '??ng nh?p thành công'),
(691, 99, '2015-03-30 08:58:27', '??ng nh?p thành công'),
(692, 1, '2015-03-31 09:39:22', '??ng nh?p thành công'),
(693, 1, '2015-04-01 15:24:00', '??ng nh?p thành công'),
(694, 99, '2015-04-06 14:17:18', '??ng nh?p thành công'),
(695, 1, '2015-04-06 15:49:52', '??ng nh?p thành công'),
(696, 99, '2015-04-07 08:59:10', '??ng nh?p thành công'),
(697, 1, '2015-04-07 09:24:43', '??ng nh?p thành công'),
(698, 99, '2015-04-07 21:52:14', '??ng nh?p thành công'),
(699, 1, '2015-04-08 14:32:56', '??ng nh?p thành công'),
(700, 1, '2015-04-08 15:35:04', '??ng nh?p thành công'),
(701, 99, '2015-04-09 13:53:04', '??ng nh?p thành công'),
(702, 1, '2015-04-14 08:37:03', '??ng nh?p thành công'),
(703, 1, '2015-04-14 08:38:24', '??ng nh?p thành công'),
(704, 1, '2015-04-14 14:46:25', '??ng nh?p thành công'),
(705, 1, '2015-04-15 08:41:02', '??ng nh?p thành công'),
(706, 1, '2015-04-15 09:49:19', '??ng nh?p thành công'),
(707, 1, '2015-04-15 10:30:17', '??ng nh?p thành công'),
(708, 1, '2015-04-15 11:08:15', '??ng nh?p thành công'),
(709, 1, '2015-04-15 11:12:56', '??ng nh?p thành công'),
(710, 1, '2015-04-15 14:18:09', '??ng nh?p thành công'),
(711, 1, '2015-04-15 14:26:25', '??ng nh?p thành công'),
(712, 1, '2015-04-16 07:59:03', '??ng nh?p thành công'),
(713, 1, '2015-04-16 09:37:17', '??ng nh?p thành công'),
(714, 1, '2015-04-16 10:15:32', '??ng nh?p thành công'),
(715, 1, '2015-04-16 11:18:50', '??ng nh?p thành công'),
(716, 1, '2015-04-16 13:48:34', '??ng nh?p thành công'),
(717, 1, '2015-04-16 17:18:12', '??ng nh?p thành công'),
(718, 99, '2015-04-18 10:04:55', '??ng nh?p thành công'),
(719, 2025, '2015-05-04 11:19:54', '??ng xu?t thành công'),
(720, 99, '2015-05-04 11:35:28', '??ng nh?p thành công'),
(721, 99, '2015-05-04 15:57:23', '??ng nh?p thành công'),
(722, 99, '2015-05-11 10:32:21', '??ng nh?p thành công'),
(723, 99, '2015-05-17 08:36:21', '??ng nh?p thành công'),
(724, 100, '2015-05-17 10:31:55', '??ng nh?p thành công'),
(725, 100, '2015-05-17 10:34:52', '??ng xu?t thành công'),
(726, 100, '2015-05-17 10:37:26', '??ng nh?p thành công'),
(727, 100, '2015-05-17 10:37:30', '??ng xu?t thành công'),
(728, 100, '2015-05-17 10:48:37', '??ng nh?p thành công'),
(729, 100, '2015-05-17 10:54:28', '??ng xu?t thành công'),
(730, 100, '2015-05-17 10:54:41', '??ng nh?p thành công'),
(731, 100, '2015-05-17 11:52:23', '??ng xu?t thành công'),
(732, 100, '2015-05-17 11:52:57', '??ng nh?p thành công'),
(733, 36, '2015-05-17 15:22:21', '??ng xu?t thành công'),
(734, 100, '2015-05-17 15:22:40', '??ng nh?p thành công'),
(735, 100, '2015-05-17 19:24:03', '??ng nh?p thành công'),
(736, 4942, '2015-05-18 07:39:19', '??ng xu?t thành công'),
(737, 100, '2015-05-18 07:39:38', '??ng nh?p thành công'),
(738, 100, '2015-05-18 17:15:00', '??ng xu?t thành công'),
(739, 99, '2015-05-19 14:49:56', '??ng nh?p thành công'),
(740, 100, '2015-05-19 14:58:18', '??ng nh?p thành công'),
(741, 100, '2015-05-19 16:26:48', '??ng xu?t thành công'),
(742, 100, '2015-05-27 13:32:59', '??ng nh?p thành công'),
(743, 100, '2015-05-27 13:33:36', '??ng xu?t thành công'),
(744, 99, '2015-05-28 15:50:41', '??ng xu?t thành công'),
(745, 99, '2015-05-28 15:50:44', '??ng nh?p thành công'),
(746, 99, '2015-05-30 13:26:47', '??ng nh?p thành công'),
(747, 1, '2015-06-01 12:15:18', '??ng nh?p thành công'),
(748, 1, '2015-06-17 10:53:08', '??ng nh?p thành công'),
(749, 99, '2015-06-20 17:09:02', '??ng nh?p thành công'),
(750, 99, '2015-07-03 16:50:45', '??ng nh?p thành công'),
(751, 1, '2015-08-25 18:48:20', '??ng nh?p thành công'),
(752, 1, '2015-08-26 12:33:35', '??ng nh?p thành công');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE IF NOT EXISTS `user_permission` (
  `id` int(11) NOT NULL auto_increment,
  `user_type_id` int(11) NOT NULL,
  `admin_menu_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=803 ;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `user_type_id`, `admin_menu_id`) VALUES
(3, 2, 4),
(8, 13, 14),
(9, 14, 4),
(12, 15, 16),
(800, 1, 342),
(799, 1, 343),
(798, 1, 332),
(797, 1, 333),
(796, 1, 335),
(795, 1, 330),
(794, 1, 329),
(793, 1, 328),
(792, 1, 334),
(791, 1, 233),
(790, 1, 231),
(789, 1, 331),
(788, 1, 289),
(787, 1, 259),
(786, 1, 341),
(785, 1, 236),
(784, 1, 306),
(783, 1, 229),
(782, 1, 292),
(781, 1, 339),
(780, 1, 340),
(779, 1, 338),
(778, 1, 337),
(777, 1, 336),
(801, 1, 263),
(802, 1, 315);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL,
  `description` text,
  `is_registered` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `title`, `description`, `is_registered`) VALUES
(1, 'Admin', 'Quản trị hệ thống', 0),
(2, 'User', 'Người dùng', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
