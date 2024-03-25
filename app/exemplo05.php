<?php
// Inicia a sessão
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] === true) {
    echo "Olá, ".$_SESSION['nome'].". Você já está logado!";
} else {
    // Se não estiver logado, verifica se os dados foram submetidos através do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se os dados do formulário foram recebidos corretamente
        if (isset($_POST['usuario']) && isset($_POST['senha']) && $_POST['usuario'] == 'usuario' && $_POST['senha'] == 'senha') {
            // Define a variável de sessão para indicar que o usuário está logado
            $_SESSION['usuario_logado'] = true;
            $_SESSION['nome'] = $_POST['usuario'];
            echo "Olá, ".$_SESSION['nome'].". Você foi logado com sucesso!";
        } else {
            echo "Usuário ou senha incorretos!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) { ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="usuario">Usuário:</label><br>
            <input type="text" id="usuario" name="usuario"><br>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha"><br><br>
            <input type="submit" value="Login">
        </form>
    <?php } else { ?>
        <br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="logout" value="true">
            <input type="submit" value="Logout">
        </form>
    <?php } ?>
</body>
</html>

<?php
// Logout
if (isset($_POST['logout']) && $_POST['logout'] == 'true') {
    // Remove todas as variáveis de sessão
    session_unset();
    // Destrói a sessão
    session_destroy();
    echo "Você foi desconectado.";
}
?>
