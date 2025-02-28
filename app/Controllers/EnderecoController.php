<?php
require_once '../app/Models/EnderecoModel.php';

function cadastrarEndereco() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dadosEndereco = [
            'cep' => $_POST['cep'],
            'logradouro' => $_POST['logradouro'],
            'numero' => $_POST['numero'],
            'complemento' => $_POST['complemento'],
            'bairro' => $_POST['bairro'],
            'estado' => $_POST['estado'],
            'cidade' => $_POST['cidade']
        ];

        if (salvarEndereco($dadosEndereco)) {
            header('Location: index.php?action=pesquisa'); // Redireciona corretamente
            exit;
        } else {
            echo "Erro ao cadastrar endereço.";
        }
    } else {
        include '../app/Views/cadastroEndereco.php'; 
    }
}
?>