<?php
// Aqui, o código PHP está sendo preparado para exibir a view do cadastro de endereço
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereço</title>
</head>
<body>
    <h1>Cadastro de Endereço</h1>
    <form method="POST" action="index.php?action=cadastroEndereco"> <!-- Ação para o Controller de Endereço -->
        <input type="text" name="cep" placeholder="00000-000" required><br>
        <input type="text" name="logradouro" placeholder="Logradouro" required><br>
        <input type="number" name="numero" placeholder="Número" required><br>
        <input type="text" name="complemento" placeholder="Complemento"><br>
        <input type="text" name="bairro" placeholder="Bairro" required><br>
        <input type="text" name="estado" placeholder="Estado" required><br>
        <input type="text" name="cidade" placeholder="Cidade" required><br>

        <button type="submit">Finalizar Cadastro</button>
    </form>
</body>
</html>