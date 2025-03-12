<?php
require_once '../app/Controllers/PessoaController.php';
require_once '../app/Controllers/EnderecoController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php
if ($action === '') {  //dependendo do que estiver na url, vai para a página da função
    include '../app/Views/pesquisa.php';
} elseif ($action === 'cadastro') {
    cadastro();
} elseif ($action === 'cadastroEndereco') {
    cadastrarEndereco();
} elseif ($action === 'pesquisa') {
    if (isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) {
        $pesquisar = $_GET['pesquisar'];
        $pessoas = buscarPessoas($pesquisar);
    } else {
        $pessoas = [];
    }
    include '../app/Views/pesquisa.php';
}
?>

</body>
</html>