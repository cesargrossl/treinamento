<?php

// Exemplo de manipulação de strings
$frase = "esta é uma frase de exemplo.";
echo "Número de caracteres na frase: " . strlen($frase) . "<br>";
echo "Frase em maiúsculas: " . strtoupper($frase) . "<br>";
echo "Frase em minúsculas: " . strtolower($frase) . "<br>";
echo "Primeira letra em maiúscula: " . ucfirst($frase) . "<br>";

// Exemplo de manipulação de datas
$dataAtual = date("Y-m-d");
echo "Data atual: " . $dataAtual . "<br>";

// Exemplo de inclusão de arquivos
include 'meuArquivo.php';

// Exemplo de manipulação de formulários (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    echo "Olá, " . $nome . "! Seu formulário foi enviado com sucesso.";
}

?>


