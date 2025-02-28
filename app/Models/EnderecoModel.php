<?php
require_once '../app/Helpers/Database.php';  // Incluir o arquivo Database.php

// Função para cadastrar um novo endereço
function salvarEndereco($endereco) {
    $conn = conectarBanco();
    $sql = "INSERT INTO enderecos (cep, logradouro, numero, complemento, bairro, estado, cidade)
            VALUES (:cep, :logradouro, :numero, :complemento, :bairro, :estado, :cidade)";

    $stmt = $conn->prepare($sql);
    
    // Usando loop para bindar todos os parâmetros de forma automática
    foreach ($endereco as $campo => $valor) {
        $stmt->bindValue(":$campo", $valor);
    }

    // Verificando se a execução foi bem-sucedida
    if ($stmt->execute()) {
        return true;
    }
}
?>