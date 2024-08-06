<?php
	if (!defined("IS_INCLUDE"))
	    die();

    //06051982 CONEXÕES DO BANCO;
    define('DB_NAME_PORTAL',"db_persona");
    define('DB_HOST_PORTAL',"mysql");
    define('DB_USER_PORTAL',$_ENV['MYSQL_USER']);
    define('DB_PASSWD_PORTAL',$_ENV['MYSQL_PASS']);

    //Sql server Totvs
    define('DB_HOST_SQL', "172.18.0.2");//IP PRECISA PEGAR DE DENTRO DO CONTAINER EM INSPECTOR, "IPAddress": "172.19.0.3",
    define('DB_USER_SQL', "sa");
    define('DB_PASS_SQL', "Cg5020@1223");
    define('DB_NAME_SQL', "master");

?>

