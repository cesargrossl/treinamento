<?php
    session_start();
    (isset($_POST["login"])) ? $login = $_POST["login"] : $login = null;
    (isset($_POST["senha"])) ? $senha = $_POST["senha"] : $senha = null;
    if(!empty($login) && !empty($senha)){
        include("./includes.php");
        $qry = "SELECT usu_nome 
                FROM db_persona.tb_usuarios 
                WHERE usu_login = '".$login."' 
                AND usu_senha = '".$senha."' ";
        $db->AbreConexao('portal');
        $res_qry = $db->select($qry, "portal");
        $db->FechaConexao('portal');
        if (count($res_qry)) {
            foreach ($res_qry as $cont_qry=>$row) {
                $_SESSION["nomeusuario"] = $row['usu_nome'];
                $_SESSION["login"] = $login;
                $_SESSION["logado"] = 'OK';
            }
        }else{
            echo "<script language=\"javascript\"> location.href='p_login.php?e=1';</script>";
            die;
        }

    }else{
        echo "<script language=\"javascript\"> location.href='p_login.php?e=1';</script>";
        die;
    }

?>