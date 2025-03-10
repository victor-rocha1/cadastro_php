<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../app/Models/PessoaModel.php';
require_once '../app/Models/EnderecoModel.php';

function cadastrarEndereco()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_SESSION['dados_pessoa'])) { // aqui retorna os dados temporários do form anterior
            die("Erro: Nenhum dado de pessoa encontrado!");
        }

        $dadosPessoa = $_SESSION['dados_pessoa'];
        $id_pessoa = cadastrarPessoa($dadosPessoa); // inserindo a pessoa no banco

        if ($id_pessoa) {
            $dadosEndereco = [
                'id_pessoa' => $id_pessoa,
                'cep' => $_POST['cep'],
                'logradouro' => $_POST['logradouro'],
                'numero' => $_POST['numero'],
                'complemento' => $_POST['complemento'],
                'bairro' => $_POST['bairro'],
                'estado' => $_POST['estado'],
                'cidade' => $_POST['cidade']
            ];

            if (salvarEndereco($dadosEndereco)) {
                unset($_SESSION['dados_pessoa']);
                header('Location: index.php?action=pesquisa');
                exit;
            } else {
                echo "Erro ao cadastrar endereço.";
            }
        } else {
            echo "Erro ao cadastrar pessoa.";
        }
    } else {
        include '../app/Views/cadastroEndereco.php';
    }
}