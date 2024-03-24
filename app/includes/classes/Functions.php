<?php

if (!defined("IS_INCLUDE"))
	die();
    
class Functions extends DB {
    
    function sanitizeString($input) {
		return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
	}

    function formata_valor($valor){
		$valor = str_replace(",", "", $valor);
		$valor = number_format($valor, 2, ',', '');
		return $valor;
	}
	
	function datamysql($data){
		$data = str_replace("/", "-", $data);
		$data = date('Y-m-d', strtotime($data));
		return $data;
	}

}

?>