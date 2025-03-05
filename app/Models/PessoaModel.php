<?php
require_once '../app/Helpers/Database.php';

function buscarPessoas($pesquisar)
{
    $conn = conectarBanco();
    $sql = "SELECT * FROM pessoas WHERE nome LIKE :pesquisar OR cpf = :pesquisar";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':pesquisar', "%$pesquisar%");
    $stmt->execute();
    return $stmt->fetchAll();
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
