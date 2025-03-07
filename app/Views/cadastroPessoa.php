<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $("input[name='cpf']").mask("000.000.000-00");
            $("input[name='telefone']").mask("(00) 00000-0000");
        });
    </script>
</head>

<body>
    <h1>Cadastro de Pessoa</h1>
    <form method="POST" action="index.php?action=cadastro">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" placeholder="Nome" required><br>

        <label for="nome_social">Nome Social (opcional):</label> 
        <input type="text" name="nome_social" placeholder="Nome Social (opcional)">

        <label for="cpf">CPF:</label> 
        <input type="text" name="cpf" placeholder="000.000.000-00" required><br>

        <label for="nome_pai">Nome do Pai:</label> 
        <input type="text" name="nome_pai" placeholder="Nome do Pai (opcional)">

        <label for="nome_mae">Nome da Mãe:</label> 
        <input type="text" name="nome_mae" placeholder="Nome da Mãe (opcional)">

        <label for="telefone">Telefone:</label> 
        <input type="tel" name="telefone" placeholder="(31) 99999-9999">

        <label for="email">E-mail:</label> 
        <input type="email" name="email" placeholder="pessoa@gmail.com">

        <button type="submit">Próximo</button>
    </form>

</body>

</html>