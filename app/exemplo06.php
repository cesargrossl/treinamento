<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exemplo jQuery Captura de Valor</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<label for="meuInput">Digite algo:</label>
<input type="text" id="meuInput">

<script>
$(document).ready(function(){
    // Captura o valor do input quando o usuário digitar algo
    $('#meuInput').on('input', function(){
        var valorInput = $(this).val();
        console.log('Valor do input:', valorInput);
    });

    // Ou captura o valor do input quando o usuário pressionar Enter
    $('#meuInput').on('keypress', function(event){
        if(event.which === 13) {
            var valorInput = $(this).val();
            console.log('Valor do input (pressionou Enter):', valorInput);
        }
    });
});
</script>

</body>
</html>
