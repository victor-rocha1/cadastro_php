<?php
require_once '../app/Controllers/PessoaController.php';
require_once '../app/Controllers/EnderecoController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action === '') {
    include '../app/Views/pesquisa.php';  
} elseif ($action === 'cadastro') {
    cadastro();
} elseif ($action === 'cadastroEndereco') {
    cadastrarEndereco();
} elseif ($action === 'pesquisa') {
    if (isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) {
        $pesquisar = $_GET['pesquisar'];
        $pessoas = buscarPessoas($pesquisar);
    } else {
        $pessoas = [];
    }
    include '../app/Views/pesquisa.php';
}
?>