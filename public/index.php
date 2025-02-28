<?php
require_once '../app/Models/PessoaModel.php';
require_once '../app/Models/EnderecoModel.php';

// Ação padrão
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Verifica se a ação é cadastro de pessoa
if ($action === '') {
    include '../app/Views/pesquisa.php';  
}

elseif ($action === 'cadastro') {
    include '../app/Views/cadastroPessoa.php';  
}

// Verifica se a ação é cadastro de endereço
elseif ($action === 'cadastroEndereco') {
    include '../app/Views/cadastroEndereco.php';  
}
// Verifica se a ação é pesquisa
elseif ($action === 'pesquisa') {
    if (isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) {
        $pesquisar = $_GET['pesquisar'];
        $pessoas = buscarPessoas($pesquisar);  // Função para buscar pessoas no banco
    } else {
        $pessoas = [];
    }
    include '../app/Views/pesquisa.php';  // Exibe a página de pesquisa
}
?>