<?php
require_once '../app/Models/PessoaModel.php';
require_once '../app/Models/EnderecoModel.php'; // Inclusão do model de endereço

// Função para exibir a página de cadastro de pessoa
function cadastro() {
    
    // Verifica se foi feito o cadastro de uma pessoa
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
        $dados = [
            'nome' => $_POST['nome'],
            'nome_social' => $_POST['nome_social'],
            'cpf' => $_POST['cpf'],
            'nome_pai' => $_POST['nome_pai'],
            'nome_mae' => $_POST['nome_mae'],
            'telefone' => $_POST['telefone'],
            'email' => $_POST['email']
        ];

        // Chama a função para salvar no banco de dados
        if (cadastrarPessoaNoBanco($dados)) {
            echo "Pessoa cadastrada com sucesso!<br>";
            // Após o cadastro da pessoa, redireciona para o cadastro de endereço
            echo '<a href="cadastroEndereco.php">Cadastrar Endereço</a>';
        } else {
            echo "Erro ao cadastrar pessoa.";
        }
    } else {
        include '../app/Views/cadastroPessoa.php';  // Carrega a view de cadastro de pessoa
    }
}

// Função para exibir a pesquisa
function pesquisa() {
    if (isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) {
        $pessoas = buscarPessoas($_GET['pesquisar']);
    } else {
        $pessoas = [];
    }
    include '../app/Views/pesquisa.php';  // Carrega a view de pesquisa
}