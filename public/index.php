<?php
require_once '../app/Controllers/PessoaController.php';

// Verifica a ação no link e executa a função apropriada
if (isset($_GET['action']) && $_GET['action'] == 'cadastro') {
    cadastro();  // Redireciona para a função de cadastro
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    cadastrarPessoa();  // Cadastro de pessoa (caso tenha um POST)
} else {
    pesquisa();  // Pesquisa de pessoas
}
?>