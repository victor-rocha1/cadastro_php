<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
</head>

<body>
    <h1>Cadastro de Pessoa</h1>
    <form method="POST" action="../app/Views/cadastroEndereco.php">
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="text" name="nome_social" placeholder="Nome Social"><br>
        <input type="text" name="cpf" placeholder="000000000-00" required><br>
        <input type="text" name="nome_pai" placeholder="Nome do Pai"><br>
        <input type="text" name="nome_mae" placeholder="Nome da Mãe"><br>
        <input type="text" name="telefone" placeholder="3199999-9999"><br>
        <input type="email" name="email" placeholder="pessoa@gmail.com"><br>

        <button type="submit">Próximo</button>
    </form>
</body>

</html>