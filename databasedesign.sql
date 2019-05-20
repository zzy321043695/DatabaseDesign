# Host: localhost  (Version: 5.5.53)
# Date: 2019-05-20 12:11:23
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "db_admin"
#

DROP TABLE IF EXISTS `db_admin`;
CREATE TABLE `db_admin` (
  `admin_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0' COMMENT '没有用到',
  `lastlogintime` datetime DEFAULT NULL COMMENT '最后登陆时间',
  `email` varchar(40) DEFAULT '' COMMENT '没有用到',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "db_admin"
#

/*!40000 ALTER TABLE `db_admin` DISABLE KEYS */;
INSERT INTO `db_admin` VALUES (1,'admin','d099d126030d3207ba102efa8e60630a','0','2019-05-16 13:53:26',NULL,'郑振宇',1),(9,'打法','a58c6e89f88356b59b9444d7bc5c3b17','0','0000-00-00 00:00:00','','发',-1),(10,'发士','08bd6182e70b8ef109d2c5050d5ecf80','0','2019-05-12 15:17:41','','啊师傅',1);
/*!40000 ALTER TABLE `db_admin` ENABLE KEYS */;

#
# Structure for table "db_discount"
#

DROP TABLE IF EXISTS `db_discount`;
CREATE TABLE `db_discount` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `discount` float(3,2) unsigned NOT NULL DEFAULT '1.00' COMMENT '折扣的大小',
  `status` tinyint(1) DEFAULT '1' COMMENT '优惠券状态',
  `code` varchar(25) DEFAULT NULL COMMENT '优惠码',
  `user_id` mediumint(6) unsigned DEFAULT NULL COMMENT '获取优惠码的用户',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='优惠码数据表';

#
# Data for table "db_discount"
#

/*!40000 ALTER TABLE `db_discount` DISABLE KEYS */;
INSERT INTO `db_discount` VALUES (1,0.50,-1,'sadghgtewpov',32),(2,1.00,1,'asgfh',NULL),(3,1.00,1,'dfewgw',0),(4,0.75,1,'dsag-epcn-msda',0),(5,0.10,1,'abcdefg',0);
/*!40000 ALTER TABLE `db_discount` ENABLE KEYS */;

#
# Structure for table "db_magazine"
#

DROP TABLE IF EXISTS `db_magazine`;
CREATE TABLE `db_magazine` (
  `magazine_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '',
  `small_title` varchar(30) NOT NULL DEFAULT '',
  `title_font_color` varchar(250) DEFAULT NULL COMMENT '??????ɫ',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `keywords` char(40) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL COMMENT '????????',
  `posids` varchar(250) NOT NULL DEFAULT '',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `copyfrom` varchar(250) DEFAULT NULL COMMENT '??Դ',
  `username` char(20) NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `price` float(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '杂志的单价',
  `forsale` char(1) DEFAULT '0',
  `featured` char(1) DEFAULT '0',
  `classification` smallint(6) DEFAULT '0',
  `type` varchar(25) DEFAULT NULL,
  `magazine_code` varchar(25) DEFAULT NULL,
  `issue_year` varchar(25) DEFAULT NULL,
  `post_code_from` varchar(25) DEFAULT NULL,
  `magazine_type` varchar(25) DEFAULT NULL,
  `price_quarter` float(10,2) unsigned DEFAULT NULL COMMENT '杂志的季度价',
  `price_half_year` float(10,2) unsigned DEFAULT NULL COMMENT '杂志的半年价',
  `price_year` float(10,2) unsigned DEFAULT NULL COMMENT '杂志的全年价',
  PRIMARY KEY (`magazine_id`),
  KEY `status` (`status`,`listorder`,`magazine_id`),
  KEY `listorder` (`catid`,`status`,`listorder`,`magazine_id`),
  KEY `catid` (`catid`,`status`,`magazine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

#
# Data for table "db_magazine"
#

/*!40000 ALTER TABLE `db_magazine` DISABLE KEYS */;
INSERT INTO `db_magazine` VALUES (21,3,'青年文摘','续文利','#ed568b','/upload/2019/04/09/5caca15e90e21.jpg','青年读物','中国青年出版社','',10,1,'0','admin',1457854896,0,110,23.99,'0','0',1,'月刊','CN62-1118/Z','2019','48-21','杂志',NULL,NULL,NULL),(22,12,'读者','吉西平','','/upload/2019/05/13/5cd94951bd326.jpg','最受欢迎的杂志','兰州市邮政局发报刊组','',10,1,'0','admin',1457855362,0,140,18.00,'1','0',2,'半月刊','CN62-1118/Z','2019','54-17','杂志',NULL,NULL,NULL),(23,3,'中国衣冠专辑','周立波','#5674ed','/upload/2019/04/09/5cac95f43b5bd.jpg','非常好看的杂志！','新华出版社','',16,1,'0','admin',1457855680,0,101,29.88,'0','1',3,'半月刊','CN32-1534/Z','2019','48-23','杂志',NULL,NULL,NULL),(24,3,'知音','郝培文','#ed568b','/upload/2019/04/09/5cac9e8e3ce50.jpg','排名第一的情感杂志','知音集团','',40,1,'0','admin',1457856460,0,243,17.99,'1','1',1,'月刊','CN89-4521/D','2019','45-69','杂志',NULL,NULL,NULL),(25,3,'环球科学杂志','陈宗周','#5674ed','/upload/2019/04/09/5cac98be49dc5.jpg','严谨有趣的科学读物','环球科学杂志社有限公司','',50,0,'0','admin',1554532821,0,104,5.68,'0','1',2,'半月刊','CN16-4851/Y','2019','59-48','杂志',NULL,NULL,NULL),(26,3,'南方周末','向熹','#ed568b','/upload/2019/04/09/5caca29d2ca5b.jpg','在这里，读懂中国','南方报业传媒集团','',30,1,'0','admin',1554817861,0,154,3.85,'0','0',0,'周刊','CN56-1543/Z','2019','36-15','报纸',NULL,NULL,NULL),(39,12,'半月谈','无','#5674ed','/upload/2019/05/09/5cd4003533cb4.jpg','中共中央宣传部根据新时期加强基层思想政治工作','中共中央宣传部委托新华通讯社','',15,1,'0','admin',1557397992,0,8,8.50,'0','0',0,'半月刊','CN62-1828/Z','2019','48-26','杂志',NULL,NULL,NULL),(40,12,'健康时报','无','#ed568b','/upload/2019/05/13/5cd9166f7a47a.jpg','健康时报','北京市发报刊局','',0,1,'0','admin',1557721308,0,0,10.00,'0','0',0,'季刊','CN11-0218','2019','1-51','报纸',NULL,NULL,NULL),(41,12,'经济观察报','无','','/upload/2019/05/13/5cd94c0fbbbe5.gif','经济观察报','济南市邮政局报刊发行','',0,1,'0','admin',1557728797,0,1,30.50,'0','0',0,'月刊','23-327','2019','CN37-0027','报纸',NULL,NULL,NULL),(42,12,'集邮','无','#5674ed','/upload/2019/05/13/5cd916356f30e.jpg','集邮','北京市发报刊局','',0,1,'3','admin',1557728960,0,15,15.00,'0','0',0,'半月刊','CN11-1641/G8','2019','2-222','杂志',NULL,NULL,NULL),(43,3,'儿童文学','无','','/upload/2019/05/13/5cd94ba432386.jpg','儿童文学','北京市发报刊局','',0,1,'0','admin',1557729403,0,2,9.50,'0','0',0,'旬刊','CN11-1065/I','2019','2-156','杂志',NULL,NULL,NULL),(44,3,'新华每日电讯','无','','/upload/2019/05/13/5cd94ad2a063f.png','新华每日电讯','北京市发报刊局','',0,1,'0','admin',1557731027,0,1,2.50,'0','0',0,'日报','CN11-0209','2019','1-19','报纸',NULL,NULL,NULL),(45,3,'中国国家地理','无','#ed568b','/upload/2019/05/13/5cd91717dc3f5.jpg','中国国家地理','北京市发报刊局','',0,1,'0','admin',1557731126,0,7,23.00,'0','0',0,'半月刊','CN11-4542/P','2019','2-806','杂志',NULL,NULL,NULL),(46,12,'故事会','无','','/upload/2019/05/13/5cd9489fb9983.jpg','故事会','上海市报刊发行局发报','',0,1,'0','admin',1557743326,0,15,5.00,'0','0',0,'周刊','CN31-1127/I','2019','4-225','杂志',NULL,NULL,NULL),(47,12,'瞭望新闻周刊','无','','/upload/2019/05/13/5cd9478a113b1.jpg','瞭望新闻周刊','北京市发报刊局','',12,1,'0','admin',1557743632,0,3,6.80,'0','0',0,'月刊','CN11-1276/D','2019','2-512','杂志',NULL,NULL,NULL);
/*!40000 ALTER TABLE `db_magazine` ENABLE KEYS */;

#
# Structure for table "db_magazine_content"
#

DROP TABLE IF EXISTS `db_magazine_content`;
CREATE TABLE `db_magazine_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `magazine_id` mediumint(8) unsigned NOT NULL,
  `content` mediumtext NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `news_id` (`magazine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

#
# Data for table "db_magazine_content"
#

/*!40000 ALTER TABLE `db_magazine_content` DISABLE KEYS */;
INSERT INTO `db_magazine_content` VALUES (7,17,'&lt;p&gt;\r\ngsdggsgsgsgsg\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\nsgsg\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\ngsdgsg \r\n&lt;/p&gt;\r\n&lt;p style=&quot;text-align:center;&quot;&gt;\r\n       ggg\r\n&lt;/p&gt;',1455756856,0),(8,18,'&lt;p&gt;\r\n',1455756999,0),(9,19,'111',1456673467,0),(10,20,'111',1456674909,0),(11,21,'&lt;div class=&quot;para&quot; style=&quot;color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-weight:400;background-color:#FFFFFF;&quot;&gt;\r\n\t《青年文摘》由共青团中央主管、中国青年出版社主办，创刊于1981年1月，自2000年起改为半月刊，是中国发行量最大的青年杂志，单期发行145-150万册。 《青年文摘》是一本面向全国、以青少年为核心读者群的文摘类综合刊物，刊物集萃来自报纸、期刊、图书等大众媒体的名篇佳作，旨在为青少年打造一个丰富生动、健康向上的精神空间。刊物分上下半月刊（上半月刊红版，下半月刊绿版）、彩版（ 半月刊 ）。数字产品有《青年文摘·快点》《青年文摘手机报》《青年文摘·播》青年文摘官方网站以及微博、微信等。&amp;nbsp;&lt;br /&gt;\r\n2018年3月，获得第三届全国“百强报刊”荣誉。&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;',1457854896,0),(12,22,'&lt;div class=&quot;para&quot; style=&quot;color:#333333;font-size:14px;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;&quot;&gt;\r\n\t《读者》，原名《读者文摘》，是由读者出版传媒股份有限公司主办的中文版半月刊物。&lt;br /&gt;\r\n《读者》杂志发掘人性中的真、善、美，体现人文关怀。《读者》在刊物内容及形式方面与时俱进，追求高品位、高质量，力求精品，并以其形式和内容的丰富性及多样性，赢得了各个年龄段和不同阶层读者的喜爱与拥护。发行量稳居中国期刊排名第一，亚洲期刊排名第一，世界综合性期刊排名第四。被誉为“中国人的心灵读本”、“中国期刊第一品牌”。&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;',1457855362,0),(13,23,'《中华遗产》杂志于2004年创刊，最初由中华书局主办，中华人民共和国建设部、国家文物局、中国联合国教科文组织全国委员会联合协办，世界自然与文化遗产基金会、中国民俗摄影协会、联合国教科文组织北京代表处支持的中国第一份全面、系统、深入的遗产行业类杂志。2008年，《中华遗产》杂志正式与《中国国家地理》杂志合作，杂志由原先的零碎文章组合模式转变为重视大策划、大主题的期刊。&lt;br /&gt;\r\n改版后的杂志组织了“最中国汉字”、“最具中华文明意义的百项考古发现”等颇具影响力的评选活动。&amp;nbsp;&lt;br /&gt;\r\n中华遗产是 一本从历史的角度重新认识中国与世界的杂志 一本传播人文之美探寻中华宝藏的杂志 一本给喜欢阅读热爱历史的读者的精品杂志 一本值得珍藏永不过时的权威性杂志 凡是发生在昨天的有价值的事情，都是我们的内容； 凡是您感兴趣的历史，都是我们关注的对象。&lt;br /&gt;\r\n秘密，就在这里揭开！&lt;br /&gt;\r\n&lt;div&gt;\r\n\t&lt;br /&gt;\r\n&lt;/div&gt;',1457855680,0),(14,24,'&lt;p&gt;\r\n\t《知音》是创刊于1985年1月的情感类杂志，杂志售价5元。\r\n&lt;/p&gt;\r\n&lt;div class=&quot;para&quot; style=&quot;color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-weight:400;background-color:#FFFFFF;&quot;&gt;\r\n\t&lt;br /&gt;\r\n&lt;/div&gt;',1457856460,0),(15,25,'&lt;div class=&quot;para&quot; style=&quot;color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-weight:400;background-color:#FFFFFF;&quot;&gt;\r\n\t《环球科学》是《科学美国人》的中文版，超过70%的文章来自《科学美国人》英文版和其他版本，适合高科技企业管理者、专业技术人才、科研工作者、教师、以及所有科学爱好者阅读。&lt;br /&gt;\r\n《环球科学》是一本以普及科学知识、培育民族科学精神为宗旨，以立足中国、人文视角、实用导向为编辑方针的科普读物。&lt;br /&gt;\r\n《环球科学》力求文风活泼轻松，语言简明易懂，及时报道全球最新科学成果以及科技对人类未来商业、文化、伦理和政治等方面的深刻影响。&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;',1554532821,0),(16,26,'《南方周末》由南方报业传媒集团主办，创刊于1984年2月11日，以“反映社会，服务改革，贴近生活，激浊扬清”为特色；以“关注民生，彰显爱心，维护正义，坚守良知”为己责；将思想性、知识性和趣味性熔于一炉，寓思想教育于谈天说地之中。&lt;br /&gt;',1554817861,0),(17,39,'&lt;div class=&quot;para&quot; style=&quot;color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-weight:400;background-color:#FFFFFF;&quot;&gt;\r\n\t《半月谈》是中共中央宣传部根据新时期加强基层思想政治工作的需要，委托新华社主办的、面向基层读者的党刊，被中华人民共和国教育部自考办指定为全国高等教育自学考试时政参考读物，被誉为“中华第一刊”。&amp;nbsp;&lt;br /&gt;\r\n2018年7月半月谈网显示，《半月谈》杂志社共有51人、新媒体中心共有21人。&lt;br /&gt;\r\n据2018年7月18日维普网显示，《半月谈》作品数为8897篇、被引量为463、H指数为7。据《中文科技期刊评价报告》显示，2016年，《半月谈》影响因子为0.0118、立即指数为0.0094。&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;',1557397992,0),(18,40,'&lt;span style=&quot;font-family:Arial, Helvetica, sans-serif, 新宋体;&quot;&gt;《健康时报》由人民日报社主管主办，创刊于2000年1月6日，4开24版，以“健康生活”为核心内容，贴近生活，服务群众，以做中国人的健康顾问为己任。&lt;/span&gt;',1557721308,0),(19,41,'&lt;span style=&quot;color:#000000;font-family:Arial, Helvetica, sans-serif, 新宋体;font-size:12px;font-style:normal;font-weight:400;&quot;&gt;洞悉经济大势，把握商业机会! 《经济观察报》作为中国公认最具影响力的纸质经济媒体之一，是中国主流商业思想最重要的传播平台。报刊主要栏目介绍: 要闻版组、城市版组、市场版组、公司版组、汽车版组、地产版组、观察家版组、书评版组。&lt;/span&gt;',1557728797,0),(20,42,'&lt;span style=&quot;color:#000000;font-family:Arial, Helvetica, sans-serif, 新宋体;font-size:12px;font-style:normal;font-weight:400;&quot;&gt;《集邮》杂志——全球发行量最大的邮刊，《集邮》杂志1955年1月由人民邮电出版社创刊，是新中国第一份公开发行的集邮媒体。1982年1月，《集邮》成为中华全国集邮联合会会刊。 50多年来，《集邮》杂志始终坚持为广大集邮者服务的宗旨，以及时的信息、丰富的知识、生动的趣味、深入的研究、充实的史料和精美&lt;/span&gt;',1557728960,0),(21,43,'&lt;span style=&quot;color:#000000;font-family:Arial, Helvetica, sans-serif, 新宋体;font-size:12px;font-style:normal;font-weight:400;&quot;&gt;原创文学，一流品味；学习良友，作家摇蓝；享受阅读，雅俗共赏；完善人格，培养情商。&lt;/span&gt;',1557729403,0),(22,44,'&lt;span style=&quot;color:#000000;font-family:Arial, Helvetica, sans-serif, 新宋体;font-size:12px;font-style:normal;font-weight:400;&quot;&gt;《新华每日电讯》是新华社主管主办的中央主流时政大报。报纸创刊于1993年，最近几年逆势上扬，连续保持160万份以上的发行量。&lt;/span&gt;',1557731027,0),(23,45,'&lt;span style=&quot;color:#000000;font-family:Arial, Helvetica, sans-serif, 新宋体;font-size:12px;font-style:normal;font-weight:400;&quot;&gt;《中国国家地理》由中科院主管、主办，创刊于1950年，一直恪守内容为王的办刊理念，用精准、精彩、精炼的图文语言，讲述社会热点、难点、疑点话题背后的地理科学故事，不仅让读者欣赏中华天地之大美，更为国人构建国家形象，凝聚家国情怀&lt;/span&gt;',1557731126,0),(24,46,'&lt;span style=&quot;color:#000000;font-family:Arial, Helvetica, sans-serif, 新宋体;font-size:12px;font-style:normal;font-weight:400;&quot;&gt;《故事会》面向大众，贴近生活。她以发表反映我国当代社会生活的故事为主，同时兼收各类民间故事和外国故事。在坚持故事文学特点的基础上塑造人物形象，提高艺术美感，力求口头性与文学性的完美结合，努力使每一篇作品都能读、能讲和能传。&lt;/span&gt;',1557743327,0),(25,47,'&lt;span style=&quot;color:#000000;font-family:Arial, Helvetica, sans-serif, 新宋体;font-size:12px;font-style:normal;font-weight:400;&quot;&gt;《瞭望》新闻周刊是1981年经邓小平同志亲自批准创办的新中国最早的新闻周刊。 多年来，《瞭望》新闻周刊密切对接中央高层决策，深度解析重大时事内情，以其难以替代和难以模仿的权威性报道，在党和政府决策中发挥了“思想库”和“智囊团”的作用&lt;/span&gt;',1557743632,0);
/*!40000 ALTER TABLE `db_magazine_content` ENABLE KEYS */;

#
# Structure for table "db_menu"
#

DROP TABLE IF EXISTS `db_menu`;
CREATE TABLE `db_menu` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT '0',
  `m` varchar(20) NOT NULL DEFAULT '',
  `c` varchar(20) NOT NULL DEFAULT '',
  `f` varchar(20) NOT NULL DEFAULT '',
  `data` varchar(100) NOT NULL DEFAULT '',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`),
  KEY `listorder` (`listorder`),
  KEY `parentid` (`parentid`),
  KEY `module` (`m`,`c`,`f`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

#
# Data for table "db_menu"
#

/*!40000 ALTER TABLE `db_menu` DISABLE KEYS */;
INSERT INTO `db_menu` VALUES (1,'菜单管理',0,'admin','menu','index','',10,1,1),(3,'趣味杂志',0,'home','cat','index','',3,1,0),(6,'杂志管理',0,'admin','content','index','',9,1,1),(9,'推荐位管理',0,'admin','position','index','',4,1,1),(10,'推荐位内容管理',0,'admin','positioncontent','index','',1,1,1),(11,'网站管理',0,'admin','basic','index','',0,1,1),(12,'生活休闲',0,'home','cat','index','',0,1,0),(13,'后台用户管理',0,'admin','admin','index','',0,1,1),(17,'前端用户管理',0,'admin','userManager','index','',0,1,1),(18,'优惠券管理',0,'admin','discount','index','',0,1,1),(19,'订单管理',0,'admin','orderManager','index','',0,1,1);
/*!40000 ALTER TABLE `db_menu` ENABLE KEYS */;

#
# Structure for table "db_order"
#

DROP TABLE IF EXISTS `db_order`;
CREATE TABLE `db_order` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `magazine_id` mediumint(8) unsigned NOT NULL,
  `magazine_name` varchar(80) NOT NULL DEFAULT '',
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL COMMENT '订阅的更新时间',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `price` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  `total_price` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  `start_time` date DEFAULT NULL COMMENT '订阅起始时间',
  `end_time` date DEFAULT NULL COMMENT '订阅结束时间',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '订单状态，0为已完成，1为未完成',
  `state` varchar(25) DEFAULT '未处理' COMMENT '订单处理到哪一步',
  `total_issues` int(10) NOT NULL DEFAULT '1' COMMENT '订阅的期数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "db_order"
#

/*!40000 ALTER TABLE `db_order` DISABLE KEYS */;
INSERT INTO `db_order` VALUES (44,32,'zzy',26,'南方周末',1,'2019-05-13 00:04:22',NULL,'/upload/2019/04/09/5caca29d2ca5b.jpg',3.85,13.20,'2019-05-14','2019-05-31',1,'未处理',3),(45,32,'zzy',26,'南方周末',1,'2019-05-13 11:44:00',NULL,'/upload/2019/04/09/5caca29d2ca5b.jpg',3.85,12.65,'2019-05-14','2019-05-30',1,'未处理',3),(46,32,'zzy',26,'南方周末',1,'2019-05-13 11:46:27',NULL,'/upload/2019/04/09/5caca29d2ca5b.jpg',3.85,6.60,'2019-05-14','2019-05-31',1,'未处理',3),(47,32,'zzy',26,'南方周末',1,'2019-05-13 11:52:56',NULL,'/upload/2019/04/09/5caca29d2ca5b.jpg',3.85,6.60,'2019-05-14','2019-05-31',1,'未处理',3),(48,51,'zk',26,'南方周末',1,'2019-05-13 12:09:50',NULL,'/upload/2019/04/09/5caca29d2ca5b.jpg',3.85,7.70,'2019-05-24','2019-05-31',1,'未处理',2),(49,32,'zzy',42,'集邮',3,'2019-05-13 16:32:47',NULL,'/upload/2019/05/13/5cd916356f30e.jpg',15.00,96.00,'2019-05-14','2019-05-31',1,'未处理',2),(50,32,'zzy',42,'集邮',2,'2019-05-13 16:43:26',NULL,'/upload/2019/05/13/5cd916356f30e.jpg',15.00,62.00,'2019-05-15','2019-05-31',1,'未处理',2),(51,32,'zzy',25,'环球科学杂志',1,'2019-05-13 16:53:39',NULL,'/upload/2019/04/09/5cac98be49dc5.jpg',99.99,213.31,'2019-05-14','2019-05-31',1,'未处理',2),(52,32,'zzy',22,'读者',1,'2019-05-13 16:57:38',NULL,'/upload/2019/04/09/5cac9ff6e98f1.jpg',18.00,38.40,'2019-05-14','2019-05-31',1,'未处理',2),(53,32,'zzy',42,'集邮',1,'2019-05-13 17:00:33',NULL,'/upload/2019/05/13/5cd916356f30e.jpg',15.00,32.00,'2019-05-14','2019-05-31',1,'未处理',2),(54,32,'zzy',23,'中国衣冠专辑',1,'2019-05-13 17:00:33',NULL,'/upload/2019/04/09/5cac95f43b5bd.jpg',29.88,59.76,'2019-05-14','2019-05-29',1,'未处理',2),(55,32,'zzy',24,'知音',5,'2019-05-13 18:25:39',NULL,'/upload/2019/04/09/5cac9e8e3ce50.jpg',17.99,140.92,'2019-05-14','2019-05-31',1,'已投递',1),(56,32,'zzy',23,'中国衣冠专辑',2,'2019-05-13 18:25:39',NULL,'/upload/2019/04/09/5cac95f43b5bd.jpg',29.88,243.02,'2019-05-14','2019-06-30',1,'已投递',4),(57,32,'zzy',45,'中国国家地理',4,'2019-05-13 21:56:57',NULL,'/upload/2019/05/13/5cd91717dc3f5.jpg',23.00,196.27,'2019-05-14','2019-05-31',1,'未处理',2),(58,53,'ccc',22,'读者',1,'2019-05-14 19:17:57',NULL,'/upload/2019/05/13/5cd94951bd326.jpg',18.00,456.00,'2019-05-15','2020-05-14',1,'第一期已投递',25),(59,52,'111',39,'半月谈',3,'2019-05-14 20:09:02',NULL,'/upload/2019/05/09/5cd4003533cb4.jpg',8.50,646.00,'2019-05-15','2020-05-14',1,'第一期已出仓',25),(60,52,'111',22,'读者',5,'2019-05-14 20:14:26',NULL,'/upload/2019/05/13/5cd94951bd326.jpg',18.00,2280.00,'2020-05-14','2021-05-14',1,'已签收12期',25),(61,52,'111',22,'读者',3,'2019-05-14 21:27:54',NULL,'/upload/2019/05/13/5cd94951bd326.jpg',18.00,2674.80,'2019-05-24','2021-05-21',1,'未处理',49),(62,32,'zzy',22,'读者',2,'2019-05-16 15:12:23',NULL,'/upload/2019/05/13/5cd94951bd326.jpg',18.00,69.60,'2019-05-17','2019-05-31',1,'已投递',1);
/*!40000 ALTER TABLE `db_order` ENABLE KEYS */;

#
# Structure for table "db_position"
#

DROP TABLE IF EXISTS `db_position`;
CREATE TABLE `db_position` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` char(100) DEFAULT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "db_position"
#

/*!40000 ALTER TABLE `db_position` DISABLE KEYS */;
INSERT INTO `db_position` VALUES (2,'首位大图位',1,'首位',1455634715,0),(3,'中间小图推荐',1,'中间的小图推荐',1456665873,0),(5,'右下侧推荐',1,'外链广告位推荐',1457873143,0);
/*!40000 ALTER TABLE `db_position` ENABLE KEYS */;

#
# Structure for table "db_position_content"
#

DROP TABLE IF EXISTS `db_position_content`;
CREATE TABLE `db_position_content` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(5) unsigned NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) DEFAULT NULL,
  `magazine_id` mediumint(8) unsigned NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

#
# Data for table "db_position_content"
#

/*!40000 ALTER TABLE `db_position_content` DISABLE KEYS */;
INSERT INTO `db_position_content` VALUES (23,2,'test','/upload/2016/03/06/56dbdc0c483af.JPG',NULL,17,1,-1,1455756856,0),(24,2,'','/upload/2016/03/06/56dbdc015e662.JPG',NULL,18,2,-1,1455756999,0),(25,3,'test','/upload/2016/03/06/56dbdc0c483af.JPG',NULL,17,0,-1,1455756856,0),(26,2,'ss','/upload/2016/03/07/56dcbce02cab9.JPG','http://sina.com.cn',0,0,-1,1457306890,0),(27,2,'','/upload/2016/03/07/56dcc0158f70e.JPG','',18,0,-1,1457306930,0),(28,2,'ϰ','/upload/2016/03/13/56e519a185c93.png',NULL,21,0,-1,1457854896,0),(29,3,'中国衣冠','/upload/2019/04/09/5caca94041349.jpg','',23,12,1,1457855362,0),(30,3,'','/upload/2016/03/13/56e51cbd34470.png',NULL,23,0,-1,1457855680,0),(31,3,'','/upload/2016/03/13/56e51fc82b13a.png',NULL,24,0,-1,1457856460,0),(32,5,'中国邮政订报','/upload/2019/05/13/5cd94e0715c95.png','http://read.11185.cn/index.do',0,1,1,1457873220,0),(33,3,'singwa','/upload/2019/04/09/5caca77f7778c.jpg','',25,2,-1,1457873435,0),(34,2,'南方周末','/upload/2019/04/09/5caca72a27aaf.jpg','http://magazine.com/index.php?c=detail&id=26',26,0,1,1457854896,0),(35,5,'打法','/upload/2019/04/09/5cacaa9495f22.jpg','http://www.nfpeople.com/',0,0,1,1457856460,0),(36,3,'推荐位标题','/upload/2019/04/09/5caca8985a9c8.jpg','http://enrz.com/',0,0,1,1554533017,0),(37,3,'知音','/upload/2019/04/09/5caca7cb5fbd6.jpg','',24,0,1,1457855680,0),(38,3,'读者','/upload/2019/04/09/5cac9ff6e98f1.jpg',NULL,0,0,1,1457855362,0),(39,2,'读者','/upload/2019/04/09/5cac9ff6e98f1.jpg',NULL,22,0,-1,1457855362,0),(40,3,'中国国家地理','/upload/2019/05/13/5cd91717dc3f5.jpg',NULL,45,0,1,1557731126,0),(41,2,'读者','/upload/2019/05/13/5cd94951bd326.jpg',NULL,22,0,1,1457855362,0),(42,3,'青年文摘','/upload/2019/04/09/5caca15e90e21.jpg',NULL,21,0,1,1457854896,0),(43,3,'环球科学杂志','/upload/2019/04/09/5cac98be49dc5.jpg',NULL,25,0,1,1554532821,0);
/*!40000 ALTER TABLE `db_position_content` ENABLE KEYS */;

#
# Structure for table "db_subscription"
#

DROP TABLE IF EXISTS `db_subscription`;
CREATE TABLE `db_subscription` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `magazine_id` mediumint(8) unsigned NOT NULL,
  `magazine_name` varchar(80) NOT NULL DEFAULT '',
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL COMMENT '订阅的更新时间',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `price` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  `total_price` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

#
# Data for table "db_subscription"
#

/*!40000 ALTER TABLE `db_subscription` DISABLE KEYS */;
INSERT INTO `db_subscription` VALUES (24,39,'zzy3',22,'读者',3,'0000-00-00 00:00:00','0000-00-00 00:00:00','/upload/2019/04/09/5cac9ff6e98f1.jpg',18.00,54.00),(26,39,'zzy3',24,'知音',4,'0000-00-00 00:00:00','0000-00-00 00:00:00','/upload/2019/04/09/5cac9e8e3ce50.jpg',17.99,71.96),(28,37,'zk3',26,'南方周末',6,'0000-00-00 00:00:00','0000-00-00 00:00:00','/upload/2019/04/09/5caca29d2ca5b.jpg',3.85,23.10),(30,37,'zk3',23,'中国衣冠专辑',3,'0000-00-00 00:00:00','0000-00-00 00:00:00','/upload/2019/04/09/5cac95f43b5bd.jpg',29.88,89.64),(58,51,'zk',22,'读者',1,NULL,NULL,'/upload/2019/05/13/5cd94951bd326.jpg',18.00,18.00);
/*!40000 ALTER TABLE `db_subscription` ENABLE KEYS */;

#
# Structure for table "db_user"
#

DROP TABLE IF EXISTS `db_user`;
CREATE TABLE `db_user` (
  `user_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0',
  `lastlogintime` datetime DEFAULT NULL COMMENT '最后登陆时间',
  `phone_number` varchar(40) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `address` varchar(50) NOT NULL DEFAULT '',
  `post_number` varchar(50) NOT NULL DEFAULT '',
  `isOnline` tinyint(1) unsigned DEFAULT '0' COMMENT '是否在线，1在线，0不在线',
  PRIMARY KEY (`user_id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

#
# Data for table "db_user"
#

/*!40000 ALTER TABLE `db_user` DISABLE KEYS */;
INSERT INTO `db_user` VALUES (32,'zzy','410965c15b667986a7c440a5ad257148','0','2019-05-16 15:11:13','13662156253','郑振宇',1,'北洋园','300350',1),(37,'zk3','410965c15b667986a7c440a5ad257148','0','2019-05-12 14:58:45','12345678945','发士',1,'的发生','456489',0),(39,'zzy3','410965c15b667986a7c440a5ad257148','0','2019-05-10 10:30:45','13662156253','郑振宇',1,'北洋园','300350',0),(40,'zf','410965c15b667986a7c440a5ad257148','0','2019-05-04 10:30:23','13662156253','周飞',1,'北洋园','300350',0),(42,'zk31','08bd6182e70b8ef109d2c5050d5ecf80','0','2019-05-12 14:50:24','','',1,'','',0),(43,'zf7','410965c15b667986a7c440a5ad257148','0','2019-05-04 10:30:23','','',1,'','',0),(44,'zf6','410965c15b667986a7c440a5ad257148','0','2019-04-26 10:30:23','','',1,'','',0),(45,'zf5','410965c15b667986a7c440a5ad257148','0','2019-04-13 10:30:23','','',1,'','',0),(46,'zf4','410965c15b667986a7c440a5ad257148','0','2019-05-12 10:30:23','','',1,'','',0),(47,'zf3','410965c15b667986a7c440a5ad257148','0','2019-05-12 10:30:23','','',1,'','',0),(48,'zf2','410965c15b667986a7c440a5ad257148','0','2019-05-12 10:30:23','','',1,'','',0),(49,'zf1','410965c15b667986a7c440a5ad257148','0','2019-05-12 10:30:23','','',1,'','',0),(50,'','410965c15b667986a7c440a5ad257148','0','2019-05-11 10:30:23','','',1,'','',0),(51,'zk','08bd6182e70b8ef109d2c5050d5ecf80','0','2019-05-15 23:23:52','18002121722','zhen',1,'tifds12','123456',0),(52,'111','8cc98fd6101c444b0100bf51075948ad','0','2019-05-14 21:27:12','03016216053','亮亮',1,'A508','123456',0),(53,'ccc','4b0755d36846bf8c28c863c68ba17277','0',NULL,'12345678901','对',1,'天津','000000',0);
/*!40000 ALTER TABLE `db_user` ENABLE KEYS */;
