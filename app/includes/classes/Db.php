<?php
if (!defined("IS_INCLUDE"))
	die();

class DB {
	private $host;
	private $db;
	private $user;
	private $password;
	private $consql;
	private $consulta;
	private $connportal;
	//06051982 ABRE CONEXAO;
	public function AbreConexao($conexao="portal", $db_name = "",$db_host = "",$db_user = "",$db_passwd = ""){
		if($conexao == 'portal'){
			$db_name = $db_name ? $db_name : DB_NAME_PORTAL;
			$this->db = $db_name;
			$db_host = $db_host ? $db_host : DB_HOST_PORTAL;
			$this->host = $db_host;
			$db_user = $db_user ? $db_user : DB_USER_PORTAL;
			$this->user = $db_user;
			$db_passwd = $db_passwd ? $db_passwd : DB_PASSWD_PORTAL;
			$this->password = $db_passwd;
			$dbhost = 'mysql:host='.$this->host.';dbname='.$this->db;
			try {
				$dbportal = new PDO($dbhost, $this->user, $this->password);
				$dbportal->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->connportal = $dbportal;
			}
			catch (PDOException $e) {
				$e->getMessage();
				return false;
			}
		}elseif($conexao == 'totvs'){
			
			$db_name = $db_name ? $db_name : DB_NAME_SQL;
			$this->db = $db_name;
			$db_host = $db_host ? $db_host : DB_HOST_SQL;
			$this->host = $db_host;
			$db_user = $db_user ? $db_user : DB_USER_SQL;
			$this->user = $db_user;
			$db_passwd = $db_passwd ? $db_passwd : DB_PASS_SQL;
			$this->password = $db_passwd;
            $dsn_sql = 'dblib:host='.$this->host.';dbname='.$this->db.';charset=LATIN-1';
            try {
    			$dbh_sql = new PDO($dsn_sql, $this->user, $this->password);
				$dbh_sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			$this->consql = $dbh_sql;
				
    		}
    		catch ( PDOException $e ) {
    			echo $e->getMessage();
				return false;
    		}
		}
	}
	//06051982 FECHA CONEXAO;
	public function FechaConexao($conexao='portal'){
		if($conexao == 'portal'){
			$this->connportal = null;
		}elseif($conexao == 'totvs'){
			$this->consql = null;
		}
	}
	//06051982 SELECT FAZER POR AQUI;
	public function select($query, $conexao="portal") {
		//echo $this->consql; die;
		if($conexao == 'totvs'){
			$this->query("SET ANSI_NULLS ON", $conexao);
			$this->query("SET ANSI_WARNINGS ON", $conexao);
		}
		
		$this->consulta = $query;
		try {
			if($conexao == 'totvs'){
				$query = $this->consql->prepare($this->consulta);
			}else{
				$query = $this->connportal->prepare($this->consulta);
			}
			
			$query->execute();
			$retorna = $query->fetchAll(PDO::FETCH_ASSOC);
			return $retorna;
		}catch(PDOException $e) {
			echo  $e->getMessage();
			return false;
		}
		
	}
	//06051982 UPDATE INSERT, FAZER POR ESSE;
	public function query($query, $conexao="portal") {
		$this->consulta = $query;
		try {
			if($conexao == 'totvs')
				$query = $this->consql->prepare($this->consulta);
			else{
				$query = $this->connportal->prepare($this->consulta);
			}
			return $query->execute();
		} catch (PDOException $e) {
			echo  $e->getMessage();
			return false;
		}
		
	}
}
?>