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
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <a href="../index.php" class="btn-link btn-secondary" style="margin-bottom: 20px;">🏠 Voltar para o Menu Principal</a>

    <div class="container">
        <h1>Cadastrar Novo Responsável</h1>

        <?php if (isset($_GET['erro'])): ?>
            <div class="alert-danger">
                Erro: Preencha todos os campos corretamente!
            </div>
        <?php endif; ?>

        <form action="ResponsavelCadastro.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-link">Salvar Responsável</button>
                <a href="ResponsavelLista.php" style="color: #3498db; text-decoration: none; font-weight: bold;">Voltar para a Listagem</a>
            </div>
        </form>
    </div>

</body>
</html>