<?php
require_once '../app/Helpers/Database.php';  

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
function cadastrarPessoa($pessoa) {
    $conn = conectarBanco();
    $sql = "INSERT INTO pessoas (nome, nome_social, cpf, nome_pai, nome_mae, telefone, email)
            VALUES (:nome, :nome_social, :cpf, :nome_pai, :nome_mae, :telefone, :email)";

    $stmt = $conn->prepare($sql);

    // Usando loop para associar os valores ao SQL automaticamente
    foreach ($pessoa as $campo => $valor) {
        $stmt->bindValue(":$campo", $valor);
    }

    // Verifica se a inserção foi bem-sucedida
    return $stmt->execute();
}
?>