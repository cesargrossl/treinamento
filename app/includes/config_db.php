<?php
	if (!defined("IS_INCLUDE"))
	    die();

    //06051982 CONEXÕES DO BANCO;
    define('DB_NAME_PORTAL',"db_teste");
    define('DB_HOST_PORTAL',"mysql");
    define('DB_USER_PORTAL',$_ENV['MYSQL_USER']);
    define('DB_PASSWD_PORTAL',$_ENV['MYSQL_PASS']);

    //Sql server Totvs
    define('DB_HOST_SQL', "localhost:1433");
    define('DB_USER_SQL', "sa");
    define('DB_PASS_SQL', "Cg5020@1223");
    define('DB_NAME_SQL', "master");

?>

