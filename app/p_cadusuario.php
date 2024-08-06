<?php
  
  include_once("./cabecalho.php");
  $modo = "I";
  if(isset($_GET["id"])){
    $qry = "	SELECT * FROM db_persona.tb_usuarios WHERE usu_id =  ".$_GET["id"];
										
		$db->AbreConexao('portal');
		$rec_qry = $db->select($qry,'portal');
		$db->FechaConexao('portal');
		
		foreach($rec_qry as $row){
			$id = $row["usu_id"];
		
		}
		$modo = "U"; 

  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aqui para salvar os dados
 
  }

?>
  
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Pesquisar</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table" id="datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Usuário</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $qry = "SELECT * FROM db_persona.tb_usuarios ";
              //echo $qry;die;
              $db->AbreConexao('portal');
              $res_qry = $db->select($qry, "portal");
              $db->FechaConexao('portal');
              if (count($res_qry)) {
                foreach ($res_qry as $cont_qry=>$row) {
                  ?>
                  <tr>
                    <th scope="row"><a href="p_cadusuario.php?id=<?=$row["usu_id"]?>"><?=$row["usu_id"]?></a></th>
                    <td><a href="p_cadusuario.php?id=<?=$row["usu_id"]?>"><?=$row["usu_nome"]?></a></td>
                    <td><?=$row["usu_login"]?></td>
                  </tr>
                  <?php
                }
              }
            ?>
           
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
        
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Cadastro de Usuários</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <form action="p_cadusuario.php" method="POST">
              <div class="x_content">
                  <input type="text" value="<?=$modo?>">
                  <div class="mb-3 d-flex justify-content-end" >
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></button>
                  </div>
                  <div class="mb-3">
                    <label for="nomecompleto" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
                  </div>
                  <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Login">
                  </div>
                  <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                  </div>
                  <div class="mb-3 d-flex justify-content-end" >
                    <?php if ($modo == 'U'){?>
								    <button type="button"  id="btExcluir" onClick="fc_excluir('<?php echo $id;?>')"class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button>
								    <?php }?>
                    
                    <button type="reset" class="btn btn-info">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                  </div>


              </div>
            </form>  
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
<?php
  include_once("./rodape.php");

?>
<script>
  function fc_excluir(id){
      var resposta = confirm("Deseja remover esse registro?");
      //console.log(id);
      if (resposta == true) {
        window.location.href = "<?php echo $_SERVER["PHP_SELF"];?>?del=1&id="+id;
      }
    };
  </script>  