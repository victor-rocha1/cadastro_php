<?php
require_once '../app/Models/EnderecoModel.php';

// Função para cadastrar o endereço
function cadastrarEndereco() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Array com os dados do form de endereço
        $dadosEndereco = [
            'cep' => $_POST['cep'],
            'logradouro' => $_POST['logradouro'],
            'numero' => $_POST['numero'],
            'complemento' => $_POST['complemento'],
            'bairro' => $_POST['bairro'],
            'estado' => $_POST['estado'],
            'cidade' => $_POST['cidade']
        ];

        // Chama a função para cadastrar o endereço
        if (salvarEndereco($dadosEndereco)) {
            echo "Endereço cadastrado com sucesso!";
            // Redireciona para a pesquisa
            header('Location: index.php?action=pesquisa');
            exit;
        } else {
            echo "Erro ao cadastrar endereço.";
        }
    } else {
        include '../app/Views/cadastroEndereco.php'; 
    }
}
?>