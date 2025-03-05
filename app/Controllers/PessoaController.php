<?php
require_once '../app/Models/PessoaModel.php';

function cadastro() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_pessoa = cadastrarPessoa($_POST);
        if ($id_pessoa) {
            header("Location: index.php?action=cadastroEndereco&id_pessoa=$id_pessoa");
            exit;
        } else {
            echo "Erro ao cadastrar pessoa.";
        }
    } else {
        include '../app/Views/cadastroPessoa.php';
    }
}
?>