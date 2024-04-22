<?php
    $id = null;
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
    if (isset($_POST["excluir"])){
        $id_excluir = $_POST["excluir"];
        $sql_excluir = "DELETE FROM tb_teste WHERE tes_id = $id_excluir";

        if ($conn->query($sql_excluir) === TRUE) {
            echo "<p>Dados excluídos com sucesso!</p>";
        } else {
            echo "<p>Erro ao excluir dados: " . $conn->error . "</p>";
        }

    }else{

        if (isset($_GET["id"])){
            $id  = $_GET["id"];
            $sql_listar = "SELECT tes_descricao FROM tb_teste WHERE tes_id = '".$_GET["id"]."' ";
            $result = $conn->query($sql_listar);
            if ($result->num_rows > 0) {
                $modo = 'U';
                while ($row = $result->fetch_assoc()) {
                    $nome = $row["tes_descricao"];
                }
            }
        }
        if (isset($_POST["nome"])){
            $nome = trim($_POST["nome"]);
            $id = trim($_POST["id"]);
            $modo = trim($_POST["modo"]);
            $cidade = trim($_POST["cidade"]);
            $estado = trim($_POST["estado"]);
            $telefone = trim($_POST["telefone"]);
            if (!empty($id)){
                $sql_listar = "SELECT tes_descricao FROM tb_teste WHERE tes_descricao = '".$nome."' ";
                $result = $conn->query($sql_listar);
                if ($result->num_rows > 0) {
                    
                    $modo = 'U';
                }
            }
            if ($modo == 'I'){

                $sql_insert = "INSERT INTO tb_teste (tes_descricao, tes_telefone) VALUES ('$nome', '$telefone')";

                if ($conn->query($sql_insert) === TRUE) {
                    echo "<p>Dados inseridos com sucesso!</p>";
                } else {
                    echo "<p>Erro ao inserir dados: " . $conn->error . "</p>";
                }
            }elseif ($modo == 'U'){

                $sql_update = "UPDATE tb_teste SET tes_descricao='$nome' WHERE tes_id=$id";
                if ($conn->query($sql_update) === TRUE) {
                    echo "<p>Dados alterados com sucesso!</p>";
                } else {
                    echo "<p>Erro ao alterar dados: " . $conn->error . "</p>";
                }

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
            <input type="hidden" id="modo" name="modo" value="<?php echo $modo;?>">
            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
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
            <br>
            <h2>Dados Cadastrados</h2>
            <table border="1" width="100%">
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                    <th>Ações</th>
                </tr>
            <?php
            // Listar dados cadastrados
                $sql_listar = "SELECT * FROM tb_teste";
                $result = $conn->query($sql_listar);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["tes_id"] . "</td>";
                        echo "<td>" . $row["tes_descricao"] . "</td>";
                        echo "<td><a href='exemplo04.php?id=" . $row["tes_id"] . "'>Editar</a></td>";
                        echo "<td>
                                <form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST' onsubmit='return confirm(\"Tem certeza que deseja excluir este registro?\");'>
                                    <input type='hidden' name='excluir' value='" . $row["tes_id"] . "'>
                                    <input type='submit' value='Excluir'>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum registro encontrado.</td></tr>";
                }
            ?>
             </table>
        </form>
    </div>
</body>
</html>
