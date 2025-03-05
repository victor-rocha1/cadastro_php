<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereço</title>
</head>

<body>
    <h1>Cadastro de Endereço</h1>
    <form method="POST" action="index.php?action=cadastroEndereco">

        <input type="hidden" name="id_pessoa" value="<?php echo isset($_GET['id_pessoa']) ? $_GET['id_pessoa'] : ''; ?>">
        <label>CEP:</label>
        <input type="text" name="cep" required>

        <label>Logradouro:</label>
        <input type="text" name="logradouro" required>

        <label>Número:</label>
        <input type="text" name="numero" required>

        <label>Complemento:</label>
        <input type="text" name="complemento">

        <label>Bairro:</label>
        <input type="text" name="bairro" required>

        <label>Estado:</label>
        <input type="text" name="estado" required>

        <label>Cidade:</label>
        <input type="text" name="cidade" required>

        <button type="submit">Finalizar Cadastro</button>
    </form>

</body>

</html>