

CREATE DATABASE `db_teste`;
USE `db_teste`;


DROP TABLE IF EXISTS `tb_teste`;

CREATE TABLE `tb_teste` (
  `tes_id` int(11) NOT NULL AUTO_INCREMENT,
  `tes_descricao` varchar(50) DEFAULT "",
  PRIMARY KEY (`tes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `tb_teste` WRITE;

INSERT INTO `tb_teste` (tes_descricao) VALUES ('Teste Docker Cesar Grossl');

UNLOCK TABLES;
