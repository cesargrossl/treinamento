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
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form class="login-form">
        <h2 class="text-center">Login</h2>  
        <div class="form-group">
          <label for="username">Usuário</label>
          <input type="text" id="username" class="form-control" placeholder="Digite seu usuário" required>
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" id="password" class="form-control" placeholder="Digite sua senha" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Adicione o script do Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
