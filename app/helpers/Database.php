<?php
function conectarBanco() {
    $host = 'localhost';  // Host do banco de dados
    $db_name = 'cadastro_pessoas';  // Nome do banco de dados
    $username = 'root';  // Usuário do banco de dados
    $password = '';  // Senha do banco de dados

    try {
        return new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    } catch (PDOException $exception) {
        die("Erro de conexão: " . $exception->getMessage());
    }
}
?>