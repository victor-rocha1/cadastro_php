<?php
require_once '../app/Models/PessoaModel.php';

session_start(); // Iniciar a sessão

function cadastro() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['dados_pessoa'] = [  //aqui a section armazena os dados temporários
            'nome' => $_POST['nome'],
            'nome_social' => $_POST['nome_social'],
            'cpf' => $_POST['cpf'],
            'nome_pai' => $_POST['nome_pai'],
            'nome_mae' => $_POST['nome_mae'],
            'telefone' => $_POST['telefone'],
            'email' => $_POST['email']
        ];

        // redireciona para a tela de endereço, sem salvar ainda
        header("Location: index.php?action=cadastroEndereco");
        exit;
    }

    include '../app/Views/cadastroPessoa.php';
}

?>