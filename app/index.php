<?php
	include("includes.php");
	//Apenas realizar um teste de conexão
	$qry_teste = " SELECT tes_descricao FROM tb_teste ";
	$db->AbreConexao('portal');
	$qry = $db->select($qry_teste, "portal");
	$db->FechaConexao('portal');
	if (count($qry)) {
		foreach ($qry as $cont_qry=>$row) {
			echo $cont_qry.' - '.$row['tes_descricao'].'<br>';
		}
	}
		

	//Teste insert, update
	/*
	$qry_teste = " INSERT INTO `tb_teste` (`tes_id`, `tes_descricao`) VALUES ('3', 'teste'); ";
	$db->AbreConexao('portal');
	$qry = $db->query($qry_teste, "portal");
	$db->FechaConexao('portal');
	*/
?>
