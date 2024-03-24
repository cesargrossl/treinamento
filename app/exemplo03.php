<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário PHP/MySQL</title>
</head>
<body>
    <h2>Inserir Dados</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="descricao">Descrição:</label><br>
        <input type="text" id="descricao" name="descricao"><br><br>
        <input type="submit" value="Inserir">
    </form>

    <h2>Alterar Dados</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="id">ID do Registro a ser alterado:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="nova_descricao">Nova Descrição:</label><br>
        <input type="text" id="nova_descricao" name="nova_descricao"><br><br>
        <input type="submit" value="Alterar">
    </form>

    <h2>Dados Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        <?php
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

        // Processar a inserção de dados
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["descricao"])) {
            $descricao = $_POST["descricao"];

            $sql_insert = "INSERT INTO tb_teste (tes_descricao) VALUES ('$descricao')";

            if ($conn->query($sql_insert) === TRUE) {
                echo "<p>Dados inseridos com sucesso!</p>";
            } else {
                echo "<p>Erro ao inserir dados: " . $conn->error . "</p>";
            }
        }

        // Processar a alteração de dados
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["nova_descricao"])) {
            $id = $_POST["id"];
            $nova_descricao = $_POST["nova_descricao"];

            $sql_update = "UPDATE tb_teste SET tes_descricao='$nova_descricao' WHERE tes_id=$id";

            if ($conn->query($sql_update) === TRUE) {
                echo "<p>Dados alterados com sucesso!</p>";
            } else {
                echo "<p>Erro ao alterar dados: " . $conn->error . "</p>";
            }
        }

        // Processar a exclusão de dados
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir"])) {
            $id_excluir = $_POST["excluir"];
            $sql_excluir = "DELETE FROM tb_teste WHERE tes_id = $id_excluir";

            if ($conn->query($sql_excluir) === TRUE) {
                echo "<p>Dados excluídos com sucesso!</p>";
            } else {
                echo "<p>Erro ao excluir dados: " . $conn->error . "</p>";
            }
        }

        // Listar dados cadastrados
        $sql_listar = "SELECT * FROM tb_teste";
        $result = $conn->query($sql_listar);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["tes_id"] . "</td>";
                echo "<td>" . $row["tes_descricao"] . "</td>";
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

        // Fechar a conexão com o banco de dados
        $conn->close();
        ?>
    </table>
</body>
</html>
