<?php

// Função para conectar ao banco de dados
function conectarBanco() {
    $host = 'localhost';
    $db_name = 'cadastro_pessoas';
    $username = 'root';
    $password = '';

    try {
        return new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    } catch (PDOException $exception) {
        die("Erro de conexão: " . $exception->getMessage());
    }
}

// Função para cadastrar um novo endereço no banco de dados
function cadastrarEnderecoNoBanco($dadosEndereco) {
    $conn = conectarBanco();
    $sql = "INSERT INTO enderecos (tipo_endereco, cep, logadouro, numero, complemento, bairro, estado, cidade) 
            VALUES (:tipo_endereco, :cep, :logadouro, :numero, :complemento, :bairro, :estado, :cidade)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tipo_endereco', $dadosEndereco['tipo_endereco']);
    $stmt->bindParam(':cep', $dadosEndereco['cep']);
    $stmt->bindParam(':logadouro', $dadosEndereco['logadouro']);
    $stmt->bindParam(':numero', $dadosEndereco['numero']);
    $stmt->bindParam(':complemento', $dadosEndereco['complemento']);
    $stmt->bindParam(':bairro', $dadosEndereco['bairro']);
    $stmt->bindParam(':estado', $dadosEndereco['estado']);
    $stmt->bindParam(':cidade', $dadosEndereco['cidade']);
    
    return $stmt->execute();
}