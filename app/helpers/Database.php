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
?>