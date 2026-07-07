<?php
// Inclui os arquivos necessários manualmente (simulando o Autoload)
require_once '../model/Responsavel.php';
require_once '../dao/Conexao.php';
require_once '../dao/ResponsavelDao.php';
require_once '../controller/ResponsavelController.php';

use Controller\ResponsavelController;

$controller = new ResponsavelController();
// Executa o método de cadastro (só vai agir se a requisição for POST)
$controller->cadastrar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Responsável</title>
</head>
<body>
    <hr>
<a href="../index.php">🏠 Voltar para o Menu Principal</a>
    <h1>Cadastrar Novo Responsável</h1>

    <?php if (isset($_GET['erro'])): ?>
        <p style="color: red;">Erro: Preencha todos os campos corretamente!</p>
    <?php endif; ?>

    <form action="ResponsavelCadastro.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">Salvar Responsável</button>
    </form>

    <br>
    <a href="ResponsavelLista.php">Voltar para a Listagem</a>
</body>
</html>