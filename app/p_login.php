<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Personalitec</title>

    <!-- Bootstrap -->
    <link href="./template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="./template/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./template/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="p_logar.php">
              <h1>Efetue seu Login</h1>
              <?php
                (isset($_GET["e"])) ? $e = $_GET["e"] : $e = null;
                if (!empty($e) && $e == 1){
                  ?>
                  <div class="alert alert-danger" role="alert">
                    ATENÇÃO - Usuário ou senha inválidos!
                  </div>
                <?php 
                }elseif(!empty($e) && $e == 2){
                  ?>
                  <div class="alert alert-danger" role="alert">
                    ATENÇÃO - Efetue um novo login!
                  </div>
                <?php 
                }
              ?>
              <div>
                <input type="text" name="login" class="form-control" placeholder="Login" required="" />
              </div>
              <div>
                <input type="password" name="senha" class="form-control" placeholder="Senha" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-secondary">Acessar</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <p>©2024 Todos os direitos reservados. Personalitec</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
  session_destroy();
?>
