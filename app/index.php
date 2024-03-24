<?php
	//Apenas realizar um teste
	
	$db_valida = "srv_portal";
    include_once("./includes/db_banco.php");
    include_once("./includes/pdo_conexao.php");
	$db = new DB();
	$db->AbreConexao('portal');
	$qry = $db->select(" SELECT tes_descricao FROM tb_teste ", "portal");
	if (count($qry)) {
		foreach ($qry as $cont_qry=>$row) {
			echo $cont_qry.' - '.$row['tes_descricao'].'<br>';
		}
	}
	$db->FechaConexao('portal');	
?>
