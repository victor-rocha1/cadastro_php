<?php
require_once '../app/Models/EnderecoModel.php';

class EnderecoController {

    // Função para cadastrar endereço
    public function cadastrarEndereco() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosEndereco = [
                'tipo_endereco' => $_POST['tipo_endereco'],
                'cep' => $_POST['cep'],
                'logadouro' => $_POST['logadouro'],
                'numero' => $_POST['numero'],
                'complemento' => $_POST['complemento'],
                'bairro' => $_POST['bairro'],
                'estado' => $_POST['estado'],
                'cidade' => $_POST['cidade']
            ];

            if (cadastrarEnderecoNoBanco($dadosEndereco)) {
                echo "Endereço cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar endereço.";
            }
        }
    }
}
