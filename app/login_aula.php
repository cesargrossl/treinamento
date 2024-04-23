<?php
// Inicia a sessão antes de qualquer saída para o navegador
session_start();
// Verifica se o formulário de login foi enviado
if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Aqui você deve verificar as credenciais no banco de dados, mas por enquanto vamos usar credenciais fixas
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verifica as credenciais
    if ($username === 'CESAR' && $password === '1234') {
        // Define as variáveis de sessão
        $_SESSION["username"] = $username;
        $_SESSION["logou"] = 'OK';

        // Redireciona para a página home
        echo "<script language=\"javascript\"> location.href='http://localhost/home.php';</script>";
        exit; // Certifique-se de sair após o redirecionamento
    } else {
        // Credenciais inválidas, redireciona para a página de login novamente
      echo 'Usuário ou senha invalidos';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Adicione o link para o Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilo personalizado para o formulário */
    .login-form {
      max-width: 400px;
      margin: 0 auto;
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background: #fff;
      margin-top: 50px;
    }
  </style>
</head>
<body>

<div class="container">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form class="login-form">
        <h2 class="text-center">Login</h2>  
        <div class="form-group">
          <label for="username">Usuário</label>
          <input type="text" name="username" id="username" class="form-control" placeholder="Digite seu usuário" required>
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" id="password" name="password"class="form-control" placeholder="Digite sua senha" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
      </form>
    </div>
  </div>
  </form>
</div>

<!-- Adicione o script do Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
