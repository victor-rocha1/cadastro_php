<?php
require_once '../app/Helpers/Database.php';

function salvarEndereco($endereco) {
    try {
        $conn = conectarBanco();
        $sql = "INSERT INTO enderecos (cep, logradouro, numero, complemento, bairro, estado, cidade)
                VALUES (:cep, :logradouro, :numero, :complemento, :bairro, :estado, :cidade)";
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