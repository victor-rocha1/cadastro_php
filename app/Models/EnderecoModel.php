<?php
require_once '../app/Helpers/Database.php';  // Incluir o arquivo Database.php

// Função para cadastrar um novo endereço
function cadastrarEndereco($endereco) {
    $conn = conectarBanco();
    $sql = "INSERT INTO enderecos (cep, logradouro, numero, complemento, bairro, estado, cidade)
            VALUES (:cep, :logradouro, :numero, :complemento, :bairro, :estado, :cidade)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cep', $endereco['cep']);
    $stmt->bindParam(':logradouro', $endereco['logradouro']);
    $stmt->bindParam(':numero', $endereco['numero']);
    $stmt->bindParam(':complemento', $endereco['complemento']);
    $stmt->bindParam(':bairro', $endereco['bairro']);
    $stmt->bindParam(':estado', $endereco['estado']);
    $stmt->bindParam(':cidade', $endereco['cidade']);

    return $stmt->execute();
}
?>