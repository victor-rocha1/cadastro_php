<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Pessoas</title>
</head>

<body>
    <h1>Pesquisa de Pessoas</h1>
    <form method="GET" action="index.php">
        <input type="text" name="pesquisar" placeholder="Pesquisar por nome ou CPF" value="<?= isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '' ?>">
        <button type="submit">Pesquisar</button>
    </form>

    <?php if (isset($pessoas) && !empty($pessoas)): ?>
        <ul>
            <?php foreach ($pessoas as $pessoa): ?>
                <li>Nome: <?= $pessoa['nome'] ?> | CPF: <?= $pessoa['cpf'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhuma pessoa encontrada.</p>
    <?php endif; ?>

    <a href="index.php?action=cadastro">Realizar Novo Cadastro</a>
</body>

</html>