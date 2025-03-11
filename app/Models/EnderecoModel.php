<?php
require_once '../app/Models/Database.php';

function salvarEndereco($endereco) {
    try {
        $conn = conectarBanco();
        $sql = "INSERT INTO enderecos (id_pessoa, cep, logradouro, numero, complemento, bairro, estado, cidade)
                VALUES (:id_pessoa, :cep, :logradouro, :numero, :complemento, :bairro, :estado, :cidade)";
        $stmt = $conn->prepare($sql);


        foreach ($endereco as $campo => $valor) {
            $stmt->bindValue(":$campo", $valor);
        }

        return $stmt->execute();
    } catch (Exception $e) {
        die("Erro ao salvar endereço: " . $e->getMessage());
    }
}
?>