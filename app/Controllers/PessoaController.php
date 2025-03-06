<?php
require_once '../app/Models/PessoaModel.php';

function cadastro() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dadosPessoa = [
            'nome' => $_POST['nome'],
            'nome_social' => $_POST['nome_social'],
            'cpf' => $_POST['cpf'],
            'nome_pai' => $_POST['nome_pai'],
            'nome_mae' => $_POST['nome_mae'],
            'telefone' => $_POST['telefone'],
            'email' => $_POST['email']
        ];

        $id_pessoa = cadastrarPessoa($dadosPessoa); //usa a function de Model e insere no banco e retorna o id_pessoa
        if ($id_pessoa) {
            header("Location: index.php?action=cadastroEndereco&id_pessoa=$id_pessoa");
            exit;
        } else {
            $erro = "Erro ao cadastrar pessoa.";
        }
    }

    include '../app/Views/cadastroPessoa.php';
}

?>