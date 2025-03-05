<?php
require_once '../app/Helpers/Database.php';

function buscarPessoas($pesquisar) {
    try {
        $conn = conectarBanco(); // Função de conexão com o banco de dados

        // Preparando a consulta SQL para buscar pelo nome ou CPF, tratando a formatação do CPF
        $sql = "SELECT * FROM pessoas WHERE nome LIKE :pesquisar OR REPLACE(REPLACE(REPLACE(cpf, '.', ''), '-', ''), ' ', '') LIKE :pesquisar";
        $stmt = $conn->prepare($sql);
        $pesquisar = "%" . $pesquisar . "%";  // Adiciona os % para busca parcial
        $stmt->bindParam(':pesquisar', $pesquisar);
        $stmt->execute();

        // Retorna o resultado sem a mensagem de erro
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("Erro ao buscar pessoas: " . $e->getMessage());
    }
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
