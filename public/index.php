<?php
require_once '../app/Models/PessoaModel.php';
require_once '../app/Models/EnderecoModel.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action === 'cadastro') {
    include '../app/Controllers/PessoaController.php';
    cadastro();
} elseif ($action === 'cadastroEndereco') {
    include '../app/Controllers/EnderecoController.php';
    cadastrarEndereco();
} elseif ($action === 'pesquisa') {
    $pessoas = isset($_GET['pesquisar']) ? buscarPessoas($_GET['pesquisar']) : [];
    include '../app/Views/pesquisa.php';
} else {
    include '../app/Views/pesquisa.php';
}
?>