<?php
require_once '../app/Controllers/PessoaController.php';
require_once '../app/Controllers/EnderecoController.php';  // Inclui o controller de Endereço

// Verifica a ação no link e executa a função apropriada
if (isset($_GET['action']) && $_GET['action'] == 'cadastro') {
    cadastro();  // Função de cadastro de pessoa
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    cadastro();  // Função para cadastrar pessoa (caso tenha um POST)
} elseif (isset($_GET['action']) && $_GET['action'] == 'cadastroEndereco') {
    $enderecoController = new EnderecoController();
    $enderecoController->cadastrarEndereco();  // Função para cadastrar o endereço
} else {
    pesquisa();  // Função de pesquisa de pessoas
}