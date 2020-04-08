# Host: localhost  (Version: 5.5.53)
# Date: 2018-03-08 14:30:03
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "whatsns__keywords"
#

CREATE TABLE `whatsns__keywords` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `find` varchar(200) NOT NULL,
  `replacement` varchar(200) NOT NULL,
  `admin` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns__keywords"
#
CREATE TABLE `whatsns_user_invateanswer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0'COMMENT '用户uid',
  `qid` int(11) NOT NULL DEFAULT '0' COMMENT '问题id',
  `invatetime` int(11) NOT NULL DEFAULT '0' COMMENT '邀请时间',
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '邀请回答话题id',
  `invateuid` int(11) NOT NULL DEFAULT '0' COMMENT '邀请人的uid',
  `state` varchar(255) DEFAULT '1' COMMENT '取消邀请还是没有，默认没有取消',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COMMENT='用户邀请回答表';
#
# Structure for table "whatsns_tag"
#

CREATE TABLE `whatsns_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(100) NOT NULL DEFAULT '' COMMENT '标签名称',
  `tagalias` varchar(150) NOT NULL DEFAULT '' COMMENT '标签别名',
  `tagfisrtchar` varchar(20) NOT NULL DEFAULT '' COMMENT '标签首字母',
  `tagimage` varchar(255) DEFAULT NULL COMMENT '标签缩略图',
  `tagquestions` int(11) NOT NULL DEFAULT '0' COMMENT '标签问题数',
  `tagarticles` int(11) NOT NULL DEFAULT '0' COMMENT '标签文章数',
  `followers` int(11) NOT NULL DEFAULT '0' COMMENT '标签关注人数',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo页面标题',
  `description` varchar(800) NOT NULL DEFAULT '' COMMENT 'seo页面标签描述',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo页面标签关键词',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '标签创建时间',
  PRIMARY KEY (`id`),
  KEY `time` (`time`),
   KEY `tagname` (`tagname`),
    KEY `tagalias` (`tagalias`),
  KEY `tagfisrtchar` (`tagfisrtchar`),
  KEY `tagquestions` (`tagquestions`),
  KEY `tagarticles` (`tagarticles`),
  KEY `followers` (`followers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='标签表';

#
# Structure for table "whatsns_tag_item"
#
CREATE TABLE `whatsns_tag_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagid` int(11) NOT NULL DEFAULT '0' COMMENT '标签id',
  `typeid` int(11) NOT NULL DEFAULT '0' COMMENT '类型id 文章或者问题表的主键id',
  `itemtype` varchar(100) NOT NULL DEFAULT '' COMMENT 'question或者article',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `uid` int(11) NOT NULL DEFAULT '1' COMMENT '创建者',
  `cid` int(11) NOT NULL DEFAULT '1' COMMENT '分类话题id',
  PRIMARY KEY (`id`),
  KEY `tagid` (`tagid`),
  KEY `cid` (`cid`),
  KEY `time` (`time`),
  KEY `typeid` (`typeid`),
  KEY `itemtype` (`itemtype`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COMMENT='标签问题文章表';


#
# Structure for table "whatsns_ad"
#

CREATE TABLE `whatsns_ad` (
  `html` text,
  `page` varchar(50) NOT NULL DEFAULT '',
  `position` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_ad"
#


#
# Structure for table "whatsns_alipayorder"
#

CREATE TABLE `whatsns_alipayorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `discount` varchar(200) NOT NULL COMMENT '折扣价格',
  `payment_type` varchar(200) NOT NULL COMMENT '付款类型',
  `trade_no` varchar(200) NOT NULL COMMENT '交易流水号',
  `subject` varchar(200) NOT NULL COMMENT '交易主题',
  `buyer_email` varchar(200) NOT NULL COMMENT '付款人支付宝账号',
  `gmt_create` varchar(200) NOT NULL COMMENT '订单创建时间',
  `notify_type` varchar(200) NOT NULL COMMENT '通知类型，同步还是异步',
  `quantity` varchar(200) NOT NULL COMMENT '质量',
  `out_trade_no` varchar(200) NOT NULL,
  `seller_id` varchar(200) NOT NULL,
  `notify_time` varchar(200) NOT NULL,
  `body` varchar(200) NOT NULL,
  `trade_status` varchar(200) NOT NULL,
  `is_total_fee_adjust` varchar(200) NOT NULL,
  `total_fee` varchar(200) NOT NULL,
  `gmt_payment` varchar(200) NOT NULL,
  `seller_email` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `buyer_id` varchar(200) NOT NULL,
  `notify_id` varchar(200) NOT NULL,
  `use_coupon` varchar(200) NOT NULL,
  `sign_type` varchar(200) NOT NULL,
  `sign` varchar(200) NOT NULL,
  `uid` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_alipayorder"
#


#
# Structure for table "whatsns_answer"
#

CREATE TABLE `whatsns_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` char(50) NOT NULL,
  `author` varchar(15) NOT NULL DEFAULT '',
  `authorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `adopttime` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  `comments` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ip` varchar(20) DEFAULT NULL,
  `supports` int(10) NOT NULL DEFAULT '0',
  `reward` int(10) DEFAULT '0',
  `serverid` varchar(200) DEFAULT NULL,
  `openid` varchar(200) DEFAULT NULL,
  `voicetime` int(10) DEFAULT '0',
  `mediafile` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qid` (`qid`),
  KEY `authorid` (`authorid`),
  KEY `adopttime` (`adopttime`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_answer"
#


#
# Structure for table "whatsns_answer_append"
#

CREATE TABLE `whatsns_answer_append` (
  `appendanswerid` int(10) NOT NULL AUTO_INCREMENT,
  `answerid` int(10) NOT NULL DEFAULT '0',
  `author` varchar(20) NOT NULL DEFAULT '0',
  `authorid` int(10) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`appendanswerid`),
  KEY `answerid` (`answerid`),
  KEY `authorid` (`authorid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_answer_append"
#


#
# Structure for table "whatsns_answer_comment"
#

CREATE TABLE `whatsns_answer_comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL DEFAULT '0',
  `authorid` int(10) NOT NULL DEFAULT '0',
  `author` char(18) NOT NULL,
  `content` varchar(100) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_answer_comment"
#


#
# Structure for table "whatsns_answer_support"
#

CREATE TABLE `whatsns_answer_support` (
  `sid` char(16) NOT NULL,
  `aid` int(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`,`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_answer_support"
#


#
# Structure for table "whatsns_article_comment"
#

CREATE TABLE `whatsns_article_comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tid` int(10) NOT NULL DEFAULT '0',
  `authorid` int(10) NOT NULL DEFAULT '0',
  `author` char(18) NOT NULL DEFAULT '',
  `content` text NOT NULL COMMENT '评论回复内容',
  `time` int(10) NOT NULL DEFAULT '0',
  `aid` int(11) DEFAULT NULL COMMENT '文章评论id',
   `state` int(5) DEFAULT '1',
  PRIMARY KEY (`id`),
      KEY `state` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_article_comment"
#


#
# Structure for table "whatsns_article_support"
#

CREATE TABLE `whatsns_article_support` (
  `sid` char(16) NOT NULL,
  `aid` int(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`,`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_article_support"
#


#
# Structure for table "whatsns_articlecomment"
#

CREATE TABLE `whatsns_articlecomment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` char(50) NOT NULL,
  `author` varchar(15) NOT NULL DEFAULT '',
  `authorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `adopttime` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  `comments` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ip` varchar(20) DEFAULT NULL,
  `supports` int(10) NOT NULL DEFAULT '0',
  `reward` int(10) DEFAULT '0',
   `state` int(5) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`),
    KEY `state` (`state`),
  KEY `authorid` (`authorid`),
  KEY `adopttime` (`adopttime`),
  KEY `time` (`time`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_articlecomment"
#


#
# Structure for table "whatsns_attach"
#

CREATE TABLE `whatsns_attach` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `filename` char(100) NOT NULL DEFAULT '',
  `filetype` char(50) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `location` char(100) NOT NULL DEFAULT '',
  `downloads` mediumint(8) NOT NULL DEFAULT '0',
  `isimage` tinyint(1) NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `time` (`time`,`isimage`,`downloads`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_attach"
#


#
# Structure for table "whatsns_autocaiji"
#

CREATE TABLE `whatsns_autocaiji` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `caiji_url` varchar(100) NOT NULL COMMENT '采集网址',
  `tiwenshijian` int(11) NOT NULL DEFAULT '0' COMMENT '提问时间',
  `huidashijian` int(11) NOT NULL DEFAULT '0' COMMENT '回答时间',
  `caiji_prefix` varchar(100) NOT NULL COMMENT '采集列表规则',
  `category1` int(11) NOT NULL DEFAULT '0' COMMENT '一级分类',
  `category2` int(11) NOT NULL DEFAULT '0' COMMENT '2级分类',
  `category3` int(11) NOT NULL DEFAULT '0' COMMENT '3级分类',
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '当前选择的分类id',
  `ckabox` int(11) NOT NULL DEFAULT '0' COMMENT '过滤回答超链接',
  `imgckabox` int(11) NOT NULL DEFAULT '0' COMMENT '过滤图片',
  `bianma` varchar(100) NOT NULL COMMENT '网页编码',
  `guize` varchar(100) NOT NULL COMMENT '其它回答',
  `daanyuming` varchar(100) NOT NULL COMMENT '域名',
  `daandesc` varchar(100) NOT NULL COMMENT '描述',
  `caiji_best` varchar(100) NOT NULL COMMENT '最佳答案',
  `caiji_hdusername` varchar(100) NOT NULL COMMENT '采集用户名',
  `caiji_hdusertx` varchar(100) NOT NULL COMMENT '采集头像',
  `source` varchar(100) DEFAULT NULL,
  `biaotiguolv` text,
  `miaosuguolv` text,
  `neirongguolv` text,
  `usernameguolv` text,
  `atitle` int(10) DEFAULT '0',
  `caijitype` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_autocaiji"
#

INSERT INTO `whatsns_autocaiji` VALUES (3,'http://wenda.so.com/c/164?filt=20&pn={#num}',1,20,'.question-list .qus-title a[href*=\'/q/\']',2,25,0,25,0,0,'utf-8','.other-ans-cnt','http://wenda.so.com','.q-cnt','.resolved-cnt','.answers > .ask-author',' .answers >.pic >img','360问答','','','','',0,0),(4,'http://iask.sina.com.cn/c/74.html',1,20,'.question-title a[href*=\'/b/\']',2,28,0,28,1,1,'utf-8','.answer_item ul>li .answer_info .answer_txt span pre','http://iask.sina.com.cn','','.good_answer .answer_text span pre','author_name','','新浪爱问','','','','',0,0),(9,'http://wenda.so.com/c/',1,20,'.question-list .qus-title a[href*=\'/q/\']',22,0,0,22,1,0,'utf-8','.other-ans-cnt','http://wenda.so.com','.q-cnt','.resolved-cnt','.answers > .ask-author',' .answers >.pic >img','360问答全部分类页面','','','','',0,NULL),(11,'http://www.66law.cn/question/zscq/',1,20,'.wt_list .zx_tm',1,0,0,1,0,0,'utf-8','.cont-box .answer-box .lh26','http://www.66law.cn','','','','','知识产权免费法律咨询-华律网(66law.cn)','','','','',1,0),(12,'http://www.ibayue.com/yule/',1,20,'.dec h3 a',4,0,0,4,0,0,'utf-8','','http://www.ibayue.com/','','','','','时尚女性网-娱乐','','','','',0,1),(13,'https://baijia.baidu.com/channel?cat=1',1,20,'.articles .title a',3,0,0,3,0,0,'utf-8','h1.title','https://baijia.baidu.com/','.news-content','','','','百家-科技频道','','','','',0,1),(14,'http://news.wmxa.cn/yanta/',1,20,'#newslist li a',3,0,0,3,0,0,'utf-8','h1','','#text','','','','雁塔区新闻网',NULL,NULL,NULL,NULL,0,1),(15,'http://www.csai.cn/wenda/',1,20,'.lf_list a',31,0,0,31,0,0,'utf-8','','http://www.csai.cn','','.wd_cn','','','西财',NULL,NULL,NULL,NULL,0,0);

#
# Structure for table "whatsns_badword"
#

CREATE TABLE `whatsns_badword` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `admin` varchar(15) NOT NULL DEFAULT '',
  `find` varchar(100) NOT NULL DEFAULT '',
  `replacement` varchar(100) NOT NULL DEFAULT '',
  `findpattern` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `find` (`find`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_badword"
#

INSERT INTO `whatsns_badword` VALUES (1,'admin',' 采纳答案：',' 多带带',''),(2,'admin','变色龙','多带带飞',''),(3,'admin','ddd','ffffd',''),(4,'admin','单独','多带带',''),(5,'admin','变态','{{BANNED}}','');

#
# Structure for table "whatsns_banned"
#

CREATE TABLE `whatsns_banned` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `ip1` char(3) NOT NULL,
  `ip2` char(3) NOT NULL,
  `ip3` char(3) NOT NULL,
  `ip4` char(3) NOT NULL,
  `admin` varchar(15) NOT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `expiration` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_banned"
#


#
# Structure for table "whatsns_category"
#

CREATE TABLE `whatsns_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `dir` char(30) NOT NULL,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `grade` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `questions` int(10) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(200) NOT NULL,
  `miaosu` varchar(500) NOT NULL,
  `followers` int(10) NOT NULL DEFAULT '0',
  `image` varchar(200) NOT NULL,
  `template` varchar(200) NOT NULL,
    `articletemplate` varchar(200) DEFAULT 'topicone',
  `onlybackground` int(2) DEFAULT '0',
  `isshowindex` int(10) DEFAULT '1',
  `isusearticle` int(10) DEFAULT '1',
  `isuseask` int(10) DEFAULT '1',
    `iscourse` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `onlybackground` (`onlybackground`),
    KEY `iscourse` (`iscourse`),
  KEY `isshowindex` (`isshowindex`),
  KEY `pid` (`pid`),
  KEY `grade` (`grade`),
  KEY `questions` (`questions`),
  KEY `isusearticle` (`isusearticle`),
  KEY `followers` (`followers`),
  KEY `isuseask` (`isuseask`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_category"
#

INSERT INTO `whatsns_category` VALUES (1,'默认分类','',0,1,1,36,'默认分类别名','',0,'','catlist','topicone',0,1,1,1,0);

#
# Structure for table "whatsns_category_admin"
#

CREATE TABLE `whatsns_category_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_category_admin"
#


#
# Structure for table "whatsns_categotry_follower"
#

CREATE TABLE `whatsns_categotry_follower` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_categotry_follower"
#


#
# Structure for table "whatsns_credit"
#

CREATE TABLE `whatsns_credit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `operation` varchar(100) NOT NULL DEFAULT '',
  `credit1` smallint(6) NOT NULL DEFAULT '0',
  `credit2` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_credit"
#


#
# Structure for table "whatsns_crontab"
#

CREATE TABLE `whatsns_crontab` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('user','system') NOT NULL DEFAULT 'user',
  `name` char(50) NOT NULL DEFAULT '',
  `method` varchar(50) NOT NULL DEFAULT '',
  `lastrun` int(10) unsigned NOT NULL DEFAULT '0',
  `nextrun` int(10) unsigned NOT NULL DEFAULT '0',
  `weekday` tinyint(1) NOT NULL DEFAULT '0',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  `hour` tinyint(2) NOT NULL DEFAULT '0',
  `minute` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `nextrun` (`available`,`nextrun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_crontab"
#


#
# Structure for table "whatsns_datacall"
#

CREATE TABLE `whatsns_datacall` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `expression` text NOT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_datacall"
#

INSERT INTO `whatsns_datacall` VALUES (1,'知乎','a:7:{s:3:\"tpl\";s:260:\"IDxhIHRhcmdldD0iX2JsYW5rIiBocmVmPSJodHRwOi8vd3d3LmRpYW5iby5jb20vP3F1ZXN0aW9uL3ZpZXcvW3FpZF0uaHRtbCI+W3RpdGxlXTwvYT4gWzxhIHRhcmdldD0iX2JsYW5rIiBocmVmPSJodHRwOi8vd3d3LmRpYW5iby5jb20vP2NhdGVnb3J5L3ZpZXcvW2NpZF0uaHRtbCI+W2NhdGVnb3J5X25hbWVdPC9hPl3CoMKgwqA8YnI+IA==\";s:6:\"status\";s:3:\"all\";s:8:\"category\";s:2:\"4:\";s:9:\"cachelife\";i:1800;s:7:\"maxbyte\";i:38;s:5:\"start\";s:1:\"0\";s:5:\"limit\";s:1:\"5\";}',1515039772);

#
# Structure for table "whatsns_doing"
#

CREATE TABLE `whatsns_doing` (
  `doingid` bigint(20) NOT NULL AUTO_INCREMENT,
  `authorid` int(10) NOT NULL DEFAULT '0',
  `author` varchar(20) NOT NULL DEFAULT '',
  `action` tinyint(1) NOT NULL DEFAULT '0',
  `questionid` int(10) NOT NULL DEFAULT '0',
  `content` text,
  `referid` int(10) NOT NULL DEFAULT '0',
  `refer_authorid` int(10) NOT NULL DEFAULT '0',
  `refer_content` tinytext,
  `createtime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`doingid`),
  KEY `authorid` (`authorid`,`author`),
  KEY `sourceid` (`questionid`),
  KEY `createtime` (`createtime`),
  KEY `referid` (`referid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_doing"
#


#
# Structure for table "whatsns_editor"
#

CREATE TABLE `whatsns_editor` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `tag` varchar(100) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `code` text NOT NULL,
  `displayorder` smallint(3) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_editor"
#


#
# Structure for table "whatsns_expert"
#

CREATE TABLE `whatsns_expert` (
  `uid` int(10) NOT NULL DEFAULT '0',
  `cid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_expert"
#


#
# Structure for table "whatsns_famous"
#

CREATE TABLE `whatsns_famous` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reason` char(50) DEFAULT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_famous"
#


#
# Structure for table "whatsns_favorite"
#

CREATE TABLE `whatsns_favorite` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `qid` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `qid` (`qid`),
  KEY `time` (`time`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_favorite"
#


#
# Structure for table "whatsns_gift"
#

CREATE TABLE `whatsns_gift` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `credit` int(10) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `available` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_gift"
#


#
# Structure for table "whatsns_giftlog"
#

CREATE TABLE `whatsns_giftlog` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `username` char(20) NOT NULL,
  `realname` char(20) NOT NULL,
  `gid` int(10) NOT NULL DEFAULT '0',
  `giftname` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` char(10) NOT NULL,
  `phone` char(15) NOT NULL,
  `qq` char(15) NOT NULL,
  `email` varchar(30) NOT NULL DEFAULT '',
  `notes` text NOT NULL,
  `credit` int(10) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_giftlog"
#


#
# Structure for table "whatsns_inform"
#

CREATE TABLE `whatsns_inform` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `uid` int(10) NOT NULL DEFAULT '0',
  `qtitle` varchar(200) NOT NULL,
  `qid` int(100) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `counts` int(11) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_inform"
#


#
# Structure for table "whatsns_keywords"
#

CREATE TABLE `whatsns_keywords` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `find` varchar(200) NOT NULL,
  `replacement` varchar(200) NOT NULL,
  `admin` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_keywords"
#


#
# Structure for table "whatsns_link"
#

CREATE TABLE `whatsns_link` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_link"
#

INSERT INTO `whatsns_link` VALUES (2,0,'问答系统','https://www.whatsns.com/','问答系统',''),(3,0,'whatsns开源社区','https://www.ask2.cn/','php开源问答系统','');

#
# Structure for table "whatsns_login_auth"
#

CREATE TABLE `whatsns_login_auth` (
  `uid` int(10) NOT NULL DEFAULT '0',
  `type` enum('qq','sina') NOT NULL,
  `token` varchar(50) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_login_auth"
#


#
# Structure for table "whatsns_message"
#

CREATE TABLE `whatsns_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(15) NOT NULL DEFAULT '',
  `fromuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `touid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '1',
  `subject` varchar(75) NOT NULL DEFAULT '',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
   `typename` varchar(255) DEFAULT NULL COMMENT '消息类型--邀请，打赏，回答，提问等',
  PRIMARY KEY (`id`),
  KEY `touid` (`touid`,`time`),
  KEY `fromuid` (`fromuid`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_message"
#


#
# Structure for table "whatsns_nav"
#

CREATE TABLE `whatsns_nav` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `title` char(255) NOT NULL,
  `url` char(255) NOT NULL,
  `target` tinyint(1) NOT NULL DEFAULT '0',
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_nav"
#

INSERT INTO `whatsns_nav` VALUES (1,'首页','问答首页','index',0,1,1,0),(2,'话题','网站话题','category/viewtopic/hot',0,1,1,1),(3,'动态','问答动态','doing/default',0,1,1,1),(4,'专家','问答专家','expert/default',0,1,1,2),(5,'文章','知识专题','topic/default',0,1,1,3),(6,'作者','活跃用户','user/activelist',0,1,1,4),(8,'公告','站内公告','note/clist',0,1,1,5),(15,'财富商城','财富商城','gift/default',0,1,1,6),(21,'积分规则','网站积分来源','rule/index',0,1,1,7);

#
# Structure for table "whatsns_note"
#

CREATE TABLE `whatsns_note` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `authorid` int(10) NOT NULL DEFAULT '0',
  `author` char(18) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `comments` int(10) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL DEFAULT '0',
  `url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_note"
#


#
# Structure for table "whatsns_note_comment"
#

CREATE TABLE `whatsns_note_comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `noteid` int(10) NOT NULL DEFAULT '0',
  `authorid` int(10) NOT NULL DEFAULT '0',
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_note_comment"
#


#
# Structure for table "whatsns_paylog"
#

CREATE TABLE `whatsns_paylog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `money` double NOT NULL,
  `openid` varchar(200) NOT NULL,
  `fromuid` int(10) NOT NULL DEFAULT '0',
  `touid` int(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  `typeid` int(10) NOT NULL DEFAULT '0',
    `beizhu` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_paylog"
#


#
# Structure for table "whatsns_question"
#

CREATE TABLE `whatsns_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `cid1` smallint(5) unsigned NOT NULL DEFAULT '0',
  `cid2` smallint(5) unsigned NOT NULL DEFAULT '0',
  `cid3` smallint(5) unsigned NOT NULL DEFAULT '0',
  `price` smallint(6) unsigned NOT NULL DEFAULT '0',
  `author` char(15) NOT NULL DEFAULT '',
  `authorid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` char(50) NOT NULL,
  `description` text NOT NULL,
  `supply` text NOT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `answers` smallint(5) unsigned NOT NULL DEFAULT '0',
  `attentions` int(10) NOT NULL DEFAULT '0',
  `goods` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ip` varchar(20) DEFAULT NULL COMMENT 'ipåœ°å€',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `shangjin` double DEFAULT '0',
  `hasvoice` int(10) DEFAULT '0',
  `askuid` int(10) DEFAULT '0',
  `askcity` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid1` (`cid1`),
  KEY `cid2` (`cid2`),
  KEY `cid3` (`cid3`),
  KEY `time` (`time`),
  KEY `price` (`price`),
  KEY `answers` (`answers`),
  KEY `authorid` (`authorid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_question"
#


#
# Structure for table "whatsns_question_attention"
#

CREATE TABLE `whatsns_question_attention` (
  `qid` int(10) NOT NULL DEFAULT '0',
  `followerid` int(10) NOT NULL DEFAULT '0',
  `follower` char(18) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`qid`,`followerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_question_attention"
#


#
# Structure for table "whatsns_question_supply"
#

CREATE TABLE `whatsns_question_supply` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `qid` int(10) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `time` (`time`),
  KEY `qid` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_question_supply"
#


#
# Structure for table "whatsns_question_tag"
#

CREATE TABLE `whatsns_question_tag` (
  `qid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `pinyin` varchar(200) DEFAULT '',
  PRIMARY KEY (`qid`,`name`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_question_tag"
#


#
# Structure for table "whatsns_recommend"
#

CREATE TABLE `whatsns_recommend` (
  `qid` int(10) unsigned NOT NULL DEFAULT '0',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` char(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_recommend"
#


#
# Structure for table "whatsns_session"
#

CREATE TABLE `whatsns_session` (
  `sid` char(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `code` char(4) NOT NULL DEFAULT '',
  `islogin` tinyint(1) NOT NULL DEFAULT '0',
  `ip` varchar(20) DEFAULT NULL COMMENT 'ip地址',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `sid` (`sid`),
  KEY `uid` (`uid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_session"
#


#
# Structure for table "whatsns_setting"
#

CREATE TABLE `whatsns_setting` (
  `k` varchar(32) NOT NULL DEFAULT '',
  `v` text NOT NULL,
  PRIMARY KEY (`k`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_setting"
#

INSERT INTO `whatsns_setting` VALUES ('access_email',''),('admin_email','webmaster@domain.com'),('admin_list_default','33'),('alipay_key','admin'),('alipay_partner','admin'),('alipay_seller_email',''),('allow_credit3','0'),('allow_expert','0'),('allow_outer','3'),('allow_register','1'),('apend_question_num','5'),('auth_key','8BdS0M5Y5M1L6p8LdleedOcF0rb97Y6NfH9RatcOeV7Dd306c9e71Maq184j2Tew'),('baidufenci','0'),('baidu_api',''),('banner_color',''),('banner_img','http://www.baseso.com/data/attach/banner/sitebanner.jpg'),('cancopy','0'),('canrepeatquestion','0'),('cansetcatnum','2'),('censor_email',''),('censor_username',''),('cms_open','0'),('code_ask','0'),('code_login','0'),('code_message','0'),('code_register','0'),('cookie_domain',''),('cookie_pre','tp_'),('credit1_adopt','5'),('credit1_answer','2'),('credit1_article','1'),('credit1_ask','5'),('credit1_invate','1'),('credit1_login','2'),('credit1_message','-1'),('credit1_register','20'),('credit2_adopt','2'),('credit2_answer','1'),('credit2_article','1'),('credit2_ask','0'),('credit2_invate','1'),('credit2_login','0'),('credit2_message','0'),('credit2_register','20'),('date_format','Y/m/d'),('del_tmp_crontab','1440'),('duoshuoname',''),('editor_choose','1'),('editor_defaulttip',''),('editor_elementpath','false'),('editor_toolbars','\'fullscreen\',  \'|\', \'undo\', \'redo\', \'|\', \'bold\', \'italic\', \'underline\', \'fontborder\', \'strikethrough\', \'removeformat\', \'formatmatch\', \'autotypeset\', \'blockquote\', \'pasteplain\', \'|\', \'forecolor\', \'backcolor\', \'insertorderedlist\', \'insertunorderedlist\', \'selectall\', \'cleardoc\', \'|\', \'rowspacingtop\', \'rowspacingbottom\', \'lineheight\', \'|\', \'customstyle\', \'paragraph\', \'fontfamily\', \'fontsize\', \'|\', \'indent\', \'|\', \'justifyleft\', \'justifycenter\', \'justifyright\', \'justifyjustify\', \'|\', \'link\', \'unlink\', \'anchor\', \'|\', \'simpleupload\', \'insertimage\', \'scrawl\', \'insertvideo\', \'attachment\', \'map\', \'insertcode\', \'|\', \'horizontal\', \'|\', \'preview\', \'searchreplace\', \'drafts\''),('editor_wordcount','false'),('editor_wtoolbars','\'source\', \'|\', \'bold\', \'underline\', \'italic\', \'strikethrough\', \'eraser\', \'forecolor\', \'bgcolor\', \'|\', \'quote\', \'fontfamily\', \'fontsize\', \'head\', \'unorderlist\', \'orderlist\', \'alignleft\', \'aligncenter\', \'alignright\', \'|\', \'link\', \'unlink\', \'table\', \'emotion\', \'|\', \'img\', \'video\', \'location\', \'insertcode\', \'|\', \'undo\', \'redo\', \'fullscreen\''),('gift_note','ask2问答系统新增soso模板礼品兑换发反反复复'),('gift_range','a:4:{i:0;s:2:\"50\";i:50;s:3:\"100\";i:100;s:3:\"300\";i:500;s:3:\"600\";}'),('hct_logincode',''),('hot_on','0'),('hot_words','a:3:{i:0;a:2:{s:1:\"w\";s:7:\"南昌\r\";s:3:\"qid\";i:0;}i:1;a:2:{s:1:\"w\";s:10:\"黄子韬\r\";s:3:\"qid\";i:0;}i:2;a:2:{s:1:\"w\";s:9:\"蓝光机\";s:3:\"qid\";i:0;}}'),('index_life','1'),('jingyan','100000'),('list_answernum','6'),('list_default','15'),('list_hot_words','南昌\r\n黄子韬\r\n蓝光机'),('list_indexallscore','8'),('list_indexcommend','10'),('list_indexexpert','4'),('list_indexhottag','20'),('list_indexnosolve','10'),('list_indexnote','10'),('list_indexreward','8'),('list_indexweekscore','8'),('list_topdatanum','6'),('mailauth','0'),('mailauth_password','111111'),('mailauth_username','admin@ask2.cn'),('maildefault','ask2问答系统官网'),('maildelimiter','0'),('mailfrom','admin@ask2.cn'),('mailport','465'),('mailsend','1'),('mailserver','ssl://smtp.exmail.qq.com'),('mailsilent','0'),('mailusername','1'),('maxindex_keywords','3'),('max_register_num','100'),('meta_description','ask2问答系统'),('meta_keywords','php问答系统,百度知道程序'),('mobile_localyuyin','0'),('mobile_shang','0.1'),('msgtpl','a:4:{i:0;a:2:{s:5:\"title\";s:36:\"您的问题{wtbt}有了新回答！\";s:7:\"content\";s:51:\"你在{wzmc}上的提出的问题有了新回答！\";}i:1;a:2:{s:5:\"title\";s:54:\"恭喜，您对问题{wtbt}的回答已经被采纳！\";s:7:\"content\";s:42:\"你在{wzmc}上的回答内容被采纳！\";}i:2;a:2:{s:5:\"title\";s:78:\"抱歉，您的问题{wtbt}由于长时间没有处理，现已过期关闭！\";s:7:\"content\";s:69:\"您的问题{wtbt}由于长时间没有处理，现已过期关闭！\";}i:3;a:2:{s:5:\"title\";s:42:\"您对{wtbt}的回答有了新的评分！\";s:7:\"content\";s:36:\"您的回答{hdnr}有了新评分！\";}}'),('notify_mail','0'),('notify_message','1'),('opensinglewindow','0'),('openweixin',''),('openwxpay','0'),('open_weixin','1'),('overdue_days','600'),('pagemaxindex_keywords','4'),('passport_client',''),('passport_credit1','0'),('passport_credit2','0'),('passport_expire','3600'),('passport_key',''),('passport_login','login.php'),('passport_logout','login.php?action=quit'),('passport_open','0'),('passport_register','register.php'),('passport_server',''),('passport_type','0'),('qqlogin_appid','43243244'),('qqlogin_avatar','0'),('qqlogin_key','fdsf'),('qqlogin_open','0'),('question_outtime','24'),('question_share',''),('recharge_open','0'),('recharge_rate','10'),('register_clause',''),('register_on','0'),('rss_ttl','60'),('search_placeholder','请输入关键词检索'),('search_shownum','5'),('seo_category_description',''),('seo_category_keywords',''),('seo_category_title',''),('seo_description','ask2问答系统是一套开源php问答系统,融合付费问答系统，付费语音问答系统，自带超强采集功能，快速建站，强大的seo优化，ask2问答系统适合中小企业建站需求。'),('seo_headers',''),('seo_index_description','php问答系统'),('seo_index_keywords','php问答系统'),('seo_index_title','php问答系统-ask2问答官网'),('seo_keywords','ask2问答系统,高仿360问答系统,问答系统,php问答系统,开源问答程序,知识付费问答'),('seo_on','0'),('seo_prefix','?'),('seo_question_description',''),('seo_question_keywords',''),('seo_question_title',''),('seo_suffix','.html'),('seo_title','whatsns开源免费php问答系统源码下载'),('share_index_logo',''),('shoubuttonindex','0'),('site_alias','whatsns开源免费php问答系统源码下载'),('site_icp','京ICP备15032243号-1'),('site_logo','https://www.ask2.cn/data/attach/logo/logo.png'),('site_name','whatsns问答系统'),('site_qrcode',''),('site_statcode',''),('smscanuse','0'),('smskey',''),('smstmpid',''),('smstmpvalue',''),('stopcopy_allowagent','webkit\r\nopera\r\nmsie\r\ncompatible\r\nbaiduspider\r\ngoogle\r\nsoso\r\nsogou\r\ngecko\r\nmozilla'),('stopcopy_maxnum','60'),('stopcopy_on','0'),('stopcopy_stopagent',''),('sum_category_time','60'),('sum_onlineuser_time','30'),('time_diff','0'),('time_format','H:i'),('time_friendly','1'),('time_offset','8'),('title_description','知名专家为您解答'),('tixianfeilv','0'),('tixianjine','0'),('tpl_dir','responsive_fly'),('tpl_themedir',''),('tpl_wapdir','fronzewap'),('ucenter_open','0'),('ucenter_url',''),('unword',''),('usercount','0'),('usernamepre','ask_'),('verify_question','0'),('vertify_gerentip',' 行家'),('vertify_qiyetip','  达人'),('wap_domain',''),('weixin_fenceng_hangjia','0.1'),('weixin_fenceng_toutinghuida','0.4'),('weixin_fenceng_toutingpingtai','0.2'),('weixin_fenceng_toutingtiwen','0.4'),('weixin_fenceng_zuijia','0.1'),('wxtoken',''),('xunsearch_open','0'),('xunsearch_sdk_file',''),('zl_domain','');

#
# Structure for table "whatsns_site_log"
#

CREATE TABLE `whatsns_site_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `guize` varchar(200) NOT NULL,
  `miaoshu` varchar(200) DEFAULT NULL,
  `uid` int(10) NOT NULL DEFAULT '0',
  `username` varchar(200) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_site_log"
#


#
# Structure for table "whatsns_tid_qid"
#

CREATE TABLE `whatsns_tid_qid` (
  `tid` int(10) NOT NULL DEFAULT '0',
  `qid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`,`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_tid_qid"
#


#
# Structure for table "whatsns_topdata"
#

CREATE TABLE `whatsns_topdata` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `typeid` int(10) NOT NULL DEFAULT '0',
  `type` varchar(200) NOT NULL,
  `order` int(10) NOT NULL DEFAULT '1',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_topdata"
#


#
# Structure for table "whatsns_topic"
#

CREATE TABLE `whatsns_topic` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `describtion` text,
  `image` varchar(100) DEFAULT NULL,
  `displayorder` int(10) NOT NULL DEFAULT '0',
  `author` varchar(200) NOT NULL,
  `authorid` int(10) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL DEFAULT '0',
  `articleclassid` int(10) NOT NULL DEFAULT '0',
  `isphone` int(10) NOT NULL DEFAULT '0',
  `viewtime` int(10) unsigned NOT NULL DEFAULT '0',
  `ispc` int(10) NOT NULL DEFAULT '0',
  `articles` int(10) DEFAULT '0',
  `likes` int(10) NOT NULL DEFAULT '0',
  `price` int(10) DEFAULT '0',
  `state` int(5) DEFAULT '1',
  `readmode` int(5) DEFAULT '1',
  `freeconent` varchar(500) DEFAULT NULL,
   `yuyin` int(5) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fenlei` (`articleclassid`),
  KEY `idandispc` (`id`,`ispc`),
  KEY `ispc` (`ispc`),
   KEY `yuyin` (`yuyin`),
   KEY `state` (`state`),
  KEY `articleclassid` (`articleclassid`),
  KEY `authorid` (`authorid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


#
# Data for table "whatsns_topic"
#

CREATE TABLE IF NOT EXISTS `whatsns_user_notify` (
  `id` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户uid',
  `inbox_permission` int(2) DEFAULT '0' COMMENT '0 全部站内用户 1 关注我的',
  `invite_permission` int(2) DEFAULT '0' COMMENT '0所有人 1关注我的',
  `follow_after_answer` int(2) DEFAULT '1' COMMENT '1自动关注 0 不关注',
  `article` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `like_object` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `bookmark_object` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `follow_object` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `answer` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `comment` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `content_handled` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `comment_reply` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `invite` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `message` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `weekly` int(2) DEFAULT '1' COMMENT '1通知 0不通知',
  `feature_news` int(2) DEFAULT '1' COMMENT '1通知 0不通知'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户通知表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ask_user_notify`
--
ALTER TABLE `whatsns_user_notify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ask_user_notify`
--
ALTER TABLE `whatsns_user_notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
#
# Structure for table "whatsns_topic_likes"
#

CREATE TABLE `whatsns_topic_likes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tid` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `tid` (`tid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_topic_likes"
#


#
# Structure for table "whatsns_topic_tag"
#

CREATE TABLE `whatsns_topic_tag` (
  `aid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(200) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `pinyin` varchar(200) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_topic_tag"
#


#
# Structure for table "whatsns_topic_viewhistory"
#

CREATE TABLE `whatsns_topic_viewhistory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(200) NOT NULL,
  `tid` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `tid` (`tid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_topic_viewhistory"
#


#
# Structure for table "whatsns_topicclass"
#

CREATE TABLE `whatsns_topicclass` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `dir` varchar(200) NOT NULL,
  `pid` int(10) NOT NULL DEFAULT '0',
  `displayorder` int(10) NOT NULL DEFAULT '0',
  `articles` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_topicclass"
#


#
# Structure for table "whatsns_user"
#

CREATE TABLE `whatsns_user` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(18) NOT NULL DEFAULT '',
  `password` char(32) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `groupid` tinyint(3) unsigned NOT NULL DEFAULT '7',
  `credits` int(10) NOT NULL DEFAULT '0',
  `credit1` int(10) NOT NULL DEFAULT '0',
  `credit2` int(10) NOT NULL DEFAULT '0',
  `credit3` int(10) NOT NULL DEFAULT '0',
  `regip` char(15) DEFAULT NULL,
  `regtime` int(10) NOT NULL DEFAULT '0',
  `lastlogin` int(10) unsigned NOT NULL DEFAULT '0',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `bday` date DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `qq` varchar(15) DEFAULT NULL,
  `msn` varchar(40) DEFAULT NULL,
  `authstr` varchar(25) DEFAULT NULL,
  `signature` varchar(300) DEFAULT '',
  `introduction` varchar(200) DEFAULT '网友',
  `questions` int(10) unsigned NOT NULL DEFAULT '0',
  `answers` int(10) unsigned NOT NULL DEFAULT '0',
  `adopts` int(10) unsigned NOT NULL DEFAULT '0',
  `supports` int(10) NOT NULL DEFAULT '0',
  `followers` int(10) NOT NULL DEFAULT '0',
  `attentions` int(10) NOT NULL DEFAULT '0',
  `isnotify` tinyint(1) unsigned NOT NULL DEFAULT '7',
  `elect` int(10) NOT NULL DEFAULT '0',
  `expert` tinyint(2) NOT NULL DEFAULT '0',
  `chuli` int(10) NOT NULL DEFAULT '0',
  `bankcard` varchar(200) NOT NULL DEFAULT '',
  `activecode` varchar(200) DEFAULT NULL,
  `active` int(10) DEFAULT '0',
  `regcity` varchar(200) NOT NULL DEFAULT '',
  `openid` varchar(200) NOT NULL DEFAULT '',
  `mypay` int(10) DEFAULT '0',
  `isblack` int(10) NOT NULL DEFAULT '0',
  `fromsite` int(10) DEFAULT '0',
  `articles` int(10) DEFAULT '0',
  `jine` double NOT NULL DEFAULT '0',
  `hasvertify` int(10) DEFAULT '0',
  `phoneactive` int(10) DEFAULT '0',
  `invatecode` varchar(255) DEFAULT NULL COMMENT '邀请码',
  `frominvatecode` varchar(255) DEFAULT NULL COMMENT '谁邀请注册的',
  `invateusers` int(11) DEFAULT NULL COMMENT '邀请人数',
  `registrationid` varchar(200) DEFAULT NULL,
  `wechatopenid` varchar(200) DEFAULT '',
    `conpanyname` varchar(100) DEFAULT '',
  `truename` varchar(50) DEFAULT '',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


#
# Data for table "whatsns_user"
#


#
# Structure for table "whatsns_user_attention"
#

CREATE TABLE `whatsns_user_attention` (
  `uid` int(10) NOT NULL DEFAULT '0',
  `followerid` int(10) NOT NULL DEFAULT '0',
  `follower` char(18) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`followerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_user_attention"
#


#
# Structure for table "whatsns_user_category"
#

CREATE TABLE `whatsns_user_category` (
  `uid` int(10) NOT NULL DEFAULT '0',
  `cid` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_user_category"
#


#
# Structure for table "whatsns_user_depositmoney"
#

CREATE TABLE `whatsns_user_depositmoney` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `needpay` double NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL,
  `typeid` int(10) NOT NULL DEFAULT '0',
  `fromuid` int(10) NOT NULL DEFAULT '0',
  `state` int(10) NOT NULL DEFAULT '0',
  `touid` int(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_user_depositmoney"
#


#
# Structure for table "whatsns_user_readlog"
#

CREATE TABLE `whatsns_user_readlog` (
  `uid` int(10) NOT NULL DEFAULT '0',
  `qid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_user_readlog"
#


#
# Structure for table "whatsns_user_tixian"
#

CREATE TABLE `whatsns_user_tixian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL DEFAULT '0',
  `jine` double NOT NULL DEFAULT '0',
  `state` int(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  `beizu` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_user_tixian"
#


#
# Structure for table "whatsns_userbank"
#

CREATE TABLE `whatsns_userbank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fromuid` int(10) NOT NULL DEFAULT '0',
  `touid` int(10) NOT NULL DEFAULT '0',
  `operation` varchar(200) NOT NULL,
  `money` int(10) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_userbank"
#



DROP TABLE IF EXISTS `whatsns_usergroup`;
CREATE TABLE `whatsns_usergroup` (
  `groupid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(4) NOT NULL DEFAULT '1' COMMENT '用户级别',
  `grouptitle` char(30) NOT NULL DEFAULT '',
  `grouptype` tinyint(1) NOT NULL DEFAULT '2',
  `creditslower` int(10) NOT NULL DEFAULT '0',
  `creditshigher` int(10) NOT NULL DEFAULT '0',
  `questionlimits` int(10) NOT NULL DEFAULT '0',
  `answerlimits` int(10) NOT NULL DEFAULT '0',
  `credit3limits` int(10) NOT NULL DEFAULT '0',
  `regulars` text NOT NULL,
  `doarticle` int(10) DEFAULT '0',
  `articlelimits` int(10) DEFAULT '1',
  `canfreereadansser` int(10) DEFAULT '0',
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;



INSERT INTO `whatsns_usergroup` VALUES (1,0,'超级管理员',1,0,1,0,0,0,'user/qqlogin,user/register,index/default,category/view,category/list,question/view,category/recommend,note/list,note/view,rss/category,rss/list,rss/question,user/space,user/scorelist,question/search,question/add,gift/default,gift/search,gift/add\r\n',0,1,0),(2,0,'管理员',1,0,1,0,0,0,'user/qqlogin,user/register,index/default,category/view,category/list,question/view,category/recommend,note/list,note/view,rss/category,rss/list,rss/question,user/space,user/scorelist,question/search,question/add,gift/default,gift/search,gift/add\r\n,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(3,0,'分类员',1,0,1,0,0,0,'user/qqlogin,user/register,index/default,category/view,category/list,question/view,category/recommend,note/list,note/view,rss/category,rss/list,rss/question,user/space,user/scorelist,question/search,question/add,gift/default,gift/search,gift/add\r\n,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(6,0,'游客',3,0,1,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,question/answer,user/getpass,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/resetpass,user/getpass,topic/getone,',0,1,0),(7,1,'书童',2,0,80,9,9,5,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(8,2,'书生',2,80,400,5,5,8,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(9,3,'秀才',2,400,800,10,10,10,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(10,4,'举人',2,800,2000,15,15,12,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(11,5,'解元',2,2000,4000,10,10,10,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(12,6,'贡士',2,4000,7000,15,15,20,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(13,7,'会元',2,7000,10000,15,15,20,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(14,8,'同进士出身',2,10000,14000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(15,9,'大学士',2,14000,18000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(16,10,'探花',2,18000,22000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(17,11,'榜眼',2,22000,32000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(18,12,'状元',2,32000,45000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(19,13,'编修',2,45000,60000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(20,14,'府丞',2,60000,100000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(21,15,'翰林学士',2,100000,150000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(22,16,'御史中丞',2,150000,250000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(23,17,'詹士',2,250000,400000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(24,18,'侍郎',2,400000,700000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(25,19,'大学士',2,700000,1000000,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(26,20,'文曲星',2,1000000,400,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog,user/sendcheckmail,user/editemail,question/answer,user/getpass,question/edit,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,index/index,index/default,topic/userxinzhi,user/space_attention,user/space_ask,user/space_answer,user/space,tags/default,tags/index,tags/view,tags/question,tags/article,tags/all,tags/ajaxsearch,new/question,new/default,newpage/index,newpage/catname,newpage/maketag,user/deletexinzhi,user/editxinzhi,user/addxinzhi,topic/weeklist,topic/default,topic/catlist,topic/hotlist,api_user/bindregisterapi,api_user/registerapi,user/register,user/getpass,user/resetpass,user/sendcheckmail,user/editemail,topic/getone,attach/upload,attach/checkattackfile,attach/upimg,attach/uploadimage,attach/uploadimage,attach/watermark,',0,1,0),(27,1,'老师',2,400,999999999,0,0,0,'user/register,user/editimg,index/default,category/view,category/list,question/view,question/follow,topic/default,note/list,note/view,rss/category,rss/list,rss/question,user/scorelist,user/activelist,expert/default,user/qqlogin,gift/default,gift/search,gift/add,question/search,question/add,question/answer,doing/default,user/space_ask,user/space_answer,user/space,answer/append,answer/addcomment,question/edittag,favorite/add,inform/add,question/answercomment,note/addcomment,question/attentto,user/attentto,user/register,user/recommend,user/default,user/score,user/recharge,ebank/aliapyback,ebank/aliapytransfer,user/userbank,user/ask,user/answer,user/follower,user/attention,favorite/default,favorite/delete,question/addfavorite,user/profile,user/uppass,user/editimg,user/saveimg,user/mycategory,user/unchainauth,user/level,attach/uploadimage,question/adopt,question/edit,question/close,question/supply,question/addscore,question/editanswer,question/search,message/send,message/new,message/personal,message/system,message/outbox,message/view,message/remove,message/removedialog',1,10,0);
/*!40000 ALTER TABLE `whatsns_usergroup` ENABLE KEYS */;
#
# Structure for table "whatsns_userlog"
#

CREATE TABLE `whatsns_userlog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sid` varchar(10) NOT NULL DEFAULT '',
  `type` enum('login','ask','answer') NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `time` (`time`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_userlog"
#


#
# Structure for table "whatsns_vertify"
#

CREATE TABLE `whatsns_vertify` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户uid唯一标示',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '认证类型,企业还是个人',
  `name` varchar(200) NOT NULL COMMENT '用户名或者企业名字',
  `id_code` varchar(200) NOT NULL COMMENT '身份证或者企业组织机构代码',
  `jieshao` text NOT NULL COMMENT '认证说明',
  `zhaopian1` varchar(200) NOT NULL COMMENT '身份证或者组织机构代码证',
  `zhaopian2` varchar(200) NOT NULL COMMENT '其它附件照片',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `time` int(10) NOT NULL DEFAULT '0' COMMENT '认证时间',
  `shibaiyuanyin` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_vertify"
#


#
# Structure for table "whatsns_visit"
#

CREATE TABLE `whatsns_visit` (
  `ip` varchar(15) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  KEY `ip` (`ip`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_visit"
#

#
# Structure for table "whatsns_weixin_follower"
#

CREATE TABLE `whatsns_weixin_follower` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `openid` varchar(200) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `headimgurl` varchar(200) NOT NULL,
  `privilege` varchar(200) NOT NULL,
  `unionid` varchar(200) NOT NULL,
  `sex` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_weixin_follower"
#


#
# Structure for table "whatsns_weixin_info"
#

CREATE TABLE `whatsns_weixin_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_weixin_info"
#


#
# Structure for table "whatsns_weixin_keywords"
#

CREATE TABLE `whatsns_weixin_keywords` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `txtname` varchar(200) NOT NULL,
  `txtcontent` varchar(200) NOT NULL,
  `txttype` varchar(200) NOT NULL,
  `showtype` int(10) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `fmtu` varchar(200) NOT NULL,
  `wzid` int(10) NOT NULL DEFAULT '0',
  `wburl` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_weixin_keywords"
#


#
# Structure for table "whatsns_weixin_menu"
#

CREATE TABLE `whatsns_weixin_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(200) NOT NULL,
  `menu_type` varchar(200) NOT NULL,
  `menu_keyword` varchar(200) NOT NULL,
  `menu_link` varchar(200) NOT NULL,
  `menu_pid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_weixin_menu"
#


#
# Structure for table "whatsns_weixin_notify"
#

CREATE TABLE `whatsns_weixin_notify` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `appid` varchar(200) NOT NULL,
  `attach` varchar(200) NOT NULL,
  `bank_type` varchar(50) NOT NULL,
  `cash_fee` varchar(100) NOT NULL,
  `fee_type` varchar(100) NOT NULL,
  `is_subscribe` varchar(50) NOT NULL,
  `mch_id` varchar(200) NOT NULL,
  `nonce_str` varchar(200) NOT NULL,
  `openid` varchar(200) NOT NULL,
  `out_trade_no` varchar(200) NOT NULL,
  `result_code` varchar(200) NOT NULL,
  `return_code` varchar(100) NOT NULL,
  `return_msg` varchar(100) NOT NULL,
  `sign` varchar(200) NOT NULL,
  `time_end` int(10) NOT NULL DEFAULT '0',
  `total_fee` int(10) NOT NULL DEFAULT '0',
  `trade_state` varchar(100) NOT NULL,
  `trade_type` varchar(100) NOT NULL,
  `transaction_id` varchar(200) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `typeid` int(10) NOT NULL DEFAULT '0',
  `touid` int(10) NOT NULL DEFAULT '0',
  `haspay` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_weixin_notify"
#


#
# Structure for table "whatsns_weixin_order"
#

CREATE TABLE `whatsns_weixin_order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `appid` varchar(200) NOT NULL,
  `openid` varchar(200) NOT NULL,
  `mch_id` varchar(200) NOT NULL,
  `is_subscribe` varchar(100) NOT NULL,
  `nonce_str` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `sign` varchar(200) NOT NULL,
  `result_code` varchar(100) NOT NULL,
  `return_code` varchar(100) NOT NULL,
  `return_msg` varchar(100) NOT NULL,
  `trade_type` varchar(100) NOT NULL,
  `code_url` varchar(200) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL,
  `typeid` int(10) NOT NULL DEFAULT '0',
  `money` int(10) NOT NULL DEFAULT '0',
  `touid` int(10) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `prepay_id` varchar(200) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_weixin_order"
#


#
# Structure for table "whatsns_weixin_qiandao"
#

CREATE TABLE `whatsns_weixin_qiandao` (
  `id` int(10) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL DEFAULT '0',
  `username` varchar(200) NOT NULL,
  `type` int(10) NOT NULL DEFAULT '0',
  `money` int(10) NOT NULL DEFAULT '0',
  `location` varchar(200) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_weixin_qiandao"
#


#
# Structure for table "whatsns_weixin_setting"
#

CREATE TABLE `whatsns_weixin_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `wxname` varchar(200) NOT NULL,
  `wxid` varchar(200) NOT NULL,
  `weixin` varchar(200) NOT NULL,
  `appid` varchar(200) NOT NULL,
  `appsecret` varchar(200) NOT NULL,
  `winxintype` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "whatsns_weixin_setting"
#

