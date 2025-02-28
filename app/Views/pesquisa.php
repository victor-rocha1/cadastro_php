<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Pessoas</title>
</head>

<body>
    <h1>Pesquisa de Pessoas</h1>
    
    <!-- Formulário de Pesquisa -->
    <form method="GET" action="index.php?action=pesquisa">
        <input type="text" name="pesquisar" placeholder="Pesquisar por nome ou CPF" 
               value="<?= isset($_GET['pesquisar']) ? htmlspecialchars($_GET['pesquisar']) : '' ?>" 
               required>
        <button type="submit">Pesquisar</button>
    </form>

    <?php
    // Verificando se a variável 'pesquisar' foi enviada e não está vazia
    if (isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])):
        $pesquisar = $_GET['pesquisar'];
        // Chama a função de busca passando o termo de pesquisa
        $pessoas = buscarPessoas($pesquisar);
    ?>

        <!-- Exibe os resultados da pesquisa -->
        <?php if (!empty($pessoas)): ?>
            <ul>
                <?php foreach ($pessoas as $pessoa): ?>
                    <li>Nome: <?= htmlspecialchars($pessoa['nome']) ?> | CPF: <?= htmlspecialchars($pessoa['cpf']) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhuma pessoa encontrada para o termo: "<?= htmlspecialchars($pesquisar) ?>"</p>
        <?php endif; ?>

    <?php else: ?>
        <p>Por favor, insira um termo de pesquisa.</p>
    <?php endif; ?>

    <a href="index.php?action=cadastro">Realizar Novo Cadastro</a>

</body>

</html>