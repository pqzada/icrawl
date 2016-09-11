CREATE TABLE `insta_usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_instagram` int(11) NOT NULL,
  `cuenta` char(20) NOT NULL DEFAULT '',
  `nombre` varchar(40) DEFAULT NULL,
  `url` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;