
<?php

// Exemplo de "Olá Mundo"
echo "Olá Mundo!<br>";

// Exemplo de variáveis e concatenação
$nome = "João";
$idade = 25;
echo "Olá, meu nome é " . $nome . " e eu tenho " . $idade . " anos.<br>";

// Exemplo de estrutura condicional (if-else)
$idade = 18;
if ($idade >= 18) {
    echo "Você é maior de idade.<br>";
} else {
    echo "Você é menor de idade.<br>";
}

// Exemplo de loop (for)
for ($i = 1; $i <= 5; $i++) {
    echo "Número: " . $i . "<br>";
}

// Exemplo de array
$cores = array("vermelho", "azul", "verde");
foreach ($cores as $cor) {
    echo $cor . "<br>";
}

// Exemplo de função
function soma($a, $b) {
    return $a + $b;
}

echo "A soma de 3 e 5 é: " . soma(3, 5) . "<br>";

?>

