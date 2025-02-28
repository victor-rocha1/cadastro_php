<?php
require_once '../app/Models/PessoaModel.php';

function cadastro() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (cadastrarPessoa($_POST)) {
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