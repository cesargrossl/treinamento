

CREATE DATABASE `db_persona`;
USE `db_persona`;


DROP TABLE IF EXISTS `tb_usuarios`;

CREATE TABLE tb_usuarios( 
    usu_id INT(11) PRIMARY KEY AUTO_INCREMENT, 
    usu_nome VARCHAR(150) DEFAULT '', 
    usu_login VARCHAR(50) DEFAULT '', 
    usu_senha VARCHAR(200) DEFAULT '' 
)

