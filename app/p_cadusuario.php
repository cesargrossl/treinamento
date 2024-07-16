<?php
  
  include_once("./cabecalho.php");

?>
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
            <div class="x_content">
                <div class="mb-3 d-flex justify-content-end" >
                  <button type="button" class="btn btn-info"><i class="fa fa-search"></i></button>
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
                  <button type="button" class="btn btn-danger">Excluir</button>
                  <button type="button" class="btn btn-info">Cancelar</button>
                  <button type="button" class="btn btn-success">Salvar</button>
                </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
<?php
  include_once("./rodape.php");
?>