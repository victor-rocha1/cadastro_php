<?php
require_once '../app/Helpers/Database.php';  // Incluir o arquivo Database.php

// Função para buscar pessoas por nome ou CPF
function buscarPessoas($pesquisar) {
    $conn = conectarBanco();  // Usando a função do Database.php
    $sql = "SELECT * FROM pessoas WHERE nome LIKE :pesquisar OR cpf = :pesquisar";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':pesquisar', "%$pesquisar%");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para cadastrar uma nova pessoa no banco de dados
function cadastrarPessoaNoBanco($pessoa) {
    $conn = conectarBanco();
    $sql = "INSERT INTO pessoas (nome, nome_social, cpf, nome_pai, nome_mae, telefone, email)
            VALUES (:nome, :nome_social, :cpf, :nome_pai, :nome_mae, :telefone, :email)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $pessoa['nome']);
    $stmt->bindParam(':nome_social', $pessoa['nome_social']);
    $stmt->bindParam(':cpf', $pessoa['cpf']);
    $stmt->bindParam(':nome_pai', $pessoa['nome_pai']);
    $stmt->bindParam(':nome_mae', $pessoa['nome_mae']);
    $stmt->bindParam(':telefone', $pessoa['telefone']);
    $stmt->bindParam(':email', $pessoa['email']);

    return $stmt->execute();
}

include '../app/Views/pesquisa.php';
?>