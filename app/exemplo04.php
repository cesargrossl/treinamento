<?php
$modo = 'I';
$nome = null;
$cidade = null;
$estado = null;
$telefone = null;
// Conexão com o banco de dados
$host = "mysql"; // Host do MySQL
$usuario = "root"; // Usuário do MySQL
$senha = "5020@1223"; // Senha do MySQL
$banco = "db_teste"; // Nome do banco de dados

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
if (isset($_POST["nome"])){
    $nome = trim($_POST["nome"]);
    $cidade = trim($_POST["cidade"]);
    $estado = trim($_POST["estado"]);
    $telefone = trim($_POST["telefone"]);
    if ($modo == 'I'){
        $sql_insert = "INSERT INTO tb_teste (tes_descricao, tes_telefone) VALUES ('$nome', '$telefone')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "<p>Dados inseridos com sucesso!</p>";
        } else {
            echo "<p>Erro ao inserir dados: " . $conn->error . "</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 550px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input[type="text"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px; /* Margem direita para o espaço desejado */
            box-sizing: border-box; /* Para incluir a largura da borda na largura total */
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulário</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $nome;?>" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" value="<?php echo $cidade;?>">
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="<?php echo $estado;?>">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" value="<?php echo $telefone;?>" >
            </div>
            <button type="submit">salvar</button>
        </form>
    </div>
</body>
</html>
