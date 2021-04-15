DROP TABLE IF EXISTS `admin_sambangan`;
CREATE TABLE `admin_sambangan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username_admin` varchar(200) NOT NULL,
  `password_admin` varchar(200) NOT NULL,
  `status_admin` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `admin_sambangan` WRITE;
INSERT INTO `admin_sambangan` VALUES (1,'adminsambangan','42e745a0fb69e9513721cd906966820f',0);
UNLOCK TABLES;
