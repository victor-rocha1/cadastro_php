<?php
require_once '../app/Models/EnderecoModel.php';

// Função para cadastrar o endereço
function cadastrarEndereco() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dadosEndereco = [
            'cep' => $_POST['cep'],
            'logradouro' => $_POST['logradouro'],
            'numero' => $_POST['numero'],
            'complemento' => $_POST['complemento'],
            'bairro' => $_POST['bairro'],
            'estado' => $_POST['estado'],
            'cidade' => $_POST['cidade']
        ];

        // Chama a função para cadastrar o endereço
        if (salvarEndereco($dadosEndereco)) {
            echo "Endereço cadastrado com sucesso!";
            // Após o cadastro de endereço, redireciona para a página de pesquisa
            header('Location: index.php?action=pesquisa');
            exit;
        } else {
            echo "Erro ao cadastrar endereço.";
        }
    } else {
        include '../app/Views/cadastroEndereco.php';  // Carrega a view de cadastro de endereço
    }
}

// Função para cadastrar um novo endereço
function salvarEndereco($endereco) {
    $conn = conectarBanco();
    $sql = "INSERT INTO enderecos (cep, logradouro, numero, complemento, bairro, estado, cidade)
            VALUES (:cep, :logradouro, :numero, :complemento, :bairro, :estado, :cidade)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cep', $endereco['cep']);
    $stmt->bindParam(':logradouro', $endereco['logradouro']);
    $stmt->bindParam(':numero', $endereco['numero']);
    $stmt->bindParam(':complemento', $endereco['complemento']);
    $stmt->bindParam(':bairro', $endereco['bairro']);
    $stmt->bindParam(':estado', $endereco['estado']);
    $stmt->bindParam(':cidade', $endereco['cidade']);
    
    return $stmt->execute();
}
?>