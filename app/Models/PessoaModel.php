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

// Função para buscar pessoas por nome ou CPF
function buscarPessoas($pesquisar) {
    $conn = conectarBanco();
    $sql = "SELECT * FROM pessoas WHERE nome LIKE :pesquisar OR cpf = :pesquisar";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':pesquisar', "%$pesquisar%");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para cadastrar uma nova pessoa no banco de dados
function cadastrarPessoaNoBanco($dados) {
    $conn = conectarBanco();
    $sql = "INSERT INTO pessoas (nome, nome_social, cpf, nome_pai, nome_mae, telefone, email) 
            VALUES (:nome, :nome_social, :cpf, :nome_pai, :nome_mae, :telefone, :email)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':nome_social', $dados['nome_social']);
    $stmt->bindParam(':cpf', $dados['cpf']);
    $stmt->bindParam(':nome_pai', $dados['nome_pai']);
    $stmt->bindParam(':nome_mae', $dados['nome_mae']);
    $stmt->bindParam(':telefone', $dados['telefone']);
    $stmt->bindParam(':email', $dados['email']);
    
    return $stmt->execute();
}
?>