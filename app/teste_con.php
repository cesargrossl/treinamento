<?php
	include("includes.php");

	/*
	-- Criação da tabela
	CREATE TABLE TB_TESTE (
		ID INT PRIMARY KEY,
		NOME VARCHAR(250)
	);

	-- Inserção de dados
	INSERT INTO TB_TESTE (ID, NOME) VALUES (1, 'João');
	INSERT INTO TB_TESTE (ID, NOME) VALUES (2, 'Maria');
	INSERT INTO TB_TESTE (ID, NOME) VALUES (3, 'Carlos');
	INSERT INTO TB_TESTE (ID, NOME) VALUES (4, 'Ana');

	SELECT TOP 10 * FROM TB_TESTE

	*/
	//Apenas realizar um teste de conexão
	$qry_teste = " SELECT TOP 10 * FROM TB_TESTE ";
	
	$db->AbreConexao('totvs');
	$qry = $db->select($qry_teste, "totvs");
	$db->FechaConexao('totvs');
	if (count($qry)) {
		foreach ($qry as $cont_qry=>$row) {
			echo $cont_qry.' - '.$row['NOME'].'<br>';
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
