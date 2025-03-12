<?php
function conectarBanco() {
    $host = 'localhost';  
    $port = '3306';      
    $db_name = 'cadastro_pessoas';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host={$host};port={$port};dbname={$db_name};charset=utf8", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // para exibir erros
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
        ]);
        return $conn;
    } catch (PDOException $exception) {
        die("Erro de conexão: " . $exception->getMessage());
    }
}
?>