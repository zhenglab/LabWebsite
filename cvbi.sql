-- phpMyAdmin SQL Dump
-- version 4.2.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-04-19 06:48:24
-- 服务器版本： 5.6.23
-- PHP Version: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cv_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `cv_describe`
--

CREATE TABLE IF NOT EXISTS `cv_describe` (
`id` int(10) unsigned NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'admin',
  `add_time` date DEFAULT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `edit_time` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `cv_describe`
--

INSERT INTO `cv_describe` (`id`, `author`, `add_time`, `content`, `edit_time`, `status`) VALUES
(1, 'admin', '2015-04-03', 'testtest', '2015-04-05', 0),
(2, 'admin', '2015-04-05', 'test22222222', '2015-04-05', 0),
(4, 'ruby97', '2015-04-05', '<p>ddd</p>', '2015-04-05', 0),
(5, 'ruby97', '2015-04-05', '<p>dddddddd</p>', '2015-04-05', 0),
(6, 'ruby97', '2015-04-05', '<p>aaaaaa</p>', '2015-04-05', 0),
(7, 'ruby97', '2015-04-05', '<p>ddddddd</p>', '2015-04-05', 0),
(8, 'ruby97', '2015-04-05', '<p>adfadfad</p>', '2015-04-05', 0),
(10, 'ruby97', '2015-04-05', '<p>cccccc</p>', '2015-04-05', 0),
(11, 'ruby97', '2015-04-05', '<p>		&nbsp; &nbsp;	</p><p>		&nbsp; &nbsp;	</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 8px 0px; color: rgb(64, 64, 64); font-family: 微软雅黑; line-height: 27.2000007629395px; white-space: normal; background-color: rgb(255, 255, 255);">也可以改成对象方式来操作：</p><pre class="prettyprint linenums webkit prettyprinted" style="margin-top: 0px; margin-bottom: 0px; padding: 6px; border: 1px solid rgb(221, 221, 221); position: relative; font-family: Consolas, &#39;Liberation Mono&#39;, Courier, 微软雅黑; color: rgb(51, 51, 51); word-wrap: break-word; word-break: break-all; border-radius: 3px; line-height: 27.2000007629395px; background-color: rgb(249, 249, 249);">$User&nbsp;=&nbsp;M(&quot;User&quot;);&nbsp;//&nbsp;实例化User对象//&nbsp;要修改的数据对象属性赋值$User-&gt;name&nbsp;=&nbsp;&#39;ThinkPHP&#39;;$User-&gt;email&nbsp;=&nbsp;&#39;ThinkPHP@gmail.com&#39;;$User-&gt;where(&#39;id=5&#39;)-&gt;save();&nbsp;//&nbsp;根据条件更新记录</pre><p style="margin-top: 0px; margin-bottom: 0px; padding: 8px 0px; color: rgb(64, 64, 64); font-family: 微软雅黑; line-height: 27.2000007629395px; white-space: normal; background-color: rgb(255, 255, 255);">adfada</p><p>&nbsp; &nbsp;			</p><p>&nbsp; &nbsp;			</p>', '2015-04-05', 0),
(12, 'ruby97', '2015-04-06', '<p style="margin-top: 0px; margin-bottom: 10px; text-align: justify; color: rgb(85, 85, 85); font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);">Research in our lab focuses on two intimately connected branches of vision research: computer vision and human vision. In both fields, we are intrigued by visual functionalities that give rise to semantically meaningful interpretations of the visual world.</p><p style="margin-top: 0px; margin-bottom: 10px; text-align: justify; color: rgb(85, 85, 85); font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);">In&nbsp;<strong>computer vision</strong>, we aspire to develop intelligent algorithms that perform important visual perception tasks such as object recognition, scene categorization, integrative scene understanding, human motion recognition, material recognition, etc.</p><p style="margin-top: 0px; margin-bottom: 10px; text-align: justify; color: rgb(85, 85, 85); font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);">In&nbsp;<strong>human vision</strong>, our curiosity leads us to study the underlying neural mechanisms that enable the human visual system to perform high level visual tasks with amazing speed and efficiency.</p><p><br/></p>', '2015-04-06', 0),
(13, 'ruby97', '2015-04-06', '<p style="margin-top: 0px; margin-bottom: 10px; text-align: justify; color: rgb(85, 85, 85); font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);">Research in our lab focuses on two intimately connected branches of vision research: computer vision and human vision. In both fields, we are intrigued by visual functionalities that give rise to semantically meaningful interpretations of the visual world.</p><p style="margin-top: 0px; margin-bottom: 10px; text-align: justify; color: rgb(85, 85, 85); font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);">In&nbsp;<strong>computer vision</strong>, we aspire to develop intelligent algorithms that perform important visual perception tasks such as object recognition, scene categorization, integrative scene understanding, human motion recognition, material recognition, etc.</p><p style="margin-top: 0px; margin-bottom: 10px; text-align: justify; color: rgb(85, 85, 85); font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);">In&nbsp;<strong>human vision</strong>, our curiosity leads us to study the underlying neural mechanisms that enable the human visual system to perform high level visual tasks with amazing speed and efficiency.</p><p><br/></p>', '2015-04-06', 1);

-- --------------------------------------------------------

--
-- 表的结构 `cv_news`
--

CREATE TABLE IF NOT EXISTS `cv_news` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '无标题新闻',
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `add_time` date DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `edit_time` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `cv_news`
--

INSERT INTO `cv_news` (`id`, `title`, `author`, `add_time`, `content`, `edit_time`, `status`) VALUES
(1, '无标题新闻', 'admin', '2015-04-06', '<p>\r\n		&nbsp; &nbsp;	adfadfadfadfasdf &nbsp; &nbsp;			</p>', '2015-04-06', 0),
(2, '无标题新闻', 'admin', '2015-04-06', '<p>\r\n		&nbsp; &nbsp;	adfadfasdfasdf &nbsp; &nbsp;			</p>', '2015-04-06', 0),
(3, 'asss', 'ruby97', '2015-04-06', '<p>		&nbsp; &nbsp;	</p><p>		&nbsp; &nbsp;	</p><p>		&nbsp; &nbsp;	</p><p>ssss &nbsp;&nbsp;<br/></p><p>&nbsp; &nbsp;			</p><p>&nbsp; &nbsp;			</p>', '2015-04-06', 0),
(4, 'vbbb', 'ruby97', '2015-04-06', '<p>adfa dfa d</p>', '2015-04-06', 0),
(6, '重要', 'ruby97', '2015-04-06', '<p><span style="color: rgb(255, 0, 0);">[重要]</span>今天下午开会！！！</p>', '2015-04-06', 1),
(7, '恭喜', 'wbtxd2004', '2015-04-07', '<p><span style="color: rgb(255, 0, 0);">[恭喜]</span><a href="http://www.baidu.com" target="_blank">项目</a>在某一方面有重大突破。</p>', '2015-04-07', 1);

-- --------------------------------------------------------

--
-- 表的结构 `cv_people`
--

CREATE TABLE IF NOT EXISTS `cv_people` (
`id` int(10) unsigned NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `homepage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `add_time` date DEFAULT NULL,
  `img_path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `describe` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0隐藏 1老师2学生'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `cv_people`
--

INSERT INTO `cv_people` (`id`, `name`, `homepage`, `add_time`, `img_path`, `describe`, `status`) VALUES
(2, 'Zhao Haiwei 赵海伟', '#', '2015-04-06', 'test.png', '<h2 style="box-sizing: border-box; font-family: Helvetica; font-weight: normal; line-height: 19.2000007629395px; color: rgba(0, 0, 0, 0.701961); margin: 0px 0px 0.6em; font-size: 30px; white-space: normal; overflow: hidden; padding-top: 0.5em; padding-bottom: 0.17em; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(170, 170, 170); background: none rgb(255, 255, 255);"><span class="mw-headline" id=".E7.A7.91.E5.AD.A6.E7.A0.94.E7.A9.B6" style="box-sizing: border-box;">科学研究</span></h2><p style="box-sizing: border-box; margin-top: 0.4em; margin-bottom: 0.5em; font-family: Helvetica; font-size: 20px; color: rgba(0, 0, 0, 0.498039); white-space: normal; line-height: 1.5em; background-color: rgb(255, 255, 255);">近年来主要开展计算机视觉中显著性检测（saliency detection）、目标检测（object detection）、特征提取（feature extraction）、目标识别（object recognition）等相关研究。 自2006年以来主要从事图像分析与模式识别及其在浮游植物显微图像分析与识别和垂直探测电离图自动解译与度量研究。</p><p><br/></p>', 2),
(7, 'Zheng Haiyong 郑海永', 'http://vision.ouc.edu.cn/~zhenghaiyong', '2015-04-07', 'People/test.png', '<p>		&nbsp; &nbsp;		</p><p>		&nbsp; &nbsp;		</p><h2 style="font-weight: normal; margin: 0px 0px 0.6em; overflow: hidden; padding-top: 0.5em; padding-bottom: 0.17em; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(170, 170, 170); font-size: 30px; line-height: 19.2000007629395px; white-space: normal; background: none rgb(255, 255, 255);"><span class="mw-headline" id=".E7.A7.91.E5.AD.A6.E7.A0.94.E7.A9.B6">科学研究</span></h2><p style="margin-top: 0.4em; margin-bottom: 0.5em; line-height: 1.5em; font-size: 20px; white-space: normal; background-color: rgb(255, 255, 255);">近年来主要开展计算机视觉中显著性检测（saliency detection）、目标检测（object detection）、特征提取（feature extraction）、目标识别（object recognition）等相关研究。 自2006年以来主要从事图像分析与模式识别及其在浮游植物显微图像分析与识别和垂直探测电离图自动解译与度量研究。</p><p>&nbsp; &nbsp;			</p><p>&nbsp; &nbsp;			</p>', 1),
(8, 'Ji Guangrong 姬光荣', '#', '2015-04-07', 'People/test.png', '<h2 style="font-weight: normal; margin: 0px 0px 0.6em; overflow: hidden; padding-top: 0.5em; padding-bottom: 0.17em; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(170, 170, 170); font-size: 30px; line-height: 19.2000007629395px; white-space: normal; background: none rgb(255, 255, 255);"><span class="mw-headline" id=".E7.A7.91.E5.AD.A6.E7.A0.94.E7.A9.B6">科学研究</span></h2><p style="margin-top: 0.4em; margin-bottom: 0.5em; line-height: 1.5em; font-size: 20px; white-space: normal; background-color: rgb(255, 255, 255);">近年来主要开展计算机视觉中显著性检测（saliency detection）、目标检测（object detection）、特征提取（feature extraction）、目标识别（object recognition）等相关研究。 自2006年以来主要从事图像分析与模式识别及其在浮游植物显微图像分析与识别和垂直探测电离图自动解译与度量研究。</p>', 1),
(9, 'Wang Guoyu 王国宇', '#', '2015-04-07', 'People/test.png', '<p>		&nbsp; &nbsp;		</p><h3 style="margin: 0px 0px 0.3em; overflow: hidden; padding-top: 0.5em; padding-bottom: 0.17em; border-bottom-style: none; font-size: 26.3999996185303px; line-height: 19.2000007629395px; white-space: normal; background: none rgb(255, 255, 255);"><span class="mw-headline" id=".E4.B8.BB.E8.A6.81.E7.A0.94.E7.A9.B6.E6.96.B9.E5.90.91">主要研究方向</span></h3><p style="margin-top: 0.4em; margin-bottom: 0.5em; line-height: 1.5em; font-size: 20px; white-space: normal; background-color: rgb(255, 255, 255);">图像处理与分析、基于视觉的测量技术。 目前研究工作包括：图像复原和图像超分辨重建技术、散射介质成像复原、基于图像的三维测量、基于内容的图像检索等。</p><p>&nbsp; &nbsp;			</p>', 1),
(10, 'WuBin 武斌', 'http://vision.ouc.edu.cn/~wubin', '2015-04-07', 'People/wubin.jpg', '<h2 style="box-sizing: border-box; font-family: Helvetica; font-weight: normal; line-height: 19.2000007629395px; color: rgba(0, 0, 0, 0.701961); margin: 0px 0px 0.6em; font-size: 30px; white-space: normal; overflow: hidden; padding-top: 0.5em; padding-bottom: 0.17em; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(170, 170, 170); background: none rgb(255, 255, 255);"><span class="mw-headline" id=".E7.A7.91.E5.AD.A6.E7.A0.94.E7.A9.B6" style="box-sizing: border-box;">科学研究</span></h2><p style="box-sizing: border-box; margin-top: 0.4em; margin-bottom: 0.5em; font-family: Helvetica; font-size: 20px; color: rgba(0, 0, 0, 0.498039); white-space: normal; line-height: 1.5em; background-color: rgb(255, 255, 255);">近年来主要开展计算机视觉中显著性检测（saliency detection）、目标检测（object detection）、特征提取（feature extraction）、目标识别（object recognition）等相关研究。 自2006年以来主要从事图像分析与模式识别及其在浮游植物显微图像分析与识别和垂直探测电离图自动解译与度量研究。</p><p><br/></p>', 2),
(17, 'adf', 'adf', '2015-04-07', 'People/5523d645e975d.jpg', NULL, 2),
(18, 'A', '＃', '2015-04-19', 'People/55333c537d82b.png', NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `cv_research`
--

CREATE TABLE IF NOT EXISTS `cv_research` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `classify` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `describe` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `file_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_time` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `cv_research`
--

INSERT INTO `cv_research` (`id`, `title`, `classify`, `date`, `describe`, `file_path`, `img_path`, `add_time`, `status`) VALUES
(1, 'Deep Visual-Semantic Alignments for Generating Image Descriptions', 'CVPR ', 2015, '<p><span style="color: rgb(85, 85, 85); font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; font-style: italic; line-height: 20px; background-color: rgb(255, 255, 255);">Andrej Karpathy, Li Fei-Fei</span></p>', 'http://vision.stanford.edu/publications.html', 'Research/2015/images/rnn7.png', '2015-04-06', 1),
(5, 'Basic Level Category Structure Emerges Gradually Across Human Ventral Visual Cortex', 'Journal of Cognitive Neuroscience (in press)', 2014, '<p>		&nbsp; &nbsp;		</p><p><span style="color: rgb(85, 85, 85); font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; font-style: italic; line-height: 20px; background-color: rgb(255, 255, 255);">Marius Cătălin Iordan, Michelle R. Greene, Diane M. Beck, Li Fei-Fei</span></p><p>&nbsp; &nbsp;			</p>', 'Research/2014/paper/55248c76cd1a3.pdf', 'Research/2014/images/55248c76cd479.png', '2015-04-07', 1),
(6, 'Free your Camera: 3D Indoor Scene Understanding from Arbitrary Camera Motion', 'BMVC', 2013, '<p><span style="color: rgb(85, 85, 85); font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif; font-size: 14px; font-style: italic; line-height: 20px; background-color: rgb(255, 255, 255);">Axel Furlan, Stephen Miller, Domenico Giorgio Sorrenti, Li Fei-Fei, Silvio Savarese</span></p>', '__Uploads__/', 'Research/2015/images/rnn7.png', '2015-04-07', 1);

-- --------------------------------------------------------

--
-- 表的结构 `cv_student`
--

CREATE TABLE IF NOT EXISTS `cv_student` (
`id` int(10) unsigned NOT NULL,
  `name` text,
  `homepage` varchar(255) NOT NULL DEFAULT '#',
  `t_describe` longtext,
  `img_path` varchar(255) DEFAULT NULL,
  `add_time` date DEFAULT NULL,
  `t_order` int(11) NOT NULL DEFAULT '100',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0隐藏1显示'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `cv_teacher`
--

CREATE TABLE IF NOT EXISTS `cv_teacher` (
`id` int(10) unsigned NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `homepage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `t_describe` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `img_path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `add_time` date DEFAULT NULL,
  `t_order` int(10) unsigned DEFAULT '100',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 隐藏 1 显示'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `cv_user`
--

CREATE TABLE IF NOT EXISTS `cv_user` (
`id` int(11) NOT NULL,
  `username` char(15) NOT NULL,
  `password` char(32) NOT NULL,
  `add_time` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cv_user`
--

INSERT INTO `cv_user` (`id`, `username`, `password`, `add_time`, `status`) VALUES
(17, 'ruby97', '405958c9e0888f6ddc6221f90576490c', NULL, 1),
(18, 'wbtxd2004', '28da2a025e27e9d8c98607a2f5511b78', '2015-04-07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv_describe`
--
ALTER TABLE `cv_describe`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_news`
--
ALTER TABLE `cv_news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_people`
--
ALTER TABLE `cv_people`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_research`
--
ALTER TABLE `cv_research`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_student`
--
ALTER TABLE `cv_student`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_teacher`
--
ALTER TABLE `cv_teacher`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_user`
--
ALTER TABLE `cv_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv_describe`
--
ALTER TABLE `cv_describe`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cv_news`
--
ALTER TABLE `cv_news`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cv_people`
--
ALTER TABLE `cv_people`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cv_research`
--
ALTER TABLE `cv_research`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cv_student`
--
ALTER TABLE `cv_student`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cv_teacher`
--
ALTER TABLE `cv_teacher`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cv_user`
--
ALTER TABLE `cv_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
