CREATE TABLE `insta_publicacion` (
  `id` char(20) NOT NULL DEFAULT '',
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` longtext,
  `url` varchar(60) DEFAULT NULL,
  `comentarios` int(11) DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  `video` tinyint(1) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;