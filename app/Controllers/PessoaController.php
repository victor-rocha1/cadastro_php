<?php
require_once '../app/Models/PessoaModel.php';
require_once '../app/Models/EnderecoModel.php'; 

// Função para exibir a página de cadastro de pessoa
function cadastro() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
        // Dados da pessoa
        $dados = [
            'nome' => $_POST['nome'],
            'nome_social' => $_POST['nome_social'],
            'cpf' => $_POST['cpf'],
            'nome_pai' => $_POST['nome_pai'],
            'nome_mae' => $_POST['nome_mae'],
            'telefone' => $_POST['telefone'],
            'email' => $_POST['email']
        ];

        // Cadastrar a pessoa no banco
        if (cadastrarPessoaNoBanco($dados)) {
            // Redireciona para cadastro de endereço após o cadastro da pessoa
            header('Location: index.php?action=cadastroEndereco');
            exit; 
        } else {
            echo "Erro ao cadastrar pessoa.";
        }
    } else {
        include '../app/Views/cadastroPessoa.php';  // Carrega a view de cadastro de pessoa
    }
}
?>