<?php
require_once '../app/Helpers/Database.php';

function buscarPessoas($pesquisar)
{
    // Supondo que você tenha uma função conectarBanco() para conectar ao banco
    $pdo = conectarBanco();

    // Prepare a consulta SQL para buscar por nome ou CPF
    $sql = "SELECT * FROM pessoas WHERE nome LIKE :pesquisar OR cpf LIKE :pesquisar";

    // Prepare e execute a consulta
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['pesquisar' => '%' . $pesquisar . '%']);

    // Retorne os resultados
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function cadastrarPessoa($pessoa)
{
    try {
        $conn = conectarBanco();
        $sql = "INSERT INTO pessoas (nome, nome_social, cpf, nome_pai, nome_mae, telefone, email)
                VALUES (:nome, :nome_social, :cpf, :nome_pai, :nome_mae, :telefone, :email)";
        $stmt = $conn->prepare($sql);

        foreach ($pessoa as $campo => $valor) {
            $stmt->bindValue(":$campo", $valor);
        }

        if ($stmt->execute()) {
            return $conn->lastInsertId();
        }
        return false;
    } catch (Exception $e) {
        die("Erro ao cadastrar pessoa: " . $e->getMessage());
    }
}
