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

        <label for="cep">CEP:</label>
        <input type="text" name="cep" id="cep" required>

        <label for="logradouro">Logradouro:</label>
        <input type="text" name="logradouro" id="logradouro" required>

        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" required>

        <label for="complemento">Complemento:</label>
        <input type="text" name="complemento" id="complemento">

        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro" required>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado" required>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" required>

        <button type="submit">Finalizar Cadastro</button>
    </form>

    <script>
        <?php
        // Incluindo a configuração da API
        $config = include('api.php');
        $apiUrl = $config['api_url'];
        ?>

        // JS
        document.getElementById('cep').addEventListener('blur', function () {
            var cep = this.value.replace(/\D/g, ''); // remove tudo o que não é número

            if (cep.length !== 8) {
                alert("CEP inválido!");
                return;
            }

            // Faz a requisição para a API ViaCEP
            fetch('<?php echo $apiUrl; ?>' + cep + '/json/')
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        // Preenche os campos do formulário com os dados retornados da API
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('estado').value = data.uf;
                    } else {
                        alert("CEP não encontrado!");
                    }
                })
                .catch(error => {
                    console.error("Erro ao buscar endereço:", error);
                    alert("Erro ao buscar endereço!");
                });
        });
    </script>
</body>

</html>