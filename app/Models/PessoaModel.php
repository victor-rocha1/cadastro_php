<?php
require_once '../app/Models/Database.php';

function buscarPessoas($pesquisar) {
    try {
        $conn = conectarBanco(); // Função de conexão com o banco de dados
        $sql = "SELECT * FROM pessoas 
                WHERE nome LIKE :pesquisar 
                OR REPLACE(REPLACE(REPLACE(cpf, '.', ''), '-', ''), ' ', '') LIKE :pesquisar";
        
        $stmt = $conn->prepare($sql);
        $pesquisar = "%" . $pesquisar . "%";  // Adiciona os % para busca parcial
        $stmt->bindParam(':pesquisar', $pesquisar);
        $stmt->execute();

        // Retorna os resultados sem duplicados, caso existam
        $pessoas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map("unserialize", array_unique(array_map("serialize", $pessoas)));

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


        // Para cada campo (como nome, cpf, etc.), ele usa o método bindValue para associar o valor correspondente ao parâmetro da consulta SQL
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
