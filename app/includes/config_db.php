<?php
	if (!defined("IS_INCLUDE"))
	    die();

    //06051982 CONEXÕES DO BANCO;
    define('DB_NAME_PORTAL',"db_teste");
    define('DB_HOST_PORTAL',"mysql");
    define('DB_USER_PORTAL',$_ENV['MYSQL_USER']);
    define('DB_PASSWD_PORTAL',$_ENV['MYSQL_PASS']);

    //Sql server Totvs
    define('DB_HOST_SQL', "");
    define('DB_USER_SQL', "");
    define('DB_PASS_SQL', "");
    define('DB_NAME_SQL', "");

?>

