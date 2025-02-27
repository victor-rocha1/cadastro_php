<?php
require_once '../app/Controllers/EnderecoController.php';

$enderecoController = new EnderecoController();
$enderecoController->cadastrarEndereco();
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
    <form method="POST" action="cadastroEndereco.php">
        <select name="tipo_endereco" required>
            <option value="residencial">Residencial</option>
            <option value="comercial">Comercial</option>
        </select><br>

        <input type="text" name="cep" placeholder="00000-000" required>CEP<br>
        <input type="text" name="logadouro" placeholder="Rua das Flores" required>Logradouro<br>
        <input type="number" name="numero" placeholder="33" required>Número<br>
        <input type="text" name="complemento" placeholder="Apto 101">Complemento (opcional)<br>
        <input type="text" name="bairro" placeholder="Amendoeiras" required>Bairro<br>
        <input type="text" name="estado" placeholder="Minas Gerais" required>Estado<br>
        <input type="text" name="cidade" placeholder="Belo Horizonte" required>Cidade<br>

        <button type="submit">Cadastrar Endereço</button>
    </form>

    <a href="index.php">Voltar para Pesquisa</a>
</body>
</html>