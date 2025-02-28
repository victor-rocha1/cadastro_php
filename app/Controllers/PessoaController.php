<?php
require_once '../app/Models/PessoaModel.php';

// Função para exibir a página de cadastro de pessoa
function cadastro() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (cadastrarPessoa($_POST)) {
            // Redireciona para o cadastro de endereço após o cadastro da pessoa
            header('Location: index.php?action=cadastroEndereco');
            exit;
        } else {
            echo "Erro ao cadastrar pessoa.";
        }
    } else {
        include '../app/Views/cadastroPessoa.php';
    }
}
?>